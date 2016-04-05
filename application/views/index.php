<!-- Begin Main Wrapper -->
<div class="main-wrapper">
	<!-- Start Main Slider -->
	<div class="main-container">
	<div class="row">
		<div class="large-12 columns">						
			 <div class="slider-wrapper theme-default slider">
				<div id="slider" class="nivoSlider">
					<img src="<?=base_url();?>assets/images/demo/slider/1.jpg" data-thumb="images/demo/news/1.jpg" alt="" title="#caption1" />
					<a href="http://www.google.com"><img src="<?=base_url();?>assets/images/demo/slider/2.jpg" data-thumb="<?=base_url();?>assets/images/demo/news/2.jpg" alt="" title="#caption2"  /></a>
					<img src="<?=base_url();?>assets/images/demo/slider/3.jpg" data-thumb="images/demo/news/3.jpg" alt="" title="#caption3" />
				</div>
			</div>			
		</div>
	</div>
	<!-- End Main Slider -->

	<!-- Main Content -->
	<div class="row appointment-form">
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
	<div class="clearfix"></div>
   	<div class="row main-content">
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
	</div>
</div>

<script>$(document).foundation()</script> 
<script>
jQuery.noConflict();

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
<script src="js/app-bottom-calls.js"></script> 