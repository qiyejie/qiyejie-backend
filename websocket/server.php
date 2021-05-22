<?php
// 加载数据库配置文件
include("../config.php");
// 引用Workerman框架
use Workerman\Worker;

require_once __DIR__ . '/Workerman/Autoloader.php';
// 建立WebSocket服务器
$http_worker = new Worker("websocket://0.0.0.0:1234");
// 进程数设定为1
$http_worker->count = 1;
// 建立用户连接池
$connect_array = array();
// 建立连接回调函数
function handle_connection($connection)
{
    $connection->send("Server Connected");
}
// 建立接收消息回调函数
function handle_message($connection, $data)
{
    global $connect_array;
    $data = json_decode($data);
    // 接收前端传来的参数
    $qyj_id = $data["qyj_id"];
    // 判断是否为连接信息
    if (isset($qyj_id)) {
        // 初次连接，将qyj_id加入用户池
        $connection->uid = $qyj_id;
        // 标记当前在线成员状态
        $user_online_sql = "UPDATE users SET online=1 WHERE qyj_id='$qyj_id'";
        $user_online_sql_result = mysqli_query($mysql_connect, $user_online_sql);
        if ($user_online_sql_result) {
            // 设定uid
            $connection->uid = $qyj_id;
            $connection->send(json_encode(array("code"=>1,"message"=>"已连接")));
            array_push($connect_array, $qyj_id);
            return true;
        }
    }
    $qyj_id_send = $data["send_id"];
    $qyj_id_target = $data["target_id"];
    $content = $data["content"];
    $is_group = $data["is_group"];
    $send_time = time();
    // 判断是否为群组消息
    if ($is_group == 0) {
        // 不是群组信息，给指定用户推送
        if (array_key_exists($qyj_id_target, $connect_array)) {
            // 如果对方建立了ws连接，直接推送并写入数据库
            $connections[$qyj_id_target] ->send(json_encode(array("from_id"=>$qyj_id_send,"content"=>$content,"time"=>$send_time)));
            // 写入数据库
            $insert_chat_sql = "INSERT INTO chat_message (from_userid,to_userid,message,is_push，send_time) VALUES ('$qyj_id_send','$qyj_id_send','$content','1','$send_time')";
            $insert_chat_sql_result = mysqli_query($mysql_connect, $insert_chat_sql);
            if (!$insert_chat_sql_result) {
                $connection->send("chatlog read insert error");
            }
        } else {
            // 当前用户不在线，存入without_read数据表中
            $insert_noread_sql = "INSERT INTO chat_message_without_read (from_id,to_id,content,is_group,time) VALUES ('$qyj_id_send','$qyj_id_target','$content',0,'$send_time')";
            $insert_noread_sql_result = mysqli_query($mysql_connect, $insert_noread_sql);
            if (!$insert_noread_sql_result) {
                $connection->send("chatlog noread insert error");
            }
        }
    } else {
        // 是群组信息，发送给群组
        $group_id = $data["group_id"];
        // 查询群组所有用户
        $select_user_sql = "SELECT qyj_id FROM chat_group_member WHERE group_id = '$group_id'";
        $select_user_sql_result = mysqli_query($mysql_connect, $select_user_sql);
        // 遍历成员
        while ($row = mysqli_fetch_assoc($select_user_sql_result)) {
            if (array_key_exists($connect_array, $row["qyj_id"])) {
                // 对在线成员进行推送
                $connection[$row["qyj_id"]]->send(json_encode(array("group_id"=>$group_id,"content"=>$content,"from_id"=>$qyj_id_send,"time"=>$send_time)));
                $insert_chat_sql = "INSERT INTO chat_group_message (group_id,from_user,content,time) VALUES ('$group_id','$qyj_id_send','$content','$send_time')";
                $insert_chat_sql_result = mysqli_query($mysql_connect, $insert_chat_sql);
                if (!$insert_chat_sql_result) {
                    $connection->send("chatlog read insert error");
                }
            } else {
                // 当前用户不在线，存入without_read数据表中
                $insert_noread_sql = "INSERT INTO chat_message_without_read (from_id,group_id,content,is_group,time) VALUES ('$qyj_id_send','$group_id','$content',1,'$send_time')";
                $insert_noread_sql_result = mysqli_query($mysql_connect, $insert_noread_sql);
                if (!$insert_noread_sql_result) {
                    $connection->send("chatlog noread insert error");
                }
            }
        }
    }
}
// 建立连接断开回调函数
function handle_close($connection)
{
    global $connect_array;
    //  查找元素
    $key = array_search($connection->uid, $connect_array);
    if ($key) {
        array_splice($connect_array, $key, 1);
    }
}

$http_worker->onConnect = 'handle_connection';
$http_worker->onMessage = 'handle_message';
$http_worker->onClose = 'handle_close';
Worker::runALL();
