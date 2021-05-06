<?php
// 载入数据库配置文件
include("../../config.php");
// 初始化返回参数
$add_result = 0;
// 接收传入的数据
//$makeup_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$qyj_id = $_POST['qyj_id'];
$approvel_id = $_POST['approvel_id'];
$status = 0;
// 构造SQL语句
$makeup_insert_sql = "INSERT INTO makeup (qyj_id,approvel_id,status) VALUES ('$qyj_id','$approvel_id',$status)";
// 进入数据库执行
$makeup_insert_sql_result = mysqli_query($mysql_conncet,$makeup_insert_sql);
if ($makeup_insert_sql_result){
    $add_result = 1;
}
// 返回执行结果
echo $add_result;
mysqli_close($mysql_conncet);
?>