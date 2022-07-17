<link href="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="../assets/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/owlcarousel/owl.theme.default.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script

<script src="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!--<script src="../assets/owlcarousel/owl.carousel.js"></script>!-->
<style>
    .img_li{width:120px !important;}
    .ol-carousel{bottom:-10px !important;right:-114px !important; left: -114px !important;}
    ol { counter-reset: item }
    li { display: block }
    .li-head:before{ content: counters(item, ".") " "; counter-increment: item ;}
    .li-head li.li-list:before { content: counters(item, ".") " "; counter-increment: item ;}
    #more {display: none;}
    .multi-carousel {opacity: 0;padding: 0 25px;}
.multi-carousel .carousel-control-next,
.multi-carousel .carousel-control-prev {
	width: 25px;
	background: gray;    
}
.col-3.float-left {
    box-shadow: 2px 2px 2px 2px #ccc;
}
	tr {
   border-bottom:1px solid #f5f5f0;color:#000;
}
.panel h2{padding-bottom:15px !important;}
.ul-detail li{display:inline-block;margin-right:15px;}
span.blue-span {
    color: #0000ff;
}
span.red-span {
    color: #ff1800;
    font-weight:500;
    text-transform:uppercase;
}
.flexslider {
    border:none;
}
/*.img {*/
/*    height:190px !important;*/
/*}*/
.font_responsive {
    font-size:13px;
 }
 .acc_hi {
    height: 235px;
 }
 ul.ul-detail {
    margin-left: 17px;
}
 .panel-body ul li:before{display:none;}
/*.item{background:red;}*/

@media (max-width:770px) {
 /*.font_responsive {
    font-size:11px;
 }*/
 .acc_hi {
    height: 210px;
 }
 

}
@media screen and (min-device-width: 320px) and (max-device-width: 412px) { 
  .panel h2{font-size:20px !important;}
  table{margin-top:80px;}  
}

</style>
<!-- include header file -->
<?php include_once ('system/config/database.php');

 ?>
<?php 
    require_once("header.php");
    $id = $_GET["id"];
	$text_re="";      
	$text_detail="";   
	$text_hotel="";       
	$ref_text=@$_SESSION['lang']; 
	if($ref_text=="en") {            
	$text_re="Ref. No";             
	$text_detail="DETAIL";             
	$text_hotel="VIEW Nº OF HOTEL";     
	}                  
	else {        
	$text_re="លេខយោង";    
	$text_detail="ពត៌មានលំអិត"; 
	$text_hotel="ចំនួនសណ្ឋាគារ និង ផ្ទះសំណាក់";   
	}  


 $check_title="";
                $v_sql = "SELECT * FROM tbl_vehicle_rantal LEFT JOIN tbl_vehicle_rantal_img  ON tbl_vehicle_rantal.ve_id=tbl_vehicle_rantal_img.car_id WHERE ve_id='$id'";
                
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
                        $check_title=$row['ve_title'];
                        $check_owner_parter=$row['add_by_id'];
						
						 $total_view=$row["total_view"];
					
						
						?>

<div class="container-fluid" style="margin-top: 10px;">
    <div style="height: 10px; width: 100%">
    </div>
</div>
<!-- finished header file included -->
<!-- body section for partner benefit -->



