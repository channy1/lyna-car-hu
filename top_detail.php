<!-- include header file -->
<?php
     require_once("header.php");
$id = $_GET["id"];
?>
<div class="container">
    <!--<div style="height: 10px; width: 100%">
    </div>-->
</div>
<!-- finished header file included -->
<!-- body section for partner benefit -->

<div class="container py-5">
    <div class="panel panel-default">
        <div class="panel-heading">


            <?php
                 $v_sql = "SELECT * FROM tbl_layout_content WHERE pb_id='$id'";
                $result = $connect->query($v_sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){

            ?>
            <h2>
              <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;
              <?php
              if(@$_SESSION['lang']=='en') {
                echo $row["title"];
              }
              else {
                echo $row["title_kh"];
              }

              ?>

            </h2>
        </div>
        <div class="panel-body">
                         <?php
                              if((@$_SESSION['lang']=='en')) {
                                echo $row["description"];
                               }
                               else {
                                echo $row["description_kh"];
                               }
                            }
                        }


                ?>

        </div>
    </div>
</div>

<!-- finished section for partner benefit -->
<!-- include footer file  -->
<?php require_once("footer.php"); ?>
<!-- finished footer included -->
