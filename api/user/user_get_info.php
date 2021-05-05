<?php
//加载数据库配置文件"
include("../../config.php");
//接收参数
//$user_contents = json_decode(file_get_contents("php://input"), true);
//处理参数
$qyj_id = $_POST['qyj_id'];
//构造查询语句
$user_info_sql = "SELECT * FROM users where qyj_id=$qyj_id";
//查询数据库
$user_info_sql_result = mysqli_query($mysql_connect, $user_info_sql);
//处理查询结果
$info = mysqli_fetch_assoc($user_info_sql_result);
//初始化返回数组
$user_info = array("qyj_id"=>$qyj_id,"email"=>$info['email'],"name"=>$info['name'],"email"=>$info['email'],"gender"=>$info['gender'],"nationality"=>$info['nationality'],"id_type"=>$info['id_type'],"id_number"=>$info['id_number'],"id_address"=>$info['id_address'],"device_id"=>$info['device_id'],"company_id"=>$info['company_id'],"contact_address"=>$info['contact_address'],"session_id"=>$info_id['session_id']);
//返回内容
echo json_encode($user_info);
mysqli_close($mysql_connect); 
?>