<div class="container">
   <div class="panel panel-default">
        <div class="panel-heading">
                <h2><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?php echo $row["ve_title"]; ?></h2>
                <ul class="ul-detail">
                    <li>
                      <span class="red-span">Ad Id:</span>  
                      <span class="blue-span"><?php echo $id; ?></span> 
                    </li>
                    <li>
                      <span class="red-span">Posted:</span>  
                      <span class="blue-span"><?php echo date('d M, Y', $row["created_on"]); ?></span> 
                    </li>
                    <li>
                      <span class="red-span">Modified:</span>  
                      <span class="blue-span"><?php if($row["updated_on"]!=NULL){ echo date('d M, Y', $row["updated_on"]);  } ?></span> 
                    </li>
                    <li>
                      <span class="red-span">Renewed:</span>  
                      <span class="blue-span"><?php if($row["updated_on"]!=NULL){ echo date('d M, Y', $row["updated_on"]);  } ?></span> 
                    </li>
                    <li>
                      <span class="red-span">View:</span>  
                      <span class="blue-span"><?php echo $total_view; ?></span> 
                    </li>
                </ul>
       </div>
        <div class="panel-body">
            <div class="container">
                <div class="row"> 
                <div class=" col-lg-8 col-md-8 col-sm-8 ">
                               <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel" data-interval="true">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
				
				
				 <?php 
				                $all_image=array();
                                $sql = "SELECT * FROM  tbl_vehicle_rantal_img   WHERE car_id='$id'";
                                $result_sub = $connect->query($sql);
                                if ($result_sub->num_rows > 0) {
									$i=0;
                                    while($row_sub = $result_sub->fetch_assoc()){
                                    if($check_owner_parter !="") {
                                     $url_img_row_sub=$row_sub['img_sub'];
                                     $url_img_row_sub= str_replace("../../admin","","$url_img_row_sub");
                                    }
                                    else {
                                     $url_img_row_sub=$row_sub['img_sub'];
                                     $url_img_row_sub= str_replace("..","","$url_img_row_sub");
                                    }
                                     
                                    $all_image[]=$url_img_row_sub;
                                         ?>
				
				
                    <div class="carousel-item <?php if($i==0)echo 'active'; ?>">
                        <img class="d-block w-100" src="system/admin/<?php echo  $url_img_row_sub; ?>" alt="First slide">
                    </div>
					
								<?php $i++; } } ?>
                  <!--  <div class="carousel-item">
                      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(121).jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(31).jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(88).jpg" alt="fourth slide">
                    </div>-->
                </div>
				
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
                <ol class="carousel-indicators ol-carousel">
				  <?php 
				  for($i=0;$i<count($all_image);$i++){ ?>
				
                  <li data-target="#carousel-thumb" data-slide-to="<?php echo $i; ?>" class="<?php if($i==0)echo 'active'; ?> img_li"> <img class="d-block w-100" src="system/admin/<?php echo  $all_image[$i]; ?>"
                      class="img-fluid"></li>
					  
				<?php   } ?>
                  <!--<li data-target="#carousel-thumb" data-slide-to="1" class="img_li"><img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(121).jpg"
                      class="img-fluid"></li>
                  <li data-target="#carousel-thumb" data-slide-to="2" class="img_li"><img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(31).jpg"
                      class="img-fluid"></li>
                      <li data-target="#carousel-thumb" data-slide-to="3" class="img_li"> <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Others/Carousel-thumbs/img%20(88).jpg"
                      class="img-fluid"></li>-->
					  
                </ol>
            </div>
			
			
			
			
			
                            <div class="bs-example bs-example-tabs example-tabs mb-5" style="margin-top:90px;">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#vehicle" data-toggle="tab">Vehicle Overview</a></li>
                                </ul>
                                                                <div id="myTabContent" class="tab-content margin-top-15 margin-bottom-20">
                                    <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-href="http://choicecart.xyz/carrental/vehical_rental_detail-old.php?id=15" data-width="" data-numposts="5" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=1742567652641866&amp;container_width=579&amp;height=100&amp;href=http%3A%2F%2Fchoicecart.xyz%2Fcarrental%2Fvehical_rental_detail-old.php%3Fid%3D15&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v3.3&amp;width=550"><span style="vertical-align: bottom; width: 550px; height: 211px;"><iframe name="f3590f314788ee4" width="550px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.3/plugins/comments.php?app_id=1742567652641866&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df31a797a56d966%26domain%3Dchoicecart.xyz%26origin%3Dhttp%253A%252F%252Fchoicecart.xyz%252Ff1e9f878a393168%26relation%3Dparent.parent&amp;container_width=579&amp;height=100&amp;href=http%3A%2F%2Fchoicecart.xyz%2Fcarrental%2Fvehical_rental_detail-old.php%3Fid%3D15&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v3.3&amp;width=550" style="border: none; visibility: visible; width: 550px; height: 211px;" __idm_frm__="489" class=""></iframe></span></div>
                             
                                </div>
                       </div>


                <!-- <img width="100%" src="system/admin/image/vehicle_rental/"> -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                        <table width="100%" class="mb-5">
                                                        <tbody><tr>
                                <td>VEHICLE REF. NO.:</td>
                                <td align="right" style="color:red;"><?php echo $row["ve_ref_no"]; ?></td>

                            </tr>
                           
                            <tr>
                                <td>YEAR:</td>
                                <td align="right"><?php echo $row["ve_year"]; ?></td>
                            </tr>

                            <tr>
                                <td>MAKE:</td>
                                <td align="right"><?php echo $row["ve_make"]; ?></td>
                            </tr>
                            <tr>
                                <td>MODEL:</td>
                                <td align="right"><?php echo $row["ve_model"]; ?></td>
                                </tr>
                            <tr>
                                <td>SUB MODEL:</td>
                                <td align="right"><?php echo $row["ve_sub_model"]; ?></td>
                                </tr>
                            <tr>
                                <td>COLOR:</td>
                                <td align="right"><?php echo $row["ve_color"]; ?></td>
                                </tr>
                            <tr>
                                <td>HORSE POWER:</td>
                                <td align="right"><?php echo $row["ve_horse_pow"]; ?></td>
                                </tr>
                            <tr>
                                <td>NO. OF SEATS:</td>
                                <td align="right"><?php echo $row["ve_no_of_seat"]; ?></td>
                                </tr>
                            <tr>
                                <td>TRANSMISSION TYPE:</td>
                                <td align="right"><?php echo $row["ve_transmission_type"]; ?></td>
                                </tr>
                            <tr>
                                <td>VEHICLE TYPE:</td>
                                <td align="right"><?php echo $row["ve_vehical_type"]; ?></td>
                                </tr>
                            <tr>
                                <td>TYPE:</td>
                                <td align="right"><?php echo $row["ve_type"]; ?></td>
                                </tr>
                            <tr>
                                <td>MAXIMUM WEIGHT:</td>
                                <td align="right"><?php echo $row["ve_maximum_weight"]; ?></td></tr>
                            <tr>
                                <td>STEERING WHEEL TYPE:</td>
                                <td align="right"><?php echo $row["ve_steering_wheel_type"]; ?></td></tr>
                            <tr>
                                <td>NO. OF AXLES:</td>
                                <td align="right"><?php echo $row["ve_no_of_axles"]; ?></td></tr>
                            <tr>
                                <td>NO. OF CYLINDERS:</td>
                                <td align="right"><?php echo $row["ve_no_of_eylinders"]; ?></td></tr>
                            <tr>
                                <td>CYLINDERS DISP.:</td>
                                <td align="right"><?php echo $row["ve_cylinders_disp"]; ?></td></tr>
                            <tr>
                                <td>TEST DRIVE URL:</td>
                                <td align="right"><?php echo $row["ve_test_drive_url"]; ?></td></tr>
                            <tr>
                                <td>SHOW URL:</td>
                                <td align="right"><?php echo $row["ve_show_url"]; ?></td></tr>
                            <tr>
                                <td>NOTE:</td>
                                <td align="right"><?php echo $row["ve_note"]; ?></td>
                            </tr>

                        </tbody></table>

                        <a href="./index.php?open=Cars" style="padding:10px;color:white;background-color:#1d5ec6;font-weight:bold;">Book Now</a>
                        
                        <br><br>
                        <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ccfbe18e3fc75f3"></script>
                     
                       <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox" data-url="http://choicecart.xyz/carrental/vehical_rental_detail-old.php?id=15#" data-title="Lyna Car Rental" style="clear: both;"><div id="atstbx" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-5535cc6b-ce69-4a26-ace2-5233814b0b38" role="region"><span id="at-5535cc6b-ce69-4a26-ace2-5233814b0b38" class="at4-visually-hidden">AddThis Sharing Buttons</span><div class="at-share-btn-elements"><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(59, 89, 152); border-radius: 0px;"><span class="at4-visually-hidden">Share to Facebook</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-facebook-1" class="at-icon at-icon-facebook" style="fill: rgb(255, 255, 255); width: 32px; height: 32px;"><title id="at-svg-facebook-1">Facebook</title><g><path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path></g></svg></span><span class="at-label" style="font-size: 11.4px; line-height: 32px; height: 32px; color: rgb(255, 255, 255);">Facebook</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(29, 161, 242); border-radius: 0px;"><span class="at4-visually-hidden">Share to Twitter</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-twitter-2" class="at-icon at-icon-twitter" style="fill: rgb(255, 255, 255); width: 32px; height: 32px;"><title id="at-svg-twitter-2">Twitter</title><g><path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill-rule="evenodd"></path></g></svg></span><span class="at-label" style="font-size: 11.4px; line-height: 32px; height: 32px; color: rgb(255, 255, 255);">Twitter</span></a><a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-compact" style="background-color: rgb(255, 101, 80); border-radius: 0px;"><span class="at4-visually-hidden">Share to More</span><span class="at-icon-wrapper" style="line-height: 32px; height: 32px; width: 32px;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-addthis-3" class="at-icon at-icon-addthis" style="fill: rgb(255, 255, 255); width: 32px; height: 32px;"><title id="at-svg-addthis-3">AddThis</title><g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g></svg></span><span class="at-label" style="font-size: 11.4px; line-height: 32px; height: 32px; color: rgb(255, 255, 255);">More</span></a></div></div></div>
                    </div>

                </div>
                </div>
        </div>

            

        
        
                </div>
    </div>
	
				<?php } } ?>

