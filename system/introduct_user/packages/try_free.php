<?php 
    $layout_title = "Welcome Dashboard";
    $menu_active =0;
    include_once '../../config/database.php';
    include_once '../../config/athonication.php';
    include_once '../layout/header.php';
	


?>
<?php 
    if(isset($_POST['btn_submit'])){
        $v_name = @$_POST['txt_name'];
        $v_company = @$_POST['txt_company'];
        $v_email = @$_POST['txt_email'];
        $v_phone = @$_POST['txt_phone'];
        $v_info = @$_POST['txt_info'];
        $user_id=@$_SESSION['user']->user_id;


        $query_add = "INSERT INTO tbl_try_free (
                tf_name,
                tf_company,
                tf_email,
                tf_phone,
                tf_info,
                intro_use_id,
                status
                ) 
            VALUES(
                '$v_name',
                '$v_company',
                '$v_email',
                '$v_phone',
                '$v_info',
                '$user_id',
                '0'
                )";

        if($connect->query($query_add)){
            $sms = '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Successfull!</strong> Data inserted ...
            </div>'; 
        }else{
            $sms = '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error!</strong> Query error ...
            </div>';   
        }
    }
  echo   mysqli_error ( $connect );

 ?>

<div class="portlet light bordered">
	    <div class="row">
	        <div class="col-xs-12">
            <?= @$sms ?>
	        </div>
	    </div>
	<div class="portlet light bordered">
	   
	    <div class="portlet-title">
	       
	        <div class="tools"> </div>
	    </div>
	    <div class="portlet-body">
	    	<div class="row">
	    		<div class="col-md-6">
	    	<div class="post-content"><div class="fusion-fullwidth fullwidth-box fusion-fullwidth-1 fusion-parallax-none hundred-percent-fullwidth fusion-equal-height-columns" style="border-color:#eae9e9;border-bottom-width: 0px;border-top-width: 0px;border-bottom-style: solid;border-top-style: solid;padding-bottom:20px;padding-top:20px;padding-left:;padding-right:;"><style scoped="scoped">.fusion-fullwidth-1{padding-left:px !important;padding-right:px !important;}</style><div class="fusion-row"><div class="fusion-one-full fusion-layout-column fusion-column-last fusion-spacing-no" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper" style="min-height: 67px; height: auto;"><div class="fusion-column-table" style="height: 67px;"><div class="fusion-column-tablecell"><div class="fusion-title title fusion-title-size-one"><h1 class="title-heading-left" data-fontsize="34" data-lineheight="48"></h1><h1 style="font-size: 3em; text-shadow: 2px 2px 5px #666;" data-inline-fontsize="true" data-inline-lineheight="true" data-fontsize="42" data-lineheight="48">Easy Reservations Online Trial</h1><div class="title-sep-container"><div class="title-sep sep-double sep-solid" style="border-color:#1e73be;"></div></div></div><div class="fusion-clearfix"></div></div></div></div></div><div class="fusion-clearfix"></div></div></div><div class="fusion-one-third fusion-layout-column fusion-spacing-yes" style="margin-top:35px;margin-bottom:20px;"><div class="fusion-column-wrapper"><div class="imageframe-align-center"><span class="fusion-imageframe imageframe-none imageframe-1 hover-type-none"> <img src="https://www.easyrentpro.com/wp-content/uploads/2014/12/ero.png" alt="Easy Reservations Online Trial Request" class="img-responsive" style="display: inline;" data-lazy-loaded="true"><noscript><img alt="Easy Reservations Online Trial Request" src="https://www.easyrentpro.com/wp-content/uploads/2014/12/ero.png" class="img-responsive"/></noscript></span></div><div class="fusion-sep-clear"></div><div class="fusion-separator fusion-full-width-sep sep-none" style="border-color:#e0dede;margin-left: auto;margin-right: auto;margin-top:;"></div><h3 data-fontsize="16" data-lineheight="32">This is a web based solution that will allow&nbsp;your car rental business to take full advantage of the growing trend of online vehicle reservations. With this system, you can offer customers, hotels ,travel agents etc. the ability to do&nbsp;live queries and make online vehicle reservations directly from your website. Take a look to our <a href="http://www.easyrentpro-demo-car-rental.com" target="_blank"><strong>DEMO</strong></a> and see how it works</h3><div class="fusion-clearfix"></div></div></div><div class="fusion-two-third fusion-layout-column fusion-column-last fusion-spacing-yes" style="margin-top:0px;margin-bottom:20px;"><div class="fusion-column-wrapper"><p><b>You are about to Download the Trial version of our product</b></p><div role="form" class="wpcf7" id="wpcf7-f9896-p9905-o1" dir="ltr" lang="en-US"><div class="screen-reader-response"></div></div><div class="fusion-clearfix"></div></div></div><div class="fusion-clearfix"></div></div>
	    		</div>
	    		<div class="col-md-6">
	    			<form action="try_free.php" method="post" class="wpcf7-form" novalidate="novalidate"><div style="display: none;"> <input type="hidden" name="_wpcf7" value="9896"> <input type="hidden" name="_wpcf7_version" value="4.4"> <input type="hidden" name="_wpcf7_locale" value="en_US"> <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f9896-p9905-o1"> <input type="hidden" name="_wpnonce" value="21aaa7ac0e"></div><p>Name (required)<br> <span class="wpcf7-form-control-wrap cl-name"><input type="text" name="txt_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span></p><p>Company(required)<br> <span class="wpcf7-form-control-wrap company"><input type="text" name="txt_company" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span></p><p>Email (required)<br> <span class="wpcf7-form-control-wrap email"><input type="email" name="txt_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false"></span></p><p>Phone Number (required)<br> <span class="wpcf7-form-control-wrap phone-number"><input type="text" name="txt_phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></span></p><p>How did you hear from us: (required)<br> <span class="wpcf7-form-control-wrap Hear"><div class="wpcf7-select-parent"><select name="txt_info" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false"><option value="">---</option><option value="Search Engine">Search Engine</option><option value="Email">Email</option><option value="Family Friend">Family Friend</option><option value="Other Website">Other Website</option><option value="Newsletter/Article">Newsletter/Article</option><option value="Other">Other</option></select><div class="select-arrow" style="height: 27px; width: 27px; line-height: 27px;"></div></div></span></p><div class="wpcf7-form-control-wrap"><div data-sitekey="6LcGWyIUAAAAAJKiE38DFK_dI_W5QLz06-2-Iq-u" class="wpcf7-form-control g-recaptcha wpcf7-recaptcha"></div><noscript><div style="width: 302px; height: 422px;"><div style="width: 302px; height: 422px; position: relative;"><div style="width: 302px; height: 422px; position: absolute;"> <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LcGWyIUAAAAAJKiE38DFK_dI_W5QLz06-2-Iq-u" frameborder="0" scrolling="no" style="width: 302px; height:422px; border-style: none;"> </iframe></div><div style="width: 300px; height: 60px; border-style: none; bottom: 12px; left: 25px; margin: 0px; padding: 0px; right: 25px; background: #f9f9f9; border: 1px solid #c1c1c1; border-radius: 3px;"><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;">
</textarea></div></div></div></noscript></div><p></p><p><button type="submit" name="btn_submit" class="btn blue"><i class="fa fa-save fa-fw"></i>Save</button></p><div class="wpcf7-response-output wpcf7-display-none"></div></form>
	    		</div>
	    	
	    </div>
	</div>
</div>





