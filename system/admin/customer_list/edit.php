<?php 
    $menu_active =13;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_users WHERE user_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $e_user_id = $row["user_id"];
        $v_user_id_number=$row['user_id_number'];
        $v_user_introducer_id=$row['user_introducer_id'];
        $v_first_name=$row['user_first_name'];
        $v_last_name=$row['user_last_name'];
        $v_gender=$row['user_gender'];
        $v_coupon_code=$row['user_coupon_code'];
        $v_title=$row['user_title'];
        $v_dob=$row['user_birthday'];
        $v_company=$row['user_company'];
        $v_address=$row['user_address'];
        $v_cell_phone=$row['user_phone_number'];
        $v_email=$row['user_email'];
        $v_register_username=$row['user_name'];
        $v_website=$row['user_website'];
        $user_position=$row['user_position'];
        $user_add_bye=$row['add_bye'];
        $user_passport=$row['user_passport'];
        $user_driver_licence=$row['user_driver_licence'];
        $user_photo=$row['user_photo'];
        $user_seft_thru=$row['user_seft_thru'];
        $image_db_pass=$row['user_passport'];
        $image_db_driv=$row['user_driver_licence'];
        $image_db_user=$row['user_photo'];
        $pass_word=$row['user_password'];
        }
    }
    else{}
?>

