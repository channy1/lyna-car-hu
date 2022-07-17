<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    
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
            <h2><i class="fa fa-user fa-fw"></i>QUOTATION CAR RENTAL CONTROL</h2>
        </div>
    </div>
  
    
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_2" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr>
                           
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Booking Date</th>
                           
                            
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $query="SELECT * FROM tbl_quotation_admin 
                                INNER JOIN tbl_users
                                ON tbl_quotation_admin.customer_id=tbl_users.user_id
                               
                                WHERE tbl_quotation_admin.subject_type='1'
                            ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                   <tr>
                    <td>
                        <a href="view_info.php?id=<?php echo $row['q_id']; ?>">
                            <?php
                            echo $row['user_first_name'].$row['user_last_name'];
                            ?>
                        </a>
                    </td>
                    <td><a href="view_info.php?id=<?php echo $row['q_id']; ?>"><?php echo $row['user_email']; ?></a></td>
                    <td><a href="view_info.php?id=<?php echo $row['q_id']; ?>"><?php echo $row['user_phone_number']; ?> </a></td>
                    <td><a href="view_info.php?id=<?php echo $row['q_id']; ?>"><?php echo $row['booking_date']; ?> </a></td>
                    
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