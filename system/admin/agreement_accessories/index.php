
<?php 
    $menu_active =9;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    if(isset($_POST["btn_add"])) { 
        $ref_no = @$connect->real_escape_string($_POST['txt_ref_no']);
        if($ref_no =="") {
          $ref_no=0;
        }
        $name_owner = @$connect->real_escape_string($_POST['txt_name_owner']);
        if($name_owner =="") {
          $name_owner=0;
        }
        $customer_name = @$connect->real_escape_string($_POST['txt_customer_name']);
         if($customer_name =="") {
          $customer_name=0;
        }
        $passport = @$connect->real_escape_string($_POST['check_passport']);
         if($passport =="") {
          $passport=0;
        }
        $id_card = @$connect->real_escape_string($_POST['check_id_card']);
        if($id_card =="") {
          $id_card=0;
        }
        $residentail_book = @$connect->real_escape_string($_POST['check_residentail_book']);
         if($residentail_book =="") {
          $residentail_book=0;
        }
        $fuel = @$connect->real_escape_string($_POST['txt_fuel']);
        if($fuel =="") {
          $fuel=0;
        }
        $fuel_full_tank = @$connect->real_escape_string($_POST['txt_fuel_full_tank']);
        if($fuel_full_tank =="") {
          $fuel_full_tank=0;
        }
        $inception_date = @$connect->real_escape_string($_POST['txt_inception_date']);
        $inception_date_format=$inception_date;
        if($inception_date =="") {
          $inception_date_format="0000-01-01";
        }
        if($inception_date  !="") {
          $var =$inception_date;
          $inception_date_format =date("Y-m-d", strtotime($var));
          $inception_date_format;
        }
        $inception_time = @$connect->real_escape_string($_POST['txt_inception_time']);
        if($inception_time =="") {
          $inception_time=0;
        }
        $return_date = @$connect->real_escape_string($_POST['txt_return_date']);
        $return_date_format=$return_date;
         if($return_date =="") {
           $return_date_format="0000-01-01";
        }
        if($return_date  !="") {
          $var =$return_date;
          $return_date_format =date("Y-m-d", strtotime($var));
          $return_date_format;
        }
        $return_time = @$connect->real_escape_string($_POST['txt_return_time']);
        if($return_time =="") {
          $return_time=0;
        }
        $period_day = @$connect->real_escape_string($_POST['txt_period_day']);
        if($period_day =="") {
          $period_day=0;
        }
        $extra_day = @$connect->real_escape_string($_POST['txt_extra_day']);
         if($extra_day =="") {
          $extra_day=0;
        }
        $rate = @$connect->real_escape_string($_POST['txt_rate']);
         if($rate =="") {
          $rate=0;
        }
        $extra_rate = @$connect->real_escape_string($_POST['txt_extra_rate']);
        if($extra_rate =="") {
          $extra_rate=0;
        }
        $total = @$connect->real_escape_string($_POST['txt_total']);
        if($total =="") {
          $total=0;
        }
        $extra_total = @$connect->real_escape_string($_POST['txt_extra_total']);
        if($extra_total =="") {
          $extra_total=0;
        }
        $deposited = @$connect->real_escape_string($_POST['txt_deposited']);
        if($deposited =="") {
          $deposited=0;
        }
        $long_dast = @$connect->real_escape_string($_POST['txt_long_dast']);
        if($long_dast =="") {
          $long_dast=0;
        }
        $amount = @$connect->real_escape_string($_POST['txt_amount']);
        if($amount =="") {
          $amount=0;
        }
        $discount_percent = @$connect->real_escape_string($_POST['txt_discount_percent']);
         if($discount_percent =="") {
          $discount_percent=0;
        }
        $discount_amount = @$connect->real_escape_string($_POST['txt_discount_amount']);
        if($discount_amount =="") {
          $discount_amount=0;
        }
        $vat = @$connect->real_escape_string($_POST['txt_vat']);
         if($vat =="") {
          $vat=0;
        }
         $vat_amount = @$connect->real_escape_string($_POST['txt_vat_amount']);
         if($vat_amount =="") {
          $vat_amount=0;
        }
        $amount_aft_d = @$connect->real_escape_string($_POST['txt_amount_aft_d']);
         if($amount_aft_d =="") {
          $amount_aft_d=0;
        }
        $total_net_pay = @$connect->real_escape_string($_POST['txt_total_net_pay']);
        if($total_net_pay =="") {
          $total_net_pay=0;
        }
        $name_owner_sign = @$connect->real_escape_string($_POST['txt_name_owner_sign']);
        $name_witness = @$connect->real_escape_string($_POST['txt_name_witness']);
        $name_renter = @$connect->real_escape_string($_POST['txt_name_renter']);
        $regular_maintenance = @$connect->real_escape_string($_POST['txt_regular_maintenance']);
        if($regular_maintenance =="") {
          $regular_maintenance=0;
        }
        $unlimited_millage = @$connect->real_escape_string($_POST['txt_unlimited_millage']);
        if($unlimited_millage =="") {
          $unlimited_millage=0;
        }
        $repair = @$connect->real_escape_string($_POST['txt_repair']);
        if($repair =="") {
          $repair=0;
        }
        $insurance = @$connect->real_escape_string($_POST['txt_insurance']);
        if($insurance =="") {
          $insurance=0;
        }
        $articles_from = @$connect->real_escape_string($_POST['txt_articles_from']);
        $articles_to = @$connect->real_escape_string($_POST['txt_articles_to']);
        $no_driver_from = @$connect->real_escape_string($_POST['txt_no_driver_from']);
        $no_driver_to = @$connect->real_escape_string($_POST['txt_no_driver_to']);
        $other_from = @$connect->real_escape_string($_POST['txt_other_from']);
        $other_to = @$connect->real_escape_string($_POST['txt_other_to']);
        $user_agree = @$connect->real_escape_string($_POST['txt_customer_name']);
        $txt_vechicle_no = @$connect->real_escape_string($_POST['txt_vechicle_no']);

         $query_add = "INSERT INTO tbl_agreement(
                    car_id,
                    user_id,
                    ag_ref_no,
                    ag_name_owner,
                    ag_customer_name,
                    ag_passport,
                    ag_id_card,
                    ag_residentail_book,
                    ag_fuel,
                    ag_fuel_full_tank,
                    ag_inception_date,
                    ag_inception_time,
                    ag_return_date,
                    ag_return_time,
                    ag_period_day, 
                    ag_extra_day,
                    ag_rate,
                    ag_extra_rate,
                    ag_total,
                    ag_extra_total,
                    ag_deposited,
                    ag_long_dast,
                    ag_amount,
                    ag_discount_percent,
                    ag_discount_amount,
                    ag_vat,
                    ag_amount_aft_d,
                    ag_total_net_pay,
                    ag_name_owner_sign,
                    ag_name_witness,
                    ag_name_renter,
                    ag_regular_maintenance,
                    ag_unlimited_millage,
                    ag_repair,
                    ag_insurance,
                    ag_articles_from,
                    ag_articles_to,
                    ag_no_driver_from,
                    ag_no_driver_to,
                    ag_other_from,
                    ag_other_to,
                    ag_vat_amount,
                    type_agreement
                    ) VALUES(
                    '$txt_vechicle_no',
                    '$user_agree',
                    '$ref_no',
                    '$name_owner',
                    '$customer_name',
                    '$passport',
                    '$id_card',
                    '$residentail_book',
                    '$fuel',
                    '$fuel_full_tank',
                    '$inception_date_format',
                    '$inception_time',
                    '$return_date_format',
                    '$return_time',
                    '$period_day',
                    '$extra_day',
                    '$rate',
                    '$extra_rate',
                    '$total',
                    '$extra_total',
                    '$deposited',
                    '$long_dast',
                    '$amount',
                    '$discount_percent',
                    '$discount_amount',
                    '$vat',
                    '$amount_aft_d',
                    '$total_net_pay',
                    '$name_owner_sign',
                    '$name_witness',
                    '$name_renter',
                    '$regular_maintenance',
                    '$unlimited_millage',
                    '$repair',
                    '$insurance',
                    '$articles_from',
                    '$articles_to',
                    '$no_driver_from',
                    '$no_driver_to',
                    '$other_from',
                    '$other_to',
                    '$vat_amount',
                    '5'
                    )";
