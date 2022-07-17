<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_package INNER JOIN tbl_package_position ON tbl_package.package_id=tbl_package_position.package_id WHERE p_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
       $disccount=$row['discount'];
       $try=$row['try'];
       $price=$row['price'];
       $position_id=$row['level_id'];
       $package_id_select=$row['package_id'];
       $post_limit=$row['post_limit'];
       $des =$row['description'];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_add'])){
         
            
            $txt_price = @$connect->real_escape_string($_POST['txt_price']);
            $txt_try = @$connect->real_escape_string($_POST['txt_try']);
            $txt_disccount = @$connect->real_escape_string($_POST['txt_disccount']);
            $txt_description = @$connect->real_escape_string($_POST['txt_description']);
            $txt_post_limit=@$connect->real_escape_string($_POST['txt_post_limit']);
            $query_add = "UPDATE tbl_package_position SET 
            price='$txt_price',
            try='$txt_try',
            discount='$txt_disccount',
            description='$txt_description',
            post_limit='$txt_post_limit'
            WHERE p_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
				header("Location: index.php");
				//echo 'hello'; die; 
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error '.mysqli_error($connect).'...
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
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> កែសម្រួល គ្រឿងជួល</b><br>
                <b style="font-size: 20px;color:#2F05A5"> EDIT ACCESSORIES RENTAL</b><br><br>
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
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">System Packages
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Packages...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <select name="txt_system_package" class="form-control">
                                        <option <?php if($package_id_select=="1") {echo "selected='selected'";} else {echo "";} ?> value="1">SILVER</option>
                                        <option <?php if($package_id_select=="2") {echo "selected='selected'";} else {echo "";} ?> value="2">PLATINUM</option>
                                        <option <?php if($package_id_select=="3") {echo "selected='selected'";} else {echo "";} ?> value="3">GOLD</option>
                                        <option <?php if($package_id_select=="4") {echo "selected='selected'";} else {echo "";} ?> value="4">DIAMOND</option>
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
                                        <option <?php if($position_id=="1") {echo "selected='selected'";} else {echo "";} ?> value="1">CAR OWNER</option>
                                        <option <?php if($position_id=="2") {echo "selected='selected'";} else {echo "";} ?> value="2">RICKSHAW'S OWNER</option>
                                        <option <?php if($position_id=="3") {echo "selected='selected'";} else {echo "";} ?> value="3">HOTEL & GUESTHOUSE</option>
                                        <option <?php if($position_id=="4") {echo "selected='selected'";} else {echo "";} ?> value="4">CITY TOUR</option>
                                       <!-- <option <?php if($position_id=="5") {echo "selected='selected'";} else {echo "";} ?> value="5">AIRPORT TRANSFER</option>
                                        <option <?php if($position_id=="6") {echo "selected='selected'";} else {echo "";} ?> value="6">PICKUP & DROP OFF</option>
                                        <option <?php if($position_id=="7") {echo "selected='selected'";} else {echo "";} ?> value="7">TOUR GUIDE</option>-->
                                        <option <?php if($position_id=="8") {echo "selected='selected'";} else {echo "";} ?> value="8">DRIVER</option>
                                        <option <?php if($position_id=="9") {echo "selected='selected'";} else {echo "";} ?> value="9">INDROUCER</option>
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
                                    <input type="text" value="<?php echo $price; ?>" class="form-control" name="txt_price" placeholder=""  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>

                              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Trial
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Trial...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" value="<?php echo $try; ?>" class="form-control" name="txt_try" placeholder=""  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Disccount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Discount...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" value="<?php echo $disccount; ?>" class="form-control" name="txt_disccount" placeholder=""  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Post allow number
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter allow number...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" value="<?php echo $post_limit; ?>" class="form-control" name="txt_post_limit" placeholder=""  autocomplete="off" style="background-color: white;">
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
                                        <textarea id="detail" class="detail" name="txt_description"><?php echo $des; ?></textarea>
                                   
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



<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'detail', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
</script>

<style type="text/css">
.form-group.form-md-line-input .form-control {
    background: white;
}
</style>


<?php include_once '../layout/footer.php' ?>
