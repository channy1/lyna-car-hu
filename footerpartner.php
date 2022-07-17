<style>

    .footer-post-text a{color:#aaaeb1 !important;}
    /*.counter-div{margin-top:120px;}*/
    .video-box .play-now{top:43% !important;}
    @media only screen and (max-width: 420px) and (min-width: 320px) {
        .latest-news{margin-top:80px !important;}
        .video-box .play-now{top:79% !important;}

    }
    @media only screen and (max-width: 991px) and (min-width: 768px) {
        .video-box .play-now {top: 69% !important;left: 47%;}
    }
    @media only screen and (max-width: 767px) and (min-width: 420px) {
        .video-box .play-now {top: 71% !important;left: 50%;}

    }


</style>

<!-- Footer Area Start -->
<footer class="gauto-footer-area">
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-footer">
                        <div class="footer-logo">
                            <a href="index.php">
                                <img src="assets/img/footer-logo.png" alt="footer-logo" />
                            </a>
                        </div>
                        <p>sed do eiusmod tempor incididunt ut labore et dolore magna as aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                        <div class="footer-address">
                            <h3>Head office</h3>
                            <p>Level 1, Room Grace Trading Co., Ltd. Logo Boeng Trabek Plaza</p>
                            <ul>
                                <li>Phone: +855 (0) 12 55 42 47 </li>
                                <li>Email: info@lyna-carrental.com</li>

                            </ul>
                        </div>
                    </div>
                    <div class="single-footer mt-4">
                        <h3>Add Your Comments</h3>
                        <p class="footer-post-text"><a href="guestbook.php">Add Your Comments Here <i class="fa fa-commenting-o" aria-hidden="true"></i></a></p>

                        <br/><br/>

                        <h3>Recent post</h3>
                        <ul>
                            <?php
                            $v_sql = "SELECT * FROM tbl_info_center where type=1  ORDER BY info_center_id DESC limit 3";

                            $result = $connect->query($v_sql);



                            if ($result->num_rows > 0) {

                                while($row = $result->fetch_assoc()){  ?>

                                    <li>
                                        <div class="single-footer-post">
                                            <div class="footer-post-image">
                                                <a href="info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>">
                                                    <img src="system/admin/image/info_center/<?php echo $row["images"]; ?>" />
                                                </a>
                                            </div>
                                            <div class="footer-post-text">
                                                <h3>
                                                    <a href="info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>">
                                                        <?php echo $row["title"]; ?>
                                                    </a>
                                                </h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php } } ?>


                            <!--  <li>
                                  <div class="single-footer-post">
                                      <div class="footer-post-image">
                                          <a href="#">
                                              <img src="assets/img/post-thumb-2.jpg" alt="footer post" />
                                          </a>
                                      </div>
                                      <div class="footer-post-text">
                                          <h3>
                                              <a href="#">
                                                  Revealed: How to set goals for you and your team
                                              </a>
                                          </h3>
                                          <p>Posted on: Jan 12, 2020</p>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="single-footer-post">
                                      <div class="footer-post-image">
                                          <a href="#">
                                              <img src="assets/img/post-thumb-1.jpg" alt="footer post" />
                                          </a>
                                      </div>
                                      <div class="footer-post-text">
                                          <h3>
                                              <a href="#">
                                                  apartment in the sky love three boys of his own.
                                              </a>
                                          </h3>
                                          <p>Posted on: Jan 12, 2020</p>
                                      </div>
                                  </div>
                              </li>-->
                        </ul>




                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-footer quick_links">
                        <h3>Quick Links</h3>
                        <ul class="quick-links">
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="our_services.php">Our Services</a></li>
                            <li><a href="car_sales.php">Car Sales</a></li>
                            <li><a href="job_seekers.php">Job Seekers</a></li>
                            <li><a href="our_promotion_upcoming_event.php">Events</a></li>
                            <li><a href="#">Promotions</a></li>
                        </ul>
                        <ul class="quick-links">
                            <li><a href="guestbook.php">Testimonials</a></li>
                            <li><a href="detailt_footer_status.php?id=3">Privacy Policy</a></li>
                            <li><a href="detailt_footer_status.php?id=2">Terms Of Use</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="faqs.php">FAQs</a></li>


                        </ul>
                    </div>
                    <div class="single-footer newsletter_box">

                        <h3>Newsletter</h3>

                        <span Style="color:white; font-weight:bold" id="sub_message"></span>
                        <form id="subform">
                            <input type="text" name="fname" id="fname"  placeholder="First Name"  required/>
                            <input type="text" name="lname" id="lname" placeholder="Last Name" required/>
                            <input type="text" name="phone" id="phone" placeholder="Phone" required/>
                            <input type="email" name="sub_email" id="sub_email" placeholder="E-mail Address" required />
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                        </form>
                        <br/><br/><br/><br/><br/><br/>

                        <h3>Visitor Coutner</h3>
                        <p class="footer-post-text">
                            <a href="https://info.flagcounter.com/jJtt"><img src="https://s04.flagcounter.com/count2/jJtt/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_30/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
                        </p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-footer pt-5 pt-lg-0 mt-5 mt-lg-0">
                        <h3><?=(@$_SESSION['lang']=='en')?'Latest News':'ពត៌មានថ្មីៗ'; ?></h3>
                        <ul>
                            <?php

                            $v_sql = "SELECT * FROM tbl_info_center where type=0  ORDER BY info_center_id DESC limit 3";

                            $result = $connect->query($v_sql);

                            if ($result->num_rows > 0) {

                                while($row = $result->fetch_assoc()){

                                    if($row['event_type']==2){

                                        if(@$_SESSION['lang']=='en') { ?>


                                            <li>
                                                <div class="single-footer-post">
                                                    <!--<div class="footer-post-image">
                                                        <a href="#">
                                                            <img src="assets/img/post-thumb-3.jpg" alt="footer post" />
                                                        </a>
                                                    </div>-->
                                                    <div class="footer-post-text">

                                                        <a href='info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>&type=<?php echo $row["event_type"]; ?>'>
                                                            <?php echo $row["title"]; ?>
                                                        </a>

                                                        <!-- <p>Posted on: Jan 12, 2020</p>-->
                                                    </div>
                                                </div>
                                            </li>


                                        <?php   }

                                        else { ?>

                                            <li>
                                                <div class="single-footer-post">
                                                    <!--<div class="footer-post-image">
                                                        <a href="#">
                                                            <img src="assets/img/post-thumb-3.jpg" alt="footer post" />
                                                        </a>
                                                    </div>-->
                                                    <div class="footer-post-text">

                                                        <a href='info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>&type=<?php echo $row["event_type"]; ?>'>
                                                            <?php echo $row["title_kh"]; ?>
                                                        </a>

                                                        <!-- <p>Posted on: Jan 12, 2020</p>-->
                                                    </div>
                                                </div>
                                            </li>


                                        <?php  }



                                    }

                                    else if($row['event_type']==1){



                                        if(@$_SESSION['lang']=='en') { ?>

                                            <li>
                                                <div class="single-footer-post">
                                                    <!--<div class="footer-post-image">
                                                        <a href="#">
                                                            <img src="assets/img/post-thumb-3.jpg" alt="footer post" />
                                                        </a>
                                                    </div>-->
                                                    <div class="footer-post-text">

                                                        <a href='info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>&type=<?php echo $row["event_type"]; ?>'>
                                                            <?php echo $row["title"]; ?>
                                                        </a>

                                                        <!-- <p>Posted on: Jan 12, 2020</p>-->
                                                    </div>
                                                </div>
                                            </li>


                                        <?php }

                                        else { ?>

                                            <li>
                                                <div class="single-footer-post">
                                                    <!--<div class="footer-post-image">
                                                        <a href="#">
                                                            <img src="assets/img/post-thumb-3.jpg" alt="footer post" />
                                                        </a>
                                                    </div>-->
                                                    <div class="footer-post-text">

                                                        <a href='info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>&type=<?php echo $row["event_type"]; ?>'>
                                                            <?php echo $row["title_kh"]; ?>
                                                        </a>

                                                        <!-- <p>Posted on: Jan 12, 2020</p>-->
                                                    </div>
                                                </div>
                                            </li>


                                        <?php  }



                                    }

                                    else{



                                        if(@$_SESSION['lang']=='en') { ?>

                                            <li>
                                                <div class="single-footer-post">
                                                    <!--<div class="footer-post-image">
                                                        <a href="#">
                                                            <img src="assets/img/post-thumb-3.jpg" alt="footer post" />
                                                        </a>
                                                    </div>-->
                                                    <div class="footer-post-text">

                                                        <a href='info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>&type=<?php echo $row["event_type"]; ?>'>
                                                            <?php echo $row["title"]; ?>
                                                        </a>

                                                        <!-- <p>Posted on: Jan 12, 2020</p>-->
                                                    </div>
                                                </div>
                                            </li>


                                        <?php  }

                                        else { ?>

                                            <li>
                                                <div class="single-footer-post">
                                                    <!--<div class="footer-post-image">
                                                        <a href="#">
                                                            <img src="assets/img/post-thumb-3.jpg" alt="footer post" />
                                                        </a>
                                                    </div>-->
                                                    <div class="footer-post-text">

                                                        <a href='info_center_new_detail.php?id=<?php echo $row["info_center_id"]; ?>&type=<?php echo $row["event_type"]; ?>'>
                                                            <?php echo $row["title_kh"]; ?>
                                                        </a>

                                                        <!-- <p>Posted on: Jan 12, 2020</p>-->
                                                    </div>
                                                </div>
                                            </li>


                                        <?php  }



                                    }



                                }

                            }

                            else {

                            }

                            ?>
                        </ul>






                        <!--  <ul>
                              <li>
                                  <div class="single-footer-post">
                                      <div class="footer-post-image">
                                          <a href="#">
                                              <img src="assets/img/post-thumb-3.jpg" alt="footer post" />
                                          </a>
                                      </div>
                                      <div class="footer-post-text">
                                          <h3>
                                              <a href="#">
                                                  Revealed: How to set goals for you and your team
                                              </a>
                                          </h3>
                                          <p>Posted on: Jan 12, 2020</p>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="single-footer-post">
                                      <div class="footer-post-image">
                                          <a href="#">
                                              <img src="assets/img/post-thumb-2.jpg" alt="footer post" />
                                          </a>
                                      </div>
                                      <div class="footer-post-text">
                                          <h3>
                                              <a href="#">
                                                  Revealed: How to set goals for you and your team
                                              </a>
                                          </h3>
                                          <p>Posted on: Jan 12, 2020</p>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <div class="single-footer-post">
                                      <div class="footer-post-image">
                                          <a href="#">
                                              <img src="assets/img/post-thumb-1.jpg" alt="footer post" />
                                          </a>
                                      </div>
                                      <div class="footer-post-text">
                                          <h3>
                                              <a href="#">
                                                  apartment in the sky love three boys of his own.
                                              </a>
                                          </h3>
                                          <p>Posted on: Jan 12, 2020</p>
                                      </div>
                                  </div>
                              </li>
                          </ul>-->
                    </div>
                    <div class="single-footer">
                        <h3>Specification</h3>
                        <div class="inner-column">
                            <div class="video-box wow fadeIn">
                                <figure class="image"><img src="assets/img/blog-3.jpg" alt=""></figure>
                                <a href="https://www.youtube.com/embed/s0hVpqm50_E" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- another row for footer-->
            <Br/>
            <div class="row">
                <!--<div class="col-lg-4">-->
                <!--    <div class="single-footer">-->
                <!--        <h3>Add Your Comments</h3>-->
                <!--        <p class="footer-post-text"><a href="guestbook.php">Add Your Comments Here <i class="fa fa-commenting-o" aria-hidden="true"></i></a></p>-->

                <!--    </div>-->

                <!--</div>-->

                <!--  <div class="col-lg-4"></div>

                  <div class="col-lg-4">
                      <div class="siVisitor Counterngle-footer quick_links">

                      </div>

                  </div>-->
                <!--<div class="col-lg-4">-->
                <!--    <div class="single-footer">-->
                <!--        <h3>Specification</h3>-->
                <!--        <div class="inner-column">-->
                <!--    <div class="video-box wow fadeIn">-->
                <!--        <figure class="image"><img src="assets/img/blog-3.jpg" alt=""></figure>-->
                <!--        <a href="https://www.youtube.com/embed/s0hVpqm50_E" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>-->
                <!--    </div>-->
                <!--</div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>

            <!-- another row for footer end here-->






        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <?php
                          $query="SELECT * FROM tbl_website_info WHERE id='5'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $section_name = $row["section_name"];
            $section_data = $row["section_data"];
            
        }
    }
    ?>

                        <p><?php echo $section_data;?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-social">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->


