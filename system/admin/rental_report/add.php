<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST['btn_add'])){
      $txt_start_date = @$connect->real_escape_string($_POST['txt_start_date']);
      $txt_end_date = @$connect->real_escape_string($_POST['txt_end_date']);
      $txt_of_use = @$connect->real_escape_string($_POST['txt_of_use']);
      $txt_customer_id = @$connect->real_escape_string($_POST['txt_customer_id']);
      $txt_broke = @$connect->real_escape_string($_POST['txt_broke']);
      $txt_date_paid = @$connect->real_escape_string($_POST['txt_date_paid']);
      $txt_plan_id = @$connect->real_escape_string($_POST['txt_plan_id']);
      $txt_prepare = @$connect->real_escape_string($_POST['txt_prepare']);
      $txt_approved = @$connect->real_escape_string($_POST['txt_approved']);
      $txt_note = @$connect->real_escape_string($_POST['txt_note']);
      $txt_amount = @$connect->real_escape_string($_POST['txt_amount']);
      $txt_dis = @$connect->real_escape_string($_POST['txt_dis']);
      $txt_dis_total = @$connect->real_escape_string($_POST['txt_dis_total']);
      $txt_after_dis = @$connect->real_escape_string($_POST['txt_after_dis']);
      $txt_com = @$connect->real_escape_string($_POST['txt_com']);
      $txt_bonus_save = @$connect->real_escape_string($_POST['txt_bonus_save']);
      $txt_net_income = @$connect->real_escape_string($_POST['txt_net_income']);
      $txt_deposit = @$connect->real_escape_string($_POST['txt_deposit']);
      $txt_refund = @$connect->real_escape_string($_POST['txt_refund']);
      $txt_ld = @$connect->real_escape_string($_POST['txt_ld']);

      if($txt_plan_id=="Vehicle"){
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_car_id']);
      }
       elseif ($txt_plan_id=="RickShaw") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_rick_id']);
      }
      elseif ($txt_plan_id=="Accessories") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_acc_id']);
      }
       elseif ($txt_plan_id=="Driver") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_driver_id']);
      }
       elseif ($txt_plan_id=="T.Quide") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_tr_id']);
      }
       elseif ($txt_plan_id=="hotel_quest") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_hotel_id']);
      }
       elseif ($txt_plan_id=="city_tour") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_city_tour_id']);
      }
       elseif ($txt_plan_id=="pickup_drop") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_pick_up_id']);
      }
       elseif ($txt_plan_id=="airport") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_airport_id']);
      }
      else {
        $insert_ref_id=0;
      }

     

      $query_add = "INSERT INTO tbl_rental_report(
                   customer_id,
                   ref_id,
                   start_date,
                   end_date,
                   date_paid,
                   pre_by,
                   app_by,
                   time_use,
                   amount,
                   discount_pre,
                   discount_record,
                   after_discount,
                   commission,
                   bonus_save,
                   net_income,
                   broke,
                   note,
                   type,
                   status_type,
                   deposit_report,
                   refund_report,
                   ld_ass_report

                    ) VALUES(
                   '$txt_customer_id',
                   '$insert_ref_id',
                   '$txt_start_date',
                   '$txt_end_date',
                   '$txt_date_paid',
                   '$txt_prepare',
                   '$txt_approved',
                   '$txt_of_use',
                   '$txt_amount',
                   '$txt_dis',
                   '$txt_dis_total',
                   '$txt_after_dis',
                   '$txt_com',
                   '$txt_bonus_save',
                   '$txt_net_income',
                   '$txt_broke',
                   '$txt_note',
                   '$txt_plan_id',
                   '1',
                   '$txt_deposit',
                   '$txt_refund',
                   '$txt_ld'

                    )";
            if($connect->query($query_add)){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> '.mysqli_error($connect).'...
                </div>';   
            }



    }
