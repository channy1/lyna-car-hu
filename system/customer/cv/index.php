<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php 
//  $province_id=trim(@$_SESSION['user']->province_id);
//  $query="SELECT * FROM tbl_province WHERE pv_id='$province_id'";
//     $result = $connect->query($query);
//     if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//       $pro_name=$row['pv_title'];
//     }}
// 
?>
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

 
<div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
          
        </div>
</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Job Details ពត៍មានលំអិតអំពីការងារ</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
             
                 <div class="form-group row">
				    <label for="staticEmail" class="col-sm-2 col-form-label">CV Title</label>
				    <div class="col-sm-6">
				      <input type="text"   class="form-control" id="show_cv_title" value="<?php if($ch_has >0) {echo $v_cv_title;} ?>">
				    </div>
				     <label for="staticEmail" class="col-sm-2 col-form-label">Photo</label>
				    <div class="col-sm-2">
				      <img src="../../img/img_partner/<?php echo @$_SESSION['user']->user_photo; ?>" style=" width: 120px; height: 120px; box-shadow: 0 0 1px 1px rgba(0,0,0,.1); border-radius: 10px;" alt="Profile Photo">
				    </div>
				  </div>
            </div>
        </div>
    	</div>
       </div>
     </div>   

</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Personal Information ពត៍មានផ្ទាល់ខ្លួន</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
          <div class="form-group row">
				    <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
				    <div class="col-sm-4">
				      <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_first_name) ?>">
				    </div>
				    <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
				    <div class="col-sm-4">
				      <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_last_name) ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="staticEmail" class="col-sm-2 col-form-label">Date Of Birth</label>
				    <div class="col-sm-4">
				      <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_birthday) ?>">
				    </div>
				    <label for="staticEmail" class="col-sm-2 col-form-label">Sex</label>
				    <div class="col-sm-4">
             
               <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_gender) ?>">
				    </div>
				  </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_phone_number) ?>">
            </div>
            <label for="staticEmail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control" id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_email) ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" readonly id="staticEmail" value="<?php echo trim(@$_SESSION['user']->user_address) ?>">
            </div>
          </div>
            </div>
        </div>
    	</div>
       </div>
     </div>   

</div>
<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Educational Qualification លក្ខណសម្បត្តិសិក្សា</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
             <form action="#" method="post" enctype="multipart/form-data">
              
                  <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Qualification </label>
                  <div class="col-sm-4">
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
                  <label for="staticEmail" class="col-sm-1 col-form-label">From</label>
                  <div class="col-sm-2">
                   <input type="date" name="from_education" class="form-control" id="staticEmail" value="">
                  </div>
                  <label for="staticEmail" class="col-sm-1 col-form-label">To</label>
                  <div class="col-sm-2">
                   <input type="date" name="to_education" class="form-control" id="staticEmail" value="">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Institute/University </label>
                  <div class="col-sm-4">
                    <input type="text" name="university_education" class="form-control" id="staticEmail" value="">
                  </div>
                  <label for="staticEmail" class="col-sm-1 col-form-label">Field of Study</label>
                  <div class="col-sm-2">
                   <input type="text" name="fiel_education" class="form-control" id="staticEmail" value="">
                  </div>
                  <label for="staticEmail" class="col-sm-1 col-form-label">Description</label>
                  <div class="col-sm-2">
                    <textarea rows="8" name="description_education" class="form-control">
                    </textarea>
                   
                  </div>
                </div>
                    <button type="submit" name="btn_education" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                    <p></p>
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
      </div>
       </div>
     </div>   

</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Career Profile ប្រវត្តិការងារ</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
             <form action="#" method="post" enctype="multipart/form-data">
              <input type="hidden" id="insert_cv_title" name="insert_cv_title">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
          <p style="margin-left:10px;">Below is a summary of your profile which helps employers decide if you are a suitable candidate.</p>
            <div class="panel-body ">
                 <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Highest Qualification</label>
                  <div class="col-sm-4">
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
                      }
                        ?> 
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
                  <label for="staticEmail" class="col-sm-2 col-form-label">Latest Career Level</label>
                  <div class="col-sm-4">
                    <input type="text" name="last_career_level" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_career_level;} ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Year of Experience</label>
                  <div class="col-sm-4">
                    <input type="text" name="year_exper" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_year_exper;} ?>">
                  </div>
                  <label for="staticEmail" class="col-sm-2 col-form-label">Latest Position</label>
                  <div class="col-sm-4">
                   <input type="text" class="form-control" name="last_position"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_position;} ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Latest Job Function</label>
                  <div class="col-sm-4">
                     <input type="text" name="last_job_function" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_job_function;} ?>">
                  </div>
                  <label for="staticEmail" class="col-sm-2 col-form-label">Latest Industry</label>
                  <div class="col-sm-4">
                   <input type="text" name="last_industry" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_industry;} ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Latest Salary ($)</label>
                  <div class="col-sm-4">
                    <input type="text" name="last_salary" class="form-control"  id="staticEmail" value="<?php if($ch_has >0) {echo $v_last_salary;} ?>">
                  </div>
                 
                </div>


            </div>
        </div>
      </div>
       </div>
     </div>   

