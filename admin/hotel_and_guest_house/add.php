<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../editor_header.php'; 
require '../sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<?php 
/*     if(isset($_POST['btn_add'])){
            $v_image = @$_FILES['txt_image'];
            // if($v_image["name"] != ""){
            //     $v_photo_name = date("Ymd_Hisa")."_".rand(1111,9999).".png";
            //     copy("tmp_".@$_SESSION['user']->user_id.'.png',"../image/pre_info/".$v_photo_name);
            // }else{
            //     $v_photo_name = "blank.png";
            // }

            if($v_image["name"] != ""){
                $new_name = date("Ymd")."_".rand(1111,9999).".png";
                move_uploaded_file($v_image["tmp_name"], $inner_directory_path."pre_info/".$new_name);
            }else{
                $new_name = "blank.png";
            }

            $v_title = @$connect->real_escape_string($_POST['txt_title']);
             $v_titlekh = @$connect->real_escape_string($_POST['pre_title_kh']);
            //$v_image = @$connect->real_escape_string($_POST['txt_image']);
            $v_image1 = $new_name;
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']);
            $v_detailkh = @$connect->real_escape_string($_POST['pre_detail_kh']);
            $query_add = "INSERT INTO tbl_pre_info (
                    pre_image,
                     pre_title,
                     pre_title_kh,
                     pre_detail,
                     pre_detail_kh
                    ) 
                VALUES(
                 '$v_image1',
                    '$v_title',
                    '$v_titlekh',
                    '$v_detail',
                     '$v_detailkh')";
            if($connect->query($query_add)){
               $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data Updated ...
                </div>'; 
            }else{
              echo $query_add;
              // print_r($v_image);
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>';   
            }

            echo $sms;
        //}else{
        //     $sms = '<div class="alert alert-danger">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <strong>Error!</strong> Please Insert Image ...
        //         </div>';
        // }
    }
 */
 ?>
 
