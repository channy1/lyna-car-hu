<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
?>

<?php
    $id=$_SESSION['user']->user_id;
    $v_sql = "SELECT * FROM  tbl_users 
    INNER JOIN tbl_province ON tbl_users.province_id =tbl_province.pv_id
    WHERE user_id='".$id."'";
    $pro="";
    $cop_no="";
    $con_intro="";
    $user_introducer_id="";
    $car_id="";
    $result = $connect->query($v_sql);
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()){
            $short_name = substr($row["user_first_name"],0,1).substr($row["user_last_name"],0,1);
            $name = $row["user_first_name"]." ".$row["user_last_name"];
            $pro = $row["pv_title"];
            $phone = $row["user_phone_number"];
            $cop_no =111111;
            $con_intro = 22222222;
            $user_introducer_id=$row['user_introducer_id'];
            $car_id=$row['user_coupon_code'];
        }
    }

 
?>
<style>
    .contain_out{
            width:400px;
            height:250px;
            border:8px solid #ffd45e;
            background-color:#a5519f;
        }
    .con-img{
        
        margin-left:60px;
            width:400px;
            height:250px;
            float:left;
        }
        .img{
            float:left;
            height:250px;
            width:100%;
        }
        .on-img{
            
            float: left;
            position: absolute;
            left: 127px;
            top: 129px;
            z-index: 1000;
            color: #FFFFFF;
            /* background-color:#a5519f; */
            /* background-color:white; */
            width:154px;
            height:65px;
            font-size:13px;
            padding:0px;
        }
        .contain_out{
            width:400px;
            height:250px;
            border:8px solid #ffd45e;
            background-color:#a5519f;
        }
    @media print{
        
    }
        }
        .img{
            float:left;
            height:250px;
            width:100%;
        }
        .on-one-img{
            float: left;
            position: absolute;
            left: 573px;
            top: 302px;
            z-index: 1000;
            color: #000000;
            font-weight: bold;
            /* background-color:white; */
            width:130px;
            height:23px;
            font-size:14px;
            border-radius:3px;
            padding:0px;
        }
        .on-two-img{
            float: left;
            position: absolute;
            left: 818px;
            top: 302px;
            z-index: 1000;
            color: #000000;
            font-weight: bold;
            background-color:white;
            width:130px;
            height:23px;    
            font-size:14px;
            border-radius:3px;
            padding:0px;
        }
        .blog_buy_now{
            font-size: 26px;
            font-weight: 600;
            text-align: center;
            margin-top: 23px;
        }
        .price_detail{
            font-size: 13px;
            font-weight: bold;
        }
        .btn_buy_cart_next > button{
            width: 200px;
            margin-top: 20px; 
        }
</style>
<div class="portlet light bordered" style="overflow: hidden;">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-dashboard fa-fw"></i> COUPON CARD CONTROL PANEL</h2>
        </div>
        <div class="col-md-12">
            <br>
            <br>
        </div>
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="active tap_coupon_card menu_tap"><a data-toggle="tab" href="#coupon_card">COUPON CARD</a></li>
                <li class="tap_buy_coupon_card menu_tap"><a data-toggle="tab" href="#buy_coupon_card">BUY COUPON CARD</a></li>
                <li class="tap_checked_out menu_tap"><a data-toggle="tab" href="#menu2">CHECKED OUT</a></li>
            </ul>
        </div>
        
    </div>
    <div class="col-md-12" style="margin-top: 40px;">
        <div class="tab-content">
            <div id="coupon_card" class="tab-pane fade in active">
                <div class="con-img">
                    <div class="on-img"><font style="text-transform:uppercase;font-weight:bold;font-size:11px;" size="3px">&nbsp;<?=$name?></font><br>
                        <font style="text-transform:uppercase;font-size:11px;" size="2px">&nbsp;<?=$phone?></font><br>
                        <font style="text-transform:uppercase;font-size:11px;" size="3px">&nbsp;<?=$pro?></font></div>
                        <img class="img"  src="../../img/img-coupon/Coupon_Card Font-4.jpg">
                </div>
                <div class="con-img">
                    <div style="font-size:12.5px;margin-top:4px;" class="on-one-img"><font>&nbsp;
                        <?php echo $user_introducer_id; ?></font></div>
                    <div style="font-size:12.5px;margin-top:4px;" class="on-two-img"><font>&nbsp;
                        <?php echo $car_id; ?></font></div>
                    <img class="img"  src="../../img/img-coupon/Coupon_Card Font-3.jpg">
                </div>
                <!-- <div class="col-md-11 text-right">
                    <button class="btn btn-md blue btn_buy_now">Buy Now</button>
                </div> -->
            </div>
            <div id="buy_coupon_card" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                    <h4 class="blog_buy_now">Buy Now</h4>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12 text-center price_detail">
                        <span>* 1 Box = 4.5 $</span>
                        <br>
                        <span>* 1 Box (Membership) = 3 $</span>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label for="">Quantity (Box) </label>
                            <input type="text" name="qty" id="qty" class="form-control">
                        </div>
                        <div class="col-md-6">
                        <label for="">Total Price</label>
                        <input type="text" name="total_price" id="total_price" class="form-control" value="120" readonly >
                        </div>
                        <div class="col-md-12"><br></div>
                        <div class="col-md-12 text-center btn_buy_cart_next">
                            <button class="btn btn-md red circle">Next</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
    </div>





    <form action="#" method="post" style="margin-top:50px;" enctype="multipart/form-data">
        <div class="container hidden" style="margin-top:200px;margin-left:30px;">
            <div class="col-md-12">
                <a href="page_front_print.php" target="_blank" class="btn  btn-info"><i class="fa fa-print"></i> Print Front</a>
                <a href="page_back_print.php" target="_blank" class="btn  btn-warning"><i class="fa fa-print"></i> Print Back</a>
                
            </div>
            <font color="red"><br>&emsp; *Remember When You print You will Print 100 Card</font>
        </div>
        
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        //    $(document).on('click', '.btn_buy_now',function() {

        //    }); 
        // }); 
    </script>
</div>
<?php include_once '../layout/footer.php' ?>
