<?php 
    $menu_active =4;
    $layout_title = "Welcome to Website";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<?php 
    if(isset($_POST['btn_add'])){   
        $v_dis_name = @$connect->real_escape_string($_POST['txt_district_name']);
        $v_dis_name_jp = @$connect->real_escape_string($_POST['txt_name_japan']);
        $v_pro_name = @$connect->real_escape_string($_POST['txt_province']);
        $v_pro_note = @$connect->real_escape_string($_POST['txt_note']);
        $query_add = "INSERT INTO tbl_district (
                dis_name_en,
                dis_province_id,
                dis_name_kh,
                dis_name_jp) 
            VALUES(
                '$v_dis_name',
                '$v_pro_name',
                '$v_pro_note',
                '$v_dis_name_jp')";
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
                 <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>District Name English
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_district_name" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>District Name Khmer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_note" placeholder="" required="required" autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label>District Name Japan
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_name_japan" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Province <span class="required" aria-required="true">*</span></label>
                                    <select class="form-control selectpicker" name="txt_province" required="required" data-live-search="true">
                                        <option value="">=== Please Choose Province ===</option>
                                        <?php 
                                            $province = $connect->query("SELECT * FROM tbl_province ORDER BY pro_name_en ASC");
                                            while ($row_province = mysqli_fetch_object($province)) {
                                                if($row_province->pro_id == @$_GET['parent_id'])
                                                    echo '<option SELECTED value="'.$row_province->pro_id.'">'.$row_province->pro_name_en.' :: '.$row_province->pro_name_kh.'</option>';
                                                else
                                                    echo '<option value="'.$row_province->pro_id.'">'.$row_province->pro_name_en.' :: '.$row_province->pro_name_kh.'</option>';
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
                                <a href="index.php?parent_id=<?= @$_GET['parent_id'] ?>" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
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
