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



  if(isset($_POST['btn_education'])){ 

      $user_id=@$_SESSION['user']->user_id;

      $qt_education=@$connect->real_escape_string($_POST['qt_education']);

      $from_education=@$connect->real_escape_string($_POST['from_education']);

      $to_education=@$connect->real_escape_string($_POST['to_education']);

      $university_education=@$connect->real_escape_string($_POST['university_education']);

      $fiel_education=@$connect->real_escape_string($_POST['fiel_education']);

      $description_education=@$connect->real_escape_string($_POST['description_education']);

      $query_add="INSERT INTO tbl_cv_education(user_id,qualification,from_cv,to_cv,school_university,study_field,description)

                                VALUES('$user_id','$qt_education','$from_education','$to_education','$university_education','$fiel_education',

                                  '$description_education')

      ";

      if($connect->query($query_add)){

      }

      else {

        echo "Error!";

      }

  }



  if(isset($_POST['btn_update'])){ 



       $insert_cv_title=$connect->real_escape_string($_POST['insert_cv_title']);

       $user_id=@$_SESSION['user']->user_id;

       $hight_qualification=$connect->real_escape_string($_POST['hight_qualification']);

       $last_career_level=$connect->real_escape_string($_POST['last_career_level']);

       $year_exper=$connect->real_escape_string($_POST['year_exper']);

       $last_job_function=$connect->real_escape_string($_POST['last_job_function']);

       $last_salary=$connect->real_escape_string($_POST['last_salary']);

       $last_position=$connect->real_escape_string($_POST['last_position']);

       $last_industry=$connect->real_escape_string($_POST['last_industry']);

       $per_industry=$connect->real_escape_string($_POST['per_industry']);

       $per_location=$connect->real_escape_string($_POST['per_location']);

       $per_function=$connect->real_escape_string($_POST['per_function']);

       $per_position=$connect->real_escape_string($_POST['per_position']);

       $expect_salary=$connect->real_escape_string($_POST['expect_salary']);

       $term_of_work=$connect->real_escape_string($_POST['term_of_work']);

       $available_work=$connect->real_escape_string($_POST['available_work']);

       $language=$connect->real_escape_string($_POST['language']);

       $work_exper=$connect->real_escape_string($_POST['work_exper']);

       $other_training=$connect->real_escape_string($_POST['other_training']);

       $hobby=$connect->real_escape_string($_POST['hobby']);

       $refer=$connect->real_escape_string($_POST['refer']);

       $certificate=$connect->real_escape_string($_POST['certificate']);

        $query_update = "UPDATE tbl_cv_information SET 

            cv_title='$insert_cv_title',

            hight_qualification='$hight_qualification',

            last_career_level='$last_career_level',

            year_exper='$year_exper',

            last_job_function='$last_job_function',

            last_salary='$last_salary',

            last_position='$last_position',

            last_industry='$last_industry',

            per_industry='$per_industry',

            per_location='$per_location',

            per_function='$per_function',

            per_position='$per_position',

            expect_salary='$expect_salary',

            term_of_work='$term_of_work',

            available_work='$available_work',

            language='$language',

            work_exper='$work_exper',

            other_training='$other_training',

            hobby='$hobby',

            refer='$refer',

            certificate='$certificate'

            WHERE user_id='$user_id'";



            if($connect->query($query_update)==TRUE){

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



  if(isset($_POST['btn_add'])){ 

       $insert_cv_title=$connect->real_escape_string($_POST['insert_cv_title']);

       $user_id=@$_SESSION['user']->user_id;

       $hight_qualification=$connect->real_escape_string($_POST['hight_qualification']);

       $last_career_level=$connect->real_escape_string($_POST['last_career_level']);

       $year_exper=$connect->real_escape_string($_POST['year_exper']);

       $last_job_function=$connect->real_escape_string($_POST['last_job_function']);

       $last_salary=$connect->real_escape_string($_POST['last_salary']);

       $last_position=$connect->real_escape_string($_POST['last_position']);

       $last_industry=$connect->real_escape_string($_POST['last_industry']);

       $per_industry=$connect->real_escape_string($_POST['per_industry']);

       $per_location=$connect->real_escape_string($_POST['per_location']);

       $per_function=$connect->real_escape_string($_POST['per_function']);

       $per_position=$connect->real_escape_string($_POST['per_position']);

       $expect_salary=$connect->real_escape_string($_POST['expect_salary']);

       $term_of_work=$connect->real_escape_string($_POST['term_of_work']);

       $available_work=$connect->real_escape_string($_POST['available_work']);

       $language=$connect->real_escape_string($_POST['language']);

       $work_exper=$connect->real_escape_string($_POST['work_exper']);

       $other_training=$connect->real_escape_string($_POST['other_training']);

       $hobby=$connect->real_escape_string($_POST['hobby']);

       $refer=$connect->real_escape_string($_POST['refer']);

       $certificate=$connect->real_escape_string($_POST['certificate']);

       $query_cv="INSERT INTO tbl_cv_information(user_id,cv_title,hight_qualification,last_career_level,year_exper,

        last_job_function,last_salary,last_position,last_industry,per_industry,per_location,per_function,

        per_position,expect_salary,term_of_work,available_work,language,work_exper,other_training,hobby,refer,certificate)

                                VALUES('$user_id','$insert_cv_title','$hight_qualification','$last_career_level','$year_exper',

                                  '$last_job_function','$last_salary','$last_position','$last_industry','$per_industry','$per_location',

                                  '$per_function','$per_position','$expect_salary','$term_of_work','$available_work',

                                  '$language','$work_exper','$other_training','$hobby','$refer','$certificate')

      ";

      if($connect->query($query_cv)){

          $sms = '<div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Successfull!</strong> Data inserted ...

                </div>'; 

      }

      else {

        $sms = '<div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <strong>Error!</strong> '.mysqli_error($connect).'...

                </div>';  

      }

  }

?>



<?php

    $ch_has=0;

    $user_id=@$_SESSION['user']->user_id;

    $query="SELECT * FROM tbl_cv_information WHERE user_id='$user_id'";

    $result = $connect->query($query);

    if ($result->num_rows > 0) {

    while($row_up = $result->fetch_assoc()) {

    $ch_has=$row_up['user_id'];

    $v_cv_title=$row_up['cv_title'];

    $v_hight_qualification=$row_up['hight_qualification'];

    $v_last_career_level=$row_up['last_career_level'];

    $v_year_exper=$row_up['year_exper'];

    $v_last_job_function=$row_up['last_job_function'];

    $v_last_salary=$row_up['last_salary'];

    $v_last_position=$row_up['last_position'];

    $v_last_industry=$row_up['last_industry'];

    $v_per_industry=$row_up['per_industry'];

    $v_per_location=$row_up['per_location'];

    $v_per_function=$row_up['per_function'];

    $v_per_position=$row_up['per_position'];

    $v_expect_salary=$row_up['expect_salary'];

    $v_term_of_work=$row_up['term_of_work'];

    $v_available_work=$row_up['available_work'];

    $v_language=$row_up['language'];

    $v_work_exper=$row_up['work_exper'];

    $v_other_training=$row_up['other_training'];

    $v_hobby=$row_up['hobby'];

    $v_refer=$row_up['refer'];

    $v_certificate=$row_up['certificate'];

?>

<?php

    }

  }

?>






            <h1>Create Resume</h1>
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
            

                 
                <div class="card-body">
				<div class="form-group bg-primary p-2">
                    <label >Job Details</label> 
                  </div> 
                  <div class="form-group">
                    <label >CV Title</label>
                    <input type="text"   class="form-control" id="show_cv_title" value="<?php if($ch_has >0) {echo $v_cv_title;} ?>">
                  </div> 


                <div class="form-group">
                  <label >Choose Image:</label>
				  <div><img src="http://choicecart.xyz/carrental/system/img/img_customer/<?php echo @$_SESSION['user']->user_photo; ?>" 
					width="50px" height="50px" highytalt="Profile Photo"></div>
                    <input src="../../img/img_partner/<?php echo @$_SESSION['user']->user_photo; ?>" type="file" class="form-control" name="txt_image" required   placeholder="Image.jpg"  >
                 </div>
				 <div class="form-group bg-primary p-2">
                    <label >Personal Information</label> 
                  </div> 
				 <div class="form-group">                     
					<label>First Name</label>
                    <input type="text"   class="form-control" id="show_cv_title" value="<?php if($ch_has >0) {echo $v_cv_title;} ?>">
                  </div>  
				  <div class="form-group">                     
					<label>Last Name</label>
                     <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_last_name) ?>">
                  </div>
				  <div class="form-group">                     
					<label>Date Of Birth</label>
                    <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_birthday) ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Sex</label>
                   <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_gender) ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Phone</label>
                   <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_phone_number) ?>">
                  </div> 
				  <div class="form-group">                     
					<label>E-mail</label>
                   <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_email) ?>">
                  </div>
				  <div class="form-group">                     
					<label>Address</label>
                  <input type="text" class="form-control" readonly id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_address) ?>">
                  </div> 
				  <div class="border p-1 mb-1 rounded ">
				  <div class="form-group bg-primary p-2">
                    <label >Educational Qualification</label> 
                  </div> 
				   <form action="#" method="post" enctype="multipart/form-data">
					   <div class="form-group">                     
						<label>Qualification</label>
					 <select name="qt_education" class="form-control">
						  <option value="1">Primary School</option>
						  <option value="2">Secondary School</option>
						  <option value="3">High School</option>
						  <option value="4">Associate</option>
						  <option value="5">Bachelor</option>
						  <option value="6">Master</option>
						  <option value="7">Doctorate</option>
						  <option value="8">Other</option>
					 </select>
					  </div>
				  <div class="form-group">                     
					<label>From</label>
                 <input type="date" name="from_education" class="form-control" id="staticEmail" value="">
                  </div>  
				  <div class="form-group">                     
					<label>To</label>
                 <input type="date" name="to_education" class="form-control" id="staticEmail" value="">
                  </div> 
				  <div class="form-group">                     
					<label>Institute/University </label>
					<input type="text" name="university_education" class="form-control" id="staticEmail" value="">
                  </div> 
				  <div class="form-group">                     
					<label>Field of Study </label>
					<input type="text" name="fiel_education" class="form-control" id="staticEmail" value="">
                  </div> 
				  <div class="form-group">
                    <label>Description</label>
                    <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; 
						  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description_education" required="required"></textarea>
                  </div>
				  <div class="form-group">                     
					 <button type="submit" name="btn_education" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                  </div> 
				 
				  <div> 
                 <table class="table table-bordered">

                        <thead>

                          <tr>

                            <th>Qualification</th>

                            <th>From</th>

                            <th>To</th>

                            <th>Institute/University</th>

                            <th>Field of Study</th>

                            <th>Description</th>

                            <th>Action</th>

                          </tr>

                        </thead>

                        <tbody>

                          <?php

                             $id=@$_SESSION['user']->user_id;

                             $v_sql = "SELECT * FROM tbl_cv_education where user_id='$id' ";

                             $result = $connect->query($v_sql);

                              if ($result->num_rows > 0) {

                                while($row = $result->fetch_assoc()) {

                                  $qualification=$row['qualification'];

                          ?>

                          <tr>

                           <td>

                            <?php

                             if($qualification=="1") {

                              echo "Primary School";

                             }

                             elseif ($qualification=="2") {

                              echo "Secondary School";

                             }

                             elseif ($qualification=="3") {

                              echo "High School";

                             }

                             elseif ($qualification=="4") {

                              echo "Associate";

                             }

                             elseif ($qualification=="5") {

                              echo "Bachelor";

                             }

                             elseif ($qualification=="6") {

                              echo "Master";

                             }

                             elseif ($qualification=="7") {

                              echo "Doctorate";

                             }

                             elseif ($qualification=="8") {

                              echo "Other";

                             }

                            ?>

                          </td>

                           <td><?php echo $row['from_cv']; ?></td>

                           <td><?php echo $row['to_cv']; ?></td>

                           <td><?php echo $row['school_university']; ?></td>

                           <td><?php echo $row['study_field']; ?></td>

                           <td><?php echo $row['description']; ?></td>

                           <td>

                            <a href="delete_cv_education.php?delete_id=<?php echo $row['education_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>

                           </td>

                          </tr>

                          <?php }} ?>

                          

                          

                        </tbody>

                      </table>
					</form>
					  </div>
					  </div>
				<div class="border rounded p-1 mb-1">
					<form action="#" method="post" enctype="multipart/form-data">
					  <div class="form-group bg-primary p-2">
						<label >Career Profile</label> 
						<p>Below is a summary of your profile which helps employers decide if you are a suitable candidate.</p>
					  </div> 
					   <div class="form-group">                     
						<label>Highest Qualification</label>
					<select name="hight_qualification" class="form-control">

                      <option 

                      <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==1) {

                          echo "selected='selected'";

                        }

                      }

                        ?> 

                        value="1">Primary School</option>

                      <option

                       <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==2) {

                          echo "selected='selected'";

                        }

                      }

                        ?> 

                       value="2">Secondary School</option>

                      <option

                       <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==3) {

                          echo "selected='selected'";

                        }

                      } ?> 

                       value="3">High School</option>

                      <option

                       <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==4) {

                          echo "selected='selected'";

                        }

                      }

                        ?> 

                       value="4">Associate</option>

                      <option

                       <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==5) {

                          echo "selected='selected'";

                        }

                      }

                        ?> 

                       value="5">Bachelor</option>

                      <option

                       <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==6) {

                          echo "selected='selected'";

                        }

                      }

                        ?> 

                       value="6">Master</option>

                      <option

                       <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==7) {

                          echo "selected='selected'";

                        }

                      }

                        ?> 

                       value="7">Doctorate</option>

                      <option

                       <?php 

                      if($ch_has >0 ) {

                        if($v_hight_qualification==8) {

                          echo "selected='selected'";

                        }

                      }

                        ?> 

                       value="8">Other</option>

                    </select>
                  </div>		
				  <div class="form-group">                     
					<label>Latest Career Level</label>
                     <input type="text" name="last_career_level" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_career_level;} ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Year of Experience</label>
                     <input type="text" name="year_exper" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_year_exper;} ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Latest Position</label>
                     <input type="text" class="form-control" name="last_position"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_position;} ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Latest Job Function</label>
                     <input type="text" name="last_job_function" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_job_function;} ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Latest Industry</label>
                     <input type="text" name="last_industry" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_industry;} ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Latest Salary ($)</label>
                     <input type="text" name="last_salary" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_salary;} ?>">
                  </div> 
				  <div class="form-group bg-primary p-2">
						<label >Job Preferences</label> 
				  </div> 
				  <div class="form-group">                     
					<label>Prefered Industry</label>
                     <input type="text" name="per_industry" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_industry;} ?>">
                  </div>
				  <div class="form-group">                     
					<label>Prefered Location</label>
                     <input type="text" name="per_location" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_location;} ?>">
                  </div>
				  <div class="form-group">                     
					<label>Prefered Function</label>
                     <input type="text" name="per_function" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_function;} ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Prefered Position</label>
                     <input type="text" name="per_position" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_position;} ?>">
                  </div>
				  <div class="form-group">                     
					<label>Expected Salary</label>
                     <input type="text" name="expect_salary" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_expect_salary;} ?>">
                  </div> 
				  <div class="form-group">                     
					<label>Terms of Working</label>
                     <input type="text" name="term_of_work" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_term_of_work;} ?>">
                  </div>				   
				  <div class="form-group">                     
					<label>Availability at Work</label>
                    <select name="available_work" class="form-control">
                      <option 
                      <?php
                        if($ch_has >0) {
                          if($v_available_work==1) {
                            echo "selected='selected'";
                          } }
						  ?>value="1">1 Week</option>
						  <option <?php if($ch_has >0) {
                          if($v_available_work==2) {
                            echo "selected='selected'";
							}
                        }
                      ?>  value="2">3 weeks </option>
                      <option <?php if($ch_has >0) {
                          if($v_available_work==3) {
                            echo "selected='selected'";
                          }
                        }
                      ?> value="3">1 Month</option>
                    </select>
                  </div> 
				  <div class="form-group">                     
					<label>Language(s) ភាសា</label> 
                       <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; 
						  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
						  name="language" required="required"><?php if($ch_has >0) {echo $v_language;} ?> </textarea>
                  </div>
				  <div class="form-group">                     
					<label>Work Experience</label> 
                       <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; 
						  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
						  name="work_exper" required="required"> <?php if($ch_has >0) {echo $v_work_exper;} ?></textarea>
                  </div>
				  <div class="form-group">                     
					<label>Other Training Skills</label> 
                       <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; 
						  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
						  name="other_training" required="required"> <?php if($ch_has >0) {echo $v_other_training;} ?></textarea>
                  </div>
				  <div class="form-group">                     
					<label>Hobbies</label> 
                       <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; 
						  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
						  name="hobby" required="required"> <?php if($ch_has >0) {echo $v_hobby;} ?></textarea>
                  </div> 
				  <div class="form-group">                     
					<label>Referees</label> 
                       <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; 
						  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
						  name="refer" required="required"> <?php if($ch_has >0) {echo $v_refer;} ?>
						  </textarea>
                  </div>
				  <div class="form-group">                     
					<label>Certificates</label> 
                       <textarea class="textarea"  placeholder="Enter Description"
                          style="width: 100%; height: 200px; font-size: 14px; 
						  line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
						  name="certificate" required="required"> <?php if($ch_has >0) {echo $v_certificate;} ?>
						  </textarea>
                  </div>
				  
                  <?php

                     if($ch_has >0) {

                  ?>

                  <button type="submit" name="btn_update" class="btn btn-primary"> Submit</button>

                  <?php } else { ?>

                   <button type="submit" name="btn_add" class="btn btn-primary"> Submit</button>

                  <?php } ?>
				
				</form>
			 </div>
              
				</div>
                
           
                </div>
                <!-- /.card-body -->
 
              
           




          
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
