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
            <h2><i class="fa fa-user fa-fw"></i>SERVICE  PACKAGES CONTROL PANEL</h2>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="./add_services.php" id="sample_editable_1_new" class="btn green"> Add New
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">	
									<?php   $v_sql1 = "SELECT *  FROM tbl_usergroup ";
                        $result1 = $connect->query($v_sql1);
                      
                        if ($result1->num_rows > 0) {                              $i=1;
                             
                            while($row1 = $result1->fetch_assoc()){ ?>
							
        <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basicnew"> <?php echo $row1['group_name']; ?> Packages</caption>
                    <tbody><tr class="caption-basic">
                        <th>No</th>
						
                        <th>User Group</th>
                        <th>Service Name</th>
                        <th colspan="2" style="text-align:center">Action</th>
                    </tr>
                    <?php
                    $v_sql = "SELECT tbl_posting_package.*, tbl_usergroup.group_name   FROM tbl_posting_package INNER JOIN tbl_usergroup ON tbl_posting_package.group_id=tbl_usergroup.id 
					where tbl_usergroup.id =".$row1['id'];
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){                               
                    ?>
                      <tr id="1">
                        <td align="center"><?php echo $i++; ?></td>
						
                        <td><?php echo $row['group_name']; ?></td>
                        <td><?php echo $row['package_name']; ?></td>                                           
                        <td align="center">
                           <a href="./edit_services.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
						 <td align="center">
                           <a href="delete_services.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete">
						   <i class="fa fa-remove"></i>Delete</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                                 
                       
                       
                </tbody></table>
            </div>
   
						<?php } } ?>

        
              
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
.caption-basicnew {
    color: #000;
    padding-left: 10px;
    background-color: #32c5d2;
    border-color: #a4509f;
    font-size: 12px;
	font-weight:bold;
	text-transform: uppercase;
}
</style>


<?php include_once '../layout/footer.php' ?>