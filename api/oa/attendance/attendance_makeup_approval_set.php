<?php
// 载入数据库配置文件
include("../../../config.php");
// 初始化返回参数
$set_result = 0;
// 接收参数
$makeup_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$makeup_id = $makeup_info['makeup_id'];
$status = $makeup_info['status'];
// 构造语句
$makeup_update_sql = "UPDATE makeup SET status=$status WHERE makeup_id=$makeup_id";
// 进入数据库执行
$makeup_update_sql_result = mysqli_query($mysql_connect,$makeup_update_sql);
if ($makeup_update_sql_result){
    $set_result = 1;
}
// 返回信息
echo $set_result;
mysqli_close($mysql_connect);
?>