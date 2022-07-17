<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
    $edit_id = $_GET["delete_id"];
	$del_img = @$_GET['del_img'];
    $query="DELETE FROM tbl_province WHERE pv_id='$edit_id'";
    if($del_img != "blank.png"){
        if(file_exists("../image/province/".$del_img)){
            unlink("../image/province/".$del_img);
        }
    }
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        header('Location:index.php');
    } else {
        header('Location:index.php');
    }
?>
<?php include_once '../layout/footer.php' ?>
