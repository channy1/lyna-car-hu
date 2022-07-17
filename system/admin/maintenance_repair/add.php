<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST['btn_add'])){
      
      
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
     

      if($txt_plan_id=="Vehicle"){
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_car_id']);

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

     

      $query_add = "INSERT INTO tbl_repair (
                   ref_no,
                   add_date,
                   vender_id,
                   mileage,
                   name_grage,
                   description,
                   type_box,
                   qty,
                   record_price,
                   record_discount,
                   record_total,
                   record_note,
                   type_report,
                   prepare_by,
                   approved_by,
                   status_report
                    ) VALUES(
                   '$insert_ref_id',
                   '$txt_date',
                   '$txt_vendor_name',
                   '$txt_mileage_record',
                   '$txt_name_garage',
                   '$txt_description',
                   '$txt_select_box_type',
                   '$txt_qty',
                   '$txt_unit_price',
                   '$txt_discount',
                   '$txt_total',
                   '$txt_note',
                   '$txt_plan_id',
                   '$txt_prepare',
                   '$txt_approved',
                   '1'

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
           <center><h2>Make New</h2></center>
        </div>
    </div>

    <!-- calender start -->
   
           <form action="#" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                <label for="staticEmail" class="col-md-1 col-form-label"> Vehicle</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_vehicle_id" name="txt_plan_id" value="Vehicle">
                </div>
 <label for="staticEmail" class="col-md-1 col-form-label"> RickShaw</label>
                <div class="col-md-3">
                 <input type="radio" id="txt_rick_id" name="txt_plan_id" value="RickShaw">
                </div>
            
        <label for="staticEmail" class="col-md-1 col-form-label"> Accessories </label>
                <div class="col-md-3">
                  &nbsp;<input type="radio" id="txt_acc_id" name="txt_plan_id" value="Accessories">
                </div>

              </div>

              <div class="form-group row">
                
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
                <label for="staticEmail" class="col-md-3 col-form-label">Date </label>
                <div class="col-md-3">
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Mileage Record</label>
                <div class="col-md-3">
             <input  type="text" class="form-control"  name="txt_mileage_record" value="">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Name Of Garage </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_name_garage" value="">
                 
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
                                                while($row = $result->fetch_assoc()){
                                    ?>
                                      <option data-subtext="" value="<?php echo $row['vendor_id']; ?>">
                                        <?php echo $row['verdor_name']; ?>
                                       
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
                   
                 </textarea>
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Type</label>
                <div class="col-md-3">
                    <select name="txt_select_box_type" class="form-control">
                      <option value="BOX">BOX</option>
                      <option value="SET">SET</option>
                      <option value="PCS">PCS</option>
                    </select>
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
                <label for="staticEmail" class="col-md-3 col-form-label">Note</label>
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
                                        
                                        <th style="width:2%;">Qty</th>
                                        <th style="width: 10%;">Unit Price</th>
                                        <th style="width: 10%;">Discount</th>
                                        <th style="width: 10%;">Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    
                                  <tr>
                                    <td>
                                      <input class="form-control" type="text" name="txt_qty" id="txt_qty">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_unit_price" id="txt_unit_price">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_discount" id="txt_discount">
                                    </td>
                                    <td>
                                      <input class="form-control" type="text" name="txt_total" id="txt_total">
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

            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
           });

         

            $("#txt_rick_id").click(function()
           {
           $("#txt_refo_rick_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
           });

            $("#txt_acc_id").click(function()
           {
           $("#txt_refo_acc_id").css("display", "block");

            $("#txt_refo_car_id").css("display", "none");
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