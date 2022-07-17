<?php
    require_once '../../system/config/database.php';
    require '../config.php'; 
    require '../editor_header.php'; 
    require '../sidebar.php';
    ?>
<?php
    if(isset($_POST['btn_add'])){
       $txt_date = @$connect->real_escape_string($_POST['txt_date']);
       $txt_parnter_id = @$connect->real_escape_string($_POST['txt_parnter_id']);
       $txt_time_use = @$connect->real_escape_string($_POST['txt_time_use']);
       $txt_date_paid = @$connect->real_escape_string($_POST['txt_date_paid']);
       $txt_note = @$connect->real_escape_string($_POST['txt_note']);
       $txt_prepare = @$connect->real_escape_string($_POST['txt_prepare']);
       $txt_approved = @$connect->real_escape_string($_POST['txt_approved']);
       $txt_vehicle_income = @$connect->real_escape_string($_POST['txt_vehicle_income']);
       $txt_richshaw_income = @$connect->real_escape_string($_POST['txt_richshaw_income']);
       $txt_tour_guide_income = @$connect->real_escape_string($_POST['txt_tour_guide_income']);
       $txt_driver_income = @$connect->real_escape_string($_POST['txt_driver_income']);
       $txt_free_lancer_income = @$connect->real_escape_string($_POST['txt_free_lancer_income']);
       $txt_discount_income = @$connect->real_escape_string($_POST['txt_discount_income']);
       $txt_discount_total_income = @$connect->real_escape_string($_POST['txt_discount_total_income']);
       $txt_total_income = @$connect->real_escape_string($_POST['txt_total_income']);
       $txt_vehicle_expense = @$connect->real_escape_string($_POST['txt_vehicle_expense']);
       $txt_richshaw_expense = @$connect->real_escape_string($_POST['txt_richshaw_expense']);
       $txt_tour_guide_expense = @$connect->real_escape_string($_POST['txt_tour_guide_expense']);
       $txt_driver_expense = @$connect->real_escape_string($_POST['txt_driver_expense']);
       $txt_free_lancer_expense = @$connect->real_escape_string($_POST['txt_free_lancer_expense']);
       $txt_rate_one = @$connect->real_escape_string($_POST['txt_rate_one']);
       $txt_rate_two = @$connect->real_escape_string($_POST['txt_rate_two']);
       $txt_rate_three = @$connect->real_escape_string($_POST['txt_rate_three']);
       $txt_rate_four = @$connect->real_escape_string($_POST['txt_rate_four']);
       $txt_total_expense = @$connect->real_escape_string($_POST['txt_total_expense']);
       $txt_amount_payable = @$connect->real_escape_string($_POST['txt_amount_payable']);
       $query_add = "INSERT INTO tbl_partner_income_paid_history(
                    partner_id,
                    car_income,
                    richshaw_incom,
                    tour_guide_income,
                    driver_income,
                    free_lancer_income,
                    dis_income,
                    dis_total_income,
                    total_income,
                    car_ex,
                    richshaw_ex,
                    tour_guide_ex,
                    driver_ex,
                    free_lancer_ex,
                    rate_one,
                    rate_two,
                    rate_three,
                    rate_four,
                    total_ex,
                    amount_payable,
                    time_use,
                    date_paid,
                    note,
                    pre_by,
                    app_by,
                    start_date
    
                     ) VALUES(
                    '$txt_parnter_id',
                    '$txt_vehicle_income',
                    '$txt_richshaw_income',
                    '$txt_tour_guide_income',
                    '$txt_driver_income',
                    '$txt_free_lancer_income',
                    '$txt_discount_income',
                    '$txt_discount_total_income',
                    '$txt_total_income',
                    '$txt_vehicle_expense',
                    '$txt_richshaw_expense',
                    '$txt_tour_guide_expense',
                    '$txt_driver_expense',
                    '$txt_free_lancer_expense',
                    '$txt_rate_one',
                    '$txt_rate_two',
                    '$txt_rate_three',
                    '$txt_rate_four',
                    '$txt_total_expense',
                    '$txt_amount_payable',
                    '$txt_time_use',
                    '$txt_date_paid',
                    '$txt_note',
                    '$txt_prepare',
                    '$txt_approved',
                    '$txt_date'
                     )";
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
                    <h1>Add New Partner Income & Paid History</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
								<div class="col-md-6">
									<div class="form-group">
										<label>Start Date:</label>
										<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_from" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Partner Name:</label>
										<select name="txt_parnter_id" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
										<option data-subtext="" value="">Select One</option>
										<?php
											$v_sql = "SELECT * FROM tbl_users WHERE user_first_name !='' AND user_last_name !='' AND user_position='3'ORDER BY user_first_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
										?>
									<option data-subtext="" value="<?php echo $row['user_id']; ?>">
                                        <?php echo $row['user_first_name']; ?> 
                                        <?php echo $row['user_last_name']; ?>
									</option>
									<?php } } ?>
                                    </select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>No of Use:</label>
										<input type="text" name="txt_time_use" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Date Paid Bonus:</label>
										<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date_paid" value="">
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Partner History Note:</label>
										<textarea name="txt_note" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Prepared By:</label>
										<input type="text" name="txt_prepare" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Approved By:</label>
										<input type="text" name="txt_approved" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="table-responsive">
									<center>
										<h2>Partner Income</h2>
									</center>
									<table class="table table-bordered" >
										<thead>
											<tr style="width: 100%;">
												<th style="width:7%;">Vehicle</th>
												<th style="width:10%;">RichShaw</th>
												<th style="width:10%;">Tour Guide</th>
												<th style="width:10%;">Driver</th>
												<th style="width: 10%;">Free-Lancer</th>
												<th style="width: 10%;">Dis %</th>
												<th style="width: 10%;">Dis Total</th>
												<th style="width: 10%;">Total Income</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<input class="form-control" type="text" name="txt_vehicle_income" id="txt_vehicle_income">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_richshaw_income" id="txt_richshaw_income">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_tour_guide_income" id="txt_tour_guide_income">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_driver_income" id="txt_driver_income">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_free_lancer_income" id="txt_free_lancer_income">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_discount_income" id="txt_discount_income">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_discount_total_income" id="txt_discount_total_income">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_total_income" id="txt_total_income">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="table-responsive">
									<center>
										<h2>Partner Expense</h2>
									</center>
									<table class="table table-bordered" >
										<thead>
											<tr style="width: 100%;">
												<th style="width:7%;">Vehicle</th>
												<th style="width:10%;">RichShaw</th>
												<th style="width:10%;">Tour Guide</th>
												<th style="width:10%;">Driver</th>
												<th style="width: 10%;">Free-Lancer</th>
												<th style="width: 7%;">%</th>
												<th style="width: 7%;">%</th>
												<th style="width: 7%;">%</th>
												<th style="width: 7%;">%</th>
												<th style="width: 10%;">Total Expense</th>
												<th style="width: 10%;">Amount Payable</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<input class="form-control" type="text" name="txt_vehicle_expense" id="txt_vehicle_expense">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_richshaw_expense" id="txt_richshaw_expense">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_tour_guide_expense" id="txt_tour_guide_expense">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_driver_expense" id="txt_driver_expense">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_free_lancer_expense" id="txt_free_lancer_expense">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_rate_one" id="txt_rate_one">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_rate_two" id="txt_rate_two">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_rate_three" id="txt_rate_three">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_rate_four" id="txt_rate_four">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_total_expense" id="txt_total_expense">
												</td>
												<td>
													<input class="form-control" type="text" name="txt_amount_payable" id="txt_amount_payable">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								
							</div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
					<div class="row" style="float: right;">
						<div class="col-md-12 text-center">
							<button type="submit" name="btn_add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Add</button>
							<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
							<a href="index.php" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
						</div>
					</div>
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
<script>
    $(function () {
      // Summernote
      $('.textarea').summernote()
    })
</script>
</body>
</html>