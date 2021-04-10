<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$update_result = 0;
// 处理传入参数
$company_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$company_id = $company_info["company_id"];
$name = $company_info["name"];
$wifi = $company_info["wifi"];
$position = $company_info["position"];
$ip = $company_info["ip"];
// 构造参数
$update_info_sql = "UPDATE companies SET name='$name',wifi='$wifi',position='$position',ip='$ip' WHERE company_id=$company_id";
// 连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 测试数据库连接状态
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
// 数据库进行插入操作
$update_info_sql_result = mysqli_query($mysql_connect,$update_info_sql);
if ($update_info_sql_result){
    $update_result = 1;
}
echo $update_result;
mysqli_close($mysql_connect);
?>