?>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
          <a href="index.php" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back
          </a>
          <div class="row">
            <div class="col-xs-12">
            <?= @$sms ?>
                  <h2><i class="fa fa-plus-circle fa-fw"></i>Create Record</h2>
              </div>
          </div>
           <center><h2>Make Rental Report</h2></center>
        </div>
    </div>

    <!-- calender start -->
   
           <form action="#" method="post" enctype="multipart/form-data">
               <div class="form-group row">
                <label for="staticEmail" class="col-md-1 col-form-label"> Vehicle</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_vehicle_id" name="txt_plan_id" value="Vehicle">
                </div>

             <label for="staticEmail" class="col-md-1 col-form-label"> Driver</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_driver_id" name="txt_plan_id" value="Driver">
                </div>
        <label for="staticEmail" class="col-md-1 col-form-label"> Accessories </label>
                <div class="col-md-3">
                  &nbsp;<input type="radio" id="txt_acc_id" name="txt_plan_id" value="Accessories">
                </div>

              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-md-1 col-form-label">T.Guide</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_tr_id" name="txt_plan_id" value="T.Quide">
                </div>
             

            
             <label for="staticEmail" class="col-md-1 col-form-label"> RickShaw</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_rick_id" name="txt_plan_id" value="RickShaw">
                </div>

                <label for="staticEmail" class="col-md-1 col-form-label">Hotel </label>
                <div class="col-md-3">
                 <input type="radio" id="txt_hotel_id" name="txt_plan_id" value="hotel_quest">
                </div>
                
              </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-md-1 col-form-label">City.T </label>
                <div class="col-md-3">
                 <input type="radio" id="txt_city_tour_id" name="txt_plan_id" value="city_tour">
                </div>
                 <label for="staticEmail" class="col-md-1 col-form-label">Pick&Drop </label>
                <div class="col-md-3">
                 <input type="radio" id="txt_pick_up_id" name="txt_plan_id" value="pickup_drop">
                </div>
                <label for="staticEmail" class="col-md-1 col-form-label">Airport</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_airport_id" name="txt_plan_id" value="airport">
                </div>
            </div>
           

               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Ref. N&deg;</label>
                <div class="col-md-5">
                  <select name="txt_refo_car_id" id="txt_refo_car_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_vehicle_rantal";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['ve_id']; ?>">
                      <?php echo $row['ve_ref_no']; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                  <select name="txt_refo_driver_id" id="txt_refo_driver_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_users
                                INNER JOIN tbl_relationship_users_position 
                        On tbl_users.user_id = tbl_relationship_users_position.user_id
                         WHERE  user_position='3' AND user_position_id='8'
                         ORDER BY user_first_name
                        ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['user_id']; ?>">
                      <?php echo $row['user_first_name']; ?>  
                      <?php echo $row['user_last_name']; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                   <select name="txt_refo_tr_id" id="txt_refo_tr_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_users
                                INNER JOIN tbl_relationship_users_position 
                        On tbl_users.user_id = tbl_relationship_users_position.user_id
                         WHERE  user_position='3' AND user_position_id='7'
                         ORDER BY user_first_name
                        ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['user_id']; ?>">
                      <?php echo $row['user_first_name']; ?>  
                      <?php echo $row['user_last_name']; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>

                  <select name="txt_refo_acc_id" id="txt_refo_acc_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_accessories_rental
                                
                        ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['ac_id']; ?>">
                      <?php echo $row['ac_ref_no']; ?>  
                      </option>
                    <?php
                        }
                      }
                    ?>
                  </select>

                  <select name="txt_refo_rick_id" id="txt_refo_rick_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_rick_shaw_rental_last
                                
                        ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['ve_id']; ?>">
                      <?php echo $row['ve_ref_no']; ?>  
                      </option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                  <select name="txt_refo_hotel_id" id="txt_refo_hotel_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_hotel
                                
                        ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['ht_id']; ?>">
                      <?php echo $row['ht_title']; ?> 
                      <?php echo $row['ht_website']; ?>   
                      </option>
                    <?php
                        }
                      }
                    ?>
                  </select>

                 <select name="txt_refo_city_tour_id" id="txt_refo_city_tour_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_vehicle_rantal";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['ve_id']; ?>">
                      <?php echo $row['ve_ref_no']; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>

                   <select name="txt_refo_pick_up_id" id="txt_refo_pick_up_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_vehicle_rantal";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['ve_id']; ?>">
                      <?php echo $row['ve_ref_no']; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                   <select name="txt_refo_airport_id" id="txt_refo_airport_id" class="form-control">
                    <?php
                     $query="SELECT * FROM tbl_vehicle_rantal";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['ve_id']; ?>">
                      <?php echo $row['ve_ref_no']; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>


                </div>
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Start Date </label>
                <div class="col-md-3">
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_start_date" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">End Date</label>
                <div class="col-md-3">
            <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_end_date" value="">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">N&deg; of Use</label>
                <div class="col-md-3">
                   <input class="form-control" type="text" name="txt_of_use">
                </div>
             

              <label for="staticEmail" class="col-md-3 col-form-label">Customer Name</label>
                <div class="col-md-3">
                <select name="txt_customer_id" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                                      <option data-subtext="" value="">Select One</option>
                                       <?php
                                  $v_sql = "SELECT * FROM tbl_users WHERE user_first_name !='' AND user_last_name !=''
                                            ORDER BY user_first_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                    ?>
                                      <option data-subtext="" value="<?php echo $row['user_id']; ?>">
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

               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Broke Down History</label>
                <div class="col-md-3">
                <input type="text" name="txt_broke" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Date paid Bonus</label>
                <div class="col-md-3">
                   <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date_paid" value="">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Prepared By</label>
                <div class="col-md-3">
                 <input type="text" name="txt_prepare" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Approved By</label>
                <div class="col-md-3">
                    <input type="text" name="txt_approved" class="form-control">
                </div>
                
              </div>


               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Customer History Notes</label>
                <div class="col-md-3">
                 <textarea name="txt_note" class="form-control">
                   
                 </textarea>
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label"></label>
                <div class="col-md-3">
                  
                </div>
                
              </div>

               
              <div class="form-group row form_group_custom">
               
          
          <div class="table-responsive">
            <table class="table table-bordered" >
                                <thead>
                                    <tr style="width: 100%;">
                                        <th style="width:7%;">Deposit</th>
                                        <th style="width:10%;">Refund Deposit</th>
                                        <th style="width:10%;">LD.Asst Fee</th>
                                        <th style="width:2%;">Amount</th>
                                        <th style="width: 10%;">Discount(%)</th>
                                        <th style="width: 10%;">Discount Record</th>
                                        <th style="width: 10%;">After Discount</th>
                                        <th style="width: 10%;">Commission(%)</th>
                                        <th style="width: 10%;">Bonus Saving</th>
                                        <th style="width: 10%;">Net Income</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    
                                  <tr>
                                    <td>
                                      <input class="form-control" type="text" name="txt_deposit" id="txt_deposit">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_refund" id="txt_refund">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_ld" id="txt_ld">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_amount" id="txt_amount">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_dis" id="txt_dis">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_dis_total" id="txt_dis_total">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_after_dis" id="txt_after_dis">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_com" id="txt_com">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_bonus_save" id="txt_bonus_save">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_net_income" id="txt_net_income">
                                    </td>
                                  </tr>
                                                                  
                                </tbody>
                            </table>
                      </div>
                
              </div>
             

            
               <br>

              <div class="row" style="float: right;">
                  <div class="col-md-12 text-center">
                      <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                  <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                  <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                </div>
              </div>
              <br>

              
              
            </form>
       
    <!-- end calendar -->

        <br>
    
    
    




