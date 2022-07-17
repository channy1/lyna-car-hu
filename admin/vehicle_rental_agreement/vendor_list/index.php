<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

  $v_sql = "SELECT * FROM tbl_vendor";
    $result = $connect->query($v_sql);

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>VENDOR LIST CONTROL PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor List</li>
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Ref No.</th>
                    <th>Vendor Name</th>

                        <th>Sex</th>

                        <th>Remarks</th>

                        <th>Phone</th>

                        <th>Email</th>

                        <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                     if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) { 
                          $delete_url="dalete.php?delete_id=".$row['pre_id'];
                          ?>
<?php  $images=$row["pre_image"]; ?>
                             <tr>
                              <td> <?php echo $row["ref_no"]; ?></td>
                              <td> <?php echo $row["verdor_name"]; ?></td>
                              <td> <?php echo $row["gender"]; ?></td>
                                
                              <td> <a class="share-btn share-btn-lg share-btn-facebook"

                             href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $row['s_fb']; ?>"

                             title="Share on Facebook">

                            <span class="share-btn-icon"></span>

                            <span class="share-btn-text">Facebook</span>



                          </a>

                          <a class="share-btn share-btn-twitter"

                             href="https://twitter.com/share?url=<?php echo $row['s_tw']; ?>"

                             title="Share on Twitter">

                            <span class="share-btn-icon"></span>

                            <span class="share-btn-text">Twitter</span>

                          </a>

                           <!-- Branded LinkedIn button -->

                          <a class="share-btn share-btn-branded share-btn-linkedin"

                             href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $row['s_lin']; ?>"

                             title="Share on LinkedIn">

                            <span class="share-btn-icon"></span>

                            <span class="share-btn-text">LinkedIn</span>

                          </a>

                          <!-- Branded Google+ button -->

                          <a class="share-btn share-btn-branded share-btn-googleplus"

                             href="https://plus.google.com/share?url=<?php echo $row['s_google']; ?>"

                             title="Share on Google+">

                            <span class="share-btn-icon"></span>

                            <span class="share-btn-text">Google+</span>

                          </a>

  

                     <a class="share-btn share-btn-email"

                         href="mailto:?subject=Share Buttons Demo&body=<?php echo $row['s_email']; ?>"

                         title="Share via Email">

                        <span class="share-btn-icon"></span>

                        <span class="share-btn-text">Email</span>

                      </a></td>
					 <td> <?php echo $row["phone"]; ?></td>
					 <td> <?php echo $row["email"]; ?></td>
                              <td><a href="edit.php?edit_id=<?php echo $row['vendor_id'];?>" class="btn btn-xs  btn-success">Edit</a>

                              <a href="#" onclick="delete_data('<?php echo $delete_url;?>')"  class="btn btn-xs btn-danger" title="delete">Delete</a>
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
