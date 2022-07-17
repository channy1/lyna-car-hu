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
<?php 
  // select old date buy
 $inception_date="";
                        $user_booking=@$_SESSION['user']->user_id;
                        $v_sql = "SELECT count(tbl_buy_package.buy_package_id) as renew_time, tbl_buy_package.*,tbl_users.*,tbl_package.* FROM tbl_buy_package 
                        INNER JOIN tbl_users  ON tbl_users.user_id=tbl_buy_package.user_buy_id 
                        INNER JOIN tbl_package_position  ON tbl_package_position.p_id=tbl_buy_package.package_id 
                        INNER JOIN tbl_package  ON tbl_package.package_id=tbl_package_position.package_id
                        where user_buy_id='$user_booking' and status !=1 ORDER BY buy_package_id ASC LIMIT 1";
                        $result = $connect->query($v_sql);
                     
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                               $inception_date=$row['buy_date'];
                               $renew_time=$row['renew_time'];
                    }
                  }
?>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>History Package</h2>
        </div>
    </div>
    <div class="portlet-title">
      
      
    </div>
    <div class="portlet-body">
       <div class="form-group ">
          <button class="btn btn-danger center-block"  style="background-color:#a4509f;"> Package History</button>
        </div>

              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">History Information</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>Customer</th>
                          <th>Package Type</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Buy Date</th>
                        <th>Expired Date</th>
                        <th>Status</th>
                       
                    </tr>
                    <?php
                        $user_booking=@$_SESSION['user']->user_id;
                        $v_sql = "SELECT tbl_buy_package.*,tbl_users.*,tbl_package.* FROM tbl_buy_package 
                        INNER JOIN tbl_users  ON tbl_users.user_id=tbl_buy_package.user_buy_id 
                        INNER JOIN tbl_package_position  ON tbl_package_position.p_id=tbl_buy_package.package_id 
                        INNER JOIN tbl_package  ON tbl_package.package_id=tbl_package_position.package_id
                        where user_buy_id='$user_booking' ORDER BY buy_package_id DESC";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                              $sum_total=0;
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub+(10)/100;
                                if($row['status'] !=1){
                                  $sum_total +=$total;
                                }
                                
                    ?>
                    <?php
                       if($row['status'] ==2 || $row['status'] ==3) {
                    ?>
                      <tr id="1">
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['user_last_name']; ?> <?php echo $row['user_first_name']; ?></a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['period']; ?> Days
                        </a></td>
                        <td style="text-align: right;"><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td style="text-align: right;"><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>">$ <?php echo number_format($total,2); ?></a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['buy_date']; ?></a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php echo $row['date_expired']; ?></a></td>
                        <td><a href="history_more.php?id=<?php echo $row['buy_package_id']; ?>"><?php 
                          if($row["status"]=="1") {
                            echo "Trail";
                          }
                          elseif ($row["status"]=="2") {
                            echo "ABA";
                          }
                          elseif ($row["status"]=="3") {
                              echo "WING";
                          }
                          else {
                            echo "Trial";
                          }
                         ?></a></td>
                       
                    </tr>
                    <tr style="border: 0 !important;"> 
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="text-align: right;">Renewal Times  :        </td>
                      <td style="text-align: right;color:#a4509f;font-weight: 600;"><?php echo $renew_time; ?> </td>
                    </tr>
                    <tr> 
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="text-align: right;">Total Paid :</td>
                      <td style="text-align: right;color:#a4509f;font-weight: 600;">$ <?php echo number_format($sum_total,2); ?></td>
                    </tr>
                    <tr> 
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="border: 0 !important;"></td>
                      <td style="text-align: right;">Inception Date :</td>
                      <td style="text-align: right;color:#a4509f;font-weight: 600;"><?php echo $inception_date; ?></td>
                    </tr>
                    <?php } else { ?>
                    <tr id="1">
                        
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $i++; ?></td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['user_last_name']; ?> <?php echo $row['user_first_name']; ?></td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['title']; ?></td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['try']; ?> Days</td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['period']; ?> Days
                        </td>
                        <td style="text-align: right;"><i style="color: red;" class="fa fa-exclamation-triangle"></i> $ <?php echo number_format($row['price'],2); ?></td>
                        <td style="text-align: right;"><i style="color: red;" class="fa fa-exclamation-triangle"></i> $ <?php echo number_format($row['discount'],2); ?></td>
                        <td style="text-align: right;"><i style="color: red;" class="fa fa-exclamation-triangle"></i> $ <?php echo  number_format($total,2); ?></td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['post_limit']; ?></td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['buy_date']; ?></td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php echo $row['date_expired']; ?></td>
                        <td><i style="color: red;" class="fa fa-exclamation-triangle"></i> <?php 
                          if($row["status"]=="1") {
                            echo "Trail";
                          }
                          elseif ($row["status"]=="2") {
                            echo "ABA";
                          }
                          elseif ($row["status"]=="3") {
                              echo "WING";
                          }
                          else {
                            echo "Trail";
                          }
                         ?></td>
                       
                    </tr> 

                    <?php } ?>


                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>    
           
    </div>


</div>

</div>


<style type="text/css">
.caption-basic {
    color: #FFF;
    padding-left: 10px;
    background-color: #a4509f;
    border-color: #BCE8F1;
    font-size: 12px;
}
</style>


<?php include_once '../layout/footer.php' ?>