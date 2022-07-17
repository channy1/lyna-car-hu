<?php
 include_once '../../config/database.php';
?>

<?php
// echo "kemun";
$id=@$connect->real_escape_string($_POST['ve_id_ajax']);
 $v_sql = "SELECT * FROM tbl_vehicle_rantal where ve_id='$id'  ";
 $result = $connect->query($v_sql);
 if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
?>

<div class="form-group row">
                        <label for="staticEmail" class="col-sm-2">Year</label>
                        <div class="col-sm-4">
                          <input type="text" readonly class="form-control" value="<?php echo $row['ve_year']; ?>">
                        </div>
                         <label for="staticEmail" class="col-sm-2">Tax & VAT</label>
                      <div class="col-sm-4">
                         <select class="form-control" name="txt_vat" id="txt_vat">  
                                <option value="0"> VAT (0%)</option>
                                <option value="10"> VAT (10%)</option>
                         </select>
                      </div>
                       
                       
                         

                    </div><br>
                     <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2">Make</label>
                        <div class="col-sm-4">
                          <input type="text" readonly class="form-control" value="<?php echo $row['ve_make']; ?>">
                        </div>
                         
                           <label for="staticEmail" class="col-sm-2">N&deg;. Of Seats</label>
                        <div class="col-sm-4">
                          <input type="text" readonly class="form-control" value="<?php echo $row['ve_no_of_seat']; ?>">
                        </div>
                      </div><br>
                      <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2">Model</label>
                        <div class="col-sm-4">
                          <input type="text" readonly class="form-control" value="<?php echo $row['ve_model']; ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-2">Status</label>
                          <div class="col-sm-4">
                             <select class="form-control" name="txt_status" id="txt_status">  
                                    <option <?php if($row['status']=="1") {echo "selected='selected'";} ?> value="1">RENT</option>
                                    <option <?php if($row['status'] !="1") {echo "selected='selected'";} ?>  value="0">SALE</option>
                             
                             </select>
                          </div>
                      </div><br>
                       <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2">Sub-Model</label>
                        <div class="col-sm-4">
                          <input type="text" readonly class="form-control" value="<?php echo $row['ve_sub_model']; ?>">
                        </div>
                       <!--   <label for="staticEmail" class="col-sm-2">Image Upload</label>
                          <div class="col-sm-2">
                            <img width="100px" height="100px" src="../image/vehicle_rental/<?php //echo $row['ve_image']; ?>">
                          </div> -->
                      </div><br>
                       <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2">Vehicle Type</label>
                        <div class="col-sm-4">
                          <input type="text" readonly class="form-control" value="<?php echo $row['ve_vehical_type']; ?>">
                        </div>
                         <label for="staticEmail" class="col-sm-2">Image Upload</label>
                          <div class="col-sm-2">
                            <img width="150px" height="120px" src="../image/vehicle_rental/<?php echo $row['ve_image']; ?>">
                          </div>
                      </div>
<br>
 

<?php
  }
 }
?>

<br>
 
<div  style="width:100%;">
                           
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>From Province </th>
                                        <th>To Province </th>
                                        <th>Price</th>
                                        <th>Note</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                 $id=@$connect->real_escape_string($_POST['ve_id_ajax']);
                                 $v_sql = "SELECT * FROM tbl_carrental_pickup_price 
                                 INNER JOIN tbl_province
                                 ON tbl_carrental_pickup_price.pro_from_id = tbl_province.pv_id
                                

                                 where car_id='$id' ORDER BY pv_title  ";
                                 $result = $connect->query($v_sql);
                               //echo $v_sql;
                                
                                 // if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                   $to_id=$row['pro_to_id'];
                                   $v_sqls = "SELECT pv_title FROM tbl_province 
                                              WHERE pv_id='$to_id'";
                                     $results = $connect->query($v_sqls);

                  
                                    ?>
                                  <tr>
                                    <td><?php echo $row['pv_title']; ?></td>
                                    <?php
                                    
                                    
                                        while($rows = $results->fetch_assoc()) {
                                         
                                    ?>
                                   
                                    <td style="word-wrap: break-word; overflow-wrap: break-word;"><?php echo  $rows['pv_title']; ?></td>
                                     <?php
                                       }
                                    ?>
                                    <td style="text-align:right;">$ <?php echo number_format($row['carrental_price'],2); ?></td>
                                   
                                    <td><?php echo $row['note']; ?></td>
                                    <td>
                                      <a href="delete_pickup_rent.php?delete_id=<?php echo $row['air_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-remove"></i></a>
                                    </td>
                                  </tr>
                                <?php
                                   // }
                                  }
                                ?>
                                  
                                </tbody>
                            </table>
                        </div>
<style type="text/css">
table th {
  text-align: center;
}
</style>