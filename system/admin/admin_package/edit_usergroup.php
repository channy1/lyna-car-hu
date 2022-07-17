<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_usergroup WHERE id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
       $group_name=$row['group_name'];
	    $group_type=$row['group_type'];
       $group_disc=$row['group_disc'];
       
      
        }
    }
    else{}
?>

<?php 
    
    if(isset($_POST['btn_add'])){
         
            
            
            $group_name = @$connect->real_escape_string($_POST['group_name']);
			$group_type = @$connect->real_escape_string($_POST['group_type']);
            $group_disc = @$connect->real_escape_string($_POST['group_disc']);
           
            $query_add = "UPDATE tbl_usergroup SET 
            group_name='$group_name',
			group_type='$group_type',
            group_disc='$group_disc'                     
            WHERE id='$edit_id'";
            if($connect->query($query_add)==TRUE){
				header("Location: usergroup.php");
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
            <h2><i class="fa fa-plus-circle fa-fw"></i>Update Record</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="usergroup.php" id="sample_editable_1_new" class="btn red"> 
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
                                	  <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Package Name
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Name...</span>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="group_name" placeholder="Enter Name" value="<?php echo $group_name; ?>"  autocomplete="off" style="background-color:white;" required>
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size:15px;" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Group type
                                        <span class="required" aria-required="true">*</span>
                                    </label>                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <select name="group_type" class="form-control" required>
									<option value="">Please select</option>
								
                                        <option value="1" <?php if($group_type== 1) { echo "selected='selected'";  } ?>>Partner</option>
										 <option value="2"  <?php if($group_type== 2) { echo "selected='selected'";  } ?>>Customer</option>
					
                                        
                                    </select>
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
                                        <textarea id="detail" name="group_disc" class="detail"> <?php echo $group_disc; ?></textarea>
                                   
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
      height: '300'
        // uiColor: '#9AB8F3'
    });
</script>

<style type="text/css">
.form-group.form-md-line-input .form-control {
    background: white;
}
</style>


<?php include_once '../layout/footer.php' ?>
