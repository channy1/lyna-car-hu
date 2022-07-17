<?php 
    $menu_active =9;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    $v_sql = "SELECT * FROM tbl_accessory_make INNER JOIN tbl_accessory_model 
    ON tbl_accessory_make.make_id = tbl_accessory_model.make_id";
    $result = $connect->query($v_sql);
?>
<style>
    .nav_tab{
        width:100%;
        float:left;
    }
    .nav_tab #tab:hover{
        background-color:gray;
    }
    .act{
        background-color:gray !important;
    }
    .nav_tab #tab{
        margin-left:2px;
        text-decoration:none;
        background-color:silver;
        padding:8px;
        color:black;
        width:200px;
        float:left;
        text-align:center;
    }
</style>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
   
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
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th style="width:30%;">No</th>
                        <th>Accessories Make</th>
                        <th>Accessories Model</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>".$row["model_id"]."</td>";
                                echo "<td>".$row["make_name"]."</td>";
                                echo "<td>".$row["model_name"]."</td>";

                                echo '<td class="text-center">';
                                echo '<a href="edit.php?edit_id='.$row["model_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> '; 
                                
                                echo '</td>';
                            echo "</tr>";
                        }
                    }
                    else {
                       
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php include_once '../layout/footer.php' ?>