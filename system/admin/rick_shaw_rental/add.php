<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';


    if(isset($_POST['btn_add'])){
            $v_image = @$_FILES['txt_image'];

            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"],"../image/vehicle_rental/".$new_name);
            }else{
                $new_name = "blank.png";
            }

            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            //$v_image = @$connect->real_escape_string($_POST['txt_image']);
            $v_image1 = $new_name;
            $v_ref = @$connect->real_escape_string($_POST['txt_ref']);
            $v_year = @$connect->real_escape_string($_POST['txt_year']);
            $province_name = @$connect->real_escape_string($_POST['province_name']);
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
            

            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);
            $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);
            $txt_status = @$connect->real_escape_string($_POST['txt_status']);
            $txt_price = @$connect->real_escape_string($_POST['txt_price']);
            $txt_price_rent = @$connect->real_escape_string($_POST['txt_price_rent']);
            $txt_province_id = @$connect->real_escape_string($_POST['txt_province_id']);
            $txt_refun_deposit = @$connect->real_escape_string($_POST['txt_refun_deposit']);

            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            $query_add = "INSERT INTO tbl_rick_shaw_rental_last (
                    ve_title,
                    ve_image,
                    ve_province_name,
                    ve_ref_no,
                    ve_year,
                    ve_make,
                    ve_model,
                    ve_sub_model,
                    ve_color,
                    ve_horse_pow,
                    ve_no_of_seat,
                    ve_transmission_type,
                    ve_vehical_type,
                    ve_type,
                    ve_maximum_weight,
                    ve_steering_wheel_type,
                    ve_no_of_axles,
                    ve_no_of_eylinders,
                    ve_cylinders_disp,
                    ve_test_drive_url,
                    ve_show_url,
                    ve_note,
                   
                    ve_detail,
                    vat,
                    discount,
                    status,
                    car_price,
                    add_by_id,
                    price_rent,
                    province_id,
                    refun_deposit
                    ) 
                VALUES(
                    '$v_title',
                    '$v_image1',
                    '$province_name',
                    '$v_ref',
                    '$v_year',
                    '$v_make',
                    '$v_model',
                    '$v_sub_model',
                    '$v_color',
                    '$v_horse_power',
                    '$v_no_of_seat',
                    '$v_transmission_type',
                    '$v_type',
                    '$v_vehical_type',
                    '$v_maximum_weight',
                    '$v_steering_wheel_type',
                    '$v_no_of_axles',
                    '$v_no_of_eylinders',
                    '$v_cylinders_disp',
                    '$v_test_drive_url',
                    '$v_show_url',
                    '$v_note',
                    '$v_detail',
                    '$txt_vat',
                    '$txt_discount',
                    '$txt_status',
                    '$txt_price',
                    '0',
                    '$txt_price_rent',
                    '$txt_province_id',
                    '$txt_refun_deposit'

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
        //}else{
        //     $sms = '<div class="alert alert-danger">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <strong>Error!</strong> Please Insert Image ...
        //         </div>';
        // }
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

  <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">បញ្ចូល កង់បីសំរាប់ជួល</b></h3>
                <b style="font-size: 20px;">​​​​​ADD RICKSHAW RENTAL</b><br><br>
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
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Choose Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Choose Image to Upload...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="file" class="form-control"  name="txt_image" placeholder="Image.jpg"   autocomplete="off" style="background-color: white;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Vehical_Ref_No
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vehical Ref No...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_ref" placeholder="Enter Ref No"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Province Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Province name...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <!---<input type="text" class="form-control" name="province_name" placeholder="Enter Province Name"  autocomplete="off" style="background-color:white;">---->
                                    <select class="" name="province_name" id="province_name">
		                                <?php $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title";
		                                    $result = $connect->query($v_sql);
		                                    if ($result->num_rows > 0) {
		                                        while($row = $result->fetch_assoc()) { ?>
		                                        	<option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
		                                      	<?php 
		                                     	}
		                                	} ?>
		                            </select>
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
                                    <input type="text" class="form-control" name="txt_year" placeholder="Enter Year"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Make
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Make...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_make" placeholder="Enter Make"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Model
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Model...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_model" placeholder="Enter Model"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Sub Model
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Model...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_sub_model" placeholder="Enter Sub Model"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Color
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Color...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_color" placeholder="Enter Color"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Horse Power
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Horse Power...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_horse_power" placeholder="Enter Horse Power"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">No of Seat
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter No of seat...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_no_of_seat" placeholder="Enter No of Seat"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Transmission type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Transmission type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_transmission_type" placeholder="Enter Transmission type"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Vehical type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vehical type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_vehical_type" placeholder="Enter Vehical"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_type" placeholder="Enter Type"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Maximum Weight
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Maximum Weight...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_maximum_weight" placeholder="Enter Maximum Weight"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Steering Wheel Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Steering Wheel Type...</span>
                                   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_steering_wheel_type" placeholder="Enter Steering wheel type"  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">No of axles
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Number of axles...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_no_of_axles" placeholder="Enter No of axles"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">No of eylinders
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter No of eylinders...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_no_of_eylinders" placeholder="Enter No of eylinders"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Cylinders disp
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Cylinders disp...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_cylinders_disp" placeholder="Enter Cylinders disp"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Test drive url
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Test drive url...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_test_drive_url" placeholder="Enter Test drive url"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Show url
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Show url...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_show_url" placeholder="Enter Show url"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Note
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Note...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <textarea class="form-control" name="txt_note" placeholder="Enter Note"  autocomplete="off" style="background-color: white;"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            
                
                            
                            
        

                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">VAT
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vat...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_vat" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Discount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Discount...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <input type="text" class="form-control" name="txt_discount" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Status
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter status...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                    <select class="form-control" name="txt_status" style="background-color: white;">
                                         <option value="1">Rent</option>
                                         <option value="2">Sale</option>
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Price for Sale
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                   <input type="text" name="txt_price" class="form-control" style="background-color:white;">
                                  </div>
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Price for Rent/day
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                   <input type="text" name="txt_price_rent" class="form-control" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                      <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Refundale Deposit
                                        
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
                                   <input type="text"  name="txt_refun_deposit" class="form-control" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
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
                                    value=".$row['pv_id'].">&hearts; ".strtoupper($row["pv_title"])."</option>";
                                                }
                                            }
                                        ?>
                                     </select>
                                  
                                  </div>
                                </div>
                            </div>










                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <textarea style="height: 290px;" class="form-control detail" id="detail" name="txt_detail" placeholder="http://www.facebook.com" autocomplete="off"></textarea>
                                    <label style="color: white;font-size: 15px;">Detail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Detail...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-5 text-center">
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
