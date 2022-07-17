<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_ft_img_foooter";
    $result = $connect->query($v_sql);
    

?>
<style>
    .footer_menu #f_menu{
        background-color:#a4509f ;
        text-decoration:none;
        padding:8px;
        color:white;
        font-size:15px;
    }
    .footer_menu #f_menu:hover{
        background-color:#337ab7;
        color:white;
    }
    .active_ft{
        background-color:#337ab7 !important ;
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
            <h2><i class="fa fa-user fa-fw"></i>IMAGES FOOTER CONTROL PANEL</h2>
        </div>
    </div>
    <div class="footer_menu"> 
       
        <a id="f_menu" class="active_ft" href="../footer_img_footer/">Images Footer</a>
        <a id="f_menu" href="../footer_phone/">Phone Footer</a>
        <a id="f_menu" href="../footer_menu/">Menu</a>
        <a id="f_menu" href="../footer_any_text/">Copyright</a>
    </div>
    <br><hr>
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
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th style="width:30%;">Link</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                       
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td><a href='edit.php?edit_id=".$row["ft_id"]."'>".$row["ft_title"]."</a></td>";
                                echo "<td>".$row["ft_detail"]."</td>";
                                echo '<td class="text-center">';
                                echo '<a href="edit.php?edit_id='.$row["ft_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                                echo '</td>';
                            echo "</tr>";
                        }
                    }
                    else {
                       
                    }
                    ?> 
                </tbody>
            </table>
            <a href="https://fontawesome.com/icons?d=gallery" style="font-size:13px;text-decoration:underline;" target="blank" >Choose any icon HERE!</a>
        </div>
    </div>


</div>

</div>




<?php include_once '../layout/footer.php' ?>