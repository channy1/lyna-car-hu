<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
    
?>

<?php 
    if(isset($_POST['btn_add'])){

        $v_image = @$_FILES['txt_image'];

        if($v_image["name"] != ""){
            $new_name = date("Ymd")."_".rand(1111,9999).".png";
            move_uploaded_file($v_image["tmp_name"],"../image/accessories rental/".$new_name);
        }else{
            $new_name = "blank.png";
        }
        
        $v_title = @$connect->real_escape_string($_POST['txt_title']);
       
        $v_image1 = $new_name;
        $province_name = @$connect->real_escape_string($_POST['province_name']);
        $v_ref = @$connect->real_escape_string($_POST['txt_ref']);
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
        $txt_refun_deposit = @$connect->real_escape_string($_POST['txt_refun_deposit']);
        $v_year = @$connect->real_escape_string($_POST['txt_year']);
        $v_make = @$connect->real_escape_string($_POST['txt_make']);
        $v_model = @$connect->real_escape_string($_POST['txt_model']);
        $v_sub_model = @$connect->real_escape_string($_POST['txt_sub_model']);
        $v_color = @$connect->real_escape_string($_POST['txt_color']);
        $v_note = @$connect->real_escape_string($_POST['txt_detail']);
        $query_add = "INSERT INTO tbl_accessories_rental (
                ac_title,
                ac_image,
                ac_province_name,
                ac_ref_no,
                `ac_days(1-7)`,
                `ac_extradays(1-7)`,
                `ac_days(15-26)`,
                `ac_extradays(15-26)`,
                ac_monthly,
                ac_extramonthly,
                ac_yearly,
                ac_extrayearly,
                discount,
                vat,
                refun_deposit,
                ve_year,
                ve_make,
                ve_model,
                ve_sub_model,
                ve_color,
                note
                ) 
            VALUES(
                '$v_title',
                '$v_image1',
                '$province_name',
                '$v_ref',
                '$v_days1_7',
                '$v_extradays1_7',
                '$v_days15_26',
                '$v_extradays15_26',
                '$v_monthly',
                '$v_mo330nthly_extradays',
                '$v_yearly',
                '$v_yearly_extradays',
                '$txt_discount',
                '$txt_vat',
                '$txt_refun_deposit',
                '$v_year',
                '$v_make',
                '$v_model',
                '$v_sub_model',
                '$v_color',
                '$v_note'
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
                <h3><b style=";font-family: Khmer OS Muol; ">ឧបករសំរាប់ជួល</b></h3>
                <b style="font-size: 15px;">​​​​​ADD ACCESSORIES RENTAL</b><br><br>
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
                                	  <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	<label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Choose Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Choose Image to Upload...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="file" class="form-control"  name="txt_image" placeholder="Image.jpg"   autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Province Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Province Name...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
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
                                	 <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Ref.No.
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vehical Ref No...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_ref" placeholder="Enter Ref No"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>

                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Year
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Year...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_year"   autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Make
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Make...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_make"   autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Model
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Model...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_model"   autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Sub Model
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Model...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_sub_model"   autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Color
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Color...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_color"   autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Days(1-7)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_days(1-7)" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Extradays(1-7)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_extradays(1-7)" placeholder="Enter Title"  autocomplete="off" style="background-color: white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	<label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Days(15-26)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_days(15-26)" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Extradays(15-26)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_extradays(15-26)" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                	</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Monthly
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Monthly...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_monthly" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                   	</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	<label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Monthly_Extradays
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_monthly_extradays" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	   <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Yearly
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_yearly" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                 	</div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Yearly_Extradays
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_yearly_extradays" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">VAT
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Vat...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_vat" placeholder="Enter VAT"  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Discount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter discount...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_discount" placeholder="Enter "  autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-5">Refundale Deposit
                                
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter discount...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control" name="txt_refun_deposit" placeholder="Enter "  autocomplete="off" style="background-color:white;">
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
                    <br>
                    <br>
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
