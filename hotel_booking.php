<?php 
    include_once ('system/config/database.php');
    require_once("header.php");
    require_once 'php-mailjet-v3-simple.class.php';

    if(!empty($_POST)){
        $_POST['txt_checkin_date'] =date('Y-m-d',strtotime($_POST['txt_checkin_date']));
        $_POST['txt_checkout_date'] =date('Y-m-d',strtotime($_POST['txt_checkout_date']));

    }
?>

<?php
if(!isset($_SESSION["term_condiction"])) {
  $_SESSION['term_check_pay'] =1;
}
$post_step="";
$post_step=trim($connect->real_escape_string(@$_POST['post_step']));
if(!isset($_SESSION["allowLog"])) {
    $_SESSION['allowLog'] ="";
}

if(isset($_POST["btn_find_home"]) || isset($_POST["btn_select_data"]) ) {
  $_SESSION['txt_province']=@$connect->real_escape_string($_POST['txt_province']);
  $_SESSION['txt_checkin_date']=@$connect->real_escape_string($_POST['txt_checkin_date']);
  $_SESSION['txt_checkout_date']=@$connect->real_escape_string($_POST['txt_checkout_date']);
  $_SESSION['txt_adult']=@$connect->real_escape_string($_POST['txt_adult']);
  $_SESSION['txt_children']=@$connect->real_escape_string($_POST['txt_children']);
  
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
      }
      else {
         
          // $post_step=="4";
          
          // echo "<script>alert('Wrong username or password.')</script>";
      }

  }

  if(isset($_POST['btn_driver'])) {
    $_SESSION['driver_id']=@$connect->real_escape_string($_POST['identity_driver']);
    $str_hotel_id=$_SESSION['driver_id'];
    $str = "$str_hotel_id";
    $ex_str=(explode(",",$str));
    foreach ($ex_str as $key) {
      $_SESSION['txt_check_room'.$key]=@$connect->real_escape_string($_POST['txt_check_room'.$key]);
    }
    
  }

?>

<div class="container py-3">
   <div class="panel panel-default">
      <div style="color: #a4509f;" class="panel-heading">
         <h4 class="head-form"><i class="fa fa-handshake-o" aria-hidden="true"></i>
            &nbsp;SEARCH FOR HOTEL & GUESTHOUSE RENTAL
         </h4>
      </div>

      <div class="row">
      	<div class="col-md-8">
