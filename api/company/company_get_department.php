<?php
// 载入数据库配置
include("../../config.php");
// 处理参数
$company_id = $_POST["company_id"];
// 构造查询语句
$select_department_sql = "SELECT * FROM departments WHERE company_id='$company_id'";
// 进入数据库查询
$select_department_sql_result = mysqli_query($mysql_connect,$select_department_sql);
// 处理查询结果为数组
$department_array = array();
while($row = mysqli_fetch_assoc($select_department_sql_result)){
    array_push($department_array,$row);
}
// 输出结果
echo json_encode($department_array);
mysqli_close($mysql_connect);
?>