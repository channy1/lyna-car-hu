<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

 $v_sql = "SELECT tbl_province.*,tbl_users.*,tbl_user_position.* FROM tbl_users INNER JOIN tbl_user_position ON tbl_users.user_position=tbl_user_position.up_id 
    INNER JOIN tbl_relationship_users_position ON tbl_users.user_id=tbl_relationship_users_position.user_id
     LEFT JOIN tbl_province ON tbl_province.pv_id=tbl_users.province_id
    where user_position ='3' and user_position_id='9' GROUP BY user_id";
    $result = $connect->query($v_sql);
    

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>HOTEL & GUESTHOUSE LIST CONTROL PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">HOTEL & GUESTHOUSE LIST</li>
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
                    <th>ID No.</th>
                        <th>Coupon Card No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>Sex</th>
                        <th>Title</th>
                        <th>Unit/Org</th>
                        <th>Province</th>
                        <th>Address</th>
                      
                        <th>DOB</th>
                        <th>Images</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Social Media</th>
                        <th>Review</th>
                        <th>Blacklist</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                     if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) { ?>

                             <tr>
                              <td><a href="edit.php?edit_id=<?php echo $row["user_id"]; ?>"><?php echo $row["user_id_number"]; ?></a></td>
                        <td><?php echo $row["user_coupon_code"]; ?></td>
                        <td><?php echo $row["user_first_name"]; ?></td>
                        <td><?php echo $row["user_last_name"]; ?></td>
                        <td><?php echo $row["user_name"]; ?></td>
                        <td><?php echo $row["user_gender"]; ?></td>
                        <td><?php echo $row["user_title"]; ?></td>
                        <td><?php echo $row["user_company"]; ?></td>
                        <td><?php echo $row["pv_title"]; ?></td>
                        <td><?php echo $row["user_address"]; ?></td>
                       
                        <td><?php
                          echo $row["user_birthday"];

                        ?></td>
                        <td>
                            <?php 
                               if($row["user_position"]=="2") {
                            ?>
                            <?php
                               if(($row['add_bye'] >0) && ($row["user_position"]=="2")) {
                            ?>
                             <img style="width:60px;" src="../image/img_customer/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">

                            <?php } else { ?>
                            <img style="width:60px;" src="../../../system/img/img_customer/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">
                            <?php } ?>
                           
                           
                           <?php } elseif ($row["user_position"]=="3") { ?>
                           <?php
                               if(($row['add_bye'] >0) && ($row["user_position"]=="3")) {
                            ?>
                             <img style="width:60px;" src="../image/img_partner/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">

                            <?php } else { ?>
                            <img style="width:60px;" src="../../../system/img/img_partner/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">
                            <?php } ?>

                           <?php  } ?>

                        </td>
                        
                        <td><?php echo $row["user_phone_number"]; ?></td>
                        <td><?php echo $row["user_email"]; ?></td>
                        <td><?php echo $row["socail_user"]; ?></td>
                        <td><?php echo $row["review_user"]; ?></td>
                        <td><?php echo $row["black_list"]; ?></td>
                        <td>
                           <a class="share-btn share-btn-email"
                           href="mailto:?subject=Share Buttons Demo&body=<?php echo $row['user_email']; ?>"
                           title="Share via Email">
                          <span class="share-btn-icon"></span>
                          <span class="share-btn-text"><i class="fa fa-envelope" aria-hidden="true"></i> Email</span>
                          </a>
                        </td>
                        <td>
                            <?php $status=$row["user_status"]; 
                            if($status=="1") {
                                echo "ENABLE";
                            }
                            else {
                                echo "DISABLE";
                            }

                             ?>
                      </td>
                              <td><a href="edit.php?edit_id=<?php echo $row['user_id'];?>" class="btn btn-success">Edit</a></td>
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
</script>
</body>
</html>
