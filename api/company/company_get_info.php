<?php
// 创建数据库
include("../../config.php");
// 接收参数
//$company_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$company_id = $_POST["company_id"];
// 构造sql语句
$select_info_sql = "SELECT * FROM companies WHERE company_id=$company_id";
// 数据库进行插入操作
$select_info_sql_result = mysqli_query($mysql_connect,$select_info_sql);
$return_value = mysqli_fetch_assoc($select_info_sql_result);
$return_array = array("name"=>$return_value["name"],"creater_id"=>$return_value["creater_id"],"manager_group"=>$return_value["manager_group"],"structure"=>$return_value["structure"]);
echo json_encode($return_array);
mysqli_close($mysql_connect);

?>