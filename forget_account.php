<?php
    include_once './system/config/database.php';
    if(isset($_POST['btn_reset_pwd'])){
      $email = trim($connect->real_escape_string(@$_POST['email']));
      $password = trim($connect->real_escape_string(@$_POST['password']));
      $comfirm_pwd = trim($connect->real_escape_string(@$_POST['confirm_password']));
      if($comfirm_pwd != $password) {
        $sms = '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Password confirm not match!.
                  </div>';
      }else {
        $query = "SELECT * FROM tbl_users WHERE user_email='".$email."'";
        $user = $connect->query($query);
        if(mysqli_num_rows($user)== 1){
            $query = "UPDATE tbl_users set user_password = '".$password."' where user_email = '".$email."'";
            if($connect->query($query)){
              header("location: customer_login.php?sms=reset_password_success");
            }else{
              $sms = '<div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Error!</strong> Please, Enter the correct e-mail address!.
                      </div>';
          }
          mysqli_close($connect);
        }else {
          $sms = '<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Please, Enter the correct e-mail address!.
                  </div>';
        }
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
<br/><br/>
<!-- container section -->
  <div class="container" style="margin-top: 10px; padding-top: 100px; color: #a4509f !important; ">
      <!--  <div style="height: 210px; width: 100%">
       </div> -->
       <div class="panel panel-default" style="color: #a4509f !important;">
        <div class="panel-body" style=" color: #a4509f !important;">
          <form  action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
            <?= @$sms ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="email" style="color: #a4509f; text-transform: capitalize;">E-mail address</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                            <input id="email" style="color: #a4509f;" type="text" class="form-control" name="email" placeholder="yourname@gmail.com" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="pwd" style="color: #a4509f; text-transform: capitalize;">Password***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                        <input style="color: #a4509f;" id="password" type="password" class="form-control" name="password" placeholder="Your Password" required>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="pwd" style="color: #a4509f;text-transform: capitalize;">Confirm Password***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                        <input style="color: #a4509f;" id="confirm_password" type="password" class="form-control" name="confirm_password" placeholder="Your Confirm Password" required>
                    </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-md "  name="btn_reset_pwd" style="background-color: #a4509f; color: white;width:100px;">Save</button>
                    <button type="reset" class="btn btn-md "  style="background-color: orange ; color: white;width: 100px;">Cancel</button>
                </div>
            </div>
          </form>
        </div>
       </div>
  </div>
<br/>

<!-- finished container section -->

<!-- inlcude footer buttom -->
<?php require_once("footerpartner.php"); ?>
