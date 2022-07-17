<?php
require_once '../../system/config/database.php';
require '../config.php'; 
require '../table_header.php'; 
require '../sidebar.php';
?>

<?php
 $edit_id = $_GET["delete_id"];
	$del_img = @$_GET['del_img'];
    $query="DELETE FROM tbl_province WHERE pv_id='$edit_id'";
	/* if($del_img != "blank.png"){
        if(file_exists(<?php  echo $img_path.'province/'.$del_img)?>){
            unlink(<?php  echo $img_path.'province/'.$del_img)?>);
        }
    }  */
    $result = $connect->query($query);

    if ($connect->query($query) === TRUE) {

        header('Location:index.php');

    } else {

        header('Location:index.php');

    }

?>

<?php include_once '../layout/footer.php' ?>