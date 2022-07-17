<!DOCTYPE html>
<html>
<head>
	<?php
    include_once '../../config/database.php';
  ?>
   <script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<title>CASH VOUCHER.</title>
	<meta charset="utf-8">
	<style>
		* {
		  	box-sizing: border-box;
		}
		body{
			margin: 2px;
			font-family: Arial;
		}
		.header{
			width:  100%;
		}
		.header .number{
			float: left;
			width: 60%;
			text-align: left;
		}
		.header .logo{
			width: 40%;
			float: right;
			text-align:center;
		}
		.header .logo h1{
			font-size: 15px;
			color: #6A0188;
		}
		.header .center{
			clear: left;
			font-size: 18px;
			text-align: right;
			width: 100%;
		}
		
		.content .border-table{
			border-width: 1px 1px 0 1px;
			overflow: hidden;
			border-style: solid;
		}
		.content .border-table p{
			font-size: 10px;
		}
		.content .border-table b{
			font-size: 12px;
		}
		.content{
			width: 100%;
			padding: 2px;
			clear: both;
		}
		
	</style>
</head>
<body>

	<?php
		$id=$_GET['id'];
        $sql = "SELECT * FROM tbl_cash_voucher
      			LEFT JOIN tbl_users  
      			ON tbl_cash_voucher.payee=tbl_users.user_id
      			WHERE tbl_cash_voucher.id='$id'
      		   ";   
      	$result = $connect->query($sql);
      	 while($row = $result->fetch_assoc()){ 
	?>
	<section class="header">
		<div class="number" style="font-size:13px;">
			VOUCHER &#8470; :&nbsp;&nbsp;<span style="color: red; border-bottom: 1px solid blue;"><b><?php echo $row['v_inv_no']; ?></b></span>
		</div>
		<div class="logo">
			<img src="lyna.jpg" style="width:80px;height:80px;">
			<h1>LYNA-CARRENTAL.COM<small style="display: block;">YOUR BEST CHICE</small></h1>
		</div>
		<div class="center">
			<br>
			<h3>CASH VOUCHER</h3>
		</div>
	</section> 
	 		
	 <section class="content">
		<div class="border-table" >
			<div style="width: 65%; float: left;">
				<p style="margin-left: 10px;">TRANSACTION TYPE:&nbsp;&nbsp;<b><?php echo $row['tran_saction']; ?></b></p>
			</div>
			<div  style="width: 35%; float: right;">
				<p>DATE:&nbsp;&nbsp;<b><?php $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?></b></p>
			</div>
		</div>
		<div class="border-table" style="clear: both;">
			<p style="margin-left: 10px;">AMOUNT:&nbsp;&nbsp;<b>$<?php echo number_format($row['v_amount'],2); ?></b></p>
		</div>
		<div class="border-table">
			<div><p style="margin-left: 10px;">TO:&nbsp;&nbsp;<b><?php echo $row['v_to']; ?></b></p></div>

		</div>
		<div class="border-table" style="height: 100px;">
			<div style="width: 65%;text-align: center; float: left;"><p style="text-align:left; margin-left: 10px;">THE SUM OF:</p>&nbsp;&nbsp;<b ><?php echo $row['the_sum_of']; ?></b></div>
			<div style="width: 35%;text-align: center; float: right; border-left:  1px solid; height: 100px;"><p style="text-align: left;margin-left: 10px;">PAYEE:</p><b><?php echo $row['user_first_name'].' '.$row['user_last_name']; ?></b></div>
		</div>
		<div class="border-table" style="clear: both; border-width: 1px 1px 1px 1px; border-style: solid;width: 100%;">
			<div style="width: 35%; float: left;margin-left:10px;"><p>APPROVED BY:&nbsp;&nbsp;<b ><?php echo $row['app_by']; ?></b></p></div>
			<div style="width: 35%; float: left;border-width: 0 1px 0 1px; border-style: solid;word-break: break-all; "><p style="margin-left: 10px;">MANAGER:&nbsp;&nbsp;<b style="text-align:center;"><?php echo $row['manager_by']; ?></b></p>
			</div>
			<div style="width:25%;float: right;"><p style="margin-left: 10px;">SIGNATURE:<b> &nbsp;</b></p>
			</div>
		</div>
	</section>
	<?php
	   }
	?>
</body>

<script type="text/javascript">
	window.print();
</script>
</html>