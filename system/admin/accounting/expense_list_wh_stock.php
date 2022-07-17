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
<?php 

if(isset($_POST['search'])){
  $from = $_POST['from'];
  $to = $_POST['to'];
  if(@$_POST['txt_supplier'] != ""){
    $v_supplier = @$_POST['txt_supplier'];
    $sql = "SELECT * FROM tbl_wh_stock_in AS A
                      LEFT JOIN product AS B ON A.whsi_product_code=B.pro_id
                      LEFT JOIN employee AS C ON A.whsi_employee=C.emp_id
                      LEFT JOIN tbl_unit AS D ON D.u_id=A.whsi_unit
                      WHERE A.whsi_date_record BETWEEN '$from' AND '$to' AND A.whsi_received_from='$v_supplier'
                            ";  
    $result = $connect->query($sql);
  }else{
    $sql = "SELECT * FROM tbl_wh_stock_in AS A
                      LEFT JOIN product AS B ON A.whsi_product_code=B.pro_id
                      LEFT JOIN employee AS C ON A.whsi_employee=C.emp_id
                      LEFT JOIN tbl_unit AS D ON D.u_id=A.whsi_unit
                      WHERE A.whsi_date_record BETWEEN '$from' AND '$to'
                            ";  
    $result = $connect->query($sql);
  }
}else{
  $v_date = date('Y-m');
  $sql = "SELECT * FROM tbl_wh_stock_in AS A
                    LEFT JOIN product AS B ON A.whsi_product_code=B.pro_id
                    LEFT JOIN employee AS C ON A.whsi_employee=C.emp_id
                    LEFT JOIN tbl_unit AS D ON D.u_id=A.whsi_unit
                    WHERE DATE_FORMAT(A.whsi_date_record,'%Y-%m')='$v_date'
                          ";  
  $result = $connect->query($sql);
}
  
  if(isset($_POST["btnadd"])){
    $v_date_record = $_POST["txt_date_record"];
    $v_description = $_POST["txt_description"];
    $v_expense_category = $_POST["txt_expense_category"];
    $v_amount = $_POST["txt_amount"];
    $v_employee = $_POST["txt_employee"];
    $v_note = $_POST["txt_note"];

     $sql = "INSERT INTO tbl_expense_list 
                          (exp_date_record
                            , exp_description
                            , exp_expense_category
                            , exp_amount
                            , exp_employee
                            , exp_note
                            ) 
                        VALUES 
                          ('$v_date_record'
                            , '$v_description'
                            , '$v_expense_category'
                            , '$v_amount'
                            , '$v_employee'
                            , '$v_note'
                            )";

     $result = mysqli_query($connect, $sql);
     header('location:expense_list.php?message=success');
 }
    if(isset($_GET["id"])){
    $id = $_GET["id"];
      
    $sql = "DELETE FROM tbl_expense_list WHERE exp_id = '$id'" ;
    $result = mysqli_query($connect, $sql);
    header("location:expense_list.php?message=delete");  
} 
?>


          <div class="row">
            <div class = "col-xs-12">
                  <?php
                    if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                      echo '<div class="alert alert-success">' ;
                      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                      echo '<h4>Success Add Record</h4>';
                      echo '</div>';
                    }
                    else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
                      echo '<div class="alert alert-info">' ;
                      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                      echo '<h4>Success Update Record</h4>';
                      echo '</div>';
                    }
                    else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
                      echo '<div class="alert alert-danger">' ;
                      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                      echo '<h4>Success Delete Record</h4>';
                      echo '</div>';
                    }
                    ?>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <h2 class="text-primary">Expense List <select onchange="window.location=this.value"><option value="expense_list_wh_stock.php">Sale</option><option value="expense_list.php">Input</option></select></h2>
                        <hr>
                  <form class="form-inline" method = "post" action="">
                    <div class="form-group">
                      <input type="text" autocomplete="off" data-provide="datepicker" data-date-format="yyyy-mm-dd" required="" placeholder="DATE START" class="form-control" name = "from" value="<?= @$_POST['from'] ?>" >
                    </div>
                    <div class="form-group">
                      <input type="text" autocomplete="off" data-provide="datepicker" data-date-format="yyyy-mm-dd" required="" placeholder="DATE END" class="form-control" name = "to" value="<?= @$_POST['to'] ?>"> 
                    </div>
                    <div class="form-group">
                      <select class="form-control select2" name = "txt_supplier"> 
                        <option value="">=== choose Supplier List ===</option>
                        <?php 
                          $supp_search = $connect->query("SELECT * FROM tbl_wh_stock_in GROUP BY whsi_received_from ORDER BY whsi_received_from ASC");
                          while ($row_supp = mysqli_fetch_object($supp_search)) {
                            if($row_supp->whsi_received_from == @$_POST['txt_supplier']){
                              echo '<option SELECTED value="'.$row_supp->whsi_received_from.'">'.$row_supp->whsi_received_from.'</option>';
                            }else{
                              echo '<option value="'.$row_supp->whsi_received_from.'">'.$row_supp->whsi_received_from.'</option>';
                            }
                          } 
                         ?>
                      </select>
                    </div>
                    <button type="submit" name="search" class="btn btn-success"><i class="fa fa-search fa-fw"></i>Search</button>
                    <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Clear</a>
                  </form>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table id="example" class="display nowrap" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Date Record</th>
                              <th>Letter In No</th>
                              <th>Photo</th>
                              <th>Product Code</th>
                              <th>Product Name</th>
                              <th>Qty In</th>
                              <th>Cost</th>
                              <th>Amount</th>
                              <th>Received From</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                              $i=0;
                              $sum_amount = 0;
                              while($row = $result->fetch_assoc()) 
                              {     
                                $sum_amount += $row['whsi_cost']*$row["whsi_qty_in"];
                                $v2=$row["whsi_date_record"];
                                $v3=$row["whsi_letter_no"];
                                $v4=$row["code"];
                                $v5=$row["ref"];
                                $v6=$row["whsi_qty_in"];
                                $v8=$row["whsi_received_from"];
                            ?>
                            <tr>
                              <td><?= (++$i) ?></td> 
                              <td><?php echo $v2;?></td>
                              <td><?php echo $v3;?></td>
                              <td><img src="img/product/<?= $row['photo'] ?>" height="40px"/></td>
                              <td><?php echo $v4;?></td>
                              <td><?php echo $v5;?></td>
                              <th><?php echo $v6;?></th>
                              <td>$ <?= number_format($row['whsi_cost'],2) ?></td>
                              <th>$ <?= number_format($row['whsi_cost']*$row["whsi_qty_in"],2) ?></th>
                              <td><?php echo $v8;?></td>
                            </tr> 
                            <?php
                              }  
                            ?>
                            <tr>
                              <th><?= (++$i) ?></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th class="text-right">Expense : </th>
                              <th>$ <?= number_format($sum_amount,2) ?></th>
                              <th></th>
                            </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="text-right">Expense : </th>
                          <th>$ <?= number_format($sum_amount,2) ?></th>
                          <th></th>
                        </tr>
                      </tfoot>
                  </table>
                </div>
              </div>
          </div>
      </div>
    </div>
  