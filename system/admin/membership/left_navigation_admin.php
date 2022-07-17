<?php
$id_user=@$_SESSION['user']->user_id;
$allow_data = $connect->query("SELECT * FROM tbl_page_allow WHERE user_id='$id_user'");
        $rows = mysqli_fetch_object($allow_data);
?>

<div class="page-sidebar-wrapper">
   <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px; " href="#dashboard" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">DASHBOARD
            </font><span class="caret"></span></a>
                <div class="collapse list-group-level1" id="dashboard">

                    <a href="../admin_detail/profile_update.php" class="list-group-item" data-parent="#dashboard"><font class="tt zz">UPDATE PROFILE</font></a>
                    <a href="../coupon/" class="list-group-item" ><font class="tt zz">COUPON CARD</font></a>

                </div>


            <li>
                <style type="text/css">
                .tt{ 

                    color: #a4509f !important;
                    
                }

                .zz{

                    font-size: 11px !important;
                }
            </style>

            <br>


            <?php
                if($rows->home_page=="1") {
            ?>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#home" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">HOME</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="home">
                    
                    <a href="../partner_banefit/" class="list-group-item" data-parent="#home"><font class="tt zz">TOP MENU</font></a>
                    <a href="../footer_upcoming/" class="list-group-item" ><font class="tt zz">FOOTER</font></a>
                    <a href="../footer_status/" class="list-group-item" ><font class="tt zz">FOOTER STATUTES</font></a>
                    <a href="../pre_info/" class="list-group-item" ><font class="tt zz">PRE-INFORMATION</font></a>
                    <a href="../our_service/" class="list-group-item"><font class="tt zz">OUR SERVICES</font></a>
                    <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#vehichle_rental" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">VEHICLE RENTAL</font><span class="caret"></span></a>

                        <div class="collapse list-group-level1" id="vehichle_rental" style="padding-left: 10px !important;">
                          <a href="../vehicle_rental/" class="list-group-item"><font class="tt zz">VEHICLE RENTAL LIST & PRICE</font></a>
                          <a href="../city_tour/" class="list-group-item"><font class="tt zz">CITY TOURS (COUNTRYWIDE)</font></a>
                          <a href="../airport_transfer/" class="list-group-item"><font class="tt zz">AIRPORT TRANSFER</font></a>
                          <a href="../pickup_drop_off/" class="list-group-item"><font class="tt zz">PICKUP & DROP-OFF</font></a>
                          <a href="../car_renral_pickup_price/" class="list-group-item"><font class="tt zz">CAR RENTAL PICKUP PRICE</font></a>
                        </div>
                    </a>
                    <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#rickshaw_rental" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">RICKSHAW  RENTAL</font><span class="caret"></span></a>
                        <div class="collapse list-group-level1" id="rickshaw_rental" style="padding-left: 10px !important;">
                            <a href="../rick_shaw_rental/" class="list-group-item"><font class="tt zz">RICKSHAW  RENTAL LIST</font></a>
                            <a href="../city_tour/" class="list-group-item"><font class="tt zz">CITY TOURS (COUNTRYWIDE)</font></a>
                            <a href="../airport_transfer/" class="list-group-item"><font class="tt zz">AIRPORT TRANSFER</font></a>
                            <a href="../pickup_drop_off/" class="list-group-item"><font class="tt zz">PICKUP & DROP-OFF</font></a>
                        </div>
                    </a>
                    
                    <a href="../our_customer/" class="list-group-item"><font class="tt zz">OUR CUSTOMER</font></a>
                    <a href="../accessorie rental/" class="list-group-item"><font class="tt zz">ACCESSORIES RENTAL</font></a>
                    
                    <a href="../hotel/" class="list-group-item"><font class="tt zz">HOTEL & GUEST HOUSE</font></a>
                    <a href="../logo/" class="list-group-item"><font class="tt zz">LOGO</font></a>
                    <a href="../event_promotion/" class="list-group-item"><font class="tt zz">EVENT & PROMOTION</font></a>
                    <a href="../info_center/" class="list-group-item"><font class="tt zz">INFO CENTER NEWS</font></a>
                    <a href="../job_annountment/" class="list-group-item"><font class="tt zz">JOB SEEKERS</font></a>
                    <a href="../about_us/" class="list-group-item"><font class="tt zz">ABOUT</font></a>
                    
                    <a href="../contact_us/" class="list-group-item"><font class="tt zz">CONTACT</font></a>
                    <a href="../fa_q/" class="list-group-item"><font class="tt zz">FAQS</font></a>
                    <a href="../public_holiday/" class="list-group-item"><font class="tt zz">DATE HOLIDAYS</font></a>
                </div>
    
<?php
    }
