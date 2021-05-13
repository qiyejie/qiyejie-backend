<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$delete_result = 0;
// 接收传入的信息
//$department_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$department_id = $_POST["department_id"];
$qyj_id = $_POST["qyj_id"];
// 构造查询语句
$select_info_sql = "SELECT members FROM departments WHERE department_id=$department_id";
$update_info_sql = "UPDATE departments SET members=$members WHERE department_id=$department_id";
// 查询当前管理员列表
$select_info_sql_result = mysqli_query($mysql_connect,$select_info_sql);
$select_info = mysqli_fetch_assoc($select_info_sql_result);
$members = explode("-",$select_info["members"]);
$key = array_search($qyj_id,$members);
if($key){
    array_splice($members,$key,1);
}
$members = implode("-",$members);
$update_info_sql_result = mysqli_query($mysql_connect,$update_info_sql);
if ($update_info_sql_result){
    $delete_result = 1;
}
echo $delete_result;
mysqli_close($mysql_connect);
?>