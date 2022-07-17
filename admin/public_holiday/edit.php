<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
	$edit_id = $_GET["edit_id"];
    $query="SELECT * FROM tbl_holiday WHERE holiday_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $date_holiday = $row["date_public"];
            $number_order_date = $row["order_number"];
            $description =  $row["description"];
        }
    }
?>	
<?php
    if(isset($_POST['btn_save'])){
        $txt_date = @$connect->real_escape_string($_POST['txt_date']);
        $txt_order_number = @$connect->real_escape_string($_POST['txt_order_number']);
        $txt_description = $_POST['txt_description']; 
        $query_edit = "UPDATE tbl_holiday SET date_public='$txt_date',order_number='$txt_order_number',description='$txt_description' WHERE holiday_id='$edit_id'";
        if($connect->query($query_edit)==TRUE){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted...
            </div>';
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Something Went Wrong ...
            </div>';  
        }
    }
?>
<?php  
    $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_holiday WHERE holiday_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $date_holiday = $row["date_public"];
            $number_order_date = $row["order_number"];
            $description =  $row["description"];
        }
    }
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
		<?= @$sms ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Public Holidays</h1>
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
                    <label >Name of Holidays :</label>
                    <input  value="<?php echo $description; ?>"  type="text" name="txt_description" class="form-control input-sm emptys"  style="background-color: white;" required>
                  </div>
				  <div class="form-group">
                    <label >Date :</label>
                   <input type="text" value="<?php echo $date_holiday; ?> " class="form-control" name="txt_date"   autocomplete="off" style="background-color: white;" required>
                  </div>

                   <div class="form-group">
                    <label >Order Number</label>
                    <input type="text" value="<?php echo $number_order_date; ?>" class="form-control" name="txt_order_number"   autocomplete="off" style="background-color: white;" required>
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
