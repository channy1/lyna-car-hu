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
        <div class="row">
            

             <div style="width: 100%;">
            <div style="width: 24%;float: left;">
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
            <div style="width: 24%;float: left;">
                                 <span style="text-transform: uppercase;font-size: 11px;margin-left:25%;">date PREPARED:
                    <span style="border-bottom:1px solid black; margin-left: 10px;">
                    <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:25%;">PREPARED by:
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 25px;">
                     <?php  
                        echo $_GET['pre_by'];
                        ?>
                </span>
                </span>
            </div>
            <div style="width:24%;float:left;">
                
                  <span style="text-transform: uppercase;font-size: 11px;margin-left:12%;">date APPROVED:
                    <span style="border-bottom:1px solid black; margin-left: 5px;">
                    <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>

                <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:12%;">APPROVED by:
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 20px;">
                     <?php  
                        echo $_GET['app_by'];
                        ?>
                </span>
                </span>

            </div>
          <div style="width: 20%;float: right;margin-right:1%;">
            <center>
                         <h4 style="text-transform: uppercase;">
                             VEHICLE SALE REPORTS
                         </h4>
                 </center>
          </div>

        </div>
           
        </div>
        <br>

        <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th style="text-transform: uppercase; font-weight: normal;">Date</th>
                    <th style="text-transform: uppercase; font-weight: normal;">Ref. N&deg;</th>
                    <th style="text-transform: uppercase; font-weight: normal;">buyer id card N&deg;</th>
                    <th style="text-transform: uppercase; font-weight: normal;">buyer address</th>
                    <th style="text-transform: uppercase; font-weight: normal;">Buyer Tel N&deg;</th>
                    <th style="text-transform: uppercase; font-weight: normal;">seller witness</th>
                    <th style="text-transform: uppercase; font-weight: normal;">seller witness <br>tel N&deg;</th>
                    <th style="text-transform: uppercase; font-weight: normal;">mileage record</th>
                    <th style="text-transform: uppercase; font-weight: normal;">sale Amount</th>
                    <th style="text-transform: uppercase; font-weight: normal;">Dis%</th>
                    <th style="text-transform: uppercase; font-weight: normal;">Net sale</th>
                    <th style="text-transform: uppercase; font-weight: normal;">customer history notes</th>
                    
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
                                FROM tbl_sale_product_report 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_sale_product_report.ref_no=tbl_vehicle_rantal.ve_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_sale_product_report.customer_id
                                WHERE type='Vehicle' 
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
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                        <label style="width:80px;font-size: 9px;text-align: center;">
                                          <?php
                                            echo $row['buyer_id_card']; 
                                          ?>
                                        </label>
                                    </td>
                                    <td>
                                  <label style="font-size: 9px;float: left;">
                                          <?php
                                            echo $row['buyer_address'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['user_phone_number'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['sale_witness_name'];
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px; float: left;">
                                          <?php
                                            echo $row['sale_witness_phone'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['mileage_record'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['sale_mount'],2);
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
                                            echo number_format($row['net_sale'],2);
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
                                FROM tbl_sale_product_report 
                                INNER JOIN tbl_rick_shaw_rental_last
                                ON tbl_sale_product_report.ref_no=tbl_rick_shaw_rental_last.ve_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_sale_product_report.customer_id
                                WHERE type='RickShaw' 
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
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ve_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:80px;font-size: 9px;text-align: center;">
                                          <?php
                                            echo $row['buyer_id_card']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="font-size: 9px;float: left;">
                                          <?php
                                            echo $row['buyer_address'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['user_phone_number'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['sale_witness_name'];
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="width:40px; float: left;">
                                          <?php
                                            echo $row['sale_witness_phone'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['mileage_record'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['sale_mount'],2);
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
                                            echo number_format($row['net_sale'],2);
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
                                FROM tbl_sale_product_report 
                                INNER JOIN tbl_accessories_rental
                                ON tbl_sale_product_report.ref_no=tbl_accessories_rental.ac_id
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_sale_product_report.customer_id
                                WHERE type='Accessories' 
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
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['ac_ref_no'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:80px;font-size: 9px;text-align: center;">
                                          <?php
                                            echo $row['buyer_id_card']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                  <label style="font-size: 9px;float: left;">
                                          <?php
                                            echo $row['buyer_address'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['user_phone_number'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="float: left;">
                                          <?php
                                            echo $row['sale_witness_name'];
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label style="float: left; float: left;">
                                          <?php
                                            echo $row['sale_witness_phone'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['mileage_record'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label style="float: right;">
                                          $<?php
                                            echo number_format($row['sale_mount'],2);
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
                                            echo number_format($row['net_sale'],2);
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
                 

                    <!-- end aceessories -->
                
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