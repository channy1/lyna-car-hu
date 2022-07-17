<!DOCTYPE html>
<html>

<head>
	<?php
    include_once '../../config/database.php';
  ?>

	<title>Profit & Loss.</title>
	<meta charset="utf-8">
	<style>
	 .in_line ,.in_line_left{
	 	margin-left:20px;
	    clear: both;
	    line-height:2px !important;
	    margin-bottom:-1px;
	    margin-top:1px;
	    
	 }
	 .text_right {
	 	float: right !important;
	 }
	 .cross_profit_left {
	 	margin-top:-2px;
	 	clear: both;
	 }
	 .cross_profit_right {
	 	margin-top:-10px !important;
	 	clear: both;
	 }
	 .net_left {
	 	margin-top:10px;
	 	clear: both;
	 }
	 .net_right {
	 	margin-top:-10px !important;
	 	clear: both;
	 }
	 .in_line_left {
	 	margin-left:40px;
	 	clear: both;
	 	

	 }
	 .in_line_category {
	 	margin-left:25px;
	 	clear: both;
	 	margin-top:2px;
	 	margin-bottom:2px;
	 	
	 }
	 .in_line_total {
	 	margin-left:25px;
	 	clear: both;
	 	margin-top:-4px;
	 	
	 }
	 * {
	 	line-height:20px;
	 	font-size: 11px;
	 }
		
	</style>
