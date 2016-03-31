<style>
.teal {
color: #1eab9c!important;
font-family: inherit;
text-decoration: inherit;
}
.activeMenu{
font-weight:bold;
}
#mapimp img { max-width:none; }
a:hover{
	text-decoration:none;
	}
</style>
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="<?=base_url()?>new/css/bootstrap-image-gallery.css">

<script src="http://maps.google.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css" />
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="<?=base_url()?>new/js/portfolio.pack.min.js"></script>

<script type="text/javascript">
    var baseurl='<?=base_url()?>';
	var mrchntid='<?= $merchantRecord[0]["merchantId"] ?>'
</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/pages/viewMap.js"></script>
<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="<?=base_url()?>newcss/js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="<?=base_url();?>newcss/js/jquery.easing.1.3.js"></script>

<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="<?=base_url();?>newcss/js/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="<?=base_url();?>newcss/css/jquery.galleryview-3.0-dev.css" />
  <script src="<?=base_url();?>newcss/js/jquery.classybox.js"></script>
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>newcss/css/jquery.classybox.css" />
<!-- Lastly, call the galleryView() function on your unordered list(s) -->
<script type="text/javascript">
	$(function(){
		$('#myGallery').galleryView({
    filmstrip_position: 'right',
    enable_overlays: true,
	 panel_scale: 'fit',
	 frame_scale: 'fit',
	 panel_height: 700,
    overlay_position: 'top',
    panel_animation: 'crossfade'
});
	});
	
function showcontact(){
	
	 document.getElementById('phdetail').style.display = 'block';
	  document.getElementById('clickbtn').style.display = 'none';
	}
	$(function() {
        $('#dateappont').datepicker();
    });
</script>
<style>
.ui-autocomplete {
opacity: 1 !important;
top: 385px;
height: 165px;
overflow-y: scroll;
}
</style>
<!--off line appointment book-->
 <div class="modal fade" id="bookoffline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">Booking Requests </h4>
                  </div>
  
                  <div class="modal-body">
                   
                 <form id="registrationformoffline" method="post" action="" >
				  
				 
                         <div class="form-group">
                         
                            <input type="text" name="servicenamev" id="serviceNamepop" placeholder="What do you need?(i.e Hair Draiser)" class="form-control inputOrange" />
                        </div>
                        <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" style="padding-left: 0px;margin-bottom: 10px;">
                            <input type="hidden" name="username" id="userName" class="sign-form" value="<?= $merchantRecord[0]["merchantId"] ?>" autocomplete="off">
                            <input type="text" name="dateappont" id="dateappont" placeholder="Date Of Services" class="form-control inputOrange" />
                        </div><div class="col-md-6" style="padding-left: 0px; margin-bottom: 10px;
padding-right:0px">
                       
                        <input type="time"  name="apptime" id="apptime" placeholder="Time" class="form-control inputOrange" required/>
                        </div>
                        </div>
                      <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" style="padding-left: 0px;margin-bottom: 10px;">
                            
                            <input type="text" name="fullName" id="fullName" placeholder="Full Name" class="form-control inputOrange" required/>
                        </div><div class="col-md-6" style="padding-left: 0px; margin-bottom: 10px;
padding-right:0px">
                       
                        <input type="text" name="contactapp" id="contactapp" placeholder="Contact Number" class="form-control inputOrange onlyInteger"  maxlength="10"/>
                        </div>
                        </div>
                        <input type="hidden" id="merchanIdForRecommendation" value="<?php $url=$_SERVER['REQUEST_URI'];
						echo $endw = end((explode('/', $url)));?>">
                        <input type="hidden" name="tto" id="tto" value="<?= $this->usermodel->merchantEmail($endw);
						?>">
                        <div class="form-group">
                        
                            <textarea style="width:100%; min-height:150px" name="descriptionapp" id="descriptionapp"  class="form-control inputOrange" placeholder="Add the details of the work you want done here."></textarea>
                           
                        </div>
                       
				                  <div class="modal-footer">
		     <input type="submit" class="btn button btn-lg center-block" value="Send Request" name="customersubmit" id="customerSubmit" style="max-width:30%" />
		</div></form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      </div>




<!--mukesh-->
<form id="messageForm" method="post" action="<?=base_url();?>">
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="firstModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Write a message for him/her and make their day!</h3></center>
				</div>
				<!--<div class="large-12 columns text-center">
				<img src="<?=base_url();?>assets/images/modal.jpg">
				</div>-->
				<div class="large-6 columns log-in-row">
				<input type="text" name="messageName" id="messageName" placeholder="Enter your name">
				</div>
				<div class="large-6 columns log-in-row">
				<input type="text" class="onlyInteger" name="messagePhone" id="messagePhone" placeholder="Enter your phone no." maxlength="10">
				</div>
				<div class="large-12 columns log-in-row">
				<input type="text" name="messageEmail" id="messageEmail" placeholder="Enter your email">
				</div>
				<div class="large-12 columns log-in-row">
				<textarea placeholder="Enter your message" id="recommendMessage"></textarea>				
				<input type="hidden" id="merchanIdForRecommendation" value="<?php $url=$_SERVER['REQUEST_URI'];
						echo $end = end((explode('/', $url)));?>">
				</div>
				<input type="hidden" name="to" id="to" value="<?= $this->usermodel->merchantEmail($end);
						?>">
				<div class="large-4 columns log-in-row">
				<button type="submit" class="button secondary" id="messageSend">Submit</button>
				</div>
				<a class="close-reveal-modal radius-close1" id="closeRecommendation">&#215;</a>
				</div>
			</div>
		</div>
