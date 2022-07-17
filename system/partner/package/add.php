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
            $v_image = @$_FILES['txt_image'];

            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"],"../image/accessories rental/".$new_name);
            }else{
                $new_name = "blank.png";
            }

            
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);

           
           
            $v_image1 = $new_name;
            $v_ref = @$connect->real_escape_string($_POST['txt_ref']);
            $v_days1_7 = @$connect->real_escape_string($_POST['txt_days(1-7)']);
            $v_extradays1_7 = @$connect->real_escape_string($_POST['txt_extradays(1-7)']);
            $v_days15_26 = @$connect->real_escape_string($_POST['txt_days(15-26)']);
            $v_extradays15_26 = @$connect->real_escape_string($_POST['txt_extradays(15-26)']);
            $v_monthly = @$connect->real_escape_string($_POST['txt_monthly']);
            $v_monthly_extradays = @$connect->real_escape_string($_POST['txt_monthly_extradays']);
            $v_yearly = @$connect->real_escape_string($_POST['txt_yearly']);
            $v_yearly_extradays = @$connect->real_escape_string($_POST['txt_yearly_extradays']);
            $query_add = "INSERT INTO tbl_accessories_rental (
                    ac_title,
                    ac_image,
                    ac_ref_no,
                    `ac_days(1-7)`,
                    `ac_extradays(1-7)`,
                    `ac_days(15-26)`,
                    `ac_extradays(15-26)`,
                    ac_monthly,
                    ac_extramonthly,
                    ac_yearly,
                    ac_extrayearly
                    ) 
                VALUES(
                    '$v_title',
                    '$v_image1',
                    '$v_ref',
                    '$v_days1_7',
                    '$v_extradays1_7',
                    '$v_days15_26',
                    '$v_extradays15_26',
                    '$v_monthly',
                    '$v_monthly_extradays',
                    '$v_yearly',
                    '$v_yearly_extradays')";
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

       <div style=" border: solid; border-right: 0; border-left: 0; border-top: 0;">
        <div class="text-center" style="float: left; "><img src="lyna.jpg" style="width: 150px;height: 150px;"></div>
        <div style="text-align: center; width: 100%;margin-left: -50px;">
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> គ្រឿងជួល </b><br>
                <b style="font-size: 20px;color:#2F05A5">ADD ACCESSORIES RENTAL</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល / Head Quarter:</b><br>
                E-mail:%20info@lyna-carrental.com , skype:Skype: lyna-carrental.com<br>
               <h5 style="padding-left: 65px;">  tel:Cambodian: +855 (0)12 55 42 47 , tel:English: +855 (0)12 92 45 17 , tel:Booking: +855 (0)92 14 30 14</h5>
        </div>
        <div class="row">
             <div class="col-xs-4 col-sm-4 col-md-4">
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">

             </div>
        </div>
    </div>

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	  <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Package Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Name...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_package_name" placeholder="Enter Name"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	<label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Choose Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Choose Image to Upload...</span>
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <input type="file" class="form-control"  name="txt_image" placeholder="Image.jpg"   autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">System Packages
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Packages...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <select name="txt_system_package" class="form-control">
                                        <option value="1">SILVER</option>
                                        <option value="2">PLATINUM</option>
                                        <option value="3">GOLD</option>
                                        <option value="4">DIAMOND</option>
                                    </select>
                                   </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Posting Packages
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Packages...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <select name="txt_system_package" class="form-control">
                                        <option value="1">CAR OWNER</option>
                                        <option value="2">RICKSHAW'S OWNER</option>
                                        <option value="3">HOTEL & GUESTHOUSE</option>
                                        <option value="4">CITY TOUR</option>
                                        <option value="5">AIRPORT TRANSFER</option>
                                        <option value="6">PICKUP & DROP OFF</option>
                                        <option value="7">TOUR GUIDE</option>
                                        <option value="8">DRIVER</option>
                                        <option value="9">INDROUCER</option>
                                    </select>
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Price(1/Year)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="" placeholder=""  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>

                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Try
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Try...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="" placeholder=""  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Dicount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Discount...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="" placeholder=""  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Description
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Description...</span>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <textarea id="detail" class="detail"></textarea>
                                   
                                   </div>
                                </div>
                            </div>
                           
                            
                        
                            
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-5 text-center">
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

<style type="text/css">
.form-group.form-md-line-input .form-control {
    background: white;
}
</style>

<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'detail', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
</script>


<?php include_once '../layout/footer.php' ?>