<div class="container mb-3">
    <h4 class="mb-2 mt-5" style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #ff0505">
                SIMILAR VEHICLES</h4>
                <div class="owl-carousel">
               
                        
           
                        <?php  
                        $v_sql = "SELECT * FROM tbl_vehicle_rantal where ve_title LIKE '%$check_title%' AND status='1'";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){


                                echo "<div style='border:2px solid #ebebe0;padding:0px;border-radius:3px; text-align:center;' class='items-container'>
                                <div style='background-color:#000;height:30px;' class='container-fluid'><font size='5px' color='white' style='overflow:hidden;font-size:14px;'><i class='fa fa-car'></i> ".$row["ve_title"]."</font></div>
                                <div><a href='vehical_rental_detail.php?id=".$row['ve_id']."'><img class='img' id='img' src='system/admin/image/vehicle_rental/".$row["ve_image"]."' alt=''></a></div>";

                                echo "<div class='container-fluid vi_hi' style='padding:0px; text-align:left;'>

                                <table style='width:100%;'>
                                        

                                    <tr>
                                    <td colspan='3' style='text-indent:-8px; overflow:hidden;height: 14px;background-color: #000; color:#fff;font-size:13px;'>&emsp;".$text_re.":
                                    <font color='white' style='overflow:hidden;height:20px;'>".$row["ve_ref_no"]."</font>
                                    </td>
                                </tr>
                                    
                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0;'>&nbsp;&nbsp;Day(s)&nbsp;1-7:</font></td>

                                        <td class='text-right'><font class='font_responsive'  style='min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0;'><font color=>$".number_format($row["ve_days(1-7)"],2)."</font><font color=>/Day</font></font></td>
                                    </tr>
                                    

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</font></font></i></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548ce'><b><i>$".number_format($row["ve_extra_days(1-7)"],2)."</b></font>
                                        <font color=''>/Day</font></i></font></td>

                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'> 
                                        <font color=''>&nbsp;&nbsp;Day&nbsp;(15-26):</font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color=''>$".number_format($row["ve_extra_day(15-26)"],2)."</font>
                                        <font color=''>/Day</font></font></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</font></i></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548ce'><b><i>$".number_format($row["ve_extra_day(15-26)"],2)."</b></font>
                                        <font color=''>/Day</font></i></font></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color=''>&nbsp;&nbsp;Monthly:</font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color=''><i>$".number_format($row["ve_monthly"],2)."</font>
                                        <font color=''>/Day</font></i></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</i></font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548ce'><b><i>$".number_format($row["ve_monthy_extra_days"],2)."</b></font>
                                        <font color=''>/Day</font></font></i></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color=''>&nbsp;&nbsp;Yearly:</font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color=''>$".number_format($row["ve_yearly"],2)."</font>
                                        <font color=''>/Day</font></font></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</i></font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548ce'><b><i>$".number_format($row["ve_yearly_extra_days"],2)."</b></font>
                                        <font color=''>/Day</font></font></i></td>
                                    </tr>
                                    <br>
                                   <!-- <tr style='background-color:;'>-->
                                      <!--<td colspan='2' style=''>-->
                                           <!-- <a href='vehical_rental_detail.php?id=".$row["ve_id"]."' class='btn btn-sm button-detail' style= 'width:100%; background-color: #ff0505; color: white;' type='buttom'>
                                              ".$text_detail."
                                           <!-- </a>
                                        <!--</td>-->
                                   <!-- </tr>-->
                                    

                                </table>
                                </div>
                                </div>";

                            }
                        }


                        else { 
                        }
                    ?>
                  
                </div>
            </div>

<style type="text/css">

</style>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=1742567652641866&autoLogAppEvents=1">
</script>

<!-- finished section for partner benefit -->
<!-- include footer file  -->
<script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>
<script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                autoplay:true,
                dots:false,
                nav:false,
                responsive: {
                  0: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 4,
                    loop: false,
                    
                  }
                }
              })
            })
          </script>

<?php require_once("footer.php"); 
     $total_view=$total_view+1;
	$sql = "UPDATE `tbl_vehicle_rantal` SET `total_view`=$total_view WHERE `ve_id`=$id";
    $connect->query($sql);
					   
?>