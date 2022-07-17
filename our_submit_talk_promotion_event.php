<!-- header included  -->
<?php 
  require_once("header.php");
?>

<!-- container section -->

<div class="container-fluid" style="margin-top:2px; padding-top:15px; color: #a4509f !important; ">
   <!--  <div style="height: 210px; width: 100%">
   </div> -->
   <div class="panel panel-default" style="color: #a4509f !important;">
      <div class="panel-heading text-center">
        <h3 style="padding-top: 0px; margin: -5px; color: #a4509f;text-align: left;">
          <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?= (@$_SESSION['lang']=='en')? 'SUBMIT A TALK IDEA':'ដាក់មតិយោបល់'; ?></h3>
      </div>
     <section class="content">
   <!--      <div class="container">
        <!-- <h4 style="background:#e3c4d4;background: linear-gradient(to bottom, #ffffff 0%,#e3c4d4 100%);padding:10px;color:red; " class="margin-bottom-25 margin-top-none"><strong>OUR </strong><span style="text-transform: uppercase;">Promotion</span></h4> -->
            <div  style="clear: both;"></div>
            <div class="row">
                         <?php  
                            $v_sql = "SELECT * FROM tbl_event_promotion where event_type='3' ORDER BY e_pro_id  DESC LIMIT 1";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($rows = $result->fetch_assoc()){         
                            
                        ?>
                
                <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12" style="color: #2e2e2e;border-bottom: 1px solid #e1e1e1;padding-left: 36px;">
                  <h3><?php echo $rows['title']; ?></h3>
                 
                 <?php echo $rows['description']; ?>
                </div>
                 <?php }} ?>
                <div class="col-lg-3 col-md-5 col-sm-5 col-xs-12">
                    <div class="side-widget padding-bottom-30">
                        <div class="side-content">
                            <div class="list col-xs-12">
                                <h4 class="recent_posts margin-bottom-25">PREVIOUS EVENTS</h4>
                                <?php  
                            $v_sql = "SELECT * FROM tbl_event_promotion where event_type='3' ORDER BY e_pro_id  DESC LIMIT 4";
                            $result = $connect->query($v_sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){         
                            
                        ?>
                                    <div class="side-blog">
                                      <a href='./event_promotion_detail.php?id=<?php echo $row['e_pro_id']?>&type=<?php echo $row['event_type'] ?>'>
                                    <img style="width:60px;" src="system/admin/image/img_event_promotion/<?php echo $row['images']; ?>" alt="<?php echo $row['title']; ?>" class="alignleft"> 
                                     </a><strong><?php 

				                	 if((@$_SESSION['lang']=='en')) {
				                             echo $row['title'];
				                        }
				                        else {
				                            echo $row['title_kh'];
				                        }?></strong>
                                   <p><?php
                                   if((@$_SESSION['lang']=='en')) {
				                             $string=$row['description']; 
				                        }
				                        else {
				                            $string=$row['description_kh']; 
				                        }
                                    
                                    $string = strip_tags($string);
                                      if (strlen($string) >50) {

                                          // truncate string
                                          $stringCut = substr($string, 0,50);
                                          $endPoint = strrpos($stringCut, ' ');

                                          //if the string doesn't contain any space then it will cut without word basis.
                                          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                          $string .= "...<a href='./event_promotion_detail.php?id=".$row['e_pro_id']."&type=".$row['event_type']."'>Read More</a>";
                                      }
                                      echo $string;

                                    ?></p>
                                         </div>
                          <?php }} ?>                        
                                      </div>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>
        <!--container ends--> 
    </section>

  </div>

  <!-- model alert for customer click -->

</div>

<!-- finished container section -->
<!-- inlcude footer buttom -->
<?php require_once("footerpartner.php"); ?>