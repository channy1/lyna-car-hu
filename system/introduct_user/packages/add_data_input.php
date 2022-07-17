<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php 
    if(isset($_POST['btn_submit'])){
        $v_description = @$_POST['txt_description'];
        $v_title = @$_POST['txt_title'];
        $v_price = @$_POST['txt_price'];
        $v_card_amount = @$_POST['txt_card_amount'];
        $v_option = @$_POST['txt_option'];
        $v_note = @$_POST['txt_note'];
        $v_user_id = @$_SESSION['user']->user_id;
            

       $v_image = @$_FILES['txt_image'];
        if($v_image["name"] != ""){
            $v_img_new_name = date("Ymd")."_".rand(1111,9999).'.'.pathinfo($v_image["name"], PATHINFO_EXTENSION); // get random name
            move_uploaded_file($v_image["tmp_name"], "images/guestbook/".$v_img_new_name); // upload file to specific folder
        }else{
            $v_img_new_name = "blank.png"; // if not upload name = blank.png
        }

        $query_add = "INSERT INTO  tbl_data_input_coupon (
                
                tdc_description,
                tdc_title,
                tdc_price,
                tdc_vihicle,
                tdc_sys_type,
                tdc_note,
                tdc_image
                
                ) 
            VALUES(
                
                '$v_description',
                '$v_title',
                '$v_price',
                '$v_card_amount',
                '$v_option',
                '$v_note',
                '$v_img_new_name'
                )";


        if($connect->query($query_add)){

            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted ...
            </div>'; 
            // echo "string";
            // exit();
             //header("location: ./add_data_input.php?sms=register_success");
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>';   
        }

    }

 ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Add Data </h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="data_input.php" id="sample_editable_1_new" class="btn red"> 
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
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                <div class="form-group">
                                                <label>Image : </label>
                                                <input id="btn_choose" name="txt_image" type="file" class="form-control">
                                </div>
                            </div>
                    
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_description"  autocomplete="off">
                                    <label>Description
                                        <span class="required" aria-required="true"></span>
                                    </label>
                                </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_title"  autocomplete="off">
                                    <label>Title
                                        <span class="required" aria-required="true"></span>
                                    </label>
                                </div>
                            </div>
                        
                        

                            
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_price"  autocomplete="off">
                                    <label>Price 
                                        <span class="required" aria-required="true"></span>
                                    </label>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_card_amount"  autocomplete="off">
                                    <label>Card Amount 
                                        <span class="required" aria-required="true"></span>
                                    </label>
                                </div>
                            </div>
                        
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_note"  autocomplete="off">
                                    <label>Note
                                        <span class="required" aria-required="true"></span>
                                    </label>
                                </div>
                            </div>
                    </div>  
                    <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                <label>Optional Package</label>
                                    <!-- <input type="text" class="form-control" name="txt_card_amount"  autocomplete="off"> -->
                                    <select class="form-control" name="txt_option">
                                        <option value="1">SILVER</option>
                                        <option value="2">PLATINUM</option>
                                        <option value="3">GOLD</option>
                                        <option value="4">DIAMOND</option>
                                    </select> 
                                        <span class="required" aria-required="true"></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            </div>
                    </div>       
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_submit" class="btn blue"><i class="fa fa-save fa-fw"></i>Save</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<?php include_once '../layout/footer.php' ?>