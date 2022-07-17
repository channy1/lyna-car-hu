<?php 
    include_once './system/config/database.php';

    // if(@$_SESSION['allowLog']=="logAlready"){
    //     if(@$_SESSION['user']->user_position == 1){
    //       header("location: system/admin/dashboard/admin.php");
    //     }else if(@$_SESSION['user']->user_position == 2){
    //      header("location: system/admin/dashboard/customer_admin.php");
    //     //  header("location: index.php");
    //     }else{
    //       header("location: system/admin/dashboard/partner_admin.php");
    //     }
    // }

    // logout
    if(isset($_GET['action'])){
      if($_GET['action'] == "logout"){
        session_destroy();
        // header("Refresh:0; url=login_account.php");
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

    // Login information 
    if(isset($_POST['btn_login'])){
      $username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
      $password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
      // $enctypt_password = sha1(md5($pass)).sha1("0962195196");

      $stm = "SELECT * FROM tbl_users WHERE user_name='{$username}' AND user_password='{$password}' AND user_position = 11 AND user_status=1";
      $user = $connect->query($stm);

      if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";
      // $stm = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_password='{$password}'";

      // $user = $connect->query($stm);
      // mysqli_error($user);
      // $sms = '<pre>'.mysqli_fetch_assoc($user).'</pre>';
      // if(mysqli_num_rows($user)==1){
      //   $user_data = mysqli_fetch_object($user);
      //   $_SESSION['user'] = $user_data;
      //   $_SESSION['allowLog'] = "logAlready";
      //   echo '<script>alert('.$_SESSION['user']->user_photo.');</script>';
        // echo $_SESSION['user']->user_email  ** example when u want to user session
        if(@$_SESSION['user']->user_position ==11){
          header("location: system/introduct_user/dashboard/admin.php");
          
          //header("location: system/admin/dashboard/customer_admin.php");
        }
      }else{
        $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> invalid account ...
            </div>';
            // $sms = '<pre>'.mysqli_fetch_assoc($user).'</pre>';
      }
    }
    // mysqli_close($connect);
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
	<!--<link rel="stylesheet" href="./css/menus.css" type="text/css">
    <link rel="stylesheet" href="./css/registermenu.css" type="text/css">
    <link rel="stylesheet" href="./css/tabviews.css" type="text/css"> -->
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
<body style="background-color:  #f2f2f2; padding: 0px; margin: 0px;">
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
	            	<h5><a style="color: #a4509f;" href="./account_type_login.php">Login </a>	 Or 
	            		<a style="color: #a4509f;" href="./account_type_register.php"> Register</a> 
	            		<button style="margin-left: 20px ;background-color: #a4509f" type="button" class="btn btn-sm btn-success">
	            			<a style="color: #ffffff;" href="./index.php">HOME</a></button></h5>
	            </div>
	        </div>
		</div>		
	</div>
</div>
<!-- container section -->
  <div class="container" style="margin-top: 10px; padding-top: 100px; color: #a4509f !important; ">
      <!--  <div style="height: 210px; width: 100%">
       </div> -->
       <div class="panel panel-default" style="color: #a4509f !important;">
       		<div class="panel-heading text-center">
       			<h3 id="title_login" style="padding-top: 0px; margin: -5px; color: #a4509f;">Login as Introduct</h3>
             <a href="./partner_login.php" class="btn btn-sm" 
        style="float: right; margin-top: -27px;color: white; background-color: #a4509f;">Switch to Partner</a> 
       		</div>
			<div class="panel-body" style="padding: 50px 100px 50px 100px; color: #a4509f !important;">
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
          <?= @$sms ?>
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f; text-transform: capitalize;">User Name***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="txt_login_username" placeholder="Your Username" required>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f; text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="password" type="password" class="form-control" name="txt_login_password" placeholder="Your Password" required>
                  </div>
                </div>  
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">   
                     <label for="email" style="color: white;">Login to Dashboard</label>
                    <button class="form-control" style="background-color: #a4509f; color: white; " type="submit" name="btn_login">SIGN IN <i class="fa fa-sign-in"></i></button>
                  </div>
            </div>
            <div class="col-sm-6">
            <br>
                <p class="text-center">Don't have an account yet? Please 
                <a style="color: #a4509f;" href="./register_customer_account.php"><u> Register</u></a>  !<br>Or 
                <a class="text-center" style="color: #a4509f;" href="./forget_account.php"><u>Forget password</u></a></p>
            </div>
          </div><br>
          <p class="text-center">Or Login with social media.</p>
          <div class="row">
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


<!-- finished container section -->

<!-- inlcude footer buttom -->
<?php require_once("footerpartner.php"); ?>