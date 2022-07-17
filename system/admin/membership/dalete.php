<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $id = $_GET["delete_id"]; 
    $query="DELETE FROM tbl_membership WHERE id='$id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        header('Location:index.php?type='.$_GET['type']);
    } else {
        header('Location:index.php?type='.$_GET['type']);
    }
?>
<?php include_once '../layout/footer.php' ?>
