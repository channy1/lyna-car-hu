<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .img_li{width:120px !important;}
    .ol-carousel{bottom:-10px !important;right:-114px !important; left: -114px !important;}
    ol { counter-reset: item }
    li { display: block }
    .li-head:before{ content: counters(item, ".") " "; counter-increment: item ;}
    .li-head li.li-list:before { content: counters(item, ".") " "; counter-increment: item ;}
    #more {display: none;}
</style>




<!-- include header file -->
<?php
include_once ('system/config/database.php');
?>

<?php
require_once("header.php");
$id = $_GET["id"];
?>
<!--<div class="container-fluid" style="margin-top: 10px;">
    <div style="height: 10px; width: 100%">
    </div>
</div>-->
<!-- finished header file included -->
<!-- body section for partner benefit -->
<div class="container p-5">

    <h3 class="text-center mb-4" style="color: #000;">PRE-INFORMATION</h3>
    <div class="row mb-5">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5">
            <?php
            $v_sql = "SELECT * FROM tbl_pre_info WHERE pre_id='$id'";
            $result = $connect->query($v_sql);
            if ($result->num_rows > 0) {
                if($row = $result->fetch_assoc()){ ?>
                    <h4 class="text-center" style="background-color:#FF0505;color:#fff">
                        <?php
                        if(@$_SESSION['lang']=='en') {
                            echo $row["pre_title"];
                        }
                        else {
                            echo $row["pre_title_kh"];
                        }
                        ?>
                    </h4>
                <?php  
				
				$main_img=$row['pre_image'];
				}
            }
            ?>
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="system/admin/image/pre_info/<?php echo $main_img; ?>" alt="First slide">
                    </div>
                   
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
                  <li data-target="#carousel-thumb" data-slide-to="0" class="active img_li"> <img class="d-block w-100" src="system/admin/image/pre_info/<?php echo $main_img; ?>"
                      class="img-fluid"></li>
                
                </ol>
            </div>
            <!--/.Carousel Wrapper-->
        </div>



        <?php
        $v_sql = "SELECT * FROM tbl_pre_info WHERE pre_id='$id'";
        $result = $connect->query($v_sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h4 class="text-center mb-2" style="background-color:#FF0505;color:#fff">
                        <?php
                        if(@$_SESSION['lang']=='en') {
                            echo $row["pre_title"];
                        }
                        else {
                            echo $row["pre_title_kh"];
                        }
                        ?>

                    </h4>
                    <!--<span><h5 style="color:#000"><strong>Title : Why Choose Us ?</strong></h5></span>-->
                    <?php

                    if(@$_SESSION['lang']=='en') {

                       echo $row["pre_detail"];

                    }
                    else {

                         $row["pre_detail_kh"];

                    }


                    ?>

                </div>

            <?php } } ?>

    </div>










    <!--
             <div class="row mb-5">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5">
                <h4 class="text-center" style="background-color:#FF0505;color:#fff"> Car Rental With Driver</h4>
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(88).jpg" alt="First slide">
            </div>

          </div>

        </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="text-center mb-2" style="background-color:#FF0505;color:#fff"> Car Rental With Driver</h4>
                            <h6>VEHICLE RENTAL – TERMS & CONDITIONS WITH DRIVER</h6>
                            <h6>VEHICLE RENTAL – TERMS & CONDITIONS</h6>
                            <span style="color:#FF0505"> WITH DRIVER</span>

    <ol>
      <li class="li-head" style="color:#ec3323"><strong>Driver’s Working Days and Hours</strong>
        <ol>

            <li class="text-dark li-list">Working Days: Monday to Saturday, Working Hours: From 0730 to 1200 and from 1330 to 1800. The break of 1 hour and 30 minutes is for lunch.</li>
            <li class="text-dark li-list">The driver’s working hours are exceptional for the driver of the tourist travelling from one province to another. In case of driving on Sunday or any Public Holiday, the customer will have to pay extra fee of $30/day as mentioned in the vehicle rental agreement.</li>
            </ol>

            <span id="more">
            <ol>

            <li class="text-dark li-list">Working Days: Monday to Saturday, Working Hours: From 0730 to 1200 and from 1330 to 1800. The break of 1 hour and 30 minutes is for lunch.</li>
            <li class="text-dark li-list">The driver’s working hours are exceptional for the driver of the tourist travelling from one province to another. In case of driving on Sunday or any Public Holiday, the customer will have to pay extra fee of $30/day as mentioned in the vehicle rental agreement.</li>
            </ol>
            </span>
        </ol>
      </li>


      <span id="dots">...</span>
    </ol>

      <button onclick="myFunction()" id="myBtn1">Read more</button>





            </div>
            </div>
            <div class="row mb-5">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5">
                <h4 class="text-center" style="background-color:#FF0505;color:#fff"> RENT A CAR FOR A SELF-DRIVE [RISK, SAVE AND REQUIREMENT]</h4>
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(88).jpg" alt="First slide">
            </div>

          </div>

        </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="text-center mb-2" style="background-color:#FF0505;color:#fff"> RENT A CAR FOR A SELF-DRIVE [RISK, SAVE AND REQUIREMENT]</h4>


    <ol>
      <li class="li-head" style="color:#ec3323"><strong>FOREIGN CUSTOMERS WITH THEIR CAMBODIAN OR INTERNATIONAL DRIVER'S LICENSES</strong>
       <p class="text-dark">In this case, the customers must present their Driver’s Licenses as a proof to our Lyna-CarRental front-desk on the arrival.</p>


            </li>
            <li class="li-head" style="color:#ec3323"><strong>CONDITIONS IMPOSED TO THE CUTOMERS WHEN HIRING A CAR FOR A SELF-DRIVE</strong>
       <p class="text-dark">The customers need to leave their valid passport with the valid entry business visa at the Lyna-CarRental’s office in exchange of taking out the rented car for securing our car in case it will be lost during the renting period. This is required by the insurance company.</p>


            </li
            </ol>

            <span id="more">

            </span>



      <span id="dots">...</span>
    </ol>

      <button onclick="myFunction()" id="myBtn1">Read more</button>





            </div>
            </div>
                    <div class="row mb-5">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5">
                <h4 class="text-center" style="background-color:#FF0505;color:#fff"> Driver Activities</h4>
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(88).jpg" alt="First slide">
            </div>

          </div>

        </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="text-center mb-2" style="background-color:#FF0505;color:#fff"> Driver Activities</h4>


    <p>28 February 2017, Kampong Cham Province . . . Lyna-CarRental.Com is the first supplier of supplying the fleets of Vehicles Rental with and English speaking drivers for the sub-contract agreement of Metro Global Services Pte Ltd., from Singapore to do the Signal Survey Project for NOKIA (Cambodia) Co., Ltd. on 3-monthagreements to cover all around the 25 provinces and municipalities in the Kingdom of Cambodia.</p>
    <span id="dots">...</span>
    <button onclick="myFunction()" id="myBtn1">Read more</button>





            </div>
            </div>

                            <div class="row mb-5">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5">
                <h4 class="text-center" style="background-color:#FF0505;color:#fff"> Customer Activities</h4>
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(88).jpg" alt="First slide">
            </div>

          </div>

        </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="text-center mb-2" style="background-color:#FF0505;color:#fff">Customer Activities</h4>


    <p>28 February 2017, Kampong Cham Province . . . Lyna-CarRental.Com is the first supplier of supplying the fleets of Vehicles Rental with and English speaking drivers for the sub-contract agreement of Metro Global Services Pte Ltd., from Singapore to do the Signal Survey Project for NOKIA (Cambodia) Co., Ltd. on 3-monthagreements to cover all around the 25 provinces and municipalities in the Kingdom of Cambodia.</p>
     <span id="dots">...</span>
    <button onclick="myFunction()" id="myBtn1">Read more</button>





            </div>
            </div>
                                    <div class="row mb-5">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-5">
                <h4 class="text-center" style="background-color:#FF0505;color:#fff">More Information </h4>
                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(88).jpg" alt="First slide">
            </div>

          </div>

        </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="text-center mb-2" style="background-color:#FF0505;color:#fff">More Information</h4>







            </div>
            </div>-->


</div>


</div>


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

<!-- finished section for partner benefit -->
<!-- include footer file  -->
<?php require_once("footer.php"); ?>
