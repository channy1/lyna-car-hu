<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?> 


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_event_promotion WHERE e_pro_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$e_pro_id = $row["e_pro_id"];
			$e_title = $row["title"];
			$e_title_kh = $row["title_kh"];
			$image=$row["images"];
			$e_description = $row["description"];
			$e_description_kh = $row["description_kh"];
			$e_type= $row["event_type"];
			$event_date = $row["event_date"];
			$event_time= $row["event_time"];
			$event_location = $row["event_location"];
			$event_ticket= $row["event_ticket"];
        }
    }
?>



<?php 
    
     if(isset($_POST['btn_save'])){
        

            if(!empty($_POST['logo_session'])){
                $image_data = $_POST['logo_session'];

                $image_array_1 = explode(";", $image_data);
                $image_array_2 = explode(",", $image_array_1[1]);
                $image_data = base64_decode($image_array_2[1]);
                //print_r($image_data);

                $new_name = rand(10,100).time().'.png';
                 $path = '../image/img_event_promotion/'.$new_name;

                file_put_contents($path, $image_data);
              

            }else{
                $new_name = "";
            }
            
            
            $txt_title = @$connect->real_escape_string($_POST['txt_title']);
            $txt_title_kh = @$connect->real_escape_string($_POST['txt_title_kh']);
            $txt_description = @$connect->real_escape_string($_POST['txt_description']);
            $txt_description_kh = @$connect->real_escape_string($_POST['txt_description_kh']);
            $txt_event_type = @$connect->real_escape_string($_POST['txt_event_type']);
            $event_date = @$connect->real_escape_string($_POST['event_date']);
            $event_time = @$connect->real_escape_string($_POST['event_time']);
            $event_location = @$connect->real_escape_string($_POST['event_location']);
            $event_ticket = @$connect->real_escape_string($_POST['event_ticket']);
       
	   
	     if(!empty($_POST['logo_session'])){
            $query_add = "UPDATE tbl_event_promotion SET 
            title ='$txt_title',
            description = '$txt_description',
            event_type = '$txt_event_type',
            event_date = '$event_date',
            event_time = '$event_time',
            event_ticket = '$event_ticket',
            event_location ='$event_location',
            images='$new_name',description_kh='$txt_description_kh',title_kh='$txt_title_kh '
            WHERE e_pro_id='$edit_id'";
			
		 }else{
			 
			  
			 $query_add = "UPDATE tbl_event_promotion SET 
            title ='$txt_title',
            description = '$txt_description',
            event_type = '$txt_event_type',
            event_date = '$event_date',
            event_time = '$event_time',
            event_ticket = '$event_ticket',
            event_location ='$event_location',
            description_kh='$txt_description_kh',title_kh='$txt_title_kh '
            WHERE e_pro_id='$edit_id'";
			 
			 
			 
		 }
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
    $query="SELECT * FROM tbl_event_promotion WHERE e_pro_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$e_pro_id = $row["e_pro_id"];
			$e_title = $row["title"];
			$e_title_kh = $row["title_kh"];
			$image=$row["images"];
			$e_description = $row["description"];
			$e_description_kh = $row["description_kh"];
			$e_type= $row["event_type"];
			$event_date = $row["event_date"];
			$event_time= $row["event_time"];
			$event_location = $row["event_location"];
			$event_ticket= $row["event_ticket"];
        }
    }
?>


<!--<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>-->
<script>  
	$(function(){
		$("#datepicker").datepicker();
	});
	
	
	$(document).ready(function(){
	//	$('#timepicker').timepicker({});
	});
</script>




