<?php 
    require_once("header.php");
    include_once ('system/config/database.php');
?>
<br>

<div class="container-fluid">
                    <div>
                <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                <?= (@$_SESSION['lang']=='en')? 'CAR SALES':'រថយន្តសម្រាប់លក់'; ?></h4>
            </div>
</div>
    <?php
                         $text_re="";
                         $text_detail="";
                         $text_hotel="";
                         $ref_text=@$_SESSION['lang'];
                         if($ref_text=="en") {
                            $text_re="Ref. No";
                            $text_detail="DETAIL";
                            $text_hotel="VIEW Nº OF HOTEL";
                         }
                         else {
                            $text_re="លេខយោង";
                            $text_detail="ពត៌មានលំអិត";
                            $text_hotel="ចំនួនសណ្ឋាគារ និង ផ្ទះសំណាក់";
                         }  
                         ?>   
    <div class="container-fluid">
                <div class="owl-carousel">
               
                        
           
                        <?php  
                        $v_sql = "SELECT * FROM tbl_vehicle_rantal where status !=1";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){


                                // echo"<th>"."Vehicle"."</th>"."<br>";
                                // echo"<th>"."Testing"."</th>";


                                echo "<div style='border:2px solid #ebebe0;padding:0px;border-radius:3px; text-align:center;' class='items-container'>
                                <div style='background-color:#932d8e;height:30px;' class='container-fluid'><font size='5px' color='white' style='overflow:hidden;font-size:14px;'><b><i class='fa fa-car'></i> ".$row["ve_title"]."</b></font></div>
                                <div><a href='vehical_rental_detail.php?id=".$row['ve_id']."'><img class='img' id='img' src='system/admin/image/vehicle_rental/".$row["ve_image"]."' alt=''></a></div>";

                                echo "<div class='container-fluid vi_hi' style='padding:0px; text-align:left;'>

                                <table style='width:100%;'>
                                        

                                    <tr>
                                    <td colspan='3' style='overflow:hidden;height: 14px;background-color: #A4509F; color:black;font-size:13px;'>&emsp;".$text_re.":
                                    <font color='white' style='overflow:hidden;height:20px;'>".$row["ve_ref_no"]."</font>
                                    </td>
                                </tr>
                                    
                                    <tr>
                                        <td colspan='1' ><b><font class='font_responsive' style='min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0; color:#A4509F;'>&nbsp;&nbsp;YEAR:</b></font></td>

                                        <td class='text-right'><b><font class='font_responsive'  style='min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0;'><font color='#A4509F'>".($row["ve_year"])."</font><font color= '#A4509F' ></b></font></font></td>
                                    </tr>
                                    

                                    
                                    <tr>
                                        <td colspan='1' ><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'> 
                                        <font color='#A4509F'>&nbsp;&nbsp;MAKE:</b></font></font></td>

                                        <td class='text-right'><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#A4509F'>".($row["ve_make"])."</font>
                                        <font color='#A4509F'><b></font></font></td>
                                    </tr>

                                   

                                    <tr>
                                        <td colspan='1' ><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color='#A4509F'>&nbsp;&nbsp;MODEL:</b></font></font></td>

                                        <td class='text-right'><b><font class='font_responsive' style=min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#A4509F'>".($row["ve_model"])."</font>
                                        <font color='#A4509F'><b></font></td>
                                    </tr>

                                  

                                    <tr>
                                        <td colspan='1' ><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color='#A4509F'>&nbsp;SUB MODEL:</b></font></font></td>

                                        <td class='text-right'><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#A4509F'>".($row["ve_sub_model"])."</font>
                                        <font color='#A4509F'></b></font></font></td>
                                    </tr>

                                    <tr>
                                        <td colspan='1' ><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color='#A4509F'>&nbsp;&nbsp;COLOR:</b></font></font></td>

                                        <td class='text-right'><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#A4509F'>".($row["ve_color"])."</font>
                                        <font color='#A4509F'></b></font></font></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan='1' ><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'>
                                        <font color='#A4509F'>&nbsp;&nbsp;No. OF SEATS:</b></font></font></td>

                                        <td class='text-right'><b><font class='font_responsive' style='min-width:100% !important;float:left;border-top:1px solid #f5f5f0;'><font color='#A4509F'>".($row["ve_no_of_seat"])."</font>
                                        <font color='#A4509F'></b></font></font></td>
                                    </tr>
                                    


                                    
                                    <br>
                                    <tr style='background-color:;'>
                                       <td colspan='2' style=''>
                                            <a href='vehical_rental_detail.php?id=".$row["ve_id"]."' class='btn btn-sm button-detail' style= 'width:100%; background-color: #A4509F; color: white;' type='buttom'>
                                               ".$text_detail."
                                            </a>
                                        </td>
                                    </tr>
                                    

                                </table>
                                </div>
                                </div>";

                                      

                     











                            }
                        }


                        else { 
                        }
                    ?>
                  
                </div>
            </div>

<style type="text/css">
    .img {
    height:190px !important;
}
.font_responsive {
    font-size:11px;
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

 <script src="owl.carousel/jquery.min.js"></script>
        <script src="owl.carousel/owl.carousel.min.js"></script>
        <script src="owl.carousel/jquery.js"></script>
<?php require_once("footer.php"); ?>