<?php
// 载入数据库配置
include("../config.php");
// 初始化返回信息(0:失败，1:成功)
$login_result = 0;
// 接收传入的用户数据信息
$user_info = json_decode(file_get_contents("php://input"),true);
// 处理传入的信息
$user_id = $user_info['qyj_id'];
$user_pass = $user_info['password'];
// 对密码进行md5加密，方便进入数据库对比
$md5_pass = md5($user_pass);
// 构造查询语句
$check_login_sql = "SELECT password FROM users where qyj_id=$user_id";
// 连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 测试数据库连接状态
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
// 进行数据库查询
$check_login_sql_result = mysqli_query($mysql_connect,$check_login_sql);
// 处理查询数据
$sql_result = mysqli_fetch_assoc($check_login_sql_result);
// 进行密码对比
if ($md5_pass == $sql_result['password']){
    $login_result = 1;    
}
// 设置Cookies
$cookie_create = md5("$user_id"."$user_pass");
setcookie("qyj_cookie",$cookie_create);
// 构造插入语句
$insert_session_sql = "INSERT INTO users (session_id) VALUES ('$cookie_create')";
// 执行数据库插入
$insert_session_result = mysqli_query($mysql_connect,$insert_session_sql);
if (!$insert_session_result){
    $login_result = 0;
}
echo $login_result;
?>