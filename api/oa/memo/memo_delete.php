<?php
//加载配置文件
include("../../../config.php");
//初始化返回参数
$delete_result = 0;
//获取传入的信息
$memo_info = json_decode(file_get_contents("php://input"),true);
//处理参数
$memo_id = $memo_info['memo_id'];
//构造删除语句
$delete_memo_sql = "DELETE FROM memo WHERE memo_id=$memo_id";
//执行数据库语句
$delete_memo_sql_result = mysqli_query($mysql_connect,$delete_memo_sql);
if ($delete_memo_sql_result){
    $delete_result = 1;
}
echo $delete_result;
mysqli_close($mysql_connect);
?>