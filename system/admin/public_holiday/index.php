<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    $v_sql = "SELECT * FROM tbl_holiday ORDER BY order_number ";
    $result = $connect->query($v_sql);
    

?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>PUBLIC HOLIDAYS CONTROL PANEL</h2>
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
        <div  class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_2" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th style="width:10%;" >Public Date</th>
                        <th  style="width:70%;">Name Of Holiday</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["holiday_id"]."'>".$row["date_public"]."</a></td>";
                                echo "<td>".$row["description"]."</td>";
                                echo "<td>".$row["order_number"]."</td>";
                                echo '<td class="text-center">';
                                echo '<a href="edit.php?edit_id='.$row["holiday_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                                echo '<a href="dalete.php?delete_id='.$row["holiday_id"].'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';                                  
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


<style type="text/css">
.dt-buttons {
    display: none;
}
</style>

<?php include_once '../layout/footer.php' ?>