<!--Jquery js-->
<script src="assets/js/jquery.min.js"></script>
<!-- Popper JS -->
<script src="assets/js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--Owl-Carousel js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--Lightgallery js-->
<script src="assets/js/lightgallery-all.js"></script>
<script src="assets/js/custom_lightgallery.js"></script>
<!--Slicknav js-->
<script src="assets/js/jquery.slicknav.min.js"></script>
<!--Magnific js-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--Nice Select js-->
<script src="assets/js/jquery.nice-select.min.js"></script>
<!-- Datepicker JS -->
<script src="assets/js/jquery.datepicker.min.js"></script>
<!--ClockPicker JS-->
<script src="assets/js/jquery-clockpicker.min.js"></script>
<!--Main js-->
<script src="assets/js/main.js"></script>

<!--fancybox js-->
<script src="assets/js/jquery.fancybox.js"></script>


<script>

    $(document).ready(function() {
        $('#subform').on('submit', function(e){

            e.preventDefault();

            var data=$("#subform").serialize();
            $.ajax({
                url: "send_email.php",
                type: "post",
                data: data ,
                success: function (response) {
                    $('#sub_email').val("");
                    $('#fname').val("");
                    $('#lname').val("");
                    $('#phone').val("");
                    $('#sub_message').text("Thank you");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });


        });
    });
</script>
</body>

</html>
