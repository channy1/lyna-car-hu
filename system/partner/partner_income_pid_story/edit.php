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
      $txt_parnter_id = @$connect->real_escape_string($_POST['txt_parnter_id']);
      $txt_time_use = @$connect->real_escape_string($_POST['txt_time_use']);
      $txt_date_paid = @$connect->real_escape_string($_POST['txt_date_paid']);
      $txt_note = @$connect->real_escape_string($_POST['txt_note']);
      $txt_prepare = @$connect->real_escape_string($_POST['txt_prepare']);
      $txt_approved = @$connect->real_escape_string($_POST['txt_approved']);

      $txt_vehicle_income = @$connect->real_escape_string($_POST['txt_vehicle_income']);
      $txt_richshaw_income = @$connect->real_escape_string($_POST['txt_richshaw_income']);
      $txt_tour_guide_income = @$connect->real_escape_string($_POST['txt_tour_guide_income']);
      $txt_driver_income = @$connect->real_escape_string($_POST['txt_driver_income']);
      $txt_free_lancer_income = @$connect->real_escape_string($_POST['txt_free_lancer_income']);
      $txt_discount_income = @$connect->real_escape_string($_POST['txt_discount_income']);
      $txt_discount_total_income = @$connect->real_escape_string($_POST['txt_discount_total_income']);
      $txt_total_income = @$connect->real_escape_string($_POST['txt_total_income']);


      $txt_vehicle_expense = @$connect->real_escape_string($_POST['txt_vehicle_expense']);
      $txt_richshaw_expense = @$connect->real_escape_string($_POST['txt_richshaw_expense']);
      $txt_tour_guide_expense = @$connect->real_escape_string($_POST['txt_tour_guide_expense']);
      $txt_driver_expense = @$connect->real_escape_string($_POST['txt_driver_expense']);
      $txt_free_lancer_expense = @$connect->real_escape_string($_POST['txt_free_lancer_expense']);
      $txt_rate_one = @$connect->real_escape_string($_POST['txt_rate_one']);
      $txt_rate_two = @$connect->real_escape_string($_POST['txt_rate_two']);
      $txt_rate_three = @$connect->real_escape_string($_POST['txt_rate_three']);
      $txt_rate_four = @$connect->real_escape_string($_POST['txt_rate_four']);
      $txt_total_expense = @$connect->real_escape_string($_POST['txt_total_expense']);
      $txt_amount_payable = @$connect->real_escape_string($_POST['txt_amount_payable']);
      $query_add = "UPDATE tbl_partner_income_paid_history SET 
                   partner_id='$txt_parnter_id',
                   car_income='$txt_vehicle_income',
                   richshaw_incom='$txt_richshaw_income',
                   tour_guide_income='$txt_tour_guide_income',
                   driver_income='$txt_driver_income',
                   free_lancer_income='$txt_free_lancer_income',
                   dis_income='$txt_discount_income',
                   dis_total_income='$txt_discount_total_income',
                   total_income='$txt_total_income',
                   car_ex='$txt_vehicle_expense',
                   richshaw_ex='$txt_richshaw_expense',
                   tour_guide_ex='$txt_tour_guide_expense',
                   driver_ex='$txt_driver_expense',
                   free_lancer_ex='$txt_free_lancer_expense',
                   rate_one='$txt_rate_one',
                   rate_two='$txt_rate_two',
                   rate_three='$txt_rate_three',
                   rate_four='$txt_rate_four',
                   total_ex='$txt_total_expense',
                   amount_payable='$txt_amount_payable',
                   time_use='$txt_time_use',
                   date_paid='$txt_date_paid',
                   note='$txt_note',
                   pre_by='$txt_prepare',
                   app_by='$txt_approved',
                   start_date='$txt_date'
                   WHERE p_id='$edit_id'

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
                    $query="SELECT * FROM tbl_partner_income_paid_history 
                                 WHERE p_id='$id'
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
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date" value="<?php echo $row['start_date']; ?>">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Partner Name</label>
                <div class="col-md-3">
                  <select name="txt_parnter_id" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                                      <option data-subtext="" value="">Select One</option>
                                       <?php
                                  $v_sql = "SELECT * FROM tbl_users WHERE user_first_name !='' AND user_last_name !='' AND user_position='3'
                                            ORDER BY user_first_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($rows = $result->fetch_assoc()){
                                    ?>
                                      <option
                                      <?php
                                        if($row['partner_id']==$rows['user_id']) {
                                          echo "selected='selected'";
                                        }
                                      ?>
                                       data-subtext="" value="<?php echo $rows['user_id']; ?>">
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
                <label for="staticEmail" class="col-md-3 col-form-label">No of Use</label>
                <div class="col-md-3">
                 <input value="<?php echo $row['time_use']; ?>" type="text" name="txt_time_use" class="form-control">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Date Paid Bonus</label>
                <div class="col-md-3">
                   <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date_paid" 
                   value="<?php echo $row['date_paid']; ?>">
                </div>
                
              </div>
              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Partner History Note</label>
                <div class="col-md-3">
                <textarea name="txt_note" class="form-control"><?php echo $row['note']; ?></textarea>
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label"></label>
                <div class="col-md-3">
                  
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
               
          
          <div class="table-responsive">
            <center><h2>Partner Income</h2></center>
            <table class="table table-bordered" >
                                <thead>
                                    <tr style="width: 100%;">
                                        <th style="width:7%;">Vehicle</th>
                                        <th style="width:10%;">RichShaw</th>
                                        <th style="width:10%;">Tour Guide</th>
                                        <th style="width:10%;">Driver</th>
                                        <th style="width: 10%;">Free-Lancer</th>
                                        <th style="width: 10%;">Dis %</th>
                                        <th style="width: 10%;">Dis Total</th>
                                        <th style="width: 10%;">Total Income</th>      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      <input value="<?php echo $row['car_income']; ?>" class="form-control" type="text" name="txt_vehicle_income" id="txt_vehicle_income">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['richshaw_incom']; ?>" class="form-control" type="text" name="txt_richshaw_income" id="txt_richshaw_income">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['tour_guide_income']; ?>" class="form-control" type="text" name="txt_tour_guide_income" id="txt_tour_guide_income">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['driver_income']; ?>" class="form-control" type="text" name="txt_driver_income" id="txt_driver_income">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['free_lancer_income']; ?>" class="form-control" type="text" name="txt_free_lancer_income" id="txt_free_lancer_income">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['dis_income']; ?>" class="form-control" type="text" name="txt_discount_income" id="txt_discount_income">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['dis_total_income']; ?>" class="form-control" type="text" name="txt_discount_total_income" id="txt_discount_total_income">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['total_income']; ?>" class="form-control" type="text" name="txt_total_income" id="txt_total_income">
                                    </td>
                                    
                                    
                                  </tr>
                                                                  
                                </tbody>
                            </table>
                      </div>
                
              </div>

                <div class="form-group row form_group_custom">
               
          
          <div class="table-responsive">
            <center><h2>Partner Expense</h2></center>
            <table class="table table-bordered" >
                                <thead>
                                    <tr style="width: 100%;">
                                        <th style="width:7%;">Vehicle</th>
                                        <th style="width:10%;">RichShaw</th>
                                        <th style="width:10%;">Tour Guide</th>
                                        <th style="width:10%;">Driver</th>
                                        <th style="width: 10%;">Free-Lancer</th>
                                        <th style="width: 7%;">%</th>
                                        <th style="width: 7%;">%</th>
                                        <th style="width: 7%;">%</th>
                                        <th style="width: 7%;">%</th>
                                        <th style="width: 10%;">Total Expense</th>
                                        <th style="width: 10%;">Amount Payable</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                    
                                  <tr>
                                    <td>
                                      <input value="<?php echo $row['car_ex']; ?>" class="form-control" type="text" name="txt_vehicle_expense" id="txt_vehicle_expense">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['richshaw_ex']; ?>" class="form-control" type="text" name="txt_richshaw_expense" id="txt_richshaw_expense">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['tour_guide_ex']; ?>" class="form-control" type="text" name="txt_tour_guide_expense" id="txt_tour_guide_expense">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['driver_ex']; ?>" class="form-control" type="text" name="txt_driver_expense" id="txt_driver_expense">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['free_lancer_ex']; ?>" class="form-control" type="text" name="txt_free_lancer_expense" id="txt_free_lancer_expense">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['rate_one']; ?>" class="form-control" type="text" name="txt_rate_one" id="txt_rate_one">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['rate_two']; ?>" class="form-control" type="text" name="txt_rate_two" id="txt_rate_two">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['rate_three']; ?>" class="form-control" type="text" name="txt_rate_three" id="txt_rate_three">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['rate_four']; ?>" class="form-control" type="text" name="txt_rate_four" id="txt_rate_four">
                                    </td>
                                    <td>
                                      <input value="<?php echo $row['total_ex']; ?>" class="form-control" type="text" name="txt_total_expense" id="txt_total_expense">
                                    </td>
                                     <td>
                                      <input value="<?php echo $row['amount_payable']; ?>" class="form-control" type="text" name="txt_amount_payable" id="txt_amount_payable">
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
    #txt_refo_tr_id,#txt_refo_acc_id,#txt_refo_rick_id,#txt_refo_hotel_id,#txt_refo_city_tour_id ,#txt_refo_pick_up_id,#txt_refo_airport_id{
      display: none;
    }
