<?php
 include_once ('system/config/database.php'); 
?>
 <select  name="txt_airport_drop_location" class="form-control" style="padding: 2px 12px;">
<?php
$id=$_POST['id'];
$pr_id="";
$sql_check ="SELECT * FROM tbl_air_port                          
           					 WHERE air_id='$id'";
$result = $connect->query($sql_check);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$pr_id=$row['province_id'];
}}

$sql ="SELECT * FROM tbl_air_port 
			LEFT JOIN tbl_province 
            ON tbl_province.pv_id = tbl_air_port.province_id                           
            WHERE pv_id='$pr_id'  GROUP BY pro_to ORDER BY air_id ";
	 $result = $connect->query($sql);
	   if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		echo '<option   value="'.$row['air_id'].'">'.$row['pv_title'].' / '.$row['pro_to'].'</option>';
		}
	}
	else {
		echo "<option   value=''>Select another</option>";
	}
?>
</select> 


