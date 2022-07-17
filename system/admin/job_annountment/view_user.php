<?php 
    $menu_active =8;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    $get_id=@$connect->real_escape_string($_GET['id']);
    $v_sql = "SELECT tbl_users.*,tbl_app_job.*,job_announment.* FROM job_announment  

    LEFT JOIN tbl_app_job ON tbl_app_job.ap_job_id = job_announment.ann_id
    LEFT JOIN tbl_users ON tbl_users.user_id = tbl_app_job.ap_user_id  where ap_job_id='$get_id'

    ";
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
            <h2><i class="fa fa-user fa-fw"></i>APPLY CONTROL PANEL</h2>
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
                        <th>First Name</th>
                        <th>Last Name </th>
                        <th>Phone</th>
                        <th>E-Mail</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                
                    ?> 
                    <tr>
                        
                        <td><a href="view_cv_app.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['ann_title_en']; ?></a></td>
                        <td><a href="view_cv_app.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['user_first_name']; ?></a></td>
                        <td><a href="view_cv_app.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['user_last_name']; ?></a></td>
                        <td><a href="view_cv_app.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['user_phone_number']; ?></a></td>
                        <td><a href="view_cv_app.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['user_email']; ?></a></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
            
            <!-- <a href="https://fontawesome.com/icons?d=gallery" style="font-size:13px;text-decoration:underline;" target="blank" >Choose any icon HERE!</a> -->
        </div>
    </div>


</div>

</div>




<?php include_once '../layout/footer.php' ?>