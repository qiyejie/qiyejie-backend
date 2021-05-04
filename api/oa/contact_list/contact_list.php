<?php
// 导入配置文件
include("../../../config.php");
// 接收传入的参数
$user_content = json_decode(file_get_contents("php://input"),true);
// 处理参数
$company_id = $user_content['company_id'];
// 构造查询语句
$select_department_sql = "SELECT department_name,manager,members FROM departments WHERE company_id=$company_id";
// 进入数据库查询
$select_department_sql_result = mysqli_query($mysql_connect,$select_department_sql);
// 处理查询结果
$return_array = array();
while($row = mysqli_fetch_assoc($select_department_sql_result)){
    $department_name = $row['department_name'];
    $manager = $row['manager'];
    $members = $row['members'];
    $single_array = array("department_name"=>$department_name,"manager"=>$manager,"members"=>$members);
    array_push($return_array,$single_array);
}
// 输出返回结果
echo json_encode($return_array);

?>