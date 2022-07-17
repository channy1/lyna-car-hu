<?php

?>
<div class="page-sidebar-wrapper">
   <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="../dashboard/customer_admin.php" class="nav-link nav-toggle">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
          <!--   <li class="nav-item start ">
                <a href="../customer_profile/profile_update.php" class="nav-link nav-toggle">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Update Profile</span>
                </a>
            </li> -->

            <a href="#sub-menu_account" class="list-group-item" data-toggle="collapse" data-parent="#main-menu">
                My Account<span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu_account">
                    <a href="../customer_profile/profile_update.php" class="list-group-item" data-parent="#sub-menu">Update Profile</a>
                    
                </div>

            <a href="#sub-menu" class="list-group-item" data-toggle="collapse" data-parent="#main-menu">
               My HISTRORY<span class="caret"></span></a>
                <div class="collapse list-group-level1" id="sub-menu">
                    <a href="../customer_profile/tour.php" class="list-group-item" data-parent="#sub-menu">INTERESTING PLACE</a>
                    <a href="#" class="list-group-item" data-parent="#sub-menu">VEHICLE RENTAL</a>
                </div>
            
            
            
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>