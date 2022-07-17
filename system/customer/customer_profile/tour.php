<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
	


?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
   
    <div class="portlet-title">
       
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                        <th style="width:30%;">transactionId</th>
                        <th>PickUp Date</th>
                        <th>RETURN DATE</th>
                        <th>Pay Online</th>
                        <th>Refund Deposit</th>
                        <th>Book Date</th>
                        <th>Duration Day</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      $customer_id=@$_SESSION["user"]->user_id;
                        $v_sql = "SELECT * FROM tbl_book_tour where user_book_id='$customer_id' ";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        	?>
                            <tr>
                               <td><a href="../customer_profile/tour_view.php?id=<?php echo $row['book_tour_id']; ?>"><?php echo $row["transactionId"]; ?></a></td>
                               <td><a href="../customer_profile/tour_view.php?id=<?php echo $row['book_tour_id']; ?>"><?php echo $row["pickup_date"]; ?></a></td>
                               <td><a href="../customer_profile/tour_view.php?id=<?php echo $row['book_tour_id']; ?>"><?php echo $row["return_date"]; ?></a></td>
                               <td><a href="../customer_profile/tour_view.php?id=<?php echo $row['book_tour_id']; ?>">$ <?php echo $row["amount_web_pay"]; ?></a></td>
                               <td><a href="../customer_profile/tour_view.php?id=<?php echo $row['book_tour_id']; ?>">$ <?php echo $row["refund_deposit"]; ?></a></td>
                               <td><a href="../customer_profile/tour_view.php?id=<?php echo $row['book_tour_id']; ?>"><?php echo $row["book_date"]; ?></a></td>
                               <td><a href="../customer_profile/tour_view.php?id=<?php echo $row['book_tour_id']; ?>"><?php echo $row["total_day"]; ?> Day(s)</a></td>
                                
                           </tr>
                    <?php 

                      }}
                    ?> 
                </tbody>
            </table>
        </div>
    </div>


</div>

</div>


<?php include_once '../layout/footer.php' ?>
