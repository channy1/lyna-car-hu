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

        .contain_out{
            width:400px;
            height:250px;
            border:8px solid #ffd45e;
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
        .on-img{
            float: left;
            position: absolute;
            left: 32px;
            top: 41px;
            z-index: 1000;
            color: #FFFFFF;
            /* background-color:#a5519f; */
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
<script>
    window.print();
</script>
<?php
    $n=1;
    $id=$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM tbl_coupon AS A left join tbl_users AS B ON A.cop_id_user = B.user_id WHERE A.cop_id_user='".$id."'";
    $result = $connect->query($v_sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $short_name = substr($row["user_first_name"],0,1).substr($row["user_last_name"],0,1);
            $name = $row["user_first_name"]." ".$row["user_last_name"];
            $pro = $row["user_address"];
            $phone = $row["user_phone_number"];
            $cop_no = $row["cop_no"];
            $con_intro = $row["cop_intro"];

?>

<div class='con-img'>
<div class='on-img'><font style='text-transform:uppercase;font-weight:bold;' size='2px'>&nbsp;<?=@$name?></font><br><font style='text-transform:uppercase;' size='2px'>&nbsp;<?=@$phone?></font><br><font style='text-transform:uppercase;' size='2px'>&nbsp;<?=@$pro?></font></div>
<img class='img'  src='../../img/img-coupon/Coupon_Card Font-4.jpg'></div>

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