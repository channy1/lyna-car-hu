<?php 
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>

<?php
	$edit_id = $_GET["delete_id"]; 
    $query="DELETE FROM tbl_rick_shaw_rental_last WHERE ve_id='$edit_id'";
    $result = $connect->query($query);	
	//echo "<pre>"; print_r($result); echo "</pre>"; exit;
    if ($connect->query($query) === TRUE) {
        header('Location:index.php');
    } else {
        header('Location:index.php');
    }
?> 
<?php include_once '../layout/footer.php' ?>
