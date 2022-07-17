<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
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
            <h2><i class="fa fa-user fa-fw"></i>Membership Package</h2>
        </div>
    </div>
    <div class="portlet-title">
      
      
    </div>
    <div class="portlet-body">
       <div class="form-group ">
          <button class="btn btn-danger center-block"  style="background-color:#a4509f;">Position Package Information</button>
        </div>
      
        <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">1. CAR'S OWNER - MEMBERSHIP</caption>
                    <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                       
                        <th>Action</th>
                    </tr>
                    <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=1";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>                      
                        <td align="center">
                           <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                                 
                       
                       
                </tbody></table>
            </div>
   


        <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">2. RICKSHAW'S OWNER - MEMBERSHIP</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        
                        <th>Action</th>
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
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                       
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                    
                </table>
            </div>


              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">3. HOTEL & GUESTHOUSE - MEMBERSHIP</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                       
                        <th>Action</th>
                    </tr>
                                <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=3";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                      
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>

              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">4. TOUR GUIDE - MEMBERSHIP</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                       
                        <th>Action</th>
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
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                      
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
           <!--   <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">5-AIRPORT TRANSFER</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                       
                        <th>Action</th>
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
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                        <td><?php echo $row['post_limit']; ?></td>
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>-->

           <!--   <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">6-PICKUP & DROP OFF</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        
                        <th>Action</th>
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
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                        <td><?php echo $row['post_limit']; ?></td>
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                       
                </tbody>
                </table>
            </div>-->
         
            <!--  <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">7-TOUR GUIDE</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                       
                        <th>Action</th>
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
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                        
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>-->
           
              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">5. DRIVER - MEMBERSHIP</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                       
                        <th>Action</th>
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
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                       
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                       
                </tbody>
                </table>
            </div>
           
              <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">6. INTROUCER - MEMBERSHIP</caption>
                       <tbody><tr>
                        <th>No</th>
                        <th>System Package</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        
                        <th>Action</th>
                    </tr>
                        
                       <?php
                    $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where level_id=9";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?></td>
                        <td>1 Year
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $total; ?></td>
                        
                        <td align="center">
                          <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr> 
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