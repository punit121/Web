<!DOCTYPE html>
<html lang="en">

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCJnj2nWoM86eU8Bq2G4lSNz3udIkZT4YY&sensor=false"></script>
    <script src="<?=base_url();?>assets/js/foundation.min.js"></script>
    <script src="http://api.html5media.info/1.1.6/html5media.min.js"></script>
<link rel="icon" href="<?= base_url(); ?>assets/images/logo.jpg" type="image/ico">
	
	<script>
var baseurl='<?=base_url();?>';
function FacebookInviteFriends()
{
FB.ui({ method: 'apprequests', 
   message: 'Welcome to Zersey'});
}
$(document).ready(function(){
	
	var a = "<?php if($this->uri->segment(1)){echo $this->uri->segment(1); } else {echo 0;}?>";
	if(a =="signup")
	{
		
		$('#signUp').modal('show');
		}
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
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61123198-1', 'auto');
  ga('send', 'pageview');

</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flexisel.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flexisel.js"></script>	

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Zersey is the most popular place to find and book top beauty salons. Become part of one of the largest beauty social network and know about latest trends and beauty tips">
    <meta name="author" content="Zersey">
   <meta name="keywords" content="Book Salon & Spa Appointments and discover Beauty Style & Trends">
    <title>Book Salon & Spa Appointments and discover Beauty Style & Trends</title>

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
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
	<style>.navbar-right>li{
	list-style:none;
	margin-top:0px!important;
	}
    label.error {
color: #c60f13;
}
.error {
color: red;
font-weight: bold;
font-size: 12px;
}
input.error, textarea.error {
border-color: #c60f13;
background-color: rgba(198, 15, 19, 0.1);
}</style>
<script>
 $(window).load(function() {
			
          event.preventDefault();
          var addressId = 'serviceArea';
 		
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
             'latLng': new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
				//alert(results[0].address_components[5].long_name);
				//rurl="<?= $_SERVER['HTTP_REFERER']?>";
				//var arr = rurl.split("/");
				//var rul = arr[0] + "//" + arr[2]
				//var url = window.location.href
				//var arr = url.split("/");
				//var ul = arr[0] + "//" + arr[2]
				
				//alert(results[0].address_components[4].long_name);
				//alert((results[0].address_components[4].long_name) =="Delhi" || results[0].address_components[4].long_name=='Gurgaon' || (results[0].address_components[4].long_name =='Noida' || results[0].address_components[4].long_name =='Faridabad' || results[0].address_components[4].long_name) =="New Delhi");
			  //if( (results[0].address_components[4].long_name) =="Delhi" || results[0].address_components[4].long_name=='Gurgaon' || results[0].address_components[4].long_name =='Noida' || results[0].address_components[4].long_name =='Faridabad' || (results[0].address_components[4].long_name) =="New Delhi"){
				    if (status == google.maps.GeocoderStatus.OK)
             {
				
				 //alert(results[0].address_components[i].types[b]);
				  for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
			
			
                if (results[0].address_components[i].types[b] == "sublocality_level_1") {
                    //this is the object you are looking for
					
                    var city= results[0].address_components[i];
					console.log(city);
					var add= city.long_name;
					//alert(city);
					//  var n = add.split(" ");
    				//var add2= n[n.length - 1];
					 $("#" + addressId).val(add);
					
				    break;
                }
				
            }
				  }}
				  //alert(results[0].formatted_address);
			  else
                $("#error").append("Unable to retrieve your address<br />");
				/*else{
					if(ul==rul){}
				else{
				window.location=baseurl+"Forum";
				//console.log(baseurl+"Forum");
				//window.location.replace(baseurl+"Forum");  
			  }
			*/	
		
            });
          },
          function(positionError){
            $("#error").append("Error: " + positionError.message + "<br />");
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
		  
        });

