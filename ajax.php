<?php 
  
   require_once("./system/config/database.php");
 
?>

<?php
$id=0;
$id=$_POST['id'];
$sql ="SELECT * FROM tbl_province_detail AS A LEFT JOIN tbl_province AS B ON B.pv_id=A.pl_pro_id  WHERE pl_pro_id='$id'";
 $result = $connect->query($sql);
 if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$id_check=$row['pl_id'];
?>
                 <div class="row" style="border: 2px solid #ccc;border-radius: 5px;width: 99%;padding: 17px;margin-left: 1px;margin-top: 10px;margin-bottom: 5px;">
		                  <div class="col-md-3">
		                  <img src="system/admin/image/province_detail/<?php echo $row["pl_image"];?>" class="preview">
		                  </div>
		                  <div class="col-md-6">
		                  <ul>
		                  <li style="list-style: none;"><label>Price :<span><?php echo $row["pl_price"]; ?>$</span></label></li>
		                  <li style="list-style: none;"><label>Distance :<span><?php echo $row["pl_distance"];?></span></label></li>
		                  <li style="list-style: none;"><label>Province/City :<span><?php echo $row["pv_title"];?></span></label></li>
		                  </ul>
		                  </div>
		                  <div class="col-md-3">
		                  <span style="position: absolute;float: left;">Tick the Box</span>
		                  <input  type="checkbox" name="tick" class="checkbox input-checkbox" onclick="addEquipment(<?php echo $id_check;?>)" id="equipment_<?php echo $row['pl_id'];?>" style="float: right;">
		                  <br>
		                  <span>Qantity :</span>
		                  <input class="form-control" readonly type="text"  name="equipment_<?php echo $row['pl_id'];?>" value="" id="number_equipment_<?php echo $row['pl_id'];?>">
		                  </div>
                 </div>
                
             <script type="text/javascript">
             	 function addEquipment(index){
			         
			            var id=$('#identity_equipment').val();
			            var arrays = id.split(',');
			            for(var j=0;j<arrays.length;j++) {//calculate record row
			              if(arrays[j] == index) arrays.splice(j,1);
			              if(document.getElementById('equipment_'+index).checked){
			                if(($("#identity_equipment").val())!="") {
			                  $("#identity_equipment").val(id+','+index);
			                }else { 
			                  $("#identity_equipment").val(index);
			                }
			               // $("#number_equipment_"+index).removeAttr("readonly");
			                $("#number_equipment_"+index).val(1);
			               }else{
			                 //alert(index);
			                var strings = arrays.join(',');
			                $('#identity_equipment').val(strings);
			                $("#number_equipment_"+index).val("");
			                //$("#number_equipment_"+index).attr("readonly", true);
			              }
			            }
			          }

			    
             </script>

<?php }}

  else {
  	echo "No entries found";
  }
 ?>   

