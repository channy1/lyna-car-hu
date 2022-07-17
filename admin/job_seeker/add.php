<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<?php 
   /*  if(isset($_POST['btn_add'])){
            $v_image = @$_FILES['txt_image'];
            // if($v_image["name"] != ""){
            //     $v_photo_name = date("Ymd_Hisa")."_".rand(1111,9999).".png";
            //     copy("tmp_".@$_SESSION['user']->user_id.'.png',"../image/pre_info/".$v_photo_name);
            // }else{
            //     $v_photo_name = "blank.png";
            // }

            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], $inner_directory_path."pre_info/".$new_name);
            }else{
                $new_name = "blank.png";
            }

            $v_title = @$connect->real_escape_string($_POST['txt_title']);
             $v_titlekh = @$connect->real_escape_string($_POST['pre_title_kh']);
            //$v_image = @$connect->real_escape_string($_POST['txt_image']);
            $v_image1 = $new_name;
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']);
            $v_detailkh = @$connect->real_escape_string($_POST['pre_detail_kh']);
            $query_add = "INSERT INTO tbl_pre_info (
                    pre_image,
                     pre_title,
                     pre_title_kh,
                     pre_detail,
                     pre_detail_kh
                    ) 
                VALUES(
                 '$v_image1',
                    '$v_title',
                    '$v_titlekh',
                    '$v_detail',
                     '$v_detailkh')";
            if($connect->query($query_add)){
               $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data Updated ...
                </div>'; 
            }else{
              echo $query_add;
              // print_r($v_image);
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }

            echo $sms;
        //}else{
        //     $sms = '<div class="alert alert-danger">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <strong>Error!</strong> Please Insert Image ...
        //         </div>';
        // }
    }
 */
 ?>



<?php 

    if(isset($_POST['btn_add'])){

            

            $v_title_en = @$connect->real_escape_string($_POST['txt_title_en']);

           

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

           

            $query_add = "INSERT INTO job_announment(

                    ann_title_en,

                    ann_salary,

                    ann_hiring,

                    ann_term,

                    ann_closing_date,

                    post_date,

                    intro_duct,

                    job_des,

                    job_respone,

                    job_re,

                    duty_station,

                    salary_and_benifit,

                    how_apply

                    )

                VALUES(

                    '$v_title_en',

                    

                    '$v_salary',

                    '$v_hiring',

                    '$v_term',

                    '$v_closingdate',

                    '$v_post_date',

                    '$v_intro',

                    '$v_job_des',

                    '$v_job_respone',

                    '$v_job_request',

                    '$v_job_station',

                    '$v_benifit',

                    '$v_apply'





                    )";

            if($connect->query($query_add)){

                $sms = '<div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Successfull!</strong> Data inserted ...

                </div>'; 

            }else{

                $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> Query error ...

                </div>'; 

                echo mysqli_error($connect);  

            }

        //}else{

        //     $sms = '<div class="alert alert-danger">

        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        //         <strong>Error!</strong> Please Insert Image ...

        //         </div>';

        // }

    }



 ?>








            <h1>Create Job Seeker Record</h1>
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
            

                 <form role="#" method="post" enctype="multipart/form-data" >
           <!--     <div class="card-body">
                  <div class="form-group">
                    <label >Title (En):</label>
                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title"   required >
                  </div>

                  <div class="form-group">
                    <label >Title (Kh):</label>
                    <input type="text" class="form-control" name="pre_title_kh" placeholder="Enter Title"   required >
                  </div>
 <div class="form-group">
                    <label >Hiring:</label>
                    <input type="text" class="form-control" name="txt_hiring" value="<?php echo $hiring; ?>"   >
                  </div>

 <div class="form-group">
                  <label >Choose Image:</label>
                    <input type="file" class="form-control" name="txt_image" required   placeholder="Image.jpg"  >
                  </div>
                 
             

               <div class="form-group">
                    <label>Detail (En):</label>
                    <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail" required="required"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Detail (Kh):</label>
                    <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="pre_detail_kh" required="required"></textarea>
                  </div>
 </div> -->
 
 
            <div class="card-body">
                  <div class="form-group">
                    <label >Job Title :</label>
                    <input type="text" class="form-control" name="txt_title_en" value="<?php echo $title; ?>"  required >
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
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_add" class="btn btn-primary">Add</button>
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
