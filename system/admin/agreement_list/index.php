<?php 
    $menu_active =13;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_agreement
              LEFT JOIN tbl_users
              ON tbl_users.user_id=tbl_agreement.user_id
              LEFT JOIN tbl_user_agreement
              ON tbl_agreement.user_id=tbl_user_agreement.customer_id
              WHERE type_agreement='1'
              ORDER BY tbl_agreement.ag_id DESC

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
            <h2><i class="fa fa-user fa-fw"></i>AGREEMENT LIST CONTROL PANEL</h2>
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
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Tel</th>
                        <th>Nationality</th>
                        <th>Email</th>
                        <th>Action</th>
                        <th>Receipt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                     ?> 
                      <tr>
                        <td><?php echo $i++; ?></td>
                       
                        <td><?php echo $row["user_first_name"]; ?></td>
                        <td><?php echo $row["user_last_name"]; ?></td>
                        <td><?php echo $row["user_phone_number"]; ?></td>
                        <td><?php echo $row["nation_lity"]; ?></td>
                        <td><?php echo $row["user_email"]; ?></td>
                        <td>
                         <a target="_blank" href="print.php?id=<?php echo $row['ag_id']; ?>"><i class="fa fa-print fa-fw" aria-hidden="true"></i></a>
                       
                        </td>
                        <td>  
                            <a target="_blank" href="../../admin/return_receip_and_receip/make_receip.php?id=<?php echo $row['ag_id']; ?>"><i class="fa fa-plus fa-fw" aria-hidden="true"></i></a>
                            <a target="_blank" href="../../admin/return_receip_and_receip/receip.php?id=<?php echo $row['ag_id']; ?>"><i class="fa fa-print fa-fw" aria-hidden="true"></i></a>
                            <a target="_blank" href="../../admin/return_receip_and_receip/return_receip.php?id=<?php echo $row['ag_id']; ?>"><i class="fa fa-print fa-fw" aria-hidden="true"></i></a>
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