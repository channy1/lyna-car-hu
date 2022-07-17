<?php include_once ('system/config/database.php'); 
       
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta content="width=600" name="viewport"> -->
    <meta name="viewport" content="user-scalable = no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lyna Car Rental</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./bootstrap337/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="./bootstrap337/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="./css/indexs.css" type="text/css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="css/ourservices.css" type="text/css">
    <!--  <link rel="stylesheet" href="./css/menus.css" type="text/css">
    <link rel="stylesheet" href="./css/registermenu.css" type="text/css">
    <link rel="stylesheet" href="./css/tabviews.css" type="text/css"> -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
        /* .nav-item,.dropdown-item {
                background-color: #a4509f;
                border: 2px solid #fff;
        }
        .dropdown-item {
            color: white;
            font-size: 11px;
        } 
        .dropdown-item:hover {
            background-color: #a4509f;
        } 
        .nav-item .nav-link {
            font-size: 13px;
            color:white !important;
            border-left: none;
            border-top: none;
            border-bottom: none;
        }
        .menu-header li a{
            text-decoration: none;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 15px;
            padding-bottom: 15px;
            border-left: 1px solid lightgrey;
            color: #a4509f;
        }
        .navbar-nav {
            margin: 7.5px -22px;
        }
        .navbar {
            background-color:#a4509f;
            position: relative;
            height: 0px;
            min-height: 52px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }
       */
        .SliderName_3 {
            margin-top: 10px;
            margin-bottom: 10px;

        }
        .SliderName_3 img {
            width: 70%;
            
        }
    </style>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true
        });
    } );
    </script>
    <!-- boostrap 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- style sheet for footer -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="template/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="template/style.css" type="text/css" />
    <link rel="stylesheet" href="template/css/colors.css" type="text/css" />
    <link rel="stylesheet" href="template/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="template/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="template/css/magnific-popup.css" type="text/css" />

    <!-- style for owl carousel -->
    <link rel="stylesheet" href="owl.carousel/custome.css" type="text/css">
    <link rel="stylesheet" href="owl.carousel/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="owl.carousel/owl.theme.default.min.css" type="text/css">

    <link rel="stylesheet" href="template/css/responsive.css" type="text/css" />
    <link rel="stylesheet" href="template/custom.css" type="text/css" />
    <script type="text/javascript" src="template/js/jquery.js"></script>
    <script type="text/javascript" src="template/js/plugins.js"></script>

    <!-- Java script for web -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./bootstrap337/js/bootstrap.js"></script>
    <script src="./bootstrap337/js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>
</head>
<body>
<?php
 $position_user="";
 $position_user= @$_SESSION["user"]->user_position;
 $language_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 
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
 }
 else {
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
 }
