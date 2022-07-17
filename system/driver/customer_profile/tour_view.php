<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
	


?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
   
    <div class="portlet-title">
       
       <table style="border-collapse:collapse;font-size: 12px; width:100% ;text-align: left; padding:5px; line-height: 14px;" cellpadding="5 ">
                                                <tbody><tr style="line-height: 17px;"><td colspan="4" style="border-bottom:1px solid #ccc;text-align: left;background-color: #7030A0;color:rgb(254, 250, 250);"><strong>&nbsp;Booking Info</strong></td>
                                                </tr>
                                                <?php 
                                                   $customer_id=@$_SESSION["user"]->user_id;
                                                   $id=@$connect->real_escape_string($_GET['id']);
                                                  $v_sql = "SELECT * FROM tbl_book_tour where user_book_id='$customer_id' AND book_tour_id='$id' ";
                                                  $result = $connect->query($v_sql);
                                                  if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                    $ld=$row['ld_assistant'];
                                                    $deposit_rent=$row['refund_deposit'];
                                                    $total_day=$row['total_day'];
                                                  ?>
                                                <tr>
                                                    <td style="width:18%">&nbsp;For :</td>
                                                    <td><?php echo @$_SESSION["user"]->user_name; ?></td>

                                                    <td style="width:18%">&nbsp;Total Day(s) :</td>
                                                    <td> 
                                                      <?php echo $row['total_day']; ?>
                                                    </td>


                                                </tr>

                                                <tr>
                                                    <td style="width:18%">&nbsp;Pickup Date Time : </td>
                                                    <td>
                                                      <?php 
                                  echo $row['pickup_date']; ?> <?php echo $row['pickup_h']; ?>:<?php echo $row['pickup_min']; 
                                                      ?>
                                                    </td> 
                                                   
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Return Date Time </td>
                                                    <td>
                                                      <?php 
                                  echo $row['return_date']; ?> <?php echo $row['return_h']; ?>:<?php echo $row['return_min']; 
                                                      ?>
                                                    </td>
                                                    
                                                    <td>Province / City</td>
                                                    <td>
                                                    <?php 
                                                    $id=@$connect->real_escape_string($_GET['id']);
                                                    $v_sql = "SELECT * FROM tbl_book_province 
                                        INNER JOIN tbl_province_detail ON tbl_book_province.province_id = tbl_province_detail.pl_id
                                        INNER JOIN tbl_province ON tbl_province_detail.pl_pro_id = tbl_province.pv_id
                                                    where  book_tour_id='$id' ";

                                                    $result = $connect->query($v_sql);
                                                  if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                    
                                                   ?>
                                                    <?php echo $row['pv_title']; ?>=><?php echo $row['pl_title']; ?><br>
                                                  <?php }} ?>
                                                  </td>
                                                </tr>
                                                <tr></tr>
                                          <?php  }} ?>
                                            </tbody></table>


                         <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
                                 <tbody><tr><td colspan="8" style="border-bottom:1px solid #ccc;text-align: left;background-color:  #7030A0;color:rgb(254, 250, 250);"><strong style="font-size:14px;">&nbsp;Item Information</strong></td></tr>
                                  <tr>
                                    
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="5%" class="aa text-center">No</th>
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="45%" class="aa text-center">Items Description</th> 

                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="10%" class="aa text-center">Period QTY</th>
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="2%" class="aa text-center">QTY</th> 
                                     <th style="background-color:#7030A0;color:white" colspan="4" width="35%" class="aa text-center">Price In US$</th>
                                  </tr>
                                  <tr style="text-align: center">
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="7%">Price</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="7%">Discount</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="7%">VAT</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="14%" nowrap="nowrap">Amount</th>
                                  </tr>
                                   <?php 
                                                     
                                                  $v_sql = "SELECT * FROM tbl_book_car 
                 INNER JOIN tbl_book_tour ON tbl_book_car.book_tour_for_id=tbl_book_tour.book_tour_id 
                 INNER JOIN tbl_vehicle_rantal ON tbl_book_car.car_id=tbl_vehicle_rantal.ve_id 
                 where book_tour_for_id='$id' ";

                                                  $result = $connect->query($v_sql);
                                                  $i=1;
                                                  $amount_car = 0;
                                                  if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                  $total_car=$row['car_amount'];
                                                  $amount_car +=$total_car;
                                                  ?>
                                  <tr>
                                          <td class="aa text-center"><?php echo $i++; ?></td>
                                          <td class="aa" style="text-align: left; !important;"><?php echo $row['ve_title']; ?></td>
                                          <td class="aa" style="text-align: center; !important;">
                                              <?php echo $row['total_day']; ?> Day(s)
                                           </td>
                                          <td class="aa" style="text-align: center; !important;padding-right: 10px">&nbsp; 1</td>
                                          <td class="aa" align="right" style="padding-right: 10px">
                                              $ <?php echo $row['car_price_order']; ?>                                         
                                          </td>
                                           
                                  <td class="aa" align="right" style="padding-right: 10px"><?php echo $row['car_discount']; ?>%</td>
                                  <td class="aa" align="right" style="padding-right: 10px"><?php echo $row['car_vat']; ?> %</td>
                                          <td class="aa" align="right" style="padding-right: 10px">
                                             $  <?php echo $row['car_amount']; ?>                                          
                                          </td>

                                  </tr>
                                  <?php }} ?>
                           
                                              <?php  
                                $v_sql = "SELECT * FROM tbl_book_drive 
                                INNER JOIN tbl_users ON tbl_book_drive.driver_id = tbl_users.user_id
                                where b_book_id='$id'";
                              

                                                  $result = $connect->query($v_sql);
                                                  $j=1;
                                                  $amount_drive = 0;
                                                  if ($result->num_rows > 0) {
                                                  while($row = $result->fetch_assoc()) {
                                                 $drive_price=$row['b_price'];
                                                 $dr_discount_rent=$row['b_discount'];
                                                 $dr_vat_rent=$row['b_vat'];
                                                 $total_befor_di_vat=$drive_price * $total_day;
                                                 $dr_discount=$total_befor_di_vat-($total_befor_di_vat * $row['b_discount'])/100;
                                                 $dr_vat=$dr_discount+($dr_discount * $row['b_vat'])/100;
                                                 $total_driver=$dr_vat;
                                                 $amount_drive +=$total_driver;
                                                  ?>
                                                                                                          
                                       <tr>                                                                                                     
                                         <td class="aa text-center"><?php echo $i-1+$j++; ?></td>
                                          <td class="aa" style="text-align: left; !important;">
                                            Chauffeur Rental (<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)
                                          </td>
                                          <td class="aa" style="text-align: center; !important;"><?php echo $total_day; ?> Day(s)</td>
                                          <td class="aa" style="text-align: center; !important;">1</td>
                                          <td class="aa" align="right" style="padding-right: 10px">$ <?php echo $row['b_price']; ?></td>
                                          
                                          <td class="aa" align="right" style="padding-right: 10px"><?php echo $row['b_discount']; ?>%</td>
                                          <td class="aa" align="right" style="padding-right: 10px"><?php echo $row['b_vat']; ?>%</td>
                                          
                                  <td class="aa" align="right" style="padding-right: 10px">$ <?php echo $row['dr_total_price']; ?></td>
                                      </tr>
                              <?php }} ?>       
                                                                    
                                      <tr><td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td class="aa" colspan="3">&nbsp;1.Total Rental Fee:</td>
                                      <td style="font-weight: 800;text-align: right;padding-right: 10px" class="aa">&nbsp;$ 
                                        <?php $total_rental=$amount_drive +$amount_car; echo $total_rental;?></td>
                                  </tr>
                                  <tr>
                                      <td colspan="4" rowspan="5" style="font-size:10px;">
                                        <b style="color:#7030A0">NOTICES:</b><br>
                                        <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b><br>
                                        <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b><br>
                                        <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>


                                    </td>
                                      <td class="aa" colspan="3">&nbsp;2.Service Charge (3%):</td>
                                      <td style="font-weight: 800;text-align: right;padding-right: 10px" class="aa">&nbsp;$ <?php $total_service_char=($total_rental *3)/100; echo $total_service_char; ?> </td>
                                  </tr>
                                  <tr>
                                      
                                      <td style="white-space: nowrap;" class="aa" colspan="3">&nbsp;3. Amount Paid :</td>
                                      <td style="font-weight: 800;text-align: right;background:#7030A0;color:white;padding-right: 10px" class="aa">&nbsp;$<?php echo $total_service_char + $total_rental; ?></td>
                                  </tr>
                                                                    <tr>
                                      <td class="aa" colspan="3">&nbsp;4. LD Assistance<span style="color:red;">*</span>:</td>
                                      <td style="font-weight: 800;text-align: right;padding-right: 10px" class="aa">&nbsp;$ 
                                        <?php echo  $ld; ?></td>
                                  </tr>
                                                                                                     <tr>
                                      <td class="aa" colspan="3">&nbsp;5. Refundable Deposit (RD):</td>
                                      <td style="font-weight: 800;text-align: right;padding-right: 10px" class="aa">&nbsp;$ 
                                       <?php echo  $deposit_rent; ?>
                                       </td>
                                  </tr>
                                                                    <tr>
                                      <td class="aa" colspan="3">&nbsp;6. Due Amount <span style="color:red;">**</span>:</td>
                                      <td style="font-weight: 800; text-align: right; background:#7030A0;color:white;padding-right: 10px" class="aa">&nbsp;$ <?php echo  $ld+$deposit_rent; ?></td>
                                  </tr>
                                  
                               </tbody></table>
       
    </div>
    <div class="portlet-body">
      
    </div>


</div>

</div>


<?php include_once '../layout/footer.php' ?>
