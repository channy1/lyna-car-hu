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
    if(isset($_POST['btn_add'])){
        // $v_image = @$_FILES['txt_image'];
         //if($v_image["name"] != ""){
            //$new_name = date("Ymd")."_".rand(1111,9999)."_".$v_image["name"];
            //move_uploaded_file($v_image["tmp_name"], "../../img/img_news/".$new_name);
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            //$v_description = @$connect->real_escape_string($_POST['txt_description']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            //$v_posted_by = @$_SESSION['user']->user_id;
            $query_add = "INSERT INTO tbl_ft_upcoming (
                    ft_title,
                    ft_detail
                    ) 
                VALUES(
                    '$v_title',
                    '$v_detail')";
            if($connect->query($query_add)){
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
        //}else{
        //     $sms = '<div class="alert alert-danger">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <strong>Error!</strong> Please Insert Image ...
        //         </div>';
        // }
    }

 ?>



<?php 
    if(isset($_POST['btn_add'])){

            $v_image = @$_FILES['txt_image'];

            // if($v_image["name"] != ""){

            //     $v_photo_name = date("Ymd_Hisa")."_".rand(1111,9999).".png";

            //     copy("tmp_".@$_SESSION['user']->user_id.'.png',"../image/pre_info/".$v_photo_name);

            // }else{

            //     $v_photo_name = "blank.png";

            // }



            if($v_image["name"] != ""){

                $new_name = date("Ymd")."_".rand(1111,9999).".png";

                //move_uploaded_file($v_image["tmp_name"], "../image/province/".$new_name);
				move_uploaded_file($v_image["tmp_name"],$inner_directory_path ."province/".$new_name);
				 

            }else{

                $new_name = "blank.png";

            }



            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_titlekh = @$connect->real_escape_string($_POST['txt_title']);

            //$v_image = @$connect->real_escape_string($_POST['txt_image']);

            $v_image1 = $new_name;

            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");

            $query_add = "INSERT INTO tbl_province (
					pv_image,
                    pv_title,
					pv_title_kh  
					) 
			 VALUES(
					 '$v_image1',
                    '$v_title',
                   '$v_titlekh')";

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

            }

        //}else{

        //     $sms = '<div class="alert alert-danger">

        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        //         <strong>Error!</strong> Please Insert Image ...

        //         </div>';

        // }

    }



 ?>



            <h1>Create City Tour Record</h1>
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
            

                 <form role="form" method="post" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label >Title (En)</label>
                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title En"   required >
                  </div>
                  <div class="form-group">
                    <label>Title (Kh)</label>
                     <input type="text" class="form-control" name="txt_title_kh" placeholder="Enter Title Kh"   required >
				  </div>
				  <div class="form-group">
                    <label>Image</label>
                     <input type="file" class="form-control" name="txt_image" placeholder="Enter Title Kh"   required >
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
