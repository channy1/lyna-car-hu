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
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
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
                         <input type="button" class="btn-primary" id="checkout_button" value="WING">
                        </td>
                      
                    </tr> 
<?php
$continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'Lyna-CarRental/system/partner/package/view_info_wing.php?id='.$_GET['id'];
?>
                    <form action="https://wingsdk.wingmoney.com:334/" method="POST">
<div>
<label for=" username">Username:</label>
<input name=" username" type="text" placeholder="Username" value="online.lynausd" />
</div>
<div>
<input checked="checked" name="bill_till_rbtn" type="radio" value="0" /> Bill Number
<input name="bill_till_rbtn" type="radio" value="1" /> Till Number
<input name="bill_till_number" type="text" value="5140" placeholder="Bill or Till Number" />
</div>
<div>
<input checked="checked" name="sandbox" type="checkbox" value="1" /> Sandbox
</div>
<div>
<label for="rest_api_key">Rest API Key:</label>
<input name="rest_api_key" type="text" placeholder="rest_api_key" value="b393bf057ee126587926fe3f6baa49dd252b77ffe6d78d8dfc115db173101049" />
</div>
<div>
<label for="wing_account">Wing Account:</label>
<input name="wing_account" type="text" value="" placeholder="Wing Account" />
</div>
<div>
<label for="amount">Amount:</label>
<input name="amount" type="text" value="1" placeholder="Amount" />
</div>
<div>
<label for="return_url">Return URL:</label>
<input name="return_url" type="text" value="<?php echo $continue_success_url; ?>" placeholder="Return URL" />
6
</div>
<div>
<label for="remark">Remark:</label>
<input name="remark" type="text" placeholder="Remark" />
</div>
<div>
<input name="default_wing" type="checkbox" value="1" /> Default Wing
<input name="remember_card" type="checkbox" value="0" /> Remember Card
</div>
<input name="pay" type="submit" value="Pay" />
</form>

                    
                    <?php }}  ?>
                       
                </tbody></table>
               <?php echo $text_description; ?>
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