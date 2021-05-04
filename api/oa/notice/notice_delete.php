<?php
//加载配置文件
include('../config.php');
//初始化返回信息,0：失败 1：成功
$delete_result = 0;
//获取传入的信息
$notice_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$notice_id = $notice_contents['notice_id'];
//构造查询语句
$delete_sql = "DELETE FROM notice WHERE notice_id=$notice_id";
//进行数据库查询
$delete_sql_result = mysqli_query($mysql_connect,$delete_sql);
if (!$delete__sql_result) {
    $delete_result = 0;
}else {
    $delete_result = 1;
}
echo $delete_result;
mysqli_close($mysql_connect);
?>