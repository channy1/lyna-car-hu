<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_customer_provide WHERE cpr_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $pro_id = $row["cpr_id"];
        $pro_name = $row["cpr_name"];
        $pro_note = $row["cpr_note"];
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
            
        $v_provide =  @$connect->real_escape_string($_POST['txt_provide']);
        $v_note =  @$connect->real_escape_string($_POST['txt_note']);
       

            $query_add = "UPDATE tbl_customer_provide SET 
            cpr_name ='$v_provide',
            cpr_note = '$v_note'
            WHERE cpr_id='$edit_id'";
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
    $query="SELECT * FROM tbl_customer_provide WHERE cpr_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $pro_name = $row["cpr_name"];
        $pro_note = $row["cpr_note"];
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
                                    <input type="text"  class="form-control" name="txt_provide" placeholder="Enter Provide"  autocomplete="off" required value="<?php echo ($pro_name); ?>">
                                    <label>Provide
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Provide...</span>
                                </div>
                            </div>
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    
                                    <input type="text"  class="form-control" name="txt_note" placeholder="Enter Note"  autocomplete="off"  value="<?php echo ($pro_note); ?>">
                                    
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
