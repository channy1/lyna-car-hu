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
                        <h2 class="text-primary">Expense List <select onchange="window.location=this.value"><option value="expense_list.php">Rent</option><option selected="" value="expense_list.php">Input</option></select></h2>
                        <hr>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add New</button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
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
                            <label for ="">Date Record :</label>                                          
                            <input class="form-control" required  name="txt_date_record" type="date" placeholder="date...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">Description :</label>                                          
                            <input class="form-control" required  name="txt_description" type="text" placeholder="description...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">Expense Category :</label>                                          
                                  <select class = "form-control select2" style = "width:100%" name = "txt_expense_category">
                                    <option value="">====Select and Choose====</option>
                                        <?php
                                          $v_select = mysqli_query($connect,"SELECT * FROM tbl_expense_category");
                                          while ($row1 = mysqli_fetch_assoc($v_select)) { ?>
                                          <option value="<?php echo $row1['exca_id']; ?>"><?php echo $row1['exca_name'] ;?></option>
                                        <?php 
                                        }
                                         ?>   
                                  </select>           
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">Amount :</label>                                          
                            <input class="form-control" required  name="txt_amount" type="text" placeholder="amount...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">Employee :</label>                                          
                                  <select class = "form-control select2" style = "width:100%" name = "txt_employee">
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
                             <textarea class="form-control" rows="4" name = "txt_note"></textarea>
                          </div>
                          <div class="form-group col-xs-6">
                            <button type="submit" name = "btnadd" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
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
                </form> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table id="example" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th style="width: 10px;">No</th>
                                            <th>Date Record</th>
                                            <th>Description</th>
                                            <th>Expense Category</th>
                                            <th>Amount</th>
                                            <th>Employee</th>
                                            <th>Note</th>
                                           <th><i class="fa fa-cog" aria-hidden="true"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            $i=1;
                                            $v_sum_amount = 0; 
                                            while($row = $result->fetch_assoc()) 
                                            { 
                                                 
                                              $v1=$row["exp_id"];
                                              $v2=$row["exp_date_record"];
                                              $v3=$row["exp_description"];
                                              $v4=$row["exca_name"];
                                              $v5=$row["exp_amount"];
                                              $v6=$row["user_first_name"].' '.$row['user_last_name'];
                                              $v7=$row["exp_note"];
                                              $v_sum_amount += $row["exp_amount"];
                                          ?>
                                          <tr>
                                            <td><?php echo ($i++) ;?></td> 
                                            <td><?php echo $v2;?></td>
                                            <td><?php echo $v3;?></td>
                                            <td><?php echo $v4;?></td>
                                            <th style="text-align: right;">$ <?= number_format($v5,2) ?></th>
                                            <td><?php echo $v6;?></td>
                                            <td><?php echo $v7;?></td>
                                            <td align = "center">
                                            <a href="edit_expense_list.php?id=<?php echo $row['exp_id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            <a onclick = "return confirm('Are you sure to delete ?');" href="expense_list.php?id=<?php echo $row['exp_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                            </td>
                                          </tr> 
                                          <?php
                                            }  
                                          ?>
                                    </tbody>
                                    <tfoot>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
                                      <th style="text-align: right;">$ <?= number_format($v_sum_amount,2) ?></th>
                                      <th></th>
                                      <th></th>
                                      <th></th>
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
          