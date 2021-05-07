<?php
header('Access-Control-Allow-Origin:*');
$db_host = "localhost";
$db_user = "backend";
$db_pass = "qiyejie";
$db_name = "backend";
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 判断数据库连接状态

if(!$mysql_connect){
    die("Mysql Connect Error".mysqli_error($mysql_connect));
}
/*
// 接收cookies
$qyj_id = $_POST['qyj_id'];
$user_cookies = $_COOKIE['qyj_cookies'];
// 构造SQL查询语句
$cookies_check_sql = "SELECT cookies FROM users WHERE qyj_id=$qyj_id";
// 进入数据库执行
$cookies_check_sql_result = mysqli_query($mysql_connect,$cookies_check_sql);
// 读取数据
$cookies_result = mysqli_fetch_assoc($cookies_check_sql_result);
$cookies = $cookies_result['cookies'];
if($cookies != $user_cookies){
    die("Cookies无效");    
}
*/
?>
