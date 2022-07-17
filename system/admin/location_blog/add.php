<?php 
    $menu_active =4;
    $layout_title = "Welcome to Website";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<?php 
    if(isset($_POST['btn_add'])){   
        $v_pro_name_en = @$connect->real_escape_string($_POST['txt_pro_name']);
        $v_pro_name_kh = @$connect->real_escape_string($_POST['txt_note']);
        $v_pro_name_jp = @$connect->real_escape_string($_POST['txt_name_jp']);
        $v_pro_country = @$connect->real_escape_string($_POST['txt_country']);
        $query_add = "INSERT INTO tbl_province (
             
                pro_name_en,
                pro_name_kh,
                pro_name_jp,
                pro_country)
            VALUES(
               
                '$v_pro_name_en',
                '$v_pro_name_kh',
                '$v_pro_name_jp', 
                '$v_pro_country'
            )";
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
    }

 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Create Record</h2>
        </div>
    </div>
    
 
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body">
                 <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                               
                                <div class="form-group">
                                    <label>Province Name English
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_pro_name" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Province Name Khmer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_note" placeholder="" required="required" autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label>Province Name Japan
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_name_jp" placeholder="" required="required" autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label>Country
                                        <span class="required" aria-required="true">*</span>
                                    </label><br>
                                    <select class="form-control selectpicker" data-live-search="true" name="txt_country" required=""> 
                                        <option value="">== Choose Country ==</option>
                                        <?php 
                                            $Country = $connect->query("SELECT * FROM tbl_ct_country ORDER BY co_name ASC");
                                            while ($row_Country= mysqli_fetch_object($Country)) {
                                                echo '<option value="'.$row_Country->co_id.'">'.$row_Country->co_name.' :: '.$row_Country->co_name_kh.'</option>';
                                            }
                                         ?>
                                    </select>
                                    <!--<input type="text" class="form-control" name="txt_country" placeholder="" required="required" autocomplete="off">-->
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-save fa-fw"></i>Save</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>
<?php include_once '../layout/footer.php' ?>
