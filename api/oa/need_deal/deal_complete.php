<?php
//加载配置文件
include('../config.php');
//初始化返回信息,0：失败 1：成功
$complete_result = 0;
//获取传入的信息
$user_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$user_id = $user_contents['qyj_id'];
$title = $user_contents['title'];
$is_done = 1;
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
//构造SQL语句
$update_sql = "UPDATE need_deal SET is_done=1 WHERE title='$title' AND qyj_id='$user_id'";
//执行查询
$update_result = mysqli_query($mysql_connect,$update_sql);
if(!$update_result){
    $complete_result = 0;
}else{
    $complete_result = 1;
}
echo $add_result;
mysqli_close($mysql_connect);
?>