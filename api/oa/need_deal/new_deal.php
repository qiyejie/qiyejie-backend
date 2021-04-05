<?php
//加载配置文件
include('../config.php');
//初始化返回信息,0：失败 1：成功
$add_result = 0;
//获取传入的信息
$user_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$user_id = $user_contents['qyj_id'];
$title = $user_contents['title'];
$content = $user_contents['content'];
$dead_line = $user_contents['dead_line'];
$classify = $user_contents['classify'];
$is_done = 0;
//构造查询语句
$deal_sql = "SELECT * FROM need_deal where qyj_id=$user_id AND title=\"$title\"";
$insert_sql = "INSERT INTO need_deal (qyj_id,title,content,dead_line,classify,is_done) VALUES ('$user_id','$title','$content','$dead_line','$classify','$is_done') ";
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
//进行数据库查询
$check_sql_result = mysqli_query($mysql_connect,$deal_sql);
if (mysqli_num_rows($check_sql_result) > 0){
    $add_result = 0;
}else {
    $insert_result = mysqli_query($mysql_connect,$insert_sql);
    if (!$insert_result) {
        $add_result = 0;
    }else {
        $add_result = 1;
    }
echo $add_result;

}
echo $add_result;
mysqli_close($mysql_connect);
?>