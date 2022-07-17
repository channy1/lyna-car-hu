<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

  $v_sql = "SELECT * FROM tbl_pre_info";
    $result = $connect->query($v_sql);

?>

<?php

    $ch_has=0;

    $v_work_exper="";

    $v_certificate="";

    $v_other_training ="";

    $v_language ="";

    $v_hobby="";

    $v_refer="";

    $user_id=@$_SESSION['user']->user_id;

    $query="SELECT * FROM tbl_cv_information WHERE user_id='$user_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row_up = $result->fetch_assoc()) {

    $ch_has=$row_up['user_id'];

    $v_cv_title=$row_up['cv_title'];

    $v_hight_qualification=$row_up['hight_qualification'];

    $v_last_career_level=$row_up['last_career_level'];

    $v_year_exper=$row_up['year_exper'];

    $v_last_job_function=$row_up['last_job_function'];

    $v_last_salary=$row_up['last_salary'];

    $v_last_position=$row_up['last_position'];

    $v_last_industry=$row_up['last_industry'];

    $v_per_industry=$row_up['per_industry'];

    $v_per_location=$row_up['per_location'];

    $v_per_function=$row_up['per_function'];

    $v_per_position=$row_up['per_position'];

    $v_expect_salary=$row_up['expect_salary'];

    $v_term_of_work=$row_up['term_of_work'];

    $v_available_work=$row_up['available_work'];

    $v_language=$row_up['language'];

    $v_work_exper=$row_up['work_exper'];

    $v_other_training=$row_up['other_training'];

    $v_hobby=$row_up['hobby'];

    $v_refer=$row_up['refer'];

    $v_certificate=$row_up['certificate'];

?>

<?php

    }

  }

?>
<?php 

 $province_id=trim(@$_SESSION['user']->province_id);

 $query="SELECT * FROM tbl_province WHERE pv_id='$province_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      $pro_name=$row['pv_title'];

    }}

// 

?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>RESUME/CURRICULUM VITAE CONTROL PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">RESUME/CURRICULUM VITAE</li>
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
	 <div class="container">
	 <div><h2 class="text-center bg-secondary p-1 ">CURRICULUM VITAE</h2></div>
  <div class="row border shadow p-1 bg-info text-dark">
     
    <div class="col-sm-9  ">
       <h4 class="text-dark"><?php echo trim(@$_SESSION['user']->user_first_name) ?> <?php echo trim(@$_SESSION['user']->user_last_name) ?></h4>
	   <div class="text-dark  p-1  "><label class="text-">Address :</label>  <?php echo trim(@$_SESSION['user']->user_address) ?> </div>
	   <div class=" text-dark p-1  "><label>E-mail :  </label>  <?php echo trim(@$_SESSION['user']->user_email) ?> </div>
	   <div class="text-dark     p-1  "><label>Tel :   </label>   <?php echo trim(@$_SESSION['user']->user_phone_number) ?></div>
	 
    </div>
    <div class="col-sm-3 float-right pl-">
      <img src="http://choicecart.xyz/carrental/system/img/img_customer/<?php echo @$_SESSION['user']->user_photo; ?>" 
	  width="100px" height="130px" highytalt="Profile Photo">
       
    </div>
	<table class="table table-success text-dark">
  <thead class="thead-light">     
  </thead>
  <tbody>
    <tr>
      <th scope="row">PERSONAL DATA</th> 
    </tr>
	<tr>
	<th scope="row">SEX :</th>
	<td><?php echo trim(@$_SESSION['user']->user_gender) ?></td>
	</tr>
	<tr>
	<th scope="row">Phone :</th>
	<td><?php echo trim(@$_SESSION['user']->user_phone_number) ?></td>
	</tr>
	<tr>
	<th scope="row">E-mail : </th>
	<td><?php echo trim(@$_SESSION['user']->user_email) ?></td>
	</tr>
	<tr>
	<th scope="row">Date of Birth : </th>
	<td><?php echo trim(@$_SESSION['user']->user_birthday) ?></td>
	</tr> 
	<tr>
	<th scope="row">E-mail :</th>
	<td><?php echo trim(@$_SESSION['user']->user_email) ?></td>
	</tr> 
	<tr>
	<th scope="row">Place of Birth :</th>
	<td><?php echo $pro_name;  ?></td>
	</tr> 
	<tr>
	<th scope="row">EDUCATION BACKGROUND :</th>
	<?php

                             $id=@$_SESSION['user']->user_id;

                             $v_sql = "SELECT * FROM tbl_cv_education where user_id='$id' ";

                             $result = $connect->query($v_sql);

                              if ($result->num_rows > 0) {

                                while($row = $result->fetch_assoc()) {

                                  $qualification=$row['qualification'];

                          ?>
	<td><?php echo $row['from_cv']; ?> - <?php echo $row['to_cv']; ?> : <?php if($qualification=="1") {

                              echo "Primary School";

                             }

                             elseif ($qualification=="2") {

                              echo "Secondary School";

                             }

                             elseif ($qualification=="3") {

                              echo "High School";

                             }

                             elseif ($qualification=="4") {

                              echo "Associate";

                             }

                             elseif ($qualification=="5") {

                              echo "Bachelor";

                             }

                             elseif ($qualification=="6") {

                              echo "Master";

                             }

                             elseif ($qualification=="7") {

                              echo "Doctorate";

                             }

                             elseif ($qualification=="8") {

                              echo "Other";

                             } ?> <?php echo $row['description']; ?> 
							 <?php echo $row['school_university']; ?> </td>
	<?php  
	}  } 
	?>
	 
	</tr> 
	<tr>
	<th scope="row">WORK EXPERIENCE :</th>
	<td><?php echo $v_work_exper; ?></td>
	</tr> 
	<tr>
	<th scope="row">CERTIFICATES :</th>
	<td><?php echo $v_certificate; ?></td>
	</tr>
	<tr>
	<th scope="row">OTHER TRAINING SKILLS :</th>
	<td><?php echo $v_other_training; ?></td>
	</tr>
	<tr>
	<th scope="row">LANGUAGES :</th>
	<td><?php echo $v_language; ?></td>
	</tr>
	<tr>
	<th scope="row">HOBBIES AND INTEREST :</th>
	<td><?php echo $v_hobby; ?></td>
	</tr> <tr>
	<th scope="row">REFERENCES :</th>
	<td><?php echo $v_refer; ?></td>
	</tr> 
  </tbody>
</table>
  </div>
</div>
	
	 
	 
              </div>
              <!-- /.card-header -->
             
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
