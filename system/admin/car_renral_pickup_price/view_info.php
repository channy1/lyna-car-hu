<?php 
    $menu_active =3;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php 
  if(isset($_POST['btn_add'])){
       
            $txt_vehicle = @$connect->real_escape_string($_POST['txt_vehicle']);
            $txt_vat = @$connect->real_escape_string($_POST['txt_vat']);
            $txt_status = @$connect->real_escape_string($_POST['txt_status']);

            // start insert multy rows
            
           
            $fix_name='txt_province_from';
            for ($x = 0; $x <=27; $x++) {
             
               if($fix_name.$x !="") {


                  $txt_province_from =@$connect->real_escape_string($_POST['txt_province_from'.$x]);
                  $txt_province_to = @$connect->real_escape_string($_POST['txt_province_to'.$x]);
                  $txt_distance = @$connect->real_escape_string($_POST['txt_distance'.$x]);
                  $txt_note = @$connect->real_escape_string($_POST['txt_note'.$x]);
                 
                    if($txt_province_from !="") {

  

                  $query_add = "INSERT INTO tbl_carrental_pickup_price(
                     `car_id`,
                     `pro_from_id`,
                     `pro_to_id`,
                     `carrental_price`,
                     `note`,
                     `status`,
                     `vat`
                    ) VALUES(
                     '$txt_vehicle',
                     '$txt_province_from',
                     '$txt_province_to',
                     '$txt_distance',
                     '$txt_note',
                     '$txt_status',
                     '$txt_vat'

                    )";

// echo  $query_add;
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









               
               }
               else {

                $sms = '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> '.mysqli_error($connect).'...
                </div>';   

               }



            } 


       



            
    }


 ?>


<div class="portlet light bordered trant">
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
                <h3><b style=";font-family: Khmer OS Muol; ">តម្លៃ រថយន្តជួល</b></h3>
                <b style="font-size: 20px;">ADD CARRENTAL PICKUP PRICE</b><br><br>
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
    <div class="portlet-body" style="margin-top: -15px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body"style="background-color:   #800080;">
                 <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                    
                        <fieldset style="border: 1px solid white;">
              <legend style="background: none; text-align: center; margin-left: 50px;  color:white !important;">
                <span style="color:white;">CARRENTAL PICKUP PRICE SERVICES</span>
              </legend>
                <div style="padding: 10px;">
                  

                    <div class="form-group row">
                    <div class="col-sm-2">
                          
                    </div>
                      <label for="staticEmail" class="col-sm-2">Vehicle Ref. N&deg;</label>
                      <div class="col-sm-6">
                         <select class="form-control" name="txt_vehicle" id="vehicle">
                                <?php
                                  $v_sql = "SELECT * FROM tbl_vehicle_rantal";
                                  $result = $connect->query($v_sql);
                                   if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['ve_id']; ?>"><?php echo $row['ve_ref_no']; ?></option>
                              <?php
                                 }
                               }
                              ?>
                         
                         </select>
                      </div>
 <div class="col-sm-2">
                          
                    </div>
                      
                    </div>
                      <br>

                <div id="display_info">
                   


                </div>


                          

                </div>
              </fieldset>
                <br>
               <fieldset style="border: 1px solid white;">


               
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-8"><h2></h2></div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                   <center>
                      <button type="submit" name="btn_add" class="btn blue"><i class="fa fa-plus fa-fw"></i>Add</button>
                      <button type="reset" class="btn yellow"><i class="fa fa-eraser fa-fw"></i>Reset</button>
                      <a href="index.php" class="btn red"><i class="fa fa-undo fa-fw"></i>Cancel</a>
                   </center>
                     <br>
                     <br>

               </fieldset>
                           

                        </div>
                    </div>
                  
                </form>

                <br>
            </div>
        </div>
    </div>
</div>



