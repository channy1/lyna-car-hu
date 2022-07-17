<?php 
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
?>
 <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 



<link rel="stylesheet" href="../../css/cv_print.css" type="text/css">

 <body onload="window.print();">
<?php
   $v_cv_title="";
    $v_hight_qualification="";
    $v_last_career_level="";
    $v_year_exper="";
    $v_last_job_function="";
    $v_last_salary="";
    $v_last_position="";
    $v_last_industry="";
    $v_per_industry="";
    $v_per_location="";
    $v_per_function="";
    $v_per_position="";
    $v_expect_salary="";
    $v_term_of_work="";
    $v_available_work="";
    $v_language="";
    $v_work_exper="";
    $v_other_training="";
    $v_hobby="";
    $v_refer="";
    $v_certificate="";

    $user_id=@$connect->real_escape_string($_GET['user_id']);
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

<?php 
 $province_id=@$connect->real_escape_string($_GET['user_id']);
 $sex="";
 $phone="";
 $email="";
 $dob="";
 $add_user="";
 $f_name="";
 $l_name="";
 $photo="";
 $pro_name="";
 $query="SELECT * FROM tbl_province
 		INNER JOIN tbl_users ON tbl_users.province_id=tbl_province.pv_id
  WHERE user_id='$province_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $pro_name=$row['pv_title'];
      $sex=$row['user_gender'];
      $phone=$row['user_phone_number'];
      $email=$row['user_email'];
      $dob=$row['user_birthday'];
      $add_user=$row['user_address'];
      $f_name=$row['user_first_name'];
      $l_name=$row['user_last_name'];
      $photo=$row['user_photo'];
    }}
// 
?>
<body id="top">
<div id="cv" class="instaFade">
	<div class="mainDetails">
		<div class="row">
           <div class="col-xs-12">
           	<center><span style="font-size: 1.5em;">CURRICULUM VITAE</span></center><br>
           
           </div>
           <div class="col-xs-4">
            <div style="width:50%;text-align:left;">
              <h2 style="margin-top: 10px;font-size:14px;text-transform: uppercase; font-weight: 600;"><?php echo $f_name; ?> <?php echo $l_name; ?></h2>
            </div>
           </div>
           <div class="col-xs-6" style="margin-top:10px;">
           	<ul>
        			<li>Address:   <?php echo $add_user; ?></li>
        			<li>E-mail:    <?php echo $email; ?></li>
        			<li>Tel:      <?php echo $phone; ?></li>
        			</ul>
           </div>
           <div class="col-xs-2">
            <div class="pull-right">
             <img class="pull-right img-responsive" src="../../img/img_partner/<?php echo $photo; ?>" style="width:400px; height:120px;" alt="Profile Photo">
           </div>
           </div>
         
           
        </div>
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade delayFive">
		<section>
			<article>
				<div class="sectionTitle">
					<h2>PERSONAL DATA</h2>
				</div>
				
				<div class="sectionContent">
					<ul>
						<li>Sex: <?php echo $sex; ?></li>
						<li>Phone: <?php echo $phone; ?></li>
						<li>E-mail: <?php echo $email; ?></li>
						<li>Date of Birth: <?php echo $dob; ?></li>
						<li>Place of Birth: <?php echo $pro_name;  ?></li>
					</ul>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<div class="sectionTitle">
				<h2>EDUCATION BACKGROUND</h2>
			</div>
			
			<div class="sectionContent">
				<article>
					<?php
                            
                             $v_sql = "SELECT * FROM tbl_cv_education where user_id='$user_id' ";
                             $result = $connect->query($v_sql);
                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  $qualification=$row['qualification'];
                          ?>
                           <ul>
                           	<li><?php echo $row['from_cv']; ?> - <?php echo $row['to_cv']; ?> : <?php if($qualification=="1") {
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
                             } ?> <?php echo $row['school_university']; ?>
                             <br>
                             <p><?php echo $row['description']; ?></p>
                         </li>
                           </ul>
                       <?php
                           }
                          }
                       ?>
				</article>
				
				
			</div>
			<div class="clear"></div>
		</section>
		
		
		<section class="set_color">
			<div class="sectionTitle">
				<h2 class="h_color">WORK EXPERIENCE</h2>
			</div>
			
			<div class="sectionContent">
				<?php echo $v_work_exper; ?>
			</div>
			<div class="clear"></div>
		</section>
		
		
		<section>
			<div class="sectionTitle">
				<h2>CERTIFICATES</h2>
			</div>
			
			<div class="sectionContent">
				<?php echo $v_certificate; ?>
			</div>
			<div class="clear"></div>
		</section>
		<section>
			<div class="sectionTitle">
				<h2>OTHER TRAINING SKILLS</h2>
			</div>
			
			<div class="sectionContent">
				<?php echo $v_other_training; ?>
			</div>
			<div class="clear"></div>
		</section>
		<section>
			<div class="sectionTitle">
				<h2>LANGUAGES</h2>
			</div>
			
			<div class="sectionContent">
				<?php echo $v_language; ?>
			</div>
			<div class="clear"></div>
		</section>
		<section>
			<div class="sectionTitle">
				<h2>HOBBIES AND INTEREST</h2>
			</div>
			
			<div class="sectionContent">
				<?php echo $v_hobby; ?>
			</div>
			<div class="clear"></div>
		</section>
		<section>
			<div class="sectionTitle">
				<h2>REFERENCES</h2>
			</div>
			
			<div class="sectionContent">
				<?php echo $v_refer; ?>
			</div>
			<div class="clear"></div>
		</section>
		
		
	</div>
</div>
</body>

<style type="text/css">
    @media print {
      .address td:first-child span {
        font-size:11px;
      }

       ul li {
    /*padding:5px;
    margin-left:5%;*/
    
      }
     h2 {
      font-size: 15px;
     }
          
       .sectionContent {
        margin-left:30px;
       }    
           
  }
       
       
   
  </style>
