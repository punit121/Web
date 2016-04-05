<!-- Init plugins only for page -->
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Appointment</a></li>
                      <li class="active">Book Appointment</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Appointment</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Text fields</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    
                                    <form class="form-horizontal" role="form" action="welcome/new_service" method="post" id="appointment-form">

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Client</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="name" name="serviceName" type="text" placeholder="Name">
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Reminder Preference</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="description" name="description" type="text" placeholder="Description">
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">When</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="appointmentDate" name="appointmentDate" type="text" placeholder="Choose date">
																								<i aria-hidden="true" class="i-calendar-4" style="position: absolute;right:22px;top: 6px;"></i>
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">When</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="appointmentDate" name="appointmentDate" type="text" placeholder="Choose date">
																								<i aria-hidden="true" class="i-calendar-4" style="position: absolute;right:22px;top: 6px;"></i>
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="price" name="price" type="text" placeholder="Price">
                                            </div>
                                        </div>

                                        

                                        
                                       <!-- <div class="form-group">
                                            <label class="col-lg-2 control-label" for="fileinput">File input</label>
                                            <div class="col-lg-10">
                                                <div class="uploader" id="uniform-file"><input type="file" name="fileinput" id="file"><span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div>
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    <button type="button" class="btn">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </form>
																		<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>

                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      


                    </div><!-- End .row-fluid  -->
                </div>
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
	    
  </body>
	<script>
		$(document).ready(function(){
			$("#appointmentDate").datepicker().datepicker("setDate", new Date());
			// Setup form validation on the #register-form element
			$("#appointment-form").validate({
					// Specify the validation rules
					rules: {
							serviceName: {
									required: true,									
							},
							description: {
									required: true,									
							},							
							price: {
								required: true
							}
					},
					// Specify the validation error messages
					messages: {
							name: "Please enter a valid email address",
							description:  "Please provide a description for service",
							price:  "Please provide price of service",
									
							
					},
					submitHandler: function(form) {
							form.submit();
					}
			});
		});
	</script>
</html>