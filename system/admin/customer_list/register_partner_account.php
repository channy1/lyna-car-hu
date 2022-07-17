<?php 
   $menu_active =13;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php 
  if(isset($_POST["btn_partner_register"])) {

        $target_dir = "../image/img_partner/";

        $register_driver_license = date("Ymd")."_".rand(1111,9999)."_". basename(@$_FILES["register_partner_driver_license"]["name"]);
        $register_partner_passport = date("Ymd")."_".rand(1111,9999)."_".basename(@$_FILES["register_partner_passport"]["name"]);
        $register_partner_photo = date("Ymd")."_".rand(1111,9999)."_".basename(@$_FILES["register_partner_photo"]["name"]);
        
        $register_driver_license_file = $target_dir.$register_driver_license;
        $register_passport_file = $target_dir.$register_partner_passport;
        // profile images
        $register_photo_file = $target_dir.$register_partner_photo;
        // new photo name to store in database.

        $uploadOk = 1;
        $message = '';  
        $driverfiletostore = '';
        $passportfiletostore = '';
        $photofiletostore = '';
        // get data from customer form registration
        $r_partner_customer_id = trim($connect->real_escape_string(@$_POST['register_partner_customer_id']));
        $r_partner_introducer_id = trim($connect->real_escape_string(@$_POST['register_partner_introducer_id']));
        $r_coupon_code = trim($connect->real_escape_string(@$_POST['coupon_code']));
          
        $r_partner_first_name = trim($connect->real_escape_string(@$_POST['register_partner_first_name']));
        $r_partner_last_name = trim($connect->real_escape_string(@$_POST['register_partner_last_name']));
        $r_register_gender = trim($connect->real_escape_string(@$_POST['register_partner_gender']));
        $r_partner_title = trim($connect->real_escape_string(@$_POST['register_partner_title']));
        $r_partner_date_of_birth = trim($connect->real_escape_string(@$_POST['register_partner_date_of_birth']));
        $r_partner_company = trim($connect->real_escape_string(@$_POST['register_partner_company']));
        $r_partner_address = trim($connect->real_escape_string(@$_POST['register_partner_address']));
        $r_partner_cell_phone = trim($connect->real_escape_string(@$_POST['register_partner_cell_phone']));
        $r_partner_email = trim($connect->real_escape_string(@$_POST['register_partner_email']));
        $r_partner_website = trim($connect->real_escape_string(@$_POST['register_partner_website']));
        
        $r_partner_username = trim($connect->real_escape_string(@$_POST['register_partner_username']));
        $r_partner_password = trim($connect->real_escape_string(@$_POST['register_partner_password']));
        $r_register_seft_thru = trim($connect->real_escape_string(@$_POST['register_seft_thru']));
        $user_id_from_login = @$_SESSION['user']->user_id;
        // $enctypt_password = sha1(md5($pass)).sha1("0962195196");

        // get data type as  array of string.
        $r_partner_type = $_POST['partner_type'];
        
        // convert to array of integer
        $r_partner_type = array_map('intval', $r_partner_type);
        // $message = "<script type='text/javascript'>alert(' array partner. ".$r_partner_type[0]."');</script>";
        // echo $message;
        // Check file size
        if (@$_FILES["register_partner_driver_license"]["size"] > 5000000
            && @$_FILES["register_partner_passport"]["size"] > 5000000 
            && @$_FILES["register_partner_photo"]["size"] > 500000) {
            $message = "<script type='text/javascript'>alert('Sorry Your file is too large');</script>";
            echo $message;
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message = "<script type='text/javascript'>alert('Your file was not upload sorry. somthing went wrong');</script>";
            echo $message;
            // if everything is ok, try to upload file
        } else {
            // copy file to our system directory
            if (move_uploaded_file(@$_FILES["register_partner_driver_license"]["tmp_name"], $register_driver_license_file)
                && move_uploaded_file(@$_FILES["register_partner_passport"]["tmp_name"], $register_passport_file) 
                && move_uploaded_file(@$_FILES["register_partner_photo"]["tmp_name"], $register_photo_file)) {
                // echo "The file ". basename( $_FILES["cover_image"]["name"]). " has been uploaded.";
                // $message = "<script type='text/javascript'>alert('Image uploaded successfully.');</script>";
                // echo $message;
                $driverfiletostore = $register_driver_license;
                $passportfiletostore = $register_partner_passport;
                $photofiletostore = $register_partner_photo;
                // $message = "<script type='text/javascript'>alert('Image upload to server.');</script>";
                echo $message;
                if($driverfiletostore == '' && $passportfiletostore == '' && $photofiletostore == ''){
                    $message = "<script type='text/javascript'>alert('Image can not upload to server.');</script>";
                    echo $message;
                }else {
                    // upload file to server.
                    
                    $message = "<script type='text/javascript'>alert('prepare upload user upload to server.');</script>";
                    echo $message;
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
                            '$r_partner_username',
                            '$r_partner_password',
                            '$r_partner_email',
                            '$photofiletostore',
                            '$r_partner_cell_phone',
                            '$r_register_gender',
                            '1',
                            3,
                            '$r_partner_customer_id',
                            'Register',
                            '$r_partner_introducer_id',
                            '$r_partner_first_name',
                            '$r_partner_last_name',
                            '$r_partner_address',
                            '$r_partner_title',
                            '$r_partner_date_of_birth',
                            '$passportfiletostore',
                            '$driverfiletostore',
                            '$r_partner_company',
                            '$r_partner_website',
                            '$r_coupon_code',
                            '$r_register_seft_thru',
                            '$user_id_from_login'

                            )";
                            // execute partner register query 
                            // insert to relationship table.
                            if($connect->query($stm)){
                                // get user partner id;
                                $id = $connect->insert_id;
                                    for($i=1;$i<=100;$i++){
                                        $sql = "INSERT INTO tbl_coupon (cop_intro,cop_id_user)VALUE ('$r_partner_introducer_id','$id')";
                                        $connect->query($sql);
                                    }
                                //header('location: partner_login.php');
                                $partner_user_id = $connect->insert_id;
                                
                                // $message = "<script type='text/javascript'>alert('user position upload to server. with id: ".$partner_user_id."');</script>";
                                // echo $message;
                                foreach($r_partner_type as $type){
                                    // because admin is 1 customer is 2 so partner will start from 3 but we get value from 1 in form input.
                                    $type = $type + 2;
                                    $stmtt = "INSERT INTO `tbl_relationship_users_position`(
                                        `user_id`, 
                                        `user_position_id`) 
                                    VALUES (
                                        '$partner_user_id',
                                        '$type'
                                        )";
                                    $success = $connect->query($stmtt);
                                    // $message = "<script type='text/javascript'>alert('position upload to server. with".$connect->error."');</script>";
                                    // echo $message;
                                }
                                // $message = "<script type='text/javascript'>alert('after position upload to server.');</script>";
                                // echo $message;
                                // check if last query success
                                if($success){
                                    $sms = '<div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>Successfull!</strong> Data inserted ...
                                        </div>'; 
                                }else{
                                    // rollback if table relationship is not insert.
                                    $stst = "DELETE FROM `tbl_users` WHERE `$partner_user_id`";
                                    $sms = '<div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Error!</strong> register Error ...
                                        </div>';
                                }
                            }else{
                                $message = "<script type='text/javascript'>alert('user can't upload to database. error : ".$connect->error."');</script>";
                                echo $message;
                            }
                }
            } else { 
            $message = "<script type='text/javascript'>alert('Image can not move to directory.');</script>";
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
                <h3 class="panel-title" id="title_partners">Partner Registration Form - Self Registration</h3>
            </div>
            <div class="panel-body">
                <form action="#" method="POST" role="form" enctype="multipart/form-data">
         
<input type="hidden" id="register_seft_thru" value="1" name="register_seft_thru">
                    <!-- row radio button for checking register throught -->

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

          <div id="showyourself"class="row" style="margin-bottom: 15px;">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Your ID N&deg; : <?php echo 'CUS'.date("Ymd").''.rand(10,1000000); ?></label>
                <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-id-card" style="color: #a4509f;"></i></span>
                      <input style="color: #a4509f;" class="form-control" 
                      name="register_partner_customer_id" placeholder="Copy your ID N&deg; and paste here.">
                </div>
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
                      <input style="color: #a4509f;" placeholder="Key-in Introducer's ID N&deg;" 
                      class="form-control" name="register_partner_introducer_id">
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
              var title_forms = document.getElementById("title_partners");
              introducer.className = introducer.className.replace(/\btab-active\b/g, "");
              var name, arr;
              title_forms.innerHTML = "Partner Registration Form - Self Registration";
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
              var title_forms = document.getElementById("title_partners");
              var byintroducer = document.getElementById("byintroducer");
              yourself.className = yourself.className.replace(/\btab-active\b/g, "");              
              var name, arr;
              title_forms.innerHTML = "Partner Registration Form - Thru Introducer";
              byintroducer.style.display = "block";
              yourself.style.color = "#a4509f";
              introducer.style.color = "white";
              name = "tab-active";
              arr = introducer.className.split(" ");
              if (arr.indexOf(name) == -1) {
                  introducer.className += " " + name;
              }
            }
          </script>
          <!-- finished register thro script  -->

          <div class="row">
            <div class="col-sm-12">
            <fieldset style="border: 1px solid #a4509f;">
              <legend style="background: none; text-align: center; margin-left: 50px; width: 200px; color: #a4509f;">
                <span>Choose Package</span>
              </legend>
                <div style="padding: 10px;">
                  <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label  class="form-control text-left" style="padding-right: 10px; color: #a4509f;  text-transform: capitalize;">
                          <!-- <input type="checkbox" name="register_partner_type[]" value="1" style="color: #a4509f;margin-right: 0px;"> Car's Owner  -->
                            <input type="radio" style="color: #a4509f;" id="packages" name="partner_type[]" value="3" checked>
                            Car's Owner
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label  class="form-control text-left" style="padding-right: 10px; color: #a4509f;  text-transform: capitalize;">
                          <!-- <input type="checkbox" name="register_partner_type[]" value="2" style="color: #a4509f;margin-right: 0px;">  -->
                          <input type="radio" style="color: #a4509f;" id="packages" name="partner_type[]" value="4" checked>
                            Rickshaw's Owner 
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label  class="form-control text-left" style="padding-right: 10px; color: #a4509f;  text-transform: capitalize;">
                          <!-- <input type="checkbox" name="register_partner_type[]" value="3" style="color: #a4509f;margin-right: 0px;">   -->
                          <input type="radio" style="color: #a4509f;" id="huey" name="partner_type[]" value="5" checked>
                            Tour Guide 
                          </label>
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label  class="form-control text-left" style="padding-right: 10px; color: #a4509f;  text-transform: capitalize;">
                        <!-- <input type="checkbox" name="register_partner_type[]" value="4" style="color: #a4509f;margin-right: 0px;">  -->
                        <input type="radio" style="color: #a4509f;" id="huey" name="partner_type[]" value="6" checked>
                          Driver
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label  class="form-control text-left" style="padding-right: 10px; color: #a4509f;  text-transform: capitalize;">
                        <!-- <input type="checkbox" name="register_partner_type[]" value="5" style="color: #a4509f;margin-right: 0px;">   -->
                        <input type="radio" style="color: #a4509f;" id="huey" name="partner_type[]" value="7" checked>
                          Hotel & Guesthouse
                        </label>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label  class="form-control text-left" style="padding-right: 10px; color: #a4509f;  text-transform: capitalize;">
                        <!-- <input type="checkbox" name="register_partner_type[]" value="6" style="color: #a4509f;margin-right: 0px;">   -->
                        <input type="radio" style="color: #a4509f;" id="huey" name="partner_type[]" value="8" checked>

                        Introducer 
                        </label>
                      </div>
                    </div>
                  </div>  
                </div>
              </fieldset>
            </div>
          </div>
          <!-- <script>
              function getValue(){
                var checkboxes = document.getElementsByName('partner_type[]');
                var vals = "";
                for (var i=0, n=checkboxes.length;i<n;i++) 
                {
                    if (checkboxes[i].checked) 
                    {
                        vals += ","+checkboxes[i].value;
                        alert(vals);
                    }
                }
                if (vals) vals = vals.substring(1);
                alert(vals);
              }
          </script> -->
          <!-- first row -->
          <!-- second row -->
          <div class="row">
            <!-- // row 1 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">First Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" 
                        class="form-control" name="register_partner_first_name" placeholder="Your first name" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" 
                        class="form-control" name="register_partner_last_name" placeholder="Your last name" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Gender</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-venus-mars" style="color: #a4509f;"></i></span>
                    <select name="register_partner_gender" class="form-control" style="color: #a4509f;">
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
                        <input id="username" style="color: #a4509f;" type="text" class="form-control" 
                        name="register_partner_title" placeholder="Job Title" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Date of Birth</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-calendar-alt" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="date" 
                        class="form-control" name="register_partner_date_of_birth" placeholder="Your birthday" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Company or Organization</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-building" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_partner_company" type="text" class="form-control" name="register_company" placeholder="Company or Organization name" required>
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
                        <input id="register_address" style="color: #a4509f;" type="textarea" 
                        class="form-control" name="register_partner_address" placeholder="Your current address" required>
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Cell Phone</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone" style="color: #a4509f;"></i></span>
                        <input id="cell_phone" style="color: #a4509f;" type="text" 
                        class="form-control" name="register_partner_cell_phone" placeholder="(+855) 012345678" required>
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Email</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_email" type="email" 
                    class="form-control" name="register_partner_email" placeholder="Your business email" required>
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
                          <input type="file" id="register_partner_passport" style="color: #a4509f;" class="form-control form-control-sm" 
                          name="register_partner_passport" placeholder="" required>
                      </div>
                    </div>
                </div>
                <!-- row 2 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label for="username" style="color: #a4509f;  text-transform: capitalize;">Driver's License</label>
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-road" style="color: #a4509f;"></i></span>
                          <input id="register_partner_driver_license" style="color: #a4509f;" type="file" 
                          class="form-control" name="register_partner_driver_license" placeholder="your driver license" required>
                      </div>
                    </div>
                </div>
                <!-- row 3 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Your Photo (4 X 6)</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-picture" style="color: #a4509f;"></i></span>
                      <input style="color: #a4509f;" id="register_partner_photo" type="file" class="form-control" 
                      name="register_partner_photo" placeholder="Profile picture (4 X 6)" required>
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
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">User Name***</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" style="color: #a4509f;" type="text" 
                        class="form-control" name="register_partner_username" placeholder="Your Username for login system" required>
                    </div>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_partner_password" 
                    type="password" class="form-control" name="register_partner_password" placeholder="Your Password" required>
                  </div>
                </div>  
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Confirme Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" onchange="confirmPassword()" id="register_partner_confirme_password" type="password" 
                    class="form-control" name="register_partner_confirme_password" placeholder="type your password again" required>
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
                    <input style="color: #a4509f;" id="password" type="text" 
                    class="form-control" name="register_partner_website" placeholder="your company website or your own (www.example.com)" required>
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
              <label  style="color: white;">Submit new account</label>
              <input class="form-control btn" style="background-color: #a4509f; color: white;" 
              type="submit" name="btn_partner_register" disabled id="btn_partner_register" value="Register">
            </div>
          </div>
          <br>
          <!-- validation password -->
          <script>
              function confirmPassword(){
                var x = document.getElementById("register_partner_confirme_password");
                var y = document.getElementById("register_partner_password");
                var b = document.getElementById("btn_partner_register");
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
          <!-- social media registration section panel. -->
          
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
