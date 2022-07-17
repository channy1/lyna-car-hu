<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>
<?php
   if(isset($_POST['btn_add'])){      
      $edit_id	= $_GET['edit_id'];
      $txt_from = @$connect->real_escape_string($_POST['txt_from']);
      $txt_to 	= @$connect->real_escape_string($_POST['txt_to']);
      $txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
      $txt_phone 	= @$connect->real_escape_string($_POST['txt_phone']);
      $txt_email 	= @$connect->real_escape_string($_POST['txt_email']);
      $txt_color 	= @$connect->real_escape_string($_POST['txt_color']);
      $txt_remark 	= @$connect->real_escape_string($_POST['txt_remark']);
      $txt_plan_id 	= @$connect->real_escape_string($_POST['txt_plan_id']);
      $txt_status 	= @$connect->real_escape_string($_POST['txt_status']);
      $txt_customer_title = @$connect->real_escape_string($_POST['txt_customer_title']);
      $query_add = "UPDATE tbl_schedule_admin SET 
                   from_date='$txt_from',
                   to_date='$txt_to',
                   customer_name='$txt_customer_name',
                   cell_phone='$txt_phone',
                   email='$txt_email',
                   remark='$txt_remark',
                   color_note='$txt_color',
                   sc_status='$txt_status',
                   sc_title='$txt_customer_title'
                   WHERE se_id='$edit_id'";
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
		<?= @$sms ?>
        <div class="row mb-2">		
          <div class="col-sm-6">
            <h1>EDIT PRODUCTS RENTAL PLANNER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">EDIT PRODUCTS RENTAL PLANNER</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
				<div class="card-header">
					<div class="portlet-title">
						<div class="caption font-dark"></div>
						<div class="tools"> </div>
					</div>
					<h3 class="card-title"></h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<?php
						$id=$_GET['edit_id'];
						$query="SELECT * FROM tbl_schedule_admin WHERE se_id='$id'";
						$result = $connect->query($query);
						$i=1;
						if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()){
					?>
					<form role="#" method="post" enctype="multipart/form-data" >
                        <div class="card-body">							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>From:</label>
										<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_from" value="<?php echo $row['from_date']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>To:</label>
										<input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control"  name="txt_to" value="<?php echo $row['to_date']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Customer Name:</label>
										<input type="text" class="form-control" name="txt_customer_name" value="<?php echo $row['customer_name']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Cell Phone:</label>
										<input type="text" class="form-control"  name="txt_phone" value="<?php echo $row['cell_phone']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Time:</label>
										<input type="text" class="form-control" name="txt_customer_title" value="<?php echo $row['sc_title']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="txt_status">
											<option value="Confirmed" <?php if($row['sc_status']=="Confirmed"){echo 'selected';}?>>Confirmed</option>
											<option value="NOT YET" <?php if($row['sc_status']=="NOT YET"){echo 'selected';}?>>NOT YET</option>
											<option value="Follow-up" <?= ($row['sc_status']=='Follow-up')? 'selected':' '; ?>>Follow-up</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>E-mail:</label>
										<input type="text" class="form-control" name="txt_email" value="<?php echo $row['email']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Color:</label>
										<input type="color" class="form-control"  name="txt_color" value="<?php echo $row['color_note']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Remarks:</label>
										<textarea class="form-control" name="txt_remark"><?php echo $row['remark']; ?></textarea>
									</div>
								</div>
							</div>
                        </div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="btn_add" class="btn btn-primary">Update</button>
							<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
							<a href="index.php" class="btn btn-danger">Cancel</a>
						</div>
					</form>
					<?php } } ?>
				</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include '../footer.php'; ?>
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
<!-- DataTables -->
<script src="<?php echo $base_url; ?>admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $base_url; ?>admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url; ?>admin/dist/js/demo.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
