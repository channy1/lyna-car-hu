<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

  $v_sql = "SELECT * FROM tbl_pre_info";
    $result = $connect->query($v_sql);

?>
<?php 
   if(isset($_POST["btn_add"])) { 

        $ref_no = @$connect->real_escape_string($_POST['txt_ref_no']);

        if($ref_no =="") {

          $ref_no=0;

        }

        $name_owner = @$connect->real_escape_string($_POST['txt_name_owner']);

        if($name_owner =="") {

          $name_owner=0;

        }

        $customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);

         if($customer_name =="") {

          $customer_name=0;

        }

        $passport = @$connect->real_escape_string($_POST['check_passport']);

         if($passport =="") {

          $passport=0;

        }

        $id_card = @$connect->real_escape_string($_POST['check_id_card']);

        if($id_card =="") {

          $id_card=0;

        }

        $residentail_book = @$connect->real_escape_string($_POST['check_residentail_book']);

         if($residentail_book =="") {

          $residentail_book=0;

        }

        $fuel = @$connect->real_escape_string($_POST['txt_fuel']);

        if($fuel =="") {

          $fuel=0;

        }

        $fuel_full_tank = @$connect->real_escape_string($_POST['txt_fuel_full_tank']);

        if($fuel_full_tank =="") {

          $fuel_full_tank=0;

        }

        $inception_date = @$connect->real_escape_string($_POST['txt_inception_date']);

        $inception_date_format=$inception_date;

        if($inception_date =="") {

          $inception_date_format="0000-01-01";

        }

        if($inception_date  !="") {

          $var =$inception_date;

          $inception_date_format =date("Y-m-d", strtotime($var));

          $inception_date_format;

        }

        $inception_time = @$connect->real_escape_string($_POST['txt_inception_time']);

        if($inception_time =="") {

          $inception_time=0;

        }

        $return_date = @$connect->real_escape_string($_POST['txt_return_date']);

        $return_date_format=$return_date;

         if($return_date =="") {

           $return_date_format="0000-01-01";

        }

        if($return_date  !="") {

          $var =$return_date;

          $return_date_format =date("Y-m-d", strtotime($var));

          $return_date_format;

        }

        $return_time = @$connect->real_escape_string($_POST['txt_return_time']);

        if($return_time =="") {

          $return_time=0;

        }

        $period_day = @$connect->real_escape_string($_POST['txt_period_day']);

        if($period_day =="") {

          $period_day=0;

        }

        $extra_day = @$connect->real_escape_string($_POST['txt_extra_day']);

         if($extra_day =="") {

          $extra_day=0;

        }

        $rate = @$connect->real_escape_string($_POST['txt_rate']);

         if($rate =="") {

          $rate=0;

        }

        $extra_rate = @$connect->real_escape_string($_POST['txt_extra_rate']);

        if($extra_rate =="") {

          $extra_rate=0;

        }

        $total = @$connect->real_escape_string($_POST['txt_total']);

        if($total =="") {

          $total=0;

        }

        $extra_total = @$connect->real_escape_string($_POST['txt_extra_total']);

        if($extra_total =="") {

          $extra_total=0;

        }

        $deposited = @$connect->real_escape_string($_POST['txt_deposited']);

        if($deposited =="") {

          $deposited=0;

        }

        $long_dast = @$connect->real_escape_string($_POST['txt_long_dast']);

        if($long_dast =="") {

          $long_dast=0;

        }

        $amount = @$connect->real_escape_string($_POST['txt_amount']);

        if($amount =="") {

          $amount=0;

        }

        $discount_percent = @$connect->real_escape_string($_POST['txt_discount_percent']);

         if($discount_percent =="") {

          $discount_percent=0;

        }

        $discount_amount = @$connect->real_escape_string($_POST['txt_discount_amount']);

        if($discount_amount =="") {

          $discount_amount=0;

        }

        $vat = @$connect->real_escape_string($_POST['txt_vat']);

         if($vat =="") {

          $vat=0;

        }

         $vat_amount = @$connect->real_escape_string($_POST['txt_vat_amount']);

         if($vat_amount =="") {

          $vat_amount=0;

        }

        $amount_aft_d = @$connect->real_escape_string($_POST['txt_amount_aft_d']);

         if($amount_aft_d =="") {

          $amount_aft_d=0;

        }

        $total_net_pay = @$connect->real_escape_string($_POST['txt_total_net_pay']);

        if($total_net_pay =="") {

          $total_net_pay=0;

        }

        $name_owner_sign = @$connect->real_escape_string($_POST['txt_name_owner_sign']);

        $name_witness = @$connect->real_escape_string($_POST['txt_name_witness']);

        $name_renter = @$connect->real_escape_string($_POST['txt_name_renter']);

        $regular_maintenance = @$connect->real_escape_string($_POST['txt_regular_maintenance']);

        if($regular_maintenance =="") {

          $regular_maintenance=0;

        }

        $unlimited_millage = @$connect->real_escape_string($_POST['txt_unlimited_millage']);

        if($unlimited_millage =="") {

          $unlimited_millage=0;

        }

        $repair = @$connect->real_escape_string($_POST['txt_repair']);

        if($repair =="") {

          $repair=0;

        }

        $insurance = @$connect->real_escape_string($_POST['txt_insurance']);

        if($insurance =="") {

          $insurance=0;

        }

        $articles_from = @$connect->real_escape_string($_POST['txt_articles_from']);

        $articles_to = @$connect->real_escape_string($_POST['txt_articles_to']);

        $no_driver_from = @$connect->real_escape_string($_POST['txt_no_driver_from']);

        $no_driver_to = @$connect->real_escape_string($_POST['txt_no_driver_to']);

        $other_from = @$connect->real_escape_string($_POST['txt_other_from']);

        $other_to = @$connect->real_escape_string($_POST['txt_other_to']);

        $user_agree = @$connect->real_escape_string($_POST['txt_customer_name']);

        $txt_vechicle_no = @$connect->real_escape_string($_POST['txt_vechicle_no']);



         $query_add = "INSERT INTO tbl_agreement(

                    car_id,

                    user_id,

                    ag_ref_no,

                    ag_name_owner,

                    ag_customer_name,

                    ag_passport,

                    ag_id_card,

                    ag_residentail_book,

                    ag_fuel,

                    ag_fuel_full_tank,

                    ag_inception_date,

                    ag_inception_time,

                    ag_return_date,

                    ag_return_time,

                    ag_period_day, 

                    ag_extra_day,

                    ag_rate,

                    ag_extra_rate,

                    ag_total,

                    ag_extra_total,

                    ag_deposited,

                    ag_long_dast,

                    ag_amount,

                    ag_discount_percent,

                    ag_discount_amount,

                    ag_vat,

                    ag_amount_aft_d,

                    ag_total_net_pay,

                    ag_name_owner_sign,

                    ag_name_witness,

                    ag_name_renter,

                    ag_regular_maintenance,

                    ag_unlimited_millage,

                    ag_repair,

                    ag_insurance,

                    ag_articles_from,

                    ag_articles_to,

                    ag_no_driver_from,

                    ag_no_driver_to,

                    ag_other_from,

                    ag_other_to,

                    ag_vat_amount,

                    type_agreement

                    ) VALUES(

                    '$txt_vechicle_no',

                    '$user_agree',

                    '$ref_no',

                    '$name_owner',

                    '$customer_name',

                    '$passport',

                    '$id_card',

                    '$residentail_book',

                    '$fuel',

                    '$fuel_full_tank',

                    '$inception_date_format',

                    '$inception_time',

                    '$return_date_format',

                    '$return_time',

                    '$period_day',

                    '$extra_day',

                    '$rate',

                    '$extra_rate',

                    '$total',

                    '$extra_total',

                    '$deposited',

                    '$long_dast',

                    '$amount',

                    '$discount_percent',

                    '$discount_amount',

                    '$vat',

                    '$amount_aft_d',

                    '$total_net_pay',

                    '$name_owner_sign',

                    '$name_witness',

                    '$name_renter',

                    '$regular_maintenance',

                    '$unlimited_millage',

                    '$repair',

                    '$insurance',

                    '$articles_from',

                    '$articles_to',

                    '$no_driver_from',

                    '$no_driver_to',

                    '$other_from',

                    '$other_to',

                    '$vat_amount',

                    '1'

                    )";

