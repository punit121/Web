<!DOCTYPE html>
<!--[if IE 8]> 	<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <?php

$url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$path = parse_url($url, PHP_URL_PATH);
$pathFragments = explode('/', $path);
$end = end($pathFragments);
$salon=$pathFragments[1];
$sn=$pathFragments[2];

if($end=="register" || $end=="registerBusiness"){
?>
	<meta http-equiv="refresh" content="5; url=<?=base_url()?>">
    <?php }?>
    <?php if($pageName=="home" || $pageName=="browsePhoto"){
?>
	<title>Zersey - Your Life&#39;s Storyboard</title>
	<meta name="description" content="Zersey is an interactive storyboard platform to find, share and save best visuals on any topic">
	<meta name="keywords" content="HTBeauty Tips, DIY, Nailart, Yoga, Travel Diary, Politics, Art, Design, Photography,Blog, Travel Diary, Food Recepies, Makeup Tips, Photography Tips, Politics, Philosophy, Humour">
<?php }?>
<?php if($pageName=="contact" ){
?>
	<title>Contact Us - Zersey</title>
	<meta name="description" content="We would love to hear from you, write to us at help@zersey.com.">
	<meta name="keywords" content="HTBeauty Tips, DIY, Nailart, Yoga, Travel Diary, Politics, Art, Design, Photography,Blog, Travel Diary, Food Recepies, Makeup Tips, Photography Tips, Politics, Philosophy, Humour">
<?php }?>
<?php if($pageName=="zersynme" ){
?>
	<title>Read, review and share any subject or trending topic</title>
	<meta name="description" content="Read, review and share any subject or trending topic">
	<meta name="keywords" content="HTBeauty Tips, DIY, Nailart, Yoga, Travel Diary, Politics, Art, Design, Photography,Blog, Travel Diary, Food Recepies, Makeup Tips, Photography Tips, Politics, Philosophy, Humour">
<?php }?>
<?php if($pName=="aboutzersey" ){
?>
	<title>Know more about Zersey – The Virtual You (in Photos and in Thoughts)</title>
	<meta name="description" content="Zersey is your preferred social media for information - visuals and text on all kinds of topic. Build social community of like-minded people.">
	<meta name="keywords" content="Blog, Travel Diary, Food Recipes, Makeup Tips, Photography Tips, Politics, Philosophy, Humour">
<?php }?>

<?php if($pName=="term"){
?>
	<title>Zersey - Terms of Use and Privacy Policy</title>
	<meta name="description" content="Read Zersey’s Terms of Use and Privacy Policy for using your favourite platform on visuals and content">
	
<?php }?>
    <?php if($pageName=="zersynme"){
?>
    
     <title>Read, review and share any subject or trending topic</title>
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <?php if(isset($fbmeta)){ foreach($fbmeta as $fb){?>
    <meta property="og:url"           content="<?= $url?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?= substr($fb['head'],0,60)?>" />
    <meta property="og:description"   content="&nbsp;" />
    <meta property="og:image"         content="<?= base_url().'assets/zerseynme/'.$fb['image']?>" />

	<?php }}}?>
     <?php if($pName=="singlphoto"){
?>
    
     
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <?php if(isset($result)){ foreach($result as $rs){?>
    <meta property="og:url"           content="<?= $url?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?= substr($rs['description'],0,60)?>" />
    <meta property="og:description"   content="&nbsp;" />
    <meta property="og:image"         content="<?= base_url().'assets/images/merchant/browsphoto/'.$rs['photo']?>" />

	<?php }}}?>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
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
	<link rel="stylesheet" href="<?=base_url();?>assets/css/nivo-slider.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/themes/default/default.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/datepicker/metallic.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/plugins/prettyphoto/prettyPhoto.css" />
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	<!--date-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css" />
	<!-- Main JS Files -->
	<!--<script src="<?=base_url();?>assets/js/vendor/jquery.js"></script>-->
	<!--<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/pages/gmap3.js"></script>	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&sensor=false"></script>
	<script src="<?=base_url();?>assets/js/vendor/custom.modernizr.js"></script>
	<script src="<?=base_url();?>assets/js/foundation.min.js"></script>
	<script src="<?=base_url();?>assets/js/foundation/foundation.reveal.js"></script>
<!-- carouFredSel plugin -->
<script src="<?=base_url();?>assets/plugins/carouFredSel/jquery.carouFredSel-6.2.0-packed.js"></script>
<script src="<?=base_url();?>assets/plugins/carouFredSel/helper-plugins/jquery.touchSwipe.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/plugins/prettyphoto/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.quicksand.js"></script>

<!-- Scripts Initialize -->
<script type="text/javascript" src="<?=base_url();?>assets/js/app-head-calls.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.nivo.slider.pack.js"></script>	
<script type="text/javascript" src="<?=base_url();?>assets/js/datepicker.js"></script>	
<script type="text/javascript" src="<?=base_url();?>assets/plugins/smallipop/lib/contrib/prettify.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/plugins/smallipop/lib/jquery.smallipop.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/plugins/smallipop/lib/smallipop.calls.js"></script> 
<script src="<?=base_url();?>assets/js/app-bottom-calls.js"></script> 
<script type='text/javascript'>function chatwoo_a() {var s = document.createElement('script');s.type = 'text/javascript';s.src = "https://chatwoo.com/c1.jsp?host=" + window.location.host + "&hostname=https://chatwoo.com";document.getElementsByTagName('head')[0].appendChild(s);}function chatwoo_d(r) {var s = document.createElement('script');s.type = 'text/javascript';s.src = r.d;document.getElementsByTagName('head')[0].appendChild(s);}chatwoo_a();</script>  
</head>