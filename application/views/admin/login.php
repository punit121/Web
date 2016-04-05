<?php
$login = array(
	'name'	=> 'user',
	'id'	=> 'user',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class'	=> 'form-control',
	'placeholder'	=> 'Email',
);
/*if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}*/
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class'	=> 'form-control',
	'placeholder'	=> 'Password',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$login_form = array(
	'role' => 'form',
	'id' => 'login-form',
	'class' => 'form-horizontal',
);
$register_form = array(
	'role' => 'form',
	'id' => 'register-form',
	'class' => 'form-horizontal',
	'data-active' => 'reg',
);
$submit = array(
	'id' => 'loginBtn',
	'type' => 'submit',
	'class' => 'btn btn-primary pull-right col-lg-5',
	'value' => 'Login',
);
if ($use_username) {
	$username = array(
		'name'	=> 'user',
		'id'	=> 'user',
		'value' => set_value('user'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'class'	=> 'form-control',
		'placeholder'	=> 'Username',
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email-field',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'placeholder'	=> 'Your Email',
	'class'	=> 'form-control',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'placeholder'	=> 'Password',
	'class'	=> 'form-control',
);
$confirm_password = array(
	'name'	=> 'password1',
	'id'	=> 'password_again',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'placeholder'	=> 'Re-type Password',
	'class'	=> 'form-control',
);
$btn_register = array(
	'value' => 'Register my account',
	'class' => 'btn btn-lg btn-block btn-danger',
);
?>


<!DOCTYPE html>
<html lang="en">
  <base href="<?= base_url(); ?>"/>
	<head>
    <meta charset="utf-8">
    <title>Genyx admin v1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SuggeElson" />
    <meta name="description" content="Genyx admin template - new premium responsive admin template. This template is designed to help you build the site administration without losing valuable time.Template contains all the important functions which must have one backend system.Build on great twitter boostrap framework" />
    <meta name="keywords" content="admin, admin template, admin theme, responsive, responsive admin, responsive admin template, responsive theme, themeforest, 960 grid system, grid, grid theme, liquid, jquery, administration, administration template, administration theme, mobile, touch , responsive layout, boostrap, twitter boostrap" />
    <meta name="application-name" content="Genyx admin template" />

    <!-- Headings -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700' rel='stylesheet' type='text/css'>
    <!-- Text -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />

     <!--[if lt IE 9]>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:800" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!-- Core stylesheets do not remove -->
    <link href="assets/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/bootstrap/bootstrap-theme.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet" />

    <!-- Plugins stylesheets -->
    <link href="assets/js/plugins/forms/uniform/uniform.default.css" rel="stylesheet" /> 

    <!-- app stylesheets -->
    <link href="assets/css/app.css" rel="stylesheet" /> 

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="assets/css/custom.css" rel="stylesheet" /> 

    <!--[if IE 8]><link href="css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->

    <!-- Force IE9 to render in normal mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="images/ico/favicon.png">
    
    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.js"></script>  
    <script src="assets/js/conditionizr.min.js"></script>  
    <script src="assets/js/plugins/core/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/js/plugins/core/jrespond/jRespond.min.js"></script>
    <script src="assets/js/jquery.genyxAdmin.js"></script>

    <!-- Form plugins -->
    <script src="assets/js/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>

    <!-- Init plugins -->
    <script src="assets/js/app.js"></script><!-- Core js functions -->
    <script src="assets/js/pages/login.js"></script><!-- Init plugins only for page -->

  </head>

<body>
    <div class="container-fluid">
        <div id="login">
            <div class="login-wrapper"  <?php if($pageName=='login'){echo "data-active=log";}elseif($pageName=='register'){ echo "data-active='reg'";}elseif($pageName=='forgotPassword'){ echo "data-active='forgot'";}else{ echo "data-active=log";}?>>
                <div id="log">
                    <div class="page-header">
                        <h3 class="center">Please login</h3>
                    </div>
										<?php echo form_open("auth/login",$login_form); ?>
                    <!--<form role="form" id="login-form" class="form-horizontal" action="dashboard.html">-->
                        <div class="row">
                            <div class="form-group relative">
                                <div class="icon"><i class="icon20 i-user"></i></div>
																<?php //echo form_label($login_label, $login['id']); ?></td>
																<?php echo form_input($login); ?>
																<span style="color:red"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
																<!--<input class="form-control" type="text" name="user" id="user" placeholder="Username" value="suggeelson@suggeelson.com">
                                -->
																</div><!-- End .control-group  -->
                            <div class="form-group relative">
                                <div class="icon"><i class="icon20 i-key"></i></div>
																<?php //echo form_label('Password', $password['id']); ?></td>
																<?php echo form_password($password); ?>
																<span style="color:red"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
                                <!--<input class="form-control" type="password" name="password" id="password" placeholder="Password" value="somepassword">-->
                                
                            </div><!-- End .control-group  -->
                            <div class="form-group relative">
                                <label class="control-label" class="checkbox pull-left">
																<?php echo form_checkbox($remember); ?>
																	<?php //echo form_label('Remember me', $remember['id']); ?>
																<!--<input type="checkbox" value="1" name="remember">-->
                                    Remember me ?
                                </label>
																<?php echo form_submit($submit); ?>
																
                                <!--<button id="loginBtn" type="submit" class="btn btn-primary pull-right col-lg-5">Login</button>--->
                            </div>
                        </div><!-- End .row-fluid  -->
                    <?php echo form_close(); ?>
                    <p class="center">Don`t have an account? <a href="#" id="register"><strong>Create one now</strong></a></p>
                    <div class="or center"><strong>or</strong></div>
                    <hr class="seperator">
                    <a href="#" class="btn btn-primary pull-left"><i class="icon16 i-facebook gap-left0"></i> Connect</a>
                    <a href="#" class="btn btn-info pull-right"><i class="icon16 i-twitter gap-left0"></i> Connect</a>
                </div>
                <div id="reg">
                    <div class="page-header">
											<?php if($this->session->flashdata('message')){ echo $this->session->flashdata('message'); }?>
                        <h3 class="center">Register account</h3>
                    </div>
                    <?php echo form_open("auth/register",$register_form); ?>
                        <div class="row">
													<?php if ($use_username) { ?>
														<div class="form-group relative">
                                <div class="icon"><i class="icon20 i-user"></i></div>
															<?php //echo form_label('Username', $username['id']); ?>
															<?php echo form_input($username); ?>
															<span style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></span>
															<!--<input class="form-control" type="text" name="user" id="user" placeholder="Username">-->
														</div><!-- End .control-group  -->
													<?php } ?>
                            <div class="form-group relative">
                                <div class="icon"><i class="icon20 i-key"></i></div>
																<?php //echo form_label('Password', $password['id']); ?>
																<?php echo form_password($password); ?>
																<span style="color:red"><?php echo form_error($password['name']); ?></span>
                                <!--<input class="form-control" type="password" name="password" id="password" placeholder="Password">-->
                            </div><!-- End .control-group  -->
                            <div class="form-group relative">
                                <div class="icon"><i class="icon20 i-key"></i></div>
																<?php //echo form_label('Confirm Password', $confirm_password['id']); ?>
																<?php echo form_password($confirm_password); ?>
																<span style="color:red"><?php echo form_error($confirm_password['name']); ?></span>
                                <!--<input class="form-control" type="password" name="password1" id="password_again" placeholder="Re-type password">-->
                            </div><!-- End .control-group  -->
                            <div class="form-group relative">
                                <div class="icon"><i class="icon20 i-envelop-2"></i></div>
																<?php //echo form_label('Email Address', $email['id']); ?>
																<?php echo form_input($email); ?>
																<span style="color:red"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></span>
                                <!--<input class="form-control" type="text" name="email" id="email-field" placeholder="Your email">-->
                            </div><!-- End .control-group  -->
                            <div class="form-group">
															<?php echo form_submit($btn_register); ?>
                                <!--<button type="submit" class="btn btn-lg btn-block btn-danger">Register my account</button>-->
                            </div>
														
                        </div><!-- End .row-fluid  -->
                    <?php echo form_close(); ?>
                </div>
                <div id="forgot">
                    <div class="page-header">
                        <h3 class="center">Forgot password</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="form-group relative">
                                <div class="icon"><i class="icon20 i-user"></i></div>
                                <input class="form-control" type="text" name="user" id="user" placeholder="Username">
                            </div><!-- End .control-group  -->
                            <div class="form-group relative">
                                <div class="icon"><i class="icon20 i-envelop-2"></i></div>
                                <input class="form-control" type="text" name="email" id="email-field" placeholder="Your email">
                            </div><!-- End .control-group  -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-block btn-success">Recover my password</button>
                            </div>
                        </div><!-- End .row-fluid  -->
                    </form>
                </div>
            </div>
            <div id="bar" data-active="log">
                <div class="btn-group btn-group-vertical">
                    <a id="log" href="#" class="btn tipR" title="Login"><i class="icon16 i-key"></i></a>
                    <a id="reg" href="#" class="btn tipR" title="Register account"><i class="icon16 i-user-plus"></i></a>
                    <a id="forgot" href="#" class="btn tipR" title="Forgout password"><i class="icon16 i-question"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
  </body>
</html>