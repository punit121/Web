<script src="<?=base_url();?>assets/js/pages/reverseAuction.js"></script>

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
<?php if($this->session->userdata('user_level')!='2') { ?>
	
	<?php } else{ ?>
	<?php }?>
		<!-- End Main Content Top -->
	<div class="main-wrapper" style="margin-top:20px">
	<div class="row main-content">
		<div class="large-12 columns">
			<article class="post col1-alternative">
				<div class="row">
				<div class="tableBackground">
				<?php if($this->session->userdata('user_level')!='2') { ?>
				<div id="customerRequest" >
					<div class="large-6 columns">
						<h3><strong>Make Your Own Offers</strong></h3>
						<p style="margin:0; font-size:20px">Get customized deals from salons and spas</p>
						
                    <h3><strong>Avail our specialized services to:</strong></h3>
						<p style="margin:0; font-size:20px"><i class="icon-ok"></i>Requests quotes from salons/spas</p>
						<p style="margin:0; font-size:20px"><i class="icon-ok"></i>Compare various bids and quotes</p>
						<p style="margin:0; font-size:20px"><i class="icon-ok"></i>Choose the best option</p>
                        <p style="margin:0; font-size:20px"><i class="icon-ok"></i>Get a confirmed booking</p>
					</div>
					<div class="large-6 columns">
					<div class="customBox">
					<div class="row">
					<div class="large-12 columns">
					<div class="customBoxdefault">
					
					
					
					<img src="<?=base_url()?>assets/images/1stap.jpg">
					</div>
					
					</div>
					</div>
					</div></div>
                    <div class="large-12 columns">
                     
                    <div class="large-6 columns" style="margin-left:22%; margin-top:10px">
                    <form id="reverseAuctionForm" action="<?=base_url();?>reverseAuctionLastPost" method="POST">
					 <div class="input-group shadow">
                    <input type="text" class="appointment-input left selectAuto form-control" id="findCategory">
                     <span class="input-group-btn">
                    <a href="#" class="btn btn-default red-color " id="requestService">Get Quotes</a>
                    </span></div>
					<select class="porofileMyprofile signUpRound" style="display:none" id="selectCategory" name="selectCategory">
						  <option value="">Select a Category</option>
							<?php $result=$this->usermodel->getCategory(); 
							foreach($result as $category) {
								if(!empty($category['category']))
								{
							?>
							<option value="<?= $category['category']; ?>" id="<?= $category['id']; ?>"><?= ucwords(strtolower($category['category'])); ?></option>
							<?php
								}
							}
							?>
						  </select>
						  <div id="selectcat" style="display:none;"><font color="red">* Please Select Category</font></div>
						  </div>
					
					
					<div class="large-2 columns ">
					
					</div>	</center></div>
				</div><?php } else{?>
				<div id="merchantBid" >
                <div class="large-6 columns">
						<h3><strong>Get More Customers</strong></h3>
						<p style="margin:0; font-size:20px">Find and bid for various service requests.</p>
						
                    <h3><strong>Avail our specialized services to:</strong></h3>
						<p style="margin:0; font-size:20px"><i class="icon-ok"></i>Bid for various services</p>
						<p style="margin:0; font-size:20px"><i class="icon-ok"></i>Connect with customers</p>
						<p style="margin:0; font-size:20px"><i class="icon-ok"></i>Receive bulk booking</p>
                        <p style="margin:0; font-size:20px"><i class="icon-ok"></i>Get repeat business</p>
					</div>
					<div class="large-6 columns">
					<div class="customBox">
					<div class="row">
					<div class="large-12 columns">
					<div class="customBoxdefault">
					
					
					
					<img src="<?=base_url()?>assets/images/2stap.jpg">
					</div>
					
					</div>
					</div>
					</div></div>
                    <div class="large-12 columns">
                     
                    <div class="large-6 columns" style="margin-left:22%; margin-top:10px">
                    <div class="input-group shadow">
                    <select class="<strong></strong> porofileMyprofile signUpRound form-control">
						  <option>Select a Category</option>					 
						  </select>
					
                     <span class="input-group-btn">
                    <a href="#jump" class="btn btn-default red-color Customprofilemargin" id="bidServicebutton">Get Quotes</a>
                    </span></div>
                    	  </div>
					</div>
					</div>
					<div class="clearfix"></div>
					<div class="large-6 columns large-offset-4 log-in-row">
					<!--<h5 class="Customprofilemargin fblock-txt" id="customerRequestShow"><strong style="cursor:pointer">Looking for salon services?</strong></h5>-->
					</div>					
					</div>
				
				<div class="large-12 columns">
				
				</div>
				<?php } ?>
				<div class="large-12 columns" id="jump">
				
				<?php $result=$this->usermodel->reverseAuctionDetail();							
				if($result)
				{
							
					$date=date('Y-m-d');
				foreach($result as $auction) {
				$checkExist=$this->usermodel->findStatusodCompleteBid($auction['id']);
							if($checkExist)
							{ }else{
				if($auction['dateOfService']>=$date)
				{
				?>
				<div id="tableOdd" class="bidding" style="cursor:pointer;"  bidding="<?= $auction['id']; ?>">
				<div class="row log-in-row">
				<div class="large-1 columns log-in-row text-center"><i class="icon-star-empty foradianFontSize"></i></div>
				<div class="large-4 columns">
				<h5 class="Customprofilemargin tableFontColor"><?= $auction['request']; ?></h5>
				<p><?= $auction['note']; ?></p>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin foradianFont"><span class="fordianPricetable"><?= '<del>&#2352;</del> '.$auction['minBudget']."  - <del>&#2352;</del> ".$auction['maxBudget']; ?></span></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin"><?= $auction['location']; ?></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5><?= date('d-m-Y',strtotime($auction['dateOfService'])); ?></h5>
				</div>
				</div>
				</div>
				<?php }  } } }?>
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
				<div class="row"></form>
				<div class="tab-middle"><form id="teststform">
				<div class="large-12 columns"><h3>Requests for Salon Services</h3></div>	
				<div class="large-12 columns"><h4 class="slider">Post  for free. Expand Your reach</h4></div>
				<div class="large-6 columns"><input type="text" placeholder="What do you need? (i.e Hair Draiser)" name="request" id="request" class="paddingstartForm"><input type="hidden" id="lastInsertId" name="lastInsertId" value="<?php if(isset($lastPostId)){echo $lastPostId;}else{ echo '0';}?>"><div id="checkrequest" style="display:none;"><font color="red">Please provide what do you need</font></div></div>
				<div class="large-6 columns"><input type="text" placeholder="Where's the work located" name="location" id="location" class="paddingstartForm"></div>
				<div class="clearfix"></div>
				<div class="large-3 columns"><input type="text" placeholder="Budget - Min" name="minBudget" id="minBudget" class="paddingpriceform checkBudget" maxlength="6"></div>
				<div class="large-3 columns"><input type="text" placeholder="Budget - Max" name="maxBudget" id="maxBudget" class="paddingpriceform checkBudget" maxlength="6"></div>
				<div class="large-3 columns"><input type="text" placeholder="Date of Services" name="dateOfService" id="dateOfService" class="paddingpriceform"></div>
				<div class="large-3 columns"><input type="text" placeholder="No of People" name="noOfPeople" id="noOfPeople"  class="paddingpriceform checkBudget" maxlength="3"></div>
				<div class="clearfix"></div>
				<div class="large-12 columns"><textarea placeholder="Add the details of the work you want done here. Be specfic, suggest what you'd like them to acheive. It'll save you time later." pattern=".{40,}" required class="customheight" name="note" id="note"></textarea>
				<div class="clearfix"></div>				
				<div class="large-2 small-4 columns"><a href="#" class="button left" id="goBack">Back</a></div>
				<div class="large-3 small-8 columns large-offset-7 columns"><input type="submit" class="button right" id="finishAuction" value="Finish And Post"></div><!--<a href="#" class="button right" id="customerViewstepBuuton3">Next step</a></div>
				<!--</form>customerViewstepBuuton2 customerViewstepBuuton3-->
				</form>	</div>
				</div>
			</article>
			<script>
				$('#goBack').click(function(){
					$('#customerViewStep1').hide();
					$('#requestServicePage').show();
				})
			</script>
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
					<li class="title">Highlighted</li>
					<li class="price">Why upgrade to Highlighted?</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Your Request will be placed on the Top.</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>It will be highlighted in Bold and Distinct Colours</li>
					<!--<li class="bullet-item"><i class="icon-ok iconPrice"></i>-</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>-</li>-->
					<li class="bullet-item"><span class="iconPrice"><!--<del>&#2352;</del>-->Rs.500</span></li>
					<li class="cta-button padding_bullet"><input type="radio" name="postType" value="feature">Feature</li>
				</ul>			
			  </div>
              <div class="large-4 columns">       
				<ul class="pricing-table">
					<li class="title">Verfied</li>
					<li class="price">Why upgrade to verfied?</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Premium Members are preferred over others</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Add extra level of comfort for the saloons</li>
					<!--<li class="bullet-item pricetable1"><span class="iconPrice">-</span></li>
					<li class="bullet-item pricetable1"><span class="iconPrice">-</span></li>-->
					<li class="bullet-item pricetable1"><span class="iconPrice"><!--<del>&#2352;</del>-->Rs.1000</span></li>
					<li class="cta-button padding_bullet"><input type="radio" name="postType" value="verified">Verified</li>
				</ul>                                      
              </div>                            
              <div class="large-4 columns">
				<ul class="pricing-table">
					<li class="title">Basic</li>
					<li class="price">Why post on Zersey?</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Zersey is the portal of choice for all the salons</li>
					<li class="bullet-item"><i class="icon-ok iconPrice"></i>Get bids from salons to get the best quote</li>
					<!--<li class="bullet-item pricetable1"><span class="iconPrice">-</span></li>
					<li class="bullet-item pricetable1"><span class="iconPrice">-</span></li>-->
					<li class="bullet-item pricefree"><span class="iconPrice">Free</span></li>
					<li class="cta-button padding_bullet"><input type="radio" name="postType" value="free" checked>Basic</li>
				</ul>                                     
              </div>    
				<div class="clearfix"></div>
				<div class="large-12 columns">
				<p>* You become a Premium customer and your profile is updated accordingly</p>
				</div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="large-2 small-4 columns"><a href="#" class="button" id="SecondStep">Back</a></div>
				<div class="large-3 small-8 columns large-offset-7 columns "><a href="#" class="button right" id="customerViewstepBuuton3">Last Step</a></div>
				
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
				<h3><b><b></h3>
				<!--<h4>Post a service requests and get quotations from salons. Expand Your reach</h4>-->
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
                <div class="large-9 columns large-offset-3">
				<h4>To modify your service requiests, <a href="<?= base_url();?>profile" >Click here!.</a></h4>
				</div>
				<div class="large-9 columns large-offset-3">
				<h4>If you changed your mind, you may <a href="#" id="deletePostRequest">cancel posting this ad</a></h4>
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
				<h5 class="Customprofilemargin" id="locationser"></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 id="dateofservicepre"></h5>
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

<input type="hidden" id="sessionIdValue" value="<?php echo $this->session->userdata('user_id'); ?>" >
<script>
$(document).ready(function(){
			$("#dateOfService").datepicker({ minDate: 0,dateFormat: 'dd-mm-yy' });
	$.post('<?=base_url()?>users/request',function(data){
			console.log(data);
			var availableTags = data.split(",");
			$('#request').autocomplete({
			source: availableTags
			});
		});
	$.post('<?=base_url()?>users/alllocate',function(data){
			console.log(data);
			var availableTags = data.split("*");
			$('#location').autocomplete({
			source: availableTags
			});
		});
	localStorage.clear("checkbid");
	$('.bidding').click(function(){
		localStorage.setItem("biduserid", $(this).attr("bidding"));
		localStorage.setItem("checkbid", "Merchant");
		  var uid=$('#sessionIdValue').val();
			 if(uid=='')
			 {
			 '<?php $this->session->set_userdata('bidurl',current_url()); ?>'	
			 $('#myModal1').foundation('reveal','open');
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
	$('#login').click(function(){
				$('#myModal1').foundation('reveal','open');
			});
			$('#signup').click(function(){
				$('#myModal').foundation('reveal','open');
			});
});
</script>	

