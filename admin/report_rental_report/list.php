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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"> 
					<h1>RENTAL REPORT LIST</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">RENTAL REPORT LIST</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>							
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<tr>
											<th scope="col">No.</th>

                  <th scope="col">Vendor Name</th>

                  <th scope="col">Start Date</th>

                  <th scope="col">End Date</th>

                  <th scope="col">Amount</th>

                  <th scope="col">Discount(%)</th>

                  <th scope="col">Discount Record</th>

                  <th scope="col">After Discount</th>

                  <th scope="col">Commission(%)</th>

                  <th scope="col">Bonus Saving</th>

                  <th scope="col">Net Income</th>

                  <th scope="col">Action</th>
										</tr>
									</tr>
								</thead>
								<tbody>
									<?php

                    $query="SELECT * FROM tbl_rental_report 

                                 INNER JOIN tbl_users

                                 ON tbl_users.user_id=tbl_rental_report.customer_id

                                 WHERE status_type='1'

                                 ORDER BY start_date DESC LIMIT 150

                        ";

                        $result = $connect->query($query);

                        $i=1;

                        if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()){



                ?>
										<tr>
											<th scope="row"><?php echo $i++; ?></th>

                  <td style="text-align: left;"><?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?></td>

                  <td><?php echo $row['start_date']; ?></td>

                  <td><?php echo $row['end_date']; ?></td>

                  <td><?php echo $row['amount']; ?></td>

                  <td><?php echo $row['discount_pre']; ?></td>

                  <td>$<?php echo number_format($row['discount_record'],2); ?></td>

                  <td>$<?php echo number_format($row['after_discount'],2); ?></td>

                   <td><?php echo $row['commission']; ?></td>

                  <td>$<?php echo number_format($row['bonus_save'],2); ?></td>

                 

                  <td>$<?php echo number_format($row['net_income'],2); ?></td>

                 

                  <td>

                   <a href="edit.php?edit_id=<?php echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit

                   </a>

                    <a href="dalete.php?delete_id=<?php echo $row['rental_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>

                  </td>
										</tr>  
									<?php } }?>
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