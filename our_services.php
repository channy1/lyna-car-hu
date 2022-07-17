<?php 
    require_once("header.php");
?>
<br>
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
            <h2 style="text-align: left;"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'OUR SERVICES':'សេវាក្មមផ្សេងៗ'; ?>
            </h2>
          </div>
        <!-- Car tav view container -->
        <div class="container">
            
            <div class="row">
        <div class="col-md-4 col-sm-12">
        <div class="portlet-body">
            <div class="card  px-4 py-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h5 class="panel-title" style="color: #a4509f;"><?= (@$_SESSION['lang']=='en')? 'OUR SERVICES':'សេវាក្មមផ្សេងៗ'; ?></h5>
            </div>
            <div class="panel-body">
                <p>How to view the answer of each question in the FAQs </p>

<p>In this page, there are many Frequently Asked Questions (FAQs) with Answers for information. In order to view the answers, you need to click on each of its questions or put the mouse curser on the + box on the left side of each question and click it, then you will find all the answers. In case of no question available for your need, please feel free to send your questions to us via e-mail to info@lyna-carrental.com.  After this, you will go step by step till you reach to the answers.</p><br> 

Thank you very much or your patience and understanding. <br> 

Yours truly, <br>

Tan Lyna (Ms.)<br>
Chairwoman/Founder
            </div>
        </div>
                </div>
    </div>

        </div>
        <div class="col-md-8 col-sm-12">
          
            <div class="portlet-body">
                
               <div class="card">  
                    
        <div id="sample_1_wrapper" class="dataTables_wrapper">
             <div class="row text-center">
                    <?php
                    $i = 0; 
                        $user_query = $connect->query("SELECT * FROM tbl_our_service ORDER BY se_title DESC");
                        $no = 0;
                        while ($row_user = mysqli_fetch_object($user_query)) {
                                
                                echo '<div class="col-md-4 col-sm-12"><img width="100%" height="200px" src="system/admin/image/our_service/'.($row_user->se_image).'"><br><a class="py-2" href=our_service_detail.php?edit_id='.$row_user->se_id.'>'.($row_user->se_title).'</a></div>'; 
       
                        }
                    ?> 
            
    </div>        
        </div>
                </div>
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
<?php require_once("footer.php"); ?>