<?php
 include_once '../../config/database.php';
?>
<html lag="en" class="dj_webkit dj_chrome dj_contentbox"><head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }

        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        .btn {
            height: 40px;
            min-width: 100px;
        }

        .add-link {
            background-color: rgb(224, 15, 177);
            width: 90px;
            margin-top: 2px;
            color: #fff;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
        }

        .fullside {
            width: 98%;
            height: 30px;
        }

        .full {
            width: 100%;
        }

        body, html {
            font-size: 96%;
            font-family: 'Kh Battambang', 'Khmer Battambang', Arial, Helvetica, sans-serif;
            /*font-family:Arial,serif !important;*/ /*font-family:'Khmer OS Battambang'*/
        }

        .normal, .alternate {
            font-size: 90% !important;
        }

        /*body, html { font-family:helvetica,arial,sans-serif; font-size:95%; }*/
        * {
            padding: 0;
            margin: 0;
        }

        fieldset {
            font-family: inherit;
        }

        .border {
            border: 1px solid #ccc;
            height: 100%;
            margin: 5px;
            padding: 5px;
        }

        .border1 {
            border: 1px solid #ccc;
            height: 100%;
            margin: 5px;
            margin-left: 0px;
            padding: 5px;
        }

        @media print {
            body {
                font-family: Arial !important;
                font-weight: bold;
            }

            span {

                -webkit-print-color-adjust: exact !important;
            }

            label {
                font-size: 11px !important;
            }

            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: left;

            }

            .col-sm-12 {
                width: 100%;
            }

            .col-sm-11 {
                width: 91.66666666666666%;
            }

            .col-sm-10 {
                width: 83.33333333333334%;
            }

            .col-sm-9 {
                width: 75%;
            }

            .col-sm-8 {
                width: 66.66666666666666%;
            }

            .col-sm-7 {
                width: 58.333333333333336%;
            }

            .col-sm-6 {
                width: 50%;
            }

            .col-sm-5 {
                width: 41.66666666666667%;
            }

            .col-sm-4 {
                width: 33.33333333333333%;
            }

            .col-sm-3 {
                width: 25%;
            }

            .col-sm-2 {
                width: 16.666666666666664%;
            }

            .col-sm-1 {
                width: 8.333333333333332%;
            }

            .term {
                font-size: 9px !important;
            }

            #txtthank {
                font-size: 12px !important;
            }

            .box-20 {
                width: 10% !important;

            }

            .box-35 {
                width: 20% !important;
            }

            .border {
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .head1 {
                display: inline-block !important;
            }

            h2 {
                font-weight: normal !important;
                font-size: 14px !important;

            }

            h1 {
                font-weight: normal !important;
            }

            table {
                page-break-inside: auto
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto
            }

            thead {
                display: table-header-group
            }

            tfoot {
                display: table-footer-group
            }
        }
    </style>
    </head>
    <body class="soria">
    <!--  <div data-dojo-type="dijit/layout/BorderContainer" style="width: 100%; height: 100%;"> -->
    <!-- <div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="region:'top'"> -->
    <table width="100%">
        <tbody><tr>
            <td colspan="2" valign="top" style="position: fixed;width: 100%; z-index: 1;top: 0;">
                  

           
            </td>
        </tr>
        <tr>
            <td colspan="2" height="70px;"></td>
        </tr>
        <tr>
            <td id="header-left" valign="top" width="220px">
                                    	<div id="header-left">
																
	</div>
	<style>
	.current-left{  background: none repeat scroll 0 0 #EDF7F8 !important;}
	</style>                            </td>
            <td valign="top">
                                


	<title>View Receipt</title>
	
<br>
 <?php
                          $id=$_GET['id'];
                         $v_sql = "SELECT * FROM tbl_agreement
                          LEFT JOIN tbl_users
                          ON tbl_users.user_id=tbl_agreement.user_id
                          LEFT JOIN tbl_user_agreement
                          ON tbl_agreement.user_id=tbl_user_agreement.customer_id
                          LEFT JOIN tbl_rick_shaw_rental_last
                          ON tbl_agreement.car_id=tbl_rick_shaw_rental_last.ve_id
                          WHERE tbl_agreement.ag_id='$id'
                          ORDER BY tbl_agreement.ag_id DESC";
                          $result = $connect->query($v_sql);
                           if ($result->num_rows > 0) {
                             while($row = $result->fetch_assoc()) {

                      ?>
<div style="width: 19cm; margin:0 auto;" id="print">
<div style="height:75px;width: 100%;display: none" class="head1">&nbsp;</div>
	<div style="width: 100%;float: left;font-size: 12px;">
		<div style="width: 30%;float: left;">
			<div style="width: 90%;border-bottom: 1px dotted black;text-align: center;float: left;margin: 0 auto">
								<strong style="font-size: 14px;color: red !important"><?php echo $row['ve_ref_no']; ?></strong>
							</div>
			<div style="width: 90%;float: left;text-align: center;">
				លេខយោង ត្រីចក្រយាន្ត<br>Ref. N&deg;
			</div>
		</div>
		<div style="width: 40%;float: left;">
			<div style="width: 100%;float: left;">
				<strong style="font-family: 'Khmer OS Muol';font-size:18px">បង្កាន់ដៃ ទទួលប្រាក់</strong>
				<strong style="font-family: 'Arial Black';font-size:18px;float: right;margin-top:-7px;">OFFICIAL RECEIPT</strong>
			</div>
		</div>
		<div style="width: 30%;float: left;">
			<img id="barcode1" style="width: 150px;float: right;height: 80px;" src="barcode.png">
			<label 
            style="float: right;margin-top:-20px;float: right;margin-top: -22px;padding-right: 21px;font-size: 11px;"><?php echo $row['recipt_no']; ?></label>
		</div>
	</div>
	<div style="width: 100%;float: left;margin-top: -10px;">&nbsp;</div>
	<div style="width: 100%;float: left;font-size: 14px;">
		<div style="width: 33%; float: left;font-weight: normal;">បានទទួលប្រាក់ពី Received From:</div>
		<div style="width: 67%;float: left;border-bottom: 1px dotted black !important;z-index: 1000">
						<strong style="color:#6C2A6E !important;text-transform: uppercase;"><?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?></strong>
					</div>
	</div>
	<div style="width: 100%;float: left;font-size: 14px;margin-top: 0px;">
		<div style="width: 25%; float: left;font-weight: normal;">សម្រាប់ថ្លៃ Payment For:</div>
		<div style="width: 75%;float: left;border-bottom: 1px dotted black;f">
			<strong style="color:#6C2A6E !important"><?php echo $row['pay_for']; ?></strong>
		</div>
	</div>
	<div style="width: 100%;float: left;font-size: 14px;margin-top: 0px;">
		<div style="width: 42%; float: left;font-weight: normal;">ចំនួនទឹកប្រាក់ជាអក្សរ The Sum of (In Word):</div>
		<div style="width: 58%;float: left;border-bottom: 1px dotted black;">
			<strong style="color:#6C2A6E !important"><?php echo $row['pay_word']; ?></strong>
		</div>
	</div>
	<div style="width: 100%;float: left;font-size: 14px;margin-top: 0px;">
		<div style="width: 35%; float: left;font-weight: normal;">សម្រាប់រយះពេល For The Period of:</div>
		<div style="width: 65%;float: left;border-bottom:  1px dotted black;border-top: 1px solid #fff">
			<strong style="color:#6C2A6E !important"><?php  $dt_from = strtotime($row['ag_inception_date']);
                                echo date('l, F, d, Y', $dt_from); ?> &nbsp;&nbsp;</strong> <span style="font-weight: normal;">To </span>&nbsp;&nbsp;<strong style="color:#6C2A6E !important"><?php  $dt_to = strtotime($row['ag_return_date']);
                                echo date('l, F, d, Y', $dt_to); ?></strong>
		</div>
	</div>
	<div style="width: 100%;float: left;">&nbsp;</div>
	<div style="width: 100%;float: left;font-size: 12px;margin-top: 5px;font-weight: bold;">
		<div style="width: 40%; float: left;">
			<div style="width: 100%;border: 2px solid black;float: left;padding-left: 10px;">
				<div style="width: 100%;float: left;">
									<div style="width: 20%;float: left;font-weight:100;"><input <?php if($row['pay_cash_cheque']=="1") {echo "checked";} ?> style="float: left;" type="checkbox" name="cash" ><span style="float: left;margin-top: 2px">&nbsp;&nbsp;Cash</span></div>
					<div style="width: 25%;float: left;font-weight:100;"><input <?php if($row['pay_cash_cheque']=="2") {echo "checked";} ?>  style="float: left;" type="checkbox" name="cash"><span style="float: left;margin-top: 2px;">&nbsp;&nbsp;Cheque</span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;">
					<div style="width: 10px; height: 10px;background:#1A790F !important;float: left;margin-top: 7px;"></div>
					<div style="width: 80%;float: left;padding-left: 10px;font-weight: 100;">Ref. No. :&nbsp;<span style="color:#6C2A6E !important"><?php echo $row['ve_ref_no']; ?></span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;">
					<div style="width: 10px; height: 10px;background:#1A790F !important;float: left;margin-top: 7px;"></div>
					<div style="width: 30%;float: left;padding-left: 10px;font-weight: 100;">Long DAST:</div>
					<div style="width: 20%;float: left;text-align: right;">US $:</div>
					<div style="width: 35%;float: left;border-bottom: 1px dotted black;padding-left: 10px;text-align: center;"><span style="color:#6C2A6E !important"><?php echo number_format( $row['ag_long_dast'],2); ?></span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;">
					<div style="width: 10px; height: 10px;background:#1A790F !important;float: left;margin-top: 7px;"></div>
					<div style="width: 30%;float: left;padding-left: 10px;font-weight: 100;">Amount :&nbsp;</div>
					<div style="width: 20%;float: left;text-align: right;">US $:</div>
					<div style="width: 35%;float: left;border-bottom: 1px dotted black;padding-left: 10px;text-align: center;"><span style="color:#6C2A6E !important"><?php echo number_format( $row['ag_amount'],2); ?></span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;">
					<div style="width: 10px; height: 10px;background:#1A790F !important;float: left;margin-top: 7px;"></div>
					<div style="width: 36%;float: left;padding-left: 10px;font-weight: 100;">Discount(0%):</div>
					<div style="width: 14%;float: left;text-align: right;">US $:</div>
					<div style="width: 35%;float: left;border-bottom: 1px dotted black;padding-left: 10px;text-align: center;"><span style="color:#6C2A6E !important"><?php echo number_format( $row['ag_discount_percent'],2); ?></span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;">
					<div style="width: 10px; height: 10px;background:#1A790F !important;float: left;margin-top: 7px;"></div>
					<div style="width: 30%;float: left;padding-left: 10px;font-weight: 100;">VAT(0%) :&nbsp;</div>
					<div style="width: 20%;float: left;text-align: right;">US $:</div>
					<div style="width: 35%;float: left;border-bottom: 1px dotted black;padding-left: 10px;text-align: center;"><span style="color:#6C2A6E !important"><?php echo number_format( $row['ag_vat'],2); ?></span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;">
					<div style="width: 10px; height: 10px;background:#1A790F !important;float: left;margin-top: 7px;"></div>
					<div style="width: 30%;float: left;padding-left: 10px;font-weight: 100;">Deposit :&nbsp;</div>
					<div style="width: 20%;float: left;text-align: right;">US $:</div>
					<div style="width: 35%;float: left;border-bottom: 1px dotted black;padding-left: 10px;text-align: center;"><span style="color:#6C2A6E !important"><?php echo number_format( $row['ag_deposited'],2); ?></span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;">
					<div style="width: 10px; height: 10px;background:#1A790F !important;float: left;margin-top: 7px;"></div>
					<div style="width: 30%;float: left;padding-left: 10px;font-weight: 100;">Net Total :&nbsp;</div>
					<div style="width: 20%;float: left;text-align: right;">US $:</div>
					<div style="width: 35%;float: left;border-bottom: 1px dotted black;padding-left: 10px;text-align: center;"><span style="color:#6C2A6E !important"><?php echo number_format( $row['ag_amount_aft_d'],2); ?></span></div>
				</div>
				<div style="width: 100%;float: left;margin-top: 0px;text-align: center;font-size: 8px;">
					(*The Deposit will be returnded at the end of the contract*)
				</div>
			</div>
		</div>
		<div style="width: 60%;float: left;">
			<div style="width: 100%;float: left;text-align: right;"><span>កាលបរិច្ឆេទ / Date: <span style="color:#6C2A6E !important"><?php echo date('l, F, d, Y'); ?></span></span></div>
			<div style="width: 100%;float: left;">
				<div style="width: 40%; float: right;text-align: center;font-size: 12px;font-weight: 100;">
			
				<br>
				<br>
				<br>
				<div style="width: 100%;border-bottom: 1px solid black;margin:0 auto;"><span style="color:#6C2A6E !important;font-size: 16px;text-transform: uppercase;"><?php echo $row['ag_name_owner_sign']; ?></span></div>Signature/Name of Receiver
			</div>
			</div>
			<div style="width: 100%;float: left;">
				<div style="width: 40%; float: right;text-align: center;font-size: 12px;font-weight: 100;">
				
				<br>
				<br>
				<br>
				<div style="width: 100%;border-bottom: 1px solid black;margin:0 auto;">			<span style="color:#6C2A6E !important;font-size: 16px;text-transform: uppercase;"><?php echo $row['ag_name_renter']; ?></span>
			</div>Signature/Name of Customer
			</div>
			</div>
		</div>
	</div>
	&nbsp;
</div>
<?php
      }
    }
?>



                      </td>
        </tr>
    </tbody></table>
    
   </body></html>
   <script type="text/javascript">
window.print();
</script>