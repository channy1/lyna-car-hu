<!-- header included  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php

  include_once("./menu_authentication.php") ;
  if(@$_GET['sms']=='register_faild'){
    $sms = '<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Error!</strong> Username or email already in use!.
          </div>';
  }
?>
<!-- container section -->
<div class="container top_mobile" style="margin-top: 10px; padding-top: 60px; color: #a4509f !important; ">
   <div class="panel panel-default" style="color: #a4509f !important;">

       <div class="row py-3">
           <div class="col-md-9 col-sm-12"><div class="panel-heading text-center">
        <h3 id="title_customer">
        Customer Registration Form - Self Registration</h3>

      </div></div>
           <div class="col-md-3 col-sm-12"><a href="./register_partner_account.php" class="btn btn-sm"
        style="color: white; background-color: #a4509f;">Switch to Partner</a></div>

       </div>

      <div class="panel-body" style="color: #a4509f !important;">
      <legend style="color: #a4509f;" class="text-center">Please Fill-in Your Information</legend>
        <form action="./upload_user_file.php" method="post" role="form" enctype="multipart/form-data">
          <!-- row radio button for checking register throught -->
          <?= @$sms ?>
          <div class="row my-5">
             <!--<div class="col-md-3">
            </div>-->
            <div class="col-md-4 text-center">
               <div onclick="changeYourself()" class="text-center"style=" text-transform: capitalize ;margin: auto;">
                <h5 class="tab-active" id="yourself"
                style="cursor: pointer;border: 1px solid #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;"><span><i class="fas fa-address-card"> </i> </span> SELF-REGISTRATION</h5>
            </div>
                 </div>
              <div class="col-lg-4">
                  <p class="text-center pt-3" style="text-align:center !important">===== OR =====</p>
              </div>

              <div class="col-md-4 text-center">
                 <div onclick="changeIntroducer()" class="text-center" style=" text-transform: capitalize ;margin: auto;">
                <h5 id="introducer" style="cursor: pointer;border: 1px solid #a4509f; color: #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;"><span><i class="fas fa-address-card"> </i> </span> THRU INTRODUCER</h5>
            </div>   </div>


             <!--<div class="col-md-3">
            </div>-->
          </div>
          <input type="hidden" id="register_seft_thru" value="1" name="register_seft_thru">
          <div class="row">
            <!-- <div onclick="changeYourself()" class="col-lg-4 text-center"style=" text-transform: capitalize ;margin: auto;">
                <h5 class="tab-active" id="yourself"
                style="cursor: pointer;border: 1px solid #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;">SELF-REGISTRATION</h5>
            </div> -->
           <!--  <div class="col-lg-4">
              <p class="text-center pt-3">===== OR =====</p>
            </div> -->
           <!--  <div onclick="changeIntroducer()" class="col-lg-4 text-center" style=" text-transform: capitalize ;margin: auto;">
                <h5 id="introducer" style="cursor: pointer;border: 1px solid #a4509f; color: #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;">THRU INDRODUCER</h5>
            </div> -->
          </div>
          <!-- introducer and yourself row -->

          <div id="showyourself"class="row">
            <div class="col-sm-4">
              <div class="form-group" id="your_id">
                <label style="color: #a4509f;  text-transform: capitalize;">Your ID N&deg; : <span id="customer_card"><?php echo 'CU'.date("Ymd").''.rand(10,1000000); ?></span></label>
                <div class="input-group">
                      <span onclick="change()" class="input-group-addon"><i class="fa fa-id-card" style="color: #a4509f;"></i></span>
                      <input required style="color: #a4509f;" class="form-control"
                      name="customer_id_no" id="customer_id_no" placeholder="Click Here to get your ID No." type="text" value="">
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <label for="">  </label>
              <p class="text-center pt-4" style="font-size: 14px;">*Note: Please always remember your ID N&deg;</p>
            </div>
            <div class="col-sm-4">
              <div id="byintroducer" style="color: #a4509f; display: none;" class="form-group introducer">
                <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Introducer's ID N&deg;</label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-id-card" style="color: #a4509f;"></i></span>
                      <input style="color: #a4509f;" placeholder="Key-in Introducer's ID N&deg;" class="form-control" name="introducer_id_no">
                  </div>
              </div>
            </div>
          </div>
          <div class="row" style="margin-bottom: 15px;">
              <div class="col-sm-4"></div>
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                  <div id="byintroducer" style="color: #a4509f; display: none;" class="form-group capun_code">
                    <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Coupon Card N��</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-id-card" style="color: #a4509f;"></i></span>
                          <input style="color: #a4509f;" placeholder="Coupon Card N��" class="form-control" name="coupon_code">
                      </div>
                  </div>
                </div>
              </div>

          <div class="row">
            <!-- // row 1 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">First Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="first_name" placeholder="Your first name" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="last_name" placeholder="Your last name" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Gender</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-venus-mars" style="color: #a4509f;"></i></span>
                    <select name="register_gender" class="form-control" style="color: #a4509f;">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <!-- row two -->
          <div class="row">
            <!-- // row 1 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Title</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="title" placeholder="Job Title" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Date of Birth</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-alt" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="date" class="form-control" name="date_of_birth" placeholder="Your birthday" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Company or Organization</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_company" type="text" class="form-control" name="register_company" placeholder="Company or Organization name" required>
                  </div>
                </div>
              </div>
          </div>
          <!-- row three  -->
          <div class="row">
            <!-- // row 1 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Address</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home" style="color: #a4509f;"></i></span>
                        <input id="register_address" style="color: #a4509f;" type="textarea" class="form-control" name="register_address" placeholder="Your current address" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Cell Phone</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone" style="color: #a4509f;"></i></span>
                        <input id="cell_phone" style="color: #a4509f;" type="text" class="form-control" name="cell_phone" placeholder="(+855) 012345678" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">E-mail</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_email" type="email" class="form-control" name="register_email" placeholder="Your business email" required>
                  </div>
                </div>
              </div>
            <!-- finished row 3 -->
          </div>
          <!-- start row attactment file -->
          <div class="row">
              <!-- // row 1 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label for="username" style="color: #a4509f;  text-transform: capitalize;">Passport Insert</label>
                      <div class="input-group" style=" padding-top: -15px;">
                          <span class="input-group-addon"><i class="fa fa-address-card" style="color: #a4509f;"></i></span>
                          <input type="file" id="register_passport" style="color: #a4509f;" class="form-control form-control-sm" name="register_passport" placeholder="" required>
                      </div>
                    </div>
                </div>
                <!-- row 2 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label for="username" style="color: #a4509f;  text-transform: capitalize;">Driver's License</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-road" style="color: #a4509f;"></i></span>
                          <input id="driver_license" style="color: #a4509f;" type="file" class="form-control" name="register_driver_license" placeholder="your driver license" required>
                      </div>
                    </div>
                </div>
                <!-- row 3 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Your Photo (4 X 6)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-picture" style="color: #a4509f;"></i></span>
                      <input style="color: #a4509f;" id="register_photo" type="file" class="form-control" name="register_photo" placeholder="Profile picture (4 X 6)" required>
                    </div>
                  </div>
                </div>
          </div>
          <!-- finished attactment row -->
          <!-- finished row -->
          <!-- account username password -->
            <div class="row">
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="txt_register_username" style="color: #a4509f;  text-transform: capitalize;">Username***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="txt_register_username" placeholder="Your Username for login system" required>
                    </div>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_password" type="password" class="form-control" name="txt_register_password" placeholder="Your Password" required>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Confirm Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" onchange="confirmPassword()" id="confirme_password" type="password" class="form-control" name="txt_confirme_password" placeholder="Your Confirm Password" required>
                  </div>
                  <span id="show_match" style="display: none; padding: 5px; font-size: 14px; margin:5px;"
                  class="alert alert-dismissable alert-danger">Your password doesn't match.</span>
                </div>
              </div>
          </div>
          <!-- finished account -->
          <!-- last row -->
          <div class="row">
            <div class="col-lg-8">
              <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Website</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="password" type="text" class="form-control" name="website_address" placeholder="Your company website or your own (www.example.com)" >
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
              <label  style="color: white;">Submit new account</label>
              <input class="form-control btn" disabled id="btn_register" style="background-color: #a4509f; color: white;" type="submit" name="btn_register" value="Register">
            </div>
          </div>
          <br>
         <!-- <h3 class="text-center hidden pb-4">Or Register with social media</h3>
          <div class="row hidden mb-5">
            <div class="col-lg-8" style="margin: auto;">
              <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #3B5998;">
                <i class="fa fa-facebook-f"></i> Login with Facebook
              </a>
              <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #55ACEE;">
                <i class="fa fa-twitter"></i> Login with Twitter
              </a>
                <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #dd4b39;"><i class="fa fa-google-plus">
                  </i> Login with Google+
                </a>
            </div>
          </div>-->
        </form>
      </div>
  </div>
