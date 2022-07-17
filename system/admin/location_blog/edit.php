<?php 
    $menu_active =4;
    $layout_title = "Welcome to Website";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<?php 
    if(isset($_POST['btn_update'])){
        $v_id = @$connect->real_escape_string($_POST['txt_pro_id']);
        $v_pro_name_en = @$connect->real_escape_string($_POST['txt_pro_name']);
        $v_pro_name_kh = @$connect->real_escape_string($_POST['txt_note']);
        $v_pro_name_jp = @$connect->real_escape_string($_POST['txt_name_jp']);
        $v_pro_country = @$connect->real_escape_string($_POST['txt_country']);
        
        $query_update = "UPDATE tbl_province SET
                pro_name_en='$v_pro_name_en',
                pro_name_kh='$v_pro_name_kh',
                pro_name_jp='$v_pro_name_jp',
                pro_country='$v_pro_country'
                WHERE pro_id='$v_id'";
        if($connect->query($query_update)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data update ...
            </div>'; 
            echo '<script> window.location.replace("index.php");</script>';
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>';   
        }
    }


// get old data 
    $edit_id = @$_GET['edit_id'];
    $old_data = $connect->query("SELECT * FROM tbl_province WHERE pro_id='$edit_id'");
    $row_old = mysqli_fetch_object($old_data);


 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Edit Record</h2>
        </div>
    </div>
    
   
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body">
                <form action="<?= $_SERVER['PHP_SELF'] ?>?edit_id=<?= $edit_id ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txt_pro_id" value="<?= $row_old->pro_id ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Province Name English
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_pro_name" placeholder="" required="required" autocomplete="off" value="<?= $row_old->pro_name_en ?>">
                                </div>
                                <div class="form-group">
                                    <label>Province Name Khmer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_note" placeholder="" required="required" autocomplete="off" value="<?= $row_old->pro_name_kh ?>">
                                </div>
                                <div class="form-group">
                                    <label>Province Name Japan
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_name_jp" placeholder="" required="required" autocomplete="off" value="<?= $row_old->pro_name_jp ?>">
                                </div>
                                <div class="form-group">
                                    <label>Country
                                        <span class="required" aria-required="true">*</span>
                                    </label><br>
                                    <select class="form-control" name="txt_country" required=""> 
                                        <option value="">== Choose Country ==</option>
                                        <?php 
                                            $Country = $connect->query("SELECT * FROM tbl_ct_country ORDER BY co_name ASC");
                                            while ($row_Country= mysqli_fetch_object($Country)) {
                                                if($row_Country->co_id == $row_old->pro_country)
                                                    echo '<option SELECTED value="'.$row_Country->co_id.'">'.$row_Country->co_name.' :: '.$row_Country->co_name_kh.'</option>';
                                                else
                                                    echo '<option value="'.$row_Country->co_id.'">'.$row_Country->co_name.' :: '.$row_Country->co_name_kh.'</option>';
                                            }
                                         ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                                <button type="submit" name="btn_update" class="btn green"><i class="fa fa-save fa-fw"></i>Save Change</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>