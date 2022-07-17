<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    //include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php 
  if(isset($_POST['btn_add'])){

    
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
                $image_data = $_POST['logo_session'];

                $image_array_1 = explode(";", $image_data);
                $image_array_2 = explode(",", $image_array_1[1]);
                $image_data = base64_decode($image_array_2[1]);
                //print_r($image_data);

                $new_name = rand(10,100).time().'.png';
                $path = '../image/img_event_promotion/'.$new_name;

                file_put_contents($path, $image_data);
                //exit;

            }else{
                $new_name = "";
            }


            $query_add = "INSERT INTO tbl_event_promotion(
                     `title`,
                     `title_kh`,
                     `description`,
                     `description_kh`,
                     `images`,
                     `event_time`,
                     `event_date`,
                     `event_ticket`,
                     `event_location`,
                     `event_type`
                    ) VALUES(
                     '$txt_title',
                     '$txt_title_kh',
                     '$txt_description',
                     '$txt_description_kh',
                     '$new_name',
                     '$event_time',
                     '$event_date',
                     '$event_ticket',
                     '$event_location',
                     '$txt_event_type'
                    )";
            if($connect->query($query_add)){

                $id=$connect->insert_id;

                 $scount=count($_POST['ticket_name']);
                   for($i=0; $i<$scount; $i++){

                       $ticket_name=$_POST['ticket_name'][$i];
                       $ticket_price=$_POST['ticket_price'][$i];
                       $ticket_quantity=$_POST['ticket_quantity'][$i];
                       $time=time();
                        $query_add = "INSERT INTO event_tickets(
                     `event_id`,
                     `ticket_name`,
                     `ticket_price`,
                     `quanitity`,
                     `created_on`
                     
                    ) VALUES(
                     $id,
                     '$ticket_name',
                     $ticket_price,
                     $ticket_quantity,
                     '$time'
                    )";

                       if(!$connect->query($query_add)){
                           print_r($connect);
                           exit;
                       }

                  }


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
 

<!----
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  --->

<script>  
	$(function(){
		$("#datepicker").datepicker();
	});
</script>


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
                <h4><b style=";font-family: Khmer OS Muol; ">ប្រិត្តិការណ៏ & ការផ្សព្វផ្សាយ</b></h4>
                <b style="font-size: 15px;">​​​​​​ADD EVENT</b><br><br>
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

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                	 <label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Title (En)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">  
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter title(En)"  autocomplete="off" required style="background-color: white;">
                                  </div> 
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                	 <label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Title (Kh)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">  
                                    <input type="text" class="form-control" name="txt_title_kh" placeholder="Enter title(Kh)"  autocomplete="off" required style="background-color: white;">
                                  </div> 
                                </div>
                            </div>														
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                	<label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Event Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">  
                                    <select name="txt_event_type" class="form-control" required="" style="background-color: white;">
                                        <option value="">Select event</option>
                                        <option value="1">UPCOMING EVENTS</option>
                                        <option value="2">PAST EVENTS</option>
                                        <option value="3">SUBMIT A TALK IDEA</option>
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                               <div class="form-group form-md-line-input">
                                    <label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Images
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Images...</span>
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">  
                                    <input type="file" class="form-control" name="txt_image"   autocomplete="off" style="background-color: white;">
                                  </div>
                                </div>
                            </div>--->


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
                                <div id="uploaded_image"></div>
                            </div>
							
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                                
								<div class="form-group form-md-line-input">                                	 
									<label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Event Date                                        
										<span class="required" aria-required="true">*</span>                                    
									</label>                                    
									<span class="help-block">Event Date</span>                                  
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">                                      
										<input type="text" id="datepicker" class="form-control" name="event_date" placeholder="<?php echo date('m-d-Y'); ?>"  autocomplete="off" required style="background-color: white;">                                  
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
										<input type="text" class="form-control" name="event_time" placeholder="Enter title(Kh)"  autocomplete="off" required style="background-color: white;">                                  
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
										<input type="number" class="form-control" name="event_ticket" placeholder="Event Ticket"  autocomplete="off" required style="background-color: white;">                                  
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
										<input type="text" class="form-control" name="event_location" placeholder="Event Location"  autocomplete="off" required style="background-color: white;">                                  
									</div>
								</div>                            
							</div>																					
                           
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                
                                    <textarea style="height: 290px;" class="form-control detail" id="detail" name="txt_description" placeholder=""  autocomplete="off"></textarea>
                                    <label style="color: white; font-size: 15px;">Description (En)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Description...</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                
                                    <textarea style="height: 290px;" class="form-control detail" id="details" name="txt_description_kh" placeholder=""  autocomplete="off"></textarea>
                                    <label style="color: white; font-size: 15px;">Description (Kh)
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Description...</span>
                                </div>
                            </div>






                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="customFields">
                                <div class="form-group form-md-line-input">
                                    <label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Ticket
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Ticket Name</span>
                                    <div class="col-sm-3">
                                        <input type="text"  class="form-control" name="ticket_name[]" placeholder="Ticket Name"  autocomplete="off" required style="background-color: white;">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text"  class="form-control" name="ticket_price[]" placeholder="Ticket Price"  autocomplete="off" required style="background-color: white;">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="text"  class="form-control" name="ticket_quantity[]" placeholder="Ticket Quantity"  autocomplete="off" required style="background-color: white;">
                                    </div>
                                    <div class="col-sm-1">
                                        <a href="javascript:void(0);" class="addCF">Add</a>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="form-actions">
                        <br/> <br/>
                        <div class="row">
                            <div class="col-md-5 text-center">
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
      height: ''
        // uiColor: '#9AB8F3'
    });
 CKEDITOR.replace( 'details', {
        language: 'kh',
      height: ''
        // uiColor: '#9AB8F3'
    });
</script>

<style type="text/css">
    b,span{
        color: #800080;
        
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
$(".addCF").click(function(){
$("#customFields").append('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="customFields"><div class="form-group form-md-line-input"><label style="color: white; font-size: 15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Ticket <span class="required" aria-required="true">*</span></label><span class="help-block">Event Date</span><div class="col-sm-3"> <input type="text"  class="form-control" name="ticket_name[]"   autocomplete="off" required style="background-color: white;"> </div><div class="col-sm-3"><input type="text"  class="form-control" name="ticket_price[]"   autocomplete="off" required style="background-color: white;"> </div> <div class="col-sm-3"><input type="text"  class="form-control" name="ticket_quantity[]"   autocomplete="off" required style="background-color: white;"> </div><div class="col-sm-1"><a href="javascript:void(0);" class="remCF">Remove</a></div></div></div>');
});
$("#customFields").on('click','.remCF',function(){
$(this).parent().parent().remove();
});
});
</script>




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
                $('#uploaded_image').html('<img src="'+response+'" class="img-thumbnail" />');
                $('#logo_session').val(response);
            })
        });
    });

</script>



<!------ Image Cropper --------->

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog" style="margin-top:130px">
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
