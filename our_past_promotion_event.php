<STYLE>
    .side-blog{background:#EC3323;padding:15px;}
    .side-blog ul li{font-size: 22px;
        color: #fff;
        line-height: 40px;
        font-weight: 100;
    }
    .list{box-shadow:0px 0px 10px 0px #ccc;max-height:150px;}
    .content-div h5{color:#EC3323;}
</STYLE>
<!-- header included  -->
<?php
require_once("header.php");
?>
<div class="container-fluid" style="margin-top: 10px;">
    <div style="height: 10px; width: 100%">
    </div>
</div>
<div class="container">
    <!--  <div style="height: 210px; width: 100%">
       </div> -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;PAST EVENTS
            </h2>
        </div>
        <div class="panel-body">
            <div class="container">

                <?php
                $v_sql = "SELECT * FROM tbl_event_promotion  ORDER BY e_pro_id  DESC LIMIT 7";
                $result = $connect->query($v_sql);

                if ($result->num_rows > 0) {
                    while($rows = $result->fetch_assoc()){
                        if(strtotime($rows['event_date'])<time()){
                        ?>
                        <div class="row mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 events_div">
                                <div class="list">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="side-blog">

                                                <ul>
                                                    <li class="date-li"><?php echo date('M d, Y',strtotime($rows['event_date'])); ?></li>
                                                    <li class="time-li"><?php echo date('H:i a',strtotime($rows['event_date'].' '.$rows['event_time'])); ?></li>
                                                    <li class="loc-li"><?php echo $rows['event_location']; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 ">
                                            <div class="content-div p-3">
                                                <a href="events.php?id=<?php echo $rows['e_pro_id']; ?>"><h5><strong><?php

                                                            if((@$_SESSION['lang']=='en')) {
                                                                echo $rows['title'];
                                                            }
                                                            else {
                                                                echo $rows['title_kh'];
                                                            }
                                                            ?></strong></h5></a>
                                                <p class="desc_p">
                                                    <?php
                                                    if((@$_SESSION['lang']=='en')) {
                                                        echo $rows['description'];
                                                    }
                                                    else {
                                                        echo $rows['description_kh'];
                                                    } ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } } ?>
                <div class="row mb-3 ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 events_div">
                        <div class="list">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="side-blog">
                                        <ul>
                                            <li class="date-li">Wed, 16 DEC 2020</li>
                                            <li class="time-li">8:00 AM - 4:00 PM</li>
                                            <li class="loc-li">MELBOURNE</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-8 ">
                                    <div class="content-div p-3">
                                        <h5><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit,.</strong></h5>
                                        <p class="desc_p">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!--container ends-->
        </div>
    </div>
    <!-- model alert for customer click -->
</div>
<!-- model alert for customer click -->
<!-- finished container section -->
<!-- inlcude footer buttom -->
<?php require_once("footerpartner.php"); ?>