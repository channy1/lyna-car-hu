<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    $customer_id=@$_SESSION["user"]->user_id;
    $v_sql = "SELECT * FROM tbl_hotel LEFT JOIN tbl_hotel_include_option  ON tbl_hotel.ht_id = tbl_hotel_include_option.hotel_id 
    WHERE add_by='$customer_id'  GROUP BY hotel_id";
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
        <!-- <div class="nav_tab">
                <a class="act" id="tab"  href="../city_tour/">Province</a>
                <a  id="tab" href="../city_tour_detail/">Place in Province</a>
            </div><br><br> -->
            <h2><i class="fa fa-user fa-fw"></i>HOTEL & GUESTHOUSE CONTROL PANEL</h2>
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
                        <th>Name</th>
                        <th style="width:10%;">Image</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Distance From City</th>
                        <th style="width:15%;">Discription</th>
                        <th style="width:10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["ht_id"]."'>".$row["ht_title"]."</a></td>";
                                echo "<td><img width='100px' height='100px' src='../../admin/image/hotel/".$row["ht_image"]."'>
                                <a href='add_img.php?id=".$row["ht_id"]."'  class='btn green'>Add
                                        <i class='fa fa-plus'></i>
                                    </a>
                                </td>";
                                echo "<td>".$row["ht_location"]."</td>";
                                echo "<td>".$row["ht_phone"]."</td>";
                                echo "<td>".$row["ht_website"]."</td>";
                                echo "<td>".$row["ht_distance"]."</td>";
                                echo "<td>".$row["ht_detail"]."</td>";
                                echo '<td class="text-center">';
                                echo '<a href="edit.php?edit_id='.$row["ht_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                                echo '<a href="dalete.php?delete_id='.$row["ht_id"].'&del_img='.trim($row["ht_image"]).'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';                                  
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