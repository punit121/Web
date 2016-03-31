<script src="<?=base_url();?>assets/js/pages/reverseAuction.js"></script>

<?php
if(isset($_POST['selectCategory']))
{ 
$reverseAuctionData=array('serviceRequest'=>$_POST['request'],'lastInsertId'=>$_POST['lastInsertId'],'category'=>$_POST['selectCategory'],'location'=>$_POST['location'],'min'=>$_POST['minBudget'],'max'=>$_POST['maxBudget'],'doservice'=>$_POST['dateOfService'],'people'=>$_POST['noOfPeople'],'note'=>$_POST['note'],'postType'=>$_POST['postType']);

$this->session->set_userdata('auctionData',$reverseAuctionData);
}
?>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="paymenBid" class="reveal-modal" data-reveal>
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
								 <th width="200" class="text-center">Booking Price</th>
								 <th width="150" class="text-center">Discounted Price</th>
							   </tr>
							</thead>
							<tbody>
							   <tr class="text-center">
								 <td id=""></td>
								 <td id=""></td>
								 <td id=""></td>
							   </tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<div class="total right" >
							<h4 class="left">Total amount &nbsp; </h4><h4 class="left" id="">2000</h4>
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
			<div id="UserMerchantModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<h3>Post service request is not available for merchant</h3>
				</div>
				</div>
			</div>
		</div>
</div>
<div id="customerViewStep3" style="display:block">
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
				<div class="large-12 columns"><h3>Finally, Review And Finalize Your Post</h3></div>	
				<div class="large-12 columns"><h4>Just need to confirm the information</h4></div>
				<div class="clearfix"></div>
				<form>
				<div class="customerService">
				<div class="row">
				<div class="large-12 columns"><h2 class="customerHeading">Preview and Post</h2></div>
				<div class="large-2 columns text-right"><p class="customerfontcolor">Service Request :</p></div>
				<div class="large-10 columns"><p id="serviceRequest"><?php echo $this->session->userdata['auctionData']['serviceRequest']; ?></p><p id="lastInsertId"><?php echo $this->session->userdata['auctionData']['lastInsertId']; ?></p></div>
				<input type="hidden" value="<?php echo $this->session->userdata['auctionData']['category']; ?>" id="selectCategory">
				<div class="large-2 columns text-right clear"><p class="customerfontcolor">Location :</p></div>
				<div class="large-10 columns"><p id="locate"><?php echo $this->session->userdata['auctionData']['location']; ?></p></div>
				<div class="large-2 columns text-right clear"><p class="customerfontcolor">Min Budget :</p></div>
				<div class="large-10 columns"><p id="min"><?php echo $this->session->userdata['auctionData']['min']; ?></p></div>
				<div class="large-2 columns text-right clear"><p class="customerfontcolor">Max Budget :</p></div>
				<div class="large-10 columns"><p id="max"><?php echo $this->session->userdata['auctionData']['max']; ?></p></div>
				<div class="large-2 columns text-right clear"><p class="customerfontcolor">Date Of Service :</p></div>
				<div class="large-10 columns"><p id="doservice"><?php echo $this->session->userdata['auctionData']['doservice']; ?></p></div>
				<div class="large-2 columns text-right clear"><p class="customerfontcolor">No of People :</p></div>
				<div class="large-10 columns"><p id="people"><?php echo $this->session->userdata['auctionData']['people']; ?></p></div>
				<div class="large-2 columns text-right clear"><p class="customerfontcolor">Detailed Description :</p></div>
				<div class="large-10 columns"><p id="detail" class="Customprofilemargin"><?php echo $this->session->userdata['auctionData']['note']; ?></p></div>				
				<div class="large-2 columns text-right clear"><p class="customerfontcolor">Posting Period:</p></div>
				<div class="large-10 columns"><p>7 Days</p></div>
				<div class="large-10 columns"><!--<p>Basic <a href="#">[Change]</a></p>--></div>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="large-2 columns">
				<a href="<?= base_url();?>reverseAuction" class="button">Cancel</a></div>
				<div class="large-3 columns large-offset-7 columns "><a class="button right" id="finishAuction">Finish And Post</a></div>
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
				<h3><b>SALON's BID SUBMISSION<b></h3>
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
				 <div class="large-6 columns">
				<h4 class="right"><a href="" id="backAndEdit" value=""><i class="icon-arrow-left"></i>Go back and edit</a></h4>
				</div>
				<div class="customPosting">
				  <div class="large-9 columns large-offset-3">
				<h4><b>Thanks for Posting With us !</b></h4>
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
				<h5 class="Customprofilemargin tableFontColor" id="socialrequest"><?php echo $this->session->userdata['auctionData']['serviceRequest']; ?></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin foradianFont"><span class="fordianPricetable" id="budget"><?php echo $this->session->userdata['auctionData']['min']; ?>-<?php echo $this->session->userdata['auctionData']['max']; ?></span></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 class="Customprofilemargin" id="location"><?php echo $this->session->userdata['auctionData']['location']; ?></h5>
				</div>
				<div class="large-2 columns text-center">
				<h5 id="dateofservice"><?php echo $this->session->userdata['auctionData']['doservice']; ?></h5>
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
<input type="hidden" id="postTypeVerified" value="<?php echo $this->session->userdata['auctionData']['postType']; ?>" >

<script>
$(document).ready(function(){
	if(!localStorage.getItem('checkUrl'))
	{
		window.location.href='reverseAuction';
	}	
});
</script>