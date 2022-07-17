<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php 
  if(isset($_POST['btn_add'])){
    
            $txt_ventor_name = @$connect->real_escape_string($_POST['txt_ventor_name']);
            $txt_current_address = @$connect->real_escape_string($_POST['txt_current_address']);
            $txt_phone = @$connect->real_escape_string($_POST['txt_phone']);
            $txt_email = @$connect->real_escape_string($_POST['txt_email']);
            $txt_company = @$connect->real_escape_string($_POST['txt_company']);
            $txt_contact_persion = @$connect->real_escape_string($_POST['txt_contact_persion']);
            $txt_com_phone = @$connect->real_escape_string($_POST['txt_com_phone']);
            $txt_com_email = @$connect->real_escape_string($_POST['txt_com_email']);
            $txt_com_adress = @$connect->real_escape_string($_POST['txt_com_adress']);
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"],"../image/vendor/".$new_name);
            }
             $v_image1 = $new_name;
            $query_add = "INSERT INTO tbl_vendor(
                     `verdor_name`,
                     `current_address`,
                     `images`,
                     `phone`,
                     `email`,
                     `company_name`,
                     `contact_persion`,
                     `com_phone`,
                     `com_email`,
                     `com_address`
                    ) VALUES(
                     '$txt_ventor_name',
                     '$txt_current_address',
                     '$v_image1',
                     '$txt_phone',
                     '$txt_email',
                     '$txt_company',
                     '$txt_contact_persion',
                     '$txt_com_phone',
                     '$txt_com_email',
                     '$txt_com_adress'
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
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_ventor_name" placeholder="Enter Vendor"  autocomplete="off" required>
                                    <label>Vendor Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter vendor...</span>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <div class="form-group form-md-line-input">
                                    
                                    <input type="file" class="form-control" name="txt_image"   autocomplete="off">
                                    <label>Vendor Images
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Images...</span>
                                </div>
                            </div>
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_current_address" placeholder="Enter current address"  autocomplete="off" required>
                                    <label>Current Address
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Current Address...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_phone" placeholder="Enter phone"  autocomplete="off" required>
                                    <label>Phone
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Phone...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="email" class="form-control" name="txt_email" placeholder="Enter Email"  autocomplete="off" required>
                                    <label>Email
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Email...</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <fieldset style="border: 1px solid #a4509f;">
              <legend style="background: none; text-align: center; margin-left: 50px; width: 200px; color: #a4509f;">
                <span>Office</span>
              </legend>
                <div style="padding: 10px;">
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_company" placeholder="Enter company name"  autocomplete="off">
                                    <label>Company Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter company name...</span>
                                </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_contact_persion" placeholder="Enter Contact Persion"  autocomplete="off">
                                    <label>Contact Persion
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter persion name...</span>
                                </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_com_phone" placeholder="Enter Company Phone"  autocomplete="off">
                                    <label>Company Phone
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Company Phone...</span>
                                </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_com_email" placeholder="Enter Company Email"  autocomplete="off">
                                    <label>Company Email
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Company Email...</span>
                                </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_com_adress" placeholder="Enter Company address"  autocomplete="off">
                                    <label>Company Address
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Company address...</span>
                                </div>
                      </div>
                      
                  </div>
                   
                </div>
              </fieldset>
                                </div>
                            </div>


                            
                        
                           

                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
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
