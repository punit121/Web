<link rel="icon" href="<?= base_url(); ?>assets/images/favicon.ico" type="image/ico">
<div id="fb-root"></div>
<style>
</style>
<script>
var baseurl="<?=base_url();?>";
	$(document).ready(function(){
		$('#forgotpwd').validate({
		ignore: null,
		ignore: 'input[type="hidden"]',
		rules: {
			login: {
				required: true
			}
		},
		messages: {
			login: {
				required: 'please provide email or login'
			}
		},
		submitHandler: function(form) {
					$('#resetSuccess').foundation('reveal','open');
			setTimeout(function(){
					form.submit();
				},2000);
					
					}
	});
		$('.right li a').click(function(){
			$('.right li a').removeClass('active');
			$(this).addClass('active');
	   });
	   $('.loginInPage').click(function(){
			 $('#emailLogin').val('');
			 $('#logpassword').val('');  
			$('#myModal1').foundation('reveal', 'open');
			$('#myModal').foundation('reveal', 'close');
	   });
	   
	   $('#registerPage').click(function(){
			 $('#firstName').val('');
			 $('#lastName').val('');
			 $('#email').val('');
			 $('#password').val('');  
			$('#myModal').foundation('reveal', 'open');
			$('#myModal1').foundation('reveal', 'close');
	   });
	    $('#salunsinup').click(function(){
			 $('#firstName').val('');
			 $('#lastName').val('');
			 $('#email').val('');
			 $('#password').val('');  
			$('#myModal2').foundation('reveal', 'open');
			$('#myModal').foundation('reveal', 'close');
	   });
	   $('#clnunsinup').click(function(){
			 $('#firstName').val('');
			 $('#lastName').val('');
			 $('#email').val('');
			 $('#password').val('');  
			$('#myModal').foundation('reveal', 'open');
			$('#myModal2').foundation('reveal', 'close');
	   });
	   $('#logInAppointment').click(function(){
			$('#loginContainer').show();
			$('#signupContainer').hide();			
	});
	$('#signUpAppointment').click(function(){
			$('#signupContainer').show();
			$('#loginContainer').hide();			
	});
	$('.close').click(function(){
		$('#myModal').foundation('reveal','close');
		$('#myModal1').foundation('reveal','close');
		$('#SignupOrLoginModal').foundation('reveal','close');
	});
	$('#forgetPassword').click(function(){
		$('#SignupOrLoginModal').foundation('reveal','open');
		return false;
	});
	 $('#signup').click(function(){
			 $('#firstName').val('');
			 $('#lastName').val('');
			 $('#email').val('');
			 $('#password').val('');  
	 }); 
	 $('#login').click(function(){
			 $('#emailLogin').val('');
			 $('#logpassword').val('');  
	 }); 
	 $('#professionalSubmit').mouseenter(function(){
			 $('#mainsubmit').val('professional');  
	 });
	 $('#professionalSubmit').mouseleave(function(){
			 $('#mainsubmit').val('');  
	 });
	  $('#customerSubmit').mouseenter(function(){
			 $('#mainsubmit').val('customer');  
	 });
	 $('#customerSubmit').mouseleave(function(){
			 $('#mainsubmit').val('');  
	 });
	 $('.notsubmit').bind('keypress', function (e){
        if(e.keyCode == 13){
            return false;
        }
    });
	 
	
	   
			var max = 999;
			var $wrap = $('#userName');
			$('#firstName').blur(function() {
				$('#userName').val('');
				var num = +$wrap.val();
				num=num+Math.ceil(Math.random() * max);	
				$wrap.val($('#firstName').val()+num);
			});
	   
	});
</script>
<script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '538593529573592',
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
	  js.src = "//connect.facebook.net/en_US/all.js#appId=538593529573592&amp;xfbml=1";
      d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
	
	function fblogin(){
		FB.login(function(response) {
			if (response.authResponse) {
				FB.api('/me', function(response) {				
					var facebook ='facebook';
					console.log(response);					
					var dataString ='facebook='+facebook+'&fname='+response.first_name+'&lname='+response.last_name+'&name='+response.name+'&email='+response.email+'&fbid='+response.id+'&username='+response.username+'&gender='+response.gender;
					/*jQuery('#userName').val(response.first_name);
					jQuery('#userName').css('display','none');
					jQuery('#firstName').val(response.first_name);
					jQuery('#firstName').css('display','none');
					jQuery('#facebookId').val(response.id);
					jQuery('#lastName').val(response.last_name);
					jQuery('#lastName').css('display','none');					
					jQuery('#email').val(response.email);
					jQuery('#email').css('display','none');
					jQuery('#password').val('123456!');
					jQuery('#password').css('display','none');*/
					$.post(baseurl+'users/loginByfacebook',dataString,function(data){						
						if(data=='not registered')
						{
							$.post(baseurl+'users/LoginAndSignupByfacebook',dataString,function(data){
								console.log(data);
								if(data==response.id)
								{	
									jQuery('#customerSubmit').css('display','none');
									jQuery('#professionalSubmit').css('display','none');
									window.location.href=baseurl;
								}			
							});
						}
						else
						{	
							jQuery('#customerSubmit').css('display','none');
							jQuery('#professionalSubmit').css('display','none');
							window.location.href=baseurl;
						}						
						
					});					
				});  
			} 
		}, {perms:'publish_stream,offline_access,manage_pages,email'});
	}
