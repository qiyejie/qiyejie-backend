<?php
// 加载数据库配置
include("../../config.php");
// 初始化范围值
$create_result = 0;
// 处理参数
$creater_id = $_POST["qyj_id"];
$name = $_POST["name"];
$profile = $_POST["profile"];
// 构造语句
$create_company_sql = "INSERT INTO companies (creater_id,name,profile) VALUES ('$creater_id','$name','$profile')";
$check_company_name = "SELECT name FROM companies WHERE name='$name'";
// 执行数据库插入操作
$check_company_name_result = mysqli_query($mysql_connect, $check_company_name);
$row = mysqli_num_rows($check_company_name_result);
// 查询是否已经有相同名称的公司
if ($row > 0) {
    die(json_encode(array("code"=>-1,"message"=>"公司名已被注册")));
}
// 创建公司，执行数据库插入操作
$create_company_sql_result = mysqli_query($mysql_connect, $create_company_sql);
// 判断是否创建成功
if ($create_company_sql_result) {
    $create_result = 1;
}
// 返回创建公司的company_id
$company_id = mysqli_insert_id($mysql_connect);
// 返回插入结果
$return_array = array("result"=>$create_result,"company_id"=>$company_id);
echo json_encode($return_array);
// 关闭数据库连接
mysqli_close($mysql_connect);
?>