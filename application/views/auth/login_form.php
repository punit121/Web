<?php
$form = array(
	"id" => "form_login",
	"method" => "POST"
);

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<script>
var baseurl='<?=base_url()?>';
</script>
	<!-- End Main Content Top -->
<script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/js/pages/user.js"></script>	
<script src="<?=base_url()?>assets/js/pages/facebook.js"></script>	
<div id="fb-root"></div>
<div class="main-wrapper">
		
	<div class="row main-content">
	
		<div class="large-12 columns">
               
        <div class="row widgets-top"><!-- Row -->
        <div class="large-12 columns widgets side-widgets">         
				<ul class="breadcrumbs custom-margin">
						<li><a href="#"><strong>Login</strong></a></li>
						
					</ul>
            <!-- Sidebar Navigation -->      
			<?php echo form_open("auth/login",$form); ?>	
				<div class="section-container accordion" data-section>     
				<div class="row log-in-row">				
					<div class="large-3 large-offset-1 columns">
					<a class="button social-icon-facebook" onclick="fblogin()"><span class="icon-facebook"></span>Log In with Facebook</a>
     				</div>                   
				</div>
				<div class="row">				
					<div class="large-2 large-offset-1 columns">
       				<p class="text-center"><i>Or</i></p>
     				</div>                   
				</div>
				<div class="row">				
					<div class="large-3 large-offset-1 columns">
       				<h6>Email</h6>
					<input type="text" placeholder="Email" name="login" id="email">
					<div style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></div>
     				</div>                   
				</div>
				<div class="row">				
					<div class="large-3 large-offset-1 columns">
       				<h6>Password</h6>
					<input type="password" placeholder="Password" name="password" id="password">
					<div style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
     				</div>                   
				</div>
				<div class="row">				
					<div class="large-3 large-offset-1 columns">
       				<button type="submit" style="" name="submit" class="button secondary log-in-button">Log In</button>
					<input id="checkbox1" type="checkbox" name="remember">	Remember Me
					</div>	
     				</div> 
				</div>
				<?php echo form_close(); ?>
            <!-- End Sidebar Navigation -->                                     
        </div>
        
		
		</div><!-- End Row -->
		</div>
	</div>
  <!-- End Main Content --> 
</div>
<div id="notactivated" class="reveal-modal" data-reveal style="display:none;">
  <h2>Activation</h2>
  <p>You have successfully registered. Check your email address to activate your account.</p>
  <a class="close-reveal-modal">&#215;</a>
</div>
	