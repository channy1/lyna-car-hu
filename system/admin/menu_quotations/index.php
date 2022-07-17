<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    $v_sql = "SELECT * FROM tbl_quotation_type_menu";
    $result = $connect->query($v_sql);
    
?>
<style>
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
            <h2><i class="fa fa-user fa-fw"></i>QUOTATION CONTROL</h2>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark">
            <!-- <a href="add.php" id="sample_editable_1_new" class="btn green"> Add New
                <i class="fa fa-plus"></i>
            </a> -->
        </div>
        
        <div class="tools"> </div>
    </div>
    
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_2" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                            <th >No</th>
                            <th >Menu Title</th>
                            <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n=0;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<td>".++$n."</td>";
                            echo "<td>".$row["qtm_type"]."</td>";

                            echo '<td class="text-center">';
                            echo '<a href="#" onclick="return confirm(\'Can not Edit on this page!!\')" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                            echo '<a href="#" onclick="return confirm(\'Can not delete on this page!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';                                  
                            echo '</td></tr>';
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