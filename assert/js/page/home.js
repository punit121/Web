$('#form_login').validate({
		//consloe.log('sdfsdfsdf');
        ignore: null,
    	ignore: 'input[type="hidden"]',
 		rules: {
			login: {
				required: true,
				email:true
			},
			password: {
				required: true,
				 minlength: 6,
				/* remote:{
					 
					url:'admin/checkExistEmail',
					type:'post',
					data:
						{
							name:function()
							{
							return $('#emailLogin').val();
							}
						}
				}*/
				
			}
			
 		},
 		messages: {
			
			login: {
				required: "please provide email.",
				email: "please provide valid email"
			},
			password: {
				required: "please provide your password",
				minlength: "Minimum length should be 6",
				remote:"Incorrect login details!"
			}
 		},
		
	});
	/* getList Registraion form */
	
	$('#registrationForm').validate({
        ignore: null,
    	ignore: 'input[type="hidden"]',
 		rules: {
		
			username: {
				required: true,
				minlength: 5
			},
			lastName: {
				required: true,
				minlength: 3
			},
			password: {
				required: true,
				minlength: 6
			},
			email: {
				required: true,
				email:true,
			}
 		},
 		messages: {
			username: {
				required: "please provide firstName",
				minlength: "minimum length should be 5"				
			},
			lastName: {
				required: "please provide your lastName",
				minlength: "minimum length should be 3"	
			},
			password: {
				required: "please provide your password",
				minlength: "minimum length should be 6"	
			},
			email: {
				required: "please provide email",
				email: "please provide valid email"
			}
 		},	
	}); 
	


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
// JavaScript Document