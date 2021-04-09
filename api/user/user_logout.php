<?php
// 载入数据库配置
include("../config.php");
// 初始化返回参数(0:失败,1:成功)
$logout_result = 0;
// 接收客户端参数
$logout_parameter = json_decode(file_get_contents("php://input"), true);
// 处理传入的数据
$qyj_id = $logout_parameter['qyj_id'];
// 构造数据库删除session语句
$delete_session_sql = "DELETE session_id FROM users WHERE qyj_id=$qyj_id";
// 连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 测试数据库连接状态
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
// 执行删除语句
$delete_session_sql_result = mysqli_query($mysql_connect, $delete_session_sql);
// 判断是否成功
if ($delete_session_sql_result) {
    $logout_result = 1;
}
mysqli_close($mysql_connect);
echo $logout_result;
