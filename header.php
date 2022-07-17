<style>

input.form-control.search-form{padding: 10px !important;
    font-size: 12px !important;
    font-weight: 600;}
.input-group.custom-search-form {
    margin-top: 10px;
}
.arrow_div{position:relative;top:1px;}
.arrow-text{position:absolute;top:12px !important;left:25px;}
.arrow-text span{display:block !important;line-height: 18px !important;}
.header-top-right{padding:0px !important;line-height:70px !important;}
.header-top-left{padding:0 !important;}
.header-top-right>.dropdown .dropdown-menu li{line-height:30px !important;}
.advance-search{display:block;margin: 15px 25% 15px auto;
;}
/*.btn-search,.btn-search:hover{background:#ec3323 !important; color:#fff;}*/
@media only screen and (max-width:1275px) and (min-width:767px){
.arrow_div img{max-width:170px !important;}
    .arrow-text{top:5px !important;left:9px !important;}
    .arrow-text span{font-size:10px !important;line-height:11px !important;}
.arrow-text span:last-child{font-size:6px !important;}
.header-top-right{line-height:20px !important;text-align: start !important;}

}
@media only screen and (max-width:767px) and (min-width:320px){
.header-top-right{line-height:20px !important;}

}
@media only screen and (min-width:1920px){
        .arrow-text span{font-size:17px !important;line-height:18px !important;}
 .arrow-text span:last-child{font-size:11px !important;}
.header-top-right>.dropdown .dropdown-menu li{line-height:20px !important;}
/*.header-top-right>.dropdown .dropdown-menu.show{top:66px !important;}*/
/*.header-top-right>.dropdown .dropdown-menu.show.btn-login{top:0px !important;}*/

}
@media (max-width:764px)
{
  .header-promo
   {
	display:block;
   }
}
</style>

<?php
$title_arr=array();
$title_arr_url=array();
include_once ('system/config/database.php');

            $position_user="";
             $position_user= @$_SESSION["user"]->user_position;
           $language_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                      // Search substring


                      $check_query_string='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                      $lang_query="";
                      if(isset($_GET['lang'])) {
                         $lang_query=$_GET['lang'];
                         if($lang_query=="kh") {
                             $_SESSION['lang']='kh';
                         }
                         else {
                             $_SESSION['lang']='en';
                         }

                      }
                      else {
                         $lang_query="en";
                      }

                      if($lang_query=="kh") {
                        // check ?
                          $key = '?';
                          if (strpos($language_link, $key) == false) {
                                $key;
                                $replace_query=str_replace("?lang=kh","","$check_query_string");
                            }
                            else {
                                $key;
                                $key;
                                $replace_query=str_replace("&lang=kh","","$check_query_string");
                            }
                         // End check ?




                      }
                      else {
                        // check ?
                          $key = '?';
                          if (strpos($language_link, $key) == false) {
                                $key;
                                $replace_query=str_replace("?lang=en","","$check_query_string");
                            }
                            else {
                                $key;
                                $key;
                                $replace_query=str_replace("&lang=en","","$check_query_string");
                            }
                         // End check ?

                      }


                    if(!isset($_SESSION["lang"])) {
                       $_SESSION['lang']='en';
                    }


    $id = "2"; 
    $query="SELECT * FROM tbl_logo WHERE lg_id='$id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $logo_image = $row["lg_image"];
        }
    }

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="">
    <!-- Title -->
    <title>Lyna Car Rental</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon.png">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--Magnific css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!--Animate css-->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!--Datepicker css-->
    <link rel="stylesheet" href="assets/css/jquery.datepicker.css">
    <!--Nice Select css-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- Lightgallery css -->
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
    <!--ClockPicker css-->
    <link rel="stylesheet" href="assets/css/jquery-clockpicker.min.css">
    <!--Slicknav css-->
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--flaticon css-->
    <link type='text/css' rel='stylesheet' href='assets/css/flaticon.css'>
    <link type='text/css' rel='stylesheet' href='assets/css/jquery.fancybox.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--new css-->
        <link rel="stylesheet" href="assets/css/new_style.css">


</head>

