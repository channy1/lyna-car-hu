<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_owner_list WHERE ow_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $pro_id = $row["ow_id"];
        $pro_name = $row["ow_name"];
        $pro_note = $row["ow_note"];
        $v_owner_sex=$row['owner_sex'];
        $v_owner_age=$row['owner_age'];
        $v_owner_organization=$row['owner_organization'];
        $v_owner_address=$row['owner_address'];
        $v_owner_email=$row['owner_email'];
        $v_owner_nationality=$row['owner_nationality'];
         
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
            
        $v_owner =  @$connect->real_escape_string($_POST['txt_owner']);
        $v_note =  @$connect->real_escape_string($_POST['txt_note']);
        $v_hand_phone= @$connect->real_escape_string($_POST['txt_hand_phone']);
        $v_card= @$connect->real_escape_string($_POST['txt_card']);
        $v_title= @$connect->real_escape_string($_POST['txt_title']);
        $txt_sex= @$connect->real_escape_string($_POST['txt_sex']);
        $txt_age= @$connect->real_escape_string($_POST['txt_age']);
        $txt_organization= @$connect->real_escape_string($_POST['txt_organization']);
        $txt_current_add= @$connect->real_escape_string($_POST['txt_current_add']);
        $txt_email= @$connect->real_escape_string($_POST['txt_email']);
        $txt_national= @$connect->real_escape_string($_POST['txt_national']);

            $query_add = "UPDATE tbl_owner_list SET 
            ow_name ='$v_owner',
            ow_note = '$v_note',
            own_title='$v_title',
            own_card='$v_card',
            hand_phone='$v_hand_phone',
            owner_sex='$txt_sex',
            owner_age='$txt_age',
            owner_organization='$txt_organization',
            owner_address='$txt_current_add',
            owner_email='$txt_email',
            owner_nationality='$txt_national'

            WHERE ow_id='$edit_id'";
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
    $query="SELECT * FROM tbl_owner_list WHERE ow_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $owner_name = $row["ow_name"];
        $owner_note = $row["ow_note"];
        $o_title=$row['own_title'];
        $o_card=$row['own_card'];
        $o_hand=$row['hand_phone'];
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
                           
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text"  class="form-control" name="txt_owner" placeholder="Enter Owner"  autocomplete="off" required value="<?php echo ($owner_name); ?>">
                                    <label>Owner
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Owner...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input value="<?php echo $o_title; ?>" type="text" class="form-control" name="txt_title" placeholder="Enter title"  autocomplete="off" required>
                                    <label>Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input value="<?php echo $o_hand; ?>" type="text" class="form-control" name="txt_hand_phone" placeholder="Enter Hand Phone"  autocomplete="off" required>
                                    <label>Hand Phone
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Hand Phone...</span>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                   <select name="txt_sex" class='form-control'>
                                    <option <?php if($v_owner_sex=="Male") {echo "selected='selected'";} ?> value="Male">Male</option>
                                    <option <?php if($v_owner_sex=="Female") {echo "selected='selected'";} ?> value="Female">Female</option>
                                   </select>
                                    <label>Sex:
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" value="<?php echo $v_owner_age; ?>" class="form-control" name="txt_age" placeholder="Enter "  autocomplete="off" required>
                                    <label>Age
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Age...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" value="<?php echo $v_owner_organization; ?>" class="form-control" name="txt_organization" placeholder="Enter "  autocomplete="off" required>
                                    <label>Organization
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Organization...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" value="<?php echo $v_owner_address; ?>" class="form-control" name="txt_current_add" placeholder="Enter "  autocomplete="off" required>
                                    <label>Current address
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Current address...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" value="<?php echo $v_owner_nationality; ?>" value="<?php echo $v_owner_address; ?>" class="form-control" name="txt_national" placeholder="Enter "  autocomplete="off" required>
                                    <label>Nationality
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Current Nationality...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" value="<?php echo $v_owner_email; ?>" class="form-control" name="txt_email" placeholder="Enter"  autocomplete="off" required>
                                    <label>E-mail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Current E-mail...</span>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input value="<?php echo $o_card; ?>" type="text" class="form-control" name="txt_card" placeholder="Enter Card"  autocomplete="off" required>
                                    <label>ID Card
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Card...</span>
                                </div>
                            </div>
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text"  class="form-control" name="txt_note" placeholder="Enter Note"  autocomplete="off" required value="<?php echo ($owner_note); ?>">
                                   
                                    
                                    <label>Note
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Note...</span>
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
