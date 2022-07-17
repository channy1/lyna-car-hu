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




 
    ?>


<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_vehicle_rantal WHERE ve_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["ve_title"];
            $image = $row["ve_image"];
            $description = $row["ve_detail"];

            $no=$row["ve_ref_no"];
            $year=$row["ve_year"];
            $make=$row["ve_make"];
            $model=$row["ve_model"];
            $sub_model=$row["ve_sub_model"];
            $color=$row["ve_color"];
            $power=$row["ve_horse_pow"];
            $seat=$row["ve_no_of_seat"];
            $tran_type=$row["ve_transmission_type"];
            $ve_type=$row["ve_vehical_type"];
            $type=$row["ve_type"];
            $max=$row["ve_maximum_weight"];
            $steering=$row["ve_steering_wheel_type"];
            $no_ax=$row["ve_no_of_axles"];
            $no_ey=$row["ve_no_of_eylinders"];
            $cy_disp=$row["ve_cylinders_disp"];
            $test_drive=$row["ve_test_drive_url"];
            $show=$row["ve_show_url"];
            $note=$row["ve_note"];
            $day1=$row["ve_days(1-7)"];
            $ex_day1=$row["ve_extra_days(1-7)"];
            $day2=$row["ve_day(15-26)"];
            $ex_day2=$row["ve_extra_day(15-26)"];
            $monthly=$row["ve_monthly"];
            $ex_monthly=$row["ve_monthy_extra_days"];
            $yearly=$row["ve_yearly"];
            $ex_yearly=$row["ve_yearly_extra_days"];
            $v_frame=$row['frame'];
            $VAT=$row['vat'];			
            $v_chassis_no=$row['chassis_no'];
            $v_engine_no=$row['engine_no'];
            $v_cylinder_size=$row['cylinder_size'];
            $v_placque_no=$row['placque_no'];
			$discount=$row['discount'];
        $status=$row['status'];
        $car_price=$row['car_price'];
        $ld_ass=$row['ld_assistant'];
        $refun_deposit=$row['refun_deposit'];   
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];	
			
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
               move_uploaded_file($v_image["tmp_name"], $inner_directory_path ."vehicle_rental/".$new_name);
                	
			
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            $v_ref = @$connect->real_escape_string($_POST['txt_ref']);
            $v_year = @$connect->real_escape_string($_POST['txt_year']);
            $v_make = @$connect->real_escape_string($_POST['txt_make']);
            $v_model = @$connect->real_escape_string($_POST['txt_model']);
            $v_sub_model = @$connect->real_escape_string($_POST['txt_sub_model']);
            $v_color = @$connect->real_escape_string($_POST['txt_color']);
            $v_horse_power = @$connect->real_escape_string($_POST['txt_horse_power']);
            $v_no_of_seat = @$connect->real_escape_string($_POST['txt_no_of_seat']);
            $v_transmission_type = @$connect->real_escape_string($_POST['txt_transmission_type']);
            $v_vehical_type = @$connect->real_escape_string($_POST['txt_vehical_type']);
            $v_type = @$connect->real_escape_string($_POST['txt_type']);
            $v_maximum_weight = @$connect->real_escape_string($_POST['txt_maximum_weight']);
            $v_steering_wheel_type = @$connect->real_escape_string($_POST['txt_steering_wheel_type']);
            $v_no_of_eylinders = @$connect->real_escape_string($_POST['txt_no_of_eylinders']);
            $v_no_of_axles = @$connect->real_escape_string($_POST['txt_no_of_axles']);
            $v_cylinders_disp = @$connect->real_escape_string($_POST['txt_cylinders_disp']);
            $v_test_drive_url = @$connect->real_escape_string($_POST['txt_test_drive_url']);
            $v_show_url = @$connect->real_escape_string($_POST['txt_show_url']);
            $v_note = @$connect->real_escape_string($_POST['txt_note']);
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
            $txt_status = @$connect->real_escape_string($_POST['txt_status']);
            $txt_price = @$connect->real_escape_string($_POST['txt_price']);
            $txt_ld_assistand = @$connect->real_escape_string($_POST['txt_ld_assistand']);
            $txt_refun_deposit = @$connect->real_escape_string($_POST['txt_refun_deposit']);

            $txt_frame = @$connect->real_escape_string($_POST['txt_frame']);
            $txt_chassis_no = @$connect->real_escape_string($_POST['txt_chassis_no']);
            $txt_engine_no = @$connect->real_escape_string($_POST['txt_engine_no']);
            $txt_cylinder_size = @$connect->real_escape_string($_POST['txt_cylinder_size']);
            $txt_placque_no = @$connect->real_escape_string($_POST['txt_placque_no']);
            $txt_province_id = @$connect->real_escape_string($_POST['txt_province_id']);

                        $time=time();
            $query_add = "UPDATE tbl_vehicle_rantal SET 
            frame='$txt_frame',
            chassis_no='$txt_chassis_no',
            engine_no='$txt_engine_no',
            cylinder_size='$txt_cylinder_size',
            placque_no='$txt_placque_no',
            ve_title='$v_title',
            ve_image='$new_name',
            ve_detail='$v_detail',
            ve_ref_no='$v_ref',
            ve_year='$v_year',
            ve_make='$v_make',
            ve_model='$v_model',
            ve_sub_model='$v_sub_model',
            ve_color='$v_color',
            ve_horse_pow='$v_horse_power',
            ve_no_of_seat='$v_no_of_seat',
            ve_transmission_type='$v_transmission_type',
            ve_vehical_type='$v_vehical_type',
            ve_type='$v_type',
            ve_maximum_weight='$v_maximum_weight',
            ve_steering_wheel_type='$v_steering_wheel_type',
            ve_no_of_axles='$v_no_of_axles',
            ve_no_of_eylinders='$v_no_of_eylinders',
            ve_cylinders_disp='$v_cylinders_disp',
            ve_test_drive_url='$v_test_drive_url',
            ve_show_url='$v_show_url',
            ve_note='$v_note',
            `ve_days(1-7)`='$v_days1_7',
            `ve_extra_days(1-7)`='$v_extradays1_7',
            `ve_day(15-26)`='$v_days15_26',
            `ve_extra_day(15-26)`='$v_extradays15_26',
            ve_monthly='$v_monthly',
            ve_monthy_extra_days='$v_monthly_extradays',
            ve_yearly='$v_yearly',
            ve_yearly_extra_days='$v_yearly_extradays',
            vat='$txt_vat',
            discount='$txt_discount',
            status='$txt_status',
            car_price='$txt_price',
            ld_assistant='$txt_ld_assistand',
            refun_deposit='$txt_refun_deposit',
            province_id='$txt_province_id',
            updated_on='$time'

            WHERE ve_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }
    }

 ?>



            <h1>EDIT VEHICAL RENTAL </h1>
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
                    <label >Title:</label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $title ;?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Province Name</label>                    
					 <select name="txt_province_id" class="form-control" style="background-color:white;">
                                         <?php 
                                            $v_sql = "SELECT * FROM tbl_province order by pv_title ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                             while($row = $result->fetch_assoc()){
                                                echo "<option style='text-transform: uppercase;' 
                                    value=".$row['pv_id'].">".strtoupper($row["pv_title"])."</option>";
                                                }
                                            }
                                        ?>
                                     </select>
                  </div>
				<div class="form-group">
                    <label>Image</label>
					<img style="height:50px; width:50px;" src="<?php  echo $img_path.'vehicle_rental/'.$image;?>">
					<input  class="form-control" type="file" name="txt_image" value="<?php echo $image;?>"></input>
                     
                </div>				 
				<div class="form-group">
                    <label >Vehicle Ref Number</label>
                    <input type="text" class="form-control" name="txt_ref" value="<?php echo $no ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Year</label>
                    <input type="text" class="form-control" name="txt_year" value="<?php echo $year ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Make</label>
                    <input type="text" class="form-control" name="txt_make" value="<?php echo $make ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Model</label>
                    <input type="text" class="form-control" name="txt_model" value="<?php echo $model ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Sub Model</label>
                    <input type="text" class="form-control" name="txt_sub_model" value="<?php echo $sub_model ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Color</label>
                    <input type="text" class="form-control" name="txt_color" value="<?php echo $color ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Power</label>
                    <input type="text" class="form-control" name="txt_horse_power" value="<?php echo $power ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Frames</label>
                    <input type="text" class="form-control" name="txt_frame" value="<?php echo $v_frame ;?>"  required >
                </div>				
				<div class="form-group">
                    <label >Chasis No</label>
                    <input type="text" class="form-control" name="txt_chassis_no" value="<?php echo $v_chassis_no ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Engine No.</label>
                    <input type="text" class="form-control" name="txt_engine_no" value="<?php echo $v_engine_no ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Cylinder Size</label>
                    <input type="text" class="form-control" name="txt_cylinder_size" value="<?php echo $v_cylinder_size ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Plaqcque No.</label>
                    <input type="text" class="form-control" name="txt_placque_no" value="<?php echo $v_placque_no ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Seat</label>
                    <input type="text" class="form-control" name="txt_no_of_seat" value="<?php echo $seat ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Transmission Type</label>
                    <input type="text" class="form-control" name="txt_transmission_type" value="<?php echo $tran_type ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Type</label>
                    <input type="text" class="form-control" name="txt_vehical_type" value="<?php echo $ve_type ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Type</label>
                    <input type="text" class="form-control" name="txt_type" value="<?php echo $type ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Weight</label>
                    <input type="text" class="form-control" name="txt_maximum_weight" value="<?php echo $max ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Steering Wheel Type</label>
                    <input type="text" class="form-control" name="txt_steering_wheel_type" value="<?php echo $steering ;?>"  required >
                </div>
				<div class="form-group">
                    <label >No Of Axles</label>
                    <input type="text" class="form-control" name="txt_no_of_axles" value="<?php echo $no_ax ;?>"  required >
                </div>
				<div class="form-group">
                    <label >No Of Cylinders</label>
                    <input type="text" class="form-control" name="txt_no_of_eylinders" value="<?php echo $no_ey ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Cylinders Disp </label>
                    <input type="text" class="form-control" name="txt_cylinders_disp" value="<?php echo $cy_disp ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Test Drive URL</label>
                    <input type="text" class="form-control" name="txt_test_drive_url" value="<?php echo $test_drive ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Show URL </label>
                    <input type="text" class="form-control" name="txt_show_url" value="<?php echo $show ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Note</label>
                    <input type="text" class="form-control" name="txt_note" value="<?php echo $note ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Range Days(1-7) </label>
                    <input type="text" class="form-control" name="txt_days(1-7)" value="<?php echo $day1 ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Extra Days(1-7)</label>
                    <input type="text" class="form-control" name="txt_extradays(1-7)" value="<?php echo $ex_day1 ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Range Days(15-26) </label>
                    <input type="text" class="form-control" name="txt_days(15-26)" value="<?php echo $day2 ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Extra Days(15-26)</label>
                    <input type="text" class="form-control" name="txt_extradays(15-26)" value="<?php echo $ex_day2 ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Monthly</label>
                    <input type="text" class="form-control" name="txt_monthly" value="<?php echo $monthly ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Monthly Extra Days</label>
                    <input type="text" class="form-control" name="txt_monthly_extradays" value="<?php echo $ex_monthly ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Yearly</label>
                    <input type="text" class="form-control" name="txt_yearly" value="<?php echo $yearly ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Yearly Extra Days</label>
                    <input type="text" class="form-control" name="txt_yearly_extradays" value="<?php echo $ex_yearly ;?>"  required >
                </div>
				<div class="form-group">
                    <label >VAT</label>
                    <input type="text" class="form-control" name="txt_vat" value="<?php echo $VAT ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Discount</label>
                    <input type="text" class="form-control" name="txt_discount" value="<?php echo $discount ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Status</label>
                    <input type="text" class="form-control" name="txt_status" value="<?php echo $status ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Price For Sale</label>
                    <input type="text" class="form-control" name="txt_price" value="<?php echo $car_price ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Ld Assistant</label>
                    <input type="text" class="form-control" name="txt_ld_assistand" value="<?php echo $ld_ass ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Refundable Deposit</label>
                    <input type="text" class="form-control" name="txt_refun_deposit" value="<?php echo $refun_deposit ;?>"  required >
                </div>
				
				<div class="form-group">
                    <label >Detail</label>                     
					<textarea  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail">
<?php echo $description; ?></textarea>
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
