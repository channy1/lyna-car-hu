<?php 
    include_once ('system/config/database.php');
    require_once("header.php");
    require_once 'php-mailjet-v3-simple.class.php';
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
  $_SESSION['driver_province_id']=@$connect->real_escape_string($_POST['driver_province_id']);
  $_SESSION['driver_language_id']=@$connect->real_escape_string($_POST['driver_language_id']);
 

  $_SESSION['driver_rent_pickupdate']=@$connect->real_escape_string($_POST['driver_rent_pickupdate']);
  $_SESSION['driver_rent_pickupdate_time']=@$connect->real_escape_string($_POST['driver_rent_pickupdate_time']);
  $_SESSION['driver_return_date']=@$connect->real_escape_string($_POST['driver_return_date']);
  $_SESSION['driver_return_time']=@$connect->real_escape_string($_POST['driver_return_time']);
}
if(isset($_POST["btn_find_home"])) {
   $_SESSION['driver_comment']=@$connect->real_escape_string($_POST['driver_comment']);
}


if(isset($_POST['btn_driver'])){
$_SESSION['driver_id']=@$connect->real_escape_string($_POST['identity_driver']);
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

?>

<div class="container py-3">
   <div class="panel panel-default">
      <div style="color: #a4509f;" class="panel-heading">
         <h4 clas="head-form"><i class="fa fa-handshake-o" aria-hidden="true"></i>
            &nbsp;SEARCH FOR DRIVER RENTAL
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
			                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Select a Driver</a>
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
                                     <form action="driver_rent_booking.php" method="POST" class="booking-form">
                                            <div class="row">
                                                   <div class="col-md-6">
                                                    <p>
                                                        <label>Select Province/City</label>
                                                <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="m-top-0">
                                                                <label><?=(@$_SESSION['lang']=='en')?'Select Languages' : 'ជ្រើសរើសភាសា' ;?></label>
                                                                <select name="driver_language_id" class="selectpicker form-control input-sm" id="" data-show-subtext="true" data-live-search="true">
                                                                    <option  data-subtext="" value="">SELECT LANGUAGE</option>
                                                                     <option value="1">ENGLISH</option>
                                                                    <option value="2">KOREAN</option>
                                                                    <option value="3">CHINESE</option>
                                                                    <option value="4">JAPANESE</option>
                                                                    <option value="5">THAI</option>
                                                                    <option value="6">KHMER</option>
                                                                </select>

                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Location':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input placeholder="Home | Hotel | School" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p>
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Drop-off Location':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" placeholder="Home | Hotel | School" /></p>
                                                        </div>
                                                        
                                                    </div>                                                    
                                                   
                                                    <p style="margin-top: 1px !important;margin-bottom:0";>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Pickup Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p>
                                                    
                                                      <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                        
                                                    </div>
                                                <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Home | Hotel | School | Restaurant ETC . . .">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                     <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Return Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                    </div>                                                   
                                                <div class="col-md-12">
                                                    <p>
                                                        <button type="submit" name="btn_find_home" class="gauto-theme-btn"><?=(@$_SESSION['lang']=='en')?'Find Driver Now' : 'ស្វែងរករថយន្ត';?></button>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>
			         
			      

			          </div>
			          <div class="tab-pane <?php if($post_step=="1") {echo "active in";} ?>" id="two" <?php if($post_step=="1") { ?> id="two" <?php } ?> >

                 
			          	<form method="post" action="driver_rent_booking.php" id="form_drive" class="booking-form">
			          	<input type="hidden" name="post_step" value="2">
			          	<button style="margin-top: 10px;" class="btn gauto-theme-btn" name="btn_driver" type="submit">Continue</button>
			          	<label id="alert_drive"></label>
			          	 <?php 
                                            $v_sql = "SELECT * FROM  tbl_users
                                            INNER JOIN tbl_relationship_users_position On tbl_users.user_id = tbl_relationship_users_position.user_id
                                            WHERE  user_position='3' AND user_position_id='8' AND  province_id='$driver_province_id'
                                            ";
                                           
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                             ?>
							<div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
							    <div class="col-md-3">
							        <img src="system/img/img_partner/<?php echo $row['user_photo']; ?>" class="preview">
							    </div>
							    <div class="col-md-6">
							        <ul>
							            <li style="list-style: none;margin-bottom: -3px !important;">
							                <label>First Name :<span><?php echo $row['user_first_name']; ?></span></label>
							            </li>
							            <li style="list-style: none;margin-bottom: -3px !important;">
							                <label>Last Name :<span><?php echo $row['user_last_name']; ?></span></label>
							            </li>
							            <li style="list-style: none;margin-bottom: -3px !important;">
							                <label>Gender :<span><?php echo $row['user_gender']; ?></span></label>
							            </li>

							           
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Normal     :<span>$<?php echo $row['daily_rate']; ?>/day</span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Extraday   :<span>$<?php echo $row['extra_rate']; ?>/day</span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Holiday(s) :<span>$<?php echo $row['weekend_holidate_rate']; ?>/day</span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Monthly :<span>$<?php echo $row['monthly_rate']; ?>/day</span></label></li>
                                     

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
					<?php }} ?>  
					  <input type="hidden" name="identity_driver" id="identity_driver"/>

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

            <form method="post" action="driver_rent_booking.php" class="booking-form">
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

            <form action="driver_rent_booking.php" method="post" id="agree_form" style="padding: 24px;">

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
                            <button type="submit" id="c_agree" class="btn gauto-theme-btn" name="term_condiction">Continue</button>
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
                                                     if(!isset($_SESSION["driver_rent_pickupdate"]))
                                                        {
                                                         $_SESSION["driver_rent_pickupdate"]="";
                                                        }
                                                        else {
                                                        $_SESSION["driver_rent_pickupdate"];
                                                        }

                                                       if(!isset($_SESSION["driver_return_date"]))
                                                        {
                                                         $_SESSION["driver_return_date"]="";
                                                        }
                                                        else {
                                                         $_SESSION["driver_return_date"];
                                                        }

                                                     $date1=date_create($_SESSION["driver_rent_pickupdate"]);
                                                     $date2=date_create($_SESSION["driver_return_date"]);
                                                     $diff=date_diff($date1,$date2);
                                                     $text_info=$diff->format("%a%")+1;
                                                     $total_day=$text_info;

                                                    echo $text_duration = str_replace('+', '',$text_info).' Days';
                                                   
                                                     ?>                                                                         
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Pickup Date Time : </td>
                                                    <td>
                                                       <?php
                                                      if(!isset($_SESSION["driver_rent_pickupdate_time"]))
                                                          {
                                                           $_SESSION["driver_rent_pickupdate_time"]="";
                                                          }
                                                          else {
                                                          $_SESSION["driver_rent_pickupdate_time"];
                                                          }
                                                      ?>
                                                      <?php
                                                  echo  $_SESSION["driver_rent_pickupdate"].' '. $_SESSION["driver_rent_pickupdate_time"];
                                                      ?>                                                            
                                                   </td> 
                                                   
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Return Date Time </td>
                                                    <td>
                                      <?php
                                                      if(!isset($_SESSION["driver_return_time"]))
                                                          {
                                                           $_SESSION["driver_return_time"]="";
                                                          }
                                                          else {
                                                          $_SESSION["driver_return_time"];
                                                          }
                                                      ?>
                                                      <?php
                                                  echo  $_SESSION["driver_return_date"].' '. $_SESSION["driver_return_time"];
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
                                     <th style="background-color:#ec3323;color:white" rowspan="2" width="48%" class="aa text-center">Items Description</th> 

                                     <th style="background-color:#ec3323;color:white" rowspan="2" width="8%" class="aa text-center">Period QTY</th>
                                     <th style="background-color:#ec3323;color:white" rowspan="2" width="5%" class="aa text-center">QTY</th> 
                                     <th style="background-color:#ec3323;color:white" colspan="4" width="8%" class="aa text-center">Price In US$</th>
                                  </tr>
                                  <tr style="text-align: center">
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="5%">Price</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="5%">Discount</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="5%">VAT</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="5%" nowrap="nowrap">Amount</th>
                                 
                           
                         
                                                                                                          
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
                                              $sql ="SELECT * FROM tbl_users   WHERE user_id IN ($driver_id)

                                              ";
                                            
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
                                             $i=1;
                                             
                                            
                                           
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                               // calulate date  and holiday
                                                $start_day=date_create($_SESSION["driver_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["driver_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["driver_rent_pickupdate"];
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
                                                    $total_extraday=0;
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
                                                 $total_driver=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $amount_drive +=$total_driver;
                                                $refun_driver=$row['refun_deposit'];
                                                 $total_refun_driver +=$refun_driver;
                                                 $total_refun_driver_insert +=$refun_driver;


                                                 // $drive_price=$total_day_price;
                                                 // $dr_discount_rent=$row['discount'];
                                                 // $refun=$row['refun_deposit'];
                                                 // $dr_vat_rent=$row['vat'];
                                                 // $total_befor_di_vat=$drive_price;
                                                 // $dr_discount=$total_befor_di_vat-($total_befor_di_vat * $row['discount'])/100;
                                                 // $dr_vat=$dr_discount+($dr_discount * $row['vat'])/100;
                                                 // $total_driver=$dr_vat;
                                                 // $amount_drive +=$total_driver;
                                                 // $total_refun +=$refun;


                                             ?>
                                           </tr>                           
                                       <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Chauffeur Rental (<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_day_daily; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$ <?php  echo number_format($daily_price/$total_day_daily, 2); ?></td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="background:#ffffff;width:8%;border:1px solid #000000;" nowrap="">$<?php
                                         
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
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$total_extraday, 2); ?></td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
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
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($holiday_price/$total_holiday, 2); ?></td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $row['discount']; ?>%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($holiday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>


                                        <?php }} ?> 
                                            
                                                                    
                                      <tr style="height:25px;border:1px!important"><td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1.Total Rental Fee:</td>
                                      <td align="right" style="border:1px solid #000000;" nowrap="">&nbsp;$<?php echo number_format($total_rental=$amount_drive, 2);  ?></td>
                                  </tr>
                                  <tr>
                                      <td colspan="4" rowspan="5" style="font-size:10px;">
                                        <b style="color:#ec3323">NOTICES:</b><br>
                                        <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b><br>
                                        <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b><br>
                                        <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>


                                    </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2.Service Charge (3%):</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">$<?php 
                                      $total_service_char=($total_rental *3)/100; echo number_format($total_service_char, 2); ?></td>
                                  </tr>
                                  <tr>
                                      
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3. Amount Paid :</td>
                                      <td align="right" style="background:#ec3323;font-weight:900;border:1px solid #000000;padding-right:5px;color:white;" nowrap="">&nbsp;$<?php echo number_format($total_service_char + $total_rental, 2); ?></td>
                                  </tr>
                                   <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;4. Refundable Deposit (RD):</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">&nbsp;$ 
                                      <?php echo number_format($total_refun_driver, 2); ?>
                                       </td>
                                  </tr>
                                    <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;5. Due Amount <span style="color:red;">**</span>:</td>
                                      <td align="right" style="background:#ec3323;border:1px solid #000000;color:white;font-weight:900;" nowrap="">&nbsp;$<?php echo number_format($total_refun_driver, 2); ?></td>
                                  </tr>

                                
                                  
                               </tbody></table> 

                                <div id="aba_main_modal" class="aba-modal">
            <!-- <!— Modal content —> -->
            <div class="aba-modal-content">
            
                  
                 
               <!-- Include PHP class -->
               <?php
                  require_once 'PayWayApiCheckout.php';  
               ?>
                  
               <form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getApiUrl(); ?>" id="aba_merchant_request">
                <?php
                     $transactionId =date("Ymd").''.rand(10,1000000);
                     // $transactionId ="201904014364688";
                     $amount =$total_service_char + $total_rental;
                     $firstName =@$_SESSION["user"]->user_first_name;
                     $lastName =@$_SESSION["user"]->user_last_name;
                     $phone =@$_SESSION["user"]->user_phone_number;
                     $email =@$_SESSION["user"]->user_email;
                     $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'lyna-CarRental/driver_rent_booking.php?tranid='.$transactionId;
                    
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
                  $p_date=$_SESSION["driver_rent_pickupdate"];
                  $re_date=$_SESSION["driver_return_date"];
                  $pickup_time=$_SESSION['driver_rent_pickupdate_time'];
                  $return_time=$_SESSION['driver_return_time'];
                  $amount_web_pay=$total_service_char + $total_rental;
                  $driver_comment=@$_SESSION['driver_comment'];
                  $today = date("Y-m-d");
                  $pro_id=$_SESSION['driver_province_id'];
                  $language_id=$_SESSION['driver_language_id'];
                  $get_url_tran_id=$connect->real_escape_string(@$_GET['tranid']);
                  if( ($get_url_tran_id !="") && ($_SESSION["term_check_pay"]) !="" ) {
                  if($result['status'] ==0){
                     $sql = "INSERT INTO `tbl_book_info`(
                            `pickup_date`,
                            `return_date`,
                            `pickup_time`,
                            `return_time`,
                            `total_day`,
                            `term_id`,
                            `user_book_id`,
                            `refund_deposit`,
                            `ld_assistant`,
                            `amount_web_pay`,
                            `transactionId`,
                            `book_date`,
                            `book_type_order`,
                            `pickup_map`,
                            `return_map`,
                            `des_name`,
                            `pickup_location`,
                            `return_location`
                        )
                        VALUES(
                            '$p_date',
                            '$re_date',
                            '$pickup_time',
                            '$return_time',
                            '$total_day',
                            '1',
                            '$customer_id',
                            '$total_refun_driver_insert',
                            '0',
                            '$amount_web_pay',
                            '$get_url_tran_id',
                            '$today',
                            '3',
                            '0',
                            '0',
                            '$driver_comment',
                            '$pro_id',
                            '0'

                            )";
                        if($connect->query($sql)){
                           unset($_SESSION["term_check_pay"]);
                            // header("location: ./customer_login.php?sms=register_success");
                        }
                         $booklast_id = $connect->insert_id;

                           $driver_id=$_SESSION['driver_id'];
                         if($driver_id !="") {

                         $sql ="SELECT * FROM tbl_users  WHERE user_id IN ($driver_id)";
                         $result = $connect->query($sql);
                          $amount_drive = 0;
                                             $string_rows="";
                                             $total_extraday=0;
                                            $holiday_price_item=0;
                                            $extraday_price_item=0;
                                            $total_refun_driver=0;
                         if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()){
                           $in_driver_id=$row['user_id'];
                            // calulate date  and holiday
                                                $start_day=date_create($_SESSION["driver_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["driver_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["driver_rent_pickupdate"];
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
                                                 $price_daily_insert=$daily_price/$total_day_daily;
                                                 $price_extra_insert=$extraday_price/$total_extraday;
                                                 $price_holiday_insert=$holiday_price/$total_holiday;

                                                 $dr_vat_rent=$row['vat'];
                                                 $dr_discount_rent=$row['discount'];

                           
                           $sql_driver = "INSERT INTO `tbl_book_drive`(
                            `b_book_id`,
                            `driver_id`,
                          
                            `b_discount`,
                            `b_vat`,
                            
                            `driver_type`,
                            `language_id`,
                            `day_daily`,
                            `day_extra`,
                            `holiday_number`,
                            `price_daily`,
                            `price_extra`,
                            `price_holiday`
                        )
                        VALUES(
                            '$booklast_id',
                            '$in_driver_id',
                            
                            '$dr_discount_rent',
                            '$dr_vat_rent',
                           
                            '3',
                            '$language_id',
                            '$total_day_daily',
                            '$total_extraday',
                            '$total_holiday',
                            '$price_daily_insert',
                            '$price_extra_insert',
                            '$price_holiday_insert'
                            
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
                                <td width="20%" align="left">Pickup Date and Time:</td>
                        <td width="25%" align="left">'.$_SESSION["driver_rent_pickupdate"].':'.$_SESSION["driver_rent_pickupdate_time"].'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr>
                                <td width="20%" align="left">Return Date and Time:</td>
                                <td width="25%" align="left">'.$_SESSION["driver_return_date"].':'.$_SESSION["driver_return_time"].'</td>
                                
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
                                <td align="center" style="border:1px solid #000000">Period QTY</td>
                                <td align="center" style="border:1px solid #000000">Item QTY</td>
                                <td align="center" style="border:1px solid #000000">Price</td>
                                <td align="center" style="border:1px solid #000000">Discount</td>
                                <td align="center" style="border:1px solid #000000">VAT</td>
                                
                                <td align="center" style="border:1px solid #000000">Amount</td>
                              </tr>';
                              


 

                                 



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
                                              $i=1;
                                             $amount_drive = 0;
                                              $string_rows="";
                                              $total_refun=0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                               // calulate date  and holiday
                                                $start_day=date_create($_SESSION["driver_rent_pickupdate"]);
                                                $end_day=date_create($_SESSION["driver_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["driver_rent_pickupdate"];
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
                         $htmlContent.='<tr style="height:30px;border:1px solid #000000">
                              <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">'.$i++.'</td>
                              <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Chauffeur Rental('.$row["user_first_name"].'/'.$row["user_last_name"].')</td>';
                              

                                             
                           $htmlContent.='<td align="center" style="border:1px solid #000000;width:8%">'.$total_day_daily.' Day(s)</td>
                              <td align="center" style="border:1px solid #000000;width:5%">1</td>
                              <td align="right" style="border:1px solid #000000;width:8%;" nowrap="">$'.number_format($daily_price/$total_day_daily, 2).'</td>
                              <td align="right" style="border:1px solid #000000;width:8%;" nowrap="">'.number_format($row['discount'], 2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;" nowrap="">'.number_format($row['vat'], 2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;" nowrap="">$'.number_format($daily_price_item, 2).'</td>
                              </tr>';

                               if($total_extraday>0) {
                                $htmlContent.='<tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">'.$i++.'</td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">'.$total_extraday.' Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$'.number_format($extraday_price/$total_extraday, 2).'</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['discount'], 2).'%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['vat'], 2).'%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$'.number_format($extraday_price_item, 2).'</td>
                                      </tr>
                                ';

                               }
                                if($total_holiday>0) {
                                    $htmlContent.='<tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">'.$i++.'</td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">'.$total_holiday.' Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$'.number_format($holiday_price/$total_holiday, 2).'</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['discount'], 2).'%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['vat'], 2).'%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$'.number_format($holiday_price_item, 2).'</td>
                                      </tr>';
                                }

                            }}

                              
                           $htmlContent.='<tr style="height:25px;border:0px!important">
                              <td align="left" style="padding-left:0px" colspan="4" rowspan="6">
                              <span style="font-size:11px"><b style="color:red"><u>Note</u> *</b><br> 1. Long Distance Assistance Fee (LD Assistance) will be refunded 70%, if no problem with the rented car. </span><br>
                                      <span style="font-size:12px">2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</span>
                                      <br><span style="font-size:12px">3 The Refundable Deposit &amp; Long Distance Assistance Fee will be paid on your arrival to save the service charge!</span>
                              </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1. Total Rental Fee:</td>';
                                      $total_rental=$amount_drive;
                             $htmlContent.='<td align="right" style="border:1px solid #000000;" nowrap="">$'.number_format($total_rental, 2).'</td>
                                      </tr><tr style="height:25px;border:0px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2. Service Charge (3%):
                                      </td>';
                                      $total_service_char=($total_rental *3)/100;
                              $htmlContent.='<td align="right" style="border:1px solid #000000;" nowrap="">$'.number_format($total_service_char, 2).'</td>
                                      </tr>';
                                    $paid=$total_service_char + $total_rental;
                                    $htmlContent.='<tr style="height:25px;border:1px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3. Amount Paid :</td>
                                      <td align="right" style="background:#e6e6e6;border:1px solid #000000;" nowrap="">$'.number_format($paid, 2).'</td>
                                      </tr>';
                                      $htmlContent.=' <tr style="height:25px;border:1px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;4. Refundable Deposit (RD):</td>
                                      <td align="right" style="background:#e6e6e6;border:1px solid #000000;" nowrap="">$'.number_format($total_refun_driver_insert, 2).'
                                       </td>
                                  </tr>';
                                      $htmlContent.='<tr style="height:25px;border:1px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;5. Due Amount <span style="color:red;">**</span>:</td>
                                      <td align="right" style="background:#e6e6e6;border:1px solid #000000;" nowrap="">$'.number_format($total_refun_driver_insert, 2).'</td>
                                  </tr>';


                                    
                                    
                                   $htmlContent.='</tbody>
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
</div>

      	</div>
      	<div class="col-md-4">
      		
      		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-right-none sm-padding-left-none md-padding-left-15 xs-padding-left-none padding-bottom-40 scroll_effect fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
               
               <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                  <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><strong>Reservation</strong> Information</h4>
                  <div class="table-responsive" style="padding:10px;">
                     <table class="table no-border no-margin">
                        <tbody>
                           <tr>
                              <td>Duration : </td>
                              <td>
                                                          <?php
                                 if(!isset($_SESSION["driver_rent_pickupdate"]))
                                    {
                                     $_SESSION["driver_rent_pickupdate"]="";
                                    }
                                    else {
                                    $_SESSION["driver_rent_pickupdate"];
                                    }

                                   if(!isset($_SESSION["driver_return_date"]))
                                    {
                                     $_SESSION["driver_return_date"]="";
                                    }
                                    else {
                                     $_SESSION["driver_return_date"];
                                    }

                                 $date1=date_create($_SESSION["driver_rent_pickupdate"]);
                                 $date2=date_create($_SESSION["driver_return_date"]);
                                 $diff=date_diff($date1,$date2);
                                 $text_info=$diff->format("%a%")+1;

                                echo $text_duration = str_replace('+', '',$text_info).' Days';
                               
                                 ?>                          
                               </td>
                           </tr>
                           <tr>
                              <td>Pickup Date/Time : </td>
                              <td>
                                 <?php
                                      if(!isset($_SESSION["driver_rent_pickupdate_time"]))
                                        {
                                        $_SESSION["driver_rent_pickupdate_time"]="";
                                         }
                                       else {
                                         $_SESSION["driver_rent_pickupdate_time"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["driver_rent_pickupdate"].' '. $_SESSION["driver_rent_pickupdate_time"];
                                        ?>                                                                        
                              </td>
                           </tr>
                           <tr>
                              <td>Return Date/Time : </td>
                              <td>
                                <?php
                                      if(!isset($_SESSION["driver_return_time"]))
                                        {
                                        $_SESSION["driver_return_time"]="";
                                         }
                                       else {
                                         $_SESSION["driver_return_time"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["driver_return_date"].' '. $_SESSION["driver_return_time"];
                                        ?>                                                                  
                              </td>
                           </tr>
                           <tr>
                            <td>Driver Location : </td>
                            <td>
                               <?php
                                      if(!isset($_SESSION["driver_province_id"]))
                                        {
                                         $id=$_SESSION["driver_province_id"]="";
                                         }
                                       else {
                                        $id= $_SESSION["driver_province_id"];
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
                            <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><span style="font-weight: 800">Chauffeur</span> Info</h4>
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
                                              $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
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

               </div>

           </div>

      	</div>



      </div>





   </div>
</div>




<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="./css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="./css/new_style.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<?php require_once("footer.php"); ?>

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
    line-height: 30px;
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
li.option {
    color: #000;
}
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
              $("#alert_drive").html("Select Driver Rental");
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