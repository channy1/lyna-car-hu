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
     $txt_date = @$connect->real_escape_string($_POST['txt_date']);
    
      $txt_vendor_name = @$connect->real_escape_string($_POST['txt_vendor_name']);
      $txt_mileage_record = @$connect->real_escape_string($_POST['txt_mileage_record']);
      $txt_name_garage = @$connect->real_escape_string($_POST['txt_name_garage']);
      $txt_description = @$connect->real_escape_string($_POST['txt_description']);
      $txt_select_box_type = @$connect->real_escape_string($_POST['txt_select_box_type']);
      $txt_plan_id = @$connect->real_escape_string($_POST['txt_plan_id']);
      $txt_qty = @$connect->real_escape_string($_POST['txt_qty']);
      $txt_unit_price = @$connect->real_escape_string($_POST['txt_unit_price']);
      $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);
      $txt_total = @$connect->real_escape_string($_POST['txt_total']);
      $txt_note = @$connect->real_escape_string($_POST['txt_note']);
      $txt_prepare = @$connect->real_escape_string($_POST['txt_prepare']);
      $txt_approved = @$connect->real_escape_string($_POST['txt_approved']);
      $txt_of_use = @$connect->real_escape_string($_POST['txt_of_use']);
      $query_add = "UPDATE tbl_repair SET 
                   add_date='$txt_date',
                   mileage='$txt_mileage_record',
                   name_grage='$txt_name_garage',
                   vender_id='$txt_vendor_name',
                   description='$txt_description',
                   type_box='$txt_select_box_type',
                   record_note='$txt_note',
                   qty='$txt_qty',
                   record_price='$txt_unit_price',
                   record_discount='$txt_discount',
                   record_total='$txt_total',
                   prepare_by='$txt_prepare',
                   approved_by='$txt_approved',
                   status_report='2',
                   time_use='$txt_of_use'
                   WHERE report_id='$edit_id'

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
           <center><h2>Edit</h2></center>
        </div>
    </div>

    <!-- calender start -->
          <?php
                    $id=$_GET['edit_id'];
                    $query="SELECT * FROM tbl_repair 
                                 WHERE report_id='$id'
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
           <form action="#" method="post" enctype="multipart/form-data">
            
              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Date </label>
                <div class="col-md-3">
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date" value="<?php echo $row['add_date'] ?>">
                </div>
            
             <label for="staticEmail" class="col-md-3 col-form-label">Mileage Record</label>
                <div class="col-md-3">
             <input  type="text" class="form-control"  name="txt_mileage_record" 
             value="<?php echo $row['mileage']; ?>">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Name Of Garage</label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_customer_name" 
                 value="<?php echo $row['name_grage']; ?>">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Vendor Name</label>
                <div class="col-md-3">
               <select name="txt_vendor_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                                      <option data-subtext="" value="">Select One</option>
                                       <?php
                                  $v_sql = "SELECT * FROM tbl_vendor
                                            ORDER BY verdor_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($rows = $result->fetch_assoc()){
                                    ?>
                                      <option
                                      <?php
                                        if($row['vender_id']==$rows['vendor_id']) {
                                          echo "selected='selected'";
                                        }
                                      ?>
                                       data-subtext="" value="<?php echo $rows['vendor_id']; ?>">
                                        <?php echo $rows['verdor_name']; ?>
                                       
                                        </option>
                                    <?php
                                         }
                                        } 
                                    ?>
                                    </select>
                </div>
                
              </div>

               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Description</label>
                <div class="col-md-3">
                <textarea name="txt_description" class="form-control">
                   <?php echo $row['description']; ?>
                 </textarea>
                </div>
             

            
            <label for="staticEmail" class="col-md-3 col-form-label">Type</label>
                <div class="col-md-3">
                <select name="txt_select_box_type" class="form-control">
                      <option <?php if($row['type_box']=='BOX') {echo "selected='selected'";} ?> value="BOX">BOX</option>
                      <option <?php if($row['type_box']=='SET') {echo "selected='selected'";} ?> value="SET">SET</option>
                      <option <?php if($row['type_box']=='PCS') {echo "selected='selected'";} ?> value="PCS">PCS</option>
                    </select>
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Prepared By</label>
                <div class="col-md-3">
                 <input type="text" value="<?php echo $row['prepare_by']; ?>" name="txt_prepare" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Approved By</label>
                <div class="col-md-3">
                    <input type="text" value="<?php echo $row['approved_by']; ?>" name="txt_approved" class="form-control">
                </div>
                
              </div>

               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Note</label>
                <div class="col-md-3">
                 <textarea name="txt_note" class="form-control">
                   <?php echo $row['record_note']; ?>
                 </textarea>
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">N&deg; of Use</label>
                <div class="col-md-3">
                   <input class="form-control" value="<?php echo $row['time_use']; ?>" type="text" name="txt_of_use">
                </div>
                
              </div>

               
              <div class="form-group row form_group_custom">
               
          
          <div class="table-responsive">
            <table class="table table-bordered" >
                                <thead>
                                    <tr style="width: 100%;">
                                        
                                        <th style="width:2%;">Qty</th>
                                        <th style="width: 10%;">Unit Price</th>
                                        <th style="width: 10%;">Discount</th>
                                        <th style="width: 10%;">Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    
                                  <tr>
                                    <td>
                                      <input value="<?php echo $row['qty']; ?>" class="form-control" type="text" name="txt_qty" id="txt_qty">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['record_price']; ?>" class="form-control" type="text" name="txt_unit_price" id="txt_unit_price">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['record_discount']; ?>" class="form-control" type="text" name="txt_discount" id="txt_discount">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['record_total']; ?>" class="form-control" type="text" name="txt_total" id="txt_total">
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

         

         function  ex_total_calulator(){
          
          var v_j_qty=$("#txt_qty").val();
          var v_j_price=$("#txt_unit_price").val();
          var v_j_discount=$("#txt_discount").val();

        
        

          // profit
             var v_j_total_price=parseFloat(v_j_price) * parseFloat(v_j_qty);
             var v_j_total_discount=parseFloat(v_j_total_price)-parseFloat(v_j_total_price * v_j_discount)/100;
             var v_j_total_net=v_j_total_discount;

            $("#txt_total").val(v_j_total_net);
          // end profit

         

        }

        $('#txt_qty').on('input', function(){ 
             ex_total_calulator();
          });
        $('#txt_unit_price').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_discount').on('input', function(){ 
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