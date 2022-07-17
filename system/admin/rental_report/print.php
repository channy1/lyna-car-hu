<?php 
    include_once '../../config/database.php';
?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <style media="print">
        @media print {
           
            span {
                color: #a4509f !important;
            }
            .table  thead tr th {
            font-size: 13px !important;
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
        label {
            font-weight: 100;
        }

        }
    </style>
    <div class="portlet light bordered">

      <div style="width: 100%;">
          <div style="width: 25%;float: left;">
               <span style="text-transform: uppercase;font-size: 11px;margin-left:12%;">month of year:
                    <span style="border-bottom:1px solid black; margin-left: 1%;">
                    <?php  
                        $month_year = strtotime($_GET['txt_month']);
                          echo date('F Y', $month_year); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:12%;">date prepared:
                    <span style="border-bottom:1px solid black; margin-left: 1.8%;">
                     <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>
          </div>
          <div style="width: 25%;float: left;">
            <span style="text-transform: uppercase;font-size: 11px;margin-left:27%;">date PREPARED:
                    <span style="border-bottom:1px solid black; margin-left: 1%;">
                    <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:27%;">PREPARED by:
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 18px;">
                     <?php  
                        echo $_GET['pre_by'];
                        ?>
                </span>
                </span>
          </div>
          <div style="width: 25%;float: left;">
            <span style="text-transform: uppercase;font-size: 11px;margin-left:12%;">date APPROVED:
                    <span style="border-bottom:1px solid black; margin-left: 2px;">
                    <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:12%;">APPROVED by:
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 16px;">
                     <?php  
                        echo $_GET['app_by'];
                        ?>
                </span>
                </span>
          </div>
          <div style="width: 25%;float: right;">
            <center>
                         <h4 style="text-transform: uppercase;">
                             
                            rental report
                         </h4>
                </center>
          </div>
      </div>
        
        <br>

        <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th style="text-transform: uppercase;font-weight: normal;">Start Date</th>
                    <th style="text-transform: uppercase;font-weight: normal;">End Date</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Ref. N&deg;</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Intro ID N&deg;</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Counpon Card N&deg;</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Customer Name</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Amount</th>
                    <th style="text-transform: uppercase;font-weight: normal;">N&deg; Of Use</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Dis% Record</th>
                    <th style="text-transform: uppercase;font-weight: normal;">After Dis%</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Bonus Saving</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Net Income</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Broke Down History</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Date Paid Bonus</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Customer History Note</th>
                    
                </tr>
            </thead>
            <tbody>
                 <!-- vehicle         -->
                 <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_rental_report.ref_id=tbl_vehicle_rantal.ve_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='Vehicle' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);

                       $total_amount_v=0;
                       $total_af_discount_v=0;
                       $total_bonus_save_v=0;
                       $total_netincome_v=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_v +=$row['amount'];
                            $total_af_discount_v +=$row['after_discount'];
                            $total_bonus_save_v  +=$row['bonus_save'];
                            $total_netincome_v +=$row['net_income'];

                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;text-align: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                      <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                        <?php
                                     echo $row['note'];
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                INNER JOIN tbl_rick_shaw_rental_last
                                ON tbl_rental_report.ref_id=tbl_rick_shaw_rental_last.ve_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='RickShaw' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                       $total_amount_r=0;
                       $total_af_discount_r=0;
                       $total_bonus_save_r=0;
                       $total_netincome_r=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_r +=$row['amount'];
                            $total_af_discount_r +=$row['after_discount'];
                            $total_bonus_save_r  +=$row['bonus_save'];
                            $total_netincome_r +=$row['net_income'];

                          ?>

                                 <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                   <label style="float: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;float: right;" >
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                        <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                        <?php
                                     echo $row['note'];
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                INNER JOIN tbl_accessories_rental
                                ON tbl_rental_report.ref_id=tbl_accessories_rental.ac_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='Accessories' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);

                       $total_amount_a=0;
                       $total_af_discount_a=0;
                       $total_bonus_save_a=0;
                       $total_netincome_a=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_a +=$row['amount'];
                            $total_af_discount_a +=$row['after_discount'];
                            $total_bonus_save_a +=$row['bonus_save'];
                            $total_netincome_a +=$row['net_income'];

                          ?>

                                   <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ac_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                 <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                      <label style="float: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;float: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                      <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                    <?php
                                     echo $row['note'];
                                    ?>
                                  </label>
                                    </td>
                                    
                                   
                                  </tr>
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   
                 

                    <!-- end aceessories -->
                
