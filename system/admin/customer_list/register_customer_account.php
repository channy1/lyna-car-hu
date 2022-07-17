<!-- header included  -->
<?php 
    $menu_active =13;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
      // Register new account with file upload.
  if(isset($_POST["btn_register"])) {
        // directory to store
        $target_dir = "../image/img_customer/";

        $driver_license = date("Ymd")."_".rand(1111,9999)."_". basename(@$_FILES["register_driver_license"]["name"]);
        $passport_photo = date("Ymd")."_".rand(1111,9999)."_".basename(@$_FILES["register_passport"]["name"]);
        $user_photo = date("Ymd")."_".rand(1111,9999)."_".basename(@$_FILES["register_photo"]["name"]);

        $register_driver_license_file = $target_dir.$driver_license ;
        $register_passport_file = $target_dir.$passport_photo;
        // profile images
        $register_photo_file = $target_dir.$user_photo;
        // new photo name
        $uploadOk = 1;
        $message = '';  
        
        $driverfiletostore = '';
        $passportfiletostore = '';
        $photofiletostore = '';

        $driverFileType = strtolower(pathinfo($register_driver_license_file,PATHINFO_EXTENSION));
        $passportFileType = strtolower(pathinfo($register_passport_file,PATHINFO_EXTENSION));
        $photoFileType = strtolower(pathinfo($register_photo_file,PATHINFO_EXTENSION));
        // finished file validation

        // get data from customer form registration
        $r_customer_id_no = trim($connect->real_escape_string(@$_POST['customer_id_no']));
        $r_introducer_id_no = trim($connect->real_escape_string(@$_POST['introducer_id_no']));
        $r_first_name = trim($connect->real_escape_string(@$_POST['first_name']));
        $r_last_name = trim($connect->real_escape_string(@$_POST['last_name']));
        $r_register_gender = trim($connect->real_escape_string(@$_POST['register_gender']));
        $r_title = trim($connect->real_escape_string(@$_POST['title']));
        $r_date_of_birth = trim($connect->real_escape_string(@$_POST['date_of_birth']));
        $r_register_company = trim($connect->real_escape_string(@$_POST['register_company']));
        $r_register_address = trim($connect->real_escape_string(@$_POST['register_address']));
        $r_cell_phone = trim($connect->real_escape_string(@$_POST['cell_phone']));
        $r_register_email = trim($connect->real_escape_string(@$_POST['register_email']));
        $r_website_address = trim($connect->real_escape_string(@$_POST['website_address']));
        $r_coupon_code = trim($connect->real_escape_string(@$_POST['coupon_code']));
        $r_register_seft_thru = trim($connect->real_escape_string(@$_POST['register_seft_thru']));
        
        $txt_register_username = trim($connect->real_escape_string(@$_POST['txt_register_username']));
        $txt_register_password = trim($connect->real_escape_string(@$_POST['txt_register_password']));
        $user_id_from_login = @$_SESSION['user']->user_id;
        
        // $enctypt_password = sha1(md5($pass)).sha1("0962195196");
        
        // file upload validation
  
        // Check if image file is a actual image or fake image
        // $check_driver = getimagesize(@$_FILES["register_driver_license"]["name"]);
        // $check_passport = getimagesize(@$_FILES["register_passport"]["name"]);
        // $check_photo = getimagesize(@$_FILES["register_photo"]["name"]);
        // if($check_driver !== false && $check_passport !== false && $check_photo !== false) {
        //     // echo "File is an image - " . $check["mime"] . ".";
        //     $uploadOk = 1;
        // } else {
        //     echo "File is not an image.";
        //     $uploadOk = 0;
        // }
        // Check if file already exists
        //   if (file_exists($check_driver) && file_exists($check_passport) && file_exists($check_photo)) {
        //       echo "Sorry, file already exists.";
        //       $uploadOk = 0;
        //   }
        // Check file size
        if (@$_FILES["register_driver_license"]["size"] > 5000000 && @$_FILES["register_passport"]["size"] > 5000000 && @$_FILES["register_photo"]["size"] > 500000) {
            $message = "<script type='text/javascript'>alert('Sorry Your file is too large');</script>";
            echo $message;
            $uploadOk = 0;
        }

        // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
        //     $message = "<script type='text/javascript'>alert('Sorry only JPG, PNG, JPEG, PDF, GIF is allow.');</script>";
        //     $uploadOk = 0;
        // }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message = "<script type='text/javascript'>alert('Your file was not upload sorry. somthing went wrong');</script>";
            echo $message;
            // if everything is ok, try to upload file
        } else {
            // copy file to our system directory
            if (move_uploaded_file(@$_FILES["register_driver_license"]["tmp_name"], $register_driver_license_file)
                && move_uploaded_file(@$_FILES["register_passport"]["tmp_name"], $register_passport_file) 
                && move_uploaded_file(@$_FILES["register_photo"]["tmp_name"], $register_photo_file)) {
                // echo "The file ". basename( $_FILES["cover_image"]["name"]). " has been uploaded.";
                $message = "<script type='text/javascript'></script>";
                echo $message;
                $driverfiletostore = $driver_license;
                $passportfiletostore = $passport_photo;
                $photofiletostore = $user_photo;
                if($driverfiletostore == '' && $passport_photo == '' && $photofiletostore == ''){
                    $message = "<script type='text/javascript'>alert('Image can '". $r_customer_id_no."'not upload to server.');</script>";
                    echo $message;
                }else {
                    // upload file to server.
                    $stm = "INSERT INTO `tbl_users`(
                            `user_name`,
                            `user_password`,
                            `user_email`,
                            `user_photo`,
                            `user_phone_number`,
                            `user_gender`,
                            `user_status`,
                            `user_position`,
                            `user_id_number`,
                            `user_origination`,
                            `user_introducer_id`,
                            `user_first_name`,
                            `user_last_name`,
                            `user_address`,
                            `user_title`,
                            `user_birthday`,
                            `user_passport`,
                            `user_driver_licence`,
                            `user_company`,
                            `user_website`,
                            `user_coupon_code`,
                            `user_seft_thru`,
                            `add_bye`
                        )
                        VALUES(
                            '$txt_register_username',
                            '$txt_register_password',
                            '$r_register_email',
                            '$photofiletostore',
                            '$r_cell_phone',
                            '$r_register_gender',
                            '1',
                            2,
                            '$r_customer_id_no',
                            'Register',
                            '$r_introducer_id_no',
                            '$r_first_name',
                            '$r_last_name',
                            '$r_register_address',
                            '$r_title',
                            '$r_date_of_birth',
                            '$passportfiletostore',
                            '$driverfiletostore',
                            '$r_register_company',
                            '$r_website_address',
                            '$r_coupon_code',
                            '$r_register_seft_thru',
                            '$user_id_from_login'
                            )";
                        if($connect->query($stm)){
                            // header("location: register_customer_account.php");
                            $sms = '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Successfull!</strong> Data inserted ...
                            </div>'; 
                        }else{
                            // header("location: register_customer_account.php");
                             $sms = '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Error!</strong> '.mysqli_error($connect).'...
                            </div>'; 
                        }
                }
            } else { 
            $message = "<script type='text/javascript'>alert('Image can not upload to server.');</script>";
            echo $message;
            }
        }  
        // file to store
  }
  mysqli_close($connect);
  // if (mysqli_query($conn, $sql)) {
  //     echo "New record created successfully";
  // } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  // }

  // mysqli_close($conn);
