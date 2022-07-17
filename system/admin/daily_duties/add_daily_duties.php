<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
  if(isset($_POST['btn_delete'])){
    $id = $_POST['txt_id'];
    $delete = "DELETE FROM tbl_daily_duties WHERE id='$id'";
    if($connect->query($delete)){
      echo "Success.";
    }else{
      echo "Fail.";
    }

  }
  if(isset($_POST['btn_add'])){
    $str="";
    $id = $_POST['txt_id'];
    $con = $_POST['txt_con'];
    $day = @$connect->real_escape_string($_POST['txt_date_record']);
    $remark="";
    if($con=='insert'){
      if(isset($_POST['daily'])){
        $str = implode(',', $_POST['daily']);
        $remark = @$connect->real_escape_string($_POST['txt_remark']);
      }
      $sql = "INSERT INTO tbl_daily_duties VALUES(null, '$str','$remark', '$day')";
    }else{
      if(isset($_POST['daily'])){
        $str = implode(',', $_POST['daily']);
        $remark = @$connect->real_escape_string($_POST['txt_remark']);
      }
      $sql = "UPDATE tbl_daily_duties SET opt_checked='$str',remark='$remark', date_re='$day' WHERE id='$id'";
    }

    if($connect->query($sql)){
      echo "success";
      // header('location:add_daily_duties.php');
    }else{
      echo "fail";
    }
  }
  $date = date('Y-m-d');
  if(isset($_POST['btn_view'])){
  $date = $_POST['txt_date_record'];
  }
  $get = "SELECT * FROM tbl_daily_duties WHERE date_re='$date'";
  $get_reslut = $connect->query($get);
  if($get_reslut->num_rows>0){
    $con = "update";
    $row = mysqli_fetch_object($get_reslut);
    $d = explode(',', $row->opt_checked);
    $id=$row->id;
    $remark = $row->remark;
  }else{
    $con = "insert";
    $remark='';
    $id=0;
    $d=array();
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
           <center><h2>DAILY DUTIES</h2></center>
        </div>
    </div>

    <!-- calender start -->
   
           <form action="" method="post" enctype="multipart/form-data">
              <input type="hidden" name="txt_con" value="<?=$con;?>">
              <input type="hidden" name="txt_id" value="<?=$id;?>">
              <div class="col-md-3">
                  <!-- Date for record -->
                  <!-- <input type="text" name="txt_date_record" class="form-control" value="<?=$date;?>">  
                                  -->
                <input value="<?php echo $date ?>" type="text" class="form-control" name="txt_date_record" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
              </div>
               <div class="col-md-2">
                <button style='float: right;margin-right: -25px;' name="btn_view" type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
              </div>
                 <!-- end date for record -->

              <div class="form-group row">
                
                                                                              

              <br><br><br><br>

              <div class="col-md-12">
                <div class="col-md-4 form-group">
                  <label>Remark</label>
                  <input type="text" name="txt_remark" class="form-control" value="<?=$remark;?>">
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.1" <?php echo in_array(1.1, $d)?'checked':'';?> class=""> : រថយន្ដប្ដូប្រេងម៉ាស៊ីន (ធម្មតា)</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.2" <?php echo in_array(1.2, $d)?'checked':'';?> class=""> : រថយន្ដប្រើសេវាថែទាំតាមកាលកំណត់ A B C D</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.3" <?php echo in_array(1.3, $d)?'checked':'';?> class=""> : ប័ណ្ណបើកបររថយន្ដ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.4" <?php echo in_array(1.4, $d)?'checked':'';?> class=""> : ឈៀករថយន្ដប្រចាំឆ្នាំ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.5" <?php echo in_array(1.5, $d)?'checked':'';?> class=""> : ពន្ធផ្លូវរថយន្ដប្រចាំឆ្នាំ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.6" <?php echo in_array(1.6, $d)?'checked':'';?> class=""> : បន្ដទិដ្ឋាការប្រចាំខែឬ ឆ្នាំ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.7" <?php echo in_array(1.7, $d)?'checked':'';?> class=""> : កាត់លេខកុងទ័រ រថយន្ដទាំងភ្ញៀវ និង រថយន្ដ LCRC ក្នុងសៀវភៅកត់ត្រា និង SYSTEM</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.8" <?php echo in_array(1.8, $d)?'checked':'';?> class=""> : សរសេរ ប័ណ្ណប្ដូរប្រេង ម៉ាស៊ីនពាក់ ក ច្ងកូតរថយន្ដ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.12" <?php echo in_array(1.12, $d)?'checked':'';?> class=""> : កត់ត្រារំលឹកបង់ថ្លៃភ្លើងប្រចាំខែ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.9" <?php echo in_array(1.9, $d)?'checked':'';?> class=""> : កត់ត្រារំលឹកបង់ថ្លែ INTERNET ប្រចាំខែ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.33" <?php echo in_array(1.33, $d)?'checked':'';?> class=""> : កត់ត្រាបង់ថ្លៃ ទឹកប្រចាំខែ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.11" <?php echo in_array(1.11, $d)?'checked':'';?> class=""> : កត់ត្រាផ្លៃបង់អគារ</p>
                  </div>
                  
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="1.13" <?php echo in_array(1.13, $d)?'checked':'';?> class=""> : កត់ត្រាថ្លៃបង់ METFONE ប្រចាំខែ</p>
                  </div>
                </div>
                <!-- page two -->
                <div class="col-md-6">
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.1" <?php echo in_array(2.1, $d)?'checked':'';?> class=""> : ទទួលបដិសណ្ឋារកិច្ច​ ភ្ញៀវខ្មែរនិងបរទេស</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.2" <?php echo in_array(2.2, $d)?'checked':'';?> class=""> : មិត្តរួមការងារផ្មែក LGC និង LCRC</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.3" <?php echo in_array(2.3, $d)?'checked':'';?> class=""> : រាយការណ៍ដោយផ្ទាល់ទៅអ្នកគ្រប់គ្រង</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.4" <?php echo in_array(2.4, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកស្វាគមន៍ភ្ញៀវផ្នែកជួលរថយន្ដ​ និង ភ្ញៀវខាងយានដ្ឋាន</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.5" <?php echo in_array(2.5, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកជួលរថយន្ដ​ Care Hire</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.6" <?php echo in_array(2.6, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកទំនាក់ទំនងភ្ញៀវផ្នែកជួលរថយន្ដតាមរយ៖អ៊ីម៉ែល Sending e-mail</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.7" <?php echo in_array(2.7, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកធ្វើកិច្ចសន្យាជួលរថយន្ដ Preparing Vehicle Rental Agreement</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.8" <?php echo in_array(2.8, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញខ្វូថេហ្ិនជួលរថយន្ដ (QUOTATION) Preparing Quotation</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.9" <?php echo in_array(2.9, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញ​អ៊ិនវ៉យជួលរថយន្ដ​ (INVOICE) Preparing Recipt</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.23" <?php echo in_array(2.23, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញ​ រីសីុបជួលរថយន្ដ (RECEIPT) Preparing Receipt</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.11" <?php echo in_array(2.11, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកវាយបញ្ជូលក្នុងសីស្ដែម</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.12" <?php echo in_array(2.12, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញប័ណ្ណបើកបររថយន្ដនិងទោរច័ក្រយានយន្ដទាំងថ្មីនិងបន្ដ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.13" <?php echo in_array(2.13, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកបន្ដទិដ្ឋការជនបរទេស Visa Extension</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.14" <?php echo in_array(2.14, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកជួយរៀបចំឯកសារសម្ភាសន៏បុគ្គលិក</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.15" <?php echo in_array(2.15, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកកត់ត្រាចាត់ចែងរថយន្ដជួល</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.16" <?php echo in_array(2.16, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកចាត់ចែងអ្នកបើកបរ Driver Magagement</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.17" <?php echo in_array(2.17, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកត្រួតពិនិត្យភាពស្អាតនៃរងយន្ដក្រោយពីលាងរួច​ ឬ ត្រឡប់មកពីលាង</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.18" <?php echo in_array(2.18, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកស្វែងរករថយន្ដជួលពីដៃគូរ</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.19" <?php echo in_array(2.19, $d)?'checked':'';?> class=""> : ជួយបំរើភេសជ្ជដល់ភ្ញៀវទាំងផ្នែកជួលរថយន្ដនិងយានដ្ឋាន</p>
                  </div>
                  <div class="col-md-12" style="background-color: ; float: left;">
                    <p><input type="checkbox" name="daily[]" value="2.22" <?php echo in_array(2.22, $d)?'checked':'';?> class=""> : ធ្វើការងារផ្សេងៗទៀតដែលមានការស្នើសុំ ដោយប្រធាន</p>
                  </div>
                </div>
                <!-- end page two -->
              </div>

              <div class="row" style="float: right;">
                <div class="col-md-12 text-center">
                  <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Save</button>
                  <button type="submit" name="btn_delete" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Delete</button>
                  <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                </div>
              </div>
            </div>     
 
          </form>

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