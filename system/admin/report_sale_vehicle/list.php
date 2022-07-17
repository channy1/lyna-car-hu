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
           <center><h2>Product sale reports</h2></center>
        </div>
    </div>

    <!-- calender start -->
    <div class="row">
        
        <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">N&deg;</th>
                  <th scope="col">Buyer Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Buyer Address</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Discount(%)</th>
                  <th scope="col">Total Discount</th>
                  <th scope="col">Net Sale</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query="SELECT * FROM tbl_sale_product_report 
                                INNER JOIN tbl_users
                                ON tbl_users.user_id=tbl_sale_product_report.customer_id
                                
                                 ORDER BY product_id DESC LIMIT 150
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td style="text-align: left;"><?php echo $row['user_first_name'].' '.$row['user_last_name']; ?></td>
                  <td><?php echo $row['start_date']; ?></td>
                  <td><?php echo $row['user_phone_number']; ?></td>
                  <td><?php echo $row['buyer_address']; ?></td>
                  <td>$<?php echo number_format($row['sale_mount'],2); ?></td>
                  <td><?php echo number_format($row['discount_pre'],2); ?>%</td>
                  <td>$<?php echo number_format($row['discount_record'],2); ?></td>
                  <td>$<?php echo number_format($row['net_sale'],2); ?></td>
                  <td>
                   <a href="edit.php?edit_id=<?php echo $row['product_id']; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
                   </a>
                    <a href="dalete.php?delete_id=<?php echo $row['product_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
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

