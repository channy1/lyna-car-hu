<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
?>
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
            <h2><i class="fa fa-user fa-fw"></i>History  Detail Information</h2>
        </div>
    </div>
    <div class="portlet-title">
      
      
    </div>
    <div class="portlet-body">
       <div class="form-group ">
          <button class="btn btn-danger center-block"  style="background-color:#a4509f;">History  Detail Information</button>
        </div>

              <div class="table-responsive">
                <table class="table table-bordered hidden">
                <caption class="caption-basic">History Information</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>System Package</th>
                        <th>Trail</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limite</th>
                        <th>Buy Date</th>
                        <th>Expired Date</th>
                        <th>Type Package</th>
                       
                    </tr>
                    <?php
                        $user_booking=@$_SESSION['user']->user_id;
                        $get_id=@$_GET['id'];
                        $v_sql = "SELECT tbl_buy_package.*,tbl_users.*,tbl_package.* FROM tbl_buy_package 
                        INNER JOIN tbl_users  ON tbl_users.user_id=tbl_buy_package.user_buy_id 
                        INNER JOIN tbl_package_position  ON tbl_package_position.p_id=tbl_buy_package.package_id 
                        INNER JOIN tbl_package  ON tbl_package.package_id=tbl_package_position.package_id
                        where user_buy_id='$user_booking' AND buy_package_id='$get_id'  ORDER BY buy_package_id DESC";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub+(10)/100;
                                $buy_dt= $row['buy_date'];
                                $tran_id=$row['transaction_id'];
                                $system_pack=$row['title'];
                                $status_ch=$row['status'];
                                $price=$row['price'];
                                $discount=$row['discount'];
                    ?>
                      <tr id="1">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['user_last_name']; ?> <?php echo $row['user_first_name']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?> Days</td>
                        <td><?php echo $row['period']; ?> Days
                        </td>
                        <td>$ <?php echo $row['price']; ?></td>
                        <td>$ <?php echo $row['discount']; ?></td>
                        <td>$ <?php echo $total; ?></td>
                        <td><?php echo $row['post_limit']; ?></td>
                        <td><?php echo $row['buy_date']; ?></td>
                        <td><?php echo $row['date_expired']; ?></td>
                        <td><?php 
                          if($row["status"]=="1") {
                            echo "Trail";
                          }
                          elseif ($row["status"]=="2") {
                            echo "ABA";
                          }
                          elseif ($row["status"]=="3") {
                              echo "WING";
                          }
                          else {
                            echo "Trail";
                          }
                         ?></td>
                       
                    </tr> 
                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>    
           
    </div>

    <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%!important;font-family:Arial;font-size:12px">
    

            <tbody>
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
                                                            <h2 style="font-family: AppleGothic, sans-serif; font-weight:600;">OFFICIAL INVOICE</h2></center>
                                                    </td>
                                                </tr>
                                                <tr border="1" style="font-family: 'Century Gothic';letter-spacing:1px;font-weight: 600; ">
                                                    <td width="10%" align="left">Bill For : </td>
                                                    <td width="20%" align="left" style="color:#a4509f;"><?php echo @$_SESSION["user"]->user_first_name.'.'.@$_SESSION["user"]->user_last_name; ?></td>
                                                    <td width="20%"></td>
                                                    <td width="0%" align="left">Booking No.:</td>
                                                    <td width="15%" align="left"><b style="color:red"><?php echo $tran_id ?></b></td>
                                                    
                                                   
                                                </tr>
                                                <tr border="1" style="font-family: 'Century Gothic';letter-spacing:1px;font-weight: 600; ">
                                                    <td width="20%" align="left">Phone No : </td>
                                                    <td width="25%" align="left" style="color:#a4509f;"><?php echo @$_SESSION["user"]->user_phone_number; ?></td>
                                                    <td width="5%"></td>
                                                    <td width="20%" align="left">Booking Date :</td>
                                                    <td width="30%" align="right" style="color:#a4509f;"><?php echo $buy_dt ?></td>
                                                </tr>
                                                <tr border="1" style="font-family: 'Century Gothic';letter-spacing:1px;font-weight: 600; ">
                                                    <td width="20%" align="left">E-mail : </td>
                                                    <td width="25%" align="left" style="color:#a4509f;"><?php echo @$_SESSION["user"]->user_email; ?></td>
                                                    <td width="5%"></td>
                                                    <td width="20%" align="left"></td>
                                                    <td width="30%" align="right"></td>
                                                </tr>

                                               
                                                <tr>

                                                    <td></td>
                                                    <td width="20%" align="left"></td>

                                                    <td width="30%" align="right"></td>
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
                                        <?php

                                         $check_member_type="";
                                         $id=@$_SESSION['user']->user_id;
                                         $v_sql = "SELECT * FROM tbl_relationship_users_position WHERE user_id='$id'";
                                         $result = $connect->query($v_sql);
                                        if ($result->num_rows > 0){
                                         if($row = $result->fetch_assoc()){
                                         $check_member_type=$row['user_position_id'];
                                         }}


                                        ?>
                                        <table style="width:100%;border-collapse:collapse;font-family:Arial;font-size:12px" border="0" align="center" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr style="background-color:#7030a0;color:white;height:40px;border:1px solid #000000;color:#ffffff">
                                                    <td align="center" style="border:1px solid #000000">No. </td>
                                                    <td align="center" style="border:1px solid #000000">Items Description</td>
                                                    <td align="center" style="border:1px solid #000000">Package Type</td>
                                                    <td align="center" style="border:1px solid #000000">Status</td>
                                                    <td align="center" style="border:1px solid #000000">Price</td>
                                                    <td align="center" style="border:1px solid #000000">Discount</td>
                                                    <td align="center" style="border:1px solid #000000">VAT</td>
                                                    <td align="center" style="border:1px solid #000000">Amount</td>
                                                </tr>
                                                <tr style="height:30px;border:1px solid #000000">
                                                    <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                                    <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">
                                                        <?php
                                                             if($check_member_type=="5") {
                                   echo 'CAR OWNER';
                                  }
                                  elseif ($check_member_type=="6") {
                                   
                                    echo "RICKSHAW'S OWNER";
                                  }
                                    elseif ($check_member_type=="9") {
                                    echo 'HOTEL & GUESTHOUSE';
                                  }
                                  elseif ($check_member_type=="4") {
                                    
                                     echo 'CITY TOUR';
                                  }
                                  elseif ($check_member_type=="11") {
                                    
                                     echo 'AIRPORT TRANSFER';
                                  }
                                   elseif ($check_member_type=="3") {
                                     echo 'PICKUP & DROP OFF';
                                   
                                  }
                                   elseif ($check_member_type=="7") {
                                    
                                    echo 'TOUR GUIDE';
                                  }
                                    elseif ($check_member_type=="8") {
                                   
                                    echo 'DRIVER';
                                  }
                                   elseif ($check_member_type=="10") {
                                   
                                    echo 'INDROUCER';
                                  }
                                  else {
                                    echo '';
                                  }
                                                         ?>
                                                    </td>
                                                    <td align="center" style="border:1px solid #000000;width:8%"><?php echo $system_pack; ?></td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">
                                                        <?php
                                                            if($status_ch=="1") {
                                                            echo "Trail";
                                                          }
                                                          elseif ($status_ch=="2") {
                                                            echo "ABA";
                                                          }
                                                          elseif ($status_ch=="3") {
                                                              echo "WING";
                                                          }
                                                          else {
                                                            echo "Trail";
                                                          }
                                                         ?>
                                                       
                                                    </td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">$ <?php echo number_format($price,2); ?></td>
                                                    <td align="center" style="border:1px solid #000000;width:8%"><?php echo number_format($discount,2); ?> %</td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">10 %</td>
                                                    <td align="center" style="border:1px solid #000000;width:8%">$ <?php echo number_format($total,2); ?></td>

                                            </tbody>
                                        </table>
                                    </td>
                                    </tr>
                            </tbody>
                        </table>
                    </td>
                    </tr>
            </tbody>
</table>


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