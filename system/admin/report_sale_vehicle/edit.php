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
    
      $txt_buyer_id_card = @$connect->real_escape_string($_POST['txt_buyer_id_card']);
      $txt_buyer_address = @$connect->real_escape_string($_POST['txt_buyer_address']);
      $txt_buyer_id = @$connect->real_escape_string($_POST['txt_buyer_id']);
      $txt_sller_withnes = @$connect->real_escape_string($_POST['txt_sller_withnes']);
      $txt_seller_witness_phone= @$connect->real_escape_string($_POST['txt_seller_witness_phone']);
      $txt_prepare = @$connect->real_escape_string($_POST['txt_prepare']);
      $txt_approved = @$connect->real_escape_string($_POST['txt_approved']);
      $txt_mileage_report = @$connect->real_escape_string($_POST['txt_mileage_report']);
      $txt_note = @$connect->real_escape_string($_POST['txt_note']);
      $txt_amount_sale = @$connect->real_escape_string($_POST['txt_amount_sale']);
      $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);
      $txt_discount_total = @$connect->real_escape_string($_POST['txt_discount_total']);
      $txt_net_sale = @$connect->real_escape_string($_POST['txt_net_sale']);
      $query_add = "UPDATE tbl_sale_product_report SET 
                   customer_id='$txt_buyer_id',
                   start_date='$txt_date',
                   buyer_id_card='$txt_buyer_id_card',
                   buyer_address='$txt_buyer_address',
                   sale_witness_name='$txt_sller_withnes',
                   sale_witness_phone='$txt_seller_witness_phone',
                   mileage_record='$txt_mileage_report',
                   discount_pre='$txt_discount',
                   discount_record='$txt_discount_total',
                   sale_mount='$txt_amount_sale',
                   net_sale='$txt_net_sale',
                   note='$txt_note',
                   pre_by='$txt_prepare',
                   app_by='$txt_approved'
                   WHERE product_id='$edit_id'

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
           <center><h2>Edit Product sale reports</h2></center>
        </div>
    </div>

    <!-- calender start -->
          <?php
                    $id=$_GET['edit_id'];
                    $query="SELECT * FROM tbl_sale_product_report 
                                 WHERE product_id='$id'
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
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date" 
              value="<?php echo $row['start_date']; ?>">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Buyer ID Card N&deg;</label>
                <div class="col-md-3">
             <input  type="text" class="form-control"  name="txt_buyer_id_card" value="<?php echo $row['buyer_id_card']; ?>">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Buyer Address </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_buyer_address" value="<?php echo $row['buyer_address']; ?>">
                 
                </div>
             

              <label for="staticEmail" class="col-md-3 col-form-label">Buyer Name</label>
                <div class="col-md-3">
                <select name="txt_buyer_id" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                                      <option data-subtext="" value="">Select One</option>
                                       <?php
                                  $v_sql = "SELECT * FROM tbl_users
                                            WHERE user_first_name !='' AND user_last_name !=''
                                            ORDER BY user_first_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($rows = $result->fetch_assoc()){
                                    ?>
                                      <option
                                  <?php
                                    if($row['customer_id']==$rows['user_id']) {
                                      echo "selected='selected'";
                                    }
                                  ?>
                                       data-subtext="" value="<?php echo $rows['user_id']; ?>">
                                        <?php echo $rows['user_last_name']; ?> <?php echo $rows['user_first_name']; ?>
                                       
                                        </option>
                                    <?php
                                         }
                                        } 
                                    ?>
                                    </select>
                </div>
            
                
              </div>


               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Seller Witness Name</label>
                <div class="col-md-3">
                  <input value="<?php echo $row['sale_witness_name']; ?>" type="text" name="txt_sller_withnes" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Seller Witness Phone</label>
                <div class="col-md-3">
                   <input value="<?php echo $row['sale_witness_phone']; ?>" type="text" name="txt_seller_witness_phone" class="form-control">
                </div>
                
              </div>


             
            <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Prepared By</label>
                <div class="col-md-3">
                 <input value="<?php echo $row['pre_by']; ?>" type="text" name="txt_prepare" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Approved By</label>
                <div class="col-md-3">
                    <input value="<?php echo $row['app_by']; ?>" type="text" name="txt_approved" class="form-control">
                </div>
                
              </div>
            <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Mileage Record</label>
                <div class="col-md-3">
                <input value="<?php echo $row['mileage_record']; ?>" type="text" name="txt_mileage_report" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Customer History Note</label>
                <div class="col-md-3">
                   <textarea name="txt_note" class="form-control">
                     <?php echo $row['note']; ?>
                   </textarea>
                </div>
                
              </div>



               
              <div class="form-group row form_group_custom">
               
          
          <div class="table-responsive">
            <table class="table table-bordered" >
                                <thead>
                                    <tr style="width: 100%;">
                                        
                                        <th style="width:2%;">Sale Amount</th>
                                        <th style="width: 10%;">Discount(%)</th>
                                        <th style="width: 10%;">Total Discount</th>
                                        <th style="width: 10%;">Net Sale</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    
                                  <tr>
                                    <td>
                                      <input value="<?php echo $row['sale_mount']; ?>" class="form-control" type="text" name="txt_amount_sale" id="txt_amount_sale">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['discount_pre']; ?>" class="form-control" type="text" name="txt_discount" id="txt_discount">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['discount_record']; ?>" class="form-control" type="text" name="txt_discount_total" id="txt_discount_total">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['net_sale']; ?>"  class="form-control" type="text" name="txt_net_sale" id="txt_net_sale">
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
          
          var v_j_mount_sale=$("#txt_amount_sale").val();
          var v_j_dis_pre=$("#txt_discount").val();
          var v_j_dis_total=$("#txt_discount_total").val();
          var v_j_net_sale=$("#txt_net_sale").val();

        
        

          // sale product
             
             var v_j_total_discount=parseFloat(v_j_mount_sale)-parseFloat(v_j_mount_sale * v_j_dis_pre)/100;
             var v_j_total_net=v_j_total_discount;

             var v_j_dis=parseFloat(v_j_mount_sale)-parseFloat(v_j_total_discount);

            $("#txt_discount_total").val(v_j_dis);

            var total_net_sale=parseFloat(v_j_mount_sale)-parseFloat(v_j_dis);
             $("#txt_net_sale").val(total_net_sale);
          // end sale product


        }

        $('#txt_amount_sale').on('input', function(){ 
             ex_total_calulator();
          });
        $('#txt_discount').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_discount_total').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_net_sale').on('input', function(){ 
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