<?php 
    $menu_active =8;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM job_announment";
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
            <h2><i class="fa fa-user fa-fw"></i>JOB SEEKERS CONTROL PANEL</h2>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark" style="margin-right: 5px;">
            <a href="add.php" id="sample_editable_1_new" class="btn green"> Add Job Title
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="caption font-dark" style="margin-right: 5px;">
            <a href="app.php" id="sample_editable_1_new" class="btn green"> Apply History
                <i class="fa fa-eye"></i>
            </a>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th>Title</th>
                        <th>Salary</th>
                        <th>Hiring</th>
                        <th>Term</th>
                        <th>Closing Date</th>
                            <!--<th style="width:10%;">Image</th>
                             <th style="width:40%;">Detail</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["ann_id"]."'>".$row["ann_title_en"]."</td>";
                                echo "<td>".$row["ann_salary"]."</td>";
                                echo "<td>".$row["ann_hiring"]."</td>";
                                echo "<td>".$row["ann_term"]."</td>";
                                echo "<td>".$row["ann_closing_date"]."</td>";
                                //echo "<td><img width='100px' height='100px' src='../image/our_service/".$row["se_image"]."'</td>";
                                // echo "<td>".$row["se_detail"]."</td>";
                                echo '<td class="text-center">';
                                echo '<a href="edit.php?edit_id='.$row["ann_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                                echo '<a href="dalete.php?delete_id='.$row["ann_id"].'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>';
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