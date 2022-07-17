<?php $this->load->view('webadmin/common/header');

 $this->load->model('dashboard_model');
 ?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Website Setting</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?=site_url()?>webadmin/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Website Setting</span></li>
							</ol>
					
							
						</div>
					</header>

				
						<div class="row">
						<div class="col-md-8">
							<form id="form1" action="<?=site_url()?>webadmin/update_logo" method="post" class="form-horizontal" enctype="multipart/form-data">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title">Update Logo
									</h2>
										
									</header>
									<div class="panel-body">
								
										
											<div class="form-group">
												<label class="col-md-3 control-label">Website Main Logo</label>
												<div class="col-md-9">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="logo_img"  />
															</span>
													 
     
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="form-group">
												<label class="col-md-3 control-label">Website Other Logo</label>
												<div class="col-md-9">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fa fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="logo_other"  />
															</span>
													 
     
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>
											</div>
										
										
											
										<br/><br/>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Submit</button>
												
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						
						<div class="col-md-4">
							
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title">View Logo
									</h2>
										
									</header>
									<div class="panel-body" style="background-color:#cccccc;">
									<h4> Site Main Logo  </h4>
									<?php  
									
										 $res['logo']=$this->dashboard_model->viewlogo(); 
									foreach($res['logo'] as $sitedata)

										{  ?>
									<img src="<?php echo site_url(); ?>uploads/images/<?=$sitedata->g_content?>" width="40%">
										<?php } ?>
									
										<hr/>
										
										<h4> Site Other Logo  </h4>
									<?php  
									
										 $res['logo']=$this->dashboard_model->viewotherlogo(); 
									foreach($res['logo'] as $sitedata)

										{  ?>
									<img src="<?php echo site_url(); ?>uploads/images/<?=$sitedata->g_content?>" width="40%">
										<?php } ?>
									</div>
									
								</section>
							
						</div>
					
					</div>
					
					<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
								
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						
								<h2 class="panel-title">Website Title And Keyword </h2>
								
							</header>
							
							<div class="col-md-12">
							<div class="panel-body">
							<form id="form2" action="<?=site_url()?>webadmin/update_title" method="post" class="form-horizontal" >
								<section class="panel">
									
									<div class="panel-body">
								
										
											<div class="form-group">
											<label class="col-sm-2 control-label">Please Select <span class="required">*</span></label>
											<div class="col-sm-8">
											
											 <select class="form-control" name="id">

                                                <option value="2" <?php if(isset($data['details'])){

    if($data['details']->id =="2"){echo "selected" ;}}?>>Website Title</option>

         <option value="3" <?php if(isset($data['details'])){

    if($data['details']->id =="3"){echo "selected" ;}}?>>Website Keyword</option>
	
	<option value="4" <?php if(isset($data['details'])){

    if($data['details']->id =="4"){echo "selected" ;}}?>>Website Description </option>
	
	

                                                

                                            </select>
											
												</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-2 control-label">Content <span class="required">*</span></label>
											<div class="col-sm-8">
											<input type="text" name="g_content" value="<?php if(isset($data['details'])){echo $data['details']->g_content ? $data['details']->g_content : '';}?>" class="form-control" placeholder="eg.:  Content" required/>
											
											
												
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Select Status<span class="required">*</span></label>
											<div class="col-sm-8">
											
											 <select class="form-control" name="status">

                                                <option value="1" <?php if(isset($data['details'])){

    if($data['details']->status =="1"){echo "selected" ;}}?>>Active</option>

         <option value="0" <?php if(isset($data['details'])){

    if($data['details']->status =="0"){echo "selected" ;}}?>>In-Active</option>

                                                

                                            </select>
											
												</div>
										</div>
										
											
										<br/><br/>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Submit</button>
												
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
							
							</div>
							
						
						</section>
						<section>
						
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" >
									<thead>
										<tr>
											<th>Sr. No.</th>
											<th>Type</th>
											<th>Content</th>											
											<th>Status</th>											
											<th class="hidden-phone">Edit</th>
											
										</tr>
									</thead>
									<tbody>
									 <?php  
									 
									  $res['viewdata']=$this->dashboard_model->viewstitleData(); 
									 
									 $i =1;   foreach($res['viewdata'] as $catdata)

										{  ?>
										<tr class="gradeX">
											<td><?=$i?></td>
											<td><?=$catdata->site_info;?> </td>
											<td><?=$catdata->g_content;?> </td>											
											<td><?php if ($catdata->status == "1") {echo "Active" ;}else {echo "In-Active" ;}?></td>
											<td > <a class="mb-xs mt-xs mr-xs btn btn-primary"  href="<?=base_url("webadmin/editstitle/$catdata->id")?>"> Edit</a></td>
											
										</tr> 
										<?php $i++; } ?>
										
										
									</tbody>
								</table>
							</div>
						
						</section>
					
