<?php
//加载配置文件
include("../../config.php");
// 初始化返回参数(0:失败，1:成功)
$complete_result = 0;
// 获取传入信息
$deal_content = json_decode(file_get_contents("php://input"),true);
// 处理传入的信息
$deal_id = $deal_content['deal_id'];
$is_done = $deal_content['is_done'];
// 构造SQL语句
$update_deal_sql = "UPDATE need_deal SET id_done=$is_done WHERE deal_id=$deal_id";
// 进行update查询
$update_deal_sql_result = mysqli_query($mysql_connect,$update_deal_sql);
// 查询结果
if($update_deal_sql_result){
   $complete_result = 1; 
}
echo $complete_result;
?>