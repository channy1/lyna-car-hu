<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';

    if(isset($_POST['btn_add'])){

            $amount = @$connect->real_escape_string($_POST['txt_amount']);
            $amount_bonus =  @$connect->real_escape_string($_POST['txt_bonus_amount']);
            $query_add = "INSERT INTO tbl_bonus (
                    amount,
                    bonus_amount
                    ) 
                VALUES(
                    '$amount',
                    '$amount_bonus')";
            if($connect->query($query_add)){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }
    }

 ?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Customer Bonus Control Panel</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Customer Bonus Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size: 15px;" class="col-xs-12 col-md-3 col-sm-3 col-lg-2">Expense Amount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Amount...</span>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" name="txt_amount" placeholder="Enter Amount"  autocomplete="off" style="background-color: white;padding: 10px;border-radius: 5px !important;" required >
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size: 15px;" class="col-xs-12 col-md-3 col-sm-3 col-lg-2">Bonus Amount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Bonus Amount...</span>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="txt_bonus_amount" placeholder="Enter Bonus Amount"  autocomplete="off" style="background-color: white;padding: 10px;border-radius: 5px !important;" required>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                                <button type="submit" name="btn_add" class="btn blue circle"><i class="fa fa-plus fa-fw"></i>Add</button>
                                <button type="reset" class="btn yellow circle"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red circle"><i class="fa fa-undo fa-fw"></i>Cancel</a>
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
<style type="text/css">
    b,span{
        color: #800080;
        font-weight: 900;
    }
</style>

<?php include_once '../layout/footer.php' ?>
