<div class="page-sidebar-wrapper">
   <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start ">
                <a href="../dashboard/partner_admin.php" class="nav-link nav-toggle">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

          <?php
             $check_member_type="";
            $id=@$_SESSION['user']->user_id;
            $v_sql = "SELECT * FROM tbl_relationship_users_position WHERE user_id='$id'";
            $result = $connect->query($v_sql);
            if ($result->num_rows > 0){
             if($row = $result->fetch_assoc()){
             $check_member_type=$row['user_position_id'];

            ?>

                <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#cv" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">RESUME</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="cv" aria-expanded="false" style="height: 0px;">
                <a href="../cv/index.php" style="font-size: 11px;" class="list-group-item" data-parent="#cv"><font class="tt zz">MY RESUME</font></a>
                <a href="../cv/view_cv.php" style="font-size: 11px;" class="list-group-item" data-parent="#cv"><font class="tt zz">VIEW RESUME</font></a>
            </div>

               <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#caupon" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">COUPON CARD USER</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="caupon" aria-expanded="false" style="height: 0px;">
                <a href="../coupon_card/index.php" style="font-size: 11px;" class="list-group-item" data-parent="#caupon"><font class="tt zz">COUPON CARD</font></a>
                
            </div>
            


            <?php
             }}
            ?>
             <?php   if( ($check_member_type=="5") || ($check_member_type=="4") ) {
            // car_owner
           ?>
             <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#car" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">VEHICLE RENTAL</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="car" aria-expanded="false" style="height: 0px;">

                    <a href="../vehicle_rental/index.php" class="list-group-item" data-parent="#car"><font class="tt zz">VEHICLE RENTAL</font></a>
            </div>
            <?php
               if($check_member_type=="5") {


            ?>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#aiport" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">AIRPORT TRANSFER</font><span class="aiportet"></span></a>
             <div class="list-group-level1 collapse" id="aiport" aria-expanded="false" style="height: 0px;">
                  <a href="../airport_transfer/" class="list-group-item"><font class="tt zz">AIRPORT TRANSFER</font></a>
            </div>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#pickup" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">PICKUP & DROP-OFF</font><span class="pickupet"></span></a>
             <div class="list-group-level1 collapse" id="pickup" aria-expanded="false" style="height: 0px;">
                 <a href="../pickup_drop_off/" class="list-group-item"><font class="tt zz">PICKUP & DROP-OFF</font></a>
            </div>
           <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#city" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">CITY TOURS (COUNTRYWIDE)</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="city" aria-expanded="false" style="height: 0px;">

                    <a href="../city_tour_detail/index.php" class="list-group-item" data-parent="#city"><font class="tt zz">CITY TOURS (COUNTRYWIDE)</font></a>
            </div>
             
             
           
           
            <?php } ?>
            <?php } ?>
              <?php   if( ($check_member_type=="9") ) {
            // Hotel
           ?>
             <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#car" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">HOTEL & GUESTHOUSE</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="car" aria-expanded="false" style="height: 0px;">

                    <a href="../hotel/index.php" class="list-group-item" data-parent="#car"><font class="tt zz">HOTEL & GUESTHOUSE</font></a>
            </div>

            <?php } ?>

             <?php   if($check_member_type=="4") {
            // car_owner
           ?>
             <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#city" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">CITY TOURS (COUNTRYWIDE)</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="city" aria-expanded="false" style="height: 0px;">

                    <a href="../city_tour_detail/index.php" class="list-group-item" data-parent="#city"><font class="tt zz">CITY TOURS (COUNTRYWIDE)</font></a>
            </div>

            <?php } ?>
               <?php   if( ($check_member_type=="6") ) {
            // Hotel
           ?>
             <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#richshaw" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">RICKSHAW RENTAL </font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="richshaw" aria-expanded="false" style="height: 0px;">

                    <a href="../rick_shaw_rental/index.php" class="list-group-item" data-parent="#car"><font class="tt zz"> RICKSHAW RENTAL </font></a>
            </div>

            <?php } ?>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#rentplanner" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">RENT PLANNER</font><span class="caret"></span></a>
              <div class="collapse list-group-level1" id="rentplanner">
                  <a href="../rent_planner/" class="list-group-item" data-parent="#rentplanner"><font class="tt zz">RENTAL PLANNER</font></a>
              </div> 
             <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#customer" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">PACKAGE</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="customer" aria-expanded="false" style="height: 0px;">

                    <a href="../package/index.php" class="list-group-item" data-parent="#customer"><font class="tt zz">PACKAGE LIST</font></a>
            </div>
             <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#package_history" class="list-group-item" data-toggle="collapse" data-parent="#main-menu" aria-expanded="true"><font style="color:white !important;">PACKAGE HISTRORY</font><span class="caret"></span></a>
             <div class="list-group-level1 collapse" id="package_history" aria-expanded="false" style="height: 0px;">

                    <a href="../package/history.php" class="list-group-item" data-parent="#package_history"><font class="tt zz">HISTRORY LIST</font></a>
                    <a href="../partner_income_pid_story/" class="list-group-item" data-parent="#reportview"><font style="text-transform: uppercase;" class="tt zz">partner income &amp; paid history</font></a>
            </div>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>