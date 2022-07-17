<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>

<?php


   $edit_id = $_GET["delete_id"]; 
    $query="DELETE FROM tbl_pre_info WHERE pre_id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        header('Location:index.php');
    } else {
    	echo "something is wrong...";
       // header('Location:index.php');
    }
?>
 
<?php include '../footer.php'; ?>

