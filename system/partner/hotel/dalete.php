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
    $query="DELETE FROM tbl_hotel WHERE ht_id='$edit_id'";
    if($del_img != "blank.png"){
        if(file_exists("../../admin/image/hotel/".$del_img)){
            unlink("../../admin/image/hotel/".$del_img);
        }
    }
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
        $query_delete="DELETE FROM tbl_hotel_include_option WHERE hotel_id='$edit_id'";
        $results = $connect->query($query_delete);

        header('Location:index.php');
    } else {
        header('Location:index.php');
    }
?>
<?php include_once '../layout/footer.php' ?>
