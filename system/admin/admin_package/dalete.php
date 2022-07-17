<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["delete_id"]; 
   $services= @$_GET['services'];
	if($services=="")
	{
		$services= 1; 
	}
    $query="DELETE FROM tbl_package_detail WHERE p_id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
       header("Location: index.php?services=".$services);
    } else {
       header("Location: index.php?services=".$services);
    }
?>
<?php include_once '../layout/footer.php' ?>