<body>

    <!-- fixed social media-->

    <div class="socailbtn">
        <div class="hodesocailbox">
            <div class="socailbox"><a href="https://www.facebook.com/Lyna-CarRentalCom-705428602878507/" target="_blank"><img class="img" title="Visite Our Facebook Page" src="assets/img/social/facebook.png"></a></div>
            <div class="socailbox" data-toggle="modal" data-target="#myModal"><img class="img" title="Visite Our Viber ID" src="assets/img/social/virber.png"></div>
            <div class="socailbox" data-toggle="modal" data-target="#whatsup"><img class="img" title="Visite Our WhatsApp ID" src="assets/img/social/whatsapp.png"></div>
            <div class="socailbox"><a href="https://twitter.com/LCarrental" target="_blank"><img class="img" title="Visite Our Twitter Page" src="assets/img/social/twitter.png"></a></div>
           <!-- <div class="socailbox"><a href="https://plus.google.com/u/1/103316012134737513928" target="_blank"><img class="img" title="Visite Our G+ Page" src="assets/img/social/gg.png"></a></div>-->
            <div class="socailbox" data-toggle="modal" data-target="#line"><img class="img" title="Visite Our Line ID" src="assets/img/social/line.png"></div>
            <div class="socailbox"><a href="https://www.linkedin.com/in/lyna-carrental-a37410138/" target="_blank"><img class="img" title="Visite Our LinkedIn Page" src="assets/img/social/linkin.png"></a></div>

            <div class="socailbox"><a href="https://www.pinterest.com/lynacarrental/" target="_blank"><img class="img" title="Visite Our Pinterest Page" src="assets/img/social/pinterest.png"></a></div>

            <div class="socailbox" data-toggle="modal" data-target="#wechat"><img class="img" title="Visite Our WeChat ID" src="assets/img/social/wechat.png"></div>

            <div class="socailbox"><a href="" target="_blank"><img class="img" title="Visite Our Instagram Page" src="assets/img/social/instgram.png"></a></div>
        </div>

    </div>

    <!-- fixed social media-->




    <!-- Header Top Area Start -->
    <section class="gauto-header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="header-top-left">
                        <!--<p>Hotline: <i class="fa fa-phone"></i> Call: +855 (0)92 14 30 14</p>-->
                       <!--<img src="assets/img/top-red-band.png">-->
					   <?php
					   $v_sql_phone = "SELECT * FROM tbl_website_info";
                       $result_phone = $connect->query($v_sql_phone);
	 
                        if ($result_phone->num_rows > 0) {
                        while($row = $result_phone->fetch_assoc()) {
							$phone=$row["section_data"];
							break;
						}
						}
						
						 $phone =explode(",", $phone);
	?>

<div class="arrow_div">
    <img src="assets/img/Capture.PNG" class="img-responsive" style="width:310px;">
</div>
                        <div class="arrow-text">
    <span style="font-size:18px;color:#eee!important"><?php echo $phone[0]; ?></span>
   <span style="font-size:18px;color:#eee!important"><?php echo $phone[1]; ?></span>
    <span style="font-size:8px; color:#ffff00; font-weight:normal;text-align:center">NEED HELP? PLEASE CALL!</span>
