<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["delete_id"]; 
    $query="DELETE FROM tbl_posting_package WHERE id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        header('Location:services.php');
    } else {
        header('Location:services.php');
    }
?>
<?php include_once '../layout/footer.php' ?>
