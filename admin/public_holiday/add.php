<?php
    require_once '../../system/config/database.php';
    require '../config.php'; 
    require '../editor_header.php'; 
    require '../sidebar.php';
    ?>
<!-- Content Wrapper. Contains page content -->
<?php 
	/*   if(isset($_POST['btn_add'])){
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
<?php if(isset($_POST['btn_add'])){
	$txt_date = @$connect->real_escape_string($_POST['txt_date']);	
	$txt_order_number = @$connect->real_escape_string($_POST['txt_order_number']);	
	$txt_description = $_POST['txt_description']; 	
	$query_add = "INSERT INTO tbl_holiday (date_public,order_number,description) VALUES('$txt_date','$txt_order_number','$txt_description')";	
	if($connect->query($query_add)){	
		$sms = '<div class="alert alert-success">	
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>	
			<strong>Successfull!</strong> Data inserted ...	
		</div>'; 	
	}else{	
		$sms = '<div class="alert alert-danger">	
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>	
			<strong>Error!</strong> Something Went Wrong ...	
		</div>';   
	}	
}
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
			<?= @$sms ?>
            <div class="row mb-2">
                <div class="col-sm-6">                    
                    <h1>Create Public Holiday Record</h1>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
                        <div class="card-body">
                            <div class="form-group">
                                <label >Name Of Holiday</label>
                                <input type="text" class="form-control" name="txt_description" placeholder="Enter Title"   required >
                            </div>
                            <div class="form-group">
                                <label >Date</label>
                                <input type="date" class="form-control" name="txt_date" placeholder="Enter Date"   required >
                            </div>
                            <div class="form-group">
                                <label >Order Number</label>
                                <input type="text" class="form-control" name="txt_order_number" required   >
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