<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST['btn_add'])){
      
      $txt_type = @$connect->real_escape_string($_POST['txt_phone_line']);
      $txt_contact_person = @$connect->real_escape_string($_POST['txt_contact_person']);
      $txt_title = @$connect->real_escape_string($_POST['txt_title']);
      $txt_tel = @$connect->real_escape_string($_POST['txt_tel']);
      $txt_remark = @$connect->real_escape_string($_POST['txt_remark']);        
      $query_add = "INSERT INTO tbl_phone_line (                   
                   contact_person,
                   title,
                   tel,
                   remark,
                   type
                  ) 
                   VALUES(                   
                   '$txt_contact_person',
                   '$txt_title',
                   '$txt_tel',
                   '$txt_remark',
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
           <center><h2>Make New Phone Line</h2></center>
        </div>
    </div>

    <!-- calender start -->
   
           <form action="" method="post" enctype="multipart/form-data">
              <div class="col-md-4">
                  <!-- prepared by select -->
                <select name="txt_phone_line" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                  <option value="1">OFFICE</option>                   
                  <option value="2">Carrental.com</option>
                  <option value="3">Garage.com</option>
                  <option value="4">Trading.com</option>
                </select>
                  <!-- end prepared by select -->                 
                </div>                 
              <div class="form-group row">
                
              </div>

               

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Contact Person:</label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_contact_person" value="">
                 
                </div>
             

            
             <label for="staticEmail" class="col-md-3 col-form-label">Title:</label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_title" value="">
                 
                </div>
                
              </div>

              <div class="form-group row form_group_custom">
                <label for="staticEmail" class="col-md-3 col-form-label">Tel. No.</label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_tel" value="">
                 
                </div>
             

              <label for="staticEmail" class="col-md-3 col-form-label">Remark</label>
                <div class="col-md-3">
                 <input type="text" class="form-control" name="txt_remark" value="">
                 
                </div>
            
                
              </div>                            

               
              <div class="form-group row form_group_custom">
               
          
          <div class="table-responsive">           
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