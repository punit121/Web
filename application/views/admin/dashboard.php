<!DOCTYPE html>
<html lang="en">
  <base href="<?= base_url();?>"/>
	<head>
    <meta charset="utf-8">
    <title>Zersey</title>
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
    <link href="admin_assets/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="admin_assets/css/bootstrap/bootstrap-theme.css" rel="stylesheet" />
    <link href="admin_assets/css/icons.css" rel="stylesheet" />

    <!-- Plugins stylesheets -->
    <link href="admin_assets/js/plugins/misc/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <link href="admin_assets/js/plugins/forms/uniform/uniform.default.css" rel="stylesheet" /> 
    <link href="admin_assets/js/plugins/ui/jgrowl/jquery.jgrowl.css" rel="stylesheet" /> 
	
    <!-- app stylesheets -->
    <link href="admin_assets/css/app.css" rel="stylesheet" /> 

    <!-- Custom stylesheets ( Put your own changes here ) -->
    <link href="admin_assets/css/custom.css" rel="stylesheet" /> 

    <!--[if IE 8]><link href="css/ie8.css" rel="stylesheet" type="text/css" /><![endif]-->

    <!-- Force IE9 to render in normal mode -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<script>
		var baseurl='<?=base_url();?>';
	</script>
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="admin_assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="admin_assets/images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="admin_assets/images/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="admin_assets/images/ico/apple-touch-icon-57-precomposed.png">
         <link rel="icon" href="<?= base_url(); ?>assets/images/logo.jpg" type="image/ico">

    
    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
    <script src="admin_assets/js/bootstrap/bootstrap.js"></script>  
    <script src="admin_assets/js/conditionizr.min.js"></script>  
    <script src="admin_assets/js/plugins/core/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="admin_assets/js/plugins/core/jrespond/jRespond.min.js"></script>
    <script src="admin_assets/js/jquery.genyxAdmin.js"></script>

    <!-- Form plugins -->
    <script src="admin_assets/js/plugins/forms/uniform/jquery.uniform.min.js"></script>
    <script src="admin_assets/js/plugins/forms/validation/jquery.validate.js"></script>

    <!-- Init plugins -->
    <script src="admin_assets/js/app.js"></script><!-- Core js functions -->
		<script src="admin_assets/js/pages/dashboard.js"></script><!-- Init plugins only for page -->
		
		<!-- Charts plugins -->
<script src="admin_assets/js/plugins/charts/flot/jquery.flot.js"></script>
<script src="admin_assets/js/plugins/charts/flot/jquery.flot.pie.js"></script>
<script src="admin_assets/js/plugins/charts/flot/jquery.flot.resize.js"></script>
<script src="admin_assets/js/plugins/charts/flot/jquery.flot.tooltip.min.js"></script>
<script src="admin_assets/js/plugins/charts/flot/jquery.flot.orderBars.js"></script>
<script src="admin_assets/js/plugins/charts/flot/jquery.flot.time.min.js"></script>
<script src="admin_assets/js/plugins/charts/sparklines/jquery.sparkline.min.js"></script>
<script src="admin_assets/js/plugins/charts/flot/date.js"></script> <!-- Only for generating random data delete in production site-->
<script src="admin_assets/js/plugins/charts/pie-chart/jquery.easy-pie-chart.js"></script>
<script src="admin_assets/js/plugins/charts/gauge/justgage.1.0.1.min.js"></script>
<script src="admin_assets/js/plugins/charts/gauge/raphael.2.1.0.min.js"></script>

<!-- Misc plugins -->
<script src="admin_assets/js/plugins/misc/fullcalendar/fullcalendar.min.js"></script>
    		
