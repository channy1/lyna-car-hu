<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';

$services= @$_GET['services'];
	if($services=="")
	{
		$services= 1; 
	}
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
    $query="SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON 
					tbl_package_detail.package_id=tbl_posting_package.id where tbl_posting_package.group_id=".$services." and tbl_package_detail.p_id='$edit_id'";

   $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
       $package_id=$row['package_id'];
	    $member_type=$row['member_type'];
		$qty_posting=$row['qty_posting'];
       $trial=$row['trial'];
       $period=$row['period'];
       $qty=$row['qty'];
       $price=$row['price'];
       $discount=$row['discount'];
       $package_disc =$row['package_disc'];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_add'])){
         
            
            $package_id = @$connect->real_escape_string($_POST['package_id']);
			 $member_type = @$connect->real_escape_string($_POST['member_type']);
			   $qty_posting = @$connect->real_escape_string($_POST['qty_posting']);
            $trial = @$connect->real_escape_string($_POST['trial']);
            $period = @$connect->real_escape_string($_POST['period']);
            $qty = @$connect->real_escape_string($_POST['qty']);
            $price = @$connect->real_escape_string($_POST['price']);
			$total = $qty*$price;
            $discount = @$connect->real_escape_string($_POST['discount']);
            $mydescount = $total*$discount/100;
			$net_pay= $total-$mydescount; 
            $date = time();
            $package_disc = @$connect->real_escape_string($_POST['package_disc']);  
            $query_add = "UPDATE tbl_package_detail SET 
            package_id='$package_id',
			member_type='$member_type',
			qty_posting='$qty_posting',
            trial='$trial',
            period='$period',
            qty='$qty',
			 price='$price',
			  total='$total',
			   discount='$discount',
			    net_pay='$net_pay',				
            package_disc='$package_disc'
            WHERE p_id='$edit_id'";
			
            if($connect->query($query_add)==TRUE){
				header("Location: index.php?services=".$services);
				//echo 'hello'; die; 
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error '.mysqli_error($connect).'...
                </div>';   
            }
    }

 ?>  





            <h1>Edit Car Owner Posting Package</h1>
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
                    <label >Packages Name</label>
                  <select name="package_id" class="form-control" required>
									<option value="">Please select</option>
									<?php   $v_sql2 = "SELECT *  FROM tbl_posting_package where group_id=".$services;
                        $result2 = $connect->query($v_sql2);
                      
                        if ($result2->num_rows > 0) {                              $i=1;
                             
                            while($row2 = $result2->fetch_assoc()){ ?>
                                        <option value="<?php echo $row2['id']; ?>"  <?php if($row2['id']== $package_id) { echo "selected='selected'";  } ?>><?php echo $row2['package_name']; ?></option>
						<?php } } ?>
                                        
                                    </select>
                  </div>
                   <div class="form-group">
                    <label >Membership Type</label>
                  <select name="member_type" class="form-control" required>
									<option value="">Please select</option>
									
                                        <option value="1"  <?php if($member_type== 1) { echo "selected='selected'";  } ?>>SILVER</option>
										<option value="2" <?php if($member_type== 2) { echo "selected='selected'";  } ?>>PLATINUM</option>
										<option value="3" <?php if($member_type== 3) { echo "selected='selected'";  } ?>>GOLD</option>
										<option value="4" <?php if($member_type== 4) { echo "selected='selected'";  } ?>>DIAMOND</option>
						                <option value="0" <?php if($member_type== 0) { echo "selected='selected'";  } ?>>NO NEED</option>
                                        
                                    </select>
                  </div>

                   <div class="form-group">
                    <label >QTY POSTING</label>
                     <input type="text" class="form-control" name="qty_posting"  value="<?=$qty_posting?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                  </div>
				  <div class="form-group">
                    <label >Trial</label>
                     <input type="text" class="form-control" name="trial"  value="<?=$trial?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                  </div> 
				  <div class="form-group">
                    <label >Qty</label>
                     <input type="text" class="form-control" name="qty"  value="<?=$qty?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                  </div> 
				  <div class="form-group">
                    <label >Period</label>
                     <input type="text" class="form-control" name="period"  value="<?=$period?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                  </div>
				  <div class="form-group">
                    <label >Price</label>
                     <input type="text" class="form-control" name="price"  value="<?=$price?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                  </div>
				  <div class="form-group">
                    <label >Discount</label>
                     <input type="text" class="form-control" name="discount"  value="<?=$discount?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                  </div>
              

 <div class="form-group">
                    <label>Description:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="package_disc"><?=$package_disc?></textarea>
						  
                  </div>

                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_add" class="btn btn-primary">Update</button>
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
