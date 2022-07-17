<?php 
    require_once("header.php");
?>
<link rel="stylesheet" href="./css/flexslider.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="./css/jquery.bxslider.css" type="text/css" media="screen"/>
<link href="./css/jquery.fancybox.css" rel="stylesheet" type="text/css" media="screen"/>


<div class="container py-5">
	<div class="panel panel-default">
	      <div class="panel-heading text-left">
	        <h2><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
          <?php
          $type=$_GET['type'];
             if($type=="1") {
              if(@$_SESSION['lang']=='en') {
                 echo "PHOTO GALLERIES";
              }
              else {
                 echo "រូបថតអនុស្សាវរីយ៏";
              }
             
             }
             elseif ($type=="2") {
              
               if(@$_SESSION['lang']=='en') {
                 echo "LATEST NEWS";
              }
              else {
                 echo "ពត័មានផ្សេងៗ";
              }
             }
             elseif ($type=="3") {
                if(@$_SESSION['lang']=='en') {
                 echo "REGULATION UPDATES";
              }
              else {
                 echo "ធ្វើបច្ចុប្បន្នភាពបញ្ញាតិ";
              }
             
             }
             else {
                  echo "Recent Post";
             }
          ?>
	        </h2>
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
                            $v_sql = "SELECT * FROM tbl_info_center where  info_center_id='$id'";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($rows = $result->fetch_assoc()){         
                            
                        ?>
        
        <div class="card py-5">

	     <div class="row">
	     	<div class="col-md-5">
               <!--OPEN OF SLIDER-->
                    <div class="listing-slider">
                        <section class="slider home-banner">
                            <div class="flexslider" id="home-slider-canvas">
                                
                            <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 2400%; transition-duration: 0s; transform: translate3d(-6176px, 0px, 0px);">
                                    <?php 
                                $v_sql_full = "SELECT * FROM  tbl_info_center_img   WHERE info_id='$id'";
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
                                    <li data-thumb="system/admin/image/info_center/<?php echo  $rows['images']; ?>" class="" style="float: left; display: block; width: 772px;"> <a class="fancybox fancybox_listing_link" href="system/admin/image/info_center/<?php echo  $rows['images']; ?>"><img src="system/admin/image/info_center/<?php echo  $rows['images']; ?>" alt="" data-full-image="system/admin/image/info_center/<?php echo  $rows['images']; ?>" draggable="false"></a> </li>
                                    
                                   <?php } } ?>
                                    <!-- full -->
                                </ul></div>
                            </div>
                        </section>
                        <section class="home-slider-thumbs">
                            <div class="flexslider" id="home-slider-thumbs">
                                
                            <div class="flex-viewport" style="overflow: hidden; position: relative;"><ul class="slides" style="width: 2400%; transition-duration: 0s; transform: translate3d(-1335px, 0px, 0px);">
                                    <?php 
                                $sql = "SELECT * FROM  tbl_info_center_img   WHERE info_id='$id'";
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
                                    <li data-thumb="system/admin/image/info_center/<?php echo  $url_img_row_sub; ?>" class="" style="float: left; display: block; width: 171px;"> <a href="#"><img style="border:1px solid #ccc;" src="system/admin/<?php echo  $url_img_row_sub; ?>" alt="" draggable="false"></a> </li>
                                    <?php }} ?>
                                    <li data-thumb="system/admin/image/info_center/<?php echo  $rows['images']; ?>" class="" style="float: left; display: block; width: 171px;"> <a href="#"><img style="border:1px solid #ccc;" src="system/admin/image/info_center/<?php echo  $rows['images']; ?>" alt="" draggable="false"></a> </li>


                                </ul></div><ul class="flex-direction-nav"><li><a class="flex-prev" href="#">Previous</a></li><li><a class="flex-next flex-disabled" href="#" tabindex="-1">Next</a></li></ul></div>
                        </section>
                       



                    </div>
                    <!--CLOSE OF SLIDER--> 
                    <!--Slider End-->
            </div>

            <div class="col-md-7 content px-4">
              <div class="title">
                <span class="web">
                  <?php 
                   if(@$_SESSION['lang']=='en') {
                    echo $rows['title'];
                   }
                   else {
                    echo $rows['title_kh'];
                   }
                   ?>
                </span>
                
             <div class="clear"></div>
            </div>
            <p class="detail">
              <?php
               if(@$_SESSION['lang']=='en') {
                echo $rows['description']; 
               }
               else {
                echo $rows['description_kh']; 
               }
 ?></p>
           
          </div>


	     </div>
</div>
<?php 
  }}
?>



	      
  </div>
</div>
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