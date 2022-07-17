<?php

require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';


     $edit_id = $_GET["edit_id"];
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

      <?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_pre_info WHERE pre_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["pre_title"];
            $title_kh = $row["pre_title_kh"];
            $image = $row["pre_image"];
            $description = $row["pre_detail"];
            $description = $row["pre_detail_kh"];
        }
    }
    else{}
?>

<?php 
  /*   
    if(isset($_POST['btn_save'])){
            $v_image = @$_FILES['txt_image'];
            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], $inner_directory_path."hotel/".$new_name);
            }else{
                $new_name = $image;
                //echo "<script> alert ('hello'); </script> ";
            }
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_title_kh = @$connect->real_escape_string($_POST['txt_title_kh']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            $v_detail_kh = @$connect->real_escape_string($_POST['txt_detail_kh']." ");
            $query_add = "UPDATE tbl_pre_info SET pre_title='$v_title',pre_title_kh='$v_title_kh',pre_image='$new_name',pre_detail='$v_detail',pre_detail_kh='$v_detail_kh' WHERE pre_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
               $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data Updated ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }

            echo $sms;
    }
 */
 ?>

<?php
 /*   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_pre_info WHERE pre_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
            $title = $row["pre_title"];
            $title_kh = $row["pre_title_kh"];
            $image = $row["pre_image"];
            $description = $row["pre_detail"];
            $description_kh = $row["pre_detail_kh"];
        }
    }
    else{} */
?>
       

<?php

   $edit_id = $_GET["edit_id"]; 

    $query="SELECT * FROM tbl_hotel LEFT JOIN tbl_hotel_include_option  ON tbl_hotel.ht_id = tbl_hotel_include_option.hotel_id WHERE ht_id='$edit_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

            $title = $row["ht_title"];

            $image = $row["ht_image"];

            $location = $row["ht_location"];

            $phone = $row["ht_phone"];

            $website = $row["ht_website"];

            $distance = $row["ht_distance"];

            $detail = $row["ht_detail"];

            $price=$row['price'];

            $u_adult=$row['adult'];

            $u_children=$row['children'];

            $u_room_total=$row['room_total'];

            $u_province_id=$row['province_id'];

            $u_vat=$row['vat'];

            $u_discount=$row['discount'];

           

        }

    }

    else{}









?>

