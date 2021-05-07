<?php
header('Access-Control-Allow-Origin:*');
$db_host = "localhost";
$db_user = "backend";
$db_pass = "qiyejie";
$db_name = "backend";
echo "config";
$mysql_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

?>
