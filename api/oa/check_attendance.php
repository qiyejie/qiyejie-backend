<?php
// 添加数据库配置文件
include('../config.php');
// 定义返回结果 0为失败，1为成功,2为已签到
$check_result = 0;
// 接收传进来的参数
$json_contents = json_decode(file_get_contents("php://input"), true);
// 接收用户名
$user_id = $json_contents['user_id'];
// 定义SSID
$wifi_ssid = $json_contents['wifi_ssid'];
// 定义企业IP
$wifi_ip = $json_contents['wifi_ip'];
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试连接状态
if (!mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
// 定义查询数据库的SQL语句
$check_company_info = "SELECT wifi,ip FROM company";
// 进行数据库查询
$check_result = mysqli_query($mysql_connect,$check_company_info);
// 处理查询结果
$company_result = mysqli_fetch_assoc($check_result);
$company_wifi = $company_result['wifi'];
$company_ip = $company_result['ip'];

if ($wifi_ssid == $company_wifi and $wifi_ip == $company_ip) {
    # 判断是否与数据库中的数据相同
    //获取当前时间
    $signed_date = date("Y-m-d");
    $signed_time = date("H:i");
    //检查是否已经签到
    $check_exist_sql = "SELECT signed_id from attendance where signed_data=$signed_date";
    $exist_check = mysqli_query($mysql_connect,$check_exist_sql);
    if (mysqli_num_rows($exist_check) > 0) {
        $check_result = 2;
    }else{
        //构造语句
        $insert_sql = "INSERT INTO attendance (signed_date,signed_id,signed_time) VALUES ('$signed_date','$user_id','$signed_time')";
        //插入数据库
        $insert_result = mysqli_query($mysql_connect, $insert_sql);
        //插入状态
        if (!$insert_result) {
            # 判断插入情况
            die("Error".mysqli_error($mysql_connect));
        } else {
            //签到成功
            $check_result = 1;
        }
    }
}
echo $check_result;
?>

