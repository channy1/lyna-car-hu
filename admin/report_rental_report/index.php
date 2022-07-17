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
            <h1>RENTAL REPORT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">RENTAL REPORT</li>
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
              <!--<div class="portlet-title">
        <div class="caption font-dark">
            <a href="add.php" id="sample_editable_1_new" class="btn btn-info"> Add New
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="tools"> </div>
    </div>
                <h3 class="card-title"></h3>-->
				<div class="row">
					<div class="col-md-8">
						<form>
							<?php
								$s_input_month=@$connect->real_escape_string($_GET['txt_month']);
								$s_input_year=@$connect->real_escape_string($_GET['txt_year']);
								$s_txt_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);
							?>
							<div class="form-group row">
								<label for="staticEmail" class="col-md-2 col-form-label">FROM:</label>
								<div class="col-md-2">
									<input value="<?php echo $s_input_month ?>" type="text" class="form-control" name="txt_month" readonly="" id="start-date">
								</div>
								<label for="staticEmail" class="col-md-1 col-form-label">TO:</label>
								<div class="col-md-2">
									<input value="<?php echo $s_input_year ?>" type="text" class="form-control" name="txt_year" readonly="">
								</div>
								<div class="col-md-2">
									<button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
								</div>
								<div class="col-md-2">
									<button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-eye"></i>Print</button>
								</div>
							</div>
							<br>
						</form>
					</div>
					<div class="col-md-2">
						<a target="_blank" class="btn btn-danger" href="add.php"><i class="fa fa-calendar"></i> Add Reports</a>
					</div>
					<div class="col-md-2">
						<a target="_blank" class="btn btn-danger" href="list.php"><i class="fa fa-calendar"></i> Manage</a>
					</div>
				</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                   <th >Start Date</th>

                                        <th >End Date</th>

                                        <th >Ref. N&deg;</th>

                                        <th >Customer Name</th>

                                        <th >Prepared By</th>

                                        <th >Approved By</th>

                                        <th >Amount</th>

                                        <th >Dis(%)</th>

                                        <th >Dis Record</th>

                                        <th >After Dis</th>

                                        <th >Commission(%)</th>

                                        <th >Bonus Saveing</th>

                                        <th >Net Income</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php

         $search_month=@$connect->real_escape_string($_GET['txt_month']);

         $search_year=@$connect->real_escape_string($_GET['txt_year']);

      

          if($search_month !=""){

            $search_month = @$connect->real_escape_string($_GET['txt_month']);

          }

          else {

            $search_month ="";

          }

           if($search_year !=""){

            $search_year = @$connect->real_escape_string($_GET['txt_year']);

          }

          else {

            $search_year ="";

          }



         

                     $query="SELECT *

                                FROM tbl_rental_report 

                                INNER JOIN tbl_vehicle_rantal

                                ON tbl_rental_report.ref_id=tbl_vehicle_rantal.ve_id

                                LEFT JOIN tbl_users

                                ON tbl_users.user_id=tbl_rental_report.customer_id

                                WHERE type='Vehicle' AND status_type='1'

                                AND 

                                (

                                start_date >='$search_month' AND 

                                start_date <='$search_year'

                                )

                               

                                 ORDER BY start_date DESC 

                        ";

                        $result = $connect->query($query);



                       

                      

                        if ($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()){



                          ?>

                             <tr>
                              <td>  <?php  

                                            $start_date = strtotime($row['start_date']);

                                              echo date('d M y', $start_date); 

                                            ?></td>
                               <td> 

<img  width='100px' height='100px' src="<?php echo $img_path; ?>pre_info/<?php echo $images; ?>">

                             <!--    <img width='100px' height='100px' src="../image/pre_info/<?php echo $row["pre_image"]; ?> > -->
                              </td>
                              <td><?php $end_date = strtotime($row['end_date']);
                                              echo date('d M y', $end_date); 
                                            ?></td>
                              <td><?php  echo $row['ve_ref_no'];?></td>
                              <td><?php echo $row['user_first_name'].' '.$row['user_last_name'];?></td>
                              <td><?php echo  $row['pre_by'];?></td>
                              <td><?php echo  $row['app_by'];?></td>
                              <td><?php echo  $row['amount'];?></td>
                              <td><?php echo  $row['discount_pre'];?></td>
                              <td><?php echo  $row['discount_record'];?></td>
                              <td><?php  echo number_format($row['after_discount'],2);?></td>
                              <td><?php  echo $row['commission'] ;?></td>
                              <td><?php  echo $row['bonus_save'] ;?></td>
                              <td><?php  echo $row['net_income'] ;?></td>
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
