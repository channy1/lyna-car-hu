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

        }
    </style>
    <div class="portlet light bordered">
        <div class="row">
            
                        <center>
                         <h4 style="text-transform: uppercase;">
                              <?php
                                if($_GET['type']=="v") {
                                  echo "vendor";
                                }
                                elseif ($_GET['type']=="a") {
                                 echo "vendor";
                                }
                                else {
                                  echo "vendor";
                                }
                              ?>
                             expense history
                         </h4>
                 </center>
            <div style="width: 100%;">
            <div style="width: 30%;float: left;">
                <div class="row">
                    <div style='width: 30%; float: left; line-height: 19px; margin-left: 6%;'>
                        <span style="text-transform: uppercase;font-size: 11px;margin-left:12%;">month of year:
                        </span>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:12%;">date prepared:
                        </span>
                    </div>
                    <div style='width: 30%; float: left; line-height: 19px;'>
                        <span style="border-bottom:1px solid black; margin-left: 1%;">
                            <?php  
                                $month_year = strtotime($_GET['txt_month']);
                                echo date('F Y', $month_year); 
                            ?>
                        </span>
                        <span style="border-bottom:1px solid black; margin-left: 1.8%;">
                             <?php  
                                $today = strtotime(date('Y-m-d'));
                                  echo date('d F Y', $today); 
                                ?>
                        </span>
                    </div>
                </div>
                
            </div>
            <div style="width: 40%;float: left;">
                <div class="row">
                    <div style='width: 50%; float: left; line-height: 19px; margin-left: 0%; text-align: left; padding-left: 25%;'>
                        <span style="text-transform: uppercase;font-size: 11px;">date PREPARED:
                        </span>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;">PREPARED by:
                        </span>
                    </div>
                    <div style='width: 50%; float: left; line-height: 19px; text-align: left;'>
                        <span style="border-bottom:1px solid black;">
                            <?php  
                                $today = strtotime(date('Y-m-d'));
                                  echo date('d F Y', $today); 
                                ?>
                        </span><br>
                        <span style="border-bottom:1px solid black;font-weight: bold;">
                             <?php  
                                echo $_GET['pre_by'];
                                ?>
                        </span>
                    </div>
                </div>
            </div>

            <div style="width:30%;float: right;">
                <div class="row" style="float: right;">
                    <div style='float: left;margin-left: 0px; line-height: 19px;text-align: left;'>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;">
                            date APPROVED:&nbsp;
                        </span>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;">
                            APPROVED by:&nbsp;
                        </span>
                    </div>
                    <div style='float: left; line-height: 19px;margin-right: 39px;'>
                        <span style="border-bottom:1px solid black;">
                          <?php  
                            $today = strtotime(date('Y-m-d'));
                            echo date('d F Y', $today); 
                          ?><br>
                        </span>

                        <span style="border-bottom:1px solid black;">
                          <?php  
                            echo $_GET['app_by'];
                          ?>
                        </span>
                       
                    </div>

                    
                </div>
            </div>

        </div>
             
            
          
    
        </div>
        <br>

        <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th style="text-transform: uppercase;font-weight: normal;">Date</th>
                    <th style="text-transform: uppercase;font-weight: normal;">ID N&deg;</th>
                    <th style="text-transform: uppercase;font-weight: normal;">vendor name</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Ref. N&deg;</th>
                    <th style="text-transform: uppercase;font-weight: normal;"> Spare Parts Description</th>
                    <th style="text-transform: uppercase;font-weight: normal;">type</th>
                    <th style="text-transform: uppercase;font-weight: normal;">qty</th>
                    <th style="text-transform: uppercase;font-weight: normal;">unit price</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Dis%</th>
                    <th style="text-transform: uppercase;font-weight: normal;">total</th>
                    <th style="text-transform: uppercase;font-weight: normal;">N&deg; Of Use</th>
                    <th style="text-transform: uppercase;font-weight: normal;">customer history notes</th>
                    
                </tr>
            </thead>
            <tbody>

                    <!-- vehicle  -->
                <?php
                 $search_month=@$connect->real_escape_string($_GET['txt_month']);
                 $search_year=@$connect->real_escape_string($_GET['txt_year']);
                 $ref=@$connect->real_escape_string($_GET['ref']);
                  

                     $query="SELECT *
                                FROM tbl_repair 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_repair.ref_no=tbl_vehicle_rantal.ve_id
                                LEFT JOIN tbl_vendor
                                ON tbl_vendor.vendor_id=tbl_repair.vender_id
                                WHERE ve_ref_no='$ref' AND status_report='2'
                                AND 
                                (
                                add_date >='$search_month' AND 
                                add_date <='$search_year'
                                )
                               
                                 ORDER BY add_date 
                        ";
                         $result = $connect->query($query);
                     
                        $total_v=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                          $total_v +=$row['record_total'];
                   
                ?>
               

                <tr>
                    <td>
                        <label style="width:70px; font-weight: normal;">

                           <?php  
                            $dt_from = strtotime($row['add_date']);
                            echo date('d M y', $dt_from); 
                            ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:67px;color: red !important;">
                           <?php
                            echo $row['mileage'];
                           ?>
                        </label>
                    </td>
                    <td>
                        <label style="float: left; font-weight: normal;">
                          <?php
                            echo $row['verdor_name'];
                            ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:65px;font-weight: normal;">
                          <?php

                            echo $row['placque_no'];
                            ?>
                        </label>
                    </td>

                    <td>
                        <label style="float: left;font-weight: normal;">
                           <?php
                            echo $row['description'];
                           ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:60px; font-weight: normal;">
                         <?php
                         echo $row['type_box'];
                         ?>
                        </label>
                    </td>

                    <td>
                        <label style="font-weight: normal;">
                           <?php echo $row['qty']; ?>
                        </label>
                    </td>
                    <td>
                        <label style="float: right; font-weight: normal;">
                            $<?php echo number_format($row['record_price'],2); ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: right; font-weight: normal;">
                            $<?php echo number_format($row['record_discount'],2); ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: right; font-weight: normal;">
                             $<?php echo number_format($row['record_total'],2); ?>
                        </label>
                    </td>
                    <td>
                        <label style="font-weight: normal;">
                            <?php echo $row['time_use']; ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: left; font-weight: normal;">
                            <?php echo $row['record_note']; ?>
                        </label>
                    </td>
                    

                </tr>
            <?php
                }
            }
           
            ?>

            <!-- vehicle -->
                <!-- rickshaw  -->
                <?php
                 $search_month=@$connect->real_escape_string($_GET['txt_month']);
                 $search_year=@$connect->real_escape_string($_GET['txt_year']);
                 $ref=@$connect->real_escape_string($_GET['ref']);
                  

                     $query="SELECT *
                                 FROM tbl_repair 
                                 INNER JOIN tbl_rick_shaw_rental_last
                                 ON tbl_repair.ref_no=tbl_rick_shaw_rental_last.ve_id
                                INNER JOIN tbl_vendor
                                 ON tbl_vendor.vendor_id=tbl_repair.vender_id
                                 WHERE ve_ref_no='$ref' AND status_report='2'
                               AND 
                               (
                                 add_date >='$search_month' AND 
                                 add_date <='$search_year'
                                )
                               
                                 ORDER BY add_date 
                        ";
                         $result = $connect->query($query);
                          $total_r=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                        $total_r +=$row['record_total'];
                ?>
               

                <tr>
                    <td>
                        <label style="width:70px;">

                           <?php  
                            $dt_from = strtotime($row['add_date']);
                            echo date('d M y', $dt_from); 
                            ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:67px;color: red !important;">
                           <?php
                            echo $row['mileage'];
                           ?>
                        </label>
                    </td>
                    <td>
                        <label style="float: left;">
                          <?php
                            echo $row['verdor_name'];
                            ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:65px;">
                          <?php

                            echo $row['ve_ref_no'];
                            ?>
                        </label>
                    </td>

                    <td>
                        <label style="float: left;">
                           <?php
                            echo $row['description'];
                           ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:60px;">
                         <?php
                         echo $row['type_box'];
                         ?>
                        </label>
                    </td>

                    <td>
                        <label>
                           <?php echo $row['qty']; ?>
                        </label>
                    </td>
                    <td>
                        <label style="float: right;">
                            $<?php echo number_format($row['record_price'],2); ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: right;">
                            $<?php echo number_format($row['record_discount'],2); ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: right;">
                             $<?php echo number_format($row['record_total'],2); ?>
                        </label>
                    </td>
                    <td>
                        <label>
                            <?php echo $row['time_use']; ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: left;">
                            <?php echo $row['record_note']; ?>
                        </label>
                    </td>
                    

                </tr>
            <?php
                }
            }
           
            ?>

            <!-- vehicle -->

             <!-- Accessories  -->
                <?php
                 $search_month=@$connect->real_escape_string($_GET['txt_month']);
                 $search_year=@$connect->real_escape_string($_GET['txt_year']);
                 $ref=@$connect->real_escape_string($_GET['ref']);
                  

                     $query="SELECT *
                                 FROM tbl_repair 
                                 INNER JOIN tbl_accessories_rental
                                ON tbl_repair.ref_no=tbl_accessories_rental.ac_id
                                INNER JOIN tbl_vendor
                                ON tbl_vendor.vendor_id=tbl_repair.vender_id
                                WHERE ac_ref_no='$ref' AND status_report='2'
                                AND 
                                 (
                                add_date >='$search_month' AND 
                                add_date <='$search_year'
                               )
                               
                               ORDER BY add_date
                        ";
                         $result = $connect->query($query);
                
                         $total_a=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          $total_a +=$row['record_total'];
                   
                ?>
               

                <tr>
                    <td>
                        <label style="width:70px;">

                           <?php  
                            $dt_from = strtotime($row['add_date']);
                            echo date('d M y', $dt_from); 
                            ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:67px;color: red !important;">
                           <?php
                            echo $row['mileage'];
                           ?>
                        </label>
                    </td>
                    <td>
                        <label style="float: left;">
                          <?php
                            echo $row['verdor_name'];
                            ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:65px;">
                          <?php

                            echo $row['ac_ref_no'];
                            ?>
                        </label>
                    </td>

                    <td>
                        <label style="float: left;">
                           <?php
                            echo $row['description'];
                           ?>
                        </label>
                    </td>
                    <td>
                        <label style="width:60px;">
                         <?php
                         echo $row['type_box'];
                         ?>
                        </label>
                    </td>

                    <td>
                        <label>
                           <?php echo $row['qty']; ?>
                        </label>
                    </td>
                    <td>
                        <label style="float: right;">
                            $<?php echo number_format($row['record_price'],2); ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: right;">
                            $<?php echo number_format($row['record_discount'],2); ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: right;">
                             $<?php echo number_format($row['record_total'],2); ?>
                        </label>
                    </td>
                    <td>
                        <label>
                            <?php echo $row['time_use']; ?>
                        </label>
                    </td>
                     <td>
                        <label style="float: left;">
                            <?php echo $row['record_note']; ?>
                        </label>
                    </td>
                    

                </tr>
            <?php
                }
            }
           
            ?>
            <?php
              $total_sum=0;
              $total_sum=$total_v+$total_r+$total_a;
            ?>
            <tr style="border:1px solid white !important;">
              <td colspan="8" style="border: none !important;"></td>
              <td style="border: none !important;font-size: 10px;"><b>GRAND TOTAL:</b></td>
              <td style="border: none !important;">
              <div style="border-bottom:0px solid black;">
                 
                <span style="border-bottom:1px solid black; font-weight: bold;">
                  $<?php echo number_format($total_sum,2); ?>
                </span>
              </div>
              </td>
              <td style="border: none !important;"></td>
            </tr>

            <!-- Accessories -->
               
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