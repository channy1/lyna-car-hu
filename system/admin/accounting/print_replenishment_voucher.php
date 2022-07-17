<!DOCTYPE html>
<html>
<head>
  <?php
    include_once '../../config/database.php';
  ?>

  <script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>

  <?php
     $from=$_GET['from'];
     $to=$_GET['to'];

     // count time
       $time_deposit=0;
          $sql_less = "SELECT count(id) as time_deposit FROM tbl_petty_cash_deposit
            ORDER BY date_deposit
            ";
            $result = $connect->query($sql_less);
            while($row_less = $result->fetch_assoc()) {
               $time_deposit=$row_less['time_deposit'];

              }

     // end count time

      // sum less than month
           $total_amount_less=0;
          $sql_less = "SELECT sum(amount_deposit) as amount_less FROM tbl_petty_cash_deposit
            WHERE DATE_FORMAT(date_deposit,'%Y-%m-%d')<'$from'
            ORDER BY date_deposit
            ";
            $result = $connect->query($sql_less);
            while($row_less = $result->fetch_assoc()) {
               $total_amount_less=$row_less['amount_less'];
              

              }
      // end sum less than month
      // sum less expense
           $total_amount_ex=0;
            $sql_ex = "SELECT sum(ex_amount) as amount_ex FROM tbl_expen_request
            WHERE DATE_FORMAT(date_record,'%Y-%m-%d')<'$from'
            ORDER BY date_record
            ";
            $result = $connect->query($sql_ex);
            while($row_ex = $result->fetch_assoc()) {
               $total_amount_ex=$row_ex['amount_ex'];
              }
      // end sum less expense
     // sum by date 
    
       $sql = "SELECT sum(amount_deposit) as amount_month FROM tbl_petty_cash_deposit
      WHERE DATE_FORMAT(date_deposit,'%Y-%m-%d') BETWEEN '$from' AND '$to'
      ORDER BY date_deposit
      ";   
       $result = $connect->query($sql);
       $total_amount=0;
       $total_balance=0;
       $total_balance=$total_amount_less-$total_amount_ex;
        while($row = $result->fetch_assoc()) {
          $total_amount=$row['amount_month']+$total_balance;
        }
     // end sum by date
  ?>
  <title>Replenishment voucher</title>
  <style type="text/css">
    body{
      margin: 10px 20px;
      font-family:Arial;
      padding: 2px;
    }
    .header{
      width: 100%;
    }
    .header .title{
      width: 60%;
      float: left;
      text-align: left;
    }
    .header .center{
      text-align:center;
      font-size: 13px;
    }
    .header .logo{
      width: 40%;
      float: right;
      text-align:center;
    }
    .header .logo h1{
      font-size: 18px;
      color: #6A0188;
    }
    .content{
      width: 100%;
      font-size: 18px;
    }
    .content .content-right{
      width: 50%;
      float: right;
      text-align: left; ;
    }
    .content .content-left{
      width: 50%;
      float: left;
      text-align: left;
    }
    .date{
      margin-left: 8%;
    }
    .content-buttom{
      margin: 15% 0 0 10%;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="center">
      <h3>REPLENISHMENT VOUCHER</h3>
    </div>
    <div class="title" style="font-size:12px;">
      INSTALLMENT NO.: <span style="color: red; border-bottom: 1px solid blue;"><b><?php echo ''.date("Ymd").''.rand(10,1000000); ?></b></span><br>
      TIME: <span style="color: #6A0188; border-bottom: 1px solid blue;">
        <?php echo $time_deposit; ?></span>
    </div>
    <div class="logo" style="font-size: 14px;">
      <img src="lyna.jpg" style="width: 100px;height:80px;float: right;    margin-right:30px;">

      <h1 style="font-size:13px; float: right;clear: both;">LYNA-CARRENTAL.COM<br><small style="font-weight: 100;">YOUR BEST CHOICE</small></h1> 
    </div>
  </div>
  <div class="content" style="clear: both;">
    <div class="content-left" style="font-size: 13px;">
      Amount of Installment:<br>
      Previous Balance:<br>
      Current Requirement:<br>
    </div>
    <div class="content-right" style="font-size: 13px;">
      US$<span style="margin-left: 10%;text-align: right;">$<?php echo number_format($total_amount,2); ?></span><br>
      US$<span  style="margin-left:56px;text-align: right !important;"><span id="in_balen"></span></span><br>
      US$<span style="margin-left: 10%;text-align: right;"><span id="in_balen_current"></span></span><br>
    </div>
  </div>

  <div class="content" style="clear:both; font-size: 13px;">
    <br><hr>
    <div class="content-left">
      <b >Current Total</b>
    </div>
    <div class="content-right">
      <b>US$<span style="margin-left: 10%;"><span id="in_rep"></span></span></b>
    </div>
    <br><hr>
  </div>
  <div class="content date" style="clear:both;font-size: 13px;">
    <div class="content-left">
      Date:<span style="margin-left: 10%;"><?php echo  date('d/m/Y'); ?></span><span style="margin-left: 10%;"></span>
    </div>
    <div class="content-right">
      Date:<span style="margin-left: 10%;"><?php echo  date('d/m/Y'); ?></span><span style="margin-left: 10%;"></span>
    </div>
  </div>
  <div class="content content-buttom" style="clear:both;font-size: 13px;">
    <div class="content-left">
      Approved by
    </div>
    <div class="content-right">
      Requested by
    </div>
  </div>

   <?php
          $sql = "SELECT * FROM tbl_expen_request
          INNER JOIN tbl_expense_category ON tbl_expense_category.exca_id=tbl_expen_request.ex_category
      WHERE DATE_FORMAT(date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
      ORDER BY tbl_expen_request.date_record
      ";   
       $result = $connect->query($sql);
        $sum_ex=0;
        while($row = $result->fetch_assoc()) {
          $sum_ex +=$row['ex_amount'];
        }
      ?>

<?php
       $total_replen=$total_amount-$sum_ex;
       $total_balance=$sum_ex;
       $total_in_rep=$total_replen+$sum_ex;
    ?>
   <input type="hidden" name="balen" id="txt_balen" value="$<?php echo number_format($total_balance,2); ?>">
     <input type="hidden" name="balen" id="txt_re" value="$<?php echo number_format($total_replen,2); ?>">
     <input type="hidden" name="balen" id="txt_in_re" value="$<?php echo number_format($total_in_rep,2); ?>">
    <input type="hidden" name="balen" id="txt_total_curent" value="$<?php echo number_format($total_balance+$total_replen,2); ?>">


</body>
<style type="text/css">
  
  #in_balen {
    text-align: right !important;
  }
</style>
<script type="text/javascript">
  
  $(document).ready(function() {
      var j_balen=$("#txt_balen").val();
      var j_re=$("#txt_re").val();
      var j_in_re=$("#txt_in_re").val();
      var j_total_current=$("#txt_total_curent").val();
     
      $("#in_balen").html(j_balen);
      $("#in_rep").html(j_total_current);
      $("#in_total").html(j_in_re);
      $("#in_balen_current").html(j_re);
      window.print();
    });


</script>

</html>