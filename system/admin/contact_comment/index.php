<?php 
    $menu_active =3;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_contact_comment ";
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
            <h2><i class="fa fa-user fa-fw"></i>CONTACT COMMENTS CONTROL PANEL</h2>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark">
            
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row" class="text-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                     ?> 
                      <tr>
                        <td><?php echo $row["comment_id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["subject"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["website"]; ?></td>
                        <td><?php 
                            if($row["status"]=="1") {
                                echo "Show";
                            }
                            else {
                                echo "Hidden";
                            }
                         ?>
                     </td>
                        <td>
                             <?php
                                  echo $row["comment"]; 

                            ?>
                        </td>
                        <td class="text-center">
                            <a onclick="return confirm('Do you want to update!!')" href="status.php?edit_id=<?php echo $row["comment_id"]; ?>&status=<?php echo $row["status"]; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i><?php 
                            if($row["status"]=="1") {
                                echo "Hidden";
                            }
                            else {
                                echo "Show";
                            }
                         ?></a> 
                            <a onclick="return confirm('Do you want to delete!!')" href="delete.php?id=<?php echo $row["comment_id"]; ?>" class="btn btn-xs btn-warning" title="delete"><i class="fa fa-remove"></i>Delete</a>
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