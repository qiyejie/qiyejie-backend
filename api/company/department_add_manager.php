<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回参数
$update_result = 0;
// 接收参数
$department_id = $_POST["department_id"];
$qyj_id = $_POST["qyj_id"];
// 构造功能语句
$update_identity_sql = "UPDATE department_members SET indentity='manager' WHERE qyj_id='$qyj_id' AND department_id='$department_id'";
// 进入数据库执行
$update_identity_sql_result = mysqli_query($mysql_connect,$update_identity_sql);
// 判断执行情况
if($update_identity_sql_result){
    $update_result = 1;

}
// 输出结果
echo json_encode(array("code"=>$update_result));
// 关闭数据库连接
mysqli_close($mysql_connect);
?>