<!-- city tour -->
                      <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_rental_report.ref_id=tbl_vehicle_rantal.ve_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='city_tour' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);

                       $total_amount_c=0;
                       $total_af_discount_c=0;
                       $total_bonus_save_c=0;
                       $total_netincome_c=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_c +=$row['amount'];
                            $total_af_discount_c +=$row['after_discount'];
                            $total_bonus_save_c  +=$row['bonus_save'];
                            $total_netincome_c +=$row['net_income'];

                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;float: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                        <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                    <?php
                                     echo $row['note'];
                                    ?>
                                  </label>
                                    </td>
                                    
                                   
                                  </tr>
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   

                    <!-- end citytour -->
              <!-- pickup ariport -->
                       <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_rental_report.ref_id=tbl_vehicle_rantal.ve_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='pickup_drop' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);
                        $total_amount_ai=0;
                       $total_af_discount_ai=0;
                       $total_bonus_save_ai=0;
                       $total_netincome_ai=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_ai +=$row['amount'];
                            $total_af_discount_ai +=$row['after_discount'];
                            $total_bonus_save_ai  +=$row['bonus_save'];
                            $total_netincome_ai +=$row['net_income'];

                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;float: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                        <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                    <?php
                                     echo $row['note'];
                                    ?>
                                  </label>
                                    </td>
                                    
                                   
                                  </tr>
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   

                    <!-- end pickup -->

                     <!-- Airport -->
                    <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_rental_report.ref_id=tbl_vehicle_rantal.ve_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='airport' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);

                       $total_amount_pic=0;
                       $total_af_discount_pic=0;
                       $total_bonus_save_pic=0;
                       $total_netincome_pic=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_pic +=$row['amount'];
                            $total_af_discount_pic +=$row['after_discount'];
                            $total_bonus_save_pic  +=$row['bonus_save'];
                            $total_netincome_pic +=$row['net_income'];

                          ?>
                            <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                 <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px; float: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <<label style="float: left;">
                                      <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                    <?php
                                     echo $row['note'];
                                    ?>
                                  </label>
                                    </td>
                                    
                                   
                                  </tr>
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   

                    <!-- end aiport -->
            <!-- hotel -->
                    <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                INNER JOIN tbl_hotel
                                ON tbl_rental_report.ref_id=tbl_hotel.ht_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='hotel_quest' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);
                        $total_amount_h=0;
                        $total_af_discount_h=0;
                       $total_bonus_save_h=0;
                       $total_netincome_h=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_h +=$row['amount'];
                            $total_af_discount_h +=$row['after_discount'];
                            $total_bonus_save_h  +=$row['bonus_save'];
                            $total_netincome_h +=$row['net_income'];
                          ?>

                                 <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ht_website'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="float: left;">                                      
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;float: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                        <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                    <?php
                                     echo $row['note'];
                                    ?>
                                  </label>
                                    </td>
                                    
                                   
                                  </tr>
                                   
                                  
                            <?php

                                }
                            }
                            ?>   
                    <!-- end hotel -->

                      <!-- driver -->
                     <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='Driver' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);
                        $total_amount_d=0;
                       $total_af_discount_d=0;
                       $total_bonus_save_d=0;
                       $total_netincome_d=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_d +=$row['amount'];
                            $total_af_discount_d +=$row['after_discount'];
                            $total_bonus_save_d  +=$row['bonus_save'];
                            $total_netincome_d +=$row['net_income'];
                             $dr_id=$row['ref_id'];
                          ?>
  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                        <?php
                                        
                                        $query_t="SELECT *
                                      FROM tbl_users 
                                      WHERE user_id='$dr_id' 
                                              ";
                        $result = $connect->query($query_t);
                        if ($result->num_rows > 0) {
                        while($row_t = $result->fetch_assoc()){
                           echo $row_t['user_first_name'].' '.$row_t['user_last_name'];
                            }}
                          ?>
                                    </label>
                                    </td>
                                     <td>
                                 <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                 <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;float: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                      <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                    <?php
                                     echo $row['note'];
                                    ?>
                                  </label>
                                    </td>
                                    
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   

                    <!-- end driver -->
                      <!-- tour quide -->
                      <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
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

         
                     $query="SELECT *
                                FROM tbl_rental_report 
                                
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_rental_report.customer_id
                                WHERE type='T.Quide' AND status_type='1'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);
                       $total_amount_t=0;
                       $total_af_discount_t=0;
                       $total_bonus_save_t=0;
                       $total_netincome_t=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $total_amount_t +=$row['amount'];
                            $total_af_discount_t +=$row['after_discount'];
                            $total_bonus_save_t  +=$row['bonus_save'];
                            $total_netincome_t +=$row['net_income'];
                            $t_id=$row['ref_id'];
                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:67px;">
                                         <?php  
                                            $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_introducer_id']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="width:80px;font-size: 9px;float: left;">
                                          <?php
                                            echo $row['user_coupon_code'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                        
                                        $query_t="SELECT *
                                      FROM tbl_users 
                                      WHERE user_id='$t_id' 
                                              ";
                        $result = $connect->query($query_t);
                        if ($result->num_rows > 0) {
                        while($row_t = $result->fetch_assoc()){
                           echo $row_t['user_first_name'].' '.$row_t['user_last_name'];
                            }}
                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;float: right;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px;">
                                          <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                        <?php
                                            echo $row['broke'];
                                          ?>
                                    </label>
                                          
                                      
                                    </td>
                                    <td>
                                   <label style="width:70px;">
                                       <?php  
                                            $paid_date = strtotime($row['date_paid']);
                                              echo date('d M y', $paid_date); 
                                            ?>
                                   </label>
                                    
                                    </td>

                                    <td>
                                      <label style="float: left;">
                                    <?php
                                     echo $row['note'];
                                    ?>
                                  </label>
                                    </td>
                                    
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   
                    <!-- end tour quite -->
            <tr style="border:1px solid white !important;">
                <td colspan="6" style="border: none !important;">  
                </td>
                <td style="border: none !important;text-align: right;font-weight: bold;">
                $<?php
                 $amount_all=
                 $total_amount_v+
                 $total_amount_r+
                 $total_amount_a+
                 $total_amount_d+
                 $total_amount_t+
                 $total_amount_h+
                 $total_amount_ai+
                 $total_amount_pic+
                 $total_amount_c;
                 echo number_format($amount_all,2);
                ?>
            </td>
                <td colspan="2" style="border: none !important;"></td>
                <td style="border: none !important;text-align: right;font-weight: bold;">
                $<?php
                 $after_discount_all=
                 $total_af_discount_v+
                 $total_af_discount_r+
                 $total_af_discount_a+
                 $total_af_discount_d+
                 $total_af_discount_t+
                 $total_af_discount_h+
                 $total_af_discount_ai+
                 $total_af_discount_pic+
                 $total_af_discount_c;
                 echo number_format($after_discount_all,2);
                ?>
                </td>
                <td style="border: none !important;text-align: right;font-weight: bold;">
                 $<?php
                 $total_bonus_save_all=
                 $total_bonus_save_v+
                 $total_bonus_save_r+
                 $total_bonus_save_a+
                 $total_bonus_save_d+
                 $total_bonus_save_t+
                 $total_bonus_save_h+
                 $total_bonus_save_ai+
                 $total_bonus_save_pic+
                 $total_bonus_save_c;
                 echo number_format($total_bonus_save_all,2);
                ?>
                </td>
                <td style="border: none !important;text-align: right;font-weight: bold;">
                $<?php
                 $total_netincome_all=
                 $total_netincome_v+
                 $total_netincome_r+
                 $total_netincome_a+
                 $total_netincome_d+
                 $total_netincome_t+
                 $total_netincome_h+
                 $total_netincome_ai+
                 $total_netincome_pic+
                 $total_netincome_c;
                 echo number_format($total_netincome_all,2);
                ?>
                </td>
            </tr>
               
            </tbody>
        </table>

    </div>

    <style type="text/css">
        table th {
            font-size: 14px !important;
            font-family: Arial;
            background-color: #eef1f5;
        }
        
        table th,
        td {
            border: 1px solid black;
            text-align: center;
            font-size: 12px;
            font-family: Arial;
        }
        
        .table {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        table th,
        table td,
        table tr {
            border: 1px solid black !important;
        }
    </style>
    <script type="text/javascript">
        window.print();
    </script>