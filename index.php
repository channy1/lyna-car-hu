<!DOCTYPE html>
<html lang="en-US">
<style>
    body{font-style: normal !important;font-family: "Rubik", sans-serif !important;}
        .red_color{color:red;}
        .single-testimonial{padding:0px !important;}
        .load-more {margin-bottom: 10px !important;margin-top: 7px}
        table.table.table_div th{ text-align:center; }
       table.table.table_div tr:nth-child(even) {font-style:italic;}
        table.table.table_div tr td:first-child{text-indent:10px;}
        table.table.table_div tr td span{font-weight:bold;color:#1548CE;}
        table.table.table_div tr td:last-child{text-indent:145px;}
       table.table.table_div tr td{padding:0px !important;color:#000;}
        table.table.table_div{margin-bottom:-10px !important; text-align:center;}
        .single-testimonial .testimonial-text img{width: 100% !important;height:auto;}
        .testimonial-meta{margin-top:0px !important;}
        .testi_p{padding:10px;}
        .gauto-testimonial-area .single-testimonial .testimonial-text img{max-width: 200px !important;display: block;margin: 0 auto;}
    /*.gauto-testimonial-area2 .single-testimonial .testimonial-text img{max-width:100% !important;}*/
    .gauto-testimonial-area2 .testimonial-meta{margin-top:20px !important;}
    .gauto-testimonial-area.city_sec .single-testimonial .testimonial-text img{max-width:100% !important;}
    input.form-control.pickup_input{padding:10px !important;}
    input.form-control.return_input,.find-form p input{padding: 5px !important;}
   
    .tab_container h2,.tab_container p.red-p {
    color: #fff !important;
}
.city-zoom{margin-top:30px !important;}
.white-span{color:#fff !important;}
.m-top-0{margin-top:0 !important;}
.checkbox label {font-weight:100 !important;}
.form-control:focus{height:42px !important;}
input[type="checkbox"] {
    MARGIN-RIGHT: 10PX;
}
/*form-new-css*/
.m-bottom-0{margin-bottom:0 !important;}
.col-container {
  display: flex!important;
  width: 100%;
}
input#datepicker {
    color: #7c8a97 !important;
}
.form-textarea{padding:5px !important;font-weight:normal;color:#7c8a97 !important;width: 100% !important;}
.find-form p input{color: #7c8a97 !important;}
.find-box {
    background:url(../img/find-box-bg.png) no-repeat scroll 0 0; !important;
    padding:20px 15px 0px 15px !important;
    z-index: 999;
    background-color:#ec4133 !important;
    box-shadow: 0px 0px 5px 0px #ec4133;
}
.find-form .nice-select{padding:5px !important; line-height:33px !important;color: #7c8a97;}
span.normal-font {
    font-weight: 400 !important;
}
.find-form label{color:#fff !important; font-weight:bold !important;}
button.gauto-theme-btn{background:yellow !important;color:#ec4133 !important;}
.tab_container{width:100% !important;background:#ec4133 !important; left:-15px !important;}
ul.tabs{min-height:auto !important;width:100% !important;}
@media screen and (max-width: 991px) and (min-width: 845px) {
   .find-box{right: 15%;
    width: 888px;padding:0;}
    ul.tabs{right: 30px;
    padding: 16px !important;}
    .tab_container{left: 0 !important;
    width: 620px !important;}
    .nice-select {
    padding-left: 9px !important;
}
input#amount_book {
    padding: 6px !important;
}
    }
    @media screen and (max-width: 845px) and (min-width: 815px) {
   .find-box {
    right: 10%;
    width: 815px;padding:0;}
    ul.tabs{right: 29px;
    padding: 0 !important;}
    .tab_container{left: 0 !important;
    width: 653px !important;}
    .nice-select {
    padding-left: 5px !important;
}
input#amount_book {
    padding: 4px !important;
}
ul.tabs li{padding: 3px 9px !important;}
.tab_container{font-size: 13px;}
    }
  @media screen and (max-width: 815px) and (min-width: 780px) {
   .find-box {
    right: 10%;
    width: 815px;padding:0;}
    ul.tabs{right: 29px;
    padding: 0 !important;}
    .tab_container{left: 0 !important;
    width: 653px !important;}
    .nice-select {
    padding-left: 5px !important;
}
input#amount_book {
    padding: 4px !important;
}
ul.tabs li{padding: 3px 9px !important;}
.tab_container{font-size: 13px;}
    }
@media (max-width: 781px){
.find-box {
	display:none !important;
}

.find-box {
	margin-top:50px !important;
}
}
@media screen and (max-width: 780px) and (min-width: 320px) { 
 
.tab_container{left: 0px !important;;}
    h3.tab_drawer_heading{font-size:14px ;font-weight:400;}
    
    

}
table.table.table_div tr td {
    font-size: 12px;
    text-align: left;
}
    
}#search_content{	position: absolute;    width: 354px;    background: white;	padding: 15px;    color: black;    z-index: 999;    }
    </style>

<?php include 'header.php'; ?>
<?php
    $open="";
    $open=@$connect->real_escape_string($_GET['open']);
    if($open=="") {
        $open="";
    }else{
        $open=$_GET['open'];
    }
?> 

    <!-- Slider Area Start -->
    <section class="gauto-slider-area fix" style="height:450px">
        <div class="gauto-slide owl-carousel" >
            <?php
				$v_sql = "SELECT * FROM tbl_promotion ";
				$result = $connect->query($v_sql);
            ?>

            <?php
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>
            <div class="gauto-main-slide slide-item-1"  style="background: url(<?php echo "system/admin/image/promotion/".$row["images"]; ?>);background-size:cover;">
                <div class="gauto-main-caption">
                    <div class="gauto-caption-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slider-text">
                                       <h2> <?php echo $row["promotion"]; ?></h2>
                                        <a href="<?php echo $row["redirect_url"]; ?>" class="gauto-btn">Reserve Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php } } ?>



            <!--<div class="gauto-main-slide slide-item-2" style="background: url(assets/img/slider-2.jpg);background-size:cover;">
                <div class="gauto-main-caption">
                    <div class="gauto-caption-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slider-text">
                                        <p>for rent $50 per day</p>
                                        <h2>Reserved Now & Get <span>40% Off</span></h2>
                                         <a href="#" class="gauto-btn">Reserve Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </section>
    <!-- Slider Area End -->


    <!-- Find Area Start -->
    <section class="gauto-find-area">
        <div class="container">
            <div class="row">                
                <div class=" col-lg-4 col-md-12 col-sm-12 find-box  ">                    
					<div class="tabs_wrapper">
						<ul class="tabs">
							<li class="" rel=""><h3 style="font-size:24px">BOOKING SERVICES</h3></li>
							<li class="active" rel="tab1"><i class="fa fa-car"></i>CAR RENTAL</li>
							<!--<li rel="tab2"><i class="fa fa-subway"></i>RICKSHAW RENTAL</li>-->
							<li rel="tab3"><i class="fa fa-fax"></i>ACCESSORIES RENTAL </li>
							<li rel="tab4"><i class="fa fa-building"></i>CITY TOUR (COUNTRYWIDE)</li>
							<li rel="tab5"><i class="fa fa-hotel"></i>HOTEL & GUESTHOUSE</li>
							<li rel="tab6"><i class="fa fa-location-arrow"></i>PICKUP & DROP-OFF</li>
							<li rel="tab7"><i class="fa fa-plane"></i>AIRPORT TRANSFER</li>
							<li rel="tab8"><i class="fa fa-user-circle"></i>TOUR GUIDE RENTAL</li>
							<li rel="tab9"><i class="fa fa-user"></i>DRIVER RENTAL</li>
							<li rel="tab10"><i class="fa fa-signal"></i>ONLINE PAYMENT</li>
						</ul>
					</div>                  
                </div>                
                <div class="col-lg-8 col-md-12 col-sm-12 ">
					<div class="tab_container">
						<h3 class="d_active tab_drawer_heading" rel="tab1">CAR RENTAL</h3>
						<div id="tab1" class="tab_content">
							<h2><?= (@$_SESSION['lang']=='en')?'CAR RENTAL BOOKING' : 'សៀវភៅជួលឡាន'; ?></h2>
							<p class="red-p">
								<?=(@$_SESSION['lang']=='en')?
									'Search for Cheap Rental Cars for Self-drive, Tour Guide, Driver and Accessories Rental':
									'សូមស្វែងរករថយន្តជួលបើកបរដោយខ្លួនឯង ជួលមគ្គុទេស ជួលអ្នកបើកបរ និងសម្ភារះសំរាប់ធ្វើដំណើរ';
								?>
							</p>
							<div class="find-form"> 
								<form action="car_rent_booking.php" method="POST">
									<div class="row">
										<div class="col-md-6 col-sm-12">
											<p>
												<label><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងទៅយករថយន្ត';?></label>
												<!--<input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>-->
												<select name="pickupfrom_carrent" class="selectpicker form-control input-sm" id="pickupfrom_carrent" data-show-subtext="true" data-live-search="true">
													<option data-subtext="" value="">SELECT PICKUP LOCATION</option>
												   <?php
														$v_sql = "SELECT * FROM tbl_carrental_pickup_price LEFT JOIN tbl_province 
														ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_from_id
														GROUP BY pro_from_id ORDER BY air_id";
														$result = $connect->query($v_sql);
														if ($result->num_rows > 0){
															while($row = $result->fetch_assoc()){
													?>
														<option data-subtext="" value="<?php echo $row['air_id']; ?>"><?php echo $row['pv_title']; ?></option>
													<?php } } ?>
												</select>
											</p>											
											<p>
												<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>
												<!--<input name="pickup_map_carental" type="text" placeholder="Copy & Paste Pickup Location Map">-->
												<input type="hidden" name="pickupaddress">
												<input type="text" name="pickup_map_carental" placeholder="Copy & Paste Pickup Location Map"  autocomplete="off" class="form-control">
											</p>
											<div class="row">
												<div class="col-lg-6 col-md-12 col-sm-12">
													<p class="m-top-0">
														<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Date':'កាលបរិច្ឆេទជ្រើសរើសយក:';?></span>
														<input id="datepicker" name="car_rent_pickupdate" placeholder="DD-MM-YYYY" data-select="datepicker" type="text">
													</p>
												</div>
												<div class="col-lg-6 col-md-12 col-sm-12">
													<p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
														<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Time':'ពេលវេលាជ្រើសរើសក:';?></span>
														<input id="dropoffdate" type="text" name="car_rent_pickupdate_time" class="form-control pickup_input" placeholder="HH:MM:SS" />
													</p>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-12">							
											<p>
												<label><?=(@$_SESSION['lang']=='en')?'Return Location':'ទីតាំងទៅយករថយន្ត';?></label>
												<!--<input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>-->
												<div id="txt_return_carrental">
													<select name="return_location_carental" class="selectpicker form-control input-sm" id="dropoffto" data-show-subtext="true" data-live-search="true">
														<option  data-subtext="" value=''>SELECT RETURN LOCATION</option>
													</select>
												</div>	
											</p>											
											<p>
												<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Return':'ស៊ៀផែនទី Google:';?></span>
												<input type="text" name="car_rental_return_map" placeholder="Copy & Paste Return Location Map">
											</p>
											<div class="row">
												<div class="col-lg-6 col-md-12 col-sm-12">
													<p class="m-top-0">
													<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
													<input id="dropoffdate" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text">
													</p>
												</div>
												<div class="col-lg-6 col-md-12 col-sm-12">
													<p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
														<span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>
														<input id="dropofftime" type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" />
													</p>
												</div>
											</div>											
										</div>
										<div class="col-md-6">
											<p>
												<label>
													<?=(@$_SESSION['lang']=='en')? 'Return Location Details (Besides Pickup Location)': 'ត្រលប់មកវិញនូវព័ត៌មានលម្អិតអំពីទីតាំង (ក្រៅពីទីតាំងជ្រើសរើសថយន្ត)';?>
												</label>
												<textarea class="form-textarea" name="car_comment" class="form-control" rows="3" cols="4" id="comment"></textarea>
											</p>
										</div>
										<div class="col-md-6">
												<!--<p>SELECT ONE OR MORE OF THESE SERVICES</p>-->
							<p class="white-span"><?=(@$_SESSION['lang']=='en')?'SELECT ONE OR MORE OF THESE SERVICES':' ជ្រើសរើសមួយឬច្រើននៃសេវាកម្មទាំងនេះ ';?></p>
												<div class="row">
												   <div class="col-md-6">
												   <div class="checkbox">
												  <label><input type="checkbox" value="">
												  <?=(@$_SESSION['lang']=='en')?'TOUR GUIDE':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
												  </label>
												</div> 
												</div>
												<div class="col-md-6">
												   <div class="checkbox">
												  <label><input type="checkbox" value="">
												<?=(@$_SESSION['lang']=='en')?'DRIVER':'អ្នកបើកបរ';?>

												  </label>
												</div> 
												</div>
												 <div class="col-md-6">
												   <div class="checkbox">
												  <label><input type="checkbox" value="">
												<?=(@$_SESSION['lang']=='en')?'ACCESSORIES':'គ្រឿងបន្លាស់';?></label>
												</div> 
												</div>
												 <div class="col-md-6">
												   <div class="checkbox">
												  <label><input type="checkbox" value="">SELF-DRIVE</label>
												</div> 
												</div>
												</div>
												
										</div>


										<div class="col-md-12">
											<p>
												<button name="btn_car_rent" type="submit" class="gauto-theme-btn">Find Car</button>
											</p>
										</div>
									</div>

								</form>
							</div>
						</div>

                                <!-- #tab2 -->
                                <h3 class="tab_drawer_heading" rel="tab3">ACCESSORIES RENTAL</h3>
                                <div id="tab3" class="tab_content">
                                    <h2><?=(@$_SESSION['lang']=='en')?'ACCESSORIES RENTAL BOOKING':'ជួលផ្នែកឩបករផ្សេងៗ'; ?></h2>
                                    <p class="red-p"><?=(@$_SESSION['lang']=='en')?
                                            'Search for Baby Car Seat, Baby Stroller, GPS Navigator, Cell Phone, Power Bank, SIM Card & CAM Car DVR Rental and so on . . .':
                                            'សូមស្វែងរករថយន្តជួលបើកបរដោយខ្លួនឯង ជួលមគ្គុទេស ជួលអ្នកបើកបរ និងសម្ភារះសំរាប់ធ្វើដំណើរ';?></p>


                                    <div class="find-form">
                                        <form action="acc_booking.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងទៅយករថយន្ត';?></label>
                                                    <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                   
                                                    <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Pickup Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p class="m-top-0">
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Date':'កាលបរិច្ឆេទជ្រើសរើសយក:';?></span>

                                                                <input id="reservation_date" name="car_rent_pickupdate" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Time':'ពេលវេលាជ្រើសរើសក:';?></span>
       
                                                 <input type="text" name="car_rent_pickupdate_time" class="form-control pickup_input" placeholder="HH:MM:SS" />
                                                 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <p >
                                                        <label><?=(@$_SESSION['lang']=='en')?'Return Location':'ទីតាំងប្រគល់រថយន្តវិញ';?></label>
                                                        <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                            
                                                    </p>
                                                   
                                                   <p>
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Return':'ស៊ៀផែនទី Google:';?></span>

                                                        <input type="text" name="car_rental_return_map" placeholder="Copy & Paste Return Location Map">
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-6">
                                                    <p>
                                                        <label>
                                                            <?=(@$_SESSION['lang']=='en')? 'Return Location Details (Besides Pickup Location)': 'ត្រលប់មកវិញនូវព័ត៌មានលម្អិតអំពីទីតាំង (ក្រៅពីទីតាំងជ្រើសរើសថយន្ត)';?>
                                                        </label>
                                                        <textarea class="form-textarea" name="car_comment" class="form-control" rows="3" id="comment"></textarea>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                        <!--<p>SELECT ONE OR MORE OF THESE SERVICES</p>-->
                                    <p class="white-span"><?=(@$_SESSION['lang']=='en')?'SELECT ONE OR MORE OF THESE SERVICES':' ជ្រើសរើសមួយឬច្រើននៃសេវាកម្មទាំងនេះ ';?></p>
                                                        <div class="row">
                                                           <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                          <?=(@$_SESSION['lang']=='en')?'TOUR GUIDE':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                        <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                        <?=(@$_SESSION['lang']=='en')?'DRIVER':'អ្នកបើកបរ';?>

                                                          </label>
                                                        </div> 
                                                        </div>
                                                         <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                        <?=(@$_SESSION['lang']=='en')?'ACCESSORIES':'គ្រឿងបន្លាស់';?></label>
                                                        </div> 
                                                        </div>
                                                         <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">SELF-DRIVE</label>
                                                        </div> 
                                                        </div>
                                                        </div>
                                                        
                                                </div>


                                                <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Find Accessories</button>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>
                                    </div>





                                </div>
                                <!-- #tab3 -->
                                <h3 class="tab_drawer_heading" rel="tab4">CITY TOUR (COUNTRYWIDE)</h3>
                                <div id="tab4" class="tab_content">
                                    <h2><?=(@$_SESSION['lang']=='en')?'CITY TOUR (COUNTRYWIDE)':'ផ្នែកសេវាកម្មទស្សនាចរណ៏ក្នុងខេត្ត/ក្រុង';?></h2>
                                   <p class="red-p"><?=(@$_SESSION['lang']=='en')?
                                           'Search for City Tour and Tour Guide Rental Services (Countrywide)':
                                           'សូមស្វែងរករម្មណីយដ្ធាន និង ជួលមគ្គុទេសចរណ៏ (ទូទាំងប្រទេស)';?> </p>


                                    <div class="find-form">
                                        <form action="city_booking.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងទៅយករថយន្ត';?></label>
                                                    <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                   <p>
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងជ្រើសរើស';?></span>

                                                        <input type="text" name="car_rental_return_map" placeholder="HOME | HOTEL | SCHOOL | RESTAURANT ETC">
                                                    </p>
                                                    <p>
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input type="text" name="car_rental_return_map" placeholder="Copy & Paste Pickup Location Map">
                                                    </p>
                                                    <p>
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Location':'ទីតាំងជ្រើសរើស';?></span>

                                                        <input type="text" name="car_rental_return_map" placeholder="HOME | HOTEL | SCHOOL | RESTAURANT ETC">
                                                    </p>
                                                    <p>
                                                    <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Return':'ស៊ៀផែនទី Google:';?></span>

                                                        <input type="text" name="car_rental_return_map" placeholder="Copy & Paste Return Location Map">
                                                    </p>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                        
                                                    </div>                                                    
                                                        <div class="row" style="margin-top:-5px">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                    </div>                                                   

                                                    
                                                
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <label>Select Vehicle Type:</label>
                <select class="form-control">
                    <option data-display="Vehicle Type">Select Vehicle Type</option>

                    <option>CAR</option>
                    <option>BUS</option>
                    <option>VAN</option>
                    <option>PICKUP</option>
                    <option>RICKSHAW</option>

                </select>
            </div>
        </div>
        
    </div>

    
      <div class="col-md-12">
                        <p class="white-span">SELECT ONE OR MORE OF THESE SERVICES</p>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="checkbox">
                            <label><input type="checkbox" value="">
                            <?=(@$_SESSION['lang']=='en')?'TOUR GUIDE':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                            </label>
                        </div> 
                        </div>
                        
                            <div class="col-md-6">
                            <div class="checkbox">
                            <label><input type="checkbox" value="">
                        <?=(@$_SESSION['lang']=='en')?'ACCESSORIES':'គ្រឿងបន្លាស់';?></label>
                        </div> 
                        </div>
                            
                        </div>
                        
                </div>

                                  
                                            
                                              

                                                </div>

                                                


                                                <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Find City</button>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>
                                    </div>



                                </div>
                                <!-- #tab4 -->
                                <h3 class="tab_drawer_heading" rel="tab5">HOTEL & GUESTHOUSE</h3>
                                <div id="tab5" class="tab_content">
                                    <h2><?=(@$_SESSION['lang']=='en')?'HOTEL & GUESTHOUSE BOOKING':'ផ្នែកសេវាកម្មកក់សណ្ធារគារ ផ្ទះសំណាក់'; ?></h2>
                                    <p class="red-p"><?=(@$_SESSION['lang']=='en')?
                                            'Search for Hotel & Guesthouse (Countrywide)':
                                            'សូមស្វែងរកសណ្ធារគារ ផ្ទះសំណាក់(ទូទាំងប្រទេស)';?> </p>


                                    <div class="find-form">
                                            <form action="hotel_booking.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Pickup Location':'ទីតាំងទៅយករថយន្ត';?></label>
                                            <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                   
                                                 <p>
                                                        <span class="white-span"><strong><?=(@$_SESSION['lang']=='en')?'Rooms Facilities':''?>;</strong></span>

                                                        <div class="row">

                                                           <div class="col-md-12">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Cool & Hot Water':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-12">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Air Conditioning Room':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Fridge':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Wifi':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'Fan':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                            <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="" ><span class="normal-font">                                                          
                                                          <?=(@$_SESSION['lang']=='en')?'TV':'ម​គ្គុ​ទេស​ក៍​ទេសចរណ៍';?>
                                                            </span>
                                                          </label>
                                                        </div> 
                                                        </div>
                                                </div>

                                                 </p>
                                                  
                                            
                                                    
                                                   
                                                    
                                                </div>
                                                <div class="col-md-8 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Checkin Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                           <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Checkin Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Check Out Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker m-top-0" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Check Out Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                    </div>                                                    
                                                        <div class="row" style="margin-top:-5px">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                          
                                                                <label>No. of Standard Room(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            
                                                      <label>No. of VIP Rooms:</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                    </div>
                                                   
                                                        </div>
                                                         <p class="m-top-0">
                                                   <label>No. of Family Room(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                    </p>
                                                  <div class="row" style="margin-top:-5px">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                          
                                                                <label>No. of Adult(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            
                                                      <label>No. of Enfant(s):</label>
                                                      <select class="form-control">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                      </select>
                                                    </div>
                                                   
                                                        </div>
                                                    </div>                                                   
                                            
                                            <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Find HOTEL & GUESTHOUSE</button>
                                                    </p>
                                                </div>
                                                </div>
                                              </form>  
                                    </div>        
                                                           
                                </div>

                              
                                               

                            <!-- #tab5 -->
                                <h3 class="tab_drawer_heading" rel="tab6">PICKUP & DROP-OFF</h3>
                                <div id="tab6" class="tab_content">
                                    <h2><?=(@$_SESSION['lang']=='en')?'PICKUP & DROP-OFF SERVICE BOOKING':'ផ្នែកសេវាកម្មទៅយក & ជូនដំណើរ '; ?></h2>
                                           <p class="red-p"><?=(@$_SESSION['lang']=='en')?
                                            'Search for Pickup & Drop-off Service (Countrywide)':
                                            'សូមស្វែងរកសណ្ធារគារ ផ្ទះសំណាក់(ទូទាំងប្រទេស)';?> </p>

                                    <div class="find-form">
                                            <form action="pickup_order.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Select Province/City':'ទីតាំងទៅយករថយន្ត';?></label>
                                                    <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                   <p>
                                                <div class="form-group">
                                              <label>Select Vehicle Type:</label>
                                              <select class="form-control">
     <option data-display="Vehicle Type">Select Vehicle Type</option>
 
                                                <option>CAR</option>
                                                <option>BUS</option>

                                                <option>VAN</option>
                                                <option>PICKUP</option>
                                                <option>RICKSHAW</option>

                                              </select>
                                            </div>
                                                    </p>
                                                </br>
                                                <p>
                                                    <div class="row">
                                                           <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                          One-way                                                          </label>
                                                        </div> 
                                                        </div>
                                                        <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                        Round-trip
                                                          </label>
                                                        </div> 
                                                        </div>
                                                         
                                                        </div>
                                                   </p> 

                                                 <div class="row">
                                                <div class="col-md-12">
                                                   <img src="http://choicecart.xyz/carrental/assets/img/about.png" class="img-responsive"> 
                                                </div>
                                                
                                            </div>   
                                                    
                                                </div>
                                                <div class="col-md-7 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Location':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input placeholder="Home | Hotel | School" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p>
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Drop-off Location':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                <input placeholder="Home | Hotel | School" type="text"></p>
                                                        </div>
                                                        
                                                    </div>                                                    
                                                   
                                                    <p class="m-top-0" style="margin-top: -4px !important;margin-bottom:0";>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Pickup Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p>
                                                    
                                                      <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                        
                                                    </div>
                                                <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Home | Hotel | School | Restaurant ETC . . .">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                     <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Return Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                    </div>                                                   
                                            
                                            <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Search Now</button>
                                                    </p>
                                                </div>
                                                </div>
                                              </form>  
                                </div>

                                </div>




                                 <!-- #tab6 -->
                                <h3 class="tab_drawer_heading" rel="tab7">AIRPORT TRANSFER </h3>
                                <div id="tab7" class="tab_content">
                                    <h2><?=(@$_SESSION['lang']=='en')?'AIRPORT TRANSFER SERVICE BOOKING':'ផ្នែកសេវាកម្មជូនដំណើរទៅមកពីព្រលានយន្តហោះ'; ?></h2>
                                    <p class="red-p"><?=(@$_SESSION['lang']=='en')?
                                            'Search for Airport Transfer Service (Countrywide)':
                                            'សូមស្វែងរកសណ្ធារគារ ផ្ទះសំណាក់(ទូទាំងប្រទេស)';?> </p>

                                    <div class="find-form">
                                            <form action="airport_order.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-12">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Select Province/City':'ទីតាំងទៅយករថយន្ត';?></label>
                                                <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>
                                                    
                                                   <p>
                                                <div class="form-group">
                                              <label>Select Vehicle Type:</label>
                                              <select class="form-control">
                                                <option data-display="VEHICLE TYPE">Select Vehicle</option>
                                                <option>CAR</option>
                                                <option>BUS</option>
                                                <option>VAN</option>
                                                <option>PICKUP</option>
                                                <option>RICKSHAW</option>

                                              </select>
                                            </div>
                                                    </p>
                                                </br>
                                                <p>
                                                    <div class="row">
                                                           <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                          One-way                                                          </label>
                                                        </div> 
                                                        </div>
                                                        <div class="col-md-6">
                                                           <div class="checkbox">
                                                          <label><input type="checkbox" value="">
                                                        Round-trip
                                                          </label>
                                                        </div> 
                                                        </div>
                                                         
                                                        </div>
                                                   </p> 

                                                <div class="row">
                                                <div class="col-md-12">
                                                   <img src="http://choicecart.xyz/carrental/assets/img/about.png" class="img-responsive"> 
                                                </div>
                                                
                                            </div>   
  
                                                    
                                                </div>
                                                <div class="col-md-7 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Location':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input placeholder="Home | Hotel |School" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p>
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Drop-off Location':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input placeholder="Home | Hotel | School" type="text" /></p>
                                                        </div>
                                                        
                                                    </div>                                                    
                                                   
                                                    <p class="m-top-0" style="margin-top: -4px !important;margin-bottom:0";>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Pickup Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p>
                                                    
                                                      <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                        
                                                    </div>
                                                <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Home | Hotel | School |Restaurant ETC . . .">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                     <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Return Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                    </div>                                                   
                                            
                                            <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Search Now</button>
                                                    </p>
                                                </div>
                                                </div>
                                              </form>  
                                </div>

                                </div>






                               <h3 class="tab_drawer_heading" rel="tab8">TOUR GUIDE RENTAL</h3>
                                <div id="tab8" class="tab_content">
                                    <h2><?=(@$_SESSION['lang']=='en')?'TOUR GUIDE RENTAL BOOKING':'ផ្នែកសេវាកម្មជួលមគ្គុទេសទេសចរណ៏'; ?></h2>
                                          <p class="red-p"><?=(@$_SESSION['lang']=='en')?
                                            'Search for Tour Guide Rental Service (Countrywide)':
                                            'សូមស្វែងរកសណ្ធារគារ ផ្ទះសំណាក់(ទូទាំងប្រទេស)';?> </p>

                                 <div class="find-form">
                            <form action="tour_quide_rent_booking.php" method="POST">                                            
                                            <div class="row">
                                                   <div class="col-md-6">
                                                    <p>
                                                        <label><?=(@$_SESSION['lang']=='en')?'Select Province/City': 'ជ្រើសរើសខេត្ត/ក្រុង';?></label>
                                                    <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="m-top-0">
                                                                <label><?=(@$_SESSION['lang']=='en')?'Select Languages' : 'ជ្រើសរើសភាសា' ;?></label>

                                                                <select name="driver_language_id" >

                                                                    <option  value="">SELECT LANGUAGE</option>
                                                                    <option value="1">ENGLISH</option>
                                                                    <option value="2">KOREAN</option>
                                                                    <option value="3">CHINESE</option>
                                                                    <option value="5">JAPANESE</option>
                                                                    <option value="5">THAI</option>
                                                                    <option value="6">KHMER</option>
                                                                </select>
                                                                </p>
                                                        </div>

                                                    </div>
                                                </div>
                                                        <div class="col-md-6 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Location':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input  placeholder="Home | Hotel | School" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p>
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Drop-off Location':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                <input  placeholder="Home | Hotel | School" type="text"></p>
                                                        </div>
                                                        
                                                    </div>                                                    
                                                   
                                                    <p style="margin-top: 1px !important;margin-bottom:0";>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Pickup Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p>
                                                    
                                                      <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                        
                                                    </div>
                                                <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Home | Hotel | School | Restaurant ETC . . .">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                     <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Return Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                    </div>                                                   

                                                <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Search Tour Guide Now</button>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>
                                </div>

                                </div>



                                <h3 class="tab_drawer_heading" rel="tab9">DRIVER RENTAL</h3>
                                <div id="tab9" class="tab_content">
                                    <h2><?=(@$_SESSION['lang']=='en')?'DRIVER RENTAL BOOKING':'ផ្នែកសេវាកម្មជួលអ្នកបើករថយន្ត'; ?></h2>
<p class="red-p"><?=(@$_SESSION['lang']=='en')?
                                            'Search for Driver Rental Service (Countrywide)':
                                            'សូមស្វែងរកសណ្ធារគារ ផ្ទះសំណាក់(ទូទាំងប្រទេស)';?>

                                 <div class="find-form">
                                     <form action="driver_rent_booking.php" method="POST">
                                            <div class="row">
                                                   <div class="col-md-6">
                                                    <p>
                                                        <label>Select Province/City</label>
                                                <input type="text" class="tbCountries"  placeholder="PROVINCE NAME"/>

                                                    </p>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="m-top-0">
                                                                <label><?=(@$_SESSION['lang']=='en')?'Select Languages' : 'ជ្រើសរើសភាសា' ;?></label>
                                                                <select name="driver_language_id" class="selectpicker form-control input-sm" id="" data-show-subtext="true" data-live-search="true">
                                                                    <option  data-subtext="" value="">SELECT LANGUAGE</option>
                                                                     <option value="1">ENGLISH</option>
                                                                    <option value="2">KOREAN</option>
                                                                    <option value="3">CHINESE</option>
                                                                    <option value="4">JAPANESE</option>
                                                                    <option value="5">THAI</option>
                                                                    <option value="6">KHMER</option>
                                                                </select>

                                                            </p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                        <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Pickup Location':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input placeholder="Home | Hotel | School" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p>
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Drop-off Location':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" placeholder="Home | Hotel | School" /></p>
                                                        </div>
                                                        
                                                    </div>                                                    
                                                   
                                                    <p style="margin-top: 1px !important;margin-bottom:0";>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location Pickup':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Pickup Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p>
                                                    
                                                      <div class="row">
                                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                                            <p>
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Date':'កាលបរិច្ឆេទត្រឡប់មកវិញ:';?></span>
 
                                                                <input id="reservation_date" name="car_return_date" placeholder="DD-MM-YYYY" data-select="datepicker" type="text"></p>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                                            <p class="clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Departure Time':'ពេលវេលាត្រឡប់មកវិញ:';?></span>

                                                                 <input type="text" name="car_return_time" class="form-control return_input" placeholder="HH:MM:SS" /></p>
                                                        </div>
                                                        
                                                    </div>
                                                <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Return Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Home | Hotel | School | Restaurant ETC . . .">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                     <p class="m-top-0">
                                                        <span class="white-span"><?=(@$_SESSION['lang']=='en')?'Share Google Map Location':'ស៊ៀផែនទី Google:';?></span>

                                                        <input name="pickup_map_carental"  type="text" placeholder="Copy & Paste Return Location Map">
                                                        <input type="hidden" name="pickupaddress">
                                                    </p> 
                                                    </div>                                                   
                                                <div class="col-md-12">
                                                    <p>
                                                        <button type="submit" name="btn_find_home" class="gauto-theme-btn"><?=(@$_SESSION['lang']=='en')?'Find Driver Now' : 'ស្វែងរករថយន្ត';?></button>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>
                                </div>

                                </div>







                                <h3 class="d_active tab_drawer_heading" rel="tab10">ONLINE PAYMENT</h3>
                                <div id="tab10" class="tab_content">
                                    <h2>ONLINE PAYMENT</h2>
                                 <p class="red-p">Money Transfer Across The World To Combodia (Countrywide)</p>
                                    <div class="find-form">
                                        <form action="online_payment.php" method="post" id="signups">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br/>
                                                    <b class="white-span">Customer Information</b>
                                                    <hr>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <input  name="first_name" id="first_name"  type="text" placeholder="First Name">
                                                       </p>
                                                    <p>
                                                        <select name="gender"  id="gender">
                                                            <option value="">Gender</option>
                                                            <option value="1" label="M">M</option>
                                                            <option value="2" label="F">F</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <input  name="last_name" id="last_name"  type="text" placeholder="Last Name">
                                                    </p>

                                                    <p>
                                                        <input type="text" name="occupation"  placeholder="Occupation">
                                                    </p>

                                                </div>





                                                <div class="col-md-12">

                                                    <b class="white-span">Contact Information</b>
                                                    <hr>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>
                                                        <input type="text" name="phone" id="phone" value=""   placeholder="Cell Phone">
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>
                                                        <input type="text" name="email" id="email" value=""  placeholder="E-mail">
                                                    </p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p>
                                                        <input type="text" name="add" id="add"  placeholder="Address">
                                                    </p>

                                                </div>




                                                <div class="col-md-12">

                                                    <b class="white-span">Payment Information</b>
                                                    <hr>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>

                                                        <!-- <select name="paytype" class="form-control" id="paytype"> -->

                                                        <select name="paytype"  id="paytype" >

                                                            <option  value="">100% & 50%</option>
                                                            <option value="1">100%</option>
                                                            <option value="0.5">50%</option>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>

                                                        <input  name="amount_book" id="amount_book" type="text"  required=""  placeholder="Amount In US$">
                                                        <input type="hidden" name="txt_total_charg" id="txt_total_charg" placeholder="Key In Amount">

                                                    </p>

                                                </div>
                                                <div class="col-md-3">
                                                    <p>
                                                        <input readonly=""  name="total" type="text" id="total" placeholder="Total In US$">
                                                    </p>

                                                </div>
                                                <div class="col-md-3">
                                                    <p>
                                                        <input readonly="" value="3.00"  id="charge" name="service_charge" type="text" placeholder="Service Charge(3%)">
                                                    </p>

                                                </div>

                                                <div class="col-md-12">
                                                    <p>
                                                        <label>
                                                            Purpose of your payment
                                                        </label>
                                                        <textarea class="form-textarea" name="purpose" class="form-control" rows="3" id="comment"></textarea>
                                                    </p>
                                                </div>


                                                <div class="col-md-12">
                                                    <p>
                                                        <button name="btn_car_rent" type="submit" class="gauto-theme-btn">Next</button>
                                                    </p>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>



                            </div>

                </div>
               
            </div>
        </div>
    </section>
    <!-- Find Area End -->


    <section class="py-3">
        <div class="offer-action">
            <div class="container">
                <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12"><a href="#">Director's Message</a></div>
                    <div class="col-lg-9 col-md-12 col-sm-12 bgred"><a href="#"><marquee>This is basic example of marquee This is basic example of marquee This is basic example of marquee This is basic example of marquee This is basic example of marquee</marquee></a></div>

            </div></div>
            <!--<a href="#" class="offer-btn-1"></a>
            <a href="#" class="offer-btn-2">
                <marquee>This is basic example of marquee This is basic example of marquee This is basic example of marquee This is basic example of marquee This is basic example of marquee</marquee>
            </a>-->
        </div>



    </section>


    <!-- About Area Start -->
    <section class="gauto-about-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-left">
                        <h4>about us</h4>
                        <h2>Welcome to Lyna Car Rental</h2>
                        <p>Lorem Ipsum passages, and more recently with desktop publishing software like aldus pageMaker including versions of all the Rorem Ipsum generators</p>
                        <div class="about-list">
                            <ul>
                                <li><i class="fa fa-check"></i>We are a trusted name</li>
                                <li><i class="fa fa-check"></i>we deal in have all brands</li>
                                <li><i class="fa fa-check"></i>have a larger stock of vehicles</li>
                                <li><i class="fa fa-check"></i>we are at worldwide locations</li>
                            </ul>
                        </div>

                    </div>
                </div>
       <div class="col-lg-6">
                    <div class="about-right">
                        <img src="assets/img/about.png" alt="car" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-------------Pre information area start------------->

    <section class="gauto-offers-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">

                        <h2><?=(@$_SESSION['lang']=='en')?'PRE-INFORMATION':'ពត៌មានបឋម'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="offer-tabs">

                        <div class="tab-content" id="offerTabContent">


                            <!-- Nissan Tab Start -->

                            <div class="row">

                               <?php $vsql2 = "SELECT * FROM tbl_pre_info";
                                $result2 = $connect->query($vsql2);
                                $cc=0;
                                if ($result2->num_rows > 0) {
                                  
                                while($row = $result2->fetch_assoc()){ 
                                $cc++;
                                ?>

                                <div class="col-lg-2 col-md-4 col-sm-12">
                                    <div class="single-offers">
                                        <div class="offer-image">
                                            <?php if($cc==6){ ?>
                                             <a href="faqs.php">
                                            <?php }else{ ?>
                                                 <a href="pre_info_detail.php?id=<?php echo $row['pre_id']; ?>">
                                                
                                            <?php } ?>
                                           
                                                <img src="system/admin/image/pre_info/<?php echo $row['pre_image']; ?>" alt="Why Choose Us" />
                                            </a>
                                        </div>
                                        <div class="offer-text">

                                            <h4><?=(@$_SESSION['lang']=='en')? $row["pre_title"]:$row["pre_title_kh"]; ?> </h4>

                                            <div class="offer-action">
                                                 <?php if($cc==6){ ?>
                                            <a href="faqs.php" class="offer-btn-1"> 
                                            <?php }else{ ?>
                                               <a href="pre_info_detail.php?id=<?php echo $row['pre_id']; ?>" class="offer-btn-1"> 
                                                
                                            <?php } ?>
                                                
                                                <?=(@$_SESSION['lang']=='en')?'Details':'ព័ត៌មានលម្អិត'; ?> </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>

                            </div>

                            <!-- Nissan Tab End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-------------pre information area end--------------->






    <!----------------------vehicle rental start-------------------------->

<?php
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

<section class="gauto-testimonial-area section_70" id="rental">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4> <?=(@$_SESSION['lang']=='en')?'VEHICLE':'វិជ្ជា'; ?></h4>
                        <h2><?=(@$_SESSION['lang']=='en')?'Rental':'វជួល'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">


                        <?php
                        $v_sql = "SELECT * FROM tbl_vehicle_rantal where status =1";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){

                                ?>

                        <div class="single-testimonial">
                            <div class="testimonial-text">

                                <img src="system/admin/image/vehicle_rental/<?php echo $row['ve_image']; ?>" alt="testimonial" />

                                <div class="testimonial-meta">

                                    <div class="client-info">
                                        <table class="table table_div">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        <strong><?php echo $row["ve_title"]; ?></strong><br/>
                                                        <span class="red_color"><?php echo $text_re. ": ".$row["ve_ref_no"];?> </span>
                                                        
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:150px"> Day(s) 1-7:</td>
                                                    <td>$<?php echo number_format($row["ve_days(1-7)"],2); ?>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td style="width:150px"> Extra Day(s):</td>
                                                    <td><span>$<?php echo number_format($row["ve_extra_days(1-7)"],2); ?></span>/Day</td>
                                                </tr>

                                                 <tr>
                                                    <td style="width:150px"> Days (15-26):</td>
                                                    <td>$ <?php echo number_format($row["ve_extra_day(15-26)"],2); ?>/Day</td>
                                                </tr>

                                                 <tr>
                                                    <td style="width:150px"> Extra Days:</td>
                                                    <td><span>$<?php echo number_format($row["ve_extra_day(15-26)"],2); ?></span>/Day</td>
                                                </tr>


                                                <tr>
                                                    <td> Monthly:</td>
                                                    <td>$<?php echo number_format($row["ve_monthly"],2); ?>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td style="width:150px"> Extra Days:</td>
                                                    <td><span>$<?php echo number_format($row["ve_monthy_extra_days"],2); ?></span> /Day</td>
                                                </tr>

                                                <tr>
                                                    <td>Yearly:</td>
                                                    <td>$<?php echo number_format($row["ve_yearly"],2); ?>/Day</td>
                                                </tr>

                                                 <tr>
                                                    <td style="width:150px">Extra Days:</td>
                                                    <td><span>$<?php echo number_format($row["ve_yearly_extra_days"],2); ?></span>/Day</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <div class="load-more">
                                            <a href='vehical_rental_detail.php?id=<?php echo $row["ve_id"]; ?>' class="gauto-btn">View Details</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  } } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------ vehicle rental  Area end ------------------>






    <!----------------------acsesories rental start-------------------------->

    <section class="gauto-testimonial-area2 section_70" id="rental">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4> <?=(@$_SESSION['lang']=='en')?'ACCESSORIES':'គ្រឿងបន្ថែម'; ?> </h4>
                        <h2><?=(@$_SESSION['lang']=='en')?'Rental Booking':'ការកក់ជួល'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">


                          <?php
                        $vsql4 = "SELECT * FROM tbl_accessories_rental";
                        $result4 = $connect->query($vsql4);
                        if ($result4->num_rows > 0) {
                            while($row = $result4->fetch_assoc()){ ?>

                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <img src="system/admin/image/accessories rental/<?php echo $row['ac_image']; ?>" alt="testimonial" />
                                <div class="testimonial-meta">

                                    <div class="client-info">
                                        <table class="table table_div">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                       <strong> <?php echo $row["ac_title"]; ?></strong><br/>
                                                        <span class="red_color"><?php echo $text_re. ": ".$row["ac_ref_no"]; ?></span>
                                                       
                                                    </th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> Day(s) 1-7:</td>
                                                    <td>$<?php echo number_format($row["ac_days(1-7)"],2); ?>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td> Extra Day(s):</td>
                                                    <td><span>$<?php echo number_format($row["ac_extradays(1-7)"],2); ?></span>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td>Days (15-26):</td>
                                                    <td> $<?php echo number_format($row["ac_days(15-26)"],2); ?>/Day</td>
                                                </tr>
                                                <tr>
                                                    <td>Extra Days:</td>
                                                    <td><span> $<?php echo number_format($row["ac_extradays(15-26)"],2); ?></span>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td> Monthly:</td>
                                                    <td>$<?php echo number_format($row["ac_monthly"],2); ?>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td> Extra Days:</td>
                                                    <td><span>$<?php echo number_format($row["ac_extramonthly"],2); ?></span>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td>Yearly:</td>
                                                    <td>$<?php echo number_format($row["ac_yearly"],2); ?>/Day</td>
                                                </tr>

                                                <tr>
                                                    <td>Extra Days</td>
                                                    <td><span>$<?php echo number_format($row["ac_extrayearly"],2); ?></span>/Day</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <div class="load-more">
                                            <a href="acc_rental_detail.php?id=<?php echo $row['ac_id']; ?>" class="gauto-btn">View Details</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------ acsesories rental  Area end ------------------>


    <!----------------------city tour start-------------------------->

    <section class="gauto-testimonial-area section_70 city_sec" id="rental">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4><?=(@$_SESSION['lang']=='en')?'CITY':'ទីក្រុង'; ?></h4>
                        <h2><?=(@$_SESSION['lang']=='en')?'Tour (Countrywide)':'ដំណើរកម្សាន្ត (ទូទាំងប្រទេស)'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">

                        <?php
                            $v_sql = "SELECT * FROM tbl_province";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){

                                    ?>

                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <img src="system/admin/image/province/<?php echo $row['pv_image']; ?>" alt="" />
                                <div class="testimonial-meta city-zoom">
                                    <div class="testimonial-meta">

                                    <div class="client-info text-center">
                                        <h3> <?php	if((@$_SESSION['lang']=='en')){
                                            echo $row["pv_title"];                                           
                                            }
                                            else{																							echo $row["pv_title_kh"];																								} 																																															?>
                                            </h3>

                                        <div class="load-more">
                                            <a href="city_tour_detail.php?id=<?php echo $row["pv_id"]; ?>" class="gauto-btn">View Details</a>
                                        </div>

                                    </div>
                                </div>

                                </div>
                            </div>
                        </div>

                        <?php }} ?>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------ city tour  Area end ------------------>

    <!----------------------guesthouse tour start-------------------------->

    <section class="gauto-testimonial-area2 section_70" id="rental">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4><?=(@$_SESSION['lang']=='en')?'HOTEL &':'សណ្ឋាគារ &'; ?></h4>
                        <h2><?=(@$_SESSION['lang']=='en')?'Guesthouse':'ផ្ទះសំណាក់'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">


                        <?php
                            $v_sql = "SELECT * FROM tbl_hotel LEFT JOIN tbl_hotel_include_option  ON tbl_hotel.ht_id = tbl_hotel_include_option.hotel_id GROUP BY hotel_id";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){
                                    ?>
                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <img src='system/admin/image/hotel/<?php echo $row["ht_image"]; ?>' alt="" />
                                <div class="testimonial-meta">

                                    <div class="client-info text-center">
                                        <h3><?php echo $row["ht_title"]; ?></h3>

                                        <div class="load-more">
                                            <a href="hotel_detail.php?id=<?php echo $row['ht_id']; ?>" class="gauto-btn"><?=(@$_SESSION['lang']=='en')?'View Details':'មើលព័ត៌មានលម្អិត'; ?></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                         <?php } } ?>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------ guesthouse  Area end ------------------>



        <!-- Service Area Start -->
    <section class="gauto-service-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4><?=(@$_SESSION['lang']=='en')?'SEE OUR':'សូមមើលរបស់យើង'; ?></h4>
                        <h2><?=(@$_SESSION['lang']=='en')?'Services':'សេវាកម្ម'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">

                             <?php
                            $v_sql = "SELECT * FROM tbl_our_service";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                $cnn=00;
                                while($row = $result->fetch_assoc()){
                                    $cnn=$cnn+1;
                                    ?>

                        <div class="single-service">
                            <span class="service-number"><?php echo $cnn; ?> </span>
                            <div class="service-icon">
                                <img src='system/admin/image/our_service/<?php echo $row["se_image"]; ?>' alt="Vehicle-General-Check Up" />
                            </div>
                            <div class="service-text">
                                <a href="#">                                     <?php									 $title_arr[]=(@$_SESSION['lang']=='en')? $row["se_title"]:$row["se_title_kh"];									 $title_arr_url[]='our_service_detail.php?edit_id='.$row["se_id"];									 ?>
                                    <h3><?=(@$_SESSION['lang']=='en')? $row["se_title"]:$row["se_title_kh"]; ?></h3>
                                </a>
                                <div class="load-more">
                                    <a href='our_service_detail.php?edit_id=<?php echo $row["se_id"]; ?>' class="gauto-btn">View Details</a>
                                </div>
                            </div>
                        </div>

                    <?php } } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Area End -->

    <!----------------------clients  start-------------------------->

    <section class="gauto-testimonial-area section_70" id="rental">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4><?=(@$_SESSION['lang']=='en')?'Our':'របស់យើង'; ?></h4>
                        <h2><?=(@$_SESSION['lang']=='en')?'Customers':'អតិថិជន'; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">

                         <?php
                            $v_sql = "SELECT * FROM tbl_our_customer";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){ ?>
                        <div class="single-testimonial3">
                            <div class="testimonial-text">
                                <a href="<?php echo $row['url']; ?>">
                                <img src='system/admin/image/our_customer/<?php echo $row["ou_image"]; ?>' alt="" />
                             </a>
                            </div>
                        </div>
                        <?php } } ?>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------ clients tour  Area end ------------------>


    <!-- Promo Area Start -->
    <section class="gauto-promo-area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="promo-box-left">
                        <img src="assets/img/toyota-offer-2.png" alt="promo car" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="promo-box-right">
                        <h3>Do You Want To Earn With Us? So Don't be Late.</h3>
                        <a href="top_detail.php?id=3" class="gauto-btn">Become a partner</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Promo Area End -->





    <!-- Testimonial Area Start -->
    <section class="gauto-testimonial-area section_70  mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4>Client</h4>
                        <h2>testimonial</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">
                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="testi_p">"Dorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                                <div class="testimonial-meta">
                                    <div class="client-image">
                                        <img src="assets/img/testimonial.jpg" alt="testimonial" />
                                    </div>
                                    <div class="client-info">
                                        <h3>David</h3>
                                        <p>Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="testi_p">"Forem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                                <div class="testimonial-meta">
                                    <div class="client-image">
                                        <img src="assets/img/testimonial-2.jpg" alt="testimonial" />
                                    </div>
                                    <div class="client-info">
                                        <h3>John</h3>
                                        <p>Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="testi_p">"Dorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                                <div class="testimonial-meta">
                                    <div class="client-image">
                                        <img src="assets/img/testimonial.jpg" alt="testimonial" />
                                    </div>
                                    <div class="client-info">
                                        <h3>Smith</h3>
                                        <p>Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="testimonial-text">
                                <p class="testi_p">"Dorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat adipisicing elit."</p>
                                <div class="testimonial-meta">
                                    <div class="client-image">
                                        <img src="assets/img/testimonial.jpg" alt="testimonial" />
                                    </div>
                                    <div class="client-info">
                                        <h3>Marco Ghaly</h3>
                                        <p>Customer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->


    <!-- Driver Area Start -->
    <section class="gauto-driver-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4>Why</h4>
                        <h2>Choose Our Company</h2>
                    </div>
                </div>
            </div>
            <div class="row overflow-hidden pt-4">
                <div class="col-md-6 p-0">
                    <div class="bg-secondary text-light text-center p-5 before-effect-5 opacity-nine">
                        <span class="flaticon-reply text-primary flat-medium"></span>
                        <h3 class="pb-4 pt-5 text-white">Pre Owned Vehicles</h3>
                        <p>Nec nulla feugiat tortor ipsum vel imperdiet magna tempus porta ridiculus molestie quis non nam mauris Vehicula. Fringilla, tellus. Dignissim consequat. Nisl mi ante. Facilisis luctus eu Porttitor curabitur. Morbi tempor dictum nam tellus. Ante dui potenti volutpat bibendum pede est, platea. Lectus quisque, erat feugiat sapien magna erat senectus praesent.</p>
                        <a href="car_sales.php" class="btn btn-primary mt-5">Find Car</a>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="bg-secondary text-light text-center p-5 before-effect-6">
                        <span class="flaticon-tag text-primary flat-medium"></span>
                        <h3 class="pb-4 pt-5 text-white">Brand New Cars</h3>
                        <p>Nec nulla feugiat tortor ipsum vel imperdiet magna tempus porta ridiculus molestie quis non nam mauris Vehicula. Fringilla, tellus. Dignissim consequat. Nisl mi ante. Facilisis luctus eu Porttitor curabitur. Morbi tempor dictum nam tellus. Ante dui potenti volutpat bibendum pede est, platea. Lectus quisque, erat feugiat sapien magna erat senectus praesent.</p>
                        <a href="car_sales.php" class="btn btn-primary mt-5 position-relative" style="z-index: +99;">Find Car</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Driver Area End -->


    <!-- Call Area Start -->
    <section class="gauto-call-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-box">
                        <div class="call-box-inner">
                            <h2>With Over <span>150+</span> Partners Locations</h2>
                            <p>Labore dolore magna aliqua ipsum veniam quis nostrud exercitation voluptate velit cillum dolore feu fugiat nulla excepteur sint occaecat sed ipsum cupidatat proident culpa exercitation ullamco laboris aliquik.</p>
                            <div class="call-number">
                                <div class="call-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="call-text">
                                    <p>need any help?</p>
                                    <h4><a href="#">+855 (0)92 14 30 14</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call Area End -->


    <!-- Blog Area Start -->
    <section class="gauto-blog-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4>ALL</h4>
                        <h2> Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="#">
                                <img src="assets/img/blog-1.jpg" alt="blog 1" />
                            </a>
                        </div>
                        <div class="blog-text text-center">
                            <h3><a href="our_promotion_upcoming_event.php">Upcoming Events</a></h3>
                            <div class="load-more">
                                <a href="our_promotion_upcoming_event.php" class="gauto-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="#">
                                <img src="assets/img/blog-2.jpg" alt="blog 1" />
                            </a>
                        </div>
                        <div class="blog-text text-center">
                            <h3><a href="our_past_promotion_event.php">Past Events</a></h3>
                            <div class="load-more">
                                <a href="our_past_promotion_event.php" class="gauto-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="#">
                                <img src="assets/img/blog-3.jpg" alt="blog 1" />
                            </a>
                        </div>
                        <div class="blog-text text-center">
                            <h3><a href="our_submit_talk_promotion_event.php">Submit A Talk Idea</a></h3>
                            <div class="load-more">
                                <a href="our_submit_talk_promotion_event.php" class="gauto-btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End -->


    <!----------------------video slider start-------------------------->

    <section class="gauto-testimonial-area section_70" id="rental">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-heading">
                        <h4>All Events</h4>
                        <h2>Video Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-slider owl-carousel">
                        <div class="single-testimonial">
                            <div class="testimonial-text video-box wow fadeIn">
                                <img src="assets/img/bmw-offer.png" alt="" />
                                <a href="https://www.youtube.com/embed/s0hVpqm50_E" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>
                            </div>
                        </div>
                        <div class="single-testimonial">
                            <div class="testimonial-text video-box wow fadeIn">
                                <img src="assets/img/nissan-offer.png" alt="" />
                                 <a href="https://www.youtube.com/embed/s0hVpqm50_E" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>
                            </div>
                        </div>

                        <div class="single-testimonial">
                           <div class="testimonial-text video-box wow fadeIn">
                                <img src="assets/img/audi-offer.png" alt="testimonial" />
                                 <a href="https://www.youtube.com/embed/s0hVpqm50_E" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>
                            </div>
                        </div>


                          <div class="single-testimonial">
                           <div class="testimonial-text video-box wow fadeIn">
                                <img src="assets/img/bmw-offer.png" alt="" />
                                 <a href="https://www.youtube.com/embed/s0hVpqm50_E" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>

                            </div>
                        </div>

                         <div class="single-testimonial">
                            <div class="testimonial-text video-box wow fadeIn">
                                <img src="assets/img/bmw-offer.png" alt="" />
                                 <a href="https://www.youtube.com/embed/s0hVpqm50_E" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------ video slider  Area end ------------------>





    <!-- Footer Area Start -->
