<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_vehicle_rantal WHERE ve_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $title = $row["ve_title"];
        $image = $row["ve_image"];
        $description = $row["ve_detail"];

        $no=$row["ve_ref_no"];
        $year=$row["ve_year"];
        $make=$row["ve_make"];
        $model=$row["ve_model"];
        $sub_model=$row["ve_sub_model"];
        $color=$row["ve_color"];
        $power=$row["ve_horse_pow"];
        $seat=$row["ve_no_of_seat"];
        $tran_type=$row["ve_transmission_type"];
        $ve_type=$row["ve_vehical_type"];
        $type=$row["ve_type"];
        $max=$row["ve_maximum_weight"];
        $steering=$row["ve_steering_wheel_type"];
        $no_ax=$row["ve_no_of_axles"];
        $no_ey=$row["ve_no_of_eylinders"];
        $cy_disp=$row["ve_cylinders_disp"];
        $test_drive=$row["ve_test_drive_url"];
        $show=$row["ve_show_url"];
        $note=$row["ve_note"];
        $day1=$row["ve_days(1-7)"];
        $ex_day1=$row["ve_extra_days(1-7)"];
        $day2=$row["ve_day(15-26)"];
        $ex_day2=$row["ve_extra_day(15-26)"];
        $monthly=$row["ve_monthly"];
        $ex_monthly=$row["ve_monthy_extra_days"];
        $yearly=$row["ve_yearly"];
        $ex_yearly=$row["ve_yearly_extra_days"];

        $vat=$row['vat'];
        $discount=$row['discount'];
        $status=$row['status'];
        $car_price=$row['car_price'];
        $ld_ass=$row['ld_assistant'];
        $refun_deposit=$row['refun_deposit'];
        $v_frame=$row['frame'];
        $v_chassis_no=$row['chassis_no'];
        $v_engine_no=$row['engine_no'];
        $v_cylinder_size=$row['cylinder_size'];
        $v_placque_no=$row['placque_no'];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], "../image/vehicle_rental/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            $v_ref = @$connect->real_escape_string($_POST['txt_ref']);
            $v_year = @$connect->real_escape_string($_POST['txt_year']);
            $v_make = @$connect->real_escape_string($_POST['txt_make']);
            $v_model = @$connect->real_escape_string($_POST['txt_model']);
            $v_sub_model = @$connect->real_escape_string($_POST['txt_sub_model']);
            $v_color = @$connect->real_escape_string($_POST['txt_color']);
            $v_horse_power = @$connect->real_escape_string($_POST['txt_horse_power']);
            $v_no_of_seat = @$connect->real_escape_string($_POST['txt_no_of_seat']);
            $v_transmission_type = @$connect->real_escape_string($_POST['txt_transmission_type']);
            $v_vehical_type = @$connect->real_escape_string($_POST['txt_vehical_type']);
            $v_type = @$connect->real_escape_string($_POST['txt_type']);
            $v_maximum_weight = @$connect->real_escape_string($_POST['txt_maximum_weight']);
            $v_steering_wheel_type = @$connect->real_escape_string($_POST['txt_steering_wheel_type']);
            $v_no_of_eylinders = @$connect->real_escape_string($_POST['txt_no_of_eylinders']);
            $v_no_of_axles = @$connect->real_escape_string($_POST['txt_no_of_axles']);
            $v_cylinders_disp = @$connect->real_escape_string($_POST['txt_cylinders_disp']);
            $v_test_drive_url = @$connect->real_escape_string($_POST['txt_test_drive_url']);
            $v_show_url = @$connect->real_escape_string($_POST['txt_show_url']);
            $v_note = @$connect->real_escape_string($_POST['txt_note']);
            $v_days1_7 = @$connect->real_escape_string($_POST['txt_days(1-7)']);
            $v_extradays1_7 = @$connect->real_escape_string($_POST['txt_extradays(1-7)']);
            $v_days15_26 = @$connect->real_escape_string($_POST['txt_days(15-26)']);
            $v_extradays15_26 = @$connect->real_escape_string($_POST['txt_extradays(15-26)']);
            $v_monthly = @$connect->real_escape_string($_POST['txt_monthly']);
            $v_monthly_extradays = @$connect->real_escape_string($_POST['txt_monthly_extradays']);
            $v_yearly = @$connect->real_escape_string($_POST['txt_yearly']);
            $v_yearly_extradays = @$connect->real_escape_string($_POST['txt_yearly_extradays']);

            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);
            $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);
            $txt_status = @$connect->real_escape_string($_POST['txt_status']);
            $txt_price = @$connect->real_escape_string($_POST['txt_price']);
            $txt_ld_assistand = @$connect->real_escape_string($_POST['txt_ld_assistand']);
            $txt_refun_deposit = @$connect->real_escape_string($_POST['txt_refun_deposit']);

            $txt_frame = @$connect->real_escape_string($_POST['txt_frame']);
            $txt_chassis_no = @$connect->real_escape_string($_POST['txt_chassis_no']);
            $txt_engine_no = @$connect->real_escape_string($_POST['txt_engine_no']);
            $txt_cylinder_size = @$connect->real_escape_string($_POST['txt_cylinder_size']);
            $txt_placque_no = @$connect->real_escape_string($_POST['txt_placque_no']);
            $txt_province_id = @$connect->real_escape_string($_POST['txt_province_id']);

                        $time=time();
            $query_add = "UPDATE tbl_vehicle_rantal SET 
            frame='$txt_frame',
            chassis_no='$txt_chassis_no',
            engine_no='$txt_engine_no',
            cylinder_size='$txt_cylinder_size',
            placque_no='$txt_placque_no',
            ve_title='$v_title',
            ve_image='$new_name',
            ve_detail='$v_detail',
            ve_ref_no='$v_ref',
            ve_year='$v_year',
            ve_make='$v_make',
            ve_model='$v_model',
            ve_sub_model='$v_sub_model',
            ve_color='$v_color',
            ve_horse_pow='$v_horse_power',
            ve_no_of_seat='$v_no_of_seat',
            ve_transmission_type='$v_transmission_type',
            ve_vehical_type='$v_vehical_type',
            ve_type='$v_type',
            ve_maximum_weight='$v_maximum_weight',
            ve_steering_wheel_type='$v_steering_wheel_type',
            ve_no_of_axles='$v_no_of_axles',
            ve_no_of_eylinders='$v_no_of_eylinders',
            ve_cylinders_disp='$v_cylinders_disp',
            ve_test_drive_url='$v_test_drive_url',
            ve_show_url='$v_show_url',
            ve_note='$v_note',
            `ve_days(1-7)`='$v_days1_7',
            `ve_extra_days(1-7)`='$v_extradays1_7',
            `ve_day(15-26)`='$v_days15_26',
            `ve_extra_day(15-26)`='$v_extradays15_26',
            ve_monthly='$v_monthly',
            ve_monthy_extra_days='$v_monthly_extradays',
            ve_yearly='$v_yearly',
            ve_yearly_extra_days='$v_yearly_extradays',
            vat='$txt_vat',
            discount='$txt_discount',
            status='$txt_status',
            car_price='$txt_price',
            ld_assistant='$txt_ld_assistand',
            refun_deposit='$txt_refun_deposit',
            province_id='$txt_province_id',
            updated_on='$time'

            WHERE ve_id='$edit_id'";
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
    $query="SELECT * FROM tbl_vehicle_rantal WHERE ve_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["ve_title"];
            $image = $row["ve_image"];
            $description = $row["ve_detail"];

            $no=$row["ve_ref_no"];
            $year=$row["ve_year"];
            $make=$row["ve_make"];
            $model=$row["ve_model"];
            $sub_model=$row["ve_sub_model"];
            $color=$row["ve_color"];
            $power=$row["ve_horse_pow"];
            $seat=$row["ve_no_of_seat"];
            $tran_type=$row["ve_transmission_type"];
            $ve_type=$row["ve_vehical_type"];
            $type=$row["ve_type"];
            $max=$row["ve_maximum_weight"];
            $steering=$row["ve_steering_wheel_type"];
            $no_ax=$row["ve_no_of_axles"];
            $no_ey=$row["ve_no_of_eylinders"];
            $cy_disp=$row["ve_cylinders_disp"];
            $test_drive=$row["ve_test_drive_url"];
            $show=$row["ve_show_url"];
            $note=$row["ve_note"];
            $day1=$row["ve_days(1-7)"];
            $ex_day1=$row["ve_extra_days(1-7)"];
            $day2=$row["ve_day(15-26)"];
            $ex_day2=$row["ve_extra_day(15-26)"];
            $monthly=$row["ve_monthly"];
            $ex_monthly=$row["ve_monthy_extra_days"];
            $yearly=$row["ve_yearly"];
            $ex_yearly=$row["ve_yearly_extra_days"];
            $v_frame=$row['frame'];
            $v_chassis_no=$row['chassis_no'];
            $v_engine_no=$row['engine_no'];
            $v_cylinder_size=$row['cylinder_size'];
            $v_placque_no=$row['placque_no'];
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

     <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">កែសម្រួល រថយន្តសំរាប់ជួល</b></h3>
                <b style="font-size: 20px;">​​​​​EDIT VEHICLE RENTAL</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល| HEAD OFFICE</b><br>
                <span> Address: Room No. 9C2 | 9th Floor</span> <br>
                <span>H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)</span><br>
                <span>Street 271 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia</span> <br>
                <span>Eng/Khm: +855 (0) 12 55 42 47 | +855 (0) 92 14 30 14 | English Speaker Only: +855 (0) 12 924 517</span><br>
                <span> Skype ID: lyna-carrental.com | Line/WhatsApp/Telegram/Viber/WeChat: (+855) 12 55 42 47 | 92 14 30 14 | 12 924 517</span><br>
                <span>E-mail: info@lyna-carrental.com | Website: www.Lyna-CarRental.Com</span>
        </center>
        </div>
  </div>

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Vehicle Rental Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group form-md-line-input">
                                      <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Province Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                     <select name="txt_province_id" class="form-control" style="background-color:white;">
                                         <?php 
                                            $v_sql = "SELECT * FROM tbl_province order by pv_title ";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                             while($row = $result->fetch_assoc()){
                                                echo "<option style='text-transform: uppercase;' 
                                    value=".$row['pv_id'].">".strtoupper($row["pv_title"])."</option>";
                                                }
                                            }
                                        ?>
                                     </select>
                                  
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title" value="<?php echo ($title); ?>"  required="required" autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Choose Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Choose Image to Upload...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="file" class="form-control" name="txt_image" placeholder="Enter Icon name"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <img src="../image/vehicle_rental/<?php echo $image;?>" alt="<?php echo $image; ?>" style="width:100%;height:100px;border:2px solid black; border-radius:5px !important ;">
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Vehile Ref. No.
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vehile Ref. No....</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_ref" value="<?php echo ($no); ?>" placeholder="Vehile Ref. No."  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Year
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Year...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_year" value="<?php echo $year; ?>" placeholder="Enter Year"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Make
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Make...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" value="<?php echo ($make); ?>" name="txt_make" placeholder="Enter Make"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Model
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Model...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_model" value="<?php echo ($model); ?>" placeholder="Enter Model"  autocomplete="off" style="background-color:white;">
                                   
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Sub Model
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Model...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_sub_model" value="<?php echo ($sub_model); ?>" placeholder="Enter Sub Model"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Color
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Color...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_color" value="<?php echo ($color); ?>" placeholder="Enter Color"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Horse Power
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Horse Power...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_horse_power" value="<?php echo ($power); ?>" placeholder="Enter Horse Power"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Frame No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Frame No...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_frame" value="<?php echo ($v_frame); ?>" placeholder="Enter "  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Chassis No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Chassis No...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_chassis_no" value="<?php echo ($v_chassis_no); ?>" placeholder="Enter Chassis No"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Engine No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Engine No...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_engine_no" value="<?php echo ($v_engine_no); ?>" placeholder="Enter Engine No"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Cylinder Size
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Cylinder Size...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_cylinder_size" value="<?php echo ($v_cylinder_size); ?>" placeholder="Enter "  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Plaque No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Plaque No...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_placque_no" value="<?php echo ($v_placque_no); ?>" placeholder="Enter "  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">No of Seats
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter No of seats...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_no_of_seat" value="<?php echo ($seat); ?>" placeholder="Enter No of Seats"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Transmission Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Transmission Type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_transmission_type" value="<?php echo ($tran_type); ?>" placeholder="Enter Transmission Type"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Vehicle Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vehicle Type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_vehical_type" value="<?php echo ($ve_type); ?>" placeholder="Enter Vehicle Type"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_type" value="<?php echo ($type); ?>" placeholder="Enter Type"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Maximum Weight
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Maximum Weight...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_maximum_weight" value="<?php echo ($max); ?>" placeholder="Enter Maximum Weight"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Steering Wheel Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Steering Wheel Type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_steering_wheel_type" value="<?php echo ($steering); ?>" placeholder="Enter Steering wheel type"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">No of Axles
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Number of Axles...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_no_of_axles" value="<?php echo ($no_ax); ?>" placeholder="Enter No of Axles"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">No of Cylinders
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter No of Cylinders...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_no_of_eylinders" value="<?php echo ($no_ey); ?>" placeholder="Enter No of Cylinders"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Cylinders Disp
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Cylinders disp...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_cylinders_disp" value="<?php echo ($cy_disp); ?>" placeholder="Enter Cylinders Disp"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Test Drive URL
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Test Drive URL...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_test_drive_url" placeholder="Enter Test Drive URL" value="<?php echo ($test_drive); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Show URL
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Show URL...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_show_url" value="<?php echo ($show); ?>" placeholder="Enter Show URL"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Note
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Note...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <textarea class="form-control" name="txt_note" placeholder="Enter Note"  autocomplete="off" style="background-color: white;"><?php echo ($note); ?></textarea>
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Range Days (1-7)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Days (1-7)...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_days(1-7)" placeholder="Range Days (1-7)" value="<?php echo ($day1); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-5">Extra Days (1-7)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Extra Days (1-7)...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_extradays(1-7)" placeholder="Extra Days (1-7)" value="<?php echo ($ex_day1); ?>"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Range Days (15-26)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Days (15-26)...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_days(15-26)" placeholder="Range Days (15-26)" value="<?php echo ($day2); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Extra days(15-26)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Extra days(15-26)...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_extradays(15-26)" value="<?php echo ($ex_day2); ?>" placeholder="Extra days(15-26)"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Monthly
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Monthly...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_monthly" placeholder="Enter Title" value="<?php echo ($monthly); ?>" autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Monthly Extra Days
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Monthly Extra Days...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_monthly_extradays" placeholder="Monthly Extra Days" value="<?php echo ($ex_monthly); ?>"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Yearly
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Yearly...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_yearly" placeholder="Enter Yearly" value="<?php echo ($yearly); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Yearly Extra Days
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Yearly Extra Days...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_yearly_extradays" placeholder="Yearly Extra Days" value="<?php echo ($ex_yearly); ?>"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">VAT
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vat...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" value="<?php echo $vat; ?>" name="txt_vat" placeholder="Enter VAT"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Discount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Discount...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" value="<?php echo $discount; ?>" name="txt_discount" placeholder="Enter Discount"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Status
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Status...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <select class="form-control" name="txt_status" style="background-color: white;">
                                         <option <?php if($status=="1") {echo "selected='selected'";} ?> value="1">Rent</option>
                                         <option <?php if($status=="2") {echo "selected='selected'";} ?> value="2">Sale</option>
                                    </select>
                                   </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Price For Sale
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                   <input type="text" value="<?php echo $car_price; ?>" name="txt_price" class="form-control" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">LD Assistant
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter ...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                   <input type="text" value="<?php echo $ld_ass; ?>" name="txt_ld_assistand" class="form-control" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Refundale Deposit
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter ...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                   <input type="text" value="<?php echo $refun_deposit; ?>" name="txt_refun_deposit" class="form-control" style="background-color:white;">
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <textarea style="height: 290px;" class="form-control detail" id="detail" name="txt_detail" placeholder="Repeat your password" required="required" autocomplete="off"><?php echo ($description); ?></textarea>
                                    <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Detail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Detail...</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
      height: '200'
        // uiColor: '#9AB8F3'
    });
</script>
<style type="text/css">
    b,span{
        color: #800080;
        font-weight: 900;
    }
</style>

<?php include_once '../layout/footer.php' ?>
