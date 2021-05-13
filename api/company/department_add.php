<?php
// 加载数据库配置
include("../../config.php");
// 初始化范围值
$create_result = 0;
$member_group = null;
// 接收传入数据
//$company_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$company_id = $_POST["company_id"];
$name = $_POST["name"];
// 构造语句
$create_department_sql = "INSERT INTO departments (company_id,depaetment_name,manager,member_group) VALUES ('$company_id','$name','None','$member_group'";
// 执行数据库插入操作
$create_department_sql_result = mysqli_query($mysql_connect,$create_department_sql);
// 判断是否创建成功
if($create_department_sql_result){
    $create_result = 1;
}
$department_id = mysqli_insert_id($mysql_connect);
$return_array = array("result"=>$create_result,"company_id"=>$department_id);
echo json_encode($return_array);
mysqli_close($mysql_connect);
?>