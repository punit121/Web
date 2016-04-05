	<style>
	.search	{
		background:#f35f2a;
	}
	.borderOffer
	{
		border: 1px solid #ccc;
		padding-top: 2%;
	}
	.scrollPosition
	{
		position: fixed !important;
		margin-top: -232px !important;
	}
	.scrollBottomPosition
	{
		position: fixed !important;	
		
	}
	.collapse {
display: block;
visibility: visible;
	}
	a:hover, a:focus {
color: #25c9da;
text-decoration:none
}
	</style>
	<script>
	var baseurl='<?=base_url()?>';
	</script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/pages/offer.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/pages/gmap3.js"></script>
	<div class="main-content-top">
		<div class="row ">
			<div class="offerHeader">
			<div class="large-11 medium-11 small-11 columns large-offset-1 medium-offset-1 large-offset-1">
				<h2 class="offerTxt">Amazing Offers from salons and Spas near You.</h2>
				<div class="row collapse">
					<div class="small-4 columns">
						<input type="text" placeholder="search offer by name, area or city ex : Makeup" class="search_input" id="offerSearchPageData">
					</div>
					<div class="small-3 columns left">
						<a href="#" class="button search offerSearchPage" id="colorChange">Search</a>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- End Main Content Top -->
	<div class="main-wrapper">
	<div class="row main-content">
		<div class="large-9 columns offers" >
			<div id="appendOffer">
			<?php 
			// $str=$_SERVER['REQUEST_URI'];
			// $place=end(explode("/",$str));
			if(!empty($offers))
				{	
					foreach($offers as $value)
					{ 
						
			?>
			<article class="post col1-alternative alternativeDiv" rel="<?=$value['id']?>">
				<div class="row">
					<div class="large-3 medium-3 small-6 columns">
						<div class="post_img">
							<?php
							//$result=$this->usermodel->findMerchantPhotoById($value['merchantId']);
							if(!empty($value['offerImage']))
							{
							?>
							<a href="<?=base_url();?>offerSend/<?=$value['id']?>"><img class="post_image image_height" src="<?=base_url()?>assets/images/demo/offer/<?php if(!empty($value['offerImage']))
							echo $value['offerImage'];
							else
							echo 'userimage.jpg';?>" alt="Offer Image"></a>
							<?php } else { ?>
							<img class="post_image" src="<?=base_url()?>assets/images/demo/offer/userimage.jpg" alt="post title">
							<?php } ?>
						</div>
					</div>
					<div class="large-5 medium-5 small-6 columns">	
						<a href="<?=base_url();?>offerSend/<?=$value['id']?>"><h2 class="offerTxt"><?=$value['name']?></h2></a>
						<div class="divline"><span></span></div>
						<p class="post_text">
                        <a href="<?=base_url();?>merchant/salon/<?=$value['merchantId']?>">
                        <span class="offTxt">
						<?=$this->usermodel->findMerchantByIdInWishlist($value['merchantId']);
						?></span></a><BR>
						<?php echo substr($value['features'],0,100);?></p>
					</div>
					<div class="large-4 medium-4 small-12 columns borderOffer">
					<div class="row">
							<div class="large-6 small-12 medium-6 columns">
							<span class="foradianFont foradianFontSize"><i><?=$value['bookingPrice']?></i></span>
							</div>
							<div class="large-6 small-12 medium-6 columns">
							<a href="<?=base_url();?>offerSend/<?=$value['id']?>" class="button radius widthButton">Learn More</a>
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
							<p><span class="foradianFont">SAVINGS <br><span class="fordianPrice"><i><?php echo $result=($value['price']-$value['discountedPrice'])?></i></span></span> </p>
							</div>
							</div>
						<div class="row recommBorder">
							<div class="large-12 columns">
                        <a href="<?=base_url();?>offerSend/<?=$value['id']?>#recommendation1">     
                            <p class="text-center offTxt "><i class="icon-credit-card"></i>recommendation&nbsp; <i class="icon-certificate"></i></p>
                            </a>
                            </div>
						</div>
					</div>
				</div>
			</article>
			<?php }} else{ echo '<center><font color="#f35f2a"><b>No record found</b></font></cenetr>';}?>
			<article class="post col1-alternative">
			   <div class="row">							
				<div class="pagination-wrapper">
					<ul class="pagination">
						<?php echo $links;?>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</article>		
		</div>	
		<div id="searchshow" style="margin-left:30%;color:#f35f2a;font-size:15px;display:none;"><b>No Record Found<b></div>
		</div>	
			
		
		<aside class="large-3 columns">
			<div class="widgets" >
			<div id="test3" class="gmap3" style="width:257px;height:285px"></div>
			 <!--<div id="getFixed">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28005.86074612837!2d77.09795154999999!3d28.667724399999972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04709a55ca61%3A0x733c78dcf34281ce!2sPaschim+Vihar!5e0!3m2!1sen!2sin!4v1397556382610" height="250" frameborder="0" style="border:0;width:100%"></iframe>
			</div>-->
			</div>	
		</aside>
	</div>
	</div>  
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.accordion.js"></script>
<!-- Flickr -->
<script type="text/javascript" src="<?=base_url()?>assets/plugins/flickr/jflickrfeed.min.js"></script>
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
<script>
  $(function() {
	$.post('<?=base_url()?>users/findofferAllSearch',function(data){
			console.log(data);
			var availableTags = data.split(",");
			$('#offerSearchPageData').autocomplete({
			source: availableTags
			});
		});
	});
</script>
