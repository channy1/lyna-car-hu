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
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_cash_voucher
     
      LEFT JOIN tbl_users  ON tbl_cash_voucher.payee=tbl_users.user_id
      WHERE DATE_FORMAT(v_date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
      ORDER BY v_date_record DESC
      ";   
  }else{
    $v_current_year_month=date('Y-m');
    $sql = "SELECT * FROM tbl_cash_voucher
     
      LEFT JOIN tbl_users  ON tbl_cash_voucher.payee=tbl_users.user_id
      WHERE DATE_FORMAT(v_date_record,'%Y-%m')='$v_current_year_month'
      ORDER BY v_date_record DESC
      ";    
  }


  $result = $connect->query($sql);
  


if(isset($_POST["btn_deposit"])){
  $txt_voucher_no=$_POST['txt_voucher_no'];
  $txt_date_deposit=$_POST['txt_date_deposit'];
  $txt_amount_deposit=$_POST['txt_amount_deposit'];
  $txt_transaction=$_POST['txt_transaction'];
  $txt_to=$_POST['txt_to'];
  $txt_the_sum_of=$_POST['txt_the_sum_of'];
  $txt_app_by=$_POST['txt_app_by'];
  $txt_manage=$_POST['txt_manage'];
  $txt_employee_deposit=$_POST['txt_employee_deposit'];
  $txt_note_deposit=$_POST['txt_note_deposit'];


  $sql = "INSERT INTO tbl_cash_voucher 
                          (
                            v_date_record
                            , v_amount
                            , tran_saction
                            , v_to
                            , the_sum_of
                            , app_by
                            , manager_by
                            , v_inv_no
                            , payee
                            , v_note
                            ) 
                        VALUES 
                          ('$txt_date_deposit'
                            , '$txt_amount_deposit'
                            , '$txt_transaction'
                            , '$txt_to'
                            , '$txt_the_sum_of'
                            , '$txt_app_by'
                            , '$txt_manage'
                            , '$txt_voucher_no'
                            , '$txt_employee_deposit'
                            , '$txt_note_deposit'
                            
                            )";

     $result = mysqli_query($connect, $sql);
     header('location:cash_voucher.php?message=success');
}

    if(isset($_GET["id"])){
    $id = $_GET["id"];
      
    $sql = "DELETE FROM tbl_cash_voucher WHERE id = '$id'" ;
    $result = mysqli_query($connect, $sql);
    header("location:cash_voucher.php?message=delete");  
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
                         <h2 class="text-primary">CASH VOUCHER</h2>
                        <hr>
                           

                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add New</button>

              

                <!-- deposit modal -->
                    <!-- Modal -->
                <div class="modal fade" id="deModal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add New</h4>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data" action="">  

                          <div class="form-group col-xs-12">
                            <label for ="">Voucher No :</label>                                          
                            <input class="form-control" required  name="txt_voucher_no" type="text" value="<?php echo ''.date("Ymd").''.rand(10,1000000); ?>" placeholder="Voucher...">          
                          </div>

                          <div class="form-group col-xs-12">
                            <label for ="">Date Record :</label>                                          
                            <input class="form-control" required  name="txt_date_deposit" type="date" placeholder="date...">          
                          </div>
                        

                          <div class="form-group col-xs-12">
                            <label for ="">Amount :</label>                                          
                            <input class="form-control" required  name="txt_amount_deposit" type="text" placeholder="amount...">          
                          </div>

                           <div class="form-group col-xs-12">
                            <label for ="">Transaction Type:</label>                                          
                            <input class="form-control" required  name="txt_transaction" type="text" placeholder="Transaction...">          
                          </div>

                           <div class="form-group col-xs-12">
                            <label for ="">To:</label>                                          
                            <input class="form-control" required  name="txt_to" type="text" placeholder="To...">          
                          </div>

                          <div class="form-group col-xs-12">
                            <label for ="">The Sum Of:</label>                                          
                            <input class="form-control" required  name="txt_the_sum_of" type="text" placeholder="The Sum Of...">          
                          </div>

                          <div class="form-group col-xs-12">
                            <label for ="">Approved By:</label>                                          
                            <input class="form-control" required  name="txt_app_by" type="text" placeholder="Approved By...">          
                          </div>

                           <div class="form-group col-xs-12">
                            <label for ="">Manager:</label>                                          
                            <input class="form-control" required  name="txt_manage" type="text" placeholder="Manager...">          
                          </div>
                         


                          <div class="form-group col-xs-12">
                            <label for ="">Employee Payee :</label>                                          
                                  <select class = "form-control select2" style = "width:100%" name = "txt_employee_deposit">
                                    <option value="">====Select and Choose====</option>
                                        <?php
                                          $v_select = mysqli_query($connect,"SELECT * FROM tbl_users WHERE user_position='1' ");
                                          while ($row1 = mysqli_fetch_assoc($v_select)) { ?>
                                          <option value="<?php echo $row1['user_id']; ?>"><?php echo $row1['user_first_name'] ;?> <?php echo $row1['user_last_name'] ;?></option>
                                        <?php 
                                        }
                                         ?>   
                                  </select>           
                          </div>
                          <div class="form-group col-xs-12">
                            <label for="note">Note :</label>
                             <textarea class="form-control" rows="4" name = "txt_note_deposit"></textarea>
                          </div>
                          <br>
                          <div class="form-group col-xs-6">
                            <button type="submit" name = "btn_deposit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                          </div> 
                        </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  </div>
                </div>
                </div>
                <!-- end deposit modal -->


                <!-- <a href="dashboard.php" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Back</a> -->
                <form class="form-inline" method = "post" action="" style="display: inline-block;">
                  <div class="form-group">
                    <input type="text" data-provide="datepicker" placeholder="DATE START" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "from" value="<?= @$_POST['from'] ?>" >
                  </div>
                  <div class="form-group">
                    <input type="text" data-provide="datepicker" placeholder="DATE END" autocomplete="off" data-date-format="yyyy-mm-dd" class="form-control" required="" name = "to" value="<?= @$_POST['to'] ?>"> 
                  </div>
                  <button type="submit" name="search" class="btn btn-success">Search</button>
                  <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Clear</a>
                   <a target="_blank" class="btn btn-danger" href="cashvoucher_print.php?from=<?php echo $from ?>&amp;to=<?php echo $to; ?>">
          <i class="fa fa-print"></i> Print</a>
                </form> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th style="width: 10px !important;">Voucher No</th>
                                            <th>Date Record</th>
                                            <th>Amount</th>
                                            <th>Employee</th>
                                            
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            $i=1;
                                            $v_sum_amount = 0; 
                                            while($row = $result->fetch_assoc()) 
                                            { 
                                                 
                                             
                                          ?>
                                          <tr>
                                            <td style="width: 10px;"><?php echo ($i++) ;?></td> 
                                           
                                            <td><?php echo $row["v_date_record"];?></td>
                                            <td style="text-align: right;">$<?php echo number_format($row["v_amount"],2);?></td>
                                           <td><?php echo $row['user_first_name'].' '.$row['user_last_name']; ?></td>
                                          
                                         
                                            <td align = "center">
                                           <a href="">
                                             
                                           </a>
                                           <a target="_blank"  href="cashvoucher_print.php?id=<?php echo $row['id']; ?>">
                                            <i class="fa fa-print"></i> Print</a>
                                            
                                            <a onclick = "return confirm('Are you sure to delete ?');" href="petty_cash_deposit.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                          </tr> 
                                          <?php
                                            }  
                                          ?>
                                    </tbody>
                                    <tfoot>
                                      
                                    </tfoot>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
  <style type="text/css">
    table th {
      text-align: center;
    }
  </style>
<?php include_once '../layout/footer.php' ?>
          