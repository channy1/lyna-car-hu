<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM job_announment WHERE ann_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
            $title = $row["ann_title_en"];
            $salary = $row["ann_salary"];
            $hiring = $row["ann_hiring"];
            $term = $row["ann_term"];
            $closing = $row["ann_closing_date"];

            $intro=$row["intro_duct"];
            $post_date=$row["post_date"];
            $job_respone=$row["job_respone"];
            $job_request=$row["job_re"];
            $job_des=$row["job_des"];
            $job_station=$row["duty_station"];
            $salary_and_benifit=$row["salary_and_benifit"];
            $how_apply=$row["how_apply"];
        
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_save'])){
            
            
            $v_title = @$connect->real_escape_string($_POST['txt_title']);
            $v_salary = @$connect->real_escape_string($_POST['txt_salary']);
            $v_hiring = @$connect->real_escape_string($_POST['txt_hiring']);
            $v_term = @$connect->real_escape_string($_POST['txt_term']);
            $v_closingdate = @$connect->real_escape_string($_POST['txt_closingdate']." ");

            $v_intro = @$connect->real_escape_string($_POST['txt_introduct']);
            $v_job_des = @$connect->real_escape_string($_POST['txt_description']);
            $v_job_respone = @$connect->real_escape_string($_POST['txt_respone']);
            $v_job_request = @$connect->real_escape_string($_POST['txt_request']." ");
            $v_job_station = @$connect->real_escape_string($_POST['txt_jon_station']);
            $v_benifit = @$connect->real_escape_string($_POST['txt_benifit']);
            $v_apply = @$connect->real_escape_string($_POST['txt_apply']);
            $v_post_date = @$connect->real_escape_string($_POST['txt_postdate']);


            $query_add = "UPDATE job_announment 
            SET ann_title_en='$v_title',
                ann_salary ='$v_salary',
                ann_hiring ='$v_hiring',
                ann_term='$v_term', 
                ann_closing_date='$v_closingdate',
                post_date='$v_post_date',
                intro_duct='$v_intro',
                job_des='$v_job_des',
                job_respone='$v_job_respone',
                job_re='$v_job_request',
                duty_station='$v_job_station',
                salary_and_benifit='$v_benifit',
                how_apply='$v_apply'
            WHERE ann_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
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

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Create Record</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="index.php" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

     <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">កែសម្រួល ការស្វែងរកការងារ</b></h3>
                <b style="font-size: 20px;">​​​EDIT JOB SEEKER</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល| HEAD OFFICE</b><br>
                <span> Address: Room No. 9C2 | 9th Floor</span> <br>
                <span>H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)</span><br>
                <span>Street 271 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia</span> <br>
                <span>Eng/Khm: +855 (0) 12 55 42 47 | +855 (0) 92 14 30 14 | English Speaker Only: +855 (0) 12 924 517</span><br>
                <span> Skype ID: lyna-carrental.com | Line/WhatsApp/Telegram/Viber/WeChat: (+855) 12 55 42 47 | 92 14 30 14 | 12 924 517</span><br>
                <span>E-mail: info@lyna-carrental.com | Website: www.Lyna-CarRental.Com</span>
        </center>
        </div>
  </div>


    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                                <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-3 col-md-3 col-lg-2">Title
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Title...</span>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text" class="form-control" name="txt_title" placeholder="Enter Title" value="<?php echo ($title); ?>"  required="required" autocomplete="off" style="background-color: white;">
                                </div> 
                               </div>    
                            </div>      
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                            <div class="form-group form-md-line-input">
                                  <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-2 col-md-2 col-lg-2">Salary
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Salary</span>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text" class="form-control" name="txt_salary" placeholder="Enter Salary" value="<?php echo ($salary); ?>"  required="required" autocomplete="off" style="background-color: white;">
                                </div>
                               </div>   
                            </div>
                      
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                            <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-2 col-md-2 col-lg-2">Hiring
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Hiring...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text" class="form-control" name="txt_hiring" placeholder="Enter Hiring" value="<?php echo ($hiring); ?>"  required="required" autocomplete="off" style="background-color: white;">
                                    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                            <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-2 col-md-2 col-lg-2">Term
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Term...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text" class="form-control" name="txt_term" placeholder="Enter Term" value="<?php echo ($term); ?>"  required="required" autocomplete="off" style="background-color: white;">
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>    
                             <div class="form-group form-md-line-input">
                                    <textarea  class="form-control detail" id="intro" name="txt_introduct" row="3" placeholder="Enter Introduction" autocomplete="off">
                                    <?php echo $intro; ?></textarea>
                                    <label style="color:white;font-size:15px;">Introduction
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Introduction</span>
                                </div>
                             <div class="form-group form-md-line-input">
                                    <textarea  class="form-control detail" id="desc" name="txt_description" row="3" placeholder="Enter Job Descriptions" autocomplete="off">
                                    <?php echo $job_des; ?></textarea>
                                    <label style="color:white;font-size:15px;">Job Descriptions
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Job Descriptions</span>
                                </div>

                                 <div class="form-group form-md-line-input">
                                    <textarea  class="form-control detail" id="respone" name="txt_respone" row="3" placeholder="Enter Job Responsibilities" autocomplete="off">
                                    <?php echo $job_respone; ?></textarea>
                                    <label style="color:white;font-size:15px;">Job Responsibilities
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Job Responsibilities</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <textarea  class="form-control detail" id="request" name="txt_request" row="3" placeholder="Enter Job Requirements" autocomplete="off">
                                    <?php echo $job_request; ?></textarea>
                                    <label style="color:white;font-size:15px;">Job Requirements
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Job Requirements</span>
                                </div>
                                 <div class="form-group form-md-line-input">
                                    <textarea  class="form-control detail" id="station" name="txt_jon_station" row="3" placeholder="Enter Duty Station" autocomplete="off">
                                    <?php echo $job_station; ?></textarea>
                                    <label style="color:white;font-size:15px;">Duty Station
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Duty Station</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <textarea  class="form-control detail" id="benifit" name="txt_benifit" row="3" placeholder="Enter Salary and Benifit" autocomplete="off">
                                    <?php echo $salary_and_benifit; ?></textarea>
                                    <label style="color:white; font-size:15px;">Salary and Benifit
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Salary and Benifit</span>
                                </div>

                                 <div class="form-group form-md-line-input">
                                    <textarea  class="form-control detail" id="apply" name="txt_apply" row="3" placeholder="Enter How To Apply" autocomplete="off">
                                   <?php echo $how_apply; ?> </textarea>
                                    <label style="color:white;font-size:15px;">How To Apply
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">How To Apply</span>
                                </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
                                 <div class="form-group form-md-line-input">
                                    <label style="color:white; font-size:15px;" class="col-xs-6 col-sm-3 col-md-3 col-lg-2">Post Date
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Post Date</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                     <input type="text" value="<?php echo $post_date; ?>" required="" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="txt_postdate" id class="form-control" placeholder="YYYY-MM-DD" style="background-color: white;">
                                    </div>
                                </div>
                            </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group form-md-line-input">
                                    <label style="color:white;font-size:15px;" class="col-xs-7 col-sm-3 col-md-3 col-lg-2">Closing Date
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Closing Date...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                    <input type="text" required="" data-provide="datepicker" data-date-format="yyyy-mm-dd" name="txt_closingdate" id class="form-control" placeholder="YYYY-MM-DD" value="<?php echo ($closing); ?>" style="background-color: white;
                                    margin-bottom:20px;">
                                    </div>
                                </div>
                        </div > 
                        <br>
                    <div class="form-actions" >
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <button type="submit" name="btn_save" class="btn blue"><i class="fa fa-plus fa-fw"></i>Save</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form><br>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'intro', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
     CKEDITOR.replace( 'desc', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
      CKEDITOR.replace( 'respone', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
      CKEDITOR.replace( 'request', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
       CKEDITOR.replace( 'station', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
        CKEDITOR.replace( 'benifit', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });
         CKEDITOR.replace( 'apply', {
        language: 'en',
      height: '700'
        // uiColor: '#9AB8F3'
    });

</script>

<style type="text/css">
    b,span{

        color: #800080;
        font-weight: 900;
    }
</style>
<?php include_once '../layout/footer.php' ?>
