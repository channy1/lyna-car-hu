<nav>
	<div class="logo pull-left">
		<a href="index.php">
			<img src="img/img_logo/logo.png" class="img-responsive" alt="Image">
		</a>
	</div>
	<ul class="pull-right">
		<li class="<?= (@$active == 1)?("active"):("") ?>"><a href="index.php">HOME</a></li>
		<li class="<?= (@$active == 2)?("active"):("") ?>"><a href="about.php">ABOUT</a></li>
		<li class="<?= (@$active == 10)?("active"):("") ?>">
			<a href="#">PRODUCT</a>
			<ul class="dropdown_menu sub_menu_drop">
				<li><a href="training.php">Training Course</a></li>
				
			</ul>
		</li>
		<li class="<?= (@$active == 21)?("active"):("") ?>"><a href="download.php">DOWNLOAD</a></li>
		<li class="<?= (@$active == 3)?("active"):("") ?>"><a href="news.php">NEWS</a></li>
		<li class="<?= (@$active == 5)?("active"):("") ?>"><a href="contact.php">CONTACT US</a></li>
		<li class="<?= (@$active == 10)?("active"):("") ?>">
			<a href="#">LOGIN</a>
			<ul class="dropdown_menu sub_menu_drop">
				<li><a href="login.php">Login</a></li>
				
			</ul>
		</li>
	</ul>
	<div class="clearfix"></div>
	</nav>