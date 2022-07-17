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
        <h3 style="padding-top: 0px; margin: -5px; color: #a4509f;">Please Confirm Your Invoice Information</h3>
      </div>
      <div class="panel panel-body">
      	<div style="padding: 20px; padding-top: 0px;width: 80%px; margin: auto;">
          <div class="row">
            <div class="col-md-12">
                <div style="float: right;"><input type="button" class="btn btn-sm btn-primary" value="Confirm Next"></div>
                <br>
                <br>
                <h4 style="background-color: #a4509f; padding-left: 10px;" class="text-white">Invoice information</h4>
                <p>Line 1  <br>
                Line 2 </p>
                <h4 style="background-color: #a4509f; padding-left: 10px;" class="text-white">Packages information</h4>
               <style>
                    table{
                        border-collapse: none;
                        width: 100%;
                        margin-top: -20px;
                    }
                    table, th, td{
                        border : 1px solid black;
                    }
                    table th, table td {
                        text-align: center;
                        vertical-align: center;
                        padding-top: 5px;

                        /* padding: 10px; */
                    }
                    table #header {
                        background-color: #a4509f;
                        color: white;
                        height: 20px;
                    }
                    /* @media only screen and (max-width: 600px) {
                        table, td {
                            background-color: red;
                        }
                    } */
               </style>
               <div class="table-responsive">
                <br>
                <table class="table-bordered">
                        <tr id="header">
                            <td rowspan="2">No</td>
                            <td rowspan="2">Package Description</td>
                            <td rowspan="2">Period QTY</td>
                            <td rowspan="2">Item QTY</td>
                            <td colspan="4">Price In US($)</td>
                        </tr>
                        <tr id="header">
                            <td>Price</td>
                            <td>Discount</td>
                            <td>VAT</td>
                            <td>Amount</td>
                        </tr>
                        <!-- body -->
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                        </tr>
                        <!-- left side and right side donw -->
                        <tr>
                            <td style="border-left: none !important;" colspan="4" rowspan="6">no</td>
                            <td colspan="3">2</td>
                            <!-- <td>2</td>
                            <td>2</td> -->
                            <td>2</td>
                        </tr>
                        <tr>
                            <td colspan="3">2</td>
                            <!-- <td>2</td>
                            <td>2</td> -->
                            <td>2</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: left; padding-left: 10px;">3. Total Amount :</td>
                            <!-- <td>2</td>
                            <td>2</td> -->
                            <td style="background-color: #a4509f; font-weight: bold; color: white;">$23.34</td>
                        </tr>
                        <tr>
                            <td colspan="3">2</td>
                            <!-- <td>2</td>
                            <td>2</td> -->
                            <td>2</td>
                        </tr>
                        <tr>
                            <td colspan="3">2</td>
                            <!-- <td>2</td>
                            <td>2</td> -->
                            <td>2</td>
                        </tr>
                        <tr>
                            <td colspan="3">2</td>
                            <!-- <td>2</td>
                            <td>2</td> -->
                            <td style="background-color: #a4509f; color: white;">2</td>
                        </tr>
                </table>
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