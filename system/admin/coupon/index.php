<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php

    $id=@$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM tbl_coupon AS A left join tbl_users AS B ON A.cop_id_user = B.user_id WHERE A.cop_id_user='".$id."'  ";
    $result = $connect->query($v_sql);
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()){
            $name = $row["user_name"];
        }
    }

    // if(isset($_POST['btn_add'])){
    //         $v_name = @$connect->real_escape_string($_POST['txt_name']);
    //         $v_phone = @$connect->real_escape_string($_POST['txt_phone']);
    //         $v_province = @$connect->real_escape_string($_POST['txt_province']);
    //         $query_add = "INSERT INTO tbl_coupon (
    //                 cop_name,
    //                 cop_phone,
    //                 cop_province
    //                 ) 
    //             VALUES(
    //                 '$v_name',
    //                 '$v_phone',
    //                 '$v_province')";
    //         if($connect->query($query_add)){
    //             $sms = '<div class="alert alert-success">
    //             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                 <strong>Successfull!</strong> Data inserted ...
    //             </div>'; 
    //         }else{
    //             $sms = '<div class="alert alert-danger">
    //             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                 <strong>Error!</strong> Query error ...
    //             </div>';   
    //         }
    //         echo $sms;
    // }
?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-dashboard fa-fw"></i><B> COUPON CARD CONTROL PANEL</B> <?php echo @$name;?></h2>
        </div>
    </div>
	<center>
	<img src="../../img/img-coupon/Coupon_Card Font-4.jpg" alt="" width="400px">
	&emsp;
	<img src="../../img/img-coupon/Coupon_Card Font-3.jpg" alt="" width="400px">
	</center>
    <div class="container">
    <br>
    </div>

        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                        <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                        <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                    </div>
                </div>
            </form>
        </div>

	<!-- <div style="width:80%;margin-left:10%; ">
		<div class="portlet-body">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Input Information</h3>
				</div>
				<div class="col-sm-3">
					<br>
						<label>Name
							<span class="required" aria-required="true"></span>
						</label>
					<input type="text" class="form-control "  name="txt_image" placeholder="Enter Name"   autocomplete="off">
				</div>
				<div class="col-sm-3">
					<br>
						<label>Phone
							<span class="required" aria-required="true"></span>
						</label>
						<input type="text" class="form-control "  name="txt_image" placeholder="Enter Phone"   autocomplete="off">
				</div>
				<div class="col-sm-3">
					<br>
						<label>Province
							<span class="required" aria-required="true"></span>
						</label>
					<select name="txt_province" class="form-control	" id="">
						<option value="">-------Choose Province------</option>
							<?php
								$v_sql = "SELECT * FROM tbl_province";
								$result = $connect->query($v_sql);
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<option value='".$row["pv_id"]."'>".$row["pv_title"]."</option>";
									}
								}
							?>
						</select>
					</div>
				<div class="col-sm-4"><br>
					<a href="#" class="btn btn-info">Done</a>
					<a href="#" class="btn btn-warning">Cancel</a>
				</div>
			</div>
        </div>
    </div>
</div>
 -->





<?php include_once '../layout/footer.php' ?>
