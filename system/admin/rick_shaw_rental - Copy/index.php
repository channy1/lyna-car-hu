<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_rick_shaw_rental";
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
            <h2><i class="fa fa-user fa-fw"></i>RICKSHAWS OWNER LIST CONTROL PANEL</h2>
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
                            <th >Year</th>
                            <th >Make</th>
                            <th >Model</th>
                            <th >Sub_Model</th>
                            <th >Color</th>
                            <th >Note</th>
                            <th >Price For Rent</th>
                            <th >Price For Sale</th>
                            <th >Status</th>
                            
                            <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            ?>
                           <tr>
                               <td><?php echo  $row["ve_title"]; ?></td>
                               <td><img width="100px" height="100px" src="../image/vehicle_rental/<?php echo $row["ve_image"]; ?>"</td>

                               <td><?php echo  $row["ve_ref_no"]; ?></td>
                               <td><?php echo  $row["ve_year"]; ?></td>
                               <td><?php echo  $row["ve_make"]; ?></td>
                               <td><?php echo  $row["ve_model"]; ?></td>
                               <td><?php echo  $row["ve_sub_model"]; ?></td>
                               <td><?php echo  $row["ve_color"]; ?></td>
                               <td><?php echo  $row["ve_note"]; ?> </td>
                               <td>$ <?php echo  $row["price_rent"]; ?></td>
                               <td>$ <?php echo  $row["rick_price"]; ?></td>
                               <td>
                                <?php $status=$row['status']; 
                                if($status=="1") {
                                    echo "Rent";
                                }
                                else {
                                    echo "Sale";
                                }
                                ?>
                            </td>
                               <td class="text-center">';
                               <br><a href="edit.php?edit_id=<?php echo $row["ve_id"]; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a><br><br> 
                               <a  href="dalete.php?delete_id=<?php echo $row["ve_id"]; ?>" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>  
                               </td>';
                           </tr>
                   
                   <?php 
                      }}
                    ?> 
                </tbody>
            </table>
            <!-- <a href="https://fontawesome.com/icons?d=gallery" style="font-size:13px;text-decoration:underline;" target="blank" >Choose any icon HERE!</a> -->
        </div>
    </div>


</div>

</div>





<?php include_once '../layout/footer.php' ?>