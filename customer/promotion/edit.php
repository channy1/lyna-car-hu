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
    /* $edit_id = $_GET["edit_id"]; 
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

    $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_promotion WHERE id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$id = $row["id"];
			$image=$row["images"];
			$e_promotion = $row["promotion"];
			$e_promotion_kh = $row["promotion_kh"];
			$redirect_url= $row["redirect_url"];
        }
    }
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
    
    if(isset($_POST['btn_save'])){			
			
			 if(!empty($_POST['logo_session'])){
            $image_data = $_POST['logo_session'];
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $image_data = base64_decode($image_array_2[1]);

            $new_name = rand(10,100).time().'.png';
            $path = $inner_directory_path.'promotion/'.$new_name;
            file_put_contents($path, $image_data);
        }else{
            $new_name = "";
        }
            
        $redirect_url = @$connect->real_escape_string($_POST['redirect_url']);
        $txt_promotion = @$connect->real_escape_string($_POST['txt_promotion']);
        $txt_promotion_kh = @$connect->real_escape_string($_POST['txt_promotion_kh']);

        if(!empty($_POST['logo_session'])){
            $query_add = "UPDATE tbl_promotion SET 
            redirect_url ='$redirect_url',
            promotion = '$txt_promotion',
            promotion_kh='$txt_promotion_kh',
            images='$new_name'
            WHERE id='$edit_id'";
			  }else{
            $query_add = "UPDATE tbl_promotion SET 
            redirect_url ='$redirect_url',
            promotion = '$txt_promotion',
            promotion_kh='$txt_promotion_kh'
            WHERE id='$edit_id'";
        }


        if($connect->query($query_add)==TRUE){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted...
            </div>';
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> '.mysqli_error($connect).' ...
            </div>';   
        }
    }

?>


<script>  
    $(function(){
		    $("#datepicker").datepicker();
	  });
	
	
    $(document).ready(function(){
		    $('#timepicker').timepicker({});
	  });
</script>
    




<h1>Edit Promotion</h1>
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
                    <label >Redirect Url</label>
                    <input type="text" class="form-control" name="redirect_url"value="<?php echo ($redirect_url); ?>"  required >
                  </div>                  

                  <div class="form-group">
                      <label >Image:</label>
                      <div id="uploaded_image">
					               <img style="height:50px; width:50px;" src="<?php echo $img_path.'promotion/'. $image?>"> 
                      </div>
                    
                      <input type="file" name="upload_image" id="upload_image" />
                      <input type="hidden" name="logo_session" id="logo_session" />
                  </div>

				        <div class="form-group">
                    <label >Promotion (En)</label>
                    <input type="text" class="form-control" name="txt_promotion" value="<?php echo $e_promotion; ?>"   >
                  </div>
				        
                <div class="form-group">
                    <label >Promotion (kh)</label>
                    <input type="text" class="form-control" name="txt_promotion_kh" value="<?php echo $e_promotion_kh; ?>"   >
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


<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/croppie.css">
<script src="<?php echo $base_url; ?>assets/js/croppie.js"></script>


<script>  

    $(document).ready(function(){
        $image_crop1 = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:800,
              height:500,
              type:'rectangle' //circle
            },
            boundary:{
              width:850,
              height:510
            }
        });


        $('#upload_image').on('change', function(){

            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop1.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery1 bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });


        $('.crop_image').click(function(event){
            $image_crop1.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $('#logo_path_button').css("display","none");
                $('#slogo_path').css("display","none");
                $('#uploaded_image').html('<img src="'+response+'" class="img-thumbnail" style="width:200px; height:200px; border:1px solid black; border-radius:5px !important ;"/>');
                $('#logo_session').val(response);
            })
        });
    });

</script>


<!------ Image Cropper --------->

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-main btn-green crop_image" data-dismiss="modal">Crop</button>
                <button type="button" class="btn btn-main btn-muted" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<style>
    @media (min-width: 992px){
.modal-lg, .modal-xl {
    max-width: 900px;
}
}
</style>
</body>
</html>
