<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$update_result = 0;
// 处理传入参数
//$company_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$company_id = $_POST["company_id"];
$name = $_POST["name"];
$wifi = $_POST["wifi"];
$position = $_POST["position"];
$ip = $_POST["ip"];
// 构造参数
$update_info_sql = "UPDATE companies SET name='$name',wifi='$wifi',position='$position',ip='$ip' WHERE company_id=$company_id";
// 数据库进行插入操作
$update_info_sql_result = mysqli_query($mysql_connect,$update_info_sql);
if ($update_info_sql_result){
    $update_result = 1;
}
echo json_encode(array("code"=>$update_result));
mysqli_close($mysql_connect);
?>