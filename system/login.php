<?php 
include_once 'config/database.php';
// redirect if already login
if(@$_SESSION['allowLog']=="logAlready"){
	header("location: admin/");
}

// register success 
if(@$_GET['sms']=='register_success'){
	$sms = '<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Success!</strong> register successfull. Please Login to System ...
	</div>';
}


// logout
if(isset($_GET['action'])){
  if($_GET['action'] == "logout"){
    session_destroy();
    header("Refresh:0; url=system/login.php");
  }
}

// login
if(isset($_POST['btnlogin'])){
  $name = trim($connect->real_escape_string(@$_POST['txtname']));
  $pass = trim($connect->real_escape_string(@$_POST['txtpass']));
  // $enctypt_password = sha1(md5($pass)).sha1("0962195196");

  $stm = "SELECT user_id,user_name,user_status,user_email,user_photo,user_position FROM tbl_user WHERE user_name='{$name}' AND user_password='{$pass}'";
  $user = $connect->query($stm);
  if(mysqli_num_rows($user)==1){
    $user_data = mysqli_fetch_object($user);
    $_SESSION['user'] = $user_data;
    $_SESSION['allowLog'] = "logAlready";

    // echo $_SESSION['user']->user_email  ** example when u want to user session

    header("location: admin/dashboard/");
  }else{
    $sms = '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Error!</strong> invalid account ...
		</div>';
  }
}
//mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="assets/global/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/global/plugins/font-awesome/css/font-awesome.css">
	<style type="text/css">
		input,button{ border-radius: 0px!important; }
		body{ background: #f5f5f5; }
	</style>
	<script type="text/javascript" src="assets/global/plugins/jquery.min.js"></script>
</head>
<body><br>
	<div class="container" style="background: #eee; border: 2px solid #fff;">
		<header>
			<div class="row">
				<div class="col-sm-6">
				
				<?php  
                $v_sql = "SELECT * FROM tbl_logo";
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    if($row = $result->fetch_assoc()){
                ?>
                    <div class="site-logo">
                        <img style='float: left; margin-right: 10px' id='logo-image-left' src='admin/image/logo/<?php echo $row["lg_image"] ?>' alt='logo left'>
                        <h4 style="padding-top:25px;"><?php echo $row["lg_detail"   ]; ?></h4>
                    </div>
                 <?php 
                    }
                }
                ?>
					<!--<div style="padding: 20px 0px;">
						<a href="index.php">
							<img src="img/img_logo/logo.png" align="middle" style="width: 250px;" class="img-responsive img-thumbnail" alt="Image">
						</a>
					</div>-->
				</div>
				<div class="col-sm-6">
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p class="text-right"> <a href="javascript:void(0);" class="btn btn-success"><i class="fa fa-database"></i> Welcome to Lyna DATABASE MANAGEMENT SYSTEM</a></p>
				</div>
			</div>
		</header>
	</div>
	<div class="container" style="background: #fff; padding-top: 20px;">
		<main>
			<div class="row">
				<div class="col-sm-8">
					<img src="img/img_logo/main_login.jpg" class="img-responsive img-thumbnail" alt="Image">
				</div>
				<div class="col-sm-4">
					<form action="" method="POST" role="form">
						<?= @$sms ?>
						<legend>Login to Database System</legend>
					
						<div class="form-group">
							<label for="n">Username:</label>
							<input type="text" autofocus="autofocus" class="form-control" id="n" placeholder="username" name="txtname">
						</div>
						<div class="form-group">
							<label for="p">Password:</label>
							<input type="password" class="form-control" id="p" placeholder="password" name="txtpass">
						</div>
						<label class="pull-right"><input type="checkbox"> Stay sign in</label>

						<button type="submit" name="btnlogin" class="btn btn-primary">Sign in <i class="fa fa-sign-in"></i></button>
					</form><br><br><br>
					<a href="admin/user_guide.php/" title="fast answer question"><i class="fa fa-tasks"></i> Question & Answer</a><br><br>
					<a href="register.php" class="btn btn-success" style="border-radius: 0px;" title="fast answer question"><i class="fa fa-user"></i> Register Now</a>
				</div>
			</div>
		</main><br>
		<footer>
		 
			<div class="row">
				<div class="col-sm-3">
					<article>
						<p> &nbsp; </p>
						<p> &nbsp; </p>
						<p> &nbsp; </p>
						<?php $query="SELECT * FROM tbl_website_info ";
                                        $result = $connect->query($query);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){ if($row['section_name']=="copyright") { ?>
						<p>Delvelop by <a href="http://mean-experts.com/lyna/"><?=$row['section_data']?></a></p>
										<?php } } } ?>
					</article>
				</div>
				<div class="col-sm-9">
					<article class="text-right">
					<?php $query="SELECT * FROM tbl_website_info order by priority asc ";
                                        $result = $connect->query($query);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){ if($row['section_name']=="address") { ?>
						<p>Address: <?=$row['section_data']?> <?php } if($row['section_name']=="zipcode") { ?>
						<p>Zip Code: <?=$row['section_data']?></p> <?php } if($row['section_name']=="phone") { ?>
						<p>Tel: <?=$row['section_data']?></p> <?php } if($row['section_name']=="email") { ?>
						<p>Email: <a href="maito://<?=$row['section_data']?>"><?=$row['section_data']?> </a></p> <?php } if($row['section_name']=="website") { ?>
						<p>Website: <a href="http://<?=$row['section_data']?>"><?=$row['section_data']?> </a></p> 
						<?php } } } ?>
					</article>
				</div>

			</div>
										
		</footer>
	</div>
	<br>
	<br>
	<br>
</body>
</html>

<script type="text/javascript" src="assets/global/plugins/bootstrap/js/bootstrap.js"></script>