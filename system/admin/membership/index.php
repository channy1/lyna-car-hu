<?php 
    $menu_active =8;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';

    $type = $_GET['type'];
    $posting_type_id = 1; 
    $title = "Car's Owner"; 
    if(isset($_GET['type'])){
        if($type == 'car_owner'){
            $posting_type_id = 1; 
            $title = "Car's Owner";  
        }else if($type == 'rickshaw_owner') {
            $posting_type_id = 2; 
            $title = "Rickshaw's Owner";
        }else if($type == 'hotel_guesthouse'){
            $posting_type_id = 3; 
            $title = "Hotel & Guesthouse"; 
        }else if($type == 'tour_guide'){
            $posting_type_id = 4; 
            $title = "Tour Guide"; 
        } else if($type == 'driver'){
            $posting_type_id = 5; 
            $title = "Driver"; 
        }else if($type == 'introducer'){
            $posting_type_id = 6;
            $title = "Introducer"; 
        } 
    }
    $v_sql = "SELECT * FROM tbl_membership where posting_type_id = ".$posting_type_id;
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
            <h2><i class="fa fa-user fa-fw"></i><?php echo $title; ?> Membership CONTROL PANEL</h2>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="add.php?type=<?php echo $type ;?>" id="sample_editable_1_new" class="btn green"> Add New
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
                    <th>N<sup>o</sup></th>
                    <th>Membership Type</th>
                    <th>Trial</th>
                    <th>Period</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Dis. %</th>
                    <th class="text-right">N. Pay</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            $i = 0 ; 
                        while($row = $result->fetch_assoc()) {
                            $i = $i + 1; 
                            echo "<tr>";
                                echo "<td>".$i."</td>";
                                echo "<td>".$row["membership_type_description"]."</td>";
                                echo "<td>".$row["trial"]."</td>";
                                echo "<td>".$row["period"]."</td>";
                                echo "<td class='text-right'>".$row["price"]."</td>";
                                echo "<td class='text-right'>".$row["discount"]."</td>";
                                echo "<td class='text-right'>".$row["num_pay"]."</td>";
                                echo '<td class="text-center">';
                                    echo '<br><a href="edit.php?edit_id='.$row["id"].'&type='.$type.'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                                    echo '<a href="dalete.php?delete_id='.$row["id"].'&type='.$type.'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';
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