<?php 

    

    if(isset($_POST['btn_save'])){

            $v_image = @$_FILES['txt_image'];

            if($v_image["name"] != ""){

                $new_name = date("Ymd")."_".rand(1111,9999).".png";

                //move_uploaded_file($v_image["tmp_name"], "../image/hotel/".$new_name);
				move_uploaded_file($v_image["tmp_name"],$inner_directory_path ."hotel/".$new_name);

            }else{

                $new_name = $image;

                //echo "<script> alert ('hello'); </script> ";

            }

            

            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            $v_location = @$connect->real_escape_string($_POST['txt_location']);

            $v_phone = @$connect->real_escape_string($_POST['txt_phone']);

            $v_website = @$connect->real_escape_string($_POST['txt_website']);

            $v_distance = @$connect->real_escape_string($_POST['txt_distance']);

            $v_detail = @$connect->real_escape_string($_POST['txt_detail']);

            $txt_price = @$connect->real_escape_string($_POST['txt_price']);

            $txt_adult = @$connect->real_escape_string($_POST['txt_adult']);

            $txt_children = @$connect->real_escape_string($_POST['txt_children']);

            $txt_room_number = @$connect->real_escape_string($_POST['txt_room_number']);

            $txt_province = @$connect->real_escape_string($_POST['txt_province']);

            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);

            $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);

            $query_add = "UPDATE tbl_hotel SET ht_title='$v_title',ht_image='$new_name',ht_location='$v_location',ht_phone='$v_phone',ht_website='$v_website',ht_distance='$v_distance',

            ht_detail='$v_detail',adult='$txt_adult',children='$txt_children',room_total='$txt_room_number',

            province_id='$txt_province',discount='$txt_discount',vat='$txt_vat',price='$txt_price'

            WHERE ht_id='$edit_id'";

            if($connect->query($query_add)==TRUE){

                 $query_delete="DELETE FROM tbl_hotel_include_option WHERE hotel_id='$edit_id'";

                 $results = $connect->query($query_delete);

                $r_option_type="";

                $r_option_type = $_POST['chk'];

                   // convert to array of integer

                 $r_option_type = array_map('intval', $r_option_type);

                 foreach($r_option_type as $val){

                $sql_option = "INSERT INTO `tbl_hotel_include_option`(

                                  `hotel_id`,

                                  `name`

                              )

                              VALUES(

                                  '$edit_id',

                                  '$val'

                                  )";

                        if($connect->query($sql_option)){

                        } 

                  }





                $sms = '<div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Successfull!</strong> Data inserted...

                </div>';

            }else{

                $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> Query error ...

                </div>';   

            }

    }



 ?>



            <h1>Edit HOTEL & GUEST HOUSE </h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
            
            
            </div>
            <!-- /.card-header -->
            

                 <form role="form" method="post" enctype="multipart/form-data"  >
                <div class="card-body">
                  <div class="form-group">
                    <label >Title:</label>
                    <input type="text" class="form-control" name="txt_title" value="<?php echo $title; ?>"  required >
                  </div>
				  <div class="form-group">
                    <label >Image:</label>
					 <img style="height:50px; width:50px;" src="<?php  echo $img_path.'hotel/'.$image;?>">
                    <input type="file" class="form-control" name="txt_image"    >
                  </div>
                   <div class="form-group">
                     <label >Location</label>
                     <input type="text" class="form-control" name="txt_location" placeholder="Enter Title"  value="<?php echo $title; ?>"   required >
                   </div>
				    <div class="form-group">
                     <label >Province</label>
					 <select name="txt_province" class="form-control" style="background-color:white;">
					 <?php  $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                     ?>
                            <option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                     <?php } } ?>

                     </select>
                   </div> 
				    <div class="form-group">
                     <label >Phone</label>
                     <input type="text" class="form-control" name="txt_phone" placeholder="Enter Phone"  value="<?php echo $phone; ?>"   required >
                   </div>
				   <div class="form-group">
                     <label >Website</label>
                     <input value="<?php echo $website; ?>" type="text" class="form-control" name="txt_website" placeholder="Enter Website"   required >
                   </div>
				   <div class="form-group">
                     <label >Distance From</label>
                     <input value="<?php echo $distance; ?>" type="text" class="form-control" name="txt_distance" placeholder="30km"   required >
                   </div> 
				    <div class="form-group">
                     <label >Price </label>
                     <input value="<?php echo $price; ?>" type="text" class="form-control" name="txt_price" placeholder="Enter Price"   required >
                   </div> 
				   <div class="form-group">
                     <label >Discount</label>
                     <input value="<?php echo $u_discount; ?>"  type="text" class="form-control" name="txt_discount" placeholder="Enter Discount"   required >
                   </div>
				   <div class="form-group">
                     <label >Vat</label>
                    <select required="" name="txt_vat" class="form-control" style="background-color:white;">

                                        <option <?php if($u_vat=="0") {echo "selected='selected'";} ?> value="0">( 0%)</option>

                                        <option <?php if($u_vat=="10") {echo "selected='selected'";} ?> value="10">( 10%)</option>

                                      

                                    </select>
                   </div>
				   <div class="form-group">
                     <label >Adults</label>
                   <select required="" name="txt_adult" class="form-control" style="background-color:white;">

                                        <option value="">Adults</option>

                                        <option <?php if($u_adult=="1") {echo "selected='selected'";} ?> value="1">1</option>

                                        <option <?php if($u_adult=="2") {echo "selected='selected'";} ?> value="2">2</option>

                                        <option <?php if($u_adult=="3") {echo "selected='selected'";} ?> value="3">3</option>

                                    </select>
                   </div>
				   <div class="form-group">
                     <label >Children</label>
                    <select required="" name="txt_children" class="form-control" style="background-color:white;">

                                        <option value="">Children</option>

                                        <option <?php if($u_children=="1") {echo "selected='selected'";} ?> value="1">1</option>

                                        <option <?php if($u_children=="2") {echo "selected='selected'";} ?> value="2">2</option>

                                        <option <?php if($u_children=="3") {echo "selected='selected'";} ?> value="3">3</option>

                                    </select>
                   </div>
				   <div class="form-group">
                     <label >Room Number</label>
                     <input type="text" value="<?php echo $u_room_total; ?>" class="form-control" name="txt_room_number" placeholder="Enter Room Number"   required >
                   </div>
				    <?php

                                            $edit_id = $_GET["edit_id"]; 

                                            $query="SELECT tbl_hotel_include_option.name

                                             , (CASE WHEN tbl_hotel_include_option.name ='1' THEN tbl_hotel_include_option.name END) 'C1'

                                             , (CASE WHEN tbl_hotel_include_option.name ='2' THEN tbl_hotel_include_option.name END) 'C2'

                                             , (CASE WHEN tbl_hotel_include_option.name ='3' THEN tbl_hotel_include_option.name END) 'C3'

                                             , (CASE WHEN tbl_hotel_include_option.name ='4' THEN tbl_hotel_include_option.name END) 'C4'

                                             , (CASE WHEN tbl_hotel_include_option.name ='5' THEN tbl_hotel_include_option.name END) 'C5'

                                             , (CASE WHEN tbl_hotel_include_option.name ='6' THEN tbl_hotel_include_option.name END) 'C6'

                                             , (CASE WHEN tbl_hotel_include_option.name ='7' THEN tbl_hotel_include_option.name END) 'C7'

                                             , (CASE WHEN tbl_hotel_include_option.name ='8' THEN tbl_hotel_include_option.name END) 'C8'

                                            FROM 

                                             tbl_hotel_include_option WHERE tbl_hotel_include_option.hotel_id='$edit_id' 

                                            ";

                                          

                                            $result = $connect->query($query);

                                            //echo $query;

                                            $result_one_true="";

                                            $result_six_true="";

                                            $result_three_true="";

                                            $result_two_true="";

                                            $result_four_true="";

                                            $result_five_true="";

                                            $result_seven_true="";

                                            $result_eight_true="";

                                            if ($result->num_rows > 0) {

                                            while($row = $result->fetch_assoc()) {

                                                $check=$row['name'];



                                                $check_one=$row['C1'];

                                                $check_two=$row['C2'];

                                                $check_three=$row['C3'];

                                                $check_four=$row['C4'];

                                                $check_five=$row['C5'];

                                                $check_six=$row['C6'];

                                                $check_seven=$row['C7'];

                                                $check_eight=$row['C8'];

                                                

                                                if($check_one !=""){

                                                    $result_one_true=$row['C1'];

                                                }

                                                if($check_two !=""){

                                                    $result_two_true=$row['C2'];

                                                }

                                                if($check_three !=""){

                                                    $result_three_true=$row['C3'];

                                                }

                                                if($check_four !=""){

                                                    $result_four_true=$row['C4'];

                                                }

                                                 if($check_five !=""){

                                                    $result_five_true=$row['C5'];

                                                }

                                                 if($check_six !=""){

                                                    $result_six_true=$row['C6'];

                                                }

                                                 if($check_seven !=""){

                                                    $result_seven_true=$row['C7'];

                                                }

                                                 if($check_eight !=""){

                                                    $result_eight_true=$row['C8'];

                                                }

                                               

                                                

                                                

                                            ?>

                                             

                                               

                                           

                                                 <?php  }} ?>
												 <label >Your options here include</label>
					<div class="custom-control custom-checkbox">

                                            <div class="row">
											

                                               <div class="col-md-4">

                                                    <input <?php if($result_one_true=="1") {echo "checked";} ?>  type="checkbox" name="chk[]" value='1' class="custom-control-input" id="defaultUnchecked">

                                                    <label class="custom-control-label" for="defaultUnchecked">Breakfast</label><br>

                                                    <input <?php if($result_two_true=="2") {echo "checked";} ?>  type="checkbox" name="chk[]" value='2' class="custom-control-input" id="defaultUnchecked">

                                                    <label class="custom-control-label" for="defaultUnchecked">Pay at the hotel</label><br>

                                                    <input <?php if($result_three_true=="3") {echo "checked";} ?> type="checkbox" name="chk[]" value='3' class="custom-control-input" id="defaultUnchecked">

                                                    <label class="custom-control-label" for="defaultUnchecked">Welcome drink</label>

                                                </div>

                                                <div class="col-md-4">

                                                    <input <?php if($result_four_true=="4") {echo "checked";} ?> type="checkbox" name="chk[]" value='4' class="custom-control-input" id="defaultUnchecked">

                                                    <label  class="custom-control-label" for="defaultUnchecked">Complimentary in- room fruit</label><br>

                                                    <input <?php if($result_five_true=="5") {echo "checked";} ?> type="checkbox" name="chk[]" value='5' class="custom-control-input" id="defaultUnchecked">

                                                    <label class="custom-control-label" for="defaultUnchecked">Free cancellation</label><br>

                                                    <input <?php if($result_six_true=="6") {echo "checked";} ?> type="checkbox" name="chk[]" value='6' class="custom-control-input" id="defaultUnchecked">

                                                    <label class="custom-control-label" for="defaultUnchecked">Parking</label>

                                                </div>

                                                 <div class="col-md-4">

                                                    <input <?php if($result_seven_true=="7") {echo "checked";} ?> type="checkbox" name="chk[]" value='7' class="custom-control-input" id="defaultUnchecked">

                                                    <label class="custom-control-label" for="defaultUnchecked">Free mini bar</label><br>

                                                    <input <?php if($result_eight_true=="8") {echo "checked";} ?> type="checkbox" name="chk[]" value='8' class="custom-control-input" id="defaultUnchecked">

                                                    <label class="custom-control-label" for="defaultUnchecked">Price includes</label>

                                                </div>

                                            </div>

                                        </div>

                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_save" class="btn btn-primary">Update</button>
                   <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
              </form>
           




          
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require '../footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $base_url; ?>admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $base_url; ?>admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url; ?>admin/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo $base_url; ?>admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
