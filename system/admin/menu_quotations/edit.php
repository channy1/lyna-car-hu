<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_quotation WHERE q_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $ref_no = $row["q_ref_no"];
        $vat_no = $row["q_vat_no"];
        $subject = $row["q_subject"];

        $range_day_type=$row["q_range_day_type"];
        $des_from=$row["q_destination_from"];
        $des_to=$row["q_destination_to"];
        $period_from=$row["q_period_from"];
        $period_to=$row["q_period_to"];
        $customer=$row["q_customer"];
        $date_sign=$row["q_date_sign"];
        $total_fee=$row["q_total_fee"];
        $discount=$row["q_discount"];
        $total_vat=$row["q_total_vat"];
        $total_refun=$row["q_total_refundable"];
        $net_total=$row["q_net_total"];
        $user=$row["user_id"];
        $date_created=$row["date_created"];
        $date_updated=$row["date_updated"];
        }
    }
    else{}
?>

<?php 
    
     if(isset($_POST['btn_save'])){
    //         $v_image = @$_FILES['txt_image'];
    //         if($v_image["name"] != ""){
    //             $new_name = date("Ymd")."_".rand(1111,9999).".png";
    //             move_uploaded_file($v_image["tmp_name"], "../image/vehicle_rental/".$new_name);
    //         }else{
    //             $new_name = $image;
    //             //echo "<script> alert ('hello'); </script> ";
    //         }
            
        $v_ref_no =  @$connect->real_escape_string($_POST['txt_ref_no']);
        $v_vat_no =  @$connect->real_escape_string($_POST['txt_vat_no']);
        $v_subject =  @$connect->real_escape_string($_POST['txt_subject']);

        $v_range_day_type= @$connect->real_escape_string($_POST['txt_range_day']);
        $v_des_from= @$connect->real_escape_string($_POST['txt_destination_from']);
        $v_des_to= @$connect->real_escape_string($_POST['txt_destination_to']);
        $v_period_from=@$connect->real_escape_string($_POST['txt_period_from']);
        $v_period_to=@$connect->real_escape_string($_POST['txt_period_to']);
        $v_customer=@$connect->real_escape_string($_POST['txt_customer']);
        $v_date_sign=@$connect->real_escape_string($_POST['txt_date_sign']);
        $v_total_fee=@$connect->real_escape_string($_POST['txt_total_fee']);
        $v_discount=@$connect->real_escape_string($_POST['txt_discount']);
        $v_total_vat=@$connect->real_escape_string($_POST['txt_total_vat']);
        $v_total_refun=@$connect->real_escape_string($_POST['txt_total_refundable_deposit']);
        $v_net_total=@$connect->real_escape_string($_POST['txt_net_total']);
        $v_user=@$connect->real_escape_string($_POST['txt_user']);
        $v_date_created=@$connect->real_escape_string($_POST['txt_date_create']);
        $v_date_updated=@$connect->real_escape_string($_POST['txt_date_updated']);


            $query_add = "UPDATE tbl_quotation SET 
            q_ref_no ='$v_ref_no',
            q_vat_no = '$v_vat_no',
            q_subject = '$v_subject',
            q_range_day_type = '$v_range_day_type',
            q_destination_from = '$v_des_from',
            q_destination_to = '$v_des_to',
            q_period_from = '$v_period_from',
            q_period_to = '$v_period_to',
            q_customer = '$v_customer',
            q_date_sign = '$v_date_sign',
            q_total_fee = '$v_total_fee',
            q_discount = '$v_discount',
            q_total_vat = '$v_total_vat',
            q_total_refundable = '$v_total_refun',
            q_net_total = '$v_net_total',
            user_id = '$v_user',
            date_created = '$v_date_created',
            date_updated = '$v_date_updated'
            WHERE q_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }
}
 ?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_quotation WHERE q_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $ref_no = $row["q_ref_no"];
        $vat_no = $row["q_vat_no"];
        $subject = $row["q_subject"];

        $range_day_type=$row["q_range_day_type"];
        $des_from=$row["q_destination_from"];
        $des_to=$row["q_destination_to"];
        $period_from=$row["q_period_from"];
        $period_to=$row["q_period_to"];
        $customer=$row["q_customer"];
        $date_sign=$row["q_date_sign"];
        $total_fee=$row["q_total_fee"];
        $discount=$row["q_discount"];
        $total_vat=$row["q_total_vat"];
        $total_refun=$row["q_total_refundable"];
        $net_total=$row["q_net_total"];
        $user=$row["user_id"];
        $date_created=$row["date_created"];
        $date_updated=$row["date_updated"];
        }
    }
    else{}
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
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_ref_no" value="<?=$ref_no ?>" placeholder="Enter Ref No"  autocomplete="off">
                                    <label>Ref No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Ref No...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" value="<?=$ref_no ?>" name="txt_vat_no" placeholder="Enter VAT No"  autocomplete="off">
                                    <label>VAT No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter VAT No...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_subject" value="<?=$vat_no ?>" placeholder="Enter Subject"  autocomplete="off">
                                    <label>Subject
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Subject...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_range_day" value="<?=$range_day_type ?>" placeholder="Enter Range Day type"  autocomplete="off">
                                    <label>Range Day type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Range Day type...</span>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" value="<?=$des_from ?>" name="txt_destination_from" placeholder="Enter Destination From"  autocomplete="off">
                                    <label>Destination From
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Destination From...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" value="<?=$des_to ?>" name="txt_destination_to" placeholder="Enter Destination to"  autocomplete="off">
                                    <label>Destination To
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Destination to...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="date" class="form-control" name="txt_period_from" value="<?=$period_from ?>" placeholder="Enter Period From"  autocomplete="off">
                                    <label>Period From
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Period From...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="date" class="form-control" name="txt_period_to" value="<?=$period_to ?>" placeholder="Enter Period to"  autocomplete="off">
                                    <label>Period To
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Period to...</span>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <!-- <input type="text" class="form-control" name="txt_customer" placeholder="Enter customer"  autocomplete="off"> -->
                                    <select name="txt_customer" class="form-control" required>
                                        
                                        <?php
                                            $v_sql = "SELECT * FROM tbl_customer";
                                            $result = $connect->query($v_sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    if($row["cus_id"]==$customer)
                                                    echo "<option value='".$row["cus_id"]." ' selected>".$row["cus_name"]."</option>";
                                                    else
                                                    echo "<option value='".$row["cus_id"]."'>".$row["cus_name"]."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label>Customer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Customer...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input" data-date-format="yyyy-mm-dd" >
                                    <input type="date" class="form-control" value="<?=$date_sign ?>" name="txt_date_sign" placeholder="Enter Date Sign"  autocomplete="off">
                                     <label>Date Sign
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Total Fee...</span>
                                </div>

                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_total_fee" value="<?=$total_fee ?>" placeholder="Enter Total Fee"  autocomplete="off">
                                    <label>Total Fee
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Total Fee...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" value="<?=$discount ?>" name="txt_discount" placeholder="Enter Discount"  autocomplete="off">
                                    <label>Discount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Discount...</span>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_total_vat" value="<?=$total_vat ?>" placeholder="Enter Total VAT"  autocomplete="off">
                                    <label>Total VAT
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Total VAT...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_total_refundable_deposit" value="<?=$total_refun ?>" placeholder="Enter Total Refundable Deposit"  autocomplete="off">
                                    <label>Total Refundable Deposit
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Total Refundable Deposit...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_net_total" value="<?=$net_total ?>" placeholder="Enter Net Total"  autocomplete="off">
                                    <label>Net Total
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Net Total...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_user" placeholder="Enter User" value="<?=$user ?>"  autocomplete="off">
                                    <label>User
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter User...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="date" class="form-control" name="txt_date_create" value="<?=$date_created ?>" placeholder="Enter Date Created"  autocomplete="off">
                                    <label>Date Created
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Date Created...</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="date" class="form-control" name="txt_date_updated" value="<?=$date_updated ?>" placeholder="Enter Date Updated"  autocomplete="off">
                                    <label>Date Updated
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Date Updated...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_save" class="btn blue"><i class="fa fa-plus fa-fw"></i>Save</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
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


<?php include_once '../layout/footer.php' ?>
