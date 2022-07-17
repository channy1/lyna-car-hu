<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
	


?>


<div class="portlet light bordered">
	<?php 
	$id_user=@$_SESSION['user']->user_id;
    $query="SELECT * FROM tbl_users WHERE user_id='$id_user'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $u_txt_address = $row["user_address"];
        $u_txt_email = $row["user_email"];
        $u_txt_phone=$row["user_phone_number"];
        $u_txt_gender=$row["user_gender"];
        $u_user_name=$row["user_name"];
        $customer_type=$row["user_seft_thru"];
        $f_name=$row['user_first_name'];
        $l_name=$row["user_last_name"];
        }
    }
		if(isset($_POST['btn_update_user'])) {
			 $v_image = @$_FILES['txt_image'];

            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"],"../../img/img_partner/".$new_name);
            }else{
                $new_name = "blank.png";
            }

			$txt_name = @$connect->real_escape_string($_POST['txt_name']);
			$txt_address = @$connect->real_escape_string($_POST['txt_address']);
			$txt_email = @$connect->real_escape_string($_POST['txt_email']);
			$txt_pass = @$connect->real_escape_string($_POST['txt_pass']);
			$txt_gender = @$connect->real_escape_string($_POST['txt_gender']);
			$id_user=@$_SESSION['user']->user_id;
			$txt_phone = @$connect->real_escape_string($_POST['txt_phone']);
			$txt_fname = @$connect->real_escape_string($_POST['txt_fname']);
			$txt_lname = @$connect->real_escape_string($_POST['txt_lname']);
			if($txt_pass !="") {
				$reset=@$connect->real_escape_string($_POST['txt_pass']);
			}
			else {
				$reset=@$_SESSION['user']->user_password;
			}
			

			 if($v_image["name"] != "") {
			 	$query_add = "UPDATE tbl_users SET 
		            user_name='$txt_name',
		            user_address='$txt_address',
		            user_email='$txt_email',
		            user_password='$reset',
		            user_phone_number='$txt_phone',
		            user_gender='$txt_gender',
		            user_first_name='$txt_fname',
		            user_last_name='$txt_lname',
		            user_photo='$new_name'

		      
		            WHERE user_id='$id_user'";
		            // echo $query_add;
		            if($connect->query($query_add)==TRUE){
		                $sms = '<div class="alert alert-success">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <strong>Successfull!</strong> Data inserted...
		                </div>';
		            }else{
		                $sms = '<div class="alert alert-danger">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <strong>Error!</strong> Query error '.mysqli_error($connect).'...
		                </div>';   
		            }
			 }
			 else {
			 	$query_add = "UPDATE tbl_users SET 
		            user_name='$txt_name',
		            user_address='$txt_address',
		            user_email='$txt_email',
		            user_password='$reset',
		            user_phone_number='$txt_phone',
		            user_gender='$txt_gender',
		            user_first_name='$txt_fname',
		            user_last_name='$txt_lname'
		           

		      
		            WHERE user_id='$id_user'";
		            // echo $query_add;
		            if($connect->query($query_add)==TRUE){
		                $sms = '<div class="alert alert-success">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <strong>Successfull!</strong> Data inserted...
		                </div>';
		            }else{
		                $sms = '<div class="alert alert-danger">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                    <strong>Error!</strong> Query error '.mysqli_error($connect).'...
		                </div>';   
		            }
			 }
            



		}
	?>
	<br>
	<div class="portlet light bordered">
		<div class="row">
			<div class="col-xs-12">
				<?= @$sms ?>
				<h2><i class="fa fa-user fa-fw"></i>Update  Profile</h2>
			</div>
		</div>
    <div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-6 panel-heading rounded-4">
					<div class="row">
						<div class="col-sm-3 margin-top-10">
							<img src="../../img/img_partner/<?php echo trim(@$_SESSION['user']->user_photo) ?>" 
				style=" width: 120px; height: 120px; box-shadow: 0 0 1px 1px rgba(0,0,0,.1); border-radius: 10px;" alt="Profile Photo">
						</div>
						<div class="col-sm-9">
							<p style=" text-transform: capitalize; margin-top: 5px; margin-bottom: 0px; font-size: 20px; font-weight: 600;">Hi! <?php echo trim(@$_SESSION['user']->user_last_name)." ". trim(@$_SESSION['user']->user_first_name) ?></p>
							<b>Username : </b> <?php echo trim(@$_SESSION['user']->user_name) ?><br>
							<b>User ID N&deg; : </b> <span> <?php echo trim(@$_SESSION['user']->user_id_number) ?> </span>
							<br><b>Introducer ID N&deg; : </b> <span> <?php echo trim(@$_SESSION['user']->user_introducer_id) ?> </span>
							<br><b>Partner  Type : </b>
							 <?php
					             $check_member_type="";
					            $id=@$_SESSION['user']->user_id;
					            $v_sql = "SELECT * FROM tbl_relationship_users_position WHERE user_id='$id'";
					            $result = $connect->query($v_sql);
					            if ($result->num_rows > 0){
					             if($row = $result->fetch_assoc()){
					             $check_member_type=$row['user_position_id'];

					            ?>

					            <?php
					             }}
					            ?>
							<?php 
								if($check_member_type == 1){
									echo "Admin";
								}
								elseif ($check_member_type == 5) {
									echo "CAR OWNER";
								}
								elseif ($check_member_type == 6) {
									echo "RICKSHAW'S OWNER";
								}
								elseif ($check_member_type == 9) {
									echo "HOTEL & GUESTHOUSE";
								}
								elseif ($check_member_type == 4) {
									echo "CITY TOUR";
								}
								elseif ($check_member_type == 11) {
									echo "AIRPORT TRANSFER";
								}
								elseif ($check_member_type == 3) {
									echo "PICKUP & DROP OFF";
								}
								elseif ($check_member_type == 7) {
									echo "TOUR GUIDE";
								}
								elseif ($check_member_type == 8) {
									echo "DRIVER";
								}
								elseif ($check_member_type == 10) {
									echo "INDROUCER";
								}
								else {
									echo "Normal Customer";
								}
							?><br>
							<b>Customer's Type : </b>
							<?php 
							  if($customer_type=="1") {
							  	echo "Self-Register";
							  } 
							  elseif ($customer_type=="2") {
							   echo "Thru Introducer";
							  }
							  else {
							  	echo "";
							  }
							?>
							<br>
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
							
						</div>
				   </div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <br>

    <!-- <div class="portlet-title">
        <div class="caption font-dark">
            <a href="../dashboard/index.php" id="sample_editable_1_new" style="background-color: #a4509f;" class="btn font-white"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div> -->
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background-color: #a4509f;">
                <h3 class="panel-title">Input User Information</h3>
			</div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txt_id" value="<?= @$_SESSION['user']->user_id ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
									<input  type="text" class="form-control" name="txt_name" placeholder="Enter your name" 
									 value="<?php echo $u_user_name; ?>">
                                    <label>Username
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your full name...</span>
                                </div>
                                <div class="form-group form-md-line-input">
									<input  type="file" class="form-control" name="txt_image" >
                                    <label>Photo
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your Photo...</span>
                                </div>
                                   <div class="form-group form-md-line-input">
									<input  type="text" class="form-control" name="txt_fname" placeholder="Enter your name" 
									 value="<?php echo $f_name; ?>">
                                    <label>First Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your First Name...</span>
                                </div>
                                
                              

                                <div class="form-group form-md-line-input">
									<input type="text" class="form-control" name="txt_email" placeholder="Enter your email" 
									required="required" value="<?php echo $u_txt_email; ?>">
                                    <label>Email
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your email...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                <select name="txt_gender" class="form-control">
                                	<option value="">==Gender==</option>
                                	<option <?php if($u_txt_gender=="Male") {echo "selected='selected'";} ?> value="Male">Male</option>
                                	<option <?php if($u_txt_gender=="Female") {echo "selected='selected'";} ?> value="Female">Female</option>
                                </select>
                                    <label>Gender
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your Gender...</span>
                                </div>
                                <div class="form-group form-md-line-input">
									<input readonly type="text" class="form-control" name="" placeholder="Enter your gender" 
										
										value="<?php 
													if(@$_SESSION['user']->user_status == "1"){ 
														echo "Active";
													}else if(@$_SESSION['user']->user_status == "2"){
														echo "Disable";
													}else {
														echo "Pending";
													}
												?>">
								
									<label>Status <span class="required" aria-required="true">*</span></label>
                                    <span class="help-block">Choose your Status here...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
									<input type="text" class="form-control" name="txt_address" placeholder="Enter your gender" 
									required="required" value="<?php echo $u_txt_address; ?>">
                                    <label>Address </label>
                                    <span class="help-block">Village, District, Province, City, Postal Code.</span>
								</div>
								 <div class="form-group form-md-line-input">
									<input  type="text" class="form-control" name="txt_lname" placeholder="Enter your name" 
									 value="<?php echo $l_name; ?>">
                                    <label>Last Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your  name...</span>
                                </div>
								<div class="form-group form-md-line-input">
									<input type="text" class="form-control" name="txt_pass" placeholder="Enter your new password" 
									 value="">
                                    <label>New Password </label>
                                    <span class="help-block">Change to new Password</span>
								</div>
								<div class="form-group form-md-line-input">
									<input type="text" class="form-control" name="txt_phone" placeholder="Enter your gender" 
									required="required" value="<?php echo $u_txt_phone; ?>">
                                    <label>Phone Number</label>
                                    <span class="help-block">Change Phone Number.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
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

<?php include_once '../layout/footer.php' ?>
