<?php
// 载入数据库配置
include("../../../config.php");
// 初始化返回参数
$change_result = 0;
// 接收参数
$memo_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$memo_id = $memo_info["memo_id"];
$memo_title = $memo_info["title"];
$memo_content = $memo_info["content"];
$time = date("Y/m/d H:i:s");
// 构造sql语句
$update_memo_sql = "UPDATE memo SET title='$memo_title',content='$memo_content',time='$time' WHERE memo_id=$memo_id";
// 进行数据库插入
$update_memo_sql_result = mysqli_query($mysql_connect,$update_memo_sql);
if($update_memo_sql_result){
    $change_result = 1;
}

echo $change_result;
mysqli_close($mysql_connect);
?>