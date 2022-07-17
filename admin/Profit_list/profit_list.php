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
	if(isset($_POST['search'])){
		$from = $_POST['from'];
		$to = $_POST['to'];
		$v_current_year_month=date('Y-m');
		$sql = "SELECT * FROM tbl_expense_list AS A
      LEFT JOIN tbl_expense_category AS B ON A.exp_expense_category=B.exca_id
      LEFT JOIN tbl_users AS C ON A.exp_employee=C.user_id
      WHERE DATE_FORMAT(exp_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
      ORDER BY A.exp_date_record DESC
      ";   
	}else{
		$v_current_year_month=date('Y-m');
		$sql = "SELECT * FROM tbl_expense_list AS A
      LEFT JOIN tbl_expense_category AS B ON A.exp_expense_category=B.exca_id
      LEFT JOIN tbl_users AS C ON A.exp_employee=C.user_id
      WHERE DATE_FORMAT(exp_date_record,'%Y-%m')='$v_current_year_month'
      ORDER BY A.exp_date_record DESC
      ";    
	}
	$result = $connect->query($sql);
	
	
	
	if(isset($_POST["btnadd"])){
		$v_date_record 		= $_POST["txt_date_record"];
		$v_description		= $_POST["txt_description"];
		$v_expense_category = $_POST["txt_expense_category"];
		$v_amount 			= $_POST["txt_amount"];
		$v_employee 		= $_POST["txt_employee"];
		$v_note 			= $_POST["txt_note"];

		$sql = "INSERT INTO tbl_expense_list 
                          (exp_date_record
                            , exp_description
                            , exp_expense_category
                            , exp_amount
                            , exp_employee
                            , exp_note
                            ) 
                        VALUES 
                          ('$v_date_record'
                            , '$v_description'
                            , '$v_expense_category'
                            , '$v_amount'
                            , '$v_employee'
                            , '$v_note'
                            )";
		
		$result = mysqli_query($connect, $sql); 
		header('location:expense_list.php?message=success');
	}
    if(isset($_GET["id"])){
		$id = $_GET["id"];		  
		$sql = "DELETE FROM tbl_expense_list WHERE exp_id = '$id'" ;
		//echo "<pre>"; echo $sql; echo "</pre>"; exit;
		$result = mysqli_query($connect, $sql);
		header("location:expense_list.php?message=delete");  
	}
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
					<h2 class="text-primary">Profit & Loss </h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Revenue List</li>
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
							<form class="form-inline" method = "post" action="" style="display:inline-flex;">
								<div class="form-group">
									<input type="date" data-provide="datepicker" placeholder="DATE START" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name="from" value="<?= @$_POST['from'] ?>" id="from">
								</div>
								<div class="form-group">
									<input type="date" data-provide="datepicker" placeholder="DATE END" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name="to" value="<?= @$_POST['to'] ?>" id="to"> 
								</div>
								<button type="submit" name="search" class="btn btn-success">Search</button>
								<a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger m-1"><i class="fa fa-undo" aria-hidden="true"></i> Clear</a>
								<a target="_blank" class="btn btn-danger" href="profit_loss.php?from=<?php echo $_POST['from']; ?>&to=<?php echo $_POST['to']; ?>"><i class="fa fa-print"></i> Print</a>
							</form> 
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
										<th style="width:5%;text-align: center;">No</th>
										<th style="width: 15%;">Date</th>
										<th style="width: 50%;">Description</th>
										<th style="width: 10%;">Income</th>
										<th style="width: 20%;">Income Category</th>								  
									</tr>
                                </thead>
								<tbody>
									<?php
										if(isset($_POST['search'])){
											$from = $_POST['from'];
											$to = $_POST['to'];
											$v_current_year_month=date('Y-m');
											$sql = "SELECT * FROM tbl_revenue_list AS A
															  LEFT JOIN tbl_revenue_category AS B ON A.rev_revenue_category=B.reca_id
															  LEFT JOIN tbl_users AS C ON A.rev_employee=C.user_id
															  WHERE DATE_FORMAT(rev_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'";  
										}else{
											$v_current_year_month=date('Y-m');
											$sql = "SELECT * FROM tbl_revenue_list AS A
															  LEFT JOIN tbl_revenue_category AS B ON A.rev_revenue_category=B.reca_id
															  LEFT JOIN tbl_users AS C ON A.rev_employee=C.user_id
															  WHERE DATE_FORMAT(rev_date_record,'%Y-%m')='$v_current_year_month'";  
										}
										$result = $connect->query($sql);
										$j=1;
										$income_profit=0;
										while($row = $result->fetch_assoc()){ 
										$income_profit +=$row['rev_amount'];
									?>                 
										<tr>
											<td><?php echo $j++; ?></td>
											<td><?php echo $row['rev_date_record']; ?></td>
											<td><?php echo $row['rev_description']; ?></td>
											<td style ="text-align: right;">$<?php echo number_format($row['rev_amount'],2);?> </td>
											<td><?php echo $row['reca_name'];?></td>                         
										</tr> 
									<?php } ?>
									<tr>
										<td colspan="3" style="text-align: right;font-weight: 900;">Gross Income</td>
										<td style="text-align: right;"><b>$<?php echo number_format($income_profit,2);?></b></td>
										<td></td>
									</tr>
								</tbody>
                            </table>
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width:5%;text-align: center;">No</th>
										<th style="width: 15%;">Date</th>
										<th style="width: 50%;">Description</th>
										<th style="width: 10%;">Expense</th>
										<th style="width: 20%;">Expense Category</th>                     
									</tr>
								</thead>
								<tbody>
									<?php
										if(isset($_POST['search'])){
											$from = $_POST['from'];
											$to = $_POST['to'];
											$v_current_year_month=date('Y-m');
											$sql = "SELECT * FROM tbl_expense_list AS A
											LEFT JOIN tbl_expense_category AS B ON A.exp_expense_category=B.exca_id
											LEFT JOIN tbl_users AS C ON A.exp_employee=C.user_id
											WHERE DATE_FORMAT(exp_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
											ORDER BY A.exp_date_record DESC";   
										}else{
											$v_current_year_month=date('Y-m');
											$sql = "SELECT * FROM tbl_expense_list AS A
											LEFT JOIN tbl_expense_category AS B ON A.exp_expense_category=B.exca_id
											LEFT JOIN tbl_users AS C ON A.exp_employee=C.user_id
											WHERE DATE_FORMAT(exp_date_record,'%Y-%m')='$v_current_year_month'
											ORDER BY A.exp_date_record DESC";    
										}
										$result = $connect->query($sql);
										$i=1;
										$ex_profit=0;
										while($row = $result->fetch_assoc()){ 
										$ex_profit +=$row['exp_amount'];                      
									?>                    
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row['exp_date_record']; ?></td>
											<td><?php echo $row['exp_description']; ?></td>
											<td style="text-align: right;">$<?php echo number_format($row['exp_amount'],2);?></td>
											<td><?php echo $row['exca_name'];?></td>                         
										</tr> 
									<?php } ?>
									<tr>
										<td colspan="3" style="text-align: right;font-weight: 900;">Gross Expense</td>
										<td style="text-align: right;"><b>$<?php echo number_format($ex_profit,2);?></b></td>
										<td></td>
									</tr>
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