<br/><br/>
<div class="row">
						<div class="col-md-8">
							<form id="form1" action="<?=site_url()?>webadmin/update_copyright" method="post" class="form-horizontal" enctype="multipart/form-data">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title">Copyright Section
									</h2>
										
									</header>
									<div class="panel-body">
								
										
											<div class="form-group">
												<label class="col-md-3 control-label">Copyright Content</label>
												<div class="col-md-9">
													
												<input type="text" name="g_content" value="<?php if(isset($data['details1'])){echo $data['details1']->g_content ? $data['details1']->g_content : '';}?>" class="form-control" placeholder="eg.: Copyright Name" required/>
											
												</div>
											</div>
											
											
										<br/><br/>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Submit</button>
												
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						
						<div class="col-md-4">
							
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title">View Copyright Section
									</h2>
										
									</header>
									<div class="panel-body" >
									<h4> Copyright Section  </h4>
									<?php  
									
										 $res['ctn']=$this->dashboard_model->viewcopyright(); 
									foreach($res['ctn'] as $sitedata)

										{  ?>
									
									<?=$sitedata->g_content?> - <?=$sitedata->lang_code?>
									<br/>
									<a class="mb-xs mt-xs mr-xs btn btn-primary"  href="<?=base_url("webadmin/editcopyright/$sitedata->id")?>"> Edit</a>
										<?php } ?>
									
										
									
									</div>
									
								</section>
							
						</div>
					
					</div>
					
					<div class="row">
						<div class="col-md-8">
							<form id="form1" action="<?=site_url()?>webadmin/update_emailfrom" method="post" class="form-horizontal" enctype="multipart/form-data">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title"> Receiving Email Section
									</h2>
										
									</header>
									<div class="panel-body">
								
										
											<div class="form-group">
												<label class="col-md-3 control-label">Receiving Email</label>
												<div class="col-md-9">
													
												<input type="text" name="g_content" value="<?php if(isset($data['details2'])){echo $data['details2']->g_content ? $data['details2']->g_content : '';}?>" class="form-control" placeholder="eg.: Receiving Email" required/>
											
												</div>
											</div>
											
											
										<br/><br/>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Submit</button>
												
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						
						<div class="col-md-4">
							
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title"> Receiving Email Section
									</h2>
										
									</header>
									<div class="panel-body" >
									<h4>Receiving Email   </h4>
									<?php  
									
										 $res['ctn']=$this->dashboard_model->viewemailfrom(); 
									foreach($res['ctn'] as $sitedata)

										{  ?>
									
									<?=$sitedata->g_content?>
									<br/>
									<a class="mb-xs mt-xs mr-xs btn btn-primary"  href="<?=base_url("webadmin/editemailfrom/$sitedata->id")?>"> Edit</a>
										<?php } ?>
									
										
									
									</div>
									
								</section>
							
						</div>
					
					</div>
						
						
						<div class="row">
						<div class="col-md-8">
							<form id="form1" action="<?=site_url()?>webadmin/update_emailto" method="post" class="form-horizontal" enctype="multipart/form-data">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title">Sending Email Section
									</h2>
										
									</header>
									<div class="panel-body">
								
										
											<div class="form-group">
												<label class="col-md-3 control-label">Sending Email </label>
												<div class="col-md-9">
													
												<input type="text" name="g_content" value="<?php if(isset($data['details3'])){echo $data['details3']->g_content ? $data['details3']->g_content : '';}?>" class="form-control" placeholder="eg.: Sending Email" required/>
											
												</div>
											</div>
											
											
										<br/><br/>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button name="submit" class="btn btn-primary">Submit</button>
												
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						
						<div class="col-md-4">
							
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									
								</div>
						

										<h2 style="padding-right:20px; padding-bottom:10px;" class="panel-title">Sending Email Section
									</h2>
										
									</header>
									<div class="panel-body" >
									<h4> Sending Email   </h4>
									<?php  
									
										 $res['ctn']=$this->dashboard_model->viewemailto(); 
									foreach($res['ctn'] as $sitedata)

										{  ?>
									
									<?=$sitedata->g_content?>
									<br/>
									<a class="mb-xs mt-xs mr-xs btn btn-primary"  href="<?=base_url("webadmin/editemailto/$sitedata->id")?>"> Edit</a>
										<?php } ?>
									
										
									
									</div>
									
								</section>
							
						</div>
					
					</div>
							
						
						</div>
					</div>
					<!-- end: page -->
				</section>
		
		
		
		
		<?php $this->load->view('webadmin/common/footer'); ?>	
			