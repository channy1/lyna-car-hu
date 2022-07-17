<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';


     $edit_id = $_GET["edit_id"];
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

       <?php 
       if(isset($_POST['btn_save'])){
            $section_data = @$connect->real_escape_string($_POST['section_data']);
           
            $query_add = "UPDATE tbl_website_info SET section_data='$section_data' WHERE id='$edit_id'";
            if($connect->query($query_add)==TRUE){
        
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data Updated ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }

            echo $sms;
    }






  $query="SELECT * FROM tbl_website_info WHERE id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $section_name = $row["section_name"];
            $section_data = $row["section_data"];
            
        }
    }

    ?>

<?php

   $edit_id = $_GET["edit_id"]; 

    $query="SELECT * FROM tbl_province WHERE pv_id='$edit_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

            $title = $row["pv_title"];

            $title_kh = $row["pv_title_kh"];

            $image = $row["pv_image"];

        }

    }

    else{}

?>
<?php 
    

    if(isset($_POST['btn_save'])){

            $v_image = @$_FILES['txt_image'];

            if($v_image["name"] != ""){

                $new_name = date("Ymd")."_".rand(1111,9999).".png";

                move_uploaded_file($v_image["tmp_name"],$inner_directory_path ."province/".$new_name);

            }else{

                $new_name = $image;

                //echo "<script> alert ('hello'); </script> ";

            }

            

            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            $v_title_kh = @$connect->real_escape_string($_POST['txt_title_kh']);

            $query_add = "UPDATE tbl_province SET pv_title='$v_title',pv_title_kh='$v_title_kh',pv_image='$new_name' WHERE pv_id='$edit_id'";

            if($connect->query($query_add)==TRUE){

                $sms = '<div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Successfull!</strong> Data inserted...

                </div>';

            }else{

                $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> Query error ...

                </div>';   

            }

    }



 ?>



            <h1>Create Airport Transfer Record</h1>
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
            

                 <form role="form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Vehical Ref. No.</label>
                    <select class="form-control" name="txt_vehicle" id="vehicle">
                                <?php
                                  $v_sql = "SELECT * FROM tbl_vehicle_rantal";
                                  $result = $connect->query($v_sql);
                                   if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['ve_id']; ?>"><?php echo $row['ve_ref_no']; ?></option>
                              <?php }}?>                     

                    </select>
                  </div>
				  <div class="form-group">
                    <label >Year</label>
                    <input type="text" class="form-control" name="txt_year" value="<?php echo $title; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Tax & VAT</label>
                    <input type="text" class="form-control" name="txt_tax_vat" value="<?php echo $title; ?>"  required >
                  </div> 
				  <div class="form-group">
                    <label >Make</label>
                    <input type="text" class="form-control" name="txt_make" value="<?php echo $title; ?>"  required >
                  </div>
				   <div class="form-group">
                    <label >Seat</label>
                    <input type="text" class="form-control" name="txt_no_of_seat" value="<?php echo $title; ?>"  required >
                  </div> 
				  <div class="form-group">
                    <label >Model</label>
                    <input type="text" class="form-control" name="txt_model" value="<?php echo $title; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Vehicle Sub Model</label>
                    <input type="text" class="form-control" name="txt_sub_model" value="<?php echo $sub_model ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Status</label>
                    <input type="text" class="form-control" name="txt_status" value="<?php echo $status ;?>"  required >
                </div>
				<div class="form-group">
                    <label >Vehicle Type</label>
                    <input type="text" class="form-control" name="txt_vehical_type" value="<?php echo $ve_type ;?>"  required >
                </div>
				<div class="form-group">
                    <label>Image</label>
					 
					<input  class="form-control" type="file" name="txt_image" value="<?php echo $image;?>"></input>
                     
                </div>
				   
             
 

                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Add New</button>
                </div>
              </form>
           




          
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require '../footer.php'; ?>

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
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url; ?>admin/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo $base_url; ?>admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