<style type="text/css">
 .trant b,span{color:#800080; font-weight: 900;}
 .trant label {
  color: white;
 }
 table td,table th {
  color: white;
 }
.list-group-item span {
  color: #a4509f;
}
.table-wrapper {
   
    /*    background: #fff;*/
        padding: 20px;  
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
    }
  .table-title .add-new i {
    margin-right: 4px;
  }
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
    cursor: pointer;
        display: inline-block;
        margin: 0 5px;
    min-width: 24px;
    }    
  table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
  table.table td a.add i {
        font-size: 24px;
      margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
  table.table .form-control.error {
    border-color: #f50000;
  }
  table.table td .add {
    display: none;
  }
</style>



<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  var actions = $("table td:last-child").html();
  // Append table with add row form on add new button click
    $(".add-new").click(function(){
    // $(this).attr("disabled", "disabled");
    var index = $("table tbody tr:last-child").index();
    var index_loop=index+1;
    
    if(index <=26){

   
        var row = '<tr>' +
            '<td><select class="form-control" name="txt_province_from'+index_loop+'" id="txt_province_from"><?php $v_sql = "SELECT * FROM tbl_province";$result = $connect->query($v_sql);while($row = $result->fetch_assoc()) {  ?><option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option><?php } ?></select></td>' +
            '<td><select class="form-control" name="txt_province_to'+index_loop+'" id="txt_province_to"><?php $v_sql = "SELECT * FROM tbl_province";$result = $connect->query($v_sql);while($row = $result->fetch_assoc()) {  ?><option value="<?php echo $row['pv_id']; ?>"><?php echo $row['pv_title']; ?></option><?php } ?></select></td>' +
            '<td><input type="text" class="form-control" name="txt_distance'+index_loop+'" id="txt_distance'+index_loop+'"></td>' +
            
            '<td><textarea class="form-control txt_note" id="txt_note" name="txt_note'+index_loop+'" ></textarea></td>' +
      '<td style="color:#800080;"> <a class="delete" title="Delete" data-toggle="tooltip"><i class="fa fa-remove"></i></a>' + index_loop + '</td>' +
        '</tr>';
      }
      else {
         alert("Add new limit 27");
      }
      $("table").append(row); 
     // alert(index);
    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();

        
       

       
       


    });
  // Add row on add button click
  $(document).on("click", ".add", function(){
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
      if(!$(this).val()){
        $(this).addClass("error");
        empty = true;

      } else{
         // insert here 

                $(this).removeClass("error");

            }
    });
    $(this).parents("tr").find(".error").first().focus();
    if(!empty){
      input.each(function(){
        $(this).parent("td").html($(this).val());
      });     
      $(this).parents("tr").find(".add, .edit").toggle();
      $(".add-new").removeAttr("disabled");
    }   
    });
  // Edit row on edit button click
  $(document).on("click", ".edit", function(){    
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
      $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
    });   
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    });
});
</script>


<script type="text/javascript">
   $(document).ready(function(){
        $('#vehicle').on('click',function(){
        
            var ve_id_ajax =$('#vehicle').val();
             // alert(ve_id_ajax);
            $.ajax({
                type:'POST',
                url:'display_info.php',
                // dataType: "json",
                data:{ve_id_ajax:ve_id_ajax},
                success:function(data){
                   $( '#display_info' ).html(data);

                    if(data.status == 'ok'){

                        // $('#userName').text(data.result.name);
                        // $('#userEmail').text(data.result.email);
                        // $('#userPhone').text(data.result.phone);
                        // $('#userCreated').text(data.result.created);
                        // $('.user-content').slideDown();
                    }else{
                        // $('.user-content').slideUp();
                        // alert("User not found...");
                    } 
                }
            });
        });
    });

 $(document).ready(function(){
       
        
            var ve_id_ajax =<?php echo $_GET['id']; ?>
             // alert(ve_id_ajax);
            $.ajax({
                type:'POST',
                url:'display_info.php',
                // dataType: "json",
                data:{ve_id_ajax:ve_id_ajax},
                success:function(data){
                   $( '#display_info' ).html(data);

                    if(data.status == 'ok'){

                        // $('#userName').text(data.result.name);
                        // $('#userEmail').text(data.result.email);
                        // $('#userPhone').text(data.result.phone);
                        // $('#userCreated').text(data.result.created);
                        // $('.user-content').slideDown();
                    }else{
                        // $('.user-content').slideUp();
                        // alert("User not found...");
                    } 
                }
            });
      
    });

</script>
<style type="text/css">
textarea {
  overflow: hidden;
  
}
.txt_note {
  line-height:20px !important;
}
</style>
<?php include_once '../layout/footer.php' ?>
