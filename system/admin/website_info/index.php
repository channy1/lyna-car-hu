<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    $v_sql = "SELECT * FROM tbl_website_info";
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
</style>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
         <h2><i class="fa fa-user fa-fw"></i>WEBSITE CONTROL PANEL</h2><br>
        </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th style="width:30%;">Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["id"]."'>".$row["section_name"]."</a></td>";
                                echo "<td>".$row["section_data"]."</td>";
                                echo '<td class="text-center">';
                                echo '<a href="edit.php?edit_id='.$row["id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
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