<?php 
    $menu_active =5;
    $layout_title = "Add User Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php

    // btn update 
    if(isset($_POST['btn_update_user'])){
        $v_id = @$_POST['txt_id'];
        $txt_home_page = @$_POST['txt_home_page'];
        $txt_partner_list = @$_POST['txt_partner_list'];
        $txt_system_pakage = @$_POST['txt_system_pakage'];
        $txt_vendor = @$_POST['txt_vendor'];
        $txt_customer = @$_POST['txt_customer'];
        $txt_quotation = @$_POST['txt_quotation'];
        $txt_agreement = @$_POST['txt_agreement'];
        $txt_rent_planner = @$_POST['txt_rent_planner'];
        $txt_account = @$_POST['txt_account'];
        $txt_invoice = @$_POST['txt_invoice'];
        $txt_report = @$_POST['txt_report'];
        $txt_custom_report = @$_POST['txt_custom_report'];
        $txt_user_manage = @$_POST['txt_user_manage'];
       
   

        $query_update = "UPDATE tbl_page_allow SET   
                                    home_page='$txt_home_page',
                                    partner_page='$txt_partner_list',
                                    pakage_page='$txt_system_pakage',
                                    vendor_page='$txt_vendor',
                                    customer_page='$txt_customer',
                                    qt_page='$txt_quotation',
                                    agree_page='$txt_agreement',
                                    rent_planer_page='$txt_rent_planner',
                                    account_page='$txt_account',
                                    invoice_page='$txt_invoice',
                                    report_page='$txt_report',
                                    custom_report_page='$txt_custom_report',
                                    module_user_page='$txt_user_manage'
                                        WHERE user_id='$v_id'";
        if($connect->query($query_update)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data was updated ...
            </div>'; 
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>'; 

            // echo mysqli_error($connect);
        }
    }

    // get old data  
    if(@$_GET['edit_id']!=""){
        $edit_id = @$_GET['edit_id'];
        $old_data = $connect->query("SELECT * FROM tbl_users WHERE user_id='$edit_id'");
        $row_user = mysqli_fetch_object($old_data);

        $allow_data = $connect->query("SELECT * FROM tbl_page_allow WHERE user_id='$edit_id'");
        $rows = mysqli_fetch_object($allow_data);


    }


 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-user fa-fw"></i>Edit Information</h2>
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
                <h3 class="panel-title">Permission</h3>
            </div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txt_id" value="<?= $row_user->user_id ?>">
                    <div class="form-body">



                        <div class="row">
                             <div class="form-group">
                                <label class="control-label col-sm-2" for="email">FIRST NAME</label>
                                <div class="col-sm-4">
                            <input value="<?php echo $row_user->user_first_name; ?>" type="text" class="form-control" id="email" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">LAST NAME</label>
                                <div class="col-sm-4">
                        <input value="<?php echo $row_user->user_last_name; ?>" type="text" class="form-control" id="email" placeholder="Enter Last Name">
                                </div>
                            </div>




                        </div>




                    <div class="row">
                      <div class="col-md-4">
                               


                <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">HOME PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->home_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_home_page" value="1">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">VENDOR PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->vendor_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_vendor" value="1">
                  </div>
                </div>
                         
                            </div>
                             <div class="col-md-4">
                               


                <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">PARTNER PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->partner_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_partner_list" value="1">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">CUSTOMER PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->customer_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_customer" value="1">
                  </div>
                </div>
                         
                            </div>
                             <div class="col-md-4">
                               


                <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">SYSTEM PACKAGES  PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->pakage_page=="1") {echo "checked";} ?>  type="checkbox" class="form-control" name="txt_system_pakage" value="1">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">QUOTATIONS  PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->qt_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_quotation" value="1">
                  </div>
                </div>
                         
                            </div>

                             <div class="col-md-4">
                               


                <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">AGREEMENT PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->agree_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_agreement" value="1">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">INVOICE PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->invoice_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_invoice" value="1">
                  </div>
                </div>
                         
                            </div>
                             <div class="col-md-4">
                               


                <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">RENT PLANNER PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->rent_planer_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_rent_planner" value="1">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">REPORTS PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->report_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_report" value="1">
                  </div>
                </div>
                         
                            </div>
                             <div class="col-md-4">
                               


                <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">ACCOUNT PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->account_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_account" value="1">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">CUSTOMIZED REPORT [TOP] PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->custom_report_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_custom_report" value="1">
                  </div>
                </div>
                         
                            </div>
                             <div class="col-md-4">
                               


                <div class="form-group">
                  <label for="inputType" class="col-md-8 control-label">MODULES MANAGEMENT PAGE</label>
                  <div class="col-md-4">
                      <input <?php if($rows->module_user_page=="1") {echo "checked";} ?> type="checkbox" class="form-control" name="txt_user_manage" value="1">
                  </div>
                </div>

               
                         
                            </div>






                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_update_user" class="btn blue"><i class="fa fa-check fa-fw"></i>Save</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
    .control-label {
        margin-top:10px;
    }

</style>



<?php include_once '../layout/footer.php' ?>