// var_dump($query_add);
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
<style>
    table *{ white-space:nowrap; }
</style>
 <form action="#" method="post" enctype="multipart/form-data">
<div class="portlet light bordered">
    <div class="portlet light bordered">
        <div class="row">
        <div class="col-xs-12">
            <?= @$sms ?>
            
        </div>
        </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-1">Ref. N&deg;</label>
                <div class="col-sm-4">
                  
                  <input class="form-control" readonly id="txt_ref_no_hidden" type="text" name="txt_ref_no" value="<?php echo 'LCRC-'.date("Ymd").''.rand(10,10000); ?>">
                </div>
              </div>
        <br>
        <div class="row">
             <div class="col-lg-4 col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style="text-transform: capitalize;font-weight: bold;color: #13599c;">I. Party A(Owner of the Vechicle)</h5>
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
                   
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">II. Party B(Renter) And requirement</h5>
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

                        
                    </div>

                   
                   <div class="table-wrapper-scroll-y">
                    <div id="result_search"></div>

  

</div>


       
        



                    <div class="row">
                        <div class="form-inline">
    <div class="form-group">
        <div class="col-md-12">
            <label class="radio-inline">
                <input type="checkbox" name="check_passport" id="Checkbox0" value="1">Original Passport</label>
            <label class="radio-inline">
                <input type="checkbox" name="check_id_card" id="Checkbox1" value="1">Original ID Card</label>
           
            
        </div>

        
        
    </div>
