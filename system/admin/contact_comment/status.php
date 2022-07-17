<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
   $status=$_GET['status'];
   
   if($status=="1") {
    $action=0;
   }
   else {
    $action=1;
   }
    $query="UPDATE tbl_contact_comment SET 
            status ='$action' WHERE comment_id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        header('Location:index.php');
    } else {
        header('Location:index.php');
    }
?>
<?php include_once '../layout/footer.php' ?>
