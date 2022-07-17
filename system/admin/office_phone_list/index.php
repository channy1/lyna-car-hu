<?php 
    $menu_active =1;
    $layout_title = "Welcome Quotations";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';  
    $sql = "SELECT * FROM tbl_phone_line WHERE type>=1";
    $result = $connect->query($sql);
    while ($row = mysqli_fetch_object($result)){
      $r[] = $row;        
    }

    // if(isset($_POST['btn_view'])) {      
    //   // $type=@$connect->real_escape_string($_POST['txt_parner_name']);
    //   $sql = "SELECT * FROM tbl_phone_line WHERE type>=1";
    //   $result = $connect->query($sql);
    //   while ($row = mysqli_fetch_object($result)){
    //     $r[] = $row;        
    //   }     
    // }
?>
<div class="portlet light bordered">  
  <!-- calender start -->
  <div class="row">
    <div class="col-md-8">
      <form method="post" enctype="">        
        <div class="form-group row">                    
          
        <div class="col-md-4">
          <div class="col-md-2" style="float:left; margin-right: 36px;">                        
            <a href="print_letter.php" target="_blank" class="btn btn-primary">
              Print
            </a>
          </div>             
          <div class="col-md-2" style="float:left; margin-right: 10px;">
          <a target="_blank" class="btn btn-danger" href="add_phone_line.php"><i class="fa fa-calendar"></i> Add</a>
          </div>
          <div class="col-md-2" style="float:left;margin-left:33px;">
            <a target="_blank" class="btn btn-danger" href="list.php">
            <i class="fa fa-calendar"></i> Manage</a>
                 
                  
           </div>        
        </div>
            
              </div>
                <br>                                  
            </form>
        </div>              
    </div>
    <!-- end calendar -->
    
    <div class="row" id="for_print">
      <div class="col-xs-12">
        <center><h2>3. OFFICE PHONE LINES</h2></center>
        <center><strong>OWNERS</strong></center>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 25%;">CONTACT PERSON</th>
              <th style="width: 30%;">TITLE</th>
              <th>TEL. NO.</th>
              <th style="width: 30%;">REMARKS</th>
            </tr>
          </thead>
          <?php
            foreach ($r as $val) {
              if($val->type==1){
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $val->contact_person;?></td>
                      <td><?php echo $val->title;?></td>
                      <td>
                        <?php echo(str_replace('/', '<br>', $val->tel));?>
                      </td>
                      <td><?php echo $val->remark;?></td>
                    </tr>
                  </tbody>
                <?php
              }
            }
          ?>
        </table>
      </div>

      <div class="col-xs-12">
        <center><h2>PHONE LINES</h2></center>
        <center><strong>LYNA-CARRENTAL.COM</strong></center>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 25%;">CONTACT PERSON</th>
              <th style="width: 30%;">TITLE</th>
              <th>TEL. NO.</th>
              <th style="width: 30%;">REMARKS</th>
            </tr>
          </thead>
          <?php
            foreach ($r as $val) {
              if($val->type==2){
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $val->contact_person;?></td>
                      <td><?php echo $val->title;?></td>                    
                      <td>
                        <?php echo(str_replace('/', '<br>', $val->tel));?>
                      </td>                      
                      <td><?php echo $val->remark;?></td>
                    </tr>
                  </tbody>
                <?php
              }
            }
          ?>
        </table>
      </div>

      <div class="col-xs-12">
        <center><h2>PHONE LINES</h2></center>
        <center><strong>LYNA-GARAGE.COM</strong></center>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 25%;">CONTACT PERSON</th>
              <th style="width: 30%;">TITLE</th>
              <th>TEL. NO.</th>
              <th style="width: 30%;">REMARKS</th>
            </tr>
          </thead>
          <?php
            foreach ($r as $val) {
              if($val->type==3){
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $val->contact_person;?></td>
                      <td><?php echo $val->title;?></td>
                      <td>
                        <?php echo(str_replace('/', '<br>', $val->tel));?>
                      </td>
                      <td><?php echo $val->remark;?></td>
                    </tr>
                  </tbody>
                <?php
              }
            }
          ?>
        </table>
      </div>

      <div class="col-xs-12">
        <center><h2>PHONE LINES</h2></center>
        <center><strong>GRACE TRADING.NET</strong></center>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 25%;">CONTACT PERSON</th>
              <th style="width: 30%;">TITLE</th>
              <th>TEL. NO.</th>
              <th style="width: 30%;">REMARKS</th>
            </tr>
          </thead>
          <?php
            foreach ($r as $val) {
              if($val->type==4){
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $val->contact_person;?></td>
                      <td><?php echo $val->title;?></td>                      
                      <td>
                        <?php echo(str_replace('/', '<br>', $val->tel));?>
                      </td>               
                      <td><?php echo $val->remark;?></td>
                    </tr>
                  </tbody>
                <?php
              }
            }
          ?>
        </table>
      </div>
  </div>
</div>
<style type="text/css">
  table{
    width: 100%;
  }
  table thead tr th{
    text-align: center;
    color: white;
    background-color: #1f2549;
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