<div class="tabbable-panel margin-tops4">
                       <div class="tabbable-line ">
			       
			                                <ul class="nav nav-tabs tabtop  tabsetting" id="myTab" role="tablist">
                        <li <?php if(empty($post_step)){echo "class='active'";} ?>>
                            <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Select Date</a>
                        </li>
                        <li <?php if($post_step=="1"){ echo "class='active'"; }?>>
                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Select Hotels</a>
                        </li>
                        <li <?php if($post_step=="2"){ echo "class='active'"; }?>>
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Personal Info</a>
                        </li>
                         <li <?php if($post_step=="3"){ echo "class='active'"; }?>>
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Three" aria-selected="false">Confirm Booking</a>
                        </li>
        </ul>

			        
			        </div>

			       <div class="tab-content" id="myTabContent" style="margin-top:30px;">

			          <div class="tab-pane <?php if(empty($post_step)) {echo "in active";} ?>" id="one">
                                            <form action="hotel_booking.php" method="POST" class="booking-form">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងទៅយករថយន្ត';?></label>
                                            <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                   
                                                 <p>
                                                        <span class="white-span"><strong><?=(@$_SESSION['lang']=='en')?'Rooms Facilities':''?>;</strong></span>

                                                        <div class="row">

                                                           <div class="col-md-12">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Cool & Hot Water':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-12">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Air Conditioning Room':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Fridge':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Wifi':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Fan':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'TV':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                </div>

                                                 </p>
                                                  
                                            
                                                    
                                                   
                                                    
                                                </div>
                                                <div class="col-md-8 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Checkin Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                           <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Checkin Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Check Out Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Check Out Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                    </div>                                                    
                                                        <div class="row" style="margin-top:-5px">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                          
                                                                <label>No. of Standard Room(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            
                                                      <label>No. of VIP Rooms:</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                    </div>
                                                   
                                                        </div>
                                                         <p class="m-top-0">
                                                   <label>No. of Family Room(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                    </p>
                                                  <div class="row" style="margin-top:-5px">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                          
                                                                <label>No. of Adult(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            
                                                      <label>No. of Enfant(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                    </div>
                                                   
                                                        </div>
                                                    </div>                                                   
                                            
                                            <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Find HOTEL & GUESTHOUSE</button>
                                                    </p>
                                                </div>
                                                </div>
                                              </form>  
			         
			      

			          </div>
			          <div class="tab-pane <?php if($post_step=="1") {echo "active in";} ?>" id="two" <?php if($post_step=="1") { ?> id="two" <?php } ?> >

                 
			          	<form method="post" action="hotel_booking.php" id="form_drive" class="booking-form">
			          	<input type="hidden" name="post_step" value="2">
			          	<button style="margin-top: 10px;" class="btn gauto-theme-btn" name="btn_driver" type="submit">Continue</button>
			          	<label id="alert_drive"></label>
			          	 <?php 
                              if(!isset($_SESSION["txt_province"])) {
                                 $txt_province="";  
                                }
                                else {
                                 $txt_province=$_SESSION['txt_province']; 
                                }
                                if(!isset($_SESSION["txt_adult"])) {
                                 $txt_adult="";  
                                }
                                else {
                                 $txt_adult=$_SESSION['txt_adult']; 
                                }
                                if(!isset($_SESSION["txt_children"])) {
                                 $txt_children="";  
                                }
                                else {
                                 $txt_children=$_SESSION['txt_children']; 
                                }
                                            $v_sql = "SELECT * FROM  tbl_hotel
                                            LEFT JOIN tbl_province ON tbl_province.pv_id = tbl_hotel.province_id
                                            LEFT JOIN tbl_hotel_include_option ON tbl_hotel_include_option.hotel_id = tbl_hotel.ht_id
                                            WHERE  tbl_hotel.province_id='$txt_province' AND
                                                   tbl_hotel.adult='$txt_adult' AND tbl_hotel.children='$txt_children'
                                                   GROUP BY tbl_hotel.ht_id
                                                   ORDER BY tbl_hotel.ht_id
                                            ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                $h_id=$row['ht_id'];
                             ?>
							<div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
							    <div class="col-md-3">
							        <img src="system/admin/image/hotel/<?php echo $row['ht_image']; ?>" class="preview">
							    </div>
							    <div class="col-md-6">
							        <ul>
							            <li style="list-style: none;margin-bottom: -3px !important;">
							                <label><i class="fa fa-hotel" aria-hidden="true"></i> Hotel :<span><?php echo $row['ht_title']; ?></span><br>
                                <span><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $row['ht_location']; ?></span>
                                <br>
                                <ol class="Pills" data-selenium="pill-container" style="margin-left: 15px;">
                                  
                                    <?php
                                     $v_sql_check = "SELECT * FROM  tbl_hotel_include_option
                                                        WHERE hotel_id='$h_id'
                                              ";
                                            $results = $connect->query($v_sql_check);

                                            if ($results->num_rows > 0){
                                                while($row_id = $results->fetch_assoc()){

                                    ?>
                                     <?php
                                       if($row_id['name']=="1") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Breakfast</li>
                                     <?php } ?>
                                      <?php
                                       if($row_id['name']=="2") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Pay at the hotel</li>
                                     <?php } ?>
                                      <?php
                                       if($row_id['name']=="3") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Welcome drink</li>
                                     <?php } ?>
                                      <?php
                                       if($row_id['name']=="4") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Complimentary in- room fruit</li>
                                     <?php } ?>
                                      <?php
                                       if($row_id['name']=="5") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Free cancellation</li>
                                     <?php } ?>
                                      <?php
                                       if($row_id['name']=="6") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Parking</li>
                                     <?php } ?>
                                      <?php
                                       if($row_id['name']=="7") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Free mini bar</li>
                                     <?php } ?> <?php
                                       if($row_id['name']=="8") {
                                     ?>
                                     <li class="Pill Pill--BenefitsPayments Pill--outlined" data-selenium="pill-item" data-element-name="pill-each-item">Price includes</li>
                                     <?php } ?>
                                  <?php }} ?>

                                
                               </ol>
                                <span><i class="fa fa-id-card" aria-hidden="true"></i> Book with a Credit Card</span>
                              </label>
							            </li>

                          <li style="list-style: none;margin-bottom: -3px !important;">
                              <label><i class="fa fa-money" aria-hidden="true"></i>  Price :<span>$ <?php echo $row['price']; ?> /Day</span></label>
                              <br><label><i class="fa fa-eye-slash" aria-hidden="true"></i> <a href="hotel_detail.php?id=<?php echo $row['ht_id']; ?>" target="_blank"> View</a></label>
                          </li>
							            
							           


							        </ul>
							    </div>
							    <div class="col-md-3">
							       <span style="position: absolute;float: left;">Tick the Box</span>
							       <input  type="checkbox" name="tick" class="checkbox input-checkbox" onclick="adddriver(<?php echo $row['ht_id'];?>)" id="adddriver_<?php echo $row['ht_id'];?>" style="float: right;">
                                       <br>
                                       <span>Rooms :</span>
                                       <input class="form-control hidden" readonly type="text"  name="qty_driver_<?php echo $row['ht_id'];?>" value="" id="number_driver_<?php echo $row['ht_id'];?>">
                                       <select  name="txt_check_room<?php echo $row['ht_id'];?>" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                       </select>
							    </div>
							</div>  
					<?php }} ?>  
					  <input type="hidden" name="identity_driver" id="identity_driver"/>
            <input type="hidden" name="identity_room" id="identity_room"/>

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
                  </form>
			          </div>
			          <div class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" id="three" <?php if($post_step=="1") { ?> id="three" <?php } ?>>


			          	<div class="row">
    <?php

                           if($_SESSION['allowLog'] != "logAlready"){
                           ?>

        <div class="col-md-12">

            <form method="post" action="hotel_booking.php" class="booking-form">
                <input type="hidden" name="post_step" value="2">

                <h4 class="text-white m-3" style="text-align:center;">Login for Form</h4>

                <div class="form-group">
                    <input type="text" name="txt_login_username" class="form-control" placeholder="Your Username" value="" />
                </div>
                <div class="form-group">
                    <input type="password" name="txt_login_password" class="form-control" placeholder="Your Password" value="" />
                </div>
                <div class="form-group">
                    <button type="submit" name="btn_login" class="btn gauto-theme-btn" value="Login">Login</button>
                </div>
                <div class="form-group">
                    <!--  <a href="#" class="ForgetPwd">Forget Password?</a> -->
                </div>
            </form>
        </div>
        <?php } else { ?>

            <form action="hotel_booking.php" method="post" id="agree_form" style="padding: 24px;">

                <input type="hidden" name="post_step" value="3">
                <div class="row" style="clear: both;">
                    <div class="col-md-6">
                        <label>User Name:
                            <?php echo @$_SESSION["user"]->user_name; ?>
                        </label>
                        <label>E-mail :
                            <?php echo @$_SESSION["user"]->user_email; ?>
                        </label>
                        <label>Phone :
                            <?php echo @$_SESSION["user"]->user_phone_number; ?>
                        </label>
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
                        <div>3. Another way, you could also pay all the fee via any options as shown on the page, such as:
                            <br> &nbsp; &nbsp; &nbsp;3.1. VISA Card
                            <br> &nbsp; &nbsp; &nbsp;3.2. WESTERN UNION.
                            <br> &nbsp; &nbsp; &nbsp;3.3. ACLEDA UNITY.
                            <br> 4.&nbsp;After the full amount of payment is well received, the <strong>Accessory or Accessories</strong>&nbsp;will be reserved you within the time frame manner.​</div>
                        <p><strong>SELF-DRIVE INFORMATION &amp; REQUIREMENT</strong></p>
                        <p>1. Making a Cambodian Driver’s License by converting your National or International Driver’s License.
                            <br> 2. Depositing one of your valid Passports for your personal insurance purpose, because it is the requirement from the Insurance Company.
                            <br> 3. Depositing the Refundable Deposit in the amount between $500.00 to $1,000.00 according to the years and models of the vehicles.
                            <br> 4. FUEL: The quoted prices [FUEL] is not included – Firstly, Lyna-CarRental.Com’s office will supply the Renter a full tank of [FUEL].&nbsp;
                            <br> 5. The [RENTER] will refill it when it is necessary. On the last day of the Service, the [RENTER] is requested to refill the tank of [FUEL] in full.
                            <br> 6. INSURANCE: Comprehensive Insurance Coverage, such as: 2.1. Third Party Liability (TPL), &nbsp;2.2. Passenger Liability (PL), 2.3. Theft, 2.4. Own Damage (OD), and 2.5. Accident to the Driver (AD).
                            <br> 7. UNLIMITED MILEAGE: Locations and Destinations&nbsp;
                            <br> 8. &nbsp;PROHIBITION: No transport seafood, durian, smoke in the car are allowed. No open the window on the dusty road, otherwise, you will be imposed to charge...</p>

                        <strong>WITH A SUPPLIED ENGLISH SPEAKING DRIVER</strong>
                        <p>1. No making Cambodian Driver’s License is required.
                            <br> 2. No Depositing one of your Passports is required.
                            <br> 3. Deposit the Refundable Deposit is cheaper than a self-drive one, just only $300.00.
                            <br> 4. FUEL: The quoted price is not included [FUEL] – Firstly, Lyna-CarRental.Com’s office will supply the [RENTER] a full tank of [FUEL]. The [RENTER] will refill it when it is necessary. On the last day of the Service, the [RENTER] requested to refill the tank of fuel in full.
                            <br> 5. DRIVER’S WORKING DAYS &amp; HOURS: Monday through Saturday from 07:30 – 12:00 and 13:30-18:00
                            <br> 6. WORKING ON SUNDAY &amp; ANY OFFICIAL HOLIDAY:: Sunday or any Official Holidays will subject to extra charge of $15.00 per day
                            <br> 7. DRIVER’S MEAL &amp; ACCOMMODATION: The quoted price is including driver’s meal and accommodation in the province and stay overnight.
                            <br> 8. OVER TIME RATE: $5.00 per hour before 07:30 or after 18:00
                            <br> 9. REPAIR &amp; MAINTENANCE: Included
                            <br> 10. INSURANCE COVERAGE: Full/Comprehensive Included, such as: 7.1. Third Party Liability (TPL), 7.2. Passenger Liability (PL), 7.3. Own Damage (OD), 7.4. Accident to the Driver (AD), and 7.5. Theft&nbsp;
                            <br> 11. PROHIBITION: No transport seafood, durian, smoke in the car are allowed. No open the window on the dusty road, otherwise, you will be imposed to charge...</p>
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
                function checkAgree() {

                    var agree = $('#agree').val();

                    if (agree == "on") {
                        $('#c_agree').css("disabled", "");
                    } else {
                        $('#c_agree').css("disabled", "disabled");
                    }
                }
            </script>

</div>
			          


			          </div>
			     <div class="tab-pane <?php if($post_step=="3") {echo "active in";} ?>" id="four" <?php if($post_step=="3") { ?> id="four"<?php  } ?>>
			                                         <table style="border-collapse:collapse;font-size: 12px; width:100% ;text-align: left; padding:5px; line-height: 14px;" cellpadding="5 ">
                                                <tbody><tr style="line-height: 17px;"><td colspan="4" style="border-bottom:1px solid #ccc;text-align: left;background-color: #ec3323;color:rgb(254, 250, 250);"><strong>&nbsp;Booking Info</strong></td></tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;For :</td>
                                                    <td><?php echo @$_SESSION["user"]->user_name; ?></td>

                                                    <td style="width:18%">&nbsp;Total Day(s) :</td>
                                                    <td> 
                                                      <?php
                                                     if(!isset($_SESSION["txt_checkin_date"]))
                                                        {
                                                         $_SESSION["txt_checkin_date"]="";
                                                        }
                                                        else {
                                                        $_SESSION["txt_checkin_date"];
                                                        }

                                                       if(!isset($_SESSION["txt_checkout_date"]))
                                                        {
                                                         $_SESSION["txt_checkout_date"]="";
                                                        }
                                                        else {
                                                         $_SESSION["txt_checkout_date"];
                                                        }

                                                     $date1=date_create($_SESSION["txt_checkin_date"]);
                                                     $date2=date_create($_SESSION["txt_checkout_date"]);
                                                     $diff=date_diff($date1,$date2);
                                                     $text_info=$diff->format("%a%")+1;
                                                     $total_day=$text_info;

                                                    echo $text_duration = str_replace('+', '',$text_info).' Days';
                                                   
                                                     ?>                                                                         
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Check In Date : </td>
                                                    <td>
                                                       <?php
                                                      if(!isset($_SESSION["txt_checkin_date"]))
                                                          {
                                                           $_SESSION["txt_checkin_date"]="";
                                                          }
                                                          else {
                                                          $_SESSION["txt_checkin_date"];
                                                          }
                                                      ?>
                                                      <?php
                                                  echo   $_SESSION["txt_checkin_date"];
                                                      ?>                                                            
                                                   </td> 
                                                   
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Check Out Date : </td>
                                                    <td>
                                      <?php
                                                      if(!isset($_SESSION["txt_checkout_date"]))
                                                          {
                                                           $_SESSION["txt_checkout_date"]="";
                                                          }
                                                          else {
                                                          $_SESSION["txt_checkout_date"];
                                                          }
                                                      ?>
                                                      <?php
                                                  echo  $_SESSION["txt_checkout_date"];
                                                      ?>        
                                                    </td>
                                                    
                                                    <td></td>
                                                </tr>
                                                <tr></tr>
                                            </tbody></table>

                                            <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
                                 <tbody><tr><td colspan="8" style="border-bottom:1px solid #ccc;text-align: left;background-color:  #ec3323;color:rgb(254, 250, 250);"><strong style="font-size:14px;">&nbsp;Item Information</strong></td></tr>
                                  <tr>
                                    
                                     <th style="background-color:#ec3323;color:white" rowspan="2" width="5%" class="aa text-center">No</th>
                                     <th style="background-color:#ec3323;color:white" rowspan="2" width="45%" class="aa text-center">Items Description</th> 

                                     <th style="background-color:#ec3323;color:white" rowspan="2" width="8%" class="aa text-center">Period QTY</th>

                                     <th style="background-color:#ec3323;color:white" rowspan="2" width="5%" class="aa text-center">QTY</th> 
                                     <th style="background-color:#ec3323;color:white" colspan="4" width="8%" class="aa text-center">Price In US$</th>
                                  </tr>
                                  <tr style="text-align: center">
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%">Price</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%">Discount</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%">VAT</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%" nowrap="nowrap">Amount</th>
                                 
                           
                         
                                                                                                          
                                         <?php
                                             if(!isset($_SESSION["driver_id"])) {
                                             $driver_id=""; 
                                             $sql ="SELECT * FROM tbl_hotel WHERE ht_id  ='' ";
                                                 }
                                             else {
                                             $driver_id=$_SESSION['driver_id'];
                                             if($driver_id=="") {
                                               $sql ="SELECT * FROM tbl_hotel WHERE ht_id  ='' ";
                                             }
                                             else {
                                              $driver_id=$_SESSION['driver_id'];
                                              $sql ="SELECT * FROM tbl_hotel   WHERE ht_id IN ($driver_id)";
                                             }
                                             
                                             }
                                             
                                             $result = $connect->query($sql);
                                            
                                          
                                             $amount_drive = 0;
                                             $i=1;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                                 $qty_room=$_SESSION['txt_check_room'.$row['ht_id']];
                                                 $drive_price=$row['price'] * $qty_room;
                                                 $drive_price_only=$row['price'];
                                                 $dr_discount_rent=$row['discount'];
                                                 $dr_vat_rent=$row['vat'];
                                                 $total_befor_di_vat=$drive_price * $total_day;
                                                 $dr_discount=$total_befor_di_vat-($total_befor_di_vat * $row['discount'])/100;
                                                 $dr_vat=$dr_discount+($dr_discount * $row['vat'])/100;
                                                 $total_driver=$dr_vat;
                                                 $amount_drive +=$total_driver;

                                             ?>
                                           </tr>                           
                                       <tr>                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Hotel Rental (<?php echo $row['ht_title']; ?>)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000;"><?php echo $total_day; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $qty_room; ?></td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000;">$<?php  echo number_format($drive_price_only, 2); ?></td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000;"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000;"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;width:8%;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">$<?php
                                         
                                          echo number_format($total_driver, 2);
                                       
                                          ?></td>
                                      </tr>
                                        <?php }} ?> 
                                            
                                                                    
                                      <tr><td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1. Total Rental Fee:</td>
                                      <td align="right" style="text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;$  
                                        <?php echo number_format($total_rental=$amount_drive, 2);  ?></td>
                                  </tr>
                                  <tr>
                                      <td colspan="4" rowspan="5" style="font-size:10px;">
                                        <b style="color:#ec3323">NOTICES:</b><br>
                                        <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b><br>
                                        <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b><br>
                                        <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>


                                    </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2. Service Charge (3%):</td>
                                      <td align="right" style="text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">$<?php 
                                      $total_service_char=($total_rental *3)/100; echo number_format($total_service_char, 2); ?></td>
                                  </tr>
                                  <tr>
                                      
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3. Amount Paid :</td>
                                      <td align="right" style="text-align:right;background:#ec3323;border:1px solid #000000;padding-right:5px;color:white;font-weight:900;" nowrap="">$<?php echo number_format($total_service_char + $total_rental, 2); ?></td>
                                  </tr>
                                
                                  
                               </tbody></table> 

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
                     $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'lyna-CarRental/hotel_booking.php?tranid='.$transactionId;
                    
                  ?>

                  <input type="hidden" name="hash" value="<?php echo PayWayApiCheckout::getHash($transactionId, $amount); ?>" id="hash"/>
                  <input type="hidden" name="tran_id" value="<?php echo $transactionId; ?>" id="tran_id"/>
                  <input type="hidden" name="amount" value="<?php echo $amount; ?>" id="amount"/>
                  <input type="hidden" name="firstname" value="<?php echo $firstName; ?>"/>
                  <input type="hidden" name="lastname" value="<?php echo $lastName; ?>"/>
                  <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                  <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                  <input type="hidden" name="continue_success_url" value="<?php echo $continue_success_url; ?>"/>
                 

                  
                  <?php 
                  $url =PayWayApiCheckout::getApiUrl() . '/check/transaction/';
                  $merchantId =PayWayApiCheckout::getMerchantId();
                  $key =PayWayApiCheckout::getApiKey();
                  $pushBack =$transactionId;
                  $jsonResponse=PayWayApiCheckout::checkTransaction($url, $merchantId, $pushBack, $key); 
                 
                  $result = json_decode($jsonResponse, true);
                  $customer_id=@$_SESSION["user"]->user_id;
                  $pro_id_insert=$_SESSION['txt_province'];
                  $txt_checkin_date_in=$_SESSION['txt_checkin_date'];
                  $check_out_date_in=$_SESSION['txt_checkout_date'];
                  $adult_number_in=$_SESSION['txt_adult'];
                  $children_number_in=$_SESSION['txt_children'];
                  $amount_web_pay=$total_service_char + $total_rental;
                 
                  $today = date("Y-m-d");
                  $start_day=date_create($_SESSION["txt_checkin_date"]);
                  $end_day=date_create($_SESSION["txt_checkout_date"]);
                  $day=date_diff($start_day,$end_day);
                  $total_day = $day->format("%a%")+1;

                 
                 
                  $get_url_tran_id=$connect->real_escape_string(@$_GET['tranid']);
                  if( ($get_url_tran_id !="") && ($_SESSION["term_check_pay"]) !="" ) {
                  if($result['status'] ==0){
                     $sql = "INSERT INTO `tbl_hotel_booking`(
                            `user_id`,
                            `province_id`,
                            `check_in_date`,
                            `check_out_date`,
                            `total_day`,
                            `term_id`,
                            `adult_number`,
                            `children_number`,
                            `amount_web_pay`,
                            `transactionId`,
                            `book_date`
                            
                        )
                        VALUES(
                            '$customer_id',
                            '$pro_id_insert',
                            '$txt_checkin_date_in',
                            '$check_out_date_in',
                            '$total_day',
                            '1',
                            '$adult_number_in',
                            '$children_number_in',
                            '$amount_web_pay',
                            '$get_url_tran_id',
                            '$today'
                            

                            )";
                        if($connect->query($sql)){
                           unset($_SESSION["term_check_pay"]);
                            // header("location: ./customer_login.php?sms=register_success");
                        }

                         $booklast_id = $connect->insert_id;

                           $driver_id=$_SESSION['driver_id'];
                         if($driver_id !="") {

                         $sql ="SELECT * FROM tbl_hotel   WHERE ht_id IN ($driver_id)";
                         $result = $connect->query($sql);
                         $amount_drive = 0;
                         if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()){
                           $ho_id_in=$row['ht_id'];
                           $discount_in=$row['discount'];
                           $vat_in=$row['vat'];
                           $price_in=$row['price'];
                           $total_room_in=$_SESSION['txt_check_room'.$ho_id_in];
                           
                           $sql_driver = "INSERT INTO `tbl_hotel_book_items`(
                            `booking_id`,
                            `hotel_id`,
                            `discount`,
                            `vat`,
                            `price`,
                            `total_book_romm`
                        )
                        VALUES(
                            '$booklast_id',
                            '$ho_id_in',
                            '$discount_in',
                            '$vat_in',
                            '$price_in',
                            '$total_room_in'
                            
                            )";
                        if($connect->query($sql_driver)){
                          
                            // header("location: ./customer_login.php?sms=register_success");
                        }
                  }
               }
            }


             // send email

                        $htmlContent ='<table align="center" style="width:100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
               <tr>
        <td>
          <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%!important;font-family:Arial;font-size:12px">
            <tbody>
              <tr>
                <td>
                  <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial;font-size:12px">
                    <tbody>
                      <tr>
                        <td>
                          <table width="100%" align="center" style="background:#fbff00">
                            <tbody><tr align="center" style="height:12px;font-size:30px">
                              <td><span>លីណា-ជួលរថយន្តទេសចរណ៍</span></td>
                            </tr>
                            <tr align="center" style="height:12px;font-size:30px">
                              <td><span>Lyna-CarRental.Com</span></td>
                            </tr>
                            <tr align="center" style="height:12px;font-size:30px;background:#0c109e;border-top:2px solid #ffffff">
                              <td><span style="color:red"></span></td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                      <tr style="height:30px"><td><hr></td></tr>
                      <tr bgcolor="#ffffff">
                        <td>
                          <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial;font-size:12px">
                            <tbody><tr><td colspan="5"><center><h2>RESERVATION INVOICE</h2></center></td></tr><tr border="1" style="background:#dfdfdf">
                                <td width="20%" align="left">Bill For : </td>
                                <td width="25%" align="left">'.@$_SESSION["user"]->user_first_name.'.'.@$_SESSION["user"]->user_last_name.'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr border="1">
                                <td width="20%" align="left">Phone No. : </td>
                                <td width="25%" align="left">'.@$_SESSION["user"]->user_phone_number.'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr border="1" style="background:#dfdfdf">
                                <td width="20%" align="left">E-mail Address : </td>
                        <td width="25%" align="left"><a href="mailto:'.@$_SESSION["user"]->user_email.'" target="_blank">'.@$_SESSION["user"]->user_email.'</a></td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr><tr>
                                <td width="20%" align="left">Check In Date:</td>
                        <td width="25%" align="left">'.$_SESSION["txt_checkin_date"].'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr>
                                <td width="20%" align="left">Check Out Date:</td>
                                <td width="25%" align="left">'.$_SESSION["txt_checkout_date"].'</td>
                                
                                <td width="20%" align="left">Destination:</td>
                                <td  width="20%">'.$total_day.' day(s)</td>
                              </tr>

                               <tr style="background:#dfdfdf">
                               
                                <td width="5%"></td>
                                <td width="20%" align="left">Booking No.: </td>
                                <td width="30%" align="right" style="color:red"><b style="color:red">'.$transactionId.'</b></td>
                              </tr><tr>
                               
                                <td></td>
                                <td width="20%" align="left">Booking Date: </td>

                                <td width="30%" align="right">'.$today.'</td>
                              </tr><tr height="30px" bgcolor="#ffffff" style="border-bottom:1px solid #000000"><td colspan="5"><hr></td> </tr></tbody>
                          </table>
                        </td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td>
                          <table style="width:100%;border-collapse:collapse;font-family:Arial;font-size:12px" border="0" align="center" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr style="background-color:#ec3323;color:white;height:40px;border:1px solid #000000;color:#ffffff">
                                <td align="center" style="border:1px solid #000000">No. </td>
                                <td align="center" style="border:1px solid #000000">Items Description</td>
                                <td align="center" style="border:1px solid #000000">Total Day</td>
                                <td align="center" style="border:1px solid #000000">Item QTY</td>
                                <td align="center" style="border:1px solid #000000">Price</td>
                                <td align="center" style="border:1px solid #000000">Discount</td>
                                <td align="center" style="border:1px solid #000000">VAT</td>
                                
                                <td align="center" style="border:1px solid #000000">Amount</td>
                              </tr>';
                              


 

                                 



                          if(!isset($_SESSION["driver_id"])) {
                                             $driver_id=""; 
                                             $sql ="SELECT * FROM tbl_hotel   WHERE ht_id=''";
                                                 }
                                             else {
                                             $driver_id=$_SESSION['driver_id'];
                                             if($driver_id=="") {
                                               $sql ="SELECT * FROM tbl_hotel   WHERE ht_id=''";
                                             }
                                             else {
                                              $driver_id=$_SESSION['driver_id'];
                                              $sql ="SELECT * FROM tbl_hotel   WHERE ht_id IN ($driver_id)";
                                             }
                                             
                                             }
                                             $result = $connect->query($sql);
                                              $i=1;
                                             $amount_drive = 0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                                $qty_room=$_SESSION['txt_check_room'.$row['ht_id']];
                                                 $drive_price=$row['price'] * $qty_room;
                                                 $drive_price_only=$row['price'];
                                                 $dr_discount_rent=$row['discount'];
                                                 $dr_vat_rent=$row['vat'];
                                                 $total_befor_di_vat=$drive_price * $total_day;
                                                 $dr_discount=$total_befor_di_vat-($total_befor_di_vat * $row['discount'])/100;
                                                 $dr_vat=$dr_discount+($dr_discount * $row['vat'])/100;
                                                 $total_driver=$dr_vat;
                                                 $amount_drive +=$total_driver;
                         $htmlContent.='<tr style="height:30px;border:1px solid #000000">
                              <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">'.$i++.'</td>
                              <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Chauffeur Rental('.$row["ht_title"].')</td>';
                              

                                             
                           $htmlContent.='<td align="center" style="border:1px solid #000000;width:8%">'.$total_day.' Day(s)</td>
                              <td align="center" style="border:1px solid #000000;width:5%">'.$qty_room.'</td>
                              <td align="right" style="text-align:right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">$'.number_format($drive_price_only, 2).'</td>
                              <td align="right" style="text-align:right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format($row['discount'], 2).'%</td>
                              <td align="right" style="text-align:right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format($row['vat'], 2).'%</td>
                              <td align="right" style="text-align:right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">$'.number_format($total_driver, 2).'</td>
                              </tr>';

                            }}

                              
                           $htmlContent.='<tr style="height:25px;border:0px!important">
                              <td align="left" style="padding-left:0px" colspan="4" rowspan="6">
                              <span style="font-size:11px"><b style="color:red"><u>Note</u> *</b><br> 1. Long Distance Assistance Fee (LD Assistance) will be refunded 70%, if no problem with the rented car. </span><br>
                                      <span style="font-size:12px">2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</span>
                                      <br><span style="font-size:12px">3 The Refundable Deposit &amp; Long Distance Assistance Fee will be paid on your arrival to save the service charge!</span>
                              </td>
                                      <td align="right" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">Total Rental Fee:</td>';
                                      $total_rental=$amount_drive;
                             $htmlContent.='<td align="right" style="text-align:right;border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($total_rental, 2).'</td>
                                      </tr><tr style="height:25px;border:0px!important">
                                      <td align="right" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">Service Charge (3%):
                                      </td>';
                                      $total_service_char=($total_rental *3)/100;
                              $htmlContent.='<td align="right" style="text-align:right;border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($total_service_char, 2).'</td>
                                      </tr>';
                                    $paid=$total_service_char + $total_rental;
                                    $htmlContent.='<tr style="height:25px;border:0px!important">
                                      <td align="right" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap=""> Amount Paid :</td>
                                      <td align="right" style="text-align:right;background:#e6e6e6;border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($paid, 2).'</td>
                                      </tr>
                                    
                                    
                                      </tbody>
                          </table>
                    </td></tr></tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>';
    
            
    $to_Email_user=@$_SESSION["user"]->user_email; //Replace with recipient email address
    // $to_Email_admin       = "info@lyna-carrental.com,gma@lyna-carrental.com"; //Replace with recipient email address
    $subject        = 'Lyna-Carrental.Com - Reservation Invoice'; //Subject line for emails

   $mj = new Mailjet('0f3b76e670da893dc377982bd55f4ea4','77139ba33543dd8ca6b4de100a6e7c0d');
      $params = array(
      "method" => "POST",
      "FromEmail" => "kemun.dev@gmail.com",
      "FromName" => "info@lyna-carrental.com",
      "Subject" => "$subject",
      "Text-part" => "$subject",
      "Html-part" => "$htmlContent",
      "Recipients" =>json_decode('[{"Email":"kemun.dev@gmail.com"}]', true)
      // "Recipients" =>json_decode('[{"Email":"info@lyna-carrental.com"},{"Email":"gma@lyna-carrental.com"}]', true)
     
    );
    $result = $mj->send($params);
    if ($mj->_response_code == 200){
       // echo "success";
       // var_dump($result);
    } else {
     // echo "<pre>
     //  Dear all beloved customer, 
     //  We are very sorry to inform you that your Booking Payment is working normal. But you won't get any responding mail. 
     //  Our IT Team is stilling working on it. You may have to call us for confirmation. 
      
     //  Thank you!</pre>";
     //  exit();
     
    }

     $mj = new Mailjet('0f3b76e670da893dc377982bd55f4ea4','77139ba33543dd8ca6b4de100a6e7c0d');
  
        $params_arr = array(
            "method" => "POST",
            "from" => "kemun.dev@gmail.com",
            "to" => "$to_Email_user",
            "subject" => "$subject",
            "html" => "$htmlContent"
        );

        $result = $mj->sendEmail($params_arr);

        if ($mj->_response_code == 200) {
         // session_destroy();
         // unset($_SESSION);
         header("location: ./success.php");

        }
           
        else {
         header("location: ./error.php");
         
        }

                        //end send email



















                  }
              }

                  ?>



              </form>
              </div>
            </div>  


              









 <div class="container" style="margin-top: 75px;margin: 0 auto;">
                   <div style="width: 200px;margin: 0 auto;">
                     

                      <button type="button" class="pull-right btn gauto-theme-btn" id="checkout_button" value="Checkout Now">Checkout Now</button>
                    
                   </div>
                </div>
             <link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
             <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script>
                <script>
                   $(document).ready(function () {
                      $('#checkout_button').click(function () {
                         
                         AbaPayway.checkout();

                      });
                   });
                </script>



			     </div>
           

        		</div>


      	</div></div>
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
                                 if(!isset($_SESSION["txt_checkin_date"]))
                                    {
                                     $_SESSION["txt_checkin_date"]="";
                                    }
                                    else {
                                    $_SESSION["txt_checkin_date"];
                                    }

                                   if(!isset($_SESSION["txt_checkout_date"]))
                                    {
                                     $_SESSION["txt_checkout_date"]="";
                                    }
                                    else {
                                     $_SESSION["txt_checkout_date"];
                                    }

                                 $date1=date_create($_SESSION["txt_checkin_date"]);
                                 $date2=date_create($_SESSION["txt_checkout_date"]);
                                 $diff=date_diff($date1,$date2);
                                 $text_info=$diff->format("%a%")+1;

                                echo $text_duration = str_replace('+', '',$text_info).' Days';
                               
                                 ?>                          
                               </td>
                           </tr>
                           <tr>
                              <td>Check In Date : </td>
                              <td>
                                 <?php
                                      if(!isset($_SESSION["txt_checkin_date"]))
                                        {
                                        $_SESSION["txt_checkin_date"]="";
                                         }
                                       else {
                                         $_SESSION["txt_checkin_date"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["txt_checkin_date"];
                                        ?>                                                                        
                              </td>
                           </tr>
                           <tr>
                              <td>Check Out Date : </td>
                              <td>
                                <?php
                                      if(!isset($_SESSION["txt_checkout_date"]))
                                        {
                                        $_SESSION["txt_checkout_date"]="";
                                         }
                                       else {
                                         $_SESSION["txt_checkout_date"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["txt_checkout_date"];
                                        ?>                                                                  
                              </td>
                           </tr>
                           <tr>
                            <td>Hotel Location : </td>
                            <td>
                               <?php
                                      if(!isset($_SESSION["txt_province"]))
                                        {
                                         $id=$_SESSION["txt_province"]="";
                                         }
                                       else {
                                        $id= $_SESSION["txt_province"];
                                         }
                                       
                                 $sql ="SELECT * FROM tbl_province WHERE pv_id='$id'";
                                  $result = $connect->query($sql);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                 <?php echo $row['pv_title']; ?>

                                 <?php }} ?>
                            </td>
                           </tr>

                    
                        </tbody>
                     </table>
                  </div>

                  <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                            <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><span style="font-weight: 800">Hotel</span> Info</h4>
                            <div class="table-responsive" style="padding:10px;">
                                <table class="table no-border no-margin">
                                    <tbody>
                                       <?php
                                             if(!isset($_SESSION["driver_id"])) {
                                             $driver_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $driver_id=$_SESSION['driver_id'];
                                             if($driver_id =="") {
                                              $sql ="SELECT * FROM tbl_hotel  WHERE ht_id=''";
                                             }
                                             else {
                                              $driver_id=$_SESSION['driver_id'];
                                              $sql ="SELECT * FROM tbl_hotel   WHERE ht_id IN ($driver_id)";
                                             }
                                             
                                             }
                                             
                                             $result = $connect->query($sql);
                                             if ($result->num_rows > 0) {
                                             while($row = $result->fetch_assoc()){
                                             ?>
                                          <tr style="border:0px solid #000 !important;">
                                             <td>Hotel Rental :</td>
                                             <td>(<?php echo $row['ht_title']; ?> / $ <?php echo number_format($row['price'],2); ?> / Day)</td>
                                          </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                  </div>

               </div>

           </div>

      	</div>



      </div>





   </div>
</div>





<?php require_once("footer.php"); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="./css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="./css/new_style.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<!-- finished footer included -->
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
<style type="text/css">
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

 $("#form_drive").submit(function( event ) {
            alldata = $("#identity_driver").val();
          
            if(alldata==''){
              $("#alert_drive").html("Select Hotel Rental");
              return false;
            }
            else{
              return true;
            }
          });
</script>
<script>
    $(".nav-tabs li").click(function(){
  $(".nav-tabs li").removeClass("active");
  $(this).addClass("active");
});
</script>
<style type="text/css">
label {
  text-transform: initial;
}
    
    #form_select_data label {
    margin-bottom: 1rem;
    margin-top: 1rem;
}
    
</style>