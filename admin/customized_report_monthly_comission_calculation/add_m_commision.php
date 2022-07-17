<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>
<style type="text/css">
    #txt_refo_car_id,#txt_refo_driver_id,
    #txt_refo_tr_id,#txt_refo_acc_id,#txt_refo_rick_id {
      display: none;
    }
</style>
<?php
if(isset($_POST['btn_add'])){      
	$txt_from = @$connect->real_escape_string($_POST['txt_from']);
	$txt_to = @$connect->real_escape_string($_POST['txt_to']);
	$txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
	$txt_customer_no = @$connect->real_escape_string($_POST['txt_customer_no']);
	$txt_parner_name = @$connect->real_escape_string($_POST['txt_parner_name']);
	$txt_invoice_no = @$connect->real_escape_string($_POST['txt_invoice_no']);
	$txt_commision = @$connect->real_escape_string($_POST['txt_commision']);
	$txt_plan_id = @$connect->real_escape_string($_POST['txt_plan_id']);
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
	if($txt_plan_id=="Vehicle"){
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_car_id']);
	}elseif ($txt_plan_id=="RickShaw") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_rick_id']);
	}elseif ($txt_plan_id=="Accessories") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_acc_id']);
	}else {
        $insert_ref_id=0;
	}
	$query_add = "INSERT INTO tbl_monthly_commission (
                   ref_no,
                   from_date,
                   to_date,
                   customer_name,
                   customer_no,
                   partner_id,
                   invoice_no,
                   comm,
                   income,
                   ex_fuel,
                   ex_driver,
                   ex_ot,
                   ex_guide,
                   ex_partner,
                   ex_comm,
                   ex_discount,
                   ex_other,
                   ex_total,
                   profit,
                   free_comm,
                   net_profit,
                   type_ref
                    ) VALUES(
                   '$insert_ref_id',
                   '$txt_from',
                   '$txt_to',
                   '$txt_customer_name',
                   '$txt_customer_no',
                   '$txt_parner_name',
                   '$txt_invoice_no',
                   '$txt_commision',
                   '$txt_income',
                   '$txt_fuel',
                   '$txt_driver',
                   '$txt_ot',
                   '$txt_tq',
                   '$txt_parner_ex',
                   '$txt_comm_ex',
                   '$txt_dis',
                   '$txt_another',
                   '$txt_exp_total',
                   '$txt_profit',
                   '$txt_free_commision',
                   '$txt_net_profit',
                   '$txt_plan_id'
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
				<h1>Add New Commission</h1>
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
				<div class="row">
					<div class="col-md-8">
						
					</div>
				</div>            
            </div>
            <!-- /.card-header -->
			<div class="card-body">	
				<form role="#" method="post" enctype="multipart/form-data" >
					<div class="card-body">
						<div class="row">
							<label> Vehicle</label>
							<div class="col-md-3">
								<input type="radio" id="txt_vehicle_id" name="txt_plan_id" value="Vehicle">
							</div>
							<label> RickShaw</label>
							<div class="col-md-3">
								<input type="radio" id="txt_rick_id" name="txt_plan_id" value="RickShaw">
							</div>
							<label> Accessories </label>
							<div class="col-md-3">
								<input type="radio" id="txt_acc_id" name="txt_plan_id" value="Accessories">
							</div>
						</div>
						<div class="row">
							<label>Ref. N&deg;</label>
							<select name="txt_refo_car_id" id="txt_refo_car_id" class="form-control">
								<?php
									$query="SELECT * FROM tbl_vehicle_rantal";
									$result = $connect->query($query);
									if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
								?>
								<option value="<?php echo $row['ve_id']; ?>">
								  <?php echo $row['ve_ref_no']; ?></option>
								<?php } } ?>
							</select>
							<select name="txt_refo_driver_id" id="txt_refo_driver_id" class="form-control">
							<?php
								$query="SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position On tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  user_position ='3' AND user_position_id='8' ORDER BY user_first_name";
								$result = $connect->query($query);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
							<option value="<?php echo $row['user_id']; ?>">
							  <?php echo $row['user_first_name']; ?>  
							  <?php echo $row['user_last_name']; ?></option>
							<?php } } ?>
							</select>
							<select name="txt_refo_tr_id" id="txt_refo_tr_id" class="form-control">
							<?php
								$query="SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position On tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  user_position='3' AND user_position_id='7' ORDER BY user_first_name";
								$result = $connect->query($query);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
							<option value="<?php echo $row['user_id']; ?>">
							  <?php echo $row['user_first_name']; ?>  
							  <?php echo $row['user_last_name']; ?></option>
							<?php } } ?>
							</select>
							<select name="txt_refo_acc_id" id="txt_refo_acc_id" class="form-control">
							<?php
								$query="SELECT * FROM tbl_accessories_rental";
								$result = $connect->query($query);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
							<option value="<?php echo $row['ac_id']; ?>">
							  <?php echo $row['ac_ref_no']; ?>  
							  </option>
							<?php } } ?>
							</select>
							<select name="txt_refo_rick_id" id="txt_refo_rick_id" class="form-control">
							<?php
								$query="SELECT * FROM tbl_rick_shaw_rental_last";
								$result = $connect->query($query);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
							?>
								<option value="<?php echo $row['ve_id']; ?>">
								<?php echo $row['ve_ref_no']; ?>  
								</option>
							<?php } } ?>
							</select>	
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>From:</label>
									<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_from" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>To:</label>
									<input data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" class="form-control"  name="txt_to" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Customer Name:</label>
									<input type="text" class="form-control" name="txt_customer_name" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Partner Name:</label>
									<select name="txt_parner_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
										<option data-subtext="" value="">Select One</option>
										<?php
											$v_sql = "SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position ON tbl_users.user_id = tbl_relationship_users_position.user_id
                                            WHERE tbl_relationship_users_position.user_position_id = '10' AND user_first_name !='' AND user_last_name !=''
                                            ORDER BY user_first_name";
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
									<label>CUST.ID N&deg;:</label>
									<input type="text" class="form-control" name="txt_customer_no" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Invoice N&deg;:</label>
									<input type="text" class="form-control" name="txt_invoice_no" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered" >
									<thead>
										<tr style="width: 100%;">
											<th style="width:2%;">Commsion</th>
											<th style="width:10%;">Income</th>
											<th colspan="8" style="width: 48%;">Expenses</th>
											<th style="width:10%;">Ex Total</th>
											<th style="width:10%;">Profit</th>
											<th style="width:10%;">Free Comm %</th>
											<th style="width:10%;">Net Profit</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input style="width:60px;"  type="text" name="txt_commision" id="txt_commision">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_income" id="txt_income">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_fuel" id="txt_fuel" placeholder="FUEL">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_driver" id="txt_driver" placeholder="Driver">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_ot" id="txt_ot" placeholder="OT">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_tq" id="txt_tq" placeholder="T.QUIDE">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_parner_ex" id="txt_parner_ex" placeholder="Partner">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_comm_ex" id="txt_comm_ex" placeholder="COMM">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_dis" id="txt_dis" placeholder="Discount">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_another" id="txt_another" placeholder="Other">
											</td>
											<td>
												<input style="width:60px;" type="text" 
													name="txt_exp_total" id="txt_exp_total">
											</td>
											<td>
												<input style="width:60px;" type="text" 
													name="txt_profit" id="txt_profit">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_free_commision" id="txt_free_commision">
											</td>
											<td>
												<input style="width:60px;" type="text" name="txt_net_profit" id="txt_net_profit">
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
								<button type="submit" name="btn_add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Add</button>
								<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
								<a href="index.php" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
							</div>
						</div>
					</div>
				</form>  
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
	// start option select
	$(document).ready(function (){ 
		$("#txt_vehicle_id").click(function(){
			$("#txt_refo_car_id").css("display", "block");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_rick_id").click(function(){
			$("#txt_refo_rick_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_acc_id").click(function(){
			$("#txt_refo_acc_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
		});
        function  ex_total_calulator(){
          var v_j_come=$("#txt_commision").val();
          var v_j_income=$("#txt_income").val();
          var v_j_discount=$("#txt_dis").val();

          //expens
          var v_j_fuel=$("#txt_fuel").val();
          var v_j_driver=$("#txt_driver").val();
          var v_j_ot=$("#txt_ot").val();
          var v_j_tq=$("#txt_tq").val();
          var v_j_partner=$("#txt_parner_ex").val();
          var v_j_ex_com=$("#txt_comm_ex").val();
          var v_j_ex_other=$("#txt_another").val();

          //end expens
          var ex_total_discount=(v_j_income)-(v_j_income * v_j_discount)/100;
          var ex_expens=parseFloat(v_j_fuel)+parseFloat(v_j_driver)
          +parseFloat(v_j_ot)+parseFloat(v_j_tq)+
          parseFloat(v_j_partner)+parseFloat(v_j_ex_com)+parseFloat(v_j_ex_other);

          var ex_total=parseFloat(ex_expens)+(parseFloat(v_j_income) * parseFloat(v_j_discount)/100);
		$("#txt_exp_total").val(ex_total);

          // profit
             var v_j_profit=parseFloat(ex_total_discount)-parseFloat(ex_expens);
            $("#txt_profit").val(v_j_profit);
          // end profit

          // free Commision
          var v_j_free_com=parseFloat(v_j_profit * v_j_come)/100;
          $("#txt_free_commision").val(v_j_free_com);
          // end free commision

          // net profit
          var v_j_net_profit=parseFloat(v_j_profit)-parseFloat(v_j_free_com);
           $("#txt_net_profit").val(v_j_net_profit);
          // end net profit

        }
        $('#txt_income').on('input', function(){ 
             ex_total_calulator();
          });
        $('#txt_dis').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_fuel').on('input', function(){ 
             ex_total_calulator();
          });
         $('#txt_driver').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_ot').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_tq').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_parner_ex').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_comm_ex').on('input', function(){ 
             ex_total_calulator();
          });
          $('#txt_another').on('input', function(){ 
             ex_total_calulator();
          });
		$('#txt_commision').on('input', function(){ 
             ex_total_calulator();
		});           
	});
</script>
 
</body>
</html>
