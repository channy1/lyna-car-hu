<?php 
    require_once("header.php");
?>

<div class="container py-5">
	<div class="panel panel-default">
	      <div class="panel-heading text-left">
	        <h2>
            <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'REGULATION UPDATES':'ធ្វើបច្ចុប្បន្នភាពបញ្ញាតិ'; ?>
	        </h2>
	      </div>


	     <?php  
         $v_sql = "SELECT * FROM tbl_info_center where event_type='3' ORDER BY info_center_id  DESC ";
         $result = $connect->query($v_sql);
         if ($result->num_rows > 0) {
         while($rows = $result->fetch_assoc()){         
                            
          ?>
 <div class="card py-5">
	     <div class="row">
            
	     	<div class="col-md-3 tumbnail">
              <div class="box"> 
                <div class="ele">
              <a href="./info_center_new_detail.php?id=<?php echo $rows['info_center_id'] ?>&type=<?php echo $rows['event_type'] ?>">
                		<img style="width: 269px;height: auto;" src="system/admin/image/info_center/<?php echo $rows['images']; ?>" alt="<?php echo $rows['title']; ?>">
                	</a>
                </div>
              </div>
            </div>

            <div class="col-md-9 content">
              <!-- <div class="title" style="margin-bottom: -51px;"> -->
               <!--  <span class="web"> -->
                  
                  
                 <h5 class="pb-4"><strong style="font-weight: bold;">
                 	<?php 

                	 if((@$_SESSION['lang']=='en')) {
                             echo $rows['title'];
                        }
                        else {
                            echo $rows['title_kh'];
                        }
                	?>
                

                 </strong></h5> 
               <!--  </span> -->
                
            <!--  <div class="clear"></div> -->
            <!-- </div> -->
            <p class="detail">
              <?php
              if((@$_SESSION['lang']=='en')) {
                             $string=$rows['description']; 
                        }
                        else {
                            $string=$rows['description_kh'];
                        }
                                    
                                    
                                      echo $string;

              ?></p>

           
          </div>
  

	     </div>
 </div>
<?php 
  }}
?>



	      
  </div>
</div>

<?php require_once("footer.php"); ?>