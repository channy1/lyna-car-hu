<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lyna Car Rental</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./bootstrap337/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="./bootstrap337/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
	<!--<link rel="stylesheet" href="./css/menus.css" type="text/css">
    <link rel="stylesheet" href="./css/registermenu.css" type="text/css">
    <link rel="stylesheet" href="./css/tabviews.css" type="text/css"> -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
  	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
    <!-- boostrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
    <!-- style sheet for footer -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="template/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="template/style.css" type="text/css" />
    <link rel="stylesheet" href="template/css/colors.css" type="text/css" />
    <link rel="stylesheet" href="template/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="template/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="template/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="template/css/responsive.css" type="text/css" />
    <link rel="stylesheet" href="template/custom.css" type="text/css" />
    <script type="text/javascript" src="template/js/jquery.js"></script>
    <script type="text/javascript" src="template/js/plugins.js"></script>

    <!-- Java script for web -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./bootstrap337/js/bootstrap.js"></script>
    <script src="./bootstrap337/js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>
</head>
<style>
    .box-shadow-css {
        border: 1px solid rgba(20,23,28,0.1);
        /* box-shadow: 0px 0px 10px lightgray; */   
        box-shadow: 0 0 1px 1px rgba(20,23,28,0.1);
    }
    #panel-package {
        transition: .5s;
        padding: 20px;
        text-align: center;
        color: #a4509f !important;
        border: 1px solid #a4509f;
    }
    #panel-package .btn-select{
        background-color: #a4509f;
        color: white;
        font-weight: bold;
        border: 1px solid white;
    }
    #panel-package .btn-select:hover{
        background-color: white;
        animation-direction: alternate;
        color: #a4509f;
        font-weight: bold;
        transition: .4s;
        border:none;
    }
    #panel-package:hover{
        transition: .5s;
        border: none;
        cursor: pointer;
        background-color: #a4509f;
        color: white !important;
        /* box-shadow: 0px 0px 10px lightgray; */   
        box-shadow: 0 0 5px 2px rgba(20,23,28,0.1);
    }
    /* #panel-package:hover h3 {   
        color: #a4509f;
        transition: .4s;
    } */
    #panel-package #title{
        text-align: center;
        background-color: #a4509f;
        color: white;
        border-radius: 5px;
        padding: 15px;
        margin: -10px;
        font-size: 1.7rem;
        font-weight: bold;
    }
    #panel-package p{
        line-height: 50%;
    }
        /* The Modal (background) */
    .modals {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 130px; /* Location of the box */
        left: 0;
        top: 0;
        border-radius: 10px 10px 10px 10px;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-contents {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border-radius: 10px 10px 10px 10px;
        border: 1px solid #888;
        width: 60%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0} 
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    /* The Close Button */
    .close {
        color: lightgray;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-headers {
        text-align: center;
        padding: 2px 16px;
        border-radius: 10px 10px 0px 0px;
        border-bottom: 1px solid lightgray;
        background-color: white;
        color: white;
    }

    .modal-bodys {
        padding: 20px;
    }
    .tab-active {
        background-color: #a4509f;
        color: white;
    }
    body {
        background-image: url("./images/backgroundhome.jpg");
        background-attachment: fixed;
        background-position: top;
        background-size: cover;
    }
    #bodys {
        background-image: url("./images/backgroundhome.jpg");
        background-attachment: fixed;
        background-position: top;
        background-size: cover;
    }
</style>
<body style=" padding: 0px; margin: 0px;">
<div style="position: fixed; width: 100%; margin-top: -10px; padding: 0px; z-index: 500;">
	<div class="panel panel-heading" style=" padding: 0px; margin-top: -10px;">	
		<div class="container" >
			  <div class="" style=" margin-top: 15px;">
	            <div class="pull-left">
	                <div style="float: left;">
	                    <div>
	                    <img style="float: left; width: 70px; height: 70px;" src="./images/logo.png" alt="logo left">
	                    </div>
	                    <div>
	                        <h4 style="color:#a4509f ;float: left; margin-top: -60px; margin-left: 80px;"><b>លីណា​-ជួលរថយន្តទេសចរណ៍</b><br>Lyna-CarRental.Com</h4>
	                    </div>
	                </div>
	            </div>
	            <div class="pull-right" style="margin-top: 20px; float: left; display: inline;">
	            	<h5>
                        <!-- <a style="color: #a4509f;" href="./account_type_login.php">Login </a>	 Or 
	            		<a style="color: #a4509f;" href="./account_type_register.php"> Register</a>  -->
	            		<a style="color: #ffffff;" href="./index.php">
                    <button style="margin-left: 20px ;background-color: #a4509f" type="button" class="btn btn-sm btn-success">
	            			  HOME
                    </button>
                  </a>
                </h5>
	            </div>
	        </div>
		</div>		
	</div>
</div>