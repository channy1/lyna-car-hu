
<?php 
    $menu_active =9;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    
   
    
?>
<?php
$output = '';
if(isset($_POST["id"]))
{
 $id =@$connect->real_escape_string($_POST['id']);
 $query = "SELECT * FROM tbl_users
WHERE  user_id='$id'
 ";}
else
{
 $query = "SELECT * FROM tbl_users where user_position !='1' AND  user_first_name !='' OR user_last_name !='' ";
}
$result = $connect->query($query);
      if($result->num_rows > 0) {
 $output .= '
   <select name="txt_customer_name" id="txt_search_agent_customer" class="form-control">
   
   
   ';

   while($row1 = $result->fetch_assoc()) {
  $output .= '
  <option value="'.$row1["user_id"].'">'.$row1["user_first_name"].' '.$row1["user_last_name"].'</option>
  ';
 }
 $output.='</select>';
 echo $output;
}
else
{
 echo '<select name="txt_customer_name" id="txt_search_agent_customer" class="form-control">
      <option value="">==Customer ID==</option>
     </select>';
}
?>