<?php require_once 'footer.php'; ?>
</body>

<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
<script src="YourJquery source path"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript">

    $("#txt_airport_pick_up_location").on("change", function() {

        var pro_id=$("#txt_airport_pick_up_location").val();

        var post_id = 'id='+ pro_id;

        $.ajax
        ({
            type: "POST",
            url: "ajax_dependency_airport.php",
            data: post_id,
            cache: false,
            success: function(pro_to)
            {

                // alert(post_id);
                $("#txt_airport_drop_location").html(pro_to);
            }
        });


    });

    $("#txt_pick_up_location").on("change", function() {

        var pro_id=$("#txt_pick_up_location").val();

        var post_id = 'id='+ pro_id;

        $.ajax
        ({
            type: "POST",
            url: "ajax_dependency_pickup_drop_off.php",
            data: post_id,
            cache: false,
            success: function(pro_to)
            {

              //   alert(pro_to);
                $("#txt_drop_off").html(pro_to);
            }
        });


    });

    $("#pickupfrom_carrent").on("change", function() {

        var pro_id=$("#pickupfrom_carrent").val();

        var post_id = 'id='+ pro_id;

        $.ajax
        ({
            type: "POST",
            url: "ajax_dependency_pickup_carrental.php",
            data: post_id,
            cache: false,
            success: function(pro_to)
            {
               // alert(pro_to);
                $("#txt_return_carrental").html(pro_to);
            }
        });


    });



    $(document).ready(function ()
    {
        function cal_payment_online(){
            var haft =$("#amount_book").val();
            var charge =$("#charge").val();
            var total =$("#total").val();
            var pattype =$("#paytype").val();
            var totalcharge = (pattype*haft*3)/100;
            charge=parseFloat(totalcharge).toFixed(2);
            var eq=parseFloat(haft*pattype)+parseFloat(totalcharge);
            total=parseFloat(eq).toFixed(2);
            $("#total").val(total);
            $("#txt_total_charg").val(charge);

        }

        $('#amount_book').on('input', function(){
            cal_payment_online();
        });
        $('#paytype').on('input', function(){
            cal_payment_online();
        });


        $(".hiiden_click").click(function(){
            $("#bb").removeClass("tabcolor");
        });
    });

    var windowsize = $(window).width();

    $(window).resize(function() {
        windowsize = $(window).width();
        if (windowsize >1000) {
            $(".font_responsive").css("font-size","11px");
        }
        else {
            $(".font_responsive").css("font-size","13px");
        }
    });





    function DropProvinceLocation(){
        var dropTo = document.getElementById("dropoffto");
        var index = dropTo.selectedIndex;
        var x = document.getElementById("dropoffprovince");
        if(index != 0){
            // alert(dropTo.options[index].text);
            // code to display form province specific location
            x.style.display = "block";
        }else{
            // alert(dropTo.options[index].text);
            // code to hide form province specific location
            x.style.display = "none";
        }
    }