function fbloginbsn(){
		FB.login(function(response) {
			if (response.authResponse) {
				FB.api('/me', function(response) {				
					var facebook ='facebook';
					console.log(response);					
					var dataString ='facebook='+facebook+'&fname='+response.first_name+'&lname='+response.last_name+'&name='+response.name+'&email='+response.email+'&fbid='+response.id+'&username='+response.username+'&gender='+response.gender;
					/*jQuery('#userName').val(response.first_name);
					jQuery('#userName').css('display','none');
					jQuery('#firstName').val(response.first_name);
					jQuery('#firstName').css('display','none');
					jQuery('#facebookId').val(response.id);
					jQuery('#lastName').val(response.last_name);
					jQuery('#lastName').css('display','none');					
					jQuery('#email').val(response.email);
					jQuery('#email').css('display','none');
					jQuery('#password').val('123456!');
					jQuery('#password').css('display','none');*/
					$.post(baseurl+'users/loginByfacebook',dataString,function(data){						
						if(data=='not registered')
						{
							$.post(baseurl+'users/LoginAndSignupByfacebookpat',dataString,function(data){
								console.log(data);
								if(data==response.id)
								{	
									jQuery('#customerSubmit').css('display','none');
									jQuery('#professionalSubmit').css('display','none');
									window.location.href=baseurl+'dashboard';
								}			
							});
						}
						else
						{	
							jQuery('#customerSubmit').css('display','none');
							jQuery('#professionalSubmit').css('display','none');
							window.location.href=baseurl+'dashboard';
						}						
						
					});					
				});  
			} 
		}, {perms:'publish_stream,offline_access,manage_pages,email'});
	}
	
	function fbloginlogin(){
	
		FB.login(function(response) {
			if (response.authResponse) {
				FB.api('/me', function(response) {
				//alert(response.hometown.name);
					var facebook ='facebook';
					var findfacebookId;					
					var dataString ='facebook='+facebook+'&name='+response.name+ '&email='+response.email+'&fbid='+response.id+'&username='+response.username+'&gender='+response.gender;
					console.log(response.id);
					$.post(baseurl+'users/loginByfacebook',dataString,function(data){
					console.log(data)
						if(data=='not registered')
						{
							$('#myModal').foundation('reveal','open');
						}
						else if(data==response.id)
						{
							window.location.href=baseurl+'users';
						}
						else
						{
							$('#emailModal').foundation('reveal','open');	
							$.setTimeout(function(){$('#emailModal').foundation('reveal','close');	},1000);
						}
					});
				});  
			} 
		}, {perms:'publish_stream,offline_access,manage_pages,email'});
	}
	</script>
<script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/js/pages/user.js"></script>	
<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">	
		<div id="emailModal" class="reveal-modal" data-reveal style="z-index:999999999;top:120px !important;" >
					<div class="row">
							<div class="large-12 columns">
								This email is already exist.
							</div>
					</div>
		</div>
	</div>
