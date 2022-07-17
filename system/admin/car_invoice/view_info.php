<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';

?>

    <div class="invoice">
        <div class="invoice-header">
            <div class="row">
                <div class="col-xs-12">
                    <center>
                        <img style="width: 38%;" src="../../img/header_invoice.png">
                    </center>
                    
                </div>

            </div>
        </div>
        <div class="invoice-body">
            <div class="row">
                <div class="col-xs-7">

                    <div class="">
                        <table style="width:100%">
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Grand Total:
                                    <label id="gr_total"style="margin-left:5px;color:blue;font-weight:900;font-size:14px;">&nbsp;&nbsp;</label>
                                </th>
                            </tr>


                          <?php
                          $get_id=$_GET['id'];
                             $sql ="SELECT * FROM tbl_users  
                             INNER JOIN tbl_quotation_admin
                             ON tbl_quotation_admin.customer_id=tbl_users.user_id
                             WHERE q_id='$get_id'";
                             $result = $connect->query($sql);
                             if ($result->num_rows > 0) {     
                              while($row = $result->fetch_assoc()) {
                                $sign_owner=$row['signator_owner'];
                                $sign_prepare=$row['signator_prepare'];
                                $sign_renter=$row['signator_renter'];
                          ?>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Coupon N&deg;:
                                    <label class="invoice" style="color:blue;">&nbsp;&nbsp;<?php echo $row['user_coupon_code'];?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Intro.ID N&deg;:
                                    <label style="color:blue;">&nbsp;&nbsp;<?php echo $row['user_introducer_id']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Q/I Ref. N&deg;:
                                    <label style="color:blue;">&nbsp;&nbsp;<?php echo $row['ref_no']; ?></label>
                                </th>
                            </tr>

                            <tr>
                                <th style="padding:2px;font-weight: 100;">Valid Date:
                                    <label style="color:blue; margin-left: 4px;">&nbsp;&nbsp;<?php
                                      $book_date=$row['booking_date'];
                                      echo date('Y-m-d', strtotime("+1 months", strtotime($book_date))); ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:0px;font-weight: 100;">VAT N&deg;:
                                    
  <div style="margin-left:35px;width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>K</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>0</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>0</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>2</label></div>
  <div style="width: 10px; border: 0px solid black;display:inline-block;text-align: center;color: blue;"><label>&#8331;</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>9</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>0</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>1</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>1</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>8</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>0</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>2</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>2</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>3</label></div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;color: blue;"><label>6</label></div>  

                                </th>
                            </tr>
                      <?php  }} ?>
                        </table>

                    </div>

                </div>
                <div class="col-xs-5">

                    <fieldset style="border: 1px solid #a4509f; border-radius: 9px;">
                        <legend style="border-bottom:none;margin-bottom:6px; background:none; text-align: left; margin-left: 20px; width:65px; color: #a4509f;">
                            
                                <!-- <div style="margin-left: 6px;width: 20px;height: 20px;background: #fff;float: left;margin-top: 4px;border: 1px solid black;">
                                 <input style="width: 22px;height: 17px;" type="checkbox"  checked>
                                </div> -->
                                <span class="qu" style="color:#25306c;font-size:14px;width:0px;float: left;margin-top: 0px; font-weight: bold;">INVOICE:</span>                                                

                        </legend>
                        <ul style="line-height: 12px; margin-left: -20px;">
                          <?php
                             $get_id=$_GET['id'];
                             $sql ="SELECT * FROM tbl_users  
                              INNER JOIN tbl_quotation_admin
                             ON tbl_quotation_admin.customer_id=tbl_users.user_id
                             WHERE q_id='$get_id'";
                             $result = $connect->query($sql);
                             if ($result->num_rows > 0) {     
                              while($row = $result->fetch_assoc()) {
                          ?>
                          <?php
                            if($row['user_gender']=="Female") {
                              $ms_mr="Mrs.";
                            }
                            else {
                              $ms_mr="Mr.";
                            }
                          ?>
                          <li style="list-style: none;">
                            <?php echo $ms_mr; ?> <label style="color:blue;"><?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?></label>
                          </li>
                          <li style="list-style: none;color:blue;">
                            <label><?php echo $row['user_title']; ?></label>
                          </li>
                           <li style="list-style: none;color:blue;">
                              <label><?php echo $row['user_origination']; ?></label>
                          </li>
                          <li style="list-style: none;color:blue;">
                            <label><?php echo $row['user_address']; ?></label>
                          </li>
                           <li style="list-style: none;">
                            Tel: <label style="color:blue;"><?php echo $row['user_phone_number']; ?></label>
                          </li>
                           <li style="list-style: none;">
                            Email: <label style="color:blue;"><?php echo $row['user_email']; ?></label>
                          </li>
                        <?php
                            }
                          }
                        ?>
                        </ul>

                    </fieldset>

                </div>
            </div>

            <div class="row">

                <div class="panel-heading" style="width:100%;background: #fff !important;">
                    <div style="width:8%;float:left;">
                        <h3 style="margin:5px;font-size: 16px;font-weight: 900;">Subject:</h3>
                    </div>
                    <div style="border: 1px solid black;width:90%;padding: 4px;background-color: #fff;float:right;">
                    <span style="color: blue;"><label style="font-size: 15px; font-weight: bold;">Car Rental Service</label></span>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
                    <tbody>
                        <tr>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="5%" class="aa text-center">No</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="45%" class="aa text-center">Items Description</th>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="10%" class="aa text-center">Period</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="10%" class="aa text-center">QTY</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" colspan="4" width="35%" class="aa text-center">Price In US$</th>
                        </tr>
                        <tr style="text-align: center">
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="7%">Price</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="7%">Discount</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="7%">VAT</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="14%" nowrap="nowrap">Amount</th>
                        </tr>
                       <?php
                             $id=$_GET['id'];
                             $query="SELECT tbl_quotation_admin.refun_deposit as deposit_admin,
                             tbl_quotation_admin.*,tbl_quotation_car.*,tbl_vehicle_rantal.*
                              FROM tbl_quotation_admin 
                                          LEFT JOIN tbl_quotation_car
                                          ON tbl_quotation_car.q_id=tbl_quotation_admin.q_id
                                          LEFT JOIN tbl_vehicle_rantal
                                          ON tbl_vehicle_rantal.ve_id=tbl_quotation_car.car_id
                                          WHERE tbl_quotation_admin.q_id='$id'
                                       
                                    ";
                                $result = $connect->query($query);
                               
                                $i=1;
                                $extraday_car="";
                                $check_price_pick=0;
                                $total_car=0;
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                 
                                  $ld_assistant=$row['ld_ass'];
                                  $refund_deposit=$row['deposit_admin'];
                                   
                            ?>
                         <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label><?php echo $row['ve_title']; ?></label>
                            </td>
                            <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $row['car_daily_day']; ?> Day(s)</label> </td>
                            <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>$<?php
                                  echo number_format($row['car_daily_price'],2);
                                ?></label>
                            </td>

                            <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label><?php
                                if($row['car_discount'] !="" || $row['car_discount']=="0"){
                                    $car_dis=$row['car_discount'];
                                }
                                else {
                                    $car_dis=0;
                                }
                                 echo number_format($car_dis,2);
                                    
                                 ?>%</label>
                                </td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                
                                <label><?php
                                if($row['car_vat'] !="" || $row['car_vat']=="0"){
                                    $car_vat=$row['car_vat'];
                                }
                                else {
                                    $car_vat=0;
                                }
                                 echo number_format($car_vat,2);
                                    
                                 ?>%</label></td>
                            <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>$<?php 
                                
                                 echo number_format($total_car_price_daily=$row['car_amount_daily'],2);
                                

                                 
                                ?></label>
                            </td>

                        </tr>
                        <?php
                        $extraday_car="";
                        $price_item_car_extra=0;
                        $extraday_car=$row['car_extra_day'];
                                        if($extraday_car>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000"><label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:10%;border:1px solid #000000"><label><?php echo $extraday_car; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:10%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right: 3px;width:10%;border:1px solid #000000"><label>$<?php  echo number_format($row['car_extra_price'],2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right: 3px;width:10%;border:1px solid #000000"><label><?php echo number_format($row['car_discount'],2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right: 3px;width:10%;border:1px solid #000000"><label><?php echo number_format($row['car_vat'],2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right: 3px;width:48%;border:1px solid #000000"><label>$<?php 
                             
                                          echo number_format($row['car_mount_extra'],2);
                                           $price_item_car_extra=number_format($row['car_mount_extra']);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>


                    <?php 
                    $total_car +=$total_car_price_daily+$price_item_car_extra;
                  }} ?>

                      <?php
                      $sql ="SELECT * FROM tbl_quotation_acc  
                                INNER JOIN tbl_accessories_rental
                                ON tbl_quotation_acc.acc_id=tbl_accessories_rental.ac_id
                      WHERE tbl_quotation_acc.q_id='$id'";
                     
                       $result = $connect->query($sql);
                       $total_acc=0;
                       $price_item_accessory_extra =0;
                       $price_item_accessory_daily=0;
                       $price_item_accessory_extra =0;
                       if ($result->num_rows > 0) {     
                          while($row_acc = $result->fetch_assoc()){
                      ?>

                        <tr style="height:25px;border:1px!important">
                            <td align="center" style="color:blue;padding-left:8px;width:5%;border:1px solid #000000;">
                               <?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label><?php echo $row_acc['ac_title']; ?></label>
                            </td>
                            <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $row_acc['acc_daily_day']; ?> Day(s)</label></td>
                            <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                            <td align="right" style="color:blue;padding-right: 3px;width:2%;border:1px solid #000000">
                               <label> $<?php echo number_format($row_acc['acc_daily_price'],2); ?></label> </td>

                            <td align="right" style="color:blue;padding-right: 3px;width:2%;border:1px solid #000000">
                              <label><?php echo number_format($row_acc['acc_discount'],2); ?>%</label></td>
                            <td align="right" style="color:blue;padding-right: 3px;width:2%;border:1px solid #000000">
                              <label><?php echo number_format($row_acc['acc_vat'],2); ?>%</label></td>
                            <td align="right" style="color:blue;padding-right: 3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>$<?php
                                      
                                      echo number_format($row_acc['acc_amount_daily'],2);
                                      $price_item_accessory_daily=number_format($row_acc['acc_amount_daily'],2);

                                ?> </label>
                              </td>

                        </tr>
                         <?php
                         $extraday_acc="";
                         $extraday_acc=0;

                         $extraday_acc=$row_acc['acc_extra_day'];
                                        if($extraday_acc>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="color:blue;padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000"><label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:8%;border:1px solid #000000"><label><?php echo $extraday_acc; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:5%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php  echo number_format($row_acc['acc_extra_price'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                           <label> <?php echo number_format($row_acc['acc_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_acc['acc_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php
                                         
                                          
                                      echo number_format($row_acc['acc_mount_extra'],2);
                                      $price_item_accessory_extra =number_format($row_acc['acc_mount_extra'],2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

                <?php 
                $total_acc +=$price_item_accessory_daily+$price_item_accessory_extra;
              }} ?>

                  <?php
                      $sql ="SELECT * FROM tbl_users  
                                LEFT JOIN tbl_quotation_driver
                                ON tbl_quotation_driver.dr_rent_id=tbl_users.user_id
                      WHERE q_id='$id'";

                        $total_dr=0;
                       $total_price_ex_dr_item  = 0;
                       $total_extraday_tr_item =0;
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {
                          while($row_dr = $result->fetch_assoc()){
                      ?>
                     

                        <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                              <?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                             <label> Driver Rental (<?php echo $row_dr['user_first_name']; ?> / <?php echo $row_dr['user_last_name']; ?>)</label></td>
                            <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                              <label><?php echo $row_dr['dr_daily_day']; ?> Day(s)</label>
                            </td>
                            <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                            <td align="right" style="color:blue;padding-right: 3px;width:2%;border:1px solid #000000">
                              <label>$<?php echo number_format($row_dr['dr_price_daily'],2); ?></label>
                            </td>

                            <td align="right" style="color:blue;padding-right: 3px;width:2%;border:1px solid #000000">
                              <label><?php echo number_format($row_dr['dr_discount'],2); ?>%</label></td>
                            <td align="right" style="color:blue;padding-right: 3px;width:2%;border:1px solid #000000">
                              <label><?php echo number_format($row_dr['dr_vat'],2); ?>%</label></td>

                            <td align="right" style="color:blue;background:#ffffff;padding-right: 3px;border:1px solid #000000;" nowrap="">

                             <label>$<?php
                           
                            $total_price_dr_item=$row_dr['dr_amount_daily'];
                            echo number_format($total_price_dr_item,2);
                            ?></label>
                            </td>
                        </tr>

                          <?php
                         $total_extraday="";
                         $total_extraday=0;
                         $total_extraday=$row_dr['dr_extra_day'];
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000"><label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:8%;border:1px solid #000000"><label><?php echo $total_extraday; ?> Day(s)</label></td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php  echo number_format($row_dr['dr_price_extra'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_dr['dr_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_dr['dr_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right: 3px;text-align:right;width:8%;padding-left:8px;border:1px solid #000000">
                                            <label>$<?php
                                            
                                                 $total_price_ex_dr_item=$row_dr['dr_amount_extra'];
                                          echo number_format($total_price_ex_dr_item, 2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                   <?php
                                    $total_holiday="";
                                    $total_holiday=0;
                                    $total_holiday=$row_dr['dr_holiday_day'];
                                        if($total_holiday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000"><label>&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</label></td>
                                          <td align="center" style="color:blue;width:8%;border:1px solid #000000"><label><?php echo $total_holiday; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:5%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php  echo number_format($row_dr['dr_price_holiday'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_dr['dr_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_dr['dr_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php
                                           
                                             $total_holiday_dr_item=$row_dr['dr_amount_holiday'];
                                         
                                          echo number_format($total_holiday_dr_item, 2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

            <?php
            $total_dr +=$total_price_dr_item+$total_price_ex_dr_item+$total_holiday_dr_item;
                  }
               }
            ?>
                         <?php
                      $sql ="SELECT * FROM tbl_users  
                                LEFT JOIN tbl_quotation_tour
                                ON tbl_quotation_tour.tr_rent_id=tbl_users.user_id
                      WHERE q_id='$id'";

                       $total_tr=0;
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {     
                          while($row_tr = $result->fetch_assoc()){
                      ?>

                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000"><label>Tour Guide Rental (<?php echo $row_tr['user_first_name']; ?> / <?php echo $row_tr['user_last_name']; ?>)</label></td>
                                          <td align="center" style="color:blue;width:8%;border:1px solid #000000"><label><?php echo $row_tr['tr_daily_day']; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:5%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php  echo number_format($row_tr['tr_price_daily'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_tr['tr_discount'], 2); ?>%</label></td>
                                          <td align="center" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_tr['tr_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;background:#ffffff;border:1px solid #000000;" nowrap="">
                                            <label>$<?php
                                           
                                            $total_tr_price_item=$row_tr['tr_amount_daily'];
                                         
                                          echo number_format($total_tr_price_item, 2);
                                       
                                          ?></label></td>
                                      </tr>

                             <?php
                             $total_extraday_tr="";
                             $total_extraday_tr=0;
                             $total_extraday_tr=$row_tr['tr_extra_day'];
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:0.4px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000"><label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:8%;border:1px solid #000000"><label><?php echo $total_extraday_tr; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:5%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php  echo number_format($row_tr['tr_price_extra'], 2); ?></label>
                                          </td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_tr['tr_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_tr['tr_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php
                                      $total_extraday_tr_item=$row_tr['tr_amount_extra'];
                                         
                                          echo number_format($total_extraday_tr_item, 2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

                                   <?php
                                  $total_holiday_tr="";
                                  $total_holiday_tr=0;
                                  $total_holiday_tr=$row_tr['tr_holiday_day'];
                                        if($total_holiday_tr>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000"><label>&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</label></td>
                                          <td align="center" style="color:blue;width:8%;border:1px solid #000000"><label><?php echo $total_holiday_tr; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:5%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php  echo number_format($row_tr['tr_price_holiday'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_tr['tr_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label><?php echo number_format($row_tr['tr_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:8%;border:1px solid #000000">
                                            <label>$<?php
                                     
                                            $total_holiday_tr_a_item=$row_tr['tr_amount_holiday'];
                                          echo number_format($total_holiday_tr_a_item, 2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>






                      <?php
                      $total_tr +=$total_tr_price_item+$total_extraday_tr_item+$total_holiday_tr_a_item;

                           }
                        }
                      ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;1. Total Rental Fee:</td>
                            <td align="right" style="padding-right:3px;color:blue;background:#ffffff;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>$<?php $total_rental=$total_car+$total_acc+$total_dr+$total_tr;
                              echo number_format($total_rental,2);
                               ?> </label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" rowspan="5" style="font-size:10px;">
                                <b style="color:#7030A0">NOTICES:</b>
                                <br>
                                <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b>
                                <br>
                                <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b>
                                <br>
                                <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>

                            </td>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;2. Service Charge (3%):</td>
                            <td align="right" style="padding-right:3px;color:blue;border:1px solid #000000;;" nowrap=""><label>&nbsp;$<?php $total_service_char=($total_rental *3)/100; echo number_format($total_service_char ,2); ?></label></td>
                        </tr>
                        <tr>

                            <td align="Left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;3. Amount Paid :</td>
                            <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>$<?php $amount_pad=$total_service_char+$total_rental; echo number_format($amount_pad,2); ?></label></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;4. LD Assistance<span style="color:red;">*</span>:</td>
                            <td align="right" style="padding-right:3px;color:blue;border:1px solid #000000;" nowrap=""><label>&nbsp;$<?php echo number_format($ld_assistant,2); ?></label></td>
                        </tr>

                        <tr>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;5. Refundable Deposit (RD):</td>
                            <td align="right" style="padding-right:3px;color:blue;border:1px solid #000000;" nowrap=""><label>&nbsp;$<?php echo number_format($refund_deposit,2); ?></label></td>
                        </tr>

                        <tr>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;6. Due Amount <span style="color:red;">**</span>:</td>
                            <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap=""><label>&nbsp;$<?php echo number_format($ld_assistant+$refund_deposit,2); ?></label></td>
                        </tr>
                          <input type="hidden" id="grand_total" value="$<?php echo number_format($ld_assistant+$refund_deposit+$amount_pad,2); ?>">
                    </tbody>
                </table>
            </div>

            <!-- <div class="row">
                <div class="col-xs-6">
                    <span class="fo" style=" color: #ccc;margin-top:10px;float:left; margin-left: 60px;"><label style="color:black;float:left;">Date:</label>______/______/______</span>
                    
                    <br>
                    <label style="float:left;margin-left: 75px; font-size: 14px;">Customer's Signature</label>

                </div>
                <div class="col-xs-6">
                  <label style=" color:black;margin-top:10px;float:right;">Date: <span class="fo" style="color: #ccc;float:right;">______/______/______</span></label>
                   
                    

                    <label class="fo" style="float:right;clear: both;margin-top:10px; color: #ccc;">_____________________________<br><span style="float:right; margin-right: 30px; color: black;">Prepared By</span></label>

                    

                </div>
            </div>

            <div class="row" style="margin-top:10px;">
                <div class="col-xs-6">
                    <span class="fo" style="margin-top:10px;float:left; color: #ccc; margin-left: 60px;">_____________________________<br><label style="float:right;color: black; margin-right: 58px;">Name</label></span>
                    
                    <label class="fo" style="float:left;margin-top:10px; color: #ccc; margin-left: 60px;">_____________________________<br><span style="color:black;float:right;color: black; margin-right: 63px;">Title</span></label>
                    

                </div>
                <div class="col-xs-6">
                    <span class="fo" style="margin-top:25px;float:right; color: #ccc;">_____________________________<br><label style="float:right;color:black; margin-right: 40px;">Approved By</label></span>
                    
                    <br>

                    <label class="fo" style="float:right;clear: both;margin-top:28px;color:#ccc; margin-left: 60px;">_____________________________<br>
                    <span style="float:right;color: black; margin-right: 63px;">Title</span></label>
                    

                </div>
            </div> -->

           <div class="row" style="padding: 0;">
                <div class="col-xs-4" style="padding: 0;">
                    <span class="fo" style=" color: #ccc;margin-top:10px;float:left; margin-left: 60px;"><label style="color:black;float:left;font-size: 12px;">Date:</label>______/______/______</span>
                    
                    <br>
                    <label style="float:left;margin-left: 65px; font-size: 12px;">Customer's Signature</label>

                    <label class="fo" style="float:left;clear: both;margin-top:39px; color: #ccc; margin-left: 60px;text-align: center;">_________________________<br><?php echo $sign_renter; ?></label>
                </div>
                <div class="col-xs-4" style="padding: 0;">
                    <span class="fo" style=" color: #ccc;margin-top:10px;float:left; margin-left: 60px;"><label style="color:black;float:left;font-size: 12px;">Date:</label>______/______/______</span>
                    
                    <br>
                    <label style="float:left;margin-left: 95px; font-size: 12px;">Prepare By:</label>

                    <label class="fo" style="float:left;clear: both;margin-top:39px; color: #ccc; margin-left: 60px;text-align: center;">_________________________<br><?php echo $sign_prepare; ?></label>

                </div>
                <div class="col-xs-4" style="padding: 0;">
                    <span class="fo" style=" color: #ccc;margin-top:10px;float:left; margin-left: 60px;"><label style="color:black;float:left;font-size: 12px;">Date:</label>______/______/______</span>
                    
                    <br>
                    <label style="float:left;margin-left: 95px; font-size: 12px;">Approved By:</label>

                    <label class="fo" style="float:left;clear: both;margin-top:39px; color: #ccc; margin-left: 60px;text-align: center;">_________________________<br><?php echo $sign_owner; ?></label>
                </div>
            </div>

        </div>

    </div>

    <style type="text/css">

      @media print
      {
        table tr th label, ul li label, table tr td label, .panel-heading span label{
          color:blue !important;
        }
        div fieldset legend span {
          color:#25306c !important;
        }
        div div .fo{
          color:#ccc !important;
        }
      }
        body {
            background: #fff;
        }
        b, optgroup, strong {
    font-weight:200;
    font-size: 12px;
}
    </style>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js" ></script>
<script type="text/javascript">
    $(document).ready(function(){
      
     
//Get
var bla = $('#grand_total').val();

//Set
 $('#gr_total').html(bla);
       
    })
</script>
    <?php include_once '../layout/footer.php' ?>