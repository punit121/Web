 	
<script>
function video_dv()

	{
		$("#video_url_div").toggle();
	}

</script>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
				<!----------left part------------------>
			
			<!-----middle part-------->
			<div class="col-lg-8 col-md-8 col-sm-8 up_center_div" style="margin-left: 16.66666667%;">
				
				<div class="sharebox col-lg-12 col-md-12 col-sm-12" style="text-align:center">
				<img src="assert/images/Right_Icon.png" style="width: 100px;">
					  <p style="font-weight:bold;font-size:25px;">"You have been registered on the website. Try logging-in using your registered email address and password"</p>
					  <div style="text-align:right">
					         <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default">Sign In Again</a>
					  </div>
				</div>
							<!-----right part-------->
			</div>	
	   </div>
		<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" style="width: 352px !important;">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body" style="padding:0px;">
                        <!-- signup & register code start -->
                        <div id="login-form" style="margin: 0px;display: block;margin-left: auto;margin-right: auto;">
                            <input type="radio" checked id="login" name="switch" class="hide">
                            <input type="radio" id="signup" name="switch" class="hide">

                            <div class="section-out">
                                <section class="login-section">
								    <div>
										<ul class="form-header" style="color: #000;">
											<li><label for="login"><i class="fa fa-lock"></i> LOGIN<label for="login"></li>
											<li><label for="signup"><i class="fa fa-credit-card"></i> REGISTER</label></li>
										</ul>
                                    </div>
								    <h1 style="text-align: center;">Log in to continue</h1>
                                    <div style="text-align:center">
														<a href="<?php echo $url; ?>" title="Facebook"  style="cursor:pointer" >

											<img src="<?= base_url();?>assert/images/facebook.png" title="" alt="" style="width: 80px;" />
										</a>
										<img src="<?= base_url();?>assert/images/google.png" title="" alt="" style="width:80px;" />
                                    </div>
                                     <p style="text-align: center;margin-top: 20px;">Or via email</p>
									<div class="login">
										<form method="post" id="form_login" action="<?=base_url();?>auth/login">
											<ul class="ul-list">
												<li>
												   <input type="email"  name="login" id="emailLogin" required class="input" placeholder="Your Email"/>
												   <span class="icon"><i class="fa fa-user"></i></span>
												</li>
												<li>
												   <input type="password" name="password" id="logpassword"  required class="input" placeholder="Password"/>
												   <span class="icon"><i class="fa fa-lock"></i></span>
												</li>
												<li style="width: 80%;text-align: left;">    
													<span class="remember">
														<a href="#" data-target="#myModal1" id="forget_password">Forget Password</a>
													</span>
												</li>
												<li>
													<button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs" name="submitLogin" style="width: 240px;">LOGIN
													</button>
												</li>
											</ul>
										</form>
									</div>
                                </section>
                                <section class="signup-section">
								    <div>
										<ul class="form-header" style="color: #000;">
											<li><label for="login"><i class="fa fa-lock"></i> LOGIN<label for="login"></li>
											<li><label for="signup"><i class="fa fa-credit-card"></i> REGISTER</label></li>
										</ul>
                                    </div>
                                       <form id="registrationform" method="post" action="<?= base_url();?>auth/signUp">
                                    <div class="login" style="padding-bottom: 0px;padding-top: 10px;padding-left: 20px;padding-right: 20px;">    
                                            <div style="border:solid 1px #ccc;width:80%;margin:auto;background:#fff;">
                                                <div style="display:inline-block;margin-top:11px;font-size:15px;margin-left: 10px;"> Zersey.com/</div><input type="name" required class="input" name="username" placeholder="User Name" style="width:97px;display: inline-block;border: none;">
                                            </div>    
                                    </div>    
                                    <h1 style="text-align: center;margin-top: 0px;">Sign up with</h1>
                                    <div style="text-align:center">
																	<a href="<?php echo $url; ?>" title="Facebook"  style="cursor:pointer" >

											<img src="<?= base_url();?>assert/images/facebook.png" title="" alt="" style="width: 80px;" />
										</a>
										<img src="<?= base_url();?>assert/images/google.png" title="" alt="" style="width:80px;" />
                                    </div>
                                    <p style="text-align: center;margin-top: 10px;">Or via email</p>
                                        <div class="login" style="padding-top: 10px;padding-bottom: 10px;">    
                                            <ul class="ul-list">
											     <li><input type="name" required name="firstName" id="firstName" class="input" placeholder="First Name"/><span class="icon"><i class="fa fa-user"></i></span></li>
                                                <li><input type="name" required name="lastName" id="lastName" class="input" placeholder="Last Name"/><span class="icon"><i class="fa fa-user"></i></span></li>
                                                <li><input type="email" required class="input" name="email" id="email" placeholder="Your Email"/><span class="icon"><i class="fa fa-user"></i></span></li>
                                                <li><input type="password" required name="password" id="password" class="input" placeholder="Password"/><span class="icon"><i class="fa fa-lock"></i></span></li>
                                                <li><input type="text" required class="input" name="phno" id="phno" placeholder="ContactNo"/><span class="icon"><i class="fa fa-user"></i></span></li>
												<li>
					<button type="submit" class="btn btn-skin btn-lg btn-block" name="customerSubmit" id="customerSubmit" style="width: 245px;">SIGN UP</button>
												</li>
                                                <!--<li>
                                                    <span class="remember">
                                                        <a href="#">Forget Password</a>
                                                    </span>
                                                </li>-->
                                            </ul>
                                        </div>
                                    </form>
                                </section>
                            </div>

                           
                        </div>
                    <!-- signup & register code close -->
                    </div>
                </div>
            </div>
        </div>	

 <!-- Responsive slider - END -->
    
 	
    <script src="assert/js/jquery.event.move.js"></script>
    <script src="assert/js/plugin/jquery.jscroll.js"></script>
  <script>
 /** $(document).ready(function() {
	
	$('#container').jscroll({
		delay: 600,
		autoTriggerUntil: 3
			
});
});
*/
  </script> 
  <script>
            $('#datetimepicker_maskdash').datetimepicker({
	
});
  </script>
	
</body>
</html> 