<?php
// 载入数据库配置文件
include("../../../config.php");
// 初始化返回参数
$delete_result = 0;
// 接收用户传入的参数
$schedule_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$schedule_id = $schedule_info['schedule_id'];
// 构造sql语句
$schedule_delete_sql = "DELETE FROM schedule WHERE schedule_id=$schedule_id";
// 进入数据库执行
$schedule_delete_sql_result = mysqli_query($mysql_connect,$schedule_delete_sql);
if($schedule_delete_sql_result){
    $delete_result = 1;
}
echo $delete_result;
mysqli_query($mysql_connect);


?>