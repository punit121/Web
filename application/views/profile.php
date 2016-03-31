<!DOCTYPE html>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="<?php echo base_url();?>newcss/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>newcss/css/bootstrap-multiselect.css" type="text/css"/>

<div class="main-content-top main-content-border">	
	<div class="main-wrapper">		
	</div>		
</div>

<style>
.dropdown-menu{background-color:#FFF;

}
.multiselect {padding:2px 12px !important}
.btn-group{ width:100%;
border-radius:0px}
.btn-group>.btn:first-child{border-radius:0px; background-color:#f4f4f2 !important; height:23px}
select.error
{
background-color:rgba(198, 15, 19, 0.1);
border-color:#c60f13;
}
.biddetail{padding: 10px 2px;
border-bottom: solid 1px #eaeaea;}
.goback{background-color:#25c9da;color:white;border:0px;padding-top:3%;padding-bottom:4%;border-radius:3px;font-size:15px;}
</style>
<script>
		var baseurl='<?=base_url();?>';
</script>
<script>
$(document).ready(function(){
	var value="";
	$('#home').click(function(){
		value=0;
		var valuedata='value='+value;
		$.post(baseurl+'users/getsessiondata',valuedata,function(response){
		//	console.log(response);
			//location.reload();
		});
	});
	$('#profile').click(function(){
		value=1;
		var valuedata='value='+value;
		$.post(baseurl+'users/getsessiondata',valuedata,function(response){
			//console.log(response);
			//location.reload();
		});
	});
	$('#wallet').click(function(){
		value=2;
		var valuedata='value='+value;
		$.post(baseurl+'users/getsessiondata',valuedata,function(response){
			//console.log(response);
			//location.reload();
		});
		
	});
	$('#content').click(function(){
		value=3;
		var valuedata='value='+value;
		$.post(baseurl+'users/getsessiondata',valuedata,function(response){
			//console.log(response);
			//location.reload();
		});
		
	});	
	
	$.post('<?=base_url()?>users/getAllcity',function(data){
			//console.log(data);
			var availableTags = data.split(",");
			$('#locatestate').autocomplete({
			source: availableTags
			});
		});
		
	$.post('<?=base_url()?>users/state',function(data){
			//console.log(data);
			var availableTags = data.split(",");
			$('#state').autocomplete({
			source: availableTags
			});
		});
		$('#areal').focus(function() {
		$.post('<?=base_url()?>users/alllocate',function(data){
			console.log(data);
			var availableTags = data.split("*");
			$('#areal').autocomplete({
			source: availableTags
			});
		}); });
	$('.plus').click(function(){
			$(this).parent().siblings().slideToggle();
			$(this).toggleClass('plus minus');
		});
});
</script>
<script src="<?=base_url()?>assets/js/pages/profile.js"></script>

<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="Profilechanged" class="reveal-modal" data-reveal style="z-index:999999999;" >
				<div class="row">		
					<div class="large-12 columns">									
					<center>Profile changed successfully</center>
					</div>						
				</div>				
			</div>
		</div>
</div>

<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="selectOneforBid" class="reveal-modal" data-reveal style="z-index:999999999;" >
				<div class="row">		
					<div class="large-12 columns">									
					<center>You are selecting this saloon for the request.</center><br><br>
					</div>					
				</div>
				<div class="row">	
					<form action="<?=base_url()?>users/completeBid" method="POST">
						<div class="large-6 columns">	
							<input type="hidden" name="reverseAuctionId" id="reverseAuctionId">
							<input type="hidden" name="bidMerchantId" id="bidMerchantId">
							<input type="submit" value="Done">
						</div>
						<div class="large-6 columns">									
							<input type="button" value="Cancel" id="cancelSelectOne">
						</div>
					</form>	
				</div>				
			</div>
		</div>
</div>

	<!-- End Main Content Top -->
	<div class="main-wrapper">
	<div class="row main-content">
    <div class="large-12 columns">     
      <div class="row widgets-top"><!-- Row -->
        <div class="large-12 columns widgets side-widgets">         
            <!-- Sidebar Navigation --> 
				<div class="section-container tabs" data-section="tabs">
				    <?php if($this->session->userdata('val')==0) { ?>
				  <section class="section active"  id="home">
				   <?php } else {  ?>
				   <section class="section">
				   <?php }?>
					<p class="title"><a href="#" id="home">My Home</a></p>
					<div class="row">
					<div class="large-6 medium-12 small-12 columns large-offset-4">
					<div id="pro" class="reveal-modal" data-reveal style="z-index:999999999;top: -30px !important;" >
					<div class="row">
					<div class="stripBackground">
					<div class="large-12 columns">
					<h3 class="text-center stripSignUp"><strong>Tell us who you go to.<br>We'll reach out and get them signed up!</strong></h3>
					</div>
					</div>
					</div>	
					<div class="row log-in-row">
					<!--<div class="large-12 columns">
					<label class="profileInpuy">How can we reach them? (name, salon name, phone, email, etc)</label>
					<textarea></textarea>					
					</div>-->
					<form id="inviteForm" method="POST" action="<?=base_url()?>invite">
							<div class="large-12 columns">
							<label class="profileInpuy">Name</label>
							<input type="text" id="nameCustomer" name="nameCustomer" placeholder="Name">					
							</div>
							<div class="large-12 columns">
							<label class="profileInpuy">Salon name</label>
							<input type="text" id="nameSalon" name="nameSalon" placeholder="salon name">
										
							<!--<input type="text" id="nameSalon" name="nameSalon" placeholder="salonName">-->				
							</div>
							<div class="large-12 columns">
							<label class="profileInpuy">Mobile</label>
							<input type="text" id="mobileNo" name="mobileNo" placeholder="mobileNo">					
							</div>
							<div class="large-12 columns">
							<label class="profileInpuy">Email</label>
							<input type="text" id="emailId" name="emailId" placeholder="emailId">				
							</div>
							<div class="large-12 columns">
							<label class="profileInpuy">Want to send them a message about Zersey?</label>
							<textarea id="message" name="message" placeholder="message"></textarea>					
							</div>						
							<div class="large-12 columns">
							<button class="button secondary">INVITING THEM !</button>
							</div>	
						</form>											
					</div>
					<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
					</div>
					</div>
					</div>
						<!--friends-->
						<div class="row">
					<div class="large-4 medium-12 small-12 columns large-offset-4">
					<div id="friend" class="reveal-modal" data-reveal style="z-index:999999999;top: 0 !important;" >
					<div class="row">
					<div class="stripBackground">
					<div class="large-12 columns">
					<h3 class="text-center stripSignUp"><strong>Invite your friends to Zersey!</strong></h3>
					</div>
					</div>
					</div>	
					<div class="row log-in-row">
					<div class="large-12 columns">
					<P>Send an Message to your friends Facebook and tell us about Zersey</P>
					
					
					</div>
						
					<div class="large-12 columns">
					<a href="#" class="button secondary" id="inviting">ALL DONE INVITING !</a>
					</div>					
					</div>
					<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
					</div>
					</div>
					</div>	
					<!--modal box-->
					<div class="content">
					  <div class="row searchTopM " id="myHomeMenu">
					  
						<?php echo $this->session->flashdata('updatePassword');?>
						<?php echo $this->session->flashdata('inviteMessage');?>
					  <div class="large-12 columns">
						<div class="row">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Read Your Reviews</b></h5>
						<p class="text-center"><a href="#" id="readReview" class="button primary" style="color: rgb(255, 255, 255) !important;">Reviews</a></p>
							</div>
						</div>
					   <div class="large-4 columns large-offset-2">
					  <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Browse Photos</b></h5>
						<p class="text-center"><a href="<?=base_url()?>browsePhotos" class="button primary" style="color: rgb(255, 255, 255) !important;">Look Book</a></p>
							</div>
					   </div>
					  </div>
					  <!--<div class="row">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Search and Book</b></h5>
						<p class="text-center"><a href="<?//=base_url()?>serviceOrLocation" class="button primary" style="color: rgb(255, 255, 255) !important;">SEARCH PROS</a></p>
							</div>
						</div>					   
					   <div class="large-4 columns large-offset-2">
					  <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>My Photo Gallery</b></h5>
						<p class="text-center"><a href="<?//=base_url()?>browsePhoto/<?//=$this->session->userdata('user_id');?>" class="button primary" style="color: rgb(255, 255, 255) !important;">PHOTOS</a></p>
							</div>
					   </div>
					  </div>-->
					   <div class="row searchTopM">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box ">
						<h5 class="text-center ProfileMargin"><b>Invite a Salon to Zersey</b></h5>
						<p class="text-center"><a href="#" data-reveal-id="pro" class="button primary" style="color: rgb(255, 255, 255) !important;">INVITE YOUR PRO</a></p>
						</div>
						</div>					   
					   <div class="large-4 columns large-offset-2">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Invite your Friends to Zersey</b></h5>
						<p class="text-center"><a href="#" data-reveal-id="friend" class="button primary" style="color: rgb(255, 255, 255) !important;">INVITE YOUR FRIENDS</a></p>
							</div>
					   </div>
					  </div>
					  </div>
					  </div>
						<div id="reviewShow" style="display:none">
						 <div class="row">
						 
						 
						 <div class="large-12 columns">
							<h3>My Reviews</h3>
							<br><br>
							<div class="row">
							  
							<?php
								$review=$this->usermodel->myReview($this->session->userdata('user_id'));
								if(!empty($review))
								{
									foreach($review as $r)
									{
										?>
											<div class="large-1 medium-1 small-1 columns">
											<?php $mname=$this->usermodel->findMerchantById($r['merchantId']); //print_r($mname);?>
							 
												<img src="http://zersey.com/assets/images/merchant/<?php echo $mname[0]['photo']?>" class="img-radius">
									
											</div>
											<div class="large-11 medium-11 small-11 columns">
												<h6><?php echo ucwords(strtolower($mname[0]['salonName'])); ?></h6>
												<?php echo $r['review']; ?>
												<br>
												<span style="float:right;"><i>Posted On: <?php echo date("d-m-Y", strtotime($r['createdOn']));?></i></span>
												<br><hr><br>
											</div>
										<?php
									}
								}
								else
								{
									echo "You Have No Reviews";
								}
							?>
							
							</div>
							</div>
							
							<div class="large-offset-10 large-2 columns ">
							<input type="button" value="Back" id="backMenu" style="background-color:#25c9da;color:white;border:0px;padding-top:3%;padding-bottom:4%;border-radius:3px;font-size:15px;" />
							</div>
							
							</div>
						</div>
						
					</div>
					<script>
						$('#readReview').click(function(){
							$('#myHomeMenu').hide();
							$('#reviewShow').show();
						})
						$('#backMenu').click(function(){
							$('#reviewShow').hide();
							$('#myHomeMenu').show();
						})
					</script>
				  </section>
				  
				  <?php if($this->session->userdata('val')==1){ ?>
				  <section class="section active">
				   <?php } else{ ?>
				   <section class="section">
				   <?php }?>
				 	<p class="title"><a id="profile">Profile</a></p>
					<!--modal-->
					<div class="row">
					<div class="large-4 medium-12 small-12 columns large-offset-4">
					<div id="passwordBox" class="reveal-modal" data-reveal style="z-index:999999999;top: 0 !important;" >
					<div class="row">
					<div class="stripBackground">
					<div class="large-12 columns">
					<h3 class="text-center stripSignUp"><strong>Change Password</strong></h3>
					</div>
					</div>
					</div>	
					<div class="row log-in-row">			
						<form id="changePassword" method="post" action="<?=base_url()?>auth/change_password">
							<div class="large-12 columns">
							<input type="password" placeholder="Current Password" name="old_password" id="old_password" class="sign-form">
							</div>
							<div class="large-12 columns">
							<input type="password" placeholder="Password" name="new_password" id="new_password" class="sign-form">
							</div>
							<div class="large-12 columns">
							<input type="password" placeholder="Confirm Password" name="confirm_new_password" id="confirm_new_password" class="sign-form">
							</div>		
							<div class="large-12 columns">
							<button type="submit" name="submit"class="button secondary">Update</button>
							</div>	
						</form>
					</div>
					<a class="close-reveal-modal radius-close" id="closeShowBox"><div class="text-center">&#215;</div></a>
					</div>
					</div>
					</div>						
					<div class="content">
					 <div class="row log-in-row">
					 <div class="large-8 columns">
					 <div class="row">
					<form id="changeProfile" method="POST" enctype="multipart/form-data" action="<?=base_url()?>users/updateProfile">
					<?php $this->session->flashdata('updatedRecord');
					$result=$this->usermodel->findRecordsByUserId($this->session->userdata('user_id'));
					if(!empty($result))
					{
					foreach($result as $value)
					{
					?>
					<div class=" large-12 columns"> 
					<h4>Change Profile <span class="right"><a href="#" id="showPasswordBox" style="color:red !important;">Change password</a></span></h4>
					 </div>
					 <div class=" large-6 columns"> 
					<label class="profileInpuy">YOUR FULL NAME</label>
					<input type="text" class="porofileMyprofile" name="fullName" id="fullName" value="<?= $value['fullname'] ?>">
					 </div>
					 <div class=" large-6 columns"> 
					<label class="profileInpuy">YOUR TWITTER HANDLE</label>
					<input type="text" class="porofileMyprofile" name="howHandle" value="<?= $value['howHandle'] ?>">
					 </div>
					  <div class=" large-6 columns"> 
					<label class="profileInpuy">ARE YOU GUY OR A GIRL?</label>
					<select class="porofileMyprofile" name="gender">
					<?php if($value['gender']=='M'){?>
					  <option value="M">Guy</option>
					  <option value="F">Girl</option>
					  <?php }else {?>
					  <option value="F">Girl</option>
					  <option value="M">Guy</option>
					  <?php } ?>
					</select>
					 </div>
					  <div class=" large-6 columns"> 
					<label class="profileInpuy">YOUR DATE OF BIRTH  <small>(DD-MM-YYYY)</small></label>
                    
					<input type="text" class="porofileMyprofile" id="dateOfBirth" name="dateOfBirth" value="<?= $value['DOB'] ?>" ><span class="" style="float:right;margin-top: -11%;margin-right: 2%;"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
					 </div>
					 <div class=" large-3 columns"> 
					<label class="profileInpuy">WHERE DO YOU LIVE?*</label>
					<input type="text" class="porofileMyprofile notTakeComa" id="areal" name="state" value="<?= $value['area'];?>" style="height:23px">
					  </div>
					  <div class=" large-3 columns"> 
					<label class="profileInpuy">City*</label>
					<input type="text" class="porofileMyprofile notTakeComa locatestate" id="locatestate" name="locatestate" value="<?= $value['state'];?>" style="height:23px">
					  </div>
                      <div class=" large-6 columns"> 
					<label class="profileInpuy">Your Interest</label></br>
				
				
                    <select class="porofileMyprofile" style="width:100%" id="example-getting-started" multiple="multiple" name="a[]"> 
                    
    <?php 
			$groups = $this->usermodel->getAllGroups();
            foreach($groups as $row)
            { 
              echo '<option value="'.ucfirst($row->name).'">'.ucfirst($row->name).'</option>';
            }
            ?>  
</select>
					 </div>
                     <script>
var data="<?=$value['interest'];?>";

//Make an array

var dataarray=data.split(",");

// Set the value

$("#example-getting-started").val(dataarray);

// Then refresh

$("#example-getting-started").multiselect("refresh");
</script>
					 <div class=" large-6 columns"> 
					<label class="profileInpuy">YOUR PREFERRED LANGUAGE</label>
					<select class="porofileMyprofile" name="language">
					  <option><?= $value['language'] ?></option>
					  <option>Hindi</option>
					  <option>English</option>
					  <option>Spain</option>
					  <option>Turkey</option>
					</select>
					 </div>
					 <div class=" large-6 columns"> 
					<label class="profileInpuy">A LITTLE ABOUT YOURSELF</label>
					<textarea class="porofileMyprofile" style="min-height:88px !important;" name="yourSelf"><?= $value['yourself'] ?></textarea>
					 </div>
					 <div class=" large-6 columns"> 
					<label class="profileInpuy">GOT A PERSONAL WEBSITE?</label>
					<input type="text" class="porofileMyprofile" name="website" value="<?= $value['website'] ?>">
					 </div>
					 <div class=" large-6 columns"> 
					<label class="profileInpuy">YOUR MOBILE NUMBER</label>
					<input type="text" class="onlyInteger porofileMyprofile" name="mobileNo" value="<?= $value['mobile'] ?>" maxlength="10">
					 </div>
					 <div class=" large-7 columns"> 
					Upload your own image
					<hr>
					<p>you can upload a JPG,PNG or Bitmap file (file size limit is 3.5 MB). </p>
					<div id="customerPhoto" class="profileImageSize">
					<?php if(!empty($value['photo']))
							$pic=$value['photo'];
							else
							$pic="usericon.jpg";
							?>
					<img src="<?php echo base_url().'assets/images/merchant/'.$pic; ?>">
					</div>
					<input type="file" value="Browse" name="picture" id="picture" class="profileImage"/>
					<div class="clearfix"></div>
					<div>
					
					</div>
					<p id="customerImage" style="margin-left:21%;"></p>
					 </div>	
					 <?php } } ?>
					 <div class=" large-5 columns"> 
					<button type="submit" class="button primary right" style="color:#fff !important;" id="saveButton">SAVE</button>
					 </div>	
					 
					 </form>
					 </div>	
					 </div>
					
					 </div>
					
					<?php /*?><div class="row log-in-row">
					<!--Andrew-->
					<form id="cardInformation" method="POST" action="<?=base_url()?>users/creditcard">
					 <div class="large-5 columns">
						<div class="row">
						<div class=" large-12 columns"> 
						<hr>
						<h3 class="offTxt"> MANAGE CREDIT CARDS</h3>
						<hr>
						</div>
						<div class=" large-6 columns"> 		
						<?php $result=$this->usermodel->myCard();?>
	<h3>View My Card:</h3><select class="porofileMyprofile" id="viewmycard" name="mycard">
							<option>Select Card No.</option>
							<?php foreach($result as $cardno) {  ?>
							  <option><?= $cardno['cardNo'];?></option>
							  <?php } ?>
							</select>						
						<h3>Add a new card:</h3>
						</div>
						<div class="clearfix"></div>
						<div class=" large-6 columns"> 
						<label class="profileInpuy">Name On Card</label>
						<input type="text" class="porofileMyprofile" id="cardname" name="cardName" placeholder="Vinay Singh">
						</div>	
						<div class="clearfix"></div>
						<div class=" large-4 columns"> 					
						<label class="profileInpuy">Card Number</label>
						<input type="text" class="onlyInteger  porofileMyprofile" name="cardNo" id="cardno" placeholder="card no.">
						 </div>
						 <div class=" large-2 columns"> 					
						<label class="profileInpuy">CW</label>
						<input type="text" class="porofileMyprofile" name="cw" id="CW" placeholder="cw">
						 </div>
						 <div class=" large-2 columns CustomCredit"> 					
						 <a href="#"><img src="<?=base_url()?>assets/images/mastervisa.png"></a>
						 </div>
						 <div class=" large-2 columns CustomCredit"> 					
						 <a href="#"><img src="<?=base_url()?>assets/images/mastercard.png"></a>
						 </div>
						 <div class=" large-2 columns CustomCredit"> 					
						 <a href="#"><img src="<?=base_url()?>assets/images/discover.png"></a>
						 </div>
						 <div class="clearfix"></div>
						<div class=" large-3 columns"> 					
						<label class="profileInpuy">Expiration</label>
						<select class="porofileMyprofile" name="expmonth" id="expm">
						  <option>Month</option>
						  <option>Jan</option>
						  <option>Feb</option>
						  <option>Mar</option>
						  <option>Apr</option>
						  <option>May</option>
						  <option>Jun</option>
						  <option>Jul</option>
						  <option>Aug</option>
						  <option>Sep</option>
						  <option>Oct</option>
						  <option>Nov</option>
						  <option>Dec</option>
						</select>
						 </div>	
						 <div class=" large-3 columns"> 					
						<label class="profileInpuy">&nbsp;</label>
						<select class="porofileMyprofile" name="expyear" id="expy">
						  <option>Year</option>
						 <?php
							$year=date('Y');
							for($i=1985;$i<=$year;$i++) {?>
						  <option><?php echo $i; ?></option>
						  <?php } ?>
						</select>
						 </div>	
						 </div>	
					 </div>
					 <div class="large-5 columns log-in-row">
					 <div class="row">						
							<div class=" large-6 columns"> 					
							<label class="profileInpuy">First Name</label>
							<input type="text" class="porofileMyprofile" name="firstName" id="firstname" placeholder="First Name">
							 </div>
							<div class=" large-6 columns"> 					
							<label class="profileInpuy">Last Name</label>
							<input type="text" class="porofileMyprofile" name="lastName" id="lastname" placeholder="Last Name">
							 </div>
							 <div class=" large-4 columns"> 					
							<label class="profileInpuy">Address</label>
							<input type="text" class="porofileMyprofile" name="address" id="addr">
							 </div>
							 <div class=" large-3 columns"> 					
							<label class="profileInpuy">Apt/Fl/Suite</label>
							<input type="text" class="porofileMyprofile" name="aptFiSuite" id="aptfisuit">
							 </div>
							  <div class="clearfix"></div>
							  <div class=" large-4 columns"> 					
							<label class="profileInpuy">City</label>
							<input type="text" class="porofileMyprofile" name="city" id="City">
							 </div>
							 <div class=" large-4 columns"> 					
							<label class="profileInpuy">State</label>
							<input type="text" class="porofileMyprofile locatestate" name="state" id="State">
							 </div>
							 <div class="clearfix"></div>
							 <div class=" large-4 columns"> 					
							<label class="profileInpuy">Zip</label>
							<input type="text"class="onlyInteger  porofileMyprofile" name="zipcode" id="zip" placeholder="Zip">
							 </div>
							  <div class="clearfix"></div>
							 <div class=" large-5 columns"> 										
							<button class="button primary" style="color:#fff !important">Store Credit Card</button>
							 </div>
					</form>
					 </div>	
					 </div><?php */?>
					 
					 </div>
				  </section>
				 
				  <!--section3--> 
				  <?php if($this->session->userdata('val')==2){ ?>
				  <section class="section active">
				   <?php } else{ ?>
				   <section class="section">
				   <?php }?>
				  <p class="title"><a href="#" id="wallet">My Wallet</a></p>
					<div class="content">
					 <div class="row searchTopM " id="myWallet">
					  <div class="large-12 columns">
					  <div class="row">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Find Upcoming Appointments</b></h5>
						<p class="text-center"><a href="#" id="myAppointShow" class="button primary" style="color: rgb(255, 255, 255) !important;">Appointments</a></p>
							</div>
						</div>					   
					   <div class="large-4 columns large-offset-2">
					  <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Track Your Offers</b></h5>
						<p class="text-center"><a href="<?=base_url()?>offers" class="button primary" style="color: rgb(255, 255, 255) !important;">Offers</a></p>
							</div>
					   </div>
					  </div>
					   <div class="row searchTopM">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box ">
						<h5 class="text-center ProfileMargin"><b>Check Bids</b></h5>
						<p class="text-center"><a class="button primary" style="color: rgb(255, 255, 255) !important;" id="bidDetail">Reverse Auction</a></p>
						</div>
						</div>					   
					   <div class="large-4 columns large-offset-2">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Check Your Wishlist</b></h5>
						<p class="text-center"><a href="<?=base_url()?>whishlist" class="button primary" style="color: rgb(255, 255, 255) !important;">Wishlist</a></p>
							</div>
					   </div>
					  </div>
					  </div>
					  </div>
						<div id="bidShow" style="display:none">
						 <div class="row">
						 
						 
						 <div class="large-12 columns">
							<h3>Merchants Bids</h3>
							<br><br>
							<div class="">
								<?php
								$reverseAuctions=$this->usermodel->reverseAuctionDetailByuserId();
								if(!empty($reverseAuctions))
								{	
									foreach($reverseAuctions as $reverseAuction)
									{	
									?>
								<div class="section-container large-11 level accordion" data-section="" data-section-resized="true" style="min-height:0px;background:#f9f9f9;margin-bottom: 1px !important;">
									<div class="book-box" style="margin-left:5px">
										<div class="custom-box custom-boxwidth businessCategory">
											<span class="plus pluswork"></span><h3><?=ucwords($reverseAuction['request'])?></h3>					
										</div>
										<div id="bidDetail" style="display:none">
												<div class="" style="border-bottom: 2px solid #eaeaea;">
															<div class="large-2 medium-11 small-11 columns">
																<h4>Salon Name</h4>
															</div>
															<div class="large-2 medium-11 small-11 columns">
																<h4>Contact Name</h4>
															</div>
															<div class="large-5 medium-11 small-11 columns">
																<h4>Note</h4>
															</div>
															<div class="large-2 medium-11 small-11 columns">
																<h4>Bid Amount</h4>
															</div>
															<div class="large-1 medium-11 small-11 columns">
																<h4>Action</h4>
															</div>
												</div>
												<?php
												$bids=$this->usermodel->myBidDetailsByReverseauctionId($reverseAuction['id']);
							
								if(!empty($bids))
								{	
									foreach($bids as $bid)
									{	
										?>
										<div class="biddetail">
										<?php $mname=$this->usermodel->findMerchantById($bid['merchantId']);?>

											<div class="large-2 medium-11 small-11 columns">
												<a href="<?=base_url()?>merchant/<?=$mname[0]['salonName'];?>/<?=$mname[0]['merchantId'];?>" target="_blank"><?php echo ucwords(strtolower($mname[0]['salonName'])); ?></a>
											</div>
											<div class="large-2 medium-11 small-11 columns">
												<?php echo ucwords(strtolower($bid['contactName'])); ?>
											</div>
											<div class="large-5 medium-11 small-11 columns">
												<?php echo ucwords(strtolower($bid['note'])); ?>
											</div>
											<div class="large-2 medium-11 small-11 columns">
												<?php echo $bid['bamt']; ?>
											</div>
											<div class="large-1 medium-11 small-11 columns">
												<?php if($bid['status']=='1'){ ?>
												<input type="button" value="Choose" class="chooseOne" rel="<?=$bid['merchantId']?>">
												<?php }else{ echo 'Finalized';} ?>
												<input type="hidden" value="<?=$reverseAuction['id']?>" class="chooseOneReverseId">
											</div>
										</div>	
										<?php
									}
								}
								else
								{	?>
								<div class="biddetail">
									You Have No Bids
								</div>
								<?php	
								}
							?>
											
										</div>
									</div>
								</div>
								<?php
									}
								}?>	
							</div>
							</div>
							<div class="large-offset-10 large-2 columns ">
							<input type="button" class="goback" value="Back" id="goBack2" style="" />
							</div>
							
							</div>
						</div>
						<div id="myAppointments" style="display:none">
							<div class="row">
                        
                        <div class="col-lg-12" style="padding-left:1%; padding-right:1%;">
                            <div class="panel panel-default">								
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>View Appointment</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>Service</th>
                                                <th>Date</th>
                                                <th>Apply Date</th>
                                                <th>Time</th>
                                                <th>Emplyoee</th>
                                                <th>Merchant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php $result=$this->usermodel->getAppointment();
											if($result)
											{
											foreach($result as $apointment)
											{
											
											?>
											<tr id="<?= $apointment['id']?>">
                                               
                                                <td><?php echo $result=$this->usermodel->findServiceByCustomer($apointment['serviceId']);
												?></td>
                                                <td><?=$apointment['appointDate']?></td>
                                                <td><?=$apointment['applyDate']?></td>
                                                <td><?=$apointment['appointTime']?></td>
                                                <td><?php echo $result=$this->usermodel->findEmployeById($apointment['empId']);?></td>
												<td><?php echo $result=$this->usermodel->findNameById($apointment['merchantId']);?></td>
                                          <td>
							<?php
								if($apointment['status']=='1')
								{
								?>
								<a><i aria-hidden="true" class="adctv_service"  style="cursor:pointer;">Cancel</i></a>
								<?php
								}
								else
								{
								?>
								<a><i aria-hidden="true" class="adctv_service"  style="cursor:pointer;">Activate</i></a>
								<?php
								} ?>
																									
																								</td> 
                                            </tr>
                                        <?php }
									}else {
									echo "<tr><td colspan='6' align='center'>No record(s) found</td></tr>";
									}		
									?> </tbody>
                                    </table>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      
						</div>
					
						<div class="large-offset-10 large-2 columns ">
							<input type="button" value="Back" id="goBack1" style="background-color:#25c9da;color:white;border:0px;padding-top:3%;padding-bottom:4%;border-radius:3px;font-size:15px;" />
						</div>

                    </div>
						</div>
					</div>
					<script>
						$('#myAppointShow').click(function(){
							$('#myWallet').hide();
							$('#myAppointments').show();
						});
						$('#bidDetail').click(function(){
							$('#myWallet').hide();
							$('#bidShow').show();
						});
						$('#goBack1').click(function(){
							//alert('dfdfd');
							$('#myAppointments').hide();
							$('#bidShow').hide();
							$('#myWallet').show();
						});
						$('#goBack2').click(function(){
							//alert('dfdfd');
							$('#myAppointments').hide();
							$('#bidShow').hide();
							$('#myWallet').show();
						})
					</script>
				  </section>
				  <!--section 4-->
				  <?php if($this->session->userdata('val')==3){ ?>
				  <section class="section active">
				   <?php } else{ ?>
				   <section class="section">
				   <?php }?>
					<p class="title"><a href="#" id="content">My Content</a></p>
					<div class="content" id="myContent">
					 <div class="row searchTopM ">
					  <div class="large-12 columns">
						<div class="row">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Search and Book</b></h5>
						<p class="text-center"><a href="<?=base_url()?>serviceOrLocation" class="button primary" style="color: rgb(255, 255, 255) !important;">SEARCH PROS</a></p>
							</div>
						</div>					   
					   <div class="large-4 columns large-offset-2">
					  <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>My Photo Gallery</b></h5>
						<p class="text-center"><a class="button primary" style="color: rgb(255, 255, 255) !important;" id="myPhts">PHOTOS</a></p>
							</div>
					   </div>
					  </div>
					  <!--<div class="row">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Read Your Reviews</b></h5>
						<p class="text-center"><a href="#" class="button primary" style="color: rgb(255, 255, 255) !important;">Reviews</a></p>
							</div>
						</div>					   
					   <div class="large-4 columns large-offset-2">
					  <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Browse Photos</b></h5>
						<p class="text-center"><a href="<?//=base_url()?>browsePhoto" class="button primary" style="color: rgb(255, 255, 255) !important;">Look Book</a></p>
							</div>
					   </div>
					  </div>-->
					   <div class="row searchTopM">
					   <div class="large-4 columns large-offset-1">
					   <div class="search-box ">
						<h5 class="text-center ProfileMargin"><b>Ask Questions</b></h5>
						<p class="text-center"><!--<a href="javascript:void($zopim.livechat.window.openPopout())" class="button primary" style="color: rgb(255, 255, 255) !important;">Q &amp; A</a>-->
                        <a href="<?= base_url();?>contact" id="" class="button primary" style="color: rgb(255, 255, 255) !important;">Q &amp; A</a>
                        </p>
						</div>
						</div>					   
					   <div class="large-4 columns large-offset-2">
					   <div class="search-box">
						<h5 class="text-center ProfileMargin"><b>Track Your Points</b></h5>
						<p class="text-center"><a href="<?= base_url();?>reward" class="button primary" style="color: rgb(255, 255, 255) !important;">Points Earned</a></p>
							</div>
					   </div>
					  </div>
					  </div>
					  </div>
					</div>

						<div id="myPhotos" class="content" style="display:none">
							<div class="content_wrapper">
								<div class="row">
			 
								<div class="large-12 columns">
				<ul class="portfolio-content large-block-grid-4">

					<?php
						$customerresult=$this->usermodel->getcustomerImage($this->session->userdata('user_id'));
						if(!empty($customerresult))
					 {
					  foreach($customerresult as $image) { ?>
					 <li class="addImage post col-2" data-id="2">
					  <div class="view view-one ">
					  <?php if($image['photo']) { ?>
					   <img src="<?=base_url();?>assets/images/merchant/<?= $image['photo']; ?>" alt="" style="width:300px;height:170px;" id="<?= $image['photo']; ?>" /> 
					   <?php }else{ ?>
					   <img src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="" style="width:300px;height:170px;" id="<?= $image['photo']; ?>" />
					   <?php } ?>
					   <div class="addIcon" style="display:none;"><a href="#"><i class="icon-heart" ></i></a><a class="addAlbum"  lang="<?=$image['photo'];?>"><i class="icon-plus" ></i></a></div>
						<a href="<?=base_url();?>assets/images/merchant/<?= $image['photo']; ?>" class="picon-zoom" rel="" title="Zersey">
						 <i class="icon-zoom-in icon-large"></i>
						</a> 
						<a href="#" class="picon-info info_click" rel="<?= $image['id']; ?>">
						 <i class="icon-info icon-large info_click" rel="<?= $image['id']; ?>"></i>
						</a>  
					  </div>
					  <ul class="meta">
					  <li><a href="#" data-reveal-id="myModal" style="color:rgb(187, 187, 187);" class="" rel="<?= $image['userId'] ?>"><i class="icon-comment"></i>0 comments</a></li>
					  <li><i class="icon-calendar"></i><?= substr($image['createdOn'], 0, strrpos($image['createdOn'], ' '));?></li>
					  </ul>
					  <h5><?php echo substr($image['description'],0,60).'...'; ?></h5> 
					 </li>
					 <?php } }?>
                </ul>	
			<input type="hidden" id="sessionIdValue" value="<?php echo $this->session->userdata('user_id'); ?>" >
			</div>
							<div class="large-offset-10 large-2 columns ">
							<input type="button" value="Back" id="backContent" style="background-color:#25c9da;color:white;border:0px;padding-top:3%;padding-bottom:4%;border-radius:3px;font-size:15px;" />
						</div>
								</div>
							</div>
						</div>
					
					<script>
						$('#myPhts').click(function(){
							$('#myContent').hide();
							$('#myPhotos').show();
						})
						$('#backContent').click(function(){
							$('#myPhotos').hide();
							$('#myContent').show();
						})
						$('#showzopim').click(function(){
							$zopim.livechat.button.hide();
						})
					</script>
				  </section>
				  
		</div>
         <!-- End Sidebar Navigation -->                                     
        </div>
		</div><!-- End Row -->
		</div>
		</div>
	<!-- End Main Content --> 
	</div>   
	<div id="fb-root"></div>
	  
<script>
$(document).foundation();
</script>  
<script type="text/javascript">
	
$(document).ready(function() {
	//$("a[rel^='prettyPhoto']").click(function() {alert ('gag') });
	
	var $filterType = $('.portfolio-main li.active a').attr('class');
	var $holder = $('ul.portfolio-content');		
	var $data = $holder.clone();
	jQuery('.portfolio-main li a').click(function(e) {
		
		$('.portfolio-main li').removeClass('active');
		var $filterType = $(this).attr('class');
		$(this).parent().addClass('active');
		
		if ($filterType == 'all') {
			var $filteredData = $data.find('li');
		} 
		else {
			var $filteredData = $data.find('li[data-type=' + $filterType + ']');
		}
		$holder.quicksand($filteredData, 
			{duration: 800,easing: 'easeInOutQuad'},
			function() {
				$("a[rel^='prettyPhoto']").prettyPhoto({theme: 'dark_square'});
				
			}		
		);
		return false;
	});
	
	$('#picture').bind('change', function() {
				$('#customerPhoto').html('');
				  if(this.files[0].size <10240){
				  $('#customerImage').html('');
				  $('#customerImage').html('<font color="red">File size is less than 10kb<font>');
				  }
				  else
				  {
				   $('#customerImage').html('');
				   $('#customerImage').html('<font color="green">selected image '+this.files[0].name+'<font>');
				  }
				});
			$('.onlyInteger').keypress(function(e){ 
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
			}
			});
		
		$('#inviting').click(function(){
			$.post(baseurl+'blog/invitefriends',function(response){
				
			facebook_connect();
			$('#friend').foundation('reveal','close');
			setTimeout(function(){
					location.reload();
				},2000);
			return false;
		});
			
		});
		
		$('.notTakeComa').keydown(function (evt) {
				 var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode == 188)
            return false;
        return true;
		});
		
		$('.chooseOne').click(function(){
			var merchantId=$(this).attr('rel');
			var reverseAuctionId=$(this).siblings('input').val();
			$('#bidMerchantId').val(merchantId);
			$('#reverseAuctionId').val(reverseAuctionId);
			$('#selectOneforBid').foundation('reveal','open');
		});
		$('#cancelSelectOne').click(function(){
			$('#selectOneforBid').foundation('reveal','close');
		});
});	
</script>
<script>

function facebook_connect()
{
		FB.init({
			appId      : '538593529573592',
			//appId      : '724335197614363',
			cookie: true,
          xfbml: true,
		  status:true
			});
		FB.login(function(response) {
			if (response.authResponse) {
			
			fb_refferal_post();
				
			}
		}, {scope:'publish_stream,offline_access,manage_pages,email'});

}
		function fb_refferal_post(){
			
			FB.ui({
			method: 'send',name: 'Zersey.com',link: 'http://zersey.com', description: 'Zersey',picture: 'http://zersey.com/assets/images/logo.png'});
			
		}
</script>
 <script type="text/javascript">
    $(document).ready(function() {
       	
	    $('#example-getting-started').multiselect();
		
    });
	
</script> 
