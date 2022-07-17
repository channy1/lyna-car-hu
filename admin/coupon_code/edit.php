<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
	$edit_id = $_GET["edit_id"];
    $query="SELECT * FROM tbl_coupon_code WHERE id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $name =  $row["name"];
            
        }
    }
?>	
<?php
    if(isset($_POST['btn_save'])){
        $txt_date = @$connect->real_escape_string($_POST['txt_date']);	
		$txt_coupon_name = @$connect->real_escape_string($_POST['txt_coupon_name']);	
		$txt_coupon_number = @$connect->real_escape_string($_POST['txt_coupon_number']);	
		$txt_coupon_price = $_POST['txt_coupon_price'];  
		$txt_discount = $_POST['txt_discount'];  
		$txt_deliver_fee = $_POST['txt_deliver_fee'];  
        $query_edit = "UPDATE tbl_coupon_code SET name='$txt_coupon_name',number='$txt_coupon_number',price='$txt_coupon_price',discount='$txt_discount',deliver_fee='$txt_deliver_fee' WHERE id='$edit_id'";
        if($connect->query($query_edit)==TRUE){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted...
            </div>';
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Something Went Wrong ...
            </div>';  
        }
    }
?>
 
 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
		<?= @$sms ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Public Holidays</h1>
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
            
					<?php  
						$edit_id = $_GET["edit_id"]; 
						$query="SELECT * FROM tbl_coupon_code WHERE id='$edit_id'";
						$result = $connect->query($query);
						if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
					?>
                 <form role="form" method="post" enctype="multipart/form-data"  >
               <div class="card-body">
                            <div class="form-group">
                                <label >Name Of Coupon</label>
                                <input type="text" class="form-control" value="<?php echo $row["name"] ?>" name="txt_coupon_name" placeholder="Enter Title"   required >
								
                            </div>
							<div class="form-group">
                                <label >Coupon Number</label>
                                <!--<input type="text" class="form-control" $row["number"] name="txt_coupon_number" required   >-->
								 <select class="form-control" name="txt_coupon_number" id="coupon" >
								  <option value="1" <?php if($row['number']=="1"){echo 'selected';}?>>1</option>
								  <option value="2" <?php if($row['number']=="2"){echo 'selected';}?>>2</option>
								  <option value="3" <?php if($row['number']=="3"){echo 'selected';}?>>3</option>								   
								 </select>
								 
                            </div>
							<div class="form-group">
                                <label >Coupon Price</label>
                                 $ :<input type="text" class="form-control" value="<?php echo  $row["price"];?>" name="txt_coupon_price" placeholder="Enter Price"  required   > 
								
                            </div>
							<div class="form-group">
                                <label >Coupon Discount in %</label>
                                 <input type="text" class="form-control" value="<?php echo  $row["discount"] ;?>" name="txt_discount" placeholder="Enter Price"  required   > 
								
                            </div>
							<div class="form-group">
                                <label >Delivery Fee</label>
                                 <input type="text" class="form-control" value="<?php echo  $row["deliver_fee"] ;?>" name="txt_deliver_fee" placeholder="Enter Price"  required   > 
								
                            </div>
							
                            <div class="form-group date_css">
                                 <label >Date</label>
								<input type="text" class="form-control" name="txt_date" value="<?php echo $row["create_date"]; ?>" required readonly>
                               <!-- <input type="hidden" class="form-control" value="<?php echo date("Y/m/d")?>" name="txt_date" placeholder="Enter Date"   required >-->
                            </div>
                            
                        </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
                   <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
              </form>
			        <? }
    }
?>
           




          
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
<style>
.date_css{
	display:none!important;
}
</style>
</body>
</html>
