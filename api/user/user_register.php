<?php
error_reporting(0);
include("../../config.php");
function getId()
{
    // 生成qyj_id
    $check_id_sql = "SELECT qyj_id FROM users WHERE qyj_id=$qyj_id";
    while (true) {
        $qyj_id = time()*mt_rand(1, 9);
        $check_id_sql_result = mysqli_query($GLOBALS['mysql_connect'], $check_id_sql);
        if (!$check_id_sql_result) {
            return $qyj_id;
            break;
        }
    }
}
function OnRegister($user_email)
{
    $select_sql = "SELECT email FROM users WHERE email='$user_email'";
    $select_sql_result = mysqli_query($GLOBALS['mysql_connect'], $select_sql);
    $row = mysqli_num_rows($select_sql_result);
    if($row > 0){
        die(json_encode(array("code"=> 0,"message"=>"邮箱已被注册")));
    }else{
        $qyj_id = getId();
        return $qyj_id;
    }
}

// 初始化返回信息
$code = 0;
// 处理传入的信息
$user_email = $_POST['email'];
$user_password = $_POST['password'];
$sign_in_time = date("Y-m-d H:i:s");
$qyj_id = OnRegister($user_email);
// 构造数据库插入语句
$insert_sql = "INSERT INTO users (qyj_id,email,password,sign_in_time) VALUES ('$qyj_id','$user_email','$user_password','$sign_in_time')";

// 数据库进行插入操作
$insert_sql_result = mysqli_query($mysql_connect, $insert_sql);
// 返回插入结果
if ($insert_sql_result) {
    $code = 1;
} else {
    die("系统异常:".mysqli_error($mysql_connect));
}
// 处理返回数组
$return_array = array("code"=>$code,"qyj_id"=>$qyj_id,"message"=>"注册成功");
// 关闭数据库连接
mysqli_close($mysql_connect);
// 返回注册结果
echo json_encode($return_array);
?>