<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

  //$v_sql = "SELECT * FROM tbl_website_info";
  $v_sql = "SELECT * FROM tbl_vehicle_rantal";
    $result = $connect->query($v_sql);

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>VEHICAL RENTAL CONTROL PANEL</h1>
			<a href="add.php" class="btn btn-success">Add New <i class="fa fa-plus"></i></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">VEHICAL RENTAL</li>
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
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Image</th>
					 <th >Vehicle Ref. No.</th>
					 <th >Province Name</th>
					 <th >Year</th>
					 <th >Make</th>
					 <th >Model</th>
					 <th >Sub Model</th>
					 <th >Color</th>
					 <th >Horse Power</th>
					<th >No Of Seats</th> 
					<th >Transmission Type</th>
					<th >Vehical Type</th>
					<th >Type</th>
					<th >Maximum Weight</th>
					<th >Steering Wheel Type</th>
					<th >No of Axles</th> 
					<th >No of Cylinders</th> 
					<th >Cylinders Disp</th> 
					<th >Test Driver URL</th> 
					<th >Show URL</th> 
					<th >Note</th> 
					<th >Range Days (1-7)</th> 
					<th >Extra Days (1-7)</th> 
					<th >Range Days (15-26)</th> 
					<th >Extra Days (15-26)</th> 
					<th >Monthly</th> 
					<th >Monthly Extra Days</th> 
					<th >Yearly</th> 
					<th >Yearly Extra Days</th> 
					<th >Detail</th> 
					 
					<th>Action</th>
					 
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                     if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) { 
						$delete_url="dalete.php?delete_id=".$row['ve_id'];	?>

                             <tr>
                              
							   <td> <?php echo $row["ve_title"]; ?></td>
							   <td><img style="height:50px; width:50px;" src="<?php echo $img_path.'vehicle_rental/'. $row ['ve_image'];?>"></td> 
							   <td> <?php echo $row["ve_ref_no"]; ?></td>							   
							   <td> <?php echo $row["province_name"]; ?></td>							   
							   <td> <?php echo $row["ve_year"]; ?></td>							   
							   <td> <?php echo $row["ve_make"]; ?></td>							   
							   <td> <?php echo $row["ve_model"]; ?></td>							   
							   <td> <?php echo $row["ve_sub_model"]; ?></td>							   
							   <td> <?php echo $row["ve_color"]; ?></td>							   
							  <td> <?php echo $row["ve_horse_pow"]; ?></td>							   
						    	 <td> <?php echo $row["ve_no_of_seat"]; ?> 			   
						    	 <td> <?php echo $row["ve_transmission_type"]; ?> 			   
						    	 <td> <?php echo $row["ve_vehical_type"]; ?> 			   
						    	 <td> <?php echo $row["ve_type"]; ?> 			   
						    	 <td> <?php echo $row["ve_maximum_weight"]; ?> 			   
						    	 <td> <?php echo $row["ve_steering_wheel_type"]; ?> 			   
						    	 <td> <?php echo $row["ve_no_of_axles"]; ?> 			   
						    	 <td> <?php echo $row["ve_no_of_eylinders"]; ?> 			   
						    	 <td> <?php echo $row["ve_cylinders_disp"]; ?> 			   
						    	 <td> <?php echo $row["ve_test_drive_url"]; ?> 			   
						    	 <td> <?php echo $row["ve_show_url"]; ?> 			   
						    	 <td> <?php echo $row["ve_note"]; ?> 			   
						    	 <td> <?php echo $row["ve_days(1-7)"]; ?> 			   
						    	 <td> <?php echo $row["ve_extra_days(1-7)"]; ?> 			   
						    	 <td> <?php echo $row["ve_day(15-26)"]; ?> 			   
						    	 <td> <?php echo $row["ve_extra_day(15-26)"]; ?> 			   
						    	 <td> <?php echo $row["ve_monthly"]; ?> 			   
						    	 <td> <?php echo $row["ve_monthy_extra_days"]; ?> 			   
						    	 <td> <?php echo $row["ve_yearly"]; ?> 			   
						    	 <td> <?php echo $row["ve_yearly_extra_days"]; ?> 			   
						    	 <td> <?php echo $row["ve_detail"]; ?> 			   
						    	  			   
							   
                              <td>
							  <a href="edit.php?edit_id=<?php echo $row['ve_id'];?>" class="btn btn-success">Edit</a>
							  <a href="#" onclick="delete_data('<?php echo $delete_url;?>')" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i> Delete</a>
							  </td>
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

<!-- page script -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
