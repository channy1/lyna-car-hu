<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
	
	$services= @$_GET['services'];
	if($services=="")
	{
		$services= 1; 
	}
	
     $q_sql = "SELECT * FROM tbl_usergroup where id=".$services;
    $qresult = $connect->query($q_sql);
	$qrow = $qresult->fetch_assoc();
	//print_r($qrow);
?>



<style>
    table *{ white-space:nowrap; }
</style>
<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-user fa-fw"></i> <?=$qrow['group_name']?> POSTING PACKAGE SERVICE CONTROL PANEL</h2>
        </div>
    </div>
   <div class="portlet-title">
        <div class="caption font-dark">
            <a href="./add.php?services=<?=$services?>" id="sample_editable_1_new" class="btn green"> Add New
                <i class="fa fa-plus"></i>
            </a>
        </div>
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">     
      
        <div class="table-responsive">
		<?php   $v_sql1 = "SELECT *  FROM tbl_posting_package where group_id=".$services;
                        $result1 = $connect->query($v_sql1);
                      
                        if ($result1->num_rows > 0) {                              $i=1;
                             
                            while($row1 = $result1->fetch_assoc()){ ?>
                <table class="table table-bordered">
                <caption class="caption-basicnew"><?=$row1['package_name']?> </caption>
                    <tbody><tr class="caption-basic">
                        <th>No</th>
						 <th>Mem. Type </th>
                        <th>System Package</th>
						 <th>Posting</th>
                        <th>Trial</th>
                        <th>Period</th>
						<th>Qty</th>
                        <th>Price</th>
						 <th>Total</th>
                        <th>Discount</th>
                        <th>Net Pay</th>
                       
                        <th colspan="2" style="text-align:center">Action</th>
                    </tr>
                    <?php
					 $v_sql = "SELECT tbl_package_detail.*, tbl_posting_package.package_name  FROM tbl_package_detail INNER JOIN tbl_posting_package ON 
					tbl_package_detail.package_id=tbl_posting_package.id where tbl_posting_package.group_id=".$services." and tbl_posting_package.id= ".$row1['id'];
					 
				$result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                              $i=1;
                              $total="";
                            while($row = $result->fetch_assoc()){
                                $sub=$row['price']*($row['discount'])/100;
                                $total=$row['price']-$sub;
                    ?>
                      <tr id="1">
                        <td><?php echo $i++; ?></td>
						<td><?php if($row['member_type']==1){ echo 'SILVER'; } else if($row['member_type']==2){ echo 'PLATINUM'; } else if($row['member_type']==3){ echo 'GOLD'; }
						  else if($row['member_type']==4){ echo 'DIAMOND'; } else { echo 'NO NEED';  }
						  ?>			  
						  </td>
                        <td><?php echo $row['package_name']; ?></td>
						 <td><?php echo $row['qty_posting']; ?></td>
                        <td><?php echo $row['trial']; ?></td>
						<td><?php echo $row['period']; ?></td>
						<td><?php echo $row['qty']; ?></td>
						<td><?php echo $row['price']; ?></td>
                        
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['discount']; ?></td>
                        <td>$<?php echo $row['net_pay']; ?></td>                      
                        <td align="center">
                           <a href="./edit.php?edit_id=<?php echo $row['p_id']; ?>&services=<?=$services?>" class="btn btn-success btn-xs">
                            <i class="fa fa-edit"></i>
                                Edit
                            </a>
                        </td>
						 <td align="center">
                           <a href="delete.php?delete_id=<?php echo $row['p_id']; ?>&services=<?=$services?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete">
						   <i class="fa fa-remove"></i>Delete</a>
                        </td>
                    </tr> 
                    <?php }}  ?>
                                 
                       
                       
                </tbody></table>
				<?php } } ?>
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
.caption-basicnew {
    color: #000;
    padding-left: 10px;
    background-color: #32c5d2;
    border-color: #a4509f;
    font-size: 12px;
	font-weight:bold;
	text-transform: uppercase;
}
</style>


<?php include_once '../layout/footer.php' ?>