<?php 
	include_once '../../config/database.php';
	include_once '../../config/athonication.php';

	$v_com_id = @$_GET["com_id"];
	$get_data = $connect->query("SELECT * FROM tbl_location_village WHERE vil_commune_id='$v_com_id' ORDER BY vil_name_kh ASC");
	echo '<option value="">== Village loaded ==</option>';
	while ($row = mysqli_fetch_object($get_data)) {
		echo '<option style="font-family: \'khmer os content\'" value="'.$row->vil_id.'">'.$row->vil_name_kh.'</option>';
	}

?>