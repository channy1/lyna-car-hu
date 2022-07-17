<?php 
    require_once("header.php");
?>

<div class="container py-5">
	<div class="panel panel-default">
	      <div class="panel-heading text-left">
	        <h2>
            <i class="fa fa-handshake-o" aria-hidden="true">
            </i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'PHOTO GALLERIES':'រូបថតអនុស្សាវរីយ៏'; ?>
	        </h2>
	      </div>


	     <div class="row">
         <?php  
         $v_sql = "SELECT * FROM tbl_info_center where event_type='1' ORDER BY info_center_id  DESC ";
         $result = $connect->query($v_sql);
         if ($result->num_rows > 0) {
         while($rows = $result->fetch_assoc()){         
                            
          ?>

        <div class="col-md-4 mb-5">
	     	<div class="tumbnail" style="margin-bottom: 13px;">
              <div class="box"> 
                <div class="ele">
              <a href="./info_center_new_detail.php?id=<?php echo $rows['info_center_id'] ?>&type=<?php echo $rows['event_type'] ?>">
                		<img class="gallery-img img-responsive" style="width:100%;height:260px" src="system/admin/image/info_center/<?php echo $rows['images']; ?>" alt="<?php echo $rows['title']; ?>">
                	</a>
                </div>
              </div>
            </div>

            <div class="content">
              <div class="title text-center">
                <span class="web">
                	<?php 

                	 if((@$_SESSION['lang']=='en')) {
                             echo $rows['title'];
                        }
                        else {
                            echo $rows['title_kh'];
                        }
                	?>
                	
                  <?php //echo $rows['title']; ?>
                </span>
                
             <div class="clear"></div>
            </div>
            </p>
          </div>
      </div>
<?php 
  }}
?>

	     </div>





	      
  </div>
</div>

<?php require_once("footer.php"); ?>