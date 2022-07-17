<?php 
  
    include_once '../../config/database.php';
 
?>

<?php
$id=0;
$id=$_POST['id'];
if($id==0){
	echo "<option>Select Make</option>";
}else{
	$sql ="SELECT * FROM tbl_accessory_model  WHERE make_id='$id'";
	 $result = $connect->query($sql);
	   if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		echo '<option value="'.$row['model_id'].'">'.$row['model_name'].'</option>';
		}
	}
	else {
		echo "<option value=''>Select Make</option>";
	}
}
?>

                                          
