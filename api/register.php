<?php
include('config.php');
$jsonContent = json_decode(file_get_contents("php://input"), true);
$nickname = $jsonContent['username'];
$password = $jsonContent['password'];
$qyjBackendSql = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$qyjBackendSql) {
    die('Connect Error:' . mysqli_error($qyjBackendSql));
}
$sqlUserInsert = "INSERT INTO user " .
    "(nicknme,password) " .
    "VALUES " .
    "('$nickname','$password')";
$sqlReturnValue = mysqli_query($qyjBackendSql, $sqlUserInsert);
if (!$sqlReturnValue) {
    die('Insert Error: ' . mysqli_error($qyjBackendSql));
}else{
	$registerResult = "Success";
}
mysqli_close($qyjBackendSql);
echo $registerResult;
?>