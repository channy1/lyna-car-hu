<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php 
	$id_user=@$_SESSION['user']->user_id;
    $query="SELECT * FROM tbl_users WHERE user_id='$id_user'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       
        $customer_type=$row["user_seft_thru"];
        }
	}
	
	$check_member_type="";
	$id=@$_SESSION['user']->user_id;
	$v_sql = "SELECT * FROM tbl_relationship_users_position WHERE user_id='$id'";
	$result = $connect->query($v_sql);
		if ($result->num_rows > 0){
			if($row = $result->fetch_assoc()){
				$check_member_type=$row['user_position_id'];
				$_SESSION['position_name'] = '';
			if($check_member_type == 1){
				$_SESSION['position_name'] = 'Admin'; 
			}
			elseif ($check_member_type == 5) {
				$_SESSION['position_name'] = 'CAR OWNER'; 
			}
			elseif ($check_member_type == 6) {
				$_SESSION['position_name'] = "RICKSHAW'S OWNER"; 
			}
			elseif ($check_member_type == 9) {
				$_SESSION['position_name'] = 'HOTEL & GUESTHOUSE'; 
			}
			elseif ($check_member_type == 4) {
				$_SESSION['position_name'] = 'CITY TOUR'; 
			}
			elseif ($check_member_type == 11) {
				$_SESSION['position_name'] = 'AIRPORT TRANSFER'; 
			}
			elseif ($check_member_type == 3) {
				$_SESSION['position_name'] = 'PICKUP & DROP OFF'; 
			}
			elseif ($check_member_type == 7) {
				$_SESSION['position_name'] = 'TOUR GUIDE'; 
			}
			elseif ($check_member_type == 8) {
				$_SESSION['position_name'] = 'DRIVER'; 
			}
			elseif ($check_member_type == 10) {
				$_SESSION['position_name'] = 'INDROUCER'; 
			}
			else {
				$_SESSION['position_name'] = 'CUSTOMER'; 
			} 
		}
	}

    ?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-dashboard fa-fw"></i> <?php echo $_SESSION['position_name'];  ?> Profile</h2>
        </div>
    </div>
	<br>
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
							<br><b>Partner Type : </b>
					            <?php
									echo $_SESSION['position_name']; 
					            ?>
							<br>
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
							?><br>
							<b>Connect with : </b><?php echo "Email Account."; ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6 rounded-4 margin-top-20">
				   <div class="row">
						<div class="col-sm-12">
							<b>Register Phone : </b> <span> <?php echo trim(@$_SESSION['user']->user_phone_number) ?> </span>	
							<br>
							<b>Register E-mail : </b> <span> <?php echo trim(@$_SESSION['user']->user_email) ?> </span>
							<br>
							<b>Website : </b> <span> <?php echo trim(@$_SESSION['user']->user_website) ?> </span>
							<br>
							<b>Account Status : </b> <span> 
							<?php 
								if(@$_SESSION['user']->user_status == "1"){
									echo "Active Account.";
								}else if(@$_SESSION['user']->user_status == "2"){
									echo "Inactive Account.";
								}else {
									echo "Pending Account.";
								}
							?> </span>
							<br>
							
						</div>
				   </div>
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