</div>
</form>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="secondModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns text-center">
				<h3>Write a recommendation for <?php if(!empty($merchantRecord[0]['salonName']))
				echo $merchantRecord[0]['salonName'];
				else
				echo 'Anonymous';?> and make their day!</h3>
				</div>
				<div class="large-12 columns text-center">
				<?php if($merchantRecord[0]['photo']){ ?>
				<img src="<?=base_url();?>assets/images/merchant/<?= $merchantRecord[0]['photo']?>" style="width:50%;height:180px !important">
				<?php }
					else
					{
				?><img src="<?=base_url();?>assets/images/merchant/usericon.jpg">
				<?php } ?>
				</div>
				<div class="large-12 columns log-in-row">
				<textarea placeholder="Recommendation" id="recommendMessage1"></textarea>				
				<input type="hidden" id="merchanIdForRecommendation" value="<?php $url=$_SERVER['REQUEST_URI'];
						echo $end = end((explode('/', $url)));?>">
				</div>
				<div class="formerror"></div>
				<div class="large-4 columns log-in-row">
				<button type="button" class="button secondary" id="recommendationSend">Submit</button>
				</div>
				<a class="close-reveal-modal radius-close1" id="closeRecommendation1">&#215;</a>
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="Wishlistadded" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Merchant Added to Your Wishlist Account </h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="Wishlistremoved" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Merchant Removed from Your Wishlist Account </h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="reviewModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Review added successfully</h3></center>
				</div>	
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="messageSendOpen" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Message Successfully Send</h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="messageSendoff" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Booking Requiest Successfully Send</h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="Wishlistalreadyadded" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Merchant Already Added to Your Wishlist Account </h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="recommendModalSuccessfully" class="reveal-modal" data-reveal>
				<div class="row">				
					<div class="large-12 columns log-in-row">
						Your recommendation has been successfully sent.
					</div>					
					<a class="close-reveal-modal radius-close1" id="">&#215;</a>
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="AddOneAppointmentModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
					<center><h3>Do you want to add more service ?</h3></center>
					<input type="hidden" id="timeinSecond">
					<input type="hidden" id="time">
				</div>
					<center>
				<div class="large-6 columns log-in-row">
					<a href="" class="button secondary" id="AddOneAppointmentModalAdd">Add</a>
				</div>
				<div class="large-6 columns log-in-row">
					<a href="" class="button secondary" id="AddOneAppointmentModalCancel">No</a>
				</div>
				</center>
				<a class="close-reveal-modal radius-close1" id="AddOneAppointmentModalhide">&#215;</a>
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
					<div id="employeeModal" class="reveal-modal" data-reveal style="z-index:999999999;top:1px;" >
									<div class="row">	
											<div class="large-12 columns">
											<center><h3><strong>Employee List</strong></h3></center>
											</div>				
									</div>	
									<div class="row">
											<img id="loading-image" src="<?=base_url();?>assets/images/ajax-loader.gif" class="modalPreloder" style="display:none">
											<div class="large-12 columns">									
												<select style="margin-left:11px;width:70%" id="SselectEmployee">
												<option value="" id='0' class="employeSelectedList">Select employee</option>
												<?php if(isset($merchantRecord[0]['merchantId']))
														{
															$employeeRecord=$this->usermodel->findEmployeeNameById($merchantRecord[0]['merchantId']);
															foreach($employeeRecord as $value1)
																{
																														?>
				<option value="<?php if(!empty($value1['photo'])) {
				echo $value1['photo'];
				}
				else{
				echo "usericon.jpg";
				}
				?>" id="<?=$value1['user_id']?>" class="employeSelectedList">
					<?php  echo $value1['name'];?>
				</option>
						<?php	}}?>
												</select>
						<img src=""  width="20%" id="picture" style="display:none;">
		
						<p><a href="#" class="button secondary" id="selectEmployee" rel="2" lang="60" style="float:right;margin:10px 20px 0 0">Select</a></p>
												<div style="color:red;display:none;padding-left:10px" id="noSelectEmploee">Please select employee</div>
												<input type="hidden" value="" id="serviceSelected">
											</div>	
											<div class="large-12 columns">
											<!--<button type="button" name="bestSearch" id="bestSearch" class="button secondary log-in-row right">Submit</button>-->
											</div>	
									</div>
									<a class="close-reveal-modal radius-close" id="closeEmployeeModal"><div class="text-center">&#215;</div></a>
					</div>
		</div>
</div>
							
<!--mukesh-->
<!--Book an Appoinment-->
<div class="row">
	<div class="large-8 medium-12 small-12 columns">
		<div id="successAppointModal" class="reveal-modal" data-reveal style="z-index:999999999;top:1px;display:none" >
           <div class="bubble note" style="width:550px; top:0;">
             <div style="text-align:center; color: #454545; text-align:center; font-size: 28px; ">Your appointment is booked! </div>
             <div style="font-size: 16px;color:#898989; margin: 35px 0;">Your credit card will be charged<span class="SuccessSTYPrice" style="color:#898989;"></span> at the time of your appointment.</div>
             <div style="font-size: 16px;color:#898989; margin: 35px 0 25px ;">Tell your friends about Zersy!</div>
             <div style="height: 70px; text-align: center; margin-top:15px">
				<!--http://www.facebook.com/sharer.php?u=https%3A//www.styleseat.com/meghandoyle%3Futm_source%3DFacebookShare%26utm_medium%3DSocial%26utm_content%3DFBS_meghandoyle%26utm_campaign%3DFBS_Booked_Email&amp;t=Special Promotion! Book today!&amp;src=sp+++//d149ro5wtvak1z.cloudfront.net/static/new/images/share_fb.ef8fe859.png-->
				<!--http://twitter.com/?status=I%20just%20booked%20an%20appointment%20with%20Meghan%20Doyle%20at%20Salon%20V%21%20http%3A//stylese.at/ND1Vo4%3Fcpn%3Dftsc+++//d2nibjxagc37ko.cloudfront.net/static/new/images/share_tw.8105b277.png-->
                <!--<a target="_blank" href="" class="it01"><img height="42" width="122" src="d149ro5wtvak1z.cloudfront.net/static/new/images/share_fb.ef8fe859.png"></a>
                <div style="vertical-align: top; padding-left: 5px; padding-right: 5px; text-align: center;" class="inlineblock"> </div>
                <a target="_blank" href=""><img width="121" height="42" style="vertical-align: top" src="d2nibjxagc37ko.cloudfront.net/static/new/images/share_tw.8105b277.png" alt="Share on Twitter"></a>-->
             </div>
           </div>
		   <a class="close-reveal-modal radius-close close" id="closeEmployeeModal"><div class="text-center">&#215;</div></a>
        </div>
	</div>
</div>	
<!--Appointment Modal-->
<!--Login & SignUp-->
<div class="row">
<div class="large-4 medium-12 small-12 columns large-offset-4">
<div id="SignupOrLoginModal" class="reveal-modal" data-reveal style="z-index:999999999;top:1px;display:none">
    <div id="signupContainer" class="ClickToggleTarget">        
                <h1 style="margin-bottom:17px;color: #676767;">Sign up <span style="font-weight:normal;font-size:.6em;">or <span class="link teal" id="logInAppointment">log in</span></span></h1>
         
				<div class="row">
				<div class="stripBackground">
				<div class="large-12 columns">
				<h3 class="text-center stripSignUp"><strong>Sign Up For Zersey</strong></h3>
				</div>
				</div>
				</div>
				<form id="registrationForm" method="post" action="<?=base_url();?>auth/register">
				<div class="row">
				<div class="large-12  columns">
				<p class="text-center"><strong>Or sign up using your email</strong></p>
				</div>
				<div class="large-12  columns">
				<input type="image" class="post_image" src="<?=base_url();?>assets/images/facebook.png" onclick="fblogin()" alt="post title" class="signUpicon img-responsive">
				 <p>Recommended, And we will never post anything without your permission.</p>
				</div>
				<div class="large-12 columns">
				<input type="text" placeholder="First Name" name="username" id="firstName" class="sign-form">
				</div>
				<div class="large-12 columns">
				<input type="text" placeholder="Last Name" name="lastName" id="lastName" class="sign-form">
				</div>
				<div class="large-12 columns">
				<input type="text" placeholder="Email" name="email" id="email" class="sign-form">
				</div>
				<div class="large-12 columns">
				<input type="password" placeholder="Password" name="password" id="password" class="sign-form">
				<input type="hidden" name="facebookId" id="facebookId" class="sign-form">
				</div>
				<div class="large-12 columns">
				<p>By signing up you confirm that you accept the <a href="#">Terms Of Service</a> and <a href="#">Privacy Policy</a>.</p>
				</div>
				<div class="row">
				<div class="large-6 medium-6 columns">
				<button class="button customerDiv widthButton" type="submit" name="customer">I AM CUSTOMER</a>
				</div>
				<div class="large-6 medium-6 columns">
				<button class="button professionalDiv widthButton" type="submit" name="professional">I AM PROFESSIONAL</a>
				</div>
				</div>
				<div class="large-12 columns">
				<p>Already have an account?<span style="font-size:16px"> <a id="loginInPage">Log in!</a></span></p>
				</div>
				<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
				</div>
				</form>
	</div>
	<div id="loginContainer" class="ClickToggleTarget" style="display: none;">
       
        <h1 style="margin-bottom:17px;color: #676767;">Login<span style="font-weight:normal;font-size:.6em;"> or <span class="link teal" id="signUpAppointment">sign up</span></span></h1>
				<div class="row">
				<div class="stripBackground">
				<div class="large-12 columns">
				<h3 class="text-center stripSignUp"><strong>Login For Zersey</strong></h3>
				</div>
				</div>
				</div>	
				<div class="row">
				<div class="large-12  columns">
				
				<input type="image" src="<?=base_url();?>assets/images/facebook.png" alt="Submit" class="signUpicon img-responsive">
				</div>
				<div class="large-12  columns">
				<p>Recommended, And we will never post anything without your permission.</p>
				</div>
				<!--<div class="large-12 columns">
				<input type="image" src="<?=base_url();?>assets/images/googleicon.png" alt="Submit" class="signUpicon img-responsive alternativeDiv">
				</div>-->
				<form method="post" id="formLogin" action="<?=base_url();?>auth/login">
				<div class="large-12 columns">
				<input type="text" placeholder="Email" name="login" class="sign-form">
				</div>
				<div class="large-12 columns">
				<input type="password" placeholder="Password" name="password" class="sign-form">
				</div>	
				<div class="large-12 columns">
				<button type="submit" name="submitLogin" class="button secondary">Login</button>
				</div>		
				<div class="large-12 columns">
				<p>Already have an account? <span style="font-size:16px"><a id="registerPage">Log in!</a></span></p>
				</div>
				</form>
	</div>