?>

        
        <?php
         if($rows->partner_page=="1") {
        ?>

            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#partner" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">PARTNER LIST</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="partner">
                    <a href="../partner_list/" class="list-group-item" data-parent="#partner"><font class="tt zz">PARTNER LIST</font></a>
                    <a href="../car_owner_list/" class="list-group-item" data-parent="#partner"><font class="tt zz">CAR OWNER LIST</font></a>
                    <a href="../rick_shaw_list/" class="list-group-item" ><font class="tt zz">RICKSHAWS OWNER LIST</font></a>
                    <a href="../tour_guide_list/" class="list-group-item" ><font class="tt zz">TOUR GUIDE LIST & RENTAL PRICE</font></a>
                    <a href="../driver_list/" class="list-group-item"><font class="tt zz">DRIVER LIST & RENTAL PRICE</font></a>
                    <a href="../introducer_list/" class="list-group-item"><font class="tt zz">INTRODUCER LIST</font></a>
                    <a href="../hotel_list/" class="list-group-item"><font class="tt zz">HOTEL & GUESTHOUSE LIST</font></a>
                    <a href="../partner_airport_transfer_list/" class="list-group-item"><font class="tt zz">AIRPORT TRANSFER LIST</font></a>
                    <a href="../partner_pickup_drop_off_list/" class="list-group-item"><font class="tt zz">PICKUP & DROP-OFF LIST</font></a>
                    <a href="../partner_city_tour_list/" class="list-group-item"><font class="tt zz"> CITY TOUR LIST</font></a>
                </div>
    <?php } ?>

            
  <?php
    if($rows->customer_page=="1") {
  ?>

            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#customer" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">CUSTOMER LIST</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="customer">

                    <a href="../customer_list/" class="list-group-item" data-parent="#customer"><font class="tt zz">CUSTOMER LIST</font></a>
                   <a href="../customer_bonus/" class="list-group-item" data-parent="#customer"><font class="tt zz">CUSTOMER BONUS</font></a>
                </div>    
<?php } ?>

<?php
 if($rows->vendor_page=="1") {
?>

            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#vendor" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">VENDOR LIST</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="vendor">

                    <a href="../vendor/" class="list-group-item" data-parent="#vendor"><font class="tt zz">VENDOR'S LIST</font></a>
                    
                </div>    

 <?php } ?>          

         

                <div class="collapse list-group-level1" id="interesting">

                    <a href="../interesting_list/" class="list-group-item" data-parent="#interesting"><font class="tt zz">INTERRESTING LIST</font></a>
                </div>

