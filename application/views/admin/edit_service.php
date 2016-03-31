<!-- Init plugins only for page -->
	<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->

<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Services</a></li>
                      <li class="active">Edit Service</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Edit Service</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Service</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    
                                    <form class="form-horizontal" role="form" action="admin/edit_service" method="post" id="service-form">
								<input type="hidden" name="id" value="<?php echo $service['id'];?>"/>
			
			<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>
																				
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Service Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="name" name="serviceName" type="text" placeholder="Name" value="<?php echo $service['serviceName'];?>">
                                            </div>
                                        </div>
										
									<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Category</label>
                                            <div class="col-lg-10">
                                                <select id="businessCategory" name="businessCategory" class="select2">
												<option value="">Select Category</option>
												<?php if($this->session->userdata('user_level')=='1')
												{
												$result=$this->admin_model->findAllCategory();
												}
												else
												{$result=$this->admin_model->findAllCategoryByMerchantId() ;
												}
												echo "<pre>";print_r($service['businessCategory']);
											foreach($result as $category) {
											?>
												<option value="<?= $category['id'];?>" <?php if($service['businessCategory']==$category['id']){echo "selected";}?>><?= $category['category']; ?></option>
												<?php } ?>
												</select>
                                            </div>
                                    </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Description</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="description" name="description" type="text" placeholder="Description" value="<?php echo $service['description'];?>"/>
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Duration</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" id="duration" name="duration">
												<?php for($i=30;$i<=840;$i=$i+30) { ?>
												<option value="<?= $i ?>"<?php if($service['duration']==$i) echo 'selected' ?>><?= $i ?></option>
												<?php } ?>
												</select>
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control onlyInteger" id="price" name="price" type="text" placeholder="Price" value="<?php echo $service['price'];?>"/>
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
                                                    <a href="<?=base_url()?>admin/services"><button type="button" class="btn">Cancel</button></a>
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
							serviceName: {
									required: true,									
							},
							businessCategory: {
									required: true,									
							},
							// description: {
									// required: true,									
							// },
							duration: {
								required: true
							},
							price: {
								required: true
							}
					},
					// Specify the validation error messages
					messages: {
							serviceName: "Please enter a valid email address",
						businessCategory:  "Please provide a category",
						//	description:  "Please provide a description for service",
							duration:  "Please provide duration of service",
							price:  "Please provide price of service",
									
							
					},
					submitHandler: function(form) {
							form.submit();
					}
			});
			// $('#name').keydown(function (e) {
						// try {
                // if (window.event) {
                    // var charCode = window.event.keyCode;
                // }
                // else if (e) {
                    // var charCode = e.which;
                // }
                // else { return true; }
                // if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 08 || charCode == 09 || charCode == 32)
                    // return true;
                // else
                    // return false;
            // }
            // catch (err) {
                // alert(err.Description);
            // }
				// });
		});
		$('.onlyInteger').keypress(function(e){ 
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
			}
		});
	</script>
</html>