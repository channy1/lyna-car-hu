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
    if(isset($_POST['btn_add'])){
        // $v_image = @$_FILES['txt_image'];
         //if($v_image["name"] != ""){
            //$new_name = date("Ymd")."_".rand(1111,9999)."_".$v_image["name"];
            //move_uploaded_file($v_image["tmp_name"], "../../img/img_news/".$new_name);
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            //$v_description = @$connect->real_escape_string($_POST['txt_description']);
            $v_detail = @$connect->real_escape_string($_POST['txt_detail']." ");
            //$v_posted_by = @$_SESSION['user']->user_id;
            $query_add = "INSERT INTO tbl_ft_upcoming (
                    ft_title,
                    ft_detail
                    ) 
                VALUES(
                    '$v_title',
                    '$v_detail')";
            if($connect->query($query_add)){
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
        //}else{
        //     $sms = '<div class="alert alert-danger">
        //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        //         <strong>Error!</strong> Please Insert Image ...
        //         </div>';
        // }
    }

 ?>


<?php 

    if(isset($_POST['btn_add'])){



        $v_image = @$_FILES['txt_image'];



        if($v_image["name"] != ""){

            $new_name = date("Ymd")."_".rand(1111,9999).".png";

            //move_uploaded_file($v_image["tmp_name"],"../image/accessories rental/".$new_name);
			move_uploaded_file($v_image["tmp_name"],$inner_directory_path ."accessories rental/".$new_name);

        }else{

            $new_name = "blank.png";

        }

        

        $v_title = @$connect->real_escape_string($_POST['txt_title']);

       

        $v_image1 = $new_name;

        $province_name = @$connect->real_escape_string($_POST['province_name']);

        $v_ref = @$connect->real_escape_string($_POST['txt_ref']);

        $v_days1_7 = @$connect->real_escape_string($_POST['txt_days(1-7)']);

        $v_extradays1_7 = @$connect->real_escape_string($_POST['txt_extradays(1-7)']);

        $v_days15_26 = @$connect->real_escape_string($_POST['txt_days(15-26)']);

        $v_extradays15_26 = @$connect->real_escape_string($_POST['txt_extradays(15-26)']);

        $v_monthly = @$connect->real_escape_string($_POST['txt_monthly']);

        $v_monthly_extradays = @$connect->real_escape_string($_POST['txt_monthly_extradays']);

        $v_yearly = @$connect->real_escape_string($_POST['txt_yearly']);

        $v_yearly_extradays = @$connect->real_escape_string($_POST['txt_yearly_extradays']);

        $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);

        $txt_discount = @$connect->real_escape_string($_POST['txt_discount']);

        $txt_refun_deposit = @$connect->real_escape_string($_POST['txt_refun_deposit']);

        $v_year = @$connect->real_escape_string($_POST['txt_year']);

        $v_make = @$connect->real_escape_string($_POST['txt_make']);

        $v_model = @$connect->real_escape_string($_POST['txt_model']);

        $v_sub_model = @$connect->real_escape_string($_POST['txt_sub_model']);

        $v_color = @$connect->real_escape_string($_POST['txt_color']);

        $v_note = @$connect->real_escape_string($_POST['txt_detail']);

        $query_add = "INSERT INTO tbl_accessories_rental (

                ac_title,

                ac_image,

                ac_province_name,

                ac_ref_no,

                `ac_days(1-7)`,

                `ac_extradays(1-7)`,

                `ac_days(15-26)`,

                `ac_extradays(15-26)`,

                ac_monthly,

                ac_extramonthly,

                ac_yearly,

                ac_extrayearly,

                discount,

                vat,

                refun_deposit,

                ve_year,

                ve_make,

                ve_model,

                ve_sub_model,

                ve_color,

                note

                ) 

            VALUES(

                '$v_title',

                '$v_image1',

                '$province_name',

                '$v_ref',

                '$v_days1_7',

                '$v_extradays1_7',

                '$v_days15_26',

                '$v_extradays15_26',

                '$v_monthly',

                '$v_monthly_extradays',

                '$v_yearly',

                '$v_yearly_extradays',

                '$txt_discount',

                '$txt_vat',

                '$txt_refun_deposit',

                '$v_year',

                '$v_make',

                '$v_model',

                '$v_sub_model',

                '$v_color',

                '$v_note'

                )";

        if($connect->query($query_add)){

            $sms = '<div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                <strong>Successfull!</strong> Data inserted ...

            </div>'; 

        }else{

            $sms = '<div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                <strong>Error!</strong> '.mysqli_error($connect).'...

            </div>';   

        }

    }



 ?>



            <h1>Create Accessories Rental Record</h1>
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
            

                 <form role="form" method="post" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label >Title:</label>
                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title"   required >
                  </div>				  
				  <div class="form-group">
                    <label >Image</label>
                    <input type="file" class="form-control" name="txt_image"    required >
                  </div>
				  <div class="form-group">
                    <label >Province Name</label>
                   <select class="form-control" name="province_name" id="province_name">
                                        <?php $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                                                <?php          }   } ?>
                   </select>
                  </div>
				 
				  <div class="form-group">
                    <label >Ref. No.</label>
                    <input type="text" class="form-control" name="txt_ref" placeholder="Enter Ref"   required >
                  </div>
				  <div class="form-group">
                    <label >Year</label>
                    <input type="text" class="form-control" name="txt_year" placeholder="Enter year"   required >
                  </div>
				  <div class="form-group">
                    <label >Vat</label>
                    <input type="text" class="form-control" name="txt_vat" placeholder="Enter vat"   required >
                  </div>
				  <div class="form-group">
                    <label >Make</label>
                    <input type="text" class="form-control" name="txt_make" placeholder="Enter make"   required >
                  </div>
				  <div class="form-group">
                    <label >Model</label>
                    <input type="text" class="form-control" name="txt_model" placeholder="Enter model"   required >
                  </div>
				  <div class="form-group">
                    <label >Sub Model</label>
                    <input type="text" class="form-control" name="txt_sub_model" placeholder="Enter sub model"   required >
                  </div>
				  <div class="form-group">
                    <label >Color</label>
                    <input type="text" class="form-control" name="txt_color" placeholder="Enter color"   required >
                  </div>
				  <div class="form-group">
                    <label >Day (1-7)</label>
                    <input type="text" class="form-control" name="txt_days(1-7)" placeholder="Enter days"   required >
                  </div>
				  <div class="form-group">
                    <label >Extra Day (1-7)</label>
                    <input type="text" class="form-control" name="txt_extradays(1-7)" placeholder="Enter extra days"   required >
                  </div>
				  <div class="form-group">
                    <label >Day (15-26)</label>
                    <input type="text" class="form-control" name="txt_days(15-26)" placeholder="Enter days"   required >
                  </div>
				  <div class="form-group">
                    <label >Extra Day (15-26)</label>
                    <input type="text" class="form-control" name="txt_extradays(15-26)" placeholder="Enter extra days"   required >
                  </div>
				  <div class="form-group">
                    <label >Monthly</label>
                    <input type="text" class="form-control" name="txt_monthly" placeholder="Enter Monthly"   required >
                  </div>
				  <div class="form-group">
                    <label >Monthly Extradays</label>
                    <input type="text" class="form-control" name="txt_monthly_extradays" placeholder="Enter Monthly extradays"   required >
                  </div>
				  <div class="form-group">
                    <label >Yearly</label>
                    <input type="text" class="form-control" name="txt_yearly" placeholder="Enter yearly"   required >
                  </div>
				  <div class="form-group">
                    <label >Yearly Extradays</label>
                    <input type="text" class="form-control" name="txt_yearly_extradays" placeholder="Enter yearly extradays"   required >
                  </div>
				  <div class="form-group">
                    <label >Vat</label>
                    <input type="text" class="form-control" name="txt_vat" placeholder="Enter vat"   required >
                  </div>
				  <div class="form-group">
                    <label >Discount</label>
                    <input type="text" class="form-control" name="txt_discount" placeholder="Enter discount"   required >
                  </div>
				  <div class="form-group">
                    <label >Refundable Deposit</label>
                    <input type="text" class="form-control" name="txt_refun_deposit" placeholder="Enter deposit"   required >
                  </div>	  
             

               <div class="form-group">
                    <label>Description:</label>
                    <textarea  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="txt_detail" required="required"></textarea>
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
