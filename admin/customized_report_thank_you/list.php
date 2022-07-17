<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
$id=@$_SESSION['user']->user_id;
?>  

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
		<?= @$sms ?>
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
					<form action="" method="post">      
						<div class="row">
						<div class="col-md-4">      
							<select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
								<option data-subtext="" value="1" <?php echo $type==1?'selected':'';?>>Thank you Letter</option>                    
								<option value="2" <?php echo $type==2?'selected':'';?>>Incoming & Outgoing</option>               
							</select>                  
						</div>      
						<div class="col-md-2">         
							<input type="submit" class="btn btn-primary" name="btn_view" value="View Now">
						</div>
						</div>  
					</form>
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
								<th>Action</th> 
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT tbl_cus_letter.*, user.user_first_name, user.user_last_name FROM tbl_cus_letter INNER JOIN tbl_users AS user ON tbl_cus_letter.action_by = user.user_id WHERE tbl_cus_letter.type='$type' ORDER BY id DESC";                     
									$result = $connect->query($query);
									$i=0;
									if ($result->num_rows > 0) {
									while($row = mysqli_fetch_object($result)){
							?>
								<tr>
									<td><?=++$i;?></td>            
									<td><?=$row->cus_name;?></td>            
									<td><?=$row->email_address;?></td>
									<td><?=$row->subject;?></td>
									<td><?=$row->in_date;?></td>
									<td><?=$row->out_date;?></td>
									<td><?=$row->user_first_name;?> <?=$row->user_last_name;?></td>
									<td><?=$row->status_remarks;?></td>
									<td>
									<a href="edit.php?edit_id=<?php echo $row->id; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
									</a>
									<a href="dalete.php?delete_id=<?php echo $row->id; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
									</td>
								</tr>
							<?php } } ?> 
						</tbody>
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
				//window.location.href = url;
				$.ajax({
                    url: url,
                    type: 'POST',
                    data: {

                    },
                    success: function(responce){
                        if(responce == 1){
                            swal("Delete Successfully", {
                                icon: "success",
                            }).then((willDelete) => {
                                location.reload();
                            });
                        }else {
                            swal("Your pre information detail is safe!");
							location.reload();
                        }
                    }
                });
			}else{
				swal("Your pre information detail is safe!");
			}
		});
	}

</script>
</body>
</html>
