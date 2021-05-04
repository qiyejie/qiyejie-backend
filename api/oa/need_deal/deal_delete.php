<?php
//加载配置文件
include('../config.php');
//初始化返回信息,0：失败 1：成功
$delete_result = 0;
//获取传入的信息
$user_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$user_id = $user_contents['qyj_id'];
$title = $user_contents['title'];
//构造SQL语句
$delete_sql = "DELETE FROM need_deal WHERE title='$title' AND qyj_id='$user_id'";
//执行查询
$delete_sql_result = mysqli_query($mysql_connect,$delete_sql);
if(!$delete_sql_result){
    $delete_result = 0;
}else{
    $delete_result = 1;
}
echo $delete_result;
mysqli_close($mysql_connect);
?>