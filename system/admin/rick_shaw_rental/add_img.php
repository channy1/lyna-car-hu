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

    <div class="row">
      
      <div class="col-md-2 col-xs-12">  
        <img src="lyna.jpg" class="img_sub_logo">
      </div> 
      <div class="col-md-9 col-xs-12 mobile_fonts"> 
          <center>
                <h3><b style=";font-family: Khmer OS Muol; ">បញ្ចូលរូប កង់បីសំរាប់ជួល</b></h3>
                <b style="font-size: 20px;">​​​​​EDIT​ RICKSHAW RENTAL</b><br><br>
                <b style="font-family: Khmer OS Muol;">ស្នាក់ការកណ្តាល| HEAD OFFICE</b><br>
                <span> Address: Room No. 9C2 | 9th Floor</span> <br>
                <span>H Silver Building (Opposite the Khmer-Soviet Friendship Hospital)</span><br>
                <span>Street 271 | Sangkat Tumnop Teuk | Khan Chamcarmon | Phnom Penh | Kingdom of Cambodia</span> <br>
                <span>Eng/Khm: +855 (0) 12 55 42 47 | +855 (0) 92 14 30 14 | English Speaker Only: +855 (0) 12 924 517</span><br>
                <span> Skype ID: lyna-carrental.com | Line/WhatsApp/Telegram/Viber/WeChat: (+855) 12 55 42 47 | 92 14 30 14 | 12 924 517</span><br>
                <span>E-mail: info@lyna-carrental.com | Website: www.Lyna-CarRental.Com</span>
        </center>
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
        $query="SELECT * FROM tbl_rick_shaw_rental_last_img WHERE car_id='$view_id'";
        $result = $connect->query($query);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
        ?>
        <div class="col-md-2">
            <a href="ajax_delete.php?delete_id=<?php echo $row['img_id']; ?>&car_id=<?php echo $row['car_id']; ?>" onclick="return confirm('Do you want to delete!!')" class="btn btn-xs btn-danger" title="delete"><i class="fa fa-remove"></i>Delete</a>

            <img src="<?php echo $row['img_sub']; ?>" class="img-responsive">
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

<style>
	b,span{

		color:#800080;
		font-weight: 900;
	}
</style>

<?php include_once '../layout/footer.php' ?>
