<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

    .table th, .table td {
    padding: 1.3rem!important;
}

</style>



<?php 
    require_once("header.php");
?>





<?php 
    if(isset($_POST['btn_add'])){   
        $v_name = @$connect->real_escape_string($_POST['txt_name']);
        $v_subject = @$connect->real_escape_string($_POST['txt_subject']);
        $v_email = @$connect->real_escape_string($_POST['txt_email']);
        $v_text = @$connect->real_escape_string($_POST['txt_note']);
        $v_choose_image = @$_FILES['txt_choose'];
        if($v_choose_image["name"] != ""){
            $v_img_new_name = date("Ymd")."_".rand(1111,9999).'.'.pathinfo($v_choose_image["name"], PATHINFO_EXTENSION); // get random name
            move_uploaded_file($v_choose_image["tmp_name"], "images/guestbook/".$v_img_new_name); // upload file to specific folder
        }else{
            $v_img_new_name = "blank.png"; // if not upload name = blank.png
        }
        $query_add = "INSERT INTO `tbl_guestbook`(
            `gues_name`, 
            `gues_subject`, 
            `gues_email`, 
            `gues_img`, 
            `gues_text` 
            ) 
            VALUES (
            '$v_name',
            '$v_subject',
            '$v_email',
            '$v_img_new_name',
            '$v_text'
            
        )";
        if($connect->query($query_add)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted ...
            </div>'; 
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>';   
        }
    }
?>
<div class="container-fluid py-4">
    <div class="panel panel-default" style="color: #a4509f !important;">
          <div class="panel-heading text-center">
            <h3 style="padding-top: 0px; margin: -5px;text-align: left;">
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp; <?= (@$_SESSION['lang']=='en')? 'JOB VACANCIES':'ស្វែងរកការងារ'; ?>
            </h3>
          </div>
        <!-- Car tav view container -->
        <div class="row">
        <div class="col-sm-12" style=" text-align: left; margin: 0px; margin-left: 0px; margin-right: 10px;">
        <div class="portlet-body">
        <div class="panel">
            <div class="panel-body ">
                <table class="table table-striped table-bordered table-hover dataTable dtr-inline collapsed" id="sample_1" role="grid" aria-describedby="sample_1_info">
                <thead>
                    <tr role="row" class="text-center">
                        <th>N&deg;</th>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Hiring</th>
                        <th>Term</th>
                        <th>Closing Date</th>
                        
                        
                </thead>
                <tbody>                                 
                    <?php 
                        $i = 0;
                        $get_data = $connect->query("SELECT * FROM job_announment AS A
                                                    
                                                    ORDER BY ann_id ASC");
                        while ($row = mysqli_fetch_object($get_data)) {
                            // echo '<tr>';
                            //     echo '<td>'.(++$i).'</td>';
                            //     echo '<td>'.($row->ann_title_en).'</td>'; 
                            //     echo '<td>'.($row->ann_salary).'</td>';
                            //     echo '<td>'.($row->ann_hiring).'</td>';
                            //     echo '<td>'.($row->ann_term).'</td>';
                            //     echo '<td>'.($row->ann_closing_date).'</td>';
                                
                                
                            // echo '</tr>';
                        // }
                    ?>
                    <tr>
                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo 1+$i++; ?></a></td>
                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_title_en; ?></a></td>
                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_salary; ?></a></td>
                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_hiring; ?></a></td>
                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_term; ?></a></td>
                        <td><a href="job_seekers_detail.php?id=<?php echo $row->ann_id; ?>"><?php echo $row->ann_closing_date; ?></a></td>
                       
                    </tr>
                   <?php  } ?> 
                    
                </tbody>
            </table>
            </div>
        </div>
    </div>

        </div>
     </div>   
        
         </div>  

</div>
<script type="text/javascript">
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#image_preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#btn_choose").change(function() {
      readURL(this);
    });
</script>
<?php require_once("footer.php"); ?>