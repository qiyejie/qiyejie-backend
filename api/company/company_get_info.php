<?php
// 创建数据库
include("../../config.php");
// 处理参数
$company_id = $_POST["company_id"];
// 构造sql语句
$select_info_sql = "SELECT * FROM companies WHERE company_id=$company_id";
// 数据库进行查询操作
$select_info_sql_result = mysqli_query($mysql_connect,$select_info_sql);
// 将查询结果转换为关联数组
$return_value = mysqli_fetch_assoc($select_info_sql_result);
// 输出json数组
echo json_encode($return_value);
// 关闭数据库连接
mysqli_close($mysql_connect);
?>