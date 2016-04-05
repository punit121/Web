<style>
.teal {
color: #1eab9c!important;
font-family: inherit;
text-decoration: inherit;
}
.activeMenu{
font-weight:bold;
}
.borderOffer {
border: 1px solid #ccc;
padding-top: 2%;
}
.spinner-container{
	display:none !important}

</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css" />
<script src="<?=base_url()?>new/js/portfolio.pack.min.js"></script>

<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript">
    var baseurl='<?=base_url()?>';
</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/pages/viewMap.js"></script>
<!--<script type="text/javascript" src="<?=base_url()?>assets/js/pages/offer.js"></script>
mukesh-->
<input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); }?>">

<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="firstModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<h3>Write a recommendation for <?php if(!empty($offerById[0]['name']))
				echo $offerById[0]['name'];
				else
				echo 'No name';?> and make their day!</h3>
				</div>
				<div class="large-12 columns text-center">
				<img src="<?=base_url();?>assets/images/modal.jpg">
				</div>
				<div class="large-12 columns log-in-row">
				<textarea placeholder="Recommendation" id="recommendMessage1"></textarea>				
				<input type="hidden" id="merchanIdForRecommendation" value="<?php $url=$_SERVER['REQUEST_URI'];
						echo $end = end((explode('/', $url)));?>">
				</div>
				<div class="large-12 columns log-in-row">
				<button type="button" class="button secondary" id="recommendationSend" style="width:20%">Submit</button>
				</div>
				<a class="close-reveal-modal radius-close1" id="closeRecommendation">&#215;</a>
				</div>
			</div>
		</div>
</div>

<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="buyModalNotCustomer" class="reveal-modal" data-reveal>
				<div class="row">
					<div class="large-12 columns">
						<h4>You are not customer.</h4>
					</div>					
				</div>				
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="addcartitem" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Item Added To Cart.</h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>

<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="buyModal" class="reveal-modal" data-reveal>
				<div class="row">
					<div class="large-12 columns">
						<h4>Your Basket</h4>
					</div>	
				</div>
				<div class="row">
					<div class="large-12 columns">
						<table>
							<thead>
							   <tr>
								 <th width="150" class="text-center">Item Name</th>
								 <th width="200" class="text-center">Booking Price</th>
                                 <th width="150" class="text-center">Orignal Price</th>
								 <th width="150" class="text-center">Discounted Price</th>
								 <th width="50" class="text-center">Actions</th>
							   </tr>
							</thead>
							<tbody id="offerBidAppend">
							   <tr class="text-center">
								 <td id="offerName"></td>
								 <td id="bookedPrice"></td>
								 <td id="discountedPrice"></td>
							   </tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<div class="total right" >
							<h4 class="left">Total amount &nbsp; </h4><h4 class="left" id="Priced">2000</h4>
						</div>
					</div>				  
				</div>
				<div class="row">     
					<div class="large-6 columns">
						<a href="#" class="button radius widthButton closeModal">Continue</a>
					</div>
					<div class="large-6 columns">
						<a href="#" class="button radius widthButton">Proceed to Checkout</a>
					</div>
				</div>
				<a class="close-reveal-modal radius-close1 closeModal">&#215;</a>
			</div>
		</div>
</div>

<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="recommendModalSuccessfully" class="reveal-modal" data-reveal>
				<div class="row">				
					<div class="large-12 columns log-in-row">
						Your recommendation has been successfully sent.
					</div>					
					<a class="close-reveal-modal radius-close1" id="">&#215;</a>
				</div>
			</div>
		</div>
