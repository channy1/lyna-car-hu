<?php 
    $menu_active =10;
    $layout_title = "Welcome to User Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';  
    include_once '../layout/header.php';
    // $connect->close();
?>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>User Type</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 1180px;">
                <thead>
                    <tr role="row">
                        <th>No</th>
                        <th>User Position</th>
                        <th>Permission</th>
                        <th>Note</th>
                        <th></th>
                        <th></th>
                        <th class="text-center">Action <i class="fa fa-cog fa-spin"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $query = "SELECT * FROM tbl_user_position";
                          $result = $connect->query($query);
                            $no = 0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                        ?>
                        
                      
                        <tr>
                            <td><?php echo ++$no; ?></td>
                            <td><?php echo $row['up_name']; ?></td>
                            <td><?php echo $row['up_assign']; ?></td>
                            <td><?php echo $row['up_note']; ?></td>
                            <td></td>
                            <td></td>
                            <td class="text-center">
                                <a href="edit.php?edit_id=<?php echo $row['up_id']; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i></a>
                            </td>

                        </tr>

                      
                <?php
                        }
                    }
                        // mysqli_close($connect);
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include_once '../layout/footer.php' ?>
