<?php

// $base_url="http://choicecart.xyz/carrental/";
// echo dirname(__FILE__); auto coment 
// $directory_path="/home/ep2y1514o894/public_html/carrental/admin";
// $img_path ="http://choicecart.xyz/carrental/system/admin/image/";
// $inner_directory_path ="/home/ep2y1514o894/public_html/carrental/system/admin/image/";


// $base_url = "http://www.lyna-carrental.com/Trial-Version-1.2/";
// $directory_path="/home/ep2y1514o894/public_html/admin";
// $img_path ="http://www.lyna-carrental.com/Trial-Version-1.2/system/admin/image/";
// $inner_directory_path ="/home/ep2y1514o894/public_html/carrental/system/admin/image/";

$project_name = '/Trial-Version-1.2/trial-version-1.2/';
function base_url(){
    global $project_name;
    return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $project_name
    //   $_SERVER['REQUEST_URI']
    );
}

$base_url = base_url();
$directory_path = $_SERVER['DOCUMENT_ROOT'].$project_name.'admin';
$img_path = base_url()."system/admin/image/";
$inner_directory_path =  $_SERVER['DOCUMENT_ROOT'].$project_name.'system/admin/image/';

?>