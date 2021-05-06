<?php
// 加载数据库配置
include("../../config.php");
// 初始化范围值
$create_result = 0;
$manager_group = array();
// 接收传入数据
//$company_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$creater_id = $_POST["qyj_id"];
$name = $_POST["name"];
// 构造语句
$create_company_sql = "INSERT INTO companies (creater_id,name,manager_group) VALUES ('$creater_id','$name','$manager_group'";
// 执行数据库插入操作
$create_company_sql_result = mysqli_query($mysql_connect,$create_company_sql);
// 判断是否创建成功
if($create_company_sql_result){
    $create_result = 1;
}
$company_id = mysqli_insert_id($mysql_connect);
$return_array = array("result"=>$create_result,"company_id"=>$company_id);
echo json_encode($return_array);
mysqli_close($mysql_connect);
?>