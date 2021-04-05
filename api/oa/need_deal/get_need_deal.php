<?php
//加载配置文件
include('../config.php');
//获取传入的信息
$user_contents = json_decode(file_get_contents("php://input"),true);
//处理参数
$user_id = $user_contents['qyj_id'];
//构造查询语句
$deal_sql = "SELECT * FROM need_deal where qyj_id=$user_id";
//连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//测试mysql是否可连接
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
//进行数据库查询
$deal_sql_result = mysqli_query($mysql_connect,$deal_sql);
//处理查询结果
$deal_list = array();
while($row = mysqli_fetch_assoc($deal_sql_result))
{
    $info_list = array("title"=>$row['title'],"content"=>$row['content'],"is_done"=>$row['is_done'],"dead_line"=>$row['dead_line'],"classify"=>$row['classify']);
    array_push($deal_list,$info_list);
}
echo json_encode($deal_list);
mysqli_close($mysql_connect);
?>