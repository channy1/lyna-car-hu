<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>



<?php 
    $edit_id = $_GET["edit_id"]; 
    if(isset($_POST['btn_save'])){
            $txt_customer_id = @$connect->real_escape_string($_POST['txt_customer_id']);
            $txt_fname = @$connect->real_escape_string($_POST['txt_fname']);
            $txt_lname = @$connect->real_escape_string($_POST['txt_lname']);
            $txt_gender = @$connect->real_escape_string($_POST['txt_gender']);
            $txt_dob = @$connect->real_escape_string($_POST['txt_dob']);
            $txt_company_name = @$connect->real_escape_string($_POST['txt_company_name']);
            $txt_status = @$connect->real_escape_string($_POST['txt_status']);
            $txt_email = @$connect->real_escape_string($_POST['txt_email']);
            $txt_telephone_no = @$connect->real_escape_string($_POST['txt_telephone_no']);
            $txt_province = @$connect->real_escape_string($_POST['txt_province']);

            // insert tbl_user_agreement
                  $txt_mr_ms = @$connect->real_escape_string($_POST['txt_mr_ms']);
                  $txt_occupation = @$connect->real_escape_string($_POST['txt_occupation']);
                  $txt_pob = @$connect->real_escape_string($_POST['txt_pob']);
                  $txt_nationality = @$connect->real_escape_string($_POST['txt_nationality']);
                  $txt_customer_type = @$connect->real_escape_string($_POST['txt_customer_type']);
                  $txt_note = @$connect->real_escape_string($_POST['txt_note']);
                  $txt_group_no = @$connect->real_escape_string($_POST['txt_group_no']);
                  $txt_home_no = @$connect->real_escape_string($_POST['txt_home_no']);
                  $txt_street_no = @$connect->real_escape_string($_POST['txt_street_no']);
                  $txt_commune_no = @$connect->real_escape_string($_POST['txt_commune_no']);
                  $txt_district = @$connect->real_escape_string($_POST['txt_district']);
                  $txt_fax = @$connect->real_escape_string($_POST['txt_fax']);
                  $txt_address_line_one = @$connect->real_escape_string($_POST['txt_address_line_one']);
                  $txt_address_line_two = @$connect->real_escape_string($_POST['txt_address_line_two']);
                  $txt_city = @$connect->real_escape_string($_POST['txt_city']);
                  $txt_zipcode = @$connect->real_escape_string($_POST['txt_zipcode']);
                  $txt_state = @$connect->real_escape_string($_POST['txt_state']);
                  $txt_country = @$connect->real_escape_string($_POST['txt_country']);
                  $txt_cell_phone = @$connect->real_escape_string($_POST['txt_cell_phone']);
                  $txt_pass_port = @$connect->real_escape_string($_POST['txt_pass_port']);
                  $txt_pass_port_issued = @$connect->real_escape_string($_POST['txt_pass_port_issued']);
                  $txt_expired_date = @$connect->real_escape_string($_POST['txt_expired_date']);
                  $txt_id_card = @$connect->real_escape_string($_POST['txt_id_card']);
                  $txt_issued_card = @$connect->real_escape_string($_POST['txt_issued_card']);
                  $txt_expired_card = @$connect->real_escape_string($_POST['txt_expired_card']);
                  $txt_rb = @$connect->real_escape_string($_POST['txt_rb']);
                  $txt_issued_rb = @$connect->real_escape_string($_POST['txt_issued_rb']);
                  $txt_expired_rb = @$connect->real_escape_string($_POST['txt_expired_rb']);

            $query_add = "UPDATE tbl_users SET 
            user_introducer_id='$txt_customer_id',
            user_first_name='$txt_fname',
            user_last_name='$txt_lname',
            user_gender='$txt_gender',
            user_birthday='$txt_dob',
            user_company='$txt_company_name',
            user_status='$txt_status',
            user_email='$txt_email',
            user_phone_number='$txt_telephone_no',
            province_id='$txt_province'
            WHERE user_id='$edit_id'";
            if($connect->query($query_add)==TRUE){

              $check_true = "SELECT customer_id
                             FROM tbl_user_agreement 
                             WHERE customer_id ='$edit_id'";
                $results = $connect->query($check_true);
                 if($results->num_rows > 0) {
                   $query_update = "UPDATE tbl_user_agreement SET 
                        mr_mrs='$txt_mr_ms',
                        occ_user='$txt_occupation',
                        pob='$txt_pob',
                        nation_lity='$txt_nationality',
                        customer_type='$txt_customer_type',
                        note='$txt_note',
                        group_no='$txt_group_no',
                        home_no='$txt_home_no',
                        street_no='$txt_street_no',
                        commnune_name='$txt_commune_no',
                        district_no='$txt_district',
                        fax_no='$txt_fax',
                        add_line_one='$txt_address_line_one',
                        add_line_two='$txt_address_line_two',
                        city='$txt_city',
                        zip_code='$txt_zipcode',
                        state='$txt_state',
                        country='$txt_country',
                        cell_phone='$txt_cell_phone',
                        passport_no='$txt_pass_port',
                        iss_pass='$txt_pass_port_issued',
                        exp_pass='$txt_expired_date',
                        id_card_no='$txt_id_card',
                        iss_card='$txt_issued_card',
                        exp_card='$txt_expired_card',
                        rb_no='$txt_rb',
                        iss_book='$txt_issued_rb',
                        exp_book='$txt_expired_rb'

                        WHERE customer_id='$edit_id'";
                        if($connect->query($query_update)==TRUE){
                           $sms = '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Successfull!</strong> Data inserted...
                            </div>';
                        }
                        else{
                              $sms = '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <strong>Error!</strong> Query error ...

                              </div>';   
                              //echo  mysqli_error($connect);
                          }



                 }
                 else {
                    $query_insert_agree = "INSERT INTO tbl_user_agreement(
                        customer_id,
                        mr_mrs,
                        occ_user,
                        pob,
                        nation_lity,
                        customer_type,
                        note,
                        group_no,
                        home_no,
                        street_no,
                        commnune_name,
                        district_no,
                        fax_no,
                        add_line_one,
                        add_line_two,
                        city,
                        zip_code,
                        state,
                        country,
                        cell_phone,
                        passport_no,
                        iss_pass,
                        exp_pass,
                        id_card_no,
                        iss_card,
                        exp_card,
                        rb_no,
                        iss_book,
                        exp_book
                        )
                     VALUES(
                      '$edit_id',
                      '$txt_mr_ms',
                      '$txt_occupation',
                      '$txt_pob',
                      '$txt_nationality',
                      '$txt_customer_type',
                      '$txt_note',
                      '$txt_group_no',
                      '$txt_home_no',
                      '$txt_street_no',
                      '$txt_commune_no',
                      '$txt_district',
                      '$txt_fax',
                      '$txt_address_line_one',
                      '$txt_address_line_two',
                      '$txt_city',
                      '$txt_zipcode',
                      '$txt_state',
                      '$txt_country',
                      '$txt_cell_phone',
                      '$txt_pass_port',
                      '$txt_pass_port_issued',
                      '$txt_expired_date',
                      '$txt_id_card',
                      '$txt_issued_card',
                      '$txt_expired_card',
                      '$txt_rb',
                      '$txt_issued_rb',
                      '$txt_expired_rb'
                      )
                      ";
                       if($connect->query($query_insert_agree)==TRUE){
                           $sms = '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Successfull!</strong> Data inserted...
                            </div>';
                        }
                        else{
                            $sms = '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Error!</strong> Query error ...
                            </div>';   
                           // echo  mysqli_error($connect);
                        }
                 }

               
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
                <h3><b style=";font-family: Khmer OS Muol; ">កែប្រែ អតិថិជន</b></h3>
                <b style="font-size: 20px;">​​​​​​​​​​EDIT CUSTOMER</b><br><br>
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
                    <?php
                        $edit_id = $_GET["edit_id"]; 
                        $query="SELECT * FROM tbl_users 
                                LEFT JOIN tbl_user_agreement
                                ON tbl_users.user_id=tbl_user_agreement.customer_id
                                WHERE user_id='$edit_id'";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                    ?>
                    <div class="form-body">
                        <div class="row">
                          
                           <div class="col-md-4">
                                 <div class="panel panel_custom" style="padding:10px;">
                                     <label style="color:blue;font-size: 15px;">Customer Name</label>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Photo</label>
                                        <div class="col-sm-8">
                                        <?php 
                               if($row["user_position"]=="2") {
                            ?>
                            <?php
                               if(($row['add_bye'] >0) && ($row["user_position"]=="2")) {
                            ?>
                             <img style="width:120px;height:120px;" src="../image/img_customer/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">

                            <?php } else { ?>
                            <img style="width:120px;height:120px;" src="../../../system/img/img_customer/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">
                            <?php } ?>
                           
                           
                           <?php } elseif ($row["user_position"]=="3") { ?>
                           <?php
                               if(($row['add_bye'] >0) && ($row["user_position"]=="3")) {
                            ?>
                             <img style="width:120px;height:120px;" src="../image/img_partner/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">

                            <?php } else { ?>
                            <img style="width:120px;height:120px;" src="../../../system/img/img_partner/<?php echo $row["user_photo"]; ?>" alt="<?php echo $row["user_name"]; ?>">
                            <?php } ?>

                           <?php  } ?>
                                        </div>
                                      </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Title</label>
                                        <div class="col-sm-8">
                                          <select name="txt_mr_ms" class="form_input_size">
                                            <option <?php if($row['mr_mrs']=="Mr") {echo "selected='selected'";} ?> value="Mr">Mr</option>
                                            <option <?php if($row['mr_mrs']=="Mrs") {echo "selected='selected'";} ?> value="Mrs">Mrs</option>
                                          </select>
                                        </div>
                                      </div>
                                       <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Customer&nbsp;ID</label>
                                        <div class="col-sm-8">
                                          <input readonly name="txt_customer_id" type="text" class="form_input_size" value="<?php echo $row['user_introducer_id']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">First Name</label>
                                        <div class="col-sm-8">
                                          <input name="txt_fname" type="text" class="form_input_size" value="<?php echo $row['user_first_name']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Last Name</label>
                                        <div class="col-sm-8">
                                          <input name="txt_lname" type="text" class="form_input_size" value="<?php echo $row['user_last_name']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Occupation</label>
                                        <div class="col-sm-8">
                                          <input name="txt_occupation" type="text" class="form_input_size" value="<?php echo $row['occ_user']; ?>">
                                        </div>
                                      </div>
                                       <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Gender</label>
                                        <div class="col-sm-8">
                                          <select name="txt_gender" class="form_input_size">
                                            <option <?php if($row['user_gender']=='Male') echo "selected='selected'"; ?> value="Male">Male</option>
                                            <option <?php if($row['user_gender']=='Female') echo "selected='selected'"; ?> value="Female">Female</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Date Of Birth</label>
                                        <div class="col-sm-8">
                                        <input value="<?php echo $row['user_birthday']; ?>" name="txt_dob" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="" type="text"  class="form_input_size" id="datepicker">
                                          
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Place Of Birth</label>
                                        <div class="col-sm-8">
                                          <input name="txt_pob" type="text" class="form_input_size" value="<?php echo $row['pob']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Nationality</label>
                                        <div class="col-sm-8">
                                          <input name="txt_nationality" type="text" class="form_input_size" value="<?php echo $row['nation_lity']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Company&nbsp;Name</label>
                                        <div class="col-sm-8">
                                          <input name="txt_company_name" type="text" class="form_input_size" value="<?php echo $row['user_company']; ?>">
                                        </div>
                                      </div>
                                       <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Customer&nbsp;Type</label>
                                        <div class="col-sm-8">
                                          <select name="txt_customer_type" class="form_input_size">
                                            <option <?php if($row['customer_type']=='Persional') echo "selected='selected'"; ?> value="Persional">Persional</option>
                                           
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Note</label>
                                        <div class="col-sm-8">
                                          <input name="txt_note" type="text" class="form_input_size" value="<?php echo $row['note']; ?>">
                                        </div>
                                      </div>


                                </div>
                           </div>
                                  <div class="col-md-4">
                                 <div class="panel panel_custom" style="padding:10px;">
                                     <label style="color:blue;font-size: 15px;">Local Contact</label>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Group N&deg;</label>
                                        <div class="col-sm-8">
                                          <input name="txt_group_no" type="text" class="form_input_size" value="<?php echo $row['group_no']; ?>">
                                        </div>
                                      </div>
                                       <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Home N&deg;</label>
                                        <div class="col-sm-8">
                                          <input name="txt_home_no" type="text" class="form_input_size" value="<?php echo $row['home_no']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Street N&deg;</label>
                                        <div class="col-sm-8">
                                          <input name="txt_street_no" type="text" class="form_input_size" value="<?php echo $row['street_no']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Commune&nbsp;Name</label>
                                        <div class="col-sm-8">
                                          <input name="txt_commune_no" type="text" class="form_input_size" value="<?php echo $row['commnune_name']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">District</label>
                                        <div class="col-sm-8">
                                          <input name="txt_district" type="text" class="form_input_size" value="<?php echo $row['district_no']; ?>">
                                        </div>
                                      </div>
                                       <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Province</label>
                                        <div class="col-sm-8">
                                          <select name="txt_province" class="form_input_size">
                                           <?php
                                             $v_sql = "SELECT * FROM tbl_province ORDER BY pv_title";
                                             $result = $connect->query($v_sql);
                                             if ($result->num_rows > 0){
                                             while($rows = $result->fetch_assoc()){
                                           ?>
                                             <option <?php if($row['province_id']==$rows['pv_id']){echo "selected='selected'";} ?> value="<?php echo $rows['pv_id']; ?>"><?php echo $rows['pv_title']; ?></option>

                                           <?php
                                              }
                                            }
                                           ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Telephone N&deg;</label>
                                        <div class="col-sm-8">
                                        <input name="txt_telephone_no" type="text" class="form_input_size" value="<?php echo $row['user_phone_number']; ?>">
                                          
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">E-mail</label>
                                        <div class="col-sm-8">
                                          <input name="txt_email" type="text" class="form_input_size" value="<?php echo $row['user_email']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Fax</label>
                                        <div class="col-sm-8">
                                          <input name="txt_fax" type="text" class="form_input_size" value="<?php echo $row['fax_no']; ?>">
                                        </div>
                                      </div>
                                      
                                   


                                </div>
                                <div class="panel panel_custom" style="padding:10px;">
                                     <label style="color:blue;font-size: 15px;">Internation Contact</label>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Address&nbsp;Line&nbsp;1</label>
                                        <div class="col-sm-8">
                                          <input name="txt_address_line_one" type="text" class="form_input_size" value="<?php echo $row['add_line_one']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Address&nbsp;Line&nbsp;2</label>
                                        <div class="col-sm-8">
                                          <input name="txt_address_line_two" type="text" class="form_input_size" value="<?php echo $row['add_line_two']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">City</label>
                                        <div class="col-sm-8">
                                          <input name="txt_city" type="text" class="form_input_size" value="<?php echo $row['city']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Zipcode</label>
                                        <div class="col-sm-8">
                                          <input name="txt_zipcode" type="text" class="form_input_size" value="<?php echo $row['zip_code']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">State</label>
                                        <div class="col-sm-8">
                                          <input name="txt_state" type="text" class="form_input_size" value="<?php echo $row['state']; ?>">
                                        </div>
                                      </div>
                                       <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                          <input name="txt_country" type="text" class="form_input_size" value="<?php echo $row['country']; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Cell Phone</label>
                                        <div class="col-sm-8">
                                          <input name="txt_cell_phone" type="text" class="form_input_size" value="<?php echo $row['cell_phone']; ?>">
                                        </div>
                                      </div>

                              </div>

                           </div>

                           <div class="col-md-4">
                                 <div class="panel panel_custom" style="padding:10px;">
                                     <label style="color:blue;font-size: 15px;">Support Document</label>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Passport N&deg;</label>
                                        <div class="col-sm-8">
                                         <input name="txt_pass_port" type="text" class="form_input_size" value="<?php echo $row['passport_no']; ?>">
                                        </div>
                                     </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Issued&nbsp;Date</label>
                                        <div class="col-sm-8">
                                         <input name="txt_pass_port_issued" type="text" class="form_input_size" value="<?php echo $row['iss_pass']; ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Expired&nbsp;Date</label>
                                        <div class="col-sm-8">
                                         <input name="txt_expired_date" type="text" class="form_input_size" value="<?php echo $row['exp_pass']; ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                        </div>
                                     </div>
                                </div> 
                                <div class="panel panel_custom" style="padding:10px;">
                                     <label style="color:blue;font-size: 15px;">ID Card</label>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">ID Card N&deg;</label>
                                        <div class="col-sm-8">
                                         <input name="txt_id_card" type="text" class="form_input_size" value="<?php echo $row['id_card_no']; ?>">
                                        </div>
                                     </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Issued&nbsp;Date</label>
                                        <div class="col-sm-8">
                                         <input name="txt_issued_card" type="text" class="form_input_size" value="<?php echo $row['iss_card']; ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Expired&nbsp;Date</label>
                                        <div class="col-sm-8">
                                         <input name="txt_expired_card" type="text" class="form_input_size" value="<?php echo $row['exp_card']; ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                        </div>
                                     </div>
                                </div>
                                <div class="panel panel_custom" style="padding:10px;">
                                     <label style="color:blue;font-size: 15px;">Residentail Book</label>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">RB N&deg;</label>
                                        <div class="col-sm-8">
                                         <input name="txt_rb" type="text" class="form_input_size" value="<?php echo $row['rb_no']; ?>">
                                        </div>
                                     </div>
                                      <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Issued&nbsp;Date</label>
                                        <div class="col-sm-8">
                                         <input name="txt_issued_rb" type="text" class="form_input_size" value="<?php echo $row['iss_book']; ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                        </div>
                                     </div>
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Expired&nbsp;Date</label>
                                        <div class="col-sm-8">
                                         <input name="txt_expired_rb" type="text" class="form_input_size" value="<?php echo $row['exp_book']; ?>" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
                                        </div>
                                     </div>
                                </div> 
                                 <div class="panel panel_custom" style="padding:10px;">
                                    
                                     <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Status</label>
                                        <div class="col-sm-8">
                                        <select name="txt_status" class="form_input_size">
                                            <option <?php if($row['user_status']=="1"){echo "selected='selected'";} ?> value="1">Active</option>
                                            <option <?php if($row['user_status'] !="1"){echo "selected='selected'";} ?> value="0">UnActive</option>
                                          </select>
                                        </div>
                                     </div>
                                    
                                </div> 
                                <div class="panel panel_custom" style="padding:10px;">
                                    
                                     <div class="form-group row">
                                          <button style="margin-left: 35px;" type="submit" name="btn_save" class="btn blue"><i class="fa fa-plus fa-fw"></i>Save</button>
                                          <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                                          
                                     </div>
                                    
                                </div> 
                         </div>
                          


                        </div>
                    </div>
                    <?php }} ?>
                </form><br>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
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