<?php
if($rows->pakage_page=="1") {
?>
 <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#PACKAGES" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">SYSTEM PACKAGES </font><span class="caret"></span></a>
    <div class="collapse list-group-level1" id="PACKAGES">
        <a href="../admin_package/" class="list-group-item" style="background: #e0dfdf;" data-parent="#01"><font class="tt zz">PACKAGES</font></a>
        <a style="background: #e0dfdf;" href="#pakage_car_owner" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font  class="tt zz">CAR'S OWNER</font><span class="caret"></span></a>
        <div class="collapse list-group-level1" id="pakage_car_owner">
            <a href="../membership?type=car_owner" class="list-group-item" data-parent="#pakage_car_owner" style="padding-left: 26px;"><font class="tt zz">MEMBERSHIP</font></a>
            <a href="../admin_posting_package?type=car_owner" class="list-group-item" data-parent="#pakage_car_owner" style="padding-left: 26px;" ><font class="tt zz">POSTING PACKAGES</font></a>
        </div>  
        <a style="background: #e0dfdf;" href="#pakage_rickshaw_owner" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font  class="tt zz">RICKSHAW'S OWNER</font><span class="caret"></span></a>
        <div class="collapse list-group-level1" id="pakage_rickshaw_owner">
            <a href="../membership?type=rickshaw_owner" class="list-group-item" data-parent="#pakage_rickshaw_owner" style="padding-left: 26px;"><font class="tt zz">MEMBERSHIP</font></a>
            <a href="../admin_posting_package?type=rickshaw_owner" class="list-group-item" data-parent="#pakage_rickshaw_owner" style="padding-left: 26px;" ><font class="tt zz">POSTING PACKAGES</font></a>
        </div> 
        <a style="background: #e0dfdf;" href="#pakage_hotel_guesthouse" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font  class="tt zz"> HOTEL & GUESTHOUSE</font><span class="caret"></span></a>
        <div class="collapse list-group-level1" id="pakage_hotel_guesthouse">
            <a href="../membership?type=hotel_guesthouse" class="list-group-item" data-parent="#pakage_hotel_guesthouse" style="padding-left: 26px;"><font class="tt zz">MEMBERSHIP</font></a>
            <a href="../admin_posting_package?type=hotel_guesthouse" class="list-group-item" data-parent="#pakage_hotel_guesthouse" style="padding-left: 26px;" ><font class="tt zz">POSTING PACKAGES</font></a>
        </div> 
        <a style="background: #e0dfdf;" href="#pakage_tour_guide" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font  class="tt zz">TOUR GUIDE</font><span class="caret"></span></a>
        <div class="collapse list-group-level1" id="pakage_tour_guide">
            <a href="../membership?type=tour_guide" class="list-group-item" data-parent="#pakage_tour_guide" style="padding-left: 26px;"><font class="tt zz">MEMBERSHIP</font></a>
            <a href="../admin_posting_package?type=tour_guide" class="list-group-item" data-parent="#pakage_tour_guide" style="padding-left: 26px;" ><font class="tt zz">POSTING PACKAGES</font></a>
        </div>
        <a style="background: #e0dfdf;" href="#pakage_driver" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font  class="tt zz">DRIVER</font><span class="caret"></span></a>
        <div class="collapse list-group-level1" id="pakage_driver">
            <a href="../membership?type=driver" class="list-group-item" data-parent="#pakage_driver" style="padding-left: 26px;"><font class="tt zz">MEMBERSHIP</font></a>
            <a href="../admin_posting_package?type=driver" class="list-group-item" data-parent="#pakage_driver" style="padding-left: 26px;" ><font class="tt zz">POSTING PACKAGES</font></a>
        </div>
        <a style="background: #e0dfdf;" href="#pakage_introducer" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font  class="tt zz">INTRODUCER</font><span class="caret"></span></a>
        <div class="collapse list-group-level1" id="pakage_introducer">
            <a href="../membership?type=introducer" class="list-group-item" data-parent="#pakage_introducer" style="padding-left: 26px;"><font class="tt zz">MEMBERSHIP</font></a>
            <a href="../admin_posting_package?type=introducer" class="list-group-item" data-parent="#pakage_introducer" style="padding-left: 26px;" ><font class="tt zz">POSTING PACKAGES</font></a>
            <a href="../customer_bonus/" class="list-group-item" data-parent="#pakage_introducer" style="padding-left: 26px;" ><font class="tt zz">BUYING COUPON CARD</font></a>
        </div>
        <a href="../admin_package/" class="list-group-item" style="background: #e0dfdf;" data-parent="#01"><font class="tt zz">CUSTOMER</font></a>
       
    </div>

<?php
    }
?>
          
<?php
 if($rows->qt_page=="1") {
?>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#QUOTATIONS" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">QUOTATIONS </font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="QUOTATIONS">
                    <a href="../quotation_information_form_car/" class="list-group-item" data-parent="#QUOTATIONS"><font class="tt zz">CAR INFORMATION QUOTAION</font></a>
                    <a href="../car_quotations/" class="list-group-item" ><font class="tt zz">CAR RENTAL QUOTATION</font></a>
                    <a href="../quotation_information_form_rickshaw/" class="list-group-item" ><font class="tt zz">RICKSHAWS INFORMATION QUOTAION</font></a>
                    <a href="../richshaw_quotations/" class="list-group-item" ><font class="tt zz">RICKSHAWS REANTAL QUOTAION</font></a>
                    <!-- <a href="../hotel_quotations/" class="list-group-item"><font class="tt zz">HOTEL & GUESTHOUSE QUOTATION</font></a> -->
                     <a href="../quotation_information_form_driver/" class="list-group-item"><font class="tt zz">DRIVER INFORMATION QUOTATION</font></a>
                    <a href="../driver_quotations/" class="list-group-item"><font class="tt zz">DRIVER RENTAL QUOTATION</font></a>
                    <a href="../quotation_information_form_tour_quide/" class="list-group-item" ><font class="tt zz">TOUR GUIDE INFORMATION QUOTATION</font></a>
                    <a href="../tour_guide_quotations/" class="list-group-item" ><font class="tt zz">TOUR GUIDE RENTAL QUOTATION</font></a>
                   <!--  <a href="../city_tour_quotations/" class="list-group-item"><font class="tt zz">CITY TOUR SERVICE QUOTATION</font></a> -->
                   <!--  <a href="../pick_up_quotations/" class="list-group-item"><font class="tt zz">PICKUP & DROP-OFF QUOTATION</font></a> -->
                    <a href="../quotation_information_form_accessories/" class="list-group-item" ><font class="tt zz">ACCESSORIES INFORMATION QUOTATION</font></a>
                    <a href="../accessories_quotations/" class="list-group-item" ><font class="tt zz">ACCESSORIES RENTAL QUOTATION</font></a>
                   <!--  <a href="../ariport_quotations/" class="list-group-item"><font class="tt zz">AIPORT TRANSFER QUOTATION</font></a> -->
                </div>

<?php } ?>

