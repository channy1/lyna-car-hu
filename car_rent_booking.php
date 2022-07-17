<?php
    include_once ('system/config/database.php');
    require_once("header.php");
    require_once 'php-mailjet-v3-simple.class.php';
	if(!empty($_POST)) {		
		$_POST['car_rent_pickupdate'] = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['car_rent_pickupdate'])));
		
		$_POST['car_return_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['car_return_date'])));	
	}
?>
<?php
$post_step = "";
$post_step = trim($connect->real_escape_string(@$_POST['post_step']));
if(!isset($_SESSION["allowLog"])) {
    $_SESSION['allowLog'] ="";
}
if(!isset($_SESSION["term_condiction"])) {	
	$_SESSION['term_check_pay'] =1;
}
if(isset($_POST['btn_login'])){
	$username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
	$password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
	$stm = "SELECT * FROM tbl_users WHERE user_name='{$username}' AND user_password='{$password}'";
	$user = $connect->query($stm);
	if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";
	}else {         
		// $post_step=="4";          
		// echo "<script>alert('Wrong username or password.')</script>";
	}
}
if(isset($_POST['btn_car_rent']) || isset($_POST['btn_select_data']) ) {
	$_SESSION['pickupfrom_carrent'] = @$connect->real_escape_string($_POST['pickupfrom_carrent']);
	$_SESSION['return_location_carental'] = @$connect->real_escape_string($_POST['return_location_carental']);
	$_SESSION['pickup_map_carental']= @$connect->real_escape_string($_POST['pickup_map_carental']);	
	$_SESSION['car_rental_return_map']=@$connect->real_escape_string($_POST['car_rental_return_map']);	
	$_SESSION['car_rent_pickupdate']=@$connect->real_escape_string($_POST['car_rent_pickupdate']);
	$_SESSION['car_rent_pickupdate_time']=@$connect->real_escape_string($_POST['car_rent_pickupdate_time']);	
	$_SESSION['car_return_date']=@$connect->real_escape_string( $_POST['car_return_date']);	$_SESSION['car_return_time']=@$connect->real_escape_string($_POST['car_return_time']);	$_SESSION['car_comment']=@$connect->real_escape_string($_POST['car_comment']);
}
if(isset($_POST['btn_car'])) {
	$_SESSION['car_id']=@$connect->real_escape_string($_POST['identity_car']);
}

if(isset($_POST['btn_service'])) {
	$_SESSION['driver_id']=@$connect->real_escape_string($_POST['identity_driver']);
	$_SESSION['tour_quide_id']=@$connect->real_escape_string($_POST['identity_tour']);
	$_SESSION['accessory_id']=@$connect->real_escape_string($_POST['identity_accessory']);
}

if(isset($_POST['btn_login'])){
	$username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
	$password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
	$stm = "SELECT * FROM tbl_users WHERE user_name='{$username}' AND user_password='{$password}'";
	$user = $connect->query($stm);
	if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";
	}else {         
		// $post_step=="4";          
		// echo "<script>alert('Wrong username or password.')</script>";
	}
}
?>

