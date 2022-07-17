<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

$services= @$_GET['services'];
	if($services=="")
	{
		$services= 1; 
	}
	
     $q_sql = "SELECT * FROM tbl_usergroup where id=".$services;
    $qresult = $connect->query($q_sql);
	$qrow = $qresult->fetch_assoc();

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> CITY TOUR PACKAGE POSTING SERVICE CONTROL PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">City Tour Package Posting Service</li>
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
        <div class="caption font-dark">
            <a href="add.php" id="sample_editable_1_new" class="btn btn-info"> Add New
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="tools"> </div>
    </div>
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <?php   $v_sql1 = "SELECT *  FROM tbl_posting_package where group_id=".$services;
                        $result1 = $connect->query($v_sql1);
                      
                        if ($result1->num_rows > 0) {                              $i=1;
                             
                            while($row1 = $result1->fetch_assoc()){ ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                   <th>No</th>
						 <th>Mem. Type </th>
                        <th>System Package</th>
						 <th>Posting</th>
                        <th>Trial</th>
                        <th>Period</th>
						<th>Qty</th>
                        <th>Price</th>
						 <th>Total</th>
                        <th>Discount</th>
                        <th>Net Pay</th>
                        <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php
					 $v_sql = "SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON 
					tbl_package_detail.package_id=tbl_posting_package.id where tbl_posting_package.group_id=".$services." and tbl_posting_package.id= ".$row1['id'];
					 
				$result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                             <tr>
                            <td><?php echo $i++; ?></td>
                             <td><?php if($row['member_type']==1){ echo 'SILVER'; } else if($row['member_type']==2){ echo 'PLATINUM'; } else if($row['member_type']==3){ echo 'GOLD'; }
						  else if($row['member_type']==4){ echo 'DIAMOND'; } else { echo 'NO NEED';  }
						  ?>			  
						  </td>
<td><?php echo $row['package_name']; ?></td>
						 <td><?php echo $row['qty_posting']; ?></td>
                        <td><?php echo $row['trial']; ?></td>
						<td><?php echo $row['period']; ?></td>
						<td><?php echo $row['qty']; ?></td>
						<td><?php echo $row['price']; ?></td>
                        
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $row['net_pay']; ?></td>   						  
                               
                              <td><a href="edit.php?edit_id=<?php echo $row['p_id'];?>" class="btn btn-success m-1">Edit</a>
                              <a href="#" onclick="delete_data('<?php echo $delete_url;?>')"  class="btn btn-danger" title="delete">Delete</a>
                            </td>
                            </tr>


                      <?php } } ?>
                 
               </tbody>
                </table>
				<?php } } ?>
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
