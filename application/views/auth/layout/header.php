<?php 
$uid=$this->session->userdata['user_id'];

if($uid){
$rew=$this->db->select('reward')->where('id',$uid)->get('users')->result();
$this->session->set_userdata('reward', $rew[0]->reward);

}
?>

<link rel="icon" href="<?= base_url(); ?>assets/images/logo.jpg" type="image/ico">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.js"></script>
	
<script src="<?=base_url();?>assets/js/foundation.min.js"></script>
<script>
var baseurl='<?=base_url();?>';
</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flexisel.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flexisel.js"></script>	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61123198-1', 'auto');
  ga('send', 'pageview');

</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
 <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>newcss/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>newcss/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>newcss/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	
<div id="fb-root"></div>
<style>
</style>
<script>
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
					$('#resetSuccess').modal('show');
			setTimeout(function(){
					form.submit();
				},2000);
					
					}
	});
});
function showlogin()
{
	$('#signUp').modal('hide');
	$('#signip').modal('show');
	
	}
function showsinup()
{
	$('#signip').modal('hide');
	$('#signUp').modal('show');
	
	}
function signupbox()
	{
	$('#signUp').modal('hide');
	$('#busness').modal('show');	
		}
function showloginbus()
{
	$('#busness').modal('hide');
	$('#signip').modal('show');
	
	}
function businsshide(){
	$('#signUp').modal('show');
	$('#busness').modal('hide');	
		
		}
	function showloginpwd()
{
	$('#pwdfrg').modal('hide');
	$('#signip').modal('show');
	
	}
function showspwd()
{
	$('#signip').modal('hide');
	$('#pwdfrg').modal('show');
	
	
	}	
function showcart()
{
	$('#cartSuccess').modal('show');
	}
