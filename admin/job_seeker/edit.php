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
/*    $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_pre_info WHERE pre_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["pre_title"];
            $title_kh = $row["pre_title_kh"];
            $image = $row["pre_image"];
            $description = $row["pre_detail"];
            $description = $row["pre_detail_kh"];
        }
    }
    else{} */
?>

<?php 
 /*    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], $inner_directory_path."pre_info/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_title_kh = @$connect->real_escape_string($_POST['txt_title_kh']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            $v_detail_kh = @$connect->real_escape_string($_POST['txt_detail_kh']." ");
            $query_add = "UPDATE tbl_pre_info SET pre_title='$v_title',pre_title_kh='$v_title_kh',pre_image='$new_name',pre_detail='$v_detail',pre_detail_kh='$v_detail_kh' WHERE pre_id='$edit_id'";
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
 */
 ?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_pre_info WHERE pre_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["pre_title"];
            $title_kh = $row["pre_title_kh"];
            $image = $row["pre_image"];
            $description = $row["pre_detail"];
            $description_kh = $row["pre_detail_kh"];
        }
    }
    else{}
?>
  

<?php 

    

    if(isset($_POST['btn_save'])){

            

            

            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            $v_salary = @$connect->real_escape_string($_POST['txt_salary']);

            $v_hiring = @$connect->real_escape_string($_POST['txt_hiring']);

            $v_term = @$connect->real_escape_string($_POST['txt_term']);

            $v_closingdate = @$connect->real_escape_string($_POST['txt_closingdate']." ");



            $v_intro = @$connect->real_escape_string($_POST['txt_introduct']);

            $v_job_des = @$connect->real_escape_string($_POST['txt_description']);

            $v_job_respone = @$connect->real_escape_string($_POST['txt_respone']);

            $v_job_request = @$connect->real_escape_string($_POST['txt_request']." ");

            $v_job_station = @$connect->real_escape_string($_POST['txt_jon_station']);

            $v_benifit = @$connect->real_escape_string($_POST['txt_benifit']);

            $v_apply = @$connect->real_escape_string($_POST['txt_apply']);

            $v_post_date = @$connect->real_escape_string($_POST['txt_postdate']);





            $query_add = "UPDATE job_announment 

            SET ann_title_en='$v_title',

                ann_salary ='$v_salary',

                ann_hiring ='$v_hiring',

                ann_term='$v_term', 

                ann_closing_date='$v_closingdate',

                post_date='$v_post_date',

                intro_duct='$v_intro',

                job_des='$v_job_des',

                job_respone='$v_job_respone',

                job_re='$v_job_request',

                duty_station='$v_job_station',

                salary_and_benifit='$v_benifit',

                how_apply='$v_apply'

            WHERE ann_id='$edit_id'";

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

<!-- select query -->
 
<?php

   $edit_id = $_GET["edit_id"]; 

    $query="SELECT * FROM job_announment WHERE ann_id='$edit_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){

            $title = $row["ann_title_en"];

            $salary = $row["ann_salary"];

            $hiring = $row["ann_hiring"];

            $term = $row["ann_term"];

            $closing = $row["ann_closing_date"];



            $intro=$row["intro_duct"];

            $post_date=$row["post_date"];

            $job_respone=$row["job_respone"];

            $job_request=$row["job_re"];

            $job_des=$row["job_des"];

            $job_station=$row["duty_station"];

            $salary_and_benifit=$row["salary_and_benifit"];

            $how_apply=$row["how_apply"];

        

        }

    }

    else{}

?>    





            <h1>Edit Job Seekers</h1>
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
                    <label >Title:</label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $title; ?>"  required >
                  </div>
                   <div class="form-group">
                    <label >Salary:</label>
                    <input type="text" class="form-control" name="txt_salary" value="<?php echo $salary; ?>"   >
                  </div>

                    <div class="form-group">
                    <label >Hiring:</label>
                    <input type="text" class="form-control" name="txt_hiring" value="<?php echo $hiring; ?>"   >
                  </div>
				   <div class="form-group">
                    <label >Term:</label>
                    <input type="text" class="form-control" name="txt_term" value="<?php echo $term; ?>"   >
                  </div>

               <div class="form-group">
                    <label>Introduction:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_introduct"><?php echo $intro; ?></textarea>
                  </div>

                <div class="form-group">
                    <label>Job Description:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_description"><?php echo $job_des; ?></textarea>
                  </div>

                <div class="form-group">
                    <label>Job Responsibilities:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_respone"><?php echo $job_respone; ?></textarea>
                  </div>
            <div class="form-group">
                    <label>Job Requirements:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_request"><?php echo $job_request; ?></textarea>
                  </div>
		   
		     <div class="form-group">
                    <label>Duty Station:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_jon_station"><?php echo $job_station; ?></textarea>
                  </div>
				  
				    <div class="form-group">
                    <label>Salary and Benifit:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_benifit"><?php echo $salary_and_benifit; ?></textarea>
                  </div>
				  
				  <div class="form-group">
                    <label>How To Apply:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_apply"><?php echo $how_apply; ?></textarea>
                  </div> 
				                   <div class="form-group">
                    <label >Post Date:</label>
                    <input type="text" class="form-control" name="txt_postdate" value="<?php echo $post_date; ?>"  required >
                  </div>
                   <div class="form-group">
                    <label >Closing Date:</label>
                    <input type="text" class="form-control" name="txt_closingdate" value="<?php echo $closing; ?>"   >
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
