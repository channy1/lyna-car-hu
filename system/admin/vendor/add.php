<?php 
    $menu_active =3;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php 
  if(isset($_POST['btn_add'])){
    
            $txt_ventor_name = @$connect->real_escape_string($_POST['txt_ventor_name']);
            $txt_current_address = @$connect->real_escape_string($_POST['txt_current_address']);
            $txt_phone = @$connect->real_escape_string($_POST['txt_phone']);
            $txt_email = @$connect->real_escape_string($_POST['txt_email']);
            $txt_dob = @$connect->real_escape_string($_POST['txt_dob']);
            // $txt_social = @$connect->real_escape_string($_POST['txt_social']);
            $txt_review = @$connect->real_escape_string($_POST['txt_review']);
            $txt_blacklist = @$connect->real_escape_string($_POST['txt_blacklist']);
            $txt_remake = @$connect->real_escape_string($_POST['txt_remake']);
            $txt_ref_no = @$connect->real_escape_string($_POST['txt_ref_no']);
            $txt_gender = @$connect->real_escape_string($_POST['txt_gender']);
            $s_fb = @$connect->real_escape_string($_POST['s_fb']);
            $s_tw = @$connect->real_escape_string($_POST['s_tw']);
            $s_lin = @$connect->real_escape_string($_POST['s_lin']);
            $s_google = @$connect->real_escape_string($_POST['s_google']);
            $s_email = @$connect->real_escape_string($_POST['s_email']);
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"],"../image/vendor/".$new_name);
            }
             $v_image1 = $new_name;
             $v_image_id_card = @$_FILES['txt_id_card'];
            if($v_image_id_card["name"] != ""){
                $new_name_id_card = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image_id_card["tmp_name"],"../image/vendor/".$new_name_id_card);
            }
             $v_image_id_card_insert = $new_name_id_card;


             $v_residence = @$_FILES['txt_residence_book'];
            if($v_residence["name"] != ""){
                $new_residence = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_residence["tmp_name"],"../image/vendor/".$new_residence);
            }
             $new_residence_insert = $new_residence;

               $v_passport = @$_FILES['txt_passport'];
            if($v_passport["name"] != ""){
                $new_passport = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_passport["tmp_name"],"../image/vendor/".$new_passport);
            }
             $new_passport_insert = $new_passport;


            $query_add = "INSERT INTO tbl_vendor(
                     `verdor_name`,
                     `current_address`,
                     `images`,
                     `phone`,
                     `email`,
                     `dob`,
                     `review`,
                     `black_list`,
                     `remark`,
                     `id_card`,
                     `residence_boook`,
                     `passport`,
                     `ref_no`,
                     `gender`,
                     `s_fb`,
                     `s_tw`,
                     `s_lin`,
                     `s_google`,
                     `s_email`
                     
                    ) VALUES(
                     '$txt_ventor_name',
                     '$txt_current_address',
                     '$v_image1',
                     '$txt_phone',
                     '$txt_email',
                     '$txt_dob',
                     '$txt_review',
                     '$txt_blacklist',
                     '$txt_remake',
                     '$v_image_id_card_insert',
                     '$new_residence_insert',
                     '$new_passport_insert',
                     '$txt_ref_no',
                     '$txt_gender',
                     '$s_fb',
                     '$s_tw',
                     '$s_lin',
                     '$s_google',
                     '$s_email'
                    )";
            if($connect->query($query_add)){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> '.mysqli_error($connect).'...
                </div>';   
            }
    }


 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>ADD VENDOR LIST CONTROL PANEL</h2>
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
            <div class="panel-heading" style="color: #fff;background-color:#767676;border-color: #337ab7;margin-bottom: -14px;">
                <h3 class="panel-title">Vendor List Input Information</h3>
            </div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                         <div style="background-color:#CDCDCD;">
                          <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Ref.N<sup>o</sup>:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_ref_no" placeholder="Enter Ref No" autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Vendor Name</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_ventor_name" placeholder="Enter Vendor" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Gender:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <select name="txt_gender" class="form-control">
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                    </select>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">User Photo:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="file" class="form-control" name="txt_image" placeholder=""  autocomplete="off">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Current Address:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" class="form-control" name="txt_current_address" placeholder="Enter current address"  autocomplete="off" required>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Phone:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <input type="text" class="form-control" name="txt_phone" placeholder="Enter phone"  autocomplete="off" required>
                                  </div>
                                </div>
                              </div>
                               <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Email:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="email" class="form-control" name="txt_email" placeholder="Enter Email"  autocomplete="off" required>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Date Of Birth:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <input type="date" class="form-control" name="txt_dob" placeholder="Enter Date Of Birth"  autocomplete="off" required>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div style="background-color:#E6B8BA;">
                        <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Social Media:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" value="" name="s_fb" placeholder="URL Facebook"> 
                                    <input type="text" value="" name="s_tw" placeholder="URL Twitter"> 
                                    <input type="text" value="" name="s_lin" placeholder="URL LinkedIn"> 
                                    <input type="text" value="" name="s_google" placeholder="URL Google+">
                                    <input type="text" value="" name="s_email" placeholder="URL Email"> 
                                    
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Review:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <textarea name="txt_review" class="md-textarea form-control" rows="3"></textarea>
                                   
                                  </div>
                                </div>
                              </div>

                           <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Blacklist:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <select name="txt_blacklist" class="form-control" required>
                                      <option>==Select one===</option>
                                      <option value="Good">Good</option>
                                      <option value="Excellency">Excellency</option>
                                      <option value="Blacklist">Blacklist</option>
                                    </select>
                                     
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Remarks:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <textarea name="txt_remake" class="md-textarea form-control" rows="3"></textarea>
                                  
                                  </div>
                                </div>
                              </div> 
                          </div> 

                     <div style="background-color:#92D053;">     
                     <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">ID Card:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="file" class="form-control" name="txt_id_card"  autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Residence Book:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="file" class="form-control" name="txt_residence_book" placeholder=""  autocomplete="off">
                                  </div>
                                </div>
                    </div>
                    <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Passport Photo:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="file" class="form-control" name="txt_passport"  autocomplete="off">
                                  </div>
                                </div>
                                 <div style="background-color:#959595 !important;color: white;width: 50%;float: right;padding: 10px;">
                               
                                 
                                  <div style="width: 47%;float: right;"> <button type="reset" style="background: none;border: none;font-size: 18px;">Clear</button></div>
                                  <div style="width: 15%;float: right;"> <button type="submit" name="btn_add" style="background: none;border: none;font-size:18px;">Add</button></div>
                                
                              </div>
                    </div>

                         
                    </div> 


                            
                        
                           

                        </div>
                    </div>
                   <!--  <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div> -->
                </form><br>
            </div>
        </div>
    </div>
</div>



<!-- <script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>  -->
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
