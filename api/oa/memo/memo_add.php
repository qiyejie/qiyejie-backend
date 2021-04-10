<?php
// 载入数据库配置
include("../../../config.php");
// 初始化返回参数
$add_result = 0;
// 接收参数
$memo_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$qyj_id = $memo_info["qyj_id"];
$memo_title = $memo_info["title"];
$memo_content = $memo_info["content"];
$time = date("Y/m/d H:i:s");
// 构造sql语句
$insert_memo_sql = "INSERT INTO memo (qyj_id,title,content,time) VALUES ('$qyj_id','$memo_title','$memo_content',$time)";
// 连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 测试连接状态
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
// 进行数据库插入
$insert_memo_sql_result = mysqli_query($mysql_connect,$insert_memo_sql);
if($insert_memo_sql_result){
    $add_result = 1;
}

echo $add_result;
mysqli_close($mysql_connect);
?>