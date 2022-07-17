 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
   $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <h2 class="text-primary">Profit & Loss</h2>
          <br>
          <form class="form-inline" method = "post" action="">
            <div class="form-group">
              <label>From:</label>
              <input type="text" data-provide="datepicker" placeholder="date from" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "from" value="<?= @$_POST['from'] ?>" >
            </div>
            <div class="form-group">
              <label>To:</label>
              <input type="text" data-provide="datepicker" placeholder="date to" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "to" value="<?= @$_POST['to'] ?>"> 
            </div>
            <button type="submit" name="search" class="btn btn-success">Search</button>
            <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Clear</a>
             <a target="_blank" class="btn btn-danger" href="profit_loss.php?from=<?php echo $_POST['from']; ?>&to=<?php echo $_POST['to']; ?>">
          <i class="fa fa-print"></i> Print</a>
          </form> 
        </div>
        <div class="panel-body">
            <div class="table-responsive">
          

              <table id="example" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width:5%;text-align: center;">No</th>
                      <th style="width: 15%;">Date</th>
                      <th style="width: 50%;">Description</th>
                      <th style="width: 10%;">Income</th>
                      <th style="width: 20%;">Income Category</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                    <?php
              if(isset($_POST['search'])){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_revenue_list AS A
                      LEFT JOIN tbl_revenue_category AS B ON A.rev_revenue_category=B.reca_id
                      LEFT JOIN tbl_users AS C ON A.rev_employee=C.user_id
                      WHERE DATE_FORMAT(rev_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
                      ";  
  }else{
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_revenue_list AS A
                      LEFT JOIN tbl_revenue_category AS B ON A.rev_revenue_category=B.reca_id
                      LEFT JOIN tbl_users AS C ON A.rev_employee=C.user_id
                      WHERE DATE_FORMAT(rev_date_record,'%Y-%m')='$v_current_year_month'
                      ";  
  }

  $result = $connect->query($sql);
  $j=1;
  $income_profit=0;
   while($row = $result->fetch_assoc()) 
                   { 
              $income_profit +=$row['rev_amount'];
                    ?>
                    
                       <tr>
                         <td>
                           <?php
                            echo $j++;
                           ?>
                         </td>
                         <td>
                           <?php
                            echo $row['rev_date_record'];
                           ?>
                         </td>
                         <td>
                           <?php echo $row['rev_description']; ?>
                         </td>
                         <td style="text-align: right;">
                           $<?php
                           echo number_format($row['rev_amount'],2);
                           ?>
                         </td>
                         <td>
                           <?php
                            echo $row['reca_name'];
                           ?>
                         </td>
                         
                       </tr> 
                    <?php
                       }
                    ?>
                  <tr>
                        <td colspan="3" style="text-align: right;font-weight: 900;">Gross Income</td>
                        <td style="text-align: right;">
                            <b>
                          $<?php
                          echo number_format($income_profit,2);
                          ?>
                            </b>
                        </td>
                        <td></td>
                      </tr>
                  </tbody>
                  
              </table>


                  <table id="example" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width:5%;text-align: center;">No</th>
                      <th style="width: 15%;">Date</th>
                      <th style="width: 50%;">Description</th>
                      <th style="width: 10%;">Expense</th>
                      <th style="width: 20%;">Expense Category</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
              if(isset($_POST['search'])){
                  $from = $_POST['from'];
                  $to = $_POST['to'];
                  $v_current_year_month=date('Y-m');
                  $sql = "SELECT * FROM tbl_expense_list AS A
                    LEFT JOIN tbl_expense_category AS B ON A.exp_expense_category=B.exca_id
                    LEFT JOIN tbl_users AS C ON A.exp_employee=C.user_id
                    WHERE DATE_FORMAT(exp_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
                    ORDER BY A.exp_date_record DESC
                    ";   
                }else{
                  $v_current_year_month=date('Y-m');
                  $sql = "SELECT * FROM tbl_expense_list AS A
                    LEFT JOIN tbl_expense_category AS B ON A.exp_expense_category=B.exca_id
                    LEFT JOIN tbl_users AS C ON A.exp_employee=C.user_id
                    WHERE DATE_FORMAT(exp_date_record,'%Y-%m')='$v_current_year_month'
                    ORDER BY A.exp_date_record DESC
                    ";    
                }
            $result = $connect->query($sql);
            $i=1;
            $ex_profit=0;
            while($row = $result->fetch_assoc()) 
                                  { 
            $ex_profit +=$row['exp_amount'];
                      
                    ?>
                    
                       <tr>
                         <td>
                           <?php echo $i++; ?>
                         </td>
                         <td>
                           <?php echo $row['exp_date_record']; ?>
                         </td>
                         <td><?php echo $row['exp_description']; ?></td>
                         <td style="text-align: right;">
                           $<?php
                            echo number_format($row['exp_amount'],2);
                           ?>
                         </td>
                         <td>
                           <?php
                            echo $row['exca_name'];
                           ?>
                         </td>
                         
                       </tr> 
          <?php
                }

           ?>
                      <tr>
                        <td colspan="3" style="text-align: right;font-weight: 900;">Gross Expense</td>
                        <td style="text-align: right;">
                            <b>
                          $<?php
                          echo number_format($ex_profit,2);
                          ?>
                            </b>
                        </td>
                        <td></td>
                      </tr>
                  </tbody>
                  
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
<style type="text/css">
  table th {
    text-align: center;
    background-color: #eef1f5 !important;
             -webkit-print-color-adjust:exact;
  }

</style>
<?php include_once '../layout/footer.php' ?>
