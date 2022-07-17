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
          
            	
            
            $group_id = @$connect->real_escape_string($_POST['group_id']);
			 $membership_name = @$connect->real_escape_string($_POST['membership_name']);
            $trial = @$connect->real_escape_string($_POST['trial']);
            $period = @$connect->real_escape_string($_POST['period']);          
            $price = @$connect->real_escape_string($_POST['price']);			
            $discount = @$connect->real_escape_string($_POST['discount']);
            $mydescount = $price*$discount/100;
			$net_pay= $price-$mydescount; 
            $date = time();
            $membership_description = @$connect->real_escape_string($_POST['membership_description']);           
            $query_add = "INSERT INTO  tbl_memberships (
                    group_id,
					membership_name,
                    trial,
                    period,                   
                    `price`,                    
					`discount`,
                    `net_pay`,
                    membership_description,
                    date                   
                    ) 
                VALUES(
                    '$group_id',
					'$membership_name',
                    '$trial',
                    '$period',                    
                    '$price',                   
                    '$discount',
                    '$net_pay',
                    '$membership_description',
                    '$date')";
					
					//echo $query_add ; die; 
            if($connect->query($query_add)){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> '.mysqli_error($connect).'...
                </div>';   
            }
    }

 ?>







            <h1>Create Membership Packages Record</h1>
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
                <div class="card-body">
                  <div class="form-group">
                    <label >Posting Packages</label>
                     <select name="group_id" class="form-control" required>
									<option value="">Please select</option>
									<?php   $v_sql = "SELECT *  FROM tbl_usergroup where group_type=1 ";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {                              $i=1;
                             
                            while($row = $result->fetch_assoc()){ ?>
                                        <option value="<?php echo $row['id']; ?>" <?php if($row['id']== $group_id) { echo "selected='selected'";  } ?>><?php echo $row['group_name']; ?></option>
						<?php } } ?>
                                        
                                    </select>
                  </div> 
				  <div class="form-group">
                    <label >Membership Name</label>
                    <input type="text" class="form-control" name="membership_name" value="<?php echo $membership_name; ?>"   >
                  </div>
				 <div class="form-group">
                    <label >Trial</label>
                    <input type="text" class="form-control" name="trial"   value="<?php echo $trial;?>" >
                  </div>
                   <div class="form-group">
                    <label >Period</label>
                    <input type="text" class="form-control" name="period"   value="<?php echo $period;?>" >
                  </div> 
				  <div class="form-group">
                    <label >Price</label>
                    <input type="text" class="form-control" name="price"   value="<?php echo $price;?>" >
                  </div> 
				  <div class="form-group">
                    <label >Dicount</label>
                    <input type="text" class="form-control" name="discount"   value="<?php echo $discount;?>" >
                  </div> 
                  <div class="form-group">
                    <label>Description:</label>
                    <textarea class="textarea"  placeholder=""
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="membership_description"><?php echo $membership_description; ?></textarea>
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
