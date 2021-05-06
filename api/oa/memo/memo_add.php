<?php
// 载入数据库配置
include("../../../config.php");
// 初始化返回参数
$add_result = 0;
// 接收参数
//$memo_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$qyj_id = $_POST["qyj_id"];
$memo_title = $_POST["title"];
$memo_content = $_POST["content"];
$time = date("Y/m/d H:i:s");
// 构造sql语句
$insert_memo_sql = "INSERT INTO memo (qyj_id,title,content,time) VALUES ('$qyj_id','$memo_title','$memo_content',$time)";
// 进行数据库插入
$insert_memo_sql_result = mysqli_query($mysql_connect,$insert_memo_sql);
if($insert_memo_sql_result){
    $add_result = 1;
}

echo $add_result;
mysqli_close($mysql_connect);
?>