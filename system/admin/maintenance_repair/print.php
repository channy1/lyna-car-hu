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
            <div style="width: 30%;float: left;">
                <div class="row">
                    <div style='width: 30%; float: left; line-height: 19px; margin-left: 5%;'>
                        <span style="text-transform: uppercase;font-size: 11px;margin-left:10%;">month of year:
                        </span>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:10%;">date prepared:
                        </span>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;margin-left:10%;">Ref. N&deg;:
                        </span>
                    </div>
                    <div style='width: 35%; float: left; line-height: 19px;'>
                        <span style="border-bottom:1px solid black; margin-left: %;">
                            <?php  
                                $month_year = strtotime($_GET['txt_month']);
                                echo date('F Y', $month_year); 
                            ?>
                        </span><br>
                        <span style="border-bottom:1px solid black; margin-left: %;">
                            <?php  
                                $today = strtotime(date('Y-m-d'));
                                echo date('d F Y', $today); 
                            ?>
                        </span><br>
                        <span style="border-bottom:1px solid black; margin-left: %;">
                            <?php echo $_GET['ref']; ?>
                        </span>
                    </div>
                </div>
                
            </div>
            <div style="width: 40%;float: left;">
                <center>
                    <h4 style="text-transform: uppercase;">
                        <?php
                            if($_GET['type']=="v") {
                              echo "vehicle";
                            }
                            elseif ($_GET['type']=="a") {
                             echo "Accessorie";
                            }
                            else {
                              echo "Rickshaw";
                            }
                        ?>
                        MAINTENANCE & REPAIR REPORTS
                    </h4>
                </center>
            </div>
            <div style="width:30%;float: right;">
                <div class="row" style="float: right;">
                    <div style='float: left;margin-left: 0px; line-height: 19px;text-align: left;'>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;">
                            YEAR:&nbsp;
                        </span>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;">
                            make:&nbsp;
                        </span>
                        <span style="text-transform: uppercase;font-size: 11px;display: block;">
                            model:&nbsp;
                        </span>
                         <span style="text-transform: uppercase;font-size: 11px;display: block;">
                            sub-model:&nbsp;
                        </span>
                    </div>
                    <div style='float: left; line-height: 19px;margin-right: 31px;'>
                        <span style="border-bottom:1px solid black;">
                            <?php echo $_GET['year']; ?><br>
                        </span>

                        <span style="border-bottom:1px solid black;">
                            <?php echo $_GET['make']; ?><br>
                        </span>
                        <span style="border-bottom:1px solid black;">
                            <?php echo $_GET['model']; ?><br>
                        </span>
                        <span style="border-bottom:1px solid black;">
                            <?php echo $_GET['sub_model']; ?>
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
                    <th style="text-transform: uppercase;font-weight: normal;">mileage record</th>
                    <th style="text-transform: uppercase;font-weight: normal;">name of garage or mechanic</th>
                    <th style="text-transform: uppercase;font-weight: normal;">vendor name</th>
                    <th style="text-transform: uppercase;font-weight: normal;">description</th>
                    <th style="text-transform: uppercase;font-weight: normal;">type</th>
                    <th style="text-transform: uppercase;font-weight: normal;">qty</th>
                    <th style="text-transform: uppercase;font-weight: normal;">unit price</th>
                    <th style="text-transform: uppercase;font-weight: normal;">Dis%</th>
                    <th style="text-transform: uppercase;font-weight: normal;">total</th>
                    <th style="text-transform: uppercase;font-weight: normal;">customer history </th>
                    
                </tr>
            </thead>
            <tbody>

                <?php
                 $search_month=@$connect->real_escape_string($_GET['txt_month']);
                 $search_year=@$connect->real_escape_string($_GET['txt_year']);
                 $ref=@$connect->real_escape_string($_GET['ref']);
                   if($_GET['type']=='v') {

                     $query="SELECT *
                                FROM tbl_repair 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_repair.ref_no=tbl_vehicle_rantal.ve_id
                                LEFT JOIN tbl_vendor
                                ON tbl_vendor.vendor_id=tbl_repair.vender_id
                                WHERE ve_ref_no='$ref' AND status_report='1'
                                AND 
                                (
                                add_date >='$search_month' AND 
                                add_date <='$search_year'
                                )
                               
                                 ORDER BY add_date 
                        ";
                         $result = $connect->query($query);
                     
                       
                    }
                    elseif ($_GET['type']=='r') {
                        $query="SELECT *
                                FROM tbl_repair 
                                INNER JOIN tbl_rick_shaw_rental_last
                                ON tbl_repair.ref_no=tbl_rick_shaw_rental_last.ve_id
                                INNER JOIN tbl_vendor
                                ON tbl_vendor.vendor_id=tbl_repair.vender_id
                                 WHERE ve_ref_no='$ref' AND status_report='1'
                                AND 
                                (
                                add_date >='$search_month' AND 
                                add_date <='$search_year'
                                )
                               
                                 ORDER BY add_date  
                        ";
                        $result = $connect->query($query);
                        
                       
                    }
                    elseif ($_GET['type']=='a') {
                        $query="SELECT *
                                FROM tbl_repair 
                                INNER JOIN tbl_accessories_rental
                                ON tbl_repair.ref_no=tbl_accessories_rental.ac_id
                                INNER JOIN tbl_vendor
                                ON tbl_vendor.vendor_id=tbl_repair.vender_id
                                WHERE ac_ref_no='$ref' AND status_report='1'
                                AND 
                                (
                                add_date >='$search_month' AND 
                                add_date <='$search_year'
                                )
                               
                                 ORDER BY add_date
                        ";
                        $result = $connect->query($query);
                      

                    }
                    else {


                    }

                       
                        while($row = $result->fetch_assoc()){
                   
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
                             echo $row['name_grage'];
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
                        <label style="float: left;">
                            <?php echo $row['record_note']; ?>
                        </label>
                    </td>    
                </tr>
            <?php
                }
           
            ?>
               
            </tbody>
        </table>

