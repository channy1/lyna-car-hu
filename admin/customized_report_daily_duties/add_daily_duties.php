<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';

if(isset($_POST['btn_delete'])){
    $id = $_POST['txt_id'];
    $delete = "DELETE FROM tbl_daily_duties WHERE id='$id'";
    if($connect->query($delete)){
      echo "Success.";
    }else{
      echo "Fail.";
    }

  }
  if(isset($_POST['btn_add'])){
    $str="";
    $id = $_POST['txt_id'];
    $con = $_POST['txt_con'];
    $day = @$connect->real_escape_string($_POST['txt_date_record']);
    $remark="";
    if($con=='insert'){
      if(isset($_POST['daily'])){
        $str = implode(',', $_POST['daily']);
        $remark = @$connect->real_escape_string($_POST['txt_remark']);
      }
      $sql = "INSERT INTO tbl_daily_duties VALUES(null, '$str','$remark', '$day')";
    }else{
      if(isset($_POST['daily'])){
        $str = implode(',', $_POST['daily']);
        $remark = @$connect->real_escape_string($_POST['txt_remark']);
      }
      $sql = "UPDATE tbl_daily_duties SET opt_checked='$str',remark='$remark', date_re='$day' WHERE id='$id'";
    }

    if($connect->query($sql)){
      echo "success";
      // header('location:add_daily_duties.php');
    }else{
      echo "fail";
    }
  }
  $date = date('Y-m-d');
  if(isset($_POST['btn_view'])){
  $date = $_POST['txt_date_record'];
  }
  $get = "SELECT * FROM tbl_daily_duties WHERE date_re='$date'";
  $get_reslut = $connect->query($get);
  if($get_reslut->num_rows>0){
    $con = "update";
    $row = mysqli_fetch_object($get_reslut);
    $d = explode(',', $row->opt_checked);
    $id=$row->id;
    $remark = $row->remark;
  }else{
    $con = "insert";
    $remark='';
    $id=0;
    $d=array();
  }
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
			<div class="col-sm-6">
				<h1>ADD DAILY DUTIES</h1>
			</div>         
        </div>
      </div><!-- /.container-fluid -->
    </section> 

    <!-- Main content -->
    <section class="content">
      <div class="row">
		 <?= @$sms ?>
        <div class="col-md-12">
			<div class="card card-outline card-info">
				<div class="card-header">			
				</div>
				<!-- /.card-header -->
				<div class="card-body">	
					<div class="row">
						<div class="col-md-8">
							<form>
								<?php
									$s_input_month=@$connect->real_escape_string($_GET['txt_month']);
									$s_input_year=@$connect->real_escape_string($_GET['txt_year']);
									$s_txt_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);
								?>
								<div class="form-group row">
									<div class="col-md-3">
										<input type="hidden" name="txt_con" value="<?=$con;?>">
										<input type="hidden" name="txt_id" value="<?=$id;?>">
										<input value="<?php echo $date ?>" type="text" class="form-control" name="txt_date_record" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
									</div>
									<div class="col-md-2">
										<button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
									</div>
								</div>
								<br>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Remark</label>
								<input type="text" name="txt_remark" class="form-control" value="<?=$remark;?>"> 
							</div>
						</div>
						<div class="col-md-6">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="checkbox" name="daily[]" value="1.1" <?php echo in_array(1.1, $d)?'checked':'';?> class=""> : រថយន្ដប្ដូប្រេងម៉ាស៊ីន (ធម្មតា)</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.2" <?php echo in_array(1.2, $d)?'checked':'';?> class=""> : រថយន្ដប្រើសេវាថែទាំតាមកាលកំណត់ A B C D</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.3" <?php echo in_array(1.3, $d)?'checked':'';?> class=""> : ប័ណ្ណបើកបររថយន្ដ</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.4" <?php echo in_array(1.4, $d)?'checked':'';?> class=""> : ឈៀករថយន្ដប្រចាំឆ្នាំ</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.5" <?php echo in_array(1.5, $d)?'checked':'';?> class=""> : ពន្ធផ្លូវរថយន្ដប្រចាំឆ្នាំ</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.6" <?php echo in_array(1.6, $d)?'checked':'';?> class=""> : បន្ដទិដ្ឋាការប្រចាំខែឬ ឆ្នាំ</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.7" <?php echo in_array(1.7, $d)?'checked':'';?> class=""> : កាត់លេខកុងទ័រ រថយន្ដទាំងភ្ញៀវ និង រថយន្ដ LCRC ក្នុងសៀវភៅកត់ត្រា និង SYSTEM</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.8" <?php echo in_array(1.8, $d)?'checked':'';?> class=""> : សរសេរ ប័ណ្ណប្ដូរប្រេង ម៉ាស៊ីនពាក់ ក ច្ងកូតរថយន្ដ</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.12" <?php echo in_array(1.12, $d)?'checked':'';?> class=""> : កត់ត្រារំលឹកបង់ថ្លៃភ្លើងប្រចាំខែ</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.9" <?php echo in_array(1.9, $d)?'checked':'';?> class=""> : កត់ត្រារំលឹកបង់ថ្លែ INTERNET ប្រចាំខែ</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.33" <?php echo in_array(1.33, $d)?'checked':'';?> class=""> : កត់ត្រាបង់ថ្លៃ ទឹកប្រចាំខែ</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.11" <?php echo in_array(1.11, $d)?'checked':'';?> class=""> : កត់ត្រាផ្លៃបង់អគារ</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="1.13" <?php echo in_array(1.13, $d)?'checked':'';?> class=""> : កត់ត្រាថ្លៃបង់ METFONE ប្រចាំខែ</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.1" <?php echo in_array(2.1, $d)?'checked':'';?> class=""> : ទទួលបដិសណ្ឋារកិច្ច​ ភ្ញៀវខ្មែរនិងបរទេស</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.2" <?php echo in_array(2.2, $d)?'checked':'';?> class=""> : មិត្តរួមការងារផ្មែក LGC និង LCRC</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.3" <?php echo in_array(2.3, $d)?'checked':'';?> class=""> : រាយការណ៍ដោយផ្ទាល់ទៅអ្នកគ្រប់គ្រង</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.4" <?php echo in_array(2.4, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកស្វាគមន៍ភ្ញៀវផ្នែកជួលរថយន្ដ​ និង ភ្ញៀវខាងយានដ្ឋាន</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.5" <?php echo in_array(2.5, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកជួលរថយន្ដ​ Care Hire</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.6" <?php echo in_array(2.6, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកទំនាក់ទំនងភ្ញៀវផ្នែកជួលរថយន្ដតាមរយ៖អ៊ីម៉ែល Sending e-mail</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.7" <?php echo in_array(2.7, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកធ្វើកិច្ចសន្យាជួលរថយន្ដ Preparing Vehicle Rental Agreement</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.8" <?php echo in_array(2.8, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញខ្វូថេហ្ិនជួលរថយន្ដ (QUOTATION) Preparing Quotation</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.9" <?php echo in_array(2.9, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញ​អ៊ិនវ៉យជួលរថយន្ដ​ (INVOICE) Preparing Recipt</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.23" <?php echo in_array(2.23, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញ​ រីសីុបជួលរថយន្ដ (RECEIPT) Preparing Receipt</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.11" <?php echo in_array(2.11, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកវាយបញ្ជូលក្នុងសីស្ដែម</p>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.12" <?php echo in_array(2.12, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកចេញប័ណ្ណបើកបររថយន្ដនិងទោរច័ក្រយានយន្ដទាំងថ្មីនិងបន្ដ</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.13" <?php echo in_array(2.13, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកបន្ដទិដ្ឋការជនបរទេស Visa Extension</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.14" <?php echo in_array(2.14, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកជួយរៀបចំឯកសារសម្ភាសន៏បុគ្គលិក</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.15" <?php echo in_array(2.15, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកផ្នែកកត់ត្រាចាត់ចែងរថយន្ដជួល</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.16" <?php echo in_array(2.16, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកចាត់ចែងអ្នកបើកបរ Driver Magagement</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.17" <?php echo in_array(2.17, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកត្រួតពិនិត្យភាពស្អាតនៃរងយន្ដក្រោយពីលាងរួច​ ឬ ត្រឡប់មកពីលាង</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.18" <?php echo in_array(2.18, $d)?'checked':'';?> class=""> : ទទួលបន្ទុកស្វែងរករថយន្ដជួលពីដៃគូរ</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.19" <?php echo in_array(2.19, $d)?'checked':'';?> class=""> : ជួយបំរើភេសជ្ជដល់ភ្ញៀវទាំងផ្នែកជួលរថយន្ដនិងយានដ្ឋាន</p>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<p><input type="checkbox" name="daily[]" value="2.22" <?php echo in_array(2.22, $d)?'checked':'';?> class=""> : ធ្វើការងារផ្សេងៗទៀតដែលមានការស្នើសុំ ដោយប្រធាន</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							</div>
						</div>
					</div>					
					<div class="row" style="float:right;">
						<div class="col-md-12 text-center">
							<button type="submit" name="btn_add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Add</button>
							<button type="reset" class="btn btn-success"><i class="fa fa-eraser fa-fw"></i>Reset</button>
							<a href="index.php" class="btn btn-danger"><i class="fa fa-undo fa-fw"></i>Cancel</a>
						</div>
					</div>
				</div>	
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