</script>
<script>
var baseurl="<?=base_url();?>";
	$(document).ready(function(){
		
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
			// alert( $('#mainsubmit').val);
	 });
	 $('#customerSubmit').mouseleave(function(){
			 $('#mainsubmit').val('');  
	 });
	 $('.notsubmit').bind('keypress', function (e){
        if(e.keyCode == 13){
            return false;
        }
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
					//console.log(response);					
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
					var a=eval(data)
					//console.log(a[0]);					
						if(a[0]=='not registered')
						{
							$.post(baseurl+'users/LoginAndSignupByfacebook',dataString,function(data){
								//console.log(data);
								var res = data.split(" ");
								if(res[0]==response.id)
								{	
									jQuery('#customerSubmit').css('display','none');
									jQuery('#professionalSubmit').css('display','none');
									window.location.href=res[1];
								}			
							});
						}
						else
						{	
							jQuery('#customerSubmit').css('display','none');
							jQuery('#professionalSubmit').css('display','none');
							window.location.href=a[1];
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
								//console.log(data);
								var res = data.split(" ");
								if(res[0]==response.id)
								{	
									jQuery('#customerSubmit').css('display','none');
									jQuery('#professionalSubmit').css('display','none');
									window.location.href=res[1];
								}			
							});
						}
						else
						{	
							jQuery('#customerSubmit').css('display','none');
							jQuery('#professionalSubmit').css('display','none');
							window.location.href=res[1];
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
   

<body class="boxed">

  <!-- Navigation -->
  <div class="row" style="padding-bottom: 50px;">
    <nav id="headerfix" class="row navbar navbar-inverse-new navbar-fixed-top" role="navigation">
        <div class="container" style="max-width: none!important;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="width:auto;background-color: rgb(44, 160, 192);">
                    <span class="sr-only" >Toggle navigation</span>
                    <span class="icon-bar" style="background-color:#FFF"></span>
                    <span class="icon-bar" style="background-color:#FFF"></span>
                    <span class="icon-bar" style="background-color:#FFF"></span>
                </button>
               <a class="navbar-brand page-scroll" href="<?=base_url();?>"><img src="<?=base_url();?>newcss/img/logo.png" style="width: 108px;margin-top: -1px;"></a>
                           </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left" style='font-size: 13px;font-family: "Roboto Slab","Helvetica Neue",Helvetica,Arial,sans-serif;'>
                    <li>
                        <a href="<?=base_url()?>search/No_Area" class="<?php if(!empty($pageName)){ if($pageName=='getlistall'){	echo 'active';	}}?>">Salon</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>Forum" id="blog" class="<?php if(!empty($pageName)){ if($pageName=='blog1'){	echo 'active';	}}?>">Forum</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>browsePhoto" class="<?php if(!empty($pageName)){ if($pageName=='browsePhoto'){	echo 'active';	}}?>">Browse Photos</a>
                    </li>
                    <li>
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle <?php if(!empty($pageName)){ if($pageName=='offers'){	echo 'active';	} else if($pagename=='reverseAuctionPage'){	echo 'active';	}}?>">Offers <b class="caret"></b></a>
                <ul class="dropdown-menu" style="background-color: rgba(0, 0, 0, 0.63);">
                    <li> <a href="<?=base_url();?>offers">Deal</a></li>
                    
                    <li><a href="<?=base_url()?>reverseAuction">Make Offers</a></li>
                    
                </ul>
              
                    </li>
                    
                    <?php if($this->session->userdata('user_level')!='4' && $this->session->userdata('user_level')!='1' && $this->session->userdata('user_level')!='2') { ?>
                    <li>
                       <a href="<?=base_url();?>getlists" class="<?php if(!empty($pageName)){ if($pageName=='getlist'){	echo 'active';	} if($pageName=='cusgetlist'){echo 'active';}}?>">Get Listed <?php if(!empty($pageName)){ if($pageName=='getlist'){	echo 'Professional';	}if($pageName=='cusgetlist'){echo 'Customer';}}?></a></li>
						<?php } ?>
                    
                   
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle <?php if(!empty($pageName)){ if($pageName=='about'){	echo 'active';	}}?>">About Us <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="background-color: rgba(0, 0, 0, 0.63);">
                            <li>
                                <a href="<?=base_url()?>about">About Us</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>contact">Contact Us</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>faq">FAQ's</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>terms">Term & Privacy</a>
                            </li>
                            
                        </ul>
                    </li>
                    </ul>
                <ul class="navbar-nav navbar-right" style='font-size: 13px; font-family: "Roboto Slab","Helvetica Neue",Helvetica,Arial,sans-serif;'>
                <?php if(!empty($this->session->userdata['username'])){?>
						<li class="dropdown">
                        
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?= ucfirst ($this->usermodel->getLoginName($this->session->userdata['username'])); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu" style="background-color: rgba(0, 0, 0, 0.63);margin-top: 13px;">
                            
                             <?php $result=$this->usermodel->checkuserbyname($this->session->userdata['username']); 
						if(!empty($result)) {
						?>
						<li><a  href="<?=base_url();?>merchant/Salon/<?= $this->session->userdata['user_id']?>"  title="<?= $this->usermodel->getLoginName($this->session->userdata['username']); ?>">Profile</a></li>
						<?php } else { ?>
						<li><a href="<?=base_url();?>userprofile/<?= $this->session->userdata['user_id']?>"  title="<?= $this->usermodel->getLoginName($this->session->userdata['username']); ?>">Profile</a></li>
						<?php }?>
                            
                            
                            <?php 
						if($this->session->userdata('user_id'))
						{
		
					if($this->session->userdata('user_level')==2) { ?>
					<li><a href="<?= base_url();?>dashboard" >Dashboard</a></li>
					<?php }} ?>
						<?php 
						if($this->session->userdata('user_id'))
						{
		
					if($this->session->userdata('user_level')!=2) { ?>
              <li><a href="<?= base_url();?>profile">My Account</a></li><?php }}?>
                              <li class="divider"></li>
                            <li>
                             <a href="<?=base_url();?>logout">Logout</a>
                            </li>
                           
                            
                        </ul>
                        </li>
						
						<?php } else { ?>
                     
                    <li>
  <a class="" href="#" >
        <span class="glyphicon glyphicon-shopping-cart">
        </span>
        Cart (
               0
           ) |
        </a>                      <a data-toggle="modal" href="#signip">LOGIN |</a> <a data-toggle="modal" href="#signUp"> SIGNUP</a>
                    </li>
                    <?php } ?>	
						<?php 
						if($this->session->userdata('user_id'))
						{
		
					if($this->session->userdata('user_level')!=2) { ?>
              
					<li style=" margin-top:15px"><a href="<?= base_url();?>reward" class="" style="padding:12px; border-radius:5px; ">Reward Point(<?php echo $this->session->userdata('reward');?>)</a></li>
    					<li style=" margin-top:15px"><a href="<?= base_url();?>whishlist" class="wishList" style="padding:12px; border-radius:5px; ">WishList</a></li>
 <li style="margin-top:15px">     <a class="" href="<?= base_url();?>Cart" >
       <span class="glyphicon glyphicon-shopping-cart">
        </span>
        Cart (
        
                <?php echo $this->cart->total_items(); ?>
            ) </li>
							<?php } }?>		
                    </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
</div>
<?php /* <body class="boxed">
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
</div></div>*/?>
<!-- Modal HTML -->
    <div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">Sign Up </h4>
                  </div>
  
                  <div class="modal-body">
                   <div class="form-group" style="display: inline;">
           
                   <a title="Facebook"  onclick="fblogin()" style="float:left; padding-bottom: 20px;"><img id="fbicn"/></a>
                   <a href="<?php echo base_url();?>auth_oa2/customer" title="Google"  class="" style="float:right; padding-bottom: 20px;"><img id="gmalicn"/></a>
                   
                   
                   </div>
                   
                 <form id="registrationform" method="post" action="<?= base_url();?>register" >
				  
				 
                        <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" style="padding-left: 0px;margin-bottom: 10px;"><label for="username">First Name</label>
                            <input type="hidden" name="username" id="userName" class="sign-form" autocomplete="off">
                            <input type="text" name="firstName" id="firstName" placeholder="Enter your First name" class="form-control inputOrange" pattern="[a-zA-Z]+" required/>
                        </div><div class="col-md-6" style="padding-left: 0px; margin-top: -4px; margin-bottom: 10px;
padding-right:0px">
                        <label for="username" >Last Name</label>
                        <input type="text" name="lastName" id="lastName" placeholder="Enter your Last name" class="form-control inputOrange" pattern="[a-zA-Z]+" required/>
                        </div>
                        </div>
                                               <div class="form-group">
                            <label for="email2">Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter your email" class="form-control inputOrange" required/>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control inputOrange" required/>
                            <input type="hidden" name="facebookId" id="facebookId" class="sign-form" autocomplete="off">
				<input type="hidden" name="mainsubmit" id="mainsubmit" class="sign-form" autocomplete="off">
				
                        </div>
                       
						
                        <p>
                        	By signing up you confirm that you accept the <a href="<?=base_url()?>terms" title="Terms" class="linkOrange">Terms Of Service</a> and that you have read our <a href="<?=base_url()?>terms" title="Data Use Policy" class="linkOrange">Privacy Policy</a>.
                        </p>
                  <div class="modal-footer">
		     <input type="submit" class="btn btn-primary btn-lg center-block" value="Sign Up" name="customersubmit" id="customerSubmit" style="max-width:30%" />
		<div style="padding-top:2%">
        <a onClick="signupbox();" title="Singup"  style="float:left"><img id="listbss"/></a>	
  <p>Already Have An Account? <a onClick="showlogin();" title="Login" class="linkOrange">Log in!</a></p>
                  </div></div></form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      </div>
       <!-- Modal sign in-->
            <div class="modal fade" id="signip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">Sign In </h4>
                  </div>
                  <div class="modal-body">
                  <div class="form-group">
           <center>

                   <a onclick="fblogin()" title="Facebook"  class="" ><img id="fbicn"/></a>
                   <a href="<?php echo base_url();?>auth_oa2/customer" title="Google"  class="" style="padding-bottom: 20px;"><img id="gmalicn"/></a>
                   </center>
                   
                   </div>
                   <form method="post" id="form_login" action="<?=base_url();?>auth/login">
				  
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input type="email" name="login" id="emailLogin" placeholder="Enter your email" class="form-control inputOrange" required/>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password"  name="password" id="logpassword" placeholder="Enter your password" class="form-control inputOrange" required/>
                        </div>
                       <input type="hidden" name="mainsubmit" id="mainsubmit" class="sign-form" autocomplete="off">
                  <div class="modal-footer"></form>
				        <input  type="submit" id="professionalSubmit" class="btn btn-success btn-lg center-block" style="max-width:30%" value="Login" name="submitLogin"/>
			
  <p>Don't Have An Account? <a onClick="showsinup();" title="Login" class="linkOrange">Sign Up!</a></p>
  <p><a onClick="showspwd();" title="Login" class="linkOrange">Forgot Password?</a></p>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
           </div> 
            
<!-- Modal Business listing -->
 <div class="modal fade" id="busness" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">Create your business listing </h4>
                  </div>
  
                  <div class="modal-body">
                   <div class="form-group" style="display: inline;">
           
                   <a onclick="fbloginbsn()" title="Facebook"  class="" style="float:left; padding-bottom: 20px;"><img id="fbicn"/></a>
                   <a href="<?php echo base_url();?>auth_oa2/saloon" title="Google"  class="" style="float:right; padding-bottom: 20px;"><img id="gmalicn"/></a>
                   
                   
                   </div>
           
                   <form id="registrationform2" method="post" action="<?= base_url();?>registerBusiness">
                        <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" style="padding-left: 0px;margin-bottom: 10px;">
                            <input type="hidden" name="username" id="userNamea" class="sign-form" autocomplete="off">
                            <label for="username">First Name</label>
                            <input type="text" name="firstName" id="firstNamea" placeholder="Enter your First name" class="form-control inputOrange" pattern="[a-zA-Z]+" required/>
                        </div><div class="col-md-6" style="padding-left: 0px; margin-top: -4px; margin-bottom: 10px;
padding-right:0px">
                        <label for="username" >Last Name</label>
                        <input type="text" name="lastName" id="lastName" placeholder="Enter your Last name" class="form-control inputOrange" pattern="[a-zA-Z]+" required/>
                        </div>
                        </div>
                                               <div class="form-group">
                            <label for="email2">Email</label>
                            <input type="email"  name="email" id="email" placeholder="Enter your email" class="form-control inputOrange" required/>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control inputOrange" required/>
                        </div>
                       
						
                        <p>
                        	By signing up you confirm that you accept the <a href="<?=base_url()?>terms#service-two" title="Terms" class="linkOrange">Terms Of Service</a> and that you have read our <a href="<?=base_url()?>terms" title="Data Use Policy" class="linkOrange">Privacy Policy</a>.
                        </p>
                        <input type="hidden" name="facebookId" id="facebookId" class="sign-form" autocomplete="off">
				<input type="hidden" name="mainsubmit" id="mainsubmit" class="sign-form" autocomplete="off">
                  <div class="modal-footer">
				        <input type="submit" class="btn btn-primary btn-lg center-block" value="Sign Up" id="signup" name="signup" style="max-width:30%"/></form>
		<div style="padding-top:2%">
      <p><a onClick="businsshide();" title="Login" class="linkOrange">Oops, I am a Client!</a></p>  	
  <p>Already Have An Account? <a onClick="showloginbus();" title="Login" class="linkOrange">Log in!</a></p>
                  </div></div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      </div>

             <!-- Modal forget pwd-->
            <div class="modal fade" id="pwdfrg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">forgot password? </h4>
                  </div>
                  <div class="modal-body">
                  
                   <form action="<?= base_url(); ?>auth/forgot_password" method="post" accept-charset="utf-8" id="forgotpwd">
				  
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input type="text"  name="login" id="login" placeholder="enter email or login" class="form-control inputOrange" required/>
                        </div>
           <p>Please enter the email address you signed up with and we'll send you a password reset link.</p>
                       
                  <div class="modal-footer"></form>
				        <input type="submit" class="btn btn-danger btn-lg center-block" value="Reset Password" name="resetPassword" style="max-width:30%"/>
			
  <p>Already Have An Account? <a onClick="showloginpwd();" title="Login" class="linkOrange">Log in!</a></p>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
           </div> 
             <!-- Modal forget pwd-->
            <div class="modal fade" id="resetSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  
                        <div class="form-group">
                           <p><center>	Reset passsword link has been successffully send to your mail id</center></p>
                        </div>
           
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
            </div>
<?php /*?> <!-- Modal cart-->
            <div class="modal fade" id="cartSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
                  </div>
                  <div class="modal-body">
                  
                        <div class="form-group">
                        
                          	<?php if(!($pageName=='register')){ echo form_open('path/to/controller/update/function'); ?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
  <th>QTY</th>
  <th>Item Description</th>
   <th>Orignal Price</th>
   <th>Discounted Price</th>
  <th style="text-align:right">Booking Price</th>
  <th style="text-align:right">Sub-Total</th>
  <th style="text-align:right">Action</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr>
	  <td><?php echo $items['qty']; ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:center"><?php echo $this->cart->format_number($items['oprice']); ?></td>
	  <td style="text-align:center"><?php echo $this->cart->format_number($items['discount']); ?></td>
	  
      <td style="text-align:center"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:center"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
	<td style="text-align: center; "> <a href="<?php echo base_url().'users/removecart/'.$items['rowid']?>" style="color:red" title="Remove From Cart"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
  <td colspan="4"> </td>
  <td class="right"><strong>Total</strong></td>
  <td class=""  colspan="2"><?php echo $this->cart->format_number($this->cart->total()); ?></td>
</tr>

</table>

<p><?php //echo form_submit('', 'Update your Cart');
echo form_close();
			}?></p>

                        </div>
           <div class="modal-footer"></form>
				        <a href="#" id="checoutvalue" class="btn btn-success btn-lg center-block" style="max-width:30%">Checkout</a></div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
            </div>
    <?php */?>        
               
   
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!--<script src="<?=base_url();?>newcss/js/classie.js"></script>
    <script src="<?=base_url();?>newcss/js/cbpAnimatedHeader.js"></script>
-->
    <!-- Contact Form JavaScript -->
    <script src="<?=base_url();?>newcss/js/jqBootstrapValidation.js"></script>
   

    <!-- Custom Theme JavaScript -->
    <!--<script src="<?=base_url();?>newcss/js/agency.js"></script>-->
<script>$(document).foundation()</script> 
<?php if (!(($pageName=='getlist') ||($pagename=='reversecAuctionPage') ||($pagename=='revAucLP') ||($pagename=='profile')))
{ ; ?> 
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

 <!--<script src="<?=base_url();?>newcss/js/contact_me.js"></script>
-->
 <script src="<?=base_url();?>newcss/js/jquery.js"></script>

	<?php }?>
	 <script>
	$(document).ready(function(){
			
			var max = 999;
			var $wraps = $('#userName');
			$('#firstName').blur(function() {
				//alert('dsfsdf');
				$('#userName').val('');
				var num = +$wraps.val();
				num=num+Math.ceil(Math.random() * max);	
				$wraps.val($('#firstName').val()+num);
			});
			
			var $wrap = $('#userNamea');
			$('#firstNamea').blur(function() {
				//alert("sdfsdfsd");
				$('#userNamea').val('');
				var num = +$wrap.val();
				num=num+Math.ceil(Math.random() * max);	
				$wrap.val($('#firstNamea').val()+num);
			});
	   
	});
</script> 
     <!-- jQuery -->
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
     <script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
     <script src="<?=base_url();?>assets/js/pages/home.js"></script>
<script src="<?=base_url()?>assets/js/pages/user.js"></script>	

	
 <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>newcss/js/bootstrap.min.js"></script>
 	<!--<script type="text/javascript">
		$(function() {
    var header = $(".navbar-fixed-top");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 100) {
            header.removeClass('navbar-inverse').addClass("navbar-inverse-new");
        } else {
            header.removeClass("navbar-inverse-new").addClass('navbar-inverse');
        }
    });
});

		</script>-->
       <?php if(!($pageName=='register')){?>
        <script>
        $('#checoutvalue').click(function(){
			var cart='<?php echo($this->cart->total_items())?>';
			if(cart=="0"){
				
				alert('Your Cart Is Empty Please Add Item First To Checkout.');
				}
			else{
				window.location = baseurl+'Checkout';
				}
			
			});
        
        </script><?php }?>