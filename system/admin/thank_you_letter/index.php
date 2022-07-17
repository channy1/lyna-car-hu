<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';   
?>
<div class="portlet light bordered">
  <div class="row">
    <div class="col-xs-12">
      <center><h2>1. Thank you Letter to the Customer Return the Rented Car</h2></center>
    </div>
  </div>

  <!-- calender start -->
  <div class="row">
    <div class="col-md-8">
      <form>
        <?php
          $s_input_month=@$connect->real_escape_string($_GET['txt_month']);
          $s_input_year=@$connect->real_escape_string($_GET['txt_year']);
          $s_txt_parner_name=@$connect->real_escape_string($_GET['txt_parner_name']);
          $type=@$connect->real_escape_string($_GET['txt_type']);          
        ?>
        <div class="form-group row">
          <label for="staticEmail" class="col-md-1 col-form-label">FROM:</label>
          <div class="col-md-3">
                
            <input value="<?php echo $s_input_month ?>" type="text" class="form-control" name="txt_month" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
          </div>

          <label for="staticEmail" class="col-md-1 col-form-label">TO:</label>
          <div class="col-md-3">
                 
            <input value="<?php echo $s_input_year ?>" type="text" class="form-control" name="txt_year" data-provide="datepicker" data-date-format="yyyy-mm-dd" readonly="">
          </div>
           <div class="col-md-4">

                  <!-- prepared by select -->
                  <select name="txt_parner_name" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                    <option data-subtext="" value="">Select One</option>
                      <?php
                          $v_sql = "SELECT * FROM tbl_users 
                                            INNER JOIN tbl_relationship_users_position
                                            ON tbl_users.user_id=tbl_relationship_users_position.user_id
                                            WHERE  tbl_relationship_users_position.user_position_id='10' 
                                            AND
                                             user_first_name !='' AND user_last_name !=''
                                            ORDER BY user_first_name";
                                            $result = $connect->query($v_sql);
                                            if ($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){                                                        
                        ?>
                      <option

                      <?php
                        if($s_txt_parner_name==$row['user_id']) {
                          echo "selected='selected'";
                        }
                      ?>

                       data-subtext="" value="<?php echo $row['user_id']; ?>">
                        <?php echo $row['user_first_name']; ?>
                        <?php echo $row['user_last_name']; ?>
                        </option>
                    <?php
                         }
                        } 
                    ?>
                    </select>
                  <!-- end prepared by select -->
                                    
                </div>
            
              </div>
                <br>
              <div class="form-group row" style="float: right;">

                <div class="col-md-4">
                  <!-- type of form -->
                  <select name="txt_type" class="selectpicker form-control input-sm" data-show-subtext="true" data-live-search="true">
                    <option data-subtext="" value="1" <?php echo $type==1?'selected':'';?>>Thank you Letter</option>                    
                    <option value="2" <?php echo $type==2?'selected':'';?>>Incoming & Outgoing</option>               
                  </select>                  
                </div>&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <!-- end type of form -->
                
                 <div class="col-md-2">
                    <button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
                 </div>
                 <div class="col-md-2">
                   
                    <a target="_blank" class="btn btn-danger" href="print_letter.php?txt_month=<?php echo $s_input_month;?>&txt_year=<?php echo $s_input_year;?>&txt_parner_name=<?php echo $s_txt_parner_name;?>&txt_type=<?php echo $type;?>">
                    <i class="fa fa-print"></i>Print Com</a>
                 </div>

              </div>
              
              
            </form>
        </div>
        

        <div class="col-md-4">

            
        <div class="col-md-2" style="float:left;">
        <a target="_blank" class="btn btn-danger" href="add_thank_you.php"><i class="fa fa-calendar"></i> Add</a>
               
                
        </div>
         <div class="col-md-2" style="float:left;margin-left:33px;">
        <a target="_blank" class="btn btn-danger" href="list.php">
          <i class="fa fa-calendar"></i> Manage</a>
               
                
         </div>
        </div>
    </div>
    <!-- end calendar -->
   
    <br><br><br>
    
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Customer Name</th>
          <th>E-mail Address</th>
          <th>Subject</th>
          <th>In Date</th>
          <th>Out Date</th>
          <th>Action By</th>
          <th>Status/Remarks</th>        
        </tr>
      </thead>      
      <?php
        $in_date = @$connect->real_escape_string($_GET['txt_month']);
        $out_date = @$connect->real_escape_string($_GET['txt_year']);
        $parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
        $type = @$connect->real_escape_string($_GET['txt_type']);

        if($in_date != ''){
          $in_date = @$connect->real_escape_string($_GET['txt_month']);
        }else{
          $in_date = "";
        }
        if($out_date != ""){
          $out_date = @$connect->real_escape_string($_GET['txt_year']);
        }else{
          $out_date="";
        }
        if($parner_name !=""){
          $parner_name = @$connect->real_escape_string($_GET['txt_parner_name']);
        }else{
          $parner_name = '';
        }
        if($type != ""){
          $type = @$connect->real_escape_string($_GET['txt_type']);
        }else{
          $type ="";
        }                    
        $query = "SELECT tbl_cus_letter.*, user.user_first_name, user.user_last_name FROM tbl_cus_letter INNER JOIN tbl_users AS user ON tbl_cus_letter.action_by = user.user_id WHERE in_date >= '$in_date' AND out_date <= '$out_date' AND action_by='$parner_name' AND type='$type'";
        $result = $connect->query($query);
        $i = 0;
        while ($row = mysqli_fetch_object($result)) {          
            ?>
              <tbody>
                <tr>
                  <td><?=++$i;?></td>            
                  <td><?=$row->cus_name;?></td>            
                  <td><?=$row->email_address;?></td>
                  <td><?=$row->subject;?></td>
                  <td><?=$row->in_date;?></td>
                  <td><?=$row->out_date;?></td>
                  <td><?=$row->user_first_name;?> <?=$row->user_last_name;?></td>
                  <td><?=$row->status_remarks;?></td>
                </tr>
              </tbody>
            <?php
        }            
      ?>
    </table>