<?php
  if($rows->agree_page=="1") {
?>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#agreement" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">AGREEMENT</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="agreement">
                    <a href="../owner_list/" class="list-group-item" data-parent="#agreement"><font class="tt zz">OWNER OF THE VECHICLE</font></a>
                    <a href="../agreement/" class="list-group-item" data-parent="#agreement"><font class="tt zz">CAR RENTAL AGREEMENT</font></a>
                    <a href="../agreement_list/" class="list-group-item" data-parent="#agreement"><font class="tt zz">CAR RENTAL AGREEMENT LIST</font></a>
                    <a href="../agreement_rickshaw/" class="list-group-item" ><font class="tt zz">RICKSHAWS REANTAL AGREEMENT</font></a>
                    <a href="../agreement_rickshaw_list/" class="list-group-item" ><font class="tt zz">RICKSHAWS REANTAL AGREEMENT LIST</font></a>
                   
                    <a href="../agreement_driver/" class="list-group-item"><font class="tt zz">DRIVER RENTAL AGREEMENT</font></a>
                    <a href="../agreement_driver_list/" class="list-group-item" data-parent="#agreement"><font class="tt zz">DRIVER RENTAL AGREEMENT LIST</font></a>
                    <a href="../agreement_tour/" class="list-group-item" ><font class="tt zz">TOUR GUIDE RENTAL AGREEMENT</font></a>
                    <a href="../agreement_tour_list/" class="list-group-item" ><font class="tt zz">TOUR GUIDE RENTAL AGREEMENT LIST</font></a>
                    <a href="../agreement_accessories/" class="list-group-item" ><font class="tt zz">ACCESSORIES RENTAL AGREEMENT</font></a>
                    <a href="../agreement_accessories_list/" class="list-group-item" ><font class="tt zz">ACCESSORIES RENTAL AGREEMENT LIST</font></a>
                    <a href="../agreement_car_sale/" class="list-group-item" ><font class="tt zz">CAR SALE AGREEMENT</font></a>
                    <a href="../agreement_car_sale/list_sale.php" class="list-group-item" ><font class="tt zz">CAR SALE LIST</font></a>
                    
                </div>

<?php } ?>
<?php
 if($rows->invoice_page=="1") {
?>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#invoice" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">INVOICE</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="invoice">

                    <a href="../car_invoice/" class="list-group-item" data-parent="#invoice"><font class="tt zz">CAR RENTAL INVOICE</font></a>
                    <a href="../richshaw_invoice/" class="list-group-item" ><font class="tt zz">RICKSHAWS REANTAL INVOICE</font></a>
                    <!-- <a href="../hotel_invoice/" class="list-group-item"><font class="tt zz">HOTEL & GUESTHOUSE INVOICE</font></a> -->
                    <a href="../driver_invoice/" class="list-group-item"><font class="tt zz">DRIVER RENTAL INVOICE</font></a>
                    <a href="../tour_guide_invoice/" class="list-group-item" ><font class="tt zz">TOUR GUIDE RENTAL INVOICE</font></a>
                   <!--  <a href="../city_tour_invoice/" class="list-group-item"><font class="tt zz">CITY TOUR SERVICE INVOICE</font></a>
                    <a href="../pick_up_invoice/" class="list-group-item"><font class="tt zz">PICKUP & DROP-OFF INVOICE</font></a> -->
                    <a href="../accessories_invoice/" class="list-group-item" ><font class="tt zz">ACCESSORIES RENTAL INVOICE</font></a>
                   <!--  <a href="../ariport_invoice/" class="list-group-item"><font class="tt zz">AIRPORT INVOICE</font></a> -->
                </div>
<?php } ?>

