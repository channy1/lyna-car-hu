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
                                    <label id="gr_total"style="margin-left:5px;color:blue;font-weight:900;font-size:14px;">&nbsp;&nbsp;></label>
                                </th>
                            </tr>
                          <?php
                          $get_id=$_GET['id'];
                             $sql ="SELECT * FROM tbl_users  
                             INNER JOIN tbl_book_info
                             ON tbl_book_info.user_book_id=tbl_users.user_id
                             WHERE book_info_id='$get_id'";
                             $result = $connect->query($sql);
                             if ($result->num_rows > 0) {     
                              while($row = $result->fetch_assoc()) {
                          ?>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Coupon N&deg;:
                                    <label class="invoice" style="color:blue;">&nbsp;&nbsp;<?php echo $row['user_coupon_code']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Intro.ID N&deg;:
                                    <label style="color:blue;">&nbsp;&nbsp;<?php echo $row['user_introducer_id']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Q/I Ref. N&deg;:
                                    <label style="color:blue;">&nbsp;&nbsp;<?php echo $row['transactionId']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Valid Date:
                                    <label style="color:blue; margin-left: 4px;">&nbsp;&nbsp;<?php
                                      $book_date=$row['book_date'];
                                      echo date('Y-m-d', strtotime("+1 months", strtotime($book_date))); ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">VAT N&deg;:
                                    <label >
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
                        <legend style="border-bottom:none;margin-bottom:10px; background:none; text-align: left; margin-left: 20px; width:100px; color: #a4509f;">
                            
                                <!-- <div style="margin-left: 6px;width: 20px;height: 20px;background: #fff;float: left;margin-top: 4px;border: 1px solid black;">
                                 <input style="width: 22px;height: 17px;" type="checkbox"  checked>
                                </div> -->
                                <span class="qu" style="color:#25306c;font-size:14px;width:10px;float: left;margin-top: 0px; font-weight: bold;">QUOTATION:</span>                                                

                        </legend>
                        <ul style="line-height: 12px; margin-left: -20px;">
                          <?php
                             $get_id=$_GET['id'];
                             $sql ="SELECT * FROM tbl_users  
                             INNER JOIN tbl_book_info
                             ON tbl_book_info.user_book_id=tbl_users.user_id
                             WHERE book_info_id='$get_id'";
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
                    <span style="color: blue;"><label style="font-size: 15px; font-weight: bold;">City Tour Rental Service</label></span>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
                    <tbody>
                        <tr>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="5%" class="aa text-center">No</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="48%" class="aa text-center">Items Description</th>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="10%" class="aa text-center">Period</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="5%" class="aa text-center">QTY</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" colspan="4" width="35%" class="aa text-center">Price In US$</th>
                        </tr>
                        <tr style="text-align: center">
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="10%">Price</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="10%">Discount</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="10%">VAT</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="10%" nowrap="nowrap">Amount</th>
                        </tr>
                      <?php
                      $id=$_GET['id'];
                      $sql ="SELECT * FROM tbl_book_info 
                                INNER JOIN tbl_users
                                ON tbl_book_info.user_book_id=tbl_users.user_id
                                LEFT JOIN tbl_book_province
                                ON tbl_book_info.book_info_id=tbl_book_province.book_info_id
                                LEFT JOIN tbl_province
                                ON tbl_province.pv_id=tbl_book_province.province_id
                                LEFT JOIN tbl_province_detail
                                ON tbl_book_province.province_id=tbl_province_detail.pl_id
                      WHERE tbl_book_info.book_info_id='$id'";
                       $result = $connect->query($sql);


                      $i=1;
                       $sub_pirce=0;
                       $pro_discount=0;
                       $pro_vat=0;

                      if ($result->num_rows > 0) {     
                          while($row_pl = $result->fetch_assoc()){
                            $pro_discount=$row_pl['pro_discount'];
                            $pro_vat=$row_pl['pro_vat'];
                            $price_pl_sub=$row_pl['pro_price']* $row_pl['total_day'];
                            $sub_pirce +=$price_pl_sub;
                      ?>

                                   <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>
                                            <?php echo $row_pl['pl_title']; ?></label>
                                          </td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label>
                                            <?php echo $row_pl['total_day']; ?> Day(s)</label>
                                          </td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>$<?php  echo number_format($row_pl['pro_price'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label><?= number_format(0, 2);?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label><?= number_format(0, 2);?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                            $<?php
                                              $total_price_pl=($row_pl['pro_price']) * $row_pl['total_day'];
                                              $plce_total_discount=($total_price_pl)-($total_price_pl * 0)/100;
                                              $total_place_vat=$plce_total_discount+($plce_total_discount * 0)/100;
                                         
                                          echo number_format($total_place_vat, 2);
                                       
                                          ?></label></td>
                                      </tr>
                     <?php
                         }
                        } 
                     ?>

                     <tr style="height:25px;border:1px!important;color:#810EA5;background: #ccc;">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"></td>
                                          <td align="right" style="padding-right:8px;width:48%;border:1px solid #000000;font-weight: 900;">
                                            <label>Sub-Total:</label>
                                          </td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                           
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000"></td>
                                          <td align="right" style="padding-right: 3px;width:10%;border:1px solid #000000;font-weight: 900;"><label> $<?php  echo number_format($sub_pirce,2); ?></label></td>
                                          
                                          <td align="right" style="padding-right: 3px;width:10%;border:1px solid #000000;font-weight: 900;"><label>
                                           
                                            <?php
                                              echo number_format($pro_discount,2);
                                            ?>%</label>
                                          </td>
                                          <td align="right" style="padding-right: 3px;width:10%;border:1px solid #000000;font-weight: 900;"><label><?php echo number_format($pro_vat,2)?>%</label></td>
                                          
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000;font-weight: 900;"><label>
                                            $<?php
                                         
                                          $plce_total_discount=($sub_pirce)-($sub_pirce * $pro_discount)/100;
                                           $total_place_vat=$plce_total_discount+($plce_total_discount * $pro_vat)/100;
                                          echo number_format($total_place_vat,2);
                                       
                                          ?></label></td>
                                      </tr>

                <?php
                  $id=$_GET['id'];
                      $sql ="SELECT * FROM tbl_book_info
                                                LEFT JOIN tbl_book_car
                                                ON tbl_book_info.book_info_id=tbl_book_car.book_infor_id
                                                INNER JOIN tbl_vehicle_rantal
                                                ON tbl_book_car.car_id=tbl_vehicle_rantal.ve_id
                                                WHERE tbl_book_car.book_infor_id='$id'";

                                $extraday_car="";
                                $check_price_pick=0;
                                $total_car=0;

                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {     
                          while($row_car = $result->fetch_assoc()){
                            $ld_assistant=$row_car['ld_assistant'];
                                 
                                  
                      ?>

                       <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label> <?php echo $row_car['ve_title']; ?></label>
                            </td>
                            <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $row_car['daily_day']; ?> Day(s)</label></td>
                            <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>$<?php
                                  echo number_format($row_car['price_daily'],2);
                                ?></label>
                            </td>

                            <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                                <?php
                                if($row_car['car_discount'] !="" || $row_car['car_discount']=="0"){
                                    $car_dis=$row_car['car_discount'];
                                }
                                else {
                                    $car_dis=0;
                                }
                                 echo number_format($car_dis,2);
                                    
                                 ?>%</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                <?php
                                if($row_car['car_vat'] !="" || $row_car['car_vat']=="0"){
                                    $car_vat=$row_car['car_vat'];
                                }
                                else {
                                    $car_vat=0;
                                }
                                 echo number_format($car_vat,2);
                                    
                                 ?>%</label></td>
                            <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                $<?php 
                                 $price_day=$row_car['price_daily'] * $row_car['daily_day'];
                                 $car_ex_discount=($price_day)-($price_day * $row_car['car_discount'])/100;
                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row_car['car_vat'])/100;
                                                 
                                 $price_item_car_extra=$car_ex_vat;

                                 echo number_format($price_item_car_extra,2);
                                 $total_car_price_daily=$price_item_car_extra;
                                ?></label>
                            </td>

                        </tr>

                         <?php
                        $extraday_car="";
                        $extraday_car=$row_car['extra_day'];
                                        if($extraday_car>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $extraday_car; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>$<?php  echo number_format($row_car['price_extra'],2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label><?php echo number_format($row_car['car_discount'],2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label><?php echo number_format($row_car['car_vat'],2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>$<?php 
                              $total_extra_price=$row_car['price_extra'] * $row_car['extra_day'];
                              $car_ex_discount=($total_extra_price)-($total_extra_price * $row_car['car_discount'])/100;
                                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row_car['car_vat'])/100;
                                                 
                                                 $price_item_car_extra=$car_ex_vat;
                                          echo number_format(  $price_item_car_extra,2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

                     






                     <?php 
                      $total_car +=$total_car_price_daily+$price_item_car_extra;
                   }} ?>
                 <?php
                             $id=$_GET['id'];
                             $query="SELECT * FROM tbl_book_info
                                                LEFT JOIN tbl_book_rickshaw
                                                ON tbl_book_info.book_info_id=tbl_book_rickshaw.book_infor_id
                                                INNER JOIN tbl_rick_shaw_rental_last
                                                ON tbl_rick_shaw_rental_last.ve_id=tbl_book_rickshaw.car_id
                                               
                                                WHERE tbl_book_rickshaw.book_infor_id='$id'
                                       
                                    ";
                                $result = $connect->query($query);
                               
                                $i=1;
                                $total_rich=0;
                                $refund_deposit=0;
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                $refund_deposit=$row['refund_deposit'];
                            ?>
                        <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>
                                <?php echo $row['ve_title']; ?></label>
                            </td>
                            <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $row['total_day']; ?> Day(s)</label></td>
                            <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                $<?php
                                  echo number_format($row['price'],2);
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
                                    
                                 ?>%</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                
                                <?php
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
                                 $price_day=$row['price'] * $row['total_day'];
                                 $car_ex_discount=($price_day)-($price_day * $row['car_discount'])/100;
                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row['car_vat'])/100;
                                                 
                                 $price_item_car_extra=$car_ex_vat;

                                 echo number_format($price_item_car_extra,2);
                                 $total_car_price_daily=$price_item_car_extra;
                                ?></label>
                            </td>

                        </tr>
                      
                          
                    <?php 
                    $total_rich +=$total_car_price_daily;
                  }} ?>

                  <?php
                      $sql ="SELECT * FROM tbl_users  
                                LEFT JOIN tbl_book_drive
                                ON tbl_book_drive.driver_id=tbl_users.user_id
                      WHERE b_book_id='$id'";

                       $total_dr=0;
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {     
                          while($row_dr = $result->fetch_assoc()){
                      ?>
                     

                        <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                              <?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>
                              Tour Guide Rental (<?php echo $row_dr['user_first_name']; ?> / <?php echo $row_dr['user_last_name']; ?>)</label></td>
                            <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $row_dr['day_daily']; ?> Day(s)</label>
                            </td>
                            <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                              $<?php echo number_format($row_dr['price_daily'],2); ?></label>
                            </td>

                            <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                              <?php echo number_format($row_dr['b_discount'],2); ?>%</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                              <?php echo number_format($row_dr['b_vat'],2); ?>%</label></td>

                            <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>

                             $<?php
                            $total_price_dr=$row_dr['price_daily'] * $row_dr['day_daily'];
                            $daily_discount_dr=$total_price_dr-($total_price_dr * $row_dr['b_discount'])/100;
                            $daily_vat=$daily_discount_dr+($daily_discount_dr * $row_dr['b_vat'])/100;
                            $total_price_dr_item=$total_price_dr-$daily_discount_dr+$daily_vat;
                            echo number_format($total_price_dr_item,2);
                            ?></label>
                            </td>
                        </tr>

                         <?php
                         $total_extraday="";
                         $total_extraday=0;
                         $total_extraday=$row_dr['day_extra'];
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $total_extraday; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            $<?php  echo number_format($row_dr['price_extra'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                                            <?php echo number_format($row_dr['b_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            <?php echo number_format($row_dr['b_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                            $<?php
                                            $total_price_ex_dr=$row_dr['price_extra'] *$row_dr['day_extra'];
                                        $ex_discount_dr=$total_price_ex_dr-($total_price_ex_dr * $row_dr['b_discount'])/100;
                                            $ex_vat_dr=$ex_discount_dr+($ex_discount_dr * $row_dr['b_vat'])/100;
                                                 $total_price_ex_dr_item=$total_price_ex_dr-$ex_discount_dr+$ex_vat_dr;
                                          echo number_format($total_price_ex_dr_item, 2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                    <?php
                                    $total_holiday="";
                                    $total_holiday=0;
                                    $total_holiday=$row_dr['holiday_number'];
                                        if($total_holiday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</label></td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $total_holiday; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            $<?php  echo number_format($row_dr['price_holiday'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                                            <?php echo number_format($row_dr['b_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            <?php echo number_format($row_dr['b_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                            $<?php
                                            $total_holiday_dr=$row_dr['price_holiday'] * $row_dr['holiday_number'];
                                      $ho_discount_dr=$total_holiday_dr-($total_holiday_dr * $row_dr['b_discount'])/100;
                                             $ho_vat=$ho_discount_dr+($ho_discount_dr * $row_dr['b_vat'])/100;
                                             $total_holiday_dr_item=$total_holiday_dr-$ho_discount_dr+$ho_vat;
                                         
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
                  $id=$_GET['id'];
                      $sql ="SELECT * FROM tbl_book_info 
                                INNER JOIN tbl_users
                                ON tbl_book_info.user_book_id=tbl_users.user_id
                                LEFT JOIN tbl_book_accessory
                                ON tbl_book_info.book_info_id=tbl_book_accessory.book_infor_id
                                LEFT JOIN tbl_accessories_rental
                                ON tbl_accessories_rental.ac_id=tbl_book_accessory.acc_id
                      WHERE tbl_book_accessory.book_infor_id='$id'";

                       $total_acc=0;
                       
                       $refund_deposit=0;
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {     
                          while($row_dr = $result->fetch_assoc()){
                            $refund_deposit=$row_dr['refund_deposit'];
                      ?>
                     

                        <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                              <?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>
                             <?php echo $row_dr['ac_title']; ?> / <?php echo $row_dr['ac_ref_no']; ?></label></td>
                            <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $row_dr['day_daily']; ?> Day(s)</label>
                            </td>
                            <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                              $<?php echo number_format($row_dr['price_daily'],2); ?></label>
                            </td>

                            <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                              <?php echo number_format($row_dr['acc_discount'],2); ?>%</label></td>
                            <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                              <?php echo number_format($row_dr['acc_vat'],2); ?>%</label></td>

                            <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                             $<?php
                            $total_price_dr=$row_dr['price_daily'] * $row_dr['day_daily'];
                          
                            $daily_discount_dr=$total_price_dr-($total_price_dr * $row_dr['acc_discount'])/100;
                            $daily_vat=$daily_discount_dr+($daily_discount_dr * $row_dr['acc_vat'])/100;
                            $total_price_dr_item=$daily_vat;
                            echo number_format($total_price_dr_item,2);
                            ?></label>
                            </td>
                        </tr>

                         <?php
                         $total_extraday="";
                         $total_extraday=0;
                         $total_extraday=$row_dr['day_extra'];
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $total_extraday; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                         <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            $<?php  echo number_format($row_dr['price_extra'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                                            <?php echo number_format($row_dr['acc_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            <?php echo number_format($row_dr['acc_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                            $<?php
                                            $total_price_ex_dr=$row_dr['price_extra'] *$row_dr['day_extra'];
                                        $ex_discount_dr=$total_price_ex_dr-($total_price_ex_dr * $row_dr['acc_discount'])/100;
                                            $ex_vat_dr=$ex_discount_dr+($ex_discount_dr * $row_dr['acc_vat'])/100;
                                                 $total_price_ex_dr_item=$total_price_ex_dr-$ex_discount_dr+$ex_vat_dr;
                                          echo number_format($total_price_ex_dr_item, 2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                  

            <?php
            $total_acc +=$total_price_dr_item+$total_price_ex_dr_item;
                  }
               }
            ?>
             <?php
                      $sql ="SELECT * FROM tbl_users  
                                LEFT JOIN tbl_book_tour_quide
                                ON tbl_book_tour_quide.t_id=tbl_users.user_id
                      WHERE t_book_id='$id'";

                       $total_tr=0;
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {     
                          while($row_tr = $result->fetch_assoc()){
                      ?>

                       <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>Tour Guide Rental (<?php echo $row_tr['user_first_name']; ?> / <?php echo $row_tr['user_last_name']; ?>)</label></td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $row_tr['day_daily']; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            $<?php  echo number_format($row_tr['price_daily'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                                            <?php echo number_format($row_tr['t_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            <?php echo number_format($row_tr['t_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                            $<?php
                                            $total_tr_price=$row_tr['price_daily'] * $row_tr['day_daily'];
                                      $daily_discount_tr=$total_tr_price-($total_tr_price * $row_tr['t_discount'])/100;
                                            $daily_vat=$daily_discount_tr+($daily_discount_tr * $row_tr['t_vat'])/100;
                                            $total_tr_price_item=$total_tr_price-$daily_discount_tr+$daily_vat;
                                         
                                          echo number_format($total_tr_price_item, 2);
                                       
                                          ?></label></td>
                                      </tr>

                             <?php
                             $total_extraday_tr="";
                             $total_extraday_tr=0;
                             $total_extraday_tr=$row_tr['day_extra'];
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>&nbsp;&nbsp;&#126;&nbsp;Extra Day</label></td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $total_extraday_tr; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            $<?php  echo number_format($row_tr['price_extra'], 2); ?></label>
                                          </td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                                            <?php echo number_format($row_tr['t_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            <?php echo number_format($row_tr['t_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                            $<?php
                                            $total_extraday_tr=$row_tr['price_extra'] * $row_tr['day_extra'];
                                      $ex_discount_tr=$total_extraday_tr-($total_extraday_tr * $row_tr['t_discount'])/100;
                                        $ex_vat_tr=$ex_discount_tr+($ex_discount_tr * $row_tr['t_vat'])/100;
                                      $total_extraday_tr_item=$total_extraday_tr-$ex_discount_tr+$ex_vat_tr;
                                         
                                          echo number_format($total_extraday_tr_item, 2);
                                       
                                          ?></label></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

                                  <?php
                                  $total_holiday_tr="";
                                  $total_holiday_tr=0;
                                  $total_holiday_tr=$row_tr['holiday_number'];
                                        if($total_holiday_tr>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</label></td>
                                          <td align="center" style="color:blue;width:2%;border:1px solid #000000">
                                <label><?php echo $total_holiday_tr; ?> Day(s)</label></td>
                                          <td align="center" style="color:blue;padding-left:8px;width:2%;border:1px solid #000000"><label>1</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            $<?php  echo number_format($row_tr['price_holiday'], 2); ?></label></td>
                                          
                                          <td align="right" style="color:blue;padding-right :3px;width:2%;border:1px solid #000000"><label>
                                            <?php echo number_format($row_tr['t_discount'], 2); ?>%</label></td>
                                          <td align="right" style="color:blue;padding-right:3px;width:2%;border:1px solid #000000">
                                <label>
                                            <?php echo number_format($row_tr['t_vat'], 2); ?>%</label></td>
                                          
                                          <td align="right" style="color:blue;padding-right:3px;background:#ffffff;border:1px solid #000000;" nowrap="">
                                <label>
                                            $<?php
                                      $total_holiday_tr_a=$row_tr['price_holiday'] * $row_tr['holiday_number'];
                                      $ho_discount_tr=$total_holiday_tr_a-($total_holiday_tr_a * $row_tr['t_discount'])/100;
                                            $ho_vat_tr=$ho_discount_tr+($ho_discount_tr * $row_tr['t_vat'])/100;
                                            $total_holiday_tr_a_item=$total_holiday_tr_a-$ho_discount_tr+$ho_vat_tr;
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
                      <td colspan="4" rowspan="6" style="font-size:9px;">
                                <b style="color:#7030A0">NOTICES:</b>
                                <br>
                                <b style="font-size:9px;">&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b>
                                <br>
                                <b style="font-size:9px;">&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b>
                                <br>
                                <b style="font-size:9px;"> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>

                            </td>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;1. Total Rental Fee:</td>
                            <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>&nbsp;
                              $<?php $total_rental=$total_place_vat+$total_car+$total_rich
                              +$total_dr+$total_tr+$total_acc;
                              echo number_format($total_rental,2);
                               ?> </label>
                            </td>
                        </tr>
                        <tr>
                          
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;2. Service Charge (3%):</td>
                            <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>&nbsp;$<?php $total_service_char=($total_rental *3)/100; echo number_format($total_service_char ,2); ?></label></td>
                        </tr>
                        <tr>

                            <td align="Left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;3. Amount Paid :</td>
                            <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>&nbsp;
                              $<?php $amount_pad=$total_service_char + $total_rental; echo number_format($total_service_char + $total_rental, 2); ?></label></td>
                        </tr>
                        <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;4. LD Assistance<span style="color:red;">*</span>:</td>
                                      <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>$<?php echo 
                                      number_format($ld_assistant, 2);  ?></label></td>
                                  </tr>
                       

                        <tr>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;5. Refundable Deposit (RD):</td>
                            <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>&nbsp;$<?php echo number_format($refund_deposit,2); ?></label></td>
                        </tr>

                        <tr>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;6. Due Amount <span style="color:red;">**</span>:</td>
                            <td align="right" style="padding-right:3px;color:blue;background:white;border:1px solid #000000;" nowrap="">&nbsp;
                              <label>&nbsp;$<?php echo number_format($refund_deposit+$ld_assistant,2); ?></label></td>
                        </tr>
                          <input type="hidden" id="grand_total" value="<?php echo number_format($refund_deposit+$amount_pad,2); ?>">
                    </tbody>
                </table>
            </div>

           <!--  <div class="row">
                <div class="col-xs-6">
                    <span style="margin-top:10px;float:right;font-weight:900;">---------------/-----------------/-----------------</span>
                    <label style="float:right;font-weight:600;">Date:</label>
                    <br>
                    <label style="float:right;font-weight:600;clear: both;margin-right: 8%;">Customer's Signature</label>

                </div>
                <div class="col-xs-6">
                    <span style="margin-top:10px;float:right;font-weight:900;">-------------------/----------------/------------------</span>
                    <label style="font-weight:600;float:right;">Date:</label>

                    <label style="float:right;font-weight:900;clear: both;margin-right: 8%;margin-top:10px;">-----------------------------------------------</label>
                    <span style="float:right;font-weight:600;">Prepared By:</span>

                </div>
            </div>

            <div class="row" style="margin-top:60px;">
                <div class="col-xs-6">
                    <span style="margin-top:10px;float:right;font-weight:900;">----------------------------------------------------</span>
                    <label style="float:right;font-weight:600;">Name:</label>
                    <label style="float:right;font-weight:900;clear: both;margin-top:10px;">----------------------------------------------------</label>
                    <span style="float:right;font-weight:600;">Title:</span>

                </div>
                <div class="col-xs-6">
                    <span style="margin-top:10px;float:right;font-weight:900;">-----------------------------------------------------</span>
                    <label style="font-weight:600;float:right;">Approved By:</label>
                    <br>

                    <label style="float:right;font-weight:900;clear: both;margin-top:10px;">-----------------------------------------------------</label>
                    <span style="float:right;font-weight:600;">Title:</span>

                </div>
            </div> -->


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

                    <label class="fo" style="float:left;clear: both;margin-top:39px; color: #ccc; margin-left: 60px;">_________________________<br></label>
                </div>
                <div class="col-xs-4" style="padding: 0;">
                    <span class="fo" style=" color: #ccc;margin-top:10px;float:left; margin-left: 60px;"><label style="color:black;float:left;font-size: 12px;">Date:</label>______/______/______</span>
                    
                    <br>
                    <label style="float:left;margin-left: 95px; font-size: 12px;">Prepare By:</label>

                    <label class="fo" style="float:left;clear: both;margin-top:39px; color: #ccc; margin-left: 60px;">_________________________<br></label>
                </div>
                <div class="col-xs-4" style="padding: 0;">
                    <span class="fo" style=" color: #ccc;margin-top:10px;float:left; margin-left: 60px;"><label style="color:black;float:left;font-size: 12px;">Date:</label>______/______/______</span>
                    
                    <br>
                    <label style="float:left;margin-left: 95px; font-size: 12px;">Approved By:</label>

                    <label class="fo" style="float:left;clear: both;margin-top:39px; color: #ccc; margin-left: 60px;">_________________________<br></label>
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