<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

  $v_sql = "SELECT * FROM tbl_pre_info";
    $result = $connect->query($v_sql);

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CUSTOMER HISTORY AND REPORTS CONTROL  PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">History and Reports</li>
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
           <!-- <a href="add.php" id="sample_editable_1_new" class="btn btn-info"> Add New
                <i class="fa fa-plus"></i>
            </a>-->
        </div>
        <div class="tools"> </div>
    </div>
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th colspan="2">Date Used</th>

                    <th rowspan="2">Name of Services Used</th>

                    <th rowspan="2">No. of Used</th>

                    <th rowspan="2">Expense</th>

                    <th rowspan="2">Discount</th>

                    <th rowspan="2">Net Expense</th>

                    <th rowspan="2">Bonus</th>

                    <th rowspan="2">Net Income</th>

                    <th rowspan="2">Noted</th>
                   
                  </tr>
				  <tr>
				  <th>From</th>
                    <th>To</th>
				  </tr>
                  </thead>
                  <tbody>
                   <?php 

                        $id = $_SESSION['user']->user_id; 

                        $query="SELECT * FROM tbl_agreement as tbl_a 

                                inner join tbl_vehicle_rantal as tbl_v

                                on tbl_a.car_id = tbl_v.ve_id

                                 where tbl_a.recipt_no != '' and tbl_a.user_id = ".$id; 

                        $result = $connect->query($query);

                        if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) 

                            {

                    ?>

                        <td><?php echo date_format(date_create($row['ag_inception_date']) , "d-M-Y") ?> </td>

                        <td><?php echo date_format(date_create($row['ag_return_date']) , "d-M-Y") ?> </td>

                        <td><?php echo $row['ve_title'] ;?></td>

                    <?php 

                            }

                        }

                    ?>
                 
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
