<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
    
?>

<?php 
    if(isset($_POST['btn_add'])){

            // $v_image = @$_FILES['txt_image'];

            // if($v_image["name"] != ""){
            //     $new_name = date("Ymd")."_".rand(1111,9999).".png";
            //     move_uploaded_file($v_image["tmp_name"],"../image/vehicle_rental/".$new_name);
            // }else{
            //     $new_name = "blank.png";
            // }

            $v_ref_no = @$connect->real_escape_string($_POST['txt_ref_no']);
            $v_vat_no = @$connect->real_escape_string($_POST['txt_vat_no']);
            $v_subject = @$connect->real_escape_string($_POST['txt_vat_no']);
            $v_range = @$connect->real_escape_string($_POST['txt_range_day']);
            $v_des_from = @$connect->real_escape_string($_POST['txt_destination_from']);
            $v_des_to = @$connect->real_escape_string($_POST['txt_destination_to']);
            $v_period_from = @$connect->real_escape_string($_POST['txt_period_from']);
            $v_period_to = @$connect->real_escape_string($_POST['txt_period_to']);
            $v_customer = @$connect->real_escape_string($_POST['txt_customer']);
            $v_date_sign = @$connect->real_escape_string($_POST['txt_date_sign']);
            $v_total_fee = @$connect->real_escape_string($_POST['txt_total_fee']);
            $v_discount = @$connect->real_escape_string($_POST['txt_discount']);
            $v_total_vat = @$connect->real_escape_string($_POST['txt_total_vat']);
            $v_total_refun = @$connect->real_escape_string($_POST['txt_total_refundable_deposit']);
            $v_net_total = @$connect->real_escape_string($_POST['txt_net_total']);
            $v_user = @$connect->real_escape_string($_POST['txt_user']);
            $v_date_created = @$connect->real_escape_string($_POST['txt_date_create']);
            $v_date_updated = @$connect->real_escape_string($_POST['txt_date_updated']);
            
            $query_add = "INSERT INTO tbl_quotation (
                    q_ref_no,
                    q_vat_no,
                    q_subject,
                    q_range_day_type,
                    q_destination_from,
                    q_destination_to,
                    q_period_from,
                    q_period_to,
                    q_customer,
                    q_date_sign,
                    q_total_fee,
                    q_discount,
                    q_total_vat,
                    q_total_refundable,
                    q_net_total,
                    user_id,
                    date_created,
                    date_updated,
                    q_menu_type
                    ) VALUES(
                    '$v_ref_no',
                    '$v_vat_no',
                    '$v_subject',
                    '$v_range',
                    '$v_des_from',
                    '$v_des_to',
                    '$v_period_from',
                    '$v_period_to',
                    '$v_customer',
                    '$v_date_sign',
                    '$v_total_fee',
                    '$v_discount',
                    '$v_total_vat',
                    '$v_total_refun',
                    '$v_net_total',
                    '$v_user',
                    '$v_date_created',
                    '$v_date_updated',
                    '1'
                    )";
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
        //}else{
        //     $sms = '<div class="alert alert-danger">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <strong>Error!</strong> Please Insert Image ...
        //         </div>';
        // }
    }

 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Create Record</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="index.php" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading" style="color: #fff;background-color:#767676;border-color: #337ab7;">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body" style="margin-top: -15px;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                        <div style="background-color:#DA9695;">
                            <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Ref No:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_ref_no" placeholder="Enter Ref No" autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">VAT No:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_vat_no" placeholder="Enter VAT No"  autocomplete="off">
                                  </div>
                                </div>
                            </div>
                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Subject:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="text" class="form-control" name="txt_subject" placeholder="Enter Subject"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Range Day type:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_range_day" placeholder="Enter Range Day type"  autocomplete="off">
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:#B1A0CA;">
                           <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Destination From:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_destination_from" placeholder="Enter Destination From"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Destination To:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_destination_to" placeholder="Enter Destination to"  autocomplete="off">
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Period From:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="date" class="form-control" name="txt_period_from" placeholder="Enter Period From"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Period To:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="date" class="form-control" name="txt_period_to" placeholder="Enter Period to"  autocomplete="off">
                                  </div>
                                </div>
                            </div>
                            
                         </div>
                         <div style="background-color:#CDCDCD">
                            <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Customer:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <select name="txt_customer" class="form-control" required>
                                        <option value="">==============Select Customer==============</option>
                                        <?php
                                            $v_sql = "SELECT * FROM tbl_users where user_position='2' and user_first_name !='' group by user_first_name ";
                                            $result = $connect->query($v_sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                          
                                        ?>
                                        <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?></option>
                                    <?php }} ?>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Date Sign:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="date" class="form-control" name="txt_date_sign" placeholder="Enter Date Sign"  autocomplete="off">
                                  </div>
                                </div>
                            </div>
                          <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Total Fee:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="text" class="form-control" name="txt_total_fee" placeholder="Enter Total Fee"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Discount:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="text" class="form-control" name="txt_discount" placeholder="Enter Discount"  autocomplete="off">
                                  </div>
                                </div>
                            </div>

                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Total VAT:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="text" class="form-control" name="txt_total_vat" placeholder="Enter Total VAT"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Total Refundable Deposit:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="text" class="form-control" name="txt_total_refundable_deposit" placeholder="Enter Total Refundable Deposit"  autocomplete="off">
                                  </div>
                                </div>
                            </div>
                           
                            <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Net Total:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_net_total" placeholder="Enter Net Total"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">User:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_user" placeholder="Enter User"  autocomplete="off">
                                  </div>
                                </div>
                            </div>

                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Date Created:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="date" class="form-control" name="txt_date_create" placeholder="Enter Date Created"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Date Updated:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <input type="date" class="form-control" name="txt_date_updated" placeholder="Enter Date Updated"  autocomplete="off">
                                  </div>
                                </div>
                            </div>
                            <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Date Updated:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                  <input type="date" class="form-control" name="txt_date_updated" placeholder="Enter Date Updated"  autocomplete="off">
                                  </div>
                                </div>
                                <div style="background-color:#959595 !important;color: white;width: 50%;float: right;padding: 10px;">
                               
                                 
                                  <div style="width: 47%;float: right;"> <button type="reset" style="background: none;border: none;font-size: 18px;">Clear</button></div>
                                  <div style="width: 15%;float: right;"> <button type="submit" name="btn_add" style="background: none;border: none;font-size:18px;">Add</button></div>
                                
                              </div>
                              </div>
                           
        
                              </div>

                        </div>
                    </div>
                    <!-- <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div> -->
                </form><br>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'detail', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
</script>

<style type="text/css">
.form-group {
    margin-bottom:0px;
}
</style>
<?php include_once '../layout/footer.php' ?>
