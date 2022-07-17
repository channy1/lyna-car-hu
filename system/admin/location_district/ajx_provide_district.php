<?php 
	include_once '../../config/database.php';
	include_once '../../config/athonication.php';

	$v_pro_id = @$_GET["pro_id"];
	$get_data = $connect->query("SELECT * FROM tbl_location_district WHERE dis_province_id='$v_pro_id' ORDER BY dis_name_kh ASC");
	echo '<option value="">== District loaded ==</option>';
	while ($row = mysqli_fetch_object($get_data)) {
		echo '<option style="font-family: \'khmer os content\'" value="'.$row->dis_id.'">'.$row->dis_name_kh.'</option>';
	}

?>