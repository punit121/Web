<style>
.height_text{height: 200px;}
</style>
<script src="<?=base_url();?>assets/js/pages/bidService.js"></script>
<script type="text/javascript" src="js/jquery.accordion.js"></script>
<!-- Flickr -->
<script type="text/javascript" src="plugins/flickr/jflickrfeed.min.js"></script>
<!-- Scripts Initialize -->
<script src="js/app-head-calls.js"></script> 
<script src="js/foundation.min.js"></script> 
<style>
.custombreadcrumbs >li>a {
color: #428bca !important;
text-decoration: none !important;
}
.custombreadcrumbs li a:hover, a:focus {
color: #428bca !important;}
</style>
<script>
$(document).foundation();
jQuery(document).ready(function() {
	// Flickr
	var a=localStorage.getItem("checkbid");
	if(!a)
	{	
		window.location.href='http://localhost/style/reverseAuction';
	}
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
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="paymenBidModal" class="reveal-modal" data-reveal>
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
								 <th width="200" class="text-center">Biding Price</th>
								 <th width="200" class="text-center">Actions</th>
							   </tr>
							</thead>
							<tbody id="bidDetailAppend">
							   <tr class="text-center">
								 <td id="itemName"></td>
								 <td id="bidPriceAmount"></td>								
							   </tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<div class="total right" >
							<h4 class="left">Total amount &nbsp; </h4><h4 class="left" id="totalBid">2000</h4>
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
			<div id="BidListModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h2>Here is your bidding status</h2></center>
				</div>
				<div class="large-12 columns text-center" id="dynamicTable">
				
				</div>
				<div class="large-12 columns log-in-row">
				
				</div>				
				<a class="close-reveal-modal radius-close1" id="closeBidModal">&#215;</a>
				</div>
			</div>
		</div>
</div>
<div id="bidFirstPageStep1" style="">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h3>SALON&#39;S BID - SUBMISSION </h3>
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
				<div class="tab-middle">
					<div class="large-12 columns"><h3>Submit Your Bid</h3></div>	
					<div class="large-12 columns"><h4 class="slider">Services Name( <span id="bidServiceName"></span> )</h4></div>				
					<div class="large-12 columns"><h4 class="slider"></h4></div>
					<div class="large-4 columns ">
					<div class="Submitdiv text-center">
					<ul class="custombreadcrumbs">
					  <li><a href="#" id="showbid">Bids<br><span class="Submittxt" id="bidCountService">
					  </span></a></li>
					  
					  <li><a href="#">Avg Bid (Rs)<br><span class="Submittxt" id="avgbid">0 Rs</span></a></li>
					  <li class="unavailable" style="border-right:0px !important;"><a href="#">Project budget<br><span class="Submittxt" id="projectBudget">$30-$250</span></a></li>
					</ul>		
					</div>
					</div>
					<!--<div class="large-2 columns right ">
					<div class="Submitdiv text-center">
					<ul class="customRightbreadcrumbs">
					  <li><a href="#" style="color:#67a016 !important;"><span class="Submittxt" style="color:#67a016 !important;">OPEN</span></a></li>
					</ul>		
					</div>
					</div>-->
					<div class="clearfix"></div>
					<form id="reverseAuctionForm" action="#" method="POST">
					<div class="large-6 columns"><input type="text" placeholder="Contact Name" name="contactName" id="contactName" class="paddingstartForm"><div id="checkcontactName" style="display:none;"><font color="red">Please provide contact name</font></div></div>
					<div class="large-6 columns"><input type="text" placeholder="Bid" name="bid" id="bid" class="paddingstartForm checkBudget" maxlength=""7><div id="checkbid" style="display:none;"><font color="red">Please provide bid</font></div></div>
					<div class="clearfix"></div>
					<div class="large-12 columns"><textarea class="height_text" id="note"></textarea><div id="checknote" style="display:none;"><font color="red">Please provide description</font></div></div>			
					<div class="clearfix"></div>
					 <div class="large-2 columns">&nbsp;</div>
					 <div class="large-3 columns large-offset-7 columns "><a href="#" class="button " id="bidSecondStep3">Finish And Post</a></div>
					</form>
				</div>				
			</article>
		</div>
		</div>
	</div> 
	</div>
</div>	
<div id="bidSecondPageStep2" style="">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h3>SALON&#39;S BID - SUBMISSION </h3>
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
				<div class="tab-middle">
				<div class="large-12 columns"><h3>Want better response</h3></div>	
				<div class="large-12 columns"><h4>Upgrade the way your bid appears</h4></div>
				<div class="clearfix"></div>
				<form>
				<div class="customerService">
				<div class="row">
				<!--<div class="large-12 columns"><h2 class="customerHeading">Want better proposals? Upgrade your requests post.
				</h2></div>-->
			  <div class="large-4 columns">                      	
				<ul class="pricing-table">
					<li class="title">Highlight Bid</li>
					<li class="price">Stand out from the pack for:</li>
					<li class="bullet-item pricetable1"><i class="icon-ok iconPrice"></i>Your bid will be placed on the top</li>
					<li class="bullet-item pricetable1"><i class="icon-ok iconPrice"></i>It will be highlighted in Bold and Distinct Colours</span></li>
					<li class="bullet-item"><span class="iconPrice">Rs. 1000</span></li>
					<li class="cta-button padding_bullet"><input type="radio" name="postType" class="checkBid" value="highlight">Highlight my Bid</li>
				</ul>			
			  </div>
              <div class="large-4 columns">       
				<ul class="pricing-table">
					<li class="title">Verfied</li>
					<li class="price">Why upgrade to verfied?</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Premium Members are prefered over others</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Add extra level of trusts for customers</li>
					<li class="bullet-item pricetable1"><span class="iconPrice">Rs. 2000</span></li>
					<li class="cta-button padding_bullet"><input type="radio" name="postType" class="checkBid" value="verified">Verified</li>
				</ul>                                      
              </div>                            
              <div class="large-4 columns">
				<ul class="pricing-table">
					<li class="title">Basic</li>
					<li class="price">Why bid on Zersey?</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Great chance to connect with prospective customers</li>
					<li class="bullet-item pricetable1"><i class="icon-ok iconPrice"></i>Great requests that can provide bulk business</li>
					<li class="bullet-item pricefree"><span class="iconPrice">Free</span></li>
					<li class="cta-button padding_bullet"><input type="radio" name="postType" class="checkBid" value="free" checked>Basic</li>
				</ul>                                     
              </div>    
				<div class="clearfix"></div>
				<div class="large-12 columns">
				<p>* You become a Premium member and profile is updated accordingly</p>
				</div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="large-2 columns"><a href="#" class="button" id="goBackFirst">Go Back</a></div>
				<div class="large-3 columns large-offset-7 columns "><a href="#" class="step nextstepPadding">Step 2 of 3</a><a href="#" class="button right" id="bidSecondStep2">Last Step</a></div>
				</form>
					</div>
				</div>
			</article>
		</div>
	</div>
	</div> 
</div>	
<div id="bidSecondPageStep3" style="">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h3>SALON&#39;S BID - SUBMISSION </h3>
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
				<div class="tab-middle">
				<div class="large-12 columns"><h3>Finally, review and finalize your bid</h3></div>	<div id="bidMerchantName" style="float:right;margin:-40px 15px 0 0"><a href=""><?= $this->usermodel->findMerchantSalonNameById($this->session->userdata('user_id'));?></a></div>
				<div class="large-12 columns"><h4>Just need to confirm the information</h4></div>
				<div class="clearfix"></div>
				<div class="customerService">
				<div class="row biDivpadding">
				<div class="large-4 columns large-offset-2 text-left">
					<p style="font-size: 15px;">Bid price :</p>
				<p style="font-size: 15px;">Detailed Proposal:  </p>
				</div>	
				<div class="large-4 columns large-offset-2 text-left">
					<p class="" id="bidPrice" style="font-size: 15px;">0
					</p>	
					<p class="" id="detailProposal" style="font-size: 15px;">not
					</p>	
				</div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="large-2 columns"><a href="#" class="button" id="goBacksecond">Go Back</a></div>
				<div class="large-3 columns large-offset-7 columns "><a href="#" class="button " id="bidSecondStep3">Finish And Post</a></div>					
				</div>
				</div>
			</article>
		</div>
	</div>
	</div> 
</div>

<div id="bidSecondPageStep4" style="">	
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
				
				<div class="customPosting">
				<div class="large-9 columns large-offset-3">
				<h4><b>Thanks for Posting With us !</b></h4>
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
				<h5 class="Customprofilemargin tableFontColor" id="socialrequest"></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin foradianFont"><span class="fordianPricetable" id="budget"></span></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin" id="location"></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 id="dateofservice"></h5>
				</div>
				<div class="large-12 columns"><hr></div>
				
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
</div>
