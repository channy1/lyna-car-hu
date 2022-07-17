<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_province WHERE pv_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["pv_title"];
            $image = $row["pv_image"];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], "../image/province/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $query_add = "UPDATE tbl_province SET pv_title='$v_title',pv_image='$new_name' WHERE pv_id='$edit_id'";
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
    $query="SELECT * FROM tbl_province WHERE pv_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["pv_title"];
            $image = $row["pv_image"];
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

     <div style=" border: solid; border-right: 0; border-left: 0; border-top: 0;">
        <div class="text-center" style="float: left; "><img src="lyna.jpg" style="width: 150px;height: 150px;"></div>
        <div style="text-align: center; width: 100%;margin-left: -50px;">
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> កែសម្រួលខេត្ត </b><br>
                <b style="font-size: 20px;color:#2F05A5">EDIT PROVINCE</b><br><br>
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
            <div class="panel-body"style="background-color:  #800080">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-9" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                         <label style="font-size: 15px;color: white;">Title
                                            <span class="required" aria-required="true">*</span>
                                        </label>
                                        <span class="help-block">Enter Title...</span>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title" value="<?php echo ($title); ?>"  required="required" autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <label style="font-size: 15px; color: white;">Image
                                            <span class="required" aria-required="true">*</span>
                                        </label>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <input type="file" class="form-control" name="txt_image" placeholder="Enter Icon name"  autocomplete="off">
                                        <span class="help-block">Enter Image...</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-3">
                                <img src="../image/province/<?php echo $image;?>" alt="<?php echo $image; ?>" style="width:100%;height:200px;border:2px solid black; border-radius:5px !important ;">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3 text-center">
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
