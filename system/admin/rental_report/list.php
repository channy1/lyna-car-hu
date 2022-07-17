<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<div class="portlet light bordered">


    

    <div class="row">
        <div class="col-xs-12">
           <center><h2>RENTAL LIST</h2></center>
        </div>
    </div>

    <!-- calender start -->
    <div class="row">
        
        <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">N&deg;</th>
                  <th scope="col">Vendor Name</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Discount(%)</th>
                  <th scope="col">Discount Record</th>
                  <th scope="col">After Discount</th>
                  <th scope="col">Commission(%)</th>
                  <th scope="col">Bonus Saving</th>
                  <th scope="col">Net Income</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query="SELECT * FROM tbl_rental_report 
                                 INNER JOIN tbl_users
                                 ON tbl_users.user_id=tbl_rental_report.customer_id
                                 WHERE status_type='1'
                                 ORDER BY start_date DESC LIMIT 150
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td style="text-align: left;"><?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?></td>
                  <td><?php echo $row['start_date']; ?></td>
                  <td><?php echo $row['end_date']; ?></td>
                  <td><?php echo $row['amount']; ?></td>
                  <td><?php echo $row['discount_pre']; ?></td>
                  <td>$<?php echo number_format($row['discount_record'],2); ?></td>
                  <td>$<?php echo number_format($row['after_discount'],2); ?></td>
                   <td><?php echo $row['commission']; ?></td>
                  <td>$<?php echo number_format($row['bonus_save'],2); ?></td>
                 
                  <td>$<?php echo number_format($row['net_income'],2); ?></td>
                 
                  <td>
                   <a href="edit.php?edit_id=<?php echo $row['rental_id']; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
                   </a>
                    <a href="dalete.php?delete_id=<?php echo $row['rental_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
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