</div>
<style type="text/css">
    
    table th ,td {
        border: 1px solid black;
        text-align:center;
    }
    input
    {
      border: 1px solid #ccc;
      border-top: 0px;
      border-right: 0px;
      border-left: 0px;
      outline: none;
      text-align: left;     
    }

.tip-content {
  font-weight: 100 !important;
  font-size: 10px;
}

    /* Hover tooltips */
.field-tip {
    position:relative;
    cursor:help;
}
    .field-tip .tip-content {
        position:absolute;
        top:-10px; /* - top padding */
        right:9999px;
        width:200px;
        margin-right:-220px; /* width + left/right padding */
        padding:10px;
        color:#fff;
        background:#333;
        -webkit-box-shadow:2px 2px 5px #aaa;
           -moz-box-shadow:2px 2px 5px #aaa;
                box-shadow:2px 2px 5px #aaa;
        opacity:0;
        -webkit-transition:opacity 250ms ease-out;
           -moz-transition:opacity 250ms ease-out;
            -ms-transition:opacity 250ms ease-out;
             -o-transition:opacity 250ms ease-out;
                transition:opacity 250ms ease-out;
    }
        /* <http://css-tricks.com/snippets/css/css-triangle/> */
        .field-tip .tip-content:before {
            content:' '; /* Must have content to display */
            position:absolute;
            top:50%;
            left:-16px; /* 2 x border width */
            width:0;
            height:0;
            margin-top:-8px; /* - border width */
            border:8px solid transparent;
            border-right-color:#333;
        }
        .field-tip:hover .tip-content {
            right:-20px;
            opacity:1;
        }
   
</style>
<?php include_once '../layout/footer.php' ?>

<script type="text/javascript">
$('.class_tooltips').tooltip('show');
</script>