<?php
$form = array(
	"id" => "form_register",
	"method" => "POST"
);
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'useremail',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);

$againemail = array(
	'name'	=> 'againemail',
	'id'	=> 'againuseremail',
	'value' => set_value('againemail'),
);
$postcode = array(
	'name'	=> 'postcode',
	'id'	=> 'userpostcode',
	'value' => set_value('Postcode'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
// $captcha = array(
	// 'name'	=> 'captcha',
	// 'id'	=> 'captcha',
	// 'maxlength'	=> 8,
// );
?>
<head>	
	
	<script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
	<script src="<?=base_url()?>assets/js/pages/user.js"></script>
	<div id="fb-root"></div>
   
	<script>
	$(document).ready(function(){
	$('#registerMessage').show(0).delay(15000).hide(0);
	});
	</script>
</head>
<body>
<!-- End Main Content Top -->
<div class="main-wrapper">
	<div class="row main-content">
		<div class="large-8 columns">
				<div class="signUpDiv">
				<div class="row">
					<div class="large-12 columns ">
					<div class="signUpDivBackground"><h5>Join Zersey</h5></div>
						</div>						
				</div>
				<?php
				echo $this->session->flashdata('register');
				echo form_open("auth/register",$form); ?>
				</div>	
		</div>
		<aside class="large-4 columns">
			<div class="widgets">	
				<h3>Why become a member?</h3>
			</div>
			<div class="widgets">	
				<h5>Members can make plans</h5>
				<p>Plan your path to happiness, perfect health and stunning good looks by keeping an online scrapbook of all the treatments you fancy trying, all the spas you want to visit and all the helpful articles you've found.</p>
			</div>
			<div class="widgets">	
				<h5>Members are united</h5>
				<p>The Wahanda community is teeming with health experts, fitness gurus, medical professionals and ordinary people who have tried and tested everything from laser eye treatment to that Miami health camp. By making recommendations, sharing experiences, asking and answering questions, uploading articles or photos and writing reviews, all our members are united in the name of feeling fantastic.</p>
			</div>
			<div class="widgets">	
				<h5>Members find out first</h5>
				<p>You choose to keep up-to-date with exclusive offers, new openings and all the latest in the world of health, beauty and wellbeing. When there’s hot news, our members are the first to know.</p>
			</div>
			</div>		
		</aside>
	</div>
</div> 
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.accordion.js"></script>
<!-- Flickr -->
<script type="text/javascript" src="<?=base_url();?>assets/plugins/flickr/jflickrfeed.min.js"></script>
<!-- Scripts Initialize -->
<script src="<?=base_url();?>assets/js/app-head-calls.js"></script> 
<script src="<?=base_url();?>assets/js/foundation.min.js"></script>    
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


