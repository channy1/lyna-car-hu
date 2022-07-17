<?php include_once ('system/config/database.php');
?>
<?php 
    require_once("header.php");
    $id = $_GET["id"];
    $v_sql = "SELECT * FROM tbl_footer_status WHERE footer_id='$id'";
    $result = $connect->query($v_sql);
    $description="";
    $title_check="";
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
?>

<div class="Detail_footer_status container-fluid">
	<div class="panel panel-default" style="color: #a4509f !important;">
	      <div class="panel-heading text-center">
	        <h3 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;"><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
	        	<?php if((@$_SESSION['lang']=='en')) {
	                          	    echo $title_check=$row['pre_title'];
		                          }
		                          else {
		                          	echo $title_check=$row['pre_title_kh'];
		                          } ?>
	        	 </h3>
	      </div>
	<div class="row">

		<div class="col-md-12">
<?php

	if((@$_SESSION['lang']=='en')) {
	                          	    echo $description=$row['pre_detail'];
		                          }
		                          else {
		                          	echo $description=$row['pre_detail_kh'];
		                          }

?>
		
<?php
  }
 }
?>
	</div>
</div>
</div>
</div>

 <style>
 	.Detail_footer_status >ol,.Detail_footer_status ul,.Detail_footer_status li {
    margin:10px;
    padding: 10px;
}
</style>
<?php require_once("footer.php"); ?>