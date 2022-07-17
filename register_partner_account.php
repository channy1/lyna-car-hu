<!-- header included  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
    session_start();
    include_once('system/config/database.php');
    include_once("./menu_authentication.php");
    $post_step 	= "";
    $post_step 	= trim($connect->real_escape_string(@$_POST['post_step']));
    $groupid 	= trim($connect->real_escape_string(@$_POST['partner_type']));	
	if (isset($_POST["btn_partner_next"])) { 		
		$_SESSION['r_register_seft_thru'] 	= $_POST['register_seft_thru'];
		$_SESSION['r_partner_customer_id'] 	= $_POST['register_partner_customer_id'];
		$_SESSION['r_partner_introducer_id']= $_POST['register_partner_introducer_id'];
		$_SESSION['r_coupon_code'] 			= $_POST['coupon_code'];
		$_SESSION['groupid'] 				= $_POST['partner_type'];		
		if(!empty($_SESSION['groupid'])){
			header("Location: http://choicecart.xyz/carrental/register_pertner_account_process.php");
		}
	}	
	/* if (isset($_POST["btn_partner_register"])) {    
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
    } */
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
											<label class="form-control text-left" style="padding-right:10px; color:#a4509f; text-transform: capitalize;">
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
					<div class="col-md-3">
						<input class="form-control btn mt-3" style="background-color:#a4509f; color: white;" type="submit" name="btn_partner_next" id="btn_partner_next" value="Next">
					</div>
                </div>
			</form>	
                <?php } ?>
                <!-- first row -->
                <!-- second row -->
                
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