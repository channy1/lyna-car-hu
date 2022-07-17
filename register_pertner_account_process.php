<?php
    session_start();
    include_once('system/config/database.php');
    include_once("./menu_authentication.php");
    $post_step = "";
	$post_step = trim($connect->real_escape_string(@$_POST['post_step']));
	//$groupid = trim($connect->real_escape_string(@$_POST['partner_type']));
	$groupid = $_SESSION['groupid'];
	
	if (isset($_POST["btn_partner_register"])){ 
		$post_step = trim($connect->real_escape_string(@$_POST['post_step']));
		
		$target_dir = "system/img/img_partner/";    
		
		$register_driver_license = date("Ymd") . "_" . rand(1111, 9999) . "_" . basename(@$_FILES["register_partner_driver_license"]["name"]);
		
		$register_partner_passport = date("Ymd") . "_" . rand(1111, 9999) . "_" . basename(@$_FILES["register_partner_passport"]["name"]);
		
		$register_partner_idcard = date("Ymd") . "_" . rand(1111, 9999) . "_" . basename(@$_FILES["register_partner_idcard"]["name"]);
		
		$register_partner_photo = date("Ymd") . "_" . rand(1111, 9999) . "_" . basename(@$_FILES["register_partner_photo"]["name"]);

		$register_driver_license_file = $target_dir . $register_driver_license;   // DL images
		$register_passport_file 	  = $target_dir . $register_partner_passport; // PP images
		$register_idcard_file 		  = $target_dir . $register_partner_idcard;   // ID images
		// profile images
		$register_photo_file          = $target_dir . $register_partner_photo;	  // DP images
		// new photo name to store in database.		
		

		$uploadOk = 1;
		$message = '';
		$driverfiletostore = '';
		$passportfiletostore = '';
		$photofiletostore = '';
		// get data from customer form registration
		$r_partner_customer_id = trim($connect->real_escape_string(@$_POST['register_partner_customer_id']));
		
		//$r_partner_introducer_id = trim($connect->real_escape_string(@$_POST['register_partner_introducer_id']));
		$r_partner_introducer_id = $_SESSION['r_partner_customer_id'];		
		
		//$r_coupon_code = trim($connect->real_escape_string(@$_POST['coupon_code']));
		$r_coupon_code = $_SESSION['r_coupon_code'];

		$r_partner_first_name = trim($connect->real_escape_string(@$_POST['register_partner_first_name'])); 
		$_SESSION['fname'] = $r_partner_first_name;
		
		$r_partner_last_name = trim($connect->real_escape_string(@$_POST['register_partner_last_name']));
		$_SESSION['lname'] = $r_partner_last_name;
		
		$r_register_gender = trim($connect->real_escape_string(@$_POST['register_partner_gender']));
		$r_partner_title = trim($connect->real_escape_string(@$_POST['register_partner_title']));
		$r_partner_date_of_birth = trim($connect->real_escape_string(@$_POST['register_partner_date_of_birth']));
		$r_partner_company = trim($connect->real_escape_string(@$_POST['register_partner_company']));
		$r_partner_address = trim($connect->real_escape_string(@$_POST['register_partner_address']));
		$_SESSION['address'] = $r_partner_address;
		
		$r_partner_cell_phone = trim($connect->real_escape_string(@$_POST['register_partner_cell_phone']));
		$_SESSION['phone'] = $r_partner_cell_phone;
		
		$r_partner_email = trim($connect->real_escape_string(@$_POST['register_partner_email']));
		$_SESSION['email'] = $r_partner_email;
		
		$r_partner_website = trim($connect->real_escape_string(@$_POST['register_partner_website']));
		
		//$r_register_seft_thru = trim($connect->real_escape_string(@$_POST['register_seft_thru']));
		$r_register_seft_thru = $_SESSION['r_register_seft_thru'];

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
			&& @$_FILES["register_partner_idcard"]["size"] > 5000000
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
					
			//echo "hello"; exit;
			if (move_uploaded_file(@$_FILES["register_partner_driver_license"]["tmp_name"], $register_driver_license_file)
				&& move_uploaded_file(@$_FILES["register_partner_passport"]["tmp_name"], $register_passport_file)
				&& move_uploaded_file(@$_FILES["register_partner_idcard"]["tmp_name"], $register_idcard_file)
				&& move_uploaded_file(@$_FILES["register_partner_photo"]["tmp_name"], $register_photo_file)) { 	

				$driverfiletostore 	 = $register_driver_license;
				$passportfiletostore = $register_partner_passport;
				$idcardfiletostore   = $register_partner_idcard;
				$photofiletostore    = $register_partner_photo;

				echo $message;
				if ($driverfiletostore == '' && $passportfiletostore == '' && $idcardfiletostore == '' && $photofiletostore == '') {
					$message = "<script type='text/javascript'>alert('Image can not upload to server.');</script>";
					echo $message;
				} else {
					// upload file to server.
					$message = "<script type='text/javascript'>alert('prepare upload user upload to server.');</script>";
					$query = "SELECT * FROM tbl_users WHERE user_email='" . $r_partner_email . "' or user_name= '" . $r_partner_username . "' and user_position = 5";
					//echo "<pre>"; print_r($query); echo "</pre>"; exit;  
					$user = $connect->query($query);					
					
					if (mysqli_num_rows($user) == 0) {
						$stm = "INSERT INTO `tbl_users`(`user_name`,`user_password`,`user_email`,`user_photo`,`user_phone_number`,`user_gender`,`user_status`,`user_position`,`user_id_number`,`user_origination`,`user_introducer_id`,`user_first_name`,`user_last_name`,`user_address`,`user_title`,`user_birthday`,`user_passport`,`user_driver_licence`,`user_id_card`,`user_company`,`user_website`,`user_coupon_code`,`user_seft_thru`,`add_bye`,`created_at`)VALUES('$r_partner_username','$r_partner_password','$r_partner_email','$photofiletostore','$r_partner_cell_phone','$r_register_gender','1','5','$r_partner_customer_id','Register','$r_partner_introducer_id','$r_partner_first_name','$r_partner_last_name','$r_partner_address','$r_partner_title','$r_partner_date_of_birth','$passportfiletostore','$driverfiletostore','$idcardfiletostore','$r_partner_company','$r_partner_website','$r_coupon_code','$r_register_seft_thru','0',now())";

						
						if ($connect->query($stm)) {
							$partner_user_id = $connect->insert_id;
							$_SESSION['user_id'] = $partner_user_id;
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
				
					$stm = "INSERT INTO `tbl_users`(`user_name`, `user_password`, `user_email`, `user_phone_number`, `user_gender`, `user_status`, `user_id_number`, `user_origination`, `user_province`, `user_introducer_id`, `user_first_name`, `user_last_name`, `user_address`, `user_title`, `user_birthday`, `user_website`, `user_coupon_code`, `add_bye`, `user_seft_thru`, `user_position`,`created_at`) VALUES ('$r_partner_username','$r_partner_password','$r_partner_email','$r_partner_cell_phone','$r_register_gender','1','$r_partner_customer_id','Register','','$r_partner_introducer_id','$r_partner_first_name','$r_partner_last_name','$r_partner_address','user_title','$r_partner_date_of_birth','$r_partner_website','$r_coupon_code','0','$r_register_seft_thru','5',NOW())";					
					//echo "<pre>"; print_r($stm);"</pre>"; exit;					
					if ($connect->query($stm)) {
						$partner_user_id = $connect->insert_id;
						
						//header("location: ./register_pertner_account_process.php?sms=success");
					}
				}else{
					/* $sms = '<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Error!</strong> This Email Id already Exists...
							</div>'; */	
				}
				// $message = "<script type='text/javascript'>alert('Image can not move to directory.');</script>";
				// echo $message;
			}
		}
		// file to store
	}    
    if (isset($_POST['btn_partner_register31'])) {
        $_SESSION['membership'] = $_POST; 
		$user_id 		= $_SESSION['user_id'];
		$membership 	= trim($connect->real_escape_string(@$_POST['p_member']));
		$business_type 	= trim($connect->real_escape_string(@$_POST['partner_type']));
		
		$stm = "UPDATE `tbl_users` SET `user_membership`='$membership',`user_business_type`='$business_type' WHERE user_id = $user_id";
		$result = $connect->query($stm);			
    }	
    if (isset($_POST['btn_partner_register2'])) {		
        $_SESSION['service'] = $_POST;
		$user_id 		= $_SESSION['user_id'];
		
		$query 	 = "SELECT * FROM user_package_detail WHERE user_id='" . $user_id . "'";
		$package = $connect->query($query);
		if (mysqli_num_rows($package) == 0) {		
			//for($i=0; $i<count($_POST);$i++){
			for($i=0; $i<=100;$i++){
				if(!empty($_POST['myval'.$i])){				
					$packege_id =  $_POST['myval'.$i];
					$stm = "INSERT INTO `user_package_detail`(`user_id`, `packege_id`, `created_at`) VALUES ('$user_id','$packege_id',NOW())";						
					$result = $connect->query($stm);				
				}			
			}
		}else{
			$query 	 = "DELETE FROM user_package_detail WHERE user_id='" . $user_id . "'";
			$result  = $connect->query($query);
			if(!empty($result)){
				for($i=0; $i<=100;$i++){
					if(!empty($_POST['myval'.$i])){				
						//echo "<pre>"; print_r($packege_id); echo "</pre>"; exit;
						$packege_id =  $_POST['myval'.$i];
						$stm = "INSERT INTO `user_package_detail`(`user_id`, `packege_id`, `created_at`) VALUES ('$user_id','$packege_id',NOW())";					
						$result = $connect->query($stm);				
					}			
				}	
			}
		}		
    }
	if (isset($_POST['btn_partner_register33'])) {
        $_SESSION['membership'] = $_POST;  
		$user_id 		= $_SESSION['user_id'];
		$fname			= $_SESSION['fname'];
		$lname			= $_SESSION['lname'];
		$email			= $_SESSION['email'];
		$phone			= $_SESSION['phone'];
		$address		= $_SESSION['address'];
		$amount			= $_SESSION['total_amount'];		
		
		$stm = "INSERT INTO `tbl_pre_transaction_report`(`user_id`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zip`, `country`, `transaction_id`, `order_id`, `total_amount`, `tax_amount`, `discount`, `status`, `payment_type`, `created_at`) VALUES ('$user_id','$fname','$lname','$email','$phone','$address','','','','','0','0','$amount','','','','',NOW())";	
		$result = $connect->query($stm);
		if(!empty($result)){
			header("Location: http://choicecart.xyz/carrental/paynow.php");
		} 		
    }
	
	
	if (isset($_POST['btn_partner_regcoupon'])) {		
        $_SESSION['service'] = $_POST;
		$user_id 		= $_SESSION['user_id'];
		//echo "<pre>"; print_r($user_id); echo "</pre>"; exit;
		
		$query 	 = "SELECT * FROM user_package_detail WHERE user_id='" . $user_id . "'";
		$package = $connect->query($query);
		if (mysqli_num_rows($package) == 0) {
			if(!empty($_POST['register_partner_coupon'])){				
				$packege_id =  $_POST['register_partner_coupon'];
				$stm = "INSERT INTO `user_package_detail`(`user_id`, `packege_id`, `created_at`) VALUES ('$user_id','$packege_id',NOW())";					
				$result = $connect->query($stm);				
			}
		}else{
			$query 	 = "DELETE FROM user_package_detail WHERE user_id='" . $user_id . "'";
			$result  = $connect->query($query);
			if(!empty($result)){
				if(!empty($_POST['myval'.$i])){				
					$packege_id =  $_POST['register_partner_coupon'];
					$stm = "INSERT INTO `user_package_detail`(`user_id`, `packege_id`, `created_at`) VALUES ('$user_id','$packege_id',NOW())";				
					$result = $connect->query($stm);				
				}	
			}
		}		
    }
		
	
	if($groupid == 6){
?>	
	<div class="container">
		<div class="row mt-5 mb-4">
			<div class="col-md-12">
				<?= @$sms ?>
				<div class="mt-3 tab-card">
					<div class="tab-card-header">
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
									aria-controls="Three" aria-selected="false">Buying Coupon</a>
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
							<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
								<div class="row pt-3">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="form-group">
											<label for="username" style="color: #a4509f; text-transform:capitalize;">First Name</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"
													style="color: #a4509f;"></i></span>
												<input type="hidden" name="post_step" value="2">
												<input id="username" style="color: #a4509f;" type="text" class="form-control" name="register_partner_first_name" placeholder="Your first name" required>
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
												<input type="file" id="register_partner_passport" style="color: #a4509f;" class="form-control form-control-sm" name="register_partner_passport" required >
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
												<input type="file" id="register_partner_idcard"
													style="color: #a4509f;" class="form-control form-control-sm"
													name="register_partner_idcard" required>
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
												<input id="register_partner_driver_license" style="color: #a4509f;" type="file" class="form-control" name="register_partner_driver_license" required>
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
													<input style="color: #a4509f;" id="register_partner_photo" type="file" class="form-control" name="register_partner_photo"required>
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
										<input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit" name="btn_partner_register" id="btn_partner_register" value="Next">
									</div>
									<!-- End step 1 conetnt-->
								</div>
							</form>
						</div>
							<!-- End step 1-->
							<!-- Start step 2-->
							<div class="tab-pane <?php if ($post_step == "2") {
								echo "active in";
								} ?>" <?php if ($post_step == "2") { ?> id="three" <?php } else { ?> style="display:none;" <?php } ?>>
								<div class="row">
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data" style="width:100%;">
									<input type="hidden" name="post_step" value="3">
									<input type="hidden" name="partner_type" value="<?= $groupid ?>">
									<h3 class="pt-3 pb-3 text-center">Buying Coupon</h3>
									<div class="col-lg-12">
										<table class="table table-bordered">
											<thead>
												<th>Type</th>
												<th>Coupon Card</th>
												<th>Coupon Card No.</th>
												<th>QTY</th>
												<th>Box</th>
												<th>U Price</th>
												<th>Total</th>
												<th>Discount</th>
												<th>Delivery Fee</th>
												<th>Net Total</th>
											</thead>											
											<tbody>
											<?php 
												$v_sql = "SELECT * FROM tbl_coupon_code";
												$result = $connect->query($v_sql);
												$i = 1;
												if ($result->num_rows > 0) {
												while($row = $result->fetch_assoc()) { 	
													$total = $row["price"]*$row["number"];	
													$per = ($row["discount"] / 100) * $total;
													$nettotal = ($total-$per)+ $row["deliver_fee"];
											?>
												<tr>
													<td><?php echo $i; ?></td>
													<td>
														<label style="padding-right:10px;">
														<input type="radio" id="packages" name="register_partner_coupon" value="<?php echo $row["id"]; ?>">
														<img src="http://choicecart.xyz/carrental/system/img/img-coupon/Coupon_Card%20Font-4.jpg" width="100px">
														<img src="http://choicecart.xyz/carrental/system/img/img-coupon/Coupon_Card%20Font-3.jpg" width="100px">
														</label>
													</td>
													<td>CPC:2021-04-15-00001-
													CPC:2021-04-15-005001</td>
													<td><?php echo $row["number"]*100; ?></td>
													<td><?php echo $row["number"]; ?></td>
													<td><?php echo '$'.$row["price"]; ?></td>
													<td><?php echo '$'.$total; ?></td>
													<td><?php echo $row["discount"].'%'; ?></td>
													<td><?php echo '$' . ' '. $row["deliver_fee"]; ?></td>
													<td><?php echo '$'.number_format((float)$nettotal, 2, '.', ''); ?></td>
												</tr>
											<?php $i++; } }?>
											</tbody>
										</table>
									</div>
									<div class="offset-lg-8 col-lg-4">
										<input class="form-control btn mt-5" style="background-color:#a4509f; color:white;" type="submit"name="btn_partner_regcoupon" id="btn_partner_regcoupon" value="Next">
									</div>
								</form> 
								</div>
								<div class="row pt-3 pb-3">
									<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
										<input type="hidden" name="post_step" value="2">
										<input type="hidden" name="partner_type" value="<?= $groupid ?>">
										<div class="col-lg-12">
											<input class="form-control btn-sm" style="background-color: #a4509f; color: white; margin-top:-52px;" type="submit" name="btn_partner_register32" id="btn_partner_register32" value="Back">
										</div>
									</form>
								</div>
							</div>
							<!-- End step 2-->							
							<!-- Start step 4-->
							<div class="tab-pane <?php if ($post_step == "3") {
								echo "active in";
								} ?>" <?php if ($post_step == "3") { ?> id="four" <?php } else { ?> style="display:none;" <?php } ?>>
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
									<h3 class="pt-3 pb-3 text-center"> Confirm Payment</h3>			
									<table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
										<tbody>
											<tr>
												<td colspan="8"
													style="border-bottom:1px solid #ccc;text-align: left;background-color:  #7030A0;color:rgb(254, 250, 250);">
													<strong style="font-size:14px;">&nbsp;Item Information</strong>
												</td>
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
											<tr style="text-align: center">
												
											</tr>
										<?php
											$user_id = $_SESSION['user_id'];
											$query = "SELECT packege_id FROM user_package_detail WHERE user_id='" . $user_id . "'";
											$package = $connect->query($query);		
											$row 	 = $package->fetch_assoc();	
											$i = 1;
											$packege_id = $row['packege_id'];
											$p_sql = "SELECT * FROM tbl_coupon_code where id ='" . $packege_id . "'";
											$coupon = $connect->query($p_sql);
											while($row = $coupon->fetch_assoc()) {	
												$total = $row["price"]*$row["number"];
												$nettotal = ($total-$per)+ $row["deliver_fee"];
												$nettotal1 = number_format((float)$nettotal, 2, '.', '');	
											//echo "<pre>"; print_r($reslt); echo "</pre>"; //exit;
										?>
											<tr style="height:25px;border:1px!important">
												<td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i; ?></td>
												<td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
													<?php echo $row['name']; ?>
												</td>
												<td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
													<?php echo $checkout_data['period']; ?> days
												</td>
												<td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">
													<?php echo $row["number"]*100; ?> 
												</td>
												<td align="center"
													style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
													<?php echo '$'.$row["price"]; ?>
												</td>
												<td align="center"
													style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
													$<?php echo $total; ?>
												</td>
												<td align="center" style="text-align:right; padding-left:8px; width:8%;border:1px solid #000000">
													<?php echo $row["discount"].'%'; ?>
												</td>
												<td align="right"
													style="width:8%;text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px"
													nowrap="">
													<?php echo '$'. $nettotal1; ?>
												</td>
											</tr>
										<?php } ?>												
											<tr>
												<td colspan="2"></td>
												<td  align="Left" colspan="5" style="border:1px solid #000000;padding-right:5px" nowrap="">
													<b>Total Amount : </b>
												</td>
												<td align="right"
													style="text-align:right;font-weight:bold;background:blue;border:1px solid #000000;padding-right:5px;color:white;"
													nowrap="">
													<?php 
														//$totalnew = $maintenancefee+$introducer+$bankfee+$systemfee+$nettotal1;
														echo "$". number_format((float)$nettotal1, 2, '.', '');
														$_SESSION['total_amount'] = $nettotal1;		
													?>
												</td>
											</tr>
										</tbody>
									</table>
									<input type="hidden" name="post_step" value="4">
									<input type="hidden" name="partner_type" value="<?= $groupid ?>">
									<div class="offset-lg-8 col-lg-4 p-0">
										<input class="form-control btn mt-5" style="background-color: #a4509f; color: white;" type="submit"
											name="btn_partner_register33" id="btn_partner_register33" value="Checkout">
									</div>
								</form>
								<div class="row">
									<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
										<input type="hidden" name="post_step" value="3">
										<input type="hidden" name="partner_type" value="<?= $groupid ?>">
										<div class="col-lg-12">
											<input class="form-control btn" style="background-color: #a4509f; color: white; margin-top:-60px;" type="submit"
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
							<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
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
																<strong>&nbsp;Invoice Info</strong>
															</td>
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
												<strong style="font-size:14px;">&nbsp;Item Information</strong>
											</td>
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
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
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
	</div>
