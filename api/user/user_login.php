<?php
error_reporting(0);
// 载入数据库配置
include("../../config.php");
// 初始化返回信息(-1:失败，0:成功)
$login_result = -1;
// 处理传入的信息
$email = $_POST['email'];
$user_pass = $_POST['password'];
// 对密码进行md5加密，方便进入数据库对比
$md5_pass = md5($user_pass);
// 构造查询语句
$check_login_sql = "SELECT password FROM users WHERE email=$emailr";
$check_email_exist = "SELECT * FROM users WHERE email=$email";
// 验证邮箱
$check_email_exist_result = mysqli_query($mysql_connect);
if(mysqli_fetch_row($check_email_exist_result == 0)){
    die(json_encode(array("code"=>-1,"message"=>"邮箱不存在或密码错误")));
}
// 进行数据库查询
$check_login_sql_result = mysqli_query($mysql_connect,$check_login_sql);
// 处理查询数据
$sql_result = mysqli_fetch_assoc($check_login_sql_result);
// 进行密码对比
if ($user_pass == $sql_result['password']){
    $login_result = 0;    
}
// 设置Cookies
$cookie_create = md5("$user_id"."$user_pass");
setcookie("session_id",$cookie_create);
// 构造插入语句
$insert_session_sql = "UPDATE users SET session_id='$cookie_create' WHERE email=$email";
// 执行数据库插入
$insert_session_result = mysqli_query($mysql_connect,$insert_session_sql);
if (!$insert_session_result){
    $login_result = 0;
}
if ($login_result = 0) {
    echo json_encode(array("code"=>$login_result,"message"=>"登录成功"));
}else{
    echo json_encode(array("code"=>$login_result,"message"=>"邮箱或密码错误"));
}
?>