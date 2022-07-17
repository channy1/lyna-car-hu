<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>

<?php
	$edit_id = $_GET["delete_id"];	
    $query="DELETE FROM tbl_schedule_admin WHERE se_id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
		header('Location:plan_list.php');
    } else {
    	echo "something is wrong...";
        header('Location:plan_list.php');
    }
?> 
<?php include '../footer.php'; ?>