</div>
<body class="boxed">
<!-- Begin Main Wrapper -->
<div class="main-wrapper">
	<!-- Main Navigation -->  
	<header class="row main-navigation">
		<div class="large-3 columns">	
			<a href="<?=base_url()?>home" id="logo"><img src="<?=base_url();?>assets/images/logo.png" alt="Zersey Logo" lang="Andrew Thomas" /></a>
		</div>
		<div class="large-9 columns">			
			<nav class="top-bar">
				<ul class="title-area">
				  <!-- Title Area -->
				  <li class="name"></li>
				  <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				  <li class="toggle-topbar menu-icon"><a href="#"><span>Main Menu</span></a></li>
				</ul>

				<section class="top-bar-section">
					<!-- Left Nav Section -->
					  <ul class="right">
						<li><a href="<?=base_url();?>home" lang="Andrew Thomas" class="<?php if(!empty($pageName)){ if($pageName=='home'){	echo 'active';	}}?>">Home</a></li>
						<li><a href="<?=base_url()?>offers" class="<?php if(!empty($pageName)){ if($pageName=='offers'){	echo 'active';	}}?>">Offers</a></li>						
						<li><a href="<?=base_url()?>browsePhoto" class="<?php if(!empty($pageName)){ if($pageName=='browsePhoto'){	echo 'active';	}}?>">Browse Photos</a></li>

						<?php if($this->session->userdata('user_level')!='4' && $this->session->userdata('user_level')!='1' && $this->session->userdata('user_level')!='2') { ?>
						<li><a href="<?=base_url();?>getlist" class="<?php if(!empty($pageName)){ if($pageName=='getlist'){	echo 'active';	}}?>">Get Listed</a></li>
						<?php } ?>
						
						<li><a href="<?=base_url();?>blog" id="blog" class="<?php if(!empty($pageName)){ if($pageName=='blog'){	echo 'active';	}}?>">Blog</a></li>
						<?php if(!empty($this->session->userdata['username'])){?>
						<li><a href="<?=base_url();?>logout">Logout</a></li>
						
						<?php $result=$this->usermodel->checkuserbyname($this->session->userdata['username']); 
						if(!empty($result)) {
						?>
						<li><a class="textlengthcontrol" href="<?=base_url();?>dashboard" style="color:#17AEF5;" title="<?= $this->usermodel->getLoginName($this->session->userdata['username']); ?>"><?= $this->usermodel->getLoginName($this->session->userdata['username']); ?></a></li>
						<?php } else { ?>
						<li><a class="textlengthcontrol" href="<?=base_url();?>profile" style="color:#17AEF5" title="<?= $this->usermodel->getLoginName($this->session->userdata['username']); ?>"><?= $this->usermodel->getLoginName($this->session->userdata['username']); ?></a></li>
						<?php }} else { ?>
						<li><a href="#" data-reveal-id="myModal1" id="login">Login</a></li>
						<li><a href="#" data-reveal-id="myModal" class="button radius SignUpButton" id="signup">Sign Up</a></li>
							<?php } ?>	
						<?php 
						if($this->session->userdata('user_id'))
						{
						if($this->session->userdata('user_level')!=2) { ?>
						<li><a href="<?= base_url();?>whishlist" class="button radius wishList" >WishList</a></li>
							<?php } }?>			
					  </ul>
					  <!-- End Left Nav Section -->					 
				</section>
			</nav>
		</div>
	</header>
</div>	
<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="resetSuccess" class="reveal-modal" data-reveal style="z-index:999999999;" >
				<div class="row">		
					<div class="large-12 columns">									
					<center>	Reset passsword link has been successffully send to your mail id</center>
					</div>						
				</div>				
			</div>
		</div>
</div>