<?php 
    
     if(isset($_POST['btn_register'])){
           $v_image_passport = @$_FILES['register_passport'];
            if($v_image_passport["name"] != ""){
                $new_name_pass = date("Ymd")."_".rand(1111,9999).".png";
                if($user_position=="2") {
                  move_uploaded_file($v_image_passport["tmp_name"], "../image/img_customer/".$new_name_pass);
                }
                else {
                  move_uploaded_file($v_image_passport["tmp_name"], "../image/img_partner/".$new_name_pass);
                }
                
            }else{
                $new_name_pass = $image_db_pass;
                //echo "<script> alert ('hello'); </script> ";
            }

            $v_image_driv = @$_FILES['register_driver_license'];
            if($v_image_driv["name"] != ""){
                $new_name_driv = date("Ymd")."_".rand(1111,9999).".png";
                 if($user_position=="2") {
                  move_uploaded_file($v_image_driv["tmp_name"], "../image/img_customer/".$new_name_driv);
                }
                else {
                  move_uploaded_file($v_image_driv["tmp_name"], "../image/img_partner/".$new_name_driv);
                }
               
            }else{
                $new_name_driv = $image_db_driv;
                //echo "<script> alert ('hello'); </script> ";
            }

             $v_image_user = @$_FILES['register_photo'];
            if($v_image_user["name"] != ""){
                $new_name_user = date("Ymd")."_".rand(1111,9999).".png";
                if($user_position=="2") {
                  move_uploaded_file($v_image_user["tmp_name"], "../image/img_customer/".$new_name_user);
                }
                else {
                  move_uploaded_file($v_image_user["tmp_name"], "../image/img_partner/".$new_name_user);
                }
                
            }else{
                $new_name_user = $image_db_user;
                //echo "<script> alert ('hello'); </script> ";
            }
            
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
            if($txt_register_password=="") {
              $pass_word_update=$pass_word;
            }
            else {
              $pass_word_update=$txt_register_password;
            }
           $user_id_from_login = @$_SESSION['user']->user_id;
       

            $query_add = "UPDATE tbl_users SET 
            user_name ='$txt_register_username',
            user_password = '$pass_word_update',
            user_email='$r_register_email',
            user_photo='$new_name_user',
            user_phone_number='$r_cell_phone',
            user_gender='$r_register_gender',
            user_status='1',
            user_position='$user_position',
            user_id_number='$r_customer_id_no',
            user_origination='Register',
            user_introducer_id='$r_introducer_id_no',
            user_first_name='$r_first_name',
            user_last_name='$r_last_name',
            user_address='$r_register_address',
            user_title='$r_title',
            user_birthday='$r_date_of_birth',
            user_passport='$new_name_pass',
            user_driver_licence='$new_name_driv',
            user_company='$r_register_company',
            user_website='$r_website_address',
            user_coupon_code='$r_coupon_code',
            user_seft_thru='$r_register_seft_thru'
            WHERE user_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }
}
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
                <h3 class="panel-title" id="title_customer"><?php if($user_position=="2") {echo "Customer Registration Form";} else {echo "Partner Registration Form";} ?> <?php if($user_seft_thru=="1") {echo "- Self Regitration";} else {echo " - Thru Introducer";} ?></h3>
            </div>
            <div class="panel-body">
                   <form action="#" method="post" role="form" enctype="multipart/form-data">
          <!-- row radio button for checking register throught -->
          <input type="hidden" id="register_seft_thru" value="<?php echo $user_seft_thru; ?>" name="register_seft_thru">
          <div class="row">
            <div onclick="changeYourself()" class="col-lg-4 text-center" style=" text-transform: capitalize ;margin: auto;">
                <h5 class="<?php if($user_seft_thru=="1") {echo "tab-active";} ?>" id="yourself" style="cursor: pointer;border: 1px solid #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;">SELF-REGISTRATION</h5>
            </div>
            <div class="col-lg-4">
              <p class="text-center pt-3">===== OR =====</p>
            </div>
            <div onclick="changeIntroducer()" class="col-lg-4 text-center" style=" text-transform: capitalize ;margin: auto;">
                <h5 class="<?php if($user_seft_thru=="2") {echo "tab-active";} ?>" id="introducer" style="cursor: pointer;border: 1px solid #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;">THRU INDRODUCER</h5>
            </div>
          </div>
          <!-- introducer and yourself row -->

          <div id="showyourself" class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Your ID N° : 
                </label>
                <div class="input-group">
                      <span onclick="change()" class="input-group-addon"><i class="fas fa-id-card" style="color: #a4509f;"></i></span>
                      <input required="" style="color: #a4509f;" class="form-control" name="customer_id_no" placeholder="Copy your ID N° and paste here." type="text" value="<?php echo $v_user_id_number; ?>">
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
              <p class="text-center pt-4" style="font-size: 14px;">*Note: Please always remember your ID N°</p>
            </div>
            <div class="col-sm-4">
              <div id="byintroducer" style="color: #a4509f; display: block;" class="form-group">
                <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Introducer's ID N°</label>
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fas fa-id-card" style="color: #a4509f;"></i></span>
                      <input style="color: #a4509f;" value="<?php echo $v_user_introducer_id; ?>" placeholder="Key-in Introducer's ID N°" class="form-control" name="introducer_id_no">
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
                          <input style="color: #a4509f;" value="<?php echo $v_coupon_code; ?>" placeholder="Coupon Card N°" class="form-control" name="coupon_code">
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
              title_form.innerHTML = "<?php if($user_position=="2") {echo "Customer Registration Form";} else {echo "Partner Registration Form";} ?> - Self Registration";
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
              title_form.innerHTML = "<?php if($user_position=="2") {echo "Customer Registration Form";} else {echo "Partner Registration Form";} ?> - Thru Introducer";
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
                        <input id="username" value="<?php echo $v_first_name; ?>" style="color: #a4509f;" type="text" class="form-control" name="first_name" placeholder="Your first name" required="">
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Last Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color: #a4509f;"></i></span>
                        <input id="username" value="<?php echo $v_last_name; ?>" style="color: #a4509f;" type="text" class="form-control" name="last_name" placeholder="Your last name" required="">
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
                      <option <?php if($v_gender=="Male") {echo "selected='selected'";} ?> value="Male">Male</option>
                      <option <?php if($v_gender=="Female") {echo "selected='selected'";} ?> value="Female">Female</option>
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
                        <input id="username" value="<?php echo $v_title; ?>" style="color: #a4509f;" type="text" class="form-control" name="title" placeholder="Job Title" required="">
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Date of Birth</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-calendar-alt" style="color: #a4509f;"></i></span>
                        <input id="username" value="<?php echo $v_dob; ?>" style="color: #a4509f;" type="date" class="form-control" name="date_of_birth" placeholder="Your birthday" required="">
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Company or Organization</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-building" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" value="<?php echo $v_company; ?>"  id="register_company" type="text" class="form-control" name="register_company" placeholder="Company or Organization name" required="">
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
                        <input id="register_address" value="<?php echo $v_address; ?>" style="color: #a4509f;" type="textarea" class="form-control" name="register_address" placeholder="Your current address" required="">
                    </div>
                  </div>
              </div>
              <!-- row 2 -->
              <div class="col-lg-4">
                  <div class="form-group">
                    <label for="username" style="color: #a4509f;  text-transform: capitalize;">Cell Phone</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone" style="color: #a4509f;"></i></span>
                        <input id="cell_phone" value="<?php echo $v_cell_phone; ?>" style="color: #a4509f;" type="text" class="form-control" name="cell_phone" placeholder="(+855) 012345678" required="">
                    </div>
                  </div>
              </div>
              <!-- row 3 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Email</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" value="<?php echo $v_email; ?>" id="register_email" type="email" class="form-control" name="register_email" placeholder="Your business email" required="">
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
                        <?php if($user_add_bye==$user_id_from_login) { ?>
                          <span class="input-group-addon"><i class="fas fa-address-card" style="color: #a4509f;"></i></span>
                          
                          <input type="file" id="register_passport" style="color: #a4509f;" class="form-control form-control-sm" name="register_passport" placeholder="">
                      <?php } ?>
                      </div>
                      <?php 
                          if( ($user_position=="2") && ($user_add_bye >0)) {
                      ?>
                    <img style="width:100%;" src="../image/img_customer/<?php echo $user_passport; ?>" alt="<?php echo $user_passport; ?>">
                      <?php } 
                         elseif (($user_position=="2") && ($user_add_bye=="0")) { 
                       ?>
                       <img style="width:100%;" src="../../../system/img/img_customer/<?php echo $user_passport; ?>" alt="<?php echo $user_passport; ?>">
                       <?php }
                        elseif (($user_position=="3") && ($user_add_bye >0)) { 
                        ?>
                       <img style="width:100%;" src="../image/img_partner/<?php echo $user_passport; ?>" alt="<?php echo $user_passport; ?>">
                        <?php }
                         elseif (($user_position=="3") && ($user_add_bye=="0")) { 
                         ?>
                        <img style="width:100%;" src="../../../system/img/img_partner/<?php echo $user_passport; ?>" alt="<?php echo $user_passport; ?>">
                         <?php
                            }
                            else { echo "";} 
                     ?>
                    </div>
                </div>
                <!-- row 2 -->
                <div class="col-lg-4">
                    <div class="form-group">
                      <label for="username" style="color: #a4509f;  text-transform: capitalize;">Driver's License</label>
                      <div class="input-group">
                        <?php if($user_add_bye==$user_id_from_login) { ?>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-road" style="color: #a4509f;"></i></span>
                          
                          <input id="driver_license" style="color: #a4509f;" type="file" class="form-control" name="register_driver_license" placeholder="your driver license">
                          <?php } ?>
                       </div>
                       <?php 
                          if( ($user_position=="2") && ($user_add_bye >0)) {
                      ?>
                    <img style="width:100%;" src="../image/img_customer/<?php echo $user_driver_licence; ?>" alt="<?php echo $user_driver_licence; ?>">
                      <?php } 
                         elseif (($user_position=="2") && ($user_add_bye=="0")) { 
                       ?>
                       <img style="width:100%;" src="../../../system/img/img_customer/<?php echo $user_driver_licence; ?>" alt="<?php echo $user_driver_licence; ?>">
                       <?php }
                        elseif (($user_position=="3") && ($user_add_bye >0)) { 
                        ?>
                       <img style="width:100%;" src="../image/img_partner/<?php echo $user_driver_licence; ?>" alt="<?php echo $user_driver_licence; ?>">
                        <?php }
                         elseif (($user_position=="3") && ($user_add_bye=="0")) { 
                         ?>
                        <img style="width:100%;" src="../../../system/img/img_partner/<?php echo $user_driver_licence; ?>" alt="<?php echo $user_driver_licence; ?>">
                         <?php
                            }
                            else { echo "";} 
                     ?>
                    </div>
                </div>
                <!-- row 3 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Your Photo (4 X 6)</label>
                    <div class="input-group">
                      <?php if($user_add_bye==$user_id_from_login) { ?>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-picture" style="color: #a4509f;"></i></span>
                      
                      <input style="color: #a4509f;" id="register_photo" type="file" class="form-control" name="register_photo" placeholder="Profile picture (4 X 6)">
                    <?php } ?>
                    </div>
                    <?php 
                          if( ($user_position=="2") && ($user_add_bye >0)) {
                      ?>
                    <img style="width:100%;" src="../image/img_customer/<?php echo $user_photo; ?>" alt="<?php echo $user_photo; ?>">
                      <?php } 
                         elseif (($user_position=="2") && ($user_add_bye=="0")) { 
                       ?>
                       <img style="width:100%;" src="../../../system/img/img_customer/<?php echo $user_photo; ?>" alt="<?php echo $user_photo; ?>">
                       <?php }
                        elseif (($user_position=="3") && ($user_add_bye >0)) { 
                        ?>
                       <img style="width:100%;" src="../image/img_partner/<?php echo $user_photo; ?>" alt="<?php echo $user_photo; ?>">
                        <?php }
                         elseif (($user_position=="3") && ($user_add_bye=="0")) { 
                         ?>
                        <img style="width:100%;" src="../../../system/img/img_partner/<?php echo $user_photo; ?>" alt="<?php echo $user_photo; ?>">
                         <?php
                            }
                            else { echo "";} 
                     ?>
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
                        <input id="username" value="<?php echo $v_register_username; ?>" style="color: #a4509f;" type="text" class="form-control" name="txt_register_username" placeholder="Your Username for login system" required="">
                    </div>
                  </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Password</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" id="register_password" type="password" class="form-control" name="txt_register_password" placeholder="Your Password">
                  </div>
                </div>  
              </div>
             <!--  <div class="col-lg-4">
                <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Confirme Password***</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" onchange="confirmPassword()" id="confirme_password" type="password" class="form-control" name="txt_confirme_password" placeholder="type your password again" required="">
                  </div>
                  <span id="show_match" style="display: none; padding: 5px; font-size: 14px; margin:5px;" class="alert alert-dismissable alert-danger">Your password doesn't match.</span>
                </div>  
              </div> -->
          </div>
          <!-- finished account -->
          <!-- last row -->
          <div class="row">
            <div class="col-lg-8">
              <div class="form-group">
                  <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Website</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-globe-americas" style="color: #a4509f;"></i></span>
                    <input style="color: #a4509f;" value="<?php echo $v_website; ?>" id="password" type="text" class="form-control" name="website_address" placeholder="your company website or your own (www.example.com)" required="">
                  </div>
                </div>
            </div>
            <div class="col-lg-4">
              <label style="color: white;">Submit new account</label>
              <input class="form-control btn"  id="btn_register" style="background-color: #a4509f; color: white;" type="submit" name="btn_register" value="Register">
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
