<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    $id=@$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM tbl_vehicle_rantal where add_by_id='$id' ";
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
            <h2><i class="fa fa-user fa-fw"></i>VEHICALE RENTAL CONTROL PANEL</h2>
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
                            <th >Horse Power</th>
                            <th >No Of Seats</th>
                            <th >Transmission type</th>
                            <th >Vehical type</th>
                            <th >Type</th>
                            <th >Maximum weight</th>
                            <th >Steering wheel type</th>
                            <th >No of axles</th>
                            <th >No of eylinders</th>
                            <th >Cylinders_disp</th>
                            <th >Test driver url</th>
                            <th >Show URL</th>
                            <th >Note</th>
                            <th >Days(1-7)</th>
                            <th >Extra Days(1-7)</th>
                            <th >Days(15-26)</th>
                            <th >Extra Days(15-26)</th>
                            <th >Monthly</th>
                            <th >Monthly Extra Days</th>
                            <th >Yearly</th>
                            <th >Yearly Extradays</th>
                            <th style="">Detail</th>
                            <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>".$row["ve_title"]."</td>";
                                echo "<td>
                                   <img width='100px' height='100px' src='../../admin/image/vehicle_rental/".$row["ve_image"]."'>
                                    <a href='add_img.php?id=".$row["ve_id"]."'  class='btn green'>Add
                                        <i class='fa fa-plus'></i>
                                    </a>
                                     </td>";

                                echo "<td>".$row["ve_ref_no"]."</td>";
                                echo "<td>".$row["ve_year"]."</td>";
                                echo "<td>".$row["ve_make"]."</td>";
                                echo "<td>".$row["ve_model"]."</td>";
                                echo "<td>".$row["ve_sub_model"]."</td>";
                                echo "<td>".$row["ve_color"]."</td>";
                                echo "<td>".$row["ve_horse_pow"]."</td>";
                                echo "<td>".$row["ve_no_of_seat"]."</td>";
                                echo "<td>".$row["ve_transmission_type"]."</td>";
                                echo "<td>".$row["ve_vehical_type"]."</td>";
                                echo "<td>".$row["ve_type"]."</td>";
                                echo "<td>".$row["ve_maximum_weight"]."</td>";
                                echo "<td>".$row["ve_steering_wheel_type"]."</td>";
                                echo "<td>".$row["ve_no_of_axles"]."</td>";
                                echo "<td>".$row["ve_no_of_eylinders"]."</td>";
                                echo "<td>".$row["ve_cylinders_disp"]."</td>";
                                echo "<td>".$row["ve_test_drive_url"]."</td>";
                                echo "<td>".$row["ve_show_url"]."</td>";
                                echo "<td>".$row["ve_note"]."</td>";
                                echo "<td>".$row["ve_days(1-7)"]."</td>";
                                echo "<td>".$row["ve_extra_days(1-7)"]."</td>";
                                echo "<td>".$row["ve_day(15-26)"]."</td>";
                                echo "<td>".$row["ve_extra_day(15-26)"]."</td>";
                                echo "<td>".$row["ve_monthly"]."</td>";
                                echo "<td>".$row["ve_monthy_extra_days"]."</td>";
                                echo "<td>".$row["ve_yearly"]."</td>";
                                echo "<td>".$row["ve_yearly_extra_days"]."</td>";

                                echo "<td>".$row["ve_detail"]."</td>";
                                echo '<td class="text-center">';
                                echo '<br><a href="edit.php?edit_id='.$row["ve_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a><br><br> ';  
                                echo '<a  href="dalete.php?delete_id='.$row["ve_id"].'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';  
                                echo '</td>';
                            echo "</tr>";
                        }
                    }
                    else {
                       
                    }
                    ?> 
                </tbody>
            </table>
            <!-- <a href="https://fontawesome.com/icons?d=gallery" style="font-size:13px;text-decoration:underline;" target="blank" >Choose any icon HERE!</a> -->
        </div>
    </div>


</div>

</div>





<?php include_once '../layout/footer.php' ?>