<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>
<?php
if(isset($_POST['search'])){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_expen_request AS A
      LEFT JOIN tbl_expense_category AS B ON A.ex_category=B.exca_id
      LEFT JOIN tbl_users AS C ON A.em_id=C.user_id
      WHERE DATE_FORMAT(date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
      ORDER BY A.date_record DESC
      ";   
}else{
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_expen_request AS A
      LEFT JOIN tbl_expense_category AS B ON A.ex_category=B.exca_id
      LEFT JOIN tbl_users AS C ON A.em_id=C.user_id
      WHERE DATE_FORMAT(date_record,'%Y-%m')='$v_current_year_month'
      ORDER BY A.date_record DESC
      ";    
}
$result = $connect->query($sql);
  
if(isset($_POST["btnadd"])){
    $v_date_record = $_POST["txt_date_record"];
    $v_description = $_POST["txt_description"];
    $v_expense_category = $_POST["txt_expense_category"];
    $v_amount = $_POST["txt_amount"];
    $v_employee = $_POST["txt_employee"];
    $v_note = $_POST["txt_note"];
    $v_txt_u_price = $_POST["txt_u_price"];
    $v_qty = $_POST["txt_qty"];
    $v_inv=$_POST['txt_inv'];
	$sql = "INSERT INTO tbl_expen_request 
                          (
                          em_id
                            , date_record
                            , description
                            , ex_category
                            , ex_price
                            , ex_amount
                            , ex_note
                            , ex_qty
                            , inv_no
                            ) 
                        VALUES 
                          ('$v_employee'
                            , '$v_date_record'
                            , '$v_description'
                            , '$v_expense_category'
                            , '$v_txt_u_price'
                            , '$v_amount'
                            , '$v_note'
                            , '$v_qty'
                            , '$v_inv'
                            )";

	$result = mysqli_query($connect, $sql);
	header('location:expense_request.php?message=success');
 }

if(isset($_POST["btn_deposit"])){
  $d_date=$_POST['txt_date_deposit'];
  $d_amount=$_POST['txt_amount_deposit'];
  $d_em_id=$_POST['txt_employee_deposit'];
  $d_note=$_POST['txt_note_deposit'];
  $sql = "INSERT INTO tbl_petty_cash_deposit 
                          (
                          date_deposit
                            , amount_deposit
                            , de_em_id
                            , note_deposit
                            
                            ) 
                        VALUES 
                          ('$d_date'
                            , '$d_amount'
                            , '$d_em_id'
                            , '$d_note'
                            
                            )";

	$result = mysqli_query($connect, $sql);
	header('location:petty_cash_record.php?message=success');
}

if(isset($_GET["id"])){
    $id = $_GET["id"];      
    $sql = "DELETE FROM tbl_expen_request WHERE id = '$id'" ;
    $result = mysqli_query($connect, $sql);
    header("location:petty_cash_record.php?message=delete");  
} 
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
		<div class = "col-xs-12">
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
        <div class="row mb-2">
          <div class="col-sm-6">
				<div>
				<h1 class="col-sm-7 float-sm-left">PETTY CASH RECORD</h1>
				</div>
				<div class="col-sm-4 float-sm-right">
					<select class="form-control" onchange="window.location=this.value">
						<option value="" selected="">-- Select --</option>
						<option value="index.php">Rent</option>
						<option value="petty_cash_deposit.php">Input</option>
						<!--<option selected="" value="expense_list.php">Input</option>-->
					</select>
				</div>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PETTY CASH RECORD</li>
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
						<div class="col-md-12">
							<form>
								<?php
									$s_input_month=@$connect->real_escape_string($_GET['txt_month']);
									$s_input_year=@$connect->real_escape_string($_GET['txt_year']);
									$s_txt_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);
								?>
								<div class="form-group row">
									<div class="col-md-3">
										<input type="text" data-provide="datepicker" placeholder="DATE START" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "from" value="<?= @$_POST['from'] ?>" >
									</div>
									<div class="col-md-3">
										<input type="text" data-provide="datepicker" placeholder="DATE END" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "to" value="<?= @$_POST['to'] ?>"> 
									</div>
									<button type="submit" name="search" class="btn btn-success">Search</button>
									<a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger  "><i class="fa fa-undo" aria-hidden="true"></i> Clear</a>
									<a target="_blank" class="btn btn-danger" href="print_petty_cash.php?from=<?php echo $from; ?>&to=<?php echo $to; ?>">
									<i class="fa fa-print"></i> Print</a>

									<a target="_blank" class="btn btn-danger" href="print_replenishment_voucher.php?from=<?php echo $from; ?>&to=<?php echo $to; ?>">
									<i class="fa fa-print "></i> REPLENISHMENT VOUCHER</a>
								</div>
								<br>
							</form>
						</div>
					</div>	
				</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
					<tr>
						<th style="width: 10px;">No</th>
						<th>Date Record</th>
						<th>Expense Category</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Amount</th>
						<th>Employee</th>
						<th>Note</th>
						<th><i class="fa fa-cog" aria-hidden="true"></i></th>				
					</tr>
                  </thead>
					<tbody>
						<?php
							$i=1;
							$v_sum_amount = 0; 
							while($row = $result->fetch_assoc()){ 
								$v1=$row["id"];
								$v2=$row["date_record"];
								$v3=$row["description"];
								$v4=$row["exca_name"];

								$v5=$row["ex_amount"];
								$v6=$row["user_first_name"].' '.$row['user_last_name'];
								$v7=$row["ex_note"];
								$v_sum_amount += $row["ex_amount"];
						?>
                        <tr>
							<td><?php echo ($i++) ;?></td> 						   
							<td><?php echo $row["date_record"];?></td>
							<td><?php echo $row["exca_name"];?></td>
							<td><?php echo $row["ex_qty"];?></td>
							<td style="text-align: right;">$<?php echo number_format($row["ex_price"],2);?></td>						  
							<th style="text-align: right;">$<?= number_format($v5,2) ?></th>
							<td><?php echo $v6;?></td>
							<td><?php echo $v7;?></td>
							<td align = "center">
							<a href="edit_expense_request.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>				
							<a onclick = "return confirm('Are you sure to delete ?');" href="expense_request.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