</style>
<?php include_once '../layout/footer.php' ?>

<script type="text/javascript">

  // start option select
      $(document).ready(function () 
         { 
          
        function  ex_total_calulator_income(){
          var v_j_vehicle_income=$("#txt_vehicle_income").val();
          var v_j_richshaw_income=$("#txt_richshaw_income").val();
          var v_j_tour_quide_income=$("#txt_tour_guide_income").val();
          var v_j_driver_income=$("#txt_driver_income").val();
          var v_j_free_lancer_income=$("#txt_free_lancer_income").val();
          var v_j_dicount_income=$("#txt_discount_income").val();
          var v_j_discount_total_income=$("#txt_discount_total_income").val();
          var v_j_total_income=$("#txt_total_income").val();
          // calulate
             var total_income_befor=parseFloat(v_j_vehicle_income)+parseFloat(v_j_richshaw_income)+parseFloat(v_j_tour_quide_income)+
             parseFloat(v_j_driver_income)+parseFloat(v_j_free_lancer_income);

      var dis_total_income_befor=parseFloat(total_income_befor)-parseFloat(total_income_befor * v_j_dicount_income )/100;
      var dis_total_income_after=parseFloat(total_income_befor)-parseFloat(dis_total_income_befor);

            $("#txt_discount_total_income").val(dis_total_income_after);

            var total_income_all=parseFloat(total_income_befor)-parseFloat(dis_total_income_after);

            $("#txt_total_income").val(total_income_all);
           
          // end calulate

        }



        $('#txt_vehicle_income').on('input', function(){ 
             ex_total_calulator_income();
          });
        $('#txt_richshaw_income').on('input', function(){ 
             ex_total_calulator_income();
          });
         $('#txt_tour_guide_income').on('input', function(){ 
             ex_total_calulator_income();
          });
         $('#txt_driver_income').on('input', function(){ 
             ex_total_calulator_income();
          });
         $('#txt_free_lancer_income').on('input', function(){ 
             ex_total_calulator_income();
          });
         $('#txt_discount_income').on('input', function(){ 
             ex_total_calulator_income();
          });
          $('#txt_discount_total_income').on('input', function(){ 
             ex_total_calulator_income();
          });



          // calulate  expenes

          function total_calulate_expense() {
            var v_j_vehicle_expense=$("#txt_vehicle_expense").val();
            var v_j_richshaw_expense=$("#txt_richshaw_expense").val();
            var v_j_tour_quide_expense=$("#txt_tour_guide_expense").val();
            var v_j_driver_expense=$("#txt_driver_expense").val();
            var v_j_free_lancer_expense=$("#txt_free_lancer_expense").val();
            
             var v_j_rate_one=$("#txt_rate_one").val();
             var v_j_rate_two=$("#txt_rate_two").val();
             var v_j_rate_three=$("#txt_rate_three").val();
             var v_j_rate_four=$("#txt_rate_four").val();

           var total_product_expense=parseFloat(v_j_vehicle_expense)+
                                     parseFloat(v_j_richshaw_expense)+
                                     parseFloat(v_j_tour_quide_expense)+
                                     parseFloat(v_j_driver_expense)+
                                     parseFloat(v_j_free_lancer_expense);
                                    
           var total_expen_rate=parseFloat(v_j_rate_one)+
                                parseFloat(v_j_rate_two)+
                                parseFloat(v_j_rate_three)+
                                parseFloat(v_j_rate_four);
          var total_expenes_all=parseFloat(total_product_expense)+parseFloat(total_expen_rate);

          $("#txt_total_expense").val(total_expenes_all);

          var total_income_top=$("#txt_total_income").val();
          var total_expense_bootom=$("#txt_total_expense").val();

          var amount_pay_able=parseFloat(total_income_top)-parseFloat(total_expense_bootom);
          $("#txt_amount_payable").val(amount_pay_able);


          }

          $('#txt_vehicle_expense').on('input', function(){ 
             total_calulate_expense();
          });
        $('#txt_richshaw_expense').on('input', function(){ 
             total_calulate_expense();
          });
         $('#txt_tour_guide_expense').on('input', function(){ 
             total_calulate_expense();
          });
         $('#txt_driver_expense').on('input', function(){ 
             total_calulate_expense();
          });
         $('#txt_free_lancer_expense').on('input', function(){ 
             total_calulate_expense();
          });
         $('#txt_rate_one').on('input', function(){ 
             total_calulate_expense();
          });
          $('#txt_rate_two').on('input', function(){ 
             total_calulate_expense();
          });
           $('#txt_rate_three').on('input', function(){ 
             total_calulate_expense();
          });
           $('#txt_rate_four').on('input', function(){ 
             total_calulate_expense();
          });

          // end calulate expenes

         


           
      });
  // end start option

// end year
</script>