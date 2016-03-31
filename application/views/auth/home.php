<script src="<?=base_url();?>assets/js/pages/home.js">
</script>
<script>
var baseurl='<?=base_url();?>';
</script>
<!-- Begin Main Wrapper -->
<style>
.change{
background:rgba(255, 255, 255, 0.80) !important
}
</style>
<div class="main-wrapper"><?php print_r($availableArea);?>
	<div class="main-container">
	<div class="row">
		<div class="large-12 columns">					
		<img src="<?=base_url();?>assets/images/demo/slider/3.jpg" alt="" />		
		</div>
	</div>
	<!-- End Main Slider -->

	<!-- Main Content -->
	<div class="row appointment-form">
        <div class="large-12 columns">
			<div class="appointment-block">		
				<div class="large-8 medium-10 small-10 columns large-offset-2 medium-offset-1 small-offset-1">
				<div class="text-center CustomColor">Discover great places around you in Delhi NCR</h1>
				</div>		
				<div class="clearfix"></div>
				<div class="large-10 medium-10 small-12 columns large-offset-2 medium-large-2 ">
				<div class="row collapse">
				<div class="small-9 columns">
				<input type="text" class="appointment-input selected-cat" id="selected-cat" style="display:none;width:27%;height: 44px;text-align: center;padding-top:15px;background:#C4C3BF;float:left">
				<form id="myform" method="post" action="<?=base_url();?>serviceOrLocation">
				<input type="text" placeholder="Search" class="appointment-input" id="serviceName" name="serviceOrLocation">
				</form>
				<input type="text" placeholder="Select area" class="appointment-input left" id="serviceArea" style="display:none;width:73%;border-radius:0px;">
				<div class="startService clearfix" style="display:none;background:rgba(238, 227, 227, 0.8);">
                <ul id="explore-by" class="clearfix" style="list-style: none">
						<?php
							if(!empty($serviceName))
							{
							    foreach($serviceName as $value)
								{	
						?>
                        <li class="item service" style="cursor:pointer;height: 32px;padding: 4px 0px 0px 22px;" data-item_type="cat" data-item_id="1" id="service-<?=$value['id']?>"><?=$value['serviceName']?></li>
						<?php
								}
							}
						?>
				</ul>
				</div>
				<div class="serviceArea clearfix" style="display:none;width:73%;float:right;background:rgba(238, 227, 227, 0.8)">
                <ul id="" class="clearfix" style="list-style: none">
						<?php
							if(!empty($availableArea))
							{
							    foreach($availableArea as $value)
								{	
						?>
                        <li class="item area" style="cursor:pointer;height: 32px;padding: 4px 0px 0px 22px;" data-item_type="cat" data-item_id="1" id=""><?=$value['location']?></li>
						<?php
								}
							}
						?>
				</ul>
				</div>
				<form method="post" action="<?=base_url();?>getlist" id="getList">
				<input type="hidden" value="" name="findServiceName" id="findServiceName">
				<input type="hidden" value="" name="findCityName" id="findCityName">
				</form>
				</div>
				<div class="small-3 columns">
				<a href="#" class="button alert SearchIconButton "><i class=" icon-search SearchIcon"></i></a>
				</div>
				</div>
				</div>		
				</div>	
			</div>
		</div>
    </div>
	
	</div>
	<div class="clearfix"></div>
   	<div class="row main-content ">
        <div class="large-12 columns">
			<div class="row">		
				<div class="stripDiv">
				<div class="large-3 columns">
				<div class="stripBox">
				<div class="rectImage post_image"><img src="<?=base_url();?>assets/images/rect.jpg"></img></div>
				<div class="rectDiv"><p><a href="#">Lorem Lipsum</a><br>Hair Style $25
				<br><img src="<?=base_url();?>assets/images/circle4.png" class="rectDivImg"></img><span class="rectTxt">Listed Lorem Lsun</span></p>
				</div>
				</div>
				</div>
				<div class="large-3 columns">
				<div class="stripBox">
				<div class="rectImage post_image"><img src="<?=base_url();?>assets/images/rect1.jpg"></img></div>
				<div class="rectDiv"><p><a href="#">Lorem Lipsum</a><br>Hair Style $25
				<br><img src="<?=base_url();?>assets/images/circle4.png" class="rectDivImg post_image"></img><span class="rectTxt">Listed Lorem Lsun</span></p>
				</div>
				</div>
				</div>
				<div class="large-3 columns">
				<div class="stripBox">
				<div class="rectImage post_image"><img src="<?=base_url();?>assets/images/rect.jpg"></img></div>
				<div class="rectDiv"><p><a href="#">Lorem Lipsum</a><br>Hair Style $25
				<br><img src="<?=base_url();?>assets/images/circle4.png" class="rectDivImg post_image"></img><span class="rectTxt">Listed Lorem Lsun</span></p>
				</div>
				</div>
				</div>
				<div class="large-3 columns">
				<div class="stripBox">
				<div class="rectImage post_image"><img src="<?=base_url();?>assets/images/rect1.jpg"></img></div>
				<div class="rectDiv"><p><a href="#">Lorem Lipsum</a><br>Hair Style $25
				<br><img src="<?=base_url();?>assets/images/circle4.png" class="rectDivImg post_image"></img><span class="rectTxt">Listed Lorem Lsun</span></p>
				</div>
				</div>
				</div>
				</div>	
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row circularMarginRow">
		<div class="large-12 columns log-in-row">
		<div class="row">
		<div class="large-4 columns text-center">
		<div class="CircleBox">
		<img src="<?=base_url();?>assets/images/circle1.png" class="post_image">
		<div class="CircleAligment">
		<h3>What is Lorem Lipsum ?</h3>
		<p>Lorem Ipsum is simply dummy text 
		of the<a href="#"> printing</a> and typesetting <a href="#">industry</a>. 
		</p>
		</div>
		</div>
		</div>
		<div class="large-4 columns text-center">
		<div class="blankDiv">
		<img src="<?=base_url();?>assets/images/circle3.png" class="post_image">
		<div class="CircleAligment">
		<h3>What is Lorem Lipsum ?</h3>
		<p>Lorem Ipsum is simply dummy text 
		of the<a href="#"> printing</a> and typesetting <a href="#">industry</a>. 
		</p>
		</div>
		</div>
		</div>
		<div class="large-4 columns text-center">
		<div class="CircleBox">
		<img src="<?=base_url();?>assets/images/circle2.png" class="post_image">
		<div class="CircleAligment">
		<h3>What is Lorem Lipsum ?</h3>
		<p>Lorem Ipsum is simply dummy text 
		of the<a href="#"> printing</a> and typesetting <a href="#">industry</a>. 
		</p>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
	<footer class="footer_wrapper">	
	<div class="row footer-part">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-3 columns">
						<h4 class="footer-title">Reverse Auction</h4>
						<div class="divdott"></div>
						
						
					</div>
					<div class="large-3 columns">
						<h4 class="footer-title">Latest Posts</h4>
						<div class="divdott"></div>
						<div class="footer_part_content">
							<ul class="latest-posts">
								<li>
									Update: WordPress Theme Submission Requirements
									<div class="divline"><span></span></div>
								</li>
								<li>
									Envato's Most Wanted - $5,000 Reward for the First 15 Hosting Templates
									<div class="divline"><span></span></div>
								</li>
								<li>
									Does a well designed thumbnail increase your sales?
									<div class="divline"><span></span></div>
								</li>
							</ul>
						</div>
					</div>
					

					<div class="large-4 columns">
						<h4 class="footer-title">Gallery</h4>
						<div class="divdott"></div>
						<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-1.jpg"></a>
					</div>
						<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-2.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-3.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-4.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-5.jpg"></a>
					</div>
					<div class="footer-img">
					<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-6.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-7.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-8.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-1.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-2.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-3.jpg"></a>
					</div>
					<div class="footer-img">
						<a href="getlist.html"><img src="<?=base_url()?>assets/images/demo/gallery/img-4.jpg"></a>
					</div>
					</div>
						
					<div class="large-2 columns"> 
						<h4 class="footer-title">Us In Media</h4>
						<div class="divdott"></div>
						
					</div> 
				</div>
			</div>
		</div>
	</div>	
	<!-- Start Main Slider -->
	<!--<div class="main-container">
	<div class="row">
		<div class="large-12 columns">						
			 <div class="slider-wrapper theme-default slider">
				<div id="slider" class="nivoSlider">
					<img src="<?= base_url();?>assets/images/demo/slider/1.jpg" data-thumb="images/demo/news/1.jpg" alt="" title="#caption1" />
					<a href="http://www.google.com"><img src="<?=base_url();?>assets/images/demo/slider/2.jpg" data-thumb="<?=base_url();?>assets/images/demo/news/2.jpg" alt="" title="#caption2"  /></a>
					<img src="<?=base_url();?>assets/images/demo/slider/3.jpg" data-thumb="<?=base_url();?>assets/images/demo/news/3.jpg" alt="" title="#caption3" />
				</div>
			</div>			
		</div>
	</div>-->
	<!-- End Main Slider -->

	<!-- Main Content -->
	<!--<div class="row appointment-form">
        <div class="large-11  columns large-offset-1 ">
			<div class="appointment-block">		
				
				<div class="large-5 medium-5 small-5 columns">
				<input type="text" placeholder="Serices" name="name" class="appointment-input" />
				</div>
				<div class="large-5 medium-5 small-5 columns">
				<input type="text" placeholder="Place" name="name" class="appointment-input" />
				</div>
				<div class="large-2 medium-2 small-2 columns">
			  <p><a href="#" class="small radius button appointment-button">Book</a></p></div>
				<div class="clearfix"></div>	
			</div>	
		</div>
    </div>
	</div>
	<div class="clearfix"></div>-->
   	<!--<div class="row main-content">
        <div class="large-12 columns">
			<div class="row">		
				<div class="large-3 columns">
					<div class="featured-block">
						<a href="#">
							<span class="icon-sitemap fblock-icon"></span>
							<div class="fblock-content">
								<p class="fblock-main"><strong>Clear <strong>Defense</strong> Treatment</strong></p>
								<p class="fblock-sub">Learn more</p>
							</div>
						</a>
					</div>
				</div>
				<div class="large-3 columns">
					<div class="featured-block">
						<a href="#">
							<span class="icon-lightbulb fblock-icon"></span>
							<div class="fblock-content">
								<p class="fblock-main">Keratain <strong>Treatment</strong></p>
								<p class="fblock-sub">Learn more</p>
							</div>
						</a>
					</div>
				</div>
				<div class="large-3 columns">
					<div class="featured-block">
						<a href="#">
							<span class="icon-laptop fblock-icon"></span>
							<div class="fblock-content">
								<p class="fblock-main">Hydra <strong>Hair</strong></p>
								<p class="fblock-sub">Learn more</p>
							</div>
						</a>
					</div>
				</div>
				<div class="large-3 columns">
					<div class="featured-block">
						<a href="#">
							<span class="icon-cogs fblock-icon"></span>
							<div class="fblock-content">
								<p class="fblock-main">Head  <strong>Massage</strong> </p>
								<p class="fblock-sub">Learn more</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>-->
</div>

<script>$(document).foundation()</script> 
<script>
//jQuery.noConflict();

jQuery(window).load(function() {
	jQuery('#slider').nivoSlider({ controlNav: false});	
});
jQuery(document).ready(function() {
	jQuery('input.datepicker').Zebra_DatePicker();
	// Carousel
	jQuery("#carousel-type1").carouFredSel({
		responsive: true,
		width: '100%',
		auto: false,
		circular : false,
		infinite : false, 
			items: {visible: {min: 1,max: 4},
		},
		scroll: {
			items: 1,
			pauseOnHover: true
		},
		prev: {
			button: "#prev2",
			key: "left"
		},
		next: {
			button: "#next2",
			key: "right"
		},
		swipe: true
	});
	
	jQuery(".work_slide ul").carouFredSel({
		circular: false,
		infinite: true,
		auto: false,
		scroll:{items:1},
		items: {visible: {min: 3,max: 3}},
		prev: {	button: "#slide_prev", key: "left"},
		next: { button: "#slide_next",key: "right"}
	});
	jQuery("#testimonial_slide").carouFredSel({
		circular: false,
		infinite: true,
		auto: false,
		scroll:{items:1},
		prev: {	button: "#slide_prev1", key: "left"},
		next: { button: "#slide_next1",key: "right"}
	});
	
	
});  
	
</script>
<!-- Initialize JS Plugins -->
<script src="<?=base_url();?>assets/js/app-bottom-calls.js"></script> 