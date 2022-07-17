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
           <center><h2>PRODUCTS MAINTENANCE & REPAIR REPORTS LIST</h2></center>
        </div>
    </div>

    <!-- calender start -->
    <div class="row">
        
        <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">N&deg;</th>
                  <th scope="col">Vendor Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query="SELECT * FROM tbl_repair 
                                 INNER JOIN tbl_vendor
                                 ON tbl_vendor.vendor_id=tbl_repair.vender_id
                                 WHERE status_report='1'
                                 ORDER BY report_id DESC LIMIT 150
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td style="text-align: left;"><?php echo $row['verdor_name']; ?></td>
                  <td><?php echo $row['add_date']; ?></td>
                  <td><?php echo $row['qty']; ?></td>
                  <td>$<?php echo number_format($row['record_price'],2); ?></td>
                  <td>$<?php echo number_format($row['record_discount'],2); ?></td>
                  <td>$<?php echo number_format($row['record_total'],2); ?></td>
                  <td>
                   <a href="edit.php?edit_id=<?php echo $row['report_id']; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
                   </a>
                    <a href="dalete.php?delete_id=<?php echo $row['report_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
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

