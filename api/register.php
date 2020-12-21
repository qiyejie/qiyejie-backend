<?php
include('config.php');
$jsonContent = json_decode(file_get_contents("php://input"), true);
$nickname = $jsonContent['username'];
$password = $jsonContent['password'];

$qyjBackendSql = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if ($qyjBackendSql) {
    die('Connect Error:' . mysqli_error($qyjBackendSql));
} else {
    echo "Mysql Connect Successfully";
}
$sqlUserInsert = "INSERT INTO user " .
    "(nicknme,password) " .
    "VALUES " .
    "('$nickname','$password')";
$retval = mysqli_query($qyjBackendSql, $sqlUserInsert);
if (!$retval) {
    die('Insert Error: ' . mysqli_error($qyjBackendSql));
}
echo "Insert Successfully\n";
mysqli_close($qyjBackendSql);
?>