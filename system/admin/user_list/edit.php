<?php 
    $menu_active =5;
    $layout_title = "Add User Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php

    // btn update 
    if(isset($_POST['btn_update_user'])){
        $v_id = @$_POST['txt_id'];
        $v_name = @$_POST['txt_name'];
        $v_email = @$_POST['txt_email'];
        $v_gender = @$_POST['txt_gender'];
        $v_position = @$_POST['txt_position'];
         $txt_fname = @$_POST['txt_fname'];
        $txt_lname = @$_POST['txt_lname'];
   

        $query_update = "UPDATE tbl_users SET    user_name='$v_name',
                                                user_email='$v_email',
                                                user_gender='$v_gender',
                                                user_first_name='$txt_fname',
                                              
                                                user_last_name='$txt_lname' WHERE user_id='$v_id'";
        if($connect->query($query_update)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data was updated ...
            </div>'; 
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>'; 
        }
    }

    // get old data  
    if(@$_GET['edit_id']!=""){
        $edit_id = @$_GET['edit_id'];
        $old_data = $connect->query("SELECT * FROM tbl_users WHERE user_id='$edit_id'");
        $row_user = mysqli_fetch_object($old_data);
    }


 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-user fa-fw"></i>Edit User Information</h2>
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
                <h3 class="panel-title">Input User Information</h3>
            </div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txt_id" value="<?= $row_user->user_id ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                <div class="form-group form-md-line-input">
                                    <input value="<?php echo $row_user->user_first_name; ?>" type="text" class="form-control" name="txt_fname" placeholder="Enter your name" required="required" autocomplete="off">
                                    <label>First Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your first name...</span>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input value="<?php echo $row_user->user_name; ?>" type="text" class="form-control" name="txt_name" placeholder="Enter your name" required="required" autocomplete="off">
                                    <label>Username
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter user name...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <input value="<?php echo $row_user->user_email; ?>" type="text" class="form-control" name="txt_email" placeholder="Enter your email" required="required" autocomplete="off">
                                    <label>Email
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your email...</span>
                                </div>
                                
                                
                               
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                 <div class="form-group form-md-line-input">
                                    <input value="<?php echo $row_user->user_last_name; ?>" type="text" class="form-control" name="txt_lname" placeholder="Enter your name" required="required" autocomplete="off">
                                    <label>Last Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your first name...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                <select class="form-control" name="txt_gender">
                                        <option
                                        <?php
                                          if($row_user->user_gender=="Male") {
                                            echo "selected='selected'";
                                          }

                                        ?> value="Male">Male</option>
                                        <option
                                        <?php
                                          if($row_user->user_gender=="Female") {
                                            echo "selected='selected'";
                                          }
                                          
                                        ?>
                                         value="Female">Female</option>
                                </select>
                                <span class="help-block help-block-error"></span>
                                    <label>Gender<span class="required" aria-required="true">*</span></label>
                                    <span class="help-block">Choose your gender here...</span>
                                </div>
                                
                               
                               
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_update_user" class="btn blue"><i class="fa fa-check fa-fw"></i>Save</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>






<?php include_once '../layout/footer.php' ?>
