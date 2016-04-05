<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>	
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Zersey</title>  
	<link rel="stylesheet" href="css/foundation.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/fgx-foundation.css" />
	<link rel="stylesheet" href="css/custom.css" />
	<!--[if IE 8]><link rel="stylesheet" href="css/ie8-grid-foundation-4.css" /><![endif]-->

	<!-- Font Awesome - Retina Icons -->
	<link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.min.css">

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/style.css">
	
	<!-- Main JS Files -->
	<script src="js/vendor/jquery.js"></script>
	<script src="js/vendor/custom.modernizr.js"></script>
	</head>
	<body>
	<!-- Begin Main Wrapper -->
	<div class="main-wrapper">
	<!-- Main Navigation -->  
	
	</div><!-- End Main Navigation -->
	<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">
	<div id="myModal1" class="reveal-modal" data-reveal style="z-index:999999999;top: 0 !important;" >
	<div class="row">
				<div class="stripBackground">
				<div class="large-12 columns">
				<h3 class="text-center stripSignUp"><strong>Login For Zersey</strong></h3>
				</div>
				</div>
				</div>	
				<div class="row">
				
				<div class="large-12  columns log-in-row">
				<input type="image" src="images/facebook.png" alt="Submit" class="signUpicon img-responsive">
				
				</div>
				<div class="large-12  columns">
				<p>Recommended, And we will never post anything without your permission.</p>
				</div>
				<div class="large-12 columns">
				<input type="image" src="images/googleicon.png" alt="Submit" class="signUpicon img-responsive alternativeDiv">
				</div>
				<div class="large-12 columns">
				<input type="text" placeholder="Email" class="sign-form">
				</div>
				<div class="large-12 columns">
				<input type="password" placeholder="Password" class="sign-form">
				</div>	
				<div class="large-12 columns">
				<a href="#" class="button secondary">Login</a>
				</div>		
				<div class="large-12 columns">
				<p>Already have an account? <span style="font-size:16px"><a href="#">Log in!</a></span></p>
				</div>
				</div>
	<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
	</div>
	</div>
	</div>	
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-7 columns">
				<h3><b>Requests for Salon Services<b></h3>
				<h4>Post a service requests and get quotations from salons. Expand Your reach</h4>
			</div>        
		</div>
	</div>		
	</div>
		<!-- End Main Content Top -->
	<div class="main-wrapper">
	<div class="row main-content">
		<div class="large-12 columns">
			<article class="post col1-alternative">
				<div class="row">
				<div class="tableBackground">
				<div class="large-12 columns">
				<div class="tableDatabackground">
				<div id="tableOdd">
				<div class="row">
			    <div class="large-6 columns">
				<h4>Thanks for submitting your bid</h4>
				</div>
				 <div class="large-6 columns">
				<h4 class="right"><a href="#"><i class="icon-arrow-left"></i>Go back and edit</a></h4>
				</div>
				<div class="customPosting">
				  <div class="large-9 columns large-offset-3">
				<h4><b>Thanks for Posting With us !</b></h4>
				</div>
				<div class="large-9 columns large-offset-3">
				<h4>If you changed your mind, you may <a href="#">cancel posting this ad</a></h4>
				</div>
				</div>
				</div>
				<div class="row">
			   <div class="customBorderoption"></div>
				</div>
				<div class="customtable">
				<div class="row log-in-row">
				<div class="large-1 columns  text-center"><i class="icon-star-empty foradianFontSize"></i></div>
				<div class="large-4 columns">
				<h5 class="Customprofilemargin tableFontColor">Social Media expert for luxury marketing</h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin foradianFont"><span class="fordianPricetable">`200-300 day</span></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin">India</h5>
				</div>
				<div class="large-2 columns text-center">
				<h5>Engineering</h5>
				</div>
				<div class="large-12 columns"><hr></div>
				<div class="large-12 columns">
				<h1 class="Customthanks">you're opportunity will go live soon</h1>
				</div>
				</div>
				</div>
			
				</div>
				</div>
				</div>
				</div>
				
				
				</div>
			</article>
		</div>
	</div>
	</div>            
	
<script type="text/javascript" src="js/jquery.accordion.js"></script>
<!-- Flickr -->
<script type="text/javascript" src="plugins/flickr/jflickrfeed.min.js"></script>
<!-- Scripts Initialize -->
<script src="js/app-head-calls.js"></script> 
<script src="js/foundation.min.js"></script>    
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

<!-- Smallipop JS - Tooltips -->
<script type="text/javascript" src="plugins/smallipop/lib/contrib/prettify.js"></script>
<script type="text/javascript" src="plugins/smallipop/lib/jquery.smallipop.js"></script>
<script type="text/javascript" src="plugins/smallipop/lib/smallipop.calls.js"></script> 

<!-- Initialize JS Plugins -->
<script src="js/app-bottom-calls.js"></script>
</body>
</html> 