<?php 

    $layout_title = "Welcome Dashboard";

    $menu_active =0;

    include_once '../../config/database.php';

    include_once '../../config/athonication.php';

    include_once '../layout/header.php';

?>
<style>
.dms h2{
      font-size: 34px;
    margin-bottom: 30px;
    color: #f15f22;
}
.dms {
    border: 10px solid #a4509f;
    padding: 20px;
}
.dmsbox-area:hover {
    box-shadow: -2px 1px 7px 3px #a4509f;
    border: 0px solid #a4509f;
}	
.dmsbox-area {
	background: #f9eaf8;
	text-align: center;
	padding: 10px;
	margin-bottom: 30px;
/*	border: 1px solid #a4509f;*/
	    transition: all 0.5s;
}
.dmsbox-area h3 {
font-size: 16px;
font-weight: 600;
	margin: 0px;
}
.dmsbox-area img {
margin-bottom:20px;
	width: 80px;
	    filter: invert(1);
}
.dmsbox-area a {
    color: #fff;
	text-decoration: none;
}
	.green{
		background:#73b748; 
	}
	.pink{
		background:#de567c;
	}
	.sky{
		background:#0caed4;
	}
	.yellow{
		background: #ffb401;
	}
	.orange{
		background: #f27b53;
	}
	.purple{
	background:#9d4a9c;	
	}
</style>




<div class="portlet light bordered">
    <div class="row">
        <div class="col-xs-12">
            <h2><i class="fa fa-dashboard fa-fw"></i> Dashboard</h2>
        </div>
    </div>
	<div class="dms">
		<h2>Database Management System</h2>
	<div class="row">
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area green">
				<a href="../website_info/">
				<img src="img/img1.png">
				<h3>Home</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area pink">
				<a href="../partner_list/">
				<img src="img/img2.png">
				<h3>Partner List</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area sky">
				<a href="../customer_list/">
				<img src="img/img3.png">
				<h3>Customer List</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area yellow">
				<a href="../vendor/">
				<img src="img/img4.png">
				<h3>Vendor List</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area yellow">
				<a href="../admin_package/services.php">
				<img src="img/img5.png">
				<h3>System Packages</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area sky">
				<a href="../quotation_information_form_car/">
				<img src="img/img6.png">
				<h3>Quotations</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area pink">
				<a href="../agreement/">
				<img src="img/img7.png">
				<h3>Agreement</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area green">
				<a href="../car_invoice/">
				<img src="img/img8.png">
				<h3>Invoice</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area pink">
				<a href="../rent_planner/">
				<img src="img/img9.png">
				<h3>Rent Planner</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area green">
				<a href="../maintenance_repair/">
				<img src="img/img10.png">
				<h3>Reports</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area yellow">
				<a href="../thank_you_letter/">
				<img src="img/img11.png">
				<h3>Customized Report [TOP]</h3>
				</a>	
			</div>
		</div>
		<div class="col-md-3 col-sm-6">
			<div class="dmsbox-area sky">
				<a href="../accounting/revenue_list.php">
				<img src="img/img12.png">
				<h3>Accounting System</h3>
				</a>	
			</div>
		</div>
	</div>
	</div>
	<!--<img src="../../img/img_system/database_management_system.png" alt="" width="750px">-->

        </div>

        

    </div>

</div>













<?php include_once '../layout/footer.php' ?>

