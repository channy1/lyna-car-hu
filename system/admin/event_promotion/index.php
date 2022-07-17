<?php 
    $menu_active =9;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_event_promotion ";
    $result = $connect->query($v_sql);
?> 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            <h2><i class="fa fa-user fa-fw"></i> EVENTS CONTROL PANEL</h2>
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
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th>No</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Event Type</th>
                        <th>Note</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                     ?> 
                      <tr>
                        <td><?php echo $row["e_pro_id"]; ?></td>
                         <td>
                          <img style="width:60px;" src="../image/img_event_promotion/<?php echo $row["images"]; ?>" alt="<?php echo $row["title"]; ?>">
                          <br>
                         <!-- <a href="add_img.php?id=<?php// echo $row['e_pro_id'] ?>"  class="btn green">Add
                                        <i class="fa fa-plus"></i>
                                    </a>-->
                        </td>
                        <td><a  href="../../../events.php?id=<?php echo $row["e_pro_id"]; ?>"><?php echo $row["title"]; ?></a>
                        </td>
                         <td>
                            <?php 
                             $type=$row["event_type"];
                              if($type=="1") {
                                echo "UPCOMING EVENTS";
                              }
                              elseif ($type=="2") {
                                echo "PAST EVENTS";
                              }
                              elseif ($type=="3") {
                                echo "SUBMIT A TALK IDEA";
                              }
                            ?>
                         </td>
                        <td>
                            <?php
                                    $string=$row['description']; 
                                    $string = strip_tags($string);
                                      if (strlen($string) >1100) {

                                          // truncate string
                                          $stringCut = substr($string, 0,1100);
                                          $endPoint = strrpos($stringCut, ' ');

                                          //if the string doesn't contain any space then it will cut without word basis.
                                          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                          $string .= "<br>...";
                                      }
                                      echo $string;

                                    ?>
                        </td>

                        <td class="text-center"><a href="edit.php?edit_id=<?php echo $row["e_pro_id"]; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> 
                        <a onclick="confirm_delete('<?php echo $row["e_pro_id"]; ?>')"  class="btn btn-xs btn-danger" title="delete"><i class="fa fa-delete"></i>Delete</a>
       
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

<script>
function confirm_delete(id){
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this event!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Poof! Your imaginary file has been deleted!", {
      icon: "success",
    });
	
	window.location.href = 'ajax_delete.php?delete_id='+id;
  } else {
    swal("Your event is safe!");
  }
});
}

</script>


<?php include_once '../layout/footer.php' ?>