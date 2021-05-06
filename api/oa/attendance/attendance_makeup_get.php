<?php
// 载入数据库配置文件
include("../../../config.php");
// 获取传入的参数
//$makeup_info = json_decode(file_get_contents("php://input"),true);
// 处理参数
$qyj_id = $_POST['qyj_id'];
// 构造sql语句
$makeup_select_sql = "SELECT * FROM makeup WHERE qyj_id = $qyj_id";
// 进入数据库执行
$makeup_select_sql_result = mysqli_query($mysql_connect,$makeup_select_sql);
// 初始化返回列表
$makeup_array = array();
while($info = mysqli_fetch_assoc($makeup_select_sql_result)){
    $single_makeup = array("makeup_id"=>$info['makeup_id'],"qyj_id"=>$info['qyj_id'],"approvel_id"=>$info['approvel_id'],"status"=>$info['status']);
    array_push($makeup_array,$single_makeup);
}
echo json_encode($makeup_array);
mysqli_close($mysql_connect);
?>