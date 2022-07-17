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
           <center style="text-transform: uppercase;"><h2>monthly commission calculation list</h2></center>
        </div>
    </div>

    <!-- calender start -->
    <div class="row">
        <div class="col-md-8">
            <form>
              <?php
                $s_input_month=@$connect->real_escape_string($_GET['txt_month']);
                $s_input_year=@$connect->real_escape_string($_GET['txt_year']);
                $s_txt_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);

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
                <div class="col-md-4">
                  <select name="txt_parner_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                                      <option data-subtext="" value="">Select One</option>
                                       <?php
                                  $v_sql = "SELECT * FROM tbl_users 
                                            INNER JOIN tbl_relationship_users_position
                                            ON tbl_users.user_id=tbl_relationship_users_position.user_id
                                            WHERE  tbl_relationship_users_position.user_position_id='10' 
                                            AND
                                             user_first_name !='' AND user_last_name !=''
                                            ORDER BY user_first_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                    ?>
                                      <option

                                      <?php
                                        if($s_txt_parner_name==$row['user_id']) {
                                          echo "selected='selected'";
                                        }
                                      ?>

                                       data-subtext="" value="<?php echo $row['user_id']; ?>">
                                        <?php echo $row['user_first_name']; ?>
                                        <?php echo $row['user_last_name']; ?>
                                        </option>
                                    <?php
                                         }
                                        } 
                                    ?>
                                    </select>
                </div>
            
              </div>
                <br>
              <div class="form-group row" style="float: right;">
                
                 <div class="col-md-2">
                        <button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
                     </div>
                     <div class="col-md-2">
                       
                        <a target="_blank" class="btn btn-danger" href="print_monthly_commision.php?txt_month=<?php echo $s_input_month; ?>&txt_year=<?php echo $s_input_year; ?>&txt_parner_name=<?php echo $s_txt_parner_name; ?>">
                        <i class="fa fa-print"></i> Print Com</a>
                     </div>

              </div>
              
              
            </form>
        </div>
        

        <div class="col-md-4">

            
        <div class="col-md-2" style="float:left;">
        <a target="_blank" class="btn btn-danger" href="add_m_commision.php"><i class="fa fa-calendar"></i> Add</a>
               
                
        </div>
         <div class="col-md-2" style="float:left;margin-left:33px;">
        <a target="_blank" class="btn btn-danger" href="monthly_commision_list.php">
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
                                        <th >Customer's Name</th>
                                        <th >Cus.ID N&deg;</th>
                                        <th >Comm%</th>
                                        <th >Ref. N&deg;</th>
                                        <th >Invoice. N&deg;</th>
                                        <th >Income</th>
                                        <th colspan="8" style="width: 48%;">Expenses</th>
                                        <th >Ex Total</th>
                                        <th >Profit</th>
                                        <th >Free Comm%</th>
                                        <th >Net Profit</th>
                                        
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

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

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
                                      <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['ex_total'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                         <label style="width:110px;">
                                          $<?php
                                            echo number_format($row['free_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:70px;">
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

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

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
                                      <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['ex_total'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                         <label style="width:110px;">
                                          $<?php
                                            echo number_format($row['free_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:70px;">
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

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

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
                                      <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['ex_total'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:60px;">
                                          $<?php
                                            echo number_format($row['profit'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                         <label style="width:110px;">
                                          $<?php
                                            echo number_format($row['free_comm'],2);
                                          ?>
                                       </label>
                                    </td>
                                    <td>
                                     <label style="width:70px;">
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