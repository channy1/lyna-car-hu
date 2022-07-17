<?php require_once("header.php"); ?>
<br>
<?php
if(isset($_POST['btn_login'])){
	$username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
	$password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
	$stm = "SELECT * FROM tbl_users WHERE user_name='{$username}' AND user_password='{$password}'";
	$user = $connect->query($stm);
	if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";
	}else{
		$_SESSION['allowLog']="";
		// $post_step=="4";
		// echo "<script>alert('Wrong username or password.')</script>";
	}
}
// check app ready
$user_id=@$connect->real_escape_string($_POST['user_id']);
$app_job=$connect->real_escape_string(@$_GET['id']);
$check_app = "SELECT * FROM tbl_app_job WHERE ap_user_id='$user_id' and ap_job_id='$app_job'";
$result = $connect->query($check_app);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$app_return=1;
    }
}else {
    $app_return=0;
}
if(isset($_POST['btn_app']) && $app_return !=1) {
	$v_date=date("Y-m-d");
	$job_id=@$connect->real_escape_string($_POST['job_id']);
	$user_id=@$connect->real_escape_string($_POST['user_id']);
	$query_add="INSERT INTO tbl_app_job(ap_user_id,ap_job_id,date_app)
                                VALUES('$user_id','$job_id','$v_date')";
	if($connect->query($query_add)){
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
<div class="container-fluid">
    <div class="panel panel-default" style="color: #a4509f !important;">
        <div class="panel-heading text-center">
            <h3 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
                <?php 
                    $i = 0;
                    $get_id=0;
                    $get_id=$_GET['id'];
                    $get_data = $connect->query("SELECT * FROM job_announment where ann_id='$get_id'");
                    while ($row = mysqli_fetch_object($get_data)) {
						echo $row->ann_title_en;   
					} 
				?>
            </h3>
        </div>
        <!-- Car tav view container -->
        <div class="row">
            <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
                <div class="portlet-body">
                    <div class="panel">
                        <div class="panel-body ">
                            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                <thead>
                                    <tr role="row" class="text-center">
                                        <th>N&deg;</th>
                                        <th>Job Title</th>
                                        <th>Salary</th>
                                        <th>Hiring</th>
                                        <th>Term</th>
                                        <th>Closing Date</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                        $get_id=$_GET['id'];
                                        $get_data = $connect->query("SELECT * FROM job_announment where ann_id='$get_id'");
                                        while ($row = mysqli_fetch_object($get_data)) {
                                        ?>
                                    <tr>
                                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo 1+$i++; ?></a></td>
                                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_title_en; ?></a></td>
                                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_salary; ?></a></td>
                                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_hiring; ?></a></td>
                                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_term; ?></a></td>
                                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_closing_date; ?></a></td>
                                    </tr>
                                    <?php  } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div style="margin-bottom: 15px;">
                <!-- Nav tabs -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"  <?php
                        $get_app=$connect->real_escape_string(@$_GET['app']);
                        if($get_app==12) {
                          echo "class=''";
                        }
                        ?> class="active">
                        <a href="#Introduction" aria-controls="home" role="tab" data-toggle="tab">Introduction</a>
                    </li>
                    <li role="presentation" >
							<a href="#Descriptions" aria-controls="profile" role="tab" data-toggle="tab">Job Descriptions</a>
                    </li>
                    <li role="presentation" >
                        <a href="#Responsibilities" aria-controls="profile" role="tab" data-toggle="tab">Job Responsibilities</a>
                    </li>
                    <li role="presentation" >
                        <a href="#Requirements" aria-controls="profile" role="tab" data-toggle="tab">Job Requirements</a>
                    </li>
                    <li role="presentation" >
                        <a href="#Station" aria-controls="profile" role="tab" data-toggle="tab">Duty Station</a>
                    </li>
                    <li role="presentation" >
                        <a href="#Benifit" aria-controls="profile" role="tab" data-toggle="tab">Salary and Benifit</a>
                    </li>
                    <li role="presentation"  <?php
                        $get_app=$connect->real_escape_string(@$_GET['app']);
                        if($get_app==12) {
                          echo "class='active'";
                        }
                        else {
                          echo "";
                        }
                        ?>  >
                        <a href="#Apply" aria-controls="profile" role="tab" data-toggle="tab">How To Apply</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <?php 
                    $get_id=$_GET['id'];
                    $get_data = $connect->query("SELECT * FROM job_announment where ann_id='$get_id'");
                    while ($rows = mysqli_fetch_object($get_data)) {
                    ?>
                <div class="tab-content">
                    <div style="padding: 13px;margin-left: 15px;" role="tabpanel" <?php if($get_app !=12) { ?> class="tab-pane active" <?php } ?> id="Introduction"><?php echo $rows->intro_duct; ?></div>
                    <div style="padding: 13px;margin-left: 15px;" role="tabpanel" class="tab-pane" id="Descriptions"><?php echo $rows->job_des; ?></div>
                    <div style="padding: 13px;margin-left: 15px;" role="tabpanel" class="tab-pane" id="Responsibilities"><?php echo $rows->job_respone; ?></div>
                    <div style="padding: 13px;margin-left: 15px;" role="tabpanel" class="tab-pane" id="Requirements"><?php echo $rows->job_re; ?></div>
                    <div style="padding: 13px;margin-left: 15px;" role="tabpanel" class="tab-pane" id="Station"><?php echo $rows->duty_station; ?></div>
                    <div style="padding: 13px;margin-left: 15px;" role="tabpanel" class="tab-pane" id="Benifit"><?php echo $rows->salary_and_benifit; ?></div>
                    <div style="padding: 13px;margin-left: 15px;" role="tabpanel" <?php if($get_app==12) {echo "class='active show'";} ?> id="Apply"><?php echo $rows->how_apply; ?></div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <?php
                                $url_app="";
                                $url_app=$connect->real_escape_string(@$_GET['app']);
                                if($_SESSION['allowLog'] != "logAlready") {
                                ?>
                            <form action="job_seekers_detail.php?id=<?php echo $get_id; ?>&app=12" method="post" class="form-horizontal" role="form">
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control" name="txt_login_username" value="" placeholder="username or email">                                        
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="txt_login_password" placeholder="password">
                                </div>
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                        <!--  <a id="btn-fblogin" href="#" class="btn btn-primary">Login</a> -->
                                        <input type="submit" name="btn_login" class="btn btn-primary" value="Login">
                                    </div>
                                </div>
                            </form>
                            <?php 
                                } 
                                else {
                                ?>
                            <form action="" method="post" class="form-horizontal" role="form">
                                <input type="hidden" name="job_id" value="<?php echo $connect->real_escape_string(@$_GET['id']);  ?>">
                                <input type="hidden" name="user_id" value="<?php echo @$_SESSION['user']->user_id; ?>">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <?= @$sms ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <?php
                                            if($app_return==1) {
                                            ?>
                                        <center>Your has apply ready !.</center>
                                        <?php } else { ?>
                                        <input type="submit" name="btn_app" class="btn btn-primary" value="APPLY NOW">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function readURL(input) {
		if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#btn_choose").change(function() {
		readURL(this);
    });
</script>
<style type="text/css">
    <?php if($url_app==12){ ?>
    #Introduction {
    display: none;
    }
    <?php } ?>
</style>
<?php require_once("footer.php"); ?>
<style>
.panel-default {
	border-color: #dddddd;
}
.panel {
	margin-bottom: 20px;
	background-color: #ffffff;
	border: 1px solid transparent;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
	box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}
.panel-default>.panel-heading {
	color: #333333;
	background-color: #f5f5f5;
	border-color: #dddddd;
}
.panel-heading {
	padding: 10px 15px;
	border: 1px solid transparent;
	border-top-right-radius: 3px;
	border-top-left-radius: 3px;
}
.panel {
	margin-bottom: 20px;
	background-color: #ffffff;
	border: 1px solid #ddd;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
	box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}
.panel-body {
	padding: 15px;
}
.panel-heading h3 {
	font-size: 24px;
	font-size: 24px;
	font-weight: 600;
	line-height: 1.5;
	font-family: 'Raleway', sans-serif;
}
.container-fluid {
	margin-right: auto;
	margin-left: auto;
	padding-left: 15px;
	padding-right: 15px;
}
.table-striped>tbody>tr:nth-of-type(odd) {
	background-color: #f9f9f9;
}
.table>thead>tr>th,
.table>tbody>tr>th,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>tbody>tr>td,
.table>tfoot>tr>td {
	padding: 8px!important;
	line-height: 1.42857143;
	vertical-align: top;
	border-top: 1px solid #dddddd;
	text-align: left;
	color: #a4509f;
}
.nav-tabs>li.active>a,
.nav-tabs>li.active>a:hover,
.nav-tabs>li.active>a:focus {
	color: #555555;
	background-color: #ffffff;
	border: 1px solid #dddddd;
	border-bottom-color: transparent;
	cursor: default;
}
.nav-tabs>li>a {
	margin-right: 2px;
	line-height: 1.42857143;
	border: 1px solid transparent;
	border-radius: 4px 4px 0 0;
}
.nav>li>a {
	position: relative;
	display: block;
	padding: 10px 15px;
}
.nav-tabs>li {
	float: left;
	margin-bottom: -1px;
}
.nav>li {
	position: relative;
	display: block;
}
.input-group-addon:first-child {
	border-right: 0;
}
.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child>.btn,
.input-group-btn:first-child>.btn-group>.btn,
.input-group-btn:first-child>.dropdown-toggle,
.input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle),
.input-group-btn:last-child>.btn-group:not(:last-child)>.btn {
	border-bottom-right-radius: 0;
	border-top-right-radius: 0;
}
.input-group-addon {
	padding: 6px 12px;
	font-size: 14px;
	font-weight: normal;
	line-height: 1;
	color: #555555;
	text-align: center;
	background-color: #eeeeee;
	border: 1px solid #cccccc;
	border-radius: 4px;
}
.input-group-addon,
.input-group-btn {
	width: 1%;
	white-space: nowrap;
	vertical-align: middle;
}
.input-group-addon,
.input-group-btn,
.input-group .form-control {
	display: table-cell;
}
.panel .form-control {
	padding: 0.375rem 15px!important;
}
@media (max-width:768px) {
	.table>thead>tr>th,
	.table>tbody>tr>th,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>tbody>tr>td,
	.table>tfoot>tr>td {
		padding: 4px!important;
		font-size: 12px!important;
	}
	.panel-heading h3 {
		font-size: 11px!important;
	}
}



.nav-tabs>li>a {
	font-size: 14px;
    font-weight: 700;
    text-transform: capitalize;
    color: #686868;
    letter-spacing: -0.5px;
    margin-bottom: -1px;
    background-color: #f9f9f9;
    border-bottom-left-radius: 0px;
    text-indent: 0px;
    border: 1px solid #dcdcdc;
    font-style: normal;
    height: 30px;
    line-height: 12px;
    text-decoration: none;
    text-align: center;
}
.nav-tabs>li.active>a{
	color: #FFFFFF !important;
    border-bottom: 0 !important;
    background-color: #0615BD !important;
}	
</style>