</div>
<a class="close-reveal-modal radius-close closeModal"><div class="text-center">&#215;</div></a>
</div>
</div></div>
<div class="main-content-top">
	<div class="main-wrapper">	
		<div class="row">
			<?php 
					if(!empty($merchantRecord))
					{  
						$resultz=$this->usermodel->findRating($merchantRecord[0]['merchantId']);
				//echo $this->db->last_query();
				?>
			<div class="large-3 columns">
			<div class="round-frame">
			<img src="<?=base_url();?>assets/images/merchant/<?php if(!empty($merchantRecord[0]['photo']))
					{ 
						echo $merchantRecord[0]['photo']; 
					}
					else
					{ 

						echo 'usericon.jpg'; 
					} ?>" style="width:100%">
                    <?php if($merchantRecord[0]['merchantId']==$this->session->userdata['user_id']){?>
                <a id="editphoto" class="button"><i class="fa fa-edit"></i>&nbsp;Change Image</a><br><?php }?>
			<a class="button" id="recommend" style="font-size: 15px;font-weight:500; border-radius:4px"><span class=" icon-lightbulb"></span>Recommend</a>&nbsp;
			<!--<a href="#" class="small button"><span class=" icon-lightbulb"></span><?= $this->usermodel->getRecomdationById(end((explode('/', $url)))); ?></a>-->
			<a href="#" class="button" title="Rating=<?=($resultz)?$resultz:0?>" style="border-radius:4px"><div style="font-size: 17px;font-weight:600;border-radius:4px"><?php echo ($resultz)?$resultz:0;?></div></a>
			<input type="hidden" id="getMerchant" value="">
			<input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); }?>">
			<div class="clearfix icon"></div>
			<?php if($this->session->userdata('user_level')!='2') { ?>
			<div class="left">
			<div class="grid_4 your-rating rating-widget ratings-wrapper  rating-widget-res_112288" data-res_id="112288" data-rating-for="restaurant" data-review_id="">
				<div class="rating-top">
					<div class="grey-text ttupper bold left">Your Rating</div>
					<div class="rating-widget-num right hidden" id="ratingValue0" data-original-rating-num="-" style="visibility:visible">
					</div>
				</div>
				<div class="rating-widget-stars left">
                <div class="rating-cls user_starssel_0" id="user_starssel_0" data-originalclass="user_starssel_0" data-rating="0">
				<a id="rating01" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="1.0" data-original-title="1.0" class="completeRating">&nbsp;</a>
				<a id="rating02" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="1.5" data-original-title="1.5" class="completeRating">&nbsp;</a>
				<a id="rating03" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="2.0" data-original-title="2.0" class="completeRating">&nbsp;</a>
				<a id="rating04" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="2.5" data-original-title="2.5" class="completeRating">&nbsp;</a>
				<a id="rating05" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="3.0" data-original-title="3.0" class="completeRating">&nbsp;</a>
				<a id="rating06" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="3.5" data-original-title="3.5" class="completeRating">&nbsp;</a>
				<a id="rating07" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="4.0" data-original-title="4.0" class="completeRating">&nbsp;</a>
				<a id="rating08" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="4.5" data-original-title="4.5" class="completeRating">&nbsp;</a>
				<a id="rating09" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="5.0" data-original-title="5.0" class="completeRating">&nbsp;</a>
                </div>
                </div>
			</div>			
			</div>
			<?php } ?>
            <div id="myModaledit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           <form action="<?=base_url();?>users/updateedit" method="post">
            <div class="modal-header">
              
                <h4 class="modal-title" style="color: #222222;">Edit Detail</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
            <label for="username">Salon Name</label>
            <input type="text" id="salonname" name="salonname" class="sign-form" value="<?=$merchantRecord[0]['salonName'];?>">
            </div>
            <div class="form-group">
            <label for="username">About Me</label>
                <textarea style="color: #222222; height:100px!important" id="about" name="about" class="sign-form"><?=$merchantRecord[0]['description']?></textarea>
                <input type="hidden" value="<?php echo $merchantRecord[0]['merchantId'];?>" id="id" name="id"/>
                </div>
                <div class="form-group">
            <label for="username">Address 1</label>
            <input type="text" id="contactinfo" name="contactinfo" class="sign-form" value="<?=$merchantRecord[0]['information'];?>">
            </div>
            <div class="form-group">
            <label for="username">Address 2</label>
            <input type="text" id="contactinfo2" name="contactinfo2" class="sign-form" value="<?=$merchantRecord[0]['address'];?>">
            </div>
            <div class="form-group">
            <label for="username">Contact No</label>
            <input type="text" id="contactno" name="contactno" class="sign-form" value="<?=$merchantRecord[0]['phone'];?>">
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="width:49%; float:left">Close</button>
                <button type="submit" class="btn btn-primary" style="width:49%">Save changes</button>
            </div>
        </div></form>
    </div>
</div>

<div id="myModalpic" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           <form role="form" id="userprofile" method="post" action="<?=base_url();?>users/updatephoto" enctype="multipart/form-data">
                  <div class="modal-header">
              
                <h4 class="modal-title" style="color: #222222;">Change Image</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
           <label for="username">Profile Image</label>
           <input class="form-control" type="file" name="profile_image" value="" id="profileimage" />
                <input type="hidden" value="<?php echo $merchantRecord[0]['merchantId'];?>" id="id" name="id"/>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="width:49%; float:left">Close</button>
                <button type="submit" class="btn btn-primary" style="width:49%">Save changes</button>
            </div>
        </div></form>
    </div>
