<?php
// 加载配置文件
include("../../../config.php");
//初始化返回参数(0:失败 ，1:成功)
$apply_result = 0;
//接收传递参数
//$leave_contents = json_decode(file_get_contents("php://input"), true);
//处理传递参数
$user_id = $_POST['qyj_id'];
$send_to = $_POST['send_to_id'];
$leave_date = $_POST['leave_date'];
$back_date = $_POST['back_date'];
//初始化请假状态信息
$is_apply = 0;
//构造插入语句
$sql_leave_insert = "INSERT INTO leave_work (user_id,send_to,leave_date,back_date) VALUES ($user_id,$send_to,$leave_date,$back_date)";
//数据库插入
$insert_result = mysqli_query($mysql_connect,$sql_leave_insert);
//判断是否插入成功
if (!$insert_result) {
    $apply_result = 0;
}else{
    $apply_result = 1;
}
echo $apply_result;
mysqli_close($mysql_connect);
?>

