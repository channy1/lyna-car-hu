<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_info_center WHERE info_center_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $e_info_center_id = $row["info_center_id"];
        $e_title = $row["title"];
        $e_title_kh = $row["title_kh"];
        $image=$row["images"];
        $e_description = $row["description"];
        $e_description_kh = $row["description_kh"];
        $e_type= $row["event_type"];
        }
    }
    else{}
?>

<?php 
    
     if(isset($_POST['btn_save'])){
         $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], "../image/info_center/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $txt_title = @$connect->real_escape_string($_POST['txt_title']);
            $txt_description = @$connect->real_escape_string($_POST['txt_description']);
            $txt_event_type = @$connect->real_escape_string($_POST['txt_event_type']);
            $title_kh = @$connect->real_escape_string($_POST['txt_title_kh']);
            $description_kh = @$connect->real_escape_string($_POST['txt_description_kh']);
       

            $query_add = "UPDATE tbl_info_center SET 
            title ='$txt_title',
            description = '$txt_description',
            event_type='$txt_event_type',
            images='$new_name',description_kh='$description_kh',title_kh='$title_kh'
            WHERE info_center_id='$edit_id'";
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

        <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">កែសម្រួល បណ្ដុំពត័មាន</b></h3>
                <b style="font-size: 20px;">​​​​​EDIT INFO CENTER</b><br><br>
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
                           
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                <div class="form-group form-md-line-input">
                                       <label style="color:white; font-size: 15px;" class="col-xs-5 col-sm-3 col-md-3 col-lg-3">Title (En)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text"  class="form-control" name="txt_title" placeholder="Enter Title(En)"  autocomplete="off" required value="<?php echo ($e_title); ?>" style="background-color: white;">
                                    </div>
                                </div>
                                 <div class="form-group form-md-line-input">
                                       <label style="color:white; font-size: 15px;" class="col-xs-5 col-sm-3 col-md-3 col-lg-3">Title (Kh)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text"  class="form-control" name="txt_title_kh" placeholder="Enter Title(Kh)"  autocomplete="off" required value="<?php echo  $e_title_kh; ?>" style="background-color: white;">
                                    </div>
                                </div>
                            </div>
                       <div class="col-xs-3 col-sm-3">
                                <img src="../image/info_center/<?php echo $image;?>" alt="<?php echo $e_title; ?>" style="width:100%;height:100%;border:2px solid black; border-radius:5px !important ;">
                                </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                       <label style="color:white; font-size: 15px;" class="col-xs-5 col-sm-2 col-md-2 col-lg-2">Info Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Type...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                    <select name="txt_event_type" class="form-control" required="" style="background-color: white;">
                                        <option value="">Select event</option>
                                      
                                       
                                        <option <?php if($e_type=="1") {echo "selected='selected'";} else {echo "";} ?> value="1">PHOTO GALLERIES</option> 
                                        <option <?php if($e_type=="2") {echo "selected='selected'";} else {echo "";} ?> value="2">LATEST NEWS</option>
                                        <option <?php if($e_type=="3") {echo "selected='selected'";} else {echo "";} ?> value="3">REGULATION UPDATES</option>
                                                                                   
                                           
                                    </select>
                                 </div>
                                </div>
                            </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group form-md-line-input">
                                 <label style="color:white; font-size: 15px;" class="col-xs-5 col-sm-2 col-md-2 col-lg-2">Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Image...</span>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                    <input type="file" class="form-control" name="txt_image" placeholder="Enter Icon name"  autocomplete="off" style="background-color: white;">
                                </div>    
                               </div>    
                        </div>         
                                
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    
                                    <textarea row="5" class="form-control detail" id="detail" name="txt_description" placeholder=""  autocomplete="off"><?php echo ($e_description); ?></textarea>
                                    <label style="color:white; font-size: 15px;">Description (En)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Description...</span>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    
                                    <textarea row="5" class="form-control detail" id="details" name="txt_description_kh" placeholder=""  autocomplete="off"><?php echo $e_description_kh; ?></textarea>
                                    <label style="color:white; font-size: 15px;">Description (Kh)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Description...</span>
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
      height: ''
        // uiColor: '#9AB8F3'
    });
     CKEDITOR.replace( 'details', {
        language: 'en',
      height: ''
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