</div>
			<!--<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>Rating-->
			<div class="clearfix icon"></div>
			<P><div id="priceRating" style="width:80%;">Price : <?php if($merchantRecord[0]['priceCheck']=='L') {?>
			<img src="<?= base_url();?>assets/images/low.png">
			<?php } elseif($merchantRecord[0]['priceCheck']=='M') { ?>
			<img src="<?= base_url();?>assets/images/medium.png">
			<?php } else { ?>
			<img src="<?= base_url();?>assets/images/high.png">
			<?php } ?></div>
			<br>
			Reviews : <?php $resultRev=$this->usermodel->findreviewcount($end);echo ($resultRev);
			
			 ?>
			</P>
			<?php if($this->session->userdata('user_level')!='2') {	?>
			<a class="small button" id="wishList" <?php if(!empty($wishList)){echo 'style="display:none"';} ?>><span class=" icon-lightbulb"></span>Add to Wishlist</a>&nbsp;			
			<a class="small button" id="remWishList" <?php if(empty($wishList)){echo 'style="display:none"';} ?>><span class=" icon-lightbulb"></span>Remove from Wishlist</a>&nbsp;
			<?php	} ?>
			</div>
			</div>        
			<div class="large-5 columns"><table width="100%" style="border: none;margin-bottom: 0em;"><tr><td>
				<h2><?=$merchantRecord[0]['salonName']?></h2></td>
                <td><?php if($merchantRecord[0]['merchantId']==$this->session->userdata['user_id']){?>
                <a style="float:right !important" id="editabout" class="button"><i class="fa fa-edit"></i>&nbsp;Edit</a><?php }?></td>
                </tr></table>
				<P><?=$merchantRecord[0]['description']?></P>
				<a id="recommendation" class="button radius recommendation"><i class="icon-envelope" ></i>Message Me</a>
				<p class="custom-information">View Contact Info</p>
				<p><b><?=$merchantRecord[0]['salonName'];?></b> - <?=$merchantRecord[0]['information'];?><?=$merchantRecord[0]['address'];?></p>
				<?php if($this->session->userdata('user_level')==1 || $this->session->userdata('user_level')==2 || $this->session->userdata('user_level')==3) { ?>
					<?php } else { 
                     
					if(!$merchantRecord[0]['onlineBooking']){
					?>
                    
					<a href="#" class="button right" onClick="bookoff();">Book Me</a>
					<?php }
					else{?>
					<a class="button right" href="#bokbtngo">Book Me</a>
						<?php }} ?>
				
				
                	
				
                
			<div id="clickbtn">	<a class="button left" style="font-size: 15px;font-weight:500; border-radius:4px;" onClick="showcontact();"><span class=" icon-phone"></span>Click To View Contact Detail</a></div>
				<div id="phdetail" hidden="" style="font-size: 15px;font-weight:bold;" ><?php echo $merchantRecord[0]['phone']; ?></div>
              
                
                </div>
			<?php } ?>
			<div class="large-4 columns">

				<div><!--<iframe src="http://www.facebook.com/plugins/like.php?app_id=527890870664757&amp;href=http://zersey.com/<?php echo $_SERVER['REQUEST_URI'];?>/&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35" scrolling="no" frameborder="0" style="border:none;overflow:hidden; height:35px; float:left" allowTransparency="true"></iframe></p><p style="float:right">
				<a href="https://www.facebook.com/sharer/sharer.php?u=http://zersey.com/<?php echo $_SERVER['REQUEST_URI'];?>" class="small button social-icon-facebook right" class="small button social-icon-facebook"><i class="icon-share"></i>Share</a></p>--><div class="fb-like" data-href="https://www.facebook.com/zerseyindia" data-width="300" data-layout="standard" data-action="like" data-show-faces="false" data-share="true" style="border:none; height:45px; float:left"></div>
                
                
			 <div class="button" style="width:100%; padding:0px; ">
              <div class="button"  style="width:100%; margin:0px; cursor:default">
              <span class="glyphicon glyphicon-time"></span> Mon to Sun - <?php $date=substr($merchantRecord[0]['mon'],0,5);
				if($date>='12:00'){		
				$date=date("g:i", strtotime($date));
				echo $date." PM";}
				else			
				echo $date.' AM';?> to <?php $asd=str_replace(' ', '', $merchantRecord[0]['mon']); $date=substr($asd,6,5);
				if($date>='12:00'){		
				$date=date("g:i", strtotime($date));
				echo $date." PM";}
				else			
				echo $date.' AM';?>
              </div><?php if($merchantRecord[0]['sun']){?> <div class="button"  style="width:100%; margin:0px;background-color:#999; cursor:default">
              <?php
			  $bedroom_array = explode(",",$merchantRecord[0]['sun']);
$last = array_pop($bedroom_array);
$string = count($bedroom_array) ? implode(", ", $bedroom_array) . " & " . $last : $last;
			    echo $string; ?> Closed
              </div><?php }?></div>
             
				  <div class="large-4"  id="widget" style="width:100%">         
          <h4>Map</h4>                 
            <!-- Sidebar Navigation -->      
            <div class="section-container level accordion" style="width:100%">        
              <section class="section active" style="padding: 5%;">

	
		<!--<div id="test2" class="gmap3" style="width:257px;height:285px"></div>-->
		<div id="map_canvas" style="width:100%;height:300px"></div>
				<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28005.86074612837!2d77.09795154999999!3d28.667724399999972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04709a55ca61%3A0x733c78dcf34281ce!2sPaschim+Vihar!5e0!3m2!1sen!2sin!4v1397556382610" width="100%" height="250" frameborder="0" style="border:0"></iframe>-->				
	
	</div>
            <!-- End Sidebar Navigation -->                                     
        </div>
			
			 
				
				
				
				
			</div>  
		</div>
	</div>		
	</div>
	<!-- End Main Content Top -->
	<div class="main-wrapper">
		<div class="row">
				<div class="large-12 columns">
					<div class="title-block">					
						<h5>Slideshow</h5>
						<div class="divider"><span></span></div>
						<div class="clearfix"></div>			
					</div>
					<div class="partners-block">
						<div id="licnks"  style="width: 100%; max-height: 250px; overflow-x: scroll; overflow-y: hidden; white-space: nowrap;">
							<?php 
							$str=explode('/', $_SERVER['REQUEST_URI']);
							$id=end($str);
				$result=$this->usermodel->getOnlyMerchantImage($id); 
							if(!empty($result))
							{
							foreach($result as $image) { 
							if($image['photo']) {
							?>
					<?php /*?>		<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img class="photo test" src="<?=base_url();?>assets/images/merchant/<?= $image['photo']; ?>" alt="Premises" alt="Envato" style="width:250px;height:180px; border-radius:10px" /></li>
							<?php } else {  ?>
							<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4"><img class="photo test" src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="Home Energy" alt="Envato" style="width:250px;height:180px;border-radius:10px" /></li>
							
						</ul>
					
                    	<?php */?>
                        
                  
                  <a href="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photo']; ?>" title="" data-gallery=""><img class="" src="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" style="width:150px!important; height:180px; border-radius:10px"></a>
                     
                 <?php } } } else { echo "No Preview Available";}?>         </div> 
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
				
					</div>
				</div>
			</div>
	<div class="row main-content">
	
    <div class="large-12 columns">
               
      <div class="row"><!-- Row -->
        <div class="large-12 columns widgets side-widgets" id="bokbtngo">         
			<ul class="breadcrumbs custom-margin">
						<li><a href="#" class="activeMenu" id="serviceidShow">Services</a></li>
						<li><a id="lookbook">LookBook</a></li>
						<li><a href="#" id="reviewidShow">Reviews</a></li>
						<li><a href="#" id="showMap">Map</a></li>
                        <li><a href="#" id="ratecrd">Ratecard</a></li>
			</ul>
			<!--Show Map-->
			<!--<div id="MyMap" style="display:none"> -->  
			<!--<div id="test3" class="" style="width:100% !important;"></div> -->
            <div id="mpshw" style="display:none;">
            <div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"> 
					</div>
  <div style="float: left;"><div id="mapimp" style="width:700px; height:320px"></div></div>
  <div style="float: right; text-align:left;width: 30%;">
    <h3>Calculate your route</h3>
    <form id="calculate-route" name="calculate-route" action="#" method="get">
      <input type="text" id="from" name="from" required placeholder="An address" size="30"  style="display:none"/>
      <br />
 
      <label for="to">Your Location:</label>
      <input type="text" id="tomps" name="to" required placeholder="Another address" size="30" onFocus="geolocate()"/>
      <label >Or</label>
      <a id="to-link" href="#">
      Get your current location</a>
      <br />
 <br />
      <input type="submit" value="Get Direction"/>
    </form>
    </div></div><div class="row" id="direc" style="display:none">
    <div id="directions-panel" style=" margin-top:38%;"></div></div>
			
					<!--<div class="row">                        
							<div class="large-12 columns">
       				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3500.382785541416!2d77.10583700000004!3d28.67819399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d038baec8af3f%3A0xde24b35c2749752d!2sMultan+Nagar!5e0!3m2!1sen!2sin!4v1397730993109" width="100%" height="450" frameborder="0" style="border:0"></iframe>
     				</div>
     				</div>
					 <div class="large-12 columns">
					   <br>
						<p class="default-color">GET DIRECTIONS & MORE<p>
						</div>
					 <div class="large-12 columns">
						 <div class="large-1 columns">
						 <p>Start</p>
						 </div>
						 <div class="large-7 columns left">
						 <input type="text">
						 </div>
					</div>
					<div class="large-12 columns">
						 <div class="large-1 columns">
						 <p>End</p>
						 </div>
						 <div class="large-7 columns left">
						 <input type="text">
						 </div>
						 <div class="large-3 columns left">
						 <a href="#" class="small button alert ft">Go</a>
						 </div>
					</div>-->
				<!--</div>-->
			
			<!--End Show Map -->
			<!--Review-->
	<div id="reviewShow" style="display:none">
		<div class="section-container accordion" data-section>        
				<div class="row">                        
							
     			</div>
			</div>
			<div class="row">
			<div class="large-12 columns">
			<h4><?php $results=$this->usermodel->findreview($end);echo count($results); ?> Reviews Found.</h4>
			<div class="reviewBox">
			
			<?php
					if(!empty($results))
					{
						foreach($results as $value)
						{
					?>
					<div class="row">		
							<div class="large-2 medium-2 small-2 columns">
						<?php
							$pt=$this->usermodel->findCustomerPhotoById($value['userId']);
							if(!empty($pt[0]['photo']))
							{
						?> <a href="<?=base_url();?>userprofile/<?=$value['userId']?>">
							<img src="<?=base_url()?>assets/images/merchant/<?php echo $pt[0]['photo']; ?>" class="img-radius">
						<?php }else{ ?>
							<img src="<?=base_url()?>assets/images/merchant/usericon.jpg" class="img-radius">
						<?php } ?></a>
							<p><?php
								$date=date('Y-m-d');
								$datetime1 = date_create($date);
								$datetime2 = date_create($value['createdOn']);
								$interval = date_diff($datetime1, $datetime2);
								echo $interval->format('%a days');
								?>
							</p>	
							</div>
							<div class="large-10 medium-10 small-10 columns">
							<a href="<?=base_url();?>userprofile/<?=$value['userId']?>">
                            <p><span class="offerTxt"><?php $nm=$this->usermodel->findCustomerNameById($value['userId']);echo $nm[0]['fullname']; ?></span></p></a>	
							<p><?= $value['review'];?></p>
							</div>
					</div>
					<?php } } ?>
			
			<hr>
					<?php if($this->session->userdata('user_level')==1 || $this->session->userdata('user_level')==2 || $this->session->userdata('user_level')==3) { ?>
					<?php } else { ?>
					<div class="row">
						<div class="large-2 medium-2 small-2 columns">
						
						</div>
						<div class="large-12 medium-12 small-12 columns">
							<form name="review-form" id="review-form" action="#" method="post">							
							<input type="hidden" name="merchantReviewId" id="merchantReviewId" value="<?= $end ?>">
							<input type="text" placeholder="Comment" style="float:left; width:89%" id="commentText" name="commentText" class="comment-box">
							<input type="submit" class="button right" value=" Review " style="width:10%;margin-top: 5px;
height: 45px;">							
							</form>
						</div>
					</div>
					<?php } ?>
			</div>
			</div>					
			</div>		
			
	</div>
			<!--review-->
			
			<!--Appointment-->
