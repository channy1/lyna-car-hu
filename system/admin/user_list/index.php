<?php 
    $menu_active =10;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>User Administrator</h2>
        </div>
    </div>
    
    <br>
    <br>

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
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" style="width: 1180px;">
                <thead>
                    <tr role="row">
                        <th>N&deg; #</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th class="text-center">Photo</th>
                      
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $user_query = $connect->query("SELECT * FROM tbl_users  WHERE tbl_users.user_position='1'

                            ");
                        $no = 0;
                        while ($row_user = mysqli_fetch_object($user_query)) {
                            echo '<tr>';
                                echo "<td>".(++$no)."</td>";
                                echo "<td>$row_user->user_name</td>";
                                echo "<td>$row_user->user_first_name</td>";
                                echo "<td>$row_user->user_last_name</td>";
                                echo '<td class="text-center">';
                                        echo '*** ';
                                        echo '<a href="edit_password.php?edit_id='.$row_user->user_id.'" class="btn btn-xs btn-danger" title="edit_password"> Change Password </a> '; 
                                echo '</td>';
                                echo "<td>$row_user->user_email</td>";
                                echo "<td class='text-center'>";
                                    echo "<img src='../../img/img_user/".trim($row_user->user_photo)."' width='20px'>";
                                    echo '<a href="#" title="edit photo"><i class="fa fa-pencil fa-fw"></i></a>';
                                echo "</td>";
                               
                               
                                echo '<td class="text-center">';
                                    echo '<a href="edit_permission.php?edit_id='.$row_user->user_id.'" class="btn btn-xs btn-info" title="edit"> Permission </a> '; 
                                    echo '<a href="edit.php?edit_id='.$row_user->user_id.'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i></a> '; 
                                    
                                //    echo '<a href="delete.php?del_id='.$row_user->user_id.'&del_img='.trim($row_user->user_photo).'" onclick="return confirm(\'Are u sure to  delete this user?\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-trash"></i></a> ';
                                    
                                    echo '</td>';
                            echo '</tr>';
                        }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>




<?php include_once '../layout/footer.php' ?>
