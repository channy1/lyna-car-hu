<?php 
    $menu_active =4;
    $left_menu =25;
    $layout_title = "Welcome to Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-fw fa-map-marker"></i> Commune List</h2>
        </div>
    </div>
    <div class="portlet-body">
        <div id="sample_2_wrapper" class="dataTables_wrapper">
            <table class="table table-striped table-bordered table-hover dataTable dtr-inline " id="sample_2" role="grid" aria-describedby="sample_2_info" style="width: 1180px;">
                <thead>
                    <tr role="row" class="text-center">
                        <th>N&deg;</th>
                        <th>Commune Name English</th>
                        <th>Commune Name Khmer</th>
                        <th>Under District</th>
                        <th>Under Province</th>
                        <th class="text-center">Village</th>
                        <th style="min-width: 100px;" class="text-center">Action <i class="fa fa-cog fa-spin"></i></th>
                    </tr>
                </thead>
                <tbody>                                 
                    <?php 
                        if(@$_GET['parent_id']){ 
                            $get_data = $connect->query("SELECT A.*,D.dis_name_en,D.dis_name_kh,P.pro_name_en,P.pro_name_kh
                                FROM tbl_location_commune AS A 
                                LEFT JOIN tbl_location_district AS D ON D.dis_id=A.com_district_id 
                                LEFT JOIN tbl_location_province AS P ON P.pro_id=D.dis_province_id
                                WHERE D.dis_id=".@$_GET['parent_id']."
                                ORDER BY com_name_en DESC");
                        }else{
                            $get_data = $connect->query("SELECT A.*,D.dis_name_en,D.dis_name_kh,P.pro_name_en,P.pro_name_kh
                                FROM tbl_location_commune AS A 
                                LEFT JOIN tbl_location_district AS D ON D.dis_id=A.com_district_id 
                                LEFT JOIN tbl_location_province AS P ON P.pro_id=D.dis_province_id
                                ORDER BY com_name_en DESC");
                        }
                        $i = 0;
                        while ($row = mysqli_fetch_object($get_data)) {
                            echo '<tr>';
                                echo '<td>'.(++$i).'</td>';
                                echo '<td>'.detect_unicode($row->com_name_en).'</td>';
                                echo '<td>'.detect_unicode($row->com_name_kh).'</td>';
                                echo '<td>'.detect_unicode($row->dis_name_en).' :: '.detect_unicode($row->dis_name_kh).'</td>';
                                echo '<td>'.detect_unicode($row->pro_name_en).' :: '.detect_unicode($row->pro_name_kh).'</td>';
                                echo '<td class="text-center"><a href="../location_village/index.php?parent_id='.$row->com_id.'" target="_blank"><i class="fa fa-folder-open"></i></a></td>';
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
