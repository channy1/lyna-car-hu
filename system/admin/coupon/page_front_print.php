<?php 
    $layout_title = "Welcome Dashboard";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
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
            left: 32px;
            top: 48px;
            z-index: 1000;
            color: #FFFFFF;
            background-color:#a5519f;
            /* background-color:white; */
            width:157px;
            height:70px;
            font-size:13px;
            padding:0px;
        }
</style>
<!-- <div class="contain_out">

    <br><br>

</div> -->
<div class="con-img">
    <div class="on-img"><font>&nbsp;Name</font><br><font>&nbsp;phone</font><br><font>&nbsp;Province</font></div>
    <img class="img"  src="../../img/img-coupon/coupon_2.jpg">
</div>
