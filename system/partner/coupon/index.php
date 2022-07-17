<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php

    $id=@$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM  tbl_users  WHERE user_id='".$id."'  ";
    $result = $connect->query($v_sql);
    $user_introducer_id="";
    $car_id="";
    $f_name="";
    $l_name="";
    $phone="";
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()){
            $name = $row["user_name"];
            $user_introducer_id=$row['user_introducer_id'];
            $car_id=$row['user_coupon_code'];
            $f_name=$row['user_first_name'];
            $l_name=$row['user_last_name'];
            $phone=$row['user_phone_number'];
        }
    }


?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-dashboard fa-fw"></i> Dashboard <?php echo @$name;?></h2>
        </div>
    </div>
	<center>
    <label style="position: absolute;margin-top:4%;margin-left:2.2%;font-size: 12px;color:white;">
        <?php echo ucfirst($f_name); ?>  <?php echo ucfirst($l_name); ?>
    </label>
    <label style="position: absolute;margin-top:5.7%;margin-left:2.2%;font-size: 12px;color:white;">
        <?php echo $phone; ?>
    </label>

	<img src="../../img/img-coupon/Coupon_Card Font-4.jpg" alt="" width="400px">
	&emsp;
     <label style="position: absolute;margin-top: 21%;margin-left:2%;font-size: 12px;">
        <?php echo $user_introducer_id; ?>
    </label>
     <label style="position: absolute;margin-top: 21%;margin-left:25%;font-size: 12px;">
        <?php echo $car_id; ?>
    </label>
	<img src="../../img/img-coupon/Coupon_Card Font-3.jpg" alt="" width="400px">

   
	</center>
    <div class="container">
    <br>
    </div>

        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-actions">
                <div class="row hidden">
                    <div class="col-md-12 text-center">
                        <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                        <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                        <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                    </div>
                </div>
            </form>
        </div>






<?php include_once '../layout/footer.php' ?>
