<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
	$services= @$_GET['services'];
	if($services=="")
	{
		$services= 1; 
	}
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON 
					tbl_package_detail.package_id=tbl_posting_package.id where tbl_posting_package.group_id=".$services." and tbl_package_detail.p_id='$edit_id'";

   $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
       $package_id=$row['package_id'];
	    $member_type=$row['member_type'];
		$qty_posting=$row['qty_posting'];
       $trial=$row['trial'];
       $period=$row['period'];
       $qty=$row['qty'];
       $price=$row['price'];
       $discount=$row['discount'];
       $package_disc =$row['package_disc'];
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_add'])){
         
            
            $package_id = @$connect->real_escape_string($_POST['package_id']);
			 $member_type = @$connect->real_escape_string($_POST['member_type']);
			   $qty_posting = @$connect->real_escape_string($_POST['qty_posting']);
            $trial = @$connect->real_escape_string($_POST['trial']);
            $period = @$connect->real_escape_string($_POST['period']);
            $qty = @$connect->real_escape_string($_POST['qty']);
            $price = @$connect->real_escape_string($_POST['price']);
			$total = $qty*$price;
            $discount = @$connect->real_escape_string($_POST['discount']);
            $mydescount = $total*$discount/100;
			$net_pay= $total-$mydescount; 
            $date = time();
            $package_disc = @$connect->real_escape_string($_POST['package_disc']);  
            $query_add = "UPDATE tbl_package_detail SET 
            package_id='$package_id',
			member_type='$member_type',
			qty_posting='$qty_posting',
            trial='$trial',
            period='$period',
            qty='$qty',
			 price='$price',
			  total='$total',
			   discount='$discount',
			    net_pay='$net_pay',				
            package_disc='$package_disc'
            WHERE p_id='$edit_id'";
			
            if($connect->query($query_add)==TRUE){
				header("Location: index.php?services=".$services);
				//echo 'hello'; die; 
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error '.mysqli_error($connect).'...
                </div>';   
            }
    }

 ?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i>Create Record</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="index.php?services=<?=$services?>" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back

            </a>
        </div>
    </div>

     <div style=" border: solid; border-right: 0; border-left: 0; border-top: 0;">
        <div class="text-center" style="float: left; "><img src="lyna.jpg" style="width: 150px;height: 150px;"></div>
        <div style="text-align: center; width: 100%;margin-left: -50px;">
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> កែសម្រួល គ្រឿងជួល</b><br>
                <b style="font-size: 20px;color:#2F05A5"> EDIT ACCESSORIES RENTAL</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល / Head Quarter:</b><br>
                E-mail:%20info@lyna-carrental.com , skype:Skype: lyna-carrental.com<br>
               <h5 style="padding-left: 65px;">  tel:Cambodian: +855 (0)12 55 42 47 , tel:English: +855 (0)12 92 45 17 , tel:Booking: +855 (0)92 14 30 14</h5>
        </div>
        <div class="row">
             <div class="col-xs-4 col-sm-4 col-md-4">
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">

             </div>
        </div>
    </div>

     <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
               
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Packages Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Packages...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <select name="package_id" class="form-control" required>
									<option value="">Please select</option>
									<?php   $v_sql2 = "SELECT *  FROM tbl_posting_package where group_id=".$services;
                        $result2 = $connect->query($v_sql2);
                      
                        if ($result2->num_rows > 0) {                              $i=1;
                             
                            while($row2 = $result2->fetch_assoc()){ ?>
                                        <option value="<?php echo $row2['id']; ?>"  <?php if($row2['id']== $package_id) { echo "selected='selected'";  } ?>><?php echo $row2['package_name']; ?></option>
						<?php } } ?>
                                        
                                    </select>
                                   </div>
                                </div>
                            </div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Membership Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Packages...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <select name="member_type" class="form-control" required>
									<option value="">Please select</option>
									
                                        <option value="1"  <?php if($member_type== 1) { echo "selected='selected'";  } ?>>SILVER</option>
										<option value="2" <?php if($member_type== 2) { echo "selected='selected'";  } ?>>PLATINUM</option>
										<option value="3" <?php if($member_type== 3) { echo "selected='selected'";  } ?>>GOLD</option>
										<option value="4" <?php if($member_type== 4) { echo "selected='selected'";  } ?>>DIAMOND</option>
						                <option value="0" <?php if($member_type== 0) { echo "selected='selected'";  } ?>>NO NEED</option>
                                        
                                    </select>
                                   </div>
                                </div>
                            </div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">QTY POSTING
                                        <span class="required" aria-required="true">*</span>
                                    </label>                                   
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="qty_posting"  value="<?=$qty_posting?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                                   </div>
                                </div>
                            </div>
							  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Trial
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Try...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="trial" value="<?=$trial?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                                   </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	  <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Qty
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Name...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="qty" value="<?=$qty?>" placeholder="Qty"  autocomplete="off" style="background-color:white;" required>
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                	  <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Period
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Name...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="period" value="<?=$period?>" placeholder="Period"  autocomplete="off" style="background-color:white;" required>
                                  </div>
                                </div>
                            </div>
                           
                             <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Price
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Price...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="price" value="<?=$price?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                                   </div>
                                </div>
                            </div>

                            
                             <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Dicount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Discount...</span>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" name="discount" value="<?=$discount?>" placeholder=""  autocomplete="off" style="background-color: white;" required>
                                   </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                	 <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Description
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Description...</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <textarea id="detail" name="package_disc" class="detail"><?=$package_disc?></textarea>
                                   
                                   </div>
                                </div>
                            </div>
                           
                            
                        
                            
                        </div>
                    </div>
				   <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="../../plugin/ckeditor_4.7.0_full/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'detail', {
        language: 'en',
      height: '200'
        // uiColor: '#9AB8F3'
    });
</script>

<style type="text/css">
.form-group.form-md-line-input .form-control {
    background: white;
}
</style>


<?php include_once '../layout/footer.php' ?>
