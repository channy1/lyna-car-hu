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
            // if($v_image["name"] != ""){
            //     $v_photo_name = date("Ymd_Hisa")."_".rand(1111,9999).".png";
            //     copy("tmp_".@$_SESSION['user']->user_id.'.png',"../image/pre_info/".$v_photo_name);
            // }else{
            //     $v_photo_name = "blank.png";
            // }

            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], "../image/province/".$new_name);
            }else{
                $new_name = "blank.png";
            }

            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            //$v_image = @$connect->real_escape_string($_POST['txt_image']);
            $v_image1 = $new_name;
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            $query_add = "INSERT INTO tbl_province (
                    pv_title,
                    pv_image
                    ) 
                VALUES(
                    '$v_title',
                    '$v_image1')";
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

     <div style=" border: solid; border-right: 0; border-left: 0; border-top: 0;">
        <div class="text-center" style="float: left; "><img src="lyna.jpg" style="width: 150px;height: 150px;"></div>
        <div style="text-align: center; width: 100%;margin-left: -50px;">
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> បញ្ចូលខេត្ត </b><br>
                <b style="font-size: 20px;color:#2F05A5">ADD PROVINCE</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល / Head Quarter:</b><br>
                E-mail:%20info@lyna-carrental.com , skype:Skype: lyna-carrental.com<br>
               <h5 style="padding-left: 80px;">  tel:Cambodian: +855 (0)12 55 42 47 , tel:English: +855 (0)12 92 45 17 , tel:Booking: +855 (0)92 14 30 14</h5>
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
            <div class="panel-heading" >
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body" style="background-color:  #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class=" col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                        <label style="color: black; font-size: 15px; margin-left: -15px;color:white;">Title
                                        <span class="required" aria-required="true" style="">*</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title"  autocomplete="off" style="background-color: white;">
                                 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="color: black;font-size: 15px;color:white;">Choose Image
                                            <span class="required" aria-required="true">*</span>
                                    </label>
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-left: -110px;">
                                        <input type="file" class="form-control"  name="txt_image" placeholder="Image.jpg"   autocomplete="off">
                                    </div>
                                        
                                    <span class="help-block">Choose Image to Upload...</span>
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_detail" placeholder="http://www.facebook.com" required="required" autocomplete="off">
                                    <label>Detail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Detail...</span>
                                </div>
                            </div> -->
                            <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <textarea style="height: 290px;" class="form-control detail" id="detail" name="txt_detail" placeholder="http://www.facebook.com" autocomplete="off"></textarea>
                                    <label>Detail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Detail...</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                           <div class="col-md-3 text-center">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Save</button>
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
