<!DOCTYPE html>
<html>
<head>
<?php
  include_once '../../config/database.php';
?>
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <title>PETTY CASH RECORD</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="styleforweb.css">
</head>
<body>

  <?php
     $from=$_GET['from'];
     $to=$_GET['to'];
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
  <h1 id="heading">PETTY CASH RECORD</h1>
  <div class="float-left">
    For Month:<span style="border-bottom: 1px solid red; color: blue;">&nbsp;&nbsp;<?php  
                        $month_year = strtotime($_GET['from']);
                          echo date('F Y', $month_year); 
                        ?>&nbsp;&nbsp;</span><br>
    Date:<span style="margin-left: 29px;border-bottom: 1px solid red; color: blue;">&nbsp;&nbsp; <?php $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?>&nbsp;&nbsp;</span><br><br>
    Recorded By:<span style="color: blue;width: 100px;">&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
  </div>
  <div  class="float-right">
    <table>
    <tr>
      <td>Installment Amount:</td>
      <td>$<?php echo number_format($total_amount,2); ?></td>
    </tr>
    <tr>
      <td>Previous Balance:</td>
      <td><span id="in_balen"></span></td>
    </tr>
    <tr>
      <td>Replenishment:</td>
      <td><span id="in_rep"></span></td>
    </tr>
    <tr class="none-border">
      <td>Total:</td>
      <td><span id="in_total"></span></td>
    </tr>
  </table>
  </div>
  <div style="clear: both;" class="width">
    <table> 
      <thead>
        <tr>
          <th rowspan="2">Date</th>
          <th rowspan="2">PCV</th>
          <th colspan="5">Disbursment</th>
          
        </tr>
        <tr>
          <th>Description</th>
          <th>Type</th>
          <th>Qty</th>
          <th>U.Price</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody class="tbody">

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
      ?>
        <tr>
          <td style="text-align: center;width: 70px;">
             <?php  
                  $start_date = strtotime($row['date_record']);
                  echo date('d M y', $start_date); 
                  ?>
          </td>
          <td style="width: 70px;"><?php echo $row['pcv']; ?></td>
          <td colspan="1">
            <?php echo $row['description']; ?>
          </td>
          <td style="width:70px;text-align: center;">
            <?php echo $row['exca_name']; ?>
          </td>
          <td style="text-align: center;"> 
            <?php echo $row['ex_qty']; ?>
          </td>
          <td style="width:50px; text-align: right;">$<?php echo number_format($row['ex_price'],2); ?></td>
          <td style="width:50px; text-align: right;">$<?php echo number_format($row['ex_amount'],2); ?></td>
          
        </tr>
    <?php
       }
    ?>

    <tr class="none-border">
          <td class="align">
             
          </td>
          <td class="align"></td>
          <td colspan="1">
           
          </td>
          <td>
           
          </td>
          <td> 
            
          </td>
          <td>Grand Total:</td>
          <td style="color:white !important;font-weight: 900;">$<?php echo number_format($sum_ex,2);  ?></td>
          
        </tr>
        
       
       
      </tbody>
    </table>
  </div>
   <div style="width: 100%;">
          <div style="width: 10%;float: left;"></div>
            <div style="width:40%;float: left;margin-left: 20px;">
              <label style="display: block;text-align: center;margin-bottom: 58px;">PREPARED BY</label>
              <label style="display: block;text-align: center;"></label>
              <label style="display: block;text-align: center;border-top: 1px solid black;width: 26%;margin-left: 37%;"></label>
             
            </div>
            <div style="width:40%;float: right;">
              <label style="display: block;text-align: center;margin-bottom: 58px;">APPROVED BY</label>
              <label style="display: block;text-align: center;"></label>
              <label style="display: block;text-align: center;border-top: 1px solid black;width: 26%;margin-left: 37%;"></label>
            </div>
         <div style="width: 10%;float: right;"></div>
        </div>
  
    <?php
       $total_replen=$total_amount-$sum_ex;
       $total_balance=$sum_ex;
       $total_in_rep=$total_replen+$sum_ex;
    ?>
     <input type="hidden" name="balen" id="txt_balen" value="$<?php echo number_format($total_balance,2); ?>">
     <input type="hidden" name="balen" id="txt_re" value="$<?php echo number_format($total_replen,2); ?>">
     <input type="hidden" name="balen" id="txt_in_re" value="$<?php echo number_format($total_in_rep,2); ?>">
</body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
      var j_balen=$("#txt_balen").val();
      var j_re=$("#txt_re").val();
      var j_in_re=$("#txt_in_re").val();
      $("#in_balen").html(j_balen);
      $("#in_rep").html(j_re);
      $("#in_total").html(j_in_re);

      window.print();
    });

</script>
<style type="text/css">
  body{
  font-family: Arial;
  margin: 0 20px;
  font-size: 15px;
}
#heading{
  text-align: center;
  font-size: 20px;
}
thead{
  background: #ddd !important;
}

@media print {
thead {
    background: #ddd !important;
    -webkit-print-color-adjust: exact;
    }
}
.width{
  padding: 12px 0 10px 0;
}
.width table{
  width: 100%;

}
.width thead{
  border:2px solid;
}
.width table,th,td,tr{
  border:1px solid;
  border-collapse: collapse;
}
    /*
    h3{
      text-align: left;
      font-size: 12px;
    }*/
.float-left{
  float: left;
    }
.float-right{
  float: right;
  text-align: right;
}
.float-right table,td,tr{
  border:1px solid;
  border-collapse: collapse;
  padding-left:20px;
}
.tbody{
  border:2px solid;
}
.tbody td,tr{
  padding:5px 4px;
}
.align{
  text-align: right;
}
.none-border{
  
  background-color: #a4509f !important; 
}
.none-border td{
  border:none;
  font-weight: bold;
  color: white!important; 
}

@media print {
.none-border {
    background-color: #a4509f !important;
    -webkit-print-color-adjust: exact;
    }
}









</style>