<?php }else{ ?>
	<div class="container">
		<div class="row mt-5 mb-4">
			<div class="col-md-12">
				<?= @$sms ?>
				<div class="mt-3 tab-card">
					<div class="tab-card-header">
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
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
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
													<input type="file" id="register_partner_idcard"
														style="color: #a4509f;" class="form-control form-control-sm"
														name="register_partner_idcard">
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
										<div class="col-lg-6 col-md-12 col-sm-12">
											<label style="color: white;">Next</label>
											<input class="form-control btn"
												style="background-color: #a4509f; color: white;" type="submit"
												name="btn_partner_register" id="btn_partner_register" value="Next">
										</div>
									</div>
								</form>
							</div>
							<!-- End step 1-->
							<!-- Start step 2-->
							<div class="tab-pane <?php if ($post_step == "1") {
								echo "active in";
								} ?>" <?php if ($post_step == "1") { ?> id="two" <?php } else { ?> style="display:none;" <?php } ?>>
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
									<input type="hidden" name="post_step" value="3">
									<input type="hidden" name="partner_type" value="<?= $groupid ?>">
									<h3 class="pt-3 pb-3"> Services Package & Posting </h3>
									<div class="col-lg-12">
									<?php
										$v_sql1 = "SELECT *  FROM tbl_posting_package where group_id=" . $groupid;
										$result1 = $connect->query($v_sql1);					
										if ($result1->num_rows > 0) {
											$i = 1;
											$j = 1;
											while ($row1 = $result1->fetch_assoc()) {	
												$v_sql = "SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON tbl_package_detail.package_id = tbl_posting_package.id where tbl_posting_package.group_id=" . $groupid . " and tbl_posting_package.id= " . $row1['id'];
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
													<td><input type="radio" name="myval<?= $row1['id'] ?>" value="<?php echo $row['p_id']; ?>"/></td>
													<td><?php echo $row['package_name']; ?></td>
													<td><?php echo $row['period']; ?></td>
													<td><?php echo $row['qty']; ?></td>
													<td><?php echo $row['price']; ?></td>
													<td><?php echo $row['total']; ?></td>
													<td><?php echo $row['discount']; ?></td>
													<td>$<?php echo $row['net_pay']; ?></td>
												</tr>
											<?php } } ?>
											</tbody>
										</table>
										<?php } } ?>
									</div>
									<div class="row">
										<div class="offset-lg-8 col-lg-4 p-0">
											<input class="form-control btn mt-5" style="background-color:#a4509f; color:white;" type="submit" name="btn_partner_register2" id="btn_partner_register2" value="Next">
										</div>
									</div>
								</form>
								<div class="row pt-2">
									<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
										<input type="hidden" name="post_step" value="2">
										<input type="hidden" name="partner_type" value="<?= $groupid ?>">
										<div class="col-lg-12">
											<input class="form-control btn-sm" style="background-color: #a4509f; color: white; margin-top:-42px;" type="submit" name="btn_partner_register32" id="btn_partner_register32" value="Back">
										</div>
									</form>
								</div>
							</div>
							<!-- End step 2-->
							<!-- Start step 3-->
							<div class="tab-pane <?php if ($post_step == "2") {
								echo "active in";
								} ?>" <?php if ($post_step == "2") { ?> id="three" <?php } else { ?> style="display:none;" <?php } ?>>
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
									<h3 class="pt-3"> Membership </h3>
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
														$v_sql = "SELECT * FROM tbl_memberships where group_id=" . $groupid;
														//echo $v_sql; die;
														$result = $connect->query($v_sql);	
														if ($result->num_rows > 0) {
															$i = 1;
															$total = "";
															while ($row = $result->fetch_assoc()) {
																?>
													<tr id="1">
														<td><input type="radio" name="p_member" value="<?php echo $row['id']; ?>"
															required /></td>
														<td><?php echo $row['membership_name']; ?></td>
														<td><?php echo $row['period']; ?></td>
														<td><?php echo $row['price']; ?></td>
														<td><?php echo $row['discount']; ?></td>
														<td><?php echo $row['net_pay']; ?></td>
													</tr>
													<?php } } ?>
												</tbody>
											</table>
										</div>
									</div>
									<p> The Vehicle’s Owner will use Credit Card or Wing Money Transfer to buy the Posting Service Packages: </p>
									<div class="col-lg-12">
										<!-- <div class="form-group">
											<div class="input-group">
												<input type="radio" name="payservice" checked value="1"/> Credit Card <br/>
												<input type="radio" name="payservice" value="1"/> Wing Account <br/>
											
											
											</div>
											</div>-->
									</div>
									<div class="row">								
										<div class="offset-lg-8 col-lg-4 p-0">
										<input type="hidden" name="post_step" value="1">
										<input type="hidden" name="partner_type" value="<?= $groupid ?>">
											<input class="form-control btn mt-5" style="background-color: #a4509f; color: white;" type="submit" name="btn_partner_register31" id="btn_partner_register31" value="Next">
										</div>										
									</div>	
								</form>
								<div class="col-lg-3 p-0">
									<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
										<input type="hidden" name="post_step" value="">
										<input type="hidden" name="partner_type" value="<?= $groupid ?>">
										<div class="col-lg-12">
											<input class="form-control btn" style="background-color: #a4509f; color: white; margin-top: -60px;" type="submit"
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
								<!--<form action="paynow.php" method="POST" role="form" enctype="multipart/form-data">-->
								<div class="row">
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data" style="width:100%;">
									<h3 class="pt-3"> Confirm Payment</h3>
									<?php
										$arr_service=array();
										$checkout_data=array();
										$count=0;
										$j=1;
										//for($i=2; $i<sizeof($_SESSION['service'])-1;$i++){
										for($i=2; $i<100;$i++){		
											$arr_service[]= $_SESSION['service']['myval'.$j];
											$j++;
										}	
										$arr_service2 = array_filter($arr_service);
										//echo "<pre>"; print_r($arr_service); echo "</pre>"; exit;		
										$v_sql1 = "SELECT *  FROM tbl_posting_package where group_id=" . $groupid;
										$result1 = $connect->query($v_sql1);					
										if ($result1->num_rows > 0) {
											$i = 1;
											$j = 1;
											while ($row1 = $result1->fetch_assoc()) {			
												$v_sql = "SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON tbl_package_detail.package_id = tbl_posting_package.id where tbl_posting_package.group_id =" . $groupid . " and tbl_posting_package.id= " . $row1['id'];		 
												$result = $connect->query($v_sql);
												if ($result->num_rows > 0) {
													$i = 1;
													$total = "";
													while ($row = $result->fetch_assoc()){
														if (in_array($row['p_id'], $arr_service2)){
															$checkout_data[$count]['package_name'] =$row['package_name'];
															$checkout_data[$count]['period'] = $row['period'];
															$checkout_data[$count]['qty'] = $row['qty'];
															$checkout_data[$count]['price'] = $row['price'];
															$checkout_data[$count]['total'] = $row['total'];
															$checkout_data[$count]['discount'] = $row['discount'];
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
										//print_r($_SESSION['service']);
									?>
									<table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float:left;" width="100%">
										<tbody>
											<tr>
												<td colspan="8" style="border-bottom:1px solid #ccc; text-align:center; background-color:  #7030A0; color:rgb(254, 250, 250); padding:10px;">
												<strong style="font-size:14px;">&nbsp;Item Information</strong>
												</td>
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
											<tr style="text-align: center">
												
											</tr>
											<?php for($i=0;$i<count($checkout_data);$i++){ ?>
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
											<tr>
												<td colspan="2"></td>
												<td align="Left" colspan="5" style="border:1px solid #000000;padding-left:5px" nowrap="">
												3% for the maintenance System fee : 
												</td>
												<td align="right" style="text-align:right; font-weight:bold; background:blue; border:1px solid #000000; padding-right:5px; color:white;">	
												<?php 
													$maintenancefee = ( 3/ 100) * $all_total;
													echo "$".round($maintenancefee, 2);
												?>
												</td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td align="Left" colspan="5" style="border:1px solid #000000;padding-left:5px" nowrap="">
												5% to the Introducer : 
												</td>
												<td align="right" style="text-align:right; font-weight:bold; background:blue; border:1px solid #000000; padding-right:5px; color:white;">
												<?php 
													$introducer = ( 5/ 100) * $all_total;
													echo "$".round($introducer, 2);
												?>
												</td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td align="Left" colspan="5" style="border:1px solid #000000;padding-left:5px" nowrap="">
												3.50% for the bank fee : 
												</td>
												<td align="right" style="text-align:right; font-weight:bold; background:blue; border:1px solid #000000; padding-right:5px; color:white;">
												<?php 
													$bankfee = ( 3.50/ 100) * $all_total;
													echo "$".round($bankfee, 2);
												?>
												</td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td align="Left" colspan="5" style="border:1px solid #000000;padding-left:5px" nowrap="">
												10% for the Discount System fee whenever the customer uses the coupon : 
												</td>
												<td align="right" style="text-align:right; font-weight:bold; background:blue; border:1px solid #000000; padding-right:5px; color:white;">
												<?php 
													$systemfee = ( 3.50/ 100) * $all_total;
													echo "$".round($systemfee, 2);
												?>
												</td>
											</tr>
											<tr>
												<td colspan="2"></td>
												<td align="Left" colspan="5" style="border:1px solid #000000;padding-left:5px" nowrap="">
												<b>Total Amount : </b>
												</td>
												<td align="right" style="text-align:right; font-weight:bold; background:blue; border:1px solid #000000; padding-right:5px; color:white;">
												<?php 
												$total = $maintenancefee+$introducer+$bankfee+$systemfee+$all_total;
												echo "$".round($total, 2);
												$_SESSION['total_amount']= $total;
												?>
												</td>
											</tr>
										</tbody>
									</table>
									<input type="hidden" name="post_step" value="4">
									<input type="hidden" name="partner_type" value="<?= $groupid ?>">
									<div class="row pt-2">
										<div class="offset-lg-8 col-lg-4">
											<input class="form-control btn" style="background-color: #a4509f; color: white;" type="submit" name="btn_partner_register33" id="btn_partner_register33" value="Checkout">
										</div>
									</div>
								</form>
								</div>
								<div class="row pt-2">
									<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
										<input type="hidden" name="post_step" value="1">
										<input type="hidden" name="partner_type" value="<?= $groupid ?>">
										<div class="col-lg-12">
											<input class="form-control btn" style="background-color:#a4509f; color: white; margin-top:-80px;" type="submit" name="btn_partner_register32" id="btn_partner_register32" value="Back">
										</div>
									</form>
								</div>
							</div>
						
						<!-- End step 4-->
						<!-- Start step 5-->
						<div class="tab-pane <?php if ($post_step == "4") {
							echo "active in";
							} ?>" <?php if ($post_step == "4") { ?> id="five" <?php } else { ?> style="display:none;" <?php } ?>>
							<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
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
																<strong>&nbsp;Invoice Info</strong>
															</td>
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
												<strong style="font-size:14px;">&nbsp;Item Information</strong>
											</td>
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
								<form action="register_pertner_account_process.php" method="POST" role="form" enctype="multipart/form-data">
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
		</div>
	</div>
<?php } ?>	


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
<?php require_once("footerpartner.php"); ?>