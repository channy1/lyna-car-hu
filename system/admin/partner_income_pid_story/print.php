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
            font-size:13px !important;
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
        <div class="row">

          <div style="width: 100%;">
            <div style="width:25%;float: left;">
                <span style="text-transform: uppercase;font-size: 11px;margin-left:12%;">MONTH OF YEAR:&nbsp;
                    <span style="border-bottom:1px solid black;">
                    <?php  
                        $month_year = strtotime($_GET['txt_month']);
                          echo date('F Y', $month_year); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:12%;">date prepared:&nbsp;
                    <span style="border-bottom:1px solid black;">
                     <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>

                
            
                
            </div>
            <div style="width:25%;float: left;">
                 <span style="text-transform: uppercase;font-size: 11px;margin-left:27%;">date PREPARED:&nbsp;
                    <span style="border-bottom:1px solid black;">
                    <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:27%;">PREPARED by:&nbsp;
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 15px;">
                     <?php  
                        echo $_GET['pre_by'];
                        ?>
                </span>
                </span>
            </div>
            <div style="width:25%;float:left;">
                
                    <span style="text-transform: uppercase;font-size: 11px;margin-left:12%;">date APPROVED:
                    <span style="border-bottom:1px solid black;">
                    <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:12%;">APPROVED by:
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 15px;">
                     <?php  
                        echo $_GET['app_by'];
                        ?>
                </span>
                </span>

            </div>
            <div style="width: 25%;float: right;">
              <center>
                         <h4 style="text-transform: uppercase;">
                             
                            partner income & paid history
                         </h4>
                </center>
            </div>

        </div>


                 
                       
            
              
          
             
        </div>
        <br>

        <table class="table table-bordered" width="100%">
            <thead>
             
                <tr>
                    <th rowspan="0"   style="text-transform: uppercase;vertical-align: top;font-weight: normal;">Date</th>
                    <th rowspan="0"  style="text-transform: uppercase;vertical-align: top;font-weight: normal;">ID N&deg;</th>
                    <th rowspan="0" style="text-transform: uppercase;vertical-align: top;font-weight: normal;">Partner Name</th>
                    <th rowspan="0" style="text-transform: uppercase;vertical-align: top;font-weight: normal;">Counpon Card N&deg;</th>
                    <th style="text-transform: uppercase;vertical-align: top;font-weight: normal;" colspan="5">Partner Income
                    </th>
                    <th style="text-transform: uppercase;border-bottom:1px solid #eef1f5 !important;vertical-align: top;font-weight: normal;">Dis%</th>
                    <th style="text-transform: uppercase;border-bottom:1px solid #eef1f5 !important;vertical-align: top;font-weight: normal;">Total Income</th>
                    <th style="text-transform: uppercase;vertical-align: top;font-weight: normal;" colspan="9">Partner Expense
                    </th>
                    <th rowspan="0" style="text-transform: uppercase;vertical-align: top;font-weight: normal;">Total Expenes</th>
                    <th rowspan="0" style="text-transform: uppercase;vertical-align: top;font-weight: normal;">Amount Payable</th>
                    <th rowspan="0" style="text-transform: uppercase;vertical-align: top;font-weight: normal;">No of Use</th>
                    <th rowspan="0" style="text-transform: uppercase;vertical-align: top;font-weight: normal;">Date Paid Bonus</th> 
                    <th rowspan="0" style="text-transform: uppercase;vertical-align: top;font-weight: normal;">Partner history Notes</th> 
                        
               </tr>
               <tr>
                        <th  style="width:10%;">Car</th>
                        <th  style="width:10%;">Rickshaw</th>
                        <th  style="width:10%;">Tour Guide</th>
                        <th  style="width:10%;">Driver</th>
                        <th  style="width:10%;font-size:12px !important;">Free Lancer</th>

                        <th  style="width:10%;"></th>
                        <th  style="width:10%;"></th>

                        <th  style="width:10%;">Car</th>
                        <th  style="width:10%;">Rickshaw</th>
                        <th  style="width:10%;">Tour Guide</th>
                        <th  style="width:10%;">Driver</th>
                        <th  style="width:10%;font-size: 12px !important;">Free Lancer</th>
                        <th style="text-transform: uppercase;">3%</th>
                        <th style="text-transform: uppercase;">5%</th>
                        <th style="text-transform: uppercase;">3.50%</th>
                        <th style="text-transform: uppercase;">10%</th>
                          
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
                                FROM tbl_partner_income_paid_history 
                              
                                INNER JOIN tbl_users
                                ON tbl_users.user_id=tbl_partner_income_paid_history.partner_id
                                WHERE partner_id !='' 
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);

                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          

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
                                     <label style="width:105px; text-align: center; ">
                                         <?php
                                          echo $row['user_introducer_id'];
                                         ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:110px;text-align: left;">
                                          <?php
                                          echo $row['user_first_name'].' '.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:130px;text-align: center;">
                                          <?php
                                          echo $row['user_coupon_code'];
                                         ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="width:70px;text-align: right;">
                                          $<?php
                                            echo number_format($row['car_income'],2);
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:70px;text-align: right;">
                                          $<?php
                                            echo number_format($row['richshaw_incom'],2);
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['tour_guide_income'],2);
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:70px;text-align: right;">
                                          $<?php
                                            echo number_format($row['driver_income'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                    <label style="width:70px;text-align: right;">
                                          $<?php
                                            echo number_format($row['free_lancer_income'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:70px;text-align: right;">
                                          $<?php
                                            echo number_format($row['dis_total_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['total_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['car_ex'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['richshaw_ex'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['tour_guide_ex'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['driver_ex'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['free_lancer_ex'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="width:30px;text-align: right;">
                                           $<?php
                                            echo number_format($row['rate_one'],2);
                                          ?>
                                       </label>
                                    </td>
                                     <td>
                                         <label style="width:30px;text-align: right;">
                                           $<?php
                                            echo number_format($row['rate_two'],2);
                                          ?>
                                       </label>
                                    </td>
                                     <td>
                                        <label style="width:30px;text-align: right;">
                                           $<?php
                                            echo number_format($row['rate_three'],2);
                                          ?>
                                       </label>
                                    </td>
                                     <td>
                                       <label style="width:30px;text-align: right;">
                                           $<?php
                                            echo number_format($row['rate_four'],2);
                                          ?>
                                       </label>
                                    </td>
                                     <td>
                                       <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['total_ex'],2);
                                          ?>
                                       </label>
                                    </td>
                                     <td>
                                        <label style="width:70px;text-align: right;">
                                           $<?php
                                            echo number_format($row['amount_payable'],2);
                                          ?>
                                       </label>
                                    </td>
                                     <td>
                                        <label style="width:70px;">
                                           <?php
                                            echo $row['time_use'];
                                          ?>
                                       </label>
                                    </td>
                                     <td>
                                        <label style="width:90px;">
                                           <?php  
                                            $date_paid = strtotime($row['date_paid']);
                                              echo date('d M y', $date_paid); 
                                            ?>
                                       </label>
                                    </td>
                                     <td>
                                        <label style="width:140px;text-align: left;">
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
               
            </tbody>
        </table>

    </div>

    <style type="text/css">
        table th {
            font-size: 13px !important;
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