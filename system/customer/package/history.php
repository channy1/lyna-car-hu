<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<style>
    table *{ white-space:nowrap; }
    .tr_active{
      background: #cecdcd;
    }
    .title{
      vertical-align: baseline !important;
    }
</style>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i>CUSTOMER REPORT</h2>
        </div>
    </div>
    <div class="portlet-title">
      
      
    </div>
    <div class="portlet-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                <thead>
                  <tr class="tr_active">
                    <th class="text-center" colspan="2" style="width: 200px;">Date Used</th>
                    <th class="text-center title" rowspan="2">Name of Services Used</th>
                    <th class="text-center title" rowspan="2">No. of Used</th>
                    <th class="text-center title" rowspan="2">Expense</th>
                    <th class="text-center title" rowspan="2">Discount</th>
                    <th class="text-center title" rowspan="2">Net Expense</th>
                    <th class="text-center title" rowspan="2">Bonus</th>
                    <th class="text-center title" rowspan="2">Net Income</th>
                    <th class="text-center title" rowspan="2">Noted</th>
                  </tr>
                  <tr class="tr_active">
                    <th class="text-center" >From</th>
                    <th class="text-center">To</th>
                  </tr>
                </thead>
                  <tbody>
                   
                    <?php 
                        $id = $_SESSION['user']->user_id; 
                        $query="SELECT * FROM tbl_agreement as tbl_a 
                                inner join tbl_vehicle_rantal as tbl_v
                                on tbl_a.car_id = tbl_v.ve_id
                                 where tbl_a.recipt_no != '' and tbl_a.user_id = ".$id; 
                        $result = $connect->query($query);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) 
                            {
                    ?>
                        <td><?php echo date_format(date_create($row['ag_inception_date']) , "d-M-Y") ?> </td>
                        <td><?php echo date_format(date_create($row['ag_return_date']) , "d-M-Y") ?> </td>
                        <td><?php echo $row['ve_title'] ;?></td>
                    <?php 
                            }
                        }
                    ?>
                  </tbody>
                </table>
            </div>    
           
    </div>


</div>

</div>


<style type="text/css">
.caption-basic {
    color: #FFF;
    padding-left: 10px;
    background-color: #a4509f;
    border-color: #BCE8F1;
    font-size: 12px;
}
</style>


<?php include_once '../layout/footer.php' ?>