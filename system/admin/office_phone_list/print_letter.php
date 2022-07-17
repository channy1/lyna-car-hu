<?php 
    $menu_active =1;
    $layout_title = "Print";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';  
    $sql = "SELECT * FROM tbl_phone_line WHERE type>=1";
    $result = $connect->query($sql);
    while ($row = mysqli_fetch_object($result)){
      $r[] = $row;        
    }
  ?>
  <style media="print">
        @media print {
           
            span {
                color: #a4509f !important;
            }
            .table  thead tr th {
            font-size: 14px !important;
            font-family: Arial;
             background-color: #eef1f5 !important;
             -webkit-print-color-adjust:exact;
           }
           .table thead tr th {
            border: 1px solid black !important;
        }
        .table tr td {
             border: 1px solid black !important;
        }
        label {
            font-weight: 100;
        }

        }
    </style>

  <div class="portlet light"> 
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
    table thead tr th
    {
      text-align: center;
      color: white;
      background-color: #1f2549 !important;
    }
    table tbody tr td{
      line-height: 2px;
    }
  </style>
  <script type="text/javascript">
    window.print();
  </script>