<?php
//加载数据库配置文件
include("../../../config.php");
//接收参数
$user_contents = json_decode(file_get_contents("php://input"), true);
//处理参数
$qyj_id = $user_contents['qyj_id'];
$session_id = $user_contents['seesion_id'];
//构造查询语句
$select_session_sql = "SELECT session_id FROM users WHERE quj_id=$qyj_id";
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
//执行数据库查询

?>