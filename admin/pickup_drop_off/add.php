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

       

            $txt_vehicle = @$connect->real_escape_string($_POST['txt_vehicle']);

            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);

            $txt_status = @$connect->real_escape_string($_POST['txt_status']);

            $txt_province_id = @$connect->real_escape_string($_POST['txt_province_id']);



            // start insert multy rows

            

           

            $fix_name='txt_province_from';

            for ($x = 0; $x <=27; $x++) {

             

               if($fix_name.$x !="") {





                  $txt_province_from =@$connect->real_escape_string($_POST['txt_province_from'.$x]);

                  $txt_province_to = @$connect->real_escape_string($_POST['txt_province_to'.$x]);

                  $txt_distance = @$connect->real_escape_string($_POST['txt_distance'.$x]);

                  $txt_rate_one = @$connect->real_escape_string($_POST['txt_rate_one'.$x]);

                  $txt_discount_one = @$connect->real_escape_string($_POST['txt_discount_one'.$x]);

                  $txt_one_way = @$connect->real_escape_string($_POST['txt_one_way'.$x]);

                  $txt_rate_two = @$connect->real_escape_string($_POST['txt_rate_two'.$x]);

                  $txt_discount_two = @$connect->real_escape_string($_POST['txt_discount_two'.$x]);

                  $txt_round_trip = @$connect->real_escape_string($_POST['txt_round_trip'.$x]);

                  $txt_note = @$connect->real_escape_string($_POST['txt_note'.$x]);

                    if($txt_province_from !="") {







                    $query_add = "INSERT INTO tbl_pickup_drop_off(

                       `car_id`,

                       `vat`,

                       `pro_from_id`,

                       `province_id`,

                       `pro_to_id`,

                       `distant`,

                       `rate_one`,

                       `rate_two`,

                       `discount_one`,

                       `discount_two`,

                       `round_trip`,

                       `note`,

                       `one_way`,

                       `status`

                    ) VALUES(

                       '$txt_vehicle',

                       '$txt_vat',

                       '$txt_province_from',

                       '$txt_province_id',

                       '$txt_province_to',

                       '$txt_distance',

                       '$txt_rate_one',

                       '$txt_rate_two',

                       '$txt_discount_one',

                       '$txt_discount_two',

                       '$txt_round_trip',

                       '$txt_note',

                       '$txt_one_way',

                       '$txt_status'

                    )";



                  // echo  $query_add;

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

              } }

               else {



                $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> '.mysqli_error($connect).'...

                </div>'; } }  } ?>






            <h1>Create Pickup Drop Off Record</h1>
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
            

                 <form role="#" method="post" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label >Ref No.</label>
                    <select class="form-control" name="txt_vehicle" id="vehicle">

                                <?php

                                  $v_sql = "SELECT * FROM tbl_vehicle_rantal";

                                  $result = $connect->query($v_sql);

                                   if ($result->num_rows > 0) {

                                    while($row = $result->fetch_assoc()) {

                                ?>

                                <option value="<?php echo $row['ve_id']; ?>"><?php echo $row['ve_ref_no']; ?></option>

                              <?php

                                 }

                               }

                              ?>

                         

                         </select>
                  </div>

                  <div class="form-group">
                    <label >Title (Kh):</label>
                    <input type="text" class="form-control" name="pre_title_kh" placeholder="Enter Title"   required >
                  </div>


 <div class="form-group">
                  <label >Choose Image:</label>
                    <input type="file" class="form-control" name="txt_image" required   placeholder="Image.jpg"  >
                  </div>
                 
             

               <div class="form-group">
                    <label>Detail (En):</label>
                    <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail" required="required"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Detail (Kh):</label>
                    <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="pre_detail_kh" required="required"></textarea>
                  </div>
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