</head>
<body>

	<div style="width: 100%;">
		<div style="width:30%;float: left;">
			<label style="display: block;"><?php echo date("h:i:sa"); ?></label>
			<label style="display: block;">
				<?php
				 echo 'From '.$_GET['from'].' To '.$_GET['to'];
				?>
			</label>
			<label style="display: block;">Accrual Basis</label>
		</div>
		<div style="width: 40%;float: left;text-align: center;">
			<label style="display: block;">LYNA-CARRENTAL.COM</label>
			<label style="font-weight: 900;display: block;font-size:20px;">Profit & Loss</label>
			<label style="display: block;">
				<?php
				  $from_date=$_GET['from'];
				  $to_date=$_GET['to'];

				  $dt_from = strtotime($_GET['from']);
                   echo date('F Y', $dt_from);  

				
				?>
			</label>
		</div>
		<div style="width: 30%; float: right;">
			
		</div>

	</div>


	<div style="clear: both;height:10px;">
		
	</div>
	<div class="content" style="width: 80%;margin:0 auto;">


		<div style="width:70%; float: left;">
			
		</div>
		<div style="width: 20%;float: right;">
			<label style="border-bottom: 1px solid black;">
				<?php
				  $from_date=$_GET['from'];
				  $to_date=$_GET['to'];

				  $dt_from = strtotime($_GET['from']);
                   echo date('F Y', $dt_from);  

				
				?>
			</label>
		</div>

		<div class="in_line" style="width:70%; float: left;font-weight: bold;margin-bottom:3px !important;">
			Income
		</div>
		<div class="in_line" style="width: 20%;float: right;">
			<label style="border-bottom: 1px solid black;">
			
			</label>
		</div>

		

		<?php
		 // income
		  $from = $_GET['from'];
          $to = $_GET['to'];
          $v_sum_amount=0;
		 $sql_cate_re = "SELECT * FROM tbl_revenue_category
		 				LEFT JOIN
		 				tbl_revenue_list
		 				ON tbl_revenue_list.rev_revenue_category=
		 				tbl_revenue_category.reca_id
		 				WHERE DATE_FORMAT(rev_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to' GROUP BY reca_name

		 				 ORDER BY reca_name 

		 ";  
          $result = $connect->query($sql_cate_re);
           while($row_cate_re = $result->fetch_assoc()) { 
           	$re_id=$row_cate_re['reca_id'];

             echo '<div class="in_line_category" style="width:70%; float: left;">
			  '.$row_cate_re['reca_name'].'
			</div>
			<div class="in_line" style="width: 20%;float: right;">
			<label style="border-bottom: 1px solid black;text-align: right;">
			  
			</label>
			</div>';

           	$sql_2="SELECT * FROM tbl_revenue_list WHERE rev_revenue_category='$re_id' AND DATE_FORMAT(rev_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
                  ORDER BY rev_description";

           	$results = $connect->query($sql_2);
           	
           	while($row= $results->fetch_assoc()) { 
           		$v_sum_amount +=$row['rev_amount'];
		    ?>



		    <div class="in_line_left" style="width:70%; float: left;">
			<?php echo $row['rev_description']; ?>
			</div>
			<div class="in_line" style="width: 20%;float: right;">
			<label class="text_right" style="border-bottom: 1px solid black;text-align: right;margin-top: -2px;">
			  <?php echo number_format($row['rev_amount'],2); ?>
			</label>
			</div>


		<?php
		   }
		?>
		
		

		
		
	<?php
	    }
	?>


		<div class="in_line" style="width:70%; float: left;font-weight: bold;">
			Total Income
		</div>
		<div class="in_line" style="width: 20%;float: right;">
			<label class="text_right" style="border-bottom: 1px solid black;text-align: right;font-weight: bold;">
					<?php
					  echo number_format($v_sum_amount,2);
					?>
			</label>
		</div>


		<div class="cross_profit_left"  style="width:70%; float: left;font-weight: bold;">
			Gross Profit
		</div>
		<div class="cross_profit_right" style="width: 20%;float: right;">
			<label class="text_right"  style="text-align: right !important;font-weight: bold;">
					<?php
					  echo number_format($v_sum_amount,2);
					?>
			</label>
		</div>


		<div class="in_line" style="width:70%; float: left;font-weight: bold;margin-bottom:3px !important;">
			Expense
		</div>
		<div class="in_line" style="width: 20%;float: right;">
			<label style="border-bottom: 1px solid black;">
			
			</label>
		</div>


			<?php
		 // Expense
		  $from = $_GET['from'];
          $to = $_GET['to'];
          $ex_sum_amount=0;
          $ex_sum_category=0;
		 $sql_cate_ex = "SELECT tbl_expense_category.*,tbl_expense_list.*,
		 sum(exp_amount) as amount_by_cate FROM tbl_expense_category
		 				LEFT JOIN
		 				tbl_expense_list
		 				ON tbl_expense_list.exp_expense_category=
		 				tbl_expense_category.exca_id
		 				WHERE DATE_FORMAT(exp_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to' GROUP BY exca_id

		 				 ORDER BY exca_name 

		 ";  
          $result = $connect->query($sql_cate_ex);
           while($row_cate_ex= $result->fetch_assoc()) { 
           	$ex_id=$row_cate_ex['exca_id'];
           	$ex_sum_category +=$row_cate_ex['exp_amount'];

             echo '<div class="in_line_category" style="width:70%; float: left;">
			  '.$row_cate_ex['exca_name'].'
			</div>
			<div class="in_line" style="width: 20%;float: right;">
			<label style="text-align: right;">
			  
			</label>
			</div>';

           	$sql_2="SELECT * FROM tbl_expense_list WHERE exp_expense_category='$ex_id' AND DATE_FORMAT(exp_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
                  ORDER BY exp_description";

           	$results = $connect->query($sql_2);
           	
           	while($row= $results->fetch_assoc()) { 
           		$ex_sum_amount +=$row['exp_amount'];
           		
		    ?>


			<div style="clear: both;"></div>
		    <div class="in_line_left" style="width:70%; float: left;">
			<?php echo $row['exp_description']; ?>
			</div>
			<div class="in_line" style="width: 20%;float: right;">
			<label class="text_right" style="text-align: right;">
			  <?php echo number_format($row['exp_amount'],2); ?>
			</label>
			</div>
			<div style="clear: both;"></div>


			


		<?php
		   }
		?>
		
	    <div style="clear: both;">
	    	
	    </div>
		<div class="in_line_total" style="width:70%; float: left;font-weight: bold;">
			Total <?php echo '. '.$row_cate_ex['exca_name']; ?>
			</div>
			<div class="in_line" style="width: 20%;float: right;">
			<label style="text-align: right;border-top: 1px solid black;float: right;font-weight: bold;">
				<?php
				  echo number_format($row_cate_ex['amount_by_cate'],2);
				?>
			</label>
			</div>
	<?php
	    }
	?>



		


		<div class="in_line" style="width:70%; float: left;font-weight: bold;">
			Total Expense
		</div>
		<div class="in_line" style="width: 20%;float: right;">
			<label class="text_right" style="border-bottom: 1px solid black;text-align: right;font-weight: bold;">
					<?php
				  echo number_format($ex_sum_amount,2);
				?>
			</label>
		</div>


		<div class="net_left" style="width:70%; float: left;font-weight: bold;">
		  Profit & Loss
		</div>
		<div class="net_right" style="width: 20%;float: right;">
			<label class="text_right" style="text-align: right;border-bottom:3px double black;font-weight: bold;">
		  <?php
		    $total_net=0;

		    $total_net =$v_sum_amount-$ex_sum_amount;
		    echo number_format($total_net,2);
		  ?>
			</label>
		</div>






	</div>

</body>

<script type="text/javascript">
	window.print();
</script>
</html>