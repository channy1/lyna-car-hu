<?php
$project_name = '/Trial-Version-1.2/trial-version-1.2/';
function _base_url(){
    global $project_name;
    return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $project_name
    //   $_SERVER['REQUEST_URI']
    );
}


$base_url = _base_url();
// $base_url='http://localhost';
// $base_url='http://Lyna-CarRental.Com/Trial-Version-1.2';
$host_name = 'localhost';
$database = 'savongz_trial_version';
$user_name = 'savongz_trial';
$password = 'N3}KS7Jj)]l7';
$connect = new mysqli($host_name, $user_name, $password, $database);

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    mysqli_set_charset($connect,"utf8");
	@session_start();
	ob_start();
	date_default_timezone_set("Asia/Bangkok");
}
?>
