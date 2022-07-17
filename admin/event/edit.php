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
    $query="SELECT * FROM tbl_event_promotion WHERE e_pro_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$e_pro_id = $row["e_pro_id"];
			$e_title = $row["title"];
			$e_title_kh = $row["title_kh"];
			$image=$row["images"];
			$e_description = $row["description"];
			$e_description_kh = $row["description_kh"];
			$e_type= $row["event_type"];
			$event_date = $row["event_date"];
			$event_time= $row["event_time"];
			$event_location = $row["event_location"];
			$event_ticket= $row["event_ticket"];
        }
    }
?>

<?php 
    
if(isset($_POST['btn_save'])){
    
    if(!empty($_POST['logo_session'])){
        $image_data = $_POST['logo_session'];
        $image_array_1 = explode(";", $image_data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $image_data = base64_decode($image_array_2[1]);
        $new_name = rand(10,100).time().'.png';
        $path = $inner_directory_path ."img_event_promotion/".$new_name;
        file_put_contents($path, $image_data); 
    }else{
        $new_name = "";
    }
  
    $txt_title = @$connect->real_escape_string($_POST['txt_title']);
    $txt_title_kh = @$connect->real_escape_string($_POST['txt_title_kh']);
    $txt_description = @$connect->real_escape_string($_POST['txt_description']);
    $txt_description_kh = @$connect->real_escape_string($_POST['txt_description_kh']);
    $txt_event_type = @$connect->real_escape_string($_POST['txt_event_type']);
    $event_date = @$connect->real_escape_string($_POST['event_date']);
    $event_time = @$connect->real_escape_string($_POST['event_time']);
    $event_location = @$connect->real_escape_string($_POST['event_location']);
    $event_ticket = @$connect->real_escape_string($_POST['event_ticket']);

   
     if(!empty($_POST['logo_session'])){
          $query_add = "UPDATE tbl_event_promotion SET 
          title ='$txt_title',
          description = '$txt_description',
          event_type = '$txt_event_type',
          event_date = '$event_date',
          event_time = '$event_time',
          event_ticket = '$event_ticket',
          event_location ='$event_location',
          images='$new_name',description_kh='$txt_description_kh',title_kh='$txt_title_kh '
          WHERE e_pro_id='$edit_id'";
  	 }else{
  		  $query_add = "UPDATE tbl_event_promotion SET 
            title ='$txt_title',
            description = '$txt_description',
            event_type = '$txt_event_type',
            event_date = '$event_date',
            event_time = '$event_time',
            event_ticket = '$event_ticket',
            event_location ='$event_location',
            description_kh='$txt_description_kh',title_kh='$txt_title_kh '
            WHERE e_pro_id='$edit_id'";
  	}

    if($connect->query($query_add)==TRUE){
        $sms = '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Successfull!</strong> Data Update...
        </div>';
    }else{
        $sms = '<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Error!</strong> Query error ...
        </div>';   
    }
} ?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_event_promotion WHERE e_pro_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $e_pro_id = $row["e_pro_id"];
      $e_title = $row["title"];
      $e_title_kh = $row["title_kh"];
      $image=$row["images"];
      $e_description = $row["description"];
      $e_description_kh = $row["description_kh"];
      $e_type= $row["event_type"];
      $event_date = $row["event_date"];
      $event_time= $row["event_time"];
      $event_location = $row["event_location"];
      $event_ticket= $row["event_ticket"];
        }
    }
?>


  
      <h1>Edit Event</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?= @$sms ?>

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
                    <label >Title (En)</label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $e_title; ?>"  required >
                  </div>
                   <div class="form-group">
                    <label >Title(Kh)</label>
                    <input type="text" class="form-control" name="txt_title_kh" value="<?php echo $e_title_kh; ?>"   >
                  </div> 
				  <div class="form-group">
                    <label >Event Type</label>
                    <select name="txt_event_type" class="form-control" required="" style=" background-color: white;">
                                        <option value="">Select event</option>
                                        <option <?php if($e_type=="1") {echo "selected='selected'";} else {echo "";} ?> value="1">UPCOMING EVENTS</option> 
                                        <option <?php if($e_type=="2") {echo "selected='selected'";} else {echo "";} ?> value="2">PAST EVENTS</option>
                                        <option <?php if($e_type=="3") {echo "selected='selected'";} else {echo "";} ?> value="3">SUBMIT A TALK IDEA</option>
                                        
                                    </select>
                  </div>

                   <div class="form-group">
                    <label >Event Date </label>
                    <input type="text" class="form-control" id="datepicker" name="event_date" value="<?php echo ($event_date); ?>"   >
                  </div>
				  <div class="form-group">
                    <label >Event Time </label>
                    <input type="text" class="form-control" id="datepicker" name="event_time" value="<?php echo ($event_time); ?>"   >
                  </div>
				  <div class="form-group">
                    <label >Event Ticket </label>
                    <input type="text" class="form-control" id="datepicker" name="event_ticket" value="<?php echo ($event_ticket); ?>"   >
                  </div> 
				  <div class="form-group">
                    <label >Event Location </label>
                    <input type="text" class="form-control" id="datepicker" name="event_location" value="<?php echo ($event_location); ?>"   >
                  </div>
				  <div class="form-group">
                    <label >Image:</label>
                      <div id="uploaded_image">
                          <img src="<?php echo $img_path; ?>img_event_promotion/<?php echo $image; ?>"> 
                      </div> 
					            <!---<input type="file" class="form-control" name="txt_image">--->
                      <input type="file" name="upload_image" id="upload_image" />
                      <input type="hidden" name="logo_session" id="logo_session" />
                  </div>
             

               <div class="form-group">
                    <label>Description:</label>
                    <textarea class="textarea"  placeholder="" value="<?php echo ($e_title); ?>"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" autocomplete="off"  name="txt_description"><?php echo $description; ?></textarea>
                  </div>

 <div class="form-group">
                    <label>Description:</label>
                    <textarea class="textarea"  placeholder="" value="<?php echo ($e_title_kh); ?>"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" autocomplete="off"  name="txt_description_kh"><?php echo $description_kh; ?></textarea>
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
              width:400,
              height:110,
              type:'rectangle' //circle
            },
            boundary:{
              width:550,
              height:110
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
                $('#uploaded_image').html('<img src="'+response+'" class="img-thumbnail"/>');
                $('#logo_session').val(response);
            })
        });
    });

</script>


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




</body>
</html>
