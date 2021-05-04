<?php
// 载入数据库配置
include("../../config.php");
// 接收参数
$company_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$company_id = $company_info["company_id"];
// 构造数据库查询语句
$select_sql = "SELECT * FROM departments WHERE company_id=$company_id";
// 进行数据库查询
$select_sql_result = mysqli_query($mysql_connect,$select_sql);
$department_array = array();
while($row = mysqli_fetch_assoc($select_sql_result)){
    array_push($department_array,$row['department_id']);
}
echo json_encode($department_array);
mysqli_close($mysql_connect);

?>