</div>
  <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('focus', '#customer_id_no', function() {
            var cus_card = $('#customer_card').text();
            $(this).val(cus_card);
        });
    });
    function changeYourself(){
      $("#register_seft_thru").val("1");
      var yourself = document.getElementById("yourself");
      var introducer = document.getElementById("introducer");
      var byintroducer = document.getElementById("byintroducer");
      var title_form = document.getElementById("title_customer");
      $(".introducer").css("display", "none");
      $(".capun_code").css("display", "none");
      introducer.className = introducer.className.replace(/\btab-active\b/g, "");
      var name, arr;
      title_form.innerHTML = "Customer Registration Form - Self Registration";
      yourself.style.color = "black";
      introducer.style.color = "#a4509f";
      name = "tab-active";
      // byintroducer.style.display = "block";
      arr = yourself.className.split(" ");
      if (arr.indexOf(name) == -1) {
          yourself.className += " " + name;
      }
    }
    function changeIntroducer(){
      $("#register_seft_thru").val("2");
      var yourself = document.getElementById("yourself");
      var introducer = document.getElementById("introducer");
      var title_form = document.getElementById("title_customer");
      var byintroducer = document.getElementById("byintroducer");
      $(".capun_code").css("display", "block");
      yourself.className = yourself.className.replace(/\btab-active\b/g, "");
      var name, arr;
      byintroducer.style.display = "block";
      yourself.style.color = "#a4509f";
      title_form.innerHTML = "Customer Registration Form - Thru Introducer";
      introducer.style.color = "black";
      name = "tab-active";
      arr = introducer.className.split(" ");
      if (arr.indexOf(name) == -1) {
          introducer.className += " " + name;
      }
    }
    function confirmPassword(){
      var x = document.getElementById("confirme_password");
      var y = document.getElementById("register_password");
      var b = document.getElementById("btn_register");
      var show_match = document.getElementById("show_match");
      if(x.value != y.value){
        show_match.style.display = "block";
        b.disabled = true;
      }else {
        show_match.style.display = "none";
        b.disabled = false;
      }
    }
  </script>
<style type="text/css">

  @media only screen and (max-width: 600px) {
  .top_mobile {
    padding-top:10px !important;
  }
  .title_customer {
    display: none;
  }
}

</style>

<!-- finished container section -->

<!-- inlcude footer buttom -->

<?php require_once("footerpartner.php"); ?>
