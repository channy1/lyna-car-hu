<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST['btn_add'])){
      
      $txt_type = @$connect->real_escape_string($_POST['txt_type']);
      $txt_in_date = @$connect->real_escape_string($_POST['txt_in_date']);
      $txt_out_date = @$connect->real_escape_string($_POST['txt_out_date']);
      $txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
      $txt_action_by = @$connect->real_escape_string($_POST['txt_action_by']);
      $txt_email_address = @$connect->real_escape_string($_POST['txt_email_address']);
      $txt_subject = @$connect->real_escape_string($_POST['txt_subject']);
      $txt_status_remarks = @$connect->real_escape_string($_POST['txt_status_remarks']);    
      $query_add = "INSERT INTO tbl_cus_letter (                   
                   cus_name,
                   email_address,
                   subject,
                   in_date,
                   out_date,
                   action_by,
                   status_remarks,
                   type) 
                   VALUES(                   
                   '$txt_customer_name',
                   '$txt_email_address',
                   '$txt_subject',
                   '$txt_in_date',
                   '$txt_out_date',
                   '$txt_action_by',
                   '$txt_status_remarks',
                   '$txt_type'
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
           <center><h2>Thank you Letter</h2></center>
        </div>
    </div>

    <!-- calender start -->
   
           <form action="#" method="post" enctype="multipart/form-data">
              <div class="col-md-4">
                  <!-- type of form -->
                  <select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                    <option data-subtext="" value="1">Thank you Letter</option>                    
                    <option value="2">Incoming & Outgoing</option>               
                  </select>                 
                </div>
                 <!-- end type of form -->

              <div class="form-group row">
                
              </div>

               

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">In Date</label>
                <div class="col-md-3">
              <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_in_date" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Out Date</label>
                <div class="col-md-3">
             <input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control"  name="txt_out_date" value="">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Customer Name </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_customer_name" value="">
                 
                </div>
             

              <label for="staticEmail" class="col-md-3 col-form-label">Action By</label>
                <div class="col-md-3">
                <select name="txt_action_by" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
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
                <label for="staticEmail" class="col-md-3 col-form-label">E-mail Address</label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_email_address" value="">
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Subject</label>
                <div class="col-md-3">
                <input type="text" class="form-control" name="txt_subject" value="">
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Status/Remarks</label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_status_remarks" value="">
                </div>
             

            
             <!-- <label for="staticEmail" class="col-md-3 col-form-label">Invoice N&deg;</label>
                <div class="col-md-3">
                <input type="text" class="form-control" name="txt_invoice_no" value="">
                </div> -->
                
              </div>

               
              <div class="form-group row form_group_custom">
               
          
          <div class="table-responsive">
            <!-- <table class="table table-bordered" >
                                <thead>
                                    <tr style="width: 100%;">
                                        
                                        <th style="width:2%;">Commsion</th>
                                        <th style="width: 10%;">Income</th>
                                        <th colspan="8" style="width: 48%;">Expenses</th>
                                        <th style="width: 10%;">Ex Total</th>
                                        <th style="width: 10%;">Profit</th>
                                        <th style="width: 10%;">Free Comm %</th>
                                        <th style="width: 10%;">Net Profit</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                    <input style="width:60px;"  type="text" name="txt_commision" id="txt_commision">
                                    </td>
                                    <td >
                                    <input style="width:60px;" type="text" name="txt_income" id="txt_income">
                                    </td>

                                    <td>
                                       <input style="width:60px;" type="text" name="txt_fuel" id="txt_fuel" placeholder="FUEL">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_driver" id="txt_driver" placeholder="Driver">
                                    </td>
                                    <td>
                                      <input style="width:60px;" type="text" name="txt_ot" id="txt_ot" placeholder="OT">
                                    </td>
                                   
                                    <td>
                                      <input style="width:60px;" type="text" name="txt_tq" id="txt_tq" placeholder="T.QUIDE">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_parner_ex" id="txt_parner_ex" placeholder="Partner">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_comm_ex" id="txt_comm_ex" placeholder="COMM">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_dis" id="txt_dis" placeholder="Discount">
                                      
                                    </td>
                                     <td>
                                       <input style="width:60px;" type="text" name="txt_another" id="txt_another" placeholder="Other">
                                      
                                    </td>


                                    <td>
                                       <input style="width:60px;" type="text" 
                                      name="txt_exp_total" id="txt_exp_total">
                                    </td>
                                    <td>
                                      <input style="width:60px;" type="text" 
                                      name="txt_profit" id="txt_profit">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" 
                                      name="txt_free_commision" id="txt_free_commision">
                                    </td>
                                    <td>
                                      <input style="width:60px;" type="text" 
                                      name="txt_net_profit" id="txt_net_profit">
                                    </td>
                                  </tr>
                                                                  
                                </tbody>
                            </table> -->
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
          var v_j_come=$("#txt_commision").val();
          var v_j_income=$("#txt_income").val();
          var v_j_discount=$("#txt_dis").val();

          //expens
          var v_j_fuel=$("#txt_fuel").val();
          var v_j_driver=$("#txt_driver").val();
          var v_j_ot=$("#txt_ot").val();
          var v_j_tq=$("#txt_tq").val();
          var v_j_partner=$("#txt_parner_ex").val();
          var v_j_ex_com=$("#txt_comm_ex").val();
          var v_j_ex_other=$("#txt_another").val();

          //end expens
          var ex_total_discount=(v_j_income)-(v_j_income * v_j_discount)/100;
          var ex_expens=parseFloat(v_j_fuel)+parseFloat(v_j_driver)
          +parseFloat(v_j_ot)+parseFloat(v_j_tq)+
          parseFloat(v_j_partner)+parseFloat(v_j_ex_com)+parseFloat(v_j_ex_other);

          var ex_total=ex_expens;
          $("#txt_exp_total").val(ex_total);

          // profit
             var v_j_profit=parseFloat(ex_total_discount)-parseFloat(ex_expens);
            $("#txt_profit").val(v_j_profit);
          // end profit

          // free Commision
          var v_j_free_com=parseFloat(v_j_profit * v_j_come)/100;
          $("#txt_free_commision").val(v_j_free_com);
          // end free commision

          // net profit
          var v_j_net_profit=parseFloat(v_j_profit)-parseFloat(v_j_free_com);
           $("#txt_net_profit").val(v_j_net_profit);
          // end net profit

        }



        $('#txt_income').on('input', function(){ 
             ex_total_calulator();
          });
        $('#txt_dis').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_fuel').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_driver').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_ot').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_tq').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_parner_ex').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_comm_ex').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_another').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_commision').on('input', function(){ 
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