<?php
// 加载数据库配置
include("../../config.php");
// 处理参数
$department_id = $_POST["department_id"];
// 构造查询语句
$select_info_sql = "SELECT * FROM department_member WHERE department_id=$department_id";
// 进行数据库查询
$select_info_sql_result = mysqli_query($mysql_connect,$select_info_sql);
// 处理查询结果为关联数组
$department_member = array();
while($row = mysqli_fetch_assoc($select_info_sql_result)){
    array_push($department_member,$row);
}
// 输出返回结果
echo json_encode($department_member);
// 关闭数据库连接
mysqli_close($mysql_connect);
?>