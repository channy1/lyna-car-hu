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
                        <!--  <label for="staticEmail" class="col-sm-2">Image Upload</label>
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
 <div class="form-group row">
   <div class="col-sm-2">
                          
                    </div>
                      <label for="staticEmail" class="col-sm-2">Province Name</label>
                      <div class="col-sm-6">
                         <select class="form-control" name="txt_province_id" id="vehicle">
                                <?php
                                  $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title";
                                  $result = $connect->query($v_sql);
                                   if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                              <?php
                                 }
                               }
                              ?>
                         
                         </select>
                      </div>
                       <div class="col-sm-2">
                          
                    </div>
                    </div>

<?php
  }
 }
?>
<br>
 
<div  style="width:100%;">
                           
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>From Destination</th>
                                        <th>To Destination</th>
                                        <th>One-Way</th>
                                        <th>Round-Trip</th>
                                        <th>Note</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                 $id=@$connect->real_escape_string($_POST['ve_id_ajax']);
                                 $v_sql = "SELECT * FROM tbl_air_port 
                                 INNER JOIN tbl_province
                                 ON tbl_air_port.province_id = tbl_province.pv_id
                                 where car_id='$id' ORDER BY pv_title  ";

                               


                               
                                 $result = $connect->query($v_sql);
                                 $one_way=0;
                                 $two_way=0;
                                 // if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                  $one_way=$row['one_way'];
                                  $two_way=$row['two_way'];
                                  if($two_way !="") {
                                     $two_way=$row['two_way'];
                                   }
                                   else {
                                    $two_way=0;
                                   }
                                   if($one_way !="") {
                                     $one_way=$row['one_way'];
                                   }
                                   else {
                                   $one_way=0;
                                   }

                                        ?>
                                  <tr>
                                    <td><?php echo $row['pv_title']; ?><br>(<?php echo $row['pro_from']; ?>)</td>
                                    <td><?php echo $row['pro_to']; ?></td>
                                    <td style="text-align:right;">$ <?php echo number_format($one_way,2); ?></td>
                                    <td style="text-align:right;">$ <?php echo number_format($two_way,2); ?></td>
                                    <td><?php echo $row['note']; ?></td>
                                    <td>
                                      <a href="delete_air_port.php?delete_id=<?php echo $row['air_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-remove"></i></a>
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