<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
	include_once("../../config/database.php");
    include_once '../../config/athonication.php';
	include_once("../layout/header.php");
	
	// $sql = "SELECT * FROM tbl_user_position";
	// $positions = $connect->query($sql);
	// echo "Error : ".mysqli_error($positions);
	// while($rowposition = mysqli_fetch_object($positions)){
	// 	echo "User: Position Id: ".$rowposition->up_id."  User: Position Name: ".$rowposition->up_name;
	// }

?>


<div class="portlet light bordered">
	<?php 
		// $user_id_from_login = @$_SESSION['user']->user_id;
		// $query_user = "SELECT * FROM tbl_relationship_users_position WHERE user_id='{$user_id_from_login}'";
		// $user_positions = $connect->query($query_user);
		// mysql_error($user);
		// mysqli_error($query_user);
		// if ($query_user){
		// 	// Fetch one and one row
		// 	while ($row=mysqli_fetch_row($query_user))
		// 	{
		// $cover_image = "";
		// if($row[1] == 1 && @$_SESSION['user']->user_position == 1){
		// 	echo 'User is Admin';
		// }else if($row[1] == 2 && @$_SESSION['user']->user_position == 2){
		// 	echo 'User is Customer';
		// }else{
		// 	echo 'User is Partner.';
		// }
		// 	}
		// 	// Free result set
		// }else{
		// 	echo 'Error '.$connect->getMessage();
		// }
		// mysqli_close($connect);	
	?>
	<br>
	<div class="portlet light bordered">
		<div class="row">
			<div class="col-xs-12">
				<?= @$sms ?>
				<h2><i class="fa fa-user fa-fw"></i>Update Admin Profile</h2>
			</div>
		</div>
    <div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-6 panel-heading rounded-4">
					<div class="row">
						<div class="col-sm-3 margin-top-10">
							<img src="../../img/img_customer/<?php echo trim(@$_SESSION['user']->user_photo) ?>" 
				style=" width: 120px; height: 120px; box-shadow: 0 0 1px 1px rgba(0,0,0,.1); border-radius: 10px;" alt="Profile Photo">
						</div>
						<div class="col-sm-9">
							<p style=" text-transform: capitalize; margin-top: 5px; margin-bottom: 0px; font-size: 20px; font-weight: 600;">Hi! <?php echo trim(@$_SESSION['user']->user_last_name)." ". trim(@$_SESSION['user']->user_first_name) ?></p>
							<b>Username : </b> <?php echo trim(@$_SESSION['user']->user_name) ?><br>
							<b>User ID N&deg; : </b> <span> <?php echo trim(@$_SESSION['user']->user_id_number) ?> </span>
							<br><b>Introducer ID N&deg; : </b> <span> <?php echo trim(@$_SESSION['user']->user_introducer_id) ?> </span>
							<br><b>Account Type : </b>
							<?php 
								if(@$_SESSION['user']->user_position == 1){
									echo "Admin";
								}else{
									echo "Normal Customer";
								} 
							?><br>
							<b>Connect with : </b><?php echo "Email Account."; ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6 rounded-4 margin-top-20">
				   <div class="row">
						<div class="col-sm-12">
							<b>Register Phone : </b> <span> <?php echo trim(@$_SESSION['user']->user_phone_number) ?> </span>	
							<br><b>Register Email : </b> <span> <?php echo trim(@$_SESSION['user']->user_email) ?> </span>
							<br><b>Account Status : </b> <span> 
							<?php 
								if(@$_SESSION['user']->user_status == "1"){
									echo "Active Account.";
								}else if(@$_SESSION['user']->user_status == "2"){
									echo "Inactive Account.";
								}else {
									echo "Pending Account.";
								}
							?> </span>
							<br><b>Register Email : </b> <span> <?php echo trim(@$_SESSION['user']->user_email) ?> </span>
						</div>
				   </div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="../dashboard/admin.php" id="sample_editable_1_new" style="background-color: #a4509f;" class="btn font-white"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

     <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">ទម្រង់ធ្វើបច្ចុប្បន្នភាព</b></h3>
                <b style="font-size: 15px;">​​​​​UPDATE PROFILE</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល| HEAD OFFICE</b><br>
                <span> Address: Room No. 9C2 | 9th Floor</span> <br>
                <span>H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)</span><br>
                <span>Street 271 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia</span> <br>
                <span>Eng/Khm: +855 (0) 12 55 42 47 | +855 (0) 92 14 30 14 | English Speaker Only: +855 (0) 12 924 517</span><br>
                <span> Skype ID: lyna-carrental.com | Line/WhatsApp/Telegram/Viber/WeChat: (+855) 12 55 42 47 | 92 14 30 14 | 12 924 517</span><br>
                <span>E-mail: info@lyna-carrental.com | Website: www.Lyna-CarRental.Com</span>
        </center>
        </div>
  </div>

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><b style="color: white;">Key-in User Information</b></h3>
			</div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txt_id" value="<?= @$_SESSION['user']->user_id ?>" style="background-color:white;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white;font-size:15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">Username
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your full name...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_name" placeholder="Enter your name" 
									required="required" value="<?= @$_SESSION['user']->user_name ?>"  style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">    
                                <div class="form-group form-md-line-input">
                                	<label style="color:white;font-size:15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">E-mail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your E-mail...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_email" placeholder="Enter your email" 
									required="required" value="<?= @$_SESSION['user']->user_email ?>"  style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">    
                                <div class="form-group form-md-line-input">
                                	  <label style="color:white;font-size:15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">Gender
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your Gender...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_gender" placeholder="Enter your gender" 
									required="required" value="<?php echo @$_SESSION['user']->user_gender ?>"  style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">    
                                <div class="form-group form-md-line-input">
                                	<label style="color:white;font-size:15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">Status <span class="required" aria-required="true">*</span></label>
                                    <span class="help-block">Choose your Status here...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_gender" placeholder="Enter your gender" 
										required="required" 
										value="<?php 
													if(@$_SESSION['user']->user_status == "1"){ 
														echo "Active";
													}else if(@$_SESSION['user']->user_status == "2"){
														echo "Disable";
													}else {
														echo "Pending";
													}
												?>"  style="background-color:white;">
								
									
                                </div>
                                </div>
                        	</div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white;font-size:15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">Address Detail </label>
                                    <span class="help-block">Village, District, Province, City, Postal Code.</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_gender" placeholder="Enter your gender" 
									required="required" value="<?php echo @$_SESSION['user']->user_address ?>"  style="background-color:white;">
                                   </div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
								<div class="form-group form-md-line-input">
									<label style="color:white;font-size:15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">Old Password </label>
                                    <span class="help-block">Current Password</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_gender" placeholder="Enter your gender" 
									required="required" value="********"  style="background-color:white;">
                                    </div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
								<div class="form-group form-md-line-input">
									 <label style="color:white;font-size:15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">New Password </label>
                                    <span class="help-block">Change to new Password</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_gender" placeholder="Enter your gender" 
									required="required" value=""  style="background-color:white;">
                                   </div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">	
								<div class="form-group form-md-line-input">
									<label style="color: white;font-size: 15px;" class="col-xs-12 col-md-6 col-sm-6 col-lg-4">Phone Number</label>
                                    <span class="help-block">Change Phone Number.</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
									<input type="text" class="form-control" name="txt_gender" placeholder="Enter your gender" 
									required="required" value="<?php echo @$_SESSION['user']->user_phone_number ?>"  style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-5 text-center">
                                <button type="submit" name="btn_update_user" class="btn blue"><i class="fa fa-check fa-fw"></i>Update</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>

    <br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
  

         
        </div>
        
    </div>
</div>
<style type="text/css">
	b,span{
		color: #800080;
		font-weight: 900;
	}
</style>
<?php include_once '../layout/footer.php' ?>
