<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
$exp_id = $_GET["id"]; 
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

<?php 
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "SELECT * from tbl_expense_category where exca_id = $id";
		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($result);	
	}
	if(!empty($_POST["id"])){
			$id = $_POST["id"];
			$v_name = $_POST["txt_name"];
   		    $v_note = $_POST["txt_note"];
			$sql = "UPDATE tbl_expense_category 
						SET exca_name = '$v_name', exca_note = '$v_note' 
						WHERE exca_id = '$id'" ;
			mysqli_query($connect, $sql);
			header("location:expense_category.php?message=update");
	}
?>





            <h1>Edit Expense Category</h1>
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
            

			<form role="form" method="post" >
                <div class="card-body">
					<div class="form-group">
						<input type = "hidden" name = "id" value = "<?php echo $id; ?>">
						<label for ="">Expense Category:</label>                                          
						<input class="form-control" required  name="txt_name" type="text" value = "<?php echo $row["exca_name"]?>">
					</div>
					<div class="form-group">
						<label for="note">Note:</label>
						<textarea class="form-control" rows="4" id="note" name = "txt_note"><?php echo $row["exca_note"]?></textarea>  
					</div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
				  <a href="<?php echo $base_url;?>admin/ExpenesCategory/expense_category.php" class="btn btn-danger">Back</a>
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
