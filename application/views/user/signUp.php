<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Medico</title>  

	<!-- Smallipop CSS - Tooltips -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/smallipop/css/contrib/animate.min.css" type="text/css" media="all" title="Screen" />
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/smallipop/css/jquery.smallipop.css" type="text/css" media="all" title="Screen" />

	<!-- Default CSS -->
	<link rel="stylesheet" href="<?=base_url();?>assets/css/custom.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/normalize.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/foundation.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fgx-foundation.css" />

	<!--[if IE 8]><link rel="stylesheet" href="css/ie8-grid-foundation-4.css" /><![endif]-->

	<!-- Font Awesome - Retina Icons -->
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/fontawesome/css/font-awesome.min.css">

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" />

	<!-- Main JS Files -->
	<script src="<?=base_url();?>assets/js/vendor/jquery.js"></script>
	<script src="<?=base_url();?>assets/js/vendor/custom.modernizr.js"></script>
	<script src="<?=base_url();?>assets/js/pages/user.js"></script>
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
					var facebook ='facebook';
					var dataString ='facebook='+facebook+'&name='+response.name+ '&email='+response.email+'&fbid='+response.id+'&username='+response.username+'&gender='+response.gender;
					//alert(response.name);
					$('#username').val(response.name);
					$('#useremail').val(response.email);
					$('#sgainuseremail').val(response.email);
					
					// $.post('/users/fb_login',dataString,function(data){
					// console.log(response);
					
						 
						// if(data =="REGISTER_SUCCESS"){
							// $(".user_fb_name").text(response.name);
							// if(response.gender=='male'){
								// $(".user_fb_gender").text('his');
								// $("#user_fb_gender").val(' is improving his resume at Work-N-Words ');
							// }
							// if(response.gender=='female'){
								// $("#user_fb_gender").val(' is improving her resume at Work-N-Words');
							// }
							// $("#userfname").val(response.name);
							// $("#modal").fadeIn();
						// }else{
							// window.location.href='/users/register';
						// }
					// });	
					
				});  
			} 
		}, {perms:'publish_stream,offline_access,manage_pages,email'});
	}
		
	</script>
</head>
<body>

<!-- Begin Main Wrapper -->


	<!-- End Main Content Top -->
	<div class="container">
	<div class="row">
	<div class="large-6 medium-6 small-6 columns"><img src="<?=base_url();?>assets/images/logo.png"></div>
	<div class="large-6 medium-6 small-6 columns"><p class="text-right ftsign ">Are you a client?<a href="#"> Sign</a> up HERE instead</p></div>	
	</div>
	<div class="sign-up-b">
	<div class="row margin-top-bottom">
	<div class="large-12 medium-12 small-12 columns"><h3 class="text-center"><i>Sign Up Now, It's Free!</i></h3></div>
	</div>
	<div class="row sign-up">
	<div class="large-5 medium-5 small-5 columns"><a href="javascript:void(0)" class="button social-icon-facebook" id="facebook" onclick="fblogin();"><span class="icon-facebook"></span>Log In with Facebook</a></div>
	<div class="large-7 medium-7 small-7 columns"><h5>Or</h5></div>
	</div>
	<div class="row sign-up">
	<div class="large-6 medium-6 small-6 columns">
       				<h6>First Name</h6>
					<input type="text" placeholder="First Name" name="email">
     				</div>
	<div class="large-6 medium-6 small-6 columns"><h6>Last Name</h6>
					<input type="text" placeholder="Last Name" name="email"></div>
	</div>
	<div class="row sign-up">
	<div class="large-12 medium-12 small-12 columns">
       				<h6>Email Address</h6>
					<input type="text" placeholder="Email">
     				</div>	
	</div>
	<div class="row sign-up-bt">
	<div class="large-6 medium-6 small-6 columns">
       				<h6>Create Password</h6>
					<input type="text" placeholder="Create password">
     				</div>
	<div class="large-6 medium-6 small-6 columns"><h6>Retype Password</h6>
					<input type="text" placeholder="Retype Password"></div>
	</div>
	<div class="row m-singup-button">
	<div class="large-6 medium-6 small-6 columns"><a href="#" class="button success">SIGN UP ME !</a></div>
	<div class="large-6 medium-6 small-6 columns"><div class="ftc"><a href="#" class="default-color">Oops, I am a client - not a professional!</a></div></div>
	</div>
  <!-- End Main Content --> 
  </div>
