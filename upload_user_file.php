<?php
  include_once 'system/config/database.php';
  // redirect if already login
 /* if(@$_SESSION['allowLog']=="logAlready"){
      if(@$_SESSION['user']->user_position == 4){
        header("location: /customer");
      }else if(@$_SESSION['user']->user_position == 5){
       header("location: /partner");
      }else{
      header("location: /admin");
      }
  } */

  // Register new account with file upload.
  if(isset($_POST["btn_register"])) {
        // directory to store
        $target_dir = "system/img/img_customer/";

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
    
        // Check file size
        if (@$_FILES["register_driver_license"]["size"] > 5000000 && @$_FILES["register_passport"]["size"] > 5000000 && @$_FILES["register_photo"]["size"] > 500000) {
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
            if (move_uploaded_file(@$_FILES["register_driver_license"]["tmp_name"], $register_driver_license_file)
                && move_uploaded_file(@$_FILES["register_passport"]["tmp_name"], $register_passport_file) 
                && move_uploaded_file(@$_FILES["register_photo"]["tmp_name"], $register_photo_file)) {
                $message = "<script type='text/javascript'>alert('Image uploaded successfully.');</script>";
                echo $message;
                $driverfiletostore = $driver_license;
                $passportfiletostore = $passport_photo;
                $photofiletostore = $user_photo;
                if($driverfiletostore == '' && $passport_photo == '' && $photofiletostore == ''){
                    $message = "<script type='text/javascript'>alert('Image can '". $r_customer_id_no."'not upload to server.');</script>";
                    echo $message;
                }else {
                    //check exit user 
                    $query = "SELECT * FROM tbl_users WHERE user_email='".$r_register_email."' or user_name= '".$txt_register_username."' ";
                    $t=time();
                    $user = $connect->query($query);
                    if(mysqli_num_rows($user) == 0){
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
                            `add_bye`,
                            `created_at`
                        )
                        VALUES(
                            '$txt_register_username',
                            '$txt_register_password',
                            '$r_register_email',
                            '$photofiletostore',
                            '$r_cell_phone',
                            '$r_register_gender',
                            '1',
                            4,
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
                            '0',
                            '$t'
                        )";

                        //echo $stm;
                      // exit;
                        if($connect->query($stm)){
                            header("location: ./customer_login.php?sms=register_success");
                        }else{
                            header("location: ./register_customer_account.php");
                            $sms = '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Error!</strong> register Error ...
                            </div>';
                        }
                    }else {
                        header("location: ./register_customer_account.php?sms=register_faild");
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
?>