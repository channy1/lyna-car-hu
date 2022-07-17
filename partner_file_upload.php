<?php
  include_once 'system/config/database.php';

  // Register new account with file upload.
  if(isset($_POST["btn_partner_register"])) {
        $target_dir = "system/img/img_partner/";

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
        $r_register_seft_thru = trim($connect->real_escape_string(@$_POST['register_seft_thru']));
        
        $r_partner_username = trim($connect->real_escape_string(@$_POST['register_partner_username']));
        $r_partner_password = trim($connect->real_escape_string(@$_POST['register_partner_password']));
        $r_register_partner_province = trim($connect->real_escape_string(@$_POST['register_partner_province']));

        // get data type as  array of string.
        $r_partner_type = $_POST['partner_type'];
        
        // convert to array of integer
        $r_partner_type = array_map('intval', $r_partner_type);
         if(!$r_partner_introducer_id){
            $r_coupon_code = $r_partner_customer_id; 
            $r_partner_introducer_id = $r_partner_customer_id; 
        }
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
                $driverfiletostore = $register_driver_license;
                $passportfiletostore = $register_partner_passport;
                $photofiletostore = $register_partner_photo;
                echo $message;
                if($driverfiletostore == '' && $passportfiletostore == '' && $photofiletostore == ''){
                    $message = "<script type='text/javascript'>alert('Image can not upload to server.');</script>";
                    echo $message;
                }else {
                    // upload file to server.
                    $message = "<script type='text/javascript'>alert('prepare upload user upload to server.');</script>";
                    $query = "SELECT * FROM tbl_users WHERE user_email='".$r_partner_email."' or user_name= '".$r_partner_username."' and user_position = 5";
                    $user = $connect->query($query);
                    if(mysqli_num_rows($user)== 0){
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
                            `province_id`

                            )
                        VALUES(
                            '$r_partner_username',
                            '$r_partner_password',
                            '$r_partner_email',
                            '$photofiletostore',
                            '$r_partner_cell_phone',
                            '$r_register_gender',
                            '1',
                            '5',
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
                            '0',
                            '$r_register_partner_province'
                        )";
                         if($connect->query($stm)){
                            $partner_user_id = $connect->insert_id;
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
                            }
                            // check if last query success
                            if($success){
                                header("location: ./partner_login.php?sms=register_success");
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
                    }else{
                        header("location: ./register_partner_account.php?sms=register_faild");
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