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
    $v_sql = "SELECT * FROM tbl_coupon AS A left join tbl_users AS B ON A.cop_id_user = B.user_id WHERE A.cop_id_user='".$id."'";
   
    $result = $connect->query($v_sql);
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()){
            $short_name = substr($row["user_first_name"],0,1).substr($row["user_last_name"],0,1);
            $name = $row["user_first_name"]." ".$row["user_last_name"];
            $pro = $row["user_address"];
            $phone = $row["user_phone_number"];
            $cop_no = $row["cop_no"];
            $con_intro = $row["cop_intro"];
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
        <div class="on-img"><font style="text-transform:uppercase;font-weight:bold;" size="3px">&nbsp;<?=$name?></font><br><font style="text-transform:uppercase;" size="2px">&nbsp;<?=$phone?></font><br><font style="text-transform:uppercase;" size="3px">&nbsp;<?=$pro?></font></div>
            <img class="img"  src="../../img/img-coupon/Coupon_Card Font-4.jpg">
    </div>
    <div class="con-img">
        <div class="on-one-img"><font>&nbsp;<?php echo $short_name.date("ymd")."-".sprintf("%06d", $cop_no);?></font></div>
        <div class="on-two-img"><font>&nbsp;<?php echo $short_name.date("ymd")."-".sprintf("%06d", @$cop_intro);?></font></div>
        <img class="img"  src="../../img/img-coupon/Coupon_Card Font-3.jpg">
    </div>
    <br><br><br><br><br>
    
        <form action="#" method="post" style="margin-top:50px;" enctype="multipart/form-data">
            <div class="container" style="margin-top:200px;margin-left:30px;">
                <div class="col-md-12 ">
                    <a href="page_front_print.php" target="_blank" class="btn  btn-info"><i class="fa fa-print"></i> Print Front</a>
                    <a href="page_back_print.php" target="_blank" class="btn  btn-warning"><i class="fa fa-print"></i> Print Back</a>
                    
                </div>
                <font color="red"><br>&emsp; *Remember When You print You will Print 100 Card</font>
            </div>
            
        </form>
    
</div>




<?php include_once '../layout/footer.php' ?>
