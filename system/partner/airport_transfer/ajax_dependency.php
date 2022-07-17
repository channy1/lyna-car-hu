<?php
 include_once '../../config/database.php';
?>

<?php
$id=$_POST['id'];
$sql ="SELECT * FROM tbl_province  WHERE pv_id='$id'";
	 $result = $connect->query($sql);
	   if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		echo '<option value="'.$row['pv_id'].'">'.$row['pv_title'].'</option>';
		}
	}
	else {
		echo "<option value=''>Select Province</option>";
	}
?>