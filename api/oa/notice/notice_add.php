<?php
//加载配置文件
include('../config.php');
//初始化返回信息,0：失败 1：成功
$add_result = 0;
//获取传入的信息
//$notice_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$send_user = $_POST['send_user'];
$title = $_POST['title'];
$content = $_POST['content'];
$send_time = data("Y-m-d-H:i:s");
//构造查询语句
$insert_sql = "INSERT INTO notice (title,content,send_user,send_time) VALUES ('$title','$content',$send_user,'$send_time')";
//进行数据库查询
$insert_sql_result = mysqli_query($mysql_connect,$insert_sql);
if (!$insert__sql_result) {
    $add_result = 0;
}else {
    $add_result = 1;
}
echo $add_result;
mysqli_close($mysql_connect);
?>