<?php 
    $menu_active =13;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT tbl_province.*,tbl_users.*,tbl_user_position.* FROM tbl_users INNER JOIN tbl_user_position ON tbl_users.user_position=tbl_user_position.up_id 
    INNER JOIN tbl_relationship_users_position ON tbl_users.user_id=tbl_relationship_users_position.user_id
     LEFT JOIN tbl_province ON tbl_province.pv_id=tbl_users.province_id
    where user_position ='3' and user_position_id='4' GROUP BY user_id";
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
            <h2><i class="fa fa-user fa-fw"></i>CITY TOUR LIST CONTROL PANEL</h2>
        </div>
        
        <div class="col-md-4">
        </div>
       
    </div><br>
    
    <div class="portlet-title">
        <div class="caption font-dark">
           <!--  <a href="add.php" id="sample_editable_1_new" class="btn green"> Add New
                <i class="fa fa-plus"></i>
            </a> -->
           <!--  <a class="green btn"  href="register_customer_account.php"><span><i class="fa fa-plus"></i></span>Register as Customer</a>
            <a class="green btn"  href="register_partner_account.php"><span><i class="fa fa-plus"></i></span>Register as Partner</a> -->
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_2" role="grid" aria-describedby="sample_2_info" >
                <thead>
                    <tr role="row" class="text-center">
                        <!-- <th>No</th> -->
                        <th>ID No.</th>
                        <th>Coupon Card No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>Sex</th>
                        <th>Title</th>
                        <th>Unit/Org</th>
                        <th>Province</th>
                        <th>Address</th>
                      
                        <th>DOB</th>
                        <th>Images</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Social Media</th>
                        <th>Review</th>
                        <th>Blacklist</th>
                        <th>Remarks</th>
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
                      	<td><a href="edit.php?edit_id=<?php echo $row["user_id"]; ?>"><?php echo $row["user_id_number"]; ?></a></td>
                      	<td><?php echo $row["user_coupon_code"]; ?></td>
                      	<td><?php echo $row["user_first_name"]; ?></td>
                      	<td><?php echo $row["user_last_name"]; ?></td>
                        <td><?php echo $row["user_name"]; ?></td>
                        <td><?php echo $row["user_gender"]; ?></td>
                        <td><?php echo $row["user_title"]; ?></td>
                        <td><?php echo $row["user_company"]; ?></td>
                        <td><?php echo $row["pv_title"]; ?></td>
                        <td><?php echo $row["user_address"]; ?></td>
                       
                        <td><?php
                        	echo $row["user_birthday"];

                        ?></td>
                        <td>
                            <?php 
                               if($row["user_position"]=="2") {
                            ?>
                            <?php
                               if(($row['add_bye'] >0) && ($row["user_position"]=="2")) {
                            ?>
                             <img style="width:60px;" src="../image/img_customer/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">

                            <?php } else { ?>
                            <img style="width:60px;" src="../../../system/img/img_customer/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">
                            <?php } ?>
                           
                           
                           <?php } elseif ($row["user_position"]=="3") { ?>
                           <?php
                               if(($row['add_bye'] >0) && ($row["user_position"]=="3")) {
                            ?>
                             <img style="width:60px;" src="../image/img_partner/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">

                            <?php } else { ?>
                            <img style="width:60px;" src="../../../system/img/img_partner/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">
                            <?php } ?>

                           <?php  } ?>

                        </td>
                        
                        <td><?php echo $row["user_phone_number"]; ?></td>
                        <td><?php echo $row["user_email"]; ?></td>
                        <td><?php echo $row["socail_user"]; ?></td>
                        <td><?php echo $row["review_user"]; ?></td>
                        <td><?php echo $row["black_list"]; ?></td>
                        <td>
                           <a class="share-btn share-btn-email"
                           href="mailto:?subject=Share Buttons Demo&body=<?php echo $row['user_email']; ?>"
                           title="Share via Email">
                          <span class="share-btn-icon"></span>
                          <span class="share-btn-text"><i class="fa fa-envelope" aria-hidden="true"></i> Email</span>
                          </a>
                        </td>
                        <td>
                            <?php $status=$row["user_status"]; 
                            if($status=="1") {
                                echo "ENABLE";
                            }
                            else {
                                echo "DISABLE";
                            }

                             ?>
                      </td>
                        <td class="text-center"><a href="edit.php?edit_id=<?php echo $row["user_id"]; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> 
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




<?php include_once '../layout/footer.php' ?>

