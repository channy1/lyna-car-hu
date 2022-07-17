<!-- include header file -->
<?php
    include_once ('system/config/database.php');
    include_once ('allowlog.php');
 ?>

<?php 
    require_once("header.php");
    $id = $_GET["id"];
?>
<div class="container" style="margin-top: 10px;">
    <div style="height: 10px; width: 100%">
    </div>
</div>
<!-- finished header file included -->
<!-- body section for partner benefit -->

<div class="container">
    <div class="panel panel-default" style="margin-top: 15px;">
        <div style="color: #a4509f;" class="panel-heading">
        <?php 
                $v_sql = "SELECT * FROM tbl_car_sales WHERE cars_id='$id'";
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
        ?>
        <h3 style="margin-bottom: -5px; color: #a4509f;"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?php echo $row["cars_title"]; ?></h3>
       </div>
        <div style="margin-left: 50px; color: #a4509f;" class="panel-body">
        <div class="col-sm-7" style="box-shadow:1px 1px 1px black;height:455px;" >
                <img width="100%" src="system/admin/image/car_sales/<?php echo $row["cars_image"]; ?>">
                </div>
        <?php
                echo $row["cars_detail"];
                echo $row["cars_desc"];
                    }
                }
        ?>
        </div>
    </div>
</div>

<!-- finished section for partner benefit -->
<!-- include footer file  -->
<?php require_once("footer.php"); ?>