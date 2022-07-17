<?php 
    include_once ('system/config/database.php');
    require_once("header.php");
    require_once 'php-mailjet-v3-simple.class.php';
?>
<?php
$post_step="";
$post_step=trim($connect->real_escape_string(@$_POST['post_step']));
if(!isset($_SESSION["allowLog"])) {
    $_SESSION['allowLog'] ="";
}

if(!isset($_SESSION["term_condiction"])) {
  $_SESSION['term_check_pay'] =1;
}


if(isset($_POST['btn_rickshaw']) || isset($_POST['btn_select_data']) ) {
 $_SESSION['location_rickshaw_pickup']=@$connect->real_escape_string($_POST['location_rickshaw_pickup']);
 $_SESSION['location_return_date']=@$connect->real_escape_string($_POST['location_return_date']);
 $_SESSION['rickshaw_pickup_map']=@$connect->real_escape_string($_POST['rickshaw_pickup_map']);
 $_SESSION['rickshaw_return_map']=@$connect->real_escape_string($_POST['rickshaw_return_map']);
 $_SESSION['richshaw_pickupdate']=@$connect->real_escape_string($_POST['richshaw_pickupdate']);
 $_SESSION['return_pickupdate']=@$connect->real_escape_string($_POST['return_pickupdate']);
 $_SESSION['rickshaw_pickup_time']=@$connect->real_escape_string($_POST['rickshaw_pickup_time']);
 $_SESSION['rickshaw_return_time']=@$connect->real_escape_string($_POST['rickshaw_return_time']);
 $_SESSION['rickshaw_comment']=@$connect->real_escape_string($_POST['rickshaw_comment']);


 }
 // if(isset($_POST['btn_select_data'])){
 //  $_SESSION['location_rickshaw_pickup']=@$connect->real_escape_string($_POST['location_rickshaw_pickup']);
 //  $_SESSION['location_return_date']=@$connect->real_escape_string($_POST['location_return_date']);
 // }

 if(isset($_POST['btn_richshaw'])) {
 $_SESSION['richshaw_id']=@$connect->real_escape_string($_POST['identity_richshaw']);

 }

if(isset($_POST['btn_service'])) {
 $_SESSION['driver_id']=@$connect->real_escape_string($_POST['identity_driver']);
 $_SESSION['tour_quide_id']=@$connect->real_escape_string($_POST['identity_tour']);
 $_SESSION['accessory_id']=@$connect->real_escape_string($_POST['identity_accessory']);

 }

 if(isset($_POST['btn_login'])){
      $username = trim($connect->real_escape_string(@$_POST['txt_login_username']));
      $password = trim($connect->real_escape_string(@$_POST['txt_login_password']));
      $stm = "SELECT * FROM tbl_users WHERE user_name='{$username}' AND user_password='{$password}'";
      $user = $connect->query($stm);
      if(mysqli_num_rows($user)==1){
        $user_data = mysqli_fetch_object($user);
        $_SESSION['user'] = $user_data;
        $_SESSION['allowLog'] = "logAlready";
      }
      else {
         
          // $post_step=="4";
          
          // echo "<script>alert('Wrong username or password.')</script>";
      }

  }



?>


