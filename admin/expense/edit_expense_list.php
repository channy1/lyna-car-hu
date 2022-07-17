<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
$exp_id = $_GET["id"]; 
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
            $txt_date_record 	= @$connect->real_escape_string($_POST['txt_date_record']);
            $txt_description 	= @$connect->real_escape_string($_POST['txt_description']);
            $txt_expense_category = @$connect->real_escape_string($_POST['txt_expense_category']);
            $txt_amount 		= @$connect->real_escape_string($_POST['txt_amount']);
            $txt_employe 		= @$connect->real_escape_string($_POST['txt_employee']);
            $txt_note 			= @$connect->real_escape_string($_POST['txt_note']);
           
			$query_add = "UPDATE `tbl_expense_list` SET `exp_date_record`='$txt_date_record',`exp_description`='$txt_description',`exp_expense_category`='$txt_expense_category',`exp_amount`='$txt_amount',`exp_employee`='$txt_employe',`exp_note`='$txt_note' WHERE exp_id='$exp_id'";
			
			//echo "<pre>"; print_r($query_add); echo "</pre>"; exit;
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






	$query="SELECT * FROM tbl_expense_list WHERE exp_id='$exp_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $exp_date_record= $row["exp_date_record"];
            $exp_description= $row["exp_description"];
            $exca_id 		= $row["exp_expense_category"];
            $exp_amount 	= $row["exp_amount"];
            $exp_employee 	= $row["exp_employee"];
            $exp_note 		= $row["exp_note"];            
        }
    }

    ?>





            <h1>Edit Expense List</h1>
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
            

			<form role="form" method="post" >
                <div class="card-body">
					<div class="form-group">
						<label>Date Record :</label>
						<input class="form-control" required  name="txt_date_record" type="date" placeholder="date..." value="<?php echo $exp_date_record; ?>">
					</div>
					<div class="form-group">
						<label>Description :</label>
						<input class="form-control" required name="txt_description" type="text" placeholder="description..." value="<?php echo $exp_description; ?>">  
					</div>
					<div class="form-group">
						<label for ="">Expense Category :</label>
						<select class = "form-control select2 " style = "width:100%" name = "txt_expense_category">
							<option value="">====Select and Choose====</option>
							<?php
							  $v_select = mysqli_query($connect,"SELECT * FROM tbl_expense_category");
							  while ($row1 = mysqli_fetch_assoc($v_select)) { ?>
								<option value="<?php echo $row1['exca_id']; ?>" 
								<?php if($exca_id == $row1['exca_id']){ echo 'selected';} ?>>
									<?php echo $row1['exca_name'] ;?>
								</option>
							<?php 
							}
							 ?>   
						</select>   
					</div>
					<div class="form-group">
						<label for ="">Amount :</label>
						<input class="form-control" required  name="txt_amount" type="text" placeholder="amount..." value="<?php echo $exp_amount; ?>"> 
					</div>
					<div class="form-group">
						<label for ="">Employee :</label>
						<select class = "form-control select2" style = "width:100%" name = "txt_employee">
							<option value="">====Select and Choose====</option>
								<?php
									$v_select = mysqli_query($connect,"SELECT * FROM tbl_users WHERE user_position='1' ");
									while ($row1 = mysqli_fetch_assoc($v_select)) { ?>
									<option value="<?php echo $row1['user_id']; ?>" <?php if($exp_employee == $row1['user_id']){ echo 'selected';} ?>>
										<?php echo $row1['user_first_name'] ;?><?php echo $row1['user_last_name'] ;?>
									</option>
								<?php 
								}
								 ?>   
						</select>  
					</div>
					<div class="form-group">
						<label for="note">Note :</label>
						<textarea class="form-control" rows="4" name = "txt_note"><?php echo $exp_note; ?></textarea> 
					</div>
                </div>
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
</body>
</html>
