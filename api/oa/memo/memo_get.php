<?php
//加载数据库配置
include("../../../config.php");
//接收参数
$user_content = json_decode(file_get_contents("php://input"),true);
//处理参数
$qyj_id = $user_content['qyj_id'];
// 构造查询语句
$select_memo_sql = "SELECT * FROM memo WHRER qyj_id=$qyj_id";
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
//进入数据库查询
$select_memo_sql_result = mysqli_query($mysql_connect,$select_memo_sql);
//初始化返回数组
$return_array = array();
//处理查询结果
while($info = mysqli_fetch_assoc($select_memo_sql_result)){
    $info_array = array("memo_id"=>$info['memo_id'],"title"=>$info['title'],"content"=>$info['content'],"time"=>$info['time']);
    array_push($return_array,$info_array);
}
mysqli_close($mysql_connect);
echo json_encode($return_array)
?>