</div>



<style type="text/css">
    
    table th ,td {
        border: 1px solid black;
        text-align:center;
    }
    .form_group_custom {
      margin-bottom: 10px;
      margin-top: 20px;
    }
    #txt_refo_car_id,#txt_refo_driver_id,
    #txt_refo_tr_id,#txt_refo_acc_id,#txt_refo_rick_id,#txt_refo_hotel_id,#txt_refo_city_tour_id ,#txt_refo_pick_up_id,#txt_refo_airport_id{
      display: none;
    }
</style>
<?php include_once '../layout/footer.php' ?>

<script type="text/javascript">

  // start option select
      $(document).ready(function () 
         { 
          $("#txt_vehicle_id").click(function()
           {
           $("#txt_refo_car_id").css("display", "block");

            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });

          $("#txt_driver_id").click(function()
           {
           $("#txt_refo_driver_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });

           $("#txt_tr_id").click(function()
           {
           $("#txt_refo_tr_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });

            $("#txt_rick_id").click(function()
           {
           $("#txt_refo_rick_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });

            $("#txt_acc_id").click(function()
           {
           $("#txt_refo_acc_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });

             $("#txt_hotel_id").click(function()
           {
           $("#txt_refo_hotel_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });

              $("#txt_city_tour_id").click(function()
           {
           $("#txt_refo_city_tour_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });


           $("#txt_pick_up_id").click(function()
           {
           $("#txt_refo_pick_up_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_airport_id").css("display", "none");
           });


            $("#txt_airport_id").click(function()
           {
           $("#txt_refo_airport_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
            $("#txt_refo_hotel_id").css("display", "none");
            $("#txt_refo_city_tour_id").css("display", "none");
            $("#txt_refo_pick_up_id").css("display", "none");
           });








        function  ex_total_calulator(){
          
          var v_j_amount=$("#txt_amount").val();
          var v_j_discount=$("#txt_dis").val();
          var v_j_after_discount=$("#txt_after_dis").val();
          var v_j_bonus_save=$("#txt_bonus_save").val();
          var v_j_net_income=$("#txt_net_income").val();
          var v_j_dicount_total=$("#txt_dis_total").val();
          var v_j_com=$("#txt_com").val();
          // calulate
             var discount_record=parseFloat(v_j_amount)- parseFloat(v_j_amount * v_j_discount)/100;
             var count_dis=parseFloat(v_j_amount-discount_record);

            $("#txt_dis_total").val(count_dis);
            var after_discount=parseFloat(v_j_amount-count_dis);
            $("#txt_after_dis").val(after_discount);


            var bonus_save=parseFloat(after_discount * v_j_com)/100;
            $("#txt_bonus_save").val(bonus_save);

            var net_income=parseFloat(after_discount-bonus_save);
            $("#txt_net_income").val(net_income);
          // end calulate

        }



        $('#txt_amount').on('input', function(){ 
             ex_total_calulator();
          });
        $('#txt_dis').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_dis_total').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_after_dis').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_bonus_save').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_net_income').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_com').on('input', function(){ 
             ex_total_calulator();
          });
         


           
      });
  // end start option
// start year
        var min = new Date().getFullYear(),
            max = min + 9,
            select = document.getElementById('selectyear');

        for (var i = min; i<=max; i++){
            var opt = document.createElement('option');
            opt.value = i;
            opt.innerHTML = i;
            select.appendChild(opt);
        }
// end year
</script>