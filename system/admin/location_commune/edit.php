<?php 
    $menu_active =4;
    $left_active =3;
    $layout_title = "Welcome to Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php 
    if(isset($_POST['btn_update'])){
        $v_id = @$connect->real_escape_string($_POST['txt_id']);
        $v_commune_en = @$connect->real_escape_string($_POST['txt_commune_name_en']);
        $v_commune_kh = @$connect->real_escape_string($_POST['txt_commune_name_kh']);
        $v_com_name_jp = @$connect->real_escape_string($_POST['txt_commune_name_jp']);
        $v_district = @$connect->real_escape_string($_POST['txt_district']);
        
        $query_update = "UPDATE tbl_commune SET
                com_name_en='$v_commune_en',
                com_name_kh='$v_commune_kh',
                com_name_jp='$v_com_name_jp',
                com_district_id='$v_district'
                WHERE com_id='$v_id'";
        if($connect->query($query_update)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data update ...
            </div>'; 
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>';   
        }
    }


// get old data 
    $edit_id = @$_GET['edit_id'];
    $old_data = $connect->query("SELECT * FROM tbl_commune WHERE com_id='$edit_id'");
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
                 <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="txt_id" value="<?= $row_old->com_id ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Commune Name English
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_commune_name_en" placeholder="" required="required" autocomplete="off" value="<?= $row_old->com_name_en ?>">
                                </div>
                                <div class="form-group">
                                    <label>Commune Name Khmer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_commune_name_kh" placeholder="" required="required" autocomplete="off" value="<?= $row_old->com_name_kh ?>">
                                </div>
                                <div class="form-group">
                                    <label>Commune Name Japan
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_commune_name_jp" placeholder="" required="required" autocomplete="off" value="<?= $row_old->com_name_jp ?>">
                                </div>
                                <div class="form-group">
                                    <label>District <span class="required" aria-required="true">*</span></label>
                                    <select class="form-control selectpicker" name="txt_district" data-live-search="true" required="required">
                                        <option value="">=== Please Choose District ===</option>
                                        <?php 
                                            $district = $connect->query("SELECT * FROM tbl_district ORDER BY dis_name_en ASC");
                                            while ($row_district = mysqli_fetch_object($district)) {
                                                if($row_district->dis_id == $row_old->com_district_id){
                                                echo '<option SELECTED value="'.$row_district->dis_id.'">'.$row_district->dis_name_en.' :: '.$row_district->dis_name_kh.'</option>';
                                                    
                                                }else{

                                                echo '<option value="'.$row_district->dis_id.'">'.$row_district->dis_name_en.' :: '.$row_district->dis_name_kh.'</option>';
                                                }
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
                                <button type="submit" name="btn_update" class="btn green"><i class="fa fa-check fa-fw"></i>Update</button>
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