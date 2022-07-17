<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST['btn_add'])){
      
      $edit_id=$_GET['edit_id'];
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
      $query_add = "UPDATE tbl_schedule_admin SET 
                   from_date='$txt_from',
                   to_date='$txt_to',
                   customer_name='$txt_customer_name',
                   cell_phone='$txt_phone',
                   email='$txt_email',
                   remark='$txt_remark',
                   color_note='$txt_color',
                   sc_status='$txt_status',
                   sc_title='$txt_customer_title'
                   WHERE se_id='$edit_id'

                    ";
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
           <center><h2>Edit Schedule</h2></center>
        </div>
    </div>

    <!-- calender start -->
          <?php
                    $id=$_GET['edit_id'];
                    $query="SELECT * FROM tbl_schedule_admin 
                                 WHERE se_id='$id'
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
           <form action="#" method="post" enctype="multipart/form-data">
            
              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">From </label>
                <div class="col-md-3">
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_from" 
              value="<?php echo $row['from_date']; ?>">
                </div>
            
             <label for="staticEmail" class="col-md-3 col-form-label">To</label>
                <div class="col-md-3">
             <input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control"  name="txt_to"
             value="<?php echo $row['to_date']; ?>">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Customer Name </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_customer_name" 
                 value="<?php echo $row['customer_name']; ?>">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Cell Phone</label>
                <div class="col-md-3">
                 <input type="text" class="form-control"  name="txt_phone" 
                 value="<?php echo $row['cell_phone']; ?>">
                </div>
                
              </div>

               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Time </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_customer_title" 
                 value="<?php echo $row['sc_title']; ?>">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Status</label>
                <div class="col-md-3">
                 <select class="form-control" name="txt_status">
                   <option value="Confirmed" <?php if($row['sc_status']=="Confirmed"){echo 'selected';}?>>Confirmed</option>
                   <option value="NOT YET" <?php if($row['sc_status']=="NOT YET"){echo 'selected';}?>>NOT YET</option>
                   <option value="Follow-up" <?= ($row['sc_status']=='Follow-up')? 'selected':' '; ?>>Follow-up</option>
                 </select>
                </div>
                
              </div>

                <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">E-mail </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_email" 
                 value="<?php echo $row['email']; ?>">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Color</label>
                <div class="col-md-3">
              <input type="color" class="form-control"  name="txt_color" 
              value="<?php echo $row['color_note']; ?>">
                </div>
                
              </div>
              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Remarks </label>
                <div class="col-md-3">
                  <textarea class="form-control" name="txt_remark">
                    <?php echo $row['remark']; ?>
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
       <?php
           }
        }
       ?>
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