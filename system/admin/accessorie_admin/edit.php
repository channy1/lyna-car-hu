<?php 
    $menu_active =3;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_accessory_admin INNER JOIN tbl_accessory_make on tbl_accessory_make.make_id=tbl_accessory_admin.make_id
    INNER JOIN tbl_accessory_model on tbl_accessory_model.model_id=tbl_accessory_admin.model_id WHERE acc_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $e_ref_no = $row["ref_no"];
        $e_acc_name = $row["acc_name"];
        $e_make_id = $row["make_id"];
        $e_model_id = $row["model_id"];
        $e_sub_model = $row["sub_model"];
        $e_imie = $row["imei"];
        $e_status = $row["status"];
        }
    }
    else{}
?>

<?php 
    
     if(isset($_POST['btn_add'])){
            $txt_ref_no = @$connect->real_escape_string($_POST['txt_ref_no']);
            $txt_accessory_name = @$connect->real_escape_string($_POST['txt_accessory_name']);
            $txt_accessory_make_id = @$connect->real_escape_string($_POST['txt_accessory_make_id']);
            $txt_accessory_model_id = @$connect->real_escape_string($_POST['txt_accessory_model_id']);
            $txt_sub_model = @$connect->real_escape_string($_POST['txt_sub_model']);
            $txt_imei = @$connect->real_escape_string($_POST['txt_imei']);
            $txt_status = @$connect->real_escape_string($_POST['txt_status']);
       

            $query_add = "UPDATE tbl_accessory_admin SET 
            ref_no ='$txt_ref_no',
            acc_name = '$txt_accessory_name',
            make_id='$txt_accessory_make_id',
            model_id='$txt_accessory_model_id',
            sub_model='$txt_sub_model',
            imei='$txt_imei',
            status='$txt_status'
            WHERE acc_id='$edit_id'";
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
                echo mysqli_error ($connect);
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

     <div style=" border: solid; border-right: 0; border-left: 0; border-top: 0;">
        <div class="text-center" style="float: left; "><img src="lyna.jpg" style="width: 150px;height: 150px;"></div>
        <div style="text-align: center; width: 100%;margin-left: -50px;">
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> កែសម្រួលគ្រឿងបន្លាស់ </b><br>
                <b style="font-size: 20px;color:#2F05A5">EDIT ACCESSORIES</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល / Head Quarter:</b><br>
                E-mail:%20info@lyna-carrental.com , skype:Skype: lyna-carrental.com<br>
               <h5 style="padding-left: 65px;">  tel:Cambodian: +855 (0)12 55 42 47 , tel:English: +855 (0)12 92 45 17 , tel:Booking: +855 (0)92 14 30 14</h5>
        </div>
        <div class="row">
             <div class="col-xs-4 col-sm-4 col-md-4">
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">

             </div>
        </div>
    </div>

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body" style="background-color:   #800080;">
                     <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body" >
                        <div class="row">
                         <div >
                          <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"style="color:white; font-size:15px; ">Ref No:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" value="<?php $e_ref_no; ?>" name="txt_ref_no" placeholder="Enter Ref No" autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"style="color:white; font-size:15px; ">Accessories Information</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" value="<?php $e_acc_name; ?>" class="form-control" name="txt_accessory_name" placeholder="Accessories Information" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"style="color:white; font-size:15px; ">Make:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <select id="make_id" name="txt_accessory_make_id" class="form-control">
                                        <option value="">===Select===</option>
                                        <?php
                                            $v_sql = "SELECT * FROM tbl_accessory_make ";
                                            $result = $connect->query($v_sql);
                                             if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["make_id"]; ?>"><?php echo $row["make_name"]; ?></option>
                                      <?php }} ?>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"style="color:white; font-size:15px; ">Model:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <select id="model_id" name="txt_accessory_model_id" class="form-control">
                                       
                                         <option>Select model</option>
                                       
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"style="color:white; font-size:15px; ">Sub-model:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" value="<?php $e_acc_name; ?>" class="form-control" name="txt_sub_model" placeholder="Enter Sub model"  autocomplete="off" required>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"style="color:white; font-size:15px; ">Imei No:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <input type="text" class="form-control" name="txt_imei" placeholder="Enter Imei No"  autocomplete="off" required>
                                  </div>
                                </div>
                              </div>
                              
                        </div>
                        <div >
                        <div class="form-group row" style="padding: 15px;">
                            <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"style="color:white; font-size:15px; ">Status:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <select name="txt_status" class="form-control">
                                    <option value="">===Select===</option>
                                    <option value="1">Enable</option>
                                    <option value="2">Disable</option>
                                   </select>
                                   
                                  </div>
                                </div>
                                <!-- Material input -->
                                <!-- <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Social Media:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" value="" name="s_fb" placeholder="URL Facebook"> 
                                    <input type="text" value="" name="s_tw" placeholder="URL Twitter"> 
                                    <input type="text" value="" name="s_lin" placeholder="URL LinkedIn"> 
                                    <input type="text" value="" name="s_google" placeholder="URL Google+">
                                    <input type="text" value="" name="s_email" placeholder="URL Email"> 
                                    
                                  </div>
                                </div> -->
                                
                              </div>

                         
                          </div> 

                  <!--    <div style="color:white; font-size:15px; ">     
                    
                    <div class="form-group row" style="padding: 15px;">
                                Material input
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

                         
                    </div>  -->


                            
                        
                           

                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
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



<!-- <script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script> -->
<script type="text/javascript">
    // CKEDITOR.replace( 'detail', {
    //     language: 'en',
    //   height: '700'
    //     // uiColor: '#9AB8F3'
    // });
</script>
<style type="text/css">
.form-group {
    margin-bottom:0px;
}
</style>

<?php include_once '../layout/footer.php' ?>
