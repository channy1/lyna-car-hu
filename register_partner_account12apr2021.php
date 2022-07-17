<!-- header included  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
    session_start();
    include_once('system/config/database.php');
    include_once("./menu_authentication.php");
    $post_step = "";
    $post_step = trim($connect->real_escape_string(@$_POST['post_step']));
    $groupid = trim($connect->real_escape_string(@$_POST['partner_type']));
	
	if (isset($_POST["btn_partner_register"])) {    
		$target_dir = "system/img/img_partner/";    
		$register_driver_license = date("Ymd") . "_" . rand(1111, 9999) . "_" . basename(@$_FILES["register_partner_driver_license"]["name"]);
		$register_partner_passport = date("Ymd") . "_" . rand(1111, 9999) . "_" . basename(@$_FILES["register_partner_passport"]["name"]);
		$register_partner_photo = date("Ymd") . "_" . rand(1111, 9999) . "_" . basename(@$_FILES["register_partner_photo"]["name"]);

		$register_driver_license_file = $target_dir . $register_driver_license;
		$register_passport_file = $target_dir . $register_partner_passport;
		// profile images
		$register_photo_file = $target_dir . $register_partner_photo;
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
		$r_register_partner_province = trim(@$_POST['register_partner_province']);

		// get data type as  array of string.
		$r_partner_type = $_POST['partner_type'];

		// convert to array of integer
		$r_partner_type1 = array_map('intval', $r_partner_type);

		if (!$r_partner_introducer_id) {
			$r_coupon_code = $r_partner_customer_id;
			$r_partner_introducer_id = $r_partner_customer_id;
		}
		//echo  $r_partner_type; die;

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
				if ($driverfiletostore == '' && $passportfiletostore == '' && $photofiletostore == '') {
					$message = "<script type='text/javascript'>alert('Image can not upload to server.');</script>";
					echo $message;
				} else {
					// upload file to server.
					$message = "<script type='text/javascript'>alert('prepare upload user upload to server.');</script>";
					$query = "SELECT * FROM tbl_users WHERE user_email='" . $r_partner_email . "' or user_name= '" . $r_partner_username . "' and user_position = 5";

					$user = $connect->query($query);


					if (mysqli_num_rows($user) == 0) {
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
							'0'
						)";
						

						if ($connect->query($stm)) {
							$partner_user_id = $connect->insert_id;

							// foreach($r_partner_type as $type){
							// because admin is 1 customer is 2 so partner will start from 3 but we get value from 1 in form input.
							$type = 3;
							$stmtt = "INSERT INTO `tbl_relationship_users_position`(
									`user_id`,
									`user_position_id`)
								VALUES (
									'$partner_user_id',
									'$type'
									)";
							$success = $connect->query($stmtt);
							// }
							// check if last query success
							if ($success) {
								// header("location: ./register_partner_account.php?sms=register_success");
							} else {
								// rollback if table relationship is not insert.
								$stst = "DELETE FROM `tbl_users` WHERE `$partner_user_id`";
								$sms = '<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>Error!</strong> register Error ...
									</div>';
							}
						} else {
							$message = "<script type='text/javascript'>alert('user can't upload to database. error : " . $connect->error . "');</script>";
							// $message= 'user cant upload to database. error : "'.$connect->error.'"';
							echo $message;
						}
					} else {
						header("location: ./register_partner_account.php?sms=register_faild");
					}

				}
			} else {
				$message = "<script type='text/javascript'>alert('prepare upload user upload to server.');</script>";
				$query = "SELECT * FROM tbl_users WHERE user_email='" . $r_partner_email . "'  and user_position = '5' or user_name= '" . $r_partner_username . "'";
				
				$user = $connect->query($query);			


				if (mysqli_num_rows($user) == 0) {
					
					//$stm = "INSERT INTO `tbl_users`(`user_name`, `user_password`, `user_email`, `user_phone_number`, `group_id, `user_gender`, `user_id_number`, `user_introducer_id`, `user_first_name`, `user_last_name`, `user_address`, `user_birthday`, `user_website`, `user_coupon_code`, `user_seft_thru`, `add_bye`) VALUES('$r_partner_username', '$r_partner_password', '$r_partner_email', '$r_partner_cell_phone', '$r_partner_type', '$r_register_gender', '$r_partner_customer_id','$r_partner_introducer_id', '$r_partner_first_name', '$r_partner_last_name', '$r_partner_address', '$r_partner_date_of_birth', '$r_partner_website', '$r_coupon_code', '$r_register_seft_thru', '0')";
					
					$stm = "INSERT INTO `tbl_users`(`user_name`, `user_password`, `user_email`, `user_phone_number`, `user_gender`, `user_id_number`, `user_introducer_id`, `user_first_name`, `user_last_name`, `user_address`, `user_birthday`, `user_website`, `user_coupon_code`, `add_bye`, `user_seft_thru`, `user_position`) VALUES ('$r_partner_username','$r_partner_password','$r_partner_email','$r_partner_cell_phone','$r_register_gender','$r_partner_customer_id','$r_partner_introducer_id','$r_partner_first_name','$r_partner_last_name','$r_partner_address','$r_partner_date_of_birth','$r_partner_website','$r_coupon_code','0','$r_register_seft_thru','5')";					
					//echo "<pre>"; print_r($stm);"</pre>"; exit;	
						
					if ($connect->query($stm)) {
						$partner_user_id = $connect->insert_id;
						header("location: ./register_partner_account.php?sms=success");
					}

				}

				// $message = "<script type='text/javascript'>alert('Image can not move to directory.');</script>";
				// echo $message;
			}
		}
		// file to store
	}    
    if (isset($_POST['btn_partner_register2'])) {
        $_SESSION['service'] = $_POST;
    }    
    if (isset($_POST['btn_partner_register31'])) {
        $_SESSION['membership'] = $_POST;    
    }
    ?>
