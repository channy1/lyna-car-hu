<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST["btn_add"])) { 
     $txt_receipt_no = @$connect->real_escape_string($_POST['txt_receipt_no']);
     $txt_pay_form = @$connect->real_escape_string($_POST['txt_pay_form']);
     $txt_pay_word = @$connect->real_escape_string($_POST['txt_pay_word']);
     $txt_return_deposit = @$connect->real_escape_string($_POST['txt_return_deposit']);
     $txt_pay_cash_cheque = @$connect->real_escape_string($_POST['txt_pay_cash_cheque']);
      $id=$_GET['id'];
       $query_add = "UPDATE tbl_agreement SET 
            recipt_no ='$txt_receipt_no',
            pay_for = '$txt_pay_form',
            pay_word='$txt_pay_word',
            return_deposit='$txt_return_deposit',
            pay_cash_cheque='$txt_pay_cash_cheque'
            WHERE ag_id='$id'";
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

    <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">បញ្ជូល RECEIPT</b></h3>
                <b style="font-size: 20px;">​​​​​​​​​​ADD RECEIPT</b><br><br>
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
            <div class="panel-body">
                 <form action="#" method="post" enctype="multipart/form-data">
                   
                    <div class="form-body">
                       <div class="form-group row">
                      <center>Make Receipt</center>
                       
                      </div><br>
                      <?php
                          $id=$_GET['id'];
                         $v_sql = "SELECT * FROM tbl_agreement
                          LEFT JOIN tbl_users
                          ON tbl_users.user_id=tbl_agreement.user_id
                          LEFT JOIN tbl_user_agreement
                          ON tbl_agreement.user_id=tbl_user_agreement.customer_id
                          LEFT JOIN tbl_vehicle_rantal
                          ON tbl_agreement.car_id=tbl_vehicle_rantal.ve_id
                          WHERE tbl_agreement.ag_id='$id'
                          ORDER BY tbl_agreement.ag_id DESC";
                          $result = $connect->query($v_sql);
                           if ($result->num_rows > 0) {
                             while($row = $result->fetch_assoc()) {

                      ?>

                    

                        <div class="row">
                           <div class="col-md-12">
                                 <div class="panel panel_custom" style="padding:10px;">
                                   
                                     <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Receipt N&deg;</label>
                                          <div class="col-sm-3">
                                             <input readonly type="text" value="<?php echo 'REC-'.date("Ymd").''.rand(10,10000); ?>" name="txt_receipt_no"  class="form-control">
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Agreement N&deg;</label>
                                          <div class="col-sm-3">
                                             <input readonly type="text" value="<?php echo $row['ag_ref_no']; ?>"   name="txt_agreement_no"  class="form-control">
                                          </div>
                                    </div>
                                     <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Pay for</label>
                                          <div class="col-sm-3">
                                             <input value="<?php echo $row['pay_for']; ?>" type="text" name="txt_pay_form"  class="form-control">
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Customer Name</label>
                                          <div class="col-sm-3">
                                             <input type="text" value="<?php echo $row['user_first_name']; ?> <?php echo $row['user_last_name']; ?>" readonly name="txt_cus_rep_name"  class="form-control">
                                          </div>
                                    </div>

                                     <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Total Net Pay</label>
                                          <div class="col-sm-3">
                                             <input readonly value="$<?php echo $row['ag_total_net_pay']; ?>" type="text" name="txt_total_net_pay"  class="form-control">
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Total Pay In World</label>
                                          <div class="col-sm-3">
                                             <input value="<?php echo $row['pay_word']; ?>" type="text" name="txt_pay_word"  class="form-control">
                                          </div>
                                    </div>

                                    <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Pay By</label>
                                          <div class="col-sm-3">
                                             <input <?php if($row['pay_cash_cheque']=="1") {echo "checked";} ?> type="checkbox" value="1" name="txt_pay_cash_cheque" >&nbsp;&nbsp;Cash&nbsp;&nbsp;&nbsp;&nbsp;
                                             <input <?php if($row['pay_cash_cheque']=="2") {echo "checked";} ?> type="checkbox" value="2" name="txt_pay_cash_cheque">&nbsp;&nbsp;Cheque
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Return Deposit</label>
                                          <div class="col-sm-3">
                                            <input value="<?php echo $row['return_deposit']; ?>" type="text" name="txt_return_deposit"  class="form-control">
                                          </div>
                                    </div>
                                    
                                </div>
                           </div>
                            <div class="col-md-12">
                              <div class="panel panel_custom" style="padding:10px;">
                                   <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Ref. N&deg;</label>
                                          <div class="col-sm-3">
                                           <span><?php echo $row['ve_ref_no']; ?></span>
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Long DAST</label>
                                          <div class="col-sm-3">
                                           <span>$<?php echo number_format( $row['ag_long_dast'],2); ?></span>
                                          </div>
                                    </div>

                                     <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Inception Date</label>
                                          <div class="col-sm-3">
                                           <span><?php echo $row['ag_inception_date']; ?></span>
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Amount</label>
                                          <div class="col-sm-3">
                                           <span>$<?php echo number_format( $row['ag_amount'],2); ?></span>
                                          </div>
                                    </div>

                                    <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Return Date</label>
                                          <div class="col-sm-3">
                                           <span><?php echo $row['ag_return_date']; ?></span>
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Discount (%)</label>
                                          <div class="col-sm-3">
                                           <span><?php echo number_format( $row['ag_discount_percent'],2); ?></span>
                                          </div>
                                    </div>
                                     <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3">Agreement Date</label>
                                          <div class="col-sm-3">
                                           <span><?php echo $row['date_created']; ?></span>
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">VAT (%)</label>
                                          <div class="col-sm-3">
                                           <span><?php echo number_format( $row['ag_vat'],2); ?></span>
                                          </div>
                                    </div>
                                     <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3"></label>
                                          <div class="col-sm-3">
                                           <span></span>
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Deposit</label>
                                          <div class="col-sm-3">
                                           <span>$<?php echo number_format( $row['ag_deposited'],2); ?></span>
                                          </div>
                                    </div>
                                    <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-3"></label>
                                          <div class="col-sm-3">
                                           <span></span>
                                          </div>
                                           <label for="staticEmail" class="col-sm-3">Net Total</label>
                                          <div class="col-sm-3">
                                           <span>$<?php echo number_format( $row['ag_amount_aft_d'],2); ?></span>
                                          </div>
                                    </div>

                              </div>
                            </div>
                                
                        </div>
                        <button type="submit" name="btn_add" class="btn" style="width:15%;">Save</button>
                        <!-- end row  -->

                    <?php 
                        }
                      }
                    ?>
                        
                     


                       
                       


                    </div>
                  
                </form><br>
            </div>
        </div>
    </div>
</div>



<style type="text/css">
.table-wrapper-scroll-y {
display: block;
max-height:400px;
overflow-y: auto;
-ms-overflow-style: -ms-autohiding-scrollbar;
}
.col-form-label {
    font-size:11px;
}
.form_input_size{
  width:100%;
  padding:2px;
  height:30px;
}
.panel_custom {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.form-group {
    margin-top:3px;
    margin-bottom: 3px;
}
.col-md-4 {
     padding-left: 5px !important;
    padding-right: 2px !important;
}
.panel {
    margin-bottom:10px;
    }
      b,span{
        color: #800080;
        font-weight: 900;
    }
      
.caret {
  display: none;
}
</style>

<?php include_once '../layout/footer.php' ?>

