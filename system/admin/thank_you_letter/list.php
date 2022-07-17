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
        <select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
          <option data-subtext="" value="1" <?php echo $type==1?'selected':'';?>>Thank you Letter</option>                    
          <option value="2" <?php echo $type==2?'selected':'';?>>Incoming & Outgoing</option>               
        </select>                  
      </div>      
        <div class="col-md-2">         
          <input type="submit" class="btn btn-primary" name="btn_view" value="View Now">
       </div>
     </div>  
    </form>     
    <!-- end type of form -->

    <br>

    <!-- calender start -->
    <div class="row">
        
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Customer Name</th>
              <th>E-mail Address</th>
              <th>Subject</th>
              <th>In Date</th>
              <th>Out Date</th>
              <th>Action By</th>
              <th>Status/Remarks</th> 
              <th>Action</th>        
            </tr>
          </thead>
                <?php
                    $query = "SELECT tbl_cus_letter.*, user.user_first_name, user.user_last_name FROM tbl_cus_letter INNER JOIN tbl_users AS user ON tbl_cus_letter.action_by = user.user_id WHERE tbl_cus_letter.type='$type' ORDER BY id DESC";                     
                        $result = $connect->query($query);
                        $i=0;
                        if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_object($result)){

                ?>
              <tbody>
                <tr>
                  <td><?=++$i;?></td>            
                  <td><?=$row->cus_name;?></td>            
                  <td><?=$row->email_address;?></td>
                  <td><?=$row->subject;?></td>
                  <td><?=$row->in_date;?></td>
                  <td><?=$row->out_date;?></td>
                  <td><?=$row->user_first_name;?> <?=$row->user_last_name;?></td>
                  <td><?=$row->status_remarks;?></td>
                  <td>
                    <a href="edit.php?edit_id=<?php echo $row->id; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
                   </a>
                    <a href="dalete.php?delete_id=<?php echo $row->id; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
                  </td>
                </tr>
              </tbody>
            <?php
                   }
                  }
                ?>
                
                
              </tbody>
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
<?php include_once '../layout/footer.php' ?>

