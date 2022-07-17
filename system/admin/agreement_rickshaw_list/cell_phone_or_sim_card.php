<?php
 include_once '../../config/database.php';
 include_once '../../config/athonication.php';

?>


<?php
   $id=$_GET['id'];

  $v_sql = "SELECT * FROM tbl_agreement
              
              INNER JOIN tbl_owner_list
              ON tbl_owner_list.ow_id=tbl_agreement.ag_name_owner
              LEFT JOIN tbl_users
              ON tbl_users.user_id=tbl_agreement.user_id
              LEFT JOIN tbl_province
              ON tbl_province.pv_id=tbl_users.user_id
              LEFT JOIN tbl_user_agreement
              ON tbl_agreement.user_id=tbl_user_agreement.customer_id
              WHERE ag_id='$id'
              ORDER BY tbl_agreement.ag_id

              ";
    $result = $connect->query($v_sql);

   if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
?>
<table width="100%">
   <tbody>
      <div id="header-left">
      </div>
      <style>
         .current-left{  background: none repeat scroll 0 0 #EDF7F8 !important;}
      </style>
      </td>
      <td valign="top">
         <div class="col-sm-12">

            <div style="width:100%;margin: 0 auto;border:0px solid #ccc;" id="div">
               <div class="head1" style="width: 100%; display: none;">&nbsp;</div>
               <div style="width: 100%;text-align: center;font-size: 16px;">
                  <span>CELL PHONE OR SIM CARD RENTAL AGREEMENT</span>
               </div>
               <div style="width: 100%;">
                  <div style="width: 100%;float: left;">
                     <div style="width: 82%;float: left;">
                        <div style="width: 100%;">
                           <label style="font-size:11px;">I. ពត៍មានម្ចាស់រថយន្ត អំណើសតទៅជាភាគី ក-Information of Vechicle's Owner.Hereinafter refers to as Party A</label>
                        </div>
                        <div style="width: 40%;padding-left: 15px;float: left;font-size: 11px">
                           <p>នាមគោត្តនាម Name: <span style="color: blue !important;"><?php echo $row['ow_name']; ?></span></p>
                        </div>
                        <div style="width: 40%;padding-left: 15px;float: left;font-size: 11px">
                           <p>តួនាទី Position: <span style="color: blue !important;"><?php echo $row['own_title']; ?></span></p>
                        </div>
                        <div style="width:40%;padding-left: 15px;float: left;font-size: 11px">
                           <p>អត្តសញ្ញាណប័ណ្ណ ID Card: <span style="color: blue !important;"><?php echo $row['own_card']; ?></span></p>
                        </div>
                        <div style="width: 40%;padding-left: 15px;float: left;font-size: 11px">
                           <p>ទូរស័ព្ទលេខ Hand Phone: <span style="color: blue !important;"><?php echo $row['hand_phone']; ?></span></p>
                        </div>
                     </div>
                     <div style="width: 18%;float: left;font-size:11px;">
                       
                     <div>
              
               <span style="margin-top:-15px;margin-left:-40px;clear: both;font-size:8px;">លេខយោង Reference No.<label style="color:red;"><?php echo $row['ag_ref_no']; ?></label></span>
            </div>
                     <div style="width: 18%;float: left;width:100%;">
                      <center><span style="width:80%;">info@lyna-carrental.com</span></center>
                       <hr style="width:100%;">
                      <center> <span style="width:80%;">អ៊ីម៉ែល Direct E-mail</span></center>
                       
                      
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -10px;">
                     <div style="width: 90%;float: left;">
                        <div style="width: 100%;">
                           <label style="font-size:11px;">II. ពត៌មានអ្នកសុំជួលរថយន្ត អំណើសតទៅជាភាគី​  ខ Information of Vehicle Renter.Hereinafter refers to as Party B</label>
                        </div>
                        <div style="width: 100%;padding-left: 15px;float: left;font-size: 11px">
                          <label style="width:30%;padding-left:12%;">Renter Information</label>  <label style="width:30%;padding-left:10%;">Local Address Information</label>  <label style="width:30%;padding-left:10%;">International Address Information</label>
                           <div style="width: 100%;float: left;font-size: 12px">

                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>First Name</p>
                                 </div>
                                 <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['user_first_name']; ?></span></div>
                              </div>
                             <!--  <div style="width: 30%;float: left;">
                                 <p style="font-weight: bold;">Local Address Information</p>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <p style="font-weight: bold;">International Address Information</p>
                              </div> -->
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Last Name</p>
                                 </div>
                                 <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['user_last_name']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Address</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['add_line_one']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Address</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['add_line_two']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Gender</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['user_gender']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Commune</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['commnune_name']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Town/City</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['city']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Date of Birth</p>
                                 </div>
                                   <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['user_birthday']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>District</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['district_no']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>State</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['state']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Place of Birth</p>
                                 </div>
                                   <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['pob']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Province</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['pv_title']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Phone No</p>
                                 </div>
                                   <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['user_phone_number']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Nationality</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['nation_lity']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Phone No</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['cell_phone']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>E-Mail</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['user_email']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Com/Org</p>
                                 </div>
                                  <div style="width: 50%;float: left;"><span style="color: blue !important;">:<?php echo $row['user_company']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>&nbsp;</p>
                                 </div>
                                 <div style="width: 70%;float: left;"><span>&nbsp;</span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>&nbsp;</p>
                                 </div>
                                 <div style="width: 70%;float: left;"><span>&nbsp;</span></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div style="width: 10%;float: left;">
                        
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -10px;">
                     <div style="width: 100%;">
                        <label style="font-size:11px;">III. តម្រូវការនិងកក់ Requirement and Deposit</label>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px">
                        <div style="width:25%;float: left;padding-left: 15px;">
                           <div style="width:53%;float: left;">
                              <p>1. Original Passport</p>
                           </div>
                           <div style="width:30%;float: left;"><span style="color: blue !important;">: <?php if($row['ag_passport']=="1"){echo "Yes";}else {echo "No";} ?></span></div>
                        </div>
                        <div style="width:24%;float: left;">
                           <div style="width:40%;float: left;">
                              <p>Passport No</p>
                           </div>
                           <div style="width: 40%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['passport_no']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Issued Date</p>
                           </div>
                           <div style="width:37%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['iss_pass']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width:37%;float: left;">
                              <p>Expired Date</p>
                           </div>
                        <div style="width:37%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['exp_pass']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                        <div style="width: 25%;float: left;padding-left: 15px;">
                           <div style="width:53%;float: left;">
                              <p>2. Original ID Card</p>
                           </div>
                           <div style="width:30%;float: left;"><span style="color: blue !important;">: <?php if($row['ag_id_card']=="1"){echo "Yes";}else {echo "No";} ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width:40%;float: left;">
                              <p>ID Card No</p>
                           </div>
                           <div style="width:40%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['id_card_no']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Issued Date</p>
                           </div>
                           <div style="width: 37%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['iss_card']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Expired Date</p>
                           </div>
                           <div style="width: 37%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['exp_card']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                        <div style="width: 25%;float: left;padding-left: 15px;">
                           <div style="width: 53%;float: left;">
                              <p>3. Residentail Book</p>
                           </div>
                          <div style="width:30%;float: left;"><span style="color: blue !important;">: <?php if($row['ag_residentail_book']=="1"){echo "Yes";}else {echo "No";} ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width:40%;float: left;">
                              <p>RB No</p>
                           </div>
                           <div style="width:40%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['rb_no']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Issued Date</p>
                           </div>
                          <div style="width: 37%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['iss_book']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Expired Date</p>
                           </div>
                           <div style="width: 37%;float: left;">
                              <span style="color: blue !important;">:<?php echo $row['exp_book']; ?></span></div>
                        </div>
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -10px;">
                     <div style="width: 100%;">
                        <label style="font-size:11px;">IV. ពត៍មានរថយន្ត Vehicle Information</label>
                     </div>
                     <?php
                      $id=$_GET['id'];
                      $v_sql_driver = "SELECT * FROM tbl_agreement
                                LEFT JOIN tbl_rick_shaw_rental_last
                                ON tbl_agreement.car_id=tbl_rick_shaw_rental_last.ve_id
                                WHERE ag_id='$id'";
                       $result = $connect->query($v_sql_driver);
                      
                       if ($result->num_rows > 0) {
                        while($row_ve = $result->fetch_assoc()) {
                     ?>

                     <div style="width: 100%;float: left;font-size: 11px">
                      <div style="width:60%;float: left;padding-left: 15px;">
                        <div style="width: 100%;float: left;font-size: 11px">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p>Year</p>
                           </div>
                           
                            <div  style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_year']; ?></span></div>
                            <div class="border_data"></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:35%;float: left;">
                              <p>Color</p>
                           </div>
                           <div style="width:40%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_color']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p>Make</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_make']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:35%;float: left;">
                              <p>Engine No</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_horse_pow']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p>Model</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_model']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:35%;float: left;">
                              <p>Frame No</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_type']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p>Submodel</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_sub_model']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:35%;float: left;">
                              <p>Mileage No.</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_transmission_type']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p>L Plate No</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php echo $row_ve['ve_horse_pow']; ?></span></div>
                           <div class="border_data"></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:35%;float: left;">
                              <p>Insurance</p>
                           </div>
                           <div style="width:35%;float: left;"><span style="color: blue !important;">:<?php if($row_ve['ag_insurance']=="1") {echo "YES";} else {echo "NO";} ?></span></div>
                           <div class="border_data"></div>
                        </div>
                     </div>
                    </div>
                    <div style="width:35%;float: left;padding-left: 15px;">
                      <div style="width:100%;text-align:center;font-size:11px;">
                        <table border="1" style="border-collapse: collapse;width: 99%;font-size: 11px;">
                           <tbody>
                              <tr>
                                 <td colspan="2" style="text-align: center;padding:6px;width:40%;font-size: 9px;"><span>សេវាកម្មគិតបញ្ជូលដូចខាងក្រោម Services Included</span></td>
                                
                              </tr>
                              <tr>
                                 <td style="text-align:center;font-size: 11px;width:5%;">Y/N</td>
                                 <td style="padding-right:7px;color: blue !important;font-size: 9px;padding-left:10px;">Regular Maintenance</td>
                              </tr>
                               <tr>
                                 <td style="text-align:center;font-size: 11px;">Y/N</td>
                                 <td style="padding-right:7px;color: blue !important;font-size: 9px;padding-left:10px;">Unlimited Mileage</td>
                              </tr>
                              <tr>
                                 <td style="text-align:center;font-size: 11px;">Y/N</td>
                                 <td style="padding-right:7px;color: blue !important;font-size: 9px;padding-left:10px;">Repair or Spare Parts Replacement</td>
                              </tr>
                              <tr>
                                 <td style="text-align:center;font-size: 11px;">Y/N</td>
                                 <td style="padding-right:7px;color: blue !important;font-size: 9px;padding-left:10px;">Comprehensive Insurance Coverage</td>
                              </tr>
                           </tbody>
                        </table>

                        

                        
                      </div>
                    
                    </div>

                     </div>
                     <br>
                     
                     <?php }} ?>
                  </div>
                  <div style="width: 100%;float: left;margin-top:2px;">
                     <div style="width: 100%;">
                        <label style="font-size:11px;">V. ថេរ:វេលានៃការជួល​ និងតម្លៃ Rental Period Information and Rental Rates (All the related payment must be paid in advance)</label>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11pxpadding-left: 15px;">
                        <table border="1" style="border-collapse: collapse;width: 99%;font-size: 11px">
                           <tbody>
                              <tr>
                                 <td colspan="2" style="text-align: center;width: 25%"><span>Rental Period Information</span></td>
                                 <td style="text-align: center;width:30%"><span>Items Description</span></td>
                                  <td style="text-align: center;width:5%"><span>Day(s)</span></td>
                                   <td style="text-align: center;width:10%"><span>Month(s)</span></td>
                                 <td style="text-align: center;width:10%"><span>U Price</span></td>
                                 <td style="text-align: center;width:10%"><span>Total</span></td>
                                 <td style="text-align: center;width: 20%"><span>Remarks</span></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">The Period of:</td>
                                 <td style="text-align:left;padding:1px;color: blue !important;padding-left: 7px;"><?php echo $row['ag_period_day']; ?> Day(s)</td>
                                 <td style="padding:1px;padding-left: 7px;">1. Vehicle Rental</td>
                                 <td style="padding:1px;width:10px;color:blue;text-align:center;">5</td>
                                 <td style="padding:1px;color:blue;text-align:center;">0</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_rate'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_total'],2); ?></td>
                                 <td rowspan="9" style="padding:1px;"></td>
                              </tr>
                             
                             
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">Inception Date:</td>
                                 <td style="padding-left: 7px;color: blue !important;"><?php echo $row['ag_return_date']; ?></td>
                                 <td style="padding:1px;padding-left: 7px;">2. Long Distance Assistance Fee</td>
                                 <td style="padding:1px;width:10px;color:blue;text-align:center;">5</td>
                                 <td style="padding:1px;color:blue;text-align:center;">0</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat_amount'],2); ?></td>
                              </tr>
                               <tr>
                                 <td style="padding:1px;padding-left: 7px;">Return Date:</td>
                                 <td style="padding-left: 7px;color: blue !important;"><?php echo $row['ag_return_date']; ?></td>
                                 <td style="padding:1px;padding-left: 7px;">3. Refundable Deposit</td>
                                 <td style="padding:1px;width:10px;color:blue;text-align:center;">5</td>
                                 <td style="padding:1px;color:blue;text-align:center;">0</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat_amount'],2); ?></td>
                              </tr>
                               <tr>
                                 <td style="padding:1px;padding-left: 7px;">Return Time:</td>
                                 <td style="padding-left: 7px;color: blue !important;"><?php echo $row['ag_return_date']; ?></td>
                                 <td style="padding:1px;padding-left: 7px;">4. Others</td>
                                 <td style="padding:1px;width:10px;color:blue;text-align:center;">5</td>
                                 <td style="padding:1px;color:blue;text-align:center;">0</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat_amount'],2); ?></td>
                              </tr>
                              
                              
                              
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">Fuel Included:</td>
                                 <td style="padding-left: 7px;color: blue !important;">YES</td>
                                 <td style="padding:1px;padding-left: 7px;">Fuel Full Tank:</td>
                                 <td style="padding:1px;color: blue !important;text-align:center;">NO</td>
                                 <td style="padding:1px;text-align:center;">VAT 10%:</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat_amount'],2); ?></td>
                              </tr>
                               <tr>
                                 <td colspan="4"></td>
                                 
                                 <td colspan="1" style="padding:1px;text-align:center;">Grand Total:</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_vat_amount'],2); ?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  
                  <div style="width: 100%;float: left;">
                     <div style="width: 100%;">
                        <label style="font-size:11px;">VI. ហត្ថលេខី កិច្ចព្រមព្រៀង ជួល រថយន្តនិង សុពលភាព Vehicle Rental Agreement Signatories and Validation.</label>
                     </div>
                     
                  </div>
                  <div style="width: 100%;float: left;margin-top:5px;">
                     <div style="width: 100%;padding-left: 15px;font-size: 12px;">
                        <div style="width: 30%;font-weight: bold;text-align: center;float: left;">
                           Renter's <br><br>___________________<br><span style="color: blue !important;"><?php echo $row['ag_name_renter']; ?></span>
                        </div>
                        <div style="width: 30%;font-weight: bold;text-align: center;float: left;">
                           Owner's Withness <br><br>___________________<br><span style="color: blue !important;"><?php echo $row['ag_name_witness']; ?></span>
                        </div>
                        <div style="width: 30%;font-weight: bold;text-align: center;float: left;">
                           Agreement date: <span style="color:blue !important;"><?php echo date('Y-m-d'); ?></span><br><br>___________________<br><span style="color: blue !important;"><?php echo $row['ag_name_owner_sign']; ?></span>
                        </div>
                     </div>
                  </div>
               </div>
               &nbsp;
                <label style="float:left;margin-left:20px;">Special Notices:</label>
               <div style="width: 100%;float: left;font-size: 11px;">

                        <div style="width:25%;float: left;border:1px solid #ccc;height:100px;line-height: 14px;padding: 0.5%;">
                          1. If the length of the contract last more than 3 months, both the parties cannot break the contract earlier. In case, the Renter wishes to break the contract earlier, the deposit of
                           <span style="color: blue !important">US $<?php echo number_format($row['ag_deposited'],2); ?></span> won't be refunded. 
                        </div>
                        <div style="width:18%;float: left;border:1px solid #ccc;margin-left: 8px;height:100px;line-height: 14px;padding: 0.5%;">
                          2. For more details, please turn over to the back page(s) of the contract and read carefully from articles
                           <span style="color: blue !important"><?php echo $row['ag_articles_from']; ?></span> to <span style="color: blue !important"><?php echo $row['ag_articles_to']; ?></span> and the rest.
                        </div>
                        <div style="width: 20%;float: left;border:1px solid #ccc;margin-left: 8px;height:100px;line-height: 14px;padding: 0.5%;">
                           3. The above-mentioned 
                           statements having been agreed between the
                           signatories who have read
                           it and  decleared to understand
                           all clauses.
                        </div>
                        <div style="width:28%;float:left;border:1px solid #ccc;margin-left: 8px;height:100px;line-height: 14px;padding: 0.5%;">
                           4. If the Renter wishes to
                           extend some more days of
                           stay or use the Driver,the
                           Renter must agree to pay
                           extra at the daily rate
                           &nbsp;
                        </div>
                     </div>

            </div>

         </div>
      </td>
      </tr>
   </tbody>
</table>
 <label style="float:left;margin-left:20px;">___________________</label><br>
 <span style="float:left;margin-left:20px;font-size:8px;">
  1. If page 1 indicates “day” = 12-hour period. Counting from 0700 to 1800 hours or equal to the working hours of the human being. We do not count 24 hours!
   <br>
  2. If page 1 indicates “month” = 30-day period.
 </span>
<?php
    }
}
?>

<style type="text/css">
p {
   line-height:1.2px;
}
.border_data{
border-top:1px solid black;
width:65%;
float: right;
margin-right: 3%;
}
</style>
<script type="text/javascript">
// window.print();
</script>