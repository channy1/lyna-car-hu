<?php

// $base_url="http://www.lyna-carrental.com/Trial-Version-1.2/";
// // echo dirname(__FILE__);
// $directory_path="/home/ep2y1514o894/public_html/Trial-Version-1.2/admin";
// $img_path ="http://www.lyna-carrental.com/Trial-Version-1.2/system/admin/image/";
// $inner_directory_path ="/home/ep2y1514o894/public_html/Trial-Version-1.2/system/admin/image/";
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