<?php 
    $menu_active =5;
    $layout_title = "Add User Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<?php 
    if(isset($_POST['btn_add_user'])){
        $v_name = @$_POST['txt_name'];
        $v_password = @$_POST['txt_password'];
        $v_confirm_password = @$_POST['txt_confirm_password'];
        $v_email = @$_POST['txt_email'];
        $v_gender = @$_POST['txt_gender'];
        $v_position = @$_POST['txt_position'];
        $txt_fname = @$_POST['txt_fname'];
        $txt_lname = @$_POST['txt_lname'];
       
        if($v_password == $v_confirm_password){
            
          

            $query_add = "INSERT INTO tbl_users (user_name,user_password,user_email,user_first_name,user_gender,user_last_name,user_position) 
                VALUES('$v_name','$v_password','$v_email','$txt_fname','$v_gender','$txt_lname','$v_position')";
            if($connect->query($query_add)){
                $last_id = $connect->insert_id;
                     $query_all = "INSERT INTO tbl_page_allow(user_id) 
                                   VALUES('$last_id')";
                    if($connect->query($query_all)){
                    }



                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>';
                // header("Refresh:2; url=index.php");   
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';
                echo mysqli_error($connect);
                // header("Refresh:0; url=add.php");    
            }
        }else{
            $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Password and Confirm not match ...
            </div>';
        }



    }

 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-user fa-fw"></i>Create New User</h2>
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
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_fname" placeholder="Enter your name" required="required" autocomplete="off">
                                    <label>First Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your first name...</span>
                                </div>

                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_name" placeholder="Enter your name" required="required" autocomplete="off">
                                    <label>Username
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter user name...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_email" placeholder="Enter your email" required="required" autocomplete="off">
                                    <label>Email
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your email...</span>
                                </div>
                                 <div class="form-group form-md-line-input">
                                    <input type="password" class="form-control" name="txt_password" placeholder="Repeat your password" required="required" autocomplete="off">
                                    <label>Password
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your password...</span>
                                </div>
                                
                               
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                 <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" name="txt_lname" placeholder="Enter your name" required="required" autocomplete="off">
                                    <label>Last Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your first name...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                <select class="form-control" name="txt_gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                </select>
                                <span class="help-block help-block-error"></span>
                                    <label>Gender<span class="required" aria-required="true">*</span></label>
                                    <span class="help-block">Choose your gender here...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <select class="form-control" name="txt_position" required="required">
                                        <option value="">=== Please Choose Position ===</option>
                                        <?php 
                                            $positon = $connect->query("SELECT * FROM tbl_user_position ORDER BY up_id ASC");
                                            while ($row_position = mysqli_fetch_object($positon)) {
                                                echo '<option value="1">'.$row_position->up_name.'</option>';
                                            }
                                         ?>
                                    </select><span class="help-block help-block-error"></span>
                                    <label>Position<span class="required" aria-required="true">*</span></label>
                                    <span class="help-block">Choose your position here...</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <input type="password" class="form-control" name="txt_confirm_password" placeholder="Enter your password" required="required" autocomplete="off">
                                    <label>Confirm Password
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter your password again...</span>
                                </div>
                               
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_add_user" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
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






<?php include_once '../layout/footer.php' ?>