</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Job Preferences ការងារដែលចូលចិត្ត</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
                 <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Prefered Industry</label>
                    <div class="col-sm-4">
                      <input type="text" name="per_industry" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_industry;} ?>">
                    </div>
                     <label for="staticEmail" class="col-sm-2 col-form-label">Prefered Location</label>
                    <div class="col-sm-4">
                      <input type="text" name="per_location" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_location;} ?>">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="staticEmail"  class="col-sm-2 col-form-label">Prefered Function</label>
                    <div class="col-sm-4">
                      <input type="text" name="per_function" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_function;} ?>">
                    </div>
                     <label for="staticEmail" class="col-sm-2 col-form-label">Prefered Position</label>
                    <div class="col-sm-4">
                      <input type="text" name="per_position" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_per_position;} ?>">
                    </div>
                </div>

                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Expected Salary</label>
                  <div class="col-sm-4">
                     <input type="text" name="expect_salary" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_expect_salary;} ?>">
                  </div>
                  <label for="staticEmail" class="col-sm-2 col-form-label">Terms of Working</label>
                  <div class="col-sm-4">
                   <input type="text" name="term_of_work" class="form-control" id="staticEmail" value="<?php if($ch_has >0) {echo $v_term_of_work;} ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Availability at Work</label>
                  <div class="col-sm-4">
                    <select name="available_work" class="form-control">
                      <option 
                      <?php
                        if($ch_has >0) {
                          if($v_available_work==1) {
                            echo "selected='selected'";
                          }
                        }
                      ?>
                       value="1">1 Week</option>
                      <option
                      <?php
                        if($ch_has >0) {
                          if($v_available_work==2) {
                            echo "selected='selected'";
                          }
                        }
                      ?>
                       value="2">3 weeks</option>
                      <option
                      <?php
                        if($ch_has >0) {
                          if($v_available_work==3) {
                            echo "selected='selected'";
                          }
                        }
                      ?>
                       value="3">1 Month</option>
                    </select>
                  </div>
                  
                </div>



            </div>
        </div>
      </div>
       </div>
     </div>   

</div>



<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Language(s) ភាសា</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
               
                 <div class="form-group row">
                      <textarea rows="10" name="language" class="form-control" id="language">
                        <?php if($ch_has >0) {echo $v_language;} ?>
                      </textarea>
                  </div>
                
            </div>
        </div>
      </div>
       </div>
     </div>   

</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Work Experience បទពិសោធន៍ការងារ</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
              
                 <div class="form-group row">
                      <textarea rows="10" name="work_exper" id="work_exper" class="form-control">
                        <?php if($ch_has >0) {echo $v_work_exper;} ?>
                      </textarea>
                  </div>
                 
            </div>
        </div>
      </div>
       </div>
     </div>   
</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Other Training Skills ការបណ្តុះបណ្តាល</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
              
                 <div class="form-group row">
                      <textarea rows="10" name="other_training" id="other_training" class="form-control">
                        <?php if($ch_has >0) {echo $v_other_training;} ?>
                      </textarea>
                  </div>
                
            </div>
        </div>
      </div>
       </div>
     </div>   
</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Hobbies ចំណង់ចំណូលចិត្ត</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
               
                 <div class="form-group row">
                      <textarea rows="10" name="hobby" id="hobby" class="form-control">
                        <?php if($ch_has >0) {echo $v_hobby;} ?>
                      </textarea>
                  </div>
                 
            </div>
        </div>
      </div>
       </div>
     </div>   
</div>
<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Referees អ្នកធានាអះអាង</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
              
                 <div class="form-group row">
                      <textarea rows="10" name="refer" id="refer" class="form-control">
                        <?php if($ch_has >0) {echo $v_refer;} ?>
                      </textarea>
                  </div>
                  
            </div>
        </div>
      </div>
       </div>
     </div>   
</div>

<div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h4 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;Certificates  វីញ្ញាបនប័ត្រ</h4>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
               
                 <div class="form-group row">
                      <textarea rows="10" name="certificate" id="certificate" class="form-control">
                        <?php if($ch_has >0) {echo $v_certificate;} ?>
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
       </div>
     </div>   
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'language', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
     CKEDITOR.replace( 'work_exper', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
      CKEDITOR.replace( 'other_training', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
        CKEDITOR.replace( 'hobby', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
      CKEDITOR.replace( 'refer', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
       CKEDITOR.replace( 'certificate', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
</script>

<script type="text/javascript">
    $( document ).ready(function() {

        $("#show_cv_title").on('input',function(){
          var show_cv_title=$("#show_cv_title").val();
          $("#insert_cv_title").val(show_cv_title);
         
        });
      
      
   
    });
</script>


<style type="text/css">
textarea {
  text-align: left;
}
</style>




<?php include_once '../layout/footer.php' ?>