</div>

                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="header-top-right">
                        <a href="about.php">

                            <?=(@$_SESSION['lang']=='en')?'About':'អំពី' ?>
                        </a>
                        <?php
                        $v_sql = "SELECT * FROM tbl_layout_content";
                        $result = $connect->query($v_sql);

                        if(@$_SESSION['lang'] == 'en'){
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    if( ($row["pb_id"] !="5") && ($row["pb_id"]) !="6" ) {
                                    echo "<a  href='top_detail.php?id=".$row["pb_id"]."'>".$row["title"]."</a>";
                                    }
                                }
                            }
                        } else {
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                     if( ($row["pb_id"] !="5") && ($row["pb_id"]) !="6" ) {
                                    echo "<a href='top_detail.php?id=".$row["pb_id"]."'>".$row["kh_title"]."</a>";
                                    }
                                }
                            }
                        }

                        ?>

                        <a href="faqs.php">

                               <?=(@$_SESSION['lang']=='en')?'FAQs':'សំណួរដែលសួរជារឿយៗ' ?>
                        </a>

                        <div class="dropdown">
                            <button class="btn-dropdown dropdown-toggle" type="button" id="dropdownlang" data-toggle="dropdown" aria-haspopup="true">

                                <?=(@$_SESSION['lang']=='en')?'Interesting Places':'កន្លែងគួរឱ្យចាប់អារម្មណ៍' ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownlang" style="width:200px">

                                <?php
                                $v_sql = "SELECT * FROM tbl_province";
                                $result = $connect->query($v_sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                    	if((@$_SESSION['lang']=='en')){
											$title_arr[]=$row["pv_title"];
											$title_arr_url[]='city_tour_detail.php?id='.$row["pv_id"];
                                    		echo "<li><a style='color:white' href='city_tour_detail.php?id=".$row["pv_id"]."'><i class='fa fa-caret-right'></i>".$row["pv_title"]."</a></li>";
                                    	}
										  
                                    	else{
											  $title_arr[]=$row["pv_title_kh"];
											$title_arr_url[]='city_tour_detail.php?id='.$row["pv_id"];
											
											echo "<li><a style='color:white' href='city_tour_detail.php?id=".$row["pv_id"]."'><i class='fa fa-caret-right'></i>".$row["pv_title_kh"]."</a></li>";
                                    }

                                    }
                                }
                                else {
                                }
                            ?>

                            </ul>
                        </div>

                        <div class="dropdown">
                            <button class="btn-dropdown dropdown-toggle btn-login" type="button" id="dropdownlang" data-toggle="dropdown" aria-haspopup="true">
                                <span><?=(@$_SESSION['lang']=='en')?'Login':'ចូលគណនី' ?></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownlang">
                                <?php
                                @$id = @$_SESSION["user"]->user_id;
                                $v_sql = "SELECT * FROM tbl_users WHERE user_id='$id' ";
                                $result = $connect->query($v_sql);
                                if ($result->num_rows > 0){
                                    if($row = $result->fetch_assoc()){
                                        if(@$_SESSION['allowLog'] == "logAlready"){
                                            echo "&emsp;<img src='images/no-profile.png' style='width:30px;height:30px ;border-radius:50%;'><font size='2'> ".$row["user_name"]."</font>";
                                        }
                                    }
                                }
                            ?>
                                <li><a style="padding-top: 1px;padding-bottom: 1px;color:white" href="./customer_login.php" target="_blank"><?=(@$_SESSION['lang']=='en')?'Customer':'អតិថិជន' ?></a></a></li>
                                <li id="menu-register-show-sub"><a style="padding-top: 1px;padding-bottom: 1px;color:white" href="./partner_login.php" target="_blank"> <?=(@$_SESSION['lang']=='en')? 'Partner': 'ដៃគូអាជីវកម្ម' ?></a>
                                    <?php
                                if(@$_SESSION['allowLog'] == "logAlready"){
                                    echo "<li><a href='./customer_login.php?action=logout'>Logout</a></li>";
                                }
                            ?>

                            </ul>
                        </div>





                        <a href="account_type_register.php">

                            <?=(@$_SESSION['lang']=='en')?'Register':'ចុះឈ្មោះ' ?>
                        </a>

                     <?php
                     $key = '?';
                     if (strpos($language_link, $key) == false) {
                        $url= $replace_query."?lang=en";
                     } else {
                        $url= $replace_query."&lang=en";

                        }

                     if($lang_query=="kh") {  ?>

                        <a href="<?php echo $url; ?>">
                            <img src="./images/eng.png" class="img-flag">


                        </a>

                    <?php } else {

                          $key = '?';
                     if (strpos($language_link, $key) == false) {
                        $url= $replace_query."?lang=kh";
                     } else {
                        $url= $replace_query."&lang=kh";

                        }  ?>

                    <a href="<?php echo $url; ?>">
                        <img src="./images/kh.png" class="img-flag">
                    </a>



                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Header Top Area End -->


    <!-- Main Header Area Start -->
    <header class="gauto-main-header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="site-logo">
                        <a href="index.php">
                            <img src="<?php echo $base_url.'system/admin/image/logo/'.@$logo_image; ?>" alt="gauto" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="header-promo">
                        <!--<div class="single-header-promo">-->
                        <!--    <div class="header-promo-icon">-->
                        <!--        <img src="assets/img/banner_promotion.jpg">-->
                        <!--    </div>-->

                        <!--</div>-->
                         <div class="fadeOut owl-carousel owl-theme">

                             <?php
            $v_sql = "SELECT * FROM tbl_promotion ";
            $result = $connect->query($v_sql);
                             if ($result->num_rows > 0) {
                             while($row = $result->fetch_assoc()) {
            ?>
            <div class="item">
                <a href="<?php echo $row["redirect_url"]; ?>">
              <img src="<?php echo "system/admin/image/promotion/".$row["images"]; ?>" style="height:85px;margin-bottom:10px">
                </a>
            </div>

                             <?php } } ?>
            
          </div>
          <!--<div class="fadeOut owl-carousel owl-theme">-->
          <!--  <div class="item">-->
          <!--    <img src="assets/img/banner_promotion2.jpg">-->
          <!--  </div>-->
          <!--  <div class="item">-->
          <!--    <img src="assets/img/banner_promotion.jpg">-->
          <!--  </div>-->
          <!--  <div class="item">-->
          <!--    <img src="assets/img/banner_promotion2.jpg">-->
          <!--  </div>-->
            
          <!--</div>-->
                        <!--<div class="single-header-promo">-->
                        <!--    <div class="header-promo-icon">-->
                        <!--        <img src="assets/img/banner_promotion2.jpg">-->
                        <!--    </div>-->

                        <!--</div>-->
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="header-promo">
                        <!--<div class="single-header-promo">-->
                        <!--    <div class="header-promo-icon">-->
                        <!--        <img src="assets/img/banner_promotion.jpg">-->
                        <!--    </div>-->

                        <!--</div>-->
                       
          <div class="fadeOut owl-carousel owl-theme">
            <?php
                $hu_events = "SELECT * FROM tbl_event_promotion  ORDER BY e_pro_id  DESC LIMIT 7";
                $result = $connect->query($hu_events);
				
                if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc()){
                    //echo "<pre>";print_r($rows);exit();
					
                  if(strtotime($rows['event_date'])>=time()){
                ?>
            <div class="item">
              <a href="events.php?id=<?php echo $rows['e_pro_id']; ?>"><img src="system/admin/image/img_event_promotion/<?php echo $rows['images']; ?>" style="height:85px"></a>
            </div>
          <?php } } } ?>

            
          </div>
                        <!--<div class="single-header-promo">-->
                        <!--    <div class="header-promo-icon">-->
                        <!--        <img src="assets/img/banner_promotion2.jpg">-->
                        <!--    </div>-->

                        <!--</div>-->
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="header-action">
                        <a href="tel:<?php echo $phone[0]; ?>"><i class="fa fa-phone"></i>

                            <?=(@$_SESSION['lang']=='en')?'Request a call':'ស្នើសុំការហៅ' ?>
                        </a>
                    </div>
           <div class="input-group custom-search-form">
              <input type="text" id="search_field" class="form-control search-form" Placeholder="What Are You Searching For ?">
              <span class="input-group-btn">
              <button class="btn btn-default" type="button">
              <span class="fa fa-search" style="color:red"></span>
             </button>
             </span>
			 
			  
             </div><!-- /input-group -->
			 <div id="search_content" style="display:none">
			
			  </div>
                </div>
          

            </div>
            
        </div>
    </header>
    <!-- Main Header Area End -->


    <!-- Mainmenu Area Start -->
    <section class="gauto-mainmenu-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11 col-md-12 col-sm-12">
                    <div class="mainmenu">
                        <nav>
                            <ul id="gauto_navigation">
                                <li><a href="index.php">
                                        <?=(@$_SESSION['lang']=='en')? 'HOME': 'ទំព័រដើម' ?>
                                    </a></li>

                                <li>
                                    <a href="our_services.php"><?=(@$_SESSION['lang']=='en')? 'SERVICES':'សេវាកម្មយើង' ?></a>

                                </li>
                                <li>
                                    <a href="car_sales.php"><?=(@$_SESSION['lang']=='en')? 'CAR SALES':'រថយន្តសម្រាប់លក់' ?></a>

                                </li>


                                <li>
                                    <a href="#"><?=(@$_SESSION['lang']=='en')? 'JOB SEEKER':'ស្វែងរកការងារ' ?></a>
                                    <ul>
                                        <li><a href="job_seekers.php"><?=(@$_SESSION['lang']=='en')? 'JOB VACANCIES':'ការងារវិជ្ជាជីវៈ' ?></a></li>
                                        <li><a href="cv_home.php"><?=(@$_SESSION['lang']=='en')? 'CREATE CV':'បង្កើតប្រវត្តិរូប' ?></a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="#"><?=(@$_SESSION['lang']=='en')? 'INFO CENTER':'បណ្ដុំពត័មាន' ?></a>
                                    <ul>
                                        <li><a href="info_center_gallery.php"><?=(@$_SESSION['lang']=='en')? 'PHOTO GALLERIES':'រូបថតអនុស្សាវរីយ៏' ?></a></li>
                                        <li><a href="info_center_new.php"><?=(@$_SESSION['lang']=='en')? 'LATEST NEWS':'ពត័មានផ្សេងៗ' ?></a></li>
                                        <li><a href="info_center_regulation.php"><?=(@$_SESSION['lang']=='en')? 'REGULATIONS UPDATES':'ធ្វើបច្ចុប្បន្នភាពបញ្ញាតិ'?></a></li>

                                    </ul>
                                </li>


                                <li>
                                    <a href="#"><?=(@$_SESSION['lang']=='en')? 'EVENTS':'ប្រិត្តិការណ៏'?></a>
                                    <ul>
                                        <li><a href="our_promotion_upcoming_event.php"><?=(@$_SESSION['lang']=='en')? 'UPCOMING EVENTS':'ព្រឹត្តិការណ៍ជិតមកដល់'?></a></li>
                                        <li><a href="our_past_promotion_event.php"><?=(@$_SESSION['lang']=='en')? 'PAST EVENTS':'ព្រឹត្តិការណ៍កន្លងផុត' ?></a></li>
                                        <li><a href="our_submit_talk_promotion_event.php"><?=(@$_SESSION['lang']=='en')?'SUBMIT A TALK IDEA' :'ដាក់មតិយោបល់' ?></a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="#"><?=(@$_SESSION['lang']=='en')? 'PROMOTIONS': 'ការផ្សព្វផ្សាយ' ?></a>

                                </li>

                                <li>
                                    <a href="#"><?=(@$_SESSION['lang']=='en')? 'PARTNERS' : 'ដៃគូរអជីវកម្ម' ?></a>
                                    <ul>
                                        <li><a href="top_detail.php?id=1"><?=(@$_SESSION['lang']=='en')?'PARTNER BENEFIT': 'អត្ថប្រយោជន៏សម្រាប់ដៃគូរអជីវកម្ម'?></a></li>
                                        <li><a href="top_detail.php?id=3"><?=(@$_SESSION['lang']=='en')? 'BECOME A PARTNER': 'ចង់ក្លាយជាដៃគូរអជីវកម្ម' ?></a></li>

                                    </ul>
                                </li>

                                <li>
                                    <a href="#"><?=(@$_SESSION['lang']=='en')? 'CUSTOMERS' : 'អតិថិជន' ?></a>
                                    <ul>
                                        <li><a href="top_detail.php?id=2"><?=(@$_SESSION['lang']=='en')? 'CUSTOMER BENEFIT' : 'អត្ថប្រយោជន៏សម្រាប់អតិថិជន' ?></a></li>
                                        <li><a href="top_detail.php?id=4"><?=(@$_SESSION['lang']=='en')? 'BECOME A CUSTOMER' : 'ចង់ក្លាយជាអតិថិជន' ?></a></li>

                                    </ul>
                                </li>

                                <li><a href="contact.php"><?= (@$_SESSION['lang']=='en')? 'CONTACT':'ទំនាក់ទំនង'; ?></a></li>
                                <li><a href="#">Good News</a></li>



                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <div class="gauto-responsive-menu"></div>
                </div>

            </div>
        </div>
    </section>
    <!-- Mainmenu Area End -->
    
    <script>
            $(document).ready(function() {
              $('.fadeOut').owlCarousel({
                items: 1,
                animateOut: 'fadeOut',
                loop: true,
                margin: 10,
                
                dots:false,
                autoplay:true,
              });
             
            });
          </script>
		 
