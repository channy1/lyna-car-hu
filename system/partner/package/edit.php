<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_accessories_rental WHERE ac_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $title = $row["ac_title"];
        $no = $row["ac_ref_no"];
        $image = $row["ac_image"];
        $day1=$row["ac_days(1-7)"];
        $ex_day1=$row["ac_extradays(1-7)"];
        $day2=$row["ac_days(15-26)"];
        $ex_day2=$row["ac_extradays(15-26)"];
        $monthly=$row["ac_monthly"];
        $ex_monthly=$row["ac_extramonthly"];
        $yearly=$row["ac_yearly"];
        $ex_yearly=$row["ac_extrayearly"];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], "../image/accessories rental/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_ref = @$connect->real_escape_string($_POST['txt_ref']);
            $v_days1_7 = @$connect->real_escape_string($_POST['txt_days(1-7)']);
            $v_extradays1_7 = @$connect->real_escape_string($_POST['txt_extradays(1-7)']);
            $v_days15_26 = @$connect->real_escape_string($_POST['txt_days(15-26)']);
            $v_extradays15_26 = @$connect->real_escape_string($_POST['txt_extradays(15-26)']);
            $v_monthly = @$connect->real_escape_string($_POST['txt_monthly']);
            $v_monthly_extradays = @$connect->real_escape_string($_POST['txt_monthly_extradays']);
            $v_yearly = @$connect->real_escape_string($_POST['txt_yearly']);
            $v_yearly_extradays = @$connect->real_escape_string($_POST['txt_yearly_extradays']);
            $query_add = "UPDATE tbl_accessories_rental SET 
            ac_title='$v_title',
            ac_image='$new_name',
            ac_ref_no='$v_ref',
            `ac_days(1-7)`='$v_days1_7',
            `ac_extradays(1-7)`='$v_extradays1_7',
            `ac_days(15-26)`='$v_days15_26',
            `ac_extradays(15-26)`='$v_extradays15_26',
            ac_monthly='$v_monthly',
            ac_extramonthly='$v_monthly_extradays',
            ac_yearly='$v_yearly',
            ac_extrayearly='$v_yearly_extradays'
            WHERE ac_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error '.mysqli_error($connect).'...
                </div>';   
            }
    }

 ?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_accessories_rental WHERE ac_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $title = $row["ac_title"];
        $image = $row["ac_image"];
        $no = $row["ac_ref_no"];
        $day1=$row["ac_days(1-7)"];
        $ex_day1=$row["ac_extradays(1-7)"];
        $day2=$row["ac_days(15-26)"];
        $ex_day2=$row["ac_extradays(15-26)"];
        $monthly=$row["ac_monthly"];
        $ex_monthly=$row["ac_extramonthly"];
        $yearly=$row["ac_yearly"];
        $ex_yearly=$row["ac_extrayearly"];
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

     <div style=" border: solid; border-right: 0; border-left: 0; border-top: 0;">
        <div class="text-center" style="float: left; "><img src="lyna.jpg" style="width: 150px;height: 150px;"></div>
        <div style="text-align: center; width: 100%;margin-left: -50px;">
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> កែសម្រួល គ្រឿងជួល</b><br>
                <b style="font-size: 20px;color:#2F05A5"> EDIT ACCESSORIES RENTAL</b><br><br>
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
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                        
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title" value="<?php echo ($title); ?>"  required="required" autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Image...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="file" class="form-control" name="txt_image" placeholder="Enter Icon name"  autocomplete="off" style="background-color:white; margin-left: 80px;">
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-2">

                                <img src="../image/accessories rental   /<?php echo $image;?>" alt="<?php echo $image; ?>" style="width:100%;height:100px;border:2px solid black; border-radius:5px !important ;">
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Accessories_Ref_No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vehical Ref No...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_ref" value="<?php echo ($no); ?>" placeholder="Enter Ref No"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Days(1-7)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_days(1-7)" placeholder="Enter Title" value="<?php echo ($day1); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Extradays(1-7)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_extradays(1-7)" placeholder="Enter Title" value="<?php echo ($ex_day1); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Days(15-26)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_days(15-26)" placeholder="Enter Title" value="<?php echo ($day2); ?>"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Extradays(15-26)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_extradays(15-26)" value="<?php echo ($ex_day2); ?>" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Monthly
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Monthly...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_monthly" placeholder="Enter Title" value="<?php echo ($monthly); ?>" autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Monthly_Extradays
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_monthly_extradays" placeholder="Enter Title" value="<?php echo ($ex_monthly); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Yearly
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_yearly" placeholder="Enter Title" value="<?php echo ($yearly); ?>"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px; "class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Yearly_Extradays
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="txt_yearly_extradays" placeholder="Enter Title" value="<?php echo ($ex_yearly); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>


                           
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-5 text-center">
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
