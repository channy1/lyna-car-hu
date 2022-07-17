<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>
<?php
	if(isset($_POST['btn_add'])){      
		$txt_type = @$connect->real_escape_string($_POST['txt_phone_line']);
		$txt_contact_person = @$connect->real_escape_string($_POST['txt_contact_person']);
		$txt_title = @$connect->real_escape_string($_POST['txt_title']);
		$txt_tel = @$connect->real_escape_string($_POST['txt_tel']);
		$txt_remark = @$connect->real_escape_string($_POST['txt_remark']);        
		$query_add = "INSERT INTO tbl_phone_line (                   
                   contact_person,
                   title,
                   tel,
                   remark,
                   type
                  ) 
                   VALUES(                   
                   '$txt_contact_person',
                   '$txt_title',
                   '$txt_tel',
                   '$txt_remark',
                   '$txt_type'
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
    }
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
				<h1>Add New Phone Line</h1>
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
				<div class="row">
					<div class="col-md-8">
						
					</div>
				</div>            
            </div>
            <!-- /.card-header -->
			<div class="card-body">	
				<form role="#" method="post" enctype="multipart/form-data" >
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<select name="txt_phone_line" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
										<option value="1">OFFICE</option>                   
										<option value="2">Carrental.com</option>
										<option value="3">Garage.com</option>
										<option value="4">Trading.com</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Contact Person:</label>
									<input type="text" class="form-control" name="txt_contact_person" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Title:</label>
									<input type="text" class="form-control" name="txt_title" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tel. No.:</label>
									 <input type="text" class="form-control" name="txt_tel" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Remark:</label>
									<input type="text" class="form-control" name="txt_remark" value="">
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row" style="float:right;">
							<div class="col-md-12 text-center">
								<button type="submit" name="btn_add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Add</button>
								<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
								<a href="index.php" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
							</div>
						</div>
					</div>
				</form>  
			</div>		
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