<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">	
	<div id="myModal" class="reveal-modal" data-reveal style="z-index:999999999;top:-20px !important;" >
				<div class="row">
				<div class="stripBackground">
				<div class="large-12 columns">
				<h3 class="text-center stripSignUp"><strong>Sign Up For Zersey</strong></h3>
				</div>
				</div>
				</div>
				<form id="registrationform" method="post" action="<?= base_url();?>register">
				<div class="row">
				<div class="large-12  columns">
				</div>
				<div class="large-12  columns">
				<center><img class="post_image" src="<?=base_url();?>assets/images/fblogin.png" onclick="fblogin()" alt="post title" class="signUpicon img-responsive" style="width: 75%; padding-bottom:2%; padding-top:2%"></br>
                <a href="<?php echo base_url();?>auth_oa2/customer" style="padding-top:5px !important"> <img class="post_image" src="<?=base_url();?>assets/images/googlelogin.png" alt="post title" class="signUpicon img-responsive" ></a></center>
	<center><fieldset style="border: 0px;border-top:1px solid #333;padding: 0.25em;"><legend>or</legend></fieldset></center>
				</div>
				<!--<div class="large-12 columns">
				<img class="post_image" src="<?=base_url();?>assets/images/googleicon.png" alt="post title" class="signUpicon">
				</div>-->
				<!--<div class="large-12 columns">
				 <p class="text-center signUpicon"><strong>Or sign up using your email</strong></p>
				</div>-->
				<div class="large-12 columns">
				<input type="hidden" name="username" id="userName" class="sign-form" autocomplete="off">
				<input type="text" placeholder="First Name" name="firstName" id="firstName" class="sign-form notsubmit" autocomplete="off">
				</div>
				<div class="large-12 columns">
				<input type="text" placeholder="Last Name" name="lastName" id="lastName" class="sign-form notsubmit" autocomplete="off">
				</div>
				<div class="large-12 columns">
				<input type="text" placeholder="Email" name="email" id="email" class="sign-form notsubmit" autocomplete="off">
				</div>
				<div class="large-12 columns">
				<input type="password" placeholder="Password" name="password" id="password" class="sign-form notsubmit" autocomplete="off">
				<input type="hidden" name="facebookId" id="facebookId" class="sign-form" autocomplete="off">
				<input type="hidden" name="mainsubmit" id="mainsubmit" class="sign-form" autocomplete="off">
				</div>
				<div class="large-12 columns">
				<p>By signing up you confirm that you accept the <a href="#">Terms Of Service</a> and <a href="#">Privacy Policy</a>.</p>
				</div>
				
				<div class="large-12 columns">
				<button class="button alert fontbuttonsize widthButton" type="submit" id="customerSubmit"  style="height:30px;" >Sign Up</button>
				</div>
				
				
				<div class="large-12 columns">
				<p>Already have an account?<span style="font-size:16px"> <a class="loginInPage">Log in!</a></span></p>
				</div>
                <div class="large-12 columns">
                
                <center><a id="salunsinup"> <img class="post_image" src="<?=base_url();?>assets/images/LIST.png" alt="post title" class="signUpicon img-responsive" style=""></a>
               </center>
				</div>
				<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
				</div>
				</form>
	</div>
	</div>
</div>
<div class="row">
	<div class="large-7 medium-13 small-13 columns large-offset-3">	
	<div id="myModal2" class="reveal-modal" data-reveal style="z-index:999999999;top:0px !important; width:80%" >
				<div class="row">
				<div class="stripBackground" style="margin-top:-3%">
				<div class="large-12 columns">
				<h3 class="text-center stripSignUp"><strong>Create your business listing</strong></h3>
				</div>
				</div>
				</div>
				<form id="registrationform" method="post" action="<?= base_url();?>register">
				<div class="row">
				<div class="large-12  columns">
				<p class="text-center"><strong>Or sign up using your email</strong></p>
				</div>
				<div class="large-6 medium-6 columns">
				<center><img class="post_image" src="<?=base_url();?>assets/images/fblogin.png" onclick="fbloginbsn()" alt="post title" class="signUpicon img-responsive"style="width: 85%;">
             </div><div class="large-6 medium-6 columns">   <a href="<?php echo base_url();?>auth_oa2/saloon" style="padding-top:5px !important"> <img class="post_image" src="<?=base_url();?>assets/images/googlelogin.png" alt="post title" class="signUpicon img-responsive" ></a></div></center>
				<div class="large-12 columns"> 
                <center><fieldset style="border: 0px;border-top:1px solid #333;padding: 0.25em;"><legend>or</legend></fieldset></center>
				</div>
				<!--<div class="large-12 columns">
				<img class="post_image" src="<?=base_url();?>assets/images/googleicon.png" alt="post title" class="signUpicon">
				</div>-->
				<!--<div class="large-12 columns">
				 <p class="text-center signUpicon"><strong>Or sign up using your email</strong></p>
				</div>-->
				<div class="large-6 medium-6 columns">
				<input type="hidden" name="username" id="userName" class="sign-form" autocomplete="off">
				<input type="text" placeholder="First Name" name="firstName" id="firstName" class="sign-form notsubmit" autocomplete="off">
				</div>
				<div class="large-6 medium-6 columns">
				<input type="text" placeholder="Last Name" name="lastName" id="lastName" class="sign-form notsubmit" autocomplete="off">
				</div>
				<div class="large-12 columns">
				<input type="text" placeholder="Email" name="email" id="email" class="sign-form notsubmit" autocomplete="off">
				</div>
				<div class="large-6 medium-6 columns">
				<input type="password" placeholder="Password" name="password" id="password" class="sign-form notsubmit" autocomplete="off"></div>
                <div class="large-6 medium-6 columns">
				<input type="password" placeholder="Retype Password" name="rpassword" id="rpassword" class="sign-form notsubmit" autocomplete="off"></div>
				<input type="hidden" name="facebookId" id="facebookId" class="sign-form" autocomplete="off">
				<input type="hidden" name="mainsubmit" id="mainsubmit" class="sign-form" autocomplete="off">
				</div>
				<div class="large-12 columns">
				<p>By signing up you confirm that you accept the <a href="#">Terms Of Service</a> and <a href="#">Privacy Policy</a>.</p>
				</div>
				<div class="row">
				<div class="large-6 medium-6 columns">
				<button class="button professionalDiv widthButton fontbuttonsize" type="submit" id="professionalSubmit" style="height:48px;">SIGN ME UP!</a>
				</div>
				<div class="large-6 medium-6 columns" style="vertical-align: middle;line-height: 50px;">
				<a id="clnunsinup" style="text-align:center">Oops, I am a client!</a>
				</div>
				</div>
				<div class="large-12 columns">
				<p>Already have an account?<span style="font-size:16px"> <a class="loginInPage">Log in!</a></span></p>
				</div>
				<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
				</div>
				</form>
	</div>
	</div>
