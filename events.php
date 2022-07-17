<style>
table,table-total{font-family:'Rubik',sans-serif;}
table tr th.t-head{background:#808080!important;color: #fff;}
.nice-select{width: 65% !important;
    float:none !important;
    margin: 0 auto;}
table tr td button.cancel_btn i{color:#000;}
table.table-total tr{background: #808080 !important; color:#fff;border-bottom: 2px dashed #fff;}
table.table-total tr:last-child{border-bottom:none;}
table.table-total tr td{padding:12px !important;}
button.chekout_btn{width:100%;}
.table td {vertical-align: middle !important;}
@media (max-width: 991px) and (min-width: 767px){
.table td {vertical-align: middle !important;}   
}
@media (max-width: 767px) and (min-width: 576px){
.cart_btn_div {
    float: none !important;
}
.cart_btn_div button{width:100%;}
.total_crt_div{margin-top:20px;}
}

@media (max-width:575px) and (min-width: 545px){
.cart_btn_div {
    float: none !important;
}
.cart_btn_div button{width:100%;}
.total_crt_div{margin-top:20px;}
.form-control{width:71% !important;}
.nice-select {
    width: 100% !important;}
}
@media (max-width:544px) and (min-width: 529px){
 .form-control{width:70% !important;}
 .cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
    
}
@media (max-width:528px) and (min-width: 514px){
    .form-control{width:69% !important;}
 .cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
}
@media (max-width:513px) and (min-width: 500px){
.form-control{width:68% !important;}
 .cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
}
@media (max-width:499px) and (min-width: 476px){
.form-control{width:67% !important;}
 .cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
}
@media (max-width:476px) and (min-width: 474px){
.cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
.total_crt_div{margin-top:20px;}
.form-control{width:72% !important;}
.breadcromb-box h1{font-size:20px !important;}
.breadcromb-box h2 {font-size: 24px !important;}
.event h2 {font-size: 30px !important;}
.form-control{width:66% !important;}
.nice-select {
    width: 100% !important;}
}
@media (max-width:473px) and (min-width: 416px){
.cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
.total_crt_div{margin-top:20px;}
.form-control{width:65% !important;}
.breadcromb-box h1{font-size:20px !important;}
.breadcromb-box h2 {font-size: 24px !important;}
.event h2 {font-size: 30px !important;}

.nice-select {
    width: 100% !important;}
}
@media (max-width: 414px) and (min-width:374px){
.cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
.total_crt_div{margin-top:20px;}
.form-control{width:72% !important;}
.breadcromb-box h1{font-size:20px !important;}
.breadcromb-box h2 {font-size: 24px !important;}
.event h2 {font-size: 30px !important;}
.form-control {width: 54% !important;font-size: 12px !important;}
.countdown-box{width:73px !important;}
.nice-select {
    width: 100% !important;}
}

@media (max-width: 360px) and (min-width:320px){
 .cart_btn_div {float: none !important;}
.cart_btn_div button{width:100%;}
.total_crt_div{margin-top:20px;}
.coupon_btn{padding: 5px !important;font-size: 10px !important;}
.breadcromb-box h1{font-size:20px !important;}
.breadcromb-box h2 {font-size: 24px !important;}
.event h2 {font-size: 30px !important;}
.form-control {width: 71% !important;font-size: 10px !important;}
.countdown.rectangle.medium .countdown-box{width:68px !important;}
table tr td button.cancel_btn i{font-size:10px;}
.table td{font-size:10px !important; padding:0 !important;}
.cancel_btn{padding:0 !important;}
table tr th.t-head{font-size: 12px;}
.nice-select {
    width: 100% !important;
}
@media (max-width:374px){
.form-control{width:55% !important;}
    
}
@media (max-width:320px){
 table tr td button.cancel_btn i{font-size:10px;}
.table td{font-size:10px !important; padding:0 !important;}
.cancel_btn{padding:0 !important;}
table tr th.t-head{font-size: 12px;} 
.nice-select {
    width: 100% !important;}
    
}

    




</style>



<?php
    include_once 'system/config/database.php';
?>

<?php
	$edit_id = $_GET["id"];
    $query = "SELECT * FROM tbl_event_promotion WHERE e_pro_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$e_pro_id = $row["e_pro_id"];
			$e_title = $row["title"];
			$e_title_kh = $row["title_kh"];
			$image=$row["images"];
			$e_description = $row["description"];
			$e_description_kh = $row["description_kh"];
			$e_type= $row["event_type"];
			$event_date = $row["event_date"];
			$event_time= $row["event_time"];
			$event_location = $row["event_location"];
			$event_ticket= $row["event_ticket"];
        }
    }else{
		echo "Home";
	}



	if(!empty($_POST)){

		$name = @$connect->real_escape_string($_POST['name']);
		$phone = @$connect->real_escape_string($_POST['phone_number']);
		$email = @$connect->real_escape_string($_POST['email']);

		$query_add = "INSERT INTO event_registeration(
			`name`,
			`phone`,
			`email`,
			`event_id`,
			`created_on`
			) VALUES(
			'$name',
			'$phone',
			'$email',
			'$edit_id',
			now()
		)";
		//exit;

		if($connect->query($query_add)){
			$sms = '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Successfull!</strong> Your Event Successfully Register
			</div>';
		}else{
			$sms = '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Error!</strong> '.mysqli_error($connect).'...
			</div>';
		}
	}


?>




<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="">
    <!-- Title -->
    <title>Lyna Car Rental</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon.png">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!--Font Awesome css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--Magnific css-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--Owl-Carousel css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!--Animate css-->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!--Datepicker css-->
    <link rel="stylesheet" href="assets/css/jquery.datepicker.css">
    <!--Nice Select css-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- Lightgallery css -->
    <link rel="stylesheet" href="assets/css/lightgallery.min.css">
    <!--ClockPicker css-->
    <link rel="stylesheet" href="assets/css/jquery-clockpicker.min.css">
    <!--Slicknav css-->
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!--Site Main Style css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!--Responsive css-->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--flaticon css-->
    <link type='text/css' rel='stylesheet' href='assets/css/flaticon.css'>
     <link type='text/css' rel='stylesheet' href='assets/css/jquery.fancybox.min.css'>

</head>

<body>

   <!-- fixed social media-->

    <div class="socailbtn">
  <div class="hodesocailbox">
   <div class="socailbox"><a href="https://www.facebook.com/Lyna-CarRentalCom-705428602878507/" target="_blank"><img class="img" title="Visite Our Facebook Page" src="assets/img/social/facebook.png"></a></div>
   <div class="socailbox" data-toggle="modal" data-target="#myModal"><img class="img" title="Visite Our Viber ID" src="assets/img/social/virber.png"></div>
   <div class="socailbox" data-toggle="modal" data-target="#whatsup"><img class="img" title="Visite Our WhatsApp ID" src="assets/img/social/whatsapp.png"></div>
   <div class="socailbox"><a href="https://twitter.com/LCarrental" target="_blank"><img class="img" title="Visite Our Twitter Page" src="assets/img/social/twitter.png"></a></div>
   <div class="socailbox"><a href="https://plus.google.com/u/1/103316012134737513928" target="_blank"><img class="img" title="Visite Our G+ Page" src="assets/img/social/gg.png"></a></div>
   <div class="socailbox" data-toggle="modal" data-target="#line"><img class="img" title="Visite Our Line ID" src="assets/img/social/line.png"></div>
   <div class="socailbox"><a href="https://www.linkedin.com/in/lyna-carrental-a37410138/" target="_blank"><img class="img" title="Visite Our LinkedIn Page" src="assets/img/social/linkin.png"></a></div>

   <div class="socailbox"><a href="https://www.pinterest.com/lynacarrental/" target="_blank"><img class="img" title="Visite Our Pinterest Page" src="assets/img/social/pinterest.png"></a></div>

   <div class="socailbox" data-toggle="modal" data-target="#wechat"><img class="img" title="Visite Our WeChat ID" src="assets/img/social/wechat.png"></div>

   <div class="socailbox"><a href="" target="_blank"><img class="img" title="Visite Our Instagram Page" src="assets/img/social/instgram.png"></a></div>
  </div>

</div>

    <!-- fixed social media-->



<nav class="navbar navbar-expand-sm sticky-top navbar-dark gauto-mainmenu-area py-2">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="assets/img/footer-logo.png" alt="footer-logo"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar1">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="account_type_login.php">Log In</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




      <!-- Breadcromb Area Start -->
      <section class="gauto-breadcromb-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcromb-box">
                     <h1><?php echo $e_title; ?></h1>
                       <h2>WILL BE OPENED IN:</h2>

                      <div class="countdown medium rectangle countdown-light py-4">
                      <div class="countdown-container"><div class="countdown-box"><div class="number" id="days">0</div><span>Days</span></div><div class="countdown-box"><div class="number" id="hours">00</div><span>Hours</span></div><div class="countdown-box"><div class="number" id="minutes">00</div><span>Minutes</span></div><div class="countdown-box"><div class="number" id="seconds">00</div><span>Seconds</span></div></div></div>

                      <p class="pt-3">World’s No.1 Seminar to connect the world’s best to all who hungered for success.</p>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcromb Area End -->

      <!-- event info box -->
     <section class="event-info-box">
    <div class="container">
            <div class="row text-center">
                <div id="time-elapsed"></div>
                <div class="col-lg-3">
						<div class="event-info-icon"><i class="fa fa-calendar fa-2x"></i>
						</div>
						<div class="event-info-content">
							<div class="info-title">DATE</div>
							<div class="info-description"><?php echo date('d M, Y', strtotime($event_date)); ?></div>
						</div>
					</div>

                <div class="col-lg-3">
						<div class="event-info-icon"><i class="fa fa-map-marker fa-2x"></i>
						</div>
						<div class="event-info-content">
							<div class="info-title">LOCATION</div>
							<div class="info-description"><?php echo @$event_location; ?></div>
						</div>
					</div>

                <div class="col-lg-3">
						<div class="event-info-icon"><i class="fa fa-ticket fa-2x"></i>
						</div>
						<div class="event-info-content">
							<div class="info-title">TICKETS</div>
							<div class="info-description"><?php echo @$event_ticket; ?> Tickets</div>
						</div>
					</div>

                <div class="col-lg-3">
						<div class="event-info-icon"><i class="fa fa-microphone fa-2x"></i>
						</div>
						<div class="event-info-content">
							<div class="info-title">SPEAKERS</div>
							<div class="info-description">Renowned Speakers</div>
						</div>
					</div>


                </div>
               </div>
     </section>
     <!-- form section box -->
    <section class="gauto-offers-area section_70 event">
    <div class="container">
            <div class="row">

                <div class="col-lg-12 col-sm-12">



                        <h2><?php echo $e_title; ?></h2>


                    <p>
                         <?php echo $e_description; ?>
                    </p>
					</div>

			</div>



        <div class="row">

            <div class="col-lg-12 col-sm-12">


                <br/>
                <h4>Ticket Details:</h4>
                <table class="table table-bordered mt-3">
                    <thead>
                    <tr>
                        <th class="text-center t-head">Ticket Name</th>
                        <th class="text-center t-head">Ticket Price</th>
                        <th class="text-center t-head">Ticket Quantity</th>
                        <th class="text-center t-head">Sub Total</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $v_sql = "SELECT * FROM event_tickets where event_id=$edit_id ";
                    $result = $connect->query($v_sql);

                    if ($result->num_rows > 0) {
                        $am_c=0;
                    while ($row = $result->fetch_assoc()) {
                        $am_c++;
                    ?>
                    <tr>
                        <td style=width:50%><?php echo $row['ticket_name']; ?></td>
                        <td class="text-right" >$<span id="tktprice<?php echo $am_c ?>"><?php echo $row['ticket_price']; ?></span></td>
                        <td>
                            <?php if($row['quanitity']>=10){ ?>
                            <select onchange='cal_price("<?php echo $am_c; ?>", this.value);' id="<?php echo $am_c; ?>" class="ticketqty">
                                <option>Select quantity</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        <?php }else { ?>
                                <select onchange='cal_price("<?php echo $am_c; ?>" , this.value);' id="<?php echo $am_c; ?>" class="ticketqty">
                                    <option>Select quantity</option>
                                     <?php for($i=1;$i<=$row['quanitity']; $i++){ ?>
                                         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>


                        <?php } ?>


                        </td>
                            <td class="text-right ">$<span id="single_amount<?php echo $am_c ?>">0</span></td>
                        
                    </tr>
                    
                        
                    
                    <?php } } ?>

                    </tbody>
                </table>

            </div>





        </div>
        <div class="container">
        <div class=row>
            <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12 ">
            <div class="form-group form-inline">
  
  <input type="text" class="form-control mr-2" placeholder="Coupon Code">
  <button class="btn coupon_btn bg-warning text-white">Apply Coupon</button>
</div>
</div>
 <div class="col-lg-6 col-md-3 col-sm-12 col-xs-12 ">
<div class="cart_btn_div pull-right">
   <!-- <button class="btn btn-danger text-white">Update Cart</button>-->
</div>
</div>
</div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 total_crt_div">
                    <h5 class="text-center">Cart Total</h5>
                    <table class="table table-bordered table-total mt-2">
                        <tr>
                            <td class="text-right">Sub Total</td>
                            <td class="text-right">$<span id="subtotal">0</span></td>
                        </tr>
                        <tr>
                            <td class="text-right">Total</td>
                            <td class="text-right">$<span id="total">0</span></td>
                        </tr>
                    </table>
                        <button id="checkoutbutton" class="btn btn-danger text-white chekout_btn">Proceed To Checkout</button>

                </div>
            </div>
        </div>
     </section>
     <!-- form section box -->

     <!-- event schedule  -->
    <!--<section id="tabs">
	<div class="container">
		<h6 class="section-title h1">Event Schedule</h6>
		<div class="row">
			<div class="col-xs-12 ">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Day 01<br>08.09.2019</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Day 02<br>12.09.2019</a>

					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
					</div>

				</div>

			</div>
		</div>
	</div>
</section>-->
     <!-- event schedule end -->



<br><br>

   <?php include 'footer.php'; ?>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

	$(function(){
		var calcNewYear = setInterval(function(){
			date_future = new Date('<?php echo ($event_date); ?>');
			date_now = new Date();

			seconds = Math.floor((date_future - (date_now))/1000);
			minutes = Math.floor(seconds/60);
			hours = Math.floor(minutes/60);
			days = Math.floor(hours/24);

			hours = hours-(days*24);
			minutes = minutes-(days*24*60)-(hours*60);
			seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

			$("#time").text("Time until new year:\nDays: " + days + " Hours: " + hours + " Minutes: " + minutes + " Seconds: " + seconds);
			$('#days').text(days);
		$('#hours').text(hours);
		$('#minutes').text(minutes);
		$('#seconds').text(seconds);
		},1000);
	});

          var total=0;
          var subtotal=0;
          var total_t=<?php echo $am_c; ?>;
	  function cal_price(count,tc){

	      $("#single_amount"+count).text(tc*parseInt($("#tktprice"+count).text()));
           total=0;
          subtotal=0;
	      for(i=1;i<=parseInt(total_t);i++){
                   subtotal=subtotal+parseInt(($("#single_amount"+i).text()));
          }

          total=subtotal;
	        $("#total").text(total);
            $("#subtotal").text(subtotal);
      }

$("#checkoutbutton").click(function(){
    if(total==0){
        swal("", "Please Select at least one ticket.", "warning");
    }else{
         $("#t_amount").text(total);
        $("#myModal").modal('show');
    }

});

   function eventformsubmit(){
        e.preventDefault();
          alert();
         // return false;
    }
</script>




   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
       <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4 class="modal-title"></h4>
               </div>
               <div class="modal-body">



                   <form  onsubmit="eventformsubmit()" method="post">
                       <div class="form-group">
                           <h4 class="text-center">$<span id="t_amount">0</span></h4>
                       </div>
                       <div class="form-group">
                           <label for="fname">First Name <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="fname" name="fname" required>
                       </div>
                       <div class="form-group">
                           <label for="lname">Last Name <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="lname" name="lname" required>
                       </div>

                       <div class="form-group">
                           <label for="email">Email <span style="color:red">*</span></label>
                           <input type="email" class="form-control" id="email" name="email" required>
                       </div>


                       <div class="form-group">
                           <label for="lname">Phone <span style="color:red">*</span></label>
                           <input type="text" class="form-control" id="phone" name="phone" required>
                       </div>
                       <input type="hidden" name="tickets_id" id="tickets_id">
                       <input type="hidden" name="tickets_qty" id="tickets_qty">

                       <button type="submit" class="btn btn-success">Save</button>
                   </form>



               </div>
               <!--<div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>-->
           </div>

       </div>
   </div>

   </div>




</body>

</html>
