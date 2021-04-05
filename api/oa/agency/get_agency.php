<?php
//导入数据库配置文件
include("../config.php");
//接收参数
$user_contents = json_decode(file_get_contents("php://input"), true);
//处理参数
$user_id = $user_contents['qyj_id'];
//构造查询语句
$agency_sql = "SELECT * FROM agency where qyj_id=$user_id";
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
//进行数据库查询
$agency_result = mysqli_query($mysql_connect,$agency_sql);
?>