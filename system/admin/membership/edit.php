
<?php
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';

    $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_membership WHERE id='$edit_id'";
    $record = $connect->query($query);
    if ($record->num_rows > 0) {
    while($r = $record->fetch_assoc()){
        $membership_type = $r["membership_type_id"];
        $price = $r["price"];
        $trial = $r["trial"];
        $period = $r["period"];
        $discount = $r["discount"];
        $num_pay = $r["num_pay"];
        }
    }
    $sql_membersihp_type = "SELECT * FROM tbl_membership_type";
    $result = $connect->query($sql_membersihp_type);

    $type = $_GET['type'];
    $membership_type_id = 1; 
    $title = "Car's Owner"; 
    if(isset($_GET['type'])){
        if($type == 'car_owner'){
            $membership_type_id = 1; 
            $title = "Car's Owner";  
        }else if($type == 'rickshaw_owner') {
            $membership_type_id = 2; 
            $title = "Rickshaw's Owner";
        }else if($type == 'hotel_guesthouse'){
            $membership_type_id = 3; 
            $title = "Hotel & Guesthouse"; 
        }else if($type == 'tour_guide'){
            $membership_type_id = 4; 
            $title = "Tour Guide"; 
        } else if($type == 'driver'){
            $membership_type_id = 5; 
            $title = "Driver"; 
        }else if($type == 'introducer'){
            $membership_type_id = 6;
            $title = "Introducer"; 
        } 
    }
if(isset($_POST['btn_save'])){
    $membership_type = @$connect->real_escape_string($_POST['membership_type']);
    $membership_type = explode(':', $membership_type);
    $txt_trial = @$connect->real_escape_string($_POST['txt_trial']);
    $txt_period = @$connect->real_escape_string($_POST['txt_period']);
    $txt_price = @$connect->real_escape_string($_POST['txt_price']);
    $txt_dis = @$connect->real_escape_string($_POST['txt_dis']);
    $txt_num_pay = @$connect->real_escape_string($_POST['txt_num_pay']);

    $query_edit = "UPDATE tbl_membership SET 
        membership_type_id='$membership_type[0]',
        membership_type_description='$membership_type[1]',
        price='$txt_price',
        trial='$txt_trial', 
        period='$txt_period', 
        discount = '$txt_dis',
        num_pay = '$txt_num_pay'
        WHERE id='$edit_id'";

        if($connect->query($query_edit)==TRUE){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted...
            </div>';
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>';   
        }
}
?>

<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            <h2><i class="fa fa-plus-circle fa-fw"></i><?php echo $title; ?> Membership CONTROL PANEL</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="index.php?type=<?php  echo $type ; ?>" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?> Membership Input Information</h3>
            </div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <select name="membership_type" id="membership_type" class="form-control" required>
                                        <option value="">&nbsp;</option>
                                        <?php   
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()){
                                                    $selected = ''; 
                                                    if($row['id'] == $membership_type){
                                                        $selected = 'selected'; 
                                                    }
                                                    echo "<option value=".$row['id'].":". $row['description']." $selected>".$row['description']."</option>"; 
                                                }  
                                            }
                                        ?>
                                    </select>
                                    <label>Membership Type
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" value="<?php echo $trial; ?>" name="txt_trial" placeholder="Enter Trial"  autocomplete="off">
                                    <label>Trial</label>
                                    <span class="help-block">Enter Trial</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" value="<?php echo $period; ?>" name="txt_period" placeholder="Enter Period"  autocomplete="off">
                                    <label>Period</label>
                                    <span class="help-block">Enter Period</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" onChange="calPayment()"  value="<?php echo $price; ?>" name="txt_price"  id="txt_price" placeholder="Enter Price" required  autocomplete="off">
                                    <label>Price  <span class="required" aria-required="true">*</span> </label>
                                    <span class="help-block">Enter Price</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" onChange="calPayment()" value="<?php echo $discount; ?>" name="txt_dis"  id="txt_dis" placeholder="Enter Dis. %"   autocomplete="off">
                                    <label>Dis. %	</label>
                                    <span class="help-block">Enter Dis. %	</span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group form-md-line-input">
                                    <input type="text" class="form-control" value="<?php echo $num_pay; ?>" id="txt_num_pay" name="txt_num_pay" placeholder="Enter N. Pay"  autocomplete="off">
                                    <label>N. Pay	</label>
                                    <span class="help-block">Enter N. Pay	</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="btn_save" class="btn blue"><i class="fa fa-plus fa-fw"></i>Save</button>
                                <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                <a href="index.php?type=<?php echo $type; ?>" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
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
    function calPayment(){
       var num_pay = 0; 
       var price = document.getElementById("txt_price").value; 
       var dicount = document.getElementById("txt_dis").value;
       if(price == '' || dicount == '') return ; 
       num_pay = parseFloat(price) - (parseFloat(price) * parseFloat(dicount) / 100 );
       document.getElementById("txt_num_pay").value = num_pay; 
       
    }
</script>


<?php include_once '../layout/footer.php' ?>
