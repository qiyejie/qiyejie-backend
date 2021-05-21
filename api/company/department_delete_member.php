<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$delete_result = 0;
// 处理参数
$department_id = $_POST["department_id"];
$qyj_id = $_POST["qyj_id"];
// 构造sql语句
$delete_member_sql = "DELETE FROM department_members WHERE qyj_id='$qyj_id' AND $department_id='$department_id'";
// 进入数据库执行
$delete_member_sql_result = mysqli_query($mysql_connect,$delete_member_sql);
// 判断是否成功
if($delete_member_sql_result){
    $delete_result = 1;
}
echo json_encode(array("code"=>$delete_result));
// 关闭数据库连接
mysqli_close($mysql_connect);
?>