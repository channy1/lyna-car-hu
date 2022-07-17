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

            $v_image = @$_FILES['txt_image'];



            if($v_image["name"] != ""){

                $new_name = date("Ymd")."_".rand(1111,9999).".png";

                //move_uploaded_file($v_image["tmp_name"],"../image/vehicle_rental/".$new_name);
				    move_uploaded_file($v_image["tmp_name"], $inner_directory_path."vehicle_rental/".$new_name);

            }else{

                $new_name = "blank.png";

            }



            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            //$v_image = @$connect->real_escape_string($_POST['txt_image']);

            $v_image1 = $new_name;

            $v_ref = @$connect->real_escape_string($_POST['txt_ref']);

            $v_year = @$connect->real_escape_string($_POST['txt_year']);

            $province_name = @$connect->real_escape_string($_POST['province_name']);

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

            



            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);

            $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);

            $txt_status = @$connect->real_escape_string($_POST['txt_status']);

            $txt_price = @$connect->real_escape_string($_POST['txt_price']);

            $txt_price_rent = @$connect->real_escape_string($_POST['txt_price_rent']);

            $txt_province_id = @$connect->real_escape_string($_POST['txt_province_id']);

            $txt_refun_deposit = @$connect->real_escape_string($_POST['txt_refun_deposit']);



            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");

            $query_add = "INSERT INTO tbl_rick_shaw_rental_last (

                    ve_title,

                    ve_image,

                    ve_province_name,

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

                   

                    ve_detail,

                    vat,

                    discount,

                    status,

                    car_price,

                    add_by_id,

                    price_rent,

                    province_id,

                    refun_deposit

                    ) 

                VALUES(

                    '$v_title',

                    '$v_image1',

                    '$province_name',

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

                    '$v_detail',

                    '$txt_vat',

                    '$txt_discount',

                    '$txt_status',

                    '$txt_price',

                    '0',

                    '$txt_price_rent',

                    '$txt_province_id',

                    '$txt_refun_deposit'



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



            <h1>Create Rickshaw Rental Record</h1>
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
            

                 <form role="form" method="post"enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label >Title</label>
                    <input type="text" class="form-control" name="txt_title"     required >
                  </div>
				   <div class="form-group">
                    <label >Image:</label>
                    <input type="file" class="form-control" name="txt_image"    required >
                  </div>
				  <div class="form-group">
                    <label >Enter Vehical Ref No...</label>
                    <input type="text" class="form-control" name="txt_ref"    required >
                  </div>
				  <div class="form-group">
                    <label >Province Name</label>
                  <select  name="province_name" id="province_name" class="form-control" >

		                                <?php $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title";

		                                    $result = $connect->query($v_sql);

		                                    if ($result->num_rows > 0) {

		                                        while($row = $result->fetch_assoc()) { ?>

		                                        	<option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>

		                                      	<?php 

		                                     	}

		                                	} ?>

		                            </select>
                  </div> 
				  <div class="form-group">
                    <label >Enter Year...</label>
                     <input type="text" class="form-control" name="txt_year"    required >
                  </div>
				  <div class="form-group">
                    <label >Make</label>
                    <input type="text" class="form-control" name="txt_make"    required >
                  </div> 
				  <div class="form-group">
                    <label >Model</label>
                    <input type="txt_model" class="form-control" name="Model"    required >
                  </div>
				  <div class="form-group">
                    <label >Sub Model</label>
                    <input type="txt_model" class="form-control" name="txt_sub_model"    required >
                  </div>
				  <div class="form-group">
                    <label >Color</label>
                    <input type="txt_model" class="form-control" name="txt_color"    required >
                  </div> 
				  <div class="form-group">
                    <label >Horse Power</label>
                    <input type="txt_horse_power" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Transmission type</label>
                    <input type="txt_transmission_type" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Vehical type</label>
                    <input type="txt_vehical_type" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Type</label>
                    <input type="txt_type" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Maximum Weight</label>
                    <input type="txt_maximum_weight" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Steering Wheel Type</label>
                    <input type="txt_steering_wheel_type" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >No of axles</label>
                    <input type="txt_no_of_axles" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >No of eylinders</label>
                    <input type="txt_no_of_eylinders" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Cylinders disp</label>
                    <input type="txt_cylinders_disp" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Test drive url</label>
                    <input type="txt_test_drive_url" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Show url</label>
                    <input type="txt_show_url" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Note</label>
                    <input type="txt_note" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >VAT</label>
                    <input type="txt_vat" class="form-control" name="txt_color"    required >
                  </div>
				  <div class="form-group">
                    <label >Discount</label>
                    <input type="txt_discount" class="form-control" name="txt_color"    required >
                  </div> 
				  <div class="form-group">
                    <label >Status</label>
                    <input type="txt_status" class="form-control" name="txt_color"    required >
                  </div>
				   <div class="form-group">
                    <label >Price for Sale</label>
                    <input type="txt_price" class="form-control" name="txt_color"    required >
                  </div>
				   <div class="form-group">
                    <label >Price for Rent/day</label>
                    <input type="txt_price_rent" class="form-control" name="txt_color"    required >
                  </div>
				   <div class="form-group">
                    <label >Refundale Deposit</label>
                    <input type="txt_refun_deposit" class="form-control" name="txt_color"    required >
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
                                    value=".$row['pv_id'].">&hearts; ".strtoupper($row["pv_title"])."</option>";
                                                }
                                            }
                                        ?>
                                     </select>
                  </div>
				  
				  
             

               <div class="form-group">
                    <label>Description:</label>
                    <textarea  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail" required="required"></textarea>
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
</body>
</html>
