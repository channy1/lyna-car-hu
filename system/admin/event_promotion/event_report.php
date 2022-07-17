<?php 
    $menu_active =9;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM event_registeration ";
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
            <h2><i class="fa fa-user fa-fw"></i> EVENTS RAGISTRATION REPORT</h2>
        </div>
    </div>
	
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed example" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($result->num_rows > 0) {
							$i =1;
                        while($row = $result->fetch_assoc()) {
                     ?> 
                     <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["phone"];?> </td>
                        <td><?php echo date('M d, Y', strtotime($row["created_on"]));?> </td>    
                    </tr>
                    <?php 
						$i++; 
						}
                    } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>

</div>

<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready(function() {
    $('.example').DataTable();
} );


</script>


<?php include_once '../layout/footer.php' ?>