<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<style>
    table *{ white-space:nowrap; }
</style>
<?php
 if(isset($_POST['btn_trail'])){
    $package_id=@$_GET['id'];
    $user_buy_id=@$_SESSION["user"]->user_id;
    $today=date("Y-m-d");
    $today_buy = date("Y-m-d");
    $v_sql = "SELECT * FROM tbl_package_position WHERE  p_id='$package_id'";
    $result = $connect->query($v_sql);
    if ($result->num_rows > 0){
    if($row = $result->fetch_assoc()){
     $sum_date=$row['try'];
     }
   }
   else {
     $sum_date=1;
   }

    
    $expired_date=date('Y-m-d', strtotime($today_buy."+$sum_date".'days'));
    $query_add = "
    insert into tbl_buy_package (status,date_expired,package_id, user_buy_id,buy_date,position_id,try,period,price,discount,description,post_limit) 
        values
        ('1','$expired_date','$package_id','$user_buy_id','$today',
            (select position_id from tbl_package_position where p_id='$package_id'), 
            (select try from tbl_package_position where p_id='$package_id'), 
            (select period from tbl_package_position where p_id='$package_id'), 
            (select price from tbl_package_position where p_id='$package_id'),
            (select discount from tbl_package_position where p_id='$package_id'),
            (select description from tbl_package_position where p_id='$package_id'),
            (select post_limit from tbl_package_position where p_id='$package_id')
        )
        ";
            if($connect->query($query_add)){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> '.mysqli_error($connect).'...
                </div>';   
            }




 }
?>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
             <?= @$sms ?>
        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>Service Package Information</h2>
        </div>
    </div>
    <div class="portlet-title">
      
      
    </div>
    <div class="portlet-body">
       <div class="form-group ">
          <button class="btn btn-danger center-block"  style="background-color:#a4509f;">Position Package Information</button>
        </div>
        <form action="" method="POST">
       
        <div class="table-responsive">
                <table class="table table-bordered">
                <caption class="caption-basic">View Information</caption>
                    <tbody><tr>
                        <th>No</th>
                       <th>Package Type</th>
                        <th>Trial</th>
                        <th>Period</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Limit</th>
                        <th>Payment</th>
                       
                    </tr>
                    <?php
                     $id = @$connect->real_escape_string($_GET['id']);
                     $v_sql = "SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id where  p_id='$id'";
                        $result = $connect->query($v_sql);
                      
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                              $text_description="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub+(10)/100;
                                $text_description=$row['description'];
                    ?>
                      <tr id="1">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['try']; ?> Days</td>
                        <td><?php echo $row['period']; ?> Days
                        </td>
                        <td>$ <?php echo number_format($row['price'],2); ?></td>
                        <td>$ <?php echo number_format($row['discount'],2); ?></td>
                        <td>$ <?php echo number_format($total,2); ?></td>
                        <td><?php echo $row['post_limit']; ?></td>
                        <td>
                         <input type="submit" name="btn_trail" class="btn-primary" id="checkout_button" value="TRAIL">
                        </td>
                      
                    </tr> 

                  

                    
                    <?php }}  ?>
                       
                </tbody>
              </table>
               <?php echo $text_description; ?>
            </div>
             </form>
       
          
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