<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Edit Record</h2>
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
                <h4><b style=";font-family: Khmer OS Muol; ">ប្រិត្តិការណ៏ & ការផ្សព្វផ្សាយ</b></h4>
                <b style="font-size: 15px;">​​​​​​EDIT EVENT</b><br><br>
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
                                     <label style="color: white;font-size: 15px;" class="col-xs-8 col-sm-4 col-md-4 col-lg-3">Title (En)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                <div class="col-xs-10 col-sm-7 col-md-7 col-lg-7">   
                                    <input type="text"  class="form-control" name="txt_title" placeholder="Enter Title"  autocomplete="off" required value="<?php echo ($e_title); ?>" style=" background-color: white;">
                                </div> 
                                 <div class="col-xs-2 col-sm-1 col-lg-2" id="uploaded_image">
                                <img src="../image/img_event_promotion/<?php echo $image;?>" alt="<?php echo $e_title; ?>" style="width:100%;height:100%;border:1px solid black; border-radius:5px !important ;">
                                </div>   
                                </div>
                                 <div class="form-group form-md-line-input">
                                     <label style="color: white;font-size: 15px;" class="col-xs-8 col-sm-4 col-md-4 col-lg-3">Title(Kh)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                <div class="col-xs-10 col-sm-7 col-md-7 col-lg-7">   
                                    <input type="text"  class="form-control" name="txt_title_kh" placeholder="Enter Title"  autocomplete="off" required value="<?php echo ($e_title_kh); ?>" style=" background-color: white;">
                                </div> 
                                 
                                </div>
                            </div>
                      
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <label style="color: white;font-size: 15px; " class="col-xs-8 col-sm-3 col-md-3 col-lg-2">Event Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Event Type...</span>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">    
                                    <select name="txt_event_type" class="form-control" required="" style=" background-color: white;">
                                        <option value="">Select event</option>
                                        <option <?php if($e_type=="1") {echo "selected='selected'";} else {echo "";} ?> value="1">UPCOMING EVENTS</option> 
                                        <option <?php if($e_type=="2") {echo "selected='selected'";} else {echo "";} ?> value="2">PAST EVENTS</option>
                                        <option <?php if($e_type=="3") {echo "selected='selected'";} else {echo "";} ?> value="3">SUBMIT A TALK IDEA</option>
                                        
                                    </select>
                                </div>  
                                </div>
                            </div>
							
							
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                
								<div class="form-group form-md-line-input">                                	 
									<label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Event Date                                        
										<span class="required" aria-required="true">*</span>                                    
									</label>                                    
									<span class="help-block">Event Date</span>                                  
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">                                      
										<input type="text" id="datepicker" class="form-control" name="event_date" placeholder="<?php echo date('m-d-Y'); ?>"  autocomplete="off" required style="background-color: white;" value="<?php echo ($event_date); ?>">                                  
									</div>                                 
								</div>                            
							</div>							
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                
								<div class="form-group form-md-line-input">                                	 
									<label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Event Time                                        
										<span class="required" aria-required="true">*</span>                                    
									</label>                                    
									<span class="help-block">Event Time</span>                                  
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">                                      
										<input type="text" class="form-control" id="timepicker" name="event_time" placeholder="Enter title(Kh)"  autocomplete="off" required style="background-color: white;" value="<?php echo ($event_time); ?>">                                  
									</div>                                 
								</div>                            
							</div>																					
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                
								<div class="form-group form-md-line-input">                                	 
									<label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Event Ticket
										<span class="required" aria-required="true">*</span>                                    
									</label>
									<span class="help-block">Event Ticket</span>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">                                      
										<input type="number" class="form-control" name="event_ticket" placeholder="Event Ticket"  autocomplete="off" required style="background-color: white;" value="<?php echo ($event_ticket); ?>">                                  
									</div>                                 
								</div>                            
							</div>							
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                
								<div class="form-group form-md-line-input">                                	 
									<label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Event Location
										<span class="required" aria-required="true">*</span>                                    
									</label>                                    
									<span class="help-block">Event Location</span>                                  
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">                                      
										<input type="text" class="form-control" name="event_location" placeholder="Event Location"  autocomplete="off" required style="background-color: white;" value="<?php echo ($event_location); ?>">                                  
									</div>
								</div>                            
							</div>	
							
							
							
							
                            <!----<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                       <label style="color: white;font-size: 15px; " class="col-xs-9 col-sm-3 col-md-3 col-lg-2">Image
                                        <span class="required" aria-required="true">*</span>
                                        </label>
                                        <span class="help-block">Enter Image...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">   
                                        <input type="file" class="form-control" name="txt_image" placeholder="Enter Icon name"  autocomplete="off" style=" background-color: white;">
                                     </div>
                                </div>
                            </div>------>         
                             



                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                     <label style="color: white; font-size: 15px;" class="col-xs-5 col-sm-3 col-md-3 col-lg-2">Image
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block" >Enter Image...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                 <input type="file" name="upload_image" id="upload_image" />
                                 <input type="hidden" name="logo_session" id="logo_session" />
                                 <br />
                
                                   </div>
                                </div>
                            </div>


                           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    
                                    <textarea style="height: 290px;" class="form-control detail" id="detail" name="txt_description" placeholder=""  autocomplete="off"><?php echo ($e_description); ?></textarea>
                                    <label style="color: white;font-size: 15px; ">Description (En)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Description...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    
                                    <textarea style="height: 290px;" class="form-control detail" id="details" name="txt_description_kh" placeholder=""  autocomplete="off"><?php echo ($e_description_kh); ?></textarea>
                                    <label style="color: white;font-size: 15px; ">Description (Kh)
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
        //font-weight: 900;
    }
	
	.addCF{
		color:white !important;
	}
	
	input[type=file] {
    display: block;
    color: white;
}
</style>


<script>  

    $(document).ready(function(){
        $image_crop1 = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
              width:400,
              height:110,
              type:'rectangle' //circle
            },
            boundary:{
              width:550,
              height:110
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
                $('#uploaded_image').html('<img src="'+response+'" class="img-thumbnail" style="width:100%;height:100%;border:1px solid black; border-radius:5px !important ;"/>');
                $('#logo_session').val(response);
            })
        });
    });

</script>


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

<script src="croppie.js"></script>
<link rel="stylesheet" href="croppie.css">
