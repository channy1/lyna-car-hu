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
                                    <label id="gr_total"style="margin-left:5px;color:blue;font-weight:900;font-size:14px;"></label>
                                </th>
                            </tr>
                          <?php
                          $get_id=$_GET['id'];
                             $sql ="SELECT * FROM tbl_users  
                             INNER JOIN tbl_hotel_booking
                             ON tbl_hotel_booking.user_id=tbl_users.user_id
                             WHERE tbl_hotel_booking.ho_book_id='$get_id'";
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
                                    <label class="invoice" style="color:blue;">&nbsp;&nbsp;<?php echo $row['user_introducer_id']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Q/I Ref. N&deg;:
                                    <label class="invoice" style="color:blue;">&nbsp;&nbsp;<?php echo $row['transactionId']; ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">Valid Date:
                                    <label class="invoice" style="color:blue;">&nbsp;&nbsp;&nbsp;<?php
                                      $book_date=$row['book_date'];
                                      echo date('Y-m-d', strtotime("+1 months", strtotime($book_date))); ?></label>
                                </th>
                            </tr>
                            <tr>
                                <th style="padding:2px;font-weight: 100;">VAT N&deg;:
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
                        <legend style="border-bottom:none;margin-bottom:6px; background:none; text-align: left; margin-left: 20px; width:100px; color: #a4509f;">
                            
                                <!-- <div style="margin-left: 6px;width: 20px;height: 20px;background: #fff;float: left;margin-top: 4px;border: 1px solid black;">
                                 <input style="width: 22px;height: 17px;" type="checkbox"  checked>
                                </div> -->
                                <span class="qu" style="color:#25306c;font-size:14px;width:10px;float: left;margin-top: 0px; font-weight: bold;">QUOTATION:</span>                                                

                        </legend>
                        <ul style="line-height: 12px; margin-left: -20px;">
                          <?php
                             $get_id=$_GET['id'];
                             $sql ="SELECT * FROM tbl_users  
                             INNER JOIN tbl_hotel_booking
                             ON tbl_hotel_booking.user_id=tbl_users.user_id
                             WHERE tbl_hotel_booking.ho_book_id='$get_id'";
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
                          <li style="list-style: none;">
                            <label style="color:blue;"><?php echo $row['user_title']; ?></label>
                          </li>
                           <li style="list-style: none;">
                            <label style="color:blue;"><?php echo $row['user_origination']; ?></label>
                          </li>
                          <li style="list-style: none;">
                            <label style="color:blue;"><?php echo $row['user_address']; ?></label>
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
                    <span style="color: blue;"><label style="font-size: 15px; font-weight: bold;">Hotel & Guesthouse Service</label></span>
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
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="8%" class="aa text-center">QTY</th>
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
                      $sql ="SELECT * FROM tbl_hotel_booking 
                                LEFT JOIN tbl_hotel_book_items
                                ON tbl_hotel_booking.ho_book_id=tbl_hotel_book_items.booking_id
                                LEFT JOIN tbl_hotel
                                ON tbl_hotel.ht_id=tbl_hotel_book_items.hotel_id
                                LEFT JOIN tbl_province
                                ON tbl_province.pv_id=tbl_hotel_booking.province_id
                                WHERE tbl_hotel_booking.ho_book_id='$id'
                                ";

                       $total_dr=0;
                       $i=1;
                      
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0) {     
                          while($row = $result->fetch_assoc()){
                           
                      ?>
                     

                        <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                              <?php echo $i++; ?></td>
                            <td align="left" style="color:blue;padding-left:8px;width:48%;border:1px solid #000000">
                                <label>
                             Hotel Rental (<?php echo $row['ht_title']; ?>)</label></td>
                            <td align="center" style="color:blue;width:10%;border:1px solid #000000">
                                <label>
                              <?php echo $row['total_day']; ?> Day(s)</label>
                            </td>
                            <td align="center" style="color:blue;width:8%;border:1px solid #000000">
                                <label>
                              <?php echo $row['total_book_romm']; ?></label>
                            </td>
                            <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:10%;border:1px solid #000000">
                                            <label>
                              $<?php echo number_format($row['price'],2); ?></label>
                            </td>

                            <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:10%;border:1px solid #000000">
                                            <label>
                              <?php echo number_format($row['discount'],2); ?>%</label></td>
                            <td align="right" style="color:blue;text-align:right;padding-right: 3px;width:10%;border:1px solid #000000">
                                            <label>
                              <?php echo number_format($row['vat'],2); ?>%</label></td>

                            <td align="right" style="color:blue;padding-right: 3px;width:10%;border:1px solid #000000">
                                <label>$<?php
                            $total_price=$row['price'] * $row['total_day'] * $row['total_book_romm'];
                            $daily_discount=$total_price-($total_price * $row['discount'])/100;
                            $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                            $total_price_item=$daily_vat;
                            echo number_format($total_price_item,2);
                            ?></label>
                            </td>
                        </tr>

                      
            <?php
            $total_dr +=$total_price_item;
                  }
               }
            ?>
                           <td colspan="4" rowspan="3" style="font-size:9px;">
                                <b style="color:#7030A0">NOTICES:</b>
                                <br>
                                <b style="font-size:12px;">&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b>
                                <br>
                                <b style="font-size:12px;">&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b>
                                <br>
                                <b style="font-size:12px;"> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>

                            </td>
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;1. Total Rental Fee:</td>
                            <td align="right" style="padding-right:3px;color:blue;border:1px solid #000000;" nowrap=""><label>&nbsp;
                              $<?php $total_rental=$total_dr;
                              echo number_format($total_rental,2);
                               ?> </label>
                            </td>
                        </tr>
                        <tr>
                            
                            <td align="left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;2. Service Charge (3%):</td>
                            <td align="right" style="padding-right:3px;color:blue;border:1px solid #000000;" nowrap=""><label>&nbsp;$<?php $total_service_char=($total_rental *3)/100; echo number_format($total_service_char ,2); ?></label></td>
                        </tr>
                        <tr>

                            <td align="Left" colspan="3" style="border:1px solid #000000;" nowrap="">&nbsp;3. Amount Paid :</td>
                            <td align="right" style="padding-right:3px;color:blue;border:1px solid #000000;" nowrap=""><label>&nbsp;
                              $<?php $amount_pad=$total_service_char + $total_rental; echo number_format($total_service_char + $total_rental, 2); ?></label></td>
                        </tr>
                       

                       
                          <input type="hidden" id="grand_total" value="$<?php echo number_format($amount_pad,2); ?>">
                    </tbody>
                </table>
            </div>

            <!-- <div class="row">
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