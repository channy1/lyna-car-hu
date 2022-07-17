<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_accessories_rental";
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
            <h2><i class="fa fa-user fa-fw"></i>ACCESSORIES RENTAL CONTROL PANEL</h2>
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
                            <th style="">Image</th>
                            <th >Vehical Ref No:</th>
                            <th >Days(1-7)</th>
                            <th >Extra Days(1-7)</th>
                            <th >Days(15-26)</th>
                            <th >Extra Days(15-26)</th>
                            <th >Monthly</th>
                            <th >Monthly Extra Days</th>
                            <th >Yearly</th>
                            <th >Yearly Extradays</th>
                            <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["ac_id"]."'>".$row["ac_title"]."</a></td>";
                                echo "<td><img width='100px' height='100px' src='../image/accessories rental/".$row["ac_image"]."'>
                                 <a href='add_img.php?id=".$row["ac_id"]."'  class='btn green'>Add
                                        <i class='fa fa-plus'></i>
                                    </a></td>";

                                echo "<td>".$row["ac_ref_no"]."</td>";
                                echo "<td>".$row["ac_days(1-7)"]."</td>";
                                echo "<td>".$row["ac_extradays(1-7)"]."</td>";
                                echo "<td>".$row["ac_days(15-26)"]."</td>";
                                echo "<td>".$row["ac_extradays(15-26)"]."</td>";
                                echo "<td>".$row["ac_monthly"]."</td>";
                                echo "<td>".$row["ac_extramonthly"]."</td>";
                                echo "<td>".$row["ac_yearly"]."</td>";
                                echo "<td>".$row["ac_extrayearly"]."</td>";

                                echo '<td class="text-center">';
                                echo '<br><a href="edit.php?edit_id='.$row["ac_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a><br><br> ';  
                                echo '<a href="dalete.php?delete_id='.$row["ac_id"].'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';  
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





<?php include_once '../layout/footer.php' ?>