<!-- UI plugins -->
<script src="admin_assets/js/plugins/ui/jgrowl/jquery.jgrowl.min.js"></script>
  </head>
    <body>
		<header id="header">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <a class="navbar-brand" href="<?php echo base_url('admin');?>"><img src="admin_assets/images/logo.png" alt="Genyx admin" class="img-responsive"></a>
            <button type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#navbar-to-collapse">
                <span class="sr-only">Toggle right menu</span>
                <i class="icon16 i-arrow-8"></i>
            </button>          
            <div class="collapse navbar-collapse" id="navbar-to-collapse">  
                
                <ul class="nav navbar-nav pull-right">
                    <li class="divider-vertical"></li>
                    <li class="dropdown user">
                         <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            
							<?php $result=$this->admin_model->findMerchantImageById($this->session->userdata('user_id'));
							 $resultemp=$this->admin_model->findUserProfileImageById($this->session->userdata('user_id'));
							  ?>
												<img src="assets/images/merchant/<?php  if(!empty($result[0]['photo']))
							{ echo $result[0]['photo']; }
							elseif(!empty($resultemp[0]['photo']))
						   {
						   echo $resultemp[0]['photo'];
						   }
						   else
						   {
						   echo 'nophoto.jpg';
						   }?>" alt="suggest">

                            <span class="more"><i class="icon16 i-arrow-down-2"></i></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                           
                            <li role="presentation"><a href="auth/logout" class=""><i class="icon16 i-exit"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                </ul>
            </div>
        </nav>
    </header> <!-- End #header  -->

    
    <div class="main">
		<?php $this->load->view('admin_layout/sidebar.php')?>        
			<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url();?>"><i class="icon16 i-home-4"></i>Home</a></li>                      
                      <li class="active">Dashboard</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-dashboard"></i> Dashboard</h1>
                    </div>
											<div class="row">
												<div class="col-lg-12">
													<div class="panel panel-default">
														 <div class="panel-heading plain">
															<h4 class="headline">Appointment Statistics</h4>
															 <a href="#" class="minimize"></a>
														</div><!-- End .panel-heading -->

														<div class="panel-body center">
															<div class="vital-stats">
																<div class="row">
																	<div class="col-lg-4">
																		<div class="customlonk">
																			<p><strong><h1 class="onehead">0</h1><span>Appointments Booked</span></strong></p>
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="customlonk">
																	<p><strong><h1 class="onehead">0%</h1><span>Schedule Booked</span></strong></p>
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="customlonk">
																			<p><strong><h1 class="onehead">0</h1><span>New Customers Added</span></strong></p>
																		</div>
																	</div>
																</div>
															</div><!-- End .vital-stats -->
														</div><!-- End .panel-body -->
													</div><!-- End .widget -->
												</div><!-- End .col-lg-4 -->              
											</div>				
																
											
											<div class="row">
												<div class="col-lg-12">
													<div class="panel panel-default">
														<div class="panel-body center">
															<div class="vital-statsanother">
																 <div class="row">
																	<div class="col-lg-4">
																		<div class="contentList">
																			<h5 class="tablehead">Top Services Booked for Your Salon</h5>
																			<ol>
																				<li>Service A</li>
																				<li>Service B</li> 
																				<li>Service C</li>
																				<li>Service D</li>
																				<li>Service E</li>
																			</ol>
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="contentList">
																			<h5 class="tablehead">Salon Profile Page Views  Since Sign-up</h5>
																			<p><span class="social">0</span>Total Profile Views</p>
																			<p><span class="social">0</span>Total Photo Likes</p>
																			<p><span class="social">0</span>Total Wishlists</p>
																		</div>
																	</div>
																	<div class="col-lg-4">
																		<div class="contentList">
																			<h5 class="tablehead">Keywords Leading to Your Profile</h5>
																			<ol>
																				<li>Keyboard A</li>
																				<li>Keyboard B</li> 
																				<li>Keyboard C</li>
																				<li>Keyboard D</li>
																				<li>Keyboard E</li>
																			</ol>
																		</div>
																	</div>
																</div>	
															</div>
														</div>
													</div>
												</div>              
											</div>
											
											<div class="row">
												<div class="col-lg-12">
													<div class="panel panel-default">
														 <div class="panel-heading plain">
															<h4 class="headline">Increase Your Sales Through Customized Promotion Campaigns</h4>
															 <a href="#" class="minimize"></a>
														</div><!-- End .panel-heading -->

														<div class="panel-body center">
															<div class="vital-stats">
																<div class="row">
																	<div class="col-lg-4">
																		<a href class="linkclick"><div class="customlink">
																			<p>Fill-up Lean Days : Come-up with Offers/New Promotion Campaigns</p>
																		</div></a>
																	</div>
																	<div class="col-lg-4">
																		<a href class="linkclick"><div class="customlink">
																			<p>Want to improve Your Rating/Recommendations? Talk to our Experts</p>
																		</div></a>
																	</div>
																	<div class="col-lg-4">
																		<a href class="linkclick"><div class="customlink">
																			<p>Want to build dedicated profile/social media presence, call us at XXXX</p>
																		</div></a>
																	</div>
																</div>
															</div><!-- End .vital-stats -->
														</div><!-- End .panel-body -->
													</div><!-- End .widget -->
												</div><!-- End .col-lg-4 -->              
											</div>
                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>        
    </div><!-- End .main  -->
  </body>
</html>