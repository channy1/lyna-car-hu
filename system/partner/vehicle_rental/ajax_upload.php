<?php
include_once '../../config/database.php';
$uploadDir = '../../admin/image/vehicle_rental/';
$vi_id=$_REQUEST["id"];
if (!empty($_FILES)) {
 $tmpFile = $_FILES['file']['tmp_name'];
 $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
 move_uploaded_file($tmpFile,$filename);
   $sql = "INSERT INTO tbl_vehicle_rantal_img (
                    car_id,
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



