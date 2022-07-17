<?php
/*$host_name = 'localhost';
$database = 'lyna_system_db';
$user_name = 'root';
$password = '';*/
$host_name = 'localhost';
$database = 'savongz_carnew';
$user_name = 'savongz_carnew';
$password = 'jQ(g99FCGlYB';
$connect = new mysqli($host_name, $user_name, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}else{
	mysqli_set_charset($connect,"utf8");
	session_start();
	ob_start();
	date_default_timezone_set("Asia/Bangkok");
}
?>

