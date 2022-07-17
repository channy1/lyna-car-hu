<?php 
    $menu_active =13;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
    $edit_id = $_GET["id"]; 
    $bonus_amount =  ''; 
    $amount = ''; 
    $query="SELECT * FROM tbl_bonus where id=". $edit_id;
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
            $amount = $row["amount"];
            $bonus_amount =$row['bonus_amount'];
        }
    }
?>
<?php    
    if(isset($_POST['btn_edit'])){
        $amount = trim($connect->real_escape_string(@$_POST['txt_amount']));
        $bonus_amount = trim($connect->real_escape_string(@$_POST['txt_bonus_amount']));

        $query = "UPDATE tbl_bonus SET amount='". $amount ."', bonus_amount='". $bonus_amount."' WHERE id = ". $edit_id ;
        if($connect->query($query)==TRUE){
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
            <h2><i class="fa fa-plus-circle fa-fw"></i> Customer Bonus Control Panel</h2>
        </div>
    </div>
    
    <br>
    <br>

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Customer Bonus Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size: 15px;" class="col-xs-12 col-md-3 col-sm-3 col-lg-2">Expense Amount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Amount...</span>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <input type="text" class="form-control" name="txt_amount" placeholder="Enter Amount"  autocomplete="off" style="background-color: white;padding: 10px;border-radius: 5px !important;" required value="<?php echo $amount; ?>" >
                                   </div>
                                </div>
                            </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group form-md-line-input">
                                     <label style="color:white; font-size: 15px;" class="col-xs-12 col-md-3 col-sm-3 col-lg-2">Bonus Amount
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <span class="help-block">Enter Bonus Amount...</span>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" class="form-control" name="txt_bonus_amount" placeholder="Enter Bonus Amount"  autocomplete="off" style="background-color: white;padding: 10px;border-radius: 5px !important;" value="<?php echo $bonus_amount; ?>" required>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-7">
                                <button type="submit" name="btn_edit" class="btn blue circle"><i class="fa fa-file fa-fw"></i> Save</button>
                                <button type="reset" class="btn yellow circle"><i class="fa fa-eraser fa-fw"></i> Reset</button>
                                <a href="index.php" class="btn red circle"><i class="fa fa-undo fa-fw"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.tab-active {
      background-color: #a4509f;
       color: white;
}
</style>
<?php include_once '../layout/footer.php' ?>