<div style="width: 100%;">
    
    <div style="width: 30%;float: left;">
        
    </div>
    <div style="width: 35%;float:right;">
        <span style="text-transform: uppercase;font-size: 11px;text-align: left;">DATE Approved:
                    <span style="border-bottom:1px solid black; margin-left: 0.6%;">
                     <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>
                <br>
        <span style="text-transform: uppercase;font-size: 11px;display: block;text-align: left;">Approved By:
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 3.3%;">
                     <?php  
                            
                            $app_by=@$connect->real_escape_string($_GET['app_by']);
                         echo $app_by
                        ?>
                </span>
                </span>


    </div>
    <div style="width: 35%;float:right;">
        <span style="text-transform: uppercase;font-size: 11px;text-align: left;">date prepared:
                    <span style="border-bottom:1px solid black; margin-left: 0.6%;">
                     <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>
                </span>
                </span>
                <br>
        <span style="text-transform: uppercase;font-size: 11px;display: block;text-align: left;">PREPARED By:
                    <span style="border-bottom:1px solid black;font-weight: bold; margin-left: 3.3%;">

                     <?php  
                        
                        $pre_by=@$connect->real_escape_string($_GET['pre_by']);
                        echo $pre_by;
                        ?>
                </span>
                </span>


    </div>
      
</div>
    </div>
<div style="margin-top:90px;clear: both;">
    
</div>
<div style="width: 100%;">
    <div style="width: 30%;float: left;">
        
    </div>
    <div style="width: 35%;float:right;">
        <div style="width: 50%;text-align: right;text-transform: uppercase;font-size: 11px;">.
        </div>
        <div style="text-align:center;width:40%;float:left;border-top:1px solid black;text-transform: uppercase;color:#a4509f;font-size: 11px;">
                    signed  AND STAMPED
        </div>
    </div>

    <div style="width: 35%;float:right;">
        <div style="width: 50%;text-align: right;text-transform: uppercase;font-size: 11px;">.
        </div>
        <div style="text-align:center;width:30%;float:left;border-top:1px solid black;text-transform: uppercase;color:#a4509f;font-size: 11px;">
                    signed 
        </div>
    </div>

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
            padding-left: 1px;
            padding-right: 1px;
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