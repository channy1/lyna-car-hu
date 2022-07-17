   
<script src="./js/bootstrap-select.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
            <!-- Footer
            ============================================= -->
            <footer id="footer" class="dark" style="background-color: #812EC8;">

                <div class="container-fluid" style="margin-top:12%;">

                    <!-- Footer Widgets
                    ============================================= -->
                   
                        <div class="col-sm-3">
                            <div class="widget clearfix">

                                <h4 style="padding: 5px;text-align: center;background-color: #f69314 !important; color: white; padding-left: 5px;">
                                   <?=(@$_SESSION['lang']=='en')?'UPCOMING EVENTS':'ព្រឹត្តិការនិងមកដល់'; ?>

                                </h4>
                                <div>
                                <?php  
                                    $v_sql = "SELECT * FROM  tbl_event_promotion WHERE event_type='1' 
                                    ORDER BY e_pro_id DESC limit 3";
                                    $result = $connect->query($v_sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){

                                            if(@$_SESSION['lang']=='en') {
                                                 echo "";
                                                echo "<div class='entry-title'>";
                                                echo "<a href='event_promotion_detail.php?id=".$row["e_pro_id"]."&type=".$row["event_type"]."' style='color: white !important;'>".$row["title"]."</a>";
                                                echo "</div><ul class='entry-meta'></ul>";
                                            }
                                            else {
                                                echo "";
                                                echo "<div class='entry-title'>";
                                                echo "<a href='event_promotion_detail.php?id=".$row["e_pro_id"]."&type=".$row["event_type"]."' style='color: white !important;'>".$row["title_kh"]."</a>";
                                                echo "</div><ul class='entry-meta'></ul>";
                                            }
                                           
                                        }
                                    }
                                    else { 
                                    }
                                ?>
                            </div>
                        </div>

                        </div>

                        <div class="col-sm-3">

                            <div class="widget clearfix">
                            <h4 style="padding: 5px;text-align: center;background-color: #f69314 !important; color: white; padding-left: 5px;">
                                ​<?=(@$_SESSION['lang']=='en')?'LATEST NEWS':'ពត៌មានថ្មីៗ'; ?>
                            </h4>
                                <div>
                                <?php  
                                    $v_sql = "SELECT * FROM tbl_info_center  ORDER BY info_center_id DESC limit 3";
                                    $result = $connect->query($v_sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                                        	if($row['event_type']==2){
                                                if(@$_SESSION['lang']=='en') {
                                                    echo "<div class='entry-title'>";
                                                    echo "<a href='info_center_new_detail.php?id=".$row["info_center_id"]."&type=".$row["event_type"]."' style='color:white !important;'>".$row["title"]."</a>";
                                                    echo "</div><ul class='entry-meta'></ul>";
                                                }
                                                else {
                                                    echo "<div class='entry-title'>";
                                                    echo "<a href='info_center_new_detail.php?id=".$row["info_center_id"]."&type=".$row["event_type"]."' style='color:white !important;'>".$row["title_kh"]."</a>";
                                                    echo "</div><ul class='entry-meta'></ul>";
                                                }
                                        		
                                        	}
                                        	else if($row['event_type']==1){

                                                if(@$_SESSION['lang']=='en') {
                                                    echo "<div class='entry-title'>";
                                                    echo "<a href='info_center_new_detail.php?id=".$row["info_center_id"]."&type=".$row["event_type"]."' style='color:white !important;'>".$row["title"]."</a>";
                                                    echo "</div><ul class='entry-meta'></ul>";
                                                }
                                                else {
                                                    echo "<div class='entry-title'>";
                                                    echo "<a href='info_center_new_detail.php?id=".$row["info_center_id"]."&type=".$row["event_type"]."' style='color:white !important;'>".$row["title_kh"]."</a>";
                                                    echo "</div><ul class='entry-meta'></ul>";
                                                }
                                        		
                                        	}
                                        	else{

                                                if(@$_SESSION['lang']=='en') {
                                                    echo "<div class='entry-title'>";
                                                    echo "<a href='info_center_regulation.php' style='color:white !important;'>".$row["title"]."</a>";
                                                    echo "</div><ul class='entry-meta'></ul>";
                                                }
                                                else {
                                                     echo "<div class='entry-title'>";
                                                    echo "<a href='info_center_regulation.php' style='color:white !important;'>".$row["title_kh"]."</a>";
                                                    echo "</div><ul class='entry-meta'></ul>";
                                                }
                                        		
                                        	}
                                           
                                        }
                                    }
                                    else { 
                                    }
                                ?>
 
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-3">

                            <div class="widget clearfix">
                            <h4 style="padding: 5px;text-align: center;background-color: #f69314 !important; color: white; padding-left: 5px;">
                                ​<?=(@$_SESSION['lang']=='en')?'JOB ANNOUNCEMENTS':'ជ្រើសរើសបុគ្គលិក'; ?>
                                
                            </h4>
                                <div>
                                <?php  
                                    $v_sql = "SELECT * FROM job_announment  ORDER BY ann_id DESC limit 3";
                                    $result = $connect->query($v_sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                                            echo "<div class='entry-title'>";
                                            echo "<a href='job_seekers_detail.php?id=".$row["ann_id"]."' style='color:white !important;'>".$row["ann_title_en"]."</a>";
                                            echo "</div><ul class='entry-meta'></ul>";
                                        }
                                    }
                                    else { 
                                    }
                                ?>
                             
                                </div>
                            </div>

                        </div>
                        


                        <div class="col-sm-3">

                            <div class="widget subscribe-widget clearfix">
                                <font style="color:white !important;"><strong>Subscribe</strong> to our newsletter to get the latest news and upcoming event notifications...</font>
                                <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                                <form id="widget-subscribe-form" action="http://www.eurocham-cambodia.org/main/ajax/newsletter_subscribe" role="form" method="post" class="nobottommargin">
                                    <div class="col_half">
                                        <input id="newsletter-firstname" name="newsletter-firstname" class="form-control required" placeholder="First Name">
                                    </div>
                                    <div class="col_half col_last">
                                        <input id="newsletter-lastname" name="newsletter-lastname" class="form-control required" placeholder="Last Name">
                                    </div>
                                    <div class="col_full" style="margin-top: 10px;">
                                        <div class="input-group divcenter">
                                            <span class="input-group-addon" style="display: none;"><i class="icon-email2"></i></span>
                                            <input type="email" id="newsletter-email" name="newsletter-email" class="form-control required email" placeholder="Enter your Email">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" style="background-color: #f69314; border-color: #f69314;height: 35px;" type="submit"> <?=(@$_SESSION['lang']=='en')?'SUBSRIBE':'សាបស្ក្រាយ'; ?></button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    $("#widget-subscribe-form").validate({
                                        submitHandler: function(form) {
                                            $(form).find('.input-group-addon').show().find('.icon-email2').removeClass('icon-email2').addClass('icon-line-loader icon-spin');
                                            $(form).ajaxSubmit({
                                                target: '#widget-subscribe-form-result',
                                                success: function() {
                                                    $(form).find('.input-group-addon').hide();
                                                    $('#widget-subscribe-form').find('.form-control').val('');
                                                    $('#widget-subscribe-form-result').attr('data-notify-msg', $('#widget-subscribe-form-result').html()).html('');
                                                    SEMICOLON.widget.notifications($('#widget-subscribe-form-result'));
                                                }
                                            });
                                        }
                                    });
                                </script>
                            </div>
                                    <h4 style="color:white !important;">FOUNDING CHAMBERS</h4>
                            </div>
                            <div class="col-sm-3">
                            <div class="widget clearfix">
                            <h4 style="background-color: #f69314 !important; color: white; padding-left: 5px;">
                            ​​ <?=(@$_SESSION['lang']=='en')?'TESTIMONAL':'អតិថិជននិយាយពីយើង'; ?>
                            </h4>
                                <div>
                                <img src="images/cmd_here.png" height="50px"><b style="color:white;">​<?=(@$_SESSION['lang']=='en')?'TESTIMONAL':'អតិថិជននិយាយពីយើង'; ?></b><br>
                             
                                <a href="guestbook.php" style="color:white;">​<?=(@$_SESSION['lang']=='en')?'Add Your Comments Here':'ផ្ដល់មតិយោបល់'; ?> <img src="images/add_here.png" height="40px"></a>
                                </div>
                            </div>
                        </div>
                    <!-- .footer-widgets-wrap end -->

                

                <!-- Copyrights
                ============================================= -->
                    <div class="col-sm-9">
                        

                        <?php  
                          
                        
                            $v_sql = "SELECT * FROM tbl_footer_status";
                            $result = $connect->query($v_sql);
                             $check_tittle="";
	                         
                            if ($result->num_rows > 0) {
                            	 
                                while($row = $result->fetch_assoc()){
                                	if((@$_SESSION['lang']=='en')) {
	                          	    $check_tittle=$row['pre_title'];
		                          }
		                          else {
		                          	$check_tittle=$row['pre_title_kh'];
		                          }

		                          if($row['footer_id']=="4") {
		                          	echo "<u><a style='color:white !important;font-size:px;font-size:14px;' href='contact.php'>".$check_tittle."</a></u> /";
		                          }
		                          else {
		                          	echo "<u><a style='color:white !important;font-size:px;font-size:14px;' href='detailt_footer_status.php?id=".$row['footer_id']."'>".$check_tittle."</a></u> /";
		                          }
                                    
                                }
                            }
                            else {
                            }
                        ?>
                    </div>
                    <div class="col-sm-3">
                        <?php
                            $v_sql = "SELECT * FROM tbl_ft_img_foooter";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $str = str_replace("fa fa-","si-",$row["ft_detail"]);
                                    echo "<a  href='".$row["ft_title"]."' target='_blank' class='si-small social-icon  si-colored ".$str." '  >";
                                    echo "<i class='".$row["ft_detail"]." fa-2x'></i>";
                                    echo "<i class='".$row["ft_detail"]." fa-2x'></i></a>";
                                }
                            }
                            else {
                            }
                        ?>
                        <br><br>
                        <font color="white" style="font-weight: bold;" size="5px">
                        <?php  
                                $v_sql = "SELECT * FROM   tbl_footer_text WHERE ft_id=1";
                                $result = $connect->query($v_sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result ->fetch_assoc()){
                                        echo $row["ft_text"];
                                        }
                                }
                                else { 
                                }
                        ?>
                        </font>
                        <i style="padding: 0px" class="icon-headphones col-sm-1"></i>
                        <div style="padding: 0px;text-shadow:5px 5px 3px 3px black !important;color:white;" class="col-sm-10">
                            <?php  
                                $v_sql = "SELECT * FROM  tbl_ft_phone";
                                $result = $connect->query($v_sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result ->fetch_assoc()){
                                        echo "".$row["ft_detail"]."<br>";
                                        }
                                }
                                else { 
                                }
                            ?>
                            </div>
                    </div>
                    <div class="col-sm-12">
                    <?php  
                            $v_sql = "SELECT * FROM tbl_footer_text WHERE ft_id = 2 ";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    echo "<font size='4px' color='white' style='font-size: 14px;text-align:center !important;'>".$row["ft_text"]."</font>";
                                }
                            }
                            else { 
                            }
                        ?>
                    </div>
                </div>
            </footer><!-- #footer end -->
            <!-- #wrapper end -->
                <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>
        <style>
            #scrollToTop {
            padding-top: 7px;
            padding-right: 10px;
            padding-left: 9px;
            padding-bottom: 10px;
            width: 40px;
            border-radius: 50px;
            cursor: pointer;
            display: none;
            height: 40px;
            margin: 5px;
            position: fixed;
            transition: .5s;
            right: 14px;
            bottom: 8px;
            color: white;
            z-index: 10000;
            text-align: center;
            overflow: hidden;
            background-color:#f69314;    
            }
            #menu-down {
                    width: 100%;
                    height: 50px;
                    background-color: white;
            }
        </style>
        <div id="menu-downs" class="menu-fixed-top">
            <div style=" margin-bottom: -15px;">
                <ul class="main-menu" id="main-menus">
                    <li><a href="./index.php"><?=(@$_SESSION['lang']=='en')? 'HOME': 'ទំព័រដើម' ?></a></li>
                    <li><a href="./about.php"><?=(@$_SESSION['lang']=='en')? 'ABOUT':'អំពីយើង' ?></a></li>
                    <li><a href="./our_services.php"><?=(@$_SESSION['lang']=='en')? 'SERVICE':'សេវាក្មមផ្សេងៗ' ?></a></li>
                    <li><a href="./car_sales.php"><?=(@$_SESSION['lang']=='en')? 'CAR SALES':'រថយន្តសម្រាប់លក់' ?></a></li>    
                     <li><a href="#"><i class="fa fa-caret-down" style="font-size: 14px;"></i> <?=(@$_SESSION['lang']=='en')? 'JOB SEEKER':'ស្វែងរកការងារ' ?></a>
                        <ul class="sub-menu">
                            <li><a href="./job_seekers.php"><?=(@$_SESSION['lang']=='en')? 'JOB VACANCIES':'ការងារវិជ្ជាជីវៈ' ?></a></li>
                            <li><a href="./cv_home.php"><?=(@$_SESSION['lang']=='en')? 'CREATE CV':'បង្កើតប្រវត្តិរូប' ?></a></li>
                            
                        </ul>
                    </li>                
                    <li><a href="#"><i class="fa fa-caret-down" style="font-size: 14px;"></i><?=(@$_SESSION['lang']=='en')? 'INFO CENTER':'បណ្ដុំពត័មាន' ?></a>
                        <ul class="sub-menu">
                            <li><a href="./info_center_gallery.php"><?=(@$_SESSION['lang']=='en')? 'PHOTO GALLERIES':'រូបថតអនុស្សាវរីយ៏' ?></a></li>
                            <li><a href="./info_center_new.php"><?=(@$_SESSION['lang']=='en')? 'NEWS':'ពត័មានផ្សេងៗ' ?></a></li>
                            <li><a href="./info_center_regulation.php"><?=(@$_SESSION['lang']=='en')? 'REGULATIONS UPDATES':'ធ្វើបច្ចុប្បន្នភាពបញ្ញាតិ'?></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-caret-down" style="font-size: 14px;"></i><?=(@$_SESSION['lang']=='en')? 'EVENTS & PROMOTION':'ប្រិត្តិការណ៏ & ការផ្សព្វផ្សាយ'?></a>
                        <ul class ="sub-menu">
                            <li><a href="./our_promotion_upcoming_event.php"><?=(@$_SESSION['lang']=='en')? 'UPCOMING EVENTS':'ព្រឹត្តិការណ៍ជិតមកដល់'?></a></li>
                            <li><a href="./our_past_promotion_event.php"><?=(@$_SESSION['lang']=='en')? 'PAST EVENTS':'ព្រឹត្តិការណ៍កន្លងផុត' ?></a></li>
                            <li><a href="./our_submit_talk_promotion_event.php"><?=(@$_SESSION['lang']=='en')?'SUBMIT A TALK IDEA' :'ដាក់មតិយោបល់' ?></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-caret-down" style="font-size: 14px;"></i><?=(@$_SESSION['lang']=='en')? 'PARTNERS' : 'ដៃគូរអជីវកម្ម' ?></a>
                        <ul class="sub-menu">
                            <li><a href="./top_detail.php?id=1"><?=(@$_SESSION['lang']=='en')?'PARTNER BENEFIT': 'អត្ថប្រយោជន៏សម្រាប់ដៃគូរអជីវកម្ម'?></a></li>
                            <li><a href="./top_detail.php?id=3"><?=(@$_SESSION['lang']=='en')? 'BECOME A PARTNER': 'ចង់ក្លាយជាដៃគូរអជីវកម្ម' ?></a></li>
                        </ul>    
                    </li>
                    <li style="border: none;"><a style="border: none;" href="#"><i class="fa fa-caret-down" style="font-size: 14px;"></i> <?=(@$_SESSION['lang']=='en')? 'CUSTOMERS' : 'អតិថិជន' ?></a>
                        <ul class="sub-menu">
                            <li><a href="./top_detail.php?id=2"><?=(@$_SESSION['lang']=='en')? 'CUSTOMER BENEFIT' : 'អត្ថប្រយោជន៏សម្រាប់អតិថិជន' ?></a></li>
                            <li><a href="./top_detail.php?id=4"><?=(@$_SESSION['lang']=='en')? 'BECOME A CUSTOMER' : 'ចង់ក្លាយជាអតិថិជន' ?></a></li>
                        </ul> 
                    </li>
                </ul>
            </div>   
        </div>
        <div id="scrollToTop">
            <a href="#"><i class="fa fa-arrow-circle-o-up" style="font-size: 26px; color: white;"></i></a>
        </div>  
        <!-- Footer Scripts
        ============================================= -->
        <script>
            $(document).ready(function() {
                base_url = 'index.html';
                $('#loader').hide();
                $('#main-table-box').fadeIn();
  
            //$('.samesize').matchHeight(); //WEIRDLY NOT WORKING
		    $('.ipost').matchHeight(); 
                
                
                if ($('.magpop').length) {
                    $('.magpop').magnificPopup({
                        type: 'inline',
                        preloader: false,
                        mainClass: 'mfp-fade',
                        gallery: {
                            // options for gallery
                            enabled: true
                        },
                        modal: false
                    });
                }

                if ($('.modal-basic').length) {
                    var popup = $('.modal-basic');
                    popup.magnificPopup({
                        type: 'inline',
                        preloader: false,
                        mainClass: 'mfp-fade',
                        modal: true
                    });
                }

                if ($('.modal-image').length) {
                    var popup = $('.modal-image');
                    popup.magnificPopup({
                        type: 'image',
                        preloader: true,
                        mainClass: 'mfp-fade',
                        modal: false,
                        gallery: {
                            // options for gallery
                            enabled: true
                        }
                    });
                }

                if ($('.modal-video').length) {
                    var popup = $('.modal-video');
                    popup.magnificPopup({
                        type: 'video',
                        preloader: true,
                        mainClass: 'mfp-fade',
                        modal: false,
                        gallery: {
                            // options for gallery
                            enabled: true
                        }
                    });
                }

                if ($('.popframe').length) {
                    $('.popframe').magnificPopup({
                        type: 'iframe',
                        preloader: true,
                        mainClass: 'mfp-fade',
                        modal: false
                    });
                }

                doSubscribe = function() {

                    $.post("newsletter/subscribe.html", {email: $('#sub_email').val()})
                            .done(function(data) {
                                $('#sub_thanks').fadeIn();
                                $('#sub_form').hide();
                                // $('#subscribe_popup').html("<h3></h3>");
                            }
                            );
                }


                function validateEmail(email) {
                    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return re.test(email);
                }
                $('#site-searchform').submit(function() {
                    doSearch();
                });
                //SEaRCH
                doSearch = function() {
                    // window.location = "http://www.eurocham-cambodia.org/search/" + $('#s').val();
                };
                $('[data-toggle="popover"]').popover();


                //accordion scroll to
                $(".acctitle").click(function() {
                    var blob = $(this);
                    setTimeout(function() {
                        scrollhere(blob);
                    }, 400);
                });


                function scrollhere(destination) {
                    var stop = $(destination).offset().top - 80;
                    var delay = 1000;
                    $('body,html').animate({scrollTop: stop}, delay);

                    return false;
                }

            });
        </script>
        <script type="text/javascript" src="template/js/functions.js"></script>
        <script type="text/javascript" src="javascript/jquery.matchHeight-min.js"></script>
        <!-- finished footer container -->
       
        <script>
            $(document).ready(function() {
                // $("#menu-down").css({"display":"none","transition":".5s"});
                // show hide button when scroll
                $(window).scroll(function() {
                    if($(this).scrollTop() > 200) {
                        $("#menu-downs").css({
                            "transition" : ".5s",
                            "display" : "block",
                            "position" : "fixed",
                            "z-index" : 10000,
                            "top" : "0px",
                            "width" : "100%",
                            "background-color" : "white",
                            "box-shadow": "0px  0px 3px #f69314",
                            "padding" : "10px",
                            "margin" : "auto"
                        });
                        $("#main-menus").css({"margin-left":"120px", "background-color": "white"});
                        $("#scrollToTop").fadeIn("slow");
                    }
                    else {
                        $("#scrollToTop").fadeOut();
                        $("#menu-downs").fadeOut();
                        // $("#header-container-fixed").fadeOut("slow");
                    }
                });
                // smoth scroll to top
                $("#scrollToTop").click(function(){
                    $("html, body").animate({ scrollTop : 0 }, 1000);
                });
            });    
        </script>
</body>
<style type="text/css">
    
@media only screen and (max-width: 600px) {
  .dark {
    background-image: none !important;
  }
}
</style>
</html>