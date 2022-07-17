<?php
    require_once '../../system/config/database.php';
    require '../config.php'; 
    require '../editor_header.php'; 
    require '../sidebar.php';
?>
<?php
   if(isset($_POST['btn_add'])){
      
      
      $txt_date = @$connect->real_escape_string($_POST['txt_date']);
    
      $txt_vendor_name = @$connect->real_escape_string($_POST['txt_vendor_name']);
      $txt_mileage_record = @$connect->real_escape_string($_POST['txt_mileage_record']);
      $txt_name_garage = @$connect->real_escape_string($_POST['txt_name_garage']);
      $txt_description = @$connect->real_escape_string($_POST['txt_description']);
      $txt_select_box_type = @$connect->real_escape_string($_POST['txt_select_box_type']);
      $txt_plan_id = @$connect->real_escape_string($_POST['txt_plan_id']);
      $txt_qty = @$connect->real_escape_string($_POST['txt_qty']);
      $txt_unit_price = @$connect->real_escape_string($_POST['txt_unit_price']);
      $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);
      $txt_total = @$connect->real_escape_string($_POST['txt_total']);
      $txt_note = @$connect->real_escape_string($_POST['txt_note']);
      $txt_prepare = @$connect->real_escape_string($_POST['txt_prepare']);
      $txt_approved = @$connect->real_escape_string($_POST['txt_approved']);
      $txt_of_use = @$connect->real_escape_string($_POST['txt_of_use']);


      
     

      if($txt_plan_id=="Vehicle"){
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_car_id']);

      }
      
       elseif ($txt_plan_id=="RickShaw") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_rick_id']);
      }
      elseif ($txt_plan_id=="Accessories") {
        $insert_ref_id=@$connect->real_escape_string($_POST['txt_refo_acc_id']);
      }
      else {
        $insert_ref_id=0;
      }

     

      $query_add = "INSERT INTO tbl_repair (
                   ref_no,
                   add_date,
                   vender_id,
                   mileage,
                   name_grage,
                   description,
                   type_box,
                   qty,
                   record_price,
                   record_discount,
                   record_total,
                   record_note,
                   type_report,
                   prepare_by,
                   approved_by,
                   status_report,
                   time_use
                    ) VALUES(
                   '$insert_ref_id',
                   '$txt_date',
                   '$txt_vendor_name',
                   '$txt_mileage_record',
                   '$txt_name_garage',
                   '$txt_description',
                   '$txt_select_box_type',
                   '$txt_qty',
                   '$txt_unit_price',
                   '$txt_discount',
                   '$txt_total',
                   '$txt_note',
                   '$txt_plan_id',
                   '$txt_prepare',
                   '$txt_approved',
                   '2',
                   '$txt_of_use'

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
                    <h1>Add Expenes History Report</h1>
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
                    <div class="card-header"></div>
                    <!-- /.card-header -->
                    <form role="#" method="post" enctype="multipart/form-data" >
                        <div class="card-body">
							<div class="form-group row">
								<label for="staticEmail"> Vehicle</label>
								<div class="col-md-3">
									<input type="radio" id="txt_vehicle_id" name="txt_plan_id" value="Vehicle">
								</div>
								<label for="staticEmail"> RickShaw</label>
								<div class="col-md-3">
									<input type="radio" id="txt_rick_id" name="txt_plan_id" value="RickShaw">
								</div>
								<label for="staticEmail" >Accessories</label>
								<div class="col-md-3">
									&nbsp;<input type="radio" id="txt_acc_id" name="txt_plan_id" value="Accessories">
								</div>
							</div>
							<div class="form-group form_group_custom">
								<label for="staticEmail">Ref. N&deg;</label>
								<select name="txt_refo_car_id" id="txt_refo_car_id" class="form-control">
									<?php
									$query="SELECT * FROM tbl_vehicle_rantal";
									$result = $connect->query($query);
									if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
									?>
										<option value="<?php echo $row['ve_id']; ?>">
											<?php echo $row['ve_ref_no']; ?>
										</option>
									<?php } } ?>
								</select>
								<select name="txt_refo_driver_id" id="txt_refo_driver_id" class="form-control">
									<?php
									$query="SELECT * FROM tbl_users
									INNER JOIN tbl_relationship_users_position 
									On tbl_users.user_id = tbl_relationship_users_position.user_id
									WHERE  user_position='3' AND user_position_id='8'
									ORDER BY user_first_name
									";
									$result = $connect->query($query);
									if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
									?>
										<option value="<?php echo $row['user_id']; ?>">
											<?php echo $row['user_first_name']; ?>  
											<?php echo $row['user_last_name']; ?>
										</option>
									<?php } }?>
								</select>
								<select name="txt_refo_tr_id" id="txt_refo_tr_id" class="form-control">
									<?php
									$query="SELECT * FROM tbl_users
									INNER JOIN tbl_relationship_users_position 
									On tbl_users.user_id = tbl_relationship_users_position.user_id
									WHERE  user_position='3' AND user_position_id='7'
									ORDER BY user_first_name";
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
								<?php } }?>
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
									<?php } }?>
								</select>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Date:</label>
										 <input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>ID .N&deg;:</label>
										<input  type="text" class="form-control"  name="txt_mileage_record" value="">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name Of Garage:</label>
										 <input type="text" class="form-control" name="txt_name_garage" value="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Vendor Name:</label>
										<select name="txt_vendor_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
											<option data-subtext="" value="">Select One</option>
											<?php
												$v_sql = "SELECT * FROM tbl_vendor ORDER BY verdor_name";
												$result = $connect->query($v_sql);
												if ($result->num_rows > 0){
													while($row = $result->fetch_assoc()){
											?>
											<option data-subtext="" value="<?php echo $row['vendor_id']; ?>">
											<?php echo $row['verdor_name']; ?>
											</option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Description:</label>
										<textarea name="txt_description" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Type:</label>
										<select name="txt_select_box_type" class="form-control">
											<option value="BOX">BOX</option>
											<option value="SET">SET</option>
											<option value="PCS">PCS</option>
										</select>
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
								<div class="col-md-6">
									<div class="form-group">
										<label>Note (En):</label>
										<textarea name="txt_note" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>N&deg; of Use:</label>
										<input class="form-control" type="text" name="txt_of_use">
									</div>
								</div>
							</div>
							<div class="form-group row form_group_custom">
								<div class="table-responsive">
									<table class="table table-bordered" >
										<thead>
											<tr style="width: 100%;">
												<th style="width:2%;">Qty</th>
												<th style="width: 10%;">Unit Price</th>
												<th style="width: 10%;">Discount</th>
												<th style="width: 10%;">Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><input class="form-control" type="text" name="txt_qty" id="txt_qty"></td>
												<td><input class="form-control" type="text" name="txt_unit_price" id="txt_unit_price"></td>
												<td><input class="form-control" type="text" name="txt_discount" id="txt_discount"></td>
												<td><input class="form-control" type="text" name="txt_total" id="txt_total"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
                        </div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="btn_add" class="btn btn-primary">Add</button>
							<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
							<a href="index.php" class="btn btn-danger">Cancel</a>
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

<style type="text/css">    
#txt_refo_car_id,#txt_refo_driver_id,
#txt_refo_tr_id,#txt_refo_acc_id,#txt_refo_rick_id {
	display: none;
}
</style>
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
			var v_j_qty=$("#txt_qty").val();
			var v_j_price=$("#txt_unit_price").val();
			var v_j_discount=$("#txt_discount").val();
			// profit
			var v_j_total_price=parseFloat(v_j_price) * parseFloat(v_j_qty);
			var v_j_total_discount=parseFloat(v_j_total_price)-parseFloat(v_j_total_price * v_j_discount)/100;
			var v_j_total_net=v_j_total_discount;
			$("#txt_total").val(v_j_total_net);
			// end profit
		}
		$('#txt_qty').on('input', function(){ 
             ex_total_calulator();
		});
        $('#txt_unit_price').on('input', function(){ 
             ex_total_calulator();
		});
		$('#txt_discount').on('input', function(){ 
             ex_total_calulator();
		});           
	});
</script>
</body>
</html>