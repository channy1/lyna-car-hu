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
               <div style="width: 100%;text-align: center;font-size: 18px; font-weight: bold;">
                  <span>DRIVER RENTAL AGREEMENT</span>
               </div>
               <div style="width: 100%;">
                  <div style="width: 100%;float: left;">
                     <div style="width: 82%;float: left;">
                        <div style="width: 100%;">
                           <label>I. Party A (Hereinafter refers to as the "Party A")</label>
                        </div>
                        <div style="width: 30%;padding-left: 15px;float: left;font-size: 11px">
                           <p>Name: <span style="color: blue !important;"><?php echo $row['ow_name']; ?></span></p>
                        </div>
                        <div style="width: 30%;padding-left: 15px;float: left;font-size: 11px">
                           <p>Title: <span style="color: blue !important;"><?php echo $row['own_title']; ?></span></p>
                        </div>
                        <div style="width: 30%;padding-left: 15px;float: left;font-size: 11px">
                           <p>ID Card No: <span style="color: blue !important;"><?php echo $row['own_card']; ?></span></p>
                        </div>
                        <div style="width: 50%;padding-left: 15px;float: left;font-size: 11px;margin-top: -10px;">
                           <p>Hand Phone: <span style="color: blue !important;"><?php echo $row['hand_phone']; ?></span></p>
                        </div>
                     </div>
                     <div style="width: 18%;float: left;">
            <div>
               <img id="barcode1" style="width: 154px;float: right;height: 64px;" src="barcode.png">
               <span style="float: right;margin-top: -20px;margin-right: 39px;clear: both;font-size: 8px;"><?php echo $row['ag_ref_no']; ?></span>
            </div>
                     <div style="width: 18%;float: left;">
                        <div>
                        </div>
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -10px;">
                     <div style="width: 90%;float: left;">
                        <div style="width: 100%;">
                           <label>II. Party B (Hereinafter refers to as the "Party B")</label>
                        </div>
                        <div style="width: 100%;padding-left: 15px;float: left;font-size: 11px">
                          <label style="width:30%;padding-left:2%; font-weight: bold;">Renter Information</label>
                          <label style="width:30%;padding-left:12%; font-weight: bold;">Local Address Information</label>
                          <label style="width:30%;padding-left:8%; font-weight: bold;">International Address Information</label>
                           <div style="width: 100%;float: left;font-size: 12px">

                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>First Name</p>
                                 </div>
                                 <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['user_first_name']; ?></span></div>
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
                                 <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['user_last_name']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Address</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['add_line_one']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Address</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['add_line_two']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Gender</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['user_gender']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Commune</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['commnune_name']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Town/City</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['city']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Date of Birth</p>
                                 </div>
                                   <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['user_birthday']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>District</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['district_no']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>State</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['state']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Place of Birth</p>
                                 </div>
                                   <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['pob']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Province</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['pv_title']; ?></span></div>
                              </div>
                              <div style="width: 40%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Phone No</p>
                                 </div>
                                   <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['user_phone_number']; ?></span></div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Nationality</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['nation_lity']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 30%;float: left;">
                                    <p>Phone No</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['cell_phone']; ?></span></div>
                              </div>
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>E-Mail</p>
                                 </div>
                                 <div class="data_support" style="width: 60%;float: left;"><span style="color: blue !important;">: <?php echo $row['user_email']; ?></span>
                                  </div>
                              </div>
                           </div>
                           <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                              <div style="width: 30%;float: left;">
                                 <div style="width: 40%;float: left;">
                                    <p>Com/Org</p>
                                 </div>
                                  <div class="data_support" style="width: 50%;float: left;"><span style="color: blue !important;">: <?php echo $row['user_company']; ?></span></div>
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
                        <div>
                           <?php
                              if($row['user_gender']=="Male") {
                                 echo '<img src="male.png" style="width:100%;">';
                              }
                              else {
                                 echo '<img src="female.png" style="width:100%;">';
                              }
                           ?>
                           
                        </div>
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -7px;">
                     <div style="width: 100%;">
                        <label>III. Support Documents</label>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px">
                        <div style="width:25%;float: left;padding-left: 15px;">
                           <div style="width:53%;float: left;">
                              <p>1. Original Passport</p>
                           </div>
                           <div class="data_support" style="width:30%;float: left;"><span style="color: blue !important;">: <?php if($row['ag_passport']=="1"){echo "Yes";}else {echo "No";} ?></span></div>
                        </div>
                        <div style="width:24%;float: left;">
                           <div style="width:40%;float: left;">
                              <p>Passport No</p>
                           </div>
                           <div class="data_support" style="width: 42%;float: left;">
                              <span  style="color: blue !important;">: <?php echo $row['passport_no']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Issued Date</p>
                           </div>
                           <div class="data_support" style="width:39%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['iss_pass']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width:37%;float: left;">
                              <p>Expired Date</p>
                           </div>
                        <div class="data_support" style="width:39%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['exp_pass']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                        <div style="width: 25%;float: left;padding-left: 15px;">
                           <div style="width:53%;float: left;">
                              <p>2. Original ID Card</p>
                           </div>
                           <div class="data_support" style="width:30%;float: left;"><span style="color: blue !important;">: <?php if($row['ag_id_card']=="1"){echo "Yes";}else {echo "No";} ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width:40%;float: left;">
                              <p>ID Card No</p>
                           </div>
                           <div class="data_support" style="width:42%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['id_card_no']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Issued Date</p>
                           </div>
                           <div class="data_support" style="width: 39%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['iss_card']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Expired Date</p>
                           </div>
                           <div class="data_support" style="width: 39%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['exp_card']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;margin-top: -10px;">
                        <div style="width: 25%;float: left;padding-left: 15px;">
                           <div style="width: 53%;float: left;">
                              <p>3. Residential Book</p>
                           </div>
                          <div class="data_support" style="width:30%;float: left;"><span style="color: blue !important;">: <?php if($row['ag_residentail_book']=="1"){echo "Yes";}else {echo "No";} ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width:40%;float: left;">
                              <p>RB No</p>
                           </div>
                           <div class="data_support" style="width:42%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['rb_no']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Issued Date</p>
                           </div>
                          <div class="data_support" style="width: 39%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['iss_book']; ?></span></div>
                        </div>
                        <div style="width: 24%;float: left;">
                           <div style="width: 37%;float: left;">
                              <p>Expired Date</p>
                           </div>
                           <div class="data_support" style="width: 39%;float: left;">
                              <span style="color: blue !important;">: <?php echo $row['exp_book']; ?></span></div>
                        </div>
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -6px;">
                     <div style="width: 100%;">
                        <label>IV. Driver's Information</label>
                     </div>
                     <?php
                      $id=$_GET['id'];
                      $v_sql_driver = "SELECT * FROM tbl_agreement
                                INNER JOIN tbl_users
                                ON tbl_users.user_id=tbl_agreement.car_id
                                LEFT JOIN tbl_user_agreement
                                ON tbl_user_agreement.customer_id=tbl_users.user_id
                                LEFT JOIN tbl_province
                                ON tbl_province.pv_id=tbl_users.province_id
                                WHERE ag_id='$id'";
                       $result = $connect->query($v_sql_driver);
                       if ($result->num_rows > 0) {
                        while($row_driver = $result->fetch_assoc()) {
                     ?>

                     <div style="width: 100%;float: left;font-size: 11px;">
                      <div style="width:60%;float: left;padding-left: 15px;">
                        <div style="width: 100%;float: left">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p>Name</p>
                           </div>
                           <div class="data_support" style="width:39%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['user_first_name']; ?> <?php echo $row_driver['user_last_name']; ?></span></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:30%;float: left;">
                              <p>Address</p>
                           </div>
                           <div class="data_support" style="width:60%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['user_address']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p class="top_p_inoformation">Title</p>
                           </div>
                           <div class="top_p_data" style="width:39%;float: left;"><span  style="color: blue !important;">: <?php echo $row_driver['user_title']; ?></span></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:30%;float: left;">
                              <p class="top_p_inoformation">Town/City</p>
                           </div>
                           <div class="top_p_data" style="width:60%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['city']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p class="top_p_inoformation">Date of Birth</p>
                           </div>
                           <div class="top_p_data" style="width:39%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['user_birthday']; ?></span></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:30%;float: left;">
                              <p class="top_p_inoformation">Province</p>
                           </div>
                           <div class="top_p_data" style="width:60%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['pv_title']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p class="top_p_inoformation">Place of Birth</p>
                           </div>
                           <div class="top_p_data" style="width:39%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['pob']; ?></span></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:30%;float: left;">
                              <p class="top_p_inoformation">Hand No.</p>
                           </div>
                           <div class="top_p_data" style="width:60%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['user_phone_number']; ?></span></div>
                        </div>
                     </div>
                     <div style="width: 100%;float: left;">
                        <div style="width:45%;float: left;">
                           <div style="width: 35%;float: left;">
                              <p class="top_p_inoformation">Nationality</p>
                           </div>
                           <div class="top_p_data" style="width:39%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['nation_lity']; ?></span></div>
                        </div>
                        <div style="width:45%;float: left;">
                           <div style="width:30%;float: left;">
                              <p class="top_p_inoformation">E-mail</p>
                           </div>
                           <div class="top_p_data" style="width:70%;float: left;"><span style="color: blue !important;">: <?php echo $row_driver['user_email']; ?></span></div>
                        </div>
                     </div>
                    </div>
                    <div style="width:25%;float: right;padding-right: 15px;">
                      <div style="width:100%;border:0.5px solid #ccc !important;text-align:center;font-size:13px;">
                        <label>comes into effect from:</label>
                        <b style="color:blue !important;font-size:13px;display: block;margin-top:0px;"> <?php
                                $dt = strtotime($row['ag_inception_date']);
                                echo date('l, F, d, Y', $dt);
                                // echo date('l, F d, Y');
                              ?>
                        </b>

                        
                      </div>
                     
                      <div style="width:100%;border:0.5px solid #ccc !important;text-align:center;font-size:13px;">
                         <label>Expected date/time of return:</label>
                        <b style="color:blue !important;font-size:13px;display:block;margin-top:0px;"><?php
                            $dt = strtotime($row['ag_return_date']);
                            echo date('l, F, d, Y', $dt);
                          ?>
                                
                        </b>
                      </div>
                    </div>

                     </div>
                     <br>
                     
                     <?php }} ?>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -2px;">
                     <div style="width: 100%;">
                        <label>V. Rental and Payment Information (All the related payment must be made in advance)</label>
                     </div>
                  <div style="width: 100%;float: left;font-size: 11pxpadding-left: 15px;">
                        <table border="1" style="border-collapse: collapse;width: 99%;font-size: 11px">
                           <tbody>
                              <tr>
                                 <td colspan="2" style="text-align: center;padding:6px;width: 25%"><span>Rental Period Information</span></td>
                                 <td style="text-align: center;padding:6px;padding:6px;padding:6px;padding:6px;width: 25%"><span>Items Description</span></td>
                                 <td style="text-align: center;padding:6px;padding:6px;padding:6px;width: 15%"><span>Unit Price</span></td>
                                 <td style="text-align: center;padding:6px;padding:6px;width: 15%"><span>Total Price</span></td>
                                 <td style="text-align: center;padding:6px;width: 20%"><span>Remarks</span></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">Range Day(s)</td>
                                 <td style="text-align: center;padding:1px;color: blue !important;"><?php echo $row['ag_period_day']; ?> Day(s)</td>
                                 <td style="padding:1px;">1. Driver Rental</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_rate'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_total'],2); ?></td>
                                 <td rowspan="9" style="padding:1px;"></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">Extra Day(s)</td>
                                 <td style="text-align: center;padding-right:7px;color: blue !important;"><?php echo $row['ag_extra_day']; ?> Day(s)</td>
                                 <td style="padding:1px;">2. Extra Day</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_extra_rate'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_extra_total'],2); ?></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">Inception Date</td>
                                 <td style="text-align: right;padding-right:7px;color: blue !important;"><?php echo $row['ag_inception_date']; ?></td>
                                 <td style="padding:1px;">3. Refundable Deposit</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_deposited'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_deposited'],2); ?></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">Return Date</td>
                                 <td style="text-align: right;padding-right:7px;color: blue !important;"><?php echo $row['ag_return_date']; ?></td>
                                 <td style="padding:1px;"></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;"></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;"></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;">Return Time</td>
                                 <td style="text-align: right;padding-right:7px;color: blue !important;"><?php echo $row['ag_return_time']; ?></td>
                                 <td style="padding:1px;text-align: right;padding-right: 10px;">Amount Total</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;">$<?php echo number_format($row['ag_amount_aft_d'],2); ?></td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important; font-weight: bold;">$<?php echo number_format($row['ag_amount_aft_d'],2); ?></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;"></td>
                                 <td style="text-align: right;padding-right:7px;color: blue !important;"></td>
                                 <td style="padding:1px;text-align: right;padding-right: 10px;">Discount</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;"><?php echo number_format($row['ag_discount_percent'],2); ?>%</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important; font-weight: bold;">$<?php echo number_format($row['ag_discount_amount'],2); ?></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;padding-left: 7px;"></td>
                                 <td style="text-align: right;padding-right:7px;color: blue !important;"></td>
                                 <td style="padding:1px;text-align: right;padding-right: 10px;">VAT</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important;"><?php echo number_format($row['ag_vat'],2); ?>%</td>
                                 <td style="text-align: right;padding-right: 10px;color: blue !important; font-weight: bold;">$<?php echo number_format($row['ag_vat_amount'],2); ?></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;border-left: 1px solid #fff;border-bottom: 1px solid #fff;" rowspan="2" colspan="2"></td>
                                 <td style="padding:1px;text-align: right;padding-right: 10px;">Amount After Discount and VAT</td>
                                 <td colspan="2" style="text-align: right;padding-right: 10px;color: blue !important; font-weight: bold;">$<?php echo number_format($row['ag_amount_aft_d'],2); ?></td>
                              </tr>
                              <tr>
                                 <td style="padding:1px;text-align: right;padding-right: 10px;">Total Net Pay</td>
                                 <td colspan="2" style="font-size: 13px; text-align: right;padding-right: 10px;color: blue !important; font-weight: bold;">$<?php echo number_format($row['ag_total_net_pay'],2); ?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top: -10px;display:none;">
                     <div style="width: 100%;">
                        <label>VI. Services Included</label>
                     </div>
                     <div style="width: 100%;float: left;font-size: 10px">
                        <div style="width: 20%;float: left;padding-left: 15px;">
                           <div style="width: 100%;float: left;">
                              <p>1. Regular Maintenance<span style="color: blue !important;">:<?php if($row['ag_regular_maintenance']=="1"){echo "YES";}else {echo "NO";} ?></span></p>
                           </div>
                        </div>
                        <div style="width: 20%;float: left;">
                           <div style="width: 100%;float: left;">
                              <p>2. Unlimited Mileage<span style="color: blue !important;">:<?php if($row['ag_unlimited_millage']=="1"){echo "YES";}else {echo "NO";} ?></span></p>
                           </div>
                        </div>
                        <div style="width: 28%;float: left;">
                           <div style="width: 100%;float: left;">
                              <p>3. Repair or Spare Parts Replacement<span style="color: blue !important;">:<?php if($row['ag_repair']=="1"){echo "YES";}else {echo "NO";} ?></span></p>
                           </div>
                        </div>
                        <div style="width: 28%;float: left;">
                           <div style="width: 100%;float: left;margin-left:10%;">
                              <p>4. Comprehensive Insurance<span​ style="color: blue !important;">:<?php if($row['ag_insurance']=="1"){echo "YES";}else {echo "NO";} ?></span​></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div style="width: 100%;float: left;margin-top: 2px;">
                     <div style="width: 100%;">
                        <label>VI. Vehicle Rental Agreement Signatories, Validation of Returning the Vehicle and all the Relate Items</label>
                     </div>
                     <div style="width: 100%;float: left;font-size: 11px;">
                        <div style="width:25%;float: left;border:1px solid #ccc;height:90px;line-height: 14px;padding: 0.5%;">
                           1. If the length of the contract is last
                           more than 5 days,both the parties
                           cannot break the contract earlieer.In
                           case, the PARTY B wishes to break
                           the contract earlier, the deposit of
                           <span style="color: blue !important">US $<?php echo number_format($row['ag_deposited'],2); ?></span> won't be refunded. 
                        </div>
                        <div style="width:18%;float: left;border:1px solid #ccc;margin-left: 8px;height:90px;line-height: 14px;padding: 0.5%;">
                           2. For more details, please
                           turnover to back page 
                           of the contract and read
                           carefully from articles
                           <span style="color: blue !important"><?php echo $row['ag_articles_from']; ?></span> to <span style="color: blue !important"><?php echo $row['ag_articles_to']; ?></span> and the rest.
                        </div>
                        <div style="width: 20%;float: left;border:1px solid #ccc;margin-left: 8px;height:90px;line-height: 14px;padding: 0.5%;">
                           3. The above-mentioned 
                           statements having been agreed between the
                           signatories who have read
                           it and  declared to understand
                           all clauses.
                        </div>
                        <div style="width:28%;float:left;border:1px solid #ccc;margin-left: 8px;height:90px;line-height: 14px;padding: 0.5%;">
                           4. If the Renter wishes to
                           extend some more days of
                           stay or use the Driver, the
                           Renter must agree to pay
                           extra at the daily rate.
                           &nbsp;
                        </div>
                     </div>
                  </div>
                  <div style="width: 100%;float: left;margin-top:5px;">
                     <div style="width: 100%;padding-left: 15px;font-size: 12px;">
                        <div style="width: 30%;font-weight: bold;text-align: center;float: left;">
                           Renter's <br><br><br><br><span style="font-weight: 100 !important;color:#ccc;">___________________</span><span style="color: blue !important;display: block;margin-top: -1px;"><?php echo $row['ag_name_renter']; ?></span>
                        </div>
                        <div style="width: 30%;font-weight: bold;text-align: center;float: left;">
                           Owner's Withness <br><br><br><br><span style="font-weight: 100 !important;color:#ccc;">___________________</span><span style="color: blue !important;display: block;margin-top: -1px;"><?php echo $row['ag_name_witness']; ?></span>
                        </div>
                        <div style="width: 35%;font-weight: bold;text-align: center;float: left;">
                           Agreement date: <span style="color:blue !important;"><?php echo date('l, F d, Y'); ?></span> <br><br><br><br><span style="font-weight: 100 !important;color:#ccc;">___________________</span><span style="color: blue !important;display: block;margin-top: -1px;"><?php echo $row['ag_name_owner_sign']; ?></span>
                        </div>
                     </div>
                  </div>
               </div>
               &nbsp;<br>
            </div>
         </div>
      </td>
      </tr>
   </tbody>
</table>
<?php
    }
}
?>

<style type="text/css">
p {
   line-height:1.2px;
}
.top_p_inoformation{
  margin-top:3px;
}
.top_p_data {
  margin-top: -5px;
}
.data_support{
  margin-top: 5px;
}
</style>
<script type="text/javascript">
window.print();
</script>