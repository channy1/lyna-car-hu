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
      $txt_customer_no = @$connect->real_escape_string($_POST['txt_customer_no']);
      $txt_parner_name = @$connect->real_escape_string($_POST['txt_parner_name']);
      $txt_invoice_no = @$connect->real_escape_string($_POST['txt_invoice_no']);
      $txt_commision = @$connect->real_escape_string($_POST['txt_commision']);
      $txt_income = @$connect->real_escape_string($_POST['txt_income']);
      $txt_fuel = @$connect->real_escape_string($_POST['txt_fuel']);
      $txt_driver = @$connect->real_escape_string($_POST['txt_driver']);
      $txt_ot = @$connect->real_escape_string($_POST['txt_ot']);
      $txt_tq = @$connect->real_escape_string($_POST['txt_tq']);
      $txt_parner_ex = @$connect->real_escape_string($_POST['txt_parner_ex']);
      $txt_comm_ex = @$connect->real_escape_string($_POST['txt_comm_ex']);
      $txt_dis = @$connect->real_escape_string($_POST['txt_dis']);
      $txt_another = @$connect->real_escape_string($_POST['txt_another']);
      $txt_exp_total = @$connect->real_escape_string($_POST['txt_exp_total']);
      $txt_profit = @$connect->real_escape_string($_POST['txt_profit']);
      $txt_free_commision = @$connect->real_escape_string($_POST['txt_free_commision']);
      $txt_net_profit = @$connect->real_escape_string($_POST['txt_net_profit']);
      $query_add = "UPDATE tbl_monthly_commission SET 
                   from_date='$txt_from',
                   to_date='$txt_to',
                   customer_name='$txt_customer_name',
                   partner_id='$txt_parner_name',
                   customer_no='$txt_customer_no',
                   invoice_no='$txt_invoice_no',
                   comm='$txt_commision',
                   income='$txt_income',
                   ex_fuel='$txt_fuel',
                   ex_driver='$txt_driver',
                   ex_ot='$txt_ot',
                   ex_guide='$txt_tq',
                   ex_partner='$txt_parner_ex',
                   ex_comm='$txt_comm_ex',
                   ex_discount='$txt_dis',
                   ex_other='$txt_another',
                   ex_total='$txt_exp_total',
                   profit='$txt_profit',
                   free_comm='$txt_free_commision',
                   net_profit='$txt_net_profit'
                   WHERE m_c_id='$edit_id'

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
           <center><h2>Edit Commision</h2></center>
        </div>
    </div>

    <!-- calender start -->
          <?php
                    $id=$_GET['edit_id'];
                    $query="SELECT * FROM tbl_monthly_commission 
                                 WHERE m_c_id='$id'
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
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Partner Name</label>
                <div class="col-md-3">
                <select name="txt_parner_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
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
                                                while($rows = $result->fetch_assoc()){
                                    ?>
                                      <option <?php if($row['partner_id']==$rows['user_id']){
                                        echo "selected='selected'";
                                      } ?> 
                                       data-subtext="" 
                                      value="<?php echo $rows['user_id']; ?>"
                                      >
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
                <label for="staticEmail" class="col-md-3 col-form-label">CUST.ID N° </label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_customer_no" 
                 value="<?php echo $row['customer_no']; ?>">
                </div>
             

            
            <label for="staticEmail" class="col-md-3 col-form-label">Invoice N&deg;</label>
                <div class="col-md-3">
                <input type="text" class="form-control" name="txt_invoice_no" value="<?php echo $row['invoice_no']; ?>">
                </div>
                
              </div>

               
              <div class="form-group row form_group_custom">
                
             
                   <div class="table-responsive">
            <table class="table table-bordered" >
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
                                    <input style="width:60px;"  type="text" name="txt_commision" id="txt_commision" value="<?php echo $row['comm']; ?>">
                                    </td>
                                    <td >
                                    <input style="width:60px;" type="text" name="txt_income" id="txt_income" value="<?php echo $row['income']; ?>">
                                    </td>

                                    <td>
                                       <input style="width:60px;" type="text" name="txt_fuel" id="txt_fuel" placeholder="FUEL" value="<?php echo $row['ex_fuel']; ?>">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_driver" id="txt_driver" placeholder="Driver" value="<?php echo $row['ex_driver']; ?>">
                                    </td>
                                    <td>
                                      <input style="width:60px;" type="text" name="txt_ot" id="txt_ot" placeholder="OT" value="<?php echo $row['ex_ot']; ?>">
                                    </td>
                                   
                                    <td>
                                      <input style="width:60px;" type="text" name="txt_tq" id="txt_tq" placeholder="T.QUIDE" value="<?php echo $row['ex_guide']; ?>">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_parner_ex" id="txt_parner_ex" placeholder="Partner"
                                       value="<?php echo $row['ex_partner']; ?>">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_comm_ex" id="txt_comm_ex" placeholder="COMM" value="<?php echo $row['ex_comm']; ?>">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" name="txt_dis" id="txt_dis" placeholder="Discount" value="<?php echo $row['ex_discount']; ?>">
                                      
                                    </td>
                                     <td>
                                       <input style="width:60px;" type="text" name="txt_another" id="txt_another" placeholder="Other" value="<?php echo $row['ex_other']; ?>">
                                      
                                    </td>


                                    <td>
                                       <input style="width:60px;" type="text" 
                                      name="txt_exp_total" id="txt_exp_total" value="<?php echo $row['ex_total']; ?>">
                                    </td>
                                    <td>
                                      <input style="width:60px;" type="text" 
                                      name="txt_profit" id="txt_profit" value="<?php echo $row['profit']; ?>">
                                    </td>
                                    <td>
                                       <input style="width:60px;" type="text" 
                                      name="txt_free_commision" id="txt_free_commision"
                                      value="<?php echo $row['free_comm']; ?>">
                                    </td>
                                    <td>
                                      <input style="width:60px;" type="text" 
                                      name="txt_net_profit" id="txt_net_profit" value="<?php echo $row['net_profit']; ?>">
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

          var ex_total=parseFloat(ex_expens)+(parseFloat(v_j_income) * parseFloat(v_j_discount)/100);
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