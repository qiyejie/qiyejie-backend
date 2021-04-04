<?php
include('../config.php'); //配置数据库信息
$registerResult = "None"; //初始化返回状态
$jsonContent = json_decode(file_get_contents("php://input"), true);
$nickname = $jsonContent['username'];
$password = md5($jsonContent['password']);
$qyjBackendSql = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$qyjBackendSql) {
    die('Connect Error:' . mysqli_error($qyjBackendSql));
}

$sqlCheckRegist = "select * from user where nickname='$nickname'";

$sqlUserInsert = "INSERT INTO user " .
    "(nickname,password) " .
    "VALUES " .
    "('$nickname','$password')";
if ($nickname) {
    $checkRegistResult = mysqli_query($qyjBackendSql,$sqlCheckRegist);
    if(mysqli_num_rows($checkRegistResult) > 0){
        die('此用户名已被注册');
    }else{
        $sqlReturnValue = mysqli_query($qyjBackendSql, $sqlUserInsert);
        if (!$sqlReturnValue) {
            die('Insert Error: ' . mysqli_error($qyjBackendSql));
        }else{
	    $registerResult = "注册成功";
        }
    }

}
mysqli_close($qyjBackendSql);
echo $registerResult;
?>