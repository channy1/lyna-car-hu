<?php 
    require_once("header.php");
?>

<?php 
    if(isset($_POST['btn_add'])){   
        $v_name = @$connect->real_escape_string($_POST['txt_name']);
        $v_subject = @$connect->real_escape_string($_POST['txt_subject']);
        $v_email = @$connect->real_escape_string($_POST['txt_email']);
        $v_text = @$connect->real_escape_string($_POST['txt_note']);
        $v_choose_image = @$_FILES['txt_choose'];
        if($v_choose_image["name"] != ""){
            $v_img_new_name = date("Ymd")."_".rand(1111,9999).'.'.pathinfo($v_choose_image["name"], PATHINFO_EXTENSION); // get random name
            move_uploaded_file($v_choose_image["tmp_name"], "images/guestbook/".$v_img_new_name); // upload file to specific folder
        }else{
            $v_img_new_name = "blank.png"; // if not upload name = blank.png
        }
        $query_add = "INSERT INTO `tbl_guestbook`(
            `gues_name`, 
            `gues_subject`, 
            `gues_email`, 
            `gues_img`, 
            `gues_text` 
            ) 
            VALUES (
            '$v_name',
            '$v_subject',
            '$v_email',
            '$v_img_new_name',
            '$v_text'
            
        )";
        if($connect->query($query_add)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted ...
            </div>'; 
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>';   
        }
    }
?>
<div class="container py-5">
    <div class="panel panel-default">
          <div class="panel-heading text-center">
            <h2 style="padding-top: 0px;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'ABOUT US':'អំពីយើង'; ?>
            </h2>
          </div>
        <!-- Car tav view container -->
        
        
        <div class="row">
        <div class="col-md-6 col-sm-12 dashed" style=" text-align: left; margin: 0px;">
        <div class="portlet-body">
            <div style="margin-top:10px;"></div>
        <?php
            $user_query = $connect->query("SELECT * FROM tbl_about ORDER BY about_title ASC");
            while ($row_user = mysqli_fetch_object($user_query)) {
                
                    if((@$_SESSION['lang']=='en')) {
                             echo $row_user->about_text; 
                        }
                        else {
                             echo $row_user->about_text_kh; 
                        }
                               
                               
                      

                            
                           
                        }
                    ?> 
            
            
            
        
    </div>

        </div>
            
            
        <div class="col-md-6 col-sm-12">
            
            <div class="row pl-3">
            
            <div class="panel-heading">
                <h3 class="panel-title">Guestbook Information</h3>
            </div>
                <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
           <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row" class="text-center">
                        
        
                    </tr>
                </thead>
                <tbody> 
                    <?php
                    $i = 0; 
                        $user_query = $connect->query("SELECT * FROM tbl_guestbook ORDER BY gues_name ASC");
                        $no = 0;
                        while ($row_user = mysqli_fetch_object($user_query)) {
                         
                               echo "<tr></tr>";
                               echo '<img src="images/guestbook/'.$row_user->gues_img.'" width="50px">';
                               echo ''.($row_user->gues_name).' | Date:'.($row_user->date_audit).'<br>';
                               echo "<textarea  style='height: 150px;' class='form-control' autocomplete='off'>";

                                echo ''.($row_user->gues_text).''; 
                                echo"</textarea>";
                                echo "<br>";

                            
                           
                        }
                    ?> 
             </tbody>
            </table>
    </div>        
        </div>
            </div>
            
            <div class="row"></div>
            <div class="panel panel-primary" style="background-color: #ffffff;border-color: #dddddd;">
            <div class="panel-heading" style="color: #333333;border-color: #dddddd;">
                <h3 class="panel-title">Testimonials</h3>
            </div>
            <div class="panel-body ">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                    <label>Name Required :<span class="required" aria-required="true">*</span></label>
                                    <input type="text" class="form-control" name="txt_name" placeholder=" " required="required" autocomplete="off">
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label>Subject Required :<span class="required" aria-required="true">*</span></label>
                                    <input type="text" class="form-control" name="txt_subject" placeholder=" " required="required" autocomplete="off">
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label>E-mail Required :<span class="required" aria-required="true">*</span></label>
                                    <input type="text" class="form-control" name="txt_email" placeholder=" " required="required" autocomplete="off">
                                </div>
                                <label>Your Message :</label>
                                <div class="form-group form-md-line-input">
                                    <textarea style="height: 80px;" class="form-control" name="txt_note" placeholder="" autocomplete="off"></textarea>
                                    
                                </div>
                                 <div class="form-group form-md-line-input">
                                     <input id="btn_choose" name="txt_choose" type="file" class="form-control">                         
                                </div>                         
                            <img id="image_preview" src="image/blank.png" class="img img-thumbnail img-responsive" alt="">                               
                            </div>                            
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <button  type="submit" name="btn_add" class="btn blue" style="color: #a4509f;font-weight: bold;font-size: 16px;">Add Comment</button>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
            
            </div>    
            
            
            
            
          </div>  
            
            
         
        
    

</div>
</div>
<script type="text/javascript">
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#image_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#btn_choose").change(function() {
      readURL(this);
    });
</script>
<style>
    .portlet-body{width:100%;}
    .dashed{border-right:2px dashed #989898;}
    .panel-heading h3{color: #ec3323;}

</style>


<?php require_once("footer.php"); ?>