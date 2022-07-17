<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    require_once 'php-mailjet-v3-simple.class.php';
    //include_once '../layout_control/left_navigation_admin.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
    table *{ white-space:nowrap; }
</style>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>Service Package Information</h2>
        </div>
    </div>
    <div class="portlet-title">
      
      
    </div>
    <div class="portlet-body">
       <div class="form-group ">
          <button class="btn btn-danger center-block"  style="background-color:#a4509f;">Position Package Information</button>
        </div>
        
        <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">View Information</caption>
                    <tbody><tr>
                        <th>No</th>
                        <th>Package Type</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Payment</th>
                       
                    </tr>
                    <?php
                     $id = @$connect->real_escape_string($_GET['id']);
                     $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where  p_id='$id'";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                              $text_description="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub+(10)/100;
                                $text_description=$row['description'];
                                $title_email=$row['title'];
                                $price_email=$row['price'];
                                $discount_email=$row['discount'];

                    ?>
                      <tr id="1">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?> Days</td>
                        <td><?php echo $row['period']; ?> Days
                        </td>
                        <td>$ <?php echo number_format($row['price'],2); ?></td>
                        <td>$ <?php echo number_format($row['discount'],2); ?></td>
                        <td>$ <?php echo number_format($total,2); ?></td>
                        <td><?php echo $row['post_limit']; ?></td>
                        <td>
                         <input type="button" class="btn-primary" id="checkout_button" value="ABA">
                        </td>
                      
                    </tr> 
                      <?php }}  ?>
                    <!-- aba start -->
                     <div id="aba_main_modal" class="aba-modal">
                <div class="aba-modal-content">
                    <?php
                        require_once 'PayWayApiCheckout.php';
                        $transactionId =date("Ymd").''.rand(10,1000000);
                        $amount =  $total;
                        $firstName =@$_SESSION["user"]->user_first_name;
                        $lastName =@$_SESSION["user"]->user_last_name;
                        $phone =@$_SESSION["user"]->user_phone_number;
                        $email =@$_SESSION["user"]->user_email;
                        $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'Lyna-CarRental/system/partner/package/view_info.php?id='.$_GET['id'].'&tranid='.$transactionId;
                    ?>

                    <form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getApiUrl(); ?>" id="aba_merchant_request">
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
                          $get_url_tran_id=$connect->real_escape_string(@$_GET['tranid']);
                          $_SESSION["term_check_pay"]=1;
                          if( ($get_url_tran_id !="") && ($_SESSION["term_check_pay"]) !="" ) {
                             if($result['status'] ==0){
                                    $package_id=@$_GET['id'];
                                    $user_buy_id=@$_SESSION["user"]->user_id;
                                    $today=date("Y-m-d");
                                    $today_buy = date("Y-m-d");
                                    $v_sql = "SELECT * FROM tbl_package_position WHERE  p_id='$package_id'";
                                    $result = $connect->query($v_sql);
                                    if ($result->num_rows > 0){
                                    if($row = $result->fetch_assoc()){
                                     $sum_date=365;
                                     }
                                   }
                                   else {
                                     $sum_date=365;
                                   }

                                    
                                    $expired_date=date('Y-m-d', strtotime($today_buy."+$sum_date".'days'));
                                    $query_add = "
                                    insert into tbl_buy_package (transaction_id,status,date_expired,package_id, user_buy_id,buy_date,position_id,try,period,price,discount,description,post_limit) 
                                        values
                                        ('$get_url_tran_id','2','$expired_date','$package_id','$user_buy_id','$today',
                                            (select position_id from tbl_package_position where p_id='$package_id'), 
                                            (select try from tbl_package_position where p_id='$package_id'), 
                                            (select period from tbl_package_position where p_id='$package_id'), 
                                            (select price from tbl_package_position where p_id='$package_id'),
                                            (select discount from tbl_package_position where p_id='$package_id'),
                                            (select description from tbl_package_position where p_id='$package_id'),
                                            (select post_limit from tbl_package_position where p_id='$package_id')
                                        )
                                        ";
                                            if($connect->query($query_add)){
                                              unset($_SESSION["term_check_pay"]);
                                               $htmlContent='<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%!important;font-family:Arial;font-size:12px">';

                                         $check_member_type="";
                                         $id=@$_SESSION['user']->user_id;
                                         $v_sql = "SELECT * FROM tbl_relationship_users_position WHERE user_id='$id'";
                                         $result = $connect->query($v_sql);
                                        if ($result->num_rows > 0){
                                         if($row = $result->fetch_assoc()){
                                         $check_member_type=$row['user_position_id'];
                                         }}

                                         $htmlContent.='<tbody>
                <tr>
                    <td>
                        <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial;font-size:12px">
                            <tbody>
                                <tr>
                                    <td>
                                        <table width="100%" align="center" style="background:#fbff00">
                                            <tbody>
                                                <tr align="center" style="height:12px;font-size:30px">
                                                    <td><span>លីណា-ជួលរថយន្តទេសចរណ៍</span></td>
                                                </tr>
                                                <tr align="center" style="height:12px;font-size:30px">
                                                    <td><span>Lyna-CarRental.Com</span></td>
                                                </tr>
                                                <tr align="center" style="height:12px;font-size:30px;background:#0c109e;border-top:2px solid #ffffff">
                                                    <td><span style="color:red"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="height:30px">
                                    <td>
                                        <hr>
                                    </td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                    <td>
                                        <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial;font-size:12px">
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">
                                                        <center>
                                                            <h2>RESERVATION INVOICE</h2></center>
                                                    </td>
                                                </tr>
                                                <tr border="1" style="background:#dfdfdf">
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
                                                </tr>

                                                <tr style="background:#dfdfdf">

                                                    <td width="5%"></td>
                                                    <td width="20%" align="left">Booking No.: </td>
                                                    <td width="30%" align="right" style="color:red"><b style="color:red">'.$get_url_tran_id.'</b></td>
                                                </tr>
                                                <tr>

                                                    <td></td>
                                                    <td width="20%" align="left">Booking Date: </td>

                                                    <td width="30%" align="right">'.$today.'</td>
                                                </tr>
                                                <tr height="30px" bgcolor="#ffffff" style="border-bottom:1px solid #000000">
                                                    <td colspan="5">
                                                        <hr>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr bgcolor="#ffffff">
                                    <td>
                                        <table style="width:100%;border-collapse:collapse;font-family:Arial;font-size:12px" border="0" align="center" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr style="background-color:#7030a0;color:white;height:40px;border:1px solid #000000;color:#ffffff">
                                                    <td align="center" style="border:1px solid #000000">No. </td>
                                                    <td align="center" style="border:1px solid #000000">Items Description</td>
                                                    <td align="center" style="border:1px solid #000000">System Package</td>
                                                    <td align="center" style="border:1px solid #000000">Type Package</td>
                                                    <td align="center" style="border:1px solid #000000">Price</td>
                                                    <td align="center" style="border:1px solid #000000">Discount</td>
                                                    <td align="center" style="border:1px solid #000000">Amount</td>
                                                </tr>
                                                <tr style="height:30px;border:1px solid #000000">
                                                    <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                                    <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
                                                 ';
                                                 
                                       $htmlContent.='Partner Type (';                      
                                  if($check_member_type=="5") {
                                   $htmlContent.='CAR OWNER';
                                  }
                                  elseif ($check_member_type=="6") {
                                   
                                    $htmlContent.="RICKSHAW'S OWNER";
                                  }
                                    elseif ($check_member_type=="9") {
                                    $htmlContent.='HOTEL & GUESTHOUSE';
                                  }
                                  elseif ($check_member_type=="4") {
                                    
                                     $htmlContent.='CITY TOUR';
                                  }
                                  elseif ($check_member_type=="11") {
                                    
                                     $htmlContent.='AIRPORT TRANSFER';
                                  }
                                   elseif ($check_member_type=="3") {
                                     $htmlContent.='PICKUP & DROP OFF';
                                   
                                  }
                                   elseif ($check_member_type=="7") {
                                    
                                    $htmlContent.='TOUR GUIDE';
                                  }
                                    elseif ($check_member_type=="8") {
                                   
                                    $htmlContent.='DRIVER';
                                  }
                                   elseif ($check_member_type=="10") {
                                   
                                    $htmlContent.='INDROUCER';
                                  }
                                  else {
                                    $htmlContent.='';
                                  }
                                
                                
                                $htmlContent.=')';
                                   

                                $htmlContent.=' </td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">'.$title_email.'</td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">ABA Bank</td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">$'.$price_email.'</td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">'.$discount_email.' %</td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">$ '.$total.'</td> </tbody>
                                        </table>
                                    </td>
                                    </tr>
                            </tbody>
                        </table>
                    </td>
                    </tr>
            </tbody>
</table>';
$to_Email_user=@$_SESSION["user"]->user_email;
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
         $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>'; 

        }
           
        else {
         $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> '.mysqli_error($connect).'...
                </div>';   
         
        }










                                               
                                            }else{
                                                $sms = '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <strong>Error!</strong> '.mysqli_error($connect).'...
                                                </div>';   
                                            }

                             }
                          }
                    ?>

                    </form>
                </div>
                
            </div>

        <link rel="stylesheet" href="https://payway-staging.ababank.com/checkout-popup.html?file=css"/>
        <script src="https://payway-staging.ababank.com/checkout-popup.html?file=js"></script>
        <script>
            $(document).ready(function () {
                $('#checkout_button').click(function () {
                    AbaPayway.checkout();
                });
            });
        </script>
        <!-- end aba -->

                  
                       
                </tbody></table>
               <?php echo $text_description; ?>
            </div>

       
          
    </div>
</div>

</div>

           
<style type="text/css">
.caption-basic {
    color: #FFF;
    padding-left: 10px;
    background-color: #a4509f;
    border-color: #BCE8F1;
    font-size: 12px;
}
</style>


<?php include_once '../layout/footer.php' ?>