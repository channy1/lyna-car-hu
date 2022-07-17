<?php 
    $menu_active =7;
    $layout_title = "Welcome...";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
    //include_once '../layout_control/left_navigation_admin.php';
    
    
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
            <h2><i class="fa fa-user fa-fw"></i>QUOTATION CONTROL</h2>
        </div>
    </div>
    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="add.php" id="sample_editable_1_new" class="btn green"> Add New
                <i class="fa fa-plus"></i>
            </a>
        </div>
        
        <div class="tools"> </div>
        <br><br><hr>
        <div class="row">
        <!-- start search form -->
        <form action="" method="post">
            <div class="col-xs-2">
                <input type="text" required="" autocomplete="off" class="form-control" placeholder="start date" value="<?= @$_POST['txt_s_date'] ?>" name="txt_s_date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
            <div class="col-xs-2">
                <input type="text" required="" autocomplete="off" class="form-control" placeholder="end date" value="<?= @$_POST['txt_e_date'] ?>" name="txt_e_date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
            </div>
            <div class="col-xs-2">
                <select name="txt_employee" class="form-control">
                    <option value="">==All Customer==</option>
                    <?php 
                        $get_employee = $connect->query("SELECT * FROM tbl_customer ORDER BY cus_customer ASC");
                        while($row_employee = mysqli_fetch_object($get_employee)){
                            if($row_employee->cus_id == @$_POST['txt_employee']){
                                echo '<option SELECTED value="'.$row_employee->cus_id.'">'.$row_employee->cus_customer.'</option>';

                            }else{
                                echo '<option value="'.$row_employee->cus_id.'">'.$row_employee->cus_customer.'</option>';
                                
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-xs-6">
                <button type="submit" name="btn_search" class="btn blue"><i class="fa fa-search"></i> Search</button>
                <a href="<?= $_SERVER['PHP_SELF'] ?>" class="btn red"><i class="fa fa-undo"></i> Clear</a>
            </div>
        </form>
        <!-- end search form -->
    </div>
    <div style="height:10px;"></div>
    </div>
    
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_2" role="grid" aria-describedby="sample_1_info" >
                <thead>
                    <tr role="row">
                    <th>Ref No</th>
                            <th >VAT No</th>
                            <th >Subject :</th>
                            <th >Range Day type</th>
                            <th >Destination From</th>
                            <th >Destination to</th>
                            <th >Period From</th>
                            <th >Period to</th>
                            <th >Customer</th>
                            <th >Date Sign</th>
                            <th >Total Free</th>
                            <th >Discount</th>
                            <th >Total VAT</th>
                            <th >Total Refundable Deposit</th>
                            <th >Net Total</th>
                            <th >User</th>
                            <th >Date Create</th>
                            <th >Date Update</th>
                            <th >Quotation Menu Type</th>
                            <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if(isset($_POST['btn_search'])){
                        $v_s_date = @$_POST['txt_s_date'];
                        $v_e_date = @$_POST['txt_e_date'];
                        if(@$_POST['txt_employee']!=""){
                            $v_employee = @$_POST['txt_employee'];
                                $v_sql = "SELECT * FROM tbl_quotation AS A 
                                left JOIN tbl_customer AS B ON A.q_customer = B.cus_id
                                left join tbl_quotation_type_menu AS C ON C.qtm_id=1
                                WHERE A.q_date_sign BETWEEN '$v_s_date' AND '$v_e_date' AND A.q_customer='$v_employee' AND A.q_menu_type=7";
                                $result = $connect->query($v_sql);
                                
                        }else{
                            $v_sql = "SELECT * FROM tbl_quotation AS A 
                                left JOIN tbl_customer AS B ON B.cus_id=1
                                left join tbl_quotation_type_menu AS C ON A.q_menu_type=C.qtm_id WHERE A.q_date_sign BETWEEN '$v_s_date' AND '$v_e_date' AND A.q_menu_type=7";
                                $result = $connect->query($v_sql);
                        }
                    }else{
                        $v_sql = "SELECT * FROM tbl_quotation AS A 
                        left JOIN tbl_customer AS B ON B.cus_id=1
                        left join tbl_quotation_type_menu AS C ON A.q_menu_type=C.qtm_id WHERE A.q_menu_type=7";
                        $result = $connect->query($v_sql);
                    }
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<td>".$row["q_ref_no"]."</td>";
                            echo "<td>".$row["q_vat_no"]."</td>";
                            echo "<td>".$row["q_subject"]."</td>";
                            echo "<td>".$row["q_range_day_type"]."</td>";
                            echo "<td>".$row["q_destination_from"]."</td>";
                            echo "<td>".$row["q_destination_to"]."</td>";
                            echo "<td>".$row["q_period_from"]."</td>";
                            echo "<td>".$row["q_period_to"]."</td>";
                            echo "<td>".$row["cus_customer"]."</td>";
                            echo "<td>".$row["q_date_sign"]."</td>";
                            echo "<td>".$row["q_total_fee"]."</td>";
                            echo "<td>".$row["q_discount"]."</td>";
                            echo "<td>".$row["q_total_vat"]."</td>";
                            echo "<td>".$row["q_total_refundable"]."</td>";
                            echo "<td>".$row["q_net_total"]."</td>";
                            echo "<td>".$row["user_id"]."</td>";
                            echo "<td>".$row["date_created"]."</td>";
                            echo "<td>".$row["date_updated"]."</td>";
                            echo "<td>".$row["qtm_type"]."</td>";
                            echo '<td class="text-center">';
                            echo '<a href="edit.php?edit_id='.$row["q_id"].'" class="btn btn-xs btn-warning" title="edit"><i class="fa fa-edit"></i>Edit</a> ';  
                            echo '<a href="dalete.php?delete_id='.$row["q_id"].'" onclick="return confirm(\'Do you want to delete!!\')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a> ';                                  
                            echo '</td></tr>';
                        }
                    }
                    else {
                       
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>


</div>

</div>





<?php include_once '../layout/footer.php' ?>