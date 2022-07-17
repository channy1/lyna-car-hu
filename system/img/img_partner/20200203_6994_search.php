<?php 

 
$mylang=  $this->uri->segment(1);
if($mylang!="")
{
	$lang = $mylang; 
	
}	
else
{
	$lang ='en';
}   
 $myword = @array_column($data['lang'], 'tran_word', 'word');  

$search = $_GET['q']; 
$mypage1 = @$_GET['page']; ; 
//substr("testers", -1); // returns "s"
$mypage = substr($mypage1, -1); 
//echo $mypage; die;

 ?>

<section class="search-page pt-25 pb-25">
<div class="container">
<div class="row">
<div class="col-md-12">
<form method="get" action="<?=site_url()?><?=$lang?>/search">
<input type="search" placeholder="Search" name="q" value="<?=$search?>">
<button class="search-autocomplete__submit" type="submit" id="submit">
        <i class="icon-arrow" aria-hidden="true"></i>
    </button>
</form>
		  </div>
		  <div class="col-md-12">
		  <h4><b> <?=@$myword['Search']?>  <?=@$myword['for']?>: <?=$search?></b><span> (<?=@$myword['Showing']?> <?php 
								 
								$res['viewpdata']=$this->main_model->viewsearchproductData($search);
								echo count($res['viewpdata']);
								 ?>  <?=@$myword['Results']?> )</span></h4>
		  </div>
		  
		  <?php 
					
								$config['total_rows'] = $this->main_model->viewsearchDataCount($search);
   
            $data['total_count'] = $config['total_rows'];
			//echo $config['total_rows'];
            $config['suffix'] = '';
 if ($config['total_rows'] > 0) {
                $page_number = $mypage;
				echo $page_number; 
					
                $config['base_url'] = base_url().$lang.'/search?q='.$search.'&page='.$mypage;
				
				print_r($config['base_url'] );
				
                if (empty($page_number))
				{
                    $page_number = 1;
				}
				//echo $page_number;
			
                $offset = ($page_number - 1) * $this->pagination->per_page;
				//print_r($offset);
                //$this->main_model->setPageNumber($this->pagination->per_page);
				$perpage= $this->pagination->per_page;                
                $this->pagination->cur_page = $offset;
                $this->pagination->initialize($config);
					 //echo $perpage; 		
                $data['page_links'] = $this->pagination->create_links();
				//print_r($data['page_links']);
                  $data['productlist'] = $this->main_model->showsearchAll($perpage, $offset, $search);
				 //echo count($data['productlist']);
				// echo '<pre>';
				//  print_r($data['productlist']);
				  // die;     			
								
								
								
								foreach($data['productlist'] as $viewdata) { ?> 
		 <div class="col-md-12 search-list">
		  <div class="row">
		  <div class="col-md-3">
		  <div class="row search-box-img">
		  <img src="<?=site_url()?>uploads/images/product/<?=$viewdata->p_img?>">
		  </div>
		  </div>
		  <div class="col-md-9 search-conent">
		  <a href="<?=site_url()?><?=$lang?>/product/<?=$viewdata->p_url?>"><h2><?=$viewdata->p_name?></h2></a>
		  <p><span class="date"><i class="fa fa-clock-o"></i>  <?php echo  date("F d, Y", $viewdata->p_date);  ?></span> <span class="user"><i class="fa fa-user"></i> Product</span></p>
		  <p><?=$viewdata->p_disc?><?php //echo substr($viewdata->p_disc, 0, 300); ?></p>
		  <p class="text-right"><a href="<?=site_url()?><?=$lang?>/product/<?=$viewdata->p_url?>"><?=@$myword['Read More']?></a></p>
		  </div>
		  </div>
		  </div>	
					
 <?php } } ?>
							
		<div class="text-center"> <?php print_r($data['page_links']); ?>					
								

		 
		  
</div>
</div>
</section>