<img id="appontmentPreloder" src="<?=base_url();?>assets/images/ajax-loader.gif" style="display:none" class="imageLoder">
<div id="appointmentCalendar" style="display:none">
<input type="hidden" id="startDate" value="4/25/2014"/>
<input type="hidden" id="endDate" value="4/25/2014"/>
<input type="hidden" id="firstTime" value=""/>
<input type="hidden" id="merChantId" value="<?php if(isset($merchantRecord[0]['merchantId'])){ 
echo $merchantRecord[0]['merchantId']; }?>"/>

	<div id="appointmentFormHolder" class="holder hide" style="left: 5px; top:55px; width:98%; height: 490px; z-index:9;">
        
            <form method="POST" id="appointmentForm" action="" class="full">
			<input type="hidden" id="bookServiceId" name="bookServiceId" value="">
			<input type="hidden" id="bookAppointmentDate" name="bookAppointmentDate" value="">
			<input type="hidden" id="bookAppointTime" name="bookAppointTime" value="">
			<input type="hidden" id="bookMerchantId" name="bookMerchantId" value="">
			<input type="hidden" id="bookEmpId" name="bookEmpId" value="">
            <ul class="full">
                <li class="conf_msg full" style="margin-bottom: 0;">
                    <div class="nudgeLeft" style="margin-top:0.4em;font-size:16px;padding:0.5em 1.5em;width:92%;line-height: 1.6em;text-align: center;">
                        Service:<span id="msg_service" class="readable"></span>
                        <br>
                        When: <span class="inlineblock"><span id="msg_date"></span> at <span id="msg_time"></span>
                        <span class="close teal" style="color:#1eab9c; cursor: pointer; font-size:.8em;">change</span>
                        </span>
                        <select class="hide" name="start_time" id="start_time"><option value="15:15">03:15</option></select><br>
                        Service Price: <span id="id_concierge_cost_msg"></span><br>
                        
                    </div>
                </li>
                
                    <!--<li class="conf_msg full" style="margin-bottom: 0.4em;">
                        <div class="nudgeLeft" style="text-align:center; padding: 1em 0 0 1.5em; color: #333333;">
                            Is this your first time visiting Meghan Doyle?
                            <input type="radio" name="attribution_new_client_answer" value="1" style="margin-left:1em;">&nbsp;Yes
                            <input type="radio" name="attribution_new_client_answer" value="2" style="margin-left:1em;">&nbsp;No
                            <input type="radio" name="attribution_new_client_answer" value="3" checked="checked" style="display: none;">
                        </div>
                    </li>-->
                
                <li class="full finalStep" style="margin-top:15px;">
                <label style="color: #898989;font-size: 14px;cursor:auto;margin-left:8%; " class="isToYouFalse">Have a message for <?=$merchantRecord[0]['salonName']?>?
                    <br>
                </label>
                <label style="color: rgb(137, 137, 137); font-size: 14px; display: none;" class="isToYouTrue">Please give us your address so I can come to you!</label>
                <textarea name="client_note" id="client_note" class="clear" style="width:87%; height:70px; margin-top:.5em;border:1px solid #888;margin-left:8%; "></textarea>
                </li>
                <li style="margin:15px; float:none; font-size:14px; color:rgb(137,137,137);" class="finalStep finalStep2">
                    <div class=" isToYouTrue" style="color: rgb(137, 137, 137); display: none;">
                    Promotion code <input style="padding:7px; margin-left:15px;" type="text" name="referral_code" value="">
                    </div>
                </li>
                
                <li class="full center">
                    <input type="button" id="bookAnAppoint" value="Book it!" class="tealButton" name="submit" style="background-color: #D8F0F0;cursor:pointer;font-size:18px;width:12%;margin-left:40%">
                </li>
            </ul>
        </form>
    </div>
	
			
