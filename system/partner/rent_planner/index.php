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
           <center><h2>PRODUCTS RENTAL PLANNER</h2></center>
        </div>
    </div>

    <!-- calender start -->
    <div class="row">
        <div class="col-md-7">
            <form>
              <?php
                $s_input_month=@$connect->real_escape_string($_GET['txt_month']);
                $s_input_year=@$connect->real_escape_string($_GET['txt_year']);
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
               
                <a target="_blank" class="btn btn-danger" href="print_planner.php?txt_month=<?php echo $s_input_month; ?>&txt_year=<?php echo $s_input_year; ?>">
          <i class="fa fa-print"></i> Print Plan</a>
             </div>

              </div>
              
              
            </form>
        </div>
        

        <div class="col-md-5">

            
        <div class="col-md-2" style="float:left;margin-left:10px;">
        <a target="_blank" class="btn btn-danger" href="add_plan.php"><i class="fa fa-calendar"></i> Add Plan</a>
               
                
        </div>
         <div class="col-md-2" style="float:left;margin-left:49px;">
        <a target="_blank" class="btn btn-danger" href="plan_list.php">
          <i class="fa fa-calendar"></i> Manage</a>
               
                
         </div>

             <!--  <div class="col-md-1">
               
                <button type="button" class="btn btn-danger"><i class="fa fa-calendar"></i> Edit Plan</button>
             </div>
              <div class="col-md-1">
               
                <button type="button" class="btn btn-danger"><i class="fa fa-calendar"></i> Print Plan</button>
             </div>
              <div class="col-md-1">
               
                <button type="button" class="btn btn-danger"><i class="fa fa-calendar"></i> Delete</button>
             </div> -->
        </div>

    </div>
    <!-- end calendar -->

        <br>
    <div class="row">

        <div class="col-md-12">
            <table style="width:100%">
                 <!--  <caption>Monthly savings</caption> -->
                  <tr style="width: 100%;">
                    <th style="width:3%;">ITEMS/DATE</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                      <th style="width:3%;"><?php echo $i; ?></th>
                    <?php } ?>
                  </tr>
                  

                  <tbody>

    <!-- Vehicle -->

        <tr style="background-color: #A4509F;color: white;text-transform: uppercase;">
                    <th style="text-align: left;">Vehicle</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                    <th></th>
                        <?php } ?>
      </tr>

                 <?php
          $id=@$_SESSION['user']->user_id;                
          $search_month = @$connect->real_escape_string($_GET['txt_month']);
          $search_year = @$connect->real_escape_string($_GET['txt_year']);
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
                     $query="SELECT tbl_vehicle_rantal.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_schedule_admin.ref_no=tbl_vehicle_rantal.ve_id
                                WHERE sc_type='Vehicle' and user_id = $id
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];
                            $customer_name=$row['customer_name'];

                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;

                            // calulate date


                             $range_year_from=date('Y', strtotime($gey_year_from));
                             $range_day_from=date("d",strtotime($gey_year_from));
                             $range_year_to=date('Y', strtotime($get_year_to));
                             $range_day_to=date("d",strtotime($get_year_to));
                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['placque_no']; ?></th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                    ?>
                     
                      <?php
                       if( ($i>=$range_day_from) && ($i<=$range_day_to)) {
                      ?>

                      <th  style="border-left: none;
    border-right: none;background-color:<?php echo $bg_color; ?>">
                       <?php
                         if($i==$range_day_to){
                       ?>
                        <span class="field-tip">
                          <i class="fa fa-eye"></i>
                            <span class="tip-content">
                              <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
                              <br>
                              <?php
                               echo $row['remark'];
                              ?>
                                
                              </span>
                        </span> 
                      
                      <?php } ?>
                      </th>
                      <?php } else {?>
                        <th>
                        </th>
                      <?php  } ?>
                        <?php } ?>
                    </tr>
                        <?php
                        }
                      }
                    ?>
      <!-- Vehicle -->

      <!-- Driver -->

        <tr style="background-color: #A4509F;color: white;text-transform: uppercase;">
                    <th style="text-align: left;">Driver</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                    <th></th>
                        <?php } ?>
      </tr>

                 <?php
          $search_month = @$connect->real_escape_string($_GET['txt_month']);
          $search_year = @$connect->real_escape_string($_GET['txt_year']);
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
                     $query="SELECT tbl_users.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_users
                                ON tbl_schedule_admin.ref_no=tbl_users.user_id
                                WHERE sc_type='Driver' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];

                            $customer_name=$row['customer_name'];

                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;

                            // calulate date


                             $range_year_from=date('Y', strtotime($gey_year_from));
                             $range_day_from=date("d",strtotime($gey_year_from));
                             $range_year_to=date('Y', strtotime($get_year_to));
                             $range_day_to=date("d",strtotime($get_year_to));
                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['user_phone_number']; ?></th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                    ?>
                      <?php
                       if( ($i>=$range_day_from) && ($i<=$range_day_to)) {
                      ?>
                        <th style="border-left: none;
    border-right: none;background-color:<?php echo $bg_color; ?>">
                           <?php
                         if($i==$range_day_to){
                       ?>
                       <span class="field-tip">
                           <i class="fa fa-eye"></i>
                            <span class="tip-content">
                              <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
                              <br>
                              <?php
                               echo $row['remark'];
                              ?>
                                
                              </span>
                        </span> 
                      <?php } ?>
                        </th>
                      <?php } else {?>
                        <th>
                        </th>
                      <?php  } ?>
                        <?php } ?>
                    </tr>
                        <?php
                        }
                      }
                    ?>
      <!-- Driver -->

       <!-- Tour Guide -->

        <tr style="background-color: #A4509F;color: white;text-transform: uppercase;">
                    <th style="text-align: left;">Tour Guide</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                    <th></th>
                        <?php } ?>
      </tr>

                 <?php
          $search_month = @$connect->real_escape_string($_GET['txt_month']);
          $search_year = @$connect->real_escape_string($_GET['txt_year']);
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
                     $query="SELECT tbl_users.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_users
                                ON tbl_schedule_admin.ref_no=tbl_users.user_id
                                WHERE sc_type='T.Quide' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];

                              $customer_name=$row['customer_name'];

                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;

                            // calulate date
                             $range_year_from=date('Y', strtotime($gey_year_from));
                             $range_day_from=date("d",strtotime($gey_year_from));
                             $range_year_to=date('Y', strtotime($get_year_to));
                             $range_day_to=date("d",strtotime($get_year_to));
                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['user_phone_number']; ?></th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                    ?>
                      <?php
                       if( ($i>=$range_day_from) && ($i<=$range_day_to)) {
                      ?>
                        <th  style="border-left: none;
    border-right: none;background-color:<?php echo $bg_color; ?>">
                       <?php
                         if($i==$range_day_to){
                       ?>
                        <span class="field-tip">
                           <i class="fa fa-eye"></i>
                            <span class="tip-content">
                              <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
                              <br>
                              <?php
                               echo $row['remark'];
                              ?>
                                
                              </span>
                        </span> 
                      <?php } ?>
                      </th>
                      <?php } else {?>
                        <th>
                        </th>
                      <?php  } ?>
                        <?php } ?>
                    </tr>
                        <?php
                        }
                      }
                    ?>
      <!-- Tour Guide -->

        <!-- RickShaw -->

        <tr style="background-color: #A4509F;color: white;text-transform: uppercase;">
                    <th style="text-align: left;">RICKSHAW</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                    <th></th>
                        <?php } ?>
      </tr>

                 <?php
          $search_month = @$connect->real_escape_string($_GET['txt_month']);
          $search_year = @$connect->real_escape_string($_GET['txt_year']);
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
                     $query="SELECT tbl_rick_shaw_rental_last.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_rick_shaw_rental_last
                                ON 
                                tbl_schedule_admin.ref_no=tbl_rick_shaw_rental_last.ve_id
                                WHERE sc_type='RickShaw' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];
                            $customer_name=$row['customer_name'];

                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;

                            // calulate date

                             $range_year_from=date('Y', strtotime($gey_year_from));
                             $range_day_from=date("d",strtotime($gey_year_from));
                             $range_year_to=date('Y', strtotime($get_year_to));
                             $range_day_to=date("d",strtotime($get_year_to));
                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['ve_ref_no']; ?></th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                    ?>
                      <?php
                       if( ($i>=$range_day_from) && ($i<=$range_day_to)) {
                      ?>
                       <th  style="border-left: none;
    border-right: none;background-color:<?php echo $bg_color; ?>">
                       <?php
                         if($i==$range_day_to){
                       ?>
                        <span class="field-tip">
                           <i class="fa fa-eye"></i>
                            <span class="tip-content">
                              <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
                              <br>
                              <?php
                               echo $row['remark'];
                              ?>
                                
                              </span>
                        </span> 
                      <?php } ?>
                      </th>
                      <?php } else {?>
                        <th>
                        </th>
                      <?php  } ?>
                        <?php } ?>
                    </tr>
                        <?php
                        }
                      }
                    ?>
      <!-- RickShaw -->

        <!-- Accessories -->

        <tr style="background-color: #A4509F;color: white;text-transform: uppercase;">
                    <th style="text-align: left;">Accessories</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                    <th></th>
                        <?php } ?>
      </tr>

                 <?php
          $search_month = @$connect->real_escape_string($_GET['txt_month']);
          $search_year = @$connect->real_escape_string($_GET['txt_year']);
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
                     $query="SELECT tbl_accessories_rental.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_accessories_rental
                                ON 
                                tbl_schedule_admin.ref_no=tbl_accessories_rental.ac_id
                                WHERE sc_type='Accessories' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];

                            $customer_name=$row['customer_name'];

                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;

                            // calulate date
                             $range_year_from=date('Y', strtotime($gey_year_from));
                             $range_day_from=date("d",strtotime($gey_year_from));
                             $range_year_to=date('Y', strtotime($get_year_to));
                             $range_day_to=date("d",strtotime($get_year_to));
                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['ac_ref_no']; ?></th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                    ?>
                      <?php
                       if( ($i>=$range_day_from) && ($i<=$range_day_to)) {
                      ?>
                       <th  style="border-left: none;
    border-right: none;background-color:<?php echo $bg_color; ?>">
                       <?php
                         if($i==$range_day_to){
                       ?>
                        <span class="field-tip">
                           <i class="fa fa-eye"></i>
                            <span class="tip-content">
                              <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
                              <br>
                              <?php
                               echo $row['remark'];
                              ?>
                                
                              </span>
                        </span> 
                      <?php } ?>
                      </th>
                      <?php } else {?>
                        <th>
                        </th>
                      <?php  } ?>
                        <?php } ?>
                    </tr>
                        <?php
                        }
                      }
                    ?>
      <!-- Accessories -->

                  </tbody>
            </table>
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