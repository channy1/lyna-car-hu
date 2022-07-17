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

    $query="SELECT * FROM tbl_our_customer WHERE ou_id='$edit_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

            $title = $row["ou_title"]; 
            $image = $row["ou_image"];
			 $url = $row["url"];
			 $description = $row["ou_detail"];

        }

    }

    else{}

?>
 



<?php 

    

    if(isset($_POST['btn_save'])){

            $v_image = @$_FILES['txt_image'];

            if($v_image["name"] != ""){

                $new_name = date("Ymd")."_".rand(1111,9999).".png";

                //move_uploaded_file($v_image["tmp_name"], "../image/our_customer/".$new_name);
				move_uploaded_file($v_image["tmp_name"],$inner_directory_path ."our_customer/".$new_name);

            }else{

                $new_name = $image;

                //echo "<script> alert ('hello'); </script> ";

            }

            

            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            $v_url = @$connect->real_escape_string($_POST['txt_url']);

            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");

            $query_add = "UPDATE tbl_our_customer SET ou_title='$v_title',ou_image='$new_name',ou_detail='$v_detail',

            url='$v_url' WHERE ou_id='$edit_id'";

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


            <h1>EDIT OUR CUSTOMER  </h1>
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
                    <label >Title:</label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $title; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Url link </label>
                    <input type="text" class="form-control" name="txt_url" value="<?php echo $url; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Image:</label>
					 <img style="height:50px; width:50px;" src="<?php  echo $img_path.'our_customer/'.$image;?>">
                    <input type="file" class="form-control" name="txt_image" value="<?php echo $image; ?>" >
                  </div>
				  <div class="form-group">
                    <label >Detail:</label>
					  
                    <textarea style="height: 290px;" type="text" class="form-control" id="detail" name="txt_detail" value="<?php echo $description; ?>"  required ></textarea>
                  </div>
             
 

                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
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



<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>

<script type="text/javascript">

    CKEDITOR.replace( 'detail', {

        language: 'en',

      height: '200'

        // uiColor: '#9AB8F3'

    });

</script>

<style type="text/css">

    b,span{

        color: #800080;

        font-weight: 90012

    }

</style>


</body>
</html>
