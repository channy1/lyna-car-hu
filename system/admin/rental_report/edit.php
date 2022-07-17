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
      $txt_start_date = @$connect->real_escape_string($_POST['txt_start_date']);
      $txt_end_date = @$connect->real_escape_string($_POST['txt_end_date']);
      $txt_of_use = @$connect->real_escape_string($_POST['txt_of_use']);
      $txt_customer_id = @$connect->real_escape_string($_POST['txt_customer_id']);
      $txt_broke = @$connect->real_escape_string($_POST['txt_broke']);
      $txt_date_paid = @$connect->real_escape_string($_POST['txt_date_paid']);
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
      $query_add = "UPDATE tbl_rental_report SET 
                   start_date='$txt_start_date',
                   end_date='$txt_end_date',
                   date_paid='$txt_date_paid',
                   pre_by='$txt_prepare',
                   app_by='$txt_approved',
                   time_use='$txt_of_use',
                   amount='$txt_amount',
                   discount_pre='$txt_dis',
                   discount_record='$txt_dis_total',
                   after_discount='$txt_after_dis',
                   commission='$txt_com',
                   bonus_save='$txt_bonus_save',
                   net_income='$txt_net_income',
                   broke='$txt_broke',
                   note='$txt_note',
                   deposit_report='$txt_deposit',
                   refund_report='$txt_refund',
                   ld_ass_report='$txt_ld'
                   WHERE rental_id='$edit_id'

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
                    $query="SELECT * FROM tbl_rental_report 
                                 WHERE rental_id='$id'
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
           <form action="#" method="post" enctype="multipart/form-data">
            
             
              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Start Date </label>
                <div class="col-md-3">
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_start_date" value="<?php echo $row['start_date']; ?>">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">End Date</label>
                <div class="col-md-3">
            <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_end_date" value="<?php echo $row['end_date']; ?>">
                </div>
                
              </div>

               <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">N&deg; of Use</label>
                <div class="col-md-3">
                   <input value="<?php echo $row['time_use']; ?>" class="form-control" type="text" name="txt_of_use">
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
                                                while($rows = $result->fetch_assoc()){
                                    ?>
                                      <option
                                      <?php
                                        if($row['customer_id']==$rows['user_id']){echo "selected='selected'";}
                                      ?> data-subtext="" value="<?php echo $rows['user_id']; ?>">
                                        <?php echo $rows['user_first_name']; ?> 
                                        <?php echo $rows['user_last_name']; ?>
                                       
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
                <input value="<?php echo $row['broke']; ?>" type="text" name="txt_broke" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Date paid Bonus</label>
                <div class="col-md-3">
                   <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date_paid" value="<?php echo $row['date_paid']; ?>">
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
                <label for="staticEmail" class="col-md-3 col-form-label">Customer History Notes</label>
                <div class="col-md-3">
                 <textarea name="txt_note" class="form-control">
                   <?php echo $row['note']; ?>
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
                                      <input value="<?php echo $row['deposit_report']; ?>" class="form-control" type="text" name="txt_deposit" id="txt_deposit">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['refund_report']; ?>" class="form-control" type="text" name="txt_refund" id="txt_refund">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['ld_ass_report']; ?>" class="form-control" type="text" name="txt_ld" id="txt_ld">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['amount']; ?>" class="form-control" type="text" name="txt_amount" id="txt_amount">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['discount_pre']; ?>" class="form-control" type="text" name="txt_dis" id="txt_dis">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['discount_record']; ?>" class="form-control" type="text" name="txt_dis_total" id="txt_dis_total">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['after_discount']; ?>"  class="form-control" type="text" name="txt_after_dis" id="txt_after_dis">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['commission']; ?>" class="form-control" type="text" name="txt_com" id="txt_com">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['bonus_save']; ?>" class="form-control" type="text" name="txt_bonus_save" id="txt_bonus_save">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['net_income']; ?>" class="form-control" type="text" name="txt_net_income" id="txt_net_income">
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