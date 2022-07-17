<?php
    include_once './system/config/database.php';
    // logout
    if(isset($_GET['action'])){
      if($_GET['action'] == "logout"){
        session_destroy();
        header("location: admin_login.php");
      }
    }
    // Login information
    if(isset($_POST['btn_login'])){
      $username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
      $password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
      $stm = "SELECT * FROM tbl_user WHERE user_name='".$username."' AND user_password='".$password."' AND user_position = 1";
      $user = $connect->query($stm);
      if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";
        //header("location: system/admin/dashboard/admin.php");
        header("location: admin");
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
  <div class="container p-5">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
       <div class="panel panel-default"style=margin-top:130px;>
       		<div class="panel-heading text-center" style="box-shadow:2px 2px 2px 0px #ccc">
       			<h3 id="title_login">Admin Login</h3>
       		</div>
			<div class="panel-body" style=" color: #a4509f !important;">
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
                  <label for="pwd" style="color: #000; text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #000;"></i></span>
                    <input style="color: #000;" id="password" type="password" class="form-control" name="txt_login_password" placeholder="Your Password" required>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-center" style="margin-top: 20px;">
                  <button type="submit" class="btn btn-md "  name="btn_login" style="background-color:#ec3323; color: white;width:100px;">Sign In</button>
                  <a href="./index.php">
                      <button type="reset" class="btn btn-md "  style="background-color: orange ; color: white;width: 100px;">Cancel</button>
                  </a>
              </div>
          </div>


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
