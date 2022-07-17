<?php  
    $menu_active =4;
    $left_menu =24;
    $layout_title = "Welcome to Website";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-image fa-fw"></i> District List</h2>
        </div>
    </div>
    <div class="portlet-body">
        <div id="sample_2_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline " id="sample_2" role="grid" aria-describedby="sample_2_info" style="width: 1180px;">
                <thead>
                    <tr role="row" class="text-center">
                        <th>N&deg;</th>
                        <th>District Name English</th>
                        <th>District Name Khmer</th>
                        <th>Under Province</th>
                        <th class="text-center">Commune</th>
                        <th style="min-width: 100px;" class="text-center">Action <i class="fa fa-cog fa-spin"></i></th>
                    </tr>
                </thead>
                <tbody>                                 
                    <?php 
                        if(@$_GET['parent_id']){
                            $get_data = $connect->query("SELECT A.*,B.pro_name_en,B.pro_name_kh FROM tbl_location_district AS A LEFT JOIN tbl_location_province AS B ON B.pro_id=A.dis_province_id WHERE B.pro_id=".@$_GET['parent_id']." ORDER BY dis_name_en DESC");
                        }else{
                            $get_data = $connect->query("SELECT A.*,B.pro_name_en,B.pro_name_kh FROM tbl_location_district AS A LEFT JOIN tbl_location_province AS B ON B.pro_id=A.dis_province_id ORDER BY dis_name_en DESC");
                        }
                        $i = 0;
                        while ($row = mysqli_fetch_object($get_data)) {
                            echo '<tr>';
                                echo '<td>'.(++$i).'</td>';
                                echo '<td>'.detect_unicode($row->dis_name_en).'</td>';
                                echo '<td>'.detect_unicode($row->dis_name_kh).'</td>';
                                echo '<td>'.detect_unicode($row->pro_name_en).' :: '.detect_unicode($row->pro_name_kh).'</td>';
                                echo '<td class="text-center"><a href="../location_commune/index.php?parent_id='.$row->dis_id.'" target="_blank"><i class="fa fa-folder-open"></i></a></td>';
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
