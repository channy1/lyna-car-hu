<!-- Main Sidebar Container -->
<style>
.layout-fixed .main-sidebar{
	text-transform: uppercase;
    font-size: 15px;
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $base_url; ?>admin" class="brand-link">
        <!--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">-->
        <span class="brand-text font-weight-bold" style="color:white"> &nbsp; &nbsp; Lyna-CarRental.com</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!--<div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
                </div>-->
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBOARD
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>OVERVIEW</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/update_profile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>UPDATE PROFILE</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    RESUME
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>    
                            <ul class="nav nav-treeview">
                                
                                <li class="nav-item">
                                    <a href="<?php echo $base_url;?>admin/footer_upcoming/" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>MY RESUME</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $base_url;?>admin/footer_status/" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>VIEW RESUME</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/coupon_card" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>COUPON CARD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>USERS</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> MESSAGES</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> TERMS OF USE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CHANAGE PASSWORD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CHANGE PIN (4 DIGIT)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> BILLINGS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            HOME
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/home/top_menu.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TOP MENU</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/website_info/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>WEBSITE INFO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/pre_info/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PRE INFORMATION</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/our_services/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>OUR SERVICES</p>
                            </a>
                        </li> 
                        <!--<li class="nav-item">
                            <a href="<?php// echo $base_url;?>admin/vehicle_rental/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vehicle Rental(List & Price)</p>
                            </a>
                        </li>-->
					
                        
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/our_customer/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>OUR CUSTOMERS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/logo/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>LOGO SETTING</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/event/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>EVENT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/promotion/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PROMOTION</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/info_center/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>INFO CENTER NEWS</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/recent_post/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RECENT POSTS</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/job_seeker/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>JOB SEEKERS</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/about/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ABOUT US</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/contact_information/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CONTACT US</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/faq/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FAQS</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/public_holiday/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DATE HOLIDAYS</p>
                            </a>
                        </li>f
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/footer_upcoming/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FOOTER</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/footer_status/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>FOOTER STATUES</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         VEHICLE RENTAL 
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/vehicle_rental/" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE RENTAL LIST & PRICE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR (COUNTRYWIDE) LIST & PRICE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF LIST & PRICE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRASFER LIST & PRICE</p>
                          </a>
                        </li>	
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         RICKSHAW RENTAL  
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/city_tour/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CITY TOUR(COUNTRYWIDE)</p>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/airport_transfer/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AIRPORT TRANSFER</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/pickup_drop_off/" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF</p>
                          </a>
                        </li>
						
					</ul>
				</li> 
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                          <i class="right fas fa-angle-left"></i>
                         ACCESSORIES RENTAL
                        </p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/accessorie_rental/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ACCESSORIES RENTAL LIST & PRICE</p>
                            </a>
                        </li>
					</ul>
				</li> 
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            CITY TOURS (COUNTRYWIDE)
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
					  <ul class="nav nav-treeview">
					   <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/city_tour/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CITY TOURS LIST & PRICE</p>
                            </a>
                        </li>
					  </ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         HOTEL & GUESTHOUSE
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/hotel_and_guest_house/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>HOTEL & GUESTHOUSE LIST & PRICE</p>
                            </a>
                        </li>
					</ul>
				</li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
						TOUR GUIDE RENTAL
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
					<ul class="nav nav-treeview">					 
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/agreement_tour_guide_rental" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>TOUR GUIDE RENTAL LIST & PRICE</p>
							</a>
                        </li>
					</ul>
				</li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
							DRIVER RENTAL
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
					  <ul class="nav nav-treeview">
					 
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_driver_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL LIST & PRICE</p>
                          </a>
                        </li>
					  </ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
						ONLINE PAYMENT
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">					 
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/online_payment" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ONLINE PAYMENT LIST & PRICE SETTING</p>
							</a>
                        </li>
					</ul>
				</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            PARTNER LIST
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/partner_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PARTNER LIST IN ALL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/car_owner_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CAR'S OWNER LIST</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/rick_shaw_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RICKSHAW'S OWNER LIST</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/hotel_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>HOTEL & GUESTHOUSE LIST</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/tour_guide_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TOUR GUIDE LIST & RENTAL PRICE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/driver_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DRIVER LIST & RENTAL PRICE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/introducer_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>INTRODUCER LIST</p>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/partner_city_tour_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CITY TOUR (COUNTRYWIDE) LIST</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PICKUP & DROP-OFF LIST</p>
                            </a>
                        </li>	
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/partner_airport_transfer_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AIRPORT TRANSFER LIST</p>
                            </a>
                        </li>                  
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         CUSTOMER LIST
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/customer_list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CUSTOMER LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
							<a href="<?php echo $base_url;?>admin/customer_bonus" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
								<p>CUSTOMER BONUS</p>
							</a>
                        </li>                       
					</ul>
				</li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         VENDOR LIST
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/vendor" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VENDOR INFORMATION LIST</p>
                          </a>
                        </li>                      
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        MEMBERSHIP PACKAGES
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
							<a href="<?php echo $base_url;?>admin/user_group" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>USER GROUP LIST</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="<?php echo $base_url;?>admin/membership_package" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>MEMBERSHIP PACKAGES LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/services_package" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>SERVICE POSTING PACKAGES LIST (SPP)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/car_owner_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>CAR'S OWNER (SPP LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/rickshaw_owner_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>RICKSHAW'S OWNER (SPP LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/hotel_and_guest_house_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>HOTEL & GUESHOUSE (SPP LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/tour_guide__posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>TOUR GUIDE (SPP LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/driver_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>DRIVER (SPP LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/introducer_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>INTRODUCER (BUYING COUPON CARD LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/city_tour_package_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>CITY TOUR (SPP LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/pickup_drop_off_service_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>PICKUP & DROP-OFF (SPP LIST)</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/airport_transfer_services_packages_posting_package_service" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>AIRPORT TRANSFER (SPP LIST)</p>
							</a>
                        </li>
						                       
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        QUOTATIONS 
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_car_information" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR INFO QUOTE</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_car_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR RENTAL QUOTE LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_ricksaws_information" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW INFO QUOTE</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_ricksaw_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW RENTAL QUOTE LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_accessories_information" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES INFO QUOTE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_accessories_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES RENTAL QUOTE LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR INFO QUOTE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR QUOTE LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GUESTHOUSE INFO QUOTE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GUESTHOUSE QUOTE LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF INFO QUOTE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF QUOTE LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER INFO QUOTE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER QUOTE LIST </p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_tour_guide_rental_information" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE INFO QUOTE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_tour_guide_information" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL QUOTE LIST</p>
                          </a>
                        </li>                        
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_driver_information" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL INFO QUOTE</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/quotation_driver_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL QUOTE LIST</p>
                          </a>
                        </li>                                               
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         AGREEMENTS (PARTNER)
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_owner_of_the_vehicle" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S OWNER AGREEMENT</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_car_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S OWNER AGREEMENT LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_rickshaw_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S OWNER AGREEMENT</p>
                          </a>
                        </li>
						 <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_rickshaw_rental_list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S OWNER AGREEMENT LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/agreement_accessories_rental" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S OWNER AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="<?php echo $base_url;?>admin/agreement_accessories_rental_list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S OWNER AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH OWNER AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH OWNER AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE AGREEMENT</p>
							</a>
                        </li>	
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_tour_guide_rental_list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL AGREEMENT LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_driver_rental_list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL AGREEMENT</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL AGREEMENT LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER AGREEMENT</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_car_sale" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALE AGREEMENT</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/agreement_car_sale_list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALES AGREEMENT LIST</p>
                          </a>
                        </li>                       
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         AGREEMENTS (CUSTOMER)
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S RENTAL AGREEMENT</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S RENTAL AGREEMENT LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S RENTAL AGREEMENT</p>
                          </a>
                        </li>
						 <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S RENTAL AGREEMENT LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S RENTAL AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S RENTAL AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL AGREEMENT</p>
							</a>
                        </li>	
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL AGREEMENT LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL AGREEMENT</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL AGREEMENT LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF AGREEMENT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER AGREEMENT</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER AGREEMENT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALE AGREEMENT</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALES AGREEMENT LIST</p>
                          </a>
                        </li>                       
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        INVOICE
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S RENTAL INVOICE</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S RENTAL INVOICE LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S RENTAL INVOICE</p>
                          </a>
                        </li>
						 <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S RENTAL INVOICE LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S RENTAL INVOICE</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S RENTAL INVOICE LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH INVOICE</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH INVOICE LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR INVOICE</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR INVOICE LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL INVOICE</p>
							</a>
                        </li>	
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL INVOICE LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL INVOICE</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL INVOICE LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF INVOICE</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF INVOICE LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER INVOICE</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER INVOICE LIST</p>
							</a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALE INVOICE</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALES INVOICE LIST</p>
                          </a>
                        </li>                       
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        RECEIPTS
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S RENTAL RECEIPT</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE'S RENTAL RECEIPT LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S RENTAL RECEIPT</p>
                          </a>
                        </li>
						 <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RICKSHAW'S RENTAL RECEIPT LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S RENTAL RECEIPT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ACCESSORIES'S RENTAL RECEIPT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH RECEIPT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>HOTEL & GH RECEIPT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR RECEIPT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CITY TOUR RECEIPT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL RECEIPT</p>
							</a>
                        </li>	
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>TOUR GUIDE RENTAL RECEIPT LIST</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL RECEIPT</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DRIVER RENTAL RECEIPT LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF RECEIPT</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PICKUP & DROP-OFF RECEIPT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER RECEIPT</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>AIRPORT TRANSFER RECEIPT LIST</p>
							</a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALE RECEIPT</p>
                          </a>
                        </li>
						<li class="nav-item">
                          <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CAR SALES RECEIPT LIST</p>
                          </a>
                        </li>                       
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         RENT PLANNER
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
							<a href="<?php echo $base_url;?>admin/rent_planner" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>RENTAL PLANNER</p>
							</a>
                        </li>                      
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         REPORTS
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>VEHICLE RENTAL REPORT</p>
							</a>
                        </li>   
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>RICKSHAW RENTAL REPORT</p>
							</a>
                        </li>   
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>ACCESSORIES RENTAL REPORT</p>
							</a>
                        </li>    
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>HOTEL & GH BOOKING REPORT</p>
							</a>
                        </li> 
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>HOTEL & GH REPORT</p>
							</a>
                        </li>       
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>TOUR GUIDE RENTAL REPORT</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>DRIVER RENTAL REPORT</p>
							</a>
                        </li>   
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>CITY TOUR REPORT</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>CITY TOUR QUOTE REPORT</p>
							</a>
                        </li> 
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>PICKUP & DROP-OFF REPORT</p>
							</a>
                        </li>   
                        <li class="nav-item">
							<a href="#" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>AIRPORT TRANSFER REPORT</p>
							</a>
                        </li> 
                        <li class="nav-item">
							<a href="<?php echo $base_url;?>admin/report_maintainance_repair" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>MAINTENANCE & REPAIR REPORT</p>
							</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/expense/expense_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>EXPENSE HISTORY REPORT</p>
                            </a>
                        </li> 
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/report_rental_report" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>RENTAL REPORT</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/report_customer_income_paid_history" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>CUSTOMER INCOME HISTORY & PAID HISTORY</p>
                          </a>
                        </li> 
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/report_vehical_sale" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>VEHICLE SALES REPORT</p>
                          </a>
                        </li> 
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/report_income_paid_history" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>PARTNER INCOME & PAID HISTORY</p>
                          </a>
                        </li>                               
					</ul>
				</li>
                <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         CUSTOMISED REPORT (TOP)
                          <i class="right fas fa-angle-left"></i>
                        </p>
					</a>
					<ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/customized_report_thank_you" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>THANK YOU LETTER LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/customized_report_daily_duties" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DAILY DUTIES</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?php echo $base_url;?>admin/customized_report_office_phone_list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>OFFICE PHONE LIST</p>
                          </a>
                        </li>
                        <li class="nav-item">
							<a href="<?php echo $base_url;?>admin/customized_report_monthly_comission_calculation" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>MONTHLY COMMISSION CALCULATION</p>
							</a>
                        </li>                   
					</ul>
				</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                        ACCOUNTING SYSTEM
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>REVENUE</p>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/expense/expense_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>EXPENSE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/Profit_list/profit_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PROFIT & LOSS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/RevenueCategory/revenue_categorylist.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>REVENUE CATEGORY</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/ExpenesCategory/expense_category.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>EXPENSES CATEGORY</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/expenserequest/expense_request.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>EXPENSES REQUEST FORM</p>
                            </a>
                        </li>
                       <!-- <li class="nav-item">
                            <a href="<?php// echo $base_url;?>admin/accounting_hotel_guesthouse_list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hotel & Guesthouse List</p>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/accounting_petty_cash_record" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PETTY CASH</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>admin/acccounting_cash_voucher" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CASH VOUCHER</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link"> 
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         SETTING
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                     
                      <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ADD GROUP USER</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ADD USER</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>UPDATE USER</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SETTING PERMISSION </p>
                                </a>
                            </li>
                      </ul>
				</li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link"> 
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         BACKUP DATABASE
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>D:\DATABASE BACKUP</p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>D:\DROPBOX BACKUP</p>
                                </a>
                            </li>
                            
                      </ul>

				</li>
                <li class="nav-item has-treeview">
                      <a href="#" class="nav-link"> 
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         HELP
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $base_url;?>admin/revenue/index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SUPPORT</p>
                                </a>
                            </li>
                      </ul>
				</li>
                <li class="nav-item has-treeview">
                      <a href="<?php echo $base_url;?>admin_login.php?action=logout" class="nav-link"> 
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         LOGOUT
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
				</li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>