<?php
// 加载数据库配置
include("../../config.php");
// 初始化返回信息
$delete_result = 0;
// 处理参数
$department_id = $_POST["department_id"];
// 构造查询语句
$delete_sql = "DELETE FROM departments WHERE department_id=$department_id";
// 进行数据库查询
$delete_sql_result = mysqli_query($mysql_connect,$delete_sql);
if($delete_sql_result){
    $delete_result = 1;
}
// 输出删除结果
echo json_encode(array("code"=>$delete_result));
// 关闭数据库连接
mysqli_close($mysql_connect);
?>