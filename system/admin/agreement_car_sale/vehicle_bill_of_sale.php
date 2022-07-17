<?php
 include_once '../../config/database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Moul&display=swap" rel="stylesheet">
</head>
<body>
<?php
			$id=$_GET['id'];
	         $v_sql = "SELECT * FROM tbl_car_sale
              INNER JOIN tbl_users
              ON tbl_car_sale.customer_id=tbl_users.user_id
              INNER JOIN tbl_vehicle_rantal
              ON tbl_car_sale.car_id=tbl_vehicle_rantal.ve_id
              INNER JOIN tbl_owner_list
              ON tbl_car_sale.car_owner_id=tbl_owner_list.ow_id
              LEFT JOIN tbl_user_agreement
              ON tbl_users.user_id=tbl_user_agreement.customer_id
              WHERE tbl_car_sale.car_sale_id='$id' AND status='2'
              ";
    $result = $connect->query($v_sql);
      if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
	?>
	<div class="col-lg-12">
		<div class="row">

			<!-- top -->
			<div class="col-lg-12" style="text-align: center;">
				<img src="top.PNG">
			</div>

			<div class="container">
				<div class="col-lg-12">
					<label style="color: #03a9f4; font-family: 'Moul', cursive;">ពត៍មានអ្នកលក់ <span style="font-family: 'Montserrat', sans-serif;">VENDOR'S INFORMATION</span></label>
				</div>
				<div class="col-lg-12" style="border:1px solid #ccc; padding: 10px;">
					<label>នាមនិងគោត្តនាម:</label>
					<input type="text" name="" value="<?php echo $row['ow_name']; ?>" style="margin-left: 26px; width: 365px;">

					<label style="margin-left: 20px;">ភេទ:</label>
					<input type="text" name="" value="<?php echo $row['owner_sex']; ?>" style="margin-left: 10px; width: 100px;">
					<label style="margin-left: 20px;">អាយុ:</label>
					<input type="text" name="" value="<?php echo $row['owner_age']; ?>" style="margin-left: 10px; width: 100px;"><br>
					<label>មុខងារបច្ចុប្បន្ន:</label>
					<input type="text" name="" value="<?php echo $row['own_title']; ?>" style="margin-left: 40px; width: 714px;"><br>
					<label>អង្គភាពឬក្រុមហ៊ុន:</label>
					<input type="text" name="" value="<?php echo $row['owner_organization']; ?>" style="margin-left: 18px; width: 713px;"><br>
					<label>អស័យដ្ឋាន:</label>
					<input type="text" name="" value="<?php echo $row['owner_address']; ?>" style="margin-left: 66px; width: 712px;">
					<br>
					<label>លិខិតឆ្លងដែន ឬ ID:</label>
					<input type="text" name="" value="<?php echo $row['own_card']; ?>" style="margin-left: 10px; width: 382px;">
					<label>សញ្ជាតិ:</label>
					<input type="text" name="" value="<?php echo $row['owner_nationality']; ?>" style="margin-left: 10px; width: 255px;">
					<br>
					<label>ទូរស័ព្ទចល័តលេខ:</label>
					<input type="text" name="" value="<?php echo $row['hand_phone']; ?>" style="margin-left: 22px; width: 383px;">
					<label>អ៉ីម៉ែល:</label>
					<input type="text" name="" value="<?php echo $row['owner_email']; ?>" style="margin-left: 10px; width: 253px;">
				</div>
				<br>
				<div class="col-lg-12">
					
					<label style="color: #03a9f4; font-family: 'Moul', cursive;">ពត៍មានរថយន្ដ <span style="font-family: 'Montserrat', sans-serif;">VEHICLE'S INFORMATION</span></label>
				</div>
				<div class="col-lg-12" style="border:1px solid #ccc; padding: 10px;">
					<label>ឆ្នាំផលិត
						<span style="font-family: 'Montserrat', sans-serif;"> Year</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_year']; ?>" style="margin-left: 80px;">

					<label>លេខតួ
						<span style="font-family: 'Montserrat', sans-serif;"> Frame No</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['frame']; ?>" style="margin-left: 84px;">

					<br>

					<label>ម៉ាក
						<span style="font-family: 'Montserrat', sans-serif;"> Make</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_make']; ?>" style="margin-left: 99px;">
					<label>សាក់ស៊ី
						<span style="font-family: 'Montserrat', sans-serif;"> Chassis No</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['chassis_no']; ?>" style="margin-left: 68px;">

					<br>

					<label>ម៉ូដែល
						<span style="font-family: 'Montserrat', sans-serif;"> Model</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_model']; ?>" style="margin-left: 77px;">
					<label>លេខម៉ាស៊ីន
						<span style="font-family: 'Montserrat', sans-serif;"> Engine No</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['engine_no']; ?>" style="margin-left: 48px;">

					<br>

					<label>ម៉ូដែលបន្ទាប់
						<span style="font-family: 'Montserrat', sans-serif;"> Sub-model</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_sub_model']; ?>" style="margin-left: 5px;">
					<label>ចំនួនភ្លៅ
						<span style="font-family: 'Montserrat', sans-serif;"> No of Axles</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_no_of_axles']; ?>" style="margin-left: 65px;">				
					<br>

					<label>ប្រភេទ
						<span style="font-family: 'Montserrat', sans-serif;"> Type</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_vehical_type']; ?>" style="margin-left: 88px;">
					<label>ចំនួនស៊ីឡាំង
						<span style="font-family: 'Montserrat', sans-serif;"> No of Cylinders</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_cylinders_disp']; ?>" style="margin-left: 10px;">

					<br>

					<label>ពណ៍
						<span style="font-family: 'Montserrat', sans-serif;"> Color</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_color']; ?>" style="margin-left: 96px;">
					<label>ទំហំស៊ីឡាំង
						<span style="font-family: 'Montserrat', sans-serif;"> Cylinder Size</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['cylinder_size']; ?>" style="margin-left: 29px;">

					<br>

					<label>កម្លាំង
						<span style="font-family: 'Montserrat', sans-serif;"> Horse Power</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['ve_horse_pow']; ?>" style="margin-left: 36px;">
					<label>ផ្លាកលេខ
						<span style="font-family: 'Montserrat', sans-serif;">  Plaque No</span>:
					</label>
					<input type="text" name="" value="<?php echo $row['placque_no']; ?>" style="margin-left: 65px;">					
				</div>				

				<br>
				<div class="col-lg-12">					
					<label style="color: #03a9f4; font-family: 'Moul', cursive;">ពត៍មានអ្នកទិញ <span style="font-family: 'Montserrat', sans-serif;">BUYER'S INFORMATION</span></label>
				</div>
				<div class="col-lg-12" style="border:1px solid #ccc; padding: 10px;">
					<label>នាមនិងគោត្តនាម:</label>
					<input type="text" name="" value="<?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?>" style="margin-left: 26px; width: 365px;">

					<label style="margin-left: 20px;">ភេទ:</label>
					<input type="text" name="" value="<?php echo $row['user_gender']; ?>" style="margin-left: 10px; width: 100px;">
					<label style="margin-left: 20px;">អាយុ:</label>
					<input type="text" name="" value="<?php $date_ag=$row['user_birthday']; echo floor((time() - strtotime("$date_ag")) / (60*60*24*365)); ?>" style="margin-left: 10px; width: 100px;"><br>
					<label>មុខងារបច្ចុប្បន្ន:</label>
					<input type="text" name="" value="<?php echo $row['user_title']; ?>" style="margin-left: 40px; width: 714px;"><br>
					<label>អង្គភាពឬក្រុមហ៊ុន:</label>
					<input type="text" name="" value="<?php echo $row['user_origination']; ?>" style="margin-left: 18px; width: 713px;"><br>
					<label>អស័យដ្ឋាន:</label>
					<input type="text" name="" value="<?php echo $row['user_address']; ?>" style="margin-left: 66px; width: 712px;">
					<br>
					<label>លិខិតឆ្លងដែន ឬ ID:</label>
					<input type="text" name="" value="<?php echo $row['passport_no']; ?>" style="margin-left: 10px; width: 382px;">
					<label>សញ្ជាតិ:</label>
					<input type="text" name="" value="<?php echo $row['nation_lity']; ?>" style="margin-left: 10px; width: 255px;">
					<br>
					<label>ទូរស័ព្ទចល័តលេខ:</label>
					<input type="text" name="" value="<?php echo $row['user_phone_number']; ?>" style="margin-left: 22px; width: 383px;">
					<label>អ៉ីម៉ែល:</label>
					<input type="text" name="" value="<?php echo $row['user_email']; ?>" style="margin-left: 10px; width: 253px;">
				</div>

				
				<br>				

				<!-- Description at footer -->
				<div class="footer_des">
					<label style="font-weight: bold;">សន្យា:</label>
					<p>&nbsp;&nbsp;&nbsp;
						ខ្ញុំបាទ/នាងខ្ញុំ សូមសន្យាចំពោះមុខច្បាប់ថា រថយន្ដខាងលើ ពិតជារថយន្ដរបស់ខ្ញុំបាទ/នាងខ្ញុំពិតប្រាកដមែន ផ្ទុយទៅវិញ បើមានជនណាអះអាងថាជារថយន្ដរបស់គាត់ នោះខ្ញុំបាទ/នាងខ្ញុំ សូមតទល់និងធានាអះអាងជំនួយចំពោះមុខច្បាប់ និងតុលាការ។
					</p>
				
				</div>		

				<div class="footer_des">
					<label style="font-weight: bold; float: left;">អធិប្បាយនិងធានា: </label>
					<p style="float: left;">&nbsp;&nbsp;&nbsp;ខ្ញុំបាទ/នាងខ្ញុំ រថយន្ដខាងលើ មានគ្រប់ឯកសារពាក់ព័ន្ធទាំងអស់ ដូចជា: 1. ពន្ធនាំចូល (មាន|មិនមាន), 2. ពន្ធផ្លូវប្រចាំឆ្នាំ (មាន|មិនមាន), 3.​ វិញ្ញាបនប័ត្រត្រួតពិនិត្យលក្ខណៈបច្ចេកទេសបច្ចេកទេសយានយន្ដ និង 4. កាតគ្រី (កាតសំគាល់យានយន្ដ) ។ រថយន្ដនេះលក់ក្នុងលក្ខណៈ និងសភាពបច្ចុប្បន្ន មិនមានការធានាអ្វីទាំងអស់! បង់ប្រាក់ហើយមិនអាច ដូរយកប្រាក់វិញបានឡើយ!
					</p>
				</div>
				<!-- end description -->
				
				<br>

				<!-- singular -->
				<div style="width: 100%;padding-left: 0px;font-size: 14px; margin-left: 30px; font-family: 'Battambang', cursive;">
                        <div style="width: 15%;font-weight: bold;text-align: center;float: left;">
                           ស្នាមមេដៃស្ដាំអ្នកទិញ 
                           <br><br><br><br><br><br><br>
                           <span style="color:#ccc; margin-top: 20px; margin-left: -13px;">___________________</span>
                           <span style="color: blue !important;display: block;margin-top: -1px;">
                           	<?php echo $row['name_buyer']; ?>
                           </span>
                        </div>
                        <div style="width: 22%;font-weight: bold;text-align: center;float: left;margin-left: 60px;">
                           ស្នាមមេដៃស្ដាំសាក្សីអ្នកទិញ 
                           <br><br><br><br><br><br><br>
                           <span style="color:#ccc;">___________________</span>
                           <span style="color: blue !important;display: block;margin-top: -1px;">
                           	 <?php echo $row['buyer_witness']; ?>
                           </span>
                        </div>
                        <div style="width: 22%;font-weight: bold;text-align: center;float: left;">ស្នាំមេដៃស្ដាំអ្នកទិញសាក្សីអ្នកលក់
                        	<span style="color:blue !important;">
                        		
                        	</span> <br><br><br><br><br><br><br>
                        	<span style="font-weight: 100 !important;color:#ccc;">___________________</span>
                        	<span style="color: blue !important;display: block;margin-top: -1px;">
                        		<?php echo $row['seller_witness']; ?>
                        	</span>
                        </div>
                        <div style="width: 27%;font-weight: bold;text-align: center;float: left;">
                           ធ្វើនៅថ្ងៃទី​​ <?= date('d')?> ខែ <?= date('m')?> ឆ្នាំ <?= date('Y')?>
                          	<br>
                           <span style="">
                           		ស្នាមមេដៃអ្នកលក់
                           </span> 
                           <br><br><br><br><br><br>
                           <span style="font-weight: 100 !important;color:#ccc;">___________________</span>
                           <span style="color: blue !important;display: block;margin-top: -1px;">
                           	 <?php echo $row['name_owner']; ?>
                           </span>
                        </div>
                </div>
                <!-- end singular -->

			</div>
		</div>
	</div>
<?php }} ?>
</body>
</html>
<style type="text/css">
	.footer_des
	{
		width: 100%;	
		font-size: 13px;	
		word-wrap: break-word;
		line-height: 17px;
		font-family: 'Content', cursive;	
	}	
	div label
	{
		font-family: 'Battambang', cursive;
	}
	@media print
	{
		.t
		{
			float: left;
		}
	}
	.t
	{
		float: left;
		width: 100%;
	}
	input
	{
		border: 1px solid #ccc;
		border-top: 0px;
		border-right: 0px;
		border-left: 0px;
		outline: none;
		text-align: left;	
		width: 240px;
	}
</style>

<script type="text/javascript">
window.print();
</script>