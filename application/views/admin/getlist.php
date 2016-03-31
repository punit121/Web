<script>
var baseurl='<?=base_url()?>';
</script>
<script type="text/javascript" src="<?=base_url();?>assets/js/pages/getlistMap.js"></script>
<!--<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->
 <script>
  $(function() {
	$.post('<?=base_url()?>users/findAllmerchantName',function(data){
			console.log(data);
			var availableTags = data.split(",");
			$('#brand').autocomplete({
			source: availableTags
			});
		});
	});
</script>	
<div class="main-content-top">
		<div class="row ">
        <div class="large-11 columns large-offset-1">
		<h2 class="headerTxt" id="headerTxt">Book Beauty Appointments in <?php 
		$str=$_SERVER['REQUEST_URI'];
		$place=explode("/",$str);
		if($place[2]=='serviceOrLocation' || $place[4]=='No_Area')
		echo 'Place Near You';
		else
		echo $place[4];
		?>, CA</h2>
		<p class="headerTxt">Find and book top hair stylist and beauty professionals. whether it's eyebrow waxing or hair extensions that you are looking for, you can find it on styleseat.</p>
		</div>	
		</div>
		<div class="row">
        <div class="large-11 columns large-offset-1 ">
		<div class="large-5 medium-5 small-5 columns">
		<input type="text" placeholder="Serices" name="services" id="services" class="appointment-input" />
		</div>
	    <div class="large-5 medium-5 small-5 columns">
		<input type="text" placeholder="Place" name="place" id="place" class="appointment-input" />
		</div>
		<div class="large-2 medium-2 small-2 columns">
		<p><a href="#" class="small radius button appointment-button" id="bookAppoinment">Book</a></p></div>
	    <div class="clearfix"></div>	
		</div>
    </div>	
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="large-12 columns">
	<div class="filterRow">
	<ul class="filterList">
	<li><input type="checkbox" class="input_checkbox filterBy"><span class="check_txt">Offers</span></li>	
	<li><input type="checkbox" class="input_checkbox filterBy"><span class="check_txt">Online Booking</span></li>
	<li><input type="checkbox" class="input_checkbox filterBy"><span class="check_txt">Home Service</span>	</li>	
	<li><input type="text" name="brand" id="brand" placeholder="Brand"></li>
	</ul>
	</div>
	</div>
</div>
<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="myModalBestSearch" class="reveal-modal" data-reveal style="z-index:999999999;top:1px;" >
				<form method="post">
					<div class="row">				
					<div class="large-12 columns">
					<h3><strong>Keywords !</strong></h3>
					</div>				
					</div>	
					<div class="row">		
					<div class="large-12 columns">									
					<textarea placeholder="Type best keyword !" name="keyword" id="keyword"></textarea>
					</div>	
					<div class="large-12 columns">
					<button type="button" name="bestSearch" id="bestSearch" class="button secondary log-in-row right">Submit</button>
					</div>	
					</div>
					<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
				</form>	
			</div>
		</div>
	</div>
<!-- End Main Content Top -->
<div class="main-wrapper">
	<div class="row main-content">
		<div class="large-9 columns">
		<article class="post col1-alternative">
				<div class="row">
				<div class="large-9 medium-9 small-9 columns">
				<ul class="breadcrumbs custom-margin">
					<li><span>SORT BY :</span></li>
					<li><a href="#" data-reveal-id="myModalBestSearch">Best Match</a></li>
					<li><a href="" id="mostPopular">Most Popular</a></li>
					<li><a href="" id="mostPrice">Price</a></li>
				</ul>
				</div>
				</div>
		</article>
		<div id="merchantRecords">
		<?php
			if(!empty($serviceOrLocation))	
			{
				$i=0;
				foreach($serviceOrLocation as $value)
				{
		?>
		<article class="post col1-alternative">
				<div class="row" style="padding-bottom:13px;">
					<div class="large-2 medium-2 small-2 columns">
						<div class="post_img">
							<img class="post_image" 
							src="<?=base_url();?>assets/images/merchant/
							<?php if(!empty($value['photo']))
							{ 
							echo $value['photo']; 
							}
							else
							{ 
							echo 'usericon.jpg'; 
							} ?>" alt="post title">
						</div>
					</div>
					<div class="large-5 medium-5 small-5 columns">					
						<h2><?=$value['name']?></h2>
						<div class="divline"><span></span></div>
						<p class="post_text"><?=$value['description']?></p>
						<p class="post_text"><?=$value['location']?></p>
						<a href="<?=base_url();?>viewmap/<?=$value['merchantId']?>" style="padding-right:22px;" 
						id="viewMapClick">View Map</a>
						<!--<a href="#">View Menu</a>-->						
					</div>
					<?php $result=$this->usermodel->findRating($value['merchantId']);?>
					<div class="large-1 medium-1 small-1 columns">
						<ul class="meta">
						</ul>
					</div>
					<div class="large-4 medium-4 small-4 columns">
					<div class="verticalLine ">
						<h4><i class="icon-archive"></i>49 Recommendation</h4>
						<!--<div class="divline"><span></span></div>-->
						<p class="post_text"><i class="icon-star"></i><a href="#" class="button radius right"><?php echo $result;?></a></p>
						<p><div style="text-transform:uppercase;color:#272727;margin-bottom:5px;"><u>Specialties</u></div>color<br>curly</p>
						</div>
					</div>
				</div>
		</article>
		<?php $i++; } ?>
			
		<?php } ?>
		<?php
			if(!empty($merchantData))	
			{
				$i=0;
				foreach($merchantData as $value)
				{
		?>
		<article class="post col1-alternative">
				<div class="row">
					<div class="large-2 medium-2 small-2 columns">
						<div class="post_img">
						<a href="<?=base_url();?>viewmap/<?=$value['merchantId']?>">	<img class="post_image" 
							src="<?=base_url();?>assets/images/merchant/
							<?php if(!empty($value['photo']))
							{ 
							echo $value['photo']; 
							}
							else
							{ 
							echo 'usericon.jpg'; 
							} ?>" alt="post title"></a>
						</div>
					</div>
					<div class="large-5 medium-5 small-5 columns">					
						<a href="<?=base_url();?>viewmap/<?=$value['merchantId']?>"><h2><?=$value['name']?></h2></a>
						<div class="divline"><span></span></div>
						<p class="post_text"><?=$value['description']?></p>
						<p class="post_text"><?=$value['location']?></p>
						<a href="<?=base_url();?>viewmap/<?=$value['merchantId']?>" style="padding-right:22px;">VIEW Profile</a>
					</div>
					<?php $result=$this->usermodel->findRating($value['merchantId']);?>
					<div class="large-1 medium-1 small-1 columns">
						<ul class="meta">
						</ul>
					</div>
					<div class="large-4 medium-4 small-4 columns">
					<div class="verticalLine ">
						<h4><i class="icon-archive"></i>49 Recommendation</h4>
						<p class="post_text"><i class="icon-star"></i><a href="#" class="button radius right"><?php echo $result;?></a></p>
						<p><div style="text-transform:uppercase;color:#272727;margin-bottom:5px;"><u>Specialties</u></div>color<br>curly</p>
						</div>
					</div>
				</div>
		</article>
		<?php $i++; } ?>
		<?php } ?>
		</div>
		
		</div>
		<aside class="large-3 columns">
			<div class="widgets">
				<img src="<?=base_url();?>assets/images/add.jpg">
			</div>
			<div class="clearfix"></div>
			<div class="widgets">
			<div id="test1" class="gmap3" style="width:257px;height:285px"></div>
			</div>	
		</aside>
	</div>
</div>
<div id="myModal" class="reveal-modal">
     <h1>Modal Title</h1>
     <p>Any content could go in here.</p>
     <a class="close-reveal-modal">&#215;</a>
</div>
<script>
$(document).foundation();
jQuery(document).ready(function() {
	// Flickr
	jQuery('ul#basicuse').jflickrfeed({
		limit: 12,
		qstrings: {id: '36587311@N08'},
		itemTemplate: '<li><a href="http://www.flickr.com/photos/47445714@N03"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
	});
	// Accordion
	jQuery('#example1').accordion({
		handle: ".handle", // Default: "h3"
		panel: ".panel", // Default: ".panel"
		speed: 500, // Default: 200
		easing: "easeInOutQuad", // Default "swing"
		canOpenMultiple: false, // Default: false
		canToggle: false, // Default: false
		activeClassPanel: "open", // Default: "open"
		activeClassLi: "active", // Default: "active"
		lockedClass: "locked", // Default: "locked"
		loadingClass: "loading" // Default: "loading"
	});
});
</script> 

