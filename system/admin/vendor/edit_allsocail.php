<?php 
    $menu_active =3;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_vendor WHERE vendor_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $e_vendor_id = $row["vendor_id"];
        $e_vendor_name = $row["verdor_name"];
        $image=$row["images"];
        $v_cu_address=$row['current_address'];
        $v_phone=$row['phone'];
        $v_email=$row['email'];
        $v_dob=$row['dob'];
        $v_eview=$row['review'];
        $v_black_list=$row['black_list'];
        $v_remark=$row['remark'];

        $v_passport=$row['passport'];
        $v_residence_row=$row['residence_boook'];
        $v_id_card=$row['id_card'];
        $v_re_no=$row["ref_no"];
        $v_gender=$row["gender"];
        $v_s_fb=$row["s_fb"];
        $v_s_tw=$row["s_tw"];
        $v_s_lin=$row["s_lin"];
        $v_s_google=$row["s_google"];
        $v_s_email=$row["s_email"];
        
          


        }
    }
    else{}
?>

<?php 
    
     if(isset($_POST['btn_save'])){
          $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], "../image/vendor/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }

          $v_image_id_card = @$_FILES['txt_id_card'];
            if($v_image_id_card["name"] != ""){
                $new_name_id_card = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image_id_card["tmp_name"], "../image/vendor/".$new_name_id_card);
            }else{
                $new_name_id_card = $v_id_card;
                //echo "<script> alert ('hello'); </script> ";
            }
             $v_residence = @$_FILES['txt_residence_book'];
            if($v_residence["name"] != ""){
                $new_name_residence = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_residence["tmp_name"], "../image/vendor/".$new_name_residence);
            }else{
                $new_name_residence = $v_residence_row;
                //echo "<script> alert ('hello'); </script> ";
            }

             $v_pass = @$_FILES['txt_passport'];
            if($v_pass["name"] != ""){
                $new_name_pass = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_pass["tmp_name"], "../image/vendor/".$new_name_pass);
            }else{
                $new_name_pass = $v_passport;
                //echo "<script> alert ('hello'); </script> ";
            }

            
            $txt_ventor_name = @$connect->real_escape_string($_POST['txt_ventor_name']);
            $txt_current_address = @$connect->real_escape_string($_POST['txt_current_address']);
            $txt_phone = @$connect->real_escape_string($_POST['txt_phone']);
            $txt_email = @$connect->real_escape_string($_POST['txt_email']);
            $txt_dob = @$connect->real_escape_string($_POST['txt_dob']);
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
       

            $query_add = "UPDATE tbl_vendor SET 
            verdor_name ='$txt_ventor_name',
            current_address = '$txt_current_address',
            phone='$txt_phone',
            images='$new_name',
            email='$txt_email',
            dob='$txt_dob',
            review='$txt_review',
            black_list='$txt_blacklist',
            remark='$txt_remake',
            id_card='$new_name_id_card',
            residence_boook='$new_name_residence',
            passport='$new_name_pass',
            ref_no='$txt_ref_no',
            gender='$txt_gender',
            s_fb='$s_fb',
            s_tw='$s_tw',
            s_lin='$s_lin',
            s_google='$s_google',
            s_email='$s_email'
            WHERE vendor_id='$edit_id'";
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
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading" style="color: #fff;background-color:#767676;border-color: #337ab7;margin-bottom: -14px;">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body">
                     <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                         <div style="background-color:#CDCDCD;">
                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Ref No:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" value="<?php echo  $v_re_no; ?>" class="form-control" name="txt_ref_no" placeholder="Enter Ref No" autocomplete="off">
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Vendor Name</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <input type="text" class="form-control" value="<?php echo $e_vendor_name; ?>" name="txt_ventor_name" placeholder="Enter Vendor" autocomplete="off">
                                  </div>
                                </div>
                              </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Gender:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <select name="txt_gender" class="form-control">
                                      <option <?php if($v_gender=="Male") {echo "selected='selected'";} ?> value="Male">Male</option>
                                      <option <?php if($v_gender=="Female") {echo "selected='selected'";} ?> value="Female">Female</option>
                                    </select>
                                    
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">User Photo:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="file" class="form-control" name="txt_image" placeholder=""  autocomplete="off">
                                  </div>
                                  <img src="../image/vendor/<?php echo $image; ?>" style="width:20%;" alt="<?php echo $e_vendor_name; ?>">
                                </div>
                              </div>
                              <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Current Address:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="text" value="<?php echo $v_cu_address; ?>" class="form-control" name="txt_current_address" placeholder="Enter current address"  autocomplete="off" required>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Phone:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <input type="text" value="<?php echo $v_phone; ?>" class="form-control" name="txt_phone" placeholder="Enter phone"  autocomplete="off" required>
                                  </div>
                                </div>
                              </div>
                               <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Email:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="email" value="<?php echo $v_email; ?>" class="form-control" name="txt_email" placeholder="Enter Email"  autocomplete="off" required>
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Date Of Birth:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <input type="date" value="<?php echo $v_dob; ?>" class="form-control" name="txt_dob" placeholder="Enter Date Of Birth"  autocomplete="off" required>
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
                                    <input type="text" value="<?php echo $v_s_fb; ?>" name="s_fb" placeholder="URL Facebook"> 
                                    <input type="text" value="<?php echo $v_s_tw; ?>" name="s_tw" placeholder="URL Twitter"> 
                                    <input type="text" value="<?php echo $v_s_lin; ?>" name="s_lin" placeholder="URL LinkedIn"> 
                                    <input type="text" value="<?php echo $v_s_google; ?>" name="s_google" placeholder="URL Google+">
                                    <input type="text" value="<?php echo $v_s_email; ?>" name="s_email" placeholder="URL Email"> 
                                    
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Review:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   <textarea name="txt_review" class="md-textarea form-control" rows="3"><?php echo $v_eview; ?></textarea>
                                   
                                  </div>
                                </div>
                              </div>

                           <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Blacklist:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <select name="txt_blacklist" class="form-control">
                                      <option>==Select one===</option>
                                      <option <?php if($v_black_list=="Good") {echo "selected='selected'";} ?> value="Good">Good</option>
                                      <option <?php if($v_black_list=="Excellency") {echo "selected='selected'";} ?>value="Excellency">Excellency</option>
                                      <option <?php if($v_black_list=="Blacklist") {echo "selected='selected'";} ?>value="Blacklist">Blacklist</option>
                                    </select>
                                    
                                     
                                  </div>
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Remarks:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <textarea name="txt_remake"  class="md-textarea form-control" rows="3"><?php echo $v_remark; ?></textarea>
                                  
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
                                   <img src="../image/vendor/<?php echo $v_id_card; ?>" style="width:20%;" alt="<?php echo $e_vendor_name; ?>">
                                </div>
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Residence Book:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="file" class="form-control" name="txt_residence_book" placeholder=""  autocomplete="off">
                                  </div>
                                   <img src="../image/vendor/<?php echo $v_residence_row; ?>" style="width:20%;" alt="<?php echo $e_vendor_name; ?>">
                                </div>
                    </div>
                    <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Passport Photo:</label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <input type="file" class="form-control" name="txt_passport"  autocomplete="off">
                                  </div>
                                  <img src="../image/vendor/<?php echo $v_passport; ?>" style="width:20%;" alt="<?php echo $e_vendor_name; ?>">
                                </div>
                                 <div style="background-color:#959595 !important;color: white;width: 50%;float: right;padding: 10px;">
                               
                                 
                                  <div style="width: 47%;float: right;"> <button type="reset" style="background: none;border: none;font-size: 18px;">Clear</button></div>

                                  <div style="width: 15%;float: right;"> <button type="submit" name="btn_save" style="background: none;border: none;font-size:18px;">Edit</button></div>
                                
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
