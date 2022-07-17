<?php 
    include_once '../../config/database.php';
?>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

 <style media="print">
   
 @media print {
           .table  thead tr th {
            font-size: 14px !important;
            font-family: Arial;
             background-color: #eef1f5 !important;
             -webkit-print-color-adjust:exact;
            
           }
        .table thead tr th {
            border: 1px solid black !important;
        }
        .table tr td {
             border: 1px solid black !important;
        }
            span {
              color:#a4509f !important;
            }
    }    
 </style>
<div class="portlet light bordered">
  <div class="row">
     <?php
      $user_id=@$connect->real_escape_string($_GET['txt_parner_name']);
       $query="SELECT * FROM tbl_users
                               
              WHERE user_id='$user_id' 
                                
                        ";
                        $result = $connect->query($query);

    
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
      ?>
    <div class="col-md-4" style="float: left;">
      <h4 style="text-transform: uppercase;">LYNA-CARRENTAL.COM</h4>
      <h4 style="text-transform: uppercase;">MONTH OF: 
        <span style="color:#a4509f">
                                              <?php  $dt_from = strtotime($_GET['txt_month']);
                                              echo date('F Y', $dt_from);  
                                              ?>
      </span>
                                                
      </h4>
    </div>

     <div class="col-md-4">
      
    </div>
     <div class="col-md-4" style="float: right;">
     
      <h4 style="text-transform: uppercase;">STAFF/partner's id: <span style="color:#a4509f">
        <?php echo $row['user_introducer_id']; ?>
      </span></h4>
      <h4 style="text-transform: uppercase;">STAFF/partner's Name: <span style="color:#a4509f"><?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?> </span></h4>
    </div>
    <?php
       }
      }
    ?>
  </div>
    <div class="row">
        <div class="col-xs-12">
           <center><h2 style="font-family: arial !important;">MONTHLY COMMISION CALCULATION LIST</h2></center>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" >
    <table class="table table-bordered" width="100%" style="padding:10px;border-bottom: none;border-left: none;border-right: none;">
                                <thead>
                                    <tr>
                                        <th rowspan="0" style="width:10%;">Start Date</th>
                                        <th rowspan="0" style="width:10%;">End Date</th>
                                        <th rowspan="0" style="width:10%;">Customer's Name</th>
                                        <th rowspan="0" style="width:10%;">Cus.ID N&deg;</th>
                                        <th rowspan="0" style="width:10%;">Comm%</th>
                                        <th rowspan="0" style="width:10%;">Ref. N&deg;</th>
                                        <th rowspan="0" style="width:10%;">Invoice. N&deg;</th>
                                        <th rowspan="0" style="width:10%;">Income</th>
                                        <th colspan="8" rowspan="2" style="width:40%;">
                                        Expenses
                                      
                                       </th>
                                        <th rowspan="4" style="width:10%;">Ex<br>Total</th>
                                        <th rowspan="4" style="width:10%;">Profit</th>
                                        <th rowspan="4" style="width:10%;">Free.<br>Comm%</th>
                                        <th rowspan="4" style="width:10%;">Net<br>Profit</th>
                                        
                                    </tr>
                                    <tr>
                                        
                                    </tr>
                                    <tr>
                                      <td rowspan="2">FUEL</td>
                                      <td rowspan="2">DRIVER</td>
                                      <td rowspan="2">OT</td>
                                      <td rowspan="2">T.Quide</td>
                                      <td rowspan="2">PARTNER</td>
                                      <td rowspan="2">COMM</td>
                                      <td rowspan="2">DIS.</td>
                                      <td rowspan="2">OTHER</td>  
                                    </tr>
                                </thead>
                                <tbody>
                         <!-- vehicle         -->
                 <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
         $search_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);

          if($search_month !=""){
            $search_month = @$connect->real_escape_string($_GET['txt_month']);
          }
          else {
            $search_month ="";
          }
           if($search_year !=""){
            $search_year = @$connect->real_escape_string($_GET['txt_year']);
          }
          else {
            $search_year ="";
          }

           if($search_parner_name !=""){
            $search_parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
          }
          else {
            $search_parner_name ="";
          }
                     $query="SELECT tbl_vehicle_rantal.*,tbl_monthly_commission.*,
                                    tbl_monthly_commission.to_date as to_date_sc
                                FROM tbl_monthly_commission 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_monthly_commission.ref_no=tbl_vehicle_rantal.ve_id
                                WHERE type_ref='Vehicle' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_monthly_commission.to_date <='$search_year'
                                )
                                AND partner_id='$search_parner_name'
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                        $total_income_vehicle=0;
                        $total_fuel_vehicle=0;
                        $total_driver_vehicle=0;
                        $total_ot_v=0;
                        $total_tq_v=0;
                        $total_partner_v=0;
                        $total_com_v=0;
                        $total_dis_v=0;
                        $total_other_v=0;
                        $total_ex_total_v=0;
                        $total_profit_v=0;
                        $total_free_come_v=0;
                        $total_net_profit_v=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                          $total_income_vehicle +=$row['income'];
                          $total_fuel_vehicle +=$row['ex_fuel'];
                          $total_driver_vehicle +=$row['ex_driver'];
                          $total_ot_v +=$row['ex_ot'];
                          $total_tq_v +=$row['ex_guide'];
                          $total_partner_v +=$row['ex_partner'];
                          $total_com_v +=$row['ex_comm'];
                          $total_dis_v +=$row['ex_discount'];
                          $total_other_v +=$row['ex_other'];
                          $total_ex_total_v +=$row['ex_total'];
                          $total_profit_v +=$row['profit'];
                          $total_free_come_v +=$row['free_comm'];
                          $total_net_profit_v +=$row['net_profit'];

                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $dt_from = strtotime($row['from_date']);
                                              echo date('d M y', $dt_from); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                          $dt_to = strtotime($row['to_date_sc']);
                                            echo date('d M y', $dt_to); 
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['customer_name'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['customer_no'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     <td>
                                    <label style="width:30px;">
                                          <?php
                                            echo $row['comm'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                     <label style="width:120px;">
                                          <?php
                                            echo $row['placque_no'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['invoice_no'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['income'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_fuel'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_driver'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label>
                                          $<?php
                                            echo number_format($row['ex_ot'],2);
                                          ?>
                                       </label>
                                    </td>
                                   
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_guide'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_partner'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_discount'],2);
                                          ?>
                                       </label>
                                      
                                    </td>
                                     <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_other'],2);
                                          ?>
                                       </label>
                                      
                                    </td>


                                   <td>
                                      <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['ex_total'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                         <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['free_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['net_profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                  </tr>
                            <?php

                                }
                            }
                            ?>   
                    <!-- end vehicle                        -->

                    <!-- rickshaw -->
                    <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
         $search_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);

          if($search_month !=""){
            $search_month = @$connect->real_escape_string($_GET['txt_month']);
          }
          else {
            $search_month ="";
          }
           if($search_year !=""){
            $search_year = @$connect->real_escape_string($_GET['txt_year']);
          }
          else {
            $search_year ="";
          }

           if($search_parner_name !=""){
            $search_parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
          }
          else {
            $search_parner_name ="";
          }
                     $query="SELECT tbl_rick_shaw_rental_last.*,tbl_monthly_commission.*,
                                    tbl_monthly_commission.to_date as to_date_sc
                                FROM tbl_monthly_commission 
                                INNER JOIN tbl_rick_shaw_rental_last
                                ON tbl_monthly_commission.ref_no=tbl_rick_shaw_rental_last.ve_id
                                WHERE type_ref='RickShaw' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_monthly_commission.to_date <='$search_year'
                                )
                                AND partner_id='$search_parner_name'
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                        $total_income_rick=0;
                        $total_fuel_r=0;
                        $total_driver_r=0;
                        $total_ot_r=0;
                        $total_tq_r=0;
                        $total_partner_r=0;
                        $total_com_r=0;
                        $total_dis_r=0;
                        $total_other_r=0;
                        $total_ex_total_r=0;
                        $total_profit_r=0;
                        $total_free_come_r=0;
                        $total_net_profit_r=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                          $total_income_rick +=$row['income'];
                          $total_fuel_r +=$row['ex_fuel'];
                          $total_driver_r +=$row['ex_driver'];
                          $total_ot_r +=$row['ex_ot'];
                          $total_tq_r +=$row['ex_guide'];
                          $total_partner_r +=$row['ex_partner'];
                          $total_com_r +=$row['ex_comm'];
                          $total_dis_r +=$row['ex_discount'];
                          $total_other_r +=$row['ex_other'];
                          $total_ex_total_r +=$row['ex_total'];
                          $total_profit_r +=$row['profit'];
                          $total_free_come_r +=$row['free_comm'];
                          $total_net_profit_r +=$row['net_profit'];
                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $dt_from = strtotime($row['from_date']);
                                              echo date('d M y', $dt_from); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                          $dt_to = strtotime($row['to_date_sc']);
                                            echo date('d M y', $dt_to); 
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['customer_name'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['customer_no'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     <td>
                                    <label style="width:30px;">
                                          <?php
                                            echo $row['comm'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                     <label style="width:120px;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['invoice_no'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['income'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_fuel'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_driver'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label>
                                          $<?php
                                            echo number_format($row['ex_ot'],2);
                                          ?>
                                       </label>
                                    </td>
                                   
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_guide'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_partner'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_discount'],2);
                                          ?>
                                       </label>
                                      
                                    </td>
                                     <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_other'],2);
                                          ?>
                                       </label>
                                      
                                    </td>
                                    <td>
                                      <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['ex_total'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                           <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['free_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['net_profit'],2);
                                          ?>
                                       </label>
                                    </td>

                                    
                                  </tr>
                            <?php

                                }
                            }
                            ?>   

                    <!-- end richshaw -->

                    <!-- accessories -->
                     <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
         $search_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);

          if($search_month !=""){
            $search_month = @$connect->real_escape_string($_GET['txt_month']);
          }
          else {
            $search_month ="";
          }
           if($search_year !=""){
            $search_year = @$connect->real_escape_string($_GET['txt_year']);
          }
          else {
            $search_year ="";
          }

           if($search_parner_name !=""){
            $search_parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
          }
          else {
            $search_parner_name ="";
          }
                     $query="SELECT tbl_accessories_rental.*,tbl_monthly_commission.*,
                                    tbl_monthly_commission.to_date as to_date_sc
                                FROM tbl_monthly_commission 
                                INNER JOIN tbl_accessories_rental
                                ON tbl_monthly_commission.ref_no=tbl_accessories_rental.ac_id
                                WHERE type_ref='Accessories' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_monthly_commission.to_date <='$search_year'
                                )
                                AND partner_id='$search_parner_name'
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      $total_income_acc=0;
                         $total_fuel_a=0;
                        $total_driver_a=0;
                        $total_ot_a=0;
                        $total_tq_a=0;
                        $total_partner_a=0;
                        $total_com_a=0;
                        $total_dis_a=0;
                        $total_other_a=0;
                        $total_ex_total_a=0;
                        $total_profit_a=0;
                        $total_free_come_a=0;
                        $total_net_profit_a=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                          $total_income_acc +=$row['income'];
                          $total_fuel_a +=$row['ex_fuel'];
                          $total_driver_a +=$row['ex_driver'];
                          $total_ot_a +=$row['ex_ot'];
                          $total_tq_a +=$row['ex_guide'];
                          $total_partner_a +=$row['ex_partner'];
                          $total_com_a +=$row['ex_comm'];
                          $total_dis_a +=$row['ex_discount'];
                          $total_other_a +=$row['ex_other'];
                          $total_ex_total_a +=$row['ex_total'];
                          $total_profit_a +=$row['profit'];
                          $total_free_come_a +=$row['free_comm'];
                          $total_net_profit_a +=$row['net_profit'];
                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $dt_from = strtotime($row['from_date']);
                                              echo date('d M y', $dt_from); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                          $dt_to = strtotime($row['to_date_sc']);
                                            echo date('d M y', $dt_to); 
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['customer_name'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['customer_no'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     <td>
                                    <label style="width:30px;">
                                          <?php
                                            echo $row['comm'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                     <label style="width:120px;">
                                          <?php
                                            echo $row['ac_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['invoice_no'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['income'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_fuel'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_driver'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label>
                                          $<?php
                                            echo number_format($row['ex_ot'],2);
                                          ?>
                                       </label>
                                    </td>
                                   
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_guide'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_partner'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['ex_discount'],2);
                                          ?>
                                       </label>
                                      
                                    </td>
                                     <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['ex_other'],2);
                                          ?>
                                       </label>
                                      
                                    </td>


                                    <td>
                                      <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['ex_total'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                          <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['free_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                            echo number_format($row['net_profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                  </tr>
                            <?php

                                }
                            }
                            ?>   


                    <!-- end aceessories -->
                <!-- hidden tr -->
                <tr>
                                     <td style="border: 0px solid red !important;">
                                        <label>
                                         
                                          
                                        </label>
                                    </td>
                                     <td style="border: 0px solid #e7ecf1 !important;">
                                     <label>
                                         
                                    </label>
                                    </td>
                                     <td style="border: 0px solid #e7ecf1 !important;">
                                      <label>
                                          
                                    </label>
                                    </td>
                                     <td style="border: 0px solid #e7ecf1 !important;">
                                   <label>
                                         
                                    </label>
                                    </td>
                                    
                                     <td style="border: 0px solid #e7ecf1 !important;">
                                    <label>
                                         
                                    </label>
                                    </td>
                                     <td style="border: 0px solid #e7ecf1 !important;">
                                     <label >
                                          
                                    </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                    <label>
                                          
                                    </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                    <label>
                                          
                                    </label>
                                    </td>

                                    <td style="border: 0px solid #e7ecf1 !important;">
                                       <label>
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                      <label>
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                     <label>
                                          
                                       </label>
                                    </td>
                                   
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                      <label>
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                       <label>
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                       <label>
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                      <label>
                                          
                                       </label>
                                      
                                    </td>
                                     <td style="border: 0px solid #e7ecf1 !important;">
                                       <label>
                                          
                                       </label>
                                      
                                    </td>


                                    <td style="border: 0px solid #e7ecf1 !important;">
                                      <label >
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                     <label >
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                           <label>
                                          
                                       </label>
                                    </td>
                                    <td style="border: 0px solid #e7ecf1 !important;">
                                     <label>
                                          
                                       </label>
                                    </td>
                                  </tr>
                <!-- end hidden tr -->

                <!-- bootom tr -->

                <tr style="border: 0px solid #e7ecf1 !important;">
                                  <td colspan="7" style="border: 0px solid #e7ecf1 !important;border-left:0px solid #e7ecf1 !important;
}

">
                                       
                                   <div style="float: left;">
                                     <b>NOTICES:</b>
                                   </div>      
                                   <div style="float: right;">
                                     <b>GRAND TOTAL:</b>
                                   </div>
                                          
                                       
                                  </td>
                                    
                                  <td >
                                    <label style="width:60px;">
                                          $<?php
                                          $total_income=$total_income_vehicle+$total_income_rick+$total_income_acc;
                                            echo number_format($total_income,2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                          $total_fuel=$total_fuel_vehicle +$total_fuel_a +$total_fuel_r;
                                            echo number_format($total_fuel,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                          $total_driver=$total_driver_vehicle+$total_driver_r+$total_driver_a;
                                            echo number_format($total_driver,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label>
                                          $<?php
                                          $total_ot=$total_ot_v+$total_ot_a+$total_ot_r;
                                            echo number_format($total_ot,2);
                                          ?>
                                       </label>
                                    </td>
                                   
                                    <td>
                                      <label>
                                          $<?php
                                          $total_tour=$total_tq_v+$total_tq_r+$total_tq_a;
                                            echo number_format($total_tour,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                          $total_partner=$total_partner_v+$total_partner_r+$total_partner_a;
                                            echo number_format($total_partner,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                       <label>
                                          $<?php
                                          $total_cm=$total_com_v+$total_com_r+$total_com_a;
                                            echo number_format($total_cm,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                          $total_dis=$total_dis_v+$total_dis_r+$total_dis_a;
                                            echo number_format($total_dis,2);
                                          ?>
                                       </label>
                                      
                                    </td>
                                     <td>
                                       <label>
                                          $<?php
                                          $total_other=$total_other_v+$total_other_r+$total_other_a;
                                            echo number_format($total_other,2);
                                          ?>
                                       </label>
                                      
                                    </td>


                                    <td>
                                      <label style="width:40px;">
                                          $<?php
                                          $total_ex=$total_ex_total_v+$total_ex_total_r+$total_ex_total_a;
                                            echo number_format($total_ex,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                          $total_profit=$total_profit_v+$total_profit_r+$total_profit_a;
                                            echo number_format($total_profit,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                           <label style="width:40px;">
                                          $<?php
                                          $total_free_com=$total_free_come_v+$total_free_come_r+$total_free_come_a;
                                            echo number_format($total_free_com,2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:40px;">
                                          $<?php
                                          $total_net=$total_net_profit_v+$total_net_profit_r+$total_net_profit_a;
                                            echo number_format($total_net,2);
                                          ?>
                                       </label>
                                    </td>
                                  </tr >
                <!-- end bootom tr -->
                                </tbody>
                            </table>

              <div style="width: 100%;">
                <div style="padding: 10px;width:25%;float: left;height: 100px;">
                  <span style="text-transform: uppercase;font-size: 11px;">1. discount</span>
                  <br>
                  <span style="text-transform: uppercase;font-size: 11px;">2. fr comm 2% | lcrc 1%
                  </span>
                  <br>
                  <span style="text-transform: uppercase;font-size: 11px;">3. amount to be paid this month</span>

                </div>
                 <div style="padding: 10px;width:10%;float: left;height: 100px;">
                  <span>
                     <hr style="margin-top:0px;margin-bottom:10px;border-top: 1px solid #eee;">
                       <center> <b>$<?php echo number_format($total_free_com,2); ?></b></center>
                     <hr style="margin-top:10px;margin-bottom:10px;border-top: 1px solid #eee;">
                  </span>
                </div>
                 <div style="padding: 10px;width:65%;float: left;height: 100px;">
                      <span style="text-transform: uppercase;font-size: 11px;float:left;">
                      4. customer status for introducer will get it for the whole life</span>
                      <br>
                      <span style="text-transform: uppercase;font-size: 11px;float:left;">
                      5. lcrc customer the incumbent will get it when the incumbent is working for lcrc
                      </span>
                <br>
                </div>
              </div>
      
         



    </div>
</div>
 
<style type="text/css">
  table th {
        font-size:14px !important;
        font-family: Arial;
    }
   table th ,td {
        border: 1px solid black;
        text-align:center;
        font-size:12px;
        font-family: Arial;
    }
.table {
  padding-left: 10px;
  padding-right: 10px;
}
</style>
 <script type="text/javascript">
window.print();
</script>

  
   