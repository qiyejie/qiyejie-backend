<?php
//加载数据库配置文件
include("../../../config.php");
//初始化返回参数
$check_result = 0;
//接收参数
//$user_contents = json_decode(file_get_contents("php://input"), true);
//处理参数
$qyj_id = $_POST['qyj_id'];
$session_id = $_POST['seesion_id'];
//构造查询语句
$select_session_sql = "SELECT session_id FROM users WHERE quj_id=$qyj_id";
//执行数据库查询
$select_session_sql_result = mysqli_query($mysql_connect,$select_session_sql);
//处理查询结果
$info = mysqli_fetch_assoc($select_session_sql_result);
$session_select = $info['session_id'];
//进行对比
if($session_id == $session_select){
    $check_result = 1;    
}
echo $check_result;
mysqli_close($mysql_connect);
?>