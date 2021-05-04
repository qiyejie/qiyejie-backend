<?php
// 载入数据库配置
include("../../../config.php");
// 接收参数
$schedule_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$qyj_id = $schedule_info["qyj_id"];
// 构造查询sql语句
$schedule_select_sql = "SELECT * FROM schedule WHERE member like '%$qyj_id%'";
// 进入数据库查询
$schedule_select_sql_result = mysqli_query($mysql_connect,$schedule_select_sql);
// 初始化返回数组
$schedule_array = array();
// 处理查询结果
while($info = mysqli_fetch_assoc($schedule_select_sql_result)){
    $single_array = array("schedule_id"=>$info['schedule_id'],"creater_id"=>$info['creater_id'],"title"=>$info['title'],"content"=>$info['content'],"start_time"=>$info['start_time'],"end_time"=>$info['end_time'],"member"=>$info['member'],"level"=>$info['level']);
    array_push($schedule_array,$single_array);
}
// 输出返回数组
echo json_encode($schedule_array);
mysqli_close($mysql_connect);
?>