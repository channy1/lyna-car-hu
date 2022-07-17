<?php 
    $menu_active =4;
    $left_active =3;
    $layout_title = "Welcome to Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<?php 
    if(isset($_POST['btn_add'])){   
        $v_com_name_en = @$connect->real_escape_string($_POST['txt_commune_name_en']);
        $v_com_name_kh = @$connect->real_escape_string($_POST['txt_commune_name_kh']);
        $v_com_name_jp = @$connect->real_escape_string($_POST['txt_commune_name_jp']);
        $v_district = @$connect->real_escape_string($_POST['txt_district']);
        $query_add = "INSERT INTO tbl_commune (
                com_name_en,
                com_name_kh,
                com_name_jp,
                com_district_id) 
            VALUES(
                '$v_com_name_en',
                '$v_com_name_kh',
                '$v_com_name_jp',
                '$v_district')";
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
                                    <label>Commune Name English
                                        <span class="required" aria-required="true">*</span>
                                    </label> 
                                    <input type="text" class="form-control" name="txt_commune_name_en" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Commune Name Khmer
                                        <span class="required" aria-required="true">*</span>
                                    </label> 
                                    <input type="text" class="form-control" name="txt_commune_name_kh" placeholder="" required="required" autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label>Commune Name Japan
                                        <span class="required" aria-required="true">*</span>
                                    </label> 
                                    <input type="text" class="form-control" name="txt_commune_name_jp" placeholder="" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>District <span class="required" aria-required="true">*</span></label> 
                                    <select class="form-control selectpicker" name="txt_district" data-live-search="true" required="required">
                                        <option value="">=== Please Choose District ===</option>
                                        <?php 
                                            $district = $connect->query("SELECT * FROM tbl_district ORDER BY dis_name_en ASC");
                                            while ($row_district = mysqli_fetch_object($district)) {
                                                if($row_district->dis_id == @$_GET['parent_id'])
                                                    echo '<option SELECTED value="'.$row_district->dis_id.'">'.$row_district->dis_name_en.'::'.$row_district->dis_name_kh.'</option>';
                                                else
                                                    echo '<option value="'.$row_district->dis_id.'">'.$row_district->dis_name_en.'::'.$row_district->dis_name_kh.'</option>';
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
