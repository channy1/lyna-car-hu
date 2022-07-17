<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT tbl_accessory_make.make_id as id_make,tbl_accessory_make.make_name as make_name,
    tbl_accessory_model.model_name as model_name,tbl_accessory_model.order_number as order_model
     FROM tbl_accessory_make INNER JOIN tbl_accessory_model 
    ON tbl_accessory_make.make_id = tbl_accessory_model.make_id  WHERE model_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $id_make = $row["id_make"];
        $make_name = $row["make_name"];
        $model_name = $row["model_name"];
        $order_model = $row["order_model"];
        }
    }
    else{}
?>

<?php 
    
     if(isset($_POST['btn_add'])){

            $txt_accessory_make_id = @$connect->real_escape_string($_POST['txt_accessory_make_id']);
            $txt_order = @$connect->real_escape_string($_POST['txt_order']);
            $txt_accessory_model = @$connect->real_escape_string($_POST['txt_accessory_model']);
            $id = @$_SESSION["user"]->user_id;

            $query_add = "UPDATE tbl_accessory_model SET 
            make_id ='$txt_accessory_make_id',
            model_name = '$txt_accessory_model',
            order_number='txt_order',
            add_bye='$id'
            WHERE model_id='$edit_id'";
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
    <div class="portlet-body" style="margin-top: -15px;">
        <div class="panel panel-primary">
            <div class="panel-heading" style="margin-bottom: -14px;">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body">
                   <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                             <div style="background-color:#CDCDCD;">
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Accessories Make:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <select name="txt_accessory_make_id" class="form-control">
                                        <option value="">===Select===</option>
                                        <?php
                                            $v_sql = "SELECT * FROM tbl_accessory_make ";
                                            $result = $connect->query($v_sql);
                                             if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                        ?>
                                        <option <?php if($id_make==$row["make_id"]) {echo "selected='selected'";} else {echo "";} ?> value="<?php echo $row["make_id"]; ?>"><?php echo $row["make_name"]; ?></option>
                                      <?php }} ?>
                                    </select>
                                    
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Order:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" value="<?php echo $order_model; ?>"  class="form-control" name="txt_order" placeholder="Order Number" autocomplete="off">
                                  </div>
                                </div style="margin-bottom:10px;">

                               
                                    <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Accessories Model:</label>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                          <div class="md-form mt-0">
                                            <input type="text" value="<?php echo $model_name; ?>" class="form-control" name="txt_accessory_model" placeholder="Accessories Model" autocomplete="off">
                                          </div>
                                        </div>
                                        <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></label>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                          <div class="md-form mt-0">
                                            
                                          </div>
                                        </div>
                               


                                 <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                  
                                  </div>
                                </div>
                                  <div style="background-color:#959595 !important;color: white;width: 50%;float: right;padding: 10px;">
                                  <div style="width: 47%;float: right;"> <button type="reset" style="background: none;border: none;font-size: 18px;">Clear</button></div>
                                  <div style="width: 15%;float: right;"> <button type="submit" name="btn_add" style="background: none;border: none;font-size:18px;">Edit</button></div>
                                
                              </div>
                            </div>
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
