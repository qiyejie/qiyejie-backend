<?php
// 加载数据库配置
include("../../config.php");
// 接收参数
//$department_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$department_id = $_POST["department_id"];
// 构造查询语句
$select_info_sql = "SELECT * FROM departments WHERE department_id=$department_id";
// 进行数据库查询
$select_info_sql_result = mysqli_query($mysql_connect,$select_info_sql);
// 处理查询结果为关联数组
$department_info = mysqli_fetch_assoc($select_info_sql_result);
// 输出返回结果
echo json_encode($department_info);
// 关闭数据库连接
mysqli_close($mysql_connect);
?>