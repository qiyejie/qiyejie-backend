<?php
// 载入数据库配置
include("../../config.php");
// 初始化返回信息
$insert_result = 0;
// 处理参数
$department_id = $_POST["department_id"];
$qyj_id = $_POST["qyj_id"];
$identity = "user";
// 构造加入部门语句
$insert_department_sql = "INSERT INTO department_members (qyj_id,department_id,identity) VALUE ('$qyj_id','$department_id','$identity')";
// 执行操作
$insert_department_sql_result = mysqli_query($mysql_connect,$insert_department_sql);
// 判断是否插入成功
if($insert_department_sql_result){
    $insert_result = 1;
}
// 输出结果
echo json_encode(array("code"=>$insert_result));
// 关闭数据库连接
mysqli_close($mysql_connect);
?>