<?php
    require_once '../../system/config/database.php';
    require '../config.php'; 
    require '../editor_header.php'; 
    require '../sidebar.php';
?>
<?php
   if(isset($_POST['btn_add'])){      
		$edit_id=$_GET['edit_id'];
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
		$query_add = "UPDATE tbl_repair SET 
                   add_date='$txt_date',
                   mileage='$txt_mileage_record',
                   name_grage='$txt_name_garage',
                   vender_id='$txt_vendor_name',
                   description='$txt_description',
                   type_box='$txt_select_box_type',
                   record_note='$txt_note',
                   qty='$txt_qty',
                   record_price='$txt_unit_price',
                   record_discount='$txt_discount',
                   record_total='$txt_total',
                   prepare_by='$txt_prepare',
                   approved_by='$txt_approved',
                   status_report='1'
                   WHERE report_id='$edit_id'";
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
					<h1>Edit Manage Maintainance Repair List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Manage Maintainance Repair List</li>
                    </ol> 
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
                    <?php
						$id=$_GET['edit_id'];
						$query="SELECT * FROM tbl_repair WHERE report_id='$id'";
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
										<label>Date:</label>
										<input type="text" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" class="form-control" name="txt_date" value="<?php echo $row['add_date'] ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Mileage Record:</label>
										<input type="text" class="form-control"  name="txt_mileage_record" value="<?php echo $row['mileage']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name Of Garage:</label>
										<input type="text" name="txt_customer_name" class="form-control"  value="<?php echo $row['name_grage']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Vendor Name:</label>
										<select name="txt_vendor_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
											<?php
												$v_sql = "SELECT * FROM tbl_vendor
												ORDER BY verdor_name";
												$result = $connect->query($v_sql);
												if ($result->num_rows > 0){
													while($rows = $result->fetch_assoc()){
											?>
											<option <?php if($row['vender_id']==$rows['vendor_id']){echo "selected='selected'"; } ?> data-subtext="" value="<?php echo $rows['vendor_id']; ?>"><?php echo $rows['verdor_name']; ?></option>
											<?php } }?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Description:</label>
										<textarea name="txt_description" class="form-control"><?php echo $row['description']; ?></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Type:</label>
										<select name="txt_select_box_type" class="form-control">
											<option value="BOX" <?php if($row['type_box']=='BOX') {echo "selected='selected'";} ?>>BOX</option>
											<option value="SET" <?php if($row['type_box']=='SET') {echo "selected='selected'";} ?>>SET</option>
											<option value="PCS" <?php if($row['type_box']=='PCS') {echo "selected='selected'";} ?>>PCS</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Prepared By:</label>
										<input type="text" name="txt_prepare" class="form-control" value="<?php echo $row['prepare_by']; ?>">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Approved By:</label>
										 <input type="text" name="txt_approved" class="form-control" value="<?php echo $row['approved_by']; ?>">
									</div>
								</div>
							</div>
                            <div class="form-group">
                                <label>Note:</label>
								<textarea name="txt_note" class="form-control"><?php echo $row['record_note']; ?></textarea>
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
												<td><input class="form-control" type="text" name="txt_qty" id="txt_qty" value="<?php echo $row['qty']; ?>"></td>
												<td><input class="form-control" type="text" name="txt_unit_price" id="txt_unit_price" value="<?php echo $row['record_price']; ?>"></td>
												<td><input class="form-control" type="text" name="txt_discount" id="txt_discount" value="<?php echo $row['record_discount']; ?>"></td>
												<td><input class="form-control" type="text" name="txt_total" id="txt_total" value="<?php echo $row['record_total']; ?>"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
                        </div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" name="btn_add" class="btn btn-primary">Update</button>
							<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
							<a href="index.php" class="btn btn-danger">Cancel</a>
						</div>
					</form>
					<?php } } ?>
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