<link href="./css/new_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="./css/datepicker.css" rel="stylesheet" type="text/css" />
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
</style>


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

if(isset($_POST["btn_search_pickupairport"]) || isset($_POST["btn_select_data"]) ) {
  $_SESSION['txt_airport_pick_up_location']=@$connect->real_escape_string($_POST['txt_airport_pick_up_location']);
  $_SESSION['txt_airport_drop_location']=@$connect->real_escape_string($_POST['txt_airport_drop_location']);
 

  $_SESSION['txt_airport_trip_way']=@$connect->real_escape_string($_POST['txt_airport_trip_way']);
  
  $_SESSION['txt_depareture_date']=@$connect->real_escape_string($_POST['txt_depareture_date']);
  $_SESSION['txt_depareture_time']=@$connect->real_escape_string($_POST['txt_depareture_time']);
  
}

if(isset($_POST['btn_search_pickupairport'])) {
 $_SESSION['txt_pickup_map']=@$connect->real_escape_string($_POST['txt_pickup_map']);
 $_SESSION['txt_return_location']=@$connect->real_escape_string($_POST['txt_return_location']);
 $_SESSION['txt_return_mapLocation']=@$connect->real_escape_string($_POST['txt_return_mapLocation']);

 }


if(isset($_POST['btn_car'])) {
 $_SESSION['car_id']=@$connect->real_escape_string($_POST['identity_car']);

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
         <h4 class="head-form"><i class="fa fa-handshake-o" aria-hidden="true"></i>
            &nbsp;AIRPORT TRANSFER SERVICE
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
                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Select Vehicle</a>
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
                                            <form action="airport_order.php" method="POST" class="booking-form">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Select Province/City':'ទីតាំងទៅយករថយន្ត';?></label>
                                                <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                   <p>
                                                <div class="form-group">
                                              <label>Select Vehicle Type:</label>
                                              <select class="form-control">
                                                <option data-display="VEHICLE TYPE">Select Vehicle</option>
                                                <option>CAR</option>
                                                <option>BUS</option>
                                                <option>VAN</option>
                                                <option>PICKUP</option>
                                                <option>RICKSHAW</option>

                                              </select>
                                            </div>
                                                    </p>
                                                </br>
                                                <p>
                                                    <div class="row">
                                                           <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                          One-way                                                          </label>
                                                        </div> 
                                                        </div>
                                                        <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                        Round-trip
                                                          </label>
                                                        </div> 
                                                        </div>
                                                         
                                                        </div>
                                                   </p> 

                                                <div class="row">
                                                <div class="col-md-12">
                                                   <img src="http://choicecart.xyz/carrental/assets/img/about.png" class="img-responsive"> 
                                                </div>
                                                
                                            </div>   
  
                                                    
                                                </div>
                                                <div class="col-md-7 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Location':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input placeholder="Home | Hotel |School" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p>
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Drop-off Location':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input placeholder="Home | Hotel | School" type="text" /></p>
                                                        </div>
                                                        
                                                    </div>                                                    
                                                   
                                                    <p class="m-top-0" style="margin-top: -4px !important;margin-bottom:0";>
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

                                                        <input name="pickup_map_carental"  type="text" placeholder="Home | Hotel | School |Restaurant ETC . . .">
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
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Search Now</button>
                                                    </p>
                                                </div>
                                                </div>
                                              </form>  
			         
			      

			          </div>
			          <div class="tab-pane <?php if($post_step=="1") {echo "active in";} ?>" id="two" <?php if($post_step=="1") { ?> id="two" <?php } ?> >

                 
			          	<form method="post" action="airport_order.php" id="form_car" class="booking-form">
			          	<div  class="tab-pane <?php if($post_step=="1") {echo "active in";} ?>" <?php if($post_step=="1") { ?> id="two" <?php }else { ?> style="display:none;" <?php } ?>>
                    <input type="hidden" name="post_step" value="2">
                    
                     
                        <button style="margin-top: 10px;" id="btn_car" class="btn btn-success" name="btn_car" type="submit">Continue</button>
                        <label id="check_car"></label>
                        <?php
                                $pro_id_car="";
                                $sql_province ="SELECT province_id FROM tbl_air_port 
                                                 WHERE tbl_air_port.air_id='$txt_airport_pick_up_location'
                                 ";
                                  $result = $connect->query($sql_province);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                      $pro_id_car=$row['province_id'];
                                    }}

                                 $sql_province_to ="SELECT pro_to FROM tbl_air_port 
                                                 WHERE tbl_air_port.air_id='$txt_airport_drop_location'
                                 ";
                                  $result = $connect->query($sql_province_to);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                      $pro_id_car_to=$row['pro_to'];
                                    }}
                      
                               
                                 $sql ="SELECT *
                                        FROM tbl_air_port 
                                        LEFT JOIN tbl_vehicle_rantal  ON tbl_air_port.car_id = tbl_vehicle_rantal.ve_id
                                        LEFT JOIN tbl_province        ON tbl_province.pv_id = tbl_air_port.province_id

                                        WHERE tbl_air_port.province_id='$pro_id_car' AND tbl_air_port.pro_to='$pro_id_car_to'
                                        GROUP BY  tbl_air_port.car_id
                                 ";
                                
                                  $result = $connect->query($sql);
                                 
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                     <div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
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
                                       for(var j=0;j<arrays.length;j++) {//calculate record row
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
                                             <td style="color: red;"><?php echo $row['ve_ref_no']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Year :</th>
                                             <td><?php echo $row['ve_make']; ?></td>
                                           </tr>                                           
                                           <tr>
                                             <th scope="row">Make :</th>
                                             <td><?php echo $row['ve_year']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Model :</th>
                                             <td><?php echo $row['ve_model']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Sub model :</th>
                                             <td><?php echo $row['ve_sub_model']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Color :</th>
                                             <td colspan="2"><?php echo $row['ve_color']; ?></td>
                                           </tr>                                                                                                                             
                                         </tbody>
                                       </table>


                                       <table class="table table-borderless" style="width:50%;float:right;">
                                         <thead>
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
                                          <tr>
                                             <th scope="row">One-Way:</th>
                                             <td>$<?php echo number_format($row['one_way'],2); ?></td>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th scope="row">Round-Trip:</th>
                                             <td>$<?php echo number_format($row['two_way'],2); ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Description:</th>
                                             <td><?php echo $row['note']; ?></td>
                                           </tr>
                                          
                                          
                                         </tbody>
                                       </table>
                                      
                                      
                                       </div>
                                      
                                </div>
                              <?php 
                                }}
                              ?>
                              <input type="hidden" name="identity_car" id="identity_car">


                   </div>
                  </form>
			          </div>
			          <div class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" id="three" <?php if($post_step=="1") { ?> id="three" <?php } ?>>


			          	<div class="row">
    <?php

                           if($_SESSION['allowLog'] != "logAlready"){
                           ?>

        <div class="col-md-12">

            <form method="post" action="airport_order.php" class="booking-form">
                <input type="hidden" name="post_step" value="2">

                <h4 class="text-white m-3" style="text-align:center;">Login for Form</h4>

                <div class="form-group">
                    <input type="text" name="txt_login_username" class="form-control" placeholder="Your Username" value="" />
                </div>
                <div class="form-group">
                    <input type="password" name="txt_login_password" class="form-control" placeholder="Your Password" value="" />
                </div>
                <div class="form-group">
                    <button type="submit" name="btn_login" class="btn gauto-theme-btn" value="Login" />Login</button>
                </div>
                <div class="form-group">
                    <!--  <a href="#" class="ForgetPwd">Forget Password?</a> -->
                </div>
            </form>
        </div>
        <?php } else { ?>

            <form action="airport_order.php" method="post" id="agree_form" style="padding: 24px;">

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

                                                    <td style="width:18%">&nbsp;Email :</td>
                                                    <td> 
                                                           <?php echo @$_SESSION["user"]->user_email; ?>                                               
                                                    </td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Pickup Date Time : </td>
                                                    <td>
                                                       <?php
                                                      if(!isset($_SESSION["txt_depareture_date"]))
                                                          {
                                                           $_SESSION["txt_depareture_date"]="";
                                                          }
                                                          else {
                                                          $_SESSION["txt_depareture_date"];
                                                          }
                                                      ?>
                                                      <?php
                                                  echo  $_SESSION["txt_depareture_date"].' '. $_SESSION["txt_depareture_time"];
                                                      ?>                                                            
                                                   </td> 
                                                   
                                                    <td style="width:18%">&nbsp;Phone :</td>
                                                    <td> 
                                                           <?php echo @$_SESSION["user"]->user_phone_number; ?>                                               
                                                    </td>
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
                                           $sqls ="SELECT * FROM tbl_air_port 
                                                   WHERE air_id='$txt_airport_drop_location'
                                                  ";
                                           $result = $connect->query($sqls);
                                           if ($result->num_rows > 0) {
                                             while($rows= $result->fetch_assoc()){
                                                $name_pro_to=$rows['pro_to'];
                                          }
                                        }
                                             if(!isset($_SESSION["car_id"])) {
                                             $car_id=""; 
                                             $sql ="SELECT * FROM tbl_vehicle_rantal INNER JOIN tbl_air_port   
                                           ON tbl_vehicle_rantal.ve_id = tbl_air_port.car_id
                                           WHERE ve_id='' GROUP BY car_id";
                                                 }
                                             else {
                                             $car_id=$_SESSION['car_id'];
                                             if($car_id=="") {
                                               $sql ="SELECT * FROM tbl_vehicle_rantal INNER JOIN tbl_air_port   
                                           ON tbl_vehicle_rantal.ve_id = tbl_air_port.car_id
                                           WHERE ve_id='' GROUP BY car_id";
                                             }
                                             else {
                                              $car_id=$_SESSION['car_id'];
                                              $sql ="SELECT * FROM tbl_vehicle_rantal INNER JOIN tbl_air_port   
                                           ON tbl_vehicle_rantal.ve_id = tbl_air_port.car_id
                                           WHERE  ve_id IN ($car_id) AND pro_to='$name_pro_to' GROUP BY car_id
                                           ";
                                             }
                                             
                                             }
                                             
                                             $result = $connect->query($sql);
                                          
                                             $total_rental=0;
                                              $vat_confirm=0;
                                             $i=1;
                                             $trip_way=$_SESSION['txt_airport_trip_way'];
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                               $vat_confirm=$row['vat'];
                                                 if($trip_way==1) {
                                                      $price_confirm=$row['one_way'];
                                                  
                                                 }
                                                 elseif ($trip_way==2) {
                                                      $price_confirm=$row['two_way'];
                                                 }
                                                 else {
                                                     $price_confirm=$row['one_way'];
                                                 }
                                                 
                                                
                                                 
                                                 $total_amount=($price_confirm)+($price_confirm * 10)/100; 
                                                 $total_rental +=$total_amount;

                                             ?>
                                             </tr>
                                                                      
                                       <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Vehicle  Rental (<?php echo $row['ve_title']; ?> / <?php echo $row['ve_ref_no']; ?>)</td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">1 Day</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                         <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($price_confirm,2); ?></td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format(0,2);?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($vat_confirm,2); ?>%</td>

                                          <td align="right" style="text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">$<?php
                                         
                                          echo number_format($total_amount,2);
                                       
                                          ?></td>
                                      </tr>
                                        <?php }} ?> 
                                            
                                                                    
                                      <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1. Total Rental Fee:</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">$<?php echo number_format($total_rental,2);  ?></td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                      <td></td>
                                      <td></td> 
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2. Service Charge (3%):</td>
                                      <td align="right" style="text-align:right;background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">$<?php  $total_service_char=($total_rental *3)/100; echo number_format($total_service_char, 2);?></td>
                                  </tr>
                                   <tr>
                                    <td></td>
                                      <td></td>
                                       <td></td>
                                      <td></td>
                                      
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3. Amount Paid:</td>
                                      <td align="right" style="text-align:right;background:#ec3323;border:1px solid #000000;padding-right:5px;color:white;font-weight:900;" nowrap="">$<?php echo number_format($total_service_char + $total_rental, 2);?></td>
                                  </tr>
                                  <tr>
                                      <td colspan="4" rowspan="5" style="font-size:10px;width:100%;">
                                        <b style="color:#ec3323">NOTICES:</b><br>
                                        <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b><br>
                                        <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b><br>
                                        <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>


                                    </td>
                                      <td class="aa" colspan="3">&nbsp;</td>
                                      <td style="font-weight: 800;text-align: right;padding-right: 10px" class="aa"></td>
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
                     $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'lyna-CarRental/airport_order.php?tranid='.$transactionId;
                    
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
                  $pickup_date=$_SESSION["txt_depareture_date"];
                  $amount_web_pay=$total_service_char + $total_rental;
                  $today = date("Y-m-d");
                  $date_time_book=$_SESSION['txt_depareture_time'];
                  $map_pick_up=$_SESSION['txt_pickup_map'];
                  $map_return=$_SESSION['txt_return_mapLocation'];
                  $return_location=$_SESSION['txt_return_location'];
                  $get_url_tran_id=$connect->real_escape_string(@$_GET['tranid']);
                  if( ($get_url_tran_id !="") && ($_SESSION["term_check_pay"]) !="" ) {
                  if($result['status'] ==0){
                      $sql = "INSERT INTO `tbl_air_port_booking`(
                            `user_id`,
                            `booking_date`,
                            `pickup_location`,
                            `drop_off_location`,
                            `date_time_book`,
                            `term_id`,
                            `trip_way`,
                            `transaction_id`,
                            `total_pay`,
                            `map_pick_up`,
                            `map_return`,
                            `return_location`,
                            `departur_date`
                        )
                        VALUES(
                            '$customer_id',
                            '$today',
                            '$txt_airport_pick_up_location',
                            '$txt_airport_drop_location',
                            '$date_time_book',
                            '1',
                            '$txt_airport_trip_way',
                            '$get_url_tran_id',
                            '$amount_web_pay',
                            '$map_pick_up',
                            '$map_return',
                            '$return_location',
                            '$pickup_date'

                            )";
                        if($connect->query($sql)){
                           unset($_SESSION["term_check_pay"]);
                            // header("location: ./customer_login.php?sms=register_success");
                        }
                         $booklast_id = $connect->insert_id;

                           $car_se=$_SESSION['car_id'];
                         if($car_se !="") {
                              $sqls ="SELECT * FROM tbl_air_port 
                                                   WHERE air_id='$txt_airport_drop_location'
                                                  ";
                                           $result = $connect->query($sqls);
                                           if ($result->num_rows > 0) {
                                             while($rows= $result->fetch_assoc()){
                                                $pro_to_name=$rows['pro_to'];
                                          }
                                        }


                         $sql ="SELECT * FROM tbl_vehicle_rantal INNER JOIN tbl_air_port   
                                         ON tbl_vehicle_rantal.ve_id = tbl_air_port.car_id 
                                         WHERE ve_id IN ($car_se) AND pro_to='$pro_to_name' GROUP BY car_id
                                           ";
                         $result = $connect->query($sql);
                           $price_car="";
                         if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()){
                           $in_car_id=$row['car_id'];
                           $vat_in=$row['vat'];


                           if($txt_airport_trip_way=="1") {
                            $price_car=$row['one_way'];
                           }
                           elseif ($txt_airport_trip_way=="2") {
                             $price_car=$row['two_way'];
                           }
                           else {
                            $price_car=$row['one_way'];
                           }
                           
                         
                           
                           $sql_driver = "INSERT INTO `tbl_air_port_book_car`(
                            `booking_id`,
                            `car_id`,
                            `price`,
                            `discount`,
                            `vat`
                        )
                        VALUES(
                            '$booklast_id',
                            '$in_car_id',
                            '$price_car',
                            '0',
                            '$vat_in'
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
                                <td width="20%" align="left">Pickup Date/Time:</td>
                        <td width="25%" align="left">'.$_SESSION["driver_rent_pickupdate"].':'.$_SESSION["txt_depareture_time"].'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr>
                                <td width="20%" align="left">Pickup Date:</td>
                                <td width="25%" align="left">'.$_SESSION["driver_return_date"].':'.$_SESSION["txt_depareture_date"].'</td>
                                
                               
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
                                <td align="center" style="border:1px solid #000000">QTY</td>
                                <td align="center" style="border:1px solid #000000">Price</td>
                                <td align="center" style="border:1px solid #000000">Discount</td>
                                
                                <td align="center" style="border:1px solid #000000">VAT</td>
                                <td align="center" style="border:1px solid #000000">Amount</td>

                              </tr>';
                              


 

                                 

                                           $sqls ="SELECT * FROM tbl_air_port 
                                                   WHERE air_id='$txt_airport_drop_location'
                                                  ";
                                           $result = $connect->query($sqls);
                                           if ($result->num_rows > 0) {
                                             while($rows= $result->fetch_assoc()){
                                                $name_pro_to=$rows['pro_to'];
                                          }
                                        }
                                        $car_id=$_SESSION['car_id'];
                                              $sql ="SELECT * FROM tbl_vehicle_rantal INNER JOIN tbl_air_port   
                                           ON tbl_vehicle_rantal.ve_id = tbl_air_port.car_id
                                           WHERE  ve_id IN ($car_id) AND pro_to='$name_pro_to' GROUP BY car_id
                                           ";

                          
                                             $result = $connect->query($sql);
                                              $i=1;
                                            $total_rental=0;
                                             $vat_confirm=0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                              $vat_confirm=$row['vat'];
                                                if($trip_way==1) {
                                                      $price_confirm=$row['one_way'];
                                                  
                                                 }
                                                 elseif ($trip_way==2) {
                                                      $price_confirm=$row['two_way'];
                                                 }
                                                 else {
                                                     $price_confirm=$row['one_way'];
                                                 }
                                                 
                                                 
                                                 $total_amount=($price_confirm)+($price_confirm * $vat_confirm)/100; 
                                                 $total_rental +=$total_amount;
                         $htmlContent.='<tr style="height:30px;border:1px solid #000000">
                              <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">'.$i++.'</td>
                              <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Vehicle Rental('.$row["ve_title"].'/'.$row["ve_ref_no"].')</td>';
                              

                                             
                           $htmlContent.='
                              <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">1 Day</td>
                              <td align="center" style="border:1px solid #000000;width:5%">1</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px" nowrap="">$'.number_format($price_confirm,2).'</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format(0,2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format($vat_confirm,2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px" nowrap="">$'.number_format($total_amount, 2).'</td>
                              </tr>';

                            }}

                              
                           $htmlContent.='<tr style="height:25px;border:0px!important">
                              <td align="left" style="padding-left:0px" colspan="4" rowspan="6">
                              <span style="font-size:11px"><b style="color:red"><u>Note</u> *</b><br> 1. Long Distance Assistance Fee (LD Assistance) will be refunded 70%, if no problem with the rented car. </span><br>
                                      <span style="font-size:12px">2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</span>
                                      <br><span style="font-size:12px">3 The Refundable Deposit &amp; Long Distance Assistance Fee will be paid on your arrival to save the service charge!</span>
                              </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">Total Rental Fee:</td>';
                                     
                             $htmlContent.='<td align="right" style="border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($total_rental, 2).'</td>
                                      </tr><tr style="height:25px;border:0px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">Service Charge (3%):
                                      </td>';
                                      $total_service_char=($total_rental *3)/100;
                              $htmlContent.='<td align="right" style="border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($total_service_char, 2).'</td>
                                      </tr>';
                                    $paid=$total_service_char + $total_rental;
                                    $htmlContent.='<tr style="height:25px;border:0px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap=""> Amount Paid :</td>
                                      <td align="right" style="background:#e6e6e6;border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($paid, 2).'</td>
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
                     

                      <button type="button" class="pull-right gauto-theme-btn" id="checkout_button" value="Checkout Now">Checkout Now</button>
                    
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
      		
      		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-right-none sm-padding-left-none md-padding-left-15 xs-padding-left-none padding-bottom-40 scroll_effect fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;margin-top: 10px;">
               
               <div class="financing_calculator margin-top-10 " style="border:1px solid #ccc; border-radius:5px; ">
                  <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><strong>Reservation</strong> Information</h4>
                  <div class="table-responsive" style="padding:10px;">
                     <table class="table no-border no-margin">
                        <tbody>
                           
                           <tr>
                              <td>Pickup Date/Time : </td>
                              <td>
                                 <?php
                                      if(!isset($_SESSION["txt_depareture_time"]))
                                        {
                                        $_SESSION["txt_depareture_time"]="";
                                         }
                                       else {
                                         $_SESSION["txt_depareture_time"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["txt_depareture_date"].' '. $_SESSION["txt_depareture_time"];
                                        ?>                                                                        
                              </td>
                           </tr>
                           <tr>
                              <td>Dropoff Date/Time : </td>
                              <td>
                               <?php
                                      if(!isset($_SESSION["txt_depareture_time"]))
                                        {
                                        $_SESSION["txt_depareture_time"]="";
                                         }
                                       else {
                                         $_SESSION["txt_depareture_time"];
                                         }
                                        ?>
                                        <?php
                                      echo  $_SESSION["txt_depareture_date"].' '. $_SESSION["txt_depareture_time"];
                                        ?>                                                                        
                              </td>
                           </tr>
                           <tr>
                            <td>Pickup Location  : </td>
                            <td>
                                <?php
                                      if(!isset($_SESSION["txt_airport_pick_up_location"]))
                                        {
                                         $id=$_SESSION["txt_airport_pick_up_location"]="";
                                         }
                                       else {
                                        $id= $_SESSION["txt_airport_pick_up_location"];
                                         }
                                       
                                 $sql ="SELECT * FROM tbl_air_port LEFT JOIN tbl_province 
                                            ON tbl_province.pv_id = tbl_air_port.province_id WHERE air_id='$id'";
                                  $result = $connect->query($sql);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                    <?php echo $row['pv_title']; ?> / <?php echo $row['pro_from']; ?>


                                 <?php }} ?>
                            </td>
                           </tr>

                            <tr>
                            <td>Dropoff Location  : </td>
                            <td>
                               <?php
                                      if(!isset($_SESSION["txt_airport_drop_location"]))
                                        {
                                         $id=$_SESSION["txt_airport_drop_location"]="";
                                         }
                                       else {
                                        $id= $_SESSION["txt_airport_drop_location"];
                                         }
                                       
                                 $sql ="SELECT * FROM tbl_air_port LEFT JOIN tbl_province 
                                            ON tbl_province.pv_id = tbl_air_port.province_id WHERE air_id='$id'";
                                  $result = $connect->query($sql);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                    <?php echo $row['pv_title']; ?> / <?php echo $row['pro_to']; ?>

                                 <?php }} ?>
                            </td>
                           </tr>

                           <tr>
                            <td>Trip Way  : </td>
                            <td>
                             <?php
                                if($_SESSION['txt_airport_trip_way']=="1") {
                                  echo "One-Way";
                                }
                                else {
                                  echo "Round-Trip";
                                }

                             ?>
                            </td>
                           </tr>
                           <tr>
                            <td>Time(s)   : </td>
                            <td>
                              <?php
                              echo  $_SESSION['txt_depareture_time'];
                              ?>
                            </td>
                           </tr>

                    
                        </tbody>
                     </table>
                  </div>

                  <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                            <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px; color:#000;"><span style="font-weight: 800">Vehicle</span> Info</h4>
                            <div class="table-responsive" style="padding:10px;">
                                 <table class="table no-border no-margin">
                                    <tbody>
                                      <?php
                                      $sqls ="SELECT * FROM tbl_air_port 
                                                   WHERE air_id='$txt_airport_drop_location'
                                                  ";
                                           $result = $connect->query($sqls);
                                           if ($result->num_rows > 0) {
                                             while($rows= $result->fetch_assoc()){
                                                $name_pro_to=$rows['pro_to'];
                                          }
                                        }

                                       if(!isset($_SESSION["car_id"])) {
                                           $car_id="";
                                           $sql ="SELECT * FROM tbl_vehicle_rantal INNER JOIN tbl_air_port   
                                           ON tbl_vehicle_rantal.ve_id = tbl_air_port.car_id
                                           WHERE ve_id='' GROUP BY car_id ";
                                          
                                          }
                                       else {
                                           $car_id=$_SESSION['car_id'];
                           
                                            $sql ="SELECT * FROM tbl_vehicle_rantal INNER JOIN tbl_air_port   
                                           ON tbl_vehicle_rantal.ve_id = tbl_air_port.car_id
                                            WHERE ve_id IN ($car_id) AND pro_to='$name_pro_to' GROUP BY car_id";

                                           
                                       }
         
                                        $result = $connect->query($sql);
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()){
                                       ?>
                                        <tr>
                                          <td>Vehicle Name:</td>
                                          <td><?php echo $row['ve_title']; ?></td>
                                       </tr>
                                       <tr>
                                          <td>Price:</td>
                                          <?php
                                            if($txt_airport_trip_way=="1") {
                                              $price_round_way=$row['one_way'];
                                            }
                                            elseif ($txt_airport_trip_way=="2") {
                                             $price_round_way=$row['two_way'];
                                            }
                                            else {
                                              $price_round_way=$row['one_way'];
                                            }
                                          ?>
                                          <td>$ <?php echo number_format($price_round_way,2); ?> </td>
                                       </tr>
                                      
                                        <?php }} else {} ?>
                                                                            
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>


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
</script>
<script>
    $(".nav-tabs li").click(function(){
  $(".nav-tabs li").removeClass("active");
  $(this).addClass("active");
});
</script>

