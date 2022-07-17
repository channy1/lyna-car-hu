<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thank you Letter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thank you Letter</li>
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
							<div class="row">
								<div class="col-md-8">
									<form>
										<?php
											$s_input_month=@$connect->real_escape_string($_GET['txt_month']);
											$s_input_year=@$connect->real_escape_string($_GET['txt_year']);
											$s_txt_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);
											$type=@$connect->real_escape_string($_GET['txt_type']); 
										?>
										<div class="form-group row">
											<label for="staticEmail" class="col-md-2 col-form-label">FROM:</label>
											<div class="col-md-3">
												<input value="<?php echo $s_input_month ?>" type="text" class="form-control" name="txt_month" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
											</div>
											<label for="staticEmail" class="col-md-1 col-form-label">TO:</label>
											<div class="col-md-3">
												<input value="<?php echo $s_input_year ?>" type="text" class="form-control" name="txt_year" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
											</div>
											<div class="col-md-3">
												<select name="txt_parner_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
												<option data-subtext="" value="">Select One</option>
												<?php
												$v_sql = "SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position ONtbl_users.user_id = tbl_relationship_users_position.user_id WHERE  tbl_relationship_users_position.user_position_id = '10' AND user_first_name !='' AND user_last_name !='' ORDER BY user_first_name";
												$result = $connect->query($v_sql);
												if ($result->num_rows > 0){
												while($row = $result->fetch_assoc()){              
												?>
													<option <?php if($s_txt_parner_name==$row['user_id']) { echo"selected='selected'";}?> data-subtext="" value="<?php echo $row['user_id']; ?>">
													<?php echo $row['user_first_name']; ?>
													<?php echo $row['user_last_name']; ?>
													</option>
													<?php } } ?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-4">
												<select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
												<option data-subtext="" value="1" <?php echo $type==1?'selected':'';?>>Thank you Letter</option>
												<option value="2" <?php echo $type==2?'selected':'';?>>Incoming & Outgoing</option>  
												</select>   
											</div>
											<div class="col-md-2">
												<button style='float: right;margin-right: -25px;' type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
											</div>
											<div class="col-md-2">
												<button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-print"></i>Print Com</button>
											</div>
										</div>
										<br>
									</form>
								</div>
								<div class="col-md-2">
									<a target="_blank" class="btn btn-danger" href="add.php"><i class="fa fa-calendar"></i> Add Reports</a>
								</div>
								<div class="col-md-2">
									<a target="_blank" class="btn btn-danger" href="list.php"><i class="fa fa-calendar"></i> Manage</a>
								</div>
							</div>
                        </div>
              <!-- /.card-header -->
			<div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>Customer Name</th>
							<th>E-mail Address</th>
							<th>Subject</th>
							<th>In Date</th>
							<th>Out Date</th>
							<th>Action By</th>
							<th>Status/Remarks</th>     
						</tr>
					</thead>
			<?php
				$in_date = @$connect->real_escape_string($_GET['txt_month']);
				$out_date = @$connect->real_escape_string($_GET['txt_year']);
				$parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
				$type = @$connect->real_escape_string($_GET['txt_type']);
				if($in_date != ''){
					$in_date = @$connect->real_escape_string($_GET['txt_month']);
				}else{
					$in_date = "";
				}
				if($out_date != ""){
					$out_date = @$connect->real_escape_string($_GET['txt_year']);
				}else{
					$out_date="";
				}
				if($parner_name !=""){
					$parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
				}else{
					$parner_name = '';
				}
				if($type != ""){
				  $type = @$connect->real_escape_string($_GET['txt_type']);
				}else{
				  $type ="";
				}                    
				$query = "SELECT tbl_cus_letter.*, user.user_first_name, user.user_last_name FROM tbl_cus_letter INNER JOIN tbl_users AS user ON tbl_cus_letter.action_by = user.user_id WHERE in_date >= '$in_date' AND out_date <= '$out_date' AND action_by='$parner_name' AND type='$type'";
				$result = $connect->query($query);
				$i = 0;
				while ($row = mysqli_fetch_object($result)) {
            ?>
			<tbody>
                <tr>
					<td><?=++$i;?></td>            
					<td><?=$row->cus_name;?></td>            
					<td><?=$row->email_address;?></td>
					<td><?=$row->subject;?></td>
					<td><?=$row->in_date;?></td>
					<td><?=$row->out_date;?></td>
					<td><?=$row->user_first_name;?> <?=$row->user_last_name;?></td>
					<td><?=$row->status_remarks;?></td>
                </tr>
			</tbody>
            <?php } ?>
                </table>
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
