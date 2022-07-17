<?php 
    include_once '../../config/database.php';
?>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

 <style media="print">
   
 @media print {
           .row >.col-md-12 table>tbody>tr>th{
                border-width: 1px !important;
                border-style: solid !important;
                border-color: #000 !important;
                background-color: gray !important;    
                 -webkit-print-color-adjust: exact; 
            }
    }    
 </style>
<div class="portlet light bordered">
  <div class="row">
     
            <table class="table table-bordered" style="float: left; margin-top: 10px; line-height: 2px;">
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
                  $m = strtotime($in_date);
                  $month = date('F', $m);
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
                if ($type==1) {
                  echo "<h3>1.  Thank you Letter to the Customer Return the Rented Car</h3>";
                }else{
                  echo "<h3>2. List of Incoming & Outgoing Mails</h3>";
                }                               
                while($row = mysqli_fetch_object($result)) {  
                  if($i==0){
                    ?>
                      <div class="col-xl-12" style="float: right;">
                        <div class="row">
                            <label style="margin-left: 20px; font-weight: normal;">Month of:</label>
                            <input type="text" name="" value="<?= $month;?>" style="width: 140px;"><br>
                            <label style="font-weight: normal;">Prepared by:</label>
                            <input type="text" name="" value="<?php echo $row->user_first_name;?> <?php echo $row->user_last_name;?>" style="width: 140px;">
                        </div>
                      </div>
                    <?php
                  }
                    ?>                      
                      <tbody>
                        <tr>
                          <td style="line-height: 3px;"><?=++$i;?></td>                                    
                          <td style="line-height: 3px;width: 100px;"><?=$row->cus_name;?></td>            
                          <td style="line-height: 3px;width: 100px;"><?=$row->email_address;?></td>
                          <td style="line-height: 3px;width:150px;"><?=$row->subject;?></td>
                          <td style="line-height: 3px;width:100px;"><?=$row->in_date;?></td>
                          <td style="line-height: 3px;width:100px;"><?=$row->out_date;?></td>
                          <td style="line-height: 3px;width:120px;"><?=$row->user_first_name;?> <?=$row->user_last_name;?></td>
                          <td style="line-height: 2px;"><?=$row->status_remarks;?></td>
                        </tr>
                      </tbody>
                    <?php                               
                }
                $r = 31-(int)$i;
                for($ro = 1; $ro<= $r; $ro++){
                  ?>
                    <tbody>
                        <tr>
                          <td style="line-height: 3px;"><?=++$i;?></td>            
                          <td style="line-height: 3px;"></td>            
                          <td style="line-height: 3px;"></td>
                          <td style="line-height: 3px;"></td>
                          <td style="line-height: 3px;"></td>
                          <td style="line-height: 3px;"></td>
                          <td style="line-height: 3px;"></td>
                          <td style="line-height: 3px;"></td>
                        </tr>
                      </tbody>
                  <?php
                }
              ?>
            </table>
  </div>
</div>             
 
<style type="text/css">
  body{   
  }
  .row {
  margin-left: 10px !important;
  margin-right: 12px !important;
 }
  h3{
    margin: auto;
    text-align: center;    
  }  
  table thead tr th {
        font-size:11px !important;
        font-family: Arial;
        padding: 0;
    }
  table th ,td {
        border: 1px solid black;
        text-align:center;
        font-size:11px;
        font-family: Arial;        
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
}
</style>
 <script type="text/javascript">
    window.print();
</script>