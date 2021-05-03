<?php
// 加载配置文件
include("../../../config.php");
//初始化返回信息
$complete_result = 0;
//接收传递参数
$leave_contents = json_decode(file_get_contents("php://input"), true);
//处理传递参数
$apply_id = $leave_contents['apply_id'];
$is_apply = $leave_contents['is_apply'];
//构造SQL语句
$update_sql = "UPDATE leave_work SET is_apply=$is_apply WHERE apply_id=$apply_id";
//执行查询
$update_result = mysqli_query($mysql_connect,$update_sql);
if(!$update_result){
    $complete_result = 0;
}else{
    $complete_result = 1;
}
echo $complete_result;
mysqli_close($mysql_connect);
?>