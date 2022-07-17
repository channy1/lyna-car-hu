<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

if(isset($_POST['search'])){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_cash_voucher LEFT JOIN tbl_users  ON tbl_cash_voucher.payee=tbl_users.user_id WHERE DATE_FORMAT(v_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to' ORDER BY v_date_record DESC ";   
}else{
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_cash_voucher LEFT JOIN tbl_users ON tbl_cash_voucher.payee = tbl_users.user_id WHERE DATE_FORMAT(v_date_record,'%Y-%m')='$v_current_year_month' ORDER BY v_date_record DESC";    
}
$result = $connect->query($sql);
if(isset($_POST["btn_deposit"])){
	$txt_voucher_no=$_POST['txt_voucher_no'];
	$txt_date_deposit=$_POST['txt_date_deposit'];
	$txt_amount_deposit=$_POST['txt_amount_deposit'];
	$txt_transaction=$_POST['txt_transaction'];
	$txt_to=$_POST['txt_to'];
	$txt_the_sum_of=$_POST['txt_the_sum_of'];
	$txt_app_by=$_POST['txt_app_by'];
	$txt_manage=$_POST['txt_manage'];
	$txt_employee_deposit=$_POST['txt_employee_deposit'];
	$txt_note_deposit=$_POST['txt_note_deposit'];
	$sql = "INSERT INTO tbl_cash_voucher 
                          (
                            v_date_record
                            , v_amount
                            , tran_saction
                            , v_to
                            , the_sum_of
                            , app_by
                            , manager_by
                            , v_inv_no
                            , payee
                            , v_note
                            ) 
                        VALUES 
                          ('$txt_date_deposit'
                            , '$txt_amount_deposit'
                            , '$txt_transaction'
                            , '$txt_to'
                            , '$txt_the_sum_of'
                            , '$txt_app_by'
                            , '$txt_manage'
                            , '$txt_voucher_no'
                            , '$txt_employee_deposit'
                            , '$txt_note_deposit'
                            
                            )";

	$result = mysqli_query($connect, $sql);
	header('location:cash_voucher.php?message=success');
}

if(isset($_GET["id"])){
    $id = $_GET["id"];      
    $sql = "DELETE FROM tbl_cash_voucher WHERE id = '$id'" ;
    $result = mysqli_query($connect, $sql);
    header("location:cash_voucher.php?message=delete");  
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
            <h1>CASH VOUCHER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">CASH VOUCHER</li>
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
								?>
								<div class="form-group row">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add New</button>
									<div class="col-md-3">
										<input type="text" data-provide="datepicker" placeholder="DATE START" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "from" value="<?= @$_POST['from'] ?>" >
									</div>
									<div class="col-md-3">
										<input type="text" data-provide="datepicker" placeholder="DATE END" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "to" value="<?= @$_POST['to'] ?>"> 
									</div>
									<button type="submit" name="search" class="btn btn-success">Search</button>
									<a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Clear</a>
									<a target="_blank" class="btn btn-danger" href="cashvoucher_print.php?from=<?php echo $from ?>&amp;to=<?php echo $to; ?>"><i class="fa fa-print"></i> Print</a>
								</div>
								<br>
							</form>
						</div>
					</div>
					<div class="modal fade" id="deModal" role="dialog">
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
												<label for ="">Voucher No :</label>
												<input class="form-control" required  name="txt_voucher_no" type="text" value="<?php echo ''.date("Ymd").''.rand(10,1000000); ?>" placeholder="Voucher...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">Date Record :</label>
												<input class="form-control" required  name="txt_date_deposit" type="date" placeholder="date...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">Amount :</label>
												<input class="form-control" required  name="txt_amount_deposit" type="text" placeholder="amount...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">Transaction Type:</label>
												<input class="form-control" required  name="txt_transaction" type="text" placeholder="Transaction...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">To:</label> 
												<input class="form-control" required  name="txt_to" type="text" placeholder="To...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">The Sum Of:</label>
												<input class="form-control" required  name="txt_the_sum_of" type="text" placeholder="The Sum Of...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">Approved By:</label>
												<input class="form-control" required  name="txt_app_by" type="text" placeholder="Approved By...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">Manager:</label>
												<input class="form-control" required  name="txt_manage" type="text" placeholder="Manager...">          
											</div>
											<div class="form-group col-xs-12">
												<label for ="">Employee Payee :</label> 
												<select class = "form-control select2" style = "width:100%" name = "txt_employee_deposit">
													<option value="">====Select and Choose====</option>
													<?php
														$v_select = mysqli_query($connect,"SELECT * FROM tbl_users WHERE user_position='1' ");
														while ($row1 = mysqli_fetch_assoc($v_select)) { ?>
													<option value="<?php echo $row1['user_id']; ?>"><?php echo $row1['user_first_name'] ;?> <?php echo $row1['user_last_name'] ;?></option>
													<?php 
														}
														 ?>   
												</select>
											</div>
											<div class="form-group col-xs-12">
												<label for="note">Note :</label>
												<textarea class="form-control" rows="4" name = "txt_note_deposit"></textarea>
											</div>
											<br>
											<div class="form-group col-xs-6">
												<button type="submit" name = "btn_deposit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width: 10px !important;">Voucher No</th>
					<th>Date Record</th>
					<th>Amount</th>
					<th>Employee</th>
					<th>Action</th>                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php					
						$i=1;
						$v_sum_amount = 0; 
						while($row = $result->fetch_assoc()){ 						 
					?>
					<tr>
						<td style="width: 10px;"><?php echo ($i++) ;?></td> 					   
						<td><?php echo $row["v_date_record"];?></td>
						<td style="text-align: right;">$<?php echo number_format($row["v_amount"],2);?></td>
						<td><?php echo $row['user_first_name'].' '.$row['user_last_name']; ?></td>
						<td align = "center">
						<a target="_blank"  href="cashvoucher_print.php?id=<?php echo $row['id']; ?>"><i class="fa fa-print"></i> Print</a>						
						<a onclick = "return confirm('Are you sure to delete ?');" href="petty_cash_deposit.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