</div>

<div class="row">


	<div class="large-4 medium-12 small-12 columns large-offset-4">
	<div id="myModal1" class="reveal-modal" data-reveal style="z-index:999999999;top: 0 !important;" >
	<div class="row">
				<div class="stripBackground">
				<div class="large-12 columns" style="padding: 0px;
				width: 92%;margin-left: 4%;">
				<h3 class="text-center stripSignUp"><strong>Login For Zersey</strong></h3>
				</div>
				</div>
				</div>	
				<div class="row">
				<div class="large-12  columns">
			<center>	<input type="image" src="<?=base_url();?>assets/images/fblogin.png" onclick="fblogin()" alt="Submit" class="signUpicon img-responsive" style="width: 75%;"></br>
                <a href="<?php echo base_url();?>auth_oa2/customer" style="padding-top:5px !important"> <img class="post_image" src="<?=base_url();?>assets/images/googlelogin.png" alt="post title" class="signUpicon img-responsive" /></a></center>
	<center><fieldset style="border: 0px;border-top:1px solid #333;padding: 0.25em;"><legend>or</legend></fieldset></center>
				</div>
				<form method="post" id="form_login" action="<?=base_url();?>auth/login">
				<div class="large-12  columns">
				<p style="text-align:center;margin-top: 3%;">Recommended, And we will never post anything without your permission.</p>
				</div>
				<!--<div class="large-12 columns">
				<input type="image" src="<?=base_url();?>assets/images/googleicon.png" alt="Submit" class="signUpicon img-responsive alternativeDiv">
				</div>-->
				<div class="large-12 columns">
				<input type="text" placeholder="Email" name="login" id="emailLogin" class="sign-form">
				</div>
				<div class="large-12 columns">
				<input type="password" placeholder="Password" name="password" id="logpassword" class="sign-form">
				</div>	
				<div class="large-12 columns">
				<button type="submit" name="submitLogin" class="button secondary loginbuttonwidth">Login</button>
				</div>		
				<div class="large-12 columns">
				<p>Don't have an account? <span style="font-size:16px"><a id="registerPage">Sign Up!</a></span></p><a href="#" id="forgetPassword">Forgot password?</a>
				</div>
				</div>
	<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
	</div>
	</div>
</form>	
</div>

<div class="row">
<div class="large-4 medium-12 small-12 columns large-offset-4">
<div id="SignupOrLoginModal" class="reveal-modal" data-reveal style="z-index:999999999;top:1px;display:none">
    <div id="signupContainer" class="ClickToggleTarget">        
             <form action="<?= base_url(); ?>auth/forgot_password" method="post" accept-charset="utf-8" id="forgotpwd">
				<div><h6><b>FORGOT PASSWORD?</b><h6></div><hr>
				<p>Please enter the email address you signed up with and we'll send you a password reset link.</p>
				<div class="row">
				<div class="large-12 medium-6 columns">
				<p>EMAIL ADDRESS</p>
				</div>
				</div>
				<div class="row">
				<div class="large-12 medium-6 columns">
				<input type="text" name="login" id="login" placeholder="enter email or login" class="loginheight">
				</div>
				</div>
				<div class="row">
				<div class="large-6 medium-6 columns">
				</div>
				<div class="large-6 medium-6 columns">
				<button class="button SearchIconButton alert" type="submit" name="resetPassword" style="font-size:11px;">RESET PASSWORD</a>
				</div>
				
				</div>
				<div class="large-12 columns">
				<p>Already have an account?<span style="font-size:16px"> <a class="loginInPage">Log in!</a></span></p>
				</div>
				<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
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
<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
</div>
</div></div>