<?php
//加载配置文件
include('../config.php');
//构造查询语句
$select_sql = "SELECT * FROM notice order by notice_id desc";
//进行数据库查询
$select_sql_result = mysqli_query($mysql_connect,$select_sql);
//处理查询结果
$return_list = array();
while($row = mysqli_fetch_assoc($select_sql_result))
{
    $info_list = array("notice_id"=>$row['notice_id'],"title"=>$row['title'],"content"=>$row['content'],"send_user"=>$row['send_user'],"send_time"=>$row['send_time']);
    array_push($return_list,$info_list);
}
echo json_encode($return_list);
mysqli_close($mysql_connect);
?>