<?php 

    include_once '../../config/database.php';
?>

<?php
    $edit_id = $_GET["delete_id"];
    $info_id=$_GET["info_id"];
     $query_link="SELECT * FROM tbl_info_center_img WHERE img_id='$edit_id'";
        $results = $connect->query($query_link);
        if ($results->num_rows > 0) {
        while($row_link = $results->fetch_assoc()){
        	@unlink($row_link['img_sub']);

        }
       }


    $query="DELETE FROM tbl_info_center_img WHERE img_id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
       
       header("Location:add_img.php?id=$info_id");
    } 
    else {
       header("Location:add_img.php?id=$info_id");
    }
?>
<?php include_once '../layout/footer.php' ?>