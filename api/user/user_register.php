<?php
// 载入数据库配置
include('../../config.php');
// 检测连接
if (mysqli_connect_errno($mysql_connect)) {
  die("连接MySQL失败: " . mysqli_connect_errno());
} 
// 初始化返回信息
$code = -1;
// 处理传入的信息
$user_email = $_POST['email'];
$select_sql = "SELECT email FROM users WHERE email=$user_email";
$select_sql_result = mysqli_query($mysql_connect,$select_sql);

mysqli_free_result($select_sql_result);
// if (mysqli_fetch_array($select_sql_result)) {
//   mysqli_free_result($select_sql_result);
// }

$user_password = $_POST['password'];
$qyj_id = time()*mt_rand(1,10);
$sign_in_time = time();


// 构造数据库插入语句
$insert_sql = "INSERT INTO users (qyj_id,email,password,sign_in_time) VALUES ('$qyj_id','$user_email','$user_password','$sign_in_time')";

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
echo json_encode($return_array);
?>