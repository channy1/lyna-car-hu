<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["delete_id"]; 
    $query="DELETE FROM tbl_usergroup WHERE id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        header('Location:usergroup.php');
    } else {
        header('Location:usergroup.php');
    }
?>
<?php include_once '../layout/footer.php' ?>
