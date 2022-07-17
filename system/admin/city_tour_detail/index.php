<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_province_detail";
    $result = $connect->query($v_sql);
    

?>
<style>
    .nav_tab{
        width:100%;
        float:left;
    }
    .nav_tab #tab:hover{
        background-color:#337ab7;
    }
    .act{
        background-color:#337ab7 !important;
    }
    .nav_tab #tab{
        margin-left:2px;
        text-decoration:none;
        background-color:#a4509f;
        padding:8px;
        color:white;
        width:200px;
        float:left;
        text-align:center;
    }
    
    table *{ white-space:nowrap; }
</style>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">

        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        <div class="nav_tab">
            <h2><i class="fa fa-user fa-fw"></i>PLACE IN PROVINCE CONTROL PANEL</h2><br>
                <a  id="tab"  href="../city_tour/">Province</a>
                <a class="act" id="tab" href="../city_tour_detail/">Place in Province</a>
            </div><br><br>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="add.php" id="sample_editable_1_new" class="btn green"> Add New
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_2" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th>Title</th>
                        <th >Image</th>
                        <th >Price</th>
                        <th >Distance</th>
                        <th >Province</th>
                        <th >Time of leave</th>
                        <th >Time of arrive</th>
                        <th style="min-width:20%;">Detail</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["pl_id"]."'>".$row["pl_title"]."</a></td>";
                                echo "<td><img width='100px' height='100px' src='../image/province_detail/".$row["pl_image"]."'>
                                <a href='add_img.php?id=".$row["pl_id"]."'  class='btn green'>Add
                                        <i class='fa fa-plus'></i>
                                    </a>
                                </td>";
                                echo "<td>$".$row["pl_price"]."</td>";
                                echo "<td>".$row["pl_distance"]."</td>";
                                $pro=$row["pl_pro_id"];
                                $sql = "SELECT * FROM tbl_province WHERE pv_id='$pro'";
                                $result1 = $connect->query($sql);
                                if ($result1->num_rows > 0) {
                                    if($row1 = $result1->fetch_assoc()) {
                                        echo "<td>".$row1["pv_title"]."</td>";
                                    }
                                }
                                echo "<td>".$row["pl_time_leave"]."</td>";
                                echo "<td>".$row["pl_time_arrive"]."</td>";
                                echo "<td style='overflow:scroll;width:15% !important;'>".$row["detail"]."</td>";
                                echo '<td class="text-center">';
                                echo '<a href="edit.php?edit_id='.$row["pl_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                                echo '<a href="dalete.php?delete_id='.$row["pl_id"].'&del_img='.trim($row["pl_image"]).'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';                                  
                                echo '</td>';
                            echo "</tr>";
                        }
                    }
                    else {
                       
                    }
                    ?> 
                </tbody>
            </table>
            <!-- <a href="https://fontawesome.com/icons?d=gallery" style="font-size:13px;text-decoration:underline;" target="blank" >Choose any icon HERE!</a> -->
        </div>
    </div>


</div>

</div>

<style>
table td p{

	    width: 200px;
    overflow: hidden;
    /*overflow: scroll;*/
    overflow-x: hidden;
    overflow-y: hidden;
}

</style>


<?php include_once '../layout/footer.php' ?>