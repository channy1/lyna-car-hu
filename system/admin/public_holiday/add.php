<style type="text/css">
    b,span{
        color: #800080;
        font-weight: 900;
    }
</style>
<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    if(isset($_POST['btn_add'])){
        $txt_date = @$connect->real_escape_string($_POST['txt_date']);
        $txt_order_number = @$connect->real_escape_string($_POST['txt_order_number']);
        $txt_description = $_POST['txt_description']; 
        $query_add = "INSERT INTO tbl_holiday (
                date_public,
                order_number,
                description
                ) 
            VALUES(
                '$txt_date',
                '$txt_order_number',
                '$txt_description')";
        if($connect->query($query_add)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted ...
            </div>'; 
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Something Went Wrong ...
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
    <div class="row">
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
            <h3><b style=";font-family: Khmer OS Muol; ">​បញ្ចូល ព័ត៌មានថ្ងៃឈប់សំរាក</b></h3>
            <b style="font-size: 20px;">​​​​​ADD PUBLIC HOLIDAYS</b><br><br>
            <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល| HEAD OFFICE</b><br>
            <span> Address: Room No. 9C2 | 9th Floor</span> <br>
            <span>H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)</span><br>
            <span>Street 271 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia</span> <br>
            <span>Eng/Khm: +855 (0) 12 55 42 47 | +855 (0) 92 14 30 14 | English Speaker Only: +855 (0) 12 924 517</span><br>
            <span> Skype ID: lyna-carrental.com | Line/WhatsApp/Telegram/Viber/WeChat: (+855) 12 55 42 47 | 92 14 30 14 | 12 924 517</span><br>
            <span>E-mail: info@lyna-carrental.com | Website: www.Lyna-CarRental.Com</span>
        </center>
        </div>
    </div>
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Publish Holiday Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <label style="color: white;font-size: 15px;" class="col-xs-12 col-md-3 col-sm-3 col-lg-2">Name Of Holiday
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Name Of Holiday...</span>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <input type="text" class="form-control" name="txt_description"   autocomplete="off" style="background-color: white;" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <label style="color: white;font-size: 15px;" class="col-xs-12 col-md-3 col-sm-3 col-lg-2">Date
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter date...</span>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <input readonly data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text" name="txt_date" class="form-control input-sm emptys" id="datepicker" style="background-color: white;" required>
                                    
                                    </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <label style="color: white;font-size: 15px;" class="col-xs-12 col-md-3 col-sm-3 col-lg-2">Order Number
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter order...</span>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <input type="text" class="form-control" name="txt_order_number"   autocomplete="off" style="background-color: white;" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-6 text-center" style="margin-left: 10px;">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa  fa-save fa-fw"></i>Save</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Back</a>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>
<?php include_once '../layout/footer.php' ?>
