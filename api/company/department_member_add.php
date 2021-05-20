<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$add_result = 0;
// 接收传入的信息
//$department_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$department_id = $_POST["department_id"];
$qyj_id = $_POST["qyj_id"];
$auth_select_sql = "SELECT  * FROM ";
?>