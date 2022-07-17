<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
  //  include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_logo WHERE lg_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["lg_title"];
            $image = $row["lg_image"];
            $description = $row["lg_detail"];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){

        /*$v_image = @$_FILES['txt_image'];

        if($v_image["name"] != ""){
            $new_name = date("Ymd")."_".rand(1111,9999).".png";
            move_uploaded_file($v_image["tmp_name"], "../image/logo/".$new_name);
        }else{
            $new_name = $image;
            //echo "<script> alert ('hello'); </script> ";
        }*/


        if(!empty($_POST["logo_session"])){

            $image_data = $_POST['logo_session'];

            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $image_data = base64_decode($image_array_2[1]);
            //print_r($image_data);

            $new_name = rand(10,100).time().'.png';
            $path = '../image/logo/'.$new_name;

            file_put_contents($path, $image_data);
            //exit;

        }else{
            $new_name = "";
        }

        
        $v_title = @$connect->real_escape_string($_POST['txt_title']);
        $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
        $query_add = "UPDATE tbl_logo SET lg_title='$v_title',lg_image='$new_name',lg_detail='$v_detail' WHERE lg_id='$edit_id'";
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
    $query="SELECT * FROM tbl_logo WHERE lg_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["lg_title"];
            $image = $row["lg_image"];
            $description = $row["lg_detail"];
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
                <h3><b style=";font-family: Khmer OS Muol; ">កែសម្រួល ស្លាកសញ្ញា</b></h3>
                <b style="font-size: 20px;">​​​​​EDIT LOGO</b><br><br>
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
            <div class="panel-body" style="background-color: #800080; ">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-9">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <!--<div class="form-group form-md-line-input">
                                       <label style="color: white; font-size: 15px;" class="col-xs-4 col-sm-2 col-md-2 col-lg-2">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title" value="<?php //echo ($title); ?>"  required="required" autocomplete="off" style="background-color: white;">
                                    </div>
                                </div>-->
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                     <label style="color: white; font-size: 15px;" class="col-xs-5 col-sm-3 col-md-3 col-lg-2">Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Image...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                 <input type="file" name="upload_image" id="upload_image" />
                                 <input type="hidden" name="logo_session" id="logo_session" />
  					             <br />
  				
                                   </div>
                                </div>
                            </div>


                            </div>
                            <div class="col-sm-3" id="uploaded_image">
                                <img  src="../image/logo/<?php echo $image;?>" alt="<?php echo $image; ?>" style="width:100%;border:2px solid black; border-radius:5px !important ;">
                            </div>
                           <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <textarea style="height: 290px;" class="form-control detail" id="detail" name="txt_detail" placeholder="Repeat your password" required="required" autocomplete="off"><?php //echo ($description); ?></textarea>
                                    <label style="color: white; font-size: 15px;">Detail
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Detail...</span>
                                </div>
                            </div>-->
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




<style type="text/css">
    b,span{
        color: #800080;
        font-weight: 900;
    }
</style>



<!------ Image Cropper --------->

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog" style="margin-top:110px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-main btn-green crop_image" data-dismiss="modal">Crop</button>
                <button type="button" class="btn btn-main btn-muted" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<?php include_once '../layout/footer.php' ?>


<link rel="stylesheet" href="croppie.css">
<script src="croppie.js"></script>
<script>  


    $(document).ready(function(){

        $image_crop1 = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:300,
              height:60,
              type:'rectangle' //circle
            },
            boundary:{
              width:350,
              height:100
            }
        });

        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop1.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery1 bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });


        $('.crop_image').click(function(event){
            $image_crop1.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $('#logo_path_button').css("display","none");
                $('#slogo_path').css("display","none");
                $('#uploaded_image').html('<img src="'+response+'" class="img-thumbnail" />');
                $('#logo_session').val(response);
            })
        });
    });

</script>


