<!-- Init plugins only for page -->
	
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<!--<script src="<?=base_url();?>assets/js/plugins/forms/validation/jquery.validate.js"></script>-->
<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="<?=base_url();?>assets/js/pages/admin_appointment.js"></script>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Appointment</li>
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
                                    <h4>New Appointment</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    
                                    <form class="form-horizontal" role="form" action="admin/book_appointment" method="post" id="appointment-form">
<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin:-15px 0 10px 0;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Employee</label>
                                            <div class="col-lg-10">
											    <select class="select2" id="clientname" name="clientName" >
												<option value="">Select Employee</option>
												<?php if($this->session->userdata('user_level')=='1')
													$result=$this->admin_model->getAllEmployee();
													else
													$result=$this->admin_model->getEmployeById();
															foreach($result as $client){
											?>
												<option value="<?= $client['user_id'];?>"><?= $client['name'];?></option>
														<?php } ?>
												</select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Customer</label>
                                            <div class="col-lg-8">
                                                <select class="select2" id="customername" name="customerName">
												<option value="">Select Customer</option>
												<?php 
												if($this->session->userdata('user_level')=='1')
													$result=$this->admin_model->getCustomers();
												else
												$result=$this->admin_model->getMerchantCustomers();
														foreach($result as $customerdata){
											?>
												<option value="<?= $customerdata['userId'];?>"><?= $customerdata['fullname'];?></option>
												<?php } ?>
												
												</select>
                                            </div>
                                             <div class="col-lg-2">
                <input type="button" class="btn btn-primary" id='addcus' onClick="addcutomer();" value="Add Customer"/>                             
                                             </div>
                                        </div>
                                        <div id="cutomerdetail" hidden>
                                        <input type="hidden" id="addcust" name="addcust"/>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Customer Name</label>
                                            <div class="col-lg-10">
            <input class="form-control" id="cname" name="cname" type="text" placeholder="Enter Cutomer Full Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Customer Email</label>
                                            <div class="col-lg-10">
            <input class="form-control" id="cemail" name="cemail" type="text" placeholder="Enter Cutomer Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Customer Contact</label>
                                            <div class="col-lg-10">
            <input class="form-control" id="ccontact" name="ccontact" type="text" placeholder="Enter Cutomer Contact">
                                            </div>
                                        </div></div>
										<?php if($this->session->userdata('user_level')=='1') {
										?>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Merchant</label>
                                            <div class="col-lg-10">
                                                <select class="select2" id="merchantname" name="merchantName">
												<option value="">Select merchant</option>
												<?php $result=$this->admin_model->getAllmerchants();
												print_r($result);
												
											foreach($result as $merchantdata){
											?>
												<option value="<?= $merchantdata['merchantId'];?>"><?= $merchantdata['name'];?></option>
												<?php } ?>
												</select>
                                            </div>
                                        </div>
										<?php } ?>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Services</label>
                                            <div class="col-lg-10">
                                                <select class="select2" id="servicename" name="serviceName" >
												<option value="">Select Services</option>
								<?php 
									if($this->session->userdata('user_level')=='1')
								$result=$this->admin_model->getAllServices();
								else$result=$this->admin_model->getservices();
											foreach($result as $services){
											?>
												<option value="<?= $services['id'];?>"><?= $services['serviceName'];?></option>
												<?php } ?>
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Appointment</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="appointmentDate" name="appointmentDate" type="text" placeholder="Choose date">
																								<i aria-hidden="true" class="i-calendar-4" style="position: absolute;right:22px;top: 6px;"></i>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Apply Date</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="applyDate" name="applyDate" type="text" placeholder="Choose date">
																								<i aria-hidden="true" class="i-calendar-4" style="position: absolute;right:22px;top: 6px;"></i>
                                            </div>
                                        </div>
												<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Time</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="time" name="time" type="time" placeholder="Time">
                                            </div>
											
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    <button type="button" class="btn">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </form>
																		

                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      


                    </div><!-- End .row-fluid  -->
                </div>
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
<script>
$(document).ready(function(){
	$('.onlyInteger').keypress(function(e){ 
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
			}
		});
		
});
function addcutomer(){
	
	document.getElementById('cutomerdetail').style.display = 'block';
	 document.getElementById("addcust").value='1';
	document.getElementById('customername').disabled = true;
	}
</script>