</script>
<script>
    $(document).ready(function() {
        BindControls();
    });

    function BindControls() {
        var Countries = ['TAKEO', 
            'KEP', 
            'PHNOM PENH', 
            ];

        $('.tbCountries').autocomplete({
            source: Countries,
            minLength: 0,
            scroll: true
        }).focus(function() {
            $(this).autocomplete("search", "");
        });
    }					$('#search_field').on('input', function(){ 	$("#search_content").html("");	 if($('#search_field').val()!=""){          var title_url = <?php echo json_encode($title_arr); ?>;	 var title_title_url = <?php echo json_encode($title_arr_url); ?>;		for(var i=0; i<title_url.length;i++){				if(title_url[i].toLowerCase().indexOf($('#search_field').val().toLowerCase())!= -1){			$("#search_content").css("display","block");			$("#search_content").append("<p><a href='"+title_title_url[i]+"'>"+title_url[i]+"</a></p>");		}			}	 }else{		$("#search_content").css("display","none"); 		 	 }	});	
	

$("#pickupfrom_carrent").on("change", function() {
	var pro_id=$("#pickupfrom_carrent").val();
	var post_id = 'id='+ pro_id;
	$.ajax({
		type: "POST",
		url: "ajax_dependency_pickup_carrental.php",
		data: post_id,
		cache: false,
		success: function(pro_to){
			// alert(pro_to);
			$("#txt_return_carrental").html(pro_to);
		} 
	});				   
});		
	
</script>
</html>
