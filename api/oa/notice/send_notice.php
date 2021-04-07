<?php
//加载配置文件
include('../config.php');
//初始化返回信息,0：失败 1：成功
$add_result = 0;
//获取传入的信息
$notice_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$send_user = $notice_contents['send_user'];
$title = $notice_contents['title'];
$content = $notice_contents['content'];
$send_time = data("Y-m-d-H:i:s");
//构造查询语句
$insert_sql = "INSERT INTO notice (title,content,send_user,send_time) VALUES ('$title','$content',$send_user,'$send_time')";
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
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