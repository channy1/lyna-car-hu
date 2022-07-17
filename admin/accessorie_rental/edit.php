<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';


     $edit_id = $_GET["edit_id"];
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

       <?php 
       if(isset($_POST['btn_save'])){
            $section_data = @$connect->real_escape_string($_POST['section_data']);
           
            $query_add = "UPDATE tbl_website_info SET section_data='$section_data' WHERE id='$edit_id'";
            if($connect->query($query_add)==TRUE){
        
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data Updated ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }

            echo $sms;
    }






  $query="SELECT * FROM tbl_website_info WHERE id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $section_name = $row["section_name"];
            $section_data = $row["section_data"];
            
        }
    }

    ?>


<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_accessories_rental WHERE ac_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $title = $row["ac_title"];
        $no = $row["ac_ref_no"];
        $province_name = $row["ac_province_name"];
        $image = $row["ac_image"];
        $day1=$row["ac_days(1-7)"];
        $ex_day1=$row["ac_extradays(1-7)"];
        $day2=$row["ac_days(15-26)"];
        $ex_day2=$row["ac_extradays(15-26)"];
        $monthly=$row["ac_monthly"];
        $ex_monthly=$row["ac_extramonthly"];
        $yearly=$row["ac_yearly"];
        $ex_yearly=$row["ac_extrayearly"];
        $v_vat=$row['vat'];
        $v_discount=$row['discount'];
        $v_deposit=$row['refun_deposit'];
        $year=$row["ve_year"];
        $make=$row["ve_make"];
        $model=$row["ve_model"];
        $sub_model=$row["ve_sub_model"];
        $color=$row["ve_color"];
        $v_note=$row['note'];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                //move_uploaded_file($v_image["tmp_name"], "../image/accessories rental/".$new_name);
				 move_uploaded_file($v_image["tmp_name"],$inner_directory_path ."accessories rental/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_ref = @$connect->real_escape_string($_POST['txt_ref']);
            $province_name = @$connect->real_escape_string($_POST['province_name']);
            $v_days1_7 = @$connect->real_escape_string($_POST['txt_days(1-7)']);
            $v_extradays1_7 = @$connect->real_escape_string($_POST['txt_extradays(1-7)']);
            $v_days15_26 = @$connect->real_escape_string($_POST['txt_days(15-26)']);
            $v_extradays15_26 = @$connect->real_escape_string($_POST['txt_extradays(15-26)']);
            $v_monthly = @$connect->real_escape_string($_POST['txt_monthly']);
            $v_monthly_extradays = @$connect->real_escape_string($_POST['txt_monthly_extradays']);
            $v_yearly = @$connect->real_escape_string($_POST['txt_yearly']);
            $v_yearly_extradays = @$connect->real_escape_string($_POST['txt_yearly_extradays']);
            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);
            $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);
            $txt_refun_deposit = @$connect->real_escape_string($_POST['txt_refun_deposit']);
            $v_year = @$connect->real_escape_string($_POST['txt_year']);
            $v_make = @$connect->real_escape_string($_POST['txt_make']);
            $v_model = @$connect->real_escape_string($_POST['txt_model']);
            $v_sub_model = @$connect->real_escape_string($_POST['txt_sub_model']);
            $v_color = @$connect->real_escape_string($_POST['txt_color']);
            $v_note = @$connect->real_escape_string($_POST['txt_detail']);
            $time=time();
            $query_add = "UPDATE tbl_accessories_rental SET 
            ac_title='$v_title',
            ac_image='$new_name',
            ac_ref_no='$v_ref',
            ac_province_name='$province_name',
            `ac_days(1-7)`='$v_days1_7',
            `ac_extradays(1-7)`='$v_extradays1_7',
            `ac_days(15-26)`='$v_days15_26',
            `ac_extradays(15-26)`='$v_extradays15_26',
            ac_monthly='$v_monthly',
            ac_extramonthly='$v_monthly_extradays',
            ac_yearly='$v_yearly',
            ac_extrayearly='$v_yearly_extradays',
            discount='$txt_discount',
            vat='$txt_vat',
            refun_deposit='$txt_refun_deposit',
             ve_year='$v_year',
            ve_make='$v_make',
            ve_model='$v_model',
            ve_sub_model='$v_sub_model',
            ve_color='$v_color',
            note='$v_note',
            updated_on='$time'
            WHERE ac_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error '.mysqli_error($connect).'...
                </div>';   
            }
    }

 ?>




            <h1>EDIT ACCESSORIES RENTAL INFO</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
            
            
            </div>
            <!-- /.card-header -->
            

                 <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Title </label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $title; ?>"  required >
                  </div>
				  <div class="form-group">
				  <label >Image</label> 
					<img style="height:50px; width:50px;" src="<?php  echo $img_path.'accessories rental/'. $image;?>">
                    <input type="file" class="form-control" name="txt_image"  required >
                  </div>
				  <div class="form-group">
                    <label >Province Name</label>
                   <select class="form-control" name="province_name" id="province_name">
                                        <?php $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                                                <?php          }   } ?>
                   </select>
                  </div>
				 
				  <div class="form-group">
                    <label >Ref. No.</label>
                    <input type="text" class="form-control" name="txt_ref" placeholder="Enter Ref"  value="<?php echo $no; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Year</label>
                    <input type="text" class="form-control" name="txt_year" placeholder="Enter year" value="<?php echo $year; ?>"   required >
                  </div>
				  <div class="form-group">
                    <label >Vat</label>
                    <input type="text" class="form-control" name="txt_vat" placeholder="Enter vat" value="<?php echo $v_vat; ?>"   required >
                  </div>
				  <div class="form-group">
                    <label >Make</label>
                    <input type="text" class="form-control" name="txt_make" placeholder="Enter make"  value="<?php echo $make; ?>" required >
                  </div>
				  <div class="form-group">
                    <label >Model</label>
                    <input type="text" class="form-control" name="txt_model" placeholder="Enter model"  value="<?php echo $model; ?>" required >
                  </div>
				  <div class="form-group">
                    <label >Sub Model</label>
                    <input type="text" class="form-control" name="txt_sub_model" placeholder="Enter sub model" value="<?php echo $sub_model; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Color</label>
                    <input type="text" class="form-control" name="txt_color" placeholder="Enter color" value="<?php echo $color; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Day (1-7)</label>
                    <input type="text" class="form-control" name="txt_days(1-7)" placeholder="Enter days" value="<?php echo $day1; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Extra Day (1-7)</label>
                    <input type="text" class="form-control" name="txt_extradays(1-7)" placeholder="Enter extra days" value="<?php echo $ex_day1; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Day (15-26)</label>
                    <input type="text" class="form-control" name="txt_days(15-26)" placeholder="Enter days" value="<?php echo $day2; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Extra Day (15-26)</label>
                    <input type="text" class="form-control" name="txt_extradays(15-26)" placeholder="Enter extra days" value="<?php echo $ex_day2; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Monthly</label>
                    <input type="text" class="form-control" name="txt_monthly" placeholder="Enter Monthly" value="<?php echo $monthly; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Monthly Extradays</label>
                    <input type="text" class="form-control" name="txt_monthly_extradays" placeholder="Enter Monthly extradays" value="<?php echo $ex_monthly; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Yearly</label>
                    <input type="text" class="form-control" name="txt_yearly" placeholder="Enter yearly" value="<?php echo $yearly; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Yearly Extradays</label>
                    <input type="text" class="form-control" name="txt_yearly_extradays" placeholder="Enter yearly extradays" value="<?php echo $ex_yearly; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Vat</label>
                    <input type="text" class="form-control" name="txt_vat" placeholder="Enter vat" value="<?php echo $v_vat; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Discount</label>
                    <input type="text" class="form-control" name="txt_discount" placeholder="Enter discount" value="<?php echo $v_discount; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Refundable Deposit</label>
                    <input type="text" class="form-control" name="txt_refun_deposit" placeholder="Enter deposit" value="<?php echo $v_deposit; ?>"  required >
                  </div>	  
             

               <div class="form-group">
                    <label>Description:</label>
                    <textarea  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail" required="required"></textarea>
                  </div>
             
 

                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
                </div>
              </form>
           




          
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require '../footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $base_url; ?>admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $base_url; ?>admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url; ?>admin/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo $base_url; ?>admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
