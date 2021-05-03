<?php
// 载入数据库配置文件
include("../../../config.php");
// 初始化返回值
$add_result = 0;
// 接收用户传入的参数
$schedule_info = json_decode(file_get_contents("php://input"), true);
// 处理传入的参数
$schedule_title = $schedule_info["title"];
$schedule_content = $schedule_info["content"];
$schedule_start_time = $schedule_info["start_time"];
$schedule_end_time = $schedule_info["end_time"];
$schedule_member = $schedule_info["member"];
$schedule_level = $schedule_info["level"];
// 构造插入语句
$schedule_insert_sql = "INSERT INTO schedule (title,content,start_time,end_time,member,level) VALUES ('$schedule_title','$schedule_content','$schedule_start_time','$schedule_end_time','$schedule_member','$schedule_level')";
// 执行sql语句
$schedule_insert_sql_result = mysqli_query($mysql_connect, $schedule_insert_sql);
if ($schedule_insert_sql_result) {
    $add_result = 1;
}
echo $add_result;
