<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
     $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id";
    $result = $connect->query($v_sql);
?>

<?php
             $check_member_type="";
            $id=@$_SESSION['user']->user_id;
            $v_sql = "SELECT * FROM tbl_relationship_users_position WHERE user_id='$id'";
            $result = $connect->query($v_sql);
            if ($result->num_rows > 0){
             if($row = $result->fetch_assoc()){
             $check_member_type=$row['user_position_id'];

            ?>



            <?php
             }}
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
            <h2><i class="fa fa-user fa-fw"></i>USER GROUP CONTROL PANEL</h2>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="./add_usergroup.php" id="sample_editable_1_new" class="btn green"> Add New
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">	
									
							
        <div class="table-responsive">
                <table class="table table-bordered">
              <!--  <caption class="caption-basic1"> User Group</caption>-->
                    <tbody ><tr class="caption-basic">
                        <th>No</th>
                        <th>User Group Name</th>                        
                        <th colspan="2" style="text-align:center">Action</th>
                    </tr>
                    <?php
                    $v_sql = "SELECT *  FROM tbl_usergroup ";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){                               
                    ?>
                      <tr id="1">
                        <td align="center"><?php echo $i++; ?></td>
                        <td><?php echo $row['group_name']; ?></td>                                                            
                        <td align="center">
                           <a href="./edit_usergroup.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
						 <td align="center">
                           <a href="delete_usergroup.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete">
						   <i class="fa fa-remove"></i>Delete</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                                 
                       
                       
                </tbody></table>
            </div>
   
						

        
              
    </div>


</div>

</div>


<style type="text/css">
.caption-basic {
    color: #FFF;
    padding-left: 10px;
    background-color: #a4509f;
    border-color: #BCE8F1;
    font-size: 12px;
}
</style>


<?php include_once '../layout/footer.php' ?>