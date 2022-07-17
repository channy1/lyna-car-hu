<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>
<?php
   if(isset($_POST['btn_add'])){      
      $txt_type = @$connect->real_escape_string($_POST['txt_type']);
      $txt_in_date = @$connect->real_escape_string($_POST['txt_in_date']);
      $txt_out_date = @$connect->real_escape_string($_POST['txt_out_date']);
      $txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
      $txt_action_by = @$connect->real_escape_string($_POST['txt_action_by']);
      $txt_email_address = @$connect->real_escape_string($_POST['txt_email_address']);
      $txt_subject = @$connect->real_escape_string($_POST['txt_subject']);
      $txt_status_remarks = @$connect->real_escape_string($_POST['txt_status_remarks']);    
      $query_add = "INSERT INTO tbl_cus_letter (                   
                   cus_name,
                   email_address,
                   subject,
                   in_date,
                   out_date,
                   action_by,
                   status_remarks,
                   type) 
                   VALUES(                   
                   '$txt_customer_name',
                   '$txt_email_address',
                   '$txt_subject',
                   '$txt_in_date',
                   '$txt_out_date',
                   '$txt_action_by',
                   '$txt_status_remarks',
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
				<h1>Add Thank you Letter</h1>
			</div>         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
		 <?= @$sms ?>
        <div class="col-md-12">
			<div class="card card-outline card-info">
				<div class="card-header">			
				</div>
				<!-- /.card-header -->
				<div class="card-body">	
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
									<option data-subtext="" value="1">Thank you Letter</option>    
									<option value="2">Incoming & Outgoing</option>               
								</select> 
							</div>
						</div>
						<div class="col-md-6">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>In Date:</label>
								<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_in_date" value="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Out Date:</label>
								<input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control"  name="txt_out_date" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Customer Name:</label>
								<input type="text" class="form-control" name="txt_customer_name" value="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Action By:</label>
								<select name="txt_action_by" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
									<option data-subtext="" value="">Select One</option>
									<?php
										$v_sql = "SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position ON tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  tbl_relationship_users_position.user_position_id ='10' AND user_first_name !='' AND user_last_name !='' ORDER BY user_first_name";
										$result = $connect->query($v_sql);
										if ($result->num_rows > 0){
											while($row = $result->fetch_assoc()){
                                    ?>
									<option data-subtext="" value="<?php echo $row['user_id']; ?>">
									<?php echo $row['user_first_name']; ?>
									<?php echo $row['user_last_name']; ?>
									</option>
									<?php } } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>E-mail Address:</label>
								<input type="text" class="form-control" name="txt_email_address" value="">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Subject:</label>
								 <input type="text" class="form-control" name="txt_subject" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Status/Remarks:</label>
								<input type="text" class="form-control" name="txt_status_remarks" value="">
							</div>
						</div>
					</div>	
					<div class="row" style="float:right;">
						<div class="col-md-12 text-center">
							<button type="submit" name="btn_add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Add</button>
							<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
							<a href="index.php" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
						</div>
					</div>
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
