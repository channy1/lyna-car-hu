<?php
 include_once ('system/config/database.php'); 
?>
 <select  name="return_location_carental" class="form-control" style="padding: 2px 12px;">
<?php
$id=$_POST['id'];
$pr_id="";
$sql_check ="SELECT * FROM tbl_carrental_pickup_price                          
           					 WHERE air_id='$id'";

$result = $connect->query($sql_check);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$pr_id=$row['pro_from_id'];

}}

$sql ="SELECT * FROM tbl_carrental_pickup_price 
			LEFT JOIN tbl_province 
            ON tbl_province.pv_id = tbl_carrental_pickup_price.pro_to_id                           
            WHERE pro_from_id='$pr_id' GROUP BY pv_title   ORDER BY air_id ";
	 $result = $connect->query($sql);
	   if ($result->num_rows > 0) {
	while($rows = $result->fetch_assoc()){
		echo '<option   value="'.$rows['air_id'].'">'.$rows['pv_title'].'</option>';
		}
	}
	else {
		echo "<option   value=''>Select another</option>";
	}
?>
</select> 


