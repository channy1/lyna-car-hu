<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
	

?>


<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
        </div>
    </div>
    <div class="portlet light bordered">
   
    <div class="portlet-title">
       
        <div class="tools"> </div>
    </div>
    <div class="portlet-body">

             <div>
                <h4 style="color: white; border-radius: 5px; padding-left: 10px; text-transform: uppercase; background-color: #A4509F">
                CAR SALES</h4>
            </div>
            <div class="row">
              <?php  
                        $v_sql = "SELECT * FROM tbl_data_input_coupon";
                        $result = $connect->query($v_sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){

                        ?>
            <div class="col-md-4">
           

                              


                                <div style="border:2px solid #ebebe0;padding:0px;border-radius:3px; text-align:center;" class="items-container">
                                <div style="background-color:#932d8e;height:30px;" class="container-fluid"><font size="5   px" color="white"><b><i class="fa fa-car"></i>Luxis 300</b></font></div>
                                <div><a href="vehical_rental_detail.php?id=15"><img class='img-responsive' id="img" style="height: 200px;" src="images/guestbook/<?php echo $row['tdc_image']; ?>" alt=""></a></div>

                                <div class="container-fluid" style="height:240px; padding:0px; text-align:left;">

                                <br><table>
                                        

                                    <tbody><tr><td colspan="3" style="width:400px; background-color: #A4509F; color:black;"> Ref. No:
                                        <font color="white"><?php echo $row['tdc_id']; ?></font></td></tr>
                                    
                                    <tr>
                                        <td colspan="1"><b><font style="font-size:13px; min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0; color:#A4509F;">&nbsp;&nbsp;Describtion:</font></b></td>

                                        <td class="text-right"><b><font style=" font-size:13px;min-width:100% !important;float:left;border-bottom:1px solid #f5f5f0;"><font color="#A4509F"></font><font color="#A4509F"><?php echo $row['tdc_description']; ?> </font></font></b></td>
                                    </tr>
                                    

                                    <tr>
                                        <td colspan="1"><b><font style=" font-size:13px;min-width:100% !important;float:left;border-top:1px solid #f5f5f0;">
                                        <i><font color="#A4509F">&nbsp;&nbsp;&nbsp;&nbsp;Title:</font></i></font></b></td>

                                        <td class="text-right"><b><font style=" font-size:13px;min-width:100% !important;float:left;border-top:1px solid #f5f5f0;"><font color="#1548CE"><i><?php echo $row['tdc_title']; ?></i></font><i>
                                        <font color="#A4509F"></font></i></font></b></td>

                                    </tr>

                                    <tr>
                                        <td colspan="1"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;"> 
                                        <font color="#A4509F">Price:</font></font></b></td>

                                        <td class="text-right"><b><font style=" font-size:13px;min-width:100% !important;float:left;border-top:1px solid #f5f5f0;"><font color="#A4509F">$ 58.50</font>
                                        <font color="#A4509F">/Day<b></b></font></font></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="1"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;">
                                        <i><font color="#A4509F">&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</font></i></font></b></td>

                                        <td class="text-right"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;"><font color="#1548CE"><i>$ 58.50</i></font><i>
                                        <font color="#A4509F">/Day</font></i></font></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="1"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;">
                                        <font color="#A4509F">&nbsp;&nbsp;Monthly:</font></font></b></td>

                                        <td class="text-right"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;"><font color="#A4509F"><i>$ 130.50</i></font><i>
                                        <font color="#A4509F">/Day<b></b></font></i></font></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="1"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;">
                                        <i><font color="#A4509F">&nbsp;&nbsp;&nbsp;&nbsp;Extra Day(s):</font></i></font></b></td>

                                        <td class="text-right"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;"><font color="#1548CE "><i>$ 125.50</i></font><i>
                                        <font color="#A4509F">/Day</font></i></font></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="1"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;">
                                        <font color="#A4509F">&nbsp;&nbsp;Yearly:</font></font></b></td>

                                        <td class="text-right"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;"><font color="#A4509F">$ 210.50</font>
                                        <font color="#A4509F">/Day</font></font></b></td>
                                    </tr>

                                    <tr>
                                        <td colspan="1"><b><font style=" font-size:13px; min-width:100% !important;float:left;border-top:1px solid #f5f5f0;">
                                        
                                        </td>      
                                    </tr>
                                    
                                    <tr style="background-color:;">
                                       <td colspan="2" style="">
                                            <span class="btn" style="width: 100%; background-color: #337ab7; color: white;" type="buttom">
                                               <a class="pull-left" href="try_free.php"><div class="btn btn-primary">Try For Free</div></a>
                                        <a class="pull-right" href="add_buy_it_now.php"><div class="btn btn-primary">Buy It Now</div></a>
                                            </span>
                                        </td>
                                    </tr>
                                    

                                </tbody></table>
                                </div>
                                </div>
         
              
                    </div>
                    <?php  }} ?>
                
            </div>
   
    </div>
</div>
</div>
 
<?php include_once '../layout/footer.php' ?>