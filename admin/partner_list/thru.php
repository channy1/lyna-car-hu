<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

    
   $v_sql = "SELECT * FROM tbl_users  where user_position ='3' and user_seft_thru='2'  GROUP BY user_id";
    $result = $connect->query($v_sql);
    


?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PARTNER THRU INTRODUCER REGISTRATION CONTROL PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PARTNER THRU INTRODUCER</li>
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
                 <div class="col-md-8">
               <a class="green btn"  href="seft.php"><span><i class="fa fa-user"></i></span> SELF-REGISTRATION</a>
               <a class="green btn"  href="thru.php"><span><i class="fa fa-user"></i></span> THRU INDRODUCER</a>
        </div>
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                   <th>User Name</th>
                        <th>Position</th>
                        <th>Images</th>
                        <th>Phone</th>
                        <th>E-mail</th>
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
                              <td> <?php 
                               $check_position=$row["user_position"];
                               if($check_position=="2") {
                                echo "Customer";
                               }
                               elseif ($check_position=="3") {
                                 echo "Partner";
                               }
                              else {
                                echo "";
                              }
                            ?></td>
                              <td> <?php 
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
