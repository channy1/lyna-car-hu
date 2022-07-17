<?php 
    $menu_active =13;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_users  where user_position ='3' and user_seft_thru='1'  GROUP BY user_id";
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
        <div class="col-md-8">
               <a class="green btn"  href="seft.php"><span><i class="fa fa-user"></i></span> SELF-REGISTRATION</a>
               <a class="green btn"  href="thru.php"><span><i class="fa fa-user"></i></span> THRU INTRODUCER</a>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>PARTNER SELF-REGISTRATION CONTROL PANEL</h2>
        </div>
    </div>
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
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row" class="text-center">
                        <!-- <th>No</th> -->
                        <th>User Name</th>
                        <th>Position</th>
                        <th>Images</th>
                        <th>Phone</th>
                        <th>Email</th>
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
                        <td><?php echo $row["user_name"]; ?></td>
                        <td><?php 
                               $check_position=$row["user_position"];
                               if($check_position=="2") {
                                echo "Customer";
                               }
                               elseif ($check_position=="3") {
                                 echo "Partner";
                               }
                              else {
                                echo "";
                              }
                            ?>
                        </td>
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