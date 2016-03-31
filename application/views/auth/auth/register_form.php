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
      window.fbAsyncInit = function() {
        FB.init({
          appId: '527890870664757',
          cookie: true,
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
		//console.log(response);
		  //window.location.href='/users/register';
        });
        // FB.Event.subscribe('auth.logout', function(response) {
        // });
      };
      (function(d){
      var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
	  js.src = "//connect.facebook.net/en_US/all.js#appId=527890870664757&amp;xfbml=1";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
	
	function fblogin(){
	
		FB.login(function(response) {
			if (response.authResponse) {
				FB.api('/me', function(response) {
				//alert(response.hometown.name);
					var facebook ='facebook';
					var dataString ='facebook='+facebook+'&name='+response.name+ '&email='+response.email+'&fbid='+response.id+'&username='+response.username+'&gender='+response.gender;
					$('#username').val(response.name);
					$('#facebookId').val(response.id);
					$('#useremail').val(response.email);
					$('#againuseremail').val(response.email);
					
				});  
			} 
		}, {perms:'publish_stream,offline_access,manage_pages,email'});
	}
		
	</script>
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
				<!--
				<div class="signUpRound singUptop">
				<div class="row">
					<div class="large-12 columns">
					<a onclick="fblogin()" class="button social-icon-facebook"><span class="icon-facebook"></span>Log In with Facebook</a>
						</div>						
				</div>
				
				<div class="row">
					<div class="large-3 columns">
					<p>I am</p>
					</div>
					<div class="large-4 columns">
								<label for="gender"><input name="gender" type="radio" checked="" value="F" class="hidden-field signUpRadioButton"><span class="custom radio checked"></span><span class="Radio_txt"> Female</span></label>
					</div>
					<div class="large-5 columns">
					<label for="gender"><input name="gender" type="radio" class="hidden-field signUpRadioButton" value="M"><span class="custom radio checked"></span> <span class="Radio_txt"> Male</span></label>
					</div>
				</div>
				<div class="row">					
					<div class="large-3 columns">
					<p>Sign me up as a:</p>
					</div>
						<div class="large-4 columns">
								<label for="radio1"><input name="business" type="radio" checked="" value="C" class="hidden-field signUpRadioButton"><span class="custom radio checked"></span><span class="Radio_txt">Consumer</span></label>
							</div>
							<div class="large-5 columns">
								<label for="radio1"><input name="business" type="radio" checked="" value="P" class="hidden-field signUpRadioButton"><span class="custom radio checked"></span><span class="Radio_txt">Professional</span></label>
					</div>					
				</div>
				<div class="row">
				<div class="large-3 columns"><p>I'd like to be known as :</p></div>
				<div class="large-4 columns">
				<input type="text" name="username" id="username">
				<div style="color:red;"><?php echo form_error($username['name']); ?></div>
				</div>
				<div class="large-5 columns">
				<img src="<?=base_url();?>assets/images/info-mark.gif" class="tick-img"><p>At least 5 chars, numbers and '-' only.</p>
				</div>			
				</div>
				<div class="row">
				<div class="large-3 columns"><p>My Password :</p></div>
				<div class="large-4 columns">
				<input type="password" name="password">
				<div style="color:red;"><?php echo form_error($password['name']); ?></div>
				</div>
				<div class="large-5 columns">
				<p><img src="<?=base_url();?>assets/images/info-mark.gif" class="tick-img">At least 6 characters please</p>
				</div>			
				</div>
				<div class="row">
				<div class="large-3 columns"><p>My email address is:</p></div>
				<div class="large-4 columns">
				<input type="text" name="email" id="useremail">
				<div style="color:red;"><?php //echo form_error($email['name']); ?></div>
				</div>
				<div class="large-5 columns">
				<p><img src="<?=base_url();?>assets/images/info-mark.gif" class="tick-img"> We won't spam you or share your email address with anybody else.</p>
				</div>			
				</div>
				<div class="row">
				<div class="large-3 columns"><p>and again:</p></div>
				<div class="large-4 columns left">
				<input type="text" name="againemail" id="againuseremail">
				<div style="color:red;"><?php //echo form_error($email['name']); ?></div>
				</div>						
				</div>
				<div class="row">
				<div class="large-3 columns"><p>post code:</p></div>
				<div class="large-4 columns">
				<input type="text" name="postcode" id="userpostcode">
				<input type="hidden" name="facebookId" id="facebookId">
				
				<div style="color:red;"><?php //echo form_error($postcode['name']); ?></div>
				</div>	
				<div class="large-5 columns">
				<p><img src="<?=base_url();?>assets/images/info-mark.gif" class="tick-img">We use this to deliver you more relevant content.</p>	</div>						
				</div>
				<div class="row">
				<div class="large-3 columns"><p>Receive our newsletter?</p></div>
				<div class="large-4 columns">
				<label for="checkbox1"><input type="checkbox" id="checkbox1" name="checkbox"  class="hidden-field right singUptopCheckbox"><span class="custom checkbox"></span></label>
				</div>
				<div class="large-5 columns">
				<p><img src="<?=base_url();?>assets/images/registration-tick.gif" class="tick-img">Receive our newsletter? </p>	</div>						
				</div>
				<div class="row">
				<div class="large-4 columns"><p>Your profile URL:</p></div>
				<div class="large-8 columns RIGHT">
				<a href="http://www.zersey.com/">http://www.zersey.com/</a>
				</div>				
				</div>
				<div class="section-container accordion" data-section="" data-section-resized="true" style="min-height: 0px;"> 
				</div>
				<div class="row">
				<div class="large-12 columns"><p>By clicking the button below I agree to follow the terms and conditions of Wahanda citizenship. View our Privacy Policy</p></div>
				<div class="large-12 columns"><p class="right"><button type="submit" name="submit" name="register" class="button success">Join Now</button></p></div>
				</div>	
				</div>-->
				<?php //echo form_close(); ?>
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


