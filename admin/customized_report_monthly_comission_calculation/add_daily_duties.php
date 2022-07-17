<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
				<h1>MONTHLY COMMISSION CALCULATION LIST</h1>
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
            

			<form role="#" method="post" enctype="multipart/form-data" >
                <div class="card-body">
					<div class="row">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th scope="col">Ref. N&deg;</th>
								<th scope="col">Customer Name</th>
								<th scope="col">Invoice N&deg;</th>
								<th scope="col">From</th>
								<th scope="col">To</th>
								<th scope="col">Action</th>              
							</tr>
						</thead>
							<tbody>
								<?php
									$query = "SELECT * FROM tbl_monthly_commission ORDER BY m_c_id DESC LIMIT 150";
									$result = $connect->query($query);
									$i=1;
									if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
										$delete_url="dalete.php?delete_id=".$val->id;
								?>
									<tr>
										<th scope="row"><?php echo $i++; ?></th>
										<td style="text-align: left;"><?php echo $row['customer_name']; ?></td>
										<td><?php echo $row['invoice_no']; ?></td>
										<td><?php echo $row['from_date']; ?></td>
										<td><?php echo $row['to_date']; ?></td>
										<td>
										<a href="edit.php?edit_id=<?php echo $row['m_c_id']; ?>" class="btn btn-success" title="edit"><i class="fa fa-edit"></i>Edit
										</a>
										<a href="#" onclick="delete_data('<?php echo $delete_url;?>')" class="btn btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
										</td>
									</tr>
								<?php } } ?>							 
							</tbody>
						</table>
					</div>					
				</div>
                <div class="card-footer">
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
$(function () {
    /* $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    }); */
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
