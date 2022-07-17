<?php 
    $menu_active =4;
    $left_active =4;
    $layout_title = "Welcome to Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<?php 
    if(isset($_POST['btn_add'])){   
        $v_village_name_en = @$connect->real_escape_string($_POST['txt_village_name_en']);
        $v_village_name_kh = @$connect->real_escape_string($_POST['txt_village_name_kh']);
        $v_village_name_jp = @$connect->real_escape_string($_POST['txt_village_name_jp']);
        $v_commune = @$connect->real_escape_string($_POST['txt_commune']);
        $query_add = "INSERT INTO tbl_village (
                vil_name_en,
                vil_name_kh,
                vil_name_jp,
                vil_commune_id) 
            VALUES(
                '$v_village_name_en',
                '$v_village_name_kh',
                '$v_village_name_jp',
                '$v_commune')";
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
                                    <label>Village Name English
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_village_name_en" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Village Name Khmer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_village_name_kh" placeholder="" required="required" autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label>Village Name japan
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="txt_village_name_jp" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Commune <span class="required" aria-required="true">*</span></label>
                                    <select class="form-control selectpicker" name="txt_commune" data-live-search="true" required="required">
                                        <option value="">=== Please Choose Commune ===</option>
                                        <?php 
                                            $commune = $connect->query("SELECT * FROM tbl_commune ORDER BY com_name_en ASC");
                                            while ($row_commune = mysqli_fetch_object($commune)) {
                                                if($row_commune->com_id == @$_GET['parent_id'])
                                                    echo '<option SELECTED value="'.$row_commune->com_id.'">'.$row_commune->com_name_en.' :: '.$row_commune->com_name_kh.'</option>';
                                                else
                                                    echo '<option value="'.$row_commune->com_id.'">'.$row_commune->com_name_en.' :: '.$row_commune->com_name_kh.'</option>';
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
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
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
