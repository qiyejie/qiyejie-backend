<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$add_result = 0;
// 接收传入的信息
$department_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$department_id = $department_info["department_id"];
$qyj_id = $department_info["qyj_id"];
// 构造查询语句
$select_info_sql = "SELECT members FROM departments WHERE department_id=$department_id";
$update_info_sql = "UPDATE departments SET members=$members WHERE department_id=$department_id";
// 查询当前管理员列表
$select_info_sql_result = mysqli_query($mysql_connect,$select_info_sql);
$select_info = mysqli_fetch_assoc($select_info_sql_result);
$members = $select_info["members"];
array_push($members,$qyj_id);
$update_info_sql_result = mysqli_query($mysql_connect,$update_info_sql);
if ($update_info_sql_result){
    $add_result = 1;
}
echo $add_result;
mysqli_close($mysql_connect);

?>