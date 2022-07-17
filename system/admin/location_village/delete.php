<?php 
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<?php 
	if(@$_GET['del_id'] != ""){
		$del_id = @$_GET['del_id'];
		$connect->query("DELETE FROM  tbl_village WHERE vil_id='$del_id'");
	}
	header('Location: index.php?parent_id='.@$_GET['parent_id']);
?>