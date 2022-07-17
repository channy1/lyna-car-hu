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
                <div class="col-xs-6">

                    <div class="">
                        <table style="width:100%">
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Grand Total:
                                    <label >&nbsp;&nbsp;$<span id="gr_total"></span></label>
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
                                    <label >&nbsp;&nbsp;<?php echo $row['user_coupon_code']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Intro.ID N&deg;:
                                    <label >&nbsp;&nbsp;<?php echo $row['user_introducer_id']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Q/I Ref. N&deg;:
                                    <label >&nbsp;&nbsp;<?php echo $row['transactionId']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Valid Date:
                                    <label >&nbsp;&nbsp;<?php
                                      $book_date=$row['book_date'];
                                      echo date('Y-m-d', strtotime("+1 months", strtotime($book_date))); ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">VAT N&deg;:
                                    <label >
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">E</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">0</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">0</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">2</div>
  <div style="width: 13px; border: 0px solid black;display:inline-block;text-align: center;">&#8331;</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">1</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">5</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">0</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">0</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">0</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">3</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">7</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">7</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">5</div>
  <div style="width: 16px; border: 1px solid black;display:inline-block;text-align: center;">3</div>
</label>
                                </th>
                            </tr>
                      <?php  }} ?>
                        </table>

                    </div>

                </div>
                <div class="col-xs-6">

                    <fieldset style="border: 1px solid #a4509f;">
                        <legend style="border-bottom:none;margin-bottom:10px; background:none; text-align: center; margin-left: 50px; width:300px; color: #a4509f;">
                            <div style="width:150px;float:left;">
                                <div style="margin-left: 6px;width: 20px;height: 20px;background: #fff;float: left;margin-top: 4px;border: 1px solid black;">
                                 <input style="width: 22px;height: 17px;" type="checkbox"  checked>
                                </div>
                                <span style="font-size:17px;width:124px;float: left;margin-top: 3px;">QUOTATION</span>
                            </div>

                            <div style="width:150px;float:right;">
                                <div style="width:20px;height:20px;background:#fff;float:left;margin-top: 4px;border: 1px solid black;">
                                    <span style="font-size:17px;width:163px;float: left;margin-top:-2px;">INVOICE TO</span>

                                </div>
                            </div>

                        </legend>
                        <ul>
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
                            <?php echo $ms_mr; ?> <?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?>
                          </li>
                          <li style="list-style: none;">
                            <?php echo $row['user_title']; ?>
                          </li>
                           <li style="list-style: none;">
                            <?php echo $row['user_origination']; ?>
                          </li>
                          <li style="list-style: none;">
                            <?php echo $row['user_address']; ?>
                          </li>
                           <li style="list-style: none;">
                            Tel: <?php echo $row['user_phone_number']; ?>
                          </li>
                           <li style="list-style: none;">
                            Email: <?php echo $row['user_email']; ?>
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
                    <span>Rickshaw Rental Service</span>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
                    <tbody>
                        <tr>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="5%" class="aa text-center">No</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="45%" class="aa text-center">Items Description</th>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="10%" class="aa text-center">Period QTY</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="2%" class="aa text-center">QTY</th>
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
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
                                            <?php echo $row_pl['pl_title']; ?>
                                          </td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo $row_pl['total_day']; ?> Day(s)
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000">$<?php  echo number_format($row_pl['pro_price'], 2); ?></td>
                                          
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000"><?= number_format(0, 2);?>%</td>
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000"><?= number_format(0, 2);?>%</td>
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000">
                                            $<?php
                                              $total_price_pl=($row_pl['pro_price']) * $row_pl['total_day'];
                                              $plce_total_discount=($total_price_pl)-($total_price_pl * 0)/100;
                                              $total_place_vat=$plce_total_discount+($plce_total_discount * 0)/100;
                                         
                                          echo number_format($total_place_vat, 2);
                                       
                                          ?></td>
                                      </tr>
                     <?php
                         }
                        } 
                     ?>

                     <tr style="height:25px;border:1px!important;color:#810EA5;background: #ccc;">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"></td>
                                          <td align="right" style="padding-right:8px;width:48%;border:1px solid #000000;font-weight: 900;">
                                            Sub-Total:
                                          </td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                           
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000"></td>
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000;font-weight: 900;">$<?php  echo number_format($sub_pirce,2); ?></td>
                                          
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000;font-weight: 900;">
                                           
                                            <?php
                                              echo number_format($pro_discount,2);
                                            ?>%
                                          </td>
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000;font-weight: 900;"><?php echo number_format($pro_vat,2)?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000;font-weight: 900;">
                                            $<?php
                                         
                                          $plce_total_discount=($sub_pirce)-($sub_pirce * $pro_discount)/100;
                                           $total_place_vat=$plce_total_discount+($plce_total_discount * $pro_vat)/100;
                                          echo number_format($total_place_vat,2);
                                       
                                          ?></td>
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
                            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
                                <?php echo $row_car['ve_title']; ?>
                            </td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">
                                <?php echo $row_car['daily_day']; ?> Day(s) </td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">1</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                                $<?php
                                  echo number_format($row_car['price_daily'],2);
                                ?>
                            </td>

                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                                <?php
                                if($row_car['car_discount'] !="" || $row_car['car_discount']=="0"){
                                    $car_dis=$row_car['car_discount'];
                                }
                                else {
                                    $car_dis=0;
                                }
                                 echo number_format($car_dis,2);
                                    
                                 ?>%</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                                
                                <?php
                                if($row_car['car_vat'] !="" || $row_car['car_vat']=="0"){
                                    $car_vat=$row_car['car_vat'];
                                }
                                else {
                                    $car_vat=0;
                                }
                                 echo number_format($car_vat,2);
                                    
                                 ?>%</td>
                            <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">
                                $<?php 
                                 $price_day=$row_car['price_daily'] * $row_car['daily_day'];
                                 $car_ex_discount=($price_day)-($price_day * $row_car['car_discount'])/100;
                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row_car['car_vat'])/100;
                                                 
                                 $price_item_car_extra=$car_ex_vat;

                                 echo number_format($price_item_car_extra,2);
                                 $total_car_price_daily=$price_item_car_extra;
                                ?>
                            </td>

                        </tr>

                         <?php
                        $extraday_car="";
                        $extraday_car=$row_car['extra_day'];
                                        if($extraday_car>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $extraday_car; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000">1</td>
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000">$<?php  echo number_format($row_car['price_extra'],2); ?></td>
                                          
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo number_format($row_car['car_discount'],2); ?>%</td>
                                          <td align="right" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo number_format($row_car['car_vat'],2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:48%;border:1px solid #000000">$<?php 
                              $total_extra_price=$row_car['price_extra'] * $row_car['extra_day'];
                              $car_ex_discount=($total_extra_price)-($total_extra_price * $row_car['car_discount'])/100;
                                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row_car['car_vat'])/100;
                                                 
                                                 $price_item_car_extra=$car_ex_vat;
                                          echo number_format(  $price_item_car_extra,2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>

                     






                     <?php }} ?>
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
                            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
                                <?php echo $row['ve_title']; ?>
                            </td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">
                                <?php echo $row['total_day']; ?> Day(s) </td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">1</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                                $<?php
                                  echo number_format($row['price'],2);
                                ?>
                            </td>

                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                                <?php
                                if($row['car_discount'] !="" || $row['car_discount']=="0"){
                                    $car_dis=$row['car_discount'];
                                }
                                else {
                                    $car_dis=0;
                                }
                                 echo number_format($car_dis,2);
                                    
                                 ?>%</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                                
                                <?php
                                if($row['car_vat'] !="" || $row['car_vat']=="0"){
                                    $car_vat=$row['car_vat'];
                                }
                                else {
                                    $car_vat=0;
                                }
                                 echo number_format($car_vat,2);
                                    
                                 ?>%</td>
                            <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">
                                $<?php 
                                 $price_day=$row['price'] * $row['total_day'];
                                 $car_ex_discount=($price_day)-($price_day * $row['car_discount'])/100;
                                 $car_ex_vat=$car_ex_discount+($car_ex_discount * $row['car_vat'])/100;
                                                 
                                 $price_item_car_extra=$car_ex_vat;

                                 echo number_format($price_item_car_extra,2);
                                 $total_car_price_daily=$price_item_car_extra;
                                ?>
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
                            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
                              Tour Guide Rental (<?php echo $row_dr['user_first_name']; ?> / <?php echo $row_dr['user_last_name']; ?>)</td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">
                              <?php echo $row_dr['day_daily']; ?> Day(s)
                            </td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">1</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                              $<?php echo number_format($row_dr['price_daily'],2); ?>
                            </td>

                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                              <?php echo number_format($row_dr['b_discount'],2); ?>%</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                              <?php echo number_format($row_dr['b_vat'],2); ?>%</td>

                            <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">

                             $<?php
                            $total_price_dr=$row_dr['price_daily'] * $row_dr['day_daily'];
                            $daily_discount_dr=$total_price_dr-($total_price_dr * $row_dr['b_discount'])/100;
                            $daily_vat=$daily_discount_dr+($daily_discount_dr * $row_dr['b_vat'])/100;
                            $total_price_dr_item=$total_price_dr-$daily_discount_dr+$daily_vat;
                            echo number_format($total_price_dr_item,2);
                            ?>
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
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php  echo number_format($row_dr['price_extra'], 2); ?></td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_dr['b_discount'], 2); ?>%</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_dr['b_vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;width:8%;padding-left:8px;border:1px solid #000000">
                                            $<?php
                                            $total_price_ex_dr=$row_dr['price_extra'] *$row_dr['day_extra'];
                                        $ex_discount_dr=$total_price_ex_dr-($total_price_ex_dr * $row_dr['b_discount'])/100;
                                            $ex_vat_dr=$ex_discount_dr+($ex_discount_dr * $row_dr['b_vat'])/100;
                                                 $total_price_ex_dr_item=$total_price_ex_dr-$ex_discount_dr+$ex_vat_dr;
                                          echo number_format($total_price_ex_dr_item, 2);
                                       
                                          ?></td>
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
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_holiday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php  echo number_format($row_dr['price_holiday'], 2); ?></td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_dr['b_discount'], 2); ?>%</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_dr['b_vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php
                                            $total_holiday_dr=$row_dr['price_holiday'] * $row_dr['holiday_number'];
                                      $ho_discount_dr=$total_holiday_dr-($total_holiday_dr * $row_dr['b_discount'])/100;
                                             $ho_vat=$ho_discount_dr+($ho_discount_dr * $row_dr['b_vat'])/100;
                                             $total_holiday_dr_item=$total_holiday_dr-$ho_discount_dr+$ho_vat;
                                         
                                          echo number_format($total_holiday_dr_item, 2);
                                       
                                          ?></td>
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

                       $total_dr=0;
                       
                       $refund_deposit=0;
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {     
                          while($row_dr = $result->fetch_assoc()){
                            $refund_deposit=$row_dr['refund_deposit'];
                      ?>
                     

                        <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                              <?php echo $i++; ?></td>
                            <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
                             <?php echo $row_dr['ac_title']; ?> / <?php echo $row_dr['ac_ref_no']; ?></td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">
                              <?php echo $row_dr['day_daily']; ?> Day(s)
                            </td>
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000">1</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                              $<?php echo number_format($row_dr['price_daily'],2); ?>
                            </td>

                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                              <?php echo number_format($row_dr['acc_discount'],2); ?>%</td>
                            <td align="right" style="padding-left:8px;width:2%;border:1px solid #000000">
                              <?php echo number_format($row_dr['acc_vat'],2); ?>%</td>

                            <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">
                             $<?php
                            $total_price_dr=$row_dr['price_daily'] * $row_dr['day_daily'];
                          
                            $daily_discount_dr=$total_price_dr-($total_price_dr * $row_dr['acc_discount'])/100;
                            $daily_vat=$daily_discount_dr+($daily_discount_dr * $row_dr['acc_vat'])/100;
                            $total_price_dr_item=$daily_vat;
                            echo number_format($total_price_dr_item,2);
                            ?>
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
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php  echo number_format($row_dr['price_extra'], 2); ?></td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_dr['acc_discount'], 2); ?>%</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_dr['acc_vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;width:8%;padding-left:8px;border:1px solid #000000">
                                            $<?php
                                            $total_price_ex_dr=$row_dr['price_extra'] *$row_dr['day_extra'];
                                        $ex_discount_dr=$total_price_ex_dr-($total_price_ex_dr * $row_dr['acc_discount'])/100;
                                            $ex_vat_dr=$ex_discount_dr+($ex_discount_dr * $row_dr['acc_vat'])/100;
                                                 $total_price_ex_dr_item=$total_price_ex_dr-$ex_discount_dr+$ex_vat_dr;
                                          echo number_format($total_price_ex_dr_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                  

            <?php
            $total_dr +=$total_price_dr_item+$total_price_ex_dr_item;
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
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Tour Guide Rental (<?php echo $row_tr['user_first_name']; ?> / <?php echo $row_tr['user_last_name']; ?>)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $row_tr['day_daily']; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php  echo number_format($row_tr['price_daily'], 2); ?></td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_tr['t_discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_tr['t_vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;width:8%;background:#ffffff;border:1px solid #000000;" nowrap="">
                                            $<?php
                                            $total_tr_price=$row_tr['price_daily'] * $row_tr['day_daily'];
                                      $daily_discount_tr=$total_tr_price-($total_tr_price * $row_tr['t_discount'])/100;
                                            $daily_vat=$daily_discount_tr+($daily_discount_tr * $row_tr['t_vat'])/100;
                                            $total_tr_price_item=$total_tr_price-$daily_discount_tr+$daily_vat;
                                         
                                          echo number_format($total_tr_price_item, 2);
                                       
                                          ?></td>
                                      </tr>

                             <?php
                             $total_extraday_tr="";
                             $total_extraday_tr=0;
                             $total_extraday_tr=$row_tr['day_extra'];
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_extraday_tr; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php  echo number_format($row_tr['price_extra'], 2); ?>
                                          </td>
                                          
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_tr['t_discount'], 2); ?>%</td>
                                          <td align="center" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_tr['t_vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php
                                            $total_extraday_tr=$row_tr['price_extra'] * $row_tr['day_extra'];
                                      $ex_discount_tr=$total_extraday_tr-($total_extraday_tr * $row_tr['t_discount'])/100;
                                        $ex_vat_tr=$ex_discount_tr+($ex_discount_tr * $row_tr['t_vat'])/100;
                                      $total_extraday_tr_item=$total_extraday_tr-$ex_discount_tr+$ex_vat_tr;
                                         
                                          echo number_format($total_extraday_tr_item, 2);
                                       
                                          ?></td>
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
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo $total_holiday_tr; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php  echo number_format($row_tr['price_holiday'], 2); ?></td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_tr['t_discount'], 2); ?>%</td>
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            <?php echo number_format($row_tr['t_vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="text-align:right;padding-left:8px;width:8%;border:1px solid #000000">
                                            $<?php
                                      $total_holiday_tr_a=$row_tr['price_holiday'] * $row_tr['holiday_number'];
                                      $ho_discount_tr=$total_holiday_tr_a-($total_holiday_tr_a * $row_tr['t_discount'])/100;
                                            $ho_vat_tr=$ho_discount_tr+($ho_discount_tr * $row_tr['t_vat'])/100;
                                            $total_holiday_tr_a_item=$total_holiday_tr_a-$ho_discount_tr+$ho_vat_tr;
                                          echo number_format($total_holiday_tr_a_item, 2);
                                       
                                          ?></td>
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
                            <td align="right" style="background:#ffffff;border:1px solid #000000;" nowrap="">&nbsp;
                              $<?php $total_rental=$total_dr;
                              echo number_format($total_rental,2);
                               ?> 
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
                            <td align="right" style="border:1px solid #000000;;" nowrap="">&nbsp;$<?php $total_service_char=($total_rental *3)/100; echo number_format($total_service_char ,2); ?></td>
                        </tr>
                        <tr>

                            <td align="Left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;3. Amount Paid :</td>
                            <td align="right" style="background:white;border:1px solid #000000;color:#000000;" nowrap="">&nbsp;
                              $<?php $amount_pad=$total_service_char + $total_rental; echo number_format($total_service_char + $total_rental, 2); ?></td>
                        </tr>
                       

                        <tr>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;4. Refundable Deposit (RD):</td>
                            <td align="right" style="border:1px solid #000000;" nowrap="">&nbsp;$<?php echo number_format($refund_deposit,2); ?></td>
                        </tr>

                        <tr>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;5. Due Amount <span style="color:red;">**</span>:</td>
                            <td align="right" style="background:white;border:1px solid #000000;color:#000000;" nowrap="">&nbsp;$<?php echo number_format($refund_deposit,2); ?></td>
                        </tr>
                          <input type="hidden" id="grand_total" value="<?php echo number_format($refund_deposit+$amount_pad,2); ?>">
                    </tbody>
                </table>
            </div>

            <div class="row">
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
            </div>

        </div>

    </div>

    <style type="text/css">
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