<div id="appointment" class="schedule" style="">
<h3><div class="left" style="margin-right:4px">Book an appointment with </div><div id="withMeet"></div></h3>
<div style="margin-top:5px; margin-left:15px;">
      <form id="filterForm" action="#" onsubmit="return false;">
            <ul class="filter" style="padding: 0px; margin: 0px;">
                <li style="float: left; padding: 0; margin: 0;">
                    <div style="position:relative;">
					<input id="appointmentDate" name="appointmentDate" class="appointmentDate" type="text" style="font-size: 17.5px; padding: 0.1em 0.25em 0em; z-index:0;" value=""><img src="<?=base_url()?>assets/images/img/calendar.png" title="Open calendar" class="inputExtension" style="position: absolute;right:4px;top:4px;"></div>
                </li>
                <li id="select_two_container">
                    
                    <select id="appointmentServiceSelect" class="hide" name="appointmentServiceSelect" style="margin-top:0; font-size:1.2em; height:2em; padding:0.3em; max-width:25em;">
                        
                    </select>

            <div class="hide" id="dropdown_icon"><div class="inlineblock ClickToggleTarget addServicesSprite" style="vertical-align:text-top"></div></div>
            <div class="hide" id="dropdown_icon_multi"><div class="inlineblock ClickToggleTarget plusImage"></div></div>
            <div class="inlineblock ClickToggleContainer BookingMenu middle" style="font-size:1.5em"> Booking: <div class="inlineblock ClickToggle" style="background-color:white; border:1px solid #ccc; max-width:25em; font-size: 17.5px; min-width: 0; padding: 0.1em 0.25em 0em;" id="select_multiple_two_open"><div class="inlineblock middle" id="service_name" style="font-size:.8em;">Consultation (15 minutes)</div> <div class="inlineblock ClickToggleTarget addServicesSprite" style="vertical-align:text-top"></div></div></div>

            <div style="display: none;" id="select_multiple_two_options" class="select_multiple_container">
                <div class="select_multiple_header select_multiple_two_close">CHOOSE THE SERVICES YOU WANT TO BOOK</div>
                <div style="max-height:200px; overflow-x:hidden; overflow-y:scroll; height:200px; background-color:white;">
                    <table cellspacing="0" cellpadding="0" class="select_multiple_table" width="100%">
                            <tbody>
							<?php 
							if(!empty($services))
							{ 	
								foreach($services as $value)
								{	
									$resulta=$this->usermodel->findNameBusiness($value['businessCategory']);
							?>
									<tr><td colspan="2" class="service_group" style="padding:6px;"><?php echo $resulta;?></td></tr>
									<?php $findServices=$this->usermodel->findServiceByCategoryId($value['businessCategory'],$value['merchantId']);
									if(!empty($findServices))
									{
										foreach($findServices as $values)
										{
									?>	
								<tr>
									<td class="select_multiple_name "><?php echo $values['serviceName'].'('.$values['duration'].'mins)';?></td>
									<td class="select_multiple_checkbox"><input type="checkbox" id="<?=$values['id']?>" name="service_selector" class="service_selector" value="630789" rel="<?=$values['duration']?>" lang="15-0-0"> </td>
								</tr>
								
							<?php	
										}
									}	
								}
							}	
							?>
                            <!--<tr class="even">
                                <td class="select_multiple_name "></td>
                                <td class="select_multiple_checkbox"><input type="checkbox" id="service_" name="service_selector" class="service_selector" value="630789" lang="15-0-0"> </td>
                            </tr>
                            <tr class="odd">
                                <td class="select_multiple_name ">Single Process Retouch (30 mins)</td>
                                <td class="select_multiple_checkbox"><input type="checkbox" name="service_selector" class="service_selector" value="344089" lang="30-0-0"> </td>
                            </tr>
                            <tr class="even">
                                <td class="select_multiple_name ">Temporary Color/Chalk (30 mins)</td>
                                <td class="select_multiple_checkbox"><input class="service_selector" type="checkbox" name="service_selector" value="1117219" lang="30-0-0"> </td>
                            </tr>
                            <tr class="odd">
                                <td class="select_multiple_name ">Fringe Trim (15 mins)</td>
                                <td class="select_multiple_checkbox"><input class="service_selector" type="checkbox" name="service_selector" value="344090" lang="15-0-0"> </td>
                            </tr>-->
                           
                    </tbody></table>
                  </div>
                <div class="select_multiple_submit"><input type="button" value="Done" class="select_multiple_two_close" style="width:100%;"></div>
            </div>

            <div id="id_voucher_service_name" class="hide inlineblock middle" style="display: none;">
                Booking: <div id="id_service" class="inlineblock"></div>
            </div>
        </li>
        <li id="cta" class="clear" style="display: none;">
             <span class="upper">Pick a time that works for you below</span>
        </li>
      </ul>
     </form>
    </div>
	<div class="completeClass" id="completeTime">0:00-0:00</div>
	</div>
