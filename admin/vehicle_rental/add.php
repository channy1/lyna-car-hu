<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

<?php 
    if(isset($_POST['btn_add'])){
        // $v_image = @$_FILES['txt_image'];
         //if($v_image["name"] != ""){
            //$new_name = date("Ymd")."_".rand(1111,9999)."_".$v_image["name"];
            //move_uploaded_file($v_image["tmp_name"], "../../img/img_news/".$new_name);
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            //$v_description = @$connect->real_escape_string($_POST['txt_description']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            //$v_posted_by = @$_SESSION['user']->user_id;
            $query_add = "INSERT INTO tbl_ft_upcoming (
                    ft_title,
                    ft_detail
                    ) 
                VALUES(
                    '$v_title',
                    '$v_detail')";
            if($connect->query($query_add)){
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
        //}else{
        //     $sms = '<div class="alert alert-danger">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <strong>Error!</strong> Please Insert Image ...
        //         </div>';
        // }
    }

 ?>





<?php 

    if(isset($_POST['btn_add'])){

            $v_image = @$_FILES['txt_image'];



            if($v_image["name"] != ""){

                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                
				move_uploaded_file($v_image["tmp_name"], $inner_directory_path ."vehicle_rental/".$new_name);

            }else{

                $new_name = "blank.png";

            }



            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            //$v_image = @$connect->real_escape_string($_POST['txt_image']);

            $v_image1 = $new_name;

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

            $txt_province_id = @$connect->real_escape_string($_POST['txt_province_id']);



            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");

            $query_add = "INSERT INTO tbl_vehicle_rantal (

                    ve_title,

                    ve_image,

                    ve_ref_no,

                    ve_year,

                    ve_make,

                    ve_model,

                    ve_sub_model,

                    ve_color,

                    ve_horse_pow,

                    ve_no_of_seat,

                    ve_transmission_type,

                    ve_vehical_type,

                    ve_type,

                    ve_maximum_weight,

                    ve_steering_wheel_type,

                    ve_no_of_axles,

                    ve_no_of_eylinders,

                    ve_cylinders_disp,

                    ve_test_drive_url,

                    ve_show_url,

                    ve_note,

                    `ve_days(1-7)`,

                    `ve_extra_days(1-7)`,

                    `ve_day(15-26)`,

                    `ve_extra_day(15-26)`,

                    ve_monthly,

                    ve_monthy_extra_days,

                    ve_yearly,

                    ve_yearly_extra_days,

                    ve_detail,

                    vat,

                    discount,

                    status,

                    car_price,

                    province_id

                    ) 

                VALUES(

                    '$v_title',

                    '$v_image1',

                    '$v_ref',

                    '$v_year',

                    '$v_make',

                    '$v_model',

                    '$v_sub_model',

                    '$v_color',

                    '$v_horse_power',

                    '$v_no_of_seat',

                    '$v_transmission_type',

                    '$v_type',

                    '$v_vehical_type',

                    '$v_maximum_weight',

                    '$v_steering_wheel_type',

                    '$v_no_of_axles',

                    '$v_no_of_eylinders',

                    '$v_cylinders_disp',

                    '$v_test_drive_url',

                    '$v_show_url',

                    '$v_note',

                    '$v_days1_7',

                    '$v_extradays1_7',

                    '$v_days15_26',

                    '$v_extradays15_26',

                    '$v_monthly',

                    '$v_monthly_extradays',

                    '$v_yearly',

                    '$v_yearly_extradays',

                    '$v_detail',

                    '$txt_vat',

                    '$txt_discount',

                    '$txt_status',

                    '$txt_price',

                    '$txt_province_id'



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

        //}else{

        //     $sms = '<div class="alert alert-danger">

        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        //         <strong>Error!</strong> Please Insert Image ...

        //         </div>';

        // }

    }



 ?>






            <h1>Create Vehical Rental Record</h1>
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
                    <label >Title:</label>
                       <input type="text" class="form-control" name="txt_title" placeholder="Enter Title"   required >
                  </div>
				  <div class="form-group">
                    <label>Image</label>					   
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
                    <label >Maximum Weight</label>
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
                    <label >Detail</label>                     
					<textarea  placeholder="" id="detail"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail">
<?php echo $description; ?></textarea>
                </div>

                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_add" class="btn btn-primary">Add</button>
                   <a href="index.php" class="btn btn-danger">Cancel</a>
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

<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>

<script type="text/javascript">

    CKEDITOR.replace( 'detail', {

        language: 'en',

      height: '700'

        // uiColor: '#9AB8F3'

    });

</script>
</body>
</html>