// var_dump($query_add);

            if($connect->query($query_add)){

                $sms = '<div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Successfull!</strong> Data inserted ...

                </div>'; 

            }else{

                $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> '.mysqli_error($connect).'...

                </div>';   

            }









    }

   

    

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CAR RENTAL AGREEMENT CONTROL PANEL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Car Rental Agreement</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
	 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
            
            
            </div>
            <!-- /.card-header -->
            

                 <form role="form" method="post" enctype="multipart/form-data"  >
                <div class="card-body">
                  <div class="form-group">
                    <label >Ref. No.</label>
                     <input class="form-control" readonly id="txt_ref_no_hidden" type="text" name="txt_ref_no" value="<?php echo 'LCRC-'.date("Ymd").''.rand(10,10000); ?>">
                  </div>
                   <div class="form-group">
                    <label >I. Party A(Owner of the Vechicle):</label>
                   <select name="txt_name_owner" class="form-control">
                                <option value="">==All Owner==</option>
                                <?php 
                                  $get_parter_a = $connect->query("SELECT * FROM tbl_owner_list ORDER BY ow_name ASC");
                                  while($row_partner_a = mysqli_fetch_object($get_parter_a)){
                                      if($row_partner_a->ow_id == @$_POST['txt_name_owner']){
                                          echo '<option SELECTED value="'.$row_partner_a->ow_id.'">'.$row_partner_a->ow_name.'</option>';
                                      }else{
                                          echo '<option value="'.$row_partner_a->ow_id.'">'.$row_partner_a->ow_name.'</option>';                                        
                                      }
                                  }

                              ?>                               
                            </select>
                  </div>
				  <div class="form-group">
                    <label >II. Party B(Renter) And requirement</label>                    
                  <select name="txt_customer_name" id="txt_search_agent_customer" class="form-control">
                                <option value="">==Customer ID==</option>
                                <?php 
                                  $get_customer_id = $connect->query("SELECT * FROM tbl_users where user_position !='1' AND  user_first_name !='' OR user_last_name !='')  ");
                                  while($row_customer_id = mysqli_fetch_object($get_customer_id)){
                                      if($row_customer_id->user_id == @$_POST['txt_customer_name']){
                                          echo '<option SELECTED value="'.$row_customer_id->user_id.'">'.$row_customer_id->user_first_name.' '.$row_customer_id->user_last_name.'</option>';
                                      }else{
                                          echo '<option value="'.$row_customer_id->user_id.'">'.$row_customer_id->user_first_name.' '.$row_customer_id->user_last_name.'</option>';                                         
                                      }
                                  }
                              ?>                               
                            </select>
				  <div class="form-group">
				   <input type="text" class="form-control" name="txt_search_agent" id="txt_search_agent" value="" placeholder="Search Customer ">
				  </div>
				  <button class="bg-primary " name="btn_search">Get Agent</button>
				  <div class="form-group"> 
                    <input type="checkbox" name="check_passport" id="Checkbox0" value="1">Original Passport</label>
                  </div>
				  <div class="form-group"> 
                    <input type="checkbox" name="check_id_card" id="Checkbox0" value="1">Original ID Card</label>
                  </div>
				  <div class="form-group"> 
                    <input type="checkbox" name="check_residentail_book" id="Checkbox0" value="1">Residential Book</label>
                  </div>
				  
                  </div>

                   <div class="form-group">
                    <label >Special Notices:</label>
                    <input type="input" class="form-control" name="txt_image"    >
                  </div>  
                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
                   <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
              </form>
           




          
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
  <!--  <section class="content">
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
             <!--<div class="card-body">
			  
              <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Ref No.</th>
                    <th>Image</th>
                    <th>Description</th>
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
                              <td>  <input class="form-control" readonly id="txt_ref_no_hidden" type="text" name="txt_ref_no" value="<?php echo 'LCRC-'.date("Ymd").''.rand(10,10000); ?>"></td>
                               <td> 

<img  width='100px' height='100px' src="<?php echo $img_path; ?>pre_info/<?php echo $images; ?>">
 
                              </td>
                              <td><?php echo $row["pre_detail"]; ?></td>
                              <td><a href="edit.php?edit_id=<?php echo $row['pre_id'];?>" class="btn btn-xs  btn-success">Edit</a>

                              <a href="#" onclick="delete_data('<?php echo $delete_url;?>')"  class="btn btn-xs btn-danger" title="delete">Delete</a>
                            </td>
                            </tr>


                      <?php } } ?>
                 
               </tbody>
                </table>-->
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
    </section>-->
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