<div class="container-fluid">
   <div class="panel panel-default" style="margin-top: 15px;">
      <div style="color: #a4509f;" class="panel-heading">
         <h3 style="margin-bottom: -5px; color: #a4509f;"><i class="fa fa-handshake-o" aria-hidden="true"></i>
            &nbsp;SEARCH FOR RICKSHAW RENTAL
         </h3>
      </div>


      <div class="row">


        <div class="col-md-8">
                      <div class="card mt-3 tab-card">
                       <div class="card-header tab-card-header">
                         <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                           <li <?php if(empty($post_step)){echo "class='active'";} ?>>
                               <a class="nav-link" id="li_one" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Select Date</a>
                           </li>
                           <li <?php if($post_step=="1"){ echo "class='active'"; }?>>
                               <a class="nav-link" id="li_two" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Select a Rickshaw</a>
                           </li>
                           <li <?php if($post_step=="2"){ echo "class='active'"; }?>>
                               <a class="nav-link" id="li_three" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Service</a>
                           </li>
                            <li <?php if($post_step=="3"){ echo "class='active'"; }?>>
                               <a class="nav-link" id="li_four" data-toggle="tab" href="#four" role="tab" aria-controls="Three" aria-selected="false">Personal Info</a>
                           </li>
                            <li <?php if($post_step=="4"){ echo "class='active'"; }?>>
                               <a class="nav-link" id="li_five" data-toggle="tab" href="#five" role="tab" aria-controls="Three" aria-selected="false">Confirm Booking</a>
                           </li>
                         </ul>
                      </div>
                     </div>


             <div class="tab-content" id="myTabContent" style="margin-top:10px;">
                   <div class="tab-pane <?php if(empty($post_step)) {echo "in active";} ?>" id="one">
                      <form style="margin-top: 0px; margin-top: -20px;" action="rick_shaw_book.php" method="POST">
                        <input type="hidden" name="post_step" value="1">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="pickup" style="margin-top: 18px;">Pickup Location</label>
                        <select name="location_rickshaw_pickup" class="form-control input-sm" id="pickupfrom">
                             <?php 
                           if(!isset($_SESSION["location_rickshaw_pickup"]))
                              {
                                $location_rickshaw_pickup=$_SESSION["location_rickshaw_pickup"]="";
                              }
                              else {
                               $location_rickshaw_pickup=$_SESSION["location_rickshaw_pickup"];
                              }
                             ?>
                            <?php 
                                 $v_sql = "SELECT * FROM tbl_province 
                                            INNER JOIN tbl_rick_shaw_rental_last
                                            ON tbl_province.pv_id=tbl_rick_shaw_rental_last.province_id

                                            GROUP BY tbl_province.pv_id order by pv_title";
                                 $result = $connect->query($v_sql);
                                 if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                           ?> 
                          
           <option <?php if($location_rickshaw_pickup==$row['pv_id']){echo "selected='selected'";} ?> style="text-transform: uppercase;" value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                           <?php }} ?>                        
                        </select>
                      </div>

                      <div class="col-md-6">
                      <div class="hidden">
                         <label for="dropof" style="margin-top:10px;">Return Location</label>
                       <select name="return_location_carental" class="form-control input-sm" id="dropoffto">
                         <?php 
                           if(!isset($_SESSION["location_return_date"]))
                              {
                                $location_return_date=$_SESSION["location_return_date"]="";
                              }
                              else {
                               $location_return_date=$_SESSION["location_return_date"];
                              }
                             ?>
                          <?php 
                                 $v_sql = "SELECT * FROM tbl_province ";
                                 $result = $connect->query($v_sql);
                                 if ($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                         ?>  
           <option <?php if($location_return_date==$row['pv_id']){echo "selected='selected'";} ?> style="text-transform: uppercase;" value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option>
                           <?php }} ?>  
                     </select>
                      </div>
                      </div>

                       <div class="col-md-6">
                       <label for="dropof">SHARE GOOGLE MAP LOCATION PICKUP</label>
                       <?php 
                           if(!isset($_SESSION["rickshaw_pickup_map"]))
                              {
                                 $_SESSION["rickshaw_pickup_map"]="";
                              }
                              else {
                                 $_SESSION["rickshaw_pickup_map"];
                              }
                        ?>

                       <input type="text" value="<?php echo $_SESSION['rickshaw_pickup_map']; ?>"  name="rickshaw_pickup_map"   class="form-control">
                     
                      </div>
                      <div class="col-md-6">
                       <label for="dropof">SHARE GOOGLE MAP LOCATION RETURN</label>
                        <?php 
                           if(!isset($_SESSION["rickshaw_return_map"]))
                              {
                                $_SESSION["rickshaw_return_map"]="";
                              }
                              else {
                                $_SESSION["rickshaw_return_map"];
                              }
                        ?>
                       <input type="text" value="<?php echo $_SESSION['rickshaw_return_map']; ?>" name="rickshaw_return_map"  class="form-control">
                     
                      </div>

                      <div class="col-md-3">
                       <label for="dropof">Pickup Date</label>
                       <?php 
                           if(!isset($_SESSION["richshaw_pickupdate"]))
                              {
                                 $_SESSION["richshaw_pickupdate"]="";
                              }
                              else {
                                $_SESSION["richshaw_pickupdate"];
                              }
                        ?>

                       <input value="<?php echo $_SESSION['richshaw_pickupdate']; ?>" readonly data-provide="datepicker" data-date-format="yyyy-mm-dd" type="text" name="richshaw_pickupdate"  class="form-control">
                      </div>
                      <div class="col-md-3">
                       <label for="dropof">Pickup Time</label>
                        <?php 
                           if(!isset($_SESSION["rickshaw_pickup_time"]))
                              {
                                 $_SESSION["rickshaw_pickup_time"]="";
                              }
                              else {
                                $_SESSION["rickshaw_pickup_time"];
                              }
                        ?>
                       <input value="<?php echo $_SESSION['rickshaw_pickup_time']; ?>"  type="time" name="rickshaw_pickup_time"  class="form-control">
                      </div>
                      <div class="col-md-3">
                       <label for="dropof">Return Date</label>
                       <?php 
                           if(!isset($_SESSION["return_pickupdate"]))
                              {
                                 $_SESSION["return_pickupdate"]="";
                              }
                              else {
                                $_SESSION["return_pickupdate"];
                              }
                        ?>
                       <input value="<?php echo $_SESSION['return_pickupdate']; ?>" readonly data-provide="datepicker" data-date-format="yyyy-mm-dd" type="text" name="return_pickupdate"  class="form-control">
                      </div>
                       <div class="col-md-3">
                       <label for="dropof">Return Time</label>
                        <?php 
                           if(!isset($_SESSION["rickshaw_return_time"]))
                              {
                                 $_SESSION["rickshaw_return_time"]="";
                              }
                              else {
                                $_SESSION["rickshaw_return_time"];
                              }
                        ?>
                       <input  value="<?php echo $_SESSION['rickshaw_return_time']; ?>"  type="time" name="rickshaw_return_time"  class="form-control">
                      </div>

                      <div class="col-md-3">
                      
                      </div>
                      <div class="col-md-9">
                       <label for="dropof">Return (Besides Pickup Location) – Provide Location Details</label>
                       <textarea name="rickshaw_comment" class="form-control" rows="5" id="comment">
                         <?php 
                           if(!isset($_SESSION["rickshaw_comment"]))
                              {
                                 echo $_SESSION["rickshaw_comment"]="";
                              }
                              else {
                                echo $_SESSION["rickshaw_comment"];
                              }
                        ?>
                       </textarea>
                       <br>
                      </div>

                       <div class="col-md-12">
                        <input style="float:right;" type="submit" name="btn_select_data" value="Find Rickshaw Now" class="btn btn-primary">
                       </div>
                    </div>
                    </form>           
                   </div>
                     <form method="post" action="rick_shaw_book.php" id="form_richshaw">
              <div  class="tab-pane <?php if($post_step=="1") {echo "active in";} ?>" <?php if($post_step=="1") { ?> id="two" <?php }else { ?> style="display:none;" <?php } ?>>
                    <input type="hidden" name="post_step" value="2">
                    
                     
                        <button style="margin-top: 10px;" id="btn_car" class="btn btn-success" name="btn_richshaw" type="submit">Continue</button>
                        <label id="check_car"></label>
                   <?php
                                 $sql ="SELECT * FROM tbl_rick_shaw_rental_last WHERE tbl_rick_shaw_rental_last.province_id='$location_rickshaw_pickup' AND status='1' ";
                                  $result = $connect->query($sql);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                     <div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
                                       <div class="col-md-3">
                                      
                                       <img src="system/admin/image/vehicle_rental/<?php echo $row["ve_image"];?>" class="preview">
                                      <label><b><?php echo $row['ve_title']; ?></b></label>
                                      <br>
                                       <span style="position: absolute;float: left;">Tick the Box</span>
                                       <input type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addrichshaw(<?php echo $row['ve_id']; ?>)" id="addrichshaw_<?php echo $row['ve_id']; ?>" style="float: right;">
                                       <br>
                                       <span>Qantity :</span>
                                       <input class="form-control" readonly="" type="text" name="addrichshaw_<?php echo $row['ve_id']; ?>" value="" id="number_addrichshaw_<?php echo $row['ve_id']; ?>">
                                    
                                   </div>

                                   <script type="text/javascript">
                                      function addrichshaw(index){

                                       var id=$('#identity_richshaw').val();
                                       var arrays = id.split(',');
                                       for(var j=0;j<arrays.length;j++) {//calculate record row
                                         if(arrays[j] == index) arrays.splice(j,1);
                                         if(document.getElementById('addrichshaw_'+index).checked){
                                           if(($("#identity_richshaw").val())!="") {
                                             $("#identity_richshaw").val(id+','+index);
                                           }else { 
                                             $("#identity_richshaw").val(index);
                                           }
                                          // $("#number_equipment_"+index).removeAttr("readonly");
                                           $("#number_addrichshaw_"+index).val(1);
                                          }else{
                                            //alert(index);
                                           var strings = arrays.join(',');
                                           $('#identity_richshaw').val(strings);
                                           $("#number_addrichshaw_"+index).val("");
                                           //$("#number_equipment_"+index).attr("readonly", true);
                                         }
                                       }
                                     }
                                    </script>
                                       <div class="col-md-9">
                                    
                                     <table class="table table-borderless" style="width:48%;float:left;">
                                         <thead>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th scope="row">Ref. No. :</th>
                                             <td style="color: red;"><?php echo $row['ve_ref_no']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Year :</th>
                                             <td><?php echo $row['ve_year']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Color :</th>
                                             <td colspan="2"><?php echo $row['ve_color']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">No. of Seats :</th>
                                             <td colspan="2"><?php echo $row['ve_no_of_seat']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Trans. Type :</th>
                                             <td colspan="2"><?php echo $row['ve_transmission_type']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Vehicle Type :</th>
                                             <td colspan="2"><?php echo $row['ve_vehical_type']; ?></td>
                                           </tr>
                                          
                                           
                                         </tbody>
                                       </table>


                                       <table class="table table-borderless" style="width:50%;float:right;">
                                         <thead>
                                          <tr>
                                             <th scope="row">Range Days</th>
                                             <td>Price</td>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th scope="row">Price:</th>
                                             <td>$<?php 
                                            
                                             $total_one_day=$row['price_rent'];
                                             if($total_one_day=="") {
                                               $total_one_day=0;
                                             }
                                             else {
                                               $total_one_day=$row['price_rent'];
                                             }
                                             echo number_format($total_one_day,2); 
                                             ?> / Day</td>
                                           </tr>
                                          
                                         </tbody>
                                       </table>


                                      
                                      
                                      
                                       </div>
                                      
                                </div>
                              <?php 
                                }}
                              ?>
                              <input type="hidden" name="identity_richshaw" id="identity_richshaw">


                   </div>
                   </form>
                    <form method="post" action="rick_shaw_book.php" id="form_service" >
                      <input type="hidden" name="post_step" value="3">
                   <div  <?php if($post_step=="2") { ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?> class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" <?php if($post_step=="2") { ?>id="three"<?php } ?>>
                     <div class="card-header tab-card-header" <?php if($post_step=="2") { ?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
                               <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                 <li id="tap_tour">
                                     <a data-toggle="tab" href="#tour">Tour Guide</a>
                                 </li>
                                 <li id="tap_accessory">
                                     <a data-toggle="tab" href="#accessory">Accessories</a>
                                 </li>
                                 <li id="tap_driver">
                                     <a  data-toggle="tab" href="#driver">Driver</a>
                                 </li>
                               </ul>
                     </div>
                      <div class="tab-content" id="myTabContent">
                         <div class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" <?php if($post_step=="2") { ?> id="tour" <?php } ?>>

                        <div>
                            <label class="radio-inline">
                       <input type="radio" name="check_tour_quide" id="check_tour_quide" checked="checked" value="Yes">Tour Guide</label>
                           
                         </div>

                        <div>
                       
                        
                      </div>
                      <ul class="nav nav-tabs card-header-tabs tour_guide" id="myTab" role="tablist" style="display:block;">
                                 <?php
                                 $sql ="SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position On tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  user_position='3' AND user_position_id='7'";


                                  $result = $connect->query($sql);

                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                     <div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
                                       <div class="col-md-3">
                                       <?php
                                         if($row["user_position"]=="3") {
                                       ?>
                                       <img src="system/img/img_partner/<?php echo $row["user_photo"];?>" class="preview">
                                       <?php } else { ?>
                                        <img src="system/img/img_customer/<?php echo $row["user_photo"];?>" class="preview">
                                       <?php } ?>
                                       </div>
                                       <div class="col-md-6">
                                       <ul>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>First Name :<span><?php echo $row['user_first_name']; ?></span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Last Name :<span><?php echo $row['user_last_name']; ?></span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Gender :<span><?php echo $row['user_gender']; ?></span></label></li>
                                       <?php
                                             $sql_one ="SELECT * FROM tbl_tour_rent";
                                              $results = $connect->query($sql_one);
                                              if ($results->num_rows > 0) {
                                                while($rows = $results->fetch_assoc()){
                                             ?>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Tour Guide Price :<span>$<?php echo $rows['tour_price']; ?>/day</span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Tour Guide Dicount Price :<span>$<?php echo $rows['tour_discount']; ?>/day</span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Tour Guide Vat Price :<span>$<?php echo $rows['tour_vat']; ?>/day</span></label></li>
                                       <?php  }} ?>
                                      
                                      
                                       </ul>
                                       </div>
                                       <div class="col-md-3">
                                       <span style="position: absolute;float: left;">Tick the Box</span>
                                       <input  type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addtour(<?php echo $row['user_id'];?>)" id="addtour_<?php echo $row['user_id'];?>" style="float: right;">
                                       <br>
                                       <span>Qantity :</span>
                                       <input class="form-control" readonly type="text"  name="qty_tour_<?php echo $row['user_id'];?>" value="" id="number_tour_<?php echo $row['user_id'];?>">
     
                                       </div>
                                </div>
                              <?php 
                                }}
                              ?>
                              <input type="hidden" name="identity_tour" id="identity_tour"/>
                         </ul>

                          <script type="text/javascript">
                                function addtour(index){

                                 var id=$('#identity_tour').val();
                                 var arrays = id.split(',');
                                 for(var j=0;j<arrays.length;j++) {//calculate record row
                                   if(arrays[j] == index) arrays.splice(j,1);
                                   if(document.getElementById('addtour_'+index).checked){
                                     if(($("#identity_tour").val())!="") {
                                       $("#identity_tour").val(id+','+index);
                                     }else { 
                                       $("#identity_tour").val(index);
                                     }
                                    // $("#number_equipment_"+index).removeAttr("readonly");
                                     $("#number_tour_"+index).val(1);
                                    }else{
                                      //alert(index);
                                     var strings = arrays.join(',');
                                     $('#identity_tour').val(strings);
                                     $("#number_tour_"+index).val("");
                                     //$("#number_equipment_"+index).attr("readonly", true);
                                   }
                                 }
                               }
                       </script>


                         </div>
                         <div class=" tab-pane <?php if($post_step=="2") {echo "active in";} ?>" <?php if($post_step=="2") { ?> id="accessory" <?php } ?>>
                        <div>
                            <label class="radio-inline">
                       <input type="radio" name="check_accessory" id="check_accessory" checked="checked" value="Yes">Accessories</label>
                           <label class="radio-inline">
                      
                       
                         </div>
                      <?php  
                        $v_sql = "SELECT * FROM tbl_accessories_rental";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                          ?>
                        <div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
                                       <div class="col-md-3">
                                      
                                       <img src="system/admin/image/accessories rental/<?php echo $row['ac_image']; ?>" class="preview">
                                      <label><b><?php echo $row['ac_title']; ?></b></label>
                                      <br>
                                       <span style="position: absolute;float: left;">Tick the Box</span>
                        <input type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addaccessory(<?php echo $row['ac_id']; ?>)" id="addaccessory_<?php echo $row['ac_id']; ?>" style="float: right;">
                                       <br>
                                       <span>Qantity :</span>
                                       <input class="form-control" readonly="" type="text" name="addaccessory_<?php echo $row['ac_id']; ?>" value="" id="number_addaccessory_<?php echo $row['ac_id']; ?>">
                                    
                                   </div>

                                  
                                       <div class="col-md-9">
                                    
                                      <table class="table table-borderless" style="width:48%;float:left;">
                                         <thead>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th scope="row">Ref. No. :</th>
                                             <td><?php echo $row['ac_ref_no']; ?></td>
                                           </tr>
                                         </tbody>
                                       </table>


                                       <table class="table table-borderless" style="width:50%;float:right;">
                                         <thead>
                                          <tr>
                                             <th scope="row">Range Days</th>
                                             <td>Price</td>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <th scope="row">Days (1-7):</th>
                                             <td>$ <?php echo $row['ac_days(1-7)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">~ Extra Day:</th>
                                             <td>$<?php echo $row['ac_extradays(1-7)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Days (15-26):</th>
                                             <td colspan="2">$<?php echo $row['ac_days(15-26)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row"> ~ Extra Day:</th>
                                             <td colspan="2">$<?php echo $row['ac_extradays(15-26)']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Monthly:</th>
                                             <td colspan="2">$ <?php echo $row['ac_monthly']; ?></td>
                                           </tr>
                                            <tr>
                                             <th scope="row"> ~ Extra Day :</th>
                                             <td colspan="2">$ <?php echo $row['ac_extramonthly']; ?></td>
                                           </tr>
                                           <tr>
                                             <th scope="row">Yearly:</th>
                                             <td colspan="2">$ <?php echo $row['ac_yearly']; ?></td>
                                           </tr>
                                          
                                           <tr>
                                             <th scope="row">~ Extra Day:</th>
                                             <td colspan="2">$ <?php echo $row['ac_extrayearly']; ?></td>
                                           </tr>
                                         </tbody>
                                       </table>
                                      
                                      
                                       </div>
                                      
                                </div>
                            <?php }}  ?>
                                <input type="hidden" name="identity_accessory" id="identity_accessory">

                                 <script type="text/javascript">
                                      function addaccessory(index){

                                       var id=$('#identity_accessory').val();
                                       var arrays = id.split(',');
                                       for(var j=0;j<arrays.length;j++) {//calculate record row
                                         if(arrays[j] == index) arrays.splice(j,1);
                                         if(document.getElementById('addaccessory_'+index).checked){
                                           if(($("#identity_accessory").val())!="") {
                                             $("#identity_accessory").val(id+','+index);
                                           }else { 
                                             $("#identity_accessory").val(index);
                                           }
                                          // $("#number_equipment_"+index).removeAttr("readonly");
                                           $("#number_addaccessory_"+index).val(1);
                                          }else{
                                            //alert(index);
                                           var strings = arrays.join(',');
                                           $('#identity_accessory').val(strings);
                                           $("#number_addaccessory_"+index).val("");
                                           //$("#number_equipment_"+index).attr("readonly", true);
                                         }
                                       }
                                     }
                                    </script>

                         </div>
                         <div class="tab-pane <?php if($post_step=="2") {echo "active in";} ?>" <?php if($post_step=="2") { ?>id="driver" <?php } ?>>
                           <div>
                            <label class="radio-inline">
                       <input type="radio" name="check_option_drive" id="check_option_drive_seft" checked="checked" value="Yes">Self-Drive</label>
                           <label class="radio-inline">
                       <input type="radio" name="check_option_drive" id="check_option_drive_rental" value="No">Chauffeur Rental</label>
                       <button style="margin-top: 10px;" id="btn_service" class="btn btn-success" name="btn_service" type="submit">Continue</button>
                         </div>
                          <ul class="nav nav-tabs card-header-tabs " id="myTab" role="tablist" style="display:block;">
                                 <?php
                                 $sql ="SELECT * FROM tbl_users INNER JOIN tbl_relationship_users_position On tbl_users.user_id = tbl_relationship_users_position.user_id WHERE  user_position='3' AND user_position_id='8'";
                                  $result = $connect->query($sql);
                                  if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()){
                                 ?>
                                     <div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
                                       <div class="col-md-3">
                                       <?php
                                         if($row["user_position"]=="3") {
                                       ?>
                                       <img src="system/img/img_partner/<?php echo $row["user_photo"];?>" class="preview">
                                       <?php } else { ?>
                                        <img src="system/img/img_customer/<?php echo $row["user_photo"];?>" class="preview">
                                       <?php } ?>
                                       </div>
                                       <div class="col-md-6">
                                       <ul>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>First Name :<span><?php echo $row['user_first_name']; ?></span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Last Name :<span><?php echo $row['user_last_name']; ?></span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Gender :<span><?php echo $row['user_gender']; ?></span></label></li>

                                     <?php
                                             $sql_dr ="SELECT * FROM tbl_driver_rent ";
                                              $resultdr = $connect->query($sql_dr);
                                              if ($resultdr->num_rows > 0) {
                                                while($rows = $resultdr->fetch_assoc()){
                                             ?>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Driver Price :<span>$<?php echo $rows['dr_price']; ?>/day</span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Driver Dicount Price :<span>$<?php echo $rows['dr_discount']; ?>/day</span></label></li>
                                       <li style="list-style: none;margin-bottom: -3px !important;"><label>Driver Vat Price :<span>$<?php echo $rows['dr_vat']; ?>/day</span></label></li>
                                       <?php  }} ?>
                                      
                                       </ul>
                                       </div>
                                       <div class="col-md-3">
                                       <span style="position: absolute;float: left;">Tick the Box</span>
                                       <input  type="checkbox" name="tick" class="checkbox input-checkbox" onclick="adddriver(<?php echo $row['user_id'];?>)" id="adddriver_<?php echo $row['user_id'];?>" style="float: right;">
                                       <br>
                                       <span>Qantity :</span>
                                       <input class="form-control" readonly type="text"  name="qty_driver_<?php echo $row['user_id'];?>" value="" id="number_driver_<?php echo $row['user_id'];?>">
     
                                       </div>
                                </div>
                              <?php 
                                }}
                              ?>
                              <input type="hidden" name="identity_driver" id="identity_driver"/>
                         </ul>

                          <script type="text/javascript">
                                      function adddriver(index){

                                       var id=$('#identity_driver').val();
                                       var arrays = id.split(',');
                                       for(var j=0;j<arrays.length;j++) {//calculate record row
                                         if(arrays[j] == index) arrays.splice(j,1);
                                         if(document.getElementById('adddriver_'+index).checked){
                                           if(($("#identity_driver").val())!="") {
                                             $("#identity_driver").val(id+','+index);
                                           }else { 
                                             $("#identity_driver").val(index);
                                           }
                                          // $("#number_equipment_"+index).removeAttr("readonly");
                                           $("#number_driver_"+index).val(1);
                                          }else{
                                            //alert(index);
                                           var strings = arrays.join(',');
                                           $('#identity_driver').val(strings);
                                           $("#number_driver_"+index).val("");
                                           //$("#number_equipment_"+index).attr("readonly", true);
                                         }
                                       }
                                     }
                                    </script>
                                      
                         </div>

                     </div>


                   </div>
                 </form>
                
                 <input type="hidden" name="post_step" value="3">
                    <div <?php if($post_step !="3") { ?> style="display:none;"  <?php } ?> class="tab-pane <?php if($post_step=="3"){echo "active in";}?>"<?php if($post_step=="3") { ?> id="four"<?php } ?>>
                          <div class="row">
                           <?php

                           if($_SESSION['allowLog'] != "logAlready"){
                           ?>
                              <div class="col-md-12">
                                
                                <form method="post" action="rick_shaw_book.php" >
                                 <input type="hidden" name="post_step" value="3">

                                  <h3 style="text-align:center;">Login for Form</h3>
                                 
                                      <div class="form-group">
                                          <input type="text" name="txt_login_username" class="form-control" placeholder="Your Username" value="" />
                                      </div>
                                      <div class="form-group">
                                          <input type="password" name="txt_login_password" class="form-control" placeholder="Your Password" value="" />
                                      </div>
                                      <div class="form-group">
                                          <input type="submit" name="btn_login" class="btn btn-success" value="Login" />
                                      </div>
                                      <div class="form-group">
                                         <!--  <a href="#" class="ForgetPwd">Forget Password?</a> -->
                                      </div>
                           </form> 
                            </div> 
                            <?php } else { ?>
                              
                               <form  action="rick_shaw_book.php" method="post" id="agree_form" style="padding: 24px;">
                               
                            <input type="hidden" name="post_step" value="4">
                            <div class="row" style="clear: both;">
                              <div class="col-md-6">
                                <label>User Name: <?php echo @$_SESSION["user"]->user_name; ?></label>
                                <label>E-mail   : <?php echo @$_SESSION["user"]->user_email; ?></label>
                                <label>Phone    : <?php echo @$_SESSION["user"]->user_phone_number; ?></label>
                              </div>
                              <div class="col-md-3"></div>
                              <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                               <div class="col-md-12">
                                <h5 style="font-size: 15px;margin-bottom: 1px;"><b>TERMS &amp; CONDITIONS</b></h5>
                                <span style="font-size:14px"><span style="color:#FF0000"><strong>ACCESSORIES RENTAL SERVICE BRIEFING</strong></span></span>
                                <div>1. Pay &amp; Go!.</div>
                                <div>2. You are requested to come over to Lyna-CarRental.Com's office for advance payment in the full amount as stated in the "<strong>Accessories Rental Price</strong>".</div>
                                <div>3. Another way, you could also pay all the fee via any options as shown on the page, such as:<br>
&nbsp; &nbsp; &nbsp;3.1. VISA Card<br>
&nbsp; &nbsp; &nbsp;3.2. WESTERN UNION.<br>
&nbsp; &nbsp; &nbsp;3.3. ACLEDA UNITY.<br>
4.&nbsp;After the full amount of payment is well received, the <strong>Accessory or Accessories</strong>&nbsp;will be reserved you within the time frame manner.​</div>
<p><strong>SELF-DRIVE INFORMATION &amp; REQUIREMENT</strong></p>
<p>1. Making a Cambodian Driver’s License by converting your National or International Driver’s License.<br>
2. Depositing one of your valid Passports for your personal insurance purpose, because it is the requirement from the Insurance Company.<br>
3. Depositing the Refundable Deposit in the amount between $500.00 to $1,000.00 according to the years and models of the vehicles.<br>
4. FUEL: The quoted prices [FUEL] is not included – Firstly, Lyna-CarRental.Com’s office will supply the Renter a full tank of [FUEL].&nbsp;<br>
5. The [RENTER] will refill it when it is necessary. On the last day of the Service, the [RENTER] is requested to refill the tank of [FUEL] in full.<br>
6. INSURANCE: Comprehensive Insurance Coverage, such as: 2.1. Third Party Liability (TPL), &nbsp;2.2. Passenger Liability (PL), 2.3. Theft, 2.4. Own Damage (OD), and 2.5. Accident to the Driver (AD).<br>
7. UNLIMITED MILEAGE: Locations and Destinations&nbsp;<br>
8. &nbsp;PROHIBITION: No transport seafood, durian, smoke in the car are allowed. No open the window on the dusty road, otherwise, you will be imposed to charge...</p>

<strong>WITH A SUPPLIED ENGLISH SPEAKING DRIVER</strong>
<p>1. No making Cambodian Driver’s License is required.<br>
2. No Depositing one of your Passports is required.<br>
3. Deposit the Refundable Deposit is cheaper than a self-drive one, just only $300.00.<br>
4. FUEL: The quoted price is not included [FUEL] – Firstly, Lyna-CarRental.Com’s office will supply the [RENTER] a full tank of [FUEL]. The [RENTER] will refill it when it is necessary. On the last day of the Service, the [RENTER] requested to refill the tank of fuel in full.<br>
5. DRIVER’S WORKING DAYS &amp; HOURS: Monday through Saturday from 07:30 – 12:00 and 13:30-18:00<br>
6. WORKING ON SUNDAY &amp; ANY OFFICIAL HOLIDAY:: Sunday or any Official Holidays will subject to extra charge of $15.00 per day<br>
7. DRIVER’S MEAL &amp; ACCOMMODATION: The quoted price is including driver’s meal and accommodation in the province and stay overnight.<br>
8. OVER TIME RATE: $5.00 per hour before 07:30 or after 18:00<br>
9. REPAIR &amp; MAINTENANCE: Included<br>
10. INSURANCE COVERAGE: Full/Comprehensive Included, such as: 7.1. Third Party Liability (TPL), 7.2. Passenger Liability (PL), 7.3. Own Damage (OD), 7.4. Accident to the Driver (AD), and 7.5. Theft&nbsp;<br>
11. PROHIBITION: No transport seafood, durian, smoke in the car are allowed. No open the window on the dusty road, otherwise, you will be imposed to charge...</p>
<span style="font-family:tahoma,geneva,sans-serif">View Detail of the Terms and Conditions</span>
<div class="my-dropdown make-dropdown">
  <input type="checkbox" name="agree_term" id="agree" onclick="checkAgree();" style="margin-top: 6px;"> <span style="padding-left: 40px; font-size:12px;"><a href="/public/index/termcondition"> I agree to the Terms &amp; Conditions</a></span>  
  <button type="submit" id="c_agree" class="btn btn-primary" name="term_condiction">Continue</button>
</div>

                               </div>
                            </div>
                           
                            <?php } ?>
                       
                    
                    

                    </form>
                    <script type="text/javascript">

                    function checkAgree(){

                       var agree = $('#agree').val();
                       
                       if(agree=="on"){
                           $('#c_agree').css("disabled","");
                       }else{
                           $('#c_agree').css("disabled","disabled");
                       }
                   }

                    </script>


                           </div>            
                   </div>
                 
                 
                    <div <?php if($post_step !="4") { ?> style="display:none;" <?php } ?> class="tab-pane <?php if($post_step=="4") {echo "active in";} ?>"<?php if($post_step=="4") { ?>id="five"<?php } ?>>
                    
     
    <!-- <!— Page Content —> -->
    <table id="exportExcel" style="border-collapse:collapse;font-size: 12px;" width="100%">
                                    <tbody><tr>
                                        <th>
                                            <table style="border-collapse:collapse;font-size: 12px; width:100% ;text-align: left; padding:5px; line-height: 14px;" cellpadding="5 ">
                                                <tbody><tr style="line-height: 17px;"><td colspan="4" style="border-bottom:1px solid #ccc;text-align: left;background-color: #7030A0;color:rgb(254, 250, 250);"><strong>&nbsp;Booking Info</strong></td></tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;For :</td>
                                                    <td><?php echo @$_SESSION["user"]->user_name; ?></td>

                                                    <td style="width:18%">&nbsp;Total Day(s) :</td>
                                                    <td> 
                                                      <?php
                                 if(!isset($_SESSION["richshaw_pickupdate"]))
                                    {
                                     $_SESSION["richshaw_pickupdate"]="";
                                    }
                                    else {
                                    $_SESSION["richshaw_pickupdate"];
                                    }

                                   if(!isset($_SESSION["return_pickupdate"]))
                                    {
                                     $_SESSION["return_pickupdate"]="";
                                    }
                                    else {
                                     $_SESSION["return_pickupdate"];
                                    }

                                 $date1=date_create($_SESSION["richshaw_pickupdate"]);
                                 $date2=date_create($_SESSION["return_pickupdate"]);
                                 $diff=date_diff($date1,$date2);
                                 $text_info=$diff->format("%a%")+1;

                                echo $text_duration = str_replace('+', '',$text_info).' Days';
                               
                                 ?>                          
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Pickup Date Time : </td>
                                                    <td>
                                                      <?php
                                                      if(!isset($_SESSION["rickshaw_pickup_time"]))
                                                          {
                                                           $_SESSION["rickshaw_pickup_time"]="";
                                                          }
                                                          else {
                                                          $_SESSION["rickshaw_pickup_time"];
                                                          }
                                                      ?>
                                                      <?php
                                                       echo  $_SESSION["richshaw_pickupdate"].' '. $_SESSION["rickshaw_pickup_time"];
                                                      ?>                                                     
                                                    </td> 
                                                   
                                                    <td>Pickup Location : </td>
                                                     <td>
                                                       <?php
                                                           if(!isset($_SESSION["location_rickshaw_pickup"])) {
                                                                    $location_id=""; 
                                                                     $sql ="SELECT * FROM tbl_province  WHERE pv_id=''";
                                                                    }
                                                                 else {
                                                                     $location_id=$_SESSION['location_rickshaw_pickup'];
                                                                      $sql ="SELECT * FROM tbl_province  WHERE pv_id IN ($location_id)";
                                                                     
                                                              }
                                                               $result = $connect->query($sql);
                                                                  if ($result->num_rows > 0) {
                                                                    while($row = $result->fetch_assoc()){
                                                        ?>

                                                      <?php echo $row['pv_title']; ?>

                                                        <?php }} ?>
                                                     </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:18%">&nbsp;Return Date Time </td>
                                                    <td>
                                                  <?php
                                                  if(!isset($_SESSION["rickshaw_return_time"]))
                                                      {
                                                       $_SESSION["rickshaw_return_time"]="";
                                                      }
                                                      else {
                                                      $_SESSION["rickshaw_return_time"];
                                                      }
                                                  ?>
                                                  <?php
                                                   echo  $_SESSION["return_pickupdate"].' '.$_SESSION["rickshaw_return_time"];
                                                  ?>       
                                                    </td>

                                                     <td class="hidden">Return Location : </td>
                                                  <td>

                                                  <?php
                                                         if(!isset($_SESSION["location_return_date"])) {
                                                                  $return_location_id=""; 
                                                                   $sqls ="SELECT * FROM tbl_province  WHERE pv_id=''";
                                                                  }
                                                               else {
                                                                   $return_location_id=$_SESSION['location_return_date'];
                                                                    $sqls ="SELECT * FROM tbl_province  WHERE pv_id='$return_location_id'";
                                                                   
                                                            }
                                                             $results = $connect->query($sqls);
                                                                if ($results->num_rows > 0) {
                                                                  while($rows = $results->fetch_assoc()){
                                                      ?>

                                                    <?php // echo $rows['pv_title']; ?>

                                                      <?php }} ?>  
                                                  </td>
                                                    
                                                    
                                                </tr>
                                               
                                               
                                            </tbody></table>
                                        </th>
                                    </tr>
                                    <tr>
                                    </tr>
                                </tbody>
              </table>

              <table style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left;" width="100%">
                                 <tbody><tr><td colspan="8" style="border-bottom:1px solid #ccc;text-align: left;background-color:  #7030A0;color:rgb(254, 250, 250);"><strong style="font-size:14px;">&nbsp;Item Information</strong></td></tr>
                                  <tr>
                                    
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="5%" class="aa text-center">No</th>
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="45%" class="aa text-center">Items Description</th> 

                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="10%" class="aa text-center">Period QTY</th>
                                     <th style="background-color:#7030A0;color:white" rowspan="2" width="5%" class="aa text-center">QTY</th> 
                                     <th style="background-color:#7030A0;color:white" colspan="4" width="35%" class="aa text-center">Price In US$</th>
                                  </tr>
                                  <tr style="text-align: center">
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="7%">Price</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="7%">Discount</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="7%">VAT</th>
                                     <th style="background-color:#7030A0;color:white" class="aa text-center" width="14%" nowrap="nowrap">Amount</th>
                                  </tr>
                                        <?php
                                       if(!isset($_SESSION["richshaw_id"])) {
                                          $richshaw_id=""; 
                                           $sql ="SELECT * FROM tbl_rick_shaw_rental_last   WHERE ve_id=''";
                                          }
                                       else {
                                           $richshaw_id=$_SESSION['richshaw_id'];
                                            $sql ="SELECT * FROM tbl_rick_shaw_rental_last  WHERE ve_id IN ($richshaw_id)";
                                       }
                                        
                                        $result = $connect->query($sql);
                                        $i=1;
                                        $total_refun_rickshow=0;
                                        if ($result->num_rows > 0) {
                                          $amount_rickshaw = 0;
                                          while($row = $result->fetch_assoc()){
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                $price_rent="";
                                                $price_rent=$row['price_rent'];
                                             
                                              

                                               $total_day_price=$total_day * $price_rent;
                                               $richshaw_discount=$total_day_price-($total_day_price * $row['discount'])/100;
                                               $richshaw_vat=$richshaw_discount+($richshaw_discount * $row['vat'])/100;
                                               $total_rich=$richshaw_vat;
                                               $amount_rickshaw +=$total_rich;
                                               $refun_rickshaw=$row['refun_deposit'];
                                               $total_refun_rickshow +=$refun_rickshaw;
                                       ?>
                                 <tr style="height:25px;border:1px!important">
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000"><?php echo  $row['ve_title'].' '.$row['ve_ref_no']; ?></td>
                                          <td align="center" style="padding-left:8px;width:7%;border:1px solid #000000">
                                             <?php
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;

                                                echo $total_day.' Day(s)';
                                             ?>
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                              <?php
                                               echo "$".number_format($price_rent, 2);
                                             ?>
                                          </td>
                                           
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">
                                             <?php
                                               echo "$".number_format($total_rich, 2);
                                             ?>
                                          </td>

                                  </tr>
                           <?php }} ?>



                                    <?php
                                       if(!isset($_SESSION["accessory_id"])) {
                                          $accessory_id=""; 
                                           $sql ="SELECT * FROM tbl_accessories_rental   WHERE ac_id=''";
                                          }
                                       else {
                                           $accessory_id=$_SESSION['accessory_id'];
                                           if($accessory_id=="") {
                                            $sql ="SELECT * FROM tbl_accessories_rental   WHERE ac_id=''";
                                           }
                                           else {
                                            $accessory_id=$_SESSION['accessory_id'];
                                             $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id IN ($accessory_id)";
                                           }
                                           
                                       }
                                        
                                        $result = $connect->query($sql);
                                       $amount_accessory = 0;
                                       
                                               $total_refun_acess=0;
                                               
                                        if ($result->num_rows > 0) {
                                          
                                          while($row = $result->fetch_assoc()){
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                
                                               if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $day_price=$row['ac_days(1-7)']* $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price+$extraday_price;
                                                  }
                                                  else {
                                                   $day_price=$row['ac_days(1-7)'] * 7;
                                                   $extraday=$total_day-7;
                                                   
                                                   $extraday_price=$row['ac_extradays(1-7)'] * $extraday;
                                                   $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                               elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $day_price=$row['ac_days(15-26)'] * $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                  }
                                                  else {
                                                     $day_price=$row['ac_days(15-26)'] * 15;
                                                     $extraday=$total_day-15;
                                                    
                                                     $extraday_price=$row['ac_extradays(15-26)'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                              

                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $day_price=$row['ac_monthly'] * $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                   }
                                                   else {
                                                     $day_price=$row['ac_monthly'] * 30;
                                                     $extraday=$total_day-30;
                                                     $extraday_price=$row['ac_extramonthly'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                   }
                                                 
                                               }
                                                elseif ($total_day >365) {
                                                 $day_price=$row['ac_yearly']*365;
                                                 $extraday=$total_day-365;
                                                 $extraday_price=$extraday * $row['ac_extrayearly'];
                                                 $total_day_price=$day_price + $extraday_price;
                                               }
                                               else {

                                               }
                                             
                                               // daily acessory
                                                 
                                                 $acc_daily_discount=($day_price)-($day_price * $row['discount'])/100;
                                                 $acc_daily_vat=$acc_daily_discount+($acc_daily_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory_daily=$acc_daily_vat;
                                               // end daily acessory

                                               // extraday acessory
                                                 
                                                 $acc_ex_discount=($extraday_price)-($extraday_price * $row['discount'])/100;
                                                 $acc_ex_vat=$acc_ex_discount+($acc_ex_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory=$acc_ex_vat;

                                               // end extraday acessory
                                                 $refun_acc=$row['refun_deposit'];
                                                 $total_refun_acess +=$refun_acc;
                                                 $sum_acc=$price_item_accessory+$price_item_accessory_daily;

                                                 $amount_accessory +=$sum_acc;

                                       ?>
                                 <tr style="height:25px;border:1px!important">
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000"><?php echo  $row['ac_title'].' '.$row['ac_ref_no']; ?></td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000">
                                             <?php
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;

                                                echo $total_day-$extraday.' Day(s)';
                                             ?>
                                          </td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">
                                              <?php
                                               echo "$".number_format($day_price/($total_day-$extraday), 2);
                                             ?>
                                          </td>
                                           
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">
                                             <?php
                                               echo "$".number_format($price_item_accessory_daily, 2);
                                             ?>
                                          </td>

                                  </tr>
                                   <?php
                                        if($extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$extraday, 2); ?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($price_item_accessory, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                           <?php }} ?>



                           
                         
                                                                                                          
                                        <?php
                                             if(!isset($_SESSION["driver_id"])) {
                                             $driver_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $driver_id=$_SESSION['driver_id'];
                                             if($driver_id=="") {
                                               $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
                                              $driver_id=$_SESSION['driver_id'];
                                              $sql ="SELECT * FROM tbl_users   WHERE user_id IN ($driver_id)";
                                             }
                                             
                                             }
                                             
                                             $result = $connect->query($sql);
                                          
                                             $amount_drive = 0;
                                             $string_rows="";
                                             $total_extraday=0;
                                            $holiday_price_item=0;
                                            $extraday_price_item=0;
                                            $total_refun_driver=0;
                                           
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                                  // calulate date  and holiday
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["richshaw_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                                // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_driver=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $amount_drive +=$total_driver;
                                                $refun_driver=$row['refun_deposit'];
                                                 $total_refun_driver +=$refun_driver;

                                             ?>
                                                                      
                                       <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Chauffeur Rental (<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $total_day_daily; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($daily_price/$total_day_daily, 2); ?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($daily_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $total_extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$total_extraday, 2); ?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2);?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($extraday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                       <?php
                                        if($total_holiday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:8%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $total_holiday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($holiday_price/$total_holiday, 2);?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($holiday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>



                                        <?php }} ?> 


                                         <?php
                                             if(!isset($_SESSION["tour_quide_id"])) {
                                             $tour_quide_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $tour_quide_id=$_SESSION['tour_quide_id'];
                                             if($tour_quide_id =="") {
                                               $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
                                               $tour_quide_id=$_SESSION['tour_quide_id'];
                                               $sql ="SELECT * FROM tbl_users   WHERE user_id IN ($tour_quide_id)";
                                             }
                                            
                                             }
                                             
                                             $result = $connect->query($sql);
                                          
                                             $amount_tour = 0;
                                              $string_rows="";
                                               $total_refun_tour=0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                               // calulate date  and holiday
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["richshaw_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                               // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_tour=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $refun_tour=$row['refun_deposit'];
                                                 $total_refun_tour +=$refun_tour;
                                                 $amount_tour +=$total_tour;

                                             ?>
                                                                      
                                       <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Tour Guide Rental (<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $total_day_daily; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($daily_price/$total_day_daily, 2); ?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($daily_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                       <?php
                                        if($total_extraday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $total_extraday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($extraday_price/$total_extraday, 2); ?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($extraday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                       <?php
                                        if($total_holiday>0) {
                                      ?>
                                      <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;"><?php echo $i++; ?></td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:10%;border:1px solid #000000"><?php echo $total_holiday; ?> Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php  echo number_format($holiday_price/$total_holiday, 2); ?></td>
                                          
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format( $row['discount'], 2); ?>%</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000"><?php echo number_format($row['vat'], 2); ?>%</td>
                                          
                                          <td align="right" style="padding-left:8px;width:8%;border:1px solid #000000">$<?php
                                         
                                          echo number_format($holiday_price_item, 2);
                                       
                                          ?></td>
                                      </tr>
                                      <?php 
                                         }
                                      ?>
                                        <?php }} ?>  
                                            
                                                                    
                                      <tr><td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1. Total Rental Fee:</td>
                                      <td align="right" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;$ <?php $total_rental= $amount_accessory+$amount_tour+$amount_drive +$amount_rickshaw; echo $total_rental;  ?> </td>
                                  </tr>
                                  <tr>
                                      <td colspan="4" rowspan="5" style="font-size:10px;">
                                        <b style="color:#7030A0">NOTICES:</b><br>
                                        <b>&nbsp;&nbsp;1. Long Distance Assistance<span style="color:red;">*</span> Fee (LD Assistance) will be refunded 70%, if no problem with the rented car.</b><br>
                                        <b>&nbsp;&nbsp;2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</b><br>
                                        <b> 
                                       &nbsp;&nbsp; 3 The Refundable Deposit &amp; Long Distance Assistance Fee<span style="color:red;">**</span> will be paid on your arrival to save the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;service charge!</b>


                                    </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2. Service Charge (3%):</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;$ <?php $total_service_char=($total_rental *3)/100; echo number_format($total_service_char,2); ?> </td>
                                  </tr>
                                  <tr>
                                      
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3. Amount Paid :</td>
                                      <td align="right" style="background:blue;border:1px solid #000000;padding-right:5px;color:white;font-weight:900;" nowrap="">&nbsp;$ <?php echo number_format($total_service_char + $total_rental, 2); ?></td>
                                  

                                  
                                    <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;4. Refundable Deposit (RD):</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;$ 
                                       <?php 
                                         // echo $deposit_off=$total_refun_rickshow+$total_refun_driver+$total_refun_tour+$total_refun_acess;

                                            $deposit_off=$total_refun_rickshow+$total_refun_driver+$total_refun_tour+$total_refun_acess;

                                            echo number_format($deposit_off, 2);
                                      
                                        ?> 
                                       </td>
                                  </tr>
                                
                                                                    <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;5. Due Amount <span style="color:red;">**</span>:</td>
                                      <td align="right" style="background:blue;border:1px solid #000000;padding-right:5px;color:white;font-weight:900;" nowrap="">&nbsp;$ <?php echo number_format($deposit_off,2); ?></td>
                                  </tr>
                                  
                               </tbody></table>

                                                            <!-- <!— Popup Checkout Form —> -->
         <div id="aba_main_modal" class="aba-modal">
            <!-- <!— Modal content —> -->
            <div class="aba-modal-content">
            
                  
                 
               <!-- Include PHP class -->
               <?php
                  require_once 'PayWayApiCheckout.php';  
               ?>
                  
               <form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getApiUrl(); ?>" id="aba_merchant_request">
                <?php
                     $transactionId =date("Ymd").''.rand(10,1000000);
                     // $transactionId ="201904014364688";
                     $amount =$total_service_char + $total_rental;
                     $firstName =@$_SESSION["user"]->user_first_name;
                     $lastName =@$_SESSION["user"]->user_last_name;
                     $phone =@$_SESSION["user"]->user_phone_number;
                     $email =@$_SESSION["user"]->user_email;
                     $continue_success_url ='http://'.$_SERVER['SERVER_NAME'].'/'.'lyna-CarRental/rick_shaw_book.php?tranid='.$transactionId;
                    
                  ?>

                  <input type="hidden" name="hash" value="<?php echo PayWayApiCheckout::getHash($transactionId, $amount); ?>" id="hash"/>
                  <input type="hidden" name="tran_id" value="<?php echo $transactionId; ?>" id="tran_id"/>
                  <input type="hidden" name="amount" value="<?php echo $amount; ?>" id="amount"/>
                  <input type="hidden" name="firstname" value="<?php echo $firstName; ?>"/>
                  <input type="hidden" name="lastname" value="<?php echo $lastName; ?>"/>
                  <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                  <input type="hidden" name="email" value="<?php echo $email; ?>"/>
                  <input type="hidden" name="continue_success_url" value="<?php echo $continue_success_url; ?>"/>
                 

                  
                  <?php 
                  $url =PayWayApiCheckout::getApiUrl() . '/check/transaction/';
                  $merchantId =PayWayApiCheckout::getMerchantId();
                  $key =PayWayApiCheckout::getApiKey();
                  $pushBack =$transactionId;
                  $jsonResponse=PayWayApiCheckout::checkTransaction($url, $merchantId, $pushBack, $key); 
                 
                  $result = json_decode($jsonResponse, true);
                  $customer_id=@$_SESSION["user"]->user_id;
                  $p_date=$_SESSION["richshaw_pickupdate"];
                  $re_date=$_SESSION["return_pickupdate"];
                  $pickup_time=$_SESSION['rickshaw_pickup_time'];
                  $return_time=$_SESSION['rickshaw_return_time'];

                  $pickup_map=$_SESSION["rickshaw_pickup_map"];
                  $return_map=$_SESSION['rickshaw_return_map'];
                  $comment_car=$_SESSION['rickshaw_comment'];


                  $amount_web_pay=$total_service_char + $total_rental;
                  $today = date("Y-m-d");
                  $get_url_tran_id=$connect->real_escape_string(@$_GET['tranid']);
             
                 if( ($get_url_tran_id !="") && ($_SESSION["term_check_pay"]) !="" ) {
                  if($result['status'] ==0){
                         $sql_tour = "INSERT INTO `tbl_book_info`(
                            `pickup_date`,
                            `return_date`,
                            `pickup_time`,
                            `return_time`,
                            `total_day`,
                            `term_id`,
                            `user_book_id`,
                            `refund_deposit`,
                            `ld_assistant`,
                            `amount_web_pay`,
                            `transactionId`,
                            `book_date`,
                            `book_type_order`,
                            `pickup_map`,
                            `return_map`,
                            `des_name`,
                            `pickup_location`,
                            `return_location`
                        )
                        VALUES(
                            '$p_date',
                            '$re_date',
                            '$pickup_time',
                            '$return_time',
                            '$total_day',
                            '1',
                            '$customer_id',
                            '$deposit_off',
                            '0',
                            '$amount_web_pay',
                            '$get_url_tran_id',
                            '$today',
                            '5',
                            '$pickup_map',
                            '$return_map',
                            '$comment_car',
                            '$location_rickshaw_pickup',
                            '0'

                            )";
                        if($connect->query($sql_tour)){
                           unset($_SESSION["term_check_pay"]);
                            // header("location: ./customer_login.php?sms=register_success");
                        }

                         $booklast_id = $connect->insert_id;
                         $richshaw_id=$_SESSION['richshaw_id'];
                         $sql ="SELECT * FROM tbl_rick_shaw_rental_last  WHERE ve_id IN ($richshaw_id)";
                         $result = $connect->query($sql);
                         $i=1;
                         $total_refun_rickshow=0;
                         if ($result->num_rows > 0) {
                            $amount_rickshaw = 0;
                       while($row = $result->fetch_assoc()){
                        $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                $price_rent="";
                                                $price_rent=$row['price_rent'];
                                                $in_rich_id=$row['ve_id'];
                                                $in_rich_price=$row['price_rent'];
                                                $in_vat_discount=$row['discount'];
                                                $in_vat_car=$row['vat'];
                                               $total_day_price=$total_day * $price_rent;
                                               $richshaw_discount=$total_day_price-($total_day_price * $row['discount'])/100;
                                               $richshaw_vat=$richshaw_discount+($richshaw_discount * $row['vat'])/100;
                                               $total_rich=$richshaw_vat;
                                               $amount_rickshaw +=$total_rich;
                                               $refun_rickshaw=$row['refun_deposit'];
                                               $total_refun_rickshow +=$refun_rickshaw;
                               $sql_car = "INSERT INTO `tbl_book_rickshaw`(
                                  `book_infor_id`,
                                  `car_id`,
                                  `price`,
                                  `car_discount`,
                                  `car_vat`,
                                  `car_price_order`,
                                  `car_amount`,
                                  `car_book_type`
                              )
                              VALUES(
                                  '$booklast_id',
                                  '$in_rich_id',
                                  '$in_rich_price',
                                  '$in_vat_discount',
                                  '$in_vat_car',
                                  '$in_rich_price',
                                  '$total_rich',
                                  '5'
                                  
                                  )";
                        if($connect->query($sql_car)){
                            // header("location: ./customer_login.php?sms=register_success");
                        }

                        }
                     }

                     
                                        

                         $driver_id=$_SESSION['driver_id'];
                         if($driver_id !="") {

                         $sql ="SELECT * FROM tbl_users  WHERE user_id IN ($driver_id)";
                         $result = $connect->query($sql);
                         $amount_drive = 0;
                         $string_rows="";
                         $total_extraday=0;
                        $holiday_price_item=0;
                        $extraday_price_item=0;
                        $total_refun_driver=0;
                         if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()){
                           $in_driver_id=$row['user_id'];
                            // calulate date  and holiday
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["richshaw_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                                // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_driver=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $amount_drive +=$total_driver;
                                                $refun_driver=$row['refun_deposit'];
                                                 $total_refun_driver +=$refun_driver;
                                                $price_daily_insert=$daily_price/$total_day_daily;
                                                 $price_extra_insert=$extraday_price/$total_extraday;
                                                 $price_holiday_insert=$holiday_price/$total_holiday;

                                              
                                                 $dr_vat_rent=$row['vat'];
                                                 $dr_discount_rent=$row['discount'];
                           
                           $sql_driver = "INSERT INTO `tbl_book_drive`(
                           `b_book_id`,
                            `driver_id`,
                          
                            `b_discount`,
                            `b_vat`,
                            
                            `driver_type`,
                            `language_id`,
                            `day_daily`,
                            `day_extra`,
                            `holiday_number`,
                            `price_daily`,
                            `price_extra`,
                            `price_holiday`
                        )
                        VALUES(
                            '$booklast_id',
                            '$in_driver_id',
                            '$dr_discount_rent',
                            '$dr_vat_rent',
                            '5',
                            '0',
                            '$total_day_daily',
                            '$total_extraday',
                            '$total_holiday',
                            '$price_daily_insert',
                            '$price_extra_insert',
                            '$price_holiday_insert'

                            
                            )";
                        if($connect->query($sql_driver)){
                          
                            // header("location: ./customer_login.php?sms=register_success");
                        }
                  }
               }
            }


              $a_id=$_SESSION['accessory_id'];
                         if($a_id !="") {

                         $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id IN ($a_id)";
                         $result = $connect->query($sql);
                         $amount_accessory = 0;
                         $total_refun_acess=0;
                         if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()){
                           $acc_id_insert=$row['ac_id'];
                          
                           $a_discount=$row['discount'];
                           $a_vat=$row['vat'];

                           $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                           $end_day=date_create($_SESSION["return_pickupdate"]);
                           $day=date_diff($start_day,$end_day);
                           $total_day = $day->format("%a%")+1;
                           if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $day_price=$row['ac_days(1-7)']* $total_day;
                                                    $extraday_price=0;
                                                    $total_day_price=$day_price+$extraday_price;
                                                  }
                                                  else {
                                                   $day_price=$row['ac_days(1-7)'] * 7;
                                                   $extraday=$total_day-7;
                                                   $extraday_price=$row['ac_extradays(1-7)'] * $extraday;
                                                   $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                               elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $day_price=$row['ac_days(15-26)'] * $total_day;
                                                    $extraday_price=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                  }
                                                  else {
                                                     $day_price=$row['ac_days(15-26)'] * 15;
                                                     $extraday=$total_day-15;
                                                     $extraday_price=$row['ac_extradays(15-26)'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                              

                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $day_price=$row['ac_monthly'] * $total_day;
                                                    $extraday_price=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                   }
                                                   else {
                                                     $day_price=$row['ac_monthly'] * 30;
                                                     $extraday=$total_day-30;
                                                     $extraday_price=$row['ac_extramonthly'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                   }
                                                 
                                               }
                                                elseif ($total_day >365) {
                                                 $day_price=$row['ac_yearly']*365;
                                                 $extraday=$total_day-365;
                                                 $extraday_price=$extraday * $row['ac_extrayearly'];
                                                 $total_day_price=$day_price + $extraday_price;
                                               }
                                               else {

                                               }
                                               // daily acessory
                                                 
                                                 $acc_daily_discount=($day_price)-($day_price * $row['discount'])/100;
                                                 $acc_daily_vat=$acc_daily_discount+($acc_daily_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory_daily=$acc_daily_vat;
                                               // end daily acessory

                                               // extraday acessory
                                                 
                                                 $acc_ex_discount=($extraday_price)-($extraday_price * $row['discount'])/100;
                                                 $acc_ex_vat=$acc_ex_discount+($acc_ex_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory=$acc_ex_vat;

                                               // end extraday acessory
                                                 $refun_acc=$row['refun_deposit'];
                                                 $total_refun_acess +=$refun_acc;
                                                 $sum_acc=$price_item_accessory+$price_item_accessory_daily;

                                                 $amount_accessory +=$sum_acc;
                                                 $acc_daily_insert=$total_day-$extraday;
                                                 $acc_price_daily_insert=$day_price/($total_day-$extraday);
                                                 $acc_price_extra_insert=$extraday_price/$extraday;
                           
                           $sql_driver = "INSERT INTO `tbl_book_accessory`(
                            `book_infor_id`,
                            `acc_id`,
                           
                            `acc_discount`,
                            `acc_vat`,
                            `acc_price_order`,
                            `acc_book_type`,
                            `day_daily`,
                            `day_extra`,
                            `price_daily`,
                            `price_extra`
                        )
                        VALUES(
                            '$booklast_id',
                            '$acc_id_insert',
                           
                            '$a_discount',
                            '$a_vat',
                            '$total_acc',
                            '5',
                            '$acc_daily_insert',
                            '$extraday',
                            '$acc_price_daily_insert',
                            '$acc_price_extra_insert'
                            
                            )";
                        if($connect->query($sql_driver)){
                          
                            // header("location: ./customer_login.php?sms=register_success");
                        }
                  }
               }
            }



                         $t_id=$_SESSION['tour_quide_id'];
                         if($t_id !="") {

                         $sql ="SELECT * FROM tbl_users  WHERE user_id IN ($t_id)";
                         $result = $connect->query($sql);
                           $amount_tour = 0;
                          $string_rows="";
                          $total_refun_tour=0;
                         if ($result->num_rows > 0) {
                           while($row = $result->fetch_assoc()){
                           $int_id=$row['user_id'];
                            // calulate date  and holiday
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["richshaw_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                               // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_tour=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $refun_tour=$row['refun_deposit'];
                                                 $total_refun_tour +=$refun_tour;
                                                 $amount_tour +=$total_tour;
                                                 $price_daily_insert=$daily_price/$total_day_daily;
                                                 $price_extra_insert=$extraday_price/$total_extraday;
                                                 $price_holiday_insert=$holiday_price/$total_holiday;
                                                 $tour_vat_rent=$row['vat'];
                                                 $tour_discount_rent=$row['discount'];
                           
                           $sql_driver = "INSERT INTO `tbl_book_tour_quide`(
                            `t_book_id`,
                            `t_id`,
                          
                            `t_discount`,
                            `t_vat`,
                            
                            `language_id`,
                            `t_type`,
                             `day_daily`,
                            `day_extra`,
                            `holiday_number`,
                            `price_daily`,
                            `price_extra`,
                            `price_holiday`
                        )
                        VALUES(
                            '$booklast_id',
                            '$int_id',
                           
                            '$tour_discount_rent',
                            '$tour_vat_rent',
                           
                            '0',
                            '5',
                            '$total_day_daily',
                            '$total_extraday',
                            '$total_holiday',
                            '$price_daily_insert',
                            '$price_extra_insert',
                            '$price_holiday_insert'
                            
                            )";
                        if($connect->query($sql_driver)){
                          
                            // header("location: ./customer_login.php?sms=register_success");
                        }
                       
                  }
               }
            }



             
                        // send email

                        $htmlContent ='<table align="center" style="width:100%" border="0" cellspacing="0" cellpadding="0">
               <tbody>
               <tr>
        <td>
          <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="width:100%!important;font-family:Arial;font-size:12px">
            <tbody>
              <tr>
                <td>
                  <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial;font-size:12px">
                    <tbody>
                      <tr>
                        <td>
                          <table width="100%" align="center" style="background:#fbff00">
                            <tbody><tr align="center" style="height:12px;font-size:30px">
                              <td><span>លីណា-ជួលរថយន្តទេសចរណ៍</span></td>
                            </tr>
                            <tr align="center" style="height:12px;font-size:30px">
                              <td><span>Lyna-CarRental.Com</span></td>
                            </tr>
                            <tr align="center" style="height:12px;font-size:30px;background:#0c109e;border-top:2px solid #ffffff">
                              <td><span style="color:red"></span></td>
                            </tr>
                          </tbody></table>
                        </td>
                      </tr>
                      <tr style="height:30px"><td><hr></td></tr>
                      <tr bgcolor="#ffffff">
                        <td>
                          <table width="100%" align="left" border="0" cellspacing="0" cellpadding="0" style="font-family:Arial;font-size:12px">
                            <tbody><tr><td colspan="5"><center><h2>RESERVATION INVOICE</h2></center></td></tr><tr border="1" style="background:#dfdfdf">
                                <td width="20%" align="left">Bill For : </td>
                                <td width="25%" align="left">'.@$_SESSION["user"]->user_first_name.'.'.@$_SESSION["user"]->user_last_name.'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr border="1">
                                <td width="20%" align="left">Phone No. : </td>
                                <td width="25%" align="left">'.@$_SESSION["user"]->user_phone_number.'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr border="1" style="background:#dfdfdf">
                                <td width="20%" align="left">E-mail Address : </td>
                                <td width="25%" align="left"><a href="mailto:'.@$_SESSION["user"]->user_email.'" target="_blank">'.@$_SESSION["user"]->user_email.'</a></td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr><tr>
                                <td width="20%" align="left">Pickup Date and Time:</td>
                                <td width="25%" align="left">'.$_SESSION["car_rent_pickupdate"].':'.$_SESSION["car_rent_pickupdate_time"].'</td>
                                <td width="5%"></td>
                                <td width="20%" align="left"></td>
                                <td width="30%" align="right"></td>
                              </tr>
                              <tr>
                                <td width="20%" align="left">Return Date and Time:</td>
                                <td width="25%" align="left">'.$_SESSION["car_return_date"].':'.$_SESSION["car_return_time"].'</td>
                                
                                <td width="20%" align="left">Destination:</td>
                                <td  width="20%">'.$total_day.' day(s)</td>
                              </tr>

                               <tr style="background:#dfdfdf">
                               
                                <td width="5%"></td>
                                <td width="20%" align="left">Booking No.: </td>
                                <td width="30%" align="right" style="color:red"><b style="color:red">'.$transactionId.'</b></td>
                              </tr><tr>
                               
                                <td></td>
                                <td width="20%" align="left">Booking Date: </td>

                                <td width="30%" align="right">'.$today.'</td>
                              </tr><tr height="30px" bgcolor="#ffffff" style="border-bottom:1px solid #000000"><td colspan="5"><hr></td> </tr></tbody>
                          </table>
                        </td>
                      </tr>
                      <tr bgcolor="#ffffff">
                        <td>
                          <table style="width:100%;border-collapse:collapse;font-family:Arial;font-size:12px" border="0" align="center" cellspacing="0" cellpadding="0">
                            <tbody>
                              <tr style="background-color:#7030a0;color:white;height:40px;border:1px solid #000000;color:#ffffff">
                                <td align="center" style="border:1px solid #000000">No. </td>
                                <td align="center" style="border:1px solid #000000">Items Description</td>
                                <td align="center" style="border:1px solid #000000">Period QTY</td>
                                <td align="center" style="border:1px solid #000000">Item QTY</td>
                                <td align="center" style="border:1px solid #000000">Price</td>
                                <td align="center" style="border:1px solid #000000">Discount</td>
                                <td align="center" style="border:1px solid #000000">VAT</td>
                                
                                <td align="center" style="border:1px solid #000000">Amount</td>
                              </tr>';
                                 if(!isset($_SESSION["richshaw_id"])) {
                                          $richshaw_id=""; 
                                           $sql ="SELECT * FROM tbl_rick_shaw_rental_last   WHERE richshaw_id=''";
                                          }
                                       else {
                                           $richshaw_id=$_SESSION['richshaw_id'];
                                            $sql ="SELECT * FROM tbl_rick_shaw_rental_last  WHERE ve_id IN ($richshaw_id)";
                                       }
                                        
                                        $result = $connect->query($sql);
                                        $i=1;
                                        $total_refun_rickshow=0;
                                        if ($result->num_rows > 0) {
                                         $amount_rickshaw = 0;
                                         $total_refun_rickshow=0;
                                          while($row = $result->fetch_assoc()){
                                               
                                              
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                $price_rent="";
                                                $price_rent=$row['price_rent'];
                                             
                                              

                                               $total_day_price=$total_day * $price_rent;
                                               $richshaw_discount=$total_day_price-($total_day_price * $row['discount'])/100;
                                               $richshaw_vat=$richshaw_discount+($richshaw_discount * $row['vat'])/100;
                                               $total_rich=$richshaw_vat;
                                               $amount_rickshaw +=$total_rich;
                                               $refun_rickshaw=$row['refun_deposit'];
                                               $total_refun_rickshow +=$refun_rickshaw;
                              $htmlContent.='<tr style="height:30px;border:1px solid #000000">
                              <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">'.$i++.'</td>
                              <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">'.$row["ve_title"].' '.$row["ve_year"].'</td>';
                              
                                               $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;

                                             
                           $htmlContent.='<td align="center" style="border:1px solid #000000;width:8%">'.$total_day.' Day(s)</td>
                              <td align="center" style="border:1px solid #000000;width:5%">1</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">$'.number_format($price_rent, 2).'</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">'.number_format($row['discount'], 2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">'.number_format($row['vat'], 2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">$'.number_format($total_rich, 2).'</td>
                              </tr>';

                        }}


 if(!isset($_SESSION["accessory_id"])) {
                                          $accessory_id=""; 
                                           $sql ="SELECT * FROM tbl_accessories_rental   WHERE ac_id=''";
                                          }
                                       else {
                                           $accessory_id=$_SESSION['accessory_id'];
                                           if($accessory_id=="") {
                                            $sql ="SELECT * FROM tbl_accessories_rental   WHERE ac_id=''";
                                           }
                                           else {
                                            $accessory_id=$_SESSION['accessory_id'];
                                             $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id IN ($accessory_id)";
                                           }
                                           
                                       }
                                        
                                        $result = $connect->query($sql);
                                       $amount_accessory = 0;
                                       $total_refun_acess=0;
                                        if ($result->num_rows > 0) {
                                          
                                          while($row = $result->fetch_assoc()){
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                
                                               if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $day_price=$row['ac_days(1-7)']* $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price+$extraday_price;
                                                  }
                                                  else {
                                                   $day_price=$row['ac_days(1-7)'] * 7;
                                                   $extraday=$total_day-7;
                                                   $extraday_price=$row['ac_extradays(1-7)'] * $extraday;
                                                   $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                               elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $day_price=$row['ac_days(15-26)'] * $total_day;
                                                    $extraday_price=0;
                                                    $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                  }
                                                  else {
                                                     $day_price=$row['ac_days(15-26)'] * 15;
                                                     $extraday=$total_day-15;
                                                     $extraday_price=$row['ac_extradays(15-26)'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                  }
                                                 
                                               }
                                              

                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $day_price=$row['ac_monthly'] * $total_day;
                                                    $extraday_price=0;
                                                     $extraday=0;
                                                    $total_day_price=$day_price + $extraday_price;
                                                   }
                                                   else {
                                                     $day_price=$row['ac_monthly'] * 30;
                                                     $extraday=$total_day-30;
                                                     $extraday_price=$row['ac_extramonthly'] * $extraday;
                                                     $total_day_price=$day_price+$extraday_price;
                                                   }
                                                 
                                               }
                                                elseif ($total_day >365) {
                                                 $day_price=$row['ac_yearly']*365;
                                                 $extraday=$total_day-365;
                                                 $extraday_price=$extraday * $row['ac_extrayearly'];
                                                 $total_day_price=$day_price + $extraday_price;
                                               }
                                               else {

                                               }
                                               // daily acessory
                                                 
                                                 $acc_daily_discount=($day_price)-($day_price * $row['discount'])/100;
                                                 $acc_daily_vat=$acc_daily_discount+($acc_daily_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory_daily=$acc_daily_vat;
                                               // end daily acessory

                                               // extraday acessory
                                                 
                                                 $acc_ex_discount=($extraday_price)-($extraday_price * $row['discount'])/100;
                                                 $acc_ex_vat=$acc_ex_discount+($acc_ex_discount * $row['vat'])/100;
                                                 
                                                 $price_item_accessory=$acc_ex_vat;

                                               // end extraday acessory
                                                 $refun_acc=$row['refun_deposit'];
                                                 $total_refun_acess +=$refun_acc;
                                                 $sum_acc=$price_item_accessory+$price_item_accessory_daily;

                                                 $amount_accessory +=$sum_acc;
                              $htmlContent.='<tr style="height:30px;border:1px solid #000000">
                              <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">'.$i++.'</td>
                              <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">'.$row["ac_title"].' '.$row["ac_ref_no"].'</td>';
                              
                                               $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                $check_daly_day=$total_day-$extraday;

                                             
                           $htmlContent.='<td align="center" style="border:1px solid #000000;width:8%">'.$check_daly_day.' Day(s)</td>
                              <td align="center" style="border:1px solid #000000;width:5%">1</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">$'.number_format($day_price/($total_day-$extraday), 2).'</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">'.number_format($row['discount'], 2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">'.number_format($row['vat'], 2).'%</td>
                              <td align="right" style="border:1px solid #000000;width:8%;padding-right:5px;text-align: right" nowrap="">$'.number_format($price_item_accessory_daily, 2).'</td>
                              </tr>';

                               if($extraday>0) {
                                $htmlContent.=' <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">'.$i++.'</td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">'.$extraday.' Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align: right; padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($extraday_price/$extraday, 2).'</td>
                                          
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['discount'], 2).' %</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['vat'], 2).' %</td>
                                          
                                          <td align="right" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($price_item_accessory, 2).'</td>
                                      </tr>';
                               }


                        }}

                                 if(!isset($_SESSION["tour_quide_id"])) {
                                             $tour_quide_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $tour_quide_id=$_SESSION['tour_quide_id'];
                                             if($tour_quide_id =="") {
                                               $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
                                               $tour_quide_id=$_SESSION['tour_quide_id'];
                                               $sql ="SELECT * FROM tbl_users   WHERE user_id IN ($tour_quide_id)";
                                             }
                                            
                                             }
                                             
                                             $result = $connect->query($sql);
                                          
                                              $amount_tour = 0;
                                              $string_rows="";
                                              $total_refun_tour=0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                                // calulate date  and holiday
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["richshaw_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                               // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_tour=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $refun_tour=$row['refun_deposit'];
                                                 $total_refun_tour +=$refun_tour;
                                                 $amount_tour +=$total_tour;

                         $htmlContent.='<tr style="height:30px;border:1px solid #000000">
                              <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">'.$i++.'</td>
                              <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Tour Guide Rental('.$row["user_first_name"].'/'.$row["user_last_name"].')</td>';
                              

                                             
                           $htmlContent.='<td align="center" style="border:1px solid #000000;width:8%">'.$total_day_daily.' Day(s)</td>
                              <td align="center" style="border:1px solid #000000;width:5%">1</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">$'.number_format($daily_price/$total_day_daily, 2).'</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format($row['discount'], 2).'%</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format($row['vat'], 2).'%</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">$'.number_format($daily_price_item, 2).'</td>
                              </tr>';

                              if($total_extraday>0) {
                                $htmlContent.='
                                <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">'.$i++.'</td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">'.$total_extraday.' Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$'.number_format($extraday_price/$total_extraday, 2).'</td>
                                          
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['discount'], 2).' %</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['vat'], 2).' %</td>
                                          
                                          <td align="right" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($extraday_price_item, 2).'
                                          </td>
                                      </tr>
                                ';
                              }


                               if($total_holiday>0) {
                                  $htmlContent.=' <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">'.$i++.'</td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">'.$total_holiday.' Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$'.number_format($holiday_price/$total_holiday, 2).'</td>
                                          
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['discount'], 2).' %</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['vat'], 2).' %</td>
                                          
                                          <td align="right" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($holiday_price_item, 2).'</td>
                                      </tr>

                                  ';
                               }




                            }}



                          if(!isset($_SESSION["driver_id"])) {
                                             $driver_id=""; 
                                             $sql ="SELECT * FROM tbl_users WHERE user_id=''";
                                                 }
                                             else {
                                             $driver_id=$_SESSION['driver_id'];
                                             if($driver_id=="") {
                                               $sql ="SELECT * FROM tbl_users WHERE user_id=''";
                                             }
                                             else {
                                              $driver_id=$_SESSION['driver_id'];
                                              $sql ="SELECT * FROM tbl_users  WHERE user_id IN ($driver_id)";
                                             }
                                             
                                             }
                                             $result = $connect->query($sql);
                                          
                                              $amount_drive = 0;
                                              $string_rows="";
                                              $total_extraday=0;
                                              $holiday_price_item=0;
                                              $extraday_price_item=0;
                                              $total_refun_driver=0;
                                             if ($result->num_rows > 0) {

                                             while($row = $result->fetch_assoc()){
                                                  // calulate date  and holiday
                                                $start_day=date_create($_SESSION["richshaw_pickupdate"]);
                                                $end_day=date_create($_SESSION["return_pickupdate"]);
                                                $day=date_diff($start_day,$end_day);
                                                $total_day = $day->format("%a%")+1;
                                                 // caludate sum date
                                                  $date_in=$_SESSION["richshaw_pickupdate"];
                                                     if($total_day<28) {
                                                      for ($day_loop=0; $day_loop<$total_day; $day_loop++) { 
                                                          $date_arr=date('Y-m-d', strtotime($date_in. ' + '.$day_loop.' days'));
                                                          $string_rows.=$date_arr.',';
                                                           }
                                                        }
                                                  $array=explode(',', $string_rows);
                                                  $array = implode("','",$array);
                                                  $sql_holiday ="SELECT COUNT(holiday_id) as total_row FROM tbl_holiday 
                                                   WHERE  date_public IN('$array')";
                                                   $results = $connect->query($sql_holiday);
                                                      $total_holiday=0;
                                                   while($rows = $results->fetch_assoc()){
                                                      $total_holiday=$rows['total_row'];
                                                   }
                                                 

                                                 // end calulate date  and holiday

                                                // calulate extra day and normal 
                                                if($total_day <=14) {
                                                  if($total_day <=7) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                    $total_extraday=$total_day-7;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    
                                                    $extraday_price=$row['extra_rate'] * $total_extraday ;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >=15 && $total_day <=30) {
                                                  if($total_day<=26) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                  else {
                                                     $total_extraday=$total_day-15;
                                                     $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                     $daily_price=$row['daily_rate'] * $total_day_daily;
                                                     $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                     $extraday_price=$row['extra_rate'] * $total_extraday;
                                                     $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                  }
                                                 
                                               }
                                                elseif ($total_day >30 && $total_day <=365) {
                                                   if($total_day<=30) {
                                                    $total_day_daily=$total_day-$total_holiday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $extraday_price=0;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                   else {
                                                    $total_extraday=$total_day-30;
                                                    $total_day_daily=$total_day-$total_holiday-$total_extraday;
                                                    $daily_price=$row['daily_rate'] * $total_day_daily;
                                                    $holiday_price=$row['weekend_holidate_rate'] * $total_holiday;
                                                    $extraday_price=$row['monthly_rate'] * $total_extraday;
                                                    $total_day_price=$daily_price+$holiday_price+$extraday_price;
                                                   }
                                                 
                                               }
                                               
                                               else {

                                               }


                                                // End calulate extra day and normal 
                                                // holiday calulate
                                                 $ho_discount=$holiday_price-($holiday_price * $row['discount'])/100;
                                                 $ho_vat=$ho_discount+($ho_discount * $row['vat'])/100;
                                                 $holiday_price_item=$holiday_price-$ho_discount+$ho_vat;
                                                // End holiday calulate
                                                   // extrayday calulate
                                                 $ex_discount=$extraday_price-($extraday_price * $row['discount'])/100;
                                                 $ex_vat=$ex_discount+($ex_discount * $row['vat'])/100;
                                                 $extraday_price_item=$extraday_price-$ex_discount+$ex_vat;
                                                // End extrayday calulate
                                                  // dailyday calulate
                                                 $daily_discount=$daily_price-($daily_price * $row['discount'])/100;
                                                 $daily_vat=$daily_discount+($daily_discount * $row['vat'])/100;
                                                 $daily_price_item=$daily_price-$daily_discount+$daily_vat;
                                                // End dailyday calulate
                                                 $total_driver=$holiday_price_item+$extraday_price_item+$daily_price_item;
                                                 $amount_drive +=$total_driver;
                                                $refun_driver=$row['refun_deposit'];
                                                 $total_refun_driver +=$refun_driver;

                         $htmlContent.='<tr style="height:30px;border:1px solid #000000">
                              <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">'.$i++.'</td>
                              <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">Chauffeur Rental('.$row["user_first_name"].'/'.$row["user_last_name"].')</td>';
                              

                                             
                           $htmlContent.='<td align="center" style="border:1px solid #000000;width:8%">'.$total_day_daily.' Day(s)</td>
                              <td align="center" style="border:1px solid #000000;width:5%">1</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:5%;padding-right:5px" nowrap="">$'.number_format($daily_price/$total_day_daily, 2).'</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format($row['discount'], 2).'%</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:8%;padding-right:5px" nowrap="">'.number_format($row['vat'], 2).'%</td>
                              <td align="right" style="text-align: right;border:1px solid #000000;width:5%;padding-right:5px" nowrap="">$'.number_format($daily_price_item, 2).'</td>
                              </tr>';

                               if($total_extraday>0) {

                                $htmlContent.='
                                 <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">'.$i++.'</td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Extra Day</td>
                                          <td align="center" style="padding-left:8px;width:48%;border:1px solid #000000">'.$total_extraday.' Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($extraday_price/$total_extraday, 2).'</td>
                                          
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['discount'], 2).' %</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['vat'], 2).' %</td>
                                          
                                          <td align="right" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($extraday_price_item, 2).'</td>
                                      </tr>
                                ';

                               }

                               if($total_holiday>0) {

                                $htmlContent.='
                                 <tr style="height:25px;border:1px!important">                                                                                                     
                                         <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000;">'.$i++.'</td>
                                          <td align="left" style="padding-left:8px;width:48%;border:1px solid #000000">&nbsp;&nbsp;&#126;&nbsp;Holiday(s)</td>
                                          <td align="center" style="padding-left:8px;width:8%;border:1px solid #000000">'.$total_holiday.' Day(s)</td>
                                          <td align="center" style="padding-left:8px;width:5%;border:1px solid #000000">1</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($holiday_price/$total_holiday, 2).'</td>
                                          
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['discount'], 2).' %</td>
                                          <td align="center" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">'.number_format($row['vat'], 2).' %</td>
                                          
                                          <td align="right" style="text-align: right;padding-left:8px;width:8%;border:1px solid #000000">$ '.number_format($holiday_price_item, 2).'</td>
                                      </tr>
                                ';

                               }




                              

                            }}

                              
                           $htmlContent.='<tr style="height:25px;border:0px!important">
                              <td align="left" style="padding-left:0px" colspan="4" rowspan="6">
                              <span style="font-size:11px"><b style="color:red"><u>Note</u> *</b><br> 1. Long Distance Assistance Fee (LD Assistance) will be refunded 70%, if no problem with the rented car. </span><br>
                                      <span style="font-size:12px">2. Refundable Deposit will be fully made, if no outstanding fee to be paid after the rental period</span>
                                      <br><span style="font-size:12px">3 The Refundable Deposit &amp; Long Distance Assistance Fee will be paid on your arrival to save the service charge!</span>
                              </td>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;1.Total Rental Fee:</td>';
                                      $total_rental=$amount_accessory+$amount_tour+$amount_drive +$amount_rickshaw;
                             $htmlContent.='<td align="right" style="border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($total_rental, 2).'</td>
                                      </tr><tr style="height:25px;border:0px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;2.Service Charge (3%):
                                      </td>';
                                      $total_service_char=($total_rental *3)/100;
                              $htmlContent.='<td align="right" style="border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($total_service_char, 2).'</td>
                                      </tr>';
                                    $paid=$total_service_char + $total_rental;
                                    $htmlContent.='<tr style="height:25px;border:0px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;3.Amount Paid :</td>
                                      <td align="right" style="background:#e6e6e6;border:1px solid #000000;padding-right:5px" nowrap="">$'.number_format($paid, 2).'</td>
                                      </tr>';
                                      
                                     
                                   $htmlContent.='
                                   <tr>
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;4. Refundable Deposit (RD):</td>
                                      <td align="right" style="background:#ffffff;border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;$ 
                                      '.number_format($total_due=$total_refun_rickshow+$total_refun_driver+$total_refun_tour+$total_refun_acess, 2).'
                                       </td>
                                  </tr>
                                   ';

                                      $htmlContent.='<tr style="height:25px;border:0px!important">
                                      <td align="left" colspan="3" style="border:1px solid #000000;padding-right:5px" nowrap="">&nbsp;5. Due Amount:</td>
                                      <td align="right" style="border:1px solid #000000;background:#e6e6e6;font-weight:bold;padding-right:5px" nowrap="">$'.number_format($total_due, 2).'</td>
                                      </tr>
                                      </tbody>
                          </table>
                    </td></tr></tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>';
    
            
    $to_Email_user=@$_SESSION["user"]->user_email; //Replace with recipient email address
    // $to_Email_admin       = "info@lyna-carrental.com,gma@lyna-carrental.com"; //Replace with recipient email address
    $subject        = 'Lyna-Carrental.Com - Reservation Invoice'; //Subject line for emails

   $mj = new Mailjet('0f3b76e670da893dc377982bd55f4ea4','77139ba33543dd8ca6b4de100a6e7c0d');
      $params = array(
      "method" => "POST",
      "FromEmail" => "kemun.dev@gmail.com",
      "FromName" => "info@lyna-carrental.com",
      "Subject" => "$subject",
      "Text-part" => "$subject",
      "Html-part" => "$htmlContent",
      "Recipients" =>json_decode('[{"Email":"kemun.dev@gmail.com"}]', true)
      // "Recipients" =>json_decode('[{"Email":"info@lyna-carrental.com"},{"Email":"gma@lyna-carrental.com"}]', true)
     
    );
    $result = $mj->send($params);
    if ($mj->_response_code == 200){
       // echo "success";
       // var_dump($result);
    } else {
     // echo "<pre>
     //  Dear all beloved customer, 
     //  We are very sorry to inform you that your Booking Payment is working normal. But you won't get any responding mail. 
     //  Our IT Team is stilling working on it. You may have to call us for confirmation. 
      
     //  Thank you!</pre>";
     //  exit();
     
    }

     $mj = new Mailjet('0f3b76e670da893dc377982bd55f4ea4','77139ba33543dd8ca6b4de100a6e7c0d');
  
        $params_arr = array(
            "method" => "POST",
            "from" => "kemun.dev@gmail.com",
            "to" => "$to_Email_user",
            "subject" => "$subject",
            "html" => "$htmlContent"
        );

        $result = $mj->sendEmail($params_arr);

        if ($mj->_response_code == 200) {
         // session_destroy();
         // unset($_SESSION);
         header("location: ./success.php");

        }
           
        else {
         header("location: ./error.php");
         
        }

                        //end send email



            }
                          
      }
