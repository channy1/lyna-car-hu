<!-- header included  -->
<?php 
    // include_once("./menu_authentication.php"); 
    require_once("./system/config/database.php");
    // require_once("./system/config/athonication.php");
?>
<?php 
    require_once("./packages_header.php");
?>

<!-- container section -->

<div class="container" style="margin-top: 10px; padding-top: 100px; color: #a4509f !important; ">
   <!--  <div style="height: 210px; width: 100%">
   </div> -->
   <br>
   <div class="panel panel-default" style="color: #a4509f !important;">
      <div class="panel-heading text-center">
        <h3 style="padding-top: 0px; margin: -5px; color: #a4509f;">Please Select Tour Guide Package</h3>
      </div>
      <div class="panel panel-body" id="bodys">
      	<div style="padding: 20px;width: 80%px; margin: auto;">
          <div class="row">
            <div class="col-sm-4 ">
                <div id="panel-package" class="panel panel-default">
                    <p id="title">Plan A<p>
                    <p>description</p>
                    <p>1 years to 2 years</p>
                    <p>Price : $___/ Year</p>
                    <br>
                    <input type="button" name="planc" value="SELECT PLAN" class="btn btn-select">
                </div>
            </div>
            <div class="col-sm-4">
                <div id="panel-package" class="panel panel-default">
                    <p id="title">Plan B<p>
                    <p>description</p>
                    <p>3 years to 4 years</p>
                    <p>Price : $___/ Year</p>
                    <br>
                    <input type="button" name="planc" value="SELECT PLAN" class="btn btn-select">
                </div>
            </div>
            <div class="col-sm-4">
                <div id="panel-package" class="panel panel-default">
                    <p id="title">Plan C<p>                    
                    <p>description</p>
                    <p>5 years to 6 years</p>
                    <p>Price : $___/ Year</p>
                    <br>
                    <input type="button" name="planc" value="SELECT PLAN" class="btn btn-select">
                </div>
            </div>
          </div>
      	</div>
      </div>
 
    </div>

  <!-- model alert for customer click -->

</div>
<!-- finished container section -->
<!-- inlcude footer buttom -->

<?php 
    require_once("./footerpartner.php"); 
?>