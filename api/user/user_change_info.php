<?php
// 加载数据库配置文件
include("../../config.php");
// 接收参数
$change_contents = json_decode(file_get_contents("php://input"),true);
// 初始化返回信息
$change_result = 0;
// 处理参数
$qyj_id = $change_contents['qyj_id'];
$email = $change_contents['email'];
$gender = $change_contents['gender'];
$nationality = $change_contents['nationality'];
$id_type = $change_contents['id_type'];
$id_number = $change_contents['id_number'];
$id_address = $change_contents['id_address'];
$contact_address = $change_contents['contact_address'];
// 构造插入语句
$change_info_sql = "UPDATE users SET email='$email',gender='$gender',nationality='$nationality',id_type='$id_type',id_number='$id_number',id_address='$id_address',contact_address='$contact_address' WHERE qyj_id=$qyj_id";
// 连接数据库
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// 测试数据库连接状态
if (!$mysql_connect) {
    die('mysql_connect error:'.mysqli_error($mysql_connect));
}
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
