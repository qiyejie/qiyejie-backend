<?php
$mysql_connect = mysqli_connect(host, username, password, dbname,port, socket);
if (!mysql_connect){
	die('mysql_connect error')
}
?>

