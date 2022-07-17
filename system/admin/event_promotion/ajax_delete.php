<?php 

    include_once '../../config/database.php';
?>

<?php
    $edit_id = $_GET["delete_id"];
  /*  $event_id=$_GET["event_id"];
     $query_link="SELECT * FROM tbl_event_promotion_img WHERE img_id='$edit_id'";
        $results = $connect->query($query_link);
        if ($results->num_rows > 0) {
        while($row_link = $results->fetch_assoc()){
        	@unlink($row_link['img_sub']);

        }
       }*/


    $query="DELETE FROM tbl_event_promotion WHERE e_pro_id='$edit_id'";
    $result = $connect->query($query);
    if ($connect->query($query) === TRUE) {
       
       header("Location:index.php");
    } 
    else {
       header("Location:index.php");
    }
?>
<?php include_once '../layout/footer.php' ?>