<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    if(isset($_POST['btn_view'])){
      $type = $_POST['txt_type'];      
           
    }else{
      $type = 1;
    }
    $sql = "SELECT * FROM tbl_phone_line WHERE type='$type'"; 
    $result = $connect->query($sql);
    if($result->num_rows>0)
    {
      while($row = mysqli_fetch_object($result))
      {
        $r[]=$row;
      } 
    }else{
      $r='';
    }
?>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
           <center><h2>LIST</h2></center>
        </div>
    </div>

    <!-- type of form -->
    <form action="" method="post">      
      <div class="row">
       <div class="col-md-4">
            <!-- prepared by select -->
            <select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
              <option value="1" <?php echo $type==1?'selected':''?>>Owner</option>                   
              <option value="2" <?php echo $type==2?'selected':''?>>CarRental.Com</option>
              <option value="3" <?php echo $type==3?'selected':''?>>Garage.Com</option>
              <option value="4" <?php echo $type==4?'selected':''?>>Grace Trading.Com</option>
            </select>
            <!-- end prepared by select -->                                  
        </div>      
        <div class="col-md-2">         
          <input type="submit" class="btn btn-primary" name="btn_view" value="View Now">
        </div>
      </div>  
    </form>     
    <!-- end type of form -->

    <!-- calender start -->
    <div class="row">        
      <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 25%;">CONTACT PERSON</th>
              <th style="width: 30%;">TITLE</th>
              <th>TEL. NO.</th>
              <th style="width: 30%;">REMARKS</th>
              <th style="width: 30%;">Action</th>
            </tr>
          </thead>
          <?php
            if($r>0)
            {
              foreach ($r as $val) {              
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $val->contact_person;?></td>
                      <td><?php echo $val->title;?></td>
                      <td>
                        <?php echo(str_replace('/', '<br>', $val->tel));?>
                      </td>
                      <td><?php echo $val->remark;?></td>
                      <td>
                        <a href="edit.php?edit_id=<?php echo $val->id; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
                   </a>
                    <a href="dalete.php?delete_id=<?php echo $val->id; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
                      </td>
                    </tr>
                  </tbody>
                <?php            
              }
            }else{
              ?>
                <tbody>
                  <tr>
                    <td colspan="4">No data</td>
                  </tr>
                </tbody>
              <?php 
            }
          ?>
        </table>

    </div>
    <!-- end calendar -->
        <br>
</div>
<style type="text/css">
    
    table th ,td {
        border: 1px solid black;
        text-align:center;
    }
   
</style>
<?php include_once '../layout/footer.php'?>

