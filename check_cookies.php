<?php
include("config.php");
// 接收cookies
$qyj_id = $_POST['qyj_id'];
$user_cookies = $_COOKIE['session_id'];
// 构造SQL查询语句
$cookies_check_sql = "SELECT cookies FROM users WHERE qyj_id=$qyj_id";
// 进入数据库执行
$cookies_check_sql_result = mysqli_query($mysql_connect,$cookies_check_sql);
// 读取数据
$cookies_result = mysqli_fetch_assoc($cookies_check_sql_result);
$cookies = $cookies_result['cookies'];
if($cookies != $user_cookies){
    die(json_encode(array("code"=>-1,"message"=>"Cookies illegal")));    
}
?>