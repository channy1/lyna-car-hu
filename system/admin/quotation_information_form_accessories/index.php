<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST["btn_add"])) { 
     $txt_ref_no = @$connect->real_escape_string($_POST['txt_ref_no']);
     $txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
     $txt_name_owner = @$connect->real_escape_string($_POST['txt_name_owner']);
     $txt_name_owner_sign = @$connect->real_escape_string($_POST['txt_name_owner_sign']);
     $txt_name_witness = @$connect->real_escape_string($_POST['txt_name_witness']);
     $txt_name_renter = @$connect->real_escape_string($_POST['txt_name_renter']);
     $txt_subject = @$connect->real_escape_string($_POST['txt_subject']);
     $txt_ld = @$connect->real_escape_string($_POST['txt_ld']);
     $txt_deposit = @$connect->real_escape_string($_POST['txt_deposit']);
     $txt_booking_date = @$connect->real_escape_string($_POST['txt_booking_date']);

     
     $txt_acc_id1 = @$connect->real_escape_string($_POST['txt_acc_id1']);
     $txt_acc_id2 = @$connect->real_escape_string($_POST['txt_acc_id2']);
     $txt_acc_id3 = @$connect->real_escape_string($_POST['txt_acc_id3']);
     $txt_acc_daily_day1 = @$connect->real_escape_string($_POST['txt_acc_daily_day1']);
     $txt_acc_daily_day2 = @$connect->real_escape_string($_POST['txt_acc_daily_day2']);
     $txt_acc_daily_day3 = @$connect->real_escape_string($_POST['txt_acc_daily_day3']);
     $txt_acc_extra_day1 = @$connect->real_escape_string($_POST['txt_acc_extra_day1']);
     $txt_acc_extra_day2 = @$connect->real_escape_string($_POST['txt_acc_extra_day2']);
     $txt_acc_extra_day3 = @$connect->real_escape_string($_POST['txt_acc_extra_day3']);
     $txt_acc_price_daly1 = @$connect->real_escape_string($_POST['txt_acc_price_daly1']);
     $txt_acc_price_daly2 = @$connect->real_escape_string($_POST['txt_acc_price_daly2']);
     $txt_acc_price_daly3 = @$connect->real_escape_string($_POST['txt_acc_price_daly3']);
     $txt_acc_price_extra1 = @$connect->real_escape_string($_POST['txt_acc_price_extra1']);
     $txt_acc_price_extra2 = @$connect->real_escape_string($_POST['txt_acc_price_extra2']);
     $txt_acc_price_extra3 = @$connect->real_escape_string($_POST['txt_acc_price_extra3']);
     $txt_acc_discount1 = @$connect->real_escape_string($_POST['txt_acc_discount1']);
     $txt_acc_discount2 = @$connect->real_escape_string($_POST['txt_acc_discount2']);
     $txt_acc_discount3 = @$connect->real_escape_string($_POST['txt_acc_discount3']);
     $txt_acc_vat1 = @$connect->real_escape_string($_POST['txt_acc_vat1']);
     $txt_acc_vat2 = @$connect->real_escape_string($_POST['txt_acc_vat2']);
     $txt_acc_vat3 = @$connect->real_escape_string($_POST['txt_acc_vat3']);
     $txt_acc_amount_daily1 = @$connect->real_escape_string($_POST['txt_acc_amount_daily1']);
     $txt_acc_amount_daily2 = @$connect->real_escape_string($_POST['txt_acc_amount_daily2']);
     $txt_acc_amount_daily3 = @$connect->real_escape_string($_POST['txt_acc_amount_daily3']);
     $txt_acc_amount_extra1 = @$connect->real_escape_string($_POST['txt_acc_amount_extra1']);
     $txt_acc_amount_extra2 = @$connect->real_escape_string($_POST['txt_acc_amount_extra2']);
     $txt_acc_amount_extra3 = @$connect->real_escape_string($_POST['txt_acc_amount_extra3']);

     
     $query_add = "INSERT INTO tbl_quotation_admin(
                    customer_id,
                    owner_id,
                    ref_no,
                    signator_owner,
                    signator_prepare,
                    signator_renter,
                    ld_ass,
                    refun_deposit,
                    booking_date,
                    subject_type
                    ) VALUES(
                    '$txt_customer_name',
                    '$txt_name_owner',
                    '$txt_ref_no',
                    '$txt_name_owner_sign',
                    '$txt_name_witness',
                    '$txt_name_renter',
                    '$txt_ld',
                    '$txt_deposit',
                    '$txt_booking_date',
                    '$txt_subject'
                    )";

            if($connect->query($query_add)){

              $q_last_id=$connect->insert_id;
              
    
 if($txt_acc_id1 !=""){
                 $sql_acc1 = "INSERT INTO tbl_quotation_acc(
                                q_id,
                                acc_id,
                                acc_daily_day,
                                acc_extra_day,
                                acc_daily_price,
                                acc_extra_price,
                                acc_discount,
                                acc_vat,
                                acc_amount_daily,
                                acc_mount_extra 
                              )
                              VALUES(
                                  '$q_last_id',
                                  '$txt_acc_id1',
                                  '$txt_acc_daily_day1',
                                  '$txt_acc_extra_day1',
                                  '$txt_acc_price_daly1',
                                  '$txt_acc_price_extra1',
                                  '$txt_acc_discount1',
                                  '$txt_acc_vat1',
                                  '$txt_acc_amount_daily1',
                                  '$txt_acc_amount_extra1'
                                  )";
                        if($connect->query($sql_acc1)){
                           
                        }
              }

               if($txt_acc_id2 !=""){
                 $sql_acc2 = "INSERT INTO tbl_quotation_acc(
                                q_id,
                                acc_id,
                                acc_daily_day,
                                acc_extra_day,
                                acc_daily_price,
                                acc_extra_price,
                                acc_discount,
                                acc_vat,
                                acc_amount_daily,
                                acc_mount_extra 
                              )
                              VALUES(
                                  '$q_last_id',
                                  '$txt_acc_id2',
                                  '$txt_acc_daily_day2',
                                  '$txt_acc_extra_day2',
                                  '$txt_acc_price_daly2',
                                  '$txt_acc_price_extra2',
                                  '$txt_acc_discount2',
                                  '$txt_acc_vat2',
                                  '$txt_acc_amount_daily2',
                                  '$txt_acc_amount_extra2'
                                  )";
                        if($connect->query($sql_acc2)){
                           
                        }

              }

               if($txt_acc_id3 !=""){
                 $sql_acc3 = "INSERT INTO tbl_quotation_acc(
                                q_id,
                                acc_id,
                                acc_daily_day,
                                acc_extra_day,
                                acc_daily_price,
                                acc_extra_price,
                                acc_discount,
                                acc_vat,
                                acc_amount_daily,
                                acc_mount_extra 
                              )
                              VALUES(
                                  '$q_last_id',
                                  '$txt_acc_id3',
                                  '$txt_acc_daily_day3',
                                  '$txt_acc_extra_day3',
                                  '$txt_acc_price_daly3',
                                  '$txt_acc_price_extra3',
                                  '$txt_acc_discount3',
                                  '$txt_acc_vat3',
                                  '$txt_acc_amount_daily3',
                                  '$txt_acc_amount_extra3'
                                  )";
                        if($connect->query($sql_acc3)){
                           
                        }

              }

        
             
                 $sms = '<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfull!</strong> Data inserted ...
                </div>';


          }
          else {
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

    <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">?????????????????? QUOTATION</b></h3>
                <b style="font-size: 20px;">??????????????????????????????ADD QUOTATION</b><br><br>
                <b style="font-family: Khmer OS Muol;">?????????????????????????????????????????????| HEAD OFFICE</b><br>
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
                        <label for="staticEmail" class="col-sm-1">Ref. N&deg;</label>
                        <div class="col-sm-4">
                          
                          <input class="form-control" readonly id="txt_ref_no_hidden" type="text" name="txt_ref_no" value="<?php echo 'QU-'.date("Ymd").''.rand(10,10000); ?>">
                        </div>
                      </div><br>
                    

                        <div class="row">
                           <div class="col-md-8">
                                 <div class="panel panel_custom" style="padding:10px;">
                                     <label style="color:blue;font-size: 15px;">Customer Name</label>
                                     <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-4">Customer ID</label>
                                          <div class="col-sm-8">
                                             <div id="result_search_customer_id">
                                           <select name="txt_customer_name" id="txt_search_agent_customer" class="form-control">
                                              <option value="">==Customer ID==</option>
                                              <?php 
                                                $get_customer_id = $connect->query("SELECT * FROM tbl_users where user_position !='1' AND  user_first_name !='' OR user_last_name !='')  ");
                                                while($row_customer_id = mysqli_fetch_object($get_customer_id)){
                                                    if($row_customer_id->user_id == @$_POST['txt_customer_name']){
                                                        echo '<option SELECTED value="'.$row_customer_id->user_id.'">'.$row_customer_id->user_first_name.' '.$row_customer_id->user_last_name.'</option>';

                                                    }else{
                                                        echo '<option value="'.$row_customer_id->user_id.'">'.$row_customer_id->user_first_name.' '.$row_customer_id->user_last_name.'</option>';
                                                        
                                                    }
                                                }
                                            ?>
                                              
                                          </select>
                                              </div>
                                          </div>
                                    </div>
                                     <div class="form-group row">
                                        <div class="col-sm-7">
                                         <input type="text" class="form-control" name="txt_search_agent" id="txt_search_agent" value="" placeholder="Search Customer ">
                                        </div>
                                        <div class="col-sm-5">
                                        <button id="btn_search" type="button" name="btn_search" class="btn " style="width:100%;">Get Agent</button>
                                        </div>
                                      </div>
                                  <div class="table-wrapper-scroll-y">
                                       <div id="result_search"></div>
                                  </div>
                                </div>
                           </div>
                                  <div class="col-md-4">
                                 <div class="panel panel_custom" style="padding:10px;margin-right: 14px;">
                                     <label style="color:blue;font-size: 15px;">Party A (Owner of the Vechicle)</label>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-4">Name</label>
                                          <div class="col-sm-8">
                                           <select name="txt_name_owner" class="form-control">
                                              <option value="">==All Owner==</option>
                                              <?php 
                                                $get_parter_a = $connect->query("SELECT * FROM tbl_owner_list ORDER BY ow_name ASC");
                                                while($row_partner_a = mysqli_fetch_object($get_parter_a)){
                                                    if($row_partner_a->ow_id == @$_POST['txt_name_owner']){
                                                        echo '<option SELECTED value="'.$row_partner_a->ow_id.'">'.$row_partner_a->ow_name.'</option>';

                                                    }else{
                                                        echo '<option value="'.$row_partner_a->ow_id.'">'.$row_partner_a->ow_name.'</option>';
                                                        
                                                    }
                                                }
                                            ?>
                                              
                                          </select>
                                          </div>
                                    </div>
                                </div>

                                 <div class="panel panel_custom" style="padding:10px;margin-right: 14px;">
                                     <label style="color:blue;font-size: 15px;">Name of signator</label>
                                      
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">1. Name Of Owner</label>
                                            <input type="text" class="form-control" name="txt_name_owner_sign" id="" placeholder="">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">2. Name Of Prepare</label>
                                            <input type="text" class="form-control" name="txt_name_witness" id="" placeholder="">
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1">3. Name Of Renter</label>
                                            <input type="text" class="form-control" name="txt_name_renter" id="" placeholder="">
                                          </div>
                                         
                                   
                                </div>

                                <div class="panel panel_custom" style="padding:10px;margin-right: 14px;">
                                     <label style="color:blue;font-size: 15px;">Subject & Items </label>
                                      <div class="form-group">
                                            <label for="exampleFormControlInput1">1. Subject</label>
                                             <select name="txt_subject" class="form-control">
                                              
                                            
                                               <option value="8">Accessories Rental Service</option>
                                               <!--<option value="5">Tour Guide Rental Service</option>
                                               <option value="6">City Tour Rental Service</option>
                                               <option value="7">Pickup & Drop-off Service</option>
                                               
                                               <option value="9">Airport Transfer Service</option> -->
                                             </select>
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1">2. LD Assistance</label>
                                            <input type="text" class="form-control" name="txt_ld" id="" placeholder="">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">3. Refundable Deposit (RD)</label>
                                            <input type="text" class="form-control" name="txt_deposit" id="" placeholder="">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">4. Booking Date</label>
                                            <input name="txt_booking_date" type="text" class="form_input_size" value="" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                          </div>
                                </div>
                               
                           </div>

                        </div>
                        <!-- end row  -->
                        


                        <div class="row">
                           <div class="col-md-12">
                                 <div class="panel panel_custom" style="padding:10px;">
                                     
                                  <table id="myTable" class=" table order_acc">
                                          <thead>
                                              <tr>
                                                  <td>Accessories</td>
                                                  <td>Daily Day</td>
                                                  <td>Extra Day</td>
                                                  <td>Daily Price</td>
                                                  <td>Extra Price</td>
                                                  <td>Discount</td>
                                                  <td>VAT</td>
                                                  <td>Amount Daily</td>
                                                  <td>Amount Extra</td>
                                                  <td>Action</td>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            
                                          </tbody>
                                          
                                      </table>
                                       <input type="button" class="btn" id="add_acc" value="Add Accessories" />
                                    
                                 </div> 
                                 <!-- end div custom -->
                                  <button type="submit" name="btn_add" class="btn" style="width:20%;float:right;">Save</button> 
                           </div>
                        </div>


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
</style>

<?php include_once '../layout/footer.php' ?>

<script type="text/javascript">

$(document).ready(function () {

// start Accessories

  
    var counter_acc =1;
    var loop_acc=counter_acc;

   
    $("#add_acc").on("click", function () {
      if(counter_acc <=3) {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select name="txt_acc_id' + counter_acc + '" class="form-control"><?php $ve_sql = $connect->query("SELECT * FROM tbl_accessories_rental ORDER BY ac_title ");while($row = mysqli_fetch_object($ve_sql)){?><option value="<?php echo $row->ac_id; ?>"><?php echo $row->ac_ref_no; ?></option><?php } ?></select></td>';
        cols += '<td><input type="text" id="txt_acc_daily_day' + counter_acc + '" name="txt_acc_daily_day' + counter_acc + '" class="form-control"></td>';
        cols += '<td><input type="text" id="txt_acc_extra_day' + counter_acc + '" name="txt_acc_extra_day' + counter_acc + '" class="form-control"></td>';
        cols += '<td><input type="text" id="txt_acc_price_daly' + counter_acc + '" name="txt_acc_price_daly' + counter_acc + '" class="form-control"></td>';
        cols += '<td><input type="text" id="txt_acc_price_extra' + counter_acc + '" name="txt_acc_price_extra' + counter_acc + '" class="form-control"></td>';
        cols += '<td><input type="text" id="txt_acc_discount' + counter_acc + '" name="txt_acc_discount' + counter_acc + '" class="form-control"></td>';
        cols += '<td><input type="text" id="txt_acc_vat' + counter_acc + '" name="txt_acc_vat' + counter_acc + '" class="form-control"></td>';
        cols += '<td><input type="text" id="txt_acc_amount_daily' + counter_acc + '" name="txt_acc_amount_daily' + counter_acc + '" class="form-control"></td>';
        cols += '<td><input type="text" id="txt_acc_amount_extra' + counter_acc + '" name="txt_acc_amount_extra' + counter_acc + '" class="form-control"></td>';

        cols += '<td><input type="button" class="btn_d_acc btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order_acc").append(newRow);
        counter_acc++;
        }
         else {
            alert("limit 3");
           }

    });

    $("table.order_acc").on("click", ".btn_d_acc", function (event) {
        $(this).closest("tr").remove();       
        counter_acc -= 1
    });

    function calulate_amount_acc_daily(numbrt_loop) {
       var amount_acc_daliy=0;
              var acc_daily_day=$("#txt_acc_daily_day"+numbrt_loop+"").val();
       
              var acc_price_daly=$("#txt_acc_price_daly"+numbrt_loop+"").val();
              var acc_discount=$("#txt_acc_discount"+numbrt_loop+"").val();
              var acc_vat=$("#txt_acc_vat"+numbrt_loop+"").val();
              var total_price_acc_daily=acc_daily_day * acc_price_daly;
              var discount_daily=total_price_acc_daily-(total_price_acc_daily * acc_discount)/100;
              var vat_daily=discount_daily+(discount_daily * acc_vat)/100;
              amount_acc_daliy=vat_daily;
              $("#txt_acc_amount_daily"+numbrt_loop+"").val(amount_acc_daliy);

    }

    function calulate_amount_acc_extra(numbrt_loop) {
       var amount_acc_extra=0;
              var acc_extra_day=$("#txt_acc_extra_day"+numbrt_loop+"").val();
              var acc_price_extra=$("#txt_acc_price_extra"+numbrt_loop+"").val();
              var acc_discount=$("#txt_acc_discount"+numbrt_loop+"").val();
              var acc_vat=$("#txt_acc_vat"+numbrt_loop+"").val();
              var total_price_acc_extra=acc_extra_day * acc_price_extra;
              var discount_extra=total_price_acc_extra-(total_price_acc_extra * acc_discount)/100;
              var vat_extra=discount_extra+(discount_extra * acc_vat)/100;
              amount_acc_extra=vat_extra;
              $("#txt_acc_amount_extra"+numbrt_loop+"").val(amount_acc_extra);

    }

    $("body").on("input", "#txt_acc_daily_day1", function(){
      calulate_amount_acc_daily(1);   
    });
    $("body").on("input", "#txt_acc_daily_day2", function(){
      calulate_amount_acc_daily(2);   
    });
    $("body").on("input", "#txt_acc_daily_day3", function(){
      calulate_amount_acc_daily(3);   
    });
    $("body").on("input", "#txt_acc_price_daly1", function(){
      calulate_amount_acc_daily(1);   
    });
    $("body").on("input", "#txt_acc_price_daly2", function(){
      calulate_amount_acc_daily(2);   
    });
    $("body").on("input", "#txt_acc_price_daly3", function(){
      calulate_amount_acc_daily(3);   
    });
    $("body").on("input", "#txt_acc_discount1", function(){
      calulate_amount_acc_daily(1);    
      calulate_amount_acc_extra(1);
    });
    $("body").on("input", "#txt_acc_discount2", function(){
      calulate_amount_acc_daily(2);    
      calulate_amount_acc_extra(2);
    });
    $("body").on("input", "#txt_acc_discount3", function(){
      calulate_amount_acc_daily(3);    
      calulate_amount_acc_extra(3);
    });
    $("body").on("input", "#txt_acc_vat1", function(){
      calulate_amount_acc_daily(1); 
      calulate_amount_acc_extra(1);   
    });
    $("body").on("input", "#txt_acc_vat2", function(){
      calulate_amount_acc_daily(2); 
      calulate_amount_acc_extra(2);   
    });
     $("body").on("input", "#txt_acc_vat3", function(){
      calulate_amount_acc_daily(3); 
      calulate_amount_acc_extra(3);   
    });


     $("body").on("input", "#txt_acc_extra_day"+loop_acc+"", function(){
      calulate_amount_acc_daily();
      calulate_amount_acc_extra(); 
    });
    $("body").on("input", "#txt_acc_price_extra"+loop_acc+"", function(){
      calulate_amount_acc_daily();  
      calulate_amount_acc_extra(); 
    });
   
// end accessories

});



</script>

<script>
$(document).ready(function(){
 load_data();
 function load_data(query)
 {
  $.ajax({
   url:"ajax_agent.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result_search').html(data);
   }
  });
 }
 $('#txt_search_agent').on('input',function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });

 // load row_customer_id
 load_data_customer_id();
 function load_data_customer_id(id)
 {
  $.ajax({
   url:"ajax_customer_id.php",
   method:"POST",
   data:{id:id},
   success:function(data)
   {
    $('#result_search_customer_id').html(data);
   }
  });
 }
 $('#btn_search').click(function(){
 
  var customer_id = $("#agent_id").val();
  if(customer_id != '')
  {
   load_data_customer_id(customer_id);
  }
  else
  {
   load_data_customer_id();
  }
 });
});
</script>
