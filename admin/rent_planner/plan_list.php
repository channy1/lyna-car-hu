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
            <h1>MANAGE PRODUCTS RENTAL PLANNER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">MANAGE PRODUCTS RENTAL PLANNER</li>
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
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th scope="col">Ref. N&deg;</th>
								<th scope="col">Customer Name</th>
								<th scope="col">Customer Title</th>
								<th scope="col">From</th>
								<th scope="col">To</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query="SELECT * FROM tbl_schedule_admin where user_id = '$id' ORDER BY se_id DESC LIMIT 150";
								$result = $connect->query($query);
								$i=1;
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$delete_url="dalete.php?delete_id=".$row['se_id'];				
							?>
								<tr>
									<th scope="row"><?php echo $i++; ?></th>
									<td><?php echo $row['customer_name']; ?></td>
									<td><?php echo $row['sc_title']; ?></td>
									<td><?php echo $row['from_date']; ?></td>
									<td><?php echo $row['to_date']; ?></td>
									<td>
										<a href="edit.php?edit_id=<?php echo $row['se_id']; ?>" class="btn btn-xs btn-success" title="edit"><i class="fa fa-edit"></i> Edit</a>
										
										<a href="#" onclick="delete_data('<?php echo $delete_url;?>')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-trash"></i> Delete</a>
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
