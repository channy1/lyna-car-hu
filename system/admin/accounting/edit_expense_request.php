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
 if(isset($_POST["btnadd"])){
      $id = $_POST["id"];
      $v_date_record = $_POST["txt_date_record"];
      $v_description = $_POST["txt_description"];
      $v_expense_category = $_POST["txt_expense_category"];
      $v_amount = $_POST["txt_amount"];
      $v_employee = $_POST["txt_employee"];
      $v_note = $_POST["txt_note"];
      $v_txt_u_price = $_POST["txt_u_price"];
      $v_qty = $_POST["txt_qty"];
      $v_pcv=$_POST['txt_pcv'];
      $sql = "UPDATE tbl_expen_request 
            SET em_id = '$v_employee', date_record = '$v_date_record' ,
                description = '$v_description', ex_category = '$v_expense_category',
                ex_qty = '$v_qty', ex_price = '$v_txt_u_price',
                ex_amount = '$v_amount', ex_note = '$v_note',pcv='$v_pcv'
            WHERE id = '$id'" ;
      mysqli_query($connect, $sql);
      header("location:expense_request.php?message=update");
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
                      
                        <hr>
                          
                 <?php
                      $id=$_GET['id'];
                      $v_select = mysqli_query($connect,"SELECT * FROM tbl_expen_request AS A
                      LEFT JOIN tbl_expense_category AS B ON A.ex_category=B.exca_id
                      LEFT JOIN tbl_users AS C ON A.em_id=C.user_id
                      WHERE id='$id'");
                      while ($row = mysqli_fetch_assoc($v_select)) {
                     
                 ?>
               
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data" action="">    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <div class="form-group col-xs-12">
                            <label for ="">Date Record :</label>                                          
                            <input value="<?php echo $row['date_record']; ?>" class="form-control" required  name="txt_date_record" type="date" placeholder="date...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">PCV :</label>                                          
                            <input value="<?php echo $row['pcv']; ?>" class="form-control" required  name="txt_pcv" type="text" placeholder="pcv...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">Description :</label>                                          
                            <input value="<?php echo $row['description']; ?>" class="form-control" required  name="txt_description" type="text" placeholder="description...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">Expense Category :</label>                                          
                                  <select class = "form-control select2" style = "width:100%" name = "txt_expense_category">
                                    <option value="">====Select and Choose====</option>
                                        <?php
                                          $v_select = mysqli_query($connect,"SELECT * FROM tbl_expense_category");
                                          while ($row1 = mysqli_fetch_assoc($v_select)) { ?>
                                          <option
                                          <?php 
                                          if($row['ex_category']==$row1['exca_id']) {
                                            echo "selected='selected'";
                                          } 
                                          ?>
                                           value="<?php echo $row1['exca_id']; ?>"><?php echo $row1['exca_name'] ;?></option>
                                        <?php 
                                        }
                                         ?>   
                                  </select>           
                          </div>
                           <div class="form-group col-xs-12">
                            <label for ="">Qty :</label>                                          
                            <input value="<?php echo $row['ex_qty']; ?>" class="form-control" required  name="txt_qty" type="text" placeholder="Qty...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">U. Price :</label>                                          
                            <input value="<?php echo $row['ex_price']; ?>" class="form-control" required  name="txt_u_price" type="text" placeholder="Price...">          
                          </div>

                          <div class="form-group col-xs-12">
                            <label for ="">Amount :</label>                                          
                            <input value="<?php echo $row['ex_amount']; ?>" class="form-control" required  name="txt_amount" type="text" placeholder="amount...">          
                          </div>
                          <div class="form-group col-xs-12">
                            <label for ="">Employee :</label>                                          
                                  <select class = "form-control select2" style = "width:100%" name = "txt_employee">
                                    <option value="">====Select and Choose====</option>
                                        <?php
                                          $v_select = mysqli_query($connect,"SELECT * FROM tbl_users WHERE user_position='1' ");
                                          while ($row1 = mysqli_fetch_assoc($v_select)) { ?>
                                          <option
                                            <?php 
                                          if($row['em_id']==$row1['user_id']) {
                                            echo "selected='selected'";
                                          } 
                                          ?> value="<?php echo $row1['user_id']; ?>"><?php echo $row1['user_first_name'] ;?> <?php echo $row1['user_last_name'] ;?></option>
                                        <?php 
                                        }
                                         ?>   
                                  </select>           
                          </div>
                          <div class="form-group col-xs-12">
                            <label for="note">Note :</label>
                            <textarea class="form-control" rows="4" name = "txt_note">
                            <?php echo $row['ex_note']; ?>
                             </textarea>
                          </div>
                          <div class="form-group col-xs-6">
                            <button type="submit" name = "btnadd" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                          </div> 
                        </form>
                    </div>
                  <?php }  ?>
               
                        </div> 
                    </div>
                </div>
            </div>
          