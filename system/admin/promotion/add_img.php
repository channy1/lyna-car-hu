<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<link rel="stylesheet" type="text/css" href="../../css/dropzone.min.css">
<script type="text/javascript" src="../../js/dropzone.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <a href="index.php" id="sample_editable_1_new" class="btn red"> 
                <i class="fa fa-arrow-left"></i>
                Back
            </a>
        </div>
    </div>

    

    <div class="portlet-body">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Input Information</h3>
            </div>
            <div class="panel-body" style="background-color: #800080;">
              <div class="row">
                <div class="col-md-12">
              <form action="ajax_upload.php" class="dropzone" id="myAwesomeDropzone"> 
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
              </form>  

                </div>
              </div>
           
             

            </div>
        </div>
    </div>

    <div class="row">
        <?php

        $view_id = $_GET["id"]; 
        $query="SELECT * FROM tbl_promotion WHERE id='$view_id'";
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        ?>
        <div class="col-md-2">
            <a href="ajax_delete.php?delete_id=<?php echo $row['img_id']; ?>&event_id=<?php echo $row['event_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>

            <img src="<?php echo $row['image']; ?>" class="img-responsive">
         </div>
      <?php
        }
      }
      ?>


    </div>
</div>

<script>
//Disabling autoDiscover
Dropzone.autoDiscover = false;
    //Dropzone class
    var myDropzone = new Dropzone(".dropzone", {
        addRemoveLinks: true,
        url: "ajax_upload.php",
        paramName: "file",
        maxFilesize:20,
        maxFiles: 10,
        acceptedFiles: "image/*"
      

    });

     myDropzone.on("success", function() {
        alert('Success!');
         location.reload(true);
       });

</script>




<?php include_once '../layout/footer.php' ?>