<?php 

    if(isset($_POST['btn_add'])){

            $v_image = @$_FILES['txt_image'];

            // if($v_image["name"] != ""){

            //     $v_photo_name = date("Ymd_Hisa")."_".rand(1111,9999).".png";

            //     copy("tmp_".@$_SESSION['user']->user_id.'.png',"../image/pre_info/".$v_photo_name);

            // }else{

            //     $v_photo_name = "blank.png";

            // }



            if($v_image["name"] != ""){

                $new_name = date("Ymd")."_".rand(1111,9999).".png";

                //move_uploaded_file($v_image["tmp_name"], "../image/hotel/".$new_name);
				 move_uploaded_file($v_image["tmp_name"], $inner_directory_path."hotel/".$new_name);

            }else{

                $new_name = "blank.png";

            }



            $v_title = @$connect->real_escape_string($_POST['txt_title']);

            //$v_image = @$connect->real_escape_string($_POST['txt_image']);

            $v_image1 = $new_name;

            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");

            $v_location = @$connect->real_escape_string($_POST['txt_location']);

            $v_phone = @$connect->real_escape_string($_POST['txt_phone']);

            $v_website = @$connect->real_escape_string($_POST['txt_website']);

            $v_distance = @$connect->real_escape_string($_POST['txt_distance']);

            $v_price = @$connect->real_escape_string($_POST['txt_price']);

            $txt_adult = @$connect->real_escape_string($_POST['txt_adult']);

            $txt_children = @$connect->real_escape_string($_POST['txt_children']);

            $txt_room_number = @$connect->real_escape_string($_POST['txt_room_number']);

            $txt_province = @$connect->real_escape_string($_POST['txt_province']);

            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);

            $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);

            $customer_id=@$_SESSION["user"]->user_id;

            

         

            $query_add = "INSERT INTO tbl_hotel (

                    ht_title,

                    ht_image,

                    ht_location,

                    ht_phone,

                    ht_website,

                    ht_distance,

                    ht_detail,

                    price,

                    adult,

                    children,

                    room_total,

                    province_id,

                    discount,

                    vat,

                    add_by



                    ) 

                VALUES(

                    '$v_title',

                    '$v_image1',

                    '$v_location',

                    '$v_phone',

                    '$v_website',

                    '$v_distance',

                    '$v_detail',

                    '$v_price',

                    '$txt_adult',

                    '$txt_children',

                    '$txt_room_number',

                    '$txt_province',

                    '$txt_discount',

                    '$txt_vat',

                    '$customer_id'

                    )";

            if($connect->query($query_add)){

                $last_id = $connect->insert_id;

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

                                  '$last_id',

                                  '$val'

                                  )";

                        if($connect->query($sql_option)){

                        } 

                  }



                $sms = '<div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Successfull!</strong> Data inserted ...

                </div>'; 

            }else{

                $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> Query error ...

                </div>';   

            }

        //}else{

        //     $sms = '<div class="alert alert-danger">

        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        //         <strong>Error!</strong> Please Insert Image ...

        //         </div>';

        // }

    }



 ?>








            <h1>Create Hotel & Guest House Record</h1>
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
            

                 <form role="#" method="post" enctype="multipart/form-data" >
                <div class="card-body">
                   <div class="form-group">
                     <label >Title</label>
                     <input type="text" class="form-control" name="txt_title" placeholder="Enter Title"   required >
                   </div>				   
				   <div class="form-group">
                    <label >Choose Image:</label>
                    <input type="file" class="form-control" name="txt_image" required   placeholder="Image.jpg"  >
                   </div>
				   <div class="form-group">
                     <label >Location</label>
                     <input type="text" class="form-control" name="txt_location" placeholder="Enter Title"   required >
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
                     <input type="text" class="form-control" name="txt_phone" placeholder="Enter Phone"   required >
                   </div>
				   <div class="form-group">
                     <label >Website</label>
                     <input type="text" class="form-control" name="txt_website" placeholder="Enter Website"   required >
                   </div>
				   <div class="form-group">
                     <label >Distance From</label>
                     <input type="text" class="form-control" name="txt_distance" placeholder="30km"   required >
                   </div> 
				   <div class="form-group">
                     <label >Price </label>
                     <input type="text" class="form-control" name="txt_price" placeholder="Enter Price"   required >
                   </div> 
				   <div class="form-group">
                     <label >Discount</label>
                     <input type="text" class="form-control" name="txt_discount" placeholder="Enter Discount"   required >
                   </div>
				   <div class="form-group">
                     <label >Vat</label>
                    <select required="" name="txt_vat" class="form-control" style="background-color:white;">
                                        <option value="0">( 0%)</option>
                                        <option value="10">( 10%)</option>                                  
					</select>
                   </div>
				   <div class="form-group">
                     <label >Adults</label>
                    <select required="" name="txt_adult" class="form-control" style="background-color:white;">
                                        <option value="">Adults</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
					</select>
                   </div>
				   <div class="form-group">
                     <label >Children</label>
                    <select required="" name="txt_children" class="form-control" style="background-color:white;">
                                        <option value="">Children</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
					</select>
                   </div>
				   <div class="form-group">
                     <label >Room Number</label>
                     <input type="text" class="form-control" name="txt_room_number" placeholder="Enter Room Number"   required >
                   </div> 
					<div class="form-group">
						 <label>Your options here include</label>
							<div class="custom-control custom-checkbox">

                                            <div class="row">
											  
                                                <div class="col-md-4">

                                                    <input type="checkbox" name="chk[]" value='1' class="custom-control-input" id="defaultUncheckedBreakfast1">

                                                    <label class="custom-control-label" for="defaultUncheckedBreakfast1">Breakfast</label><br>

                                                    <input type="checkbox" name="chk[]" value='2' class="custom-control-input" id="defaultUncheckedhotel">

                                                    <label class="custom-control-label" for="defaultUncheckedhotel">Pay at the hotel</label><br>

                                                    <input type="checkbox" name="chk[]" value='3' class="custom-control-input" id="defaultUncheckeddrink">

                                                    <label class="custom-control-label" for="defaultUncheckeddrink">Welcome drink</label>

                                                </div>

                                                <div class="col-md-4">

                                                    <input type="checkbox" name="chk[]" value='4' class="custom-control-input" id="defaultUncheckedfruit">

                                                    <label class="custom-control-label" for="defaultUncheckedfruit">Complimentary in- room fruit</label><br>

                                                    <input type="checkbox" name="chk[]" value='5' class="custom-control-input" id="defaultUncheckedcancellation">

                                                    <label class="custom-control-label" for="defaultUncheckedcancellation">Free cancellation</label><br>

                                                    <input type="checkbox" name="chk[]" value='6' class="custom-control-input" id="defaultUncheckedParking">

                                                    <label class="custom-control-label" for="defaultUncheckedParking">Parking</label>

                                                </div>

                                                <div class="col-md-4">

                                                    <input type="checkbox" name="chk[]" value='7' class="custom-control-input" id="defaultUncheckedbar">

                                                    <label class="custom-control-label" for="defaultUncheckedbar">Free mini bar</label><br>

                                                    <input type="checkbox" name="chk[]" value='8' class="custom-control-input" id="defaultUncheckedprice">

                                                    <label class="custom-control-label" for="defaultUncheckedprice">Price includes</label>

                                                </div>

                                            </div>

                                        </div>	
                                        </div>	
              

                  <div class="form-group">
                    <label>Detail (Kh):</label>
                    <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="pre_detail_kh" required="required"></textarea>
                  </div>
 </div>
                
           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_add" class="btn btn-primary">Add</button>
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
