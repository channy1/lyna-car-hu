<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>
<?php
    if(isset($_POST['btn_view'])){
      $type = $_POST['txt_type'];      
           
    }else{
      $type = 1;
    }
    $sql = "SELECT * FROM tbl_phone_line WHERE type='$type'"; 
    $result = $connect->query($sql);
    if($result->num_rows>0)
    {
      while($row = mysqli_fetch_object($result))
      {
        $r[]=$row;
      } 
    }else{
      $r='';
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
            </div>
            <!-- /.card-header -->
            

			<form role="#" method="post" enctype="multipart/form-data" >
                <div class="card-body">
					<div class="row mb-2">
						<div class="col-md-6">
							<form action="" method="post">      
							  <div class="row">
							   <div class="col-md-6">
									<!-- prepared by select -->
									<select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
									  <option value="1" <?php echo $type==1?'selected':''?>>Owner</option>                   
									  <option value="2" <?php echo $type==2?'selected':''?>>CarRental.Com</option>
									  <option value="3" <?php echo $type==3?'selected':''?>>Garage.Com</option>
									  <option value="4" <?php echo $type==4?'selected':''?>>Grace Trading.Com</option>
									</select>                                  
								</div>      
								<div class="col-md-2">         
								  <input type="submit" class="btn btn-primary" name="btn_view" value="View Now">
								</div>
							  </div>  
							</form>  
						</div>
						<div class="col-md-6">
							<div class="form-group">
							</div>
						</div>
					</div>
					<div class="row">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>CONTACT PERSON</th>
								<th>TITLE</th>
								<th>TEL. NO.</th>
								<th>REMARKS</th>
								<th>Action</th>               
							</tr>
						</thead>
							<tbody>
								<?php
									if($r>0){
										foreach ($r as $val){  
										$delete_url="dalete.php?delete_id=".$val->id;	
								?>
									<tr>
										<td><?php echo $val->contact_person;?></td>
										<td><?php echo $val->title;?></td>
										<td>
										<?php echo(str_replace('/', '<br>', $val->tel));?>
										</td>
										<td><?php echo $val->remark;?></td>
										<td>
										<a href="edit.php?edit_id=<?php echo $val->id; ?>" class="btn btn-success" title="edit"><i class="fa fa-edit"></i>Edit
										</a>
										<a href="#" onclick="delete_data('<?php echo $delete_url;?>')" class="btn btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
										</td>
									</tr>
								<?php $i++;} } ?>							 
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
