<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?> 

<?php 
  // select old date buy
	$inception_date="";
	$user_booking=@$_SESSION['user']->user_id;
	$v_sql = "SELECT count(tbl_buy_package.buy_package_id) as renew_time, tbl_buy_package.*,tbl_users.*,tbl_package.* FROM tbl_buy_package 
		INNER JOIN tbl_users  ON tbl_users.user_id=tbl_buy_package.user_buy_id 
		INNER JOIN tbl_package_position  ON tbl_package_position.p_id=tbl_buy_package.package_id 
		INNER JOIN tbl_package  ON tbl_package.package_id=tbl_package_position.package_id
		where user_buy_id='$user_booking' and status !=1 ORDER BY buy_package_id ASC LIMIT 1";
		$result = $connect->query($v_sql);
	 
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$inception_date=$row['buy_date'];
			$renew_time=$row['renew_time'];
		}
	}
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
		<?= @$sms ?>
          <div class="col-sm-6">
            <h1>History Package</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">History Package</li>
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
					<div class="portlet-title">
						<div class="caption font-dark"></div>
						<div class="tools"> </div>
					</div>
					<h3 class="card-title"></h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Customer</th>
								<th>Package Type</th>
								<th>Trial</th>
								<th>Period</th>
								<th>Price</th>
								<th>Discount</th>
								<th>Total</th>
								<th>Limit</th>
								<th>Buy Date</th>
								<th>Expired Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$user_booking=@$_SESSION['user']->user_id;
								$v_sql = "SELECT tbl_buy_package.*,tbl_users.*,tbl_package.* FROM tbl_buy_package 
								INNER JOIN tbl_users  ON tbl_users.user_id=tbl_buy_package.user_buy_id 
								INNER JOIN tbl_package_position  ON tbl_package_position.p_id=tbl_buy_package.package_id 
								INNER JOIN tbl_package  ON tbl_package.package_id=tbl_package_position.package_id
								where user_buy_id='$user_booking' ORDER BY buy_package_id DESC";
								$result = $connect->query($v_sql);
									$delete_url="dalete.php?delete_id=".$row['se_id'];	
								if ($result->num_rows > 0) {
									  $i=1;
									  $total="";
									  $sum_total=0;
									while($row = $result->fetch_assoc()){
										
										$sub=$row['price']*($row['discount'])/100;
										$total=$row['price']-$sub+(10)/100;
										if($row['status'] !=1){
										  $sum_total +=$total;
										}
										
							?>
							<?php
								if($row['status'] ==2 || $row['status'] ==3) {
							?>	
							<!--<tr>
								<th scope="row"><?php echo $i++; ?></th>
								<td><?php echo $row['customer_name']; ?></td>
								<td><?php echo $row['sc_title']; ?></td>
								<td><?php echo $row['from_date']; ?></td>
								<td><?php echo $row['to_date']; ?></td>
								<td>
									<a href="edit.php?edit_id=<?php echo $row['se_id']; ?>" class="btn btn-success" title="edit"><i class="fa fa-edit"></i> Edit</a>
									
									<a href="#" onclick="delete_data('<?php echo $delete_url;?>')" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i> Delete</a>
								</td>
							</tr>--> 
					
						<tr id="1">
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $i++; ?></a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['user_last_name']; ?> <?php echo $row['user_first_name']; ?></a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['title']; ?></a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['period']; ?> Days
							</a></td>
							<td style="text-align: right;"><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
							<td style="text-align: right;"><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
							<td style="text-align: right;"><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>">$ <?php echo number_format($total,2); ?></a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['buy_date']; ?></a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['date_expired']; ?></a></td>
							<td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php 
							  if($row["status"]=="1") {
								echo "Trail";
							  }
							  elseif ($row["status"]=="2") {
								echo "ABA";
							  }
							  elseif ($row["status"]=="3") {
								  echo "WING";
							  }
							  else {
								echo "Trial";
							  }
							 ?></a></td>
						   
						</tr>
						<tr style="border: 0 !important;"> 
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="text-align: right;">Renewal Times  :        </td>
						  <td style="text-align: right;color:#a4509f;font-weight: 600;"><?php echo $renew_time; ?> </td>
						</tr>
						<tr> 
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="text-align: right;">Total Paid :</td>
						  <td style="text-align: right;color:#a4509f;font-weight: 600;">$ <?php echo number_format($sum_total,2); ?></td>
						</tr>
						<tr> 
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="border: 0 !important;"></td>
						  <td style="text-align: right;">Inception Date :</td>
						  <td style="text-align: right;color:#a4509f;font-weight: 600;"><?php echo $inception_date; ?></td>
						</tr>
                    <?php } else { ?>
						<tr id="1">
							
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $i++; ?></td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['user_last_name']; ?> <?php echo $row['user_first_name']; ?></td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['title']; ?></td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['try']; ?> Days</td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['period']; ?> Days
							</td>
							<td style="text-align: right;"><i style="color: red;" class="fa fa-exclamation-triangle"></i> $ <?php echo number_format($row['price'],2); ?></td>
							<td style="text-align: right;"><i style="color: red;" class="fa fa-exclamation-triangle"></i> $ <?php echo number_format($row['discount'],2); ?></td>
							<td style="text-align: right;"><i style="color: red;" class="fa fa-exclamation-triangle"></i> $ <?php echo  number_format($total,2); ?></td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['post_limit']; ?></td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['buy_date']; ?></td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['date_expired']; ?></td>
							<td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php 
							  if($row["status"]=="1") {
								echo "Trail";
							  }
							  elseif ($row["status"]=="2") {
								echo "ABA";
							  }
							  elseif ($row["status"]=="3") {
								  echo "WING";
							  }
							  else {
								echo "Trail";
							  }
							 ?></td>
						   
						</tr> 

                    <?php } } }  ?>	
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
	// start option select
	$(document).ready(function (){ 
		$("#txt_vehicle_id").click(function(){
			$("#txt_refo_car_id").css("display", "block");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_driver_id").click(function(){
			$("#txt_refo_driver_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
        $("#txt_tr_id").click(function(){
			$("#txt_refo_tr_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_rick_id").click(function(){
			$("#txt_refo_rick_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_acc_id").css("display", "none");
		});
		$("#txt_acc_id").click(function(){
			$("#txt_refo_acc_id").css("display", "block");
            $("#txt_refo_car_id").css("display", "none");
            $("#txt_refo_driver_id").css("display", "none");
            $("#txt_refo_tr_id").css("display", "none");
            $("#txt_refo_rick_id").css("display", "none");
		});           
	});
// end start option


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
				//window.location.href = url;
				$.ajax({
                    url: url,
                    type: 'POST',
                    data: {

                    },
                    success: function(responce){
                        if(responce == 1){
                            swal("Delete Successfully", {
                                icon: "success",
                            }).then((willDelete) => {
                                location.reload();
                            });
                        }else {
                            swal("Your pre information detail is safe!");
							location.reload();
                        }
                    }
                });
			}else{
				swal("Your pre information detail is safe!");
			}
		});
	}

</script>
</body>
</html>
