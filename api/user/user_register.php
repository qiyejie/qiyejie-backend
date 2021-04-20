<?php
// 载入数据库配置
include('../../config.php');
// 初始化返回信息
$register_result = 0;
// 处理传入的信息
$user_info = json_decode(file_get_contents("php://input"), true);
$user_nickname = $user_info['nickname'];
$user_pass = $user_info['password'];
// 构造数据库插入语句
$insert_sql = "INSERT INTO users (nickname,password) VALUES ('$user_nickname','$user_pass')";
// 连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 测试数据库连接状态
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
// 数据库进行插入操作
$insert_sql_result = mysqli_query($mysql_connect,$insert_sql);
// 返回插入结果
if ($insert_sql_result){
    $register_result = 0;
}
// 获取qyj_id
$qyj_id = mysqli_insert_id($mysql_connect);
// 处理返回数组
$return_array = array("result"=>$register_result,"qyj_id"=>$qyj_id);
// 关闭数据库连接
mysqli_close($mysql_connect);
// 返回注册结果
echo json_encode($return_array);
?>