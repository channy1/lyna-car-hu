
<?php
   $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
if(isset($_POST['search'])){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $v_current_year_month=date('Y-m');
  $sql = "SELECT *,SUM(amount) as s_amount_out FROM stockout WHERE DATE_FORMAT(date_out,'%Y-%m-%d') BETWEEN '$from' AND '$to' GROUP BY date_out ORDER BY date_out ASC";
}else{
  $v_current_year_month=date('Y-m');
  $sql = "SELECT *,SUM(amount) as s_amount_out FROM stockout WHERE DATE_FORMAT(date_out,'%Y-%m')='$v_current_year_month' GROUP BY date_out ORDER BY date_out ASC";
}
 $result = $connect->query($sql);
?>


  <div class="row">
    <div class = "col-xs-12">
    </div>
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-body"> 
          <h2 class="text-primary">Revenue List <select onchange="window.location=this.value"><option value="revenue_list_stockout.php">Rent</option><option value="revenue_list.php">Input</option></select></h2>
          <hr>
          <form class="form-inline" method = "post" action="">
            <div class="form-group">
              <input type="text" data-provide="datepicker" placeholder="DATE START" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "from" value="<?= @$_POST['from'] ?>" >
            </div>
            <div class="form-group">
              <input type="text" data-provide="datepicker" placeholder="DATE END" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "to" value="<?= @$_POST['to'] ?>"> 
            </div>
            <button type="submit" name="search" class="btn btn-success">Search</button>
            <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Clear</a>
          </form> 
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table id="example" class="display nowrap" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Revenue</th>
                    <th>Cost</th>
                    <th>Profit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sum_revenue = 0;
                    $sum_cost = 0;
                    $sum_profit = 0;
                    $i = 0;
                    while($row = @$result->fetch_assoc()) 
                    {    
                      echo '<tr>';
                        echo '<td>'.(++$i).'</td>';
                        echo '<td>'.$row["date_out"].'</td>';
                        echo '<th>$ '.number_format($row["s_amount_out"],2).'</th>';

                        //get cost
                        $v_date = $row["date_out"];
                        $v_get_cost = $connect->query("SELECT SUM(B.price_riel*A.qty_out) AS s_cost FROM stockout AS A LEFT JOIN product AS B ON B.code=A.code_out WHERE A.date_out='$v_date'");
                        $v_row_cost = mysqli_fetch_object($v_get_cost);
                        echo '<th>$ '.number_format($v_row_cost->s_cost,2).'</th>';

                        echo '<th>$ '.number_format(($row["s_amount_out"]-$v_row_cost->s_cost),2).'</th>';
                      echo '</tr>';

                      $sum_revenue += $row["s_amount_out"];
                      $sum_cost += $v_row_cost->s_cost;
                      $sum_profit += $row["s_amount_out"]-$v_row_cost->s_cost;
                    }  
                  ?>
                  <tr>
                    <th><?= (++$i) ?></th>
                    <th></th>
                    <th>$ <?= number_format($sum_revenue,2) ?></th>
                    <th>$ <?= number_format($sum_cost,2) ?></th>
                    <th>$ <?= number_format($sum_profit,2) ?></th>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>$ <?= number_format($sum_revenue,2) ?></th>
                    <th>$ <?= number_format($sum_cost,2) ?></th>
                    <th>$ <?= number_format($sum_profit,2) ?></th>
                  </tr>
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once '../layout/footer.php' ?>
