<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PRODUCTS RENTAL PLANNER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">PRODUCTS RENTAL PLANNER</li>
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
					<form role="form" method="post" enctype="multipart/form-data">
						
						<div class="card-body p-0">   
							<div class="row">
								<div class="col-md-8 p-0">
									<form>
										<?php
											$s_input_month=@$connect->real_escape_string($_GET['txt_month']);
											$s_input_year=@$connect->real_escape_string($_GET['txt_year']);
										?>
										<div class="form-group row">
											<label for="staticEmail" class="col-md-2 col-form-label">FROM:</label>
											<div class="col-md-3">
												<input value="<?php echo $s_input_month ?>" type="text" class="form-control" name="txt_month" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
											</div>
											<label for="staticEmail" class="col-md-1 col-form-label">TO:</label>
											<div class="col-md-3">
												<input value="<?php echo $s_input_year ?>" type="text" class="form-control" name="txt_year" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
											</div>
											<div class="col-md-2">
												<button style='float: right;margin-right: -25px;' type="submit" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
											</div>
										</div>
										<br>
									</form>
								</div>
								<div class="col-md-4 p-0">
									<a target="_blank" class="btn btn-danger" href="#print_planner.php?txt_month=<?php echo $s_input_month; ?>&txt_year=<?php echo $s_input_year; ?>"><i class="fa fa-print"></i> Print Plan</a>
									<a target="_blank" class="btn btn-danger" href="add_plan.php"><i class="fa fa-calendar"></i> Add Plan</a>
									<a target="_blank" class="btn btn-danger" href="plan_list.php"><i class="fa fa-calendar"></i> Manage</a>
								</div>
							</div>          
						</div>
						<!-- /.card-body -->
						<!--<div class="card-footer">
						  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
						   <a href="index.php" class="btn btn-danger">Cancel</a>
						</div>-->
					</form>
					<style>
					.table td, .table th {padding: 5px !important;}
					</style>
					<table id="example2" class="table table-bordered table-hover">
						<tbody>
							<tr>
								<th>Item/Date</th>
								<?php for($i=1; $i<= 31 ; $i++){?><td><?php  echo $i; ?></td> <?}?>
							</tr>
							<tr style="background-color:#A4509F; color:white; text-transform:uppercase;">
								<th>Vehicle </th>
								<?php for($i=1; $i <=31; $i++){ ?><td></td><?php } ?>
							</tr>
							<?php
								$id=@$_SESSION['user']->user_id;                
								$search_month = @$connect->real_escape_string($_GET['txt_month']);
								$search_year = @$connect->real_escape_string($_GET['txt_year']);
								if($search_month !=""){
									$search_month = @$connect->real_escape_string($_GET['txt_month']);
								}else {
									$search_month ="";
								}
								if($search_year !=""){
									$search_year = @$connect->real_escape_string($_GET['txt_year']);
								}else{
									$search_year ="";
								}
								$query="SELECT tbl_vehicle_rantal.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_vehicle_rantal
                                ON tbl_schedule_admin.ref_no=tbl_vehicle_rantal.ve_id
                                WHERE sc_type='Vehicle' and user_id = $id
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                ORDER BY from_date DESC ";
								$result = $connect->query($query);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()){
										$gey_year_from=$row['from_date'];
										$get_year_to=$row['to_date_sc'];
										$bg_color=$row['color_note'];
										$customer_name=$row['customer_name'];
										// start date calulate
										$start_day=date_create($gey_year_from);
										$end_day=date_create($get_year_to);
										$day=date_diff($start_day,$end_day);
										$total_day = $day->format("%a%")+1;
										// calulate date
										$range_year_from=date('Y', strtotime($gey_year_from));
										$range_day_from=date("d",strtotime($gey_year_from));
										$range_year_to=date('Y', strtotime($get_year_to));
										$range_day_to=date("d",strtotime($get_year_to));					 
								?>
						<tr>
							<th style="font-size:11px;"><?php echo $row['placque_no']; ?></th>
							<?php 
								for ($i=1; $i <=31 ; $i++) { 
									if( ($i>=$range_day_from) && ($i<=$range_day_to)){
									?>
									<th style="border-left:none; border-right none;background-color:<?php echo $bg_color;?>">
										<?php if($i==$range_day_to){ ?>
											<span class="field-tip">
												<i class="fa fa-eye"></i>
												<span class="tip-content">
													<?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
													<br>
													<?php echo $row['remark'];?>                                
												</span>
											</span>                       
										<?php } ?>
									</th>
								<?php }else{?>
								<th></th>
							<?php  } } ?>
						</tr>
                        <?php } } ?>
						<tr style="background-color:#A4509F; color:white; text-transform:uppercase;">
							<th style="text-align: left;">Driver</th>
							<?php for ($i=1; $i <=31 ; $i++) { ?>
								<th></th>
							<?php } ?>
						</tr>
						<?php
							$search_month = @$connect->real_escape_string($_GET['txt_month']);
							$search_year = @$connect->real_escape_string($_GET['txt_year']);
							if($search_month !=""){
								$search_month = @$connect->real_escape_string($_GET['txt_month']);
							}else{
								$search_month ="";
							}
							if($search_year !=""){
								$search_year = @$connect->real_escape_string($_GET['txt_year']);
							}else {
								$search_year ="";
							}
							$query="SELECT tbl_users.*,tbl_schedule_admin.*,
										tbl_schedule_admin.to_date as to_date_sc
									FROM tbl_schedule_admin 
									INNER JOIN tbl_users
									ON tbl_schedule_admin.ref_no=tbl_users.user_id
									WHERE sc_type='Driver' 
									AND 
									(
									from_date >='$search_month' AND 
									tbl_schedule_admin.to_date <='$search_year'
									)
									 ORDER BY from_date DESC";
							$result = $connect->query($query);                     
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];
                            $customer_name=$row['customer_name'];
                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;
                            // calulate date
							$range_year_from=date('Y', strtotime($gey_year_from));
							$range_day_from=date("d",strtotime($gey_year_from));
							$range_year_to=date('Y', strtotime($get_year_to));
							$range_day_to=date("d",strtotime($get_year_to));                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['user_phone_number']; ?></th>
                    <?php for ($i=1; $i <=31 ; $i++) { ?>
					<?php if( ($i>=$range_day_from) && ($i<=$range_day_to)) { ?>
                        <th style="border-left: none;border-right: none;background-color:<?php echo $bg_color; ?>">
							<?php if($i==$range_day_to){ ?>
								<span class="field-tip">
								   <i class="fa fa-eye"></i>
									<span class="tip-content">
									  <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
									  <br>
									  <?php echo $row['remark']; ?>
										
									  </span>
								</span> 
							<?php } ?>
                        </th>
					<?php }else{ ?>
                        <th></th>
					<?php } } ?>
                    </tr>
					<?php } } ?>
					<tr style="background-color:#A4509F; color:white; text-transform:uppercase;">
						<th style="text-align: left;">Tour Guide</th>
						<?php for ($i=1; $i <=31 ; $i++) { ?>                    
						<th></th>
						<?php } ?>
					</tr>
				<?php
					$search_month = @$connect->real_escape_string($_GET['txt_month']);
					$search_year = @$connect->real_escape_string($_GET['txt_year']);
					if($search_month !=""){
						$search_month = @$connect->real_escape_string($_GET['txt_month']);
					}else{
						$search_month ="";
					}
					if($search_year !=""){
						$search_year = @$connect->real_escape_string($_GET['txt_year']);
					}else {
						$search_year ="";
					}
					$query="SELECT tbl_users.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_users
                                ON tbl_schedule_admin.ref_no=tbl_users.user_id
                                WHERE sc_type='T.Quide' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC";
					$result = $connect->query($query);
					if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];
							$customer_name=$row['customer_name'];
                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;
                            // calulate date
							$range_year_from=date('Y', strtotime($gey_year_from));
							$range_day_from=date("d",strtotime($gey_year_from));
							$range_year_to=date('Y', strtotime($get_year_to));
							$range_day_to=date("d",strtotime($get_year_to));                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['user_phone_number']; ?></th>
                    <?php  for ($i=1; $i <=31 ; $i++) { ?>
					<?php if( ($i>=$range_day_from) && ($i<=$range_day_to)) { ?>
					<th  style="border-left:none; border-right:none; background-color:<?php echo $bg_color; ?>">
					<?php if($i==$range_day_to){ ?>
                        <span class="field-tip">
                           <i class="fa fa-eye"></i>
                            <span class="tip-content">
							<?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
							<br>
							<?php echo $row['remark'];?>
                            </span>
                        </span> 
					<?php } ?>
					</th>
					<?php } else {?>
					<th></th>
					<?php } } ?>
                    </tr>
					<?php } } ?>
					
					<!-- RickShaw -->

        <tr style="background-color: #A4509F;color: white;text-transform: uppercase;">
                    <th style="text-align: left;">RICKSHAW</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                    <th></th>
                        <?php } ?>
      </tr>

                 <?php
          $search_month = @$connect->real_escape_string($_GET['txt_month']);
          $search_year = @$connect->real_escape_string($_GET['txt_year']);
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
                     $query="SELECT tbl_rick_shaw_rental_last.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_rick_shaw_rental_last
                                ON 
                                tbl_schedule_admin.ref_no=tbl_rick_shaw_rental_last.ve_id
                                WHERE sc_type='RickShaw' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];
                            $customer_name=$row['customer_name'];

                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;

                            // calulate date

                             $range_year_from=date('Y', strtotime($gey_year_from));
                             $range_day_from=date("d",strtotime($gey_year_from));
                             $range_year_to=date('Y', strtotime($get_year_to));
                             $range_day_to=date("d",strtotime($get_year_to));
                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['ve_ref_no']; ?></th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                    ?>
                      <?php
                       if( ($i>=$range_day_from) && ($i<=$range_day_to)) {
                      ?>
                       <th  style="border-left: none;
    border-right: none;background-color:<?php echo $bg_color; ?>">
                       <?php
                         if($i==$range_day_to){
                       ?>
                        <span class="field-tip">
                           <i class="fa fa-eye"></i>
                            <span class="tip-content">
                              <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
                              <br>
                              <?php
                               echo $row['remark'];
                              ?>
                                
                              </span>
                        </span> 
                      <?php } ?>
                      </th>
                      <?php } else {?>
                        <th>
                        </th>
                      <?php  } ?>
                        <?php } ?>
                    </tr>
                        <?php
                        }
                      }
                    ?>
      <!-- RickShaw -->

        <!-- Accessories -->

        <tr style="background-color: #A4509F;color: white;text-transform: uppercase;">
                    <th style="text-align: left;">Accessories</th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                     
                    ?>
                    
                    <th></th>
                        <?php } ?>
      </tr>

                 <?php
          $search_month = @$connect->real_escape_string($_GET['txt_month']);
          $search_year = @$connect->real_escape_string($_GET['txt_year']);
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
                     $query="SELECT tbl_accessories_rental.*,tbl_schedule_admin.*,
                                    tbl_schedule_admin.to_date as to_date_sc
                                FROM tbl_schedule_admin 
                                INNER JOIN tbl_accessories_rental
                                ON 
                                tbl_schedule_admin.ref_no=tbl_accessories_rental.ac_id
                                WHERE sc_type='Accessories' 
                                AND 
                                (
                                from_date >='$search_month' AND 
                                tbl_schedule_admin.to_date <='$search_year'
                                )
                                 ORDER BY from_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $gey_year_from=$row['from_date'];
                            $get_year_to=$row['to_date_sc'];
                            $bg_color=$row['color_note'];

                            $customer_name=$row['customer_name'];

                            // start date calulate
                            $start_day=date_create($gey_year_from);
                            $end_day=date_create($get_year_to);
                            $day=date_diff($start_day,$end_day);
                            $total_day = $day->format("%a%")+1;

                            // calulate date
                             $range_year_from=date('Y', strtotime($gey_year_from));
                             $range_day_from=date("d",strtotime($gey_year_from));
                             $range_year_to=date('Y', strtotime($get_year_to));
                             $range_day_to=date("d",strtotime($get_year_to));
                             
                    ?>
                    <tr>
                    <th style="font-size:11px;"><?php echo $row['ac_ref_no']; ?></th>
                    <?php
                      for ($i=1; $i <=31 ; $i++) { 
                    ?>
                      <?php
                       if( ($i>=$range_day_from) && ($i<=$range_day_to)) {
                      ?>
                       <th  style="border-left: none;
    border-right: none;background-color:<?php echo $bg_color; ?>">
                       <?php
                         if($i==$range_day_to){
                       ?>
                        <span class="field-tip">
                           <i class="fa fa-eye"></i>
                            <span class="tip-content">
                              <?php echo $customer_name.' '.$total_day.' Day(s)'; ?>
                              <br>
                              <?php
                               echo $row['remark'];
                              ?>
                                
                              </span>
                        </span> 
                      <?php } ?>
                      </th>
                      <?php } else {?>
                        <th>
                        </th>
                      <?php  } ?>
                        <?php } ?>
                    </tr>
                        <?php
                        }
                      }
                    ?>
      <!-- Accessories -->
					
												 
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
