<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php
   $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
	
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "SELECT * from tbl_revenue_list where rev_id = $id";
		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($result);	
	}
	if(!empty($_POST["id"])){
			$id = $_POST["id"];

   		    $v_date_record = $_POST["txt_date_record"];
		    $v_description = $_POST["txt_description"];
		    $v_revenue_category = $_POST["txt_revenue_category"];
		    $v_amount = $_POST["txt_amount"];
		    $v_employee = $_POST["txt_employee"];
		    $v_note = $_POST["txt_note"];

			$sql = "UPDATE tbl_revenue_list 
						SET rev_date_record = '$v_date_record'
						, rev_description = '$v_description' 
						, rev_revenue_category = '$v_revenue_category' 
						, rev_amount = '$v_amount' 
						, rev_employee = '$v_employee' 
						, rev_note = '$v_note' 

						WHERE rev_id = '$id'" ;
			mysqli_query($connect, $sql);
			header("location:revenue_list.php?message=update");
	}	
?>

      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                	<h2 class="text-primary">Edit Revenue List</h2>
                	<hr>
                </div>
                   	<div class = "panel-body">
						<div class="col-md-12">
							<form method="post" enctype="multipart/form-data" action="">                  
								<div class="form-group col-xs-12">
									<input type = "hidden" name = "id" value = "<?php echo $id; ?>">
		                            <label for ="">Date Record:</label>                                          
		                       		<input class="form-control" required  name="txt_date_record" type="date" value = "<?php echo $row["rev_date_record"]?>">
		                        </div>
		                        <div class="form-group col-xs-12">
		                            <label for ="">Description:</label>                                          
		                       		<input class="form-control" required  name="txt_description" type="text" value = "<?php echo $row["rev_description"]?>">
		                        </div>
		                        <div class="form-group col-xs-12">
		                        	<label for ="">Revenue Category:</label>                                          
	                                <select class = "form-control" name = "txt_revenue_category">
										<?php
											$v_select = mysqli_query($connect,"SELECT * FROM tbl_revenue_category");
											while ($row_select = mysqli_fetch_assoc($v_select)) { 
												if($row["rev_revenue_category"] == $row_select["reca_id"]){
												?>
													<option selected="selected" value="<?php echo $row_select['reca_id']; ?>"><?php echo $row_select['reca_name'] ; ?></option>
												<?php
												}else{
												?>
													<option value="<?php echo $row_select['reca_id']; ?>"><?php echo $row_select['reca_name'] ; ?></option>
												<?php
												}   
											}
										 ?>     
									</select> 
		                        </div>
		                        <div class="form-group col-xs-12">
		                            <label for ="">Amount:</label>                                          
		                       		<input class="form-control" required  name="txt_amount" type="text" value = "<?php echo $row["rev_amount"]?>">
		                        </div>
		                        <div class="form-group col-xs-12">
		                        	<label for ="">Employee:</label> 
	                            	<select class = "form-control" name = "txt_employee">
										<?php
											$v_select = mysqli_query($connect,"SELECT * FROM tbl_users WHERE user_position='1'");
											while ($row_select = mysqli_fetch_assoc($v_select)) { 
												if($row["rev_employee"] == $row_select["user_id"]){
												?>
													<option selected="selected" value="<?php echo $row_select['user_id']; ?>"><?php echo $row_select['user_first_name']." :: ".$row_select['user_last_name'] ; ?></option>
												<?php
												}else{
												?>
													<option value="<?php echo $row_select['user_id']; ?>"><?php echo $row_select['user_first_name']." :: ".$row_select['user_last_name'] ; ?></option>
												<?php
												}   
											}
										 ?>     
									</select>
		                        </div>
		                        <div class="form-group col-xs-12">
		                            <label for="note">Note:</label>
		                            <textarea class="form-control" rows="4" id="note" name = "txt_note"><?php echo $row["rev_note"]?></textarea>
		                          </div>
								<div class="form-group col-xs-6">
									<button type="submit" value = "update" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i>Save</button>
									<a href="revenue_list.php" class="btn btn-danger">Back</a>
								</div> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
