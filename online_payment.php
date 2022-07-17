<?php
session_start();
    include_once ('system/config/database.php');
    require_once("header.php");
    require_once 'php-mailjet-v3-simple.class.php';

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
           if(empty($_POST)){
               header("Location: index.php");
           }else{
               $_SESSION['rental_online_payment']=1;
           }
  if(isset($_POST['signup'])) {
  $_SESSION['term_check_pay'] =1;
   }
?>


<div class="container py-5">
	<div class="panel panel-default">
	      <div class="panel-heading text-left">
	        <h2>
            <i class="fa fa-handshake-o" aria-hidden="true">
            </i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'Confirmation Form':'សំណុំបែបបទបញ្ជាក់'; ?>
	        </h2>
              <br/>
	      </div>
	     </div>


    <div class="row">

      <div class="col-md-12">
          <table style="left:10px;right:10px;padding: 10px;" width="100%">

    <tbody>
        <tr style="background:#ec3323; height:55px !important;">

            <th colspan="2"> <span style="color:white;  font-size:12px !important;font-weight:bold !important">Customer Information</span></th>
            <th colspan="2"> <span style="color:white; font-size:12px !important;font-weight:bold !important">Payment Information</span></th>

        </tr>

        <tr>

            <td align="left" valign="left">&nbsp;First Name: </td>

            <td align="left" valign="left"> <span style="color: #001238;font-weight: bold;">&nbsp;<?php echo $_SESSION['f_name']=$f_name=@$connect->real_escape_string($_POST['first_name']); ?></span></td>
            <td align="left" valign="left">&nbsp;Pay Type: </td>

            <td align="right" valign="right"><span style="color: #001238;font-weight: bold;">&nbsp;
              <?php
              $_SESSION['pay_type']=$pay_type=@$connect->real_escape_string($_POST['paytype']);
                if($pay_type=="1") {
                 echo $total_pay_type="100.00%";
                }
                else {

                    echo $total_pay_type="50.00%";
                }
              ?>

            </span></td>

        </tr>

        <tr>

            <td align="left" valign="left">&nbsp;Last Name: </td>

            <td align="left" valign="left"><span style="color: #001238;font-weight: bold;">&nbsp;<?php echo $_SESSION['l_name']= $l_name=@$connect->real_escape_string($_POST['last_name']); ?></span></td>
            <td align="left" valign="left">&nbsp;Amount in US$: </td>
            <td align="right" valign="right"><span style="color: #001238;font-weight: bold;">&nbsp;$<?php  $_SESSION['amount_book']= $amount_book=@$connect->real_escape_string($_POST['amount_book']);
              echo  number_format($amount_book,2);
            ?></span></td>
        </tr>
        <tr>
            <td align="left" valign="left">&nbsp;Gender: </td>
            <td align="left" valign="left"><span style="color: #001238;font-weight: bold;">&nbsp;
              <?php
              echo $_SESSION['gender']=$gender=@$connect->real_escape_string($_POST['gender']);
              ?>
            Female
          </span></td>
            <td align="left" valign="left">&nbsp;Service Change (3%): </td>
            <td align="right" valign="right"><span style="color: #001238;font-weight: bold;">&nbsp;$<?php  $total_charg=@$connect->real_escape_string($_POST['txt_total_charg']);
              echo $_SESSION['total_charg']=number_format($total_charg,2);
            ?></span>
            </td>
        </tr>
        <tr>
            <td align="left" valign="left">&nbsp;Occupation: </td>
            <td align="left" valign="left"><span style="color: #001238;font-weight: bold;">&nbsp;
              <?php  echo $_SESSION['occupation']=$occupation=@$connect->real_escape_string($_POST['occupation']); ?>
            </span></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>&nbsp;Cell Phone: </td>
            <td><span style="color: #001238;font-weight: bold;">&nbsp;
             <?php  echo $_SESSION['phone']=$phone=@$connect->real_escape_string($_POST['phone']); ?>

             </span></td>
            <td style="font-weight:bold !important;font-size:13px !important;">&nbsp;Net Total in US$: </td>
            <td align="right" valign="right"><span style="color: #cb1313;font-weight: bold; font-size:17px !important;">&nbsp;$<?php $tota_pay=@$connect->real_escape_string($_POST['total']);
            echo $_SESSION['total_amount']=number_format($tota_pay,2);
            ?></span></td>
        </tr>
        <tr>
            <td>&nbsp;E-mail: </td>
            <td colspan="2"><span style="color: #001238;font-weight: bold;">&nbsp; <?php  echo $_SESSION['email']=$email=@$connect->real_escape_string($_POST['email']); ?></span></td>
            <td></td>
        </tr>
        <tr></tr>
    </tbody>
</table>
          <br/>
      <h2 align="center" style="font-size:16px !important;margin-top:0px">Purpose of the payment
      </h2>
          <br/>
      <div class="propos" style="margin-left:15px;float: left;border: 1px solid #676767;margin-top: -7px !important;padding:7px; word-wrap: break-word; width: 97%; ">

     <?php  echo $_SESSION['purpose']=$purpose=@$connect->real_escape_string($_POST['purpose']); ?>
    </div>

    <!-- form payment -->

          <div id="aba_main_modal" class="aba-modal">
            <!-- <!— Modal content —> -->
            <div class="aba-modal-content">



               <!-- Include PHP class -->
               <?php
                  require_once 'PayWayApiCheckout.php';
               ?>

               <form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getApiUrl(); ?>" id="aba_merchant_request">
                <?php
                     $transactionId =date("Ymd").''.rand(10,1000000);
                     // $transactionId ="201904014364688";
                     $amount =$tota_pay;
                     $firstName =$f_name;
                     $lastName =$l_name;
                     $phone =$phone;
                     $email =$email;
                     $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'lyna-CarRental/online_payment.php?tranid='.$transactionId;

                  ?>

                  <input type="hidden" name="hash" value="<?php echo PayWayApiCheckout::getHash($transactionId, $amount); ?>" id="hash"/>
                  <input type="hidden" name="tran_id" value="<?php echo $transactionId; ?>" id="tran_id"/>
                  <input type="hidden" name="amount" value="<?php echo $amount; ?>" id="amount"/>
                  <input type="hidden" name="firstname" value="<?php echo $firstName; ?>"/>
                  <input type="hidden" name="lastname" value="<?php echo $lastName; ?>"/>
                  <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                  <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                  <input type="hidden" name="continue_success_url" value="<?php echo $continue_success_url; ?>"/>




              </form>
              </div>
            </div>




    <!-- end from pyment -->




<div class="container" style="margin-top: 75px;margin: 0 auto;">
                   <div style="width: 200px;margin: 0 auto;">


                      <button style="margin-top:20px;margin-bottom:20px" type="button" class="pull-right btn gauto-theme-btn" id="checkout_button" value="Checkout Now">Checkout Now</button>

                   </div>
                </div>

             <link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
             <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script>
                <script>
                   $(document).ready(function () {
                      $('#checkout_button').click(function () {

                         //AbaPayway.checkout();
                          $(location).attr('href',"paynow.php");
                      });
                   });
                </script>



      </div>

    </div>


<link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
   <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script>
      <script>
         $(document).ready(function () {
            $('#checkout_button').click(function () {

             //  AbaPayway.checkout();

            });
         });
      </script>



  </div>

<style type="text/css">
  table td,table td {
    padding: 10px;
  }
  table th {
    padding: 10px;
  }
    table tr span{color: #001238;}
    
    tbody, tfoot, thead, tr, th, td{vertical-align: middle!important;}
    
    
</style>

<?php require_once("footer.php"); ?>
