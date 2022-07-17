<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

   $sql = "SELECT * FROM tbl_phone_line WHERE type>=1";

    $result = $connect->query($sql);

    while ($row = mysqli_fetch_object($result)){

      $r[] = $row;        

    }
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Office Phone Lines</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Office Phone Lines</li>
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
            <a href="print_letter.php" id="sample_editable_1_new" class="btn btn-info">Print          
            </a> 
			<a href="add.php" id="sample_editable_1_new" class="btn btn-danger">   <i class="fa fa-calendar" aria-hidden="true"></i>   Add    
            </a> 
			<a href="list.php" id="sample_editable_1_new" class="btn btn-danger">   <i class="fa fa-calendar" aria-hidden="true"></i>   Manage          
            </a>
        </div>
        <div class="tools"> </div>
    </div>
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <center><h2>3. OFFICE PHONE LINES</h2></center>

        <center><strong>OWNERS</strong></center>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Contact Person</th>
                    <th>Title</th>
                    <th>Telephone</th>
                    <th>Remarks</th> 
                   
                  </tr>
                  </thead>
                  <tbody>
                      <?php

            foreach ($r as $val) {

              if($val->type==1){

                ?>
                             <tr>
                              <td><?php echo $val->contact_person;?></td>
							  <td><?php echo $val->title;?></td>
							  <td> <?php echo(str_replace('/', '<br>', $val->tel));?></td>
							  <td><?php echo $val->remark;?></td>
                               
                            </tr>


                      <?php } } ?>
                 
               </tbody>
                </table>
              </div>
			  <div class="card-body">
			   <center><h2>PHONE LINES</h2></center>

        <center><strong>LYNA-CARRENTAL.COM</strong></center>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Contact Person</th>
                    <th>Title</th>
                    <th>Telephone</th>
                    <th>Remarks</th> 
                   
                  </tr>
                  </thead>
                  <tbody>
                        <?php

            foreach ($r as $val) {

              if($val->type==2){

                ?>
                             <tr>
                               <td><?php echo $val->contact_person;?></td>
							 <td><?php echo $val->title;?></td> 
							 <td>

                        <?php echo(str_replace('/', '<br>', $val->tel));?>

                      </td>                      

                      <td><?php echo $val->remark;?></td>
                               
                            </tr>


                      <?php } } ?>
                 
               </tbody>
                </table>
              </div>
			  
			  
			   <div class="card-body">
			   <center><h2>PHONE LINES</h2></center>

        <center><strong>LYNA-GARAGE.COM</strong></center>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Contact Person</th>
                    <th>Title</th>
                    <th>Telephone</th>
                    <th>Remarks</th> 
                   
                  </tr>
                  </thead>
                  <tbody>
                          <?php

            foreach ($r as $val) {

              if($val->type==3){

                ?>
                             <tr>
                               <td><?php echo $val->contact_person;?></td>
							 <td><?php echo $val->title;?></td> 
							 <td>

                        <?php echo(str_replace('/', '<br>', $val->tel));?>

                      </td>                      

                      <td><?php echo $val->remark;?></td>
                               
                            </tr>


                      <?php } } ?>
                 
               </tbody>
                </table>
              </div>
			    <div class="card-body">
			   <center><h2>PHONE LINES</h2></center>

        <center><strong>GRACE TRADING.NET</strong></center>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Contact Person</th>
                    <th>Title</th>
                    <th>Telephone</th>
                    <th>Remarks</th> 
                   
                  </tr>
                  </thead>
                  <tbody>
                
          <?php

            foreach ($r as $val) {

              if($val->type==4){

                ?>
                             <tr>
                               <td><?php echo $val->contact_person;?></td>
							 <td><?php echo $val->title;?></td> 
							 <td>

                        <?php echo(str_replace('/', '<br>', $val->tel));?>

                      </td>                      

                      <td><?php echo $val->remark;?></td>
                               
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
