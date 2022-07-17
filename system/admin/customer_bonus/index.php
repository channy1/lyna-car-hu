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
            <h2><i class="fa fa-user fa-fw"></i>Customer Bonus Control Panel</h2>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <a href="add.php">
                <button class="btn  btn-primary btn-circle"><i class="fa fa-plus"></i> Add New</button>
            </a>
        </div>
    </div>  
    <br>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_2" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr>
                        <th>N<sup>o</sup></th>
                        <th class="text-right">Expense Amount</th>
                         <th class="text-right"> Bonus Amount</th>
                        <th>Action</th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $i = 0 ; 
                     $query="SELECT * FROM tbl_bonus  ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            $i++; 
                    ?>
                   <tr>
                            <td><?php echo $i; ?></td>
                            <td class="text-right"><?php echo $row['amount'] ?></td>
                             <td class="text-right"><?php echo $row['bonus_amount'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']  ?>">
                                    <button class="btn btn-sm btn-bircle btn-primary"> <i class="fa fa-edit"></i> Edit</button>
                                </a>
                                <a href="delete.php?id=<?php echo $row['id'] ?>" >
                                    <button class="btn btn-sm btn-bircle btn-danger"> <i class="fa fa-trash-o"></i> delete</button>
                                </a>
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