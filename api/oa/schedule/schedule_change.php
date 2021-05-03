<?php
// 载入数据库配置文件
include("../../../config.php");
// 初始化返回参数
$change_result = 0;
// 接收参数
$schedule_info = json_decode(file_get_contents("php://input"),true);
// 处理传入的参数
$schedule_title = $schedule_info["title"];
$schedule_content = $schedule_info["content"];
$schedule_start_time = $schedule_info["start_time"];
$schedule_end_time = $schedule_info["end_time"];
$schedule_member = $schedule_info["member"];
$schedule_level = $schedule_info["level"];
// 构造update语句
$schedule_update_sql = "UPDATE schedule SET title='$schedule_title',content='$schedule_content',start_time='$schedule_start_time',end_time='$schedule_end_time',member='$schedule_member',level='$schedule_level'";
// 执行sql语句
$schedule_update_sql_result = mysqli_query($mysql_connect,$schedule_update_sql);
if ($schedule_update_sql_result){
    $change_result = 1;
}
// 输出结果
echo $change_result;
mysqli_close($mysql_connect);
?>