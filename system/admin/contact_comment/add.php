<?php 
    $menu_active =3;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php 
  if(isset($_POST['btn_add'])){
    
            $txt_infor = @$connect->real_escape_string($_POST['txt_infor']);
            $query_add = "INSERT INTO tbl_contact_information(
                     `description`
                    ) VALUES(
                     '$txt_infor'
                    )";
            if($connect->query($query_add)){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>'; 
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> '.mysqli_error($connect).'...
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
            <a href="index.php" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>
    <div class="portlet-body" style="margin-top: -15px;">
        <div class="panel panel-primary">
            <div class="panel-heading" style="color: #fff;background-color:#767676;border-color: #337ab7;margin-bottom: -14px;">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                         <div style="background-color:#CDCDCD;">
                          <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2">INFORMATION:</label>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                  <div class="md-form mt-0">
                                    <textarea id="detail" class="form-control" name="txt_infor">
                                    </textarea>
                                   
                                  </div>
                                </div>
                               
                              </div>
                             
                             
                              
                        </div>
                        
                     <div style="background-color:#CDCDCD;">     
                    
                    <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></label>
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                   
                                  </div>
                                </div>
                                 <div style="background-color:#959595 !important;color: white;width: 50%;float: right;padding: 10px;">
                               
                                 
                                  <div style="width: 47%;float: right;"> <button type="reset" style="background: none;border: none;font-size: 18px;">Clear</button></div>
                                  <div style="width: 15%;float: right;"> <button type="submit" name="btn_add" style="background: none;border: none;font-size:18px;">Add</button></div>
                                
                              </div>
                    </div>

                         
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
      height: '700'
        // uiColor: '#9AB8F3'
    });

</script>

<style type="text/css">
.form-group {
    margin-bottom:0px;
}
</style>
<?php include_once '../layout/footer.php' ?>
