<?php 
    $menu_active =7;
    $layout_title = "Add News Page";
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>
<?php
    $id=@$_SESSION['user']->user_id;
    $get_id = $_GET["id"]; 
    $v_sql = "SELECT * FROM tbl_hotel where ht_id='$get_id'";
    $result = $connect->query($v_sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      if($row['add_by']==$id) {

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

    <div style=" border: solid; border-right: 0; border-left: 0; border-top: 0;">
        <div class="text-center" style="float: left; "><img src="lyna.jpg" style="width: 150px;height: 150px;"></div>
        <div style="text-align: center; width: 100%;margin-left: -50px;">
                <b style="font-size: 30px;font-family: Khmer OS Muol; color:#2F05A5"> ការជួលរថយន្ត </b><br>
                <b style="font-size: 20px;color:#2F05A5">ADD VEHICLE RENTAL</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល / Head Quarter:</b><br>
                E-mail:info@lyna-carrental.com , skype:Skype: lyna-carrental.com<br>
               <h5 style="padding-left: 65px;">  tel:Cambodian: +855 (0)12 55 42 47 , tel:English: +855 (0)12 92 45 17 , tel:Booking: +855 (0)92 14 30 14</h5>
        </div>
        <div class="row">
             <div class="col-xs-4 col-sm-4 col-md-4">
                
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">
             </div>
             <div class="col-xs-4 col-sm-4 col-md-4">

             </div>
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
        $query="SELECT * FROM tbl_hotel_img WHERE hol_id='$view_id'";
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        ?>
        <div class="col-md-2">
            <a href="ajax_delete.php?delete_id=<?php echo $row['img_id']; ?>&hol_id=<?php echo $row['hol_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>

            <img src="<?php echo $row['img_sub']; ?>" class="img-responsive">
         </div>
      <?php
        }
      }
      ?>


    </div>
</div>
<?php
   }}}
?>
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
