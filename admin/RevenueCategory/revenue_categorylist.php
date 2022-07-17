<?php
	$menu_active =7;
    $layout_title = "Welcome...";
	require_once '../../system/config/database.php';
	require '../config.php'; 
	require '../editor_header.php'; 
	require '../sidebar.php';	
	$v_sql 	= "SELECT * FROM tbl_website_info";
	$result = $connect->query($v_sql);
	
    
?>

<?php
	$sql = "SELECT * FROM tbl_revenue_category";  
	$result = $connect->query($sql);  
	if(isset($_POST["btnadd"])){
		$v_name = $_POST["txt_name"];
		$v_note = $_POST["txt_note"];
		$sql = "INSERT INTO tbl_revenue_category 
					(reca_name, reca_note) 
				  VALUES 
					('$v_name', '$v_note')";
		$result = mysqli_query($connect, $sql);
		header('location:revenue_categorylist.php?message=success');
	}
    if(isset($_GET["id"])){
		$id = $_GET["id"];		  
		$sql = "DELETE FROM tbl_revenue_category WHERE reca_id = '$id'" ;
		$result = mysqli_query($connect, $sql);
		header("location:revenue_categorylist.php?message=delete");  
	} 
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
					<h2 class="text-primary">Revenue Category </h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Revenue Category</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
				<div class = "col-12">
				<?php
					if (!empty($_GET['message']) && $_GET['message'] == 'success') {
						echo '<div class="alert alert-success">' ;
						echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
						echo '<h4>Success Add Record</h4>';
						echo '</div>';
					}else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
						echo '<div class="alert alert-info">' ;
						echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
						echo '<h4>Success Update Record</h4>';
						echo '</div>';
					}else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
						echo '<div class="alert alert-danger">' ;
						echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
						echo '<h4>Success Delete Record</h4>';
						echo '</div>';
					}
				?>
				</div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
							<hr>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New</button>
							<!-- Modal -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add New</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<div class="col-md-12">
												<form method="post" enctype="multipart/form-data" action="">     
													<div class="form-group col-xs-12">
														<label for ="">Revenue Category :</label>                      
														<input class="form-control" required  name="txt_name" type="text" placeholder="Category Name">          
													</div>
													<div class="form-group col-xs-12">
														<label for ="">Note :</label>                            
														<textarea class="form-control" rows="4" id="note" name = "txt_note"></textarea>         
													</div>
													<div class="form-group col-xs-6">
														<button type="submit" name="btnadd" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div> 
												</form>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div> 
							<!-- <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Clear</a> -->
							
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 10px;">No</th>
										<th>Revenue Category</th>
										<th>Note</th>
										<th><i class="fa fa-cog" aria-hidden="true"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php
										$i=1; 
										while($row = $result->fetch_assoc()){ 										 
											$v1=$row["reca_id"];
											$v2=$row["reca_name"];
											$v3=$row["reca_note"];
									?>
									<tr>
										<td><?php echo ($i++) ;?></td> 
										<td><?php echo $v2;?></td>
										<td><?php echo $v3;?></td>
										<td align = "center">
										<a href="edit_revenue_category.php?id=<?php echo $row['reca_id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
										<a onclick = "return confirm('Are you sure to delete ?');" href="revenue_categorylist.php?id=<?php echo $row['reca_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a> 
										</td>
									</tr>  
                                    <?php } ?>
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
<style type="text/css">
table th {
	text-align: center;
}
</style>
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