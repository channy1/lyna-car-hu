<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';


    $v_sql = "SELECT * FROM tbl_agreement

              LEFT JOIN tbl_users

              ON tbl_users.user_id=tbl_agreement.user_id

              LEFT JOIN tbl_user_agreement

              ON tbl_agreement.user_id=tbl_user_agreement.customer_id

              WHERE type_agreement='3'

              ORDER BY tbl_agreement.ag_id DESC



              ";

    $result = $connect->query($v_sql);

    


?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> TOUR GUIDE RENTAL LIST CONTROL PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tour Guide Rental List</li>
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
                    <th>No</th>

                        <th>First Name</th>

                        <th>Last Name</th>

                        <th>Tel</th>

                        <th>Nationality</th>

                        <th>Email</th>

                        <th>Action</th>

                        <th>Receipt</th>

                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                     if ($result->num_rows > 0) {
						$i=1;
                        while($row = $result->fetch_assoc()) { 
                          $delete_url="dalete.php?delete_id=".$row['pre_id'];
                          ?>
								<?php  $images=$row["pre_image"]; ?>
                             <tr>
                              <td><?php echo $i; ?></td>

                       

                        <td><?php echo $row["user_first_name"]; ?></td>

                        <td><?php echo $row["user_last_name"]; ?></td>

                        <td><?php echo $row["user_phone_number"]; ?></td>

                        <td><?php echo $row["nation_lity"]; ?></td>

                        <td><?php echo $row["user_email"]; ?></td>

                        <td> <a href="edit.php?edit_id=<?php echo $row['ag_id'];?>" class="btn btn-xs  btn-success">Edit</a>

                       

                        </td>

                        <td>  

                            <a target="_blank" href="../../admin/return_receip_and_receip/make_receip.php?id=<?php echo $row['ag_id']; ?>"><i class="fa fa-plus fa-fw" aria-hidden="true"></i></a>

                            <a target="_blank" href="../../admin/return_receip_and_receip/tr_receip.php?id=<?php echo $row['ag_id']; ?>"><i class="fa fa-print fa-fw" aria-hidden="true"></i></a>

                            <a target="_blank" href="../../admin/return_receip_and_receip/tr_return_receip.php?id=<?php echo $row['ag_id']; ?>"><i class="fa fa-print fa-fw" aria-hidden="true"></i></a>

                        </td>
                            </tr>


                      <?php $i++;} } ?>
                 
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
