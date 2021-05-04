<?php
//加载数据配置文件
include("../../../config");
//接收参数
$approve_contents = json_decode(file_get_contents("php://input"), true);
//处理参数信息
$qyj_id = $approve_contents['qyj_id'];
//构造查询语句
$approve_sql = "SELECT * FROM leave_work where send_to = $qyj_id AND is_apply = 0";
//进入数据库查询
$check_approve = mysqli_query($mysql_connect,$approve_sql);
//初始化返回列表
$return_array = array(); 
while($row = mysqli_fetch_assoc($check_approve)){
    $leave_out = array("qyj_id"=>$row["qyj_id"],"apply_id"=>$row['apply_id'],"leave_date"=>$row['leave_date'],"back_date"=>$row["back_date"]);
    array_push($return_array,$leave_out);
}
echo json_encode($return_array);
mysqli_close($mysql_connect);
?>
