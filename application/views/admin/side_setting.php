<!-- Init plugins only for page -->
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<style>
	.selectsize{
	width:24%;
	}
	</style>
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Setting</li>
                      </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Setting</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Setting</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                    <form class="form-horizontal" role="form" action="admin/add_setting" method="post" id="service-form" enctype= multipart/form-data>
							<?php if($this->session->userdata('user_level')=='1') {  ?>
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
										
										 <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Activate for advertizement</label>
                                            <div class="col-lg-10">
                                              <select id="advertisement" name="advertisement" class="select2">
											  <option value="">please select</option>
											  <option value="1">Yes</option>
											  <option value="0">No</option>
											  </select>  
                                            </div>
                                        </div>
									<?php }  ?>
									<?php if($this->session->userdata('user_level')=='2')
									$result=$this->admin_model->getBookingDetail();
									?>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Do you accept online Booking</label>
                                            <div class="col-lg-10">
                                              <select id="booking" name="booking" class="select2">
											  <option value="">please select</option>
											  <option value="1" <?php if($this->session->userdata('user_level')=='2')
											  if($result[0]['onlineBooking']=='1')
											  echo 'selected';?>>Yes</option>
											  <option value="0" <?php if($this->session->userdata('user_level')=='2') if($result[0]['onlineBooking']=='0') echo 'selected';?>>No</option>
											  </select>
                                           </div>
										   </div>
										     <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Do you accept Home Service</label>
                                            <div class="col-lg-10">
                                               <select id="homeservice" name="homeservice" class="select2">
											  <option value="">please select</option>
											  <option value="1" <?php if($this->session->userdata('user_level')=='2') if($result[0]['homeService']=='1') echo 'selected';?>>Yes</option>
											  <option value="0" <?php if($this->session->userdata('user_level')=='2') if($result[0]['homeService']=='0') echo 'selected';?>>No</option>
											  </select>
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
	    
  </body>
	<script>
		$(document).ready(function(){
			// Setup form validation on the #register-form element
			$("#service-form").validate({
					// Specify the validation rules
					rules: {
							merchantName: {
									required: true,									
							},
							booking:{
									required: true,									
							},
							homeservice:{
									required: true,									
							},
							advertisement:{
									required: true,									
							}
					},
					messages: {
							merchantName: "Please provide a merchant name",
							booking: "Please select booking",
							homeservice:  "Please select homeservice",
							advertisement:  "Please select advertisement"
					},
					// Specify the validation error messages
					submitHandler: function(form) {
								form.submit();
								}
			});
			
		});
	</script>
</html>