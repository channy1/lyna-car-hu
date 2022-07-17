<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST['btn_add'])){
      
      
      $txt_from = @$connect->real_escape_string($_POST['txt_from']);
      $txt_to = @$connect->real_escape_string($_POST['txt_to']);
      $txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
      $txt_phone = @$connect->real_escape_string($_POST['txt_phone']);
      $txt_email = @$connect->real_escape_string($_POST['txt_email']);
      $txt_color = @$connect->real_escape_string($_POST['txt_color']);
      $txt_remark = @$connect->real_escape_string($_POST['txt_remark']);
      $txt_plan_id = @$connect->real_escape_string($_POST['txt_plan_id']);
      $txt_status = @$connect->real_escape_string($_POST['txt_status']);
      $txt_customer_title = @$connect->real_escape_string($_POST['txt_customer_title']);

      if($txt_plan_id=="Vehicle"){
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_car_id']);
      }
      elseif ($txt_plan_id=="T.Quide") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_tr_id']);
      }
       elseif ($txt_plan_id=="Driver") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_driver_id']);
      }
       elseif ($txt_plan_id=="RickShaw") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_rick_id']);
      }
      elseif ($txt_plan_id=="Accessories") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_acc_id']);
      }
      else {
        $insert_ref_id=0;
      }

      $id=@$_SESSION['user']->user_id;

      $query_add = "INSERT INTO tbl_schedule_admin (
                   ref_no,
                   from_date,
                   to_date,
                   customer_name,
                   cell_phone,
                   email,
                   remark,
                   color_note,
                   sc_type,
                   sc_status,
                   sc_title,
                   user_id
                 

                    ) VALUES(
                   '$insert_ref_id',
                   '$txt_from',
                   '$txt_to',
                   '$txt_customer_name',
                   '$txt_phone',
                   '$txt_email',
                   '$txt_remark',
                   '$txt_color',
                   '$txt_plan_id',
                   '$txt_status',
                   '$txt_customer_title',
                   '$id'


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
           <center><h2>Make New Schedule</h2></center>
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
                <label for="staticEmail" class="col-md-1 col-form-label">T.Quide</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_tr_id" name="txt_plan_id" value="T.Quide">
                </div>
             

            
             <label for="staticEmail" class="col-md-1 col-form-label"> RickShaw</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_rick_id" name="txt_plan_id" value="RickShaw">
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
                
                </div>
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">From </label>
                <div class="col-md-3">
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_from" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">To</label>
                <div class="col-md-3">
             <input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control"  name="txt_to" value="">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Customer Name </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_customer_name" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Cell Phone</label>
                <div class="col-md-3">
                 <input type="text" class="form-control"  name="txt_phone" value="">
                </div>
                
              </div>

               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Time </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_customer_title" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Status</label>
                <div class="col-md-3">
                 <!-- <input type="text" class="form-control"  name="txt_status" value=""> -->
                 <select class="form-control" name="txt_status">
                   <option value="Confirmed">Confirmed</option>
                   <option value="NOT YET">NOT YET</option>
                   <option value="Follow-up">Follow-up</option>
                 </select>
                </div>
                
              </div>

                <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">E-mail </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_email" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Color</label>
                <div class="col-md-3">
              <input type="color" class="form-control"  name="txt_color" value="#ff0000">
                </div>
                
              </div>
              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Remarks </label>
                <div class="col-md-3">
                  <textarea class="form-control" name="txt_remark">
                    
                  </textarea>
               
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
    #txt_refo_tr_id,#txt_refo_acc_id,#txt_refo_rick_id {
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
           });

          $("#txt_driver_id").click(function()
           {
           $("#txt_refo_driver_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
           });

           $("#txt_tr_id").click(function()
           {
           $("#txt_refo_tr_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
           });

            $("#txt_rick_id").click(function()
           {
           $("#txt_refo_rick_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
           });

            $("#txt_acc_id").click(function()
           {
           $("#txt_refo_acc_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
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