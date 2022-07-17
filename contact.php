<!-- include header file -->
<?php
    require_once("header.php");

?>
<!-- <div class="container" style="margin-top: 10px;">
    <div style="height: 210px; width: 100%">
    </div>
</div> -->
<!-- finished header file included -->
<!-- body section for partner benefit -->
<?php
 if(isset($_POST['btn_email'])){
    $name_email=$_POST["name_email"];
    $email_name=$_POST["email_name"];
    $msg_name=$_POST["msg_name"];
    $to = "kemun.dev@gmail.com";
    $subject = "Contact Form";
    $txt =$msg_name;
    $headers = "From:$email_name" . "\r\n" .
    "CC:info@lyna-carrental.com";

    mail($to,$subject,$txt,$headers);
 }
if(isset($_POST['btn_comment'])){
    $name=$_POST["name"];
    $subject=$_POST["subject"];
    $email=$_POST["email"];
    $website=$_POST["website"];
    $comments=$_POST["comments"];
     $v_choose_image = @$_FILES['txt_choose'];
        if($v_choose_image["name"] != ""){
            $v_img_new_name = date("Ymd")."_".rand(1111,9999).'.'.pathinfo($v_choose_image["name"], PATHINFO_EXTENSION); // get random name
            move_uploaded_file($v_choose_image["tmp_name"], "images/guestbook/".$v_img_new_name); // upload file to specific folder
        }else{
            $v_img_new_name = "blank.png"; // if not upload name = blank.png
        }
    $today=date("Y-m-d H:i:s");
            $query_add = "INSERT INTO tbl_contact_comment(
                      `name`,
                      `subject`,
                      `email`,
                      `website`,
                      `comment`,
                      `date_post`,
                      `status`,
                      `img`

                    ) VALUES(
                     '$name',
                     '$subject',
                     '$email',
                     '$website',
                     '$comments',
                     '$today',
                     '1',
                     '$v_img_new_name'
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
<div class="container p-5">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
            <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'CONTACT':'ទំនាក់ទំនង'; ?><h2>
        </div>
        <div class="panel-body">
          <div class="row">



            <div class="col-md-6">
                <div class="col-md-12 left-information" style="padding:10px;border-radius: 10px;">
                        <div class="contact_information information_head" style="margin-left: 10px;">

                               <?php
                                        $query="SELECT * FROM tbl_contact_information ";
                                        $result = $connect->query($query);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                                        	 if((@$_SESSION['lang']=='en')) {
			                             		$text=$row["description"];
						                        }
						                        else {
						                         $text=$row["description_kh"];
						                        }

                                            echo ($text);
                                        }
                                    }
                               ?>

                        </div>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 left-information" style="border: 1px solid #ccc;padding:10px;border-radius: 10px;border:2px solid #ccc;float:right;">
                        <div class="contact_wrapper information_head">
                            <h4 class="margin-bottom-10 margin-top-none" align="center" style="padding-top:10px;">CONTACT FORM</h4>
                            <div class="form_contact ">
                                <div id="result"></div>
                           <form action="#" method="post">
                                <fieldset id="contact_form" style="margin:15px;">
                                    <input type="text" name="name_email" class="form-control margin-bottom-10" placeholder="Name  (Required)">
                                    <input type="email" name="email_name" class="form-control margin-bottom-10" placeholder="E-mail  (Required)">
                                    <textarea name="msg_name" class="" placeholder="Your message" rows="100" style="height: 100px;width: 100%;"></textarea>
                                    <div align="center"><input id="submit_btn" type="submit" name="btn_email" value="Send Message" class="btn" style="text-align: center; font-weight: bold;"></div>
                                </fieldset>
                            </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 left-information" style="border: 1px solid #ccc;padding:10px;border-radius: 10px;border:2px solid #ccc;float:right;margin-top:15px;">
                        <div class="contact_wrapper information_head" style="padding:10px 10px 10px 10px;">

                            <div class="form_contact margin-bottom-5">
                                <div id="result"><?= @$sms ?></div>
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <br>
                                  <fieldset id="contact_form"><legend style=" font-size: 14px; " align="center"><h4><strong style="">TESTIMONIAL</strong></h4></legend>

                                      <input style="border:1px solid #CCCCCC;" type="text" required="1" name="name" class="form-control margin-bottom-10" placeholder="Name  (Required)">
                                      <input style="border:1px solid #CCCCCC;" type="text" required="1" name="subject" class="form-control margin-bottom-10" placeholder="Subject  (Required)">
                                      <input style="border:1px solid #CCCCCC;" required="1" type="email" name="email" class="form-control margin-bottom-10" placeholder="Email  (Required)">
                                      <input style="border:1px solid #CCCCCC;" type="text" name="website" class="form-control margin-bottom-10" placeholder="Website">
                                      <textarea style="border:1px solid #CCCCCC;" name="comments" required="1" class="form-control margin-bottom-10 contact_textarea" placeholder="Your message" rows="7"></textarea>
                                      <input id="btn_choose" name="txt_choose" type="file" class="form-control">

                                     <p align="center">
                                        <button type="submit" name="btn_comment" class="btn blue" style="display:block;margin:0 auto;font-weight: bold;text-aign:center"> ADD COMMENTS</button>

                                    </p>
                                  </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-12 left-information" style="border: 1px solid #ccc;padding:10px;border-radius: 10px;border:2px solid #ccc;float:right;margin-top:15px;">
                        <div class="contact_wrapper information_head padding-right-none " style="padding:10px;">

                            <div class="form_contact margin-bottom-5">
                                <div id="result"></div>
                                <form action="/public/index/guestbook" method="post">
                                  <fieldset id="contact_form"><legend style=" font-size: 14px; " align="center"><h4><strong>Testimonial</strong></h4></legend>
                                    <?php
                                        $query="SELECT * FROM tbl_contact_comment where status='1' ORDER BY comment_id DESC";
                                            $result = $connect->query($query);
                                            if ($result->num_rows > 0) {
                                            while($row_comment = $result->fetch_assoc()){


                                    ?>
                                    <div style="border-radius: 10px;
                                        background: rgba(238,238,238,0.8);padding:10px;border:1px solid #ccc;;margin-bottom: 20px;">
                                        <strong>
                                            <img src="images/guestbook/<?php echo $row_comment['img']; ?>" style="border-radius:50%;width:50px;"> <?php echo $row_comment["name"]; ?></strong> Said :
                                            <span style=" float: right;font-weight:600;"><?php echo $row_comment["date_post"]; ?></span><br>
                                          <?php echo $row_comment["comment"]; ?>
                                    </div>
                                <?php
                                        }
                                    }
                                 ?>
                                  </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>





          </div>



        </div>



        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
                 <?php
                                        $query="SELECT * FROM tbl_contact_information ";
                                        $result = $connect->query($query);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){

                               ?>
            <?php echo $row['map_url']; ?>
            <?php }} ?>
            </div>
          </div>
    </div>

<div class="row">
    <?php
                      $query="SELECT * FROM tbl_contact_images where status='1' ";
                                        $result = $connect->query($query);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                    ?>
                 <div class="col-md-6">

                    <img src="system/admin/image/contact_images/<?php echo $row["images"]; ?>" class="img-rounded" alt="">

                 </div>
                 <?php } } ?>
            </div>


    </div>





</div>


<style type="text/css">
 ul li {
    list-style: none;
 }
 .margin-bottom-10 {
    margin-bottom: 10px;
 }
 #submit_btn{margin-top:20px;}
 iframe {
    width: 100%;margin-top:50px;
 }
.panel h3{margin-top:20px;color:#000;
}
.btn:hover{background:#000;color:#fff;}
table{margin-top:15px;}
table tr{line-height:30px;color:#000;}
</style>
<!-- finished section for partner benefit -->
<?php require_once("footer.php"); ?>
<!-- include footer file  -->
<!-- finished footer included -->