</div>
                    </div>

                         <div class="row">
                        <div class="form-inline">
    <div class="form-group">
        

        <div class="col-md-12">
            <label class="radio-inline">
            <input type="checkbox" name="check_residentail_book" id="Checkbox2" value="1">Residential Book</label>
            
        </div>
        
    </div>
</div>
                    </div>
                   
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">Special Notices </h5>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">2.Articlies</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_articles_from" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">To</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_articles_to" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">4.No Driver</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_no_driver_from" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">To</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_no_driver_to" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Other</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_other_from"  class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">To</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_other_to" class="form-control" id="" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         
                        
                    </div>
                   
                </div>

             </div>
             <div class="col-lg-5 col-xs-4">
                <div class="row">
                    <div class="col-lg-6 col-xs-6" style="padding-left:16px !important;padding-right:9px !important;">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style="text-transform: capitalize;font-weight: bold;color: #13599c;">III.Vechicle's information</h5>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Accessories Information</label>
                            <select name="txt_vechicle_no" class="form-control" >
                                 <option value="">==All Accessories==</option>
                                <?php 
                                  $get_acc = $connect->query("SELECT * FROM tbl_accessories_rental  ORDER BY ac_title ");
                                  while($row_acc = mysqli_fetch_object($get_acc)){
                                     
                                          echo '<option value="'.$row_acc->ac_id.'">'.$row_acc->ac_ref_no.'</option>';
                                          
                                     
                                  }
                              ?>
                                
                            </select>
                          </div>
                    </div>
                   </div>
                    </div>

                     <div class="col-lg-6 col-xs-6">
                        <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style="text-transform: capitalize;font-weight: bold;color: #13599c;">(Validation returning)</h5>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6">Fuel</label>
                            <div class="col-sm-6">
                             <select name="txt_fuel" class="form-control" style="width: 70px;">
                                <?php 
                                  $get_validate_return_fuel = $connect->query("SELECT * FROM tbl_yes_no");
                                  while($row_validate_return_fuel = mysqli_fetch_object($get_validate_return_fuel)){
                                      if($row_validate_return_fuel->yn_id == @$_POST['txt_fuel']){
                                          echo '<option SELECTED value="'.$row_validate_return_fuel->yn_id.'">'.$row_validate_return_fuel->yn_name.'</option>';

                                      }else{
                                          echo '<option value="'.$row_validate_return_fuel->yn_id.'">'.$row_validate_return_fuel->yn_name.'</option>';
                                          
                                      }
                                  }
                              ?>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6">Fuel Full Tank</label>
                            <div class="col-sm-6">
                             <select name="txt_fuel_full_tank" class="form-control" style="width: 70px;">
                                <?php 
                                  $get_validate_return_fuel_full = $connect->query("SELECT * FROM tbl_yes_no");
                                  while($row_validate_return_fuel_full = mysqli_fetch_object($get_validate_return_fuel_full)){
                                      if($row_validate_return_fuel_full->yn_id == @$_POST['txt_fuel_full_tank']){
                                          echo '<option SELECTED value="'.$row_validate_return_fuel_full->yn_id.'">'.$row_validate_return_fuel_full->yn_name.'</option>';

                                      }else{
                                          echo '<option value="'.$row_validate_return_fuel_full->yn_id.'">'.$row_validate_return_fuel_full->yn_name.'</option>';
                                          
                                      }
                                  }
                              ?>
                                
                            </select>
                            </div>
                          </div>
                        
                    </div>
                   </div>
                    </div>

                </div>
                
                 <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">IV. Vechicle Period information</h5>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Inception Date</label>
                            <div class="col-sm-7">
                             <input type="text" id="txt_inception_date" name="txt_inception_date" class="form-control" value="" readonly >
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Inception</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_inception_time" class="form-control" id="txt_inception_time" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Return Date</label>
                            <div class="col-sm-7">
                             <input type="text" id="txt_return_date" name="txt_return_date" class="form-control" id="" value="" readonly>
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Return Time</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_return_time" class="form-control" id="txt_return_time" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4">Period</label>
                            <div class="col-sm-5">
                             <input type="text" id="txt_period_day" name="txt_period_day" class="form-control" id="" value="">
                            </div>
                            <div class="col-sm-3">
                             <label>Day($)</label>
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Extra Day</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_extra_day" class="form-control" id="txt_extra_day" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Rate($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_rate" class="form-control" id="txt_rate" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Extra Rate($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_extra_rate" class="form-control" id="txt_extra_rate" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Total($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_total" class="form-control" id="txt_total" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Extra Total($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_extra_total" class="form-control" id="txt_extra_total" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Deposited($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_deposited" class="form-control" id="txt_deposited" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Long DAST($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_long_dast" class="form-control" id="txt_long_dast" value="">
                            </div>
                          </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Amount($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_amount" class="form-control" id="txt_amount" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                           
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Discount($)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_discount_percent" class="form-control" id="txt_discount_percent" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4">($)</label>
                            <div class="col-sm-8">
                             <input type="text" name="txt_discount_amount" class="form-control" id="txt_discount_amount" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-2">
                           
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">VAT(%)</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_vat" class="form-control" id="txt_vat" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4">($)</label>
                            <div class="col-sm-8">
                             <input type="text" name="txt_vat_amount" id="txt_vat_amount" class="form-control" id="txt_vat_amount" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-2">
                           
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Amount AFT/D</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_amount_aft_d" class="form-control" id="txt_amount_aft_d" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                           
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5">Total Net Pay</label>
                            <div class="col-sm-7">
                             <input type="text" name="txt_total_net_pay" class="form-control" id="txt_total_net_pay" value="">
                            </div>
                          </div>
                            </div>
                            <div class="col-sm-6">
                           
                            </div>
                         </div>
                        

                        
                    </div>
                   </div>

                
             </div>
             <div class="col-lg-3 col-xs-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">Service included</h5>
                         <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Regular Maintenance</label>
                            <div class="col-sm-5">
                             <select name="txt_regular_maintenance" class="form-control" style="width: 70px;">
                               <?php 
                                  $get_service_include_one = $connect->query("SELECT * FROM tbl_yes_no");
                                  while($row_service_include_one = mysqli_fetch_object($get_service_include_one)){
                                      if($row_service_include_one->yn_id == @$_POST['txt_regular_maintenance']){
                                          echo '<option SELECTED value="'.$row_service_include_one->yn_id.'">'.$row_service_include_one->yn_name.'</option>';

                                      }else{
                                          echo '<option value="'.$row_service_include_one->yn_id.'">'.$row_service_include_one->yn_name.'</option>';
                                          
                                      }
                                  }
                              ?>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Unlimited Millage</label>
                            <div class="col-sm-5">
                             <select name="txt_unlimited_millage" class="form-control" style="width: 70px;">
                                <?php 
                                  $get_service_include_two = $connect->query("SELECT * FROM tbl_yes_no");
                                  while($row_service_include_two = mysqli_fetch_object($get_service_include_two)){
                                      if($row_service_include_two->yn_id == @$_POST['txt_unlimited_millage']){
                                          echo '<option SELECTED value="'.$row_service_include_two->yn_id.'">'.$row_service_include_two->yn_name.'</option>';

                                      }else{
                                          echo '<option value="'.$row_service_include_two->yn_id.'">'.$row_service_include_two->yn_name.'</option>';
                                          
                                      }
                                  }
                              ?>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Repair/Spare Parts</label>
                            <div class="col-sm-5">
                             <select name="txt_repair" class="form-control" style="width: 70px;">
                                <?php 
                                  $get_service_include_three = $connect->query("SELECT * FROM tbl_yes_no");
                                  while($row_service_include_three = mysqli_fetch_object($get_service_include_three)){
                                      if($row_service_include_three->yn_id == @$_POST['txt_repair']){
                                          echo '<option SELECTED value="'.$row_service_include_three->yn_id.'">'.$row_service_include_three->yn_name.'</option>';

                                      }else{
                                          echo '<option value="'.$row_service_include_three->yn_id.'">'.$row_service_include_three->yn_name.'</option>';
                                          
                                      }
                                  }
                              ?>
                                
                            </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-7">Insurance Converge</label>
                            <div class="col-sm-5">
                             <select name="txt_insurance" class="form-control" style="width: 70px;">
                                <?php 
                                  $get_service_include_four = $connect->query("SELECT * FROM tbl_yes_no");
                                  while($row_service_include_four = mysqli_fetch_object($get_service_include_four)){
                                      if($row_service_include_four->yn_id == @$_POST['txt_insurance']){
                                          echo '<option SELECTED value="'.$row_service_include_four->yn_id.'">'.$row_service_include_four->yn_name.'</option>';

                                      }else{
                                          echo '<option value="'.$row_service_include_four->yn_id.'">'.$row_service_include_four->yn_name.'</option>';
                                          
                                      }
                                  }
                              ?>
                                
                            </select>
                            </div>
                          </div>
                        
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <h5 style=" text-transform: capitalize;font-weight: bold;color: #13599c;">V. Name of signator</h5>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">1. Name Of Owner</label>
                            <input type="text" class="form-control" name="txt_name_owner_sign" id="" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">2. Name Of Withness</label>
                            <input type="text" class="form-control" name="txt_name_witness" id="" placeholder="">
                          </div>
                           <div class="form-group">
                            <label for="exampleFormControlInput1">3. Name Of Renter</label>
                            <input type="text" class="form-control" name="txt_name_renter" id="" placeholder="">
                          </div>
                        
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <button type="submit" name="btn_add" class="btn" style="width:45%;">Save</button> 

                         
                         <button type="submit" name="btn_cancel" class="btn " style="width:45%;float: right;">Exit</button>
                        
                    </div>
                </div>
             </div>

        </div>
   </div>

</div>

</form>
<style type="text/css">
.table-wrapper-scroll-y {
display: block;
max-height: 200px;
overflow-y: auto;
-ms-overflow-style: -ms-autohiding-scrollbar;
}
.has-error input[type="text"], .has-error input[type="email"], .has-error select {
    border: 1px solid #a94442;
}
.magicsearch-wrapper {
  position: relative; }
  .magicsearch-wrapper *:not(input) {
    margin: 0;
    padding: 0;
    font-size: 14px;
    font-family: Consolas, Helvetica, Arial, sans-serif;
    box-sizing: border-box; }
  .magicsearch-wrapper input[disabled] {
    cursor: not-allowed;
    background-color: #eee; }
  .magicsearch-wrapper input.dropdown {
    padding-right: 24px; }
  .magicsearch-wrapper.disabled .magicsearch-arrow,
  .magicsearch-wrapper.disabled .magicsearch-arrow *,
  .magicsearch-wrapper.disabled .multi-items {
    cursor: not-allowed; }
  .magicsearch-wrapper .multi-items {
    position: absolute;
    cursor: text; }
  .magicsearch-wrapper .multi-item {
    position: relative;
    float: left;
    background-color: #e4e4e4;
    padding-right: 15px;
    border-radius: 3px;
    border: 1px solid #aaa; }
    .magicsearch-wrapper .multi-item span {
      text-overflow: ellipsis;
      overflow: hidden;
      white-space: nowrap;
      cursor: default;
      text-align: center;
      font-size: 12px;
      display: block;
      height: 100%; }
  .magicsearch-wrapper .multi-item-close {
    display: block;
    position: absolute;
    width: 12px;
    height: 12px;
    right: 3px; }
    .magicsearch-wrapper .multi-item-close:before, .magicsearch-wrapper .multi-item-close:after {
      content: '';
      height: 2px;
      width: 12px;
      display: block;
      background-color: #999;
      border-radius: 2px;
      position: absolute;
      top: 5px;
      left: 0px;
      -webkit-transform: rotate(-45deg);
          -ms-transform: rotate(-45deg);
              transform: rotate(-45deg); }
    .magicsearch-wrapper .multi-item-close:after {
      -webkit-transform: rotate(45deg);
          -ms-transform: rotate(45deg);
              transform: rotate(45deg); }
    .magicsearch-wrapper .multi-item-close:hover:before, .magicsearch-wrapper .multi-item-close:hover:after {
      background-color: #333; }
  .magicsearch-wrapper .magicsearch-box {
    display: none;
    position: absolute;
    width: 100%;
    overflow: hidden;
    background-color: #fff;
    z-index: 100;
    border: 1px solid #ccc;
    padding: 5px 0;
    margin-bottom: 20px;
    border-radius: 5px;
    left: 0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); }
    .magicsearch-wrapper .magicsearch-box.all {
      overflow-y: auto; }
    .magicsearch-wrapper .magicsearch-box li {
      height: 30px;
      line-height: 30px;
      cursor: pointer;
      padding-left: 10px;
      text-align: left;
      text-overflow: ellipsis;
      overflow: hidden;
      white-space: nowrap;
      font-weight: normal; }
      .magicsearch-wrapper .magicsearch-box li.enabled {
        color: #333; }
      .magicsearch-wrapper .magicsearch-box li.disabled {
        color: #d43f3a; }
      .magicsearch-wrapper .magicsearch-box li.selected {
        background-color: #ddd; }
      .magicsearch-wrapper .magicsearch-box li.ishover {
        background-color: #0097cf;
        color: #fff; }
      .magicsearch-wrapper .magicsearch-box li span.keyword {
        font-weight: bold; }
    .magicsearch-wrapper .magicsearch-box .no-result {
      display: block;
      height: 30px;
      line-height: 30px;
      color: #d43f3a;
      padding-left: 10px;
      text-align: left; }
  .magicsearch-wrapper .magicsearch-arrow {
    position: absolute;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
        -ms-flex-align: center;
            align-items: center;
    width: 24px;
    cursor: pointer; }
    .magicsearch-wrapper .magicsearch-arrow i {
      position: relative;
      height: 6px;
      width: 12px;
      cursor: pointer;
      display: block; }
      .magicsearch-wrapper .magicsearch-arrow i:before {
        content: '';
        height: 0;
        width: 0;
        display: block;
        border: 6px transparent solid;
        border-bottom-width: 0;
        border-top-color: #a0a0a0;
        position: absolute;
        top: 0;
        right: 0; }
    .magicsearch-wrapper .magicsearch-arrow.arrow-rotate-180 {
      -webkit-animation: arrow-rotate-180 .2s 1 linear;
              animation: arrow-rotate-180 .2s 1 linear;
      -webkit-animation-fill-mode: forwards;
              animation-fill-mode: forwards; }
    .magicsearch-wrapper .magicsearch-arrow.arrow-rotate-360 {
      -webkit-animation: arrow-rotate-360 .2s 1 linear;
              animation: arrow-rotate-360 .2s 1 linear;
      -webkit-animation-fill-mode: forwards;
              animation-fill-mode: forwards; }
    .magicsearch-wrapper .magicsearch-arrow.rotate180 {
      -webkit-transform: rotateX(180deg);
              transform: rotateX(180deg); }
  .magicsearch-wrapper .magicsearch-loading {
    background: rgba(255, 255, 255, 0.3);
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    padding: 3px 0; }
    .magicsearch-wrapper .magicsearch-loading div {
      display: none;
      background-image: url("data:image/gif;base64,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");
      background-position: center;
      background-size: contain;
      background-repeat: no-repeat;
      height: 100%; }

@-webkit-keyframes arrow-rotate-180 {
  from {
    -webkit-transform: rotateX(0deg);
            transform: rotateX(0deg); }
  to {
    -webkit-transform: rotateX(180deg);
            transform: rotateX(180deg); } }

@keyframes arrow-rotate-180 {
  from {
    -webkit-transform: rotateX(0deg);
            transform: rotateX(0deg); }
  to {
    -webkit-transform: rotateX(180deg);
            transform: rotateX(180deg); } }

@-webkit-keyframes arrow-rotate-360 {
  from {
    -webkit-transform: rotateX(180deg);
            transform: rotateX(180deg); }
  to {
    -webkit-transform: rotateX(360deg);
            transform: rotateX(360deg); } }

@keyframes arrow-rotate-360 {
  from {
    -webkit-transform: rotateX(180deg);
            transform: rotateX(180deg); }
  to {
    -webkit-transform: rotateX(360deg);
            transform: rotateX(360deg); } }


</style>


<?php include_once '../layout/footer.php' ?>
<script type="text/javascript">
$(function() {
   
            var dataSource = [
            <?php
             $v_sql = "SELECT * FROM tbl_quotation";
             $result = $connect->query($v_sql);
             if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $id=$row["q_id"];
                $name=$row["q_ref_no"];
             ?>
                             {id:<?php echo $id;  ?>, displayName:<?php echo "'$name'" ?>},
          <?php }} ?>
                 
            ];

            $('#txt_ref_no').magicsearch({

                dataSource: dataSource,
                fields: ['displayName'],
                id: 'id',
                format: '%displayName%',
                multiple: false,
                multiField: 'displayName',
                multiStyle: {
                    space: 3,
                    width: 80

                }
              
            });
                  $("#txt_ref_no").on('change', function(){
                  var value= $("#txt_ref_no").attr("data-id");
                  var sethidden =$('#txt_ref_no_hidden').val(value);
                 
                   });
        });
$(document).ready(function() {
// $('#txt_ref_no').keyup(function(e)
//                                 {
//   if (/\D/g.test(this.value))
//   {
//     // Filter non-digits from input value.
//     this.value = this.value.replace(/\D/g, '');
//   }
// });



$('#txt_extra_day').keypress(function (event) {
            return isNumber(event, this)
        });
$('#txt_vat_amount').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_rate').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_extra_rate').keypress(function (event) {
            return isNumber(event, this)
        });


$('#txt_total').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_extra_total').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_deposited').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_long_dast').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_amount').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_discount_percent').keypress(function (event) {
            return isNumber(event, this)
        });


$('#txt_discount_amount').keypress(function (event) {
            return isNumber(event, this)
        });


$('#txt_vat').keypress(function (event) {
            return isNumber(event, this)
        });


$('#txt_amount_aft_d').keypress(function (event) {
            return isNumber(event, this)
        });

$('#txt_total_net_pay').keypress(function (event) {
            return isNumber(event, this)
        });

function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    

$( "#txt_inception_date,#txt_return_date" ).datepicker({
changeMonth: true,
changeYear: true,
firstDay: 1,
dateFormat: 'dd/mm/yy',
})

$( "#txt_inception_date" ).datepicker({ dateFormat: 'dd-mm-yy' });
$( "#txt_return_date" ).datepicker({ dateFormat: 'dd-mm-yy' });

$('#txt_return_date').change(function() {
    var start = $('#txt_inception_date').datepicker('getDate');
    var end   = $('#txt_return_date').datepicker('getDate');

if (start<=end) {
    var days  = (end - start)/1000/60/60/24;
    var daily_day_js=0;
    var extra_day_js=0;
    var days_add=days+1;
    if(days_add<=14) {
      if(days_add<=7){
          daily_day_js=days_add;
          extra_day_js=0;
      }
      else {
         extra_day_js=days_add-7;
         daily_day_js=days_add-extra_day_js;
      }
    }
    else if(days_add >=15 && days_add <=30) {
       if(days_add<=26){
          daily_day_js=days_add;
          extra_day_js=0;
       }
       else {
         extra_day_js=days_add-15;
         daily_day_js=days_add-extra_day_js;
       }
    }
     else if(days_add >30 && days_add <=365) {
       if(days_add<=30){
          daily_day_js=days_add;
          extra_day_js=0;
       }
       else {
         extra_day_js=days_add-30;
         daily_day_js=days_add-extra_day_js;
       }
    }

$('#txt_period_day').val(daily_day_js);
$("#txt_extra_day").val(extra_day_js);

}

else {
  alert ("You cant come back before you have been!");
  $('#txt_inception_date').val("");
  $('#txt_return_date').val("");
    $('#txt_period_day').val("");
}
}); //end change function

$('#txt_rate').on('input', function(){ 
   caluate_total_daily_day();
   sum_amount();

});

$('#txt_extra_rate').on('input', function(){ 
   calulate_total_extra_day();
   sum_amount();
});
$('#txt_long_dast').on('input', function(){ 
   sum_amount();
});
$('#txt_discount_percent').on('input', function(){ 
   sum_amount();
});
$('#txt_vat').on('input', function(){ 
   sum_amount();
});

function caluate_total_daily_day(){
    var price_daily_js=$('#txt_rate').val();
    var norma_day_js=$("#txt_period_day").val();
    var total_daily_js=price_daily_js * norma_day_js;
    $("#txt_total").val(total_daily_js);

    
}

function sum_amount(){
    var ld_js=$("#txt_long_dast").val();
    var total_js=$("#txt_total").val();
    var total_extra_js=$("#txt_extra_total").val();
    var  total_mount=parseFloat(ld_js)+parseFloat(total_js)+parseFloat(total_extra_js);
    $("#txt_amount").val(total_mount);

    // discount
    var price_rate=$('#txt_rate').val();
    var discount_percent=$('#txt_discount_percent').val();
    var total_js=$("#txt_total").val();
    var dicount_total=parseFloat(price_rate)-(parseFloat(total_js)*parseFloat(discount_percent/100));
    $("#txt_discount_amount").val(dicount_total);

    // vat 
    var price_rate=$('#txt_rate').val();
    var txt_vat_percent=$('#txt_vat').val();
    var total_js=$("#txt_total").val();
    var vat_total=parseFloat(price_rate)-(parseFloat(total_js)*parseFloat(txt_vat_percent)/100);
    $("#txt_vat_amount").val(vat_total);

    //amount after
    var amount_cal=$("#txt_amount").val();
    var discount_with_vat=parseFloat(amount_cal)-parseFloat((amount_cal * discount_percent)/100);
    var amount_aft=parseFloat(amount_cal)-parseFloat((amount_cal * discount_percent)/100)+parseFloat((amount_cal * txt_vat_percent)/100);
    $("#txt_amount_aft_d").val(amount_aft);
    var deposited_js=$("#txt_deposited").val();
    var total_net_pay=parseFloat(amount_aft)+parseFloat(deposited_js);
    $("#txt_total_net_pay").val(total_net_pay);

}

function calulate_total_extra_day(){
    var price_extra_js=$('#txt_extra_rate').val();
    var extra_day_js=$("#txt_extra_day").val();
    var total_extra_js=price_extra_js * extra_day_js;
    $("#txt_extra_total").val(total_extra_js);
   
}



}); //end ready
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

<style type="text/css">
.col-xs-4 ,.col-xs-3{
     padding-left: 5px !important;
    padding-right: 2px !important;
}

.col-xs-6 {
padding-left: 2px !important;
padding-right:15px !important;
}
.panel {
    margin-bottom:10px;
    }
</style>
<script src="../../js/jquery.magicsearch.js"></script>

