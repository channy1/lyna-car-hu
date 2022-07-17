<?php 
    $menu_active =4;  
    $left_menu =23;
    $layout_title = "Welcome to Website";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-image fa-fw"></i> Province List</h2>
        </div>
    </div>
    <div class="portlet-body">
        <div id="sample_1_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline" id="sample_2" role="grid" aria-describedby="sample_1_info" style="width: 1180px;">
                <thead>
                    <tr role="row" class="text-center">
                        <th>N&deg;</th>
                        <th>Province Name English</th>
                        <th>Province Name Khmer</th>
						<th class="text-center">District</th>
                        <th style="min-width: 100px;" class="text-center">Action <i class="fa fa-cog fa-spin"></i></th>
                    </tr>
                </thead>
                <tbody>                                 
                    <?php 
                        $i = 0;
                        $get_data = $connect->query("SELECT * FROM tbl_location_province
                         ORDER BY pro_name_en DESC");
                        while ($row = mysqli_fetch_object($get_data)) {
                            echo '<tr>';
                                echo '<td>'.(++$i).'</td>';
                                echo '<td>'.detect_unicode($row->pro_name_en).'</td>';
                                echo '<td>'.detect_unicode($row->pro_name_kh).'</td>';
								echo '<td class="text-center"><a target="_blank" href="../location_district/index.php?parent_id='.$row->pro_id.'"><i class="fa fa-folder-open"></i></a></td>';
                                echo '<td class="text-center">';
                                echo '</td>';
                            echo '</tr>';
                        }
                    ?>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
    function detect_unicode($string_detect_unicode){
        if (strlen($string_detect_unicode) != strlen(utf8_decode($string_detect_unicode))) { return '<span class=text_kh>'.$string_detect_unicode.'</span>'; }else{  return $string_detect_unicode; }
    }
?>
<?php include_once '../layout/footer.php' ?>
