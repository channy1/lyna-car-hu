<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

   $sql = "SELECT * FROM tbl_phone_line WHERE type>=1";

    $result = $connect->query($sql);

    while ($row = mysqli_fetch_object($result)){

      $r[] = $row;        

    }
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Monthly commission calculation list</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Monthly commission calculation list</li>
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
												$v_sql = "SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position ON tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  tbl_relationship_users_position.user_position_id='10' 
												AND user_first_name !='' AND user_last_name !=''
												ORDER BY user_first_name";
												$result = $connect->query($v_sql);
												if ($result->num_rows > 0){
													while($row = $result->fetch_assoc()){
											?>
											<option
											<?php
												if($s_txt_parner_name==$row['user_id']) {
													echo "selected='selected'";
												}
											?> data-subtext="" value="<?php echo $row['user_id']; ?>">
											<?php echo $row['user_first_name']; ?>
											<?php echo $row['user_last_name']; ?>
											</option>
										<?php } } ?>
									</select>
								</div>								
							</div>
							<br>
						</form>
					</div>					
					<div class="col-md-2">
						 <a target="_blank" class="btn btn-danger" href="add_m_commision.php"><i class="fa fa-calendar"></i> Add</a>
					</div>
					<div class="col-md-2">
						 <a target="_blank" class="btn btn-danger" href="add_daily_duties.php"><i class="fa fa-calendar"></i> Manage</a>
					</div>					
				</div> 
				<div class="row justify-content-md-center">
					<div class="col-md-2">
						 <button type="submit" name="btn_view" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
					</div>
					<div class="col-md-2">
						<a target="_blank" class="btn btn-danger" href="print_letter.php?start_date=&amp;end_date="><i class="fa fa-calendar"></i> Print Com</a>  
					</div>
				</div>
              </div>
			    <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Start Date</th>
					<th>End Date</th>
					<th>Customer's Name</th>
					<th>Cus.ID N&deg;</th>
					<th>Comm%</th>
					<th>Ref. N&deg;</th>
					<th>Invoice. N&deg;</th>
					<th>Income</th>
					<th colspan="8" style="width: 48%;">Expenses</th>
					<th>Ex Total</th>
					<th>Profit</th>
					<th>Free Comm%</th>
					<th>Net Profit</th>                   
                  </tr>
                  </thead>
				<tbody>
				<?php
					$search_month=@$connect->real_escape_string($_GET['txt_month']);
					$search_year=@$connect->real_escape_string($_GET['txt_year']);
					$search_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);
					if($search_month !=""){
						$search_month = @$connect->real_escape_string($_GET['txt_month']);
					}else{
						$search_month ="";
					}
					if($search_year !=""){
						$search_year = @$connect->real_escape_string($_GET['txt_year']);
					}else{
						$search_year ="";
					}
					if($search_parner_name !=""){
						$search_parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
					}else {
						$search_parner_name ="";
					}
					$query="SELECT tbl_vehicle_rantal.*,tbl_monthly_commission.*, tbl_monthly_commission.to_date as to_date_sc FROM tbl_monthly_commission INNER JOIN tbl_vehicle_rantal ON tbl_monthly_commission.ref_no = tbl_vehicle_rantal.ve_id WHERE type_ref='Vehicle' AND ( from_date >='$search_month' AND tbl_monthly_commission.to_date <='$search_year' ) AND partner_id='$search_parner_name' ORDER BY from_date DESC ";
					$result = $connect->query($query);
					if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td><?php $dt_from = strtotime($row['from_date']); echo date('d M y', $dt_from); ?></td>
						<td><?php $dt_to = strtotime($row['to_date_sc']); echo date('d M y', $dt_to); ?></td>
						<td><?php echo $row['customer_name'];?></td>
						<td><?php echo $row['customer_no']; ?></td>
						<td><?php echo $row['comm']; ?></td>
						<td><?php echo $row['placque_no'];?></td>
						<td><?php echo $row['invoice_no']; ?></td>
						<td>$<?php echo number_format($row['income'],2);?></td>
						<td>$<?php echo number_format($row['ex_fuel'],2);?></td>
						<td>$<?php echo number_format($row['ex_driver'],2);?></td>
						<td>$<?php echo number_format($row['ex_ot'],2);?></td>
						<td>$<?php echo number_format($row['ex_guide'],2);?></td>
						<td>$<?php echo number_format($row['ex_partner'],2);?></td>
						<td>$<?php echo number_format($row['ex_comm'],2);?></td>
						<td>$<?php echo number_format($row['ex_discount'],2);?></td>
						<td>$<?php echo number_format($row['ex_other'],2);?></td>
						<td>$<?php echo number_format($row['ex_total'],2);?></td>
						<td>$<?php echo number_format($row['profit'],2);?></td>
						<td>$<?php echo number_format($row['free_comm'],2);?></td>
						<td>$<?php echo number_format($row['net_profit'],2);?></td>
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
