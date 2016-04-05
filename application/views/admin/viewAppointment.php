<style>
.calendar-icon{
float: left;
border-right: 1px solid #c9c9c9;
width: 41px;
height: 44px;
box-shadow: none;
margin-right: 12px;
padding-right: 51px;
}
</style>
<script>
		var baseurl='<?=base_url();?>';
	</script>
   <!-- Init plugins only for page -->
		
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


<!-- Misc plugins -->
<script src="admin_assets/js/plugins/misc/fullcalendar/fullcalendar.min.js"></script>
    		
<!-- UI plugins -->
<script src="admin_assets/js/plugins/ui/jgrowl/jquery.jgrowl.min.js"></script>
	<script src="admin_assets/js/pages/dashboard.js"></script>
<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
	<!-- Important plugins put in all pages -->
  
	<?php $result=$this->admin_model->viewAppointment();
		//	print_r($result);?>

<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Appointments</li>
                      <li class="active">View Appointments</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1></h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="panel panel-default">								
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Appointments</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            <div class="panel-body">
                            		 <div class="row">
									 <?php

								if(empty($result))
								{
								?>
									 <div class="col-lg-12">
										<div class="panel plain">
											<div class="panel-heading" style="border-bottom:1px solid #dddddd;">
												<h4 style="margin:10px;">There is no Appointments yet !</h4>
												
											</div><!-- End .panel-heading -->
										
										</div><!-- End .widget -->
									</div><!-- End .col-lg-8  -->  
								<?php
								}
								else{
								?>
								<div class="col-lg-12">
										<div class="panel plain">
											<div class="panel-heading" style="border-bottom:1px solid #dddddd;">
												 <div class="calendar-icon"><i class="icon24 i-calendar-4"></i></div>
												<h4>Calendar</h4>
												<a href="#" class="minimize"></a>
											</div><!-- End .panel-heading -->
										
											<div class="panel-body noPadding">
												<div id="dashboard-calendar"></div>
											</div><!-- End .panel-body -->
										</div><!-- End .widget -->
									</div><!-- End .col-lg-8  --> 
								
								<?php
								}
								?>
						</div><!-- End .row-fluid  -->
					 </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      
						</div>

                    </div><!-- End .row-fluid  -->
                </div>
            </div> <!-- End .wrapper  -->
    </section>    