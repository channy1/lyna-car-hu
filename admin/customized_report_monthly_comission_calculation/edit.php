<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
	//$edit_id = $_GET["edit_id"];
?>
<?php
if(isset($_POST['btn_add'])){      
	$edit_id=$_GET['edit_id'];
	$txt_from = @$connect->real_escape_string($_POST['txt_from']);
	$txt_to = @$connect->real_escape_string($_POST['txt_to']);
	$txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
	$txt_customer_no = @$connect->real_escape_string($_POST['txt_customer_no']);
	$txt_parner_name = @$connect->real_escape_string($_POST['txt_parner_name']);
	$txt_invoice_no = @$connect->real_escape_string($_POST['txt_invoice_no']);
	$txt_commision = @$connect->real_escape_string($_POST['txt_commision']);
	$txt_income = @$connect->real_escape_string($_POST['txt_income']);
	$txt_fuel = @$connect->real_escape_string($_POST['txt_fuel']);
	$txt_driver = @$connect->real_escape_string($_POST['txt_driver']);
	$txt_ot = @$connect->real_escape_string($_POST['txt_ot']);
	$txt_tq = @$connect->real_escape_string($_POST['txt_tq']);
	$txt_parner_ex = @$connect->real_escape_string($_POST['txt_parner_ex']);
	$txt_comm_ex = @$connect->real_escape_string($_POST['txt_comm_ex']);
	$txt_dis = @$connect->real_escape_string($_POST['txt_dis']);
	$txt_another = @$connect->real_escape_string($_POST['txt_another']);
	$txt_exp_total = @$connect->real_escape_string($_POST['txt_exp_total']);
	$txt_profit = @$connect->real_escape_string($_POST['txt_profit']);
	$txt_free_commision = @$connect->real_escape_string($_POST['txt_free_commision']);
	$txt_net_profit = @$connect->real_escape_string($_POST['txt_net_profit']);
	$query_add = "UPDATE tbl_monthly_commission SET 
                   from_date='$txt_from',
                   to_date='$txt_to',
                   customer_name='$txt_customer_name',
                   partner_id='$txt_parner_name',
                   customer_no='$txt_customer_no',
                   invoice_no='$txt_invoice_no',
                   comm='$txt_commision',
                   income='$txt_income',
                   ex_fuel='$txt_fuel',
                   ex_driver='$txt_driver',
                   ex_ot='$txt_ot',
                   ex_guide='$txt_tq',
                   ex_partner='$txt_parner_ex',
                   ex_comm='$txt_comm_ex',
                   ex_discount='$txt_dis',
                   ex_other='$txt_another',
                   ex_total='$txt_exp_total',
                   profit='$txt_profit',
                   free_comm='$txt_free_commision',
                   net_profit='$txt_net_profit'
                   WHERE m_c_id='$edit_id'

                    ";
		if($connect->query($query_add)){
			$sms = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Successfull!</strong> Data inserted ...
			</div>'; 
		}else{
			$sms = '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error!</strong> '.mysqli_error($connect).'...
			</div>';   
		}
    }
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
		<?= @$sms ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Commission</h1>
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
            <div class="card-body">
			<?php
				$id = $_GET['edit_id'];
				$query = "SELECT * FROM tbl_monthly_commission WHERE m_c_id='$id'";
				$result = $connect->query($query);
				$i=1;
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){

			?>
				<form role="#" method="post" enctype="multipart/form-data" >
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>From: </label>
									<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_from" value="<?php echo $row['from_date']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>To: </label>
									<input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control" name="txt_to" value="<?php echo $row['to_date']; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Customer Name:</label>
									<input type="text" class="form-control" name="txt_customer_name" value="<?php echo $row['customer_name']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Partner Name:</label>
									<select name="txt_parner_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
										<option data-subtext="" value="">Select One</option>
                                       <?php
											$v_sql = "SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position ON tbl_users.user_id = tbl_relationship_users_position.user_id
                                            WHERE  tbl_relationship_users_position.user_position_id ='10' 
                                            AND user_first_name !='' AND user_last_name !=''
                                            ORDER BY user_first_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($rows = $result->fetch_assoc()){
										?>
										<option <?php if($row['partner_id']==$rows['user_id']){
                                        echo "selected='selected'";
                                      } ?> 
                                       data-subtext="" 
                                      value="<?php echo $rows['user_id']; ?>"
                                      >
                                        <?php echo $rows['user_first_name']; ?>
                                        <?php echo $rows['user_last_name']; ?>
                                        </option>
                                    <?php } } ?>
                                    </select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>CUST.ID N째 :</label>
									<input type="text" class="form-control" name="txt_customer_no" value="<?php echo $row['customer_no']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Invoice N&deg;:</label>
									<input type="text" class="form-control" name="txt_invoice_no" value="<?php echo $row['invoice_no']; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered" >
									<thead>
										<tr style="width: 100%;">
											<th style="width:2%;">Commsion</th>
											<th style="width: 10%;">Income</th>
											<th colspan="8" style="width: 48%;">Expenses</th>
											<th style="width: 10%;">Ex Total</th>
											<th style="width: 10%;">Profit</th>
											<th style="width: 10%;">Free Comm %</th>
											<th style="width: 10%;">Net Profit</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input style="width:60px;"  type="text" name="txt_commision" id="txt_commision" value="<?php echo $row['comm']; ?>">
											</td>
											<td >
												<input style="width:60px;" type="text" name="txt_income" id="txt_income" value="<?php echo $row['income']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_fuel" id="txt_fuel" placeholder="FUEL" value="<?php echo $row['ex_fuel']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_driver" id="txt_driver" placeholder="Driver" value="<?php echo $row['ex_driver']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_ot" id="txt_ot" placeholder="OT" value="<?php echo $row['ex_ot']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_tq" id="txt_tq" placeholder="T.QUIDE" value="<?php echo $row['ex_guide']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_parner_ex" id="txt_parner_ex" placeholder="Partner"
													value="<?php echo $row['ex_partner']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_comm_ex" id="txt_comm_ex" placeholder="COMM" value="<?php echo $row['ex_comm']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_dis" id="txt_dis" placeholder="Discount" value="<?php echo $row['ex_discount']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_another" id="txt_another" placeholder="Other" value="<?php echo $row['ex_other']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" 
													name="txt_exp_total" id="txt_exp_total" value="<?php echo $row['ex_total']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" 
													name="txt_profit" id="txt_profit" value="<?php echo $row['profit']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" 
													name="txt_free_commision" id="txt_free_commision"
													value="<?php echo $row['free_comm']; ?>">
											</td>
											<td>
												<input style="width:60px;" type="text" 
													name="txt_net_profit" id="txt_net_profit" value="<?php echo $row['net_profit']; ?>">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row" style="float:right;">
							<div class="col-md-12 text-center">
								<button type="submit" name="btn_add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Update</button>
								<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
								<a href="index.php" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
							</div>
						</div>
					</div>
				</form>
				<?php } } ?>
			</div>         
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
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
