<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
   if(isset($_POST["btn_add"])) { 
     $txt_car_sale_id = @$connect->real_escape_string($_POST['txt_car_sale_id']);
     $txt_ref_no = @$connect->real_escape_string($_POST['txt_ref_no']);
     $txt_customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
     $txt_name_owner = @$connect->real_escape_string($_POST['txt_name_owner']);
     $txt_name_owner_sign = @$connect->real_escape_string($_POST['txt_name_owner_sign']);
     $txt_name_buyer = @$connect->real_escape_string($_POST['txt_name_buyer']);
     $txt_name_witness_buyer = @$connect->real_escape_string($_POST['txt_name_witness_buyer']);
     $txt_name_witness_seller = @$connect->real_escape_string($_POST['txt_name_witness_seller']);
     $txt_sale_date = @$connect->real_escape_string($_POST['txt_sale_date']);
     $txt_price = @$connect->real_escape_string($_POST['txt_price']);

     $query_add = "INSERT INTO tbl_car_sale(
                    car_id,
                    inv_id,
                    customer_id,
                    car_owner_id,
                    name_owner,
                    name_buyer,
                    buyer_witness,
                    seller_witness,
                    sale_date,
                    price
                    ) VALUES(
                    '$txt_car_sale_id',
                    '$txt_ref_no',
                    '$txt_customer_name',
                    '$txt_name_owner',
                    '$txt_name_owner_sign',
                    '$txt_name_buyer',
                    '$txt_name_witness_buyer',
                    '$txt_name_witness_seller',
                    '$txt_sale_date',
                    '$txt_price'
                    )";

            if($connect->query($query_add)){
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
                <h3><b style=";font-family: Khmer OS Muol; ">បញ្ជូល លក់ទ្បាន</b></h3>
                <b style="font-size: 20px;">​​​​​​​​​​ADD CAR SALE</b><br><br>
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
                        <label for="staticEmail" class="col-sm-1">Ref. N&deg;</label>
                        <div class="col-sm-4">
                          
                          <input class="form-control" readonly id="txt_ref_no_hidden" type="text" name="txt_ref_no" value="<?php echo 'CS-'.date("Ymd").''.rand(10,10000); ?>">
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
                                     <label style="color:blue;font-size: 15px;">Party A (Vendor of the Vechicle)</label>
                                      <div class="form-group row">
                                          <label for="staticEmail" class="col-sm-4">Name</label>
                                          <div class="col-sm-8">
                                           <select name="txt_name_owner" class="form-control">
                                              <option value="">==All Vendor==</option>
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
                                            <label for="exampleFormControlInput1">1. Name Of Vendor</label>
                                            <input type="text" class="form-control" name="txt_name_owner_sign" id="" placeholder="">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">2. Name Of Seller’s Witness</label>
                                            <input type="text" class="form-control" name="txt_name_witness_seller" id="" placeholder="">
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1">3. Name Of Buyer</label>
                                            <input type="text" class="form-control" name="txt_name_buyer" id="" placeholder="">
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1">2. Name Of Buyer’s Witness</label>
                                            <input type="text" class="form-control" name="txt_name_witness_buyer" id="" placeholder="">
                                          </div>
                                         
                                   
                                </div>

                                <div class="panel panel_custom" style="padding:10px;margin-right: 14px;">
                                     <label style="color:blue;font-size: 15px;">Vehicle Information</label>
                                      <div class="form-group">
                                            <label for="exampleFormControlInput1">Ref. N&deg; </label>
                                             <select name="txt_car_sale_id" class="form-control">
                                               <?php 
                                                $get_car_sale = $connect->query("SELECT * FROM tbl_vehicle_rantal WHERE status='2' ORDER BY ve_title ASC");
                                                while($row_sale = mysqli_fetch_object($get_car_sale)){
                                                   
                                                        echo '<option value="'.$row_sale->ve_id.'">'.$row_sale->ve_ref_no.'</option>';
                                                        
                                                  
                                                }
                                            ?>
                                              
                                             
                                             </select>
                                          </div>
                                           <div class="form-group">
                                            <label for="exampleFormControlInput1">Price</label>
                                            <input type="text" class="form-control" name="txt_price" id="" placeholder="">
                                          </div>
                                         
                                          <div class="form-group">
                                            <label for="exampleFormControlInput1">Sale Date</label>
                                            <input name="txt_sale_date" type="text" class="form_input_size" value="" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                          </div>
                                </div>
                               
                           </div>

                        </div>
                        <!-- end row  -->


                    </div>
                  <button type="submit" name="btn_add" class="btn" style="width:10%;float: right;">Save</button>
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