</script>
<script>
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
			 //alert( $('#mainsubmit').val);
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
			var $wraps = $('#userName');
			$('#firstName').blur(function() {
				//alert("sdfsdfsd");
				$('#userName').val('');
				var num = +$wraps.val();
				num=num+Math.ceil(Math.random() * max);	
				$wraps.val($('#firstName').val()+num);
			});
			var max = 999;
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
					var a=data.split(" ");
					//console.log(a[0]);					
					//alert (a[1]);
						if(a[0]=='not_registered')
						{
							$.post(baseurl+'users/LoginAndSignupByfacebook',dataString,function(data){
								//console.log(data);
								var res = data.split(" ");
								if(res[0]==response.id)
								{	
									FacebookInviteFriends();
									window.location.href=baseurl;
									//location.reload();
									//window.location.href=a[1];
								}			
							});
						}
						else
						{	
							window.location.href=baseurl;
							//location.reload();
							//window.location.href=a[1];
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
						var res = data.split(" ");
						if(res[0]=='not_registered')
						{	
							$.post(baseurl+'users/LoginAndSignupByfacebookpat',dataString,function(data){
								console.log(data);
								var data = data.split(" ");
								if(data[0]==response.id)
								{	
									/*jQuery('#customerSubmit').css('display','none');
									jQuery('#professionalSubmit').css('display','none');*/
									FacebookInviteFriends();
									window.location.href=baseurl;
									//location.reload();
								}			
							});
						}
						else
						{	
							/*jQuery('#customerSubmit').css('display','none');
							jQuery('#professionalSubmit').css('display','none');
							window.location.href=res[1];*/
							window.location.href=baseurl;
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
   <script type='text/javascript'>function chatwoo_a() {var s = document.createElement('script');s.type = 'text/javascript';s.src = "https://chatwoo.com/c1.jsp?host=" + window.location.host + "&hostname=https://chatwoo.com";document.getElementsByTagName('head')[0].appendChild(s);}function chatwoo_d(r) {var s = document.createElement('script');s.type = 'text/javascript';s.src = r.d;document.getElementsByTagName('head')[0].appendChild(s);}chatwoo_a();</script>  
</head>
<?php echo $this->session->flashdata('activation');?>
<body id="page-top" class="index" onload="<?php  $a=explode('/', $_SERVER['HTTP_REFERER']); if(end($a)=="register" || $a[4]=="activate" || end($a)=="LoginAndSignupBygoogle" || end($a)=="LoginAndSignupBygoogleclient"){?> FacebookInviteFriends();<?php }?>">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?=base_url();?>"><img src="<?=base_url();?>newcss/img/logo.png" style="width: 108px;margin-top: -11px;"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php if($this->session->userdata['user_level']==9){?>
					<li>
                         <a href="<?=base_url();?>postblogdata">Post blog</a>
                            
                    </li>
					
					<?php }?>
                   
                    <li>
                         <a href="<?=base_url();?>browsePhoto">Discover</a>
                            
                    </li>
                       <li><a href="<?=base_url()?>Forum">Ask</a></li>
                     <li>
                         <a href="<?=base_url();?>Zersey&Me">Feeds</a>
                            
                    </li>
                    <li>
                        <a href="<?=base_url()?>search/No_Area" class="<?php if(!empty($pageName)){ if($pageName=='getlistall'){	echo 'active';	}}?>">Services</a>
                    </li>
                 <?php /*?>    <li>
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle <?php if(!empty($pageName)){ if($pageName=='zersynme'){	echo 'active';	} else if($pagename=='blog1'){	echo 'active';	}}?>">Forum <b class="caret"></b></a>
                <ul class="dropdown-menu" style="background-color: rgba(0, 0, 0, 0.63);">
                    <li> <a href="<?=base_url();?>Zersey&Me">Blog</a></li>
                     <li class="divider"></li>
                    <li><a href="<?=base_url()?>Forum">Community</a></li>
                    
                </ul>
              
                    </li>
                    <li>
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle">Offers <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li> <a href="<?=base_url();?>offers">Deal</a></li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url()?>reverseAuction">Make Offers</a></li>
                    
                </ul>
                    </li>
                    <li>
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle">About <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?=base_url()?>about">About Us</a></li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url()?>contact">Contact Us</a></li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url()?>faq">FAQs</a></li>
                    <li class="divider"></li>
                    <li><a href="<?=base_url()?>terms">Terms & Privacy</a></li>
                    
                </ul>
            
                    </li>*/?>
             <?php if(!empty($this->session->userdata['username'])){?>
             <li><a href="<?=base_url();?>logout">Logout</a></li>
						
						<?php $result=$this->usermodel->checkuserbyname($this->session->userdata['username']); 
						if(!empty($result)) {
						?>
						<li><a class="textlengthcontrol" href="<?=base_url();?>merchant/Salon/<?= $this->session->userdata['user_id']?>" style="color: #030100;border-radius: 20px;background: rgba(21, 145, 166, 0.43);" title="<?= $this->usermodel->getLoginName($this->session->userdata['username']); ?>"><?= $this->usermodel->getLoginName($this->session->userdata['username']); ?></a></li>
						<?php } else { ?>
						<li><a class="textlengthcontrol" href="<?=base_url();?>userprofile/<?= $this->session->userdata['user_id']?>" style="color: #030100;border-radius: 20px;background: rgba(21, 145, 166, 0.43);" title="<?= $this->usermodel->getLoginName($this->session->userdata['username']); ?>"><?= $this->usermodel->getLoginName($this->session->userdata['username']); ?></a></li>
						<?php }} else { ?>
                    <li>
                        <a data-toggle="modal" href="#signip">Login</a>
                    </li>
                    <li>
                        <a data-toggle="modal" href="#signUp">Sign Up</a>
                    </li>
                    <?php } ?>	
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
     <div class="videoContainer" >
     
    <video loop autoplay preload="auto" id="pretzel-video" class="video-playing" poster="<?= base_url();?>vedio/1.png">
        <source src="<?php echo base_url();?>vedio/1.mp4" type="video/mp4">
        <source src="<?php echo base_url();?>vedio/1.webm" type="video/webm">
       
      </video>
</div>
        <div class="container" >
            <div class="intro-text">
            <div class="intro-heading">book the way you look</div>
                <div class="intro-lead-in">Find & connect with great salons and spa near you</div>
                
                
            </div>
        </div>
        <div id="search">
        <div class="row">
<div id="searcholder">
  <div class="col-lg-12 cl"> 
    <div class="input-group shadow">
      <input type="text" placeholder="Select Area" class="testcs appointment-input left selectAuto  form-control" id="serviceArea" style="width:50%; border-radius:0px;">
					<input type="text" placeholder="Search" class="testcs appointment-input left form-control" id="serviceName" name="serviceOrLocation" style="width:50%;">	
      <span class="input-group-btn">
        <a href="#" class="btn btn-default red-color SearchIconButton" type="button">SEARCH</a>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->

</div>
</div><!-- /.row -->
        </div>
   

    </header>

    
<div class="col-lg-12">  <h2 style="text-align:center; margin:35px 0;"> Our Services</h2></div>
    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            
            <div class="row">


                <div class="col-md-3 col-sm-6 portfolio-item">
                 <a href="<?= base_url();?>Forum" class="portfolio-link" style="text-decoration:none">
                <div class="portfolio-caption box1">
                        <h4>Beauty Network</h4>
                        <p class="text-muted">Latest beauty feeds</p>
                    </div>
                   
                       
                        <img src="<?=base_url();?>newcss/img/portfolio/offer1.jpg" class="img-responsive image-offer" alt="">
                    </a>
                    
                </div>
                <div class="col-md-3 col-sm-6 portfolio-item">
                    
                    <a href="<?=base_url();?>browsePhoto" class="portfolio-link"  style="text-decoration:none">
                        
                        <img src="<?=base_url();?>newcss/img/portfolio/offer2.jpg"  class="img-responsive image-offer" alt="">
                    
                     <div class="portfolio-caption box2">
                        <h4>Look Book</h4>
                        <p class="text-muted">Check out latest styles</p>
                    </div></a>
                </div>
                <div class="col-md-3 col-sm-6 portfolio-item">
                <a href="<?=base_url();?>offers" class="portfolio-link" style="text-decoration:none">
                <div class="portfolio-caption box3">
                
                        <h4>Best Deals</h4>
                        <p class="text-muted">Avail great discounts</p>
                    </div>
                        <img src="<?=base_url();?>newcss/img/portfolio/offer3.jpg"  class="img-responsive image-offer" alt="">
                    
                    </a>
                </div>
               
                  <div class="col-md-3 col-sm-6 portfolio-item">
                   
                    <a href="<?=base_url();?>reverseAuction" class="portfolio-link"  style="text-decoration:none">
                        
                        <img src="<?=base_url();?>newcss/img/portfolio/offer4.jpg"  class="img-responsive image-offer " alt="">
                   
                   <div class="portfolio-caption box4">
                        <h4>Make Your Own Offers</h4>
                        <p class="text-muted">Avail offers from salon near you</p>
                    </div></a>
                </div>
             
            </div>
        </div>
    </section>
<?php $this->load->view('layout/footernew');?>
<!-- Modal HTML -->
    <div class="modal fade" id="signUp" style="position:absolute !important" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Sign Up </h4>
                  </div>
  
                  <div class="modal-body">
                   <div class="form-group" style="height: 50px">
           
                   <a title="Facebook"  onclick="fblogin()" style="float:left; padding-bottom: 20px;"><img id="fbicn" src="<?php echo base_url();?>newcss/img/facebook.png"/></a>
                   <a href="<?php echo base_url();?>auth_oa2/customer" title="Google"  class="" style="float:right; padding-bottom: 20px;"><img id="gmalicn" src="<?php echo base_url();?>newcss/img/googe.png"/></a>
                   
                   
                   </div>
                   
                   <form id="registrationform" method="post" action="<?= base_url();?>register" >
				  
				 
                        <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" ><label for="username">First Name</label>
                            <input type="hidden" name="username" id="userName" class="sign-form" autocomplete="off">
                            <input type="text" name="firstName" id="firstName" placeholder="Enter your First name" class="form-control inputOrange sign-form notsubmit" pattern="[a-zA-Z]+" required/>
                        </div><div class="col-md-6" >
                        <label for="username" >Last Name</label>
                        <input type="text" name="lastName" id="lastName" placeholder="Enter your Last name" class="form-control inputOrange sign-form notsubmit" pattern="[a-zA-Z]+" required/>
                        </div>
                        </div>
                         <div class="form-group" style="padding-bottom:30px">
                          <div class="col-md-6">
                            <label for="email">Phone No.</label>
                            <input type="text" name="phno" id="phno" placeholder="Enter your mobile no" class="form-control inputOrange sign-form notsubmit" required/>
                        </div>
                      <div class="col-md-6" >
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="Enter your email" class="form-control inputOrange sign-form notsubmit" required/>
                        </div></div>
                        <div class="col-md-12 form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Enter your password" class="form-control inputOrange sign-form notsubmit" required/>
                            <input type="hidden" name="facebookId" id="facebookId" class="sign-form" autocomplete="off">
				<input type="hidden" name="mainsubmit" id="mainsubmit" class="sign-form" autocomplete="off">
				
                        </div>
                       
						
                        <p>
                        	By signing up you confirm that you accept the <a href="#" title="Terms" class="linkOrange">Terms Of Service</a> and that you have read our <a href="#" title="Data Use Policy" class="linkOrange">Privacy Policy</a>.
                        </p>
                  <div class="modal-footer"></form>
		     <input type="submit" class="btn btn-primary btn-lg center-block" value="Sign Up" name="customerSubmit" id="customerSubmit" />
		<div style="padding-top:2%">
        <a onClick="signupbox();" title="Singup"  style="float:left"><img id="listbss" src="<?php echo base_url();?>newcss/img/LIST.png"/></a>	
  <p>Already Have An Account? <a onClick="showlogin();" title="Login" class="linkOrange">Log in!</a></p>
                  </div></div></form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      </div>
       <!-- Modal sign in-->
            <div class="modal fade" id="signip" style="position:absolute !important" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Sign In </h4>
                  </div>
                  <div class="modal-body">
                  <div class="form-group" style="height: 50px">
           <center>
                   <a onclick="fblogin()" title="Facebook"  class="" ><img id="fbicn" src="<?php echo base_url();?>newcss/img/facebook.png"/></a>
                   <a href="<?php echo base_url();?>auth_oa2/customer" title="Google"  class="" style="padding-bottom: 20px;"><img id="gmalicn" src="<?php echo base_url();?>newcss/img/googe.png"/></a>
                   </center>
                   
                   </div>
                   <form method="post" id="form_login" action="<?=base_url();?>auth/login">
				  
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input type="email" name="login" id="emailLogin" placeholder="Enter your email" class="form-control inputOrange"/>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password"  name="password" id="logpassword" placeholder="Enter your password" class="form-control inputOrange" required/>
                        </div>
                       
                  <div class="modal-footer"></form>
				        <input type="submit" class="btn btn-success btn-lg center-block" value="Login" name="submitLogin"/>
			
  <p>Don't Have An Account? <a onClick="showsinup();" title="Login" class="linkOrang" style="cursor:pointer">Sign Up!</a></p>
  <p><a onClick="showspwd();" title="Login" class="linkOrange" style="cursor:pointer">Forgot Password?</a></p>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
           </div> 
            
<!-- Modal Business listing -->
 <div class="modal fade" id="busness" tabindex="-1" style="position:absolute !important" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Create your business listing </h4>
                  </div>
  
                  <div class="modal-body">
                   <div class="form-group" style="height: 50px">
           
                   <a onclick="fbloginbsn()" title="Facebook"  class="" style="float:left; padding-bottom: 20px;"><img id="fbicn" src="<?php echo base_url();?>newcss/img/facebook.png"/></a>
                   <a href="<?php echo base_url();?>auth_oa2/saloon" title="Google"  class="" style="float:right; padding-bottom: 20px;"><img id="gmalicn" src="<?php echo base_url();?>newcss/img/googe.png"/></a>
                   
                   
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
                        	By signing up you confirm that you accept the <a href="#" title="Terms" class="linkOrange">Terms Of Service</a> and that you have read our <a href="#" title="Data Use Policy" class="linkOrange">Privacy Policy</a>.
                        </p>
                        <input type="hidden" name="facebookId" id="facebookId" class="sign-form" autocomplete="off">
				<input type="hidden" name="mainsubmit" id="mainsubmit" class="sign-form" autocomplete="off">
                  <div class="modal-footer">
				        <input type="submit" class="btn btn-primary btn-lg center-block" value="Sign Up" id="signup" name="signup"/></form>
		<div style="padding-top:2%">
      <p><a onClick="businsshide();" title="Login" class="linkOrange">Oops, I am a Client!</a></p>  	
  <p>Already Have An Account? <a onClick="showloginbus();" title="Login" class="linkOrange">Log in!</a></p>
                  </div></div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      </div>

             <!-- Modal forget pwd-->
            <div class="modal fade" id="pwdfrg" tabindex="-1" role="dialog" style="position:absolute !important" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
				        <input type="submit" class="btn btn-danger btn-lg center-block" value="Reset Password" name="resetPassword"/>
			
  <p>Already Have An Account? <a onClick="showloginpwd();" title="Login" class="linkOrange">Log in!</a></p>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
              <!-- Modal forget pwd-->
            <div class="modal fade" id="resetSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  
                        <div class="form-group">
                           <p><center>	Password Change Link has been to sent to you e-mail address.</center></p>
                        </div>
           
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
              <!-- Modal failed in Login-->
            <div class="modal fade" id="loginfail" tabindex="-1" role="dialog" style="position:absolute !important" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  
                        <div class="form-group">
                           <p><center>	Incorrect Login Details.</center></p>
                        </div>
           
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
     <!-- jQuery -->
    <script src="<?=base_url();?>newcss/js/jquery.js"></script>

   
    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?=base_url();?>newcss/js/classie.js"></script>
    <script src="<?=base_url();?>newcss/js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="<?=base_url();?>newcss/js/jqBootstrapValidation.js"></script>
    <script src="<?=base_url();?>newcss/js/contact_me.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>newcss/js/agency.js"></script>
<script>$(document).foundation()</script> 
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="<?=base_url();?>assets/js/pages/home.js"></script>
 <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>newcss/js/bootstrap.min.js"></script>
 <script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/js/pages/user.js"></script>	

 <!-- Google Analytics Code -->
   <?php include_once("analyticstracking.php") ?>

</body>

<!--<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2IBktQJNpyk5mrcIkMIXxyaJ8uCDKvJ3';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>-->
</html>