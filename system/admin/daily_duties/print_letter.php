<?php 
    $menu_active =1;
    $layout_title = "Print";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    // include_once '../layout/header.php';

    $day_tr = array();
    $opt_checked = array();
    $opt = array();

    $date_start = $_GET['start_date'];
    $date_end = $_GET['end_date'];

    $get = "SELECT * FROM tbl_daily_duties WHERE date_re BETWEEN '$date_start' AND '$date_end' ORDER BY date_re";

    $get_result = $connect->query($get);

    while($row = mysqli_fetch_object($get_result)){
      $r[] = $row;
      $str = strtotime($row->date_re);
      array_push($day_tr, date('d', $str));
      array_push($opt_checked, explode(',', $row->opt_checked));
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?= @$layout_title ?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  
<style media="print">
  @charset "UTF-8";
 
  @media print{
    table > thead > tr:first-child > th {
      text-align: center;
      background-color: yellow !important;
    }
    .headColor > th{
      background-color: yellow !important;
    }
 table > thead > tr > th {
            font-size: 14px !important;
            font-family: Arial;
            
             background-color: red !important;
             -webkit-print-color-adjust:exact;
           }


    table > .div_print_bg > tr:first-child > td{
      background-color: yellow !important;
      -webkit-print-color-adjust:exact;
    }
  }
</style>
</head>
</html>
<body>
  <div class="portlet light">
    <div class="row">
      <?php
        $day = cal_days_in_month ( CAL_GREGORIAN , date('m') , date('Y') );      
      ?>
      <table>
        <thead>
          <tr style="background-color: yellow" class="headColor">
            <th class="yellow_print" style="width: 12%; background-color: yellow;padding:11px;">Descriptions</th>
            <?php
              $i=1;
              while($i<=$day){
                ?>
                  <th style="width:7px;padding:12px;"><?=$i;?></th>
                <?php
                $i++;
              }
            ?>
            <th style="width: 100px;padding:11px;">Remarks</th>              
          </tr>
        </thead> 
        <tbody>
          <?php
            $sub_j_id = array(
                              'រថយន្ដប្ដូប្រេងម៉ាស៊ីន (ធម្មតា)'=>'1.1',
                              'រថយន្ដប្រើសេវាថែទាំតាមកាលកំណត់ A B C D'=>'1.2',
                              'ប័ណ្ណបើកបររថយន្ដ'=>'1.3',
                              'ឈៀករថយន្ដប្រចាំឆ្នាំ'=>'1.4',
                              'ពន្ធផ្លូវរថយន្ដប្រចាំឆ្នាំ'=>'1.5',
                              'បន្ដទិដ្ឋាការប្រចាំខែឬ ឆ្នាំ'=>'1.6',
                              'កាត់លេខកុងទ័រ រថយន្ដទាំងភ្ញៀវ និង រថយន្ដ LCRC ក្នុងសៀវភៅកត់ត្រា និង SYSTEM'=>'1.7',
                              'សរសេរ ប័ណ្ណប្ដូរប្រេង ម៉ាស៊ីនពាក់ ក ច្ងកូតរថយន្ដ'=>'1.8',
                              'កត់ត្រារំលឹកបង់ថ្លៃភ្លើងប្រចាំខែ'=>'1.12',
                              'កត់ត្រារំលឹកបង់ថ្លែ INTERNET ប្រចាំខែ'=>'1.9',
                              'កត់ត្រាបង់ថ្លៃ ទឹកប្រចាំខែ'=>'1.33',
                              'កត់ត្រាថ្លៃបង់អគារ'=>'1.11',
                              'កត់ត្រាថ្លៃបង់ METFONE ប្រចាំខែ'=>'1.13',
                              ''=>'0',
                              'ទទួលបដិសណ្ឋារកិច្ច​ ភ្ញៀវខ្មែរនិងបរទេស'=>'2.1',
                              'មិត្តរួមការងារផ្មែក LGC និង LCRC'=>'2.2',
                              'រាយការណ៍ដោយផ្ទាល់ទៅអ្នកគ្រប់គ្រង'=>'2.3',
                              'ទទួលបន្ទុកផ្នែកស្វាគមន៍ភ្ញៀវផ្នែកជួលរថយន្ដ​ និង ភ្ញៀវខាងយានដ្ឋាន'=>'2.4',
                              'ទទួលបន្ទុកផ្នែកជួលរថយន្ដ​ Care Hire'=>'2.5',
                              'ទទួលបន្ទុកផ្នែកទំនាក់ទំនងភ្ញៀវផ្នែកជួលរថយន្ដតាមរយ៖អ៊ីម៉ែល Sending e-mail'=>'2.6',
                              'ទទួលបន្ទុកផ្នែកធ្វើកិច្ចសន្យាជួលរថយន្ដ Preparing Vehicle Rental Agreement'=>'2.7',
                              'ទទួលបន្ទុកផ្នែកចេញខ្វូថេហ្ិនជួលរថយន្ដ (QUOTATION) Preparing Quotation'=>'2.8',
                              'ទទួលបន្ទុកផ្នែកចេញ​អ៊ិនវ៉យជួលរថយន្ដ​ (INVOICE) Preparing Recipt'=>'2.9',
                              'ទទួលបន្ទុកផ្នែកចេញ​ រីសីុបជួលរថយន្ដ (RECEIPT) Preparing Receipt'=>'2.23',
                              'ទទួលបន្ទុកផ្នែកវាយបញ្ជូលក្នុងសីស្ដែម'=>'2.11',
                              'ទទួលបន្ទុកផ្នែកចេញប័ណ្ណបើកបររថយន្ដនិងទោរច័ក្រយានយន្ដទាំងថ្មីនិងបន្ដ'=>'2.12',
                              'ទទួលបន្ទុកផ្នែកបន្ដទិដ្ឋការជនបរទេស Visa Extension'=>'2.13',
                              'ទទួលបន្ទុកផ្នែកជួយរៀបចំឯកសារសម្ភាសន៏បុគ្គលិក'=>'2.14',
                              'ទទួលបន្ទុកផ្នែកកត់ត្រាចាត់ចែងរថយន្ដជួល'=>'2.15',
                              'ទទួលបន្ទុកចាត់ចែងអ្នកបើកបរ Driver Magagement'=>'2.16',
                              'ទទួលបន្ទុកត្រួតពិនិត្យភាពស្អាតនៃរងយន្ដក្រោយពីលាងរួច​ ឬ ត្រឡប់មកពីលាង'=>'2.17',
                              'ទទួលបន្ទុកស្វែងរករថយន្ដជួលពីដៃគូរ'=>'2.18',
                              'ជួយបំរើភេសជ្ជដល់ភ្ញៀវទាំងផ្នែកជួលរថយន្ដនិងយានដ្ឋាន'=>'2.19',
                              'ធ្វើការងារផ្សេងៗទៀតដែលមានការស្នើសុំ ដោយប្រធាន'=>'2.22'
                              );
            foreach($sub_j_id as $key=>$value){
              ?>
                
                <tr  <?php if($value==0) {echo "class='none-border' ";} ?>  style="<?php echo $value==0?'height:20px;':'';?>">
                  <td style="text-align: left;width: 19%;"><?=$key;?></td>  <!-- echo row (subject) -->
                  <?php
                    $j = 1;  // day 1, 2, 3, ...
                    $x = 0;
                    while($j<=$day){
                      if(in_array('0'.$j, $day_tr)){
                        ?>
                          <td style="width:5px !important;padding:3px !important;">
                            <?php
                              if(in_array($value, $opt_checked[$x])){
                                echo "<input type='checkbox' name='tick' checked=''>";
                              }else{
                                echo "";
                              }
                            ?>
                          </td>
                        <?php
                        $x++;
                      }else{
                        echo "<td style='width:5px !important;padding:3px !important;'></td>";
                      }
                      $j++;
                    }
                    ?>
                      <td></td>
                    <?php
                  ?>
                  
                </tr>
               
              <?php
              // $i++;
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> 
</body>            
 
<style type="text/css">
  table tbody th ,td {
        border: 1px solid black;
        text-align:center;
        font-size:10px; 

           
  }
  table {
    border: 1px solid black !important;
  }
  
  table th {
    text-align: center;
    border: 1px solid black !important;
    line-height: 10px;
  }
 table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   padding:0px;
   border: 1px solid black !important;
 }
 .row {
  margin-left: 10px !important;
  margin-right: 12px !important;
 }
 .print_bg {
  background-color: yellow !important;
      -webkit-print-color-adjust:exact;
 }
 .none-border{
  
  background-color: yellow !important; 
}
 @media print {
.none-border {
    background-color:yellow !important;
    -webkit-print-color-adjust: exact;
    }
}
</style>
 <script type="text/javascript">
    window.print();
</script>