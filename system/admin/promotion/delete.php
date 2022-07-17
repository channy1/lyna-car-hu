<?php include_once '../../config/database.php'; ?>



<?php

    $id = $_GET["delete_id"];

   
    $query="DELETE FROM tbl_promotion WHERE id='$id'";

    $result = $connect->query($query);

    if ($connect->query($query) === TRUE) {

       

       header("Location:index.php");

    } 

    else {

       header("Location:index.php");

    }

?>
