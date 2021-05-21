<?php
// 加载数据库配置
include("../../config.php");
// 初始化范围值
$create_result = 0;
// 处理参数
$company_id = $_POST["company_id"];
$name = $_POST["name"];
// 构造语句
$create_department_sql = "INSERT INTO departments (company_id,department_name) VALUES ('$company_id','$name')";
// 执行数据库插入操作
$create_department_sql_result = mysqli_query($mysql_connect,$create_department_sql);
// 判断是否创建成功
if($create_department_sql_result){
    $create_result = 1;
}
// 获取department_id
$department_id = mysqli_insert_id($mysql_connect);
// 返回插入结果
$return_array = array("result"=>$create_result,"department_id"=>$department_id);
echo json_encode($return_array);
// 关闭数据库连接
mysqli_close($mysql_connect);
?>