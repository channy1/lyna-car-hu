

<!-- Main Sidebar Container -->
<style>
.layout-fixed .main-sidebar{
	text-transform: uppercase;
    font-size: 15px;
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $base_url; ?>partner" class="brand-link">
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
                        <!--<li class="nav-item">
                            <a href="<?php echo $base_url;?>admin" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Overview</p>
                            </a>
                            </li>-->
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/update_profile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>UPDATE PROFILE</p>
                            </a>
						</li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            RESUME
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>MY RESUME</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>VIEW RESUME</p>
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            COUPON CARD
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>COUPON CARD</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Terms of Use</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change PIN (4 Digit)</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Billings</p>
                    </a>
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
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PACKAGE LIST</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            PICKUP & DROP-OFF PRICE SETTING 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PICKUP & DROP-OFF PRICE </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PICKUP & DROP-OFF LIST </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            CITY TOUR PRICE SETTING 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CITY TOUR PRICE  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CITY TOUR  LIST </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            AIRPORT TRANSFER PRICE SETTING 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> AIRPORT TRANSFER PRICE  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> AIRPORT TRANSFER LIST </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            QUOTATION 
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CAR RENTAL  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> RICKSHAW RENTAL </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CITY TOUR </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> PICKUP & DROP-OFF </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AIRPORT TRANSFER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> TOUR GUIDE </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> DRIVER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> HOTEL & GUESTHOUSE </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            AGREEMENT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CAR RENTAL  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> RICKSHAW RENTAL </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CITY TOUR </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> PICKUP & DROP-OFF </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AIRPORT TRANSFER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> TOUR GUIDE </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> DRIVER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> HOTEL & GUESTHOUSE </p>
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
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CAR RENTAL  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> RICKSHAW RENTAL </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CITY TOUR </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> PICKUP & DROP-OFF </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AIRPORT TRANSFER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> TOUR GUIDE </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> DRIVER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> HOTEL & GUESTHOUSE </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            RECEIPT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CAR RENTAL  </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> RICKSHAW RENTAL </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> CITY TOUR </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> PICKUP & DROP-OFF </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AIRPORT TRANSFER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> TOUR GUIDE </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> DRIVER </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> HOTEL & GUESTHOUSE </p>
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
                            <a href="<?php echo $base_url;?>partner/rent_planner" class="nav-link">
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
                            PACKAGE HISTORY
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/package_history/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>HISTRORY LIST</p>
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="<?php echo $base_url;?>partner/partner_income_pid_story/" class="nav-link">
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
                           SETTING
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD GROUP USER</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ADD USERS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>UPDATE USERS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SETTING PERMISION</p>
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
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SUPPORT</p>
                            </a>
                        </li>
                    </ul>
					   
				</li>
				<li class="nav-item has-treeview">
                      <a href="<?php echo $base_url;?>partner_login.php?action=logout" class="nav-link"> 
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