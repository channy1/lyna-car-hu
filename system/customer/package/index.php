<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id";
    $result = $connect->query($v_sql);
?>
 <?php
             $check_member_type="";
            $id=@$_SESSION['user']->user_id;
            $v_sql = "SELECT * FROM tbl_relationship_users_position WHERE user_id='$id'";
            $result = $connect->query($v_sql);
            if ($result->num_rows > 0){
             if($row = $result->fetch_assoc()){
             $check_member_type=$row['user_position_id'];

            ?>



            <?php
             }}
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
            <h2><i class="fa fa-user fa-fw"></i>Service Package</h2>
        </div>
    </div>
    <div class="portlet-title">
      
      
    </div>
    <div class="portlet-body">
       <div class="form-group ">
          <button class="btn btn-danger center-block"  style="background-color:#a4509f;">Position Package Information</button>
        </div>
         <?php   if($check_member_type=="5") {
            // car_owner
           ?>
        <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">1-CAR OWNER</caption>
                    <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                    <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=1";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                              $price=0;
                              $decount=0;
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                                $price=$row['price'];
                                $decount=$row['discount'];
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($price,2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($decount,2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                                 
                       
                       
                </tbody></table>
            </div>
                  <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">2-PICKUP & DROP OFF</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                                      
                                       <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=6";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>

               <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">3-AIRPORT TRANSFER</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                    <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=5";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>

             <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">4-CITY TOUR</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                     <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=4";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                       <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
    <?php } ?>

 <?php   if($check_member_type=="6") {
            // Richswaw
           ?>
        
        <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">1-RICKSHAW'S OWNER</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <td>Limit</td>
                        <th>Order</th>
                    </tr>
                           
                         <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=2";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                    
                </table>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">2-PICKUP & DROP OFF</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                                      
                                       <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=6";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>

               <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">3-AIRPORT TRANSFER</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                    <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=5";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>

             <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">4-CITY TOUR</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                     <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=4";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                       <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
<?php } ?>
     <?php   if($check_member_type=="9") {
            // HOTEL & GUESTHOUSE
           ?>

              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">3-HOTEL & GUESTHOUSE</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>VAT</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                                <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=3";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub+(10)/100;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>
<?php } ?>
<?php   if($check_member_type=="4") {
            //  CITY TOUR
           ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">4-CITY TOUR</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                     <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=4";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                     <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
        <?php
          }
        ?>
        <?php   if($check_member_type=="11") {
            // AIRPORT TRANSFER
           ?>

              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">5-AIRPORT TRANSFER</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                    <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=5";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
            <?php } ?>
<?php   if($check_member_type=="3") {
            //  PICKUP & DROP OFF
           ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">6-PICKUP & DROP OFF</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                                      
                                       <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=6";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>
            <?php } ?>
          <?php   if($check_member_type=="7") {
            // tour quide
           ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">7-TOUR GUIDE</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>

                       <?php

                       
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=7";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                     <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
            <?php } ?>
            <?php
              if($check_member_type=="8") {
                // 8-DRIVER
            ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">8-DRIVER</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                                      

                       <?php
                     
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=8";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                     <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
            <?php } ?>
            <?php   if($check_member_type=="10") {
            //INDROUCER
           ?>
              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">9-INDROUCER</caption>
                       <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                       <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Order</th>
                    </tr>
                        
                       <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=9";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                  $total=$row['price']-$sub+(10)/100;
                    ?>
                       <tr id="1">
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $i++; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['title']; ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['try']; ?> Days</a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['period']; ?> Days</a>
                        </td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['price'],2); ?></a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo number_format($row['discount'],2); ?></a></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo number_format("10",2) ?> %</a></td>
                        <td style="text-align: right;"><a href="view_info.php?id=<?php echo $row['p_id']; ?>">$ <?php echo  number_format($total,2); ?></td>
                        <td><a href="view_info.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['post_limit']; ?></a></td>
                        <td align="center">
                           <a href="view_info.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">ABA</a>
                           <a href="view_info_wing.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">WING</a>
                           <a href="view_info_trail.php?id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">TRIAL</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
             </table>
            </div>
            <?php  } ?>
              
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