<?php 
	include_once '../../config/database.php';
	include_once '../../config/athonication.php';

	$v_dis_id = @$_GET["dis_id"];
	$get_data = $connect->query("SELECT * FROM tbl_location_commune WHERE com_district_id='$v_dis_id' ORDER BY com_name_kh ASC");
	echo '<option value="">== Commune loaded ==</option>';
	while ($row = mysqli_fetch_object($get_data)) {
		echo '<option style="font-family: \'khmer os content\'" value="'.$row->com_id.'">'.$row->com_name_kh.'</option>';
	}

?>