<div class="container py-3">
	<div class="panel panel-default">
		<div  class="panel-heading">
			<h4 class="head-form"><i class="fa fa-handshake-o" aria-hidden="true"></i>
            &nbsp;SEARCH FOR CAR RENTAL
			</h4>
		</div>
	<div class="row">
        <div class="col-md-8">
			<div class="tabbable-panel margin-tops4">
				<div class="tabbable-line ">
					<ul class="nav nav-tabs tabtop  tabsetting" id="myTab" role="tablist">
						<li <?php if(empty($post_step)){echo "class='active'";} ?>>
							<a class="nav-link" id="li_one" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Select Date</a>
						</li>
						<li <?php if($post_step=="1"){ echo "class='active'"; }?>>
							<a class="nav-link" id="li_two" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Select a Vehicle</a>
						</li>
						<li <?php if($post_step=="2"){ echo "class='active'"; }?>>
							<a class="nav-link" id="li_three" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Services</a>
						</li>
						<li <?php if($post_step=="3"){ echo "class='active'"; }?>>
							<a class="nav-link" id="li_four" data-toggle="tab" href="#four" role="tab" aria-controls="Three" aria-selected="false">Personal Info</a>
						</li>
						<li <?php if($post_step=="4"){ echo "class='active'"; }?>>
							<a class="nav-link" id="li_five" data-toggle="tab" href="#five" role="tab" aria-controls="Three" aria-selected="false">Confirm Booking</a>
						</li>
					</ul>				<div>
            </div>
			<div class="tab-content" id="myTabContent" style="margin-top:30px;">
                <div class="tab-pane <?php if(empty($post_step)) {echo "in active";} ?>" id="one">	  <form action="car_rent_booking.php" method="POST" class="booking-form">		
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<?php 								
									if(!isset($_SESSION["pickupfrom_carrent"])){
										$pickupfrom_carrent=$_SESSION["pickupfrom_carrent"]="";	
									}else {									
										$pickupfrom_carrent=$_SESSION["pickupfrom_carrent"];
									}								
								?>								
								<p>									
									<label><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងទៅយករថយន្ត';?></label>		
									<select name="pickupfrom_carrent" class="form-control input-sm" id="pickupfrom"> 									
										<?php 									
										$v_sql = "SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id GROUP BY pro_from_id ORDER BY air_id";
										$result = $connect->query($v_sql);
										if ($result->num_rows > 0){	
										while($row = $result->fetch_assoc()){
										//echo "<pre>"; print_r($row); echo "</pre>"; //exit;									?>
										<!--<input type="text" class="tbCountries"  placeholder="PROVINCE NAME" />-->
										<option <?php if($pickupfrom_carrent==$row['pv_title']){echo "selected='selected'";} ?> style="text-transform: uppercase;" value="<?php echo $row['air_id']; ?>">
											<?php echo $row['pv_title']; ?>
										</option>				
										<?php }} ?>									
									</select>
								</p>																
								<p>									
									<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>
									<?php 
										if(!isset($_SESSION["pickup_map_carental"])){
											$_SESSION["pickup_map_carental"]="";
										}else{
											$_SESSION["pickup_map_carental"];
										}
									?>
									<input name="pickup_map_carental" type="text" placeholder="Copy & Paste Pickup Location Map" value="<?php echo $_SESSION['pickup_map_carental']; ?>">
									<input type="hidden" name="pickupaddress">
								</p>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<p class="m-top-0">
											<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Date':'កាលបរិច្ឆេទជ្រើសរើសយក:';?></span>
											<?php 
												if(!isset($_SESSION["car_rent_pickupdate"])){
													 $_SESSION["car_rent_pickupdate"]="";
												}else {
													$_SESSION["car_rent_pickupdate"];
												}
											?>
											<input id="datepicker" name="car_rent_pickupdate" placeholder="DD-MM-YYYY" data-select="datepicker" type="text" value="<?php echo $_SESSION['car_rent_pickupdate']; ?>">		
										</p>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
											<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Time':'ពេលវេលាជ្រើសរើសក:';?></span>
											<?php 
												if(!isset($_SESSION["car_rent_pickupdate_time"])){
													$_SESSION["car_rent_pickupdate_time"]="";
												}else {
													$_SESSION["car_rent_pickupdate_time"];
												}
											?>
											<input id="dropoffdate" type="text" name="car_rent_pickupdate_time" class="form-control pickup_input" placeholder="HH:MM:SS" value="<?php echo $_SESSION['car_rent_pickupdate_time']; ?>"/>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">								
								<p>									
									<label><?=(@$_SESSION['lang']=='en')?'Return Location':'ទីតាំងទៅយករថយន្ត';?></label>
									<!--<input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>-->
									<select name="return_location_carental" class="form-control input-sm" id="dropoffto">
									<?php 
										if(!isset($_SESSION["return_location_carental"])){
											$return_location_carental=$_SESSION["return_location_carental"]="";
										}else {
											$return_location_carental=$_SESSION["return_location_carental"];
										}
									?>
									<?php 
										$v_sql = "SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_to_id GROUP BY pro_to_id ORDER BY pv_title";
										$result = $connect->query($v_sql);
										if ($result->num_rows > 0){
											while($row = $result->fetch_assoc()){
									?>  
										<option <?php if($return_location_carental==$row['air_id']){echo "selected='selected'";} ?> style="text-transform: uppercase;" value="<?php echo $row['air_id']; ?>"><?php echo $row['pv_title']; ?></option>
									<?php }} ?>  
									</select>
								</p>								
								<p>
									<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Return':'ស៊ៀផែនទី Google:';?></span>									<input type="text" name="car_rental_return_map" placeholder="Copy & Paste Return Location Map">
								</p>
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<p class="m-top-0">
											<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
											<?php 
												if(!isset($_SESSION["car_return_date"])){
													$_SESSION["car_return_date"]="";
												}else{
													$_SESSION["car_return_date"];
												}
											?>
											<input id="dropoffdate" name="car_return_date" value="<?php echo $_SESSION['car_return_date']; ?>" placeholder="DD-MM-YYYY" data-select="datepicker" type="text">										
										</p>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
											<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>
											<?php 
												if(!isset($_SESSION["car_return_time"])){
													$_SESSION["car_return_time"]="";
												}else{
													$_SESSION["car_return_time"];
												}
											?>
											<input id="dropofftime" value="<?php echo $_SESSION['car_return_time']; ?>" type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" />
										</p>
									</div>
								</div>									
							</div>							
							<div class="col-md-6">  								
								<p>									
									<label><?=(@$_SESSION['lang']=='en')? 'Return Location Details (Besides Pickup Location)': 'ត្រលប់មកវិញនូវព័ត៌មានលម្អិតអំពីទីតាំង (ក្រៅពីទីតាំងជ្រើសរើសថយន្ត)';?></label>									<textarea class="form-textarea" name="car_comment" class="form-control" rows="3" cols="4" id="comment">
									<?php 
										if(!isset($_SESSION["car_comment"])){
											echo $_SESSION["car_comment"]="";
										}else {
											echo $_SESSION["car_comment"];
										}
									?>	
									</textarea>	
								</p>							
							</div>							
							<div class="col-md-6">													
								<p class="white-span"><?=(@$_SESSION['lang']=='en')?'SELECT ONE OR MORE OF THESE SERVICES':' ជ្រើសរើសមួយឬច្រើននៃសេវាកម្មទាំងនេះ ';?></p>
								<div class="row">
									<div class="col-md-6">
										<div class="checkbox">
											<label><input type="checkbox" value="">
											<?=(@$_SESSION['lang']=='en')?'TOUR GUIDE':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?></label>
										</div> 
									</div>
									<div class="col-md-6">
										<div class="checkbox">
											<label><input type="checkbox" value=""><?=(@$_SESSION['lang']=='en')?'DRIVER':'អ្នកបើកបរ';?></label>
										</div> 
									</div>
									<div class="col-md-6">
										<div class="checkbox">											<label><input type="checkbox" value=""><?=(@$_SESSION['lang']=='en')?'ACCESSORIES':'គ្រឿងបន្លាស់';?></label>
										</div> 
									</div>
									<div class="col-md-6">
										<div class="checkbox">
											<label><input type="checkbox" value="">SELF-DRIVE</label>
										</div>
									</div>
								</div>
                            </div>
							<div class="col-md-12">
								<p><button name="btn_car_rent" type="submit" class="gauto-theme-btn">Find Vehicle Now</button></p>
							</div>
						</div>						
						<input type="hidden" name="post_step" value="1">					
					</form>
				</div>				
				<div class="tab-pane <?php if(empty($post_step)) {echo "in active";} ?>" id="two">
					<form method="post" action="car_rent_booking.php" id="form_car" class="booking-form">
						<div class="tab-pane <?php if($post_step=="1") {echo "active in";} ?>" <?php if($post_step=="1") { ?> id="two" <?php }else { ?> style="display:none;" <?php } ?>>
							<input type="hidden" name="post_step" value="2">
							<button style="margin-top: 10px;" id="btn_car" class="btn btn-success" name="btn_car" type="submit">Continue</button>
							<label id="check_car"></label>
							<?php
								$pro_id_from = "";
								$from_id = $_SESSION['pickupfrom_carrent'];
								$sql_province = "SELECT pro_from_id FROM tbl_carrental_pickup_price WHERE tbl_carrental_pickup_price.air_id='$from_id'";
								$result = $connect->query($sql_province);
								if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
										$pro_id_from = $row['pro_from_id'];
                                    }
								}                                    
                                $pro_id_to = "";
                                $return_to = $_SESSION['return_location_carental'];
								$sql_to = "SELECT pro_to_id FROM tbl_carrental_pickup_price WHERE tbl_carrental_pickup_price.air_id='$return_to'";
								$result = $connect->query($sql_to);
								if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
										$pro_id_to = $row['pro_to_id'];
                                    }
								}
								$sql ="SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_vehicle_rantal ON tbl_carrental_pickup_price.car_id = tbl_vehicle_rantal.ve_id LEFT JOIN tbl_province ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id WHERE tbl_carrental_pickup_price.pro_from_id='$pro_id_from' AND tbl_carrental_pickup_price.pro_to_id='$pro_id_to' AND tbl_vehicle_rantal.status='1' ";
								$result = $connect->query($sql);                                
								if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
							?>
								<div class="row" style="border:2px solid #ccc; border-radius: 5px; width:99%; padding:17px; margin-left:1px; margin-top:10px; margin-bottom:5px;">
									<div class="col-md-3">                                      
										<img src="system/admin/image/vehicle_rental/<?php echo $row["ve_image"];?>" class="preview">
										<label><b><?php echo $row['ve_title']; ?></b></label>
										<br>
										<span style="position: absolute;float: left;">Tick the Box</span>
										<input type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addcar(<?php echo $row['ve_id']; ?>)" id="addcar_<?php echo $row['ve_id']; ?>" style="float: right;">
										<br>
										<span>Qantity :</span>
										<input class="form-control" readonly="" type="text" name="addcar_<?php echo $row['ve_id']; ?>" value="" id="number_addcar_<?php echo $row['ve_id']; ?>">
									</div>
									<script type="text/javascript">
                                    function addcar(index){
										var id=$('#identity_car').val();
										var arrays = id.split(',');
										for(var j=0;j<arrays.length;j++) {
											//calculate record row
											if(arrays[j] == index) arrays.splice(j,1);
											if(document.getElementById('addcar_'+index).checked){
												if(($("#identity_car").val())!="") {
													$("#identity_car").val(id+','+index);
												}else { 
													$("#identity_car").val(index);
												}
												// $("#number_equipment_"+index).removeAttr("readonly");
												$("#number_addcar_"+index).val(1);
											}else{
												//alert(index);
												var strings = arrays.join(',');
												$('#identity_car').val(strings);
												$("#number_addcar_"+index).val("");
												//$("#number_equipment_"+index).attr("readonly", true);
											}
										}
									}
                                    </script>
                                       <div class="col-md-9">
                                    
                                      <table class="table table-borderless" style="width:48%;float:left;">
                                         <thead>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th scope="row">Ref. No. :</th>
                                             <td style="color:red;"><?php echo $row['ve_ref_no']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Year :</th>
                                             <td><?php echo $row['ve_year']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Make :</th>
                                             <td><?php echo $row['ve_make']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Model :</th>
                                             <td><?php echo $row['ve_model']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Sub Model :</th>
                                             <td><?php echo $row['ve_sub_model']; ?></td>
                                           </tr>            
                                           <tr>
                                             <th scope="row">Color :</th>
                                             <td colspan="2"><?php echo $row['ve_color']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">No. of Seats :</th>
                                             <td colspan="2"><?php echo $row['ve_no_of_seat']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Trans. Type :</th>
                                             <td colspan="2"><?php echo $row['ve_transmission_type']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Vehicle Type :</th>
                                             <td colspan="2"><?php echo $row['ve_vehical_type']; ?></td>
                                           </tr>
                                          
                                           
                                         </tbody>
                                       </table>


                                       <table class="table table-borderless" style="width:50%;float:right;">
                                         <thead>
                                          <tr>
                                             <th scope="row">Range Day(s) </th>
                                             <td>Price</td>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th scope="row">Days (1-7):</th>
                                             <td>$ <?php echo $row['ve_days(1-7)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">~ Extra Day:</th>
                                             <td>$ <?php echo $row['ve_extra_days(1-7)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Days (15-26):</th>
                                             <td colspan="2">$ <?php echo $row['ve_day(15-26)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row"> ~ Extra Day:</th>
                                             <td colspan="2">$ <?php echo $row['ve_extra_day(15-26)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Monthly:</th>
                                             <td colspan="2">$ <?php echo $row['ve_monthly']; ?></td>
                                           </tr>
                                            <tr>
                                             <th scope="row"> ~ Extra Day:</th>
                                             <td colspan="2">$ <?php echo $row['ve_monthy_extra_days']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Yearly:</th>
                                             <td colspan="2">$ <?php echo $row['ve_yearly']; ?></td>
                                           </tr>
                                          
                                           <tr>
                                             <th scope="row">~ Extra Day:</th>
                                             <td colspan="2">$ <?php echo $row['ve_yearly_extra_days']; ?></td>
                                           </tr>
                                         </tbody>
                                       </table>
                                      
                                      
                                       </div>
                                      
                                </div>
							<?php  }} ?>
							<input type="hidden" name="identity_car" id="identity_car">
						</div>
                   </form>
                </div>
                <div class="tab-pane <?php if(!empty($post_step)) {echo "active in";} ?>" id="three <?php echo $post_step;  ?>">
                    <form method="post" action="car_rent_booking.php" id="form_service" class="booking-form">
						<input type="hidden" name="post_step" value="3">						
						<div <?php if($post_step == "2"){ ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?> class="tab-pane <?php if($post_step=="2"){echo "active in"; } ?>" <?php if($post_step=="2") { ?>id="three"<?php } ?>>						
							<div class="card-header tab-card-header" <?php if($post_step=="2") { ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
								<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
									<li id="tap_tour">
										<a data-toggle="tab" href="#tour">Tour Guide</a>
									</li>
									<li id="tap_accessory">
										<a data-toggle="tab" href="#accessory">Accessories</a>
									</li>
									<li id="tap_driver">
										<a  data-toggle="tab" href="#driver">Driver</a>
									</li>
								</ul>
							</div>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" <?php if($post_step=="2") { ?> id="tour" <?php } ?>>
								<div>
									<label class="radio-inline">
									<input type="radio" name="check_tour_quide" id="check_tour_quide" checked="checked" value="Yes">Tour Guide</label>							   
								</div>
								<div></div>
								<ul class="nav nav-tabs card-header-tabs tour_guide" id="myTab" role="tablist" style="display:block;">
									<?php
										$sql ="SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position On tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  user_position='3' AND user_position_id='7'";
										$result = $connect->query($sql);
										if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){
									?>
										<div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
											<div class="col-md-3">
											<?php if($row["user_position"]=="3") { ?>
											   <img src="system/img/img_partner/<?php echo $row["user_photo"];?>" class="preview">
											<?php } else { ?>
												<img src="system/img/img_customer/<?php echo $row["user_photo"];?>" class="preview">
											<?php } ?>
											</div>
											<div class="col-md-6">
												<ul>
													<li style="list-style:none; margin-bottom:-3px !important;">
														<label>First Name :<span><?php echo $row['user_first_name']; ?></span></label>
													</li>
													<li style="list-style: none;margin-bottom: -3px !important;">
														<label>Last Name :<span><?php echo $row['user_last_name']; ?></span></label>
													</li>
													<li style="list-style: none;margin-bottom: -3px !important;">
														<label>Gender :<span><?php echo $row['user_gender']; ?></span></label>
													</li>
													<?php
														$sql_one ="SELECT * FROM tbl_tour_rent";
														$results = $connect->query($sql_one);
														if ($results->num_rows > 0) {
														while($rows = $results->fetch_assoc()){
													?>
														<li style="list-style: none;margin-bottom: -3px !important;">
															<label>Tour Guide Price :<span>$<?php echo $rows['tour_price']; ?>/day</span></label>
														</li>
														<li style="list-style: none;margin-bottom: -3px !important;">
															<label>Tour Guide Dicount Price :<span>$<?php echo $rows['tour_discount']; ?>/day</span></label>
														</li>
														<li style="list-style: none;margin-bottom: -3px !important;">
															<label>Tour Guide Vat Price :<span>$<?php echo $rows['tour_vat']; ?>/day</span></label>
														</li>
													<?php } } ?>
												</ul>
											</div>
											<div class="col-md-3">
												<span style="position: absolute;float: left;">Tick the Box</span>
												<input  type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addtour(<?php echo $row['user_id'];?>)" id="addtour_<?php echo $row['user_id'];?>" style="float: right;">
												<br>
												<span>Qantity :</span>
												<input class="form-control" readonly type="text"  name="qty_tour_<?php echo $row['user_id'];?>" value="" id="number_tour_<?php echo $row['user_id'];?>">
											</div>
										</div>
									<?php } } ?>
									<input type="hidden" name="identity_tour" id="identity_tour"/>
								</ul>
								<script type="text/javascript">
									function addtour(index){
										var id=$('#identity_tour').val();
										var arrays = id.split(',');
										for(var j=0;j<arrays.length;j++) {
											//calculate record row
											if(arrays[j] == index) arrays.splice(j,1);
											if(document.getElementById('addtour_'+index).checked){
												if(($("#identity_tour").val())!="") {
													$("#identity_tour").val(id+','+index);
												}else { 
													$("#identity_tour").val(index);
												}
												// $("#number_equipment_"+index).removeAttr("readonly");
												$("#number_tour_"+index).val(1);
											}else{
												//alert(index);
												var strings = arrays.join(',');
												$('#identity_tour').val(strings);
												$("#number_tour_"+index).val("");
												//$("#number_equipment_"+index).attr("readonly", true);
											}
										}
									}
								</script>
							</div>	
							<div class=" tab-pane <?php if($post_step=="2") {echo "active in";} ?>" <?php if($post_step=="2") { ?> id="accessory" <?php } ?>>
							<div>
								<label class="radio-inline">
						   <input type="radio" name="check_accessory" id="check_accessory" checked="checked" value="Yes">Accessories</label>
							   <label class="radio-inline"></label>
						  
						   
							 </div>
						  <?php  
							$v_sql = "SELECT * FROM tbl_accessories_rental";
							$result = $connect->query($v_sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							  ?>
							<div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
										   <div class="col-md-3">
										  
										   <img src="system/admin/image/accessories rental/<?php echo $row['ac_image']; ?>" class="preview">
										  <label><b><?php echo $row['ac_title']; ?></b></label>
										  <br>
										   <span style="position: absolute;float: left;">Tick the Box</span>
							<input type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addaccessory(<?php echo $row['ac_id']; ?>)" id="addaccessory_<?php echo $row['ac_id']; ?>" style="float: right;">
										   <br>
										   <span>Qantity :</span>
										   <input class="form-control" readonly="" type="text" name="addaccessory_<?php echo $row['ac_id']; ?>" value="" id="number_addaccessory_<?php echo $row['ac_id']; ?>">
										
									   </div>

									  
										   <div class="col-md-9">
										
										  <table class="table table-borderless" style="width:48%;float:left;">
											 <thead>
											 </thead>
											 <tbody>
											   <tr>
												 <th scope="row">Ref. No. :</th>
												 <td><?php echo $row['ac_ref_no']; ?></td>
											   </tr>
											 </tbody>
										   </table>


										   <table class="table table-borderless" style="width:50%;float:right;">
											 <thead>
											  <tr>
												 <th scope="row">Range Day(s)</th>
												 <td>Price</td>
											   </tr>
											 </thead>
											 <tbody>
											   <tr>
												 <th scope="row">Days (1-7):</th>
												 <td>$ <?php echo $row['ac_days(1-7)']; ?></td>
											   </tr>
											   <tr>
												 <th scope="row">~ Extra Day:</th>
												 <td>$<?php echo $row['ac_extradays(1-7)']; ?></td>
											   </tr>
											   <tr>
												 <th scope="row">Days (15-26):</th>
												 <td colspan="2">$<?php echo $row['ac_days(15-26)']; ?></td>
											   </tr>
											   <tr>
												 <th scope="row"> ~ Extra Day:</th>
												 <td colspan="2">$<?php echo $row['ac_extradays(15-26)']; ?></td>
											   </tr>
											   <tr>
												 <th scope="row">Monthly:</th>
												 <td colspan="2">$ <?php echo $row['ac_monthly']; ?></td>
											   </tr>
												<tr>
												 <th scope="row"> ~ Extra Day :</th>
												 <td colspan="2">$ <?php echo $row['ac_extramonthly']; ?></td>
											   </tr>
											   <tr>
												 <th scope="row">Yearly:</th>
												 <td colspan="2">$ <?php echo $row['ac_yearly']; ?></td>
											   </tr>
											  
											   <tr>
												 <th scope="row">~ Extra Day:</th>
												 <td colspan="2">$ <?php echo $row['ac_extrayearly']; ?></td>
											   </tr>
											 </tbody>
										   </table>
										  
										  
										   </div>
										  
									</div>
								<?php }}  ?>
									<input type="hidden" name="identity_accessory" id="identity_accessory">

									 <script type="text/javascript">
										  function addaccessory(index){

										   var id=$('#identity_accessory').val();
										   var arrays = id.split(',');
										   for(var j=0;j<arrays.length;j++) {//calculate record row
											 if(arrays[j] == index) arrays.splice(j,1);
											 if(document.getElementById('addaccessory_'+index).checked){
											   if(($("#identity_accessory").val())!="") {
												 $("#identity_accessory").val(id+','+index);
											   }else { 
												 $("#identity_accessory").val(index);
											   }
											  // $("#number_equipment_"+index).removeAttr("readonly");
											   $("#number_addaccessory_"+index).val(1);
											  }else{
												//alert(index);
											   var strings = arrays.join(',');
											   $('#identity_accessory').val(strings);
											   $("#number_addaccessory_"+index).val("");
											   //$("#number_equipment_"+index).attr("readonly", true);
											 }
										   }
										 }
										</script>

							 </div>
							 <div class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" <?php if($post_step=="2") { ?>id="driver" <?php } ?>>
							   <div>
								<label class="radio-inline">
						   <input type="radio" name="check_option_drive" id="check_option_drive_seft" checked="checked" value="Yes">Self-Drive</label>
							   <label class="radio-inline">
						   <input type="radio" name="check_option_drive" id="check_option_drive_rental" value="No">Chauffeur Rental</label>
						   <button style="margin-top: 10px;" id="btn_service" class="btn btn-success" name="btn_service" type="submit">Continue</button>
							 </div>
							  <ul class="nav nav-tabs card-header-tabs " id="myTab" role="tablist" style="display:block;">
									 <?php
									 $sql ="SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position On tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  user_position='3' AND user_position_id='8'";
									  $result = $connect->query($sql);
									  if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){
									 ?>
										 <div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
										   <div class="col-md-3">
										   <?php
											 if($row["user_position"]=="3") {
										   ?>
										   <img src="system/img/img_partner/<?php echo $row["user_photo"];?>" class="preview">
										   <?php } else { ?>
											<img src="system/img/img_customer/<?php echo $row["user_photo"];?>" class="preview">
										   <?php } ?>
										   </div>
										   <div class="col-md-6">
										   <ul>
										   <li style="list-style: none;margin-bottom: -3px !important;"><label>First Name :<span><?php echo $row['user_first_name']; ?></span></label></li>
										   <li style="list-style: none;margin-bottom: -3px !important;"><label>Last Name :<span><?php echo $row['user_last_name']; ?></span></label></li>
										   <li style="list-style: none;margin-bottom: -3px !important;"><label>Gender :<span><?php echo $row['user_gender']; ?></span></label></li>

										 <?php
												 $sql_dr ="SELECT * FROM tbl_driver_rent ";
												  $resultdr = $connect->query($sql_dr);
												  if ($resultdr->num_rows > 0) {
													while($rows = $resultdr->fetch_assoc()){
												 ?>
										   <li style="list-style: none;margin-bottom: -3px !important;"><label>Driver Price :<span>$<?php echo $rows['dr_price']; ?>/day</span></label></li>
										   <li style="list-style: none;margin-bottom: -3px !important;"><label>Driver Dicount Price :<span>$<?php echo $rows['dr_discount']; ?>/day</span></label></li>
										   <li style="list-style: none;margin-bottom: -3px !important;"><label>Driver Vat Price :<span>$<?php echo $rows['dr_vat']; ?>/day</span></label></li>
										   <?php  }} ?>
										  
										   </ul>
										   </div>
										   <div class="col-md-3">
										   <span style="position: absolute;float: left;">Tick the Box</span>
										   <input  type="checkbox" name="tick" class="checkbox input-checkbox" onclick="adddriver(<?php echo $row['user_id'];?>)" id="adddriver_<?php echo $row['user_id'];?>" style="float: right;">
										   <br>
										   <span>Qantity :</span>
										   <input class="form-control" readonly type="text"  name="qty_driver_<?php echo $row['user_id'];?>" value="" id="number_driver_<?php echo $row['user_id'];?>">
		 
										   </div>
									</div>
								  <?php 
									}}
								  ?>
								  <input type="hidden" name="identity_driver" id="identity_driver"/>
							 </ul>

							  <script type="text/javascript">
										  function adddriver(index){

										   var id=$('#identity_driver').val();
										   var arrays = id.split(',');
										   for(var j=0;j<arrays.length;j++) {//calculate record row
											 if(arrays[j] == index) arrays.splice(j,1);
											 if(document.getElementById('adddriver_'+index).checked){
											   if(($("#identity_driver").val())!="") {
												 $("#identity_driver").val(id+','+index);
											   }else { 
												 $("#identity_driver").val(index);
											   }
											  // $("#number_equipment_"+index).removeAttr("readonly");
											   $("#number_driver_"+index).val(1);
											  }else{
												//alert(index);
											   var strings = arrays.join(',');
											   $('#identity_driver').val(strings);
											   $("#number_driver_"+index).val("");
											   //$("#number_equipment_"+index).attr("readonly", true);
											 }
										   }
										 }
										</script>
										  
							 </div>

						 </div>


					   </div>
					</form>
                </div>
				<div <?php if($post_step !="3") { ?> style="display:none;"  <?php } ?> class="tab-pane <?php if($post_step=="3"){echo "active in";}?>"<?php if($post_step=="3") { ?> id="four"<?php } ?>>
						<div class="row">
						<?php if($_SESSION['allowLog'] != "logAlready"){ ?>
							<div class="col-md-12">                                
                                <form method="post" action="car_rent_booking.php" class="booking-form" >
                                 <input type="hidden" name="post_step" value="3">

                                  <h3 style="text-align:center;">Login for Form</h3>
                                 
                                      <div class="form-group">
                                          <input type="text" name="txt_login_username" class="form-control" placeholder="Your Username" value="" />
                                      </div>
                                      <div class="form-group">
                                          <input type="password" name="txt_login_password" class="form-control" placeholder="Your Password" value="" />
                                      </div>
                                      <div class="form-group">
                                          <input type="submit" name="btn_login" class="btn btn-success" value="Login" />
                                      </div>
                                      <div class="form-group">
                                         <!--  <a href="#" class="ForgetPwd">Forget Password?</a> -->
                                      </div>
                           </form> 
                            </div> 
						<?php } else { ?>
                              
								<form  action="car_rent_booking.php" method="post" id="agree_form" style="padding: 24px;">
                               
                            <input type="hidden" name="post_step" value="4">
                            <div class="row" style="clear: both;">
                              <div class="col-md-6">
                                <label>User Name: <?php echo @$_SESSION["user"]->user_name; ?></label>
                                <label>E-mail   : <?php echo @$_SESSION["user"]->user_email; ?></label>
                                <label>Phone    : <?php echo @$_SESSION["user"]->user_phone_number; ?></label>
                              </div>
                              <div class="col-md-3"></div>
                              <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                <h5 style="font-size: 15px;margin-bottom: 1px;"><b>TERMS &amp; CONDITIONS</b></h5>
                                <span style="font-size:14px"><span style="color:#FF0000"><strong>ACCESSORIES RENTAL SERVICE BRIEFING</strong></span></span>
                                <div>1. Pay &amp; Go!.</div>
                                <div>2. You are requested to come over to Lyna-CarRental.Com's office for advance payment in the full amount as stated in the "<strong>Accessories Rental Price</strong>".</div>
                                <div>3. Another way, you could also pay all the fee via any options as shown on the page, such as:<br>
&nbsp; &nbsp; &nbsp;3.1. VISA Card<br>
&nbsp; &nbsp; &nbsp;3.2. WESTERN UNION.<br>
&nbsp; &nbsp; &nbsp;3.3. ACLEDA UNITY.<br>
4.&nbsp;After the full amount of payment is well received, the <strong>Accessory or Accessories</strong>&nbsp;will be reserved you within the time frame manner.​</div>
<p><strong>SELF-DRIVE INFORMATION &amp; REQUIREMENT</strong></p>
<p>1. Making a Cambodian Driver’s License by converting your National or International Driver’s License.<br>
2. Depositing one of your valid Passports for your personal insurance purpose, because it is the requirement from the Insurance Company.<br>
3. Depositing the Refundable Deposit in the amount between $500.00 to $1,000.00 according to the years and models of the vehicles.<br>
4. FUEL: The quoted prices [FUEL] is not included – Firstly, Lyna-CarRental.Com’s office will supply the Renter a full tank of [FUEL].&nbsp;<br>
5. The [RENTER] will refill it when it is necessary. On the last day of the Service, the [RENTER] is requested to refill the tank of [FUEL] in full.<br>
6. INSURANCE: Comprehensive Insurance Coverage, such as: 2.1. Third Party Liability (TPL), &nbsp;2.2. Passenger Liability (PL), 2.3. Theft, 2.4. Own Damage (OD), and 2.5. Accident to the Driver (AD).<br>
7. UNLIMITED MILEAGE: Locations and Destinations&nbsp;<br>
8. &nbsp;PROHIBITION: No transport seafood, durian, smoke in the car are allowed. No open the window on the dusty road, otherwise, you will be imposed to charge...</p>

<strong>WITH A SUPPLIED ENGLISH SPEAKING DRIVER</strong>
<p>1. No making Cambodian Driver’s License is required.<br>
2. No Depositing one of your Passports is required.<br>
3. Deposit the Refundable Deposit is cheaper than a self-drive one, just only $300.00.<br>
4. FUEL: The quoted price is not included [FUEL] – Firstly, Lyna-CarRental.Com’s office will supply the [RENTER] a full tank of [FUEL]. The [RENTER] will refill it when it is necessary. On the last day of the Service, the [RENTER] requested to refill the tank of fuel in full.<br>
5. DRIVER’S WORKING DAYS &amp; HOURS: Monday through Saturday from 07:30 – 12:00 and 13:30-18:00<br>
6. WORKING ON SUNDAY &amp; ANY OFFICIAL HOLIDAY:: Sunday or any Official Holidays will subject to extra charge of $15.00 per day<br>
7. DRIVER’S MEAL &amp; ACCOMMODATION: The quoted price is including driver’s meal and accommodation in the province and stay overnight.<br>
8. OVER TIME RATE: $5.00 per hour before 07:30 or after 18:00<br>
9. REPAIR &amp; MAINTENANCE: Included<br>
10. INSURANCE COVERAGE: Full/Comprehensive Included, such as: 7.1. Third Party Liability (TPL), 7.2. Passenger Liability (PL), 7.3. Own Damage (OD), 7.4. Accident to the Driver (AD), and 7.5. Theft&nbsp;<br>
11. PROHIBITION: No transport seafood, durian, smoke in the car are allowed. No open the window on the dusty road, otherwise, you will be imposed to charge...</p>
<span style="font-family:tahoma,geneva,sans-serif">View Detail of the Terms and Conditions</span>
<div class="my-dropdown make-dropdown">
  <input type="checkbox" name="agree_term" id="agree" onclick="checkAgree();" style="margin-top: 6px;"> <span style="padding-left: 40px; font-size:12px;"><a href="/public/index/termcondition"> I agree to the Terms &amp; Conditions</a></span>  
  <button type="submit" id="c_agree" class="btn btn-primary" name="term_condiction">Continue</button>
</div>

                               </div>
                            </div>
                           
                            <?php } ?>
								</form>
								<script type="text/javascript">
									function checkAgree(){
										var agree = $('#agree').val();						   
										if(agree=="on"){
										   $('#c_agree').css("disabled","");
										}else{
										   $('#c_agree').css("disabled","disabled");
										}
									}
								</script>
						</div>            
					</div>
                 
                 
                    <div <?php if($post_step !="4") { ?> style="display:none;" <?php } ?> class="tab-pane <?php if($post_step=="4") {echo "active in";} ?>"<?php if($post_step=="4") { ?>id="five"<?php } ?>>
                    
     
    <!-- <!— Page Content —> -->
    <table id="exportExcel" style="border-collapse:collapse;font-size: 12px;" width="100%">
                                    <tbody><tr>
                                        <th>
                                            <table style="border-collapse:collapse;font-size: 12px; width:100% ;text-align: left; padding:5px; line-height: 14px;" cellpadding="5 ">
                                                <tbody><tr style="line-height: 17px;"><td colspan="4" style="border-bottom:1px solid #ccc;text-align: left;background-color: #7030A0;color:rgb(254, 250, 250);"><strong>&nbsp;Booking Info</strong></td></tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;For :</td>
                                                    <td><?php echo @$_SESSION["user"]->user_name; ?></td>

                                                    <td style="width:18%">&nbsp;Total Day(s) :</td>
                                                    <td>
                                                      <?php
                                 if(!isset($_SESSION["car_rent_pickupdate"]))
                                    {
                                     $_SESSION["car_rent_pickupdate"]="";
                                    }
                                    else {
                                    $_SESSION["car_rent_pickupdate"];
                                    }

                                   if(!isset($_SESSION["car_return_date"]))
                                    {
                                     $_SESSION["car_return_date"]="";
                                    }
                                    else {
                                     $_SESSION["car_return_date"];
                                    }

                                 $date1=date_create($_SESSION["car_rent_pickupdate"]);
                                 $date2=date_create($_SESSION["car_return_date"]);
                                 $diff=date_diff($date1,$date2);
                                 $text_info=$diff->format("%a%")+1;

                                echo $text_duration = str_replace('+', '',$text_info).' Days';
                               
                                 ?>                          
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Pickup Date Time : </td>
                                                    <td>
                                                      <?php
                                                      if(!isset($_SESSION["car_rent_pickupdate_time"]))
                                                          {
                                                           $_SESSION["car_rent_pickupdate_time"]="";
                                                          }
                                                          else {
                                                          $_SESSION["car_rent_pickupdate_time"];
                                                          }
                                                      ?>
                                                      <?php
                                                       echo  $_SESSION["car_rent_pickupdate"].' '. $_SESSION["car_rent_pickupdate_time"];
                                                      ?>                                                     
                                                    </td> 
                                                   
                                                    <td>Pickup Location : </td>
                                                     <td>
                                                       <?php
                                                           if(!isset($_SESSION["pickupfrom_carrent"])) {
                                                                    $location_id=""; 
                                                                     $sql ="SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province 
                                                                              ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id WHERE air_id=''";
                                                                    }
                                                                 else {
                                                                     $location_id=$_SESSION['pickupfrom_carrent'];
                                                                      $sql ="SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province 
                                                                              ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id WHERE air_id='$location_id'";
                                                                     
                                                              }
                                                               $result = $connect->query($sql);
                                                                  if ($result->num_rows > 0) {
                                                                    while($row = $result->fetch_assoc()){
                                                        ?>

                                                      <?php echo $row['pv_title']; ?>

                                                        <?php }} ?>
                                                     </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Return Date Time </td>
                                                    <td>
                                                  <?php
                                                  if(!isset($_SESSION["car_return_time"]))
                                                      {
                                                       $_SESSION["car_return_time"]="";
                                                      }
                                                      else {
                                                      $_SESSION["car_return_time"];
                                                      }
                                                  ?>
                                                  <?php
                                                   echo  $_SESSION["car_return_date"].' '.$_SESSION["car_return_time"];
                                                  ?>       
                                                    </td>

                                                     <td>Return Location : </td>
                                                  <td>

                                                  <?php
                                                         if(!isset($_SESSION["return_location_carental"])) {
                                                                  $return_location_id=""; 
                                                                   $sqls ="SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province 
                                                                                ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_to_id WHERE air_id=''";
                                                                  }
                                                               else {
                                                                   $return_location_id=$_SESSION['return_location_carental'];
                                                                    $sqls ="SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province 
                                                                                ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_to_id WHERE air_id='$return_location_id'";
                                                                   
                                                            }
                                                             $results = $connect->query($sqls);
                                                                if ($results->num_rows > 0) {
                                                                  while($rows = $results->fetch_assoc()){
                                                      ?>

                                                    <?php echo $rows['pv_title']; ?>

                                                      <?php }} ?>  
                                                  </td>
                                                    
                                                    
                                                </tr>
                                               
                                               
                                            </tbody></table>
                                        </th>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tbody>
              </table>

              <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
                                 <tbody><tr><td colspan="8" style="border-bottom:1px solid #ccc;text-align: left;background-color:  #7030A0;color:rgb(254, 250, 250);"><strong style="font-size:14px;">&nbsp;Item Information</strong></td></tr>
                                  <tr>
                                    
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="5%" class="aa text-center">No</th>
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="48%" class="aa text-center">Items Description</th> 

                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="8%" class="aa text-center">Period QTY</th>
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="5%" class="aa text-center">QTY</th> 
                                     <th style="background-color:#7030A0;color:white" colspan="4" width="8%" class="aa text-center">Price In US$</th>
                                  </tr>
                                  <tr style="text-align: center">
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">Price</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">Discount</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%">VAT</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="8%" nowrap="nowrap">Amount</th>
                                  </tr>
                                        <?php
                                        $pro_id_from="";
                          $from_id=$_SESSION['pickupfrom_carrent'];
                                $sql_province ="SELECT pro_from_id,pv_title FROM tbl_carrental_pickup_price 
                                                INNER JOIN tbl_province ON 
                                                tbl_carrental_pickup_price.pro_from_id=tbl_province.pv_id
                                                 WHERE tbl_carrental_pickup_price.air_id='$from_id'
                                 ";
                                  $result = $connect->query($sql_province);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                      $pro_id_from=$row['pro_from_id'];
                                      $pick_from_location=$row['pv_title'];

                                    }}
                                   
                                    
                                $pro_id_to="";
                                $return_to=$_SESSION['return_location_carental'];
                                $sql_to ="SELECT pro_to_id,pv_title FROM tbl_carrental_pickup_price 
                                           INNER JOIN tbl_province ON 
                                                tbl_carrental_pickup_price.pro_to_id=tbl_province.pv_id
                                                 WHERE tbl_carrental_pickup_price.air_id='$return_to'
                                 ";
                                  $result = $connect->query($sql_to);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                      $pro_id_to=$row['pro_to_id'];
                                      $return_to_location=$row['pv_title'];

                                    }}

                                       if(!isset($_SESSION["car_id"])) {
                                          $car_id=""; 
                                           $sql ="SELECT *
                                        FROM tbl_carrental_pickup_price 
                                        LEFT JOIN tbl_vehicle_rantal  ON tbl_carrental_pickup_price.car_id = tbl_vehicle_rantal.ve_id
                                        LEFT JOIN tbl_province        ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id
                                        WHERE tbl_carrental_pickup_price.pro_from_id='$pro_id_from' AND tbl_carrental_pickup_price.pro_to_id='$pro_id_to' AND  ve_id=''";
                                          }
                                       else {
                                           $car_id=$_SESSION['car_id'];
                                            $sql ="SELECT *,tbl_carrental_pickup_price.vat as vat_carren
                                        FROM tbl_carrental_pickup_price 
                                        LEFT JOIN tbl_vehicle_rantal  ON tbl_carrental_pickup_price.car_id = tbl_vehicle_rantal.ve_id
                                        LEFT JOIN tbl_province        ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id
                                        WHERE tbl_carrental_pickup_price.pro_from_id='$pro_id_from' AND tbl_carrental_pickup_price.pro_to_id='$pro_id_to' AND ve_id IN ($car_id)";
                                       }
                                        
                                        $result = $connect->query($sql);

                                        $i=1;
                                        $total_refun_car=0;
                                         $check_price_pick="";
                                         $total_check_price_pick=0;
                                        if ($result->num_rows > 0) {
                                          $amount_car = 0;

                                          while($row = $result->fetch_assoc()){
                                                $check_price_pick=$row['carrental_price'];
                                                $start_day=date_create($_SESSION["car_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["car_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;

                                               if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $day_price=$row['ve_days(1-7)']* $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price+$extraday_price;
                                                  }
                                                  else {
                                                   $day_price=$row['ve_days(1-7)'] * 7;
                                                   $extraday=$total_day-7;
                                                   $extraday_price=$row['ve_extra_days(1-7)'] * $extraday;
                                                   $total_day_price=$day_price+$extraday_price;
                                                  }

                                               }
                                               elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $day_price=$row['ve_day(15-26)'] * $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                  }
                                                  else {
                                                     $day_price=$row['ve_day(15-26)'] * 15;
                                                     $extraday=$total_day-15;
                                                     $extraday_price=$row['ve_extra_day(15-26)'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                              

                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $day_price=$row['ve_monthly'] * $total_day;
                                                    $extraday_price=0;
                                                     $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                   }
                                                   else {
                                                     $day_price=$row['ve_monthly'] * 30;
                                                     $extraday=$total_day-30;
                                                     $extraday_price=$row['ve_monthy_extra_days'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                   }
                                                 
                                               }
                                                elseif ($total_day >365) {
                                                 $day_price=$row['ve_yearly']*365;
                                                 $extraday=$total_day-365;
                                                 $extraday_price=$extraday * $row['ve_yearly_extra_days'];
                                                 $total_day_price=$day_price + $extraday_price;
                                               }
                                               else {

                                               }
                                               // $car_discount=$total_day_price-($total_day_price * $row['discount'])/100;
                                               // $car_vat=$car_discount+($car_discount * $row['vat'])/100;
                                               // $total_car=$car_vat;
                                               // $amount_car +=$total_car;
                                                // daily acessory
                                                 
                                                 $car_daily_discount=($day_price)-($day_price * $row['discount'])/100;
                                                 $car_daily_vat=$car_daily_discount+($car_daily_discount * $row['vat'])/100;
                                                 
                                                 $price_item_car_daily=$car_daily_vat;
                                               // end daily acessory

                                               // extraday acessory
                                                 
                                                 $car_ex_discount=($extraday_price)-($extraday_price * $row['discount'])/100;
                                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row['vat'])/100;
                                                 
                                                 $price_item_car_extra=$car_ex_vat;

                                               // end extraday acessory
                                                // pickup car 
                                                 
                                                 $car_ex_discount=($extraday_price)-($extraday_price * $row['discount'])/100;
                                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row['vat'])/100;
                                                 
                                                 $price_item_car_extra=$car_ex_vat;

                                               // end pickup car 

                                                 $refun_car=$row['refun_deposit'];

                                                 $total_refun_car +=$refun_car;
                                                 $vat_pickup=$row['vat_carren'];
                                                 $total_pick_vat=$check_price_pick+($check_price_pick*$vat_pickup)/100;
                                                 $total_check_price_pick +=$total_pick_vat;
                                                 $sum_car=$price_item_car_daily+$price_item_car_extra+$total_check_price_pick;

                                                 $amount_car +=$sum_car;


                                       ?>
                                 <tr style="height:25px;border:1px!important">
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000"><?php echo  $row['ve_title'].' '.$row['ve_ref_no']; ?></td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                             <?php
                                                $start_day=date_create($_SESSION["car_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["car_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;

                                                echo $total_day-$extraday.' Day(s)';
                                             ?>
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                              <?php
                                               echo "$".number_format($day_price/($total_day-$extraday), 2);
                                             ?>
                                          </td>
                                           
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          <td align="right" style="width:8%;text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">
                                             <?php
                                               echo "$".number_format($price_item_car_daily, 2);
                                             ?>
                                          </td>

                                  </tr>
                                   <?php
                                        if($extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$ <?php  echo number_format($extraday_price/$extraday, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($price_item_car_extra, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

                                  <?php
                                    if($check_price_pick >0) {
                                  ?>
                                   <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Pickup From&nbsp;&nbsp;<?php echo $pick_from_location; ?>&nbsp; & Return &nbsp;<?php echo $return_to_location; ?></td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"></td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($check_price_pick, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php  echo number_format(0, 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat_carren'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($total_pick_vat, 2);
                                       
                                          ?></td>
                                      </tr>

                                  <?php } ?>



                           <?php }} ?>



                                    <?php
                                       if(!isset($_SESSION["accessory_id"])) {
                                          $accessory_id=""; 
                                           $sql ="SELECT * FROM tbl_accessories_rental   WHERE ac_id=''";
                                          }
                                       else {
                                           $accessory_id=$_SESSION['accessory_id'];
                                           if($accessory_id=="") {
                                            $sql ="SELECT * FROM tbl_accessories_rental   WHERE ac_id=''";
                                           }
                                           else {
                                            $accessory_id=$_SESSION['accessory_id'];
                                             $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id IN ($accessory_id)";
                                           }
                                           
                                       }
                                        
                                        $result = $connect->query($sql);
                                       $amount_accessory = 0;
                                       $total_refun_acess=0;
                                        if ($result->num_rows > 0) {
                                          
                                          while($row = $result->fetch_assoc()){
                                                $start_day=date_create($_SESSION["car_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["car_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                
                                               if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $day_price=$row['ac_days(1-7)']* $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price+$extraday_price;
                                                  }
                                                  else {
                                                   $day_price=$row['ac_days(1-7)'] * 7;
                                                   $extraday=$total_day-7;
                                                   $extraday_price=$row['ac_extradays(1-7)'] * $extraday;
                                                   $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                               elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $day_price=$row['ac_days(15-26)'] * $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                  }
                                                  else {
                                                     $day_price=$row['ac_days(15-26)'] * 15;
                                                     $extraday=$total_day-15;
                                                     $extraday_price=$row['ac_extradays(15-26)'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                              

                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $day_price=$row['ac_monthly'] * $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                   }
                                                   else {
                                                     $day_price=$row['ac_monthly'] * 30;
                                                     $extraday=$total_day-30;
                                                     $extraday_price=$row['ac_extramonthly'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                   }
                                                 
                                               }
                                                elseif ($total_day >365) {
                                                 $day_price=$row['ac_yearly']*365;
                                                 $extraday=$total_day-365;
                                                 $extraday_price=$extraday * $row['ac_extrayearly'];
                                                 $total_day_price=$day_price + $extraday_price;
                                               }
                                               else {

                                               }
                                             
                                               // daily acessory
                                                 
                                                 $acc_daily_discount=($day_price)-($day_price * $row['discount'])/100;
                                                 $acc_daily_vat=$acc_daily_discount+($acc_daily_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory_daily=$acc_daily_vat;
                                               // end daily acessory

                                               // extraday acessory
                                                 
                                                 $acc_ex_discount=($extraday_price)-($extraday_price * $row['discount'])/100;
                                                 $acc_ex_vat=$acc_ex_discount+($acc_ex_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory=$acc_ex_vat;

                                               // end extraday acessory
                                                 $refun_acc=$row['refun_deposit'];
                                                 $total_refun_acess +=$refun_acc;
                                                 $sum_acc=$price_item_accessory+$price_item_accessory_daily;

                                                 $amount_accessory +=$sum_acc;


                                       ?>
                                 <tr style="height:25px;border:1px!important">
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000"><?php echo  $row['ac_title'].' '.$row['ac_ref_no']; ?></td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                             <?php
                                                $start_day=date_create($_SESSION["car_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["car_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;

                                                echo $total_day-$extraday.' Day(s)';
                                             ?>
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                              <?php
                                               echo "$".number_format($day_price/($total_day-$extraday), 2);
                                             ?>
                                          </td>
                                           
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          <td align="right" style="text-align:right;text-align:right;width:8%;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">
                                             <?php
                                               echo "$".number_format($price_item_accessory_daily, 2);
                                             ?>
                                          </td>

                                  </tr>
                                  <?php
                                        if($extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$extraday, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($price_item_accessory, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                           <?php }} ?>



                           
                         
                                                                                                          
                                        <?php
                                             if(!isset($_SESSION["driver_id"])) {
                                             $driver_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $driver_id=$_SESSION['driver_id'];
                                             if($driver_id=="") {
                                               $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
                                              $driver_id=$_SESSION['driver_id'];
                                              $sql ="SELECT * FROM tbl_users   WHERE user_id IN ($driver_id)";
                                             }
                                             
                                             }
                                             
                                             $result = $connect->query($sql);
                                          
                                             $amount_drive = 0;
                                             $string_rows="";
                                             $total_extraday=0;
                                            $holiday_price_item=0;
                                            $extraday_price_item=0;
                                            $total_refun_driver=0;
                                            $total_refun_driver_insert=0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                                 // calulate date  and holiday
                                                $start_day=date_create($_SESSION["car_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["car_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["car_rent_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                               // End calulate extra day and normal 
                                                // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_driver=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $amount_drive +=$total_driver;
                                                $refun_driver=$row['refun_deposit'];
                                                 $total_refun_driver +=$refun_driver;
                                                 $total_refun_driver_insert +=$refun_driver;



                                             ?>
                                                                      
                                       <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Chauffeur Rental (<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_day_daily; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($daily_price/$total_day_daily, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;width:8%;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">$<?php
                                         
                                          echo number_format($daily_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                       <?php
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$total_extraday, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;width:8%;padding-left:8px;border:1px solid #000000">$<?php
                                         
                                          echo number_format($extraday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                      <?php
                                        if($total_holiday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_holiday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($holiday_price/$total_holiday, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($holiday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                        <?php }} ?> 


                                         <?php
                                             if(!isset($_SESSION["tour_quide_id"])) {
                                             $tour_quide_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $tour_quide_id=$_SESSION['tour_quide_id'];
                                             if($tour_quide_id =="") {
                                               $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
                                               $tour_quide_id=$_SESSION['tour_quide_id'];
                                               $sql ="SELECT * FROM tbl_users   WHERE user_id IN ($tour_quide_id)";
                                             }
                                            
                                             }
                                             
                                             $result = $connect->query($sql);
                                          
                                              $amount_tour = 0;
                                              $string_rows="";
                                              $total_refun_tour=0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                               // calulate date  and holiday
                                                $start_day=date_create($_SESSION["car_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["car_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["car_rent_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                                 // End calulate extra day and normal 
                                               // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_tour=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $refun_tour=$row['refun_deposit'];
                                                 $total_refun_tour +=$refun_tour;
                                                 $amount_tour +=$total_tour;


                                             ?>
                                                                      
                                       <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Tour Guide Rental (<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_day_daily; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($daily_price/$total_day_daily, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;width:8%;background:#ffffff;border:1px solid #000000;padding-right:5px;" nowrap="">$<?php
                                         
                                          echo number_format($daily_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                       <?php
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$total_extraday, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($extraday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

                                       <?php
                                        if($total_holiday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_holiday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($holiday_price/$total_holiday, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($holiday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                        <?php }} ?>  
                                            
                                                                    
                                      <tr><td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1. Total Rental Fee:</td>
                                      <td align="right" style="text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;$<?php $total_rental= $amount_accessory+$amount_tour+$amount_drive +$amount_car; echo number_format($total_rental, 2);  ?> </td>
                                  </tr>
                                  <tr>
                                      <td colspan="4" rowspan="5" style="font-size:10px;">
                                        <b style="color:#7030A0">NOTICES:</b><br>
                                        <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b><br>
                                        <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b><br>
                                        <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>


                                    </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2. Service Charge (3%):</td>
                                      <td align="right" style="text-align:right;border:1px solid #000000;padding-right:5px;" nowrap="">$<?php $total_service_char=($total_rental *3)/100; echo number_format($total_service_char ,2); ?> </td>
                                  </tr>
                                  <tr>
                                      
                                      <td align="Left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3. Amount Paid :</td>
                                      <td align="right" style="text-align:right;font-weight:bold;background:blue;border:1px solid #000000;padding-right:5px;color:white;" nowrap="">$<?php echo $_SESSION['total_amount']= number_format($total_service_char + $total_rental, 2); ?></td>
                                   <?php
                                   if(!isset($_SESSION["car_id"])) {
                                           $car_id="";
                                           $sql ="SELECT * FROM tbl_vehicle_rantal   WHERE ve_id=''";
                                          
                                          }
                                       else {
                                           $car_id=$_SESSION['car_id'];
                           
                                            $sql ="SELECT ld_assistant FROM tbl_vehicle_rantal  WHERE ve_id IN ($car_id)";

                                           
                                       }

                
                                        $result = $connect->query($sql);
                                         $ld_price =0;
                                        if ($result->num_rows > 0) {
                                         
                                        while($row = $result->fetch_assoc()) {
                                          $ld_price  +=$row['ld_assistant'];
                                          }} 
                                  ?>
                                  </tr>
                                                                    <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;4. LD Assistance<span style="color:red;">*</span>:</td>
                                      <td align="right" style="text-align:right;border:1px solid #000000;padding-right:5px;" nowrap="">$<?php echo number_format($ld_price, 2);  ?></td>
                                  </tr>
                                  

                                   <?php
                                   $car_id=$_SESSION['car_id'];
                                   $query_doff="SELECT refun_deposit FROM tbl_vehicle_rantal  WHERE ve_id IN ($car_id)";
                                 
                                    $result = $connect->query($query_doff);
                                   
                                    $deposit_off=0;
                                        if ($result->num_rows > 0) {

                                        while($rows = $result->fetch_assoc()) {
                                          $deposit_off +=$rows['refun_deposit'];
                                           }}
                                  ?>
                                    <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;5. Refundable Deposit (RD):</td>
                                      <td align="right" style="text-align:right;border:1px solid #000000;padding-right:5px;" nowrap="">$<?php echo number_format($deposit_off, 2); ?>
                                       </td>
                                  </tr>
                                  
                                                                    <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;6. Due Amount <span style="color:red;">**</span>:</td>
                                      <td align="right" style="text-align:right;font-weight:bold;background:blue;border:1px solid #000000;padding-right:5px;color:white;" nowrap="">$<?php echo  number_format($ld_price+$deposit_off, 2); ?></td>
                                  </tr>
                                  
                               </tbody></table>

                                                            <!-- <!— Popup Checkout Form —> -->
         <div id="aba_main_modal" class="aba-modal">
            <!-- <!— Modal content —> -->
            <div class="aba-modal-content">
            
                  
                 
               <!-- Include PHP class -->
               <?php
                  require_once 'PayWayApiCheckout.php';  
               ?>
                  
               <form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getApiUrl(); ?>" id="aba_merchant_request" class="booking-form">
                <?php
                     $transactionId =date("Ymd").''.rand(10,1000000);
                     // $transactionId ="201904014364688";
                     $amount =$total_service_char + $total_rental;
                     $firstName =@$_SESSION["user"]->user_first_name;
                     $lastName =@$_SESSION["user"]->user_last_name;
                     $phone =@$_SESSION["user"]->user_phone_number;
                     $email =@$_SESSION["user"]->user_email;
                     $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'lyna-CarRental/car_rent_booking.php?tranid='.$transactionId;
                       $_SESSION['rental_form_type']="rental form type";
                  ?>

                  <input type="hidden" name="hash" value="<?php echo PayWayApiCheckout::getHash($transactionId, $amount); ?>" id="hash"/>
                  <input type="hidden" name="tran_id" value="<?php echo $transactionId; ?>" id="tran_id"/>
                  <input type="hidden" name="amount" value="<?php echo $amount; ?>" id="amount"/>
                  <input type="hidden" name="firstname" value="<?php echo $firstName; ?>"/>
                  <input type="hidden" name="lastname" value="<?php echo $lastName; ?>"/>
                  <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                  <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                  <input type="hidden" name="continue_success_url" value="<?php echo $continue_success_url; ?>"/>




               </form>
              
            </div>
            <!-- <!— end Modal content—> -->
         </div>
      <!-- <!— End Popup Checkout Form —> -->
      <div class="container" style="margin-top: 75px;margin: 0 auto;">
         <div style="width: 200px;margin: 0 auto;">
           
            <input type="hidden" name="total_amount" value="">
            <input type="button" class="pull-right btn btn-primary" id="checkout_button" value="Checkout Now">
          
         </div>
      </div>
   <link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
   <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script>
      <script>
         $(document).ready(function () {
            $('#checkout_button').click(function () {
                window.location.href="paynow.php";
              // AbaPayway.checkout();

            });
         });
      </script>
      <!-- <!— Page Content —> -->
       


                   </div>

                


            </div>
            </div>
            </div>
      
      
      
	






		</div>
	<div class="col-md-4">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-right-none sm-padding-left-none md-padding-left-15 xs-padding-left-none padding-bottom-40 scroll_effect fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;margin-top: 10px;">
			<div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
				<h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><strong>Reservation</strong> Information</h4>
				<div class="table-responsive" style="padding:10px;">
					<table class="table no-border no-margin">
						<tbody>
							<tr>
								<td>Duration : </td>
								<td>
									<?php
										if(!isset($_SESSION["car_rent_pickupdate"])){
											$_SESSION["car_rent_pickupdate"]="";
										}else {
											$_SESSION["car_rent_pickupdate"];
										}
										if(!isset($_SESSION["car_return_date"])){
											$_SESSION["car_return_date"]="";
										}else{
											$_SESSION["car_return_date"];
										}										
										$date1 = date_create($_SESSION["car_rent_pickupdate"]);
										$date2 = date_create($_SESSION["car_return_date"]);
										$diff  = date_diff($date1,$date2);
										$text_info = $diff->format("%a%")+1;				
										echo $text_duration = str_replace('+', '',$text_info).' Days';										
									?>                           
								</td>
							</tr>
							<tr>
								<td>Pickup Date/Time : </td>
								<td>
									<?php
										if(!isset($_SESSION["car_rent_pickupdate_time"])){
											$_SESSION["car_rent_pickupdate_time"]="";
										}else {
											$_SESSION["car_rent_pickupdate_time"];
										}
										?>
									<?php
										echo  $_SESSION["car_rent_pickupdate"].' '. $_SESSION["car_rent_pickupdate_time"];
									?>                             
								</td>
							</tr>
							<tr>
								<td>Return Date/Time : </td>
								<td>
									<?php
										if(!isset($_SESSION["car_return_time"])){
											$_SESSION["car_return_time"]="";
										}else {
											$_SESSION["car_return_time"];
										}
										?>
									<?php
										echo  $_SESSION["car_return_date"].' '.$_SESSION["car_return_time"];
									?>                           
								</td>
							</tr>
							<tr>
								<td>Pickup Location : </td>
								<td>
									<?php
										if(!isset($_SESSION["pickupfrom_carrent"])){
											$location_id=""; 
											$sql = "SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id WHERE air_id=''";
										}else{
											$location_id=$_SESSION['pickupfrom_carrent'];
											$sql = "SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id WHERE air_id='$location_id'";									  
										}
										$result = $connect->query($sql);
										if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){
									?>
									<?php echo $row['pv_title']; ?>
									<?php }} ?>
								</td>
							</tr>
							<tr>
								<td>Return Location : </td>
								<td>
									<?php
										if(!isset($_SESSION["return_location_carental"])) {
											$return_location_id=""; 
											$sqls ="SELECT * FROM tbl_province  WHERE pv_id=''";
										}else{
											$return_location_id=$_SESSION['return_location_carental'];
											$sqls = "SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_to_id WHERE air_id='$return_location_id'";								  
										}
										$results = $connect->query($sqls);
											if ($results->num_rows > 0) {
											while($rows = $results->fetch_assoc()){
										?>
										<?php echo $rows['pv_title']; ?>
									<?php }} ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
				<h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><span style="font-weight: 800">Chauffeur</span> Info</h4>
				<div class="table-responsive" style="padding:10px;">
					<table class="table no-border no-margin">
						<tbody>
							<?php
								if(!isset($_SESSION["driver_id"])) {
									$driver_id=""; 
									$sql ="SELECT * FROM tbl_users  WHERE user_id=''";
								}else {
									$driver_id=$_SESSION['driver_id'];
									if($driver_id ==""){
										$sql ="SELECT * FROM tbl_users  WHERE user_id=''";
									}else {
										$driver_id=$_SESSION['driver_id'];
										$sql ="SELECT * FROM tbl_users  WHERE user_id IN ($driver_id)";
									}								
								}								
								$result = $connect->query($sql);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
								<tr style="border:0px solid #000 !important;">
									<td>Chauffeur Rental :</td>
									<td>(<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
								</tr>
							<?php }} ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
				<h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><span style="font-weight: 800">Tour Guide</span> Info</h4>
				<div class="table-responsive" style="padding:10px;">
					<table class="table no-border no-margin">
						<tbody>
							<?php
								if(!isset($_SESSION["tour_quide_id"])){
									$tour_quide_id=""; 
									$sql ="SELECT * FROM tbl_users  WHERE user_id=''";
								}else {
									$tour_quide_id=$_SESSION['tour_quide_id'];
									if($tour_quide_id=="") {
										$tour_quide_id="";
										$sql ="SELECT * FROM tbl_users  WHERE user_id=''";
									}else {
										$tour_quide_id=$_SESSION['tour_quide_id'];
									   $sql ="SELECT * FROM tbl_users  WHERE user_id IN ($tour_quide_id)";
									}
								}								
								$result = $connect->query($sql);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
								<tr style="border:0px solid #000 !important;">
									<td>Tour Guide Rental :</td>
									<td>(<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
								</tr>
							<?php }} ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
				<h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><span style="font-weight: 800">Accessories</span> Info</h4>
				<div class="table-responsive" style="padding:10px;">
					<table class="table no-border no-margin">
						<tbody>
							<?php
								if(!isset($_SESSION["accessory_id"])) {
									$accessory_id=""; 
									$sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id=''";
								}else {								
									$accessory_id=$_SESSION['accessory_id'];
									if($accessory_id=="") {
										$accessory_id="";
										$sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id=''";
									}else {
										$accessory_id=$_SESSION['accessory_id'];
										$sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id IN ($accessory_id)";
									}								
								}								
								$result = $connect->query($sql);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
							<tr style="border:0px solid #000 !important;">
								<td>Ref. No :</td>
								<td><?php echo $row['ac_ref_no']; ?></td>
							</tr>
							<tr style="border:0px solid #000 !important;">
								<td>Name :</td>
								<td><?php echo $row['ac_title']; ?></td>
							</tr>
							<?php }} ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
				<h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><span style="font-weight: 800">Vehicle </span> Info</h4>
				<div class="table-responsive" style="padding:10px;">
					<table class="table no-border no-margin">
						<tbody>
							<?php
								if(!isset($_SESSION["car_id"])) {
									$car_id="";
									$sql ="SELECT * FROM tbl_vehicle_rantal   WHERE ve_id=''";
								}else {
									$car_id=$_SESSION['car_id'];								
									$sql ="SELECT * FROM tbl_vehicle_rantal  WHERE ve_id IN ($car_id)";	
								}
								$result = $connect->query($sql);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td>Ref. No:</td>
								<td><?php echo $row['ve_ref_no']; ?></td>
							</tr>
							<tr>
								<td>Vehicle:</td>
								<td><?php echo $row['ve_title']; ?> <?php echo $row['ve_year']; ?></td>
							</tr>
							<?php }}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
require_once("footer.php"); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="./css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="./css/new_style.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./js/bootstrap-datepicker.min.js" type="text/javascript"></script>



<script type="text/javascript">
 $("#agree_form").submit(function(event) {
                    
                          var agree = $('#agree').val();
                          if($("#agree").is(':checked')){
                                 return true;
                               }else{
                                  $('#c_agree').css("disabled","");
                                  alert("Please Agree with Terms & Conditions First !");
                                  return false;
                              }
                                 
                      });

 $("#form_car").submit(function( event ) {
            car_data = $("#identity_car").val();
            if(car_data==''){
              $("#check_car").html("Please Select Vehicle");

              return false;
            }
           
            else{
              return true;
            }
});

 // funtion check step hidden show
 $("#li_one").on("click",function(){
   $('#tap_tour').css("display","none");
   $('#tap_accessory').css("display","none");
   $('#tap_driver').css("display","none");
   $('#btn_car').css("display","none");
   $('#form_car').css("display","none");

 })

 // end step hidden show
</script>
<script>
    $(document).ready(function() {
        BindControls();
    });

    function BindControls() {
        var Countries = ['TAKEO', 
            'KEP', 
            'PHNOM PENH', 
            ];

        $('.tbCountries').autocomplete({
            source: Countries,
            minLength: 0,
            scroll: true
        }).focus(function() {
            $(this).autocomplete("search", "");
        });
    }
</script>
<script>
    $(".nav-tabs li").click(function(){
  $(".nav-tabs li").removeClass("active");
  $(this).addClass("active");
});
</script>
<style type="text/css">.tabbable-line .nav-tabs>li {    padding: 0px 0px !important;}
label {
 
     display: block !important;
    margin-bottom: 0;
    font-weight: bold !important
}
/*form-new-css*/

.m-bottom-0{margin-bottom:0 !important;}
/*.col-container {*/
/*  display: flex!important;*/
/*  width: 100%;*/
/*}*/
span.white-span,p.white-span {
    font-weight: bold;
}
.form-control {
    padding: 4px !important;
    border-radius: 0;
    border: 1px solid #000;
}
input[type="text"] {
    width: 100%;
}
input[type="checkbox"] {
    margin-right: 10px;
}
input#datepicker {
    color: #7c8a97 !important;
}
.form-textarea{padding:5px !important;font-weight:normal;color:#7c8a97 !important;width: 100% !important;}
.find-form p input{color: #7c8a97 !important;}
.find-box {
    background:url(../img/find-box-bg.png) no-repeat scroll 0 0; !important;
    padding:20px 15px 0px 15px !important;
    z-index: 999;
    background-color:#ec4133 !important;
    box-shadow: 0px 0px 5px 0px #ec4133;
}
.find-form .nice-select{padding:5px !important; line-height:33px !important;color: #7c8a97;}
span.normal-font {
    font-weight: 400 !important;
}
.find-form label{color:#fff !important; font-weight:bold !important;}
button.gauto-theme-btn{background:yellow !important;color:#ec4133 !important;margin-top:10px;}
.tab_container{width:100% !important;background:#ec4133 !important; left:-15px !important;}
ul.tabs{min-height:auto !important;width:100% !important;}
</style>
</div>