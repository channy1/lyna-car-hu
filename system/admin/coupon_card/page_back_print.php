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
        .con-img{
            width:400px;
            height:250px;
            float:left;
            position: relative;
        }
    }
    .con-img{
            width:400px;
            height:250px;
            float:left;
            position: relative;
        }
        .img{
            float:left;
            height:250px;
            width:100%;
        }
        .on-one-img{
            float: left;
            position: absolute;
            left: 256px;
            top: 215px;

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
            left: 11px;
            top: 215px;
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
<script>
    window.print();
</script>
<?php
    $id=$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM tbl_coupon AS A left join tbl_users AS B ON A.cop_id_user = B.user_id WHERE A.cop_id_user='".$id."'";
    $result = $connect->query($v_sql);
    $n=1;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $short_name = substr($row["user_first_name"],0,1).substr($row["user_last_name"],0,1);
            $name = $row["user_first_name"]." ".$row["user_last_name"];
            $pro = $row["user_address"];
            $phone = $row["user_phone_number"];
            $cop_no = $row["cop_no"];
            $con_intro = $row["cop_intro"];
            
            
            
?>
<div class="con-img">
    <div class="on-one-img"><font>&nbsp;<?php echo strtoupper(@$short_name).date("ymd")."-".sprintf("%06d", @$cop_no);?></font></div>
    <div class="on-two-img"><font>&nbsp;<?php echo strtoupper(@$short_name).date("ymd")."-".sprintf("%06d", @$cop_intro);?></font></div>
    <img class="img"  src="../../img/img-coupon/Coupon_Card Font-3.jpg">
</div>



<?php
if($n%8==0){
    echo "<p style='page-break-after: always;'>&nbsp;</p>";
}
$n++;
        }
    }
?>
<script>
    // window.print();
    window.close();
</script>