?>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Create Record</h2>
        </div>
    </div>
  
    <br>
    <br>
    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="index.php" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title" id="title_customer">Customer Registration Form - Self Regitration</h3>
            </div>
            <div class="panel-body">
                   <form action="#" method="post" role="form" enctype="multipart/form-data">
          <!-- row radio button for checking register throught -->
          <input type="hidden" id="register_seft_thru" value="1" name="register_seft_thru">
          <div class="row">
            <div onclick="changeYourself()" class="col-lg-4 text-center"style=" text-transform: capitalize ;margin: auto;">
                <h5 class="tab-active" id="yourself" 
                style="cursor: pointer;border: 1px solid #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;">SELF-REGISTRATION</h5>
            </div>
            <div class="col-lg-4">
              <p class="text-center pt-3">===== OR =====</p>
            </div>
            <div onclick="changeIntroducer()" class="col-lg-4 text-center" style=" text-transform: capitalize ;margin: auto;">
                <h5 id="introducer" style="cursor: pointer;border: 1px solid #a4509f; color: #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;">THRU INDRODUCER</h5>
            </div>
          </div>
          <!-- introducer and yourself row -->

          <div id="showyourself"class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Your ID N&deg; : <?php echo 'CUS'.date("Ymd").''.rand(10,1000000); ?></label>
                <div class="input-group">
                      <span onclick="change()" class="input-group-addon"><i class="fas fa-id-card" style="color: #a4509f;"></i></span>
                      <input required style="color: #a4509f;" class="form-control" 
                      name="customer_id_no" placeholder="Copy your ID N&deg; and paste here." type="text" value="">
                </div>
            <!-- test get data from customer id no -->
                <!-- <script>
                    function change(){
                      var x = document.getElementsByName("customer_id_no")[0];
                      alert(x.value);
                    }
                </script> -->
              </div>
            </div>
            <div class="col-sm-4">
              <label for="">  </label>
              <p class="text-center pt-4" style="font-size: 14px;">*Note: Please always remember your ID N&deg;</p>
            </div>
            <div class="col-sm-4">
              <div id="byintroducer" style="color: #a4509f; display: block;" class="form-group">
                <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Introducer's ID N&deg;</label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-id-card" style="color: #a4509f;"></i></span>
                      <input style="color: #a4509f;" placeholder="Key-in Introducer's ID N&deg;" class="form-control" name="introducer_id_no">
                  </div>
              </div>
            </div>
          </div>
          <div class="row" style="margin-bottom: 15px;">
              <div class="col-sm-4"></div>
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
                  <div id="byintroducer" style="color: #a4509f; display: block;" class="form-group">
                    <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Coupon Card N°</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fas fa-id-card" style="color: #a4509f;"></i></span>
                          <input style="color: #a4509f;" placeholder="Coupon Card N°" class="form-control" name="coupon_code" required>
                      </div>
                  </div>
                </div>
              </div>
          <!-- script for register throuth yourself or introducer -->
          <script type="text/javascript">
            function changeYourself(){
              $("#register_seft_thru").val("1");
              var yourself = document.getElementById("yourself");
              var introducer = document.getElementById("introducer");
              var byintroducer = document.getElementById("byintroducer");
              var title_form = document.getElementById("title_customer");
              introducer.className = introducer.className.replace(/\btab-active\b/g, "");
              var name, arr;
              title_form.innerHTML = "Customer Registration Form - Self Registration";
              yourself.style.color = "white";
              introducer.style.color = "#a4509f";
              name = "tab-active";
              byintroducer.style.display = "block";
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
              yourself.className = yourself.className.replace(/\btab-active\b/g, "");              
              var name, arr;
              byintroducer.style.display = "block";
              yourself.style.color = "#a4509f";
              title_form.innerHTML = "Customer Registration Form - Thru Introducer";
              introducer.style.color = "white";
              name = "tab-active";
              arr = introducer.className.split(" ");
              if (arr.indexOf(name) == -1) {
                  introducer.className += " " + name;
              }
            }
          </script>

          <!-- first row -->
          <div class="row">
            <!-- // row 1 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">First Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="first_name" placeholder="Your first name" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
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
                      <option value="Other">=== Other ===</option>
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
                        <span class="input-group-addon"><i class="fas fa-user-tie" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="title" placeholder="Job Title" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Date of Birth</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-calendar-alt" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="date" class="form-control" name="date_of_birth" placeholder="Your birthday" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Company or Organization</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-building" style="color: #a4509f;"></i></span>
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
                        <span class="input-group-addon"><i class="fas fa-home" style="color: #a4509f;"></i></span>
                        <input id="register_address" style="color: #a4509f;" type="textarea" class="form-control" name="register_address" placeholder="Your current address" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Cell Phone</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone" style="color: #a4509f;"></i></span>
                        <input id="cell_phone" style="color: #a4509f;" type="text" class="form-control" name="cell_phone" placeholder="(+855) 012345678" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Email</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" style="color: #a4509f;"></i></span>
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
                          <span class="input-group-addon"><i class="fas fa-address-card" style="color: #a4509f;"></i></span>
                          <input type="file" id="register_passport" style="color: #a4509f;" class="form-control form-control-sm" name="register_passport" placeholder="" required>
                      </div>
                    </div>
                </div>
                <!-- row 2 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label for="username" style="color: #a4509f;  text-transform: capitalize;">Driver's License</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-road" style="color: #a4509f;"></i></span>
                          <input id="driver_license" style="color: #a4509f;" type="file" class="form-control" name="register_driver_license" placeholder="your driver license" required>
                      </div>
                    </div>
                </div>
                <!-- row 3 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Your Photo (4 X 6)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-picture" style="color: #a4509f;"></i></span>
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
                    <label for="txt_register_username" style="color: #a4509f;  text-transform: capitalize;">User Name***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" name="txt_register_username" placeholder="Your Username for login system" required>
                    </div>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_password" type="password" class="form-control" name="txt_register_password" placeholder="Your Password" required>
                  </div>
                </div>  
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Confirme Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" onchange="confirmPassword()" id="confirme_password" type="password" class="form-control" name="txt_confirme_password" placeholder="type your password again" required>
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
                    <span class="input-group-addon"><i class="fas fa-globe-americas" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="password" type="text" class="form-control" name="website_address" placeholder="your company website or your own (www.example.com)" required>
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
              <label  style="color: white;">Submit new account</label>
              <input class="form-control btn" disabled id="btn_register" style="background-color: #a4509f; color: white;" type="submit" name="btn_register" value="Register">
            </div>
          </div>
          <br>
          <!-- validation password -->
            <script>
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
          
        </form>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
.tab-active {
      background-color: #a4509f;
       color: white;
}
</style>
<?php include_once '../layout/footer.php' ?>