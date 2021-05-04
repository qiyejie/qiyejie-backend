<?php
// 加载数据库配置文件
include("../../config.php");
// 接收参数
$change_contents = json_decode(file_get_contents("php://input"),true);
// 初始化返回信息
$change_result = 0;
// 处理参数
$qyj_id = $change_contents['qyj_id'];
$old_pass = $change_contents['old_pass'];
$new_pass = $change_contents['new_pass'];
// 构造插入语句
$check_pass_sql = "SELECT password FROM users WHERE qyj_id=$qyj_id";
// 进行数据库查询
$check_pass_sql_result = mysqli_query($mysql_connect,$check_pass_sql);
// 处理查询数据
$sql_result = mysqli_fetch_assoc($check_pass_sql_result);
// 进行密码对比
if ($old_pass == $sql_result['password']){
    // 更改数据
    $update_pass_sql = "UPDATE users SET password='$new_pass' WHERE qyj_id=$qyj_id";
    // 进入数据库执行
    $update_pass_sql_result = mysqli_query($mysql_connect,$update_pass_sql);
    if($update_pass_sql_result){
        $change_result = 1;
    }
}
// 输出结果
echo $change_result;
// 关闭数据库连接
mysqli_close($mysql_connect);

?>
