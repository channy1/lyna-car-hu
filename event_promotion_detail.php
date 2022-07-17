<!-- header included  -->
<?php 
  require_once("header.php");
?>
<link rel="stylesheet" href="./css/flexslider.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="./css/jquery.bxslider.css" type="text/css" media="screen"/>
<link href="./css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen"/>

<!-- container section -->

<div class="container-fluid" style="margin-top:2px; padding-top:15px; color: #a4509f !important; ">
   <!--  <div style="height: 210px; width: 100%">
   </div> -->
   <div class="panel panel-default" style="color: #a4509f !important;">
      <div class="panel-heading text-center">
        <h3 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
          <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
          <?php
           $id =$_GET['id'];
            $type=$_GET['type'];
            if($type=="1") {
              if(@$_SESSION['lang']=='en'){
                 echo "UPCOMING EVENTS";
              }
              else {
                echo "ព្រឹត្តិការណ៍ជិតមកដល់";
              }
             
            }
            elseif ($type=="2") {
               if(@$_SESSION['lang']=='en'){
                  echo "PAST EVENTS";
              }
              else {
                echo "ព្រឹត្តិការណ៍កន្លងផុត";
              }

             
            }
            elseif ($type=="3") {
               if(@$_SESSION['lang']=='en'){
                 echo "SUBMIT A TALK IDEA";
              }
              else {
                echo "ដាក់មតិយោបល់";
              }
              
              
            }
            else {
              echo "No";
            }
           ?>

        </h3>
      </div>
     <section class="content">
   <!--      <div class="container">
        <!-- <h4 style="background:#e3c4d4;background: linear-gradient(to bottom, #ffffff 0%,#e3c4d4 100%);padding:10px;color:red; " class="margin-bottom-25 margin-top-none"><strong>OUR </strong><span style="text-transform: uppercase;">Promotion</span></h4> -->
            <div  style="clear: both;"></div>
            <div class="row">
              <div class="col-md-5">
                     <!--OPEN OF SLIDER-->
                    <div class="listing-slider">
                        <section class="slider home-banner">
                            <div class="flexslider" id="home-slider-canvas">
                                
                            <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 2400%; transition-duration: 0s; transform: translate3d(-6176px, 0px, 0px);">
                                    <?php 
                                $v_sql_full = "SELECT * FROM  tbl_event_promotion_img   WHERE event_id='$id'";
                                $results = $connect->query($v_sql_full);
                                if ($results->num_rows > 0) {
                                    while($row_full = $results->fetch_assoc()){
                                    if($check_owner_parter !="") {
                                         $url_img=$row_full['img_sub'];
                                         $url_img= str_replace("../../admin","","$url_img");
                                    }
                                    else {
                                         $url_img=$row_full['img_sub'];
                                         $url_img= str_replace("..","","$url_img");
                                    }
                                    

                                         ?>
                                    <li data-thumb="system/admin/<?php echo $url_img; ?>" class="" style="float: left; display: block; width: 772px;"> <a class="fancybox fancybox_listing_link" href="system/admin/<?php echo $url_img; ?>"><img src="system/admin/<?php echo $url_img; ?>" alt="" data-full-image="system/admin/<?php echo $url_img; ?>" draggable="false"></a> </li>
                                    
                                   <?php } } ?>
                                    <!-- full -->
                                </ul></div>
                            </div>
                        </section>
                        <section class="home-slider-thumbs">
                            <div class="flexslider" id="home-slider-thumbs">
                                
                            <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 2400%; transition-duration: 0s; transform: translate3d(-1335px, 0px, 0px);">
                                    <?php 
                                $sql = "SELECT * FROM  tbl_event_promotion_img   WHERE event_id='$id'";
                                $result_sub = $connect->query($sql);
                                if ($result_sub->num_rows > 0) {
                                    while($row_sub = $result_sub->fetch_assoc()){
                                    if($check_owner_parter !="") {
                                     $url_img_row_sub=$row_sub['img_sub'];
                                     $url_img_row_sub= str_replace("../../admin","","$url_img_row_sub");
                                    }
                                    else {
                                     $url_img_row_sub=$row_sub['img_sub'];
                                     $url_img_row_sub= str_replace("..","","$url_img_row_sub");
                                    }
                                     

                                         ?>
                                    <li data-thumb="system/admin/<?php echo  $url_img_row_sub; ?>" class="" style="float: left; display: block; width: 171px;"> <a href="#"><img style="border:1px solid #ccc;" src="system/admin/<?php echo  $url_img_row_sub; ?>" alt="" draggable="false"></a> </li>
                                    <?php }} ?>
                                   
                                </ul></div><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next flex-disabled" href="#" tabindex="-1">Next</a></li></ul></div>
                        </section>
                      



                    </div>
                    <!--CLOSE OF SLIDER--> 
                    <!--Slider End-->

                </div>
                         <?php  
                            $id =$_GET['id'];
                            $type=$_GET['type'];
                            if($id="") {
                              $id=1;
                            }
                            else {
                              $id =$_GET['id'];
                            }
                             if($type="") {
                              $type=1;
                            }
                            else {
                              $type =$_GET['type'];
                            }
                            // echo $id."kemun";
                            $v_sql = "SELECT * FROM tbl_event_promotion where  e_pro_id='$id'";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($rows = $result->fetch_assoc()){         
                            
                        ?>
                
                <div class="col-md-7" style="color: #2e2e2e;border-bottom: 1px solid #e1e1e1;padding-left: 36px;">
                  <h3><?php 
                  if(@$_SESSION['lang']=='en') {
                     echo $rows['title']; 
                  }
                  else {
                     echo $rows['title_kh']; 
                  }
                 
                  ?></h3>
                 
                 <?php 
                 if(@$_SESSION['lang']=='en') {
                   echo $rows['description']; 
                 }
                 else {
                   echo $rows['description_kh']; 
                 }
                
                 ?>
                </div>
                 <?php }} ?>
                
                
            </div>

        </div>
        <!--container ends--> 
    </section>

  </div>

  <!-- model alert for customer click -->

</div>

<!-- finished container section -->
<!-- inlcude footer buttom -->
<style type="text/css">
  
  .flexslider {
    border: none;
  }
</style>
<script src="owl.carousel/jquery.min.js"></script>
<script src="owl.carousel/owl.carousel.min.js"></script>
<script src="owl.carousel/jquery.js"></script>



<!-- finished section for partner benefit -->
<!-- include footer file  -->
<script src="./js/main_slider.js"></script>
<script type="text/javascript" src="./js/jquery.fancybox.js"></script>
<script src="./js/modernizr.custom.js"></script>
<script defer src="./js/jquery.flexslider.js"></script>
<script src="./js/jquery.bxslider.js" type="text/javascript"></script>
<?php require_once("footer.php"); ?>