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
           <center style="text-transform: uppercase;"><h2>partner income & paid history</h2></center>
        </div>
    </div>
   
    <!-- calender start -->
    <div class="row">
        <div class="col-md-8">
            <form>
              <?php
                $s_input_month=@$connect->real_escape_string($_GET['txt_month']);
                $s_input_year=@$connect->real_escape_string($_GET['txt_year']);
                $owner_id=@$_SESSION['user']->user_id;
               

              ?>
              <?php

                          $query="SELECT *
                                FROM tbl_partner_income_paid_history 
                                WHERE pre_by !='' AND app_by !='' AND  partner_id='$owner_id'
                                AND 
                                (
                                start_date >='$s_input_month' AND 
                                start_date <='$s_input_year'
                                )

                             
                               
                                 ORDER BY start_date DESC limit 1
                                
                        ";
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                          $app=$row['app_by'];
                          $pre=$row['pre_by'];

                       ?>

                       <?php
                           }
                        }
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
                <div class="col-md-2">
                        <button style='float: right;margin-right: -25px;' type=""submit"" class="btn btn-primary"><i class="fa fa-eye"></i> View Now</button>
                </div>
                <div class="col-md-2">
                       <a target="_blank" class="btn btn-danger" href="print.php?txt_month=<?php echo $s_input_month; ?>&txt_year=<?php echo $s_input_year; ?>
                       &pre_by=<?php echo $pre; ?>&app_by=<?php echo $app; ?>">
                      <i class="fa fa-print"></i> Print</a>
                </div>

              
            
              </div>
                <br>
             
              
              
            </form>
        </div>
        

        <div class="col-md-4">

        <div class="col-md-2" style="float:left;">
           
        </div>
            
      
         <div class="col-md-2" style="float:left;margin-left:33px;">
       
               
                
         </div>
        </div>

    </div>
    <!-- end calendar -->

        <br>
    <div class="row">

        <div class="col-md-12">
           <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th >Date</th>
                                        <th >ID N&deg;</th>
                                        <th >Partner Name</th>
                                        <th >Phone</th>
                                        <th >Email</th>
                                        <th >Prepared By</th>
                                        <th >Approved By</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                         <!-- vehicle         -->
                 <?php
         $search_month=@$connect->real_escape_string($_GET['txt_month']);
         $search_year=@$connect->real_escape_string($_GET['txt_year']);
      
          if($search_month !=""){
            $search_month = @$connect->real_escape_string($_GET['txt_month']);
          }
          else {
            $search_month ="";
          }
           if($search_year !=""){
            $search_year = @$connect->real_escape_string($_GET['txt_year']);
          }
          else {
            $search_year ="";
          }

         
                     $query="SELECT *
                                FROM tbl_partner_income_paid_history 
                              
                                LEFT JOIN tbl_users
                                ON tbl_users.user_id=tbl_partner_income_paid_history.partner_id
                                WHERE partner_id='$owner_id'
                                AND 
                                (
                                start_date >='$search_month' AND 
                                start_date <='$search_year'
                                )
                               
                               
                                 ORDER BY start_date DESC 
                        ";
                        $result = $connect->query($query);

                       
                      
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){

                          ?>

                                  <tr>
                                     <td>
                                        <label style="width:70px;">
                                         
                                           <?php  
                                            $start_date = strtotime($row['start_date']);
                                              echo date('d M y', $start_date); 
                                            ?>
                                        </label>
                                    </td>
                                     <td>
                                     <label style="width:120px;font-size: 9px;">
                                         <?php  
                                            echo $row['user_introducer_id'];
                                            ?>
                                    </label>
                                    </td>
                                     <td>
                                      <label style="width:130px;text-align: left;">
                                          <?php
                                            echo $row['user_first_name'].''.$row['user_last_name'];
                                          ?>
                                    </label>
                                    </td>
                                     <td>
                                   <label style="width:90px;">
                                          <?php
                                            echo $row['user_phone_number']; 
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                   <label style="width:200px;">
                                          <?php
                                            echo $row['user_email'];
                                          ?>
                                    </label>
                                    </td>
                                    
                                     
                                    <td>
                                    <label style="width:120px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>
                                    <td>
                                    <label style="width:60px;">
                                          <?php
                                            echo $row['app_by'];
                                          ?>
                                    </label>
                                    </td>

                                   
                                    
                                    
                                  
                                   
                                  </tr>
                            <?php

                                }
                            }
                            ?>   
                    <!-- end vehicle                        -->

                  
                                </tbody>
                            </table>
                      </div>
        </div>
        

    </div>
    
    




</div>



<style type="text/css">
    
    table th ,td {
        border: 1px solid black;
        text-align:center;
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