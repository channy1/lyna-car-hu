<?php
include_once '../../config/database.php';
$uploadDir = '../image/vehicle_rental/';
$vi_id=$_REQUEST["id"];
if (!empty($_FILES)) {
 $tmpFile = $_FILES['file']['tmp_name'];
 $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
 move_uploaded_file($tmpFile,$filename);
   $sql = "INSERT INTO tbl_event_promotion_img (
                    event_id,
                    img_sub
                    ) 
                VALUES(
                    '$vi_id',
                    '$filename'

                    )";
           if($connect->query($sql)){
              
            }else{
                
            }
}

?>



