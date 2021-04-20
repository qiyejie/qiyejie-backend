<?php
// 载入数据库配置
include('../../config.php');
// 初始化返回信息
$register_result = 0;
// 处理传入的信息
$user_info = json_decode(file_get_contents("php://input"), true);
$user_nickname = $user_info['nickname'];
$user_pass = $user_info['password'];
$qyj_id = mt_rand(1,1000)*date("i")*date("s");
// 构造数据库插入语句
$insert_sql = "INSERT INTO users (qyj_id,nickname,password) VALUES ($qyj_id,$user_nickname,$user_pass)";
// 创建连接
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 检测连接
if ($conn->connect_error) {
  die("连接失败: " . $conn->connect_error);
} 
// 数据库进行插入操作
$insert_sql_result = mysqli_query($mysql_connect,$insert_sql);
// 返回插入结果
if ($insert_sql_result){
  $register_result = 0;
} else {
  die('系统异常~');
}
// 处理返回数组
$return_array = array("result"=>$register_result,"qyj_id"=>$qyj_id);
// 关闭数据库连接
mysqli_close($mysql_connect);
// 返回注册结果
echo json_encode($return_array);
?>