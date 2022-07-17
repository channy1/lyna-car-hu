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

            // $v_image = @$_FILES['txt_image'];

            // if($v_image["name"] != ""){
            //     $new_name = date("Ymd")."_".rand(1111,9999).".png";
            //     move_uploaded_file($v_image["tmp_name"],"../image/vehicle_rental/".$new_name);
            // }else{
            //     $new_name = "blank.png";
            // }

            $v_owner = @$connect->real_escape_string($_POST['txt_owner']);
            $v_note = @$connect->real_escape_string($_POST['txt_note']);
            $v_hand_phone= @$connect->real_escape_string($_POST['txt_hand_phone']);
            $v_card= @$connect->real_escape_string($_POST['txt_card']);
            $v_title= @$connect->real_escape_string($_POST['txt_title']);
            $txt_sex= @$connect->real_escape_string($_POST['txt_sex']);
            $txt_age= @$connect->real_escape_string($_POST['txt_age']);
            $txt_organization= @$connect->real_escape_string($_POST['txt_organization']);
            $txt_current_add= @$connect->real_escape_string($_POST['txt_current_add']);
            $txt_email= @$connect->real_escape_string($_POST['txt_email']);
            $txt_national= @$connect->real_escape_string($_POST['txt_national']);
            
            $query_add = "INSERT INTO tbl_owner_list(
                    ow_name,
                    ow_note,
                    own_title,
                    own_card,
                    hand_phone,
                    owner_sex,
                    owner_age,
                    owner_organization,
                    owner_address,
                    owner_email,
                    owner_nationality
                    ) VALUES(
                    '$v_owner',
                    '$v_note',
                    '$v_title',
                    '$v_card',
                    '$v_hand_phone',
                    '$txt_sex',
                    '$txt_age',
                    '$txt_organization',
                    '$txt_current_add',
                    '$txt_email',
                    '$txt_national'
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
                                    <input type="text" class="form-control" name="txt_owner" placeholder="Enter Owner"  autocomplete="off" required>
                                    <label>Owner
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Owner...</span>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter title"  autocomplete="off" required>
                                    <label>Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_hand_phone" placeholder="Enter Hand Phone"  autocomplete="off" required>
                                    <label>Hand Phone
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Hand Phone...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                   <select name="txt_sex" class='form-control'>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                   </select>
                                    <label>Sex:
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                   
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_age" placeholder="Enter "  autocomplete="off" required>
                                    <label>Age
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Age...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_organization" placeholder="Enter "  autocomplete="off" required>
                                    <label>Organization
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Organization...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_current_add" placeholder="Enter "  autocomplete="off" required>
                                    <label>Current address
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Current address...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_national" placeholder="Enter "  autocomplete="off" required>
                                    <label>Nationality
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Current Nationality...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_email" placeholder="Enter "  autocomplete="off" required>
                                    <label>E-mail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Current E-mail...</span>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_card" placeholder="Enter Card"  autocomplete="off" required>
                                    <label>ID Card
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Card...</span>
                                </div>
                            </div>
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_note" placeholder="Enter Note"  autocomplete="off">
                                   
                                    
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
