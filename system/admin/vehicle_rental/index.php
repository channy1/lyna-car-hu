<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_vehicle_rantal";
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
            <h2><i class="fa fa-user fa-fw"></i>VEHICLE RENTAL CONTROL PANEL</h2>
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
                            <th >Vehicle Ref. No.</th>
                            <th >Province Name</th>
                            <th >Year</th>
                            <th >Make</th>
                            <th >Model</th>
                            <th >Sub Model</th>
                            <th >Color</th>
                            <th >Horse Power</th>
                            <th >No Of Seats</th>
                            <th >Transmission Type</th>
                            <th >Vehical Type</th>
                            <th >Type</th>
                            <th >Maximum Weight</th>
                            <th >Steering Wheel Type</th>
                            <th >No of Axles</th>
                            <th >No of Cylinders</th>
                            <th >Cylinders Disp</th>
                            <th >Test Driver URL</th>
                            <th >Show URL</th>
                            <th >Note</th>
                            <th >Range Days (1-7)</th>
                            <th >Extra Days (1-7)</th>
                            <th >Range Days (15-26)</th>
                            <th >Extra Days (15-26)</th>
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
                            $province_name = ''; 
                            $pro_id = $row['province_id']; 
                            $sub_query = "SELECT * FROM tbl_province WHERE pv_id='$pro_id'";
                            $province = $connect->query($sub_query);
                        
                            if ($province && $province->num_rows > 0) {
                                while($record = $province->fetch_assoc()) {
                                    $province_name = $record['pv_title']; 
                                }
                            }
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["ve_id"]."'>".$row["ve_title"]."</a></td>";
                                echo "<td>
                                   <img width='100px' height='100px' src='../image/vehicle_rental/".$row["ve_image"]."'>
                                    <a href='add_img.php?id=".$row["ve_id"]."'  class='btn green'>Add
                                        <i class='fa fa-plus'></i>
                                    </a>
                                     </td>";

                                echo "<td>".$row["ve_ref_no"]."</td>";
                                echo "<td>".$province_name."</td>";
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