</div>  	 
	<footer class="footer_wrapper">
	<div class="row footer-part">
		<div class="large-12 columns">
			<div class="row">
				<div class="large-3 columns">
					<h4 class="footer-title">About Us</h4>
					<div class="divdott"></div>
					<img class="botlogo" src="<?=base_url();?>assets/images/botlogo.png" alt="" />
					<div class="footer_part_content">
						<p>Medico Theme Bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate</p>
					</div>
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
				

				<div class="large-3 columns">
					<h4 class="footer-title">Contact info</h4>
					<div class="divdott"></div>
					<div class="footer_part_content">
						<p>Medico Bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id </p>
						<ul class="about-info">
							<li><i class="icon-home"></i><span>lorem ipsum street</span></li>
							<li><i class="icon-phone"></i><span>+399 (500) 321 9548</span></li>
							<li><i class="icon-envelope"></i><a href="mailto:info@Medico.com">info@Medico.com</a></li>
						</ul>
						<ul class="social-icons">
						<li><a href="#"><i class="icon-pinterest"></i></a></li>
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
					</ul>
					</div>
				</div>
					
				<div class="large-3 columns"> 
					<h4 class="footer-title">Quick Contact</h4>
					<div class="divdott"></div>
					<form method="POST" action="#" id="footer-contact-form">
						<div class="footer_part_content">
							<div class="row">
								<div class="large-6 columns">
									<input type="text" placeholder="Name"  name="name" />
								</div>
								<div class="large-6 columns">
									<input type="text" placeholder="E-mail" name="email" />
								</div>
								<div class="large-12 columns">
									<textarea cols="10" rows="15"  name="message" placeholder="Message"></textarea>
								</div>
								<div class="large-12 columns text-right">
									<input type="submit" class="button" value="Send" name="send" />
								</div>	
							</div>
						</div>
					</form>
				</div> 
			</div>
		</div>
	</div>
	
	<div class="privacy footer_bottom">
		<div class="footer-part">
			<div class="row">
				<div class="large-10 columns copyright">
					<p >&copy; 2013 Medico Theme, All Rights Reserved.</p>
				</div>
				<div class="large-2 columns">
					<div id="back-to-top"><a href="#top"></a></div>
				</div>
			</div>
		</div>
	</div>
</footer>  


<script>
$(document).foundation();
</script>  
<script src="<?=base_url();?>assets/js/foundation.min.js"></script>
<!-- carouFredSel plugin -->
<script src="<?=base_url();?>assets/plugins/carouFredSel/jquery.carouFredSel-6.2.0-packed.js"></script>
<script src="<?=base_url();?>assets/plugins/carouFredSel/helper-plugins/jquery.touchSwipe.min.js"></script>


<!-- Scripts Initialize -->
<script type="text/javascript" src="<?=base_url();?>assets/js/app-head-calls.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.nivo.slider.pack.js"></script>	
<script type="text/javascript" src="<?=base_url();?>assets/js/datepicker.js"></script>	
<script>$(document).foundation();</script>  

<!-- Smallipop JS - Tooltips -->
<script type="text/javascript" src="<?=base_url();?>assets/plugins/smallipop/lib/contrib/prettify.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/plugins/smallipop/lib/jquery.smallipop.js"></script>
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
	
</script>

<!-- Initialize JS Plugins -->
<script src="<?=base_url();?>assets/js/app-bottom-calls.js"></script>
</body>
</html>
