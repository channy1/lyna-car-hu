<?php
    session_start();
    include_once ('system/config/database.php');
    include_once("./menu_authentication.php");
?>
<div class="container top_mobile text-center" style="margin-top: 10px; padding-top: 60px;" id="frmctl">
    <h3 class="pb-5">
        Total amount to pay: <b>$<?php echo $_SESSION['total_amount']; ?></b>
    </h3>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="row pb-5">
        <div class="col-md-4 col-sm-12">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypalform">
                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business" value="sb-zwuyy1084030@personal.example.com">
                <!-- Specify a Buy Now button. -->
                <input type="hidden" name="cmd" value="_xclick">
                <!-- Specify details about the item that buyers will purchase. -->
                <input type="hidden" name="item_name" value="User Registartion Done">
                <input type="hidden" name="item_number" value="<?php echo time(); ?>">
                <input type="hidden" name="amount" value="<?php echo $_SESSION['total_amount']; ?>">
                <input type="hidden" name="currency_code" value="USD">
                <!-- Specify URLs -->
                <input type="hidden" name="return" value="http://choicecart.xyz/bootstrap/success.php">
                <input type="hidden" name="cancel_return" value="http://choicecart.xyz/bootstrap/cancel.php">
                <button type="submit" class="btn btn-primary">Paypal Checkout</button>
            </form>
        </div>
        <div class="col-md-4 col-sm-12">
            <form action="https://stageonline.wingmoney.com/wingonlinesdk/" method="POST" id="wingpayment">
                <input name="sandbox" type="hidden" value="1">
                <input name="amount" type="hidden" id="amount" value='<?php echo $_SESSION['total_amount']; ?>'>
                <input name="username" type="hidden" value="online.lyna">
                <input name="rest_api_key" type="hidden" value="1484369cbd60efaa370bd6a787496df047804d2bdbf37eea685e335738767df37">
                <input name="return_url" type="hidden" value=" http://choicecart.xyz/bootstrap/success.php">
                <input name="bill_till_rbtn" type="hidden" value="0">
                <input name="bill_till_number" type="hidden" value="5140">
                <input name="default_wing" type="hidden" value="0">
                <input name="remark" type="hidden" value="Testing">
                <input type="submit" class="btn btn-primary" value="Wing Checkout">
            </form>
        </div>
        <div class="col-md-4 col-sm-12">
            <?php
                require_once 'PayWayApiCheckout.php';
                
                
                                  $transactionId = time();
                                  $amount =  $_SESSION['total_amount'];
                                  $firstName = 'himanshu';
                                  $lastName = 'singh';
                                  $phone = '093630466';
                                  $email = 'hsingh@sdlcinfotech.com';
                //                        
                ?>
            <form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getApiUrl(); ?>" id="aba_merchant_request">
                <input type="hidden" name="hash" value="<?php echo PayWayApiCheckout::getHash($transactionId, $amount); ?>" id="hash"/>
                <input type="hidden" name="tran_id" value="<?php echo $transactionId; ?>" id="tran_id"/>
                <input type="hidden" name="amount" value="<?php echo $amount; ?>" id="amount"/>
                <input type="hidden" name="firstname" value="<?php echo $firstName; ?>"/>
                <input type="hidden" name="lastname" value="<?php echo $lastName; ?>"/>
                <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                <!--                        <input type="hidden" name="shipping" value="--><?php //echo $shipping; ?><!--"/>-->
            </form>
            <input type="button" class="btn btn-primary" id="checkout_button" value="ABA Pay Checkout">
        </div>
        <link rel="stylesheet" href="https://payway-staging.ababank.com/checkout-popup.html?file=css"/>
        <script src="https://payway-staging.ababank.com/checkout-popup.html?file=js"></script>
        <!— These javaScript files are using for only production —>
        <!--<link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
            <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script> -->
        <script>
            $(document).ready(function () {
            	$('#checkout_button').click(function () {
            		AbaPayway.checkout();
            	});
            });
        </script>
        <br/>
    </div>
    <!--row close-->
</div>
<script>
    function sub_mit(formid){
        alert("#"+formid);
        $("#"+formid).submit();
    }
</script>
<?php require_once("footerpartner.php"); ?>