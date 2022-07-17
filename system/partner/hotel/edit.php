<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    $id=@$_SESSION['user']->user_id;
    $get_id = $_GET["edit_id"]; 
    $v_sql_check = "SELECT * FROM tbl_hotel where ht_id='$get_id'";
    $results = $connect->query($v_sql_check);
    if ($results->num_rows > 0) {
      while($row_check = $results->fetch_assoc()) {
    if($row_check['add_by']==$id) {

?>


<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_hotel LEFT JOIN tbl_hotel_include_option  ON tbl_hotel.ht_id = tbl_hotel_include_option.hotel_id WHERE ht_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["ht_title"];
            $image = $row["ht_image"];
            $location = $row["ht_location"];
            $phone = $row["ht_phone"];
            $website = $row["ht_website"];
            $distance = $row["ht_distance"];
            $detail = $row["ht_detail"];
            $price=$row['price'];
            $u_adult=$row['adult'];
            $u_children=$row['children'];
            $u_room_total=$row['room_total'];
            $u_province_id=$row['province_id'];
            $u_vat=$row['vat'];
            $u_discount=$row['discount'];
           
        }
    }
    else{}




?>

<?php 
    
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], "../image/hotel/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_location = @$connect->real_escape_string($_POST['txt_location']);
            $v_phone = @$connect->real_escape_string($_POST['txt_phone']);
            $v_website = @$connect->real_escape_string($_POST['txt_website']);
            $v_distance = @$connect->real_escape_string($_POST['txt_distance']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']);
            $txt_price = @$connect->real_escape_string($_POST['txt_price']);
            $txt_adult = @$connect->real_escape_string($_POST['txt_adult']);
            $txt_children = @$connect->real_escape_string($_POST['txt_children']);
            $txt_room_number = @$connect->real_escape_string($_POST['txt_room_number']);
            $txt_province = @$connect->real_escape_string($_POST['txt_province']);
            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);
            $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);
            $query_add = "UPDATE tbl_hotel SET ht_title='$v_title',ht_image='$new_name',ht_location='$v_location',ht_phone='$v_phone',ht_website='$v_website',ht_distance='$v_distance',
            ht_detail='$v_detail',adult='$txt_adult',children='$txt_children',room_total='$txt_room_number',
            province_id='$txt_province',discount='$txt_discount',vat='$txt_vat',price='$txt_price'
            WHERE ht_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
                 $query_delete="DELETE FROM tbl_hotel_include_option WHERE hotel_id='$edit_id'";
                 $results = $connect->query($query_delete);
                $r_option_type="";
                $r_option_type = $_POST['chk'];
                   // convert to array of integer
                 $r_option_type = array_map('intval', $r_option_type);
                 foreach($r_option_type as $val){
                $sql_option = "INSERT INTO `tbl_hotel_include_option`(
                                  `hotel_id`,
                                  `name`
                              )
                              VALUES(
                                  '$edit_id',
                                  '$val'
                                  )";
                        if($connect->query($sql_option)){
                        } 
                  }


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

       <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h4><b style=";font-family: Khmer OS Muol; ">សណ្ឋាគារ និង ផ្ទះសំណាក់ </b></h4>
                <b style="font-size: 13px;">​​​​​EDIT HOLET AND GUESTHOUSE</b><br><br>
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
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">    
                                    <input type="text" value="<?php echo $title; ?>" class="form-control" name="txt_title" placeholder="Enter Title"  autocomplete="off" style="background-color:white;">
                                </div>   
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class=" col-xs-9 col-sm-12 col-md-12 col-lg-4">Choose Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Choose Image to Upload...</span>
                                    <div class="col-xs-7 col-sm-9 col-md-9 col-lg-5">
                                    <input type="file" class="form-control"  name="txt_image" placeholder="Image.jpg"   autocomplete="off" style="background-color:white;">
                                    </div>  
                                    <div class="col-xs-1 col-md-3">
                                       
                                        <img width="100px" height="100px" src="../../admin/image/hotel/<?php echo $image; ?>" td="">
                                    </div>                               
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Location
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Location...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <input type="text" value="<?php echo $location; ?>" class="form-control" name="txt_location" placeholder="Phnom penh, st 12, Nº 34 A" required="required" autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Province
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter province...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                     <select name="txt_province" class="form-control" style="background-color:white;">
                                        <?php 
                                            $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title 
                                            ";

                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    ?>
                                        <option <?php if($u_province_id==$row['pv_id']) {echo "selected='selected'";} ?> value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                                        <?php } } ?>
                                     </select>
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Phone
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Phone...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <input value="<?php echo $phone; ?>" type="phone" class="form-control" name="txt_phone" placeholder="012 345 677" required="required" autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Website
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Website...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <input value="<?php echo $website; ?>" type="text" class="form-control" name="txt_website" placeholder="http://www.hotel.com" required="required" autocomplete="off" style="background-color:white;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Distance From 
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Distance From City...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <input value="<?php echo $distance; ?>" type="text" class="form-control" name="txt_distance" placeholder="30Km" required="required" autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Price 
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <input type="text" value="<?php echo $price; ?>" class="form-control" name="txt_price" placeholder="example: 100" required="required" autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Discount 
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter discount...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <input type="text" value="<?php echo $u_discount; ?>" class="form-control" name="txt_discount" placeholder="example: 100" required="required" autocomplete="off" style="background-color:white;">
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">VAT(%) 
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter vat...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <select required="" name="txt_vat" class="form-control" style="background-color:white;">
                                        <option <?php if($u_vat=="0") {echo "selected='selected'";} ?> value="0">( 0%)</option>
                                        <option <?php if($u_vat=="10") {echo "selected='selected'";} ?> value="10">( 10%)</option>
                                      
                                    </select>
                                    
                                   </div>
                                </div>
                            </div>
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Adults 
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Adults...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <select required="" name="txt_adult" class="form-control" style="background-color:white;">
                                        <option value="">Adults</option>
                                        <option <?php if($u_adult=="1") {echo "selected='selected'";} ?> value="1">1</option>
                                        <option <?php if($u_adult=="2") {echo "selected='selected'";} ?> value="2">2</option>
                                        <option <?php if($u_adult=="3") {echo "selected='selected'";} ?> value="3">3</option>
                                    </select>
                                    
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Children 
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Children...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <select  name="txt_children" class="form-control" style="background-color:white;">
                                        <option value="">Children</option>
                                        <option <?php if($u_children=="1") {echo "selected='selected'";} ?> value="1">1</option>
                                        <option <?php if($u_children=="2") {echo "selected='selected'";} ?> value="2">2</option>
                                        <option <?php if($u_children=="3") {echo "selected='selected'";} ?> value="3">3</option>
                                    </select>
                                    
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class=" col-xs-12 col-sm-12 col-md-12 col-lg-4">Room Number 
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Room...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <input type="text" name="txt_room_number" value="<?php echo $u_room_total; ?>" class="form-control" style="background-color:white;">
            
                                   </div>
                                </div>
                            </div>

                         
                                
                                                  <?php
                                            $edit_id = $_GET["edit_id"]; 
                                            $query="SELECT tbl_hotel_include_option.name
                                             , (CASE WHEN tbl_hotel_include_option.name ='1' THEN tbl_hotel_include_option.name END) 'C1'
                                             , (CASE WHEN tbl_hotel_include_option.name ='2' THEN tbl_hotel_include_option.name END) 'C2'
                                             , (CASE WHEN tbl_hotel_include_option.name ='3' THEN tbl_hotel_include_option.name END) 'C3'
                                             , (CASE WHEN tbl_hotel_include_option.name ='4' THEN tbl_hotel_include_option.name END) 'C4'
                                             , (CASE WHEN tbl_hotel_include_option.name ='5' THEN tbl_hotel_include_option.name END) 'C5'
                                             , (CASE WHEN tbl_hotel_include_option.name ='6' THEN tbl_hotel_include_option.name END) 'C6'
                                             , (CASE WHEN tbl_hotel_include_option.name ='7' THEN tbl_hotel_include_option.name END) 'C7'
                                             , (CASE WHEN tbl_hotel_include_option.name ='8' THEN tbl_hotel_include_option.name END) 'C8'
                                            FROM 
                                             tbl_hotel_include_option WHERE tbl_hotel_include_option.hotel_id='$edit_id' 
                                            ";
                                          
                                            $result = $connect->query($query);
                                            //echo $query;
                                            $result_one_true="";
                                            $result_six_true="";
                                            $result_three_true="";
                                            $result_two_true="";
                                            $result_four_true="";
                                            $result_five_true="";
                                            $result_seven_true="";
                                            $result_eight_true="";
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $check=$row['name'];

                                                $check_one=$row['C1'];
                                                $check_two=$row['C2'];
                                                $check_three=$row['C3'];
                                                $check_four=$row['C4'];
                                                $check_five=$row['C5'];
                                                $check_six=$row['C6'];
                                                $check_seven=$row['C7'];
                                                $check_eight=$row['C8'];
                                                
                                                if($check_one !=""){
                                                    $result_one_true=$row['C1'];
                                                }
                                                if($check_two !=""){
                                                    $result_two_true=$row['C2'];
                                                }
                                                if($check_three !=""){
                                                    $result_three_true=$row['C3'];
                                                }
                                                if($check_four !=""){
                                                    $result_four_true=$row['C4'];
                                                }
                                                 if($check_five !=""){
                                                    $result_five_true=$row['C5'];
                                                }
                                                 if($check_six !=""){
                                                    $result_six_true=$row['C6'];
                                                }
                                                 if($check_seven !=""){
                                                    $result_seven_true=$row['C7'];
                                                }
                                                 if($check_eight !=""){
                                                    $result_eight_true=$row['C8'];
                                                }
                                               
                                                
                                                
                                            ?>
                                             
                                               
                                           
                                                 <?php  }} ?>
                                                
                                    


                           

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Your options here include</legend>
                                    <div class="control-group">
                                        <div class="custom-control custom-checkbox">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input <?php if($result_one_true=="1") {echo "checked";} ?>  type="checkbox" name="chk[]" value='1' class="custom-control-input" id="defaultUnchecked">
                                                    <label class="custom-control-label" for="defaultUnchecked">Breakfast</label><br>
                                                    <input <?php if($result_two_true=="2") {echo "checked";} ?>  type="checkbox" name="chk[]" value='2' class="custom-control-input" id="defaultUnchecked">
                                                    <label class="custom-control-label" for="defaultUnchecked">Pay at the hotel</label><br>
                                                    <input <?php if($result_three_true=="3") {echo "checked";} ?> type="checkbox" name="chk[]" value='3' class="custom-control-input" id="defaultUnchecked">
                                                    <label class="custom-control-label" for="defaultUnchecked">Welcome drink</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input <?php if($result_four_true=="4") {echo "checked";} ?> type="checkbox" name="chk[]" value='4' class="custom-control-input" id="defaultUnchecked">
                                                    <label  class="custom-control-label" for="defaultUnchecked">Complimentary in- room fruit</label><br>
                                                    <input <?php if($result_five_true=="5") {echo "checked";} ?> type="checkbox" name="chk[]" value='5' class="custom-control-input" id="defaultUnchecked">
                                                    <label class="custom-control-label" for="defaultUnchecked">Free cancellation</label><br>
                                                    <input <?php if($result_six_true=="6") {echo "checked";} ?> type="checkbox" name="chk[]" value='6' class="custom-control-input" id="defaultUnchecked">
                                                    <label class="custom-control-label" for="defaultUnchecked">Parking</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input <?php if($result_seven_true=="7") {echo "checked";} ?> type="checkbox" name="chk[]" value='7' class="custom-control-input" id="defaultUnchecked">
                                                    <label class="custom-control-label" for="defaultUnchecked">Free mini bar</label><br>
                                                    <input <?php if($result_eight_true=="8") {echo "checked";} ?> type="checkbox" name="chk[]" value='8' class="custom-control-input" id="defaultUnchecked">
                                                    <label class="custom-control-label" for="defaultUnchecked">Price includes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;">Discription
                                        <span class="required" aria-required="true">*</span>
                                    </label><br>
                                    <textarea style="height:150px;width:100%;" class="form-control_0" name="txt_detail" placeholder="Enter Discription" autocomplete="off"></textarea>
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
<?php
}
   }
}
?>


<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'detail', {
        language: 'en',
      height: '300'
        // uiColor: '#9AB8F3'
    });
</script>
<style type="text/css">
fieldset.scheduler-border {
    border: 2px groove #fff !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
    box-shadow:  0px 0px 0px 0px #000;

}

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
        color: white;
    }
    .custom-control-label {
        color: white;
    }
    b,span{
        color: #800080;
        font-weight: 900;
    }
</style>

<?php include_once '../layout/footer.php' ?>
