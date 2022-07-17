<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>

<?php
    $edit_id = $_GET["delete_id"];    
    $query="DELETE FROM tbl_phone_line WHERE id='$edit_id'";    
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        header('Location:list.php');
    } else {
        header('Location:list.php');
    }
?>
 
<?php include '../footer.php'; ?>

