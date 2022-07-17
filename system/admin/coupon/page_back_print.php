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
        .on-one-img{
            float: left;
            position: absolute;
            left: 19px;
            top: 223px;
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
        .on-two-img{
            float: left;
            position: absolute;
            left: 265px;
            top: 223px;
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
<!-- <div class="contain_out">

    <br><br>

</div> -->
<div class="con-img">
    <div class="on-one-img"><font>&nbsp;Code 00-2937490</font></div>
    <div class="on-two-img"><font>&nbsp;Code 00-2937490</font></div>
    <img class="img"  src="../../img/img-coupon/coupon_1.jpg">
</div>