<!-- container section -->
<div class="container top_mobile" style="margin-top: 10px; padding-top: 60px; color: #a4509f !important; ">
    <div class="panel panel-default">
        <?php if(empty($post_step)){ ?>
        <div class="row mb-5">
            <div class="col-md-9 col-sm-12">
                <div class="panel-heading text-center hidden_mobile">
                    <h3 id="title_partners" style="padding-top: 0px;">
                        Partner Registration Form - Self-Registration
                    </h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 text-center">
                <a href="./register_customer_account.php" class="btn btn-sm"
                    style="color: white; background-color: #a4509f;">Switch to Customer</a>
            </div>
        </div>
        <?php } ?>
        <div class="panel-body" style="color: #a4509f !important;">
            <legend style="color: #a4509f;">Please Fill-in Your Information</legend>
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
                <?= @$sms ?>
                <input type="hidden" id="register_seft_thru" value="1" name="register_seft_thru">
                <?php if(empty($post_step)){ ?>
                <div class="row py-4">
                    <div onclick="changeYourself()" class="col-lg-4 text-center" style="text-transform:capitalize;margin:auto;">
                        <h5 class="tab-active" id="yourself" style="cursor:pointer; border:1px solid #a4509f; padding:5px; padding-left:10px; border-radius:5px;">
                            SELF-REGISTRATION
                        </h5>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-center pt-3" style="text-align:center !important">===== OR =====</p>
                    </div>
                    <div onclick="changeIntroducer()" class="col-lg-4 text-center"
                        style=" text-transform: capitalize ;margin: auto;">
                        <h5 id="introducer"
                            style="cursor: pointer;border: 1px solid #a4509f; color: #a4509f;padding: 5px; padding-left: 10px;border-radius: 5px;">
                            THRU INTRODUCER
                        </h5>
                    </div>
                </div>
                <!-- introducer and yourself row -->
                <div id="showyourself" class="row" style="margin-bottom: 15px;">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Your ID N&deg;
                            :</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                <i class="fa fa-id-card" style="color: #a4509f;"></i>
                                </span>
                                <input style="color:#a4509f;" class="form-control" id="customer_id_no1" name="register_partner_customer_id" value="<?php echo 'PN' . date("Ymd") . '' . rand(10, 1000000); ?>"placeholder="Click Here to get your ID No." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for=""> </label>
                        <p class="text-center pt-4" style="font-size: 14px;">*Note: Please always remember your ID N&deg;</p>
                    </div>
                    <div class="col-sm-4">
                        <div id="byintroducer" style="color: #a4509f; display: none;" class="form-group intro_duccer">
                            <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Introducer's
                            ID N&deg;</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"
                                    style="color: #a4509f;"></i></span>
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
                        <div id="byintroducer" style="color: #a4509f; display: none;" class="form-group capun_code">
                            <label for="customer_id" style="color: #a4509f;  text-transform: capitalize;">Coupon Card N&deg;</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-id-card"
                                    style="color: #a4509f;"></i></span>
                                <input style="color: #a4509f;" placeholder="Key-in the Introducer's Coupon Card N&deg"
                                    class="form-control" name="coupon_code">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-4">
                    <div class="col-sm-12">
                        <fieldset style="border: 1px solid #a4509f;">
                            <legend style="background: none; text-align: center; width: 300px; color: #a4509f;">
                                <span>Choose Business Type</span>
                            </legend>
                            <div style="padding: 10px;">
                                <div class="row">
                                    <?php 
                                        $v_sql = "SELECT *  FROM tbl_usergroup where group_type=1 ";
                                        $result = $connect->query($v_sql);						
                                        if ($result->num_rows > 0) {
                                        	$i = 1;											
                                        	while ($row = $result->fetch_assoc()) { ?>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-control text-left"
                                                style="padding-right: 10px; color: #a4509f;  text-transform: capitalize;">
                                            <input type="radio" style="color:#a4509f;" id="packages" name="partner_type" value="<?= $row['id'] ?>" <?php if ($groupid == $row['id']) { echo 'checked'; } ?> required>
                                            <?= $row['group_name'] ?>
                                            </label>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <?php } ?>
                <!-- first row -->
                <!-- second row -->
                <div class="row">
                    <div class="col-md-12">
                        <!--<div class="card mt-3 tab-card">-->
                        <div class="mt-3 tab-card">
                            <div class="tab-card-header">
                            <!--<div class="card-header tab-card-header">-->
                                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                    <li <?php if (empty(@$post_step)) {
                                        echo "class='active'";
                                        } ?>>
                                        <a class="nav-link" id="li_one" data-toggle="tab" href="#one" role="tab"
                                            aria-controls="One" aria-selected="true">Personal Info</a>
                                    </li>
                                    <li <?php if (@$post_step == "2") {
                                        echo "class='active'";
                                        } ?>>
                                        <a class="nav-link" id="li_three" data-toggle="tab" href="#three" role="tab"
                                            aria-controls="Three" aria-selected="false">Buying Membership</a>
                                    </li>
                                    <li <?php if (@$post_step == "1") {
                                        echo "class='active'";
                                        } ?>>
                                        <a class="nav-link" id="li_two" data-toggle="tab" href="#two" role="tab"
                                            aria-controls="Two" aria-selected="false">Buying Package Service</a>
                                    </li>
                                    <li <?php if (@$post_step == "3") {
                                        echo "class='active'";
                                        } ?>>
                                        <a class="nav-link" id="li_four" data-toggle="tab" href="#four" role="tab"
                                            aria-controls="Three" aria-selected="false">Confirm Payment</a>
                                    </li>
                                    <li <?php if (@$post_step == "4") {
                                        echo "class='active'";
                                        } ?>>
                                        <a class="nav-link" id="li_five" data-toggle="tab" href="#five" role="tab"
                                            aria-controls="Three" aria-selected="false">Pay Now</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent" style="margin-top:10px;">
                                    <div class="tab-pane <?php if (empty($post_step)) {
                                        echo "in active"; }?>" <?php if (!empty($post_step) && $post_step == "4") { ?> id="one" <?php } ?>>
                                        <div class="row pt-3">
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
													<label for="username" style="color: #a4509f; text-transform:capitalize;">First Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"
                                                            style="color: #a4509f;"></i></span>
                                                        <input type="hidden" name="post_step" value="2">
                                                        <input id="username" style="color: #a4509f;" type="text"
                                                            class="form-control" name="register_partner_first_name"
                                                            placeholder="Your first name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Last
                                                    Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="username" style="color: #a4509f;" type="text"
                                                            class="form-control" name="register_partner_last_name"
                                                            placeholder="Your last name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Gender</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-venus-mars"
                                                            style="color: #a4509f;"></i></span>
                                                        <select name="register_partner_gender" class="form-control"
                                                            style="color: #a4509f;">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Date of
                                                    Birth</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-calendar-alt"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="username" style="color: #a4509f;" type="date"
                                                            class="form-control" name="register_partner_date_of_birth"
                                                            placeholder="Your birthday" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Place of
                                                    Birth</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="username" style="color: #a4509f;" type="text"
                                                            class="form-control"
                                                            name="register_partner_title" placeholder="Place of Birth"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Address</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-home"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="register_address" style="color: #a4509f;" type="textarea"
                                                            class="form-control" name="register_partner_address"
                                                            placeholder="Your current address" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <label style="color:#a4509f;">Province Name</label>
                                                <select name="register_partner_province" class="form-control"
                                                    style="color: #a4509f;">
                                                    <option value="">=== Other ===</option>
                                                    <?php
                                                        $v_sql = "SELECT * FROM tbl_province ";
                                                        $result = $connect->query($v_sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                        
                                                                ?>
                                                    <option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                                                    <?php
                                                        }
                                                        }
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Tel.No.1</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="cell_phone" style="color: #a4509f;" type="text"
                                                            class="form-control" name="register_partner_cell_phone"
                                                            placeholder="(+855) 012345678" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Tel.No.2</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="cell_phone" style="color: #a4509f;" type="text"
                                                            class="form-control" name="register_partner_cell_phone"
                                                            placeholder="(+855) 012345678" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Tel.No.3</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="cell_phone" style="color: #a4509f;" type="text"
                                                            class="form-control" name="register_partner_cell_phone"
                                                            placeholder="(+855) 012345678" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">E-mail</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                            class="fa fa-envelope"
                                                            style="color: #a4509f;"></i></span>
                                                        <input style="color: #a4509f;" id="register_email" type="email"
                                                            class="form-control" name="register_partner_email"
                                                            placeholder="Your business email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Website</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-globe"
                                                            style="color: #a4509f;"></i></span>
                                                        <input style="color: #a4509f;" id="password" type="text"
                                                            class="form-control" name="register_partner_website"
                                                            placeholder="Your company website or your own (www.example.com)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Passport
                                                    Insert</label>
                                                    <div class="input-group" style=" padding-top: -15px;">
                                                        <span class="input-group-addon"><i class="fa fa-address-card"
                                                            style="color: #a4509f;"></i></span>
                                                        <input type="file" id="register_partner_passport"
                                                            style="color: #a4509f;" class="form-control form-control-sm"
                                                            name="register_partner_passport" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">ID
                                                    Card</label>
                                                    <div class="input-group" style=" padding-top: -15px;">
                                                        <span class="input-group-addon"><i class="fa fa-address-card"
                                                            style="color: #a4509f;"></i></span>
                                                        <input type="file" id="register_partner_passport"
                                                            style="color: #a4509f;" class="form-control form-control-sm"
                                                            name="register_partner_passport" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Driver's
                                                    License</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-road"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="register_partner_driver_license" style="color: #a4509f;"
                                                            type="file"
                                                            class="form-control" name="register_partner_driver_license"
                                                            placeholder="your driver license">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Your
                                                    Photo (4 X 6)</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                            class="fa fa-picture"
                                                            style="color: #a4509f;"></i></span>
                                                        <input style="color: #a4509f;" id="register_partner_photo"
                                                            type="file" class="form-control"
                                                            name="register_partner_photo"
                                                            placeholder="Profile picture (4 X 6)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username"
                                                        style="color: #a4509f;  text-transform: capitalize;">Username***</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"
                                                            style="color: #a4509f;"></i></span>
                                                        <input id="username" style="color: #a4509f;" type="text"
                                                            class="form-control" name="register_partner_username"
                                                            placeholder="Your Username for login system" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Password***</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-lock"
                                                            style="color: #a4509f;"></i></span>
                                                        <input style="color: #a4509f;" id="register_partner_password"
                                                            type="password" class="form-control"
                                                            name="register_partner_password" placeholder="Your Password"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="pwd" style="color: #a4509f;  text-transform: capitalize;">Confirm
                                                    Password***</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-lock"
                                                            style="color: #a4509f;"></i></span>
                                                        <input style="color: #a4509f;" onchange="confirmPassword()"
                                                            id="register_partner_confirme_password" type="password"
                                                            class="form-control"
                                                            name="register_partner_confirme_password"
                                                            placeholder="Your Comfirm Password" required>
                                                    </div>
                                                    <span id="show_match"
                                                        style="display: none; padding: 5px; font-size: 14px; margin:5px;"
                                                        class="alert alert-dismissable alert-danger">Your password doesn't match.</span>
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-4">
                                                </div>-->
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <label style="color: white;">Next</label>
                                                <input class="form-control btn"
                                                    style="background-color: #a4509f; color: white;" type="submit"
                                                    name="btn_partner_register" id="btn_partner_register" value="Next">
                                            </div>
            </form>
            <!-- End step 1 conetnt-->
            </div>
            </div>
            <!-- End step 1-->
            <!-- Start step 2-->
            <div class="tab-pane <?php if ($post_step == "1") {
                echo "active in";
                } ?>" <?php if ($post_step == "1") { ?> id="two" <?php } else { ?> style="display:none;" <?php } ?>>
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="post_step" value="3">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <h2> Services Package & Posting </h2>
            <div class="col-lg-12">
            <?php
                $v_sql1 = "SELECT *  FROM tbl_posting_package where group_id=" . $groupid;
                $result1 = $connect->query($v_sql1);
                
                if ($result1->num_rows > 0) {
                    $i = 1;
                    $j = 1;
                    while ($row1 = $result1->fetch_assoc()) {
                
                        $v_sql = "SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON
                tbl_package_detail.package_id=tbl_posting_package.id where tbl_posting_package.group_id=" . $groupid . " and tbl_posting_package.id= " . $row1['id'];
                        // echo $v_sql;
                        ?>
            <table class="table table-bordered">
            <tbody>
            <tr>
            <th>Action</th>
            <th>System Package</th>
            <th>Period</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Net Pay</th>
            </tr>
            <?php
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    $i = 1;
                    $total = "";
                    while ($row = $result->fetch_assoc()) {
                        $sub = $row['price'] * ($row['discount']) / 100;
                        $total = $row['price'] - $sub;
                        ?>
            <tr id="1">
            <td><input type="radio" name="myval<?= $row1['id'] ?>"
                value="<?php echo $row['p_id']; ?>"/></td>
            <td><?php echo $row['package_name']; ?></td>
            <td><?php echo $row['period']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['total']; ?></td>
            <td><?php echo $row['discount']; ?></td>
            <td>$<?php echo $row['net_pay']; ?></td>
            </tr>
            <?php }
                } ?>
            </tbody>
            </table>
            <?php }
                } ?>
            </div>
            <div class="col-lg-4">
            <input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit"
                name="btn_partner_register2" id="btn_partner_register2" value="Next">
            </div>
            </form>
            <div class="row">
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="post_step" value="2">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <div class="col-lg-12">
            <input class="form-control btn-sm" style="background-color: #a4509f; color: white;" type="submit" name="btn_partner_register32" id="btn_partner_register32" value="Back">
            </div>
            </form>
            </div>
            </div>
            <!-- End step 2-->
            <!-- Start step 3-->
            <div class="tab-pane <?php if ($post_step == "2") {
                echo "active in";
                } ?>" <?php if ($post_step == "2") { ?> id="three" <?php } else { ?> style="display:none;" <?php } ?>>
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
            <h2> Membership </h2>
            <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table table-bordered">
            <tbody>
            <tr>
            <th>Action</th>
            <th>System Package</th>
            <th>Period</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Net Pay</th>
            </tr>
            <?php
                $v_sql = "SELECT  *  FROM tbl_memberships where group_id=" . $groupid;
                //echo $v_sql; die;
                $result = $connect->query($v_sql);
                
                if ($result->num_rows > 0) {
                    $i = 1;
                    $total = "";
                    while ($row = $result->fetch_assoc()) {
                        ?>
            <tr id="1">
            <td><input type="radio" name="p_member" value="<?php echo $row['id']; ?>"
                required/></td>
            <td><?php echo $row['membership_name']; ?></td>
            <td><?php echo $row['period']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['discount']; ?></td>
            <td><?php echo $row['net_pay']; ?></td>
            </tr>
            <?php }
                } ?>
            </tbody>
            </table>
            </div>
            </div>
            <p> The Vehicle’s Owner will use Credit Card or Wing Money Transfer to buy
            the Posting Service Packages: </p>
            <div class="col-lg-12">
            <!-- <div class="form-group">
                <div class="input-group">
                    <input type="radio" name="payservice" checked value="1"/> Credit Card <br/>
                    <input type="radio" name="payservice" value="1"/> Wing Account <br/>
                
                
                </div>
                </div>-->
            </div>
            <input type="hidden" name="post_step" value="1">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <div class="col-lg-4">
            <input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit"
                name="btn_partner_register31" id="btn_partner_register31" value="Next">
            </div>
            </form>
            <div class="row">
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="post_step" value="">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <div class="col-lg-12">
            <input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit"
                name="btn_partner_register32" id="btn_partner_register32" value="Back">
            </div>
            </form>
            </div>
            </div>
            <!-- End step 3-->
            <!-- Start step 4-->
            <div class="tab-pane <?php if ($post_step == "3") {
                echo "active in";
                } ?>" <?php if ($post_step == "3") { ?> id="four" <?php } else { ?> style="display:none;" <?php } ?>>
            <form action="paynow.php" method="POST" role="form" enctype="multipart/form-data">
            <h2> Confirm Payment</h2>
            <?php
                $arr_service=array();
                $checkout_data=array();
                $count=0;
                $j=1;
                for($i=2; $i<sizeof($_SESSION['service'])-1;$i++){
                
                    $arr_service[]= $_SESSION['service']['myval'.$j];
                    $j++;
                }
                
                 $v_sql1 = "SELECT *  FROM tbl_posting_package where group_id=" . $groupid;
                     $result1 = $connect->query($v_sql1);
                
                     if ($result1->num_rows > 0) {
                         $i = 1;
                         $j = 1;
                         while ($row1 = $result1->fetch_assoc()) {
                
                             $v_sql = "SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON
                tbl_package_detail.package_id=tbl_posting_package.id where tbl_posting_package.group_id=" . $groupid . " and tbl_posting_package.id= " . $row1['id'];
                
                
                        $result = $connect->query($v_sql);
                                 if ($result->num_rows > 0) {
                                     $i = 1;
                                     $total = "";
                                     while ($row = $result->fetch_assoc()) {
                
                                         if (in_array($row['p_id'], $arr_service))
                                         {
                                             $checkout_data[$count]['package_name']=$row['package_name'];
                                             $checkout_data[$count]['period']=$row['period'];
                                             $checkout_data[$count]['qty']=$row['qty'];
                                             $checkout_data[$count]['price']=$row['price'];
                                             $checkout_data[$count]['total']=$row['total'];
                                             $checkout_data[$count]['discount']=$row['discount'];
                                             $count++;
                                         }
                                     }
                                 }
                
                
                
                         }
                     }
                
                
                $v_sql = "SELECT  *  FROM tbl_memberships where group_id=" . $groupid;
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    $i = 1;
                    $total = "";
                    while ($row = $result->fetch_assoc()) {
                
                        if($row['id']==$_SESSION['membership']['p_member']){
                
                            $checkout_data[$count]['package_name']=$row['membership_name'];
                            $checkout_data[$count]['period']=$row['period'];
                            $checkout_data[$count]['qty']=$row['qty'];
                            $checkout_data[$count]['price']=$row['price'];
                            $checkout_data[$count]['total']=$row['total'];
                            $checkout_data[$count]['discount']=$row['discount'];
                
                        }
                        }
                }
                 // print_r($_SESSION['service']);
                ?>
            <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
            <tbody>
            <tr>
            <td colspan="8"
                style="border-bottom:1px solid #ccc;text-align: left;background-color:  #7030A0;color:rgb(254, 250, 250);">
            <strong style="font-size:14px;">&nbsp;Item Information</strong></td>
            </tr>
            <tr>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="5%"
                class="aa text-center">No
            </th>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="48%"
                class="aa text-center">Items Description
            </th>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="8%"
                class="aa text-center">Period QTY
            </th>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="5%"
                class="aa text-center">QTY
            </th>
            <th style="background-color:#7030A0;color:white" colspan="4" width="8%"
                class="aa text-center">
            </th>
            </tr>
            <tr style="text-align: center">
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">Price
            </th>
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">Total
            Price
            </th>
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">
            Discount
            </th>
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%"
                nowrap="nowrap">Amount
            </th>
            </tr>
            <?php
                for($i=0;$i<count($checkout_data);$i++){
                ?>
            <tr style="height:25px;border:1px!important">
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i+1; ?></td>
            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
            <?php echo $checkout_data[$i]['package_name']; ?>
            </td>
            <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
            <?php echo $checkout_data[$i]['period']; ?> days
            </td>
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000"><?php
                if(empty($checkout_data[$i]['qty'])){
                  $qty= '1';
                }else {
                   $qty= $checkout_data[$i]['qty'];
                }
                echo $qty;
                ?></td>
            <td align="center"
                style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            $<?php echo $checkout_data[$i]['price']; ?>
            </td>
            <td align="center"
                style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            <?php
                if(empty($checkout_data[$i]['total'])){
                $total=$checkout_data[$i]['price'];
                }else {
                    $total=$checkout_data[$i]['total'];
                }
                echo "$".$total;
                ?>
            </td>
            <td align="center"
                style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo $checkout_data[$i]['discount']; ?>%
            </td>
            <td align="right"
                style="width:8%;text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px"
                nowrap="">
            <?php  $t=$total-($total*$checkout_data[$i]['discount'])/100;
                echo "$".$t;
                   $all_total=$t+$all_total;
                ?>
            </td>
            </tr>
            <?php } ?>
            <!-- <tr style="height:25px;border:1px!important">
                <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">2</td>
                <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">RENT A CAR FOR
                    SELF-DRIVE
                </td>
                <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">1 Year</td>
                <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">2</td>
                <td align="center"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$ 50.00
                </td>
                <td align="center"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$ 100.00
                </td>
                <td align="center"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">10.00%
                </td>
                
                <td align="right"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$90.00
                </td>
                </tr>
                
                <tr style="height:25px;border:1px!important">
                <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">3</td>
                <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">AIRPORT
                    TRANSFER
                </td>
                <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">1 Year</td>
                <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">2</td>
                <td align="center"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$50.00
                </td>
                <td align="center"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$ 100.00
                </td>
                <td align="center"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">10.00%
                </td>
                
                
                <td align="right"
                    style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$90.00
                </td>
                </tr>-->
            <!-- <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">
                    &nbsp;1. Total Rental Fee:
                </td>
                <td align="right"
                    style="text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px"
                    nowrap="">&nbsp;
                
                </td>
                </tr>-->
            <!-- <tr>
                <td colspan="4" rowspan="5" style="font-size:10px;">
                    <b style="color:#7030A0">NOTICES:</b><br>
                    <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be
                        paid after the rental period</b><br>
                
                
                </td>
                <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">
                    &nbsp;2. Service Charge (3%):
                </td>
                <td align="right" style="text-align:right;border:1px solid #000000;padding-right:5px;"
                    nowrap="">$6.75
                </td>
                </tr>-->
            <tr >
            <td  align="Left" colspan="7" style="border:1px solid #000000;padding-right:5px" nowrap="">
            <b>Total Amount : </b>
            </td>
            <td align="right"
                style="text-align:right;font-weight:bold;background:blue;border:1px solid #000000;padding-right:5px;color:white;"
                nowrap=""><?php echo "$".$all_total;
                $_SESSION['total_amount']=$all_total;
                
                ?>
            </td>
            </tr>
            </tbody>
            </table>
            <input type="hidden" name="post_step" value="4">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <div class="col-lg-4">
            <input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit"
                name="btn_partner_register31" id="btn_partner_register31" value="Checkout">
            </div>
            </form>
            <div class="row">
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="post_step" value="1">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <div class="col-lg-12">
            <input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit"
                name="btn_partner_register32" id="btn_partner_register32" value="Back">
            </div>
            </form>
            </div>
            </div>
            </div>
            <!-- End step 4-->
            <!-- Start step 5-->
            <div class="tab-pane <?php if ($post_step == "4") {
                echo "active in";
                } ?>" <?php if ($post_step == "4") { ?> id="five" <?php } else { ?> style="display:none;" <?php } ?>>
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
            <h2> INVOICE / RECIPT </h2>
            <h4> The Vehicle’s Owner will see his/her Invoice here: </h4>
            <table id="exportExcel" style="border-collapse:collapse;font-size: 12px;" width="100%">
            <tbody>
            <tr>
            <th>
            <table style="border-collapse:collapse;font-size: 12px; width:100% ;text-align: left; padding:5px; line-height: 14px;"
                cellpadding="5 ">
            <tbody>
            <tr style="line-height: 17px;">
            <td colspan="4"
                style="border-bottom:1px solid #ccc;text-align: left;background-color: #7030A0;color:rgb(254, 250, 250);">
            <strong>&nbsp;Invoice Info</strong></td>
            </tr>
            <tr>
            <td style="width:18%">&nbsp;For :</td>
            <td>adwait03</td>
            <td style="width:18%">&nbsp;Contact Number :</td>
            <td>
            +91-123456788
            </td>
            </tr>
            <tr>
            <td style="width:18%">&nbsp;Email Id :</td>
            <td>
            gupta.adwait@gmail.com
            </td>
            <td>Address :</td>
            <td>
            phnom penh
            </td>
            </tr>
            <tr>
            <td style="width:18%">&nbsp; Date Time</td>
            <td>
            2020-01-30 13:59
            </td>
            </tr>
            </tbody>
            </table>
            </th>
            </tr>
            <tr>
            </tr>
            </tbody>
            </table>
            <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
            <tbody>
            <tr>
            <td colspan="8"
                style="border-bottom:1px solid #ccc;text-align: left;background-color:  #7030A0;color:rgb(254, 250, 250);">
            <strong style="font-size:14px;">&nbsp;Item Information</strong></td>
            </tr>
            <tr>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="5%" class="aa text-center">
            No
            </th>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="48%" class="aa text-center">
            Items Description
            </th>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="8%" class="aa text-center">
            Period QTY
            </th>
            <th style="background-color:#7030A0;color:white" rowspan="2" width="5%" class="aa text-center">
            QTY
            </th>
            <th style="background-color:#7030A0;color:white" colspan="4" width="8%" class="aa text-center">
            Price In US$
            </th>
            </tr>
            <tr style="text-align: center">
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">Price</th>
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">Total Price
            </th>
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">Discount</th>
            <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%"
                nowrap="nowrap">Amount
            </th>
            </tr>
            <tr style="height:25px;border:1px!important">
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">1</td>
            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">PLATINUM
            MEMBERSHIP
            </td>
            <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
            1 Year
            </td>
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            $50
            </td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            $50
            </td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            10.00%
            </td>
            <td align="right"
                style="width:8%;text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px"
                nowrap="">
            $45
            </td>
            </tr>
            <tr style="height:25px;border:1px!important">
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">2</td>
            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">RENT A CAR FOR
            SELF-DRIVE
            </td>
            <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">1 Year</td>
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">2</td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$
            50.00
            </td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$
            100.00
            </td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            10.00%
            </td>
            <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            $90.00
            </td>
            </tr>
            <tr style="height:25px;border:1px!important">
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">3</td>
            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">AIRPORT TRANSFER
            </td>
            <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">1 Year</td>
            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">2</td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            $50.00
            </td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$
            100.00
            </td>
            <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            10.00%
            </td>
            <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
            $90.00
            </td>
            </tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1.
            Total Rental Fee:
            </td>
            <td align="right"
                style="text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px"
                nowrap="">&nbsp;$225.00
            </td>
            </tr>
            <tr>
            <td colspan="4" rowspan="5" style="font-size:10px;">
            <b style="color:#7030A0">NOTICES:</b><br>
            <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid
            after the rental period</b><br>
            </td>
            <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2.
            Service Charge (3%):
            </td>
            <td align="right" style="text-align:right;border:1px solid #000000;padding-right:5px;"
                nowrap="">$6.75
            </td>
            </tr>
            <tr>
            <td align="Left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3.
            Total Amount :
            </td>
            <td align="right"
                style="text-align:right;font-weight:bold;background:blue;border:1px solid #000000;padding-right:5px;color:white;"
                nowrap="">$231.75
            </td>
            </tr>
            </tbody>
            </table>
            <input type="hidden" name="post_step" value="4">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <div class="col-lg-4">
            <input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit"
                name="btn_partner_register31" id="btn_partner_register31" value="Paynow">
            </div>
            </form>
            <div class="row">
            <form action="register_partner_account.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="post_step" value="3">
            <input type="hidden" name="partner_type" value="<?= $groupid ?>">
            <div class="col-lg-12">
            <input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit"
                name="btn_partner_register32" id="btn_partner_register32" value="Back">
            </div>
            </form>
            </div>
            <!-- End step 5-->
            </div>
            </div>
            </div>
            </div>
            </div>
            <!--
                <br>
                <p class="text-center hidden">Or Register with social media.</p>
                <div class="row hidden">
                  <div class="col-lg-8" style="margin: auto;">
                    <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #3B5998;">
                      <i class="fab fa-facebook-f"></i> Login with Facebook
                    </a>
                    <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #55ACEE;">
                      <i class="fab fa-twitter"></i> Login with Twitter
                    </a>
                      <a href="#" class="btn" style="color: white; margin-right: 20px; background-color: #dd4b39;"><i class="fab fa-google-plus-g">
                        </i> Login with Google+
                      </a>-->
        </div>
    </div>