?>
               </form>
              
            </div>
            <!-- <!— end Modal content—> -->
         </div>
      <!-- <!— End Popup Checkout Form —> -->
      <div class="container" style="margin-top: 75px;margin: 0 auto;">
         <div style="width: 200px;margin: 0 auto;">
           

            <input type="button" class="pull-right btn btn-primary" id="checkout_button" value="Checkout Now">
          
         </div>
      </div>
   <link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
   <script src="https://payway.ababank.com/checkout-popup.html?file=js"></script>
      <script>
         $(document).ready(function () {
            $('#checkout_button').click(function () {
               
               AbaPayway.checkout();

            });
         });
      </script>
      <!-- <!— Page Content —> -->
       


                   </div>

                


            </div>






      </div>
      <div class="col-md-4">

         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-right-none sm-padding-left-none md-padding-left-15 xs-padding-left-none padding-bottom-40 scroll_effect fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;margin-top: 10px;">
               
               <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                  <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><strong>Reservation</strong> Information</h4>
                  <div class="table-responsive" style="padding:10px;">
                     <table class="table no-border no-margin">
                        <tbody>
                           <tr>
                              <td>Duration : </td>
                              <td>
                                <?php
                                 if(!isset($_SESSION["richshaw_pickupdate"]))
                                    {
                                     $_SESSION["richshaw_pickupdate"]="";
                                    }
                                    else {
                                    $_SESSION["richshaw_pickupdate"];
                                    }

                                   if(!isset($_SESSION["return_pickupdate"]))
                                    {
                                     $_SESSION["return_pickupdate"]="";
                                    }
                                    else {
                                     $_SESSION["return_pickupdate"];
                                    }

                                 $date1=date_create($_SESSION["richshaw_pickupdate"]);
                                 $date2=date_create($_SESSION["return_pickupdate"]);
                                 $diff=date_diff($date1,$date2);
                                 $text_info=$diff->format("%a%")+1;

                                echo $text_duration = str_replace('+', '',$text_info).' Days';
                               
                                 ?>                           
                               </td>
                           </tr>
                           <tr>
                              <td>Pickup Date/Time : </td>
                              <td>
                                <?php
                                if(!isset($_SESSION["rickshaw_pickup_time"]))
                                    {
                                     $_SESSION["rickshaw_pickup_time"]="";
                                    }
                                    else {
                                    $_SESSION["rickshaw_pickup_time"];
                                    }
                                ?>
                                <?php
                                 echo  $_SESSION["richshaw_pickupdate"].' '. $_SESSION["rickshaw_pickup_time"];
                                ?>                             
                              </td>
                           </tr>
                           <tr>
                              <td>Return Date/Time : </td>
                              <td>
                                <?php
                                if(!isset($_SESSION["rickshaw_return_time"]))
                                    {
                                     $_SESSION["rickshaw_return_time"]="";
                                    }
                                    else {
                                    $_SESSION["rickshaw_return_time"];
                                    }
                                ?>
                                <?php
                                 echo  $_SESSION["return_pickupdate"].' '.$_SESSION["rickshaw_return_time"];
                                ?>                           
                              </td>
                           </tr>
                           <tr>
                            <td>Pickup Location : </td>
                            <td>
                              <?php
                                 if(!isset($_SESSION["location_rickshaw_pickup"])) {
                                          $location_id=""; 
                                           $sql ="SELECT * FROM tbl_province  WHERE pv_id=''";
                                          }
                                       else {
                                           $location_id=$_SESSION['location_rickshaw_pickup'];
                                            $sql ="SELECT * FROM tbl_province  WHERE pv_id IN ($location_id)";
                                           
                                    }
                                     $result = $connect->query($sql);
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()){
                              ?>

                            <?php echo $row['pv_title']; ?>

                              <?php }} ?>
                            </td>
                           </tr>

                            <tr class="hidden">
                            <td >Return Location : </td>
                            <td>
                              <?php
                                 if(!isset($_SESSION["location_return_date"])) {
                                          $return_location_id=""; 
                                           $sqls ="SELECT * FROM tbl_province  WHERE pv_id=''";
                                          }
                                       else {
                                           $return_location_id=$_SESSION['location_return_date'];
                                            $sqls ="SELECT * FROM tbl_province  WHERE pv_id IN ($return_location_id)";
                                           
                                    }
                                     $results = $connect->query($sqls);
                                        if ($results->num_rows > 0) {
                                          while($rows = $results->fetch_assoc()){
                              ?>

                            <?php //echo $rows['pv_title']; ?>

                              <?php }} ?>
                            </td>
                           </tr>
                           
                          
                        </tbody>
                     </table>
                  </div>
               </div>

               <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                            <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px; color:#810EA5;"><span style="font-weight: 800">Chauffeur</span> Info</h4>
                            <div class="table-responsive" style="padding:10px;">
                                <table class="table no-border no-margin">
                                    <tbody>
                                        <?php
                                             if(!isset($_SESSION["driver_id"])) {
                                             $driver_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $driver_id=$_SESSION['driver_id'];
                                             if($driver_id =="") {
                                              $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
                                              $driver_id=$_SESSION['driver_id'];
                                              $sql ="SELECT * FROM tbl_users  WHERE user_id IN ($driver_id)";
                                             }
                                             
                                             }
                                             
                                             $result = $connect->query($sql);
                                             if ($result->num_rows > 0) {
                                             while($row = $result->fetch_assoc()){
                                             ?>
                                          <tr style="border:0px solid #000 !important;">
                                             <td>Chauffeur Rental :</td>
                                             <td>(<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
                                          </tr>
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
            </div>

              <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                            <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px; color:#810EA5;"><span style="font-weight: 800">Tour Guide</span> Info</h4>
                            <div class="table-responsive" style="padding:10px;">
                                <table class="table no-border no-margin">
                                    <tbody>
                                        <?php
                                             if(!isset($_SESSION["tour_quide_id"])) {
                                             $tour_quide_id=""; 
                                             $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                                 }
                                             else {
                                             $tour_quide_id=$_SESSION['tour_quide_id'];
                                             if($tour_quide_id=="") {
                                              $tour_quide_id="";
                                              $sql ="SELECT * FROM tbl_users  WHERE user_id=''";
                                             }
                                             else {
                                               $tour_quide_id=$_SESSION['tour_quide_id'];
                                                $sql ="SELECT * FROM tbl_users  WHERE user_id IN ($tour_quide_id)";
                                              }
                                             }
                                             
                                             $result = $connect->query($sql);
                                             if ($result->num_rows > 0) {
                                             while($row = $result->fetch_assoc()){
                                             ?>
                                          <tr style="border:0px solid #000 !important;">
                                             <td>Tour Guide Rental :</td>
                                             <td>(<?php echo $row['user_first_name']; ?> / <?php echo $row['user_last_name']; ?>)</td>
                                          </tr>
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
            </div>
            <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                            <h4 class="margin-bottom-25 margin-top-none" style="background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px; color:#810EA5;"><span style="font-weight: 800">Accessories</span> Info</h4>
                            <div class="table-responsive" style="padding:10px;">
                                <table class="table no-border no-margin">
                                    <tbody>
                                        <?php
                                             if(!isset($_SESSION["accessory_id"])) {
                                             $accessory_id=""; 
                                             $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id=''";
                                                 }
                                             else {

                                             $accessory_id=$_SESSION['accessory_id'];
                                             if($accessory_id=="") {
                                               $accessory_id="";
                                               $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id=''";
                                             }
                                             else {
                                               $accessory_id=$_SESSION['accessory_id'];
                                              $sql ="SELECT * FROM tbl_accessories_rental  WHERE ac_id IN ($accessory_id)";
                                             }

                                             
                                             }
                                             
                                             $result = $connect->query($sql);
                                             if ($result->num_rows > 0) {
                                             while($row = $result->fetch_assoc()){
                                             ?>
                                          <tr style="border:0px solid #000 !important;">
                                             <td>Ref. No :</td>
                                             <td><?php echo $row['ac_ref_no']; ?></td>
                                          </tr>
                                          <tr style="border:0px solid #000 !important;">
                                             <td>Name :</td>
                                             <td><?php echo $row['ac_title']; ?></td>
                                          </tr>
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
            </div>
           <div class="financing_calculator margin-top-10" style="border:1px solid #ccc; border-radius:5px; ">
                            <h4 class="margin-bottom-25 margin-top-none" style="color:#810EA5;background: #ccc;margin-top: 0px; padding: 10px; font-size: 16px;"><span style="font-weight: 800">Richshaw </span> Info</h4>
                            <div class="table-responsive" style="padding:10px;">
                                <table class="table no-border no-margin">
                                    <tbody>
                                      <?php
                                       if(!isset($_SESSION["richshaw_id"])) {
                                           $richshaw_id="";
                                           $sql ="SELECT * FROM tbl_rick_shaw_rental_last   WHERE ve_id=''";
                                          
                                          }
                                       else {
                                           $richshaw_id=$_SESSION['richshaw_id'];
                           
                                            $sql ="SELECT * FROM tbl_rick_shaw_rental_last  WHERE ve_id IN ($richshaw_id)";

                                           
                                       }
         
                                        $result = $connect->query($sql);
                                        if ($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()){
                                       ?>
                                        <tr>
                                          <td>Ref. No:</td>
                                          <td><?php echo $row['ve_ref_no']; ?></td>
                                       </tr>
                                       <tr>
                                          <td>Vehicle:</td>
                                          <td><?php echo $row['ve_title']; ?> <?php echo $row['ve_year']; ?></td>
                                       </tr>
                                      
                                        <?php }} else {} ?>
                                                                            
                                    </tbody>
                                </table>
                            </div>
                     </div>








            </div>



      </div>



   </div>
 </div>
</div>

<script src="./js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<link href="./css/datepicker.css" rel="stylesheet" type="text/css" />
<?php require_once("footer.php"); ?>

<script type="text/javascript">
 $("#agree_form").submit(function(event) {
                    
                          var agree = $('#agree').val();
                          if($("#agree").is(':checked')){
                                 return true;
                               }else{
                                  $('#c_agree').css("disabled","");
                                  alert("Please Agree with Terms & Conditions First !");
                                  return false;
                              }
                                 
                      });

 $("#form_richshaw").submit(function( event ) {
            car_data = $("#identity_richshaw").val();
            if(car_data==''){
              $("#check_car").html("Please Select Rickshaw");

              return false;
            }
           
            else{
              return true;
            }
});

 // funtion check step hidden show
 $("#li_one").on("click",function(){
   $('#tap_tour').css("display","none");
   $('#tap_accessory').css("display","none");
   $('#tap_driver').css("display","none");
   $('#btn_car').css("display","none");
   $('#form_richshaw').css("display","none");

 })

 // end step hidden show
</script>
<style type="text/css">
label {
  text-transform: initial;
}
</style>