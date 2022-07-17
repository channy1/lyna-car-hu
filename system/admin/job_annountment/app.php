<?php 
    $menu_active =8;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT count(ap_job_id) as total_app,tbl_users.*,tbl_app_job.*,job_announment.* FROM tbl_app_job 

    INNER JOIN job_announment ON tbl_app_job.ap_job_id = job_announment.ann_id
    INNER JOIN tbl_users ON tbl_users.user_id = tbl_app_job.ap_user_id 
    GROUP BY ann_id
    ORDER BY ann_id desc";
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
            <h2><i class="fa fa-user fa-fw"></i>HISTORY CONTROL PANEL</h2>
        </div>
    </div>
    <div class="portlet-title">
        
        <div class="caption font-dark hidden" style="margin-right: 5px;">
            <a href="add.php" id="sample_editable_1_new" class="btn green"> Apply History
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
                        <th>Apply </th>
                        <th>Term</th>
                        <th>Closing Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $id=$row['ann_id'];
                            echo "<tr>";
                                echo "<td><a href='view_user.php?id=$id'>".$row["ann_title_en"]."</a></td>";
                                echo "<td><a href='view_user.php?id=$id'>".$row["total_app"]."</a></td>";
                              
                                echo "<td><a href='view_user.php?id=$id'>".$row["ann_term"]."</a></td>";
                                echo "<td><a href='view_user.php?id=$id'>".$row["ann_closing_date"]."</a></td>";
                              

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