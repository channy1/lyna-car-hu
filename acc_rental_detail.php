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
 .panel-body ul li:before{display:none;}
/*.item{background:red;}*/
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
?>



<div class="container-fluid" style="margin-top: 10px;">
    <div style="height: 10px; width: 100%">
    </div>
</div>
<!-- finished header file included -->
<!-- body section for partner benefit -->

<?php
$check_title="";
                $v_sql = "SELECT * FROM tbl_accessories_rental  WHERE ac_id='$id'";
               
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
                        $check_title=$row['ac_title'];
						
						 $total_view=$row["total_view"];
						
						?>

<div class="container">
   <div class="panel panel-default">
        <div class="panel-heading">
                <h2><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp; <?php echo $check_title; ?></h2>
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
                </all_imageul>

       </div>
        <div class="panel-body">
            <div class="container">
                <div class="row"> 
                <div class=" col-lg-7 col-md-7 col-sm-7 ">
                               <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel" data-interval="true">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
				<?php
				  $all_image=array();
				  $v_sql_full = "SELECT * FROM  tbl_accessories_rental_img   WHERE acc_id='$id'";
                                $results = $connect->query($v_sql_full);
								$i=0;
                                if ($results->num_rows > 0) {
                                    while($row_full = $results->fetch_assoc()){
                                     $url_img=$row_full['img_sub'];
                                     $url_img= str_replace("..","","$url_img");
                                      $all_image[]=$url_img;
                                         ?>
                    <div class="carousel-item <?php if($i==0)echo 'active'; ?>">
                        <img class="d-block w-100" src="system/admin/<?php echo $url_img; ?>" alt="First slide">
                    </div>
					
								<?php $i++; } } ?>
                   <!-- <div class="carousel-item">
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
				  <?php } ?>
                 
                </ol>
            </div>
                            <div class="bs-example bs-example-tabs example-tabs mb-5" style="margin-top:90px;">
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active"><a href="#vehicle" data-toggle="tab">Accessories Overview</a></li>
                                </ul>
                                                                <div id="myTabContent" class="tab-content margin-top-15 margin-bottom-20">
                                    <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-href="http://choicecart.xyz/carrental/vehical_rental_detail-old.php?id=15" data-width="" data-numposts="5" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=1742567652641866&amp;container_width=579&amp;height=100&amp;href=http%3A%2F%2Fchoicecart.xyz%2Fcarrental%2Fvehical_rental_detail-old.php%3Fid%3D15&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v3.3&amp;width=550"><span style="vertical-align: bottom; width: 550px; height: 211px;"><iframe name="f3590f314788ee4" width="550px" height="100px" data-testid="fb:comments Facebook Social Plugin" title="fb:comments Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v3.3/plugins/comments.php?app_id=1742567652641866&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df31a797a56d966%26domain%3Dchoicecart.xyz%26origin%3Dhttp%253A%252F%252Fchoicecart.xyz%252Ff1e9f878a393168%26relation%3Dparent.parent&amp;container_width=579&amp;height=100&amp;href=http%3A%2F%2Fchoicecart.xyz%2Fcarrental%2Fvehical_rental_detail-old.php%3Fid%3D15&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;version=v3.3&amp;width=550" style="border: none; visibility: visible; width: 550px; height: 211px;" __idm_frm__="489" class=""></iframe></span></div>
                             
                                </div>
                       </div>


                <!-- <img width="100%" src="system/admin/image/vehicle_rental/"> -->
                </div>
                <div class='col-sm-5' style="color:black;font-size:13px;">
                        <table width="100%" class="mb-5" >
                            <tr>
                                <td>ACCESSORIES REF. NO.:</td>
                                <td align="right"><?php echo $row["ac_ref_no"]; ?></td>
                            </tr>
                           
                          
                          
                              
                            <tr>
                                <td>DAYS (1-7):</td>
                                <td align="right">$ <?php echo number_format($row["ac_days(1-7)"],2); ?></td></tr>
                            <tr>
                                <td>~ EXTRA DAY:</td>
                                <td align="right">$ <?php echo number_format($row["ac_extradays(1-7)"],2); ?></td></tr>
                            <tr>
                                <td>DAYS (15-26):</td>
                                <td align="right">$ <?php echo number_format($row["ac_days(15-26)"],2); ?></td>
                            </tr>
                             <tr>
                                <td>~ EXTRA DAY:</td>
                                <td align="right">$ <?php echo number_format($row["ac_extradays(15-26)"],2); ?></td>
                            </tr>
                            <tr>
                                <td>MONTHLY:</td>
                                <td align="right">$ <?php echo number_format($row["ac_monthly"],2); ?></td>
                            </tr>
                             <tr>
                                <td>~ EXTRA DAY:</td>
                                <td align="right">$ <?php echo number_format($row["ac_extramonthly"],2); ?></td>
                            </tr>
                            <tr>
                                <td>YEARLY:</td>
                                <td align="right">$ <?php echo number_format($row["ac_yearly"],2); ?></td>
                            </tr>
                            <tr>
                                <td>~ EXTRA DAY:</td>
                                <td align="right">$ <?php echo number_format($row["ac_extrayearly"],2); ?></td>
                            </tr>
                           

                        </table>
                        <a href="./index.php?open=Accessorie_rent" style="padding:10px;color:white;background-color:#1d5ec6;font-weight:bold;">Book Now</a>
                      
                        <br><br>
                        <!-- Go to www.addthis.com/dashboard to customize your tools --> 
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ccfbe18e3fc75f3"></script>
                     
                       <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
                    </div>

                </div>
                </div>
        </div>

            

        
        
                </div>
    </div>
	
				<?php } } ?>

    <div class="container mb-3">
         <h4 class="mb-2 mt-5" style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #ff0505">
                SIMILAR ACCESSORIES</h4>
                <div class="owl-carousel">
               
                        
           
                        <?php  
                        $v_sql = "SELECT * FROM tbl_accessories_rental where ac_title LIKE '%$check_title%' ";
                        

                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){


                                // echo"<th>"."Vehicle"."</th>"."<br>";
                                // echo"<th>"."Testing"."</th>";


                                echo "<div style='border:2px solid #ebebe0;padding:0px;border-radius:3px; text-align:center;' class='items-container'>
                                <div style='background-color:#000;height:30px;' class='container-fluid'><font size='5px' color='white' style='overflow:hidden;font-size:14px;'><i class='fa fa-car'></i> ".$row["ac_title"]."</font></div>
                                <div><a href='acc_rental_detail.php?id=".$row['ac_id']."'><img class='img' id='img' src='system/admin/image/accessories rental/".$row["ac_image"]."' alt=''></a></div>";

                                echo "<div class='container-fluid vi_hi' style='padding:0px; text-align:left;'>

                                <table style='width:100%;'>
                                        

                                    <tr>
                                    <td colspan='3' style='overflow:hidden;height: 14px;background-color: #000; color:#fff;font-size:13px;'>&emsp;".$text_re.":
                                    <font color='white' style='overflow:hidden;height:20px;'>".$row["ac_ref_no"]."</font>
                                    </td>
                                </tr>
                                    
                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0; color:;'>&nbsp;&nbsp;Day(s)&nbsp;1-7:</font></td>

                                        <td class='text-right'><font class='font_responsive'  style='min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0;'><font color=''>$".number_format($row["ac_days(1-7)"],2)."</font><font color= '' >/Day</b></font></font></td>
                                    </tr>
                                    

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</b></font></font></i></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548CE'><i><b>$".number_format($row["ac_extradays(1-7)"],2)."</b></font>
                                        <font color=''>/Day</b></font></i></font></td>

                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'> 
                                        <font color=''>&nbsp;&nbsp;Day&nbsp;(15-26):</b></font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color=''>$".number_format($row["ac_days(15-26)"],2)."</font>
                                        <font color=''>/Day</font></font></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</b></font></i></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548CE'><i><b>$".number_format($row["ac_extradays(15-26)"],2)."</b></font>
                                        <font color=''>/Day</b></font></i></font></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color=''>&nbsp;&nbsp;Monthly:</b></font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color=''><i>$".number_format($row["ac_monthly"],2)."</font>
                                        <font color=''>/Day</font></i></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</b></i></font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548CE '><i><b>$".number_format($row["ac_extramonthly"],2)."</b></font>
                                        <font color=''>/Day</b></font></font></i></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color=''>&nbsp;&nbsp;Yearly:</b></font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color=''>$".number_format($row["ac_yearly"],2)."</font>
                                        <font color=''>/Day</b></font></font></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <i><font color=''>&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</b></i></font></font></td>

                                        <td class='text-right'><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#1548CE'><i><b>$".number_format($row["ac_extrayearly"],2)."</b></font>
                                        <font color=''>/Day</font></font></i></td>
                                    </tr>
                                    <br>
                                    <!--<tr style='background-color:;'>-->
                                     <!-- <td colspan='2' style=''>-->
                                            <!--<a href='acc_rental_detail.php?id=".$row["ac_id"]."' class='btn btn-sm button-detail' style= 'width:100%; background-color:#A4509F ; color: white;' type='buttom'>
                                              ".$text_detail."
                                            </a>-->
                                        <!--</td>-->
                                    <!--</tr>-->
                                    

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
	$sql = "UPDATE `tbl_accessories_rental` SET `total_view`=$total_view WHERE `ac_id`=$id";
    $connect->query($sql);

?>