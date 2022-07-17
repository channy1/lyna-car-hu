<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
	//$edit_id = $_GET["edit_id"];
?>
<?php 
    $id = @$connect->real_escape_string($_GET['edit_id']);
	if(isset($_POST['btn_add'])){
		$id = @$connect->real_escape_string($_GET['edit_id']);
		$contact_person = @$connect->real_escape_string($_POST['txt_contact_person']);
		$title = @$connect->real_escape_string($_POST['txt_title']);
		$tel = @$connect->real_escape_string($_POST['txt_tel']);
		$remark = @$connect->real_escape_string($_POST['txt_remark']);        
		$query_add = "UPDATE tbl_phone_line
                    SET                   
                      contact_person='$contact_person',
                      title='$title',
                      tel='$tel',
                      remark='$remark'                    
                    WHERE id='$id'
                    ";
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
            <h1>Edit Phone Line</h1>
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
            <div class="card-body">
			<?php
			  $sql = "SELECT * FROM tbl_phone_line WHERE id='$id'";
			  $result = $connect->query($sql);
			  $row = mysqli_fetch_object($result);          
			?>
				<form role="#" method="post" enctype="multipart/form-data" >
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<select name="txt_phone_line" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
									  <option value="1" <?= $row->type==1?'selected':''?>>OFFICE</option>                   
									  <option value="2" <?= $row->type==2?'selected':''?>>Carrental.com</option>
									  <option value="3" <?= $row->type==3?'selected':''?>>Garage.com</option>
									  <option value="4" <?= $row->type==4?'selected':''?>>Trading.com</option>
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
									<input type="text" class="form-control" name="txt_contact_person" value="<?=$row->contact_person;?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Title:</label>
									 <input type="text" class="form-control" name="txt_title" value="<?=$row->title;?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tel. No.:</label>
									 <input type="text" class="form-control" name="txt_tel" value="<?=$row->tel;?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Remark:</label>
									<input type="text" class="form-control" name="txt_remark" value="<?=$row->remark;?>">
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row" style="float:right;">
							<div class="col-md-12 text-center">
								<button type="submit" name="btn_add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Update</button>
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
