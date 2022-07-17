<?php
    //ob_start();
    include_once './system/config/database.php';

    // need check position of user
    // if(@$_SESSION['allowLog']=="logAlready"){
    //     if(@$_SESSION['user']->user_position == 1){
    //       header("location: system/admin/dashboard/admin.php");
    //     }else if(@$_SESSION['user']->user_position == 2){
    //       header("location: system/admin/dashboard/customer_admin.php");
    //     }else{
    //       header("location: system/admin/dashboard/partner_admin.php");
    //     }
    // }

    // logout
    if(isset($_GET['action'])){
      if($_GET['action'] == "logout"){
        session_destroy();
        // header("Refresh:0; url=login_account.php");
        header("location: partner_login.php");
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
		$login_type = trim($connect->real_escape_string(@$_POST['login_type']));
		// $enctypt_password = sha1(md5($pass)).sha1("0962195196");

		$stm = "SELECT * FROM tbl_users WHERE user_name='{$username}' AND user_password='{$password}' AND user_position = 5"; 	
		
		
		//echo "<pre>"; print_r($stm); echo "</pre>"; exit;
      $user = $connect->query($stm);
      var_dump($password);
      mysqli_error($user);
      

      if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";

        // echo $_SESSION['user']->user_email  ** example when u want to user session
        //header("location: system/partner/dashboard/partner_admin.php");
        header("location: partner");
 
      }else{
        $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> invalid account ...
            </div>';
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
    <title>Lyna-CarRental</title>
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
      <!--  <div style="height: 210px; width: 100%">
       </div> -->
       <div class="panel panel-default" style=margin-top:130px;>
       		<div class="panel-heading text-center" style="box-shadow:2px 2px 2px 0px #ccc">
       			<h3 id="title_login">Login as Partner</h3>
                   <a href="./customer_login.php" class="btn btn-sm"
        style="float: right; margin-top: -27px;color: white; background-color: #ec3323;">Switch to Customer</a>
       		</div>
			<div class="panel-body" style=" color: #ec3323 !important;box-shadow:2px 2px 2px 0px #ccc">
				<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
          <?= @$sms ?>
          <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                    <label for="username" style="color: #000; text-transform: capitalize;">Username***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #000;"></i></span>
                        <input id="username" style="color: #000;" type="text" class="form-control"
                         name="txt_login_username" placeholder="Your Username" required>
                    </div>
                  </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="pwd" style="color: #000; text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #000;"></i></span>
                    <input style="color: #000;" id="password" type="password" class="form-control"
                    name="txt_login_password" placeholder="Your Password" required>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                 <label for="account_type" style="color: #000;">Account Type***</label>
                 <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-circle-o" style="color: #000;"></i></span>
                  <select name="login_type" onchange="OnChangeSelect()" class="form-control" style="color: #a4509f;" id="account_type" required>
                    <option value="1">CAR'S OWNER</option>
                    <option value="2">RICKSHAW'S OWNER</option>
                    <option value="tour_guide">TOUR GUIDE</option>
                    <option value="driver">DRIVER</option>
                    <option value="hotel_guesthouse">HOTEL & GUESTHOUSE</option>
                    <option value="freelancer">INTRODUCER</option>
                  </select>
                 </div>
                </div>
                <script type="text/javascript">
                  function OnChangeSelect(){
                      var cut = document.getElementById("account_type");
                      var title = document.getElementById("title_login");
                      var index = cut.selectedIndex;
                      if(index == 0){
                          title.innerHTML = "Login as Car's Owner";
                      }
                      if(index == 1){
                          title.innerHTML = "Login as Rickshaw's Owner";
                      }
                      if(index == 2){
                          title.innerHTML = "Login as Tour Guide";
                      }
                      if(index == 3){
                          title.innerHTML = "Login as Driver";
                      }
                      if(index == 4){
                          title.innerHTML = "Login as Hotel & Guesthouse";
                      }
                      if(index == 5){
                          title.innerHTML = "Login as Introducer";
                      }
                  }
                </script>
              <p class="text-center">Which account type are you holding? Please select above...!</p>
              </div>

              <div class="col-sm-6">
                  <div class="form-group">
                     <label for="email" style="color: white;">Login to Dashboard</label>
                    <button class="form-control" style="background-color: #ec3323; color: white; " type="submit" name="btn_login">SIGN IN <i class="fa fa-sign-in"></i></button>
                  </div>

             <p class="text-center">Don't have an account yet? Please
              <a style="color: #ec3323;" href="./register_partner_account.php"><u> Register</u></a>  !<br>Or
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


<!-- finished container section -->

<!-- inlcude footer buttom -->
<?php require_once("footerpartner.php"); ?>
