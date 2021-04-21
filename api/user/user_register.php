<?php
// 载入数据库配置
include('../../config.php');
// 初始化返回信息
$code = -1;
// 处理传入的信息
$user_info = json_decode(file_get_contents("php://input"), true);
$user_email = $user_info['email'];
$user_password = $user_info['password'];
$qyj_id = time()*2;
$sign_in_time = time();
// 构造数据库插入语句
$insert_sql = "INSERT INTO users (qyj_id,email,password,sign_in_time) VALUES ('$qyj_id','$user_email','$user_password','$sign_in_time')";
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 检测连接
if (mysqli_connect_errno($mysql_connect)) {
  die("连接MySQL失败: " . mysqli_connect_errno());
} 
// 数据库进行插入操作
$insert_sql_result = mysqli_query($mysql_connect,$insert_sql);
// 返回插入结果
if ($insert_sql_result) {
  $code = 0;
} else {
  die("系统异常:".mysqli_error($mysql_connect));
}
// 处理返回数组
$return_array = array("code"=>$code,"qyj_id"=>$qyj_id,"message"=>"注册成功");
// 关闭数据库连接
mysqli_close($mysql_connect);
// 返回注册结果
echo json_encode($return_array,$insert_sql);
?>