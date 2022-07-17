<link href="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="../assets/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/owlcarousel/owl.theme.default.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script

<script src="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


<style type="text/css">
button.btn.btn-lg.button-detail {
    background-color: #ff0505;
     border-radius: 0 !important; 
    color: #fff; font-weight:bold;
}
table tr td{color:#000;}
.font_responsive {
    font-size:11px;
 }
 .font_responsive {
    font-size:12px;
 }
 .acc_hi {
    height: 235px;
 }


@media (max-width:770px) {
 /*.font_responsive {
    font-size:11px;
 }*/
 .acc_hi {
    height: 210px;
 }
 

}
</style>
<!-- include header file -->
<?php include_once ('system/config/database.php');

 ?>
<?php 
    require_once("header.php");
    $id = $_GET["id"];		        ?>
<div class="container-fluid" style="margin-top: 10px;">
    <div style="height: 10px; width: 100%">
    </div>
</div>
<!-- finished header file included -->
<!-- body section for partner benefit -->


            <div class="container mb-4">
    <div class="panel panel-default">
        <div class="panel-heading">
                <h5 class="mb-3 " style="color: white;border-radius: 5px;padding: 10px;text-transform: uppercase;background-color: #ff0505;">
                       <?php
                    $v_sql = "SELECT * FROM tbl_province WHERE pv_id='$id'";
                    $result = $connect->query($v_sql);
                    if ($result->num_rows > 0){
                    if($row = $result->fetch_assoc()){ ?>
<i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;<?php if((@$_SESSION['lang']=='en')){
                    echo $row["pv_title"];
                    }
                    else{echo $row["pv_title_kh"];} ?></h5>

              <?php
                    }
                }
          ?>
       </div>
        <div style="margin-left: 50px; color: #000;" class="panel-body">
                </div>

    <div id="customers-container">
                                        <div class="owl-carousel owl-theme owl-loaded owl-drag">
                                   
                    <div class="owl-stage-outer">

                        <div class="owl-stage" style="transform: translate3d(-1844px, 0px, 0px); transition: all 0.25s ease 0s; width: 12121px;">

                            <?php
                             $v_sql = "SELECT * FROM tbl_province_detail WHERE pl_pro_id='$id'";                            
                            $result = $connect->query($v_sql);													
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()){ ?>
								
					
								
                  <div class="owl-item" style="width: 453.5px; margin-right: 10px;">
                                    <div class="container-fluid" style="padding:12px;background-color:#000;">
                       <h4 class="text-center" style="font-size:22px;color: #fff;"><?php echo $row["pl_title"]; ?></h4>
                       </div><a href="city_tour_detail_detail.php?id=192">
                           <img style="height:160px;" src="system/admin/image/province_detail/<?php echo $row['pl_image']; ?>"></a>
                           <div class="container-fluid vi_hi" style="padding:0px; text-align:left;"><p></p><table class="table mb-0">                           <tr>                            <td colspan="3"><b><font class="font_responsive">Price :</font></b> </td>                             <td class="text-right"><b><font class="font_responsive" ><font><?php echo $row["pl_price"]; ?></font><font></font></font></b></td>

                                    </tr>

                                    <tr>

                                    <td colspan="3"><b><font class="font_responsive"> Distance :</font></b> </td>
                                    <td class="text-right"><b><font class="font_responsive"><font> <?php echo $row["pl_distance"]; ?></font><font></font></font></b></td>

                                     </tr>

                                     <tr>

                                    <td colspan="3"><b><font class="font_responsive">Departure Time :</font></b> </td>
                                    <td class="text-right"><b><font class="font_responsive" ><font><?php echo $row["pl_time_leave"]; ?></font><font></font></font></b></td>

                                    </tr>

                                    <tr><
                                    <td colspan="3"><b><font class="font_responsive" > Arrival Time:</font></b> </td>
                                    <td class="text-right"><b><font class="font_responsive" ><font> <?php echo $row["pl_time_arrive"]; ?></font><font></font></font></b></td>

                                    </tr>
                                     <tr>
                                     <td colspan="3"><b><font class="font_responsive"> Time Allowed :</font></b> </td>
                                     <td class="text-right"><b><font class="font_responsive"><font><?php echo $row["allow_time"]; ?></font><font></font></font></b></td>

                                     </tr>
                                    </table>
                                    <a href="city_tour_detail_detail.php?id=<?php echo $row['p_id']; ?>">
                                    <button class="btn btn-lg button-detail" style="width:100%">DETAIL</button>
                                    </a>
                                    </div>
                                
                                </div>
                         <?php
                            }
                            }
                            
                            ?>





                                
                                </div>
                                </div>

                                </div>
                                </div>

                                </div>
                                </div>
                    
                               

<!-- finished section for partner benefit -->
<!-- include footer file  -->
<script>
           $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                autoplay:true,
                dots:false,
                nav:false,
                responsive: {
                  0: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 3,
                    loop: false,
                    
                  }
                }
              })
            }) 
          </script>
<?php require_once("footer.php"); ?>
