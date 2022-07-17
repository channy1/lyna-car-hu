<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
    // session_start();
    $id=$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM  tbl_users 
    INNER JOIN tbl_province ON tbl_users.province_id =tbl_province.pv_id
    WHERE tbl_users.user_id='".$id."'";
    $pro="";
    $cop_no="";
    $con_intro="";
    $user_introducer_id="";
    $car_id="";
    $phone = ''; 
    $name = ''; 
    $short_name = ''; 
    $result = $connect->query($v_sql);
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()){
            $short_name = substr($row["user_first_name"],0,1).substr($row["user_last_name"],0,1);
            $name = $row["user_first_name"]." ".$row["user_last_name"];
            $pro = $row["pv_title"];
            $phone = $row["user_phone_number"];
            $cop_no =111111;
            $con_intro = 22222222;
            $user_introducer_id=$row['user_introducer_id'];
            $car_id=$row['user_coupon_code'];
        }
    }

 
?>
<style>
    .contain_out{
            width:400px;
            height:250px;
            border:8px solid #ffd45e;
            background-color:#a5519f;
        }
    @media print{

        /* .contain_out{
            width:400px;
            height:250px;
            border:8px solid #ffd45e;
        }  */
        
    }
    .con-img{
        
        margin-left:60px;
            width:400px;
            height:250px;
            float:left;
        }
        .img{
            float:left;
            height:250px;
            width:100%;
        }
        .on-img{
            
            float: left;
            position: absolute;
            left: 127px;
            top: 129px;
            z-index: 1000;
            color: #FFFFFF;
            /* background-color:#a5519f; */
            /* background-color:white; */
            width:154px;
            height:65px;
            font-size:13px;
            padding:0px;
        }
        .contain_out{
            width:400px;
            height:250px;
            border:8px solid #ffd45e;
            background-color:#a5519f;
        }
    @media print{

        /* .contain_out{
            width:400px;
            height:250px;
            border:8px solid #ffd45e;
        }  */
        
    }
        }
        .img{
            float:left;
            height:250px;
            width:100%;
        }
        .on-one-img{
            float: left;
            position: absolute;
            left: 573px;
            top: 302px;
            z-index: 1000;
            color: #000000;
            font-weight: bold;
            /* background-color:white; */
            width:130px;
            height:23px;
            font-size:14px;
            border-radius:3px;
            padding:0px;
        }
        .on-two-img{
            float: left;
            position: absolute;
            left: 818px;
            top: 302px;
            z-index: 1000;
            color: #000000;
            font-weight: bold;
            background-color:white;
            width:130px;
            height:23px;    
            font-size:14px;
            border-radius:3px;
            padding:0px;
        }
</style>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-dashboard fa-fw"></i> Dashboard </h2>
        </div>
    </div>
    <div class="con-img">
        <div class="on-img"><font style="text-transform:uppercase;font-weight:bold;font-size:11px;" size="3px">&nbsp;<?=$name?></font><br>
            <font style="text-transform:uppercase;font-size:11px;" size="2px">&nbsp;<?=$phone?></font><br>
            <font style="text-transform:uppercase;font-size:11px;" size="3px">&nbsp;<?=$pro?></font></div>
            <img class="img"  src="../../img/img-coupon/Coupon_Card Font-4.jpg">
    </div>
    <div class="con-img">
        <div style="font-size:12.5px;margin-top:4px;" class="on-one-img"><font>&nbsp;
            <?php echo $user_introducer_id; ?></font></div>
        <div style="font-size:12.5px;margin-top:4px;" class="on-two-img"><font>&nbsp;
            <?php echo $car_id; ?></font></div>
        <img class="img"  src="../../img/img-coupon/Coupon_Card Font-3.jpg">
    </div>
    <br><br><br><br><br>
    
        <form action="#" method="post" style="margin-top:50px;" enctype="multipart/form-data">
            <div class="container hidden" style="margin-top:200px;margin-left:30px;">
                <div class="col-md-12">
                    <a href="page_front_print.php" target="_blank" class="btn  btn-info"><i class="fa fa-print"></i> Print Front</a>
                    <a href="page_back_print.php" target="_blank" class="btn  btn-warning"><i class="fa fa-print"></i> Print Back</a>
                    
                </div>
                <font color="red"><br>&emsp; *Remember When You print You will Print 100 Card</font>
            </div>
            
        </form>
    
</div>




<?php include_once '../layout/footer.php' ?>
