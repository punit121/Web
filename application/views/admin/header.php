<div id="fb-root"></div>
<script>
var baseurl="<?=base_url();?>";
	$(document).ready(function(){
		$('.right li a').click(function(){
			$('.right li a').removeClass('active');
			$(this).addClass('active');
	   });
	   $('#loginInPage').click(function(){
			$('#myModal1').foundation('reveal', 'open');
			$('#myModal').foundation('reveal', 'close');
	   });
	   $('#registerPage').click(function(){
			$('#myModal').foundation('reveal', 'open');
			$('#myModal1').foundation('reveal', 'close');
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
		$('#myModal1').foundation('reveal','close');
		$('#SignupOrLoginModal').foundation('reveal','close');
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
				//alert(response.hometown.name);
					var facebook ='facebook';
					var dataString ='facebook='+facebook+'&name='+response.name+ '&email='+response.email+'&fbid='+response.id+'&username='+response.username+'&gender='+response.gender;
					
					jQuery('#firstName').val(response.first_name);
					 jQuery('#facebookId').val(response.id);
					 jQuery('#lastName').val(response.last_name);
					 jQuery('#email').val(response.email);
					
				});  
			} 
		}, {perms:'publish_stream,offline_access,manage_pages,email'});
	}
	
	function fblogin2(){
	
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
						if(data==response.id)
						{
							window.location.href=baseurl+'users'
						}
						else
						{
							console.log('test');							
						}
					});
				});  
			} 
		}, {perms:'publish_stream,offline_access,manage_pages,email'});
	}
		
	</script>
<script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/js/pages/user.js"></script>	
<body class="boxed">
<!-- Begin Main Wrapper -->
<div class="main-wrapper">
	<!-- Main Navigation -->  
	<header class="row main-navigation">
		<div class="large-3 columns">	
			<a href="<?=base_url()?>home" id="logo"><img src="<?=base_url();?>assets/images/logo.png" alt="Medico Logo" /></a>
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
						<li><a href="<?=base_url();?>home" class="<?php if(!empty($pageName)){ if($pageName=='home'){	echo 'active';	}}?>">Home</a></li>
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
						<li><a href="<?=base_url();?>dashboard" style="color:#17AEF5"><?= $this->usermodel->getLoginName($this->session->userdata['username']); ?></a></li>
						<?php } else { ?>
						<li><a href="<?=base_url();?>profile" style="color:#17AEF5"><?= $this->usermodel->getLoginName($this->session->userdata['username']); ?></a></li>
						<?php }} else { ?>
						<li><a href="#" data-reveal-id="myModal1">Login</a></li>
						<li><a href="#" data-reveal-id="myModal" class="button radius SignUpButton">Sign Up</a></li>
						<li><a href="#" class="button radius wishList">WishList</a></li>
						<?php } ?>						
					  </ul>
					  <!-- End Left Nav Section -->					 
				</section>
			</nav>
		</div>
	</header>
</div>	


<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">	
	<div id="myModal" class="reveal-modal" data-reveal style="z-index:999999999;top:0px !important;" >
				<div class="row">
				<div class="stripBackground">
				<div class="large-12 columns">
				<h3 class="text-center stripSignUp"><strong>Sign Up For Zersey</strong></h3>
				</div>
				</div>
				</div>
				<form id="registrationform" method="post" action="<?=base_url();?>auth/register">
				<div class="row">
				<div class="large-12  columns">
				<p class="text-center"><strong>Or sign up using your email</strong></p>
				</div>
				<div class="large-12  columns">
				<input type="image" class="post_image" src="<?=base_url();?>assets/images/facebook.png" onclick="fblogin()" alt="post title" class="signUpicon img-responsive">
				 <p>Recommended, And we will never post anything without your permission.</p>
				</div>
				<!--<div class="large-12 columns">
				<img class="post_image" src="<?=base_url();?>assets/images/googleicon.png" alt="post title" class="signUpicon">
				</div>-->
				<!--<div class="large-12 columns">
				 <p class="text-center signUpicon"><strong>Or sign up using your email</strong></p>
				</div>-->
				<div class="large-12 columns">
				<input type="hidden" name="username" id="userName" class="sign-form">
				<input type="text" placeholder="First Name" name="firstName" id="firstName" class="sign-form">
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
	</div>
</div>
<div class="row">

<form method="post" id="form_login" action="<?=base_url();?>auth/login">
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
				<div class="large-12  columns">
				<input type="image" src="<?=base_url();?>assets/images/facebook.png" onclick="fblogin1()" alt="Submit" class="signUpicon img-responsive">
				</div>
				<div class="large-12  columns">
				<p>Recommended, And we will never post anything without your permission.</p>
				</div>
				<!--<div class="large-12 columns">
				<input type="image" src="<?=base_url();?>assets/images/googleicon.png" alt="Submit" class="signUpicon img-responsive alternativeDiv">
				</div>-->
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
				<p>Already have an account? <span style="font-size:16px"><a id="registerPage">Sign Up!</a></span></p>
				</div>
				</div>
	<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
	</div>
	</div>
</form>	
</div>

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
<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
</div>
</div></div>