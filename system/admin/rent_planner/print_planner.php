<?php 
    include_once '../../config/database.php';
?>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

 <style media="print">
   
 @media print {
         

            .table  tbody tr th {
            font-size: 14px !important;
            font-family: Arial;
             background-color: #eef1f5 !important;
             -webkit-print-color-adjust:exact;
            
           }
        .table tbody tr th {
            border: 1px solid black !important;
        }
        .table tr td {
             border: 1px solid black !important;
        }
    }    
 </style>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
           <center><h2 style="font-family: arial !important;">BOOKING SCHEDULE (DAILY CHECK)</h2></center>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

          <table class="table" style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left; font-family:arial;" width="100%">
                    <tbody>
                        <tr>

                            <th style="background-color:#e9ecf3 ;border: 1px solid #000000;" rowspan="2" width="15%" class="aa text-center">Date</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="5%" class="aa text-center">Time</th>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="10%" class="aa text-center">Ref. N&deg;</th>
                            
                            
                        </tr>
                        <tr style="text-align: center">
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="15%">Customer's Name</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="9%">Telephone</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="9%">Status</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="40%" nowrap="nowrap">Remarks</th>
                        </tr>
   <!-- car  -->

                    <?php
                     $id=@$_SESSION['user']->user_id;
                      $s_input_month=@$connect->real_escape_string($_GET['txt_month']);
                      $s_input_year=@$connect->real_escape_string($_GET['txt_year']);
                      $query="SELECT tbl_vehicle_rantal.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_schedule_admin.ref_no=tbl_vehicle_rantal.ve_id
                                WHERE sc_type='Vehicle' and user_id = '$id'
                                AND 
                                (
                                from_date >='$s_input_month' AND 
                                tbl_schedule_admin.to_date <='$s_input_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                    ?>



                      <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                             
                              <?php  
                              $dt_from = strtotime($row['from_date']);
                                echo date('d M y', $dt_from).'-'; 
                              ?>
                              <?php  
                              $dt_to = strtotime($row['to_date_sc']);
                                echo date('d M y', $dt_to); 
                              ?>
                            </td>
                            <td align="left" style="color:#000000;padding-left: 8px;width:2%;border:1px solid #000000">
                                <label>
                                <?php
                                 echo $row['sc_title'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;padding-right: 3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['placque_no'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;width:2%;border:1px solid #000000">
                              <label>
                                 <?php
                                 echo $row['customer_name'];
                                ?>
                              
                            </label></td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>                                  
                                 <?php
                                 echo $row['cell_phone'];
                                ?>                            
                              </label>
                            </td>

                            <td align="right" style="color:#000000;padding-right :3px;width:2%;border:1px solid #000000;text-align: center;">
                              <label>                                
                                <?php
                                 echo $row['sc_status'];
                                ?>      
                              </label>
                                </td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                
                                <label>
                                
                               <?php
                                 echo $row['remark'];
                                ?>  
                              </label></td>
                           

                        </tr>

                        <?php
                            }
                        }
                        ?>
                      
          <!-- driver       -->


 <?php

                     
                      $query="SELECT tbl_users.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_users
                                ON tbl_schedule_admin.ref_no=tbl_users.user_id
                                WHERE sc_type='Driver'
                                AND 
                                (
                                from_date >='$s_input_month' AND 
                                tbl_schedule_admin.to_date <='$s_input_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                    ?>



                      <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                             
                              <?php  
                              $dt_from = strtotime($row['from_date']);
                                echo date('d M y', $dt_from).'-'; 
                              ?>
                              <?php  
                              $dt_to = strtotime($row['to_date_sc']);
                                echo date('d M y', $dt_to); 
                              ?>
                            </td>
                            <td align="left" style="color:#000000;padding-left: 8px;width:2%;border:1px solid #000000">
                                <label>
                                <?php
                                 echo $row['sc_title'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;padding-right: 3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['user_phone_number'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;width:2%;border:1px solid #000000">
                              <label>
                                 <?php
                                 echo $row['customer_name'];
                                ?>
                              
                            </label></td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['cell_phone'];
                                ?>                            
                              </label>
                            </td>

                            <td align="right" style="color:#000000;padding-right :3px;width:2%;border:1px solid #000000;text-align: center;">
                              <label>
                                <?php
                                 echo $row['sc_status'];
                                ?>      
                              </label>
                                </td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                
                                <label>
                                
                               <?php
                                 echo $row['remark'];
                                ?>  
                              </label></td>
                           

                        </tr>

                        <?php
                            }
                        }
                        ?>  

                <!-- Tour Guide                   -->

                <?php

                     
                      $query="SELECT tbl_users.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_users
                                ON tbl_schedule_admin.ref_no=tbl_users.user_id
                                WHERE sc_type='T.Quide'
                                AND 
                                (
                                from_date >='$s_input_month' AND 
                                tbl_schedule_admin.to_date <='$s_input_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                    ?>



                      <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                             
                              <?php  
                              $dt_from = strtotime($row['from_date']);
                                echo date('d M y', $dt_from).'-'; 
                              ?>
                              <?php  
                              $dt_to = strtotime($row['to_date_sc']);
                                echo date('d M y', $dt_to); 
                              ?>
                            </td>
                            <td align="left" style="color:#000000;padding-left: 8px;width:2%;border:1px solid #000000">
                                <label>
                                <?php
                                 echo $row['sc_title'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;padding-right: 3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['user_phone_number'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;width:2%;border:1px solid #000000">
                              <label>
                                 <?php
                                 echo $row['customer_name'];
                                ?>
                              
                            </label></td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['cell_phone'];
                                ?>                            
                              </label>
                            </td>

                            <td align="right" style="color:#000000;padding-right :3px;width:2%;border:1px solid #000000;text-align: center;">
                              <label>
                                <?php
                                 echo $row['sc_status'];
                                ?>      
                              </label>
                                </td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                
                                <label>
                                
                               <?php
                                 echo $row['remark'];
                                ?>  
                              </label></td>
                           

                        </tr>

                        <?php
                            }
                        }
                        ?>           


                        <!-- Richshaw    -->


                <?php

                     
                      $query="SELECT tbl_rick_shaw_rental_last.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_rick_shaw_rental_last
                                ON 
                                tbl_schedule_admin.ref_no=tbl_rick_shaw_rental_last.ve_id
                                WHERE sc_type='RickShaw' 
                                AND 
                                (
                                from_date >='$s_input_month' AND 
                                tbl_schedule_admin.to_date <='$s_input_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                    ?>



                      <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                             
                              <?php  
                              $dt_from = strtotime($row['from_date']);
                                echo date('d M y', $dt_from).'-'; 
                              ?>
                              <?php  
                              $dt_to = strtotime($row['to_date_sc']);
                                echo date('d M y', $dt_to); 
                              ?>
                            </td>
                            <td align="left" style="color:#000000;padding-left: 8px;width:2%;border:1px solid #000000">
                                <label>
                                <?php
                                 echo $row['sc_title'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;padding-right: 3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['ve_ref_no'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;width:2%;border:1px solid #000000">
                              <label>
                                 <?php
                                 echo $row['customer_name'];
                                ?>
                              
                            </label></td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['cell_phone'];
                                ?>                            
                              </label>
                            </td>

                            <td align="right" style="color:#000000;padding-right :3px;width:2%;border:1px solid #000000;text-align: center;">
                              <label>
                                <?php
                                 echo $row['sc_status'];
                                ?>      
                              </label>
                                </td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                
                                <label>
                                
                               <?php
                                 echo $row['remark'];
                                ?>  
                              </label></td>
                           

                        </tr>

                        <?php
                            }
                        }
                        ?>              
                      

              <!-- Accessories -->
                <?php

                     
                      $query="SELECT tbl_accessories_rental.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_accessories_rental
                                ON 
                                tbl_schedule_admin.ref_no=tbl_accessories_rental.ac_id
                                WHERE sc_type='Accessories' 
                                AND 
                                (
                                from_date >='$s_input_month' AND 
                                tbl_schedule_admin.to_date <='$s_input_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                    ?>



                      <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">
                             
                              <?php  
                              $dt_from = strtotime($row['from_date']);
                                echo date('d M y', $dt_from).'-'; 
                              ?>
                              <?php  
                              $dt_to = strtotime($row['to_date_sc']);
                                echo date('d M y', $dt_to); 
                              ?>
                            </td>
                            <td align="left" style="color:#000000;padding-left: 8px;width:2%;border:1px solid #000000">
                                <label>
                                <?php
                                 echo $row['sc_title'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;padding-right: 3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['ac_ref_no'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;width:2%;border:1px solid #000000">
                              <label>
                                 <?php
                                 echo $row['customer_name'];
                                ?>
                              
                            </label></td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['cell_phone'];
                                ?>                            
                              </label>
                            </td>

                            <td align="right" style="color:#000000;padding-right :3px;width:2%;border:1px solid #000000;text-align: center;">
                              <label>
                                <?php
                                 echo $row['sc_status'];
                                ?>      
                              </label>
                                </td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                
                                <label>
                                
                               <?php
                                 echo $row['remark'];
                                ?>  
                              </label></td>
                           

                        </tr>

                        <?php
                            }
                        }
                        ?>              
                                        
                        
                    </tbody>
                </table>


        </div>
    </div>
</div>
 <script type="text/javascript">
window.print();
</script>

  
   