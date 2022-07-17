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
          <div class="col-sm-12">

<?php 

    if(isset($_POST['btn_add'])){



            // $v_image = @$_FILES['txt_image'];



            // if($v_image["name"] != ""){

            //     $new_name = date("Ymd")."_".rand(1111,9999).".png";

            //     move_uploaded_file($v_image["tmp_name"],"../image/vehicle_rental/".$new_name);

            // }else{

            //     $new_name = "blank.png";

            // }



            $v_owner = @$connect->real_escape_string($_POST['txt_owner']);

            $v_note = @$connect->real_escape_string($_POST['txt_note']);

            $v_hand_phone= @$connect->real_escape_string($_POST['txt_hand_phone']);

            $v_card= @$connect->real_escape_string($_POST['txt_card']);

            $v_title= @$connect->real_escape_string($_POST['txt_title']);

            $txt_sex= @$connect->real_escape_string($_POST['txt_sex']);

            $txt_age= @$connect->real_escape_string($_POST['txt_age']);

            $txt_organization= @$connect->real_escape_string($_POST['txt_organization']);

            $txt_current_add= @$connect->real_escape_string($_POST['txt_current_add']);

            $txt_email= @$connect->real_escape_string($_POST['txt_email']);

            $txt_national= @$connect->real_escape_string($_POST['txt_national']);

            

            $query_add = "INSERT INTO tbl_owner_list(

                    ow_name,

                    ow_note,

                    own_title,

                    own_card,

                    hand_phone,

                    owner_sex,

                    owner_age,

                    owner_organization,

                    owner_address,

                    owner_email,

                    owner_nationality

                    ) VALUES(

                    '$v_owner',

                    '$v_note',

                    '$v_title',

                    '$v_card',

                    '$v_hand_phone',

                    '$txt_sex',

                    '$txt_age',

                    '$txt_organization',

                    '$txt_current_add',

                    '$txt_email',

                    '$txt_national'

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





			<?= @$sms ?>
            <h1>Create Owner OF The Vehical Agreement List Record</h1>
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
                   <div class="card-body">
                  <div class="form-group">
                    <label >Test Owner </label>
                    <input type="text" class="form-control" name="txt_owner" value="<?php echo $owner_name; ?>"  required >
                  </div>
                   <div class="form-group">
                    <label >Title </label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $o_title; ?>"   >
                  </div>

                   <div class="form-group">
                    <label >Hand Phone</label>
                    <input type="text" class="form-control" name="txt_hand_phone" value="<?php echo $o_hand; ?>"  required  >
                  </div>
				  <div class="form-group">
                    <label >Sex </label>
                   <select name="txt_sex" class='form-control'>

                                    <option <?php if($v_owner_sex=="Male") {echo "selected='selected'";} ?> value="Male">Male</option>

                                    <option <?php if($v_owner_sex=="Female") {echo "selected='selected'";} ?> value="Female">Female</option>

                                   </select>
                  </div>

                   <div class="form-group">
                    <label >Age</label>
                    <input type="text" class="form-control" name="txt_age" value="<?php echo $v_owner_age; ?>" required   >
                  </div> <div class="form-group">
                    <label >Organisation</label>
                    <input type="text" class="form-control" name="txt_organization" value="<?php echo $v_owner_organization; ?>" required   >
                  </div>
				   <div class="form-group">
                    <label >Current Address </label>
                    <input type="text" class="form-control" name="txt_current_add" value="<?php echo $v_owner_address; ?>" required   >
                  </div>

                   <div class="form-group">
                    <label >Nationality</label>
                    <input type="text" class="form-control" name="txt_national" value="<?php echo $v_owner_nationality; ?>"  required  >
                  </div>
             

               <div class="form-group">
                    <label>Email:</label>
                   <input type="text" class="form-control" name="txt_email" value="<?php echo $v_owner_email; ?>"  required  >
                  </div>
				   <div class="form-group">
                    <label >Id Card</label>
                    <input type="text" class="form-control" name="txt_card" value="<?php echo $o_card; ?>"  required  >
                  </div>
             

               <div class="form-group">
                    <label>Note:</label>
                    <input type="text" class="form-control" name="txt_note" value="<?php echo $owner_note; ?>"  required  >
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
