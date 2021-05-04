<?php
// 加载数据库配置文件
include("../../config.php");
// 接收参数
$change_contents = json_decode(file_get_contents("php://input"),true);
// 初始化返回信息
$change_result = 0;
// 处理参数
$qyj_id = $change_contents['qyj_id'];
$company_id = $change_contents['company_id'];
// 构造插入语句
$change_info_sql = "UPDATE users SET company_id='$company_id' WHERE qyj_id=$qyj_id";
// 进行数据库查询
$change_info_sql_result = mysqli_query($mysql_connect,$change_info_sql);
if ($change_info_sql_result){
    $change_result = 1;
}
// 输出结果
echo $change_result;
// 关闭数据库连接
mysqli_close($mysql_connect);

?>
