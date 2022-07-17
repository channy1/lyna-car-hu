<!-- header included  -->
<?php 
    
    require_once("./system/config/database.php");
   
?>
<?php include_once("./menu_authentication.php") ?>
<!-- container section -->

<div class="container py-5" style="color: #a4509f !important; ">
   <!--  <div style="height: 210px; width: 100%">
   </div> -->
   <div class="panel panel-default py-5">
      <div class="panel-heading text-center">
        <h3 style="padding-top: 0px;">Are you Customer or Partner?</h3>
      </div>
      <div class="panel panel-body">
          <h4 style="color: #a4509f;" class="text-center pb-5 mt-3">Please select specific one below.</h4>
      	 <div class="col-lg-8 col-md-12 col-sm-12 m-auto">
              <div class="row">
      		
                  
                  <div class="col-md-6 col-sm-12"><div id="myBtn" class="form-group" style="text-align: center;">
      			<a class="form-control btn" style="width: 340px; margin: auto; color: white; background-color: #a4509f; padding:12px 0!important;" href="./register_customer_account.php"><span><i class="fa fa-address-card"> </i> </span>Register as Customer</a>
      		</div></div>
                   <div class="col-md-6 col-sm-12"><div class="form-group" style="text-align: center;">	
	            <a class="form-control btn" style="width: 340px; margin: auto; color: white; background-color: #a4509f; padding:12px 0!important;" href="./register_partner_account.php"><span><i class="fa fa-handshake-o"> </i> </span>Register as Partner
	            </a>
      		</div></div>
      		
      		
          <!-- ./register_customer_account.php -->
      		
      	</div>
      </div>
          </div>
 
      <!-- The Modal -->
     <!-- <div id="myModals" class="modals">

      
        <div class="modal-contents">
          <div class="modal-headers text-center">
            <h4 style="margin-bottom: 0px; color: #a4509f" class="text-center">Register by yourself or by introducer?</h4> <span class="close">&times;</span>
          </div>
          <div class="modal-bodys">
            <br>
                <div class="form-group" style=" width: 40%; margin: auto;">
                  <a href="./register_customer_account.php" class="btn form-control" style="background-color: #a4509f; color: white;">By Yourself</a>
                </div>
                <br>  
                <div class="form-group" style=" width:40% ;margin: auto;">
                  <a href="./register_customer_introducer_account.php" class="btn form-control" style="background-color: #a4509f; color: white;">By Introducer</a>
                </div>
                <br>
          </div>
        </div>
      </div>-->
      <!-- script for model -->
     <!--  <script>
          // Get the modal
          var modals = document.getElementById('myModals');

          // Get the button that opens the modal
          var btn = document.getElementById("myBtn");

          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];

          // When the user clicks the button, open the modal 
          btn.onclick = function() {
            modals.style.display = "block";
          }

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
            modals.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modals) {
              modals.style.display = "none";
            }
          }
      </script> -->

      <!-- finished script for model -->
  </div>

  <!-- model alert for customer click -->

</div>

<!-- finished container section -->
<!-- inlcude footer buttom -->
<?php require_once("footerpartner.php"); ?>