</div>
</div>
</div>
</div>
<style type="text/css">
    @media only screen and (max-width: 600px) {
    .top_mobile {
    padding-top: 20px !important;
    }
    }
</style>
<script>
    var $selectAll = $("input:radio[name=partner_type]");
    $selectAll.on("change", function () {    
        //alert( "Partner value: " + $(this).val() );   
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('focus', '#customer_id_no', function () {
            var cus_card = $('#customer_card').text();
            $(this).val(cus_card);
        });
    });
    
    function changeYourself() {
        $("#register_seft_thru").val("1");
        var yourself = document.getElementById("yourself");
        var introducer = document.getElementById("introducer");
        var byintroducer = document.getElementById("byintroducer");
        var title_forms = document.getElementById("title_partners");
        introducer.className = introducer.className.replace(/\btab-active\b/g, "");
        $(".intro_duccer").css("display", "none");
        $(".capun_code").css("display", "none");
    
        var name, arr;
        title_forms.innerHTML = "Partner Registration Form - Self Registration";
        yourself.style.color = "black";
        introducer.style.color = "#a4509f";
        name = "tab-active";
        // byintroducer.style.display = "block";
        arr = yourself.className.split(" ");
        if (arr.indexOf(name) == -1) {
            yourself.className += " " + name;
        }
    }
    
    function changeIntroducer() {
        $("#register_seft_thru").val("2");
        var yourself = document.getElementById("yourself");
        var introducer = document.getElementById("introducer");
        var title_forms = document.getElementById("title_partners");
        var byintroducer = document.getElementById("byintroducer");
        yourself.className = yourself.className.replace(/\btab-active\b/g, "");
        $(".intro_duccer").css("display", "block");
        $(".capun_code").css("display", "block");
        var name, arr;
        title_forms.innerHTML = "Partner Registration Form - Thru Introducer";
        byintroducer.style.display = "block";
        yourself.style.color = "#a4509f";
        introducer.style.color = "black";
        name = "tab-active";
        arr = introducer.className.split(" ");
        if (arr.indexOf(name) == -1) {
            introducer.className += " " + name;
        }
    }
    
    function confirmPassword() {
        var x = document.getElementById("register_partner_confirme_password");
        var y = document.getElementById("register_partner_password");
        var b = document.getElementById("btn_partner_register");
        var show_match = document.getElementById("show_match");
        if (x.value != y.value) {
            show_match.style.display = "block";
            b.disabled = true;
        } else {
            show_match.style.display = "none";
            b.disabled = false;
        }
    }
</script>
<!-- inlcude footer buttom -->
<?php require_once("footerpartner.php"); ?>