<?php
 if($rows->rent_planer_page=="1") {
?>


            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#rentplanner" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">RENT PLANNER</font><span class="caret"></span></a>
                <div class="collapse list-group-level1" id="rentplanner">
                    <a href="../rent_planner/" class="list-group-item" data-parent="#rentplanner"><font class="tt zz">RENTAL PLANNER</font></a>
                </div>
<?php } ?>

<?php
 if($rows->report_page=="1") {
?>

            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#reportview" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">REPORTS</font><span class="caret"></span></a>


                <div class="collapse list-group-level1" id="reportview">

                    <a href="../maintenance_repair/" class="list-group-item" data-parent="#reportview"><font class="tt zz">MAINTENANCE & REPAIR REPORT</font></a>
                    <a href="../expens_history_report/" class="list-group-item" data-parent="#reportview"><font class="tt zz">EXPENSE HISTORY REPORT</font></a>
                    <a href="../rental_report/" class="list-group-item" data-parent="#reportview"><font class="tt zz">RENTAL REPORT</font></a>
                    <a href="../paid_history/" class="list-group-item" data-parent="#reportview"><font style="text-transform: uppercase;" class="tt zz">Customer income & paid history</font></a>
                    <a href="../report_sale_vehicle/" class="list-group-item" data-parent="#reportview"><font style="text-transform: uppercase;" class="tt zz">vehicle sale reports</font></a>
                    <a href="../partner_income_pid_story/" class="list-group-item" data-parent="#reportview"><font style="text-transform: uppercase;" class="tt zz">partner income & paid history</font></a>
                   
                   
                
                </div>
<?php } ?>
           
  <?php
    if($rows->custom_report_page=="1") {
  ?>

            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#customizedreport" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">CUSTOMIZED REPORT [TOP]</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="customizedreport">                   
                    <a href="../thank_you_letter/" class="list-group-item" data-parent="#customizedreport"><font class="tt zz">THANK YOU LETTER LIST</font></a>
                     <a href="../daily_duties/" class="list-group-item" data-parent="#customizedreport"><font class="tt zz">DAILY DUTIES</font></a>
                    
                    <a href="../office_phone_list/" class="list-group-item"><font class="tt zz">OFFICE PHONE LIST </font></a>
                    <a href="../month_comission_calulate/" class="list-group-item"><font class="tt zz">MONTHLY COMISSION CALCULATION   </font></a>
                   
                    
                </div>
<?php
  }
?>

  <?php
     if($rows->account_page=="1") {
  ?>

            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#account" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">ACCOUNTING SYSTEM</font><span class="caret"></span></a>
                <div class="collapse list-group-level1" id="account">
                    <a style="text-transform: uppercase;" href="../accounting/revenue_list.php" class="list-group-item" data-parent="#account"><font class="tt zz">Revenue</font></a>
                    <a style="text-transform: uppercase;" href="../accounting/expense_list.php" class="list-group-item" data-parent="#account"><font class="tt zz">Expense</font></a>


                    <a style="text-transform: uppercase;" href="../accounting/profit_list.php" class="list-group-item" data-parent="#account"><font class="tt zz">Profit & Loss</font></a>

                    <a style="text-transform: uppercase;" href="../accounting/revenue_category.php" class="list-group-item" data-parent="#account"><font class="tt zz">Revenue Category</font></a>
                    <a style="text-transform: uppercase;" href="../accounting/expense_category.php" class="list-group-item" data-parent="#account"><font class="tt zz">Expenes Category</font></a>


                     <a style="text-transform: uppercase;" href="../accounting/expense_request.php" class="list-group-item" data-parent="#account">
                        <font class="tt zz">EXPENSE REQUEST FORM</font></a>

                    <a style="text-transform: uppercase;" href="../accounting/petty_cash_record_print.php" class="list-group-item" data-parent="#account">
                        <font class="tt zz">PETTY CASH RECORD</font></a>


                     <a style="text-transform: uppercase;" href="../accounting/cash_voucher.php" class="list-group-item" data-parent="#account">
                        <font class="tt zz">CASH VOUCHER</font></a>

                  

                    
                </div>
<?php } ?>

<?php
 if($id_user=="5") {
?>
            <a style="background-color: #a4509f; color: #a4509f; font-size: 11px;" href="#modules" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><font style="color:white !important;">MODULES MANAGEMENT</font><span class="caret"></span></a>

                <div class="collapse list-group-level1" id="modules">

                    <a href="../user/" class="list-group-item" data-parent="#modules"><font class="tt zz">USER MANAGEMENT</font></a>
                  
                                
                </div>
    <?php } ?>
            </li>
            
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>