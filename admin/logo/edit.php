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
   $edit_id = $_GET["edit_id"]; 
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
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){

        /*$v_image = @$_FILES['txt_image'];

        if($v_image["name"] != ""){
            $new_name = date("Ymd")."_".rand(1111,9999).".png";
            move_uploaded_file($v_image["tmp_name"], "../image/logo/".$new_name);
        }else{
            $new_name = $image;
            //echo "<script> alert ('hello'); </script> ";
        }*/

        // move_uploaded_file($v_image["tmp_name"],$inner_directory_path ."province/".$new_name);

        // if(!empty($_POST["logo_session"])){

            $image_data = $_POST['logo_session'];
            // var_dump(__FILE__);

            $data = $image_data;
            $img = $_POST['logo_session']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $new_name = rand(10,100).time().'.png';
            $file_path = $inner_directory_path."logo/".$new_name;
            file_put_contents($file_path, $data);
           

            // list($type, $data) = explode(';', $data);
            // list(, $data)      = explode(',', $data);
            // $data = base64_decode($data);
            // $new_name = rand(10,100).time().'.png';
            // $path = $inner_directory_path."logo/".$new_name;
            // file_put_contents($path, $data);
            // $image_data = $_FILES['logo_session'];

            // $image_array_1 = explode(";", $image_data);
            // $image_array_2 = explode(",", $image_array_1[1]);
            // $image_data = base64_decode($image_array_2[1]);
            // var_dump($image_data);
        //     //print_r($image_data);

        //     $new_name = rand(10,100).time().'.png';
        //     //$path = '../image/logo/'.$new_name;
        //     $path =$inner_directory_path ."logo/".$new_name;

        //     file_put_contents($path, $image_data);
        //     //exit;

        // }else{
        //     $new_name = "";
        // }

        // $new_name = date("Ymd")."_".rand(1111,9999).".png";
        // move_uploaded_file($image_data["tmp_name"], $inner_directory_path."logo/".$new_name);

        // $img = $_POST['logo_session'];
        // $img = str_replace('data:image/png;base64,', '', $img);
        // $img = str_replace(' ', '+', $img);
        // $data = base64_decode($img);
        // $new_name = rand(10,100).time().'.png';
        // $file = "/Applications/XAMPP/xamppfiles/htdocs/lyna-car/system/admin/image/logo/" . time() . '.png';
        // $success = file_put_contents($file, $data);

        
        $v_title = @$connect->real_escape_string($_POST['txt_title']); 
        $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
        $query_add = "UPDATE tbl_logo SET lg_title='$v_title',lg_image='$new_name',lg_detail='$v_detail' WHERE lg_id='$edit_id'";
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

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_logo WHERE lg_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["lg_title"];
            $image = $row["lg_image"];
            $description = $row["lg_detail"];
        }
    }
    else{}
?>
       





            <h1>Edit Logo</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">

            <div class="card-header"></div>
            <!-- /.card-header -->
          <?php
            //  echo $base = __DIR__ . '/../';
            // echo $_SERVER['DOCUMENT_ROOT'];
          ?>
            <form role="form" method="post" enctype="multipart/form-data"  >
                <div class="card-body">                 
                   <div class="form-group">
                      <label >Logo:</label>
                      <div id="uploaded_image">
              					<img  src="<?php echo $img_path; ?>logo/<?php echo $image; ?>">
                      </div>
                      <input type="file" class="form-control" name="upload_image" id="upload_image">
            					<input type="hidden" name="logo_session" id="logo_session"/>
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


<!------ Image Cropper --------->

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog" style="margin-top:110px">
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
              width:300,
              height:60,
              type:'rectangle' //circle
            },
            boundary:{
              width:350,
              height:100
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
                $('#uploaded_image').html('<img src="'+response+'" class="img-thumbnail" />');
                $('#logo_session').val(response);
            })
        });
    });

</script>

</body>
</html>
