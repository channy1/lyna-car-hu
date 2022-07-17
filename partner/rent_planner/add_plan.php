<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
	$v_sql = "SELECT * FROM tbl_pre_info";
    $result = $connect->query($v_sql);
?>
<?php
	if(isset($_POST['btn_add'])){      
		$txt_from = @$connect->real_escape_string($_POST['txt_from']);
		$txt_to = @$connect->real_escape_string($_POST['txt_to']);
		$txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
		$txt_phone = @$connect->real_escape_string($_POST['txt_phone']);
		$txt_email = @$connect->real_escape_string($_POST['txt_email']);
		$txt_color = @$connect->real_escape_string($_POST['txt_color']);
		$txt_remark = @$connect->real_escape_string($_POST['txt_remark']);
		$txt_plan_id = @$connect->real_escape_string($_POST['txt_plan_id']);
		$txt_status = @$connect->real_escape_string($_POST['txt_status']);
		$txt_customer_title = @$connect->real_escape_string($_POST['txt_customer_title']);
		if($txt_plan_id=="Vehicle"){
			$insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_car_id']);
		}elseif ($txt_plan_id=="T.Quide") {
			$insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_tr_id']);
		}elseif ($txt_plan_id=="Driver") {
			$insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_driver_id']);
		}elseif ($txt_plan_id=="RickShaw") {
			$insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_rick_id']);
		}elseif ($txt_plan_id=="Accessories") {
			$insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_acc_id']);
		}else {
			$insert_ref_id=0;
		}
		$id=@$_SESSION['user']->user_id;
		$query_add = "INSERT INTO tbl_schedule_admin (
                   ref_no,
                   from_date,
                   to_date,
                   customer_name,
                   cell_phone,
                   email,
                   remark,
                   color_note,
                   sc_type,
                   sc_status,
                   sc_title,
                   user_id
                    ) VALUES(
                   '$insert_ref_id',
                   '$txt_from',
                   '$txt_to',
                   '$txt_customer_name',
                   '$txt_phone',
                   '$txt_email',
                   '$txt_remark',
                   '$txt_color',
                   '$txt_plan_id',
                   '$txt_status',
                   '$txt_customer_title',
                   '$id'
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
		<?= @$sms ?>
          <div class="col-sm-6">
            <h1>ADD PRODUCTS RENTAL PLANNER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ADD PRODUCTS RENTAL PLANNER</li>
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
					<form role="#" method="post" enctype="multipart/form-data" >
                        <div class="card-body">
							<div class="form-group row">
								<label for="staticEmail"> Vehicle</label>
								<div class="col-md-3">
									 <input type="radio" id="txt_vehicle_id" name="txt_plan_id" value="Vehicle">
								</div>
								<label for="staticEmail"> Driver</label>
								<div class="col-md-3">
									<input type="radio" id="txt_driver_id" name="txt_plan_id" value="Driver">
								</div>
								<label for="staticEmail" >Accessories</label>
								<div class="col-md-3">
									&nbsp;<input type="radio" id="txt_acc_id" name="txt_plan_id" value="Accessories">
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail"> T.Quide</label>
								<div class="col-md-3">
									<input type="radio" id="txt_tr_id" name="txt_plan_id" value="T.Quide">
								</div>
								<label for="staticEmail"> RickShaw</label>
								<div class="col-md-3">
									<input type="radio" id="txt_rick_id" name="txt_plan_id" value="RickShaw">
								</div>
							</div>
							<div class="form-group form_group_custom">
								<label for="staticEmail">Ref. N&deg;</label>
								<select name="txt_refo_car_id" id="txt_refo_car_id" class="form-control">
									<?php
										$query="SELECT * FROM tbl_vehicle_rantal";
										$result = $connect->query($query);
										if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){
									?>
									<option value="<?php echo $row['ve_id']; ?>">
									<?php echo $row['ve_ref_no']; ?></option>
									<?php } } ?>
								</select>
								<select name="txt_refo_driver_id" id="txt_refo_driver_id" class="form-control">
									<?php
									 $query="SELECT * FROM tbl_users
												INNER JOIN tbl_relationship_users_position 
										On tbl_users.user_id = tbl_relationship_users_position.user_id
										 WHERE  user_position='3' AND user_position_id='8'
										 ORDER BY user_first_name
										";
										$result = $connect->query($query);
										if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){
									?>
									<option value="<?php echo $row['user_id']; ?>">
									  <?php echo $row['user_first_name']; ?>  
									  <?php echo $row['user_last_name']; ?></option>
									<?php } }?>
								</select>
								<select name="txt_refo_tr_id" id="txt_refo_tr_id" class="form-control">
								<?php
									$query="SELECT * FROM tbl_users
											INNER JOIN tbl_relationship_users_position 
									On tbl_users.user_id = tbl_relationship_users_position.user_id
									 WHERE  user_position='3' AND user_position_id='7'
									 ORDER BY user_first_name
									";
									$result = $connect->query($query);
									if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
								?>
									<option value="<?php echo $row['user_id']; ?>">
									<?php echo $row['user_first_name']; ?>  
									<?php echo $row['user_last_name']; ?></option>
								<?php } }?>
								</select>
								<select name="txt_refo_acc_id" id="txt_refo_acc_id" class="form-control">
									<?php
										$query="SELECT * FROM tbl_accessories_rental";
										$result = $connect->query($query);
										if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){
									?>
									<option value="<?php echo $row['ac_id']; ?>">
									  <?php echo $row['ac_ref_no']; ?>  
									  </option>
									<?php } } ?>
								</select>
								<select name="txt_refo_rick_id" id="txt_refo_rick_id" class="form-control">
									<?php
									 $query="SELECT * FROM tbl_rick_shaw_rental_last
												
										";
										$result = $connect->query($query);
										if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()){
									?>
									<option value="<?php echo $row['ve_id']; ?>">
									  <?php echo $row['ve_ref_no']; ?>  
									  </option>
									<?php } } ?>
								</select>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>From:</label>
										<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_from" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>To:</label>
										<input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control"  name="txt_to" value="">
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
										<label>Cell Phone:</label>
										<input type="text" class="form-control"  name="txt_phone" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Time:</label>
										<input type="text" class="form-control" name="txt_customer_title" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Status</label>
										<select class="form-control" name="txt_status">
											<option value="Confirmed">Confirmed</option>
											<option value="NOT YET">NOT YET</option>
											<option value="Follow-up">Follow-up</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>E-mail:</label>
										<input type="text" class="form-control" name="txt_email" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Color:</label>
										<input type="color" class="form-control"  name="txt_color" value="#ff0000">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Remarks:</label>
										<textarea class="form-control" name="txt_remark"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Approved By:</label>
										 <input type="text" name="txt_approved" class="form-control">
									</div>
								</div>
							</div>
                        </div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="btn_add" class="btn btn-primary">Add</button>
							<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
							<a href="index.php" class="btn btn-danger">Cancel</a>
						</div>
					</form>
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
<style type="text/css">
#txt_refo_car_id,#txt_refo_driver_id,
#txt_refo_tr_id,#txt_refo_acc_id,#txt_refo_rick_id {
  display: none;
}
</style> 
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
	// start option select
	$(document).ready(function (){ 
		$("#txt_vehicle_id").click(function(){
			$("#txt_refo_car_id").css("display", "block");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_driver_id").click(function(){
			$("#txt_refo_driver_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
        $("#txt_tr_id").click(function(){
			$("#txt_refo_tr_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_rick_id").click(function(){
			$("#txt_refo_rick_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_acc_id").click(function(){
			$("#txt_refo_acc_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
		});           
	});
// end start option


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

  function delete_data(url){
    swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this pre information detail",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
 window.location.href = url;
  } else {
    swal("Your pre information detail is safe!");
  }
});
}

</script>
</body>
</html>
