<?php 
    $menu_active =3;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    $id=@$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM tbl_vehicle_rantal where add_by_id='$id'";
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
   <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>AIRPORT TRANSFER CONTROL PANEL</h2>
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
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row" class="text-center">
                        <th>Vehicle Ref. N&deg;</th>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Sub-model</th>
                        <th>Type</th>
                        <th>Tran.Type</th>
                        <th>N&deg;. Of Seats</th>
                       
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                     ?> 
                      <tr>
                        <td>
                            <a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_ref_no"]; ?></a>
                        </td>
                         <td><a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_year"]; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_make"]; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_model"]; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_sub_model"]; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_type"]; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_transmission_type"]; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['ve_id']; ?>"><?php echo $row["ve_no_of_seat"]; ?></a></td>
                        
                       
                       </tr>
                        <?php 
                           }
                         }
                        ?>
                </tbody>
            </table>
        </div>
    </div>


</div>

</div>


<style type="text/css">
.modal-backdrop.in {
    opacity: 0;
    filter: alpha(opacity=50);
}
</style>

<?php include_once '../layout/footer.php' ?>