if(!isset($_SESSION["lang"])) {
  $_SESSION['lang']='en';
}
$lang="en";
if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}
$v_sql = "SELECT * FROM tbl_layout_content";
$result = $connect->query($v_sql);
?>
<section class="gauto-header-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="header-top-left">
                    <p>Need Help: <i class="fa fa-phone"></i> Call: +855 (0)92 14 30 14</p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="header-top-right">
                    <?php 
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
                    <a href="contact.php"> <?= (@$_SESSION['lang']=='en')? 'CONTACT':'ទំនាក់ទំនង'; ?></a>
                    <a href="faqs.php"><?= (@$_SESSION['lang']=='en')? 'FAQs':'សំណូរចម្លើយ'; ?></a>
                    <div class="dropdown">
                        <button style="font-size: 12px;" class="btn-dropdown dropdown-toggle" type="button" id="dropdownlang" data-toggle="dropdown" aria-haspopup="true">
                            <span><?= (@$_SESSION['lang']=='en')? 'INTERESTING PLACE':'រម្មណីយដ្ឋាន'; ?></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownlang">
                            <?php  
                                $v_sql = "SELECT * FROM tbl_province";
                                $result = $connect->query($v_sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                    	if((@$_SESSION['lang']=='en')){
                                    		echo "<li><a style='border: none; text-transform: uppercase;padding-top:1px;padding-bottom:1px;padding-top: 1px;padding-bottom: 1px;' href='city_tour_detail.php?id=".$row["pv_id"]."'><i class='fa fa-caret-right'></i>".$row["pv_title"]."</a></li>";
                                    	}
                                    	else{echo "<li><a style='border: none; text-transform: uppercase;padding-top: 1px;padding-bottom: 1px;' href='city_tour_detail.php?id=".$row["pv_id"]."'><i class='fa fa-caret-right'></i>".$row["pv_title_kh"]."</a></li>";
                                    }
                                       
                                    }
                                }
                                else { 
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button style="font-size: 12px;" class="btn-dropdown dropdown-toggle" type="button" id="dropdownlang" data-toggle="dropdown" aria-haspopup="true">
                            <span><?=(@$_SESSION['lang']=='en')?'LOGIN':'ចូលគណនី' ?></span>
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
                            <li><a style="padding-top: 1px;padding-bottom: 1px;" href="./customer_login.php" target="_blank"><?=(@$_SESSION['lang']=='en')?'CUSTOMER':'អតិថិជន' ?></a></a></li>
                            <li id="menu-register-show-sub"><a style="padding-top: 1px;padding-bottom: 1px;" href="./partner_login.php" target="_blank"> <?=(@$_SESSION['lang']=='en')? 'PARTNER': 'ដៃគូអាជីវកម្ម' ?></a>
                            <?php
                                if(@$_SESSION['allowLog'] == "logAlready"){
                                    echo "<li><a href='./customer_login.php?action=logout'>LOGOUT</a></li>";
                                }
                            ?>
                           
                        </ul>
                    </div>
                    <a  href="./account_type_register.php"><i class="fa fa-edit"></i><?=(@$_SESSION['lang']=='en')? 'REGISTER':'ចុះឈ្មោះ' ?></a>
                    
                    <?php   if($lang=="en") {  ?>
                    <a href="#">                                 
                        <img src="./images/kh.png" class="img-flag">
                        <?php 
                            $key = '?';
                            if (strpos($language_link, $key) == false) { 
                        ?>
                        <a class="a_kh" href="<?php echo $replace_query; ?>?lang=kh">ភាសាខ្មែរ</a>
                        <?php } else { ?>
                        <a class="a_kh" href="<?php echo $replace_query; ?>&lang=kh">ភាសាខ្មែរ</a>
                        <?php } ?>                                           
                    </a>
                    <?php } else { ?>  
                        <a href="#"> <a>                                 
                            <img src="./images/eng.png" class="img-flag">
                            <?php
                            $key = '?';
                            if (strpos($language_link, $key) == false) { 
                            ?>
                            <a class="a_en" href="<?php echo $replace_query; ?>?lang=en">English</a>   
                            <?php } else { ?>
                            <a class="a_en" href="<?php echo $replace_query; ?>&lang=en">English</a>   
                            <?php } ?>                                     
                        </a> 
                    <?php } ?>   
               
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            <?php  
                $v_sql = "SELECT * FROM tbl_logo";
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
                ?>
                    <div class="site-logo">
                        <img style='float: left;' id='logo-image-left' src='./system/admin/image/logo/<?php echo $row["lg_image"] ?>' alt='logo left'>
                        <h1><?php echo $row["lg_detail"   ]; ?></h1>
                    </div>
                 <?php 
                    }
                }
                ?>
            </div>
            <div class="col-md-4">
                <img src="./images/events/banner_promotion.jpg" style="height: 123px;width: auto;margin-left: 89px;margin-top: 10px;">
            </div>
            <div class="col-md-3">
                <div id="SliderName_3" class="SliderName_3">
                      <?php  
                            $v_sql = "SELECT * FROM tbl_event_promotion  ORDER BY e_pro_id  DESC LIMIT 7";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($rows = $result->fetch_assoc()){         
                        ?>
                     <a href='./event_promotion_detail.php?id=<?php echo $rows['e_pro_id']?>&type=<?php echo $rows['event_type'] ?>'><img src="system/admin/image/img_event_promotion/<?php echo $rows['images']; ?>"  alt="" title="" /></a>
                    <?php }} ?>
                </div>  
            </div>
        </div>
    </div>                    
</section>
<section class="gauto-mainmenu-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <nav class="navbar navbar-expand-sm   navbar-light"> 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="float:left;">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item" style="border-left: none;">
                        <a class="nav-link" href="./index.php"><?=(@$_SESSION['lang']=='en')? 'HOME': 'ទំព័រដើម' ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./about.php"><?=(@$_SESSION['lang']=='en')? 'ABOUT':'អំពីយើង' ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./our_services.php"><?=(@$_SESSION['lang']=='en')? 'SERVICE':'សេវាកម្មយើង' ?></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./car_sales.php"><?=(@$_SESSION['lang']=='en')? 'CAR SALES':'រថយន្តសម្រាប់លក់' ?></a>
                        </li>
                        <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?=(@$_SESSION['lang']=='en')? 'JOB SEEKER':'ស្វែងរកការងារ' ?>
                        </a>
                        <div class="dropdown-menu sm-menu">
                        <a  class="dropdown-item" href="./job_seekers.php"><?=(@$_SESSION['lang']=='en')? 'JOB VACANCIES':'ការងារវិជ្ជាជីវៈ' ?></a>
                        <a  class="dropdown-item" href="./cv_home.php"><?=(@$_SESSION['lang']=='en')? 'CREATE CV':'បង្កើតប្រវត្តិរូប' ?></a>
                        
                        
                        </div>
                    </li>

                        <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?=(@$_SESSION['lang']=='en')? 'INFO CENTER':'បណ្ដុំពត័មាន' ?>
                        </a>
                        <div class="dropdown-menu sm-menu">
                        <a  class="dropdown-item" href="./info_center_gallery.php"><?=(@$_SESSION['lang']=='en')? 'PHOTO GALLERIES':'រូបថតអនុស្សាវរីយ៏' ?></a>
                        <a  class="dropdown-item" href="./info_center_new.php"><?=(@$_SESSION['lang']=='en')? 'LATEST NEWS':'ពត័មានផ្សេងៗ' ?></a>
                        <a  class="dropdown-item" href="./info_center_regulation.php"><?=(@$_SESSION['lang']=='en')? 'REGULATIONS UPDATES':'ធ្វើបច្ចុប្បន្នភាពបញ្ញាតិ'?></a>
                        
                        </div>
                    </li>
                    <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?=(@$_SESSION['lang']=='en')? 'EVENTS':'ប្រិត្តិការណ៏'?>
                        </a>
                        <div class="dropdown-menu sm-menu">
                        <a class="dropdown-item" href="./our_promotion_upcoming_event.php"><?=(@$_SESSION['lang']=='en')? 'UPCOMING EVENTS':'ព្រឹត្តិការណ៍ជិតមកដល់'?></a>
                        <a class="dropdown-item" href="./our_past_promotion_event.php"><?=(@$_SESSION['lang']=='en')? 'PAST EVENTS':'ព្រឹត្តិការណ៍កន្លងផុត' ?></a>
                        <a class="dropdown-item" href="./our_submit_talk_promotion_event.php"><?=(@$_SESSION['lang']=='en')?'SUBMIT A TALK IDEA' :'ដាក់មតិយោបល់' ?></a>
                        </div>
                    </li>
                    <li class="nav-item" style="border-left: none;">
                        <a class="nav-link" href="#"><?=(@$_SESSION['lang']=='en')? 'PROMOTIONS': 'ការផ្សព្វផ្សាយ' ?></a>
                    </li>
                    <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?=(@$_SESSION['lang']=='en')? 'PARTNERS' : 'ដៃគូរអជីវកម្ម' ?>
                        </a>
                        <div class="dropdown-menu sm-menu">
                        <a class="dropdown-item" href="./top_detail.php?id=1"><?=(@$_SESSION['lang']=='en')?'PARTNER BENEFIT': 'អត្ថប្រយោជន៏សម្រាប់ដៃគូរអជីវកម្ម'?></a>
                        <a class="dropdown-item" href="./top_detail.php?id=3"><?=(@$_SESSION['lang']=='en')? 'BECOME A PARTNER': 'ចង់ក្លាយជាដៃគូរអជីវកម្ម' ?></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?=(@$_SESSION['lang']=='en')? 'CUSTOMERS' : 'អតិថិជន' ?>
                        </a>
                        <div class="dropdown-menu sm-menu">
                        <a class="dropdown-item" href="./top_detail.php?id=2"><?=(@$_SESSION['lang']=='en')? 'CUSTOMER BENEFIT' : 'អត្ថប្រយោជន៏សម្រាប់អតិថិជន' ?></a>
                        <a class="dropdown-item" href="./top_detail.php?id=4"><?=(@$_SESSION['lang']=='en')? 'BECOME A CUSTOMER' : 'ចង់ក្លាយជាអតិថិជន' ?></a>
                        </div>
                    </li>
                    
                    </ul>
                    </div>
                </nav>   
            </div>      
            <div class="col-md-2 main_menu_before">
                <p>GOOD NEWS</p>
            </div>      
        </div>
    </div>
</section>

<script type="text/javascript" src="./js/sliderman.1.3.8.js"></script>
<script type="text/javascript">
    demo3Effect1 = {name: 'myEffect31', top: true, move: true, duration: 400};
    demo3Effect2 = {name: 'myEffect32', right: true, move: true, duration: 400};
    demo3Effect3 = {name: 'myEffect33', bottom: true, move: true, duration: 400};
    demo3Effect4 = {name: 'myEffect34', left: true, move: true, duration: 400};
    demo3Effect5 = {name: 'myEffect35', rows: 3, cols: 9, delay: 50, duration: 100, order: 'random', fade: true};
    demo3Effect6 = {name: 'myEffect36', rows: 2, cols: 4, delay: 100, duration: 400, order: 'random', fade: true, chess: true};
    effectsDemo3 = [demo3Effect1,demo3Effect2,demo3Effect3,demo3Effect4,demo3Effect5,demo3Effect6,'blinds'];
    var demoSlider_3 = Sliderman.slider({container: 'SliderName_3', width:400, height:120, effects: effectsDemo3, display: {autoplay: 3000}});

    $(document).ready(function () {
        $('.navbar-light .dmenu').hover(function () {
                $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
            }, function () {
                $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
            });
    });
</script>


