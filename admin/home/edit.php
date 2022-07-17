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

            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            $v_title_kh = @$connect->real_escape_string($_POST['txt_title_kh']);

            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");

            $v_detail_kh = @$connect->real_escape_string($_POST['txt_detail_kh']." ");

            $query_add = "UPDATE tbl_layout_content SET 

            title='$v_title',description='$v_detail',title_kh='$v_title_kh',description_kh='$v_detail_kh'

             WHERE pb_id='$edit_id'";



            if($connect->query($query_add)==TRUE){

                $sms = '<div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Successfull!</strong> Data inserted ...

                </div>'; 

            }else{

                $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> Query error ...

                </div>';   

            }

            ?>

				<div class="alert alert-success" role="alert">
				 Updated Successfully!
				</div>
            <?php

    }






    $query="SELECT * FROM tbl_layout_content WHERE pb_id='$edit_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

            $title = $row["title"];

            $title_kh = $row["title_kh"];

            $description = $row["description"];

            $v_description_kh = $row["description_kh"];

        }

    }

    ?>





            <h1>Edit Top Menu</h1>
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

                 <form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label >Title (En):</label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $title; ?>"  required >
                  </div>
                  <div class="form-group">
                    <label >Title (Kh):</label>
                    <input type="text" class="form-control" name="txt_title_kh" value="<?php echo $title_kh; ?>"  required>
                  </div>


               <div class="form-group">
                    <label>Description (En):</label>
                    <textarea class="textarea" placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail"><?php echo $description; ?></textarea>
                  </div>

                  <div class="form-group">
                    <label>Description (Kh):</label>
                    <textarea class="textarea" placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail_kh"><?php echo $v_description_kh; ?></textarea>
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
