<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
           <center style="text-transform: uppercase;"><h2>customer income & paid history</h2></center>
        </div>
    </div>
   
    <!-- calender start -->
    <div class="row">
        <div class="col-md-8">
            <form>
              <?php
                $s_input_month=@$connect->real_escape_string($_GET['txt_month']);
                $s_input_year=@$connect->real_escape_string($_GET['txt_year']);
               

              ?>
              <?php

                          $query="SELECT *
                                FROM tbl_rental_report 
                                WHERE pre_by !='' AND app_by !=''  AND status_type='1'
                                AND 
                                (
                                start_date >='$s_input_month' AND 
                                start_date <='$s_input_year'
                                )
                               
                                 ORDER BY start_date DESC limit 1
                                
                        ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          $app=$row['app_by'];
                          $pre=$row['pre_by'];

                       ?>

                       <?php
                           }
                        }
                       ?>
              <div class="form-group row">
                <label for="staticEmail" class="col-md-1 col-form-label">FROM:</label>
                <div class="col-md-3">
                
                 <input value="<?php echo $s_input_month ?>" type="text" class="form-control" name="txt_month" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                </div>

             <label for="staticEmail" class="col-md-1 col-form-label">TO:</label>
                <div class="col-md-3">
                 
                 <input value="<?php echo $s_input_year ?>" type="text" class="form-control" name="txt_year" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                </div>
                <div class="col-md-2">
                        <button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
                </div>
                <div class="col-md-2">
                       <a target="_blank" class="btn btn-danger" href="print.php?txt_month=<?php echo $s_input_month; ?>&txt_year=<?php echo $s_input_year; ?>
                       &pre_by=<?php echo $pre; ?>&app_by=<?php echo $app; ?>">
                      <i class="fa fa-print"></i> Print</a>
                </div>

              
            
              </div>
                <br>
             
              
              
            </form>
        </div>
        

        <div class="col-md-4">

        <div class="col-md-2" style="float:left;">
            <a target="_blank" class="btn btn-danger" href="add.php"><i class="fa fa-calendar"></i> Add
            </a>  
        </div>
            
      
         <div class="col-md-2" style="float:left;margin-left:33px;">
        <a target="_blank" class="btn btn-danger" href="list.php">
          <i class="fa fa-calendar"></i> Manage</a>
               
                
         </div>
        </div>

    </div>
    <!-- end calendar -->

        <br>
    <div class="row">

        <div class="col-md-12">
           <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th >Start Date</th>
                                        <th >End Date</th>
                                        <th >Ref. N&deg;</th>
                                        <th >Customer Name</th>
                                        <th >Prepared By</th>
                                        <th >Approved By</th>
                                        <th >Amount</th>
                                        <th >Dis(%)</th>
                                        <th >Dis Record</th>
                                        <th >After Dis</th>
                                        <th >Commission(%)</th>
                                        <th >Bonus Saveing</th>
                                        <th >Net Income</th>
                                       <!--  <th >Action</th> -->
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
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                   <!--  <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                   <!--  <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <!-- <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <!-- <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                   <!--  <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <!-- <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                   <!--  <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                            echo $row['user_phone_number'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                   <!--  <td>
                                     <a target="_blank" href="print.php?print_id=<?php// echo $//row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
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
                                            echo $row['user_phone_number'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['user_first_name'].' '.$row['user_last_name']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:65px;">
                                          <?php
                                            echo $row['pre_by'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['amount'],2);
                                          ?>
                                    </label>
                                    </td>

                                    <td>
                                       <label>
                                          $<?php
                                            echo number_format($row['discount_pre'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['discount_record'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['after_discount'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          <?php
                                            echo $row['commission'];
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['bonus_save'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                      <label>
                                          $<?php
                                            echo number_format($row['net_income'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <!-- <td>
                                     <a target="_blank" href="print.php?print_id=<?php //echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="Print"><i class="fa fa-print"></i>
                                    </a>
                                    </td> -->
                                    
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   
                    <!-- end tour quite -->
                                </tbody>
                            </table>
                      </div>
        </div>
        

    </div>
    
    




</div>



<style type="text/css">
    
    table th ,td {
        border: 1px solid black;
        text-align:center;
    }

.tip-content {
  font-weight: 100 !important;
  font-size: 10px;
}

    /* Hover tooltips */
.field-tip {
    position:relative;
    cursor:help;
}
    .field-tip .tip-content {
        position:absolute;
        top:-10px; /* - top padding */
        right:9999px;
        width:200px;
        margin-right:-220px; /* width + left/right padding */
        padding:10px;
        color:#fff;
        background:#333;
        -webkit-box-shadow:2px 2px 5px #aaa;
           -moz-box-shadow:2px 2px 5px #aaa;
                box-shadow:2px 2px 5px #aaa;
        opacity:0;
        -webkit-transition:opacity 250ms ease-out;
           -moz-transition:opacity 250ms ease-out;
            -ms-transition:opacity 250ms ease-out;
             -o-transition:opacity 250ms ease-out;
                transition:opacity 250ms ease-out;
    }
        /* <http://css-tricks.com/snippets/css/css-triangle/> */
        .field-tip .tip-content:before {
            content:' '; /* Must have content to display */
            position:absolute;
            top:50%;
            left:-16px; /* 2 x border width */
            width:0;
            height:0;
            margin-top:-8px; /* - border width */
            border:8px solid transparent;
            border-right-color:#333;
        }
        .field-tip:hover .tip-content {
            right:-20px;
            opacity:1;
        }
   
</style>
<?php include_once '../layout/footer.php' ?>

<script type="text/javascript">
$('.class_tooltips').tooltip('show');
</script>