<?php 
    $menu_active =3;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_accessory_admin INNER JOIN tbl_accessory_make on tbl_accessory_make.make_id=tbl_accessory_admin.make_id
    INNER JOIN tbl_accessory_model on tbl_accessory_model.model_id=tbl_accessory_admin.model_id
    ";
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
            <h2><i class="fa fa-user fa-fw"></i>Accessories</h2>
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
                        <th>Ref No</th>
                        <th>Accessories</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Sub-model</th>
                        <th>Imei No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                     ?> 
                      <tr>
                        <td><?php echo $row["ref_no"]; ?></td>
                        <td><?php echo $row["acc_name"]; ?></td>
                        <td><?php echo $row["make_name"]; ?></td>
                        <td><?php echo $row["model_name"]; ?></td>
                        <td><?php echo $row["sub_model"]; ?></td>
                        <td><?php echo $row["imei"]; ?></td>
                        <td><?php 
                        if($row["status"] =="1") {
                          echo "Enable";
                        }
                       else {
                        echo "Disable";
                       }
                         ?></td>
                        <td class="text-center"><a href="edit.php?edit_id=<?php echo $row["acc_id"]; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> 
                        </td>
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