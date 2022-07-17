<?php 
    $menu_active =3;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_contact_information WHERE c_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $description = $row["description"];
        $description_kh = $row["description_kh"];
        $map_url=$row['map_url'];
       
        }
    }
    else{}
?>

<?php 
    $edit_id = $_GET["edit_id"];
     if(isset($_POST['btn_add'])){
            $txt_infor = @$connect->real_escape_string($_POST['txt_infor']);
            $txt_infor_kh = @$connect->real_escape_string($_POST['txt_infor_kh']);
            $txt_map_url=@$connect->real_escape_string($_POST['txt_map_url']);
            $query_add = "UPDATE tbl_contact_information SET 
            description ='$txt_infor',
            map_url='$txt_map_url',description_kh='$txt_infor_kh'
            WHERE c_id='$edit_id'";
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
                echo mysqli_error ($connect);
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
                <h3><b style=";font-family: Khmer OS Muol; ">កែសម្រួល ព័ត៌មាន</b></h3>
                <b style="font-size: 20px;">​EDIT INFORMARTION</b><br><br>
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
            <div class="panel-body"style="background-color:   #800080;">
                      <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                         <div >
                          <div class="form-group row" style="padding: 15px;">
                            <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-3"​ style="color: white; font-size: 15px;">MAP URL:</label>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="md-form mt-0">
                                    
                                    <textarea  class="form-control" name="txt_map_url" cols="5" rows="5">
                                      <?php echo $map_url; ?>
                                    </textarea>
                                    <br/>
                                  </div>
                                </div>
                               
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                <!-- Material input -->
                                <label for="" class="col-xs-12 col-sm-12 col-md-12 col-lg-3"​ style="color: white; font-size: 15px;">INFORMATION (En):</label>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="md-form mt-0">
                                    <textarea id="detail" class="form-control" name="txt_infor">
                                      <?php echo $description; ?>
                                    </textarea>
                                   
                                  </div>
                                </div>
                               <br/>

                              </div>
                             
                             <label for="" class="col-xs-12 col-sm-12 col-md-12 col-lg-3"​ style="color: white; font-size: 15px;">INFORMATION (Kh):</label>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="md-form mt-0">
                                    <textarea id="details" class="form-control" name="txt_infor_kh">
                                      <?php echo $description_kh; ?>
                                    </textarea>
                                   
                                  </div>
                                </div>
                              
                        </div>
                        
                   <!--   <div style="background-color:#CDCDCD;">     
                    
                    <div class="form-group row" style="padding: 15px;">
                                Material input
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   
                                  </div>
                                </div>
                                 <div style="background-color:#959595 !important;color: white;width: 50%;float: right;padding: 10px;">
                               
                                 
                                  <div style="width: 47%;float: right;"> <button type="reset" style="background: none;border: none;font-size: 18px;">Clear</button></div>
                                  <div style="width: 15%;float: right;"> <button type="submit" name="btn_add" style="background: none;border: none;font-size:18px;">Add</button></div>
                                
                              </div>
                    </div>

                         
                    </div>  -->


                              <br>
                       <div class="form-actions">
                        <div class="row">
                            <div class="col-lg-8 text-center">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
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
      height: '300'
        // uiColor: '#9AB8F3'
    });
     CKEDITOR.replace( 'details', {
        language: 'en',
      height: '300'
        // uiColor: '#9AB8F3'
    });
</script>
<style type="text/css">
.form-group {
    margin-bottom:0px;
}
b,span{
  color: #800080;
  font-weight:900;
}
</style>

<?php include_once '../layout/footer.php' ?>