</div>
<div class="main-content-top">
	<div class="main-wrapper">	
		<div class="row">
			<?php if(isset($offerById)){
					foreach($offerById as $value)
					{
			?>
			<div class="large-3 columns">
			<div class="round-frame">
			<?php if($value['offerImage']){?>
			<img src="<?=base_url()?>assets/images/demo/offer/<?=$value['offerImage']?>" style="width:100%">
			<?php }else{?>
			<img src="<?=base_url()?>assets/images/demo/offer/usericon.jpg" style="width:100%">
			<?php } ?>
			<div class="clearfix icon"></div>
			<P><a href="#recommendation1">Read Recommendations</a>
			<br>
            <input type="hidden" id="merChantId" value="<?php  echo $value['merchantId']; ?>">
			<a href="<?=base_url()?>merchant/<?=$this->usermodel->findMerchantSalonNameById($value['merchantId'])?>/<?=$value['merchantId']?>">View full profile </a>
			</P>
			
			</div>
			</div>        
			<div class="large-5 columns">
				<input type="hidden" id="offerNameById" value="<?=$value['name']?>">
				<input type="hidden" id="offerIdById" value="<?=$value['id']?>">
				<input type="hidden" id="bookedPriceById" value="<?=$value['bookingPrice']?>">
				<input type="hidden" id="priceById" value="<?=$value['price']?>">
				<h2><?=$value['name']?></h2>
				<h3>WITH <a href="<?=base_url()?>merchant/<?=$this->usermodel->findMerchantSalonNameById($value['merchantId'])?>/<?=$value['merchantId']?>"><?=$this->usermodel->findMerchantSalonNameById($value['merchantId'])?></a> AT <?php $result=$this->usermodel->findMerchantById($value['merchantId']); echo $result[0]['location'];?></h3>
				<p><?=$value['features']?></p>
			</div> 
			<div class="large-4 medium-4 small-12 columns borderOffer">
					<div class="row">
							<div class="large-6 small-12 medium-6 columns">
							<span class="foradianFont foradianFontSize"><i>
							<?=$value['bookingPrice']?></i></span>
							</div>
							<div class="large-6 small-12 medium-6 columns">
							<a href="#" id="buyNowbtn" rel="<?=$value['id']?>" style="text-decoration:none" class="button radius widthButton">Add To Cart</a>
							</div>
							</div>							
						<div class="row">
							<div class="large-4 medium-4 small-4 columns">
							<p><span class="foradianFont">VALUE <br><span class="fordianPrice"><i><?=$value['price']?></i></span></span> </p>
							</div>
							<div class="large-4 medium-4 small-4 columns">
							<p><span class="foradianFont">DISCOUNT <br><span class="fordianPrice"><i><?=$value['discount']?>%</i></span></span> </p>
							</div>
							<div class="large-4 medium-4 small-4 columns">
							<p><span class="foradianFont">SAVINGS <br><span class="fordianPrice"><i><?php echo $result=($value['discountedPrice'])?></i></span></span> </p>
							</div>
							<!--<div class="large-3 columns widgets side-widgets" style="float:right">         <h4>Contact</h4>
							<table>
						<tbody>
						<tr>
						  <td>Tuesday</td>
						  <td>12.00pm</td>
						  <td>-</td>
						   <td>8.00pm</td>
							</tr>
						<tr>
						  <td>Wednesday</td>
						  <td>11.00am</td>
						  <td>-</td>
						  <td>8.00pm</td>
						</tr>
						<tr>
						  <td>Thursday</td>
						  <td>12.00pm</td>
						  <td>-</td>
					   <td>8.30pm</td>
						</tr>
						<tr>
						  <td>Friday</td>
						  <td>3.00pm</td>
						  <td>-</td>
					   <td>8.00pm</td>
						</tr>
						<tr>
						  <td>Sunday</td>
						  <td>11.00am</td>
						  <td>-</td>
					   <td>8.00pm</td>
						</tr>
					  </tbody>
					</table>
					</section>            
					</div>-->
						<!-- End Sidebar Navigation -->
					</div>
						</div>
						
						<!--<div class="row recommBorder">							
						</div>-->
			</div>
			<?php }} ?>
		</div>
		
	</div>		
