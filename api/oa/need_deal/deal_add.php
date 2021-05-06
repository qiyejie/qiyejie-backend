<?php
//加载配置文件
include('../config.php');
//初始化返回信息,0：失败 1：成功
$add_result = 0;
//获取传入的信息
//$user_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$user_id = $_POST['qyj_id'];
$title = $_POST['title'];
$content = $_POST['content'];
$deadline = $_POST['deadline'];
$classify = $_POST['classify'];
$address = $_POST['address'];
$is_done = 0;
//构造查询语句
$deal_sql = "SELECT * FROM need_deal where qyj_id=$user_id AND title=\"$title\"";
$insert_sql = "INSERT INTO need_deal (qyj_id,title,content,deadline,classify,is_done,address) VALUES ('$user_id','$title','$content','$deadline','$classify','$is_done','$address') ";
//进行数据库查询
$check_sql_result = mysqli_query($mysql_connect,$deal_sql);
if (mysqli_num_rows($check_sql_result) > 0){
    $add_result = 0;
}else {
    $insert_result = mysqli_query($mysql_connect,$insert_sql);
    if (!$insert_result) {
        $add_result = 0;
    }else {
        $add_result = 1;
    }
}
echo $add_result;
mysqli_close($mysql_connect);
?>