<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$add_result = 0;
// 接收传入的信息
//$company_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$company_id = $_POST["company_id"];
$qyj_id = $_POST["qyj_id"];
// 构造查询语句
$select_info_sql = "SELECT manager_group FROM companies WHERE company_id=$company_id";
$update_info_sql = "UPDATE companies SET manager_group=$manager_group WHERE company_id=$company_id";
// 查询当前管理员列表
$select_info_sql_result = mysqli_query($mysql_connect,$select_info_sql);
$select_info = mysqli_fetch_assoc($select_info_sql_result);
$manager_group = $select_info["manager_group"];
array_push(eval($manager_group),$qyj_id);
$update_info_sql_result = mysqli_query($mysql_connect,$update_info_sql);
if ($update_info_sql_result){
    $add_result = 1;
}
echo $add_result;
mysqli_close($mysql_connect);

?>