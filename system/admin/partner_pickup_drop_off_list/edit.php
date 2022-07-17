<?php 
    $menu_active =3;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
   $edit_id = $_GET["edit_id"]; 
    $query="SELECT * FROM tbl_faq WHERE fa_id='$edit_id'";
    $result = $connect->query($query);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $question=$row["question"];
        $answer=$row["answer"];
        $order_rate=$row["order_rate"];
        $status=$row["status"];
       
        }
    }
    else{}
?>

<?php 
    $edit_id = $_GET["edit_id"];
     if(isset($_POST['btn_add'])){
            $txt_q = @$connect->real_escape_string($_POST['txt_q']);
            $txt_an = @$connect->real_escape_string($_POST['txt_an']);
            $txt_order = @$connect->real_escape_string($_POST['txt_order']);
            $txt_status = @$connect->real_escape_string($_POST['txt_status']);
            $query_add = "UPDATE tbl_faq SET 
            question ='$txt_q',
            answer ='$txt_an',
            order_rate ='$txt_order',
            status ='$txt_status'
            WHERE fa_id='$edit_id'";
            if($connect->query($query_add)==TRUE){
                $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted...
                </div>';
            }else{
                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> Query error ...
                </div>'; 
                echo mysqli_error ($connect);
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

       <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">កែសម្រួល សំណូរចម្លើយ</b></h3>
                <b style="font-size: 20px;">EDIT FAQs</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល| HEAD OFFICE</b><br>
                <span> Address: Room No. 9C2 | 9th Floor</span> <br>
                <span>H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)</span><br>
                <span>Street 271 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia</span> <br>
                <span>Eng/Khm: +855 (0) 12 55 42 47 | +855 (0) 92 14 30 14 | English Speaker Only: +855 (0) 12 924 517</span><br>
                <span> Skype ID: lyna-carrental.com | Line/WhatsApp/Telegram/Viber/WeChat: (+855) 12 55 42 47 | 92 14 30 14 | 12 924 517</span><br>
                <span>E-mail: info@lyna-carrental.com | Website: www.Lyna-CarRental.Com</span>
        </center>
        </div>
     
      
   
  </div>
    

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body"style="background-color:   #800080;">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                         <div >
                          <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-3 col-sm-2 col-md-2 col-lg-2" style="color: white;font-size: 15px;">Questions:</label>
                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                  <div class="md-form mt-0">
                                    <textarea id="detail" class="form-control" name="txt_q">
                                        <?php echo $question; ?>
                                    </textarea>
                                   
                                  </div>
                                </div>
                               
                              </div>
                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-3 col-sm-2 col-md-2 col-lg-2" style="color: white;font-size: 15px;">Answers:</label>
                                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                                  <div class="md-form mt-0">
                                    <textarea id="detail" class="form-control" name="txt_an">
                                        <?php echo $answer; ?>
                                    </textarea>
                                   
                                  </div>
                                </div>
                               
                              </div>
                             <div class="form-group row" style="padding: 15px;">
                                <!-- Material input -->
                                <label for="" class="col-xs-3 col-sm-2 col-md-2 col-lg-2" style="color: white;font-size: 15px;">Order:</label>
                                <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                     <input type="text" value="<?php echo $order_rate; ?>" name="txt_order" class="form-control">
                                   
                                  </div>
                                </div>
                                <div class="col-xs-12"></div>
                                <label for="" class="col-xs-3 col-sm-2 col-md-2 col-lg-2" style="color: white;font-size: 15px;">Status:</label>
                                <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
                                  <div class="md-form mt-0">
                                    <select name="txt_status" class="form-control">
                                        <option <?php if($status=="1") {echo "selected='selected'";} ?> value="1">Show</option>
                                        <option <?php if($status=="0") {echo "selected='selected'";} ?> value="0">Hidden</option>
                                    </select>
                                    
                                    
                                   
                                  </div>
                                </div>
                               
                              </div>

                             
                             
                              
                        </div>
                        
                <!--      <div>     
                    
                    <div class="form-group row" style="padding: 15px;">
                                Material input
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

                         
                    </div>  -->


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
                        
                           

                        </div>
                    </div>
                  
                </form><br>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
  b,span{
    color: #800080;
    font-weight: 900;
  }
</style>
<?php include_once '../layout/footer.php' ?>
