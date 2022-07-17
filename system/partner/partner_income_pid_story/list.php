<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<div class="portlet light bordered">


    

    <div class="row">
        <div class="col-xs-12">
           <center><h2>RENTAL LIST</h2></center>
        </div>
    </div>

    <!-- calender start -->
    <div class="row">
        
        <table class="table table-bordered">
              <thead>
                <tr>
                  <th>N&deg;</th>
                  <th >Date</th>
                  <th >ID N&deg;</th>
                  <th >Partner Name</th>
                  <th >Phone</th>
                  <th >Email</th>
                  <th >Prepared By</th>
                  <th >Approved By</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $query="SELECT * FROM tbl_partner_income_paid_history 
                                 INNER JOIN tbl_users
                                 ON tbl_users.user_id=tbl_partner_income_paid_history.partner_id
                                
                                 ORDER BY start_date DESC LIMIT 150
                        ";
                        $result = $connect->query($query);
                        $i=1;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                ?>
               
                 <tr>
                  <td><?php echo $i++; ?></td>
                                     <td>
                                      
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                       
                                    </td>
                                     <td>
                                    
                                         <?php  
                                            echo $row['user_introducer_id'];
                                            ?>
                                
                                    </td>
                                     <td>
                                     
                                          <?php
                                            echo $row['user_first_name'].''.$row['user_last_name'];
                                          ?>
                                  
                                    </td>
                                     <td>
                                  
                                          <?php
                                            echo $row['user_phone_number']; 
                                          ?>
                                   
                                    </td>
                                    <td>
                                   
                                          <?php
                                            echo $row['user_email'];
                                          ?>
                                   
                                    </td>
                                    
                                     
                                    <td>
                                   
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                   
                                    </td>
                                    <td>
                                   
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                   
                                    </td>
      
                 
                  <td>
                   <a href="edit.php?edit_id=<?php echo $row['p_id']; ?>" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit
                   </a>
                    <a href="dalete.php?delete_id=<?php echo $row['p_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>
                  </td>
                </tr>
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

