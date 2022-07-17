
<?php 
    $menu_active =9;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    
   
    
?>
<?php
$output = '';
if(isset($_POST["query"]))
{
 $search =@$connect->real_escape_string($_POST['query']);
 $query = "SELECT * FROM tbl_users
 LEFT JOIN tbl_user_agreement
            ON tbl_users.user_id=tbl_user_agreement.customer_id
WHERE  user_company  LIKE '%".$search."%'
  OR user_first_name LIKE '%".$search."%' 
  OR user_last_name LIKE '%".$search."%' 
  OR user_introducer_id='$search'
 ";}
else
{
 $query = "SELECT user_id,user_first_name,user_introducer_id,user_last_name,user_gender,user_company,customer_id
   FROM tbl_users 
            LEFT JOIN tbl_user_agreement
            ON tbl_users.user_id=tbl_user_agreement.customer_id
 where user_position !='1' AND  (user_first_name !='' OR user_last_name !='') ";
}
$result = $connect->query($query);

      if($result->num_rows > 0) {
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
   <tr>
     <th>ID</th>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Gender</th>
     <th>Company Name</th>
    </tr>';

   while($row1 = $result->fetch_assoc()) {
    if($row1['customer_id']==""){
      $output .= '
  <tr >
    <td style="background-color: #e9ecf3;border-top: 1px solid #f5f5f0;"><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_introducer_id"].'<input type="hidden" value="'.$row1["user_id"].'" id="agent_id"></a></td>
    <td style="background-color: #e9ecf3;border-top: 1px solid #f5f5f0;"><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_first_name"].'</a></td>
    <td style="background-color: #e9ecf3;border-top: 1px solid #f5f5f0;"><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_last_name"].'</a></td>
    <td style="background-color: #e9ecf3;border-top: 1px solid #f5f5f0;"><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_gender"].'</a></td>
    <td style="background-color: #e9ecf3;border-top: 1px solid #f5f5f0;"><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_company"].'</a></td>
   </tr>
  ';
    }
    else {
      $output .= '
  <tr>
    <td><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_introducer_id"].'<input type="hidden" value="'.$row1["user_id"].'" id="agent_id"></a></td>
    <td><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_first_name"].'</a></td>
    <td><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_last_name"].'</a></td>
    <td><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_gender"].'</a></td>
    <td><a target="_blank" href="../customer_aggrement_update/edit.php?edit_id='.$row1["user_id"].'">'.$row1["user_company"].'</a></td>
   </tr>
  ';
    }
  
 }
 echo $output;
}
else
{
 echo 'Record Not Found';
}
?>