<div class="action" id="appointmentAction" style="width:96%;height:100%;position:absolute;top:163px;">
            <ul class="days clear">
                <li>
                    <span id="scrollDaysUp" class="scroll up link"><span class="sprite upArrow"></span></span>
                </li>
                <li>
                    <ol class="daysOL">
						<li><span><?php echo date("D M j");?></span></li>
						<li><span><?php echo date('D M j');?></span></li>
						<li><span>Fri 04/25</span></li>
						<li><span>Sat 04/26</span></li>
						<li><span>Sun 04/27</span></li>
						<li><span>Mon 04/28</span></li>
						<li><span>Tue 04/29</span></li>
					</ol>
                </li>
                <li>
                    <span id="scrollDaysDown" class="scroll down link"><span class="sprite downArrow"></span></span>
                </li>
            </ul>
            <ul class="hours">
                <li>
					<input type="hidden" id="finalTime">
                    <table class="grid" style="width: 81%;" id="dateChange">
									<thead>
										<tr>
											<th colspan="4">8a</th>
                      <th colspan="4">9</th>
                      <th colspan="4">10</th>
                      <th colspan="4">11</th>
                      <th colspan="4">12p</th>
                      <th colspan="4">1</th>
                      <th colspan="4">2</th>
                      <th colspan="4">3</th>
                      <th colspan="4">4</th>
                      <th colspan="4">5</th>
                      <th colspan="4">6</th>
                      <th colspan="4">7</th>
                      <th colspan="4">8</th>
                      <th colspan="4">9</th>
										</tr>
									</thead>
									<tbody>
										<?php $days=0;
											for($i=1; $i<=14; $i++){
												if($i%2!=0){ ?>
													<tr class="gridRow padding" id="<?php echo $i; ?>">
													<?php for($a=0; $a<56; $a++){?>
														<td>&nbsp;</td>
													<?php } ?>
													</tr>
												<?php }else{ 
													if($_POST){
														if($_POST['option']=='scrollDaysUp'){
															$date = (strtotime($_POST['date'])-(60*60*24));
															$day = $date-((6-$days)* 24 * 60 * 60);														
														}else if($_POST['option']=='Calendar'){
															$date = strtotime($_POST['date']);
															$day = $date+($days* 24 * 60 * 60);	
														} 
														else
														{
															$date = strtotime($_POST['date'])+(60*60*24);
															$day = $date+($days* 24 * 60 * 60);
														}
														
													}else{
														$date = strtotime(date('Y-m-d'));
														$day = $date+($days* 24 * 60 * 60);
														
													}	
													$currentTime = strtotime(date('Y-m-d H:i:s'));
												?>
													<tr lang="0" class="gridRow data" id="<?php echo $day; ?>">
													<?php $time = 7; 
													for($td=0; $td<56; $td++){
														if($td%4==0){ $time++; ?>
															<td class="t00 <?php if(($day+($time*60*60))<$currentTime){	echo 'past'; }else{ echo 'available';}?>" id="<?= $day+($time*60*60)?>" title="<?=$time?>:00"></td>
														<?php }else if($td%4==1){ ?>
															<td class="t15 <?php if(($day+($time*60*60)+(15*60))<$currentTime){	echo 'past'; }else{ echo 'available';}?>" id="<?= $day+($time*60*60)+(15*60)?>" title="<?=$time?>:15"></td>
														<?php }else if($td%4==2){ ?>
															<td class="t30 <?php if(($day+($time*60*60)+(30*60))<$currentTime){	echo 'past'; }else{ echo 'available';}?>" id="<?= $day+($time*60*60)+(30*60)?>" title="<?=$time?>:30"></td>
														<?php }else{ ?>
															<td class="t45 <?php if(($day+($time*60*60)+(45*60))<$currentTime){	echo 'past'; }else{ echo 'available';}?>" id="<?= $day+($time*60*60)+(45*60)?>" title="<?=$time?>:45"></td>
														<?php }
													}?>
													</tr>
												<?php $days++; }
											}
										?>
									</tbody>
								</table>
                </li>
            </ul>
          <div class="right" style="padding-right:34px">
            <span class="left available timeBlock"></span><div class="left nudgeRight" style="margin: .25em; color:#333;"> = available to book online</div>
             <span class="left nudgeLeft timeBlock mustCallToBook done"></span><div class="left nudgeRight" style="margin: .25em; color:#333;"> =  Already booked</div>
          </div>
          <div class="footer clear">
            <!-- <span class="link">skip to the next available appt</span> |  --><span class="link waitListLink">add yourself to the wait list</span>
          </div>
          </div>
			</div>	
			<!--/Appointment>	
				
            <!-- Sidebar Navigation -->      
					<div class="section-container" id="bookSection" data-section style=""> 
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"> 
					</div>
					<?php  //	echo'<pre>';
							//  print_r($services);
						if(!empty($services))
						{  foreach($services as $value)
							{
					?>
					<div class="section-container level accordion" data-section="" data-section-resized="true" 
					style="min-height:0px;background:#f9f9f9; padding-left:1%; border:solid 1px #CCCCCC; border-radius:4px;margin: auto; width:90%;margin-bottom: 5px !important;">
					<div class="book-box">
					<div class="custom-box custom-boxwidth businessCategory" >
					<!--<img src="<?=base_url()?>assets/images/plus.png" class="imageWidth plus">
					<img src="<?=base_url()?>assets/images/minus.png" class="imageWidth minus" style="display:none">-->
					<span class="plus pluswork"></span>
						<h4 class="plusq" style="cursor: pointer;">
						<?php $resultq=$this->usermodel->findNameBusiness($value['businessCategory']);
							  echo $resultq;
						?></h4>					
					</div>
					<?php $resultw=$this->usermodel->findServiceByCategoryId($value['businessCategory'],$value['merchantId']);
						if(!empty($resultw))
						{
						  foreach($resultw as $values)
						  {
					?>
					<div style="display:none;">
					<div class="large-6 columns">
					<p><span class="default-color"><?=$values['serviceName']?></span><br>
					<?=$values['description']?></p>
					</div>
					<div class="large-2 columns" style="height:56px;">
					<p class="default-color"><?php //$values['price']?></p>
					</div>
					<div class="large-2 columns">
					<p class="default-color"><?=$values['duration'].' '?>min.</p>
					</div>
					<div class="large-2 columns">
					<?php if($this->session->userdata('user_level')==1 || $this->session->userdata('user_level')==2 || $this->session->userdata('user_level')==3) { ?>
					<?php } else { 
					if(!$merchantRecord[0]['onlineBooking']){
					?>
                    
					<a href="#" class="button secondary" onClick="bookoffx('<?=$values['serviceName']?>');">Book Me</a>
					<?php }
					else{?>
					<a href="#" class="button secondary bookMe" price="<?=$values['price']?>" rel="<?=$values['id']?>" lang="<?=$values['duration']?>">Book Me</a>	
						<?php }} ?>
					</div></div>
					<?php }} ?>
					</div></div>
					<?php } } ?>
					
					<!--recommendation cuts-->
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"> 
					</div>
					<div class="book-box">
						<div class="custom-box">
						<h4>Recommendations</h4>					
						</div>
						
					<?php if($this->session->userdata('user_level')!='2') {?>
						<div class="large-12 columns ">
						<h4 class="offTxt right"><a id="recommendationOpen">Write a Recommendation</a></h4>	
						</div>
						<?php } ?>
						<!--<div class="large-1 columns">
						<p><img src="<?=base_url();?>assets/images/avatar_100_1x.png"></p>
						</div>
						<div class="large-1 columns">
						<p class="default-color">Rachel K.<br>2/26/14</p>
						</div>-->
						<!--<div class="large-10 columns">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
						</div>-->		
					</div>
					<?php 	$url=$_SERVER['REQUEST_URI'];
							$merchantId = end((explode('/', $url)));
							$resulte=$this->usermodel->recommendationList($merchantId);
							
							if(!empty($resulte))
							{
							foreach($resulte as $value)
							{
								$details=$this->usermodel->findDetailsOfUser($value['userId']);
								$detailsalon=$this->usermodel->findDetailsOfsalon($value['userId']);
								
					?>
					<div class="book-box" style="border:solid 1px #C5BEBE">
					<div class="large-1 columns" style="border-right:solid 1px #C5BEBE">
					<?php if($details){?><a href="<?=base_url();?>userprofile/<?=$value['userId']?>">
                    <p style="padding-top:2px">
                    <img src="<?=base_url();?>assets/images/merchant/<?php if(isset($details[0]['photo']))
							echo $details[0]['photo'];
						else
							echo 'usericon.jpg';
					?>" width="50px" height="50px"></p>
					
					<p class="default-color"><?php echo ucwords(strtolower($detailsalon[0]['salonName']));?></p></a><?php }?>
                    <?php if($detailsalon){?><a href="<?=base_url();?>merchant/Salon/<?=$value['userId']?>">
                    <p style="padding-top:2px">
                    <img src="<?=base_url();?>assets/images/merchant/<?php if(isset($detailsalon[0]['photo']))
							echo $detailsalon[0]['photo'];
						else
							echo 'usericon.jpg';
					?>" width="50px" height="50px"></p>
					
					<p class="default-color"><?php echo ucwords(strtolower($detailsalon[0]['salonName']));?></p></a><?php }?>
					</div>
					<div class="large-10 columns" >
                    <time style="float:right!important;"><?php echo date('d/m/y',strtotime($value['createdOn']));?></time>
                    <p class="text-justify" ><?=$value['message'];?></p>
                    
					</div>					
					</div>
					<?php } } ?>
            </div>
				
				
				
				<div class="section-container" id="ratecardimage" data-section style="display:none;"> 
					<!--recommendation cuts-->
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"> 
					</div>
					<div class="book-box">
                   
						<div class="custom-box">
						<h4>Your Rate Card</h4>					
						</div>
					</div>

					<div id="Ratecard">
					      <div id="linksrate"  style="width: 100%; max-height: 250px; overflow-x: scroll; overflow-y: hidden; white-space: nowrap; background-color:#E9E5DC;padding:5px">
   
     <?php 
	 $str=explode('/', $_SERVER['REQUEST_URI']);
							$ids=end($str);
	 $resultr=$this->usermodel->getMerchantratecart($ids);
					if(!empty($resultr))
					{
					foreach($resultr as $value)
					{?>
                    <a href="<?=base_url();?>assets/images/merchant/browsphoto/<?= $value['photo']; ?>" title="<?= $value['description'];?>" data-gallery="#blueimp-gallery-linksrate">  
					<img src="<?= base_url(); ?>assets/images/merchant/browsphoto/<?= $value['photothum']; ?>" class="" style="cursor:pointer; height:150px; border-radius:5px; width:150px !important"></a>
                   
					<?php } } else{ echo "<center>No Preview Available</center>";} ?>
     </div>
     
       <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery-linksrate" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

       
       
       
                    </div>
					
            </div>
            <!-- End Sidebar Navigation -->                                     
       
        
        <div class="section-container" id="lookbookSection" data-section> 
					<!--recommendation cuts-->
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"> 
					</div>
					
                   <?php $resultq=$this->usermodel->getMerchantWorkingPhoto($id);
					if(!empty($resultq))
					{?><div class="book-box">
						<div class="custom-box">
						<h4>Your Working Photos</h4>					
						</div>
					</div>
					
			<div id="clokboklink" style="width: 100%; max-height: 250px; overflow-x: scroll; overflow-y: hidden; white-space: nowrap; background-color:#E9E5DC; padding:5px">
			<?php 
					foreach($resultq as $value)
					{?>
                     <a href="<?=base_url();?>assets/images/merchant/browsphoto/<?= $value['photo']; ?>" title="<?= $value['description'];?>" data-gallery="#blueimp-gallery-lokboklink">  
					<img src="<?= base_url(); ?>assets/images/merchant/browsphoto/<?= $value['photothum'];?>" class="" style="cursor:pointer; height:150px; border-radius:5px; width:150px !important"></a>
					
                   
					<?php }?>
                    </div>
           
                    <?php  }
					else{ ?>
				<center>	
				<img src="<?= base_url(); ?>assets/images/coming_soon.png" class="testa" style="border-radius:5px; ">	
					</center>
					<?php } ?>
            </div>
            
               <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery-lokboklink" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

            
            <!-- End Sidebar Navigation -->                                     
        </div>
     
       
		 <div class="large-3 columns widgets side-widgets"  id="rtcrd" style="display:none;">         
          <h4>RATECARD</h4>                 
            <!-- Sidebar Navigation -->      
            <div class="section-container level accordion" data-section>        
              <section class="section active">

	<div class="widgets">	
		<!--<div id="test2" class="gmap3" style="width:257px;height:285px"></div>-->
		<div id="map_canvas" style="width:257px;height:285px"></div>
				<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28005.86074612837!2d77.09795154999999!3d28.667724399999972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04709a55ca61%3A0x733c78dcf34281ce!2sPaschim+Vihar!5e0!3m2!1sen!2sin!4v1397556382610" width="100%" height="250" frameborder="0" style="border:0"></iframe>-->				
	</div>
	<div class="widgets">
	<h5 class="verticalLine-bottom">Online</h5>
	<p><a href="http://<?= $merchantRecord[0]['website']?>" target="_blank">My Website</a><br><a href="http://<?= $merchantRecord[0]['blog']?>" target="_blank">Blog</a></p>
	<p><a href="http://twiter.com/<?= $merchantRecord[0]['twiter']?>"  target="_blank""><i class="icon-twitter left"></i></a>&nbsp;<a href="http://<?= $merchantRecord[0]['gplus']?>" target="_blank"><i class="icon-google-plus left"></i></a>&nbsp;<a href="http://linkedin.com/<?= $merchantRecord[0]['twiter']?>"  target="_blank""><i class="icon-linkedin left"></i></a></p>
	</div>
	<div class="widgets">
	<h5 class="verticalLine-bottom"></h5>
	</div>	
              </section>            
            </div>
            <!-- End Sidebar Navigation -->                                     
        </div>
      </div><!-- End Row -->
    </div>	
  </div>
	
  <!-- End Main Content --> 


	</div> 
	<input type="hidden" id="sessionId" value="<?= $this->session->userdata('user_level');?>">