</div>

			
				
	<!-- End Main Content Top -->
		<div class="main-wrapper">
			<div class="row">
				<div class="large-12 columns">
					<div class="title-block">					
						<h5>Slideshow</h5>
						<div class="divider"><span></span></div>
						<div class="clearfix"></div>			
					</div>
					<div class="partners-block">
						<div id="logo_slide">
							<?php 
							$img=$offerById[0]['merchantId'];
						$result=$this->usermodel->getOnlyMerchantImage($img); 
							
							if(!empty($result))
							{
							foreach($result as $image) { 
							if($image['photo']) {
							?>
							<img class="photo"  data-src="../assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" alt="Home Energy" alt="Envato" style="width:250px;height:180px" />
							<?php } else {  ?>
							<img class="photo" data-src="../assets/images/merchant/usericon.jpg" alt="Home Energy" alt="Envato" style="width:170px !important;height:180px" />
							<?php } } } ?>
						</div>
						<div class="clearfix"></div>
						<a class="prev" id="slide_prev2" href="#"><img src="<?=base_url();?>assets/images/arrow_left.png" alt="Previous" /></a>
						<a class="next" id="slide_next2" href="#"><img src="<?=base_url();?>assets/images/arrow_right.png" alt="Next" /></a>
					</div>
				</div>
			</div>
		</div>		
		
		<div class="main-wrapper">
			<div class="row">
				<div class="large-9 columns widgets side-widgets">				
							<div class="book-box" id="recommendation1">
								<div class="custom-box">
								<h4>Recommendations</h4>
								<div class="section-container accordion" data-section="" data-section-resized="true" style="min-height: 0px;">
								</div>
								</div>
								<?php if($this->session->userdata('user_level')!='2') {?>
								<div class="large-12 columns ">
								<h4 class="offTxt right"><a class="">Write a Recommendation</a></h4>	
								</div>
								<?php } ?>	
							</div>
							<?php 	$url=$_SERVER['REQUEST_URI'];
									$merchantId = end((explode('/', $url)));
									$result=$this->usermodel->recommendationList($merchantId);
									if(!empty($result))
									{
									foreach($result as $value)
									{
										$details=$this->usermodel->findDetailsOfUser($value['userId']);
										//print_r($details);
							?>
							<div class="book-box">
							<div class="large-1 columns">
							<p><img src="<?=base_url();?>assets/images/merchant/<?php if(isset($details[0]['photo']))
									echo $details[0]['photo'];
								else
									echo 'avatar_100_1x.png';
							?>"></p>
							</div>
							<div class="large-1 columns">
							<p class="default-color"><?php if(!empty($details[0]['fullname']))
							echo $details[0]['fullname'];
							?><br><?php echo date('d/m/y',strtotime($value['createdOn']));?></p>
							</div>
							<div class="large-10 columns">
							<p><?=$value['message'];?></p>
							</div>					
							</div>
							
							<?php } } ?>
<input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); }?>">							
				</div>
				<div class="large-3 columns widgets side-widgets">         
					  <h4>MAp</h4>                 
						<!-- Sidebar Navigation -->      
					<div class="section-container accordion" data-section>        
					<section class="section active">

						
				<div class="widgets">	
					<!--<div id="test2" class="gmap3" style="width:257px;height:285px"></div>	-->									
					<div id="map_canvas" style="width:257px;height:285px"></div>										
				</div>
				<!--<div class="widgets">
				<h5 class="verticalLine-bottom">Online</h5>
				<p>My Website<br>Blog</p>
				<p><a href="#"><i class="icon-twitter left"></i></a>&nbsp;<a href="#"><i class="icon-google-plus left"></i></a>&nbsp;<a href="#"><i class="icon-linkedin left"></i></a></p>
				</div>
				<div class="widgets">
				<h5 class="verticalLine-bottom">Twitter</h5>				
				</div>-->
					</section>            
					</div>
						<!-- End Sidebar Navigation -->                                     
				</div>
				
			</div>
		</div>			
    
<script>
	$(document).ready(function(){
		
	});
</script>	
<script>
//jQuery.noConflict();
/*
jQuery(window).load(function() {
	jQuery('#slider').nivoSlider({ controlNav: false});	
});
jQuery(document).ready(function() {
	//jQuery('input.datepicker').Zebra_DatePicker();
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
	jQuery("#logo_slide").carouFredSel({
		responsive: true,
		width: '100%',
		circular: false,
		infinite: true,
		auto: false,
		scroll:{items:1},
		items: {visible: {min: 5}},
		prev: {	button: "#slide_prev2", key: "left"},
		next: { button: "#slide_next2",key: "right"}
	});	
	
});  
	*/
</script>
<script>
    $(document).ready(function() {	
	var d = $("#logo_slide").portfolio({
        enableKeyboardNavigation: true, // enable / disable keyboard navigation (default: true)
        loop: false, // loop on / off (default: false)
        easingMethod: 'easeOutQuint', // other easing methods please refer: http://gsgd.co.uk/sandbox/jquery/easing/
        height: '250px', // gallery height
        width: '100%', // gallery width in pixels or in percentage
        lightbox: false, // dim off other images, highlights only currently viewing image
        showArrows: false, // show next / prev buttons
        logger: false, // for debugging purpose, turns on/off console.log() statements in the script
        spinnerColor: '#FFF', // Ajax loader color
        offsetLeft: 0, // position left value for current image
        opacityLightbox: '0.5' // opacity of other images which are not active

    });
            d.init();
    });
</script>