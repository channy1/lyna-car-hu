<?php $directory = ""; ?>
<!DOCTYPE html>
<!--
    
    COPY RIGHT @ 2018 BY NEW DAY TECHNOLOGY

-->
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= @$layout_title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for blank page layout" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon"/>
        
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <!-- <link href="../../assets/global/css/components-rounded.css" rel="stylesheet" id="style_components" type="text/css" /> -->
        <link href="../../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        
        <!-- bootstrap select -->
        <link rel="stylesheet" href="../../assets/global/plugins/bootstrap-select-1.12.4/css/bootstrap-select.min.css">
        <!-- end bootstrap select -->
        <link rel="stylesheet" href="../../css/menutopcustome.css" type="text/css">
        <link rel="shortcut icon" href="favicon.ico" /> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top" style="background-color: #a4509f !important;">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo" style="display: flex; justify-content: spance-bettwen;width:500px">
                    
                    <div class="menu-toggler sidebar-toggler" style="color: #a4509f;">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
					
					
					
					<div style="margin-left:200px">
                        <a href="../../index.php">
                            <img src="../../../images/logo.png" width="50px" alt="logo" 
                            style="margin-top: 10px; margin-left: -10px;" 
                            class="logo-default" /> 
                        </a>
                    </div>
					
					
					
					
                    <div class="logo-default" style="margin-top: 18px; margin-left:-5px; margin-right: 10px;"> 
                        <p class="text-default" style="font-size: 13px; color: white;">លីណាជួលរថយន្តទេសចរណ៍<br>Lyna CarRental.Com</p>
                    </div>
					
                </div>
                <!-- END LOGO -->
                
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->

                <!-- changing dynamic left navbar section -->
                <?php
                    // die($_SESSION['user']->user_position);
                    if(@$_SESSION['user']->user_position == 1){
                        include_once('top_navigation_admin.php'); 
                    }else if(@$_SESSION['user']->user_position == 2){
                        include_once('top_navigation_user.php'); 
                    }else {
                        include_once('top_navigation_partner.php');
                    }
                ?>
                <!-- finished changing dynamic left navbar section -->
                <!-- END PAGE ACTIONS -->
                <script src="../../js/custometopmenu.js"></script>
                <!-- BEGIN PAGE TOP -->
                <div class="page-top" style="background-color: #a4509f !important;">
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right" style="background-color: #a4509f !important;">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user dropdown-dark" style="background-color: #a4509f !important;">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <small><i class="fa fa-circle" style="color: lightgreen;"></i></small>
                                    <span class="username username-hide-on-mobile"> <?= @$_SESSION['user']->user_name ?> </span>

                                    <!-- // display img from different folder according to user position -->
                                    <?php 
                                        $user_id_from_login = @$_SESSION['user']->user_id;
                                        $stmt = "SELECT * FROM tbl_relationship_users_position WHERE user_id='{$user_id_from_login}'";
                                        $user = $connect->query($stmt);
                                        $directory = "img_customer"; 
                                        // mysql_error($user);
                                        // mysqli_error($user);
                                        if ($user){
                                            // Fetch one and one row
                                            while ($row=mysqli_fetch_row($user))
                                            {
                                                if($row[1] == 1 && @$_SESSION['user']->user_position == 1){
                                                    $directory = "img_customer";
                                                }else if($row[1] == 2 && @$_SESSION['user']->user_position == 2){
                                                    $directory = "img_customer";
                                                }else{
                                                    $directory = "img_partner";    
                                                }
                                            }
                                            // Free result set
                                        }else{
                                            $directory = "img_customer";  
                                        }
                                     
                                    // <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                        echo '<img width="40px" height="70px" alt="" class="img-circle" src="../../img/'.$directory.'/'. trim(@$_SESSION['user']->user_photo) .'" /> </a>';
                                    ?>
                                    <ul class="dropdown-menu dropdown-menu-default" style="background-color: #a4509f !important;">
                                    <?php
                                        if(@$_SESSION['user']->user_id == 5){
                                            echo '<li>
                                                <a href="../user/">
                                                    <i class="icon-user"></i> User Managment</a>
                                            </li>
                                            <li class="divider"> </li>';
                                        }
                                    ?>
                                    <?php 
                                        if(@$_SESSION['user']->user_position == 1){
                                            echo '<li>
                                                    <a href="../dashboard/admin.php">
                                                    <i class="fa fa-user"></i> User Profile
                                                </a></li>';
                                           
                                        }else if(@$_SESSION['user']->user_position == 2){
                                            echo '<li>
                                                    <a href="../dashboard/customer_admin.php">
                                                    <i class="fa fa-user"></i> User Profile
                                                </a></li>';
                                        }else{
                                            echo '<li>
                                                    <a href="../dashboard/partner_admin.php">
                                                    <i class="fa fa-user"></i> User Profile
                                                  </a></li>';
                                        }
                                    ?>
                                    <!-- should check partner logout one more -->
                                    <li>
                                        <a href="../../../customer_login.php?action=logout">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            
            <!-- BEGIN SIDEBAR -->
            <?php

                // if(@$_SESSION['user']->user_position == 1 && @$_SESSION['user']->user_position == 2){
                //     include_once getcwd().'/left_navigation.php';
                // }else {
                //     include_once getcwd().'/left_navigation_partner.php';
                // }
                // die($_SESSION['user']->user_position);
                if(@$_SESSION['user']->user_position == 1){
					include_once('left_navigation_newadmin.php'); 
                    //include_once(getcwd().'/left_navigation_admin.php'); 
                }else if(@$_SESSION['user']->user_position == 2){
                    include_once(getcwd().'/left_navigation_customer.php'); 
                }else {
                   // include_once(getcwd().'/left_navigation_partner.php');
                }
            ?>
            <!-- END SIDEBAR -->
            
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <style type="text/css">
            .dataTables_length label {
                                    text-transform: capitalize;
                            }
            .portlet h2{
                font-weight:600;
            }
            </style>