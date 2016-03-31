<script src="<?=base_url();?>assets/js/pages/reverseAuction.js"></script>
<!--<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="UserMerchantModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<h3>Post service request is not available for merchant</h3>
				</div>
				</div>
			</div>
		</div>
</div>-->

<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="MerchantUserModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<h3>Post service request is not available for customer</h3>
				</div>
				</div>
			</div>
		</div>
</div>

<div id="requestServicePage">
	<div id="requestsaloon">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		
	</div>		
	</div>
	</div>
	
	<div id="servicerequest" style="display:none">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-7 columns">
				<h3><b>Find Out Various Service Requests<b></h3>
				<h4>Respond to various services requests from customers,submit your bid.Expand your business</h4>
			</div>        
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
				<div class="row">
				<div class="clearfix"></div>
				<!--<div class="large-4 columns"><p>Want to receive social media opportunities by email ?</p></div>
				<div class="large-2 columns"><a href="#" class="button round">Create Daily Alert ?</a></div>
				<div class="large-3 columns"><a href="#" class="button round">Create Weekly Alert ?</a></div>-->			
				</div>
				<div class="row">
				<div class="tableheading">
				<div class="large-5 columns text-center"><h4 class="fblock-txt tableInnercolor">Requests Details</h4></div>
				<div class="large-2 columns text-center"><h4 class="fblock-txt tableInnercolor">Budget</h4></div>
				<div class="large-2 columns text-center"><h4 class="fblock-txt tableInnercolor">Location</h4></div>
				<!--<div class="large-2 columns text-center"><h4 class="fblock-txt tableInnercolor">Type</h4></div>-->
				<div class="large-2 columns text-center"><h4 class="fblock-txt tableInnercolor">Date Of Service</h4></div>
				</div>
				</div>
				<?php $result=$this->usermodel->reverseAuctionDetail();
				if($result)
				{				
				foreach($result as $auction) {
				?>
				<div id="tableOdd" class="bidding" style="cursor:pointer;"  bidding="<?= $auction['id']; ?>">
				<div class="row log-in-row">
				<div class="large-1 columns log-in-row text-center"><i class="icon-star-empty foradianFontSize"></i></div>
				<div class="large-4 columns">
				<h5 class="Customprofilemargin tableFontColor"><?= $auction['request']; ?></h5>
				<p><?= $auction['note']; ?></p>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin foradianFont"><span class="fordianPricetable"><?= $auction['minBudget']." Rs - ".$auction['maxBudget']." Rs"; ?></span></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin"><?= $auction['location']; ?></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5><?= $auction['dateOfService']; ?></h5>
				</div>
				</div>
				</div>
				<?php } }?>
			<!--odd table-->	
			</div>
				</div>
				</div>
			</article>
		</div>
	</div>
	</div>            
	</div> 
</div>
<div id="customerViewStep1" style="display:none">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h3>CUSTOMER&#39;S VIEW - SUBMISSION </h3>
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
				<div class="large-12 columns"><h3>Requests for Salon Services</h3></div>	
				<div class="large-12 columns"><h4 class="slider">Post  for free. Expand Your reach</h4></div>
				<div class="large-6 columns"><input type="text" placeholder="What do you need? (i.e Hair Draiser)" name="request" id="request" class="paddingstartForm"><div id="checkrequest" style="display:none;"><font color="red">Please provide what do you need</font></div></div>
				<div class="large-6 columns"><input type="text" placeholder="Where's the work located" name="location" id="location" class="paddingstartForm"><div id="checklocation" style="display:none;"><font color="red">Please provide location</font></div></div>
				<div class="clearfix"></div>
				<div class="large-3 columns"><input type="text" placeholder="Budget - Min" name="minBudget" id="minBudget" class="paddingpriceform checkBudget"><div id="checkminbudget" style="display:none;"><font color="red">Please provide minimum budget</font></div></div>
				<div class="large-3 columns"><input type="text" placeholder="Budget - Max" name="maxBudget" id="maxBudget" class="paddingpriceform checkBudget"><div id="checkmaxbudget" style="display:none;"><font color="red">Please provide max budget</font></div></div>
				<div class="large-3 columns"><input type="date" placeholder="Date of Services" name="dateOfService" id="dateOfService" class="paddingpriceform"><div id="checkdateOfService" style="display:none;"><font color="red">Please provide date of service</font></div></div>
				<div class="large-3 columns"><input type="text" placeholder="No of People" name="noOfPeople" id="noOfPeople"  class="paddingpriceform checkBudget"><div id="checknoOfPeople" style="display:none;"><font color="red">Please provide description</font></div></div>
				<div class="clearfix"></div>
				<div class="large-12 columns"><textarea placeholder="Add the details of the work you want done here. Be specfic, suggest what you'd like them to acheive. It'll save you time later." class="customheight" name="note" id="note"></textarea><div id="checknote" style="display:none;"><font color="red">Please provide location</font></div></div>
				<div class="large-6 columns right"><p class="text-right">Min 40 Words</p></div>
				<div class="clearfix"></div>				
				<div class="large-2 columns">&nbsp;</div>
				<div class="large-3 columns large-offset-7 columns"><a href="#" class="step nextstepPadding">Step 1 of 3</a><a href="#" class="button right" id="customerViewstepBuuton2">Next step</a></div>
				<!--</form>-->
					</div>
				</div>
			</article>
		</div>
	</div>
	</div> 
</div>
<div id="customerViewStep2" style="display:none">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h3>CUSTOMER&#39;S VIEW - SUBMISSION </h3>
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
				<div class="large-12 columns"><h4>Upgrade your requests posts</h4></div>
				<div class="clearfix"></div>
				<!--<form>-->
				<div class="customerService">
				<div class="row">
				<div class="large-12 columns"><h2 class="customerHeading">Want better proposals? Upgrade your requests post.
				</h2></div>			
			  <div class="large-4 columns">                      	
				<ul class="pricing-table">
					<li class="title">Featured</li>
					<li class="price">Why upgrade to Featured?</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>your job stands out with graphics and preferred placementabase</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Get 30% more proposals</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Invite unlimited candidates</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Verfication Seal</li>
					<li class="bullet-item"><span class="iconPrice">$30</span></li>
					<li class="cta-button"><input type="radio" name="postType">Feature</li>
				</ul>			
			  </div>
              <div class="large-4 columns">       
				<ul class="pricing-table">
					<li class="title">Verfied</li>
					<li class="price">Why upgrade to verfied?</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>5 Database</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Show candidates you are committed</li>
					<li class="bullet-item pricetable1" style="margin-top: 92px;"><span class="iconPrice">$5</span></li>
					<li class="cta-button"><input type="radio" name="postType">Verified</li>
				</ul>                                      
              </div>                            
              <div class="large-4 columns">
				<ul class="pricing-table">
					<li class="title">Basic</li>
					<li class="price">Why post on Elance?</li>
					<li class="bullet-item" style="margin-top: 120px;"><i class="icon-ok iconPrice"></i>Find Great freelancers on the world's top online workplace</li>
				
					<li class="bullet-item pricefree"><span class="iconPrice">Free</span></li>
					<li class="cta-button"><input type="radio" name="postType" checked>Basic</li>
				</ul>                                     
              </div>    
				<div class="clearfix"></div>
				<div class="large-12 columns">
				<p>* You get the "Verfication Seal" for this job post and all future job posts.</p>
				</div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="large-2 columns"><a href="#" class="button">Go Back</a></div>
				<div class="large-3 columns large-offset-7 columns "><a href="#" class="step nextstepPadding">Step 2 of 3</a><a href="#" class="button right" id="customerViewstepBuuton3">Last Step</a></div>
				</form>
					</div>
				</div>
			</article>
		</div>
	</div>
	</div>     
</div>

<!--<div id="customerViewStep3" style="display:none">
	<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h3>CUSTOMER&#39;S VIEW - SUBMISSION </h3>
			</div>        
		</div>
	</div>		
	</div>
		<!-- End Main Content Top -->
	<!--<div class="main-wrapper">
	<div class="row main-content">
		<div class="large-12 columns">
			<article class="post col1-alternative">
				<div class="row">
				<div class="tab-middle">
				<div class="large-12 columns"><h3>Finally, Review And Finalize Your Post</h3></div>	
				<div class="large-12 columns"><h4>Just need to confirm the information</h4></div>
				<div class="clearfix"></div>
				<form>
				<div class="customerService">
				<div class="row">
				<div class="large-12 columns"><h2 class="customerHeading">Preview and Post</h2></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Service Request :</p></div>
				<div class="large-10 columns"><p id="serviceRequest">Data Entry</p></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Location :</p></div>
				<div class="large-10 columns"><p id="locate">We are looking to build information from the internet for a business
				assignment. The person will be required to fetch information from the internet and make a record of it in the excel spreadsheet. So this is more of a part time assignment to build the database.</p></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Min Budget :</p></div>
				<div class="large-10 columns"><p id="min">No files uploaded</p></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Max Budget :</p></div>
				<div class="large-10 columns"><p id="max">Fixed Price</p></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Date Of Service :</p></div>
				<div class="large-10 columns"><p id="doservice">Less than $500</p></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">No of People :</p></div>
				<div class="large-10 columns"><p id="people">Admin Support > Data Entry</p></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Detailed Description :</p></div>
				<div class="large-10 columns"><p id="detail" class="Customprofilemargin">Data Entry</p></div>
				<div class="large-10 columns"><p></p></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Posting Period:</p></div>
				<div class="large-10 columns"><p>7 Days</p></div>
				<div class="large-10 columns"><p>Basic <a href="#">[Change]</a></p></div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="large-2 columns"><a href="#" class="button" id="customerViewBackBuuton3">Go Back</a></div>
				<div class="large-3 columns large-offset-7 columns "><a href="#" class="step nextPadding">Step 3 of 3</a><a href="#" class="button right" id="finishAuction">Finish And Post</a></div>
				</form>
					</div>
				</div>
			</article>
		</div>
	</div>
	</div>          
</div>	
<div id="customerViewStep4" style="display:none">	
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
	<!--<div class="main-wrapper">
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
				<h4 class="right"><a href="<?=base_url()?>reverseAuction"><i class="icon-arrow-left"></i>Go back and edit</a></h4>
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
</div>-->

<input type="hidden" id="sessionIdValue" value="<?php echo $this->session->userdata('user_id'); ?>" >
<script>
$(document).ready(function(){
	localStorage.clear("checkbid");
	$('.bidding').click(function(){
		localStorage.setItem("biduserid", $(this).attr("bidding"));
		localStorage.setItem("checkbid", "Merchant");
		  var uid=$('#sessionIdValue').val();
			 if(uid=='')
			 {
			 '<?php $this->session->set_userdata('bidurl',current_url()); ?>'	
			 $('#SignupOrLoginModal').foundation('reveal','open');
			 }
			else
			{	
					$.ajax({
					url: "users/checkuser",
					type: "POST",
					data: "id="+$('#sessionIdValue').val(),
					success: function(res){
					if(!res)
					{
					$('#MerchantUserModal').foundation('reveal','open');
						setTimeout(function() {
						$('#MerchantUserModal').foundation('reveal','close');
						}, 3000);
		
					}
					else
					{
						window.location.href="bidService";
					}
						
					}
				});
			}
			 
	});
});
</script>	