<script>
//jQuery.noConflict();

jQuery(window).load(function() {
	jQuery('#slider').nivoSlider({ controlNav: false});	
});
jQuery(document).ready(function() {
	 $(".gallery a").classybox({});
	 								 $("#frame").classybox({
                                                iframe: 1,
                                                social: 0,
                                                height: 600,
                                                width: 900
                                            });
                                            $("#ajax").classybox({
                                                height: 450,
                                                width: 555,
                                                ajaxSuccess: function(data) {
                                                    $(".classybox-wrap .content").append(data);
                                                }
                                            });
	 $(window).classybox({
                   autoDetect: 1
                                            });
	jQuery('input.datepicker').Zebra_DatePicker();
	
	
	
			
});  
function removejscssfile(filename, filetype){
 var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none" //determine element type to create nodelist from
 var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none" //determine corresponding attribute to test for
 var allsuspects=document.getElementsByTagName(targetelement)
 for (var i=allsuspects.length; i>=0; i--){ //search backwards within nodelist for matching elements to remove
  if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
   allsuspects[i].parentNode.removeChild(allsuspects[i]) //remove element by calling parentNode.removeChild()
 }
}

	
window.onload = function() {
	 initialize();
	removejscssfile('classie.js', 'js');
	removejscssfile('agency.js', 'js');
	removejscssfile('normalize.css', 'css');
	
};

function bookoffx(a)
{	
	$('#serviceNamepop').val(a);
	
	$('#bookoffline').modal('show');
	}
function bookoff()
{	
	
	
	$('#bookoffline').modal('show');
	}
</script>

<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?=base_url()?>new/js/bootstrap-image-gallery.js"></script>
