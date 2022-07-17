<style type="text/css">
    b,span{
        color: #800080;
        font-weight: 9003
    }
    .input_style {
        background-color:white !important;
        border-radius: 5px 5px !important;
        padding: 10px !important;
    }
</style>
<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
    $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_province_detail WHERE pl_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["pl_title"];
            $image = $row["pl_image"];
            $price = $row["pl_price"];
            $pro_id = $row["pl_pro_id"];
            $distance = $row["pl_distance"];
            $time_leave = $row["pl_time_leave"];
            $time_arrive = $row["pl_time_arrive"];
            $detail = $row["detail"];
            $detail_kh = $row["detail_kh"];
            $txt_allow_time=$row["allow_time"];
            $url_videos=$row['show_url'];
            $url_2 = $row['show_url_2'];
            $url_3 = $row['show_url_3'];
        }
    }
    if(isset($_POST['btn_save'])){
        $v_image = @$_FILES['txt_image'];
        if($v_image["name"] != ""){
            $new_name = date("Ymd")."_".rand(1111,9999).".png";
            move_uploaded_file($v_image["tmp_name"], "../image/province_detail/".$new_name);
        }else{
            $new_name = $image;
        }
        $v_title = @$connect->real_escape_string($_POST['txt_title']);
        $v_price = @$connect->real_escape_string($_POST['txt_price']);
        $v_distance = @$connect->real_escape_string($_POST['txt_distance']);
        $v_pro_id = @$connect->real_escape_string($_POST['txt_pro_id']);
        $v_time_leave = @$connect->real_escape_string($_POST['txt_time_leave']);
        $v_time_arrive = @$connect->real_escape_string($_POST['txt_time_arrive']);
        $v_detail = @$connect->real_escape_string($_POST['txt_detail']);
        $v_txt_allow_time = @$connect->real_escape_string($_POST['txt_allow_time']);
        $txt_show_url = @$connect->real_escape_string($_POST['txt_show_url']);
        $txt_show_url_2 = @$connect->real_escape_string($_POST['txt_show_url_2']);
        $txt_show_url_3 = @$connect->real_escape_string($_POST['txt_show_url_3']);
        $v_detail_kh = @$connect->real_escape_string($_POST['txt_detail_kh']);
        $query_add = "UPDATE tbl_province_detail SET pl_title='$v_title',pl_image='$new_name',pl_price='$v_price',pl_distance='$v_distance',pl_pro_id='$v_pro_id',pl_time_leave='$v_time_leave',pl_time_arrive='$v_time_arrive',detail='$v_detail',allow_time='$v_txt_allow_time'
            ,show_url='$txt_show_url',show_url_2='$txt_show_url_2',show_url_3='$txt_show_url_3',detail_kh='$v_detail_kh'
         WHERE pl_id='$edit_id'";
        if($connect->query($query_add) == TRUE){
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
            <h2><i class="fa fa-plus-circle fa-fw"></i>Edit Record</h2>
        </div>
    </div>
    <div class="portlet-title"></div>
    <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">ទីកន្លែងកំសាន្តក្នុងខេត្ត </b></h3>
                <b style="font-size: 20px;">​​​​​EDIT PLACE IN PROVINE</b><br><br>
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
                <h3 class="panel-title">Interesting Place Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-0 col-sm-12 col-md-12 col-lg-4">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-0 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control input_style" name="txt_title" placeholder="Enter Title" value="<?php echo ($title); ?>"  required="required" autocomplete="off">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;"class="col-xs-0 col-sm-12 col-md-12 col-lg-4">Price
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-0 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control input_style" name="txt_price" placeholder="Enter Price" value="<?php echo ($price); ?>"  required="required" autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                        <label style="color:white;font-size:15px;"class="col-xs-0 col-sm-12 col-md-12 col-lg-4">Distance
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Distance...</span>
                                    <div class="col-xs-0 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control input_style" name="txt_distance" placeholder="Enter Distance" value="<?php echo ($distance); ?>"  required="required" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-0 col-sm-12 col-md-12 col-lg-4">Province
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Province...</span>
                                   <div class="col-xs-0 col-sm-12 col-md-12 col-lg-6"> 
                                    <select name="txt_pro_id" class="form-control input_style" >
                                        <?php
                                            $v_sql = "SELECT * FROM tbl_province WHERE pv_id='$pro_id'";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0) {
                                                if($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row["pv_id"]."'>".$row["pv_title"]."</option>";
                                                }
                                            }
                                            $v_sql = "SELECT * FROM tbl_province";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<option value='".$row["pv_id"]."'>".$row["pv_title"]."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">Interesting Place Video 1
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Interesting Place Video 1 ...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" value="<?php echo $url_videos; ?>" class="form-control input_style" name="txt_show_url" placeholder="Interesting Place Video 1"  autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">Interesting Place Video 2</label>
                                    <span class="help-block">Enter Interesting Place Video 2</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control input_style" value="<?php echo $url_2 ; ?>" name="txt_show_url_2" placeholder="Enter Interesting Place Video 2"  autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">Interesting Place Video 3</label>
                                    <span class="help-block">Enter Interesting Place Video 3</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <input type="text" class="form-control input_style"  value="<?php echo $url_3 ; ?>" name="txt_show_url_3" placeholder="Enter Interesting Place Video 3"  autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">Departure Time
                                        <span class="required" aria-required="true">*</span>
                                 </label>
                                    <span class="help-block">Enter Departure Time...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="time" class="form-control input_style" name="txt_time_leave" placeholder="Enter Departure Time" value="<?php echo ($time_leave); ?>"  required="required" autocomplete="off">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-4">Arrival Time
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Arrival Time...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="time" class="form-control input_style" name="txt_time_arrive" placeholder="Enter Arrival Time" value="<?php echo ($time_arrive); ?>"  required="required" autocomplete="off" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;font-size:15px;"class="col-xs-12 col-sm-12 col-md-12 col-lg-4">Time Allowed
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Time Allowed...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="text" class="form-control input_style" name="txt_allow_time" value="<?php echo $txt_allow_time; ?>" placeholder="Enter Time Allowed"  autocomplete="off" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white;"class="col-xs-0 col-sm-12 col-md-12 col-lg-4">Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Image...</span>
                                    <div class="col-xs-0 col-sm-12 col-md-12 col-lg-6">
                                    <input type="file" class="form-control input_style" name="txt_image" placeholder="Enter Icon name"  autocomplete="off" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-12"></div>
                            <div class="col-xs-0 col-sm-6 col-md-6 col-lg-7 text-center" style="margin-top: 20px;margin-bottom: 10px;margin-left: -24px;">
                                <img style="width: auto; height: 200px;" src="../image/province_detail/<?php echo $image;?>" alt="<?php echo $image; ?>" style="width:100%;height:100px;border:2px solid black; border-radius:5px !important ;">
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <textarea style="height: 290px;" class="form-control detail" id="detail" name="txt_detail" autocomplete="off"><?php echo ($detail); ?></textarea>
                                    <label style="color:white;font-size:15px;">Detail In English
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Detail...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <textarea style="height: 290px;" class="form-control detail" id="detail_kh" name="txt_detail_kh"  autocomplete="off">
                                        <?php echo ($detail_kh); ?></textarea>
                                    <label style="color:white;font-size:15px;">Detail In Khmer
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Detail...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6 text-center" style="margin-left: 7px;">
                                <button type="submit" name="btn_save" class="btn blue"><i class="fa fa-save fa-fw"></i>Save</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Back</a>
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
     CKEDITOR.replace( 'detail_kh', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
</script>
<?php include_once '../layout/footer.php' ?>
