<?php
// 初始化数据库信息
include('../config.php');
// 初始化返回信息
$mail_list_result = "None User";
// 链接Mysql
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
// 定义查询数据库查询语句,查询所有部门
$sql_user_check = "SELECT department from user";
// 查询数据库
$user_check_result = mysqli_query($mysql_connect,$sql_user_check);
// 输出查询结果
if (!$user_check_result){
	die("error");
}
$department_info = array();
while($row = mysqli_fetch_assoc($user_check_result))
{
    array_push($department_info,$row['department']);
}   
$department_info = array_unique($department_info);
//初始化json列表
$return_user = array();
//根据部门查询成员列表
foreach ($department_info as $department) {
	//初始化用户集合数组
	$users = array();
    //构造SQL语句
    $check_with_department = "select name,qyj_id from user where department='$department'";
    //查询数据库
    $users_result = mysqli_query($mysql_connect, $check_with_department);
    while ($row = mysqli_fetch_assoc($users_result)) 
	{
		$user_info = array("qyj_id"=>$row['qyj_id'],"name"=>$row['name']);
        array_push($users,$user_info);
    }
	$return_user[$department] = $users;
}
mysqli_close($mysql_connect);
echo json_encode($return_user);
?>

