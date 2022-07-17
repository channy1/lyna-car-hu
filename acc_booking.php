<?php 
    include_once ('system/config/database.php');
    require_once("header.php");

if(!empty($_POST)) {
    $_POST['acc_pickupdate'] = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['acc_pickupdate'])));
    $_POST['acc_return_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['acc_return_date'])));


}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
  $_SESSION['acc_pickupdate']=@$connect->real_escape_string($_POST['acc_pickupdate']);
  $_SESSION['acc_return_date']=@$connect->real_escape_string($_POST['acc_return_date']);
  $_SESSION['accssory_comment']=@$connect->real_escape_string($_POST['accssory_comment']);
  

}

if(isset($_POST['btn_select_data'])){
  $_SESSION['acc_pickupdate_time']=@$connect->real_escape_string($_POST['acc_pickupdate_time']);
  $_SESSION['acc_return_time']=@$connect->real_escape_string($_POST['acc_return_time']);
}

if(isset($_POST['btn_accesory'])){
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
      }
      else {
         
          // $post_step=="4";
          
          // echo "<script>alert('Wrong username or password.')</script>";
      }

  }

?>

<div class="container py-3">
   <div class="panel panel-default">
      <div  class="panel-heading">
         <h4 class="head-form"><i class="fa fa-handshake-o" aria-hidden="true"></i>
            &nbsp;SEARCH FOR ACCESSORIES RENTAL
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
                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Select Accessory</a>
                        </li>
                        <li <?php if($post_step=="2"){ echo "class='active'"; }?>>
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Personal Info</a>
                        </li>
                         <li <?php if($post_step=="3"){ echo "class='active'"; }?>>
                            <a class="nav-link" id="three-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Three" aria-selected="false">Confirm Booking</a>
                        </li>
        </ul>

			        </div>
            </div>
             <div class="tab-content" id="myTabContent" style="margin-top:30px;">

			          <div class="tab-pane <?php if(empty($post_step)) {echo "in active";} ?>" id="one">
			      
			<form action="acc_booking.php" method="POST" id="form_select_data" class="booking-form">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងទៅយករថយន្ត';?></label>
                                                                <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                    <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Pickup Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p class="m-top-0">
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Date':'កាលបរិច្ឆេទជ្រើសរើសយក:';?></span>

                                                                <input id="datepicker" name="car_rent_pickupdate" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Time':'ពេលវេលាជ្រើសរើសក:';?></span>
       
                                                 <input id="dropoffdate" type="text" name="car_rent_pickupdate_time" class="form-control pickup_input" placeholder="HH:MM:SS" />
                                                 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    
                                                  <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Return Location':'ទីតាំងទៅយករថយន្ត';?></label>
                                                <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                   <p>
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Return':'ស៊ៀផែនទី Google:';?></span>

                                                        <input type="text" name="car_rental_return_map" placeholder="Copy & Paste Return Location Map">
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="dropoffdate" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input id="dropofftime" type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-6">
                                                    <p>
                                                        <label>
                                                            <?=(@$_SESSION['lang']=='en')? 'Return Location Details (Besides Pickup Location)': 'ត្រលប់មកវិញនូវព័ត៌មានលម្អិតអំពីទីតាំង (ក្រៅពីទីតាំងជ្រើសរើសថយន្ត)';?>
                                                        </label>
                                                        <textarea class="form-textarea" name="car_comment" class="form-control" rows="3" cols="4" id="comment"></textarea>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                        <!--<p>SELECT ONE OR MORE OF THESE SERVICES</p>-->
                                    <p class="white-span"><?=(@$_SESSION['lang']=='en')?'SELECT ONE OR MORE OF THESE SERVICES':' ជ្រើសរើសមួយឬច្រើននៃសេវាកម្មទាំងនេះ ';?></p>
                                                        <div class="row">
                                                           <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                          <?=(@$_SESSION['lang']=='en')?'TOUR GUIDE':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                        <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                        <?=(@$_SESSION['lang']=='en')?'DRIVER':'អ្នកបើកបរ';?>

                                                          </label>
                                                        </div> 
                                                        </div>
                                                         <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                        <?=(@$_SESSION['lang']=='en')?'ACCESSORIES':'គ្រឿងបន្លាស់';?></label>
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
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Find Accessory Now</button>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>

			      

			          </div>
			          <div class="tab-pane <?php if($post_step=="1") {echo "active in";} ?>" id="two" <?php if($post_step=="1") { ?> id="two" <?php } ?> >

                 
			          	<form method="post" action="acc_booking.php" id="form_acc" class="booking-form">
			          	<input type="hidden" name="post_step" value="2">
			          	<button style="margin-top: 10px;" class="btn gauto-theme-btn" name="btn_accesory" type="submit">Continue</button>
			          	<label id="alert_drive"></label>
			          	 <?php 
                                            $v_sql = "SELECT * FROM tbl_accessories_rental
                                            ";
                                           
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                             ?>
							<div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
                                       <div class="col-md-4">
                                      
                                       <img src="system/admin/image/accessories rental/<?php echo $row['ac_image']; ?>" class="preview">
                                      <label><b><?php echo $row['ac_title']; ?></b></label>
                                      <br>
                                       <span style="position: absolute;float: left;">Tick the Box</span>
                        <input type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addaccessory(<?php echo $row['ac_id']; ?>)" id="addaccessory_<?php echo $row['ac_id']; ?>" style="float: right;">
                                       <br>
                                       <span>Qantity :</span>
                                       <input class="form-control" readonly="" type="text" name="addaccessory_<?php echo $row['ac_id']; ?>" value="" id="number_addaccessory_<?php echo $row['ac_id']; ?>">
                                    
                                   </div>

                                  
                                       <div class="col-md-8">
                                    
                                      <table class="table">
                                         <thead>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th class="white-th" scope="row">Ref. No. :</th>
                                             <td class="white-th"><?php echo $row['ac_ref_no']; ?></td>
                                           </tr>
                                           
                                         </tbody>
                                       </table>


                                       <table class="table">
                                         <thead>
                                          <tr>
                                             <th class="white-th" scope="row" style="border-bottom:1px solid #dee2e6">Ranking Day</th>
                                             <td class="white-th">Price</td>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th class="white-th" scope="row">Days (1-7):</th>
                                             <td class="white-th">$ <?php echo $row['ac_days(1-7)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th class="white-th" scope="row">~ Extra Day:</th>
                                             <td class="white-th">$<?php echo $row['ac_extradays(1-7)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th class="white-th" scope="row">Days (15-26):</th>
                                             <td class="white-th" colspan="2">$<?php echo $row['ac_days(15-26)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th class="white-th" scope="row"> ~ Extra Day:</th>
                                             <td class="white-th" colspan="2">$<?php echo $row['ac_extradays(15-26)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th class="white-th" scope="row">Monthly:</th>
                                             <td class="white-th" colspan="2">$ <?php echo $row['ac_monthly']; ?></td>
                                           </tr>
                                            <tr>
                                             <th class="white-th" scope="row"> ~ Extra Day :</th>
                                             <td class="white-th" colspan="2">$ <?php echo $row['ac_extramonthly']; ?></td>
                                           </tr>
                                           <tr>
                                             <th class="white-th" scope="row">Yearly:</th>
                                             <td class="white-th" colspan="2">$ <?php echo $row['ac_yearly']; ?></td>
                                           </tr>
                                          
                                           <tr>
                                             <th class="white-th" scope="row">~ Extra Day:</th>
                                             <td class="white-th" colspan="2">$ <?php echo $row['ac_extrayearly']; ?></td>
                                           </tr>
                                         </tbody>
                                       </table>
                                      
                                      
                                       </div>
                                      
                                </div> 
					<?php }} ?>  
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
                  </form>
			          </div>
			          <div class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" id="three" <?php if($post_step=="1") { ?> id="three" <?php } ?>>


			          	<div class="row">
    <?php

                           if($_SESSION['allowLog'] != "logAlready"){
                           ?>

        <div class="col-md-12">

            <form method="post" action="acc_booking.php" class="booking-form">
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

            <form action="acc_booking.php" method="post" id="agree_form" style="padding: 24px;">

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
                                                    <td><?php echo ucfirst(@$_SESSION["user"]->user_name); ?></td>

                                                    <td style="width:18%">&nbsp;Total Day(s) :</td>
                                                    <td> 
                                                      <?php
                                                     if(!isset($_SESSION["acc_pickupdate"]))
                                                        {
                                                         $_SESSION["acc_pickupdate"]="";
                                                        }
                                                        else {
                                                        $_SESSION["acc_pickupdate"];
                                                        }

                                                       if(!isset($_SESSION["acc_return_date"]))
                                                        {
                                                         $_SESSION["acc_return_date"]="";
                                                        }
                                                        else {
                                                         $_SESSION["acc_return_date"];
                                                        }

                                                     $date1=date_create($_SESSION["acc_pickupdate"]);
                                                     $date2=date_create($_SESSION["acc_return_date"]);
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
                                                      if(!isset($_SESSION["acc_pickupdate_time"]))
                                                          {
                                                           $_SESSION["acc_pickupdate_time"]="";
                                                          }
                                                          else {
                                                          $_SESSION["acc_pickupdate_time"];
                                                          }
                                                      ?>
                                                      <?php
                                                  echo  $_SESSION["acc_pickupdate"].' '. $_SESSION["acc_pickupdate_time"];
                                                      ?>                                                            
                                                   </td> 
                                                   
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Return Date Time </td>
                                                    <td>
                                      <?php
                                                      if(!isset($_SESSION["acc_return_time"]))
                                                          {
                                                           $_SESSION["acc_return_time"]="";
                                                          }
                                                          else {
                                                          $_SESSION["acc_return_time"];
                                                          }
                                                      ?>
                                                      <?php
                                                  echo  $_SESSION["acc_return_date"].' '. $_SESSION["acc_return_time"];
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
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%">Price</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%">Discount</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%">VAT</th>
                                     <th style="background-color:#ec3323;color:white" class="aa text-center" width="8%" nowrap="nowrap">Amount</th>
                                 
                           
                         
                                                                                                          
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
                                             $i=1;
                                             
                                            
                                           
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                              $start_day=date_create($_SESSION["acc_pickupdate"]);
                                                $end_day=date_create($_SESSION["acc_return_date"]);
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
</tr>
                                              <tr style="height:25px;border:1px!important">
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000"><?php echo  $row['ac_title'].' '.$row['ac_ref_no']; ?></td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                             <?php
                                                $start_day=date_create($_SESSION["acc_pickupdate"]);
                                                $end_day=date_create($_SESSION["acc_return_date"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;

                                                echo $total_day-$extraday.' Day(s)';
                                             ?>
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                              <?php
                                               echo "$".number_format($day_price/($total_day-$extraday), 2);
                                             ?>
                                          </td>
                                           
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">
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
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$extraday, 2); ?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($price_item_accessory, 2);
                                       
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
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1. Total Rental Fee:</td>
                                      <td align="right" style="border:1px solid #000000;" nowrap="">
                                        $<?php echo number_format($total_rental=$amount_accessory, 2);  ?></td>
                                  </tr>
                                  <tr>
                                      <td colspan="4" rowspan="5" style="font-size:10px;">
                                        <b style="color:#ec3323">NOTICES:</b><br>
                                        <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b><br>
                                        <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b><br>
                                        <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>


                                    </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;2. Service Charge (3%):</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">&nbsp;$<?php 
                                      $total_service_char=($total_rental *3)/100; echo number_format($total_service_char, 2); ?></td>
                                  </tr>
                                  <tr>
                                      
                                      <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;3. Amount Paid :</td>
                                      <td align="right" style="background:#ec3323;font-weight:900;border:1px solid #000000;padding-right:5px;color:white;" nowrap="">&nbsp;$<?php echo $_SESSION['total_amount']= number_format($total_service_char + $total_rental, 2); ?></td>
                                  </tr>
                                   <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;4. Refundable Deposit (RD):</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">$<?php echo number_format($refun_acc, 2); ?>
                                       </td>
                                  </tr>
                                    <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;5. Due Amount <span style="color:red;">**</span>:</td>
                                      <td align="right" style="background:#ec3323;border:1px solid #000000;padding-right:5px;color:white;font-weight:900;" nowrap="">$<?php echo number_format($total_refun_acess, 2); ?></td>
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
                     $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'lyna-CarRental/acc_booking.php?tranid='.$transactionId;
                    $_SESSION['rental_accessory_ins']='accessories rent';
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

                          $(location).attr('href','paynow.php');

                      });
                   });
                </script>



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
                                 if(!isset($_SESSION["acc_pickupdate"]))
                                    {
                                     $_SESSION["acc_pickupdate"]="";
                                    }
                                    else {
                                    $_SESSION["acc_pickupdate"];
                                    }

                                   if(!isset($_SESSION["acc_return_date"]))
                                    {
                                     $_SESSION["acc_return_date"]="";
                                    }
                                    else {
                                     $_SESSION["acc_return_date"];
                                    }

                                 $date1=date_create($_SESSION["acc_pickupdate"]);
                                 $date2=date_create($_SESSION["acc_return_date"]);
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
                                      if(!isset($_SESSION["acc_pickupdate_time"]))
                                        {
                                        $_SESSION["acc_pickupdate_time"]="";
                                         }
                                       else {
                                         $_SESSION["acc_pickupdate_time"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["acc_pickupdate"].' '. $_SESSION["acc_pickupdate_time"];
                                        ?>                                                                        
                              </td>
                           </tr>
                           <tr>
                              <td>Return Date/Time : </td>
                              <td>
                                <?php
                                      if(!isset($_SESSION["acc_return_time"]))
                                        {
                                        $_SESSION["acc_return_time"]="";
                                         }
                                       else {
                                         $_SESSION["acc_return_time"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["acc_return_date"].' '. $_SESSION["acc_return_time"];
                                        ?>                                                                  
                              </td>
                           </tr>
                          

                    
                        </tbody>
                     </table>
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
                                                 }
                                             else {

                                             $accessory_id=$_SESSION['accessory_id'];
                                             if($accessory_id=="") {
                                               $accessory_id="";
                                               $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id=''";
                                             }
                                             else {
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

 $("#form_acc").submit(function( event ) {
            alldata = $("#identity_accessory").val();
          
            if(alldata==''){
              $("#alert_drive").html("Select Accessory Rental");
              return false;
            }
            else{
              return true;
            }
          });
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