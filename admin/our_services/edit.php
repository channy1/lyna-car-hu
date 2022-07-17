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
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_our_service WHERE se_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["se_title"];
            $title_kh = $row["se_title_kh"];
            $image = $row["se_image"];
            $description = $row["se_detail"];
            $description = $row["se_detail_kh"];
        }
    }
    
?>

<?php 
    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['se_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], $inner_directory_path."our_service/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['se_title']);
            $v_title_kh = @$connect->real_escape_string($_POST['se_title_kh']);
            $v_detail = @$connect->real_escape_string($_POST['se_detail']." ");
            $v_detail_kh = @$connect->real_escape_string($_POST['se_detail_kh']." ");
           $query_add = "UPDATE tbl_our_service SET se_title='$v_title',se_title_kh='$v_title_kh',se_image='$new_name',se_detail='$v_detail',se_detail_kh='$v_detail_kh' WHERE se_id='$edit_id'";
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
    $query="SELECT * FROM tbl_our_service WHERE se_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["se_title"];
            $title_kh = $row["se_title_kh"];
            $image = $row["se_image"];
            $description = $row["se_detail"];
            $description_kh = $row["se_detail_kh"];
        }
    }
   
?>
       





            <h1>Edit Our Services </h1>
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
            

                 <form role="form" method="post" enctype="multipart/form-data"  >
                <div class="card-body">
                  <div class="form-group">
                    <label >Title:</label>
                    <input type="text" class="form-control" name="se_title" value="<?php echo $title; ?>"  required >
                  </div>
                   <div class="form-group">
                    <label >Title:</label>
                    <input type="text" class="form-control" name="se_title_kh" value="<?php echo $title_kh; ?>"   >
                  </div>

                   <div class="form-group">
                    <label >Image:</label><br/>
                    <img  width='100px' height='100px' src="<?php echo $img_path; ?>our_service/<?php echo $image; ?>">
                    <input type="file" class="form-control" name="se_image"    >
                  </div>
             

               <div class="form-group">
                    <label>Description:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="se_detail"><?php echo $description; ?></textarea>
                  </div>

 <div class="form-group">
                    <label>Description:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="se_detail_kh"><?php echo $description_kh; ?></textarea>
                  </div>

                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
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
