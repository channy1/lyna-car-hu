<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    $id=@$_SESSION['user']->user_id;
?>
<div class="portlet light bordered">


    

    <div class="row">
        <div class="col-xs-12">
           <center><h2>PRODUCTS RENTAL PLANNER</h2></center>
        </div>
    </div>

    <!-- calender start -->
    <div class="row">
        
        <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Ref. N&deg;</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Customer Title</th>
                  <th scope="col">From</th>
                  <th scope="col">To</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query="SELECT * FROM tbl_schedule_admin where user_id = '$id'
                                 ORDER BY se_id DESC LIMIT 150
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td><?php echo $row['customer_name']; ?></td>
                  <td><?php echo $row['sc_title']; ?></td>
                  <td><?php echo $row['from_date']; ?></td>
                  <td><?php echo $row['to_date']; ?></td>
                  <td>
                   <a href="edit.php?edit_id=<?php echo $row['se_id']; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
                   </a>
                    <a href="dalete.php?delete_id=<?php echo $row['se_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
                  </td>
                </tr>
                <?php
                   }
                  }
                ?>
                
                
              </tbody>
      </table>

    </div>
    <!-- end calendar -->

        <br>
    
    




</div>



<style type="text/css">
    
    table th ,td {
        border: 1px solid black;
        text-align:center;
    }
   
</style>
<?php include_once '../layout/footer.php' ?>

