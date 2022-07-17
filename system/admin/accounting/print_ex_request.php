<?php 
    include_once '../../config/database.php';
?>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style type="text/css" media="print">
 @media print {
         
          .none-border {
    background-color: #a4509f !important;
    -webkit-print-color-adjust: exact;

    }
            .table  tbody tr th {
            font-size: 14px !important;
            font-family: Arial;
             background-color: #eef1f5 !important;
             -webkit-print-color-adjust:exact;
            
           }
        .table tbody tr th {
            border: 1px solid black !important;
        }
        .table tr td {
             border: 1px solid black !important;
        }
        .portlet label span {
          color: blue !important;
        }
        .table   tr td{
           background-color: #a4509f !important;
         
        }
      

    }    
 </style>
<div class="portlet light bordered">
   
   <div style="width: 100%;">
      <div class="left_header" style="width: 35%;">
        <label style="display: block;margin-bottom: 0px;">Req. N&deg;: <span style="color: blue;border-bottom:1px solid black;width:100px;"><?php echo ''.date("Ymd").''.rand(10,1000000); ?></span></label>
        <label style="display: block;margin-bottom: 0px;">For Month: <span style="color: blue;border-bottom:1px solid black;"><?php  
                        $month_year = strtotime($_GET['txt_month']);
                          echo date('F Y', $month_year); 
                        ?></span></label>
        <label style="display: block;margin-bottom: 0px;">Date: <span style="color: blue;border-bottom:1px solid black;"> <?php  
                        $today = strtotime(date('Y-m-d'));
                          echo date('d F Y', $today); 
                        ?></span></label>
      </div>
      <div class="mid_header" style="width: 30%;">
                   <center>
                         <h4 style="text-transform: uppercase;">
                              expense request form
                         </h4>
                 </center>
      </div>
      <div class="right_header" style="width: 35%;">
        <img src="lyna.jpg" style="width: 100px;height: 100px;margin-right: 27px;">
        <h4 style="text-transform: uppercase;font-size: 14px;display: block;margin-bottom:2px;">
                lyna-carrental.com
        </h4>
        <label style="margin-right:13px;">YOUR BEST CHOICE</label>
      </div>

   </div>
   
<div style="clear: both;"></div>
    <div class="row">
          
        <div class="col-md-12">

          <table class="table" style="border-collapse:collapse;font-size: 12px;margin-top:10px;float: left; font-family:arial;" width="100%">
                    <tbody>
                        <tr>

                            <th style="background-color:#e9ecf3 ;border: 1px solid #000000;" rowspan="2" width="3%" class="aa text-center">N&deg;</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="50%" class="aa text-center">Description</th>

                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" rowspan="2" width="20%" class="aa text-center">Type</th>
                            
                            
                        </tr>
                        <tr style="text-align: center">
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="9%">Qty</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="9%">U.Price</th>
                            <th style="background-color:#e9ecf3;border: 1px solid #000000;" class="aa text-center" width="9%">Amount</th>
                           
                        </tr>
   <!-- car  -->

                    <?php

                      $from=@$connect->real_escape_string($_GET['txt_month']);
                      $to=@$connect->real_escape_string($_GET['txt_year']);
                      $query="SELECT * FROM tbl_expen_request AS A
                              LEFT JOIN tbl_expense_category AS B ON A.ex_category=B.exca_id
                              LEFT JOIN tbl_users AS C ON A.em_id=C.user_id
                              WHERE DATE_FORMAT(date_record,'%Y-%m-%d') BETWEEN '$from' AND '$to'
                              ORDER BY A.date_record DESC
                        ";
                        $result = $connect->query($query);

                       $i=1;
                       $total_amount=0;
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          $total_amount +=$row['ex_amount'];
                    ?>



                      <tr style="height:25px;border:1px!important">
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000;">
                             <?php echo $i++; ?>
                            </td>
                            <td align="left" style="color:#000000;padding-left: 8px;width:40%;border:1px solid #000000">
                                <label>
                                <?php
                                 echo $row['description'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;padding-right: 3px;width:10px;border:1px solid #000000;text-align: center;">
                                <label>
                                 <?php
                                 echo $row['exca_name'];
                                ?>
                              </label> </td>
                            <td align="center" style="color:#000000;width:2%;border:1px solid #000000">
                              <label>
                                 <?php
                                 echo $row['ex_qty'];
                                ?>
                              
                            </label></td>
                            <td align="right" style="color:#000000;padding-right:3px;width:2%;border:1px solid #000000;text-align: center;">
                                <label>                                  
                                 $<?php
                                 echo number_format($row['ex_price'],2);
                                ?>                            
                              </label>
                            </td>

                            <td align="right" style="color:#000000;padding-right :3px;width:2%;border:1px solid #000000;text-align: center;">
                              <label>                                
                                $<?php
                                 echo number_format($row['ex_amount'],2);
                                ?>      
                              </label>
                                </td>
                          
                        </tr>


                        <?php
                            }
                        }
                        ?>
                        <div class="bg_color_tr">
                        <tr class="none-border"  style="height:25px;border:1px!important;background:#a4509f !important;">
                            <td align="center" style="padding-left:8px;width:2%;border:1px solid #000000;">
                            
                            </td>
                            <td align="left" style="color:#000000;padding-left: 8px;width:40%;border:1px solid #000000">
                                <label>
                               
                              </label> </td>
                            <td align="center" style="color:#000000;padding-right: 3px;width:10px;border:1px solid #000000;text-align: center;">
                                <label>
                               
                              </label> </td>
                            <td align="center" style="color:#000000;width:2%;border:1px solid #000000">
                              <label>
                               
                              
                            </label></td>
                            <td align="right" style="color:white;padding-right:3px;width:2%;border:1px solid #a4509f;text-align: center;">
                                <label style="color: white !important;">                                 
                                    Grand Total:                  
                              </label>
                            </td>

                            <td align="right" style="color:#000000;padding-right :3px;width:2%;border:1px solid #000000;text-align: center;">
                              <label style="color: white !important;">                                
                                $<?php echo number_format($total_amount,2); ?>
                              </label>
                                </td>
                          
                        </tr>
                     </div>
                        
                    </tbody>
                </table>
                
        </div>

        <div style="width: 100%;">
          <div style="width: 10%;float: left;"></div>
            <div style="width:40%;float: left;margin-left: 20px;">
              <label style="display: block;text-align: center;margin-bottom: 58px;">PREPARED BY</label>
              <label style="display: block;text-align: center;"></label>
              <label style="display: block;text-align: center;border-top: 1px solid black;width: 26%;margin-left: 37%;"></label>
             
            </div>
            <div style="width:40%;float: right;">
              <label style="display: block;text-align: center;margin-bottom: 58px;">APPROVED BY</label>
              <label style="display: block;text-align: center;"></label>
              <label style="display: block;text-align: center;border-top: 1px solid black;width: 26%;margin-left: 37%;"></label>
            </div>
         <div style="width: 10%;float: right;"></div>
        </div>
        
       
    </div>
</div>
<style type="text/css">
  label {
        color: #000000;
    font-weight:200;
  }
  .right_header {
    float: right;
    text-align: right;
  }
  .left_header {
    float: left;
    margin-top: 10px;
  }
  .mid_header {
    float: left;
    text-align: center;
  }
</style>
 <script type="text/javascript">
window.print();
</script>

  
   