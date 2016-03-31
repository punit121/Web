<!DOCTYPE html><!-- Begin Main Wrapper -->
<script>
var baseurl='<?=base_url()?>';
</script>
<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">
		<div id="successfullyContact" class="reveal-modal" data-reveal style="z-index:999999999;top: 0 !important;" >		
			<div class="row">				
					Thank you! your submission successfully received, we will contact you soon!
			</div>	
		</div>
	</div>
</div>	
<script src="<?=base_url()?>/assets/js/pages/contact.js"></script>
<div class="main-wrapper">
	<!-- Main Navigation --> 		
    <div class="main-wrapper">       
	<div class="content_wrapper">
		<div class="row">
			<div class="large-3 columns">
				<h3 class="contact_title">Contact info</h3>
				<div class="divider"><span></span></div>
				<div class="contact_info">
					<ul class="about-info garnik">
						<li><i class="icon-home"></i><span>New Delhi</span></li>
						<li><i class="icon-phone"></i><span>“+91-9999001344</span></li>
						<li><i class="icon-envelope"></i><a href="mailto:help@zersey.com">help@zersey.com</a></li>
					</ul>
				</div>
			</div>
            			<div class="large-3 columns">
				
				<h3 class="contact_title">Where to find us</h3>
                <div class="divider"><span></span></div>
				<p>To contact us simply leave a message and we shall get back to you at the earliest.</p>
			</div>

			<div class="large-6 columns">
				<h3 class="contact_title">Send us a message</h3>
                <div class="divider"><span></span></div>
					<div id="status"></div>
					<div class="contact_form">
						<div class="row">
							<form method="POST" class="contactForm" id="contactForm">
								<div class="small-4 columns">
									<input type="text" placeholder="Name" id="contactname" name="contactname" />
								</div>
								<div class="small-4 columns">
									<input type="text" placeholder="E-mail" id="contactemail" name="contactemail" />
								</div>
								<div class="small-4 columns">
									<input type="text" placeholder="Mobile No." id="contactwebsite" name="contactwebsite" />
								</div>
								<div class="small-12 columns">
									<input type="text" placeholder="Subject" id="contactsubject" name="contactsubject" />
								</div>
								<div class="small-12 columns">
									<textarea cols="10" rows="15" placeholder="Message" id="contactmessage" name="contactmessage"></textarea>
								</div>
								<div class="small-4 columns">
									<input type="submit" class="button right" value="Send message" name="send" id="send" />
								</div> 
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
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
