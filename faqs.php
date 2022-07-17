
<?php require_once("header.php");?>
<?php
if(isset($_POST['btn_email'])){
    $txt_name=$_POST["txt_name"];
    $txt_email=$_POST["txt_email"];
    $txt_msg_name=$_POST["txt_msg_name"];
    $today=date("Y-m-d H:i:s");
            $query_add = "INSERT INTO tbl_faq(
                      `question`,
                      'question_kh',
                      `f_name`,
                      `f_email`,
                      `status`,
                      `answer`,
                      'answer_kh',
                      `order_rate`

                    ) VALUES(
                     '$txt_msg_name',
                     '$txt_name',
                     '$txt_email',
                     '0',
                     '',
                     ''
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
<div class="container">
    <div class="panel panel-default">
        <div style="color: #a4509f;" class="panel-heading">
            <h2>
            <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'FAQs':'សំណូរចម្លើយ'; ?></h2>
        </div>
        <div style="color: #a4509f;" class="panel-body">
             <div class="row">
                <div class="col-md-5">
                    <div class="side-content row pb-5 pt-3">
                                    <div class="list col-md-12 col-sm-3 padding-bottom-50">
                                        <ul>
                                            <li id="home-active" class="active"><a href="./index.php"><?=(@$_SESSION['lang']=='en')?'HOME':'ទំព័រដើម'; ?></a></li>
                                                <li id="contact-active"><a href="./about.php"><?=(@$_SESSION['lang']=='en')?'ABOUT US':'អំពីយើង'; ?> </a></li>
                                                <li id="contact-active"><a href="./contact.php"><?=(@$_SESSION['lang']=='en')?'CONTACT US':'ទំនាក់ទំនង'; ?> </a></li>
                                                <li id="contact-active"><a href="./faqs.php"><?=(@$_SESSION['lang']=='en')?'FAQs':'សំណូរចម្លើយ'; ?></a></li>
                                                <li id="contact-active"><a href="./job_seekers.php"><?=(@$_SESSION['lang']=='en')?'JOB VACANCIES':'ការងារវិជ្ជាជីវៈ'; ?></a>
                                                </li><li id="contact-active"><a href="./detailt_footer_status.php?id=2"><?=(@$_SESSION['lang']=='en')?'TERMS CONDITIONS':'លក្ខខណ្ឌប្រើប្រាស់'; ?></a></li>
                                                <li id="contact-active"><a href="./detailt_footer_status.php?id=3"><?=(@$_SESSION['lang']=='en')?'PRIVACY POLICY':'គោលការណ៍​ភាព​ឯកជន'; ?></a></li>
                                        </ul>
                                    </div>
                    </div>
                              <div class="row">
                                     <div class="col-md-12">
                                      <div class="col-md-12" style="border: 1px solid #ccc;padding:10px;border-radius: 10px;border:2px solid #ccc;">
                                    <div class="contact_wrapper information_head">
                                        <h4 class="margin-bottom-10 margin-top-none" align="center" style="padding-top:10px;color: #fe4c1c;">Ask Questions</h4>
                                        <div class="form_contact ">
                                            <div id="result"><?= @$sms ?></div>
                                       <form action="#" method="post" id="ask">
                                            <fieldset id="contact_form" style="margin:15px;">
                                                <input type="text" name="txt_name" class="form-control margin-bottom-10" placeholder="Name  (Required)" Required>
                                                <input type="email" name="txt_email" class="form-control margin-bottom-10" placeholder="E-mail  (Required)" Required>
                                                <textarea name="txt_msg_name" class="" placeholder="Your message" rows="100" style="height: 100px;width: 100%;" Required></textarea>
                                                <div align="center"><input id="submit_btn" type="submit" name="btn_email" value="Send Message" class="btn " style="text-align: center; font-weight: bold;"></div>
                                            </fieldset>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                 </div>
              </div>
                <div class="col-md-7">

        <!--   <div class="panel-group" id="accordion"> -->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
              $v_sql = "SELECT * FROM tbl_faq where status='1' ORDER BY order_rate DESC ";
              $result = $connect->query($v_sql);
              if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
            ?>
            <div class="panel">
                  <div class="panel-heading" role="tab" id="headingTwo">
                       <h4 class="panel-title">

                           <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $row["fa_id"]; ?>" aria-expanded="false" aria-controls="collapse<?php echo $row["fa_id"]; ?>">
                              <span><?php

                              if((@$_SESSION['lang']=='en')){

                              		echo $row["question"];

                              }
                              else{
                              	echo $row["question_kh"];
                              }


                              //echo $row["question"]; ?></span>
                           </a>


                </h4>

                  </div>
                  <div id="collapse<?php echo $row["fa_id"]; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $row["fa_id"]; ?>">
                      <div class="panel-body divider_div">
                         <?php
                         if((@$_SESSION['lang']=='en')){

                              		echo $row["answer"];

                              }
                              else{
                              	echo $row["answer_kh"];
                              }


                         //echo $row["answer"]; ?>
                      </div>
                  </div>
              </div>
                <!-- <div class="panel">
                    <div class="panel-headingf">
                      <h4 class="panel-title">
                        <a class="accordion-toggle check_click" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $row["fa_id"]; ?>">
                          <?php echo $row["question"]; ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse_<?php echo $row["fa_id"]; ?>" class="panel-collapse collapse">
                      <div class="panel-body">
                          <?php echo $row["answer"]; ?>
                      </div>
                    </div>
                  </div> -->
            <?php }} ?>

          </div>

                    <Br/><br/>
                </div>
             </div>
        </div>
    </div>
</div>

<style type="text/css">
   /*.faq ul li {
        color: #3b3b3b;
        font-size: 14px;
        list-style: square;
        margin-left: 10px;
    }
    .margin-bottom-10 {
    margin-bottom: 10px;
 }*/
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css");
.panel-title > a:before {
    float: left !important;
    font-family: FontAwesome;
    content:"\f068";
  position:absolute;
  left:20px;;
    padding:5px;
    color: #ec3323;
}
.panel-title > a.collapsed:before {
    float: left !important;
    content:"\f067";
}
 
 .panel-heading a{font-size: 16px!important; font-weight: 400!important;color: #001238!important;}  
.panel-title > a:hover,
.panel-title > a:active,
.panel-title > a:focus  {
    text-decoration:none;
}
.panel{
    margin-top:30px;
}
    
    #ask input{margin-bottom: 24px;}
    #ask .btn{margin-top:24px;}
    #ask textarea{padding: 0.375rem 2.75rem!important;}

   .panel h4 {
font-size: 18px;margin-bottom:15px;margin-left: 25px;}
.divider_div{border-top: 1px solid #ccc;border-bottom: 1px solid #ccc;padding: 10px 0;color:#812EC8;}
.panel-heading h4 a span{font-weight:500;padding:0;}
#collapse8{text-indent:0 !important;}
</style>
<?php require_once("footer.php"); ?>

