<?php 
     ob_start();
?>
<style>
    @media only screen and (max-width: 768px) and (min-width:412px){
     .panel h3{font-size: 14px !important;} 
     .btn-sm{margin-top: -20px !important;}
        
    }
@media only screen and (max-width: 411px) and (min-width:370px){
 .panel h3{font-size: 12px !important;} 
     .btn-sm{margin-top: -16px !important;}
         
     }
@media only screen and (max-width: 360px) and (min-width:320px){
.panel h3{font-size: 10px !important;} 
     .btn-sm{margin-top: -12px !important;font-size:6px !important;}
</style>


<?php
    include_once './system/config/database.php';
    // logout
    if(isset($_GET['action'])){
      if($_GET['action'] == "logout"){
        session_destroy();
        header("location: customer_login.php");
      }
    }
    // register success
    if(@$_GET['sms']=='register_success'){
      $sms = '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success!</strong> register successfull. Please Login to System ...
      </div>';
    }
    if(@$_GET['sms']=='reset_password_success'){
      $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> Reset password successfull. Please Login to System ...
          </div>';
    }
    // Login information
    if(isset($_POST['btn_login'])){
      $username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
      $password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
      $stm = "SELECT * FROM tbl_users WHERE user_name='".$username."' AND user_password='".$password."' AND user_position = 4";
      $user = $connect->query($stm);
  
      if(mysqli_num_rows($user)==1){

        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";
        // header("location: system/customer/dashboard/admin.php");
         header("Location: customer/index.php");
  
      }else{
        $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> invalid account ...
            </div>';
      }
    }
?>
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
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );
    </script>
    <!-- boostrap 4 -->

    <!-- Java script for web -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./bootstrap337/js/bootstrap.js"></script>
    <script src="./bootstrap337/js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>
</head>
<body style="background-color:  #f2f2f2; padding: 0px; margin: 0px;">
<div style="position: fixed; width: 100%; margin-top: -10px; padding: 0px; z-index: 500;">
    <?php include_once("./menu_authentication.php") ?>
</div>
<!-- container section -->
  <div class="container p-5 ">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
       <div class="panel panel-default" style=margin-top:130px;>
       		<div class="panel-heading text-center" style="box-shadow:2px 2px 2px 0px #ccc">
       			<h3 id="title_login">Login as Customer</h3>
             <a href="./partner_login.php" class="btn btn-sm"
        style="float: right; margin-top: -27px;color: white; background-color: #ec3323;">Switch to Partner</a>
       		</div>
			<div class="panel-body" style=" color: #ec3323 !important;box-shadow:2px 2px 2px 0px #ccc">
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
          <?= @$sms ?>
          <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                    <label for="username" style="color: #000; text-transform: capitalize;">Username***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #000;"></i></span>
                        <input id="username" style="color: #000;" type="text" class="form-control" name="txt_login_username" placeholder="Your Username" required>
                    </div>
                  </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="pwd" style="color:#000; text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:#000;"></i></span>
                    <input style="color: #000;" id="password" type="password" class="form-control" name="txt_login_password" placeholder="Your Password" required>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                     <label for="email" style="color: white;">Login to Dashboard</label>
                    <button class="form-control" style="background-color: #ec3323; color: white; " type="submit" name="btn_login">SIGN IN <i class="fa fa-sign-in"></i></button>
                  </div>
            </div>
            <div class="col-sm-12">
            <br>
                <p class="text-center">Don't have an account yet? Please
                <a style="color: #ec3323;" href="./register_customer_account.php"><u> Register</u></a>  !<br>Or
                <a class="text-center" style="color: #ec3323;" href="./forget_account.php"><u>Forget password</u></a></p>
            </div>
          </div><br>
          <p class="text-center hidden">Or Login with social media.</p>
          <div class="row hidden">
            <div class="col-lg-8" style="margin: auto;">
              <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #3B5998;">
                <i class="fa fa-facebook"></i> Login with Facebook
              </a>
              <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #55ACEE;">
                <i class="fa fa-twitter"></i> Login with Twitter
              </a>
                <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #dd4b39;"><i class="fa fa-google-plus">
                  </i> Login with Google+
                </a>
            </div>
          </div>
        </form>
			</div>
       </div>
  </div>
  <div class="col-sm-3"></div>
</div>
<?php require_once("footerpartner.php"); ?>
