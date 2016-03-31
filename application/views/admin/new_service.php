<!-- Init plugins only for page -->
	
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>services</li>
                      <li class="active">Add Services</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Service</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Services</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                    <form class="form-horizontal" role="form" action="admin/new_service" method="post" id="service-form">

                                        <div class="form-group">
                                         
                                            <div class="col-lg-10">
                                            <label class="col-lg-3 control-label" for="placeholder"></label>
                                            <a href="<?php echo base_url();?>admin/addservicesdefault" class="btn btn-primary" style="width:30%">Add All Default Services (Salon)</a>
                                            <a href="<?php echo base_url();?>admin/addservicesdefaultspa" class="btn btn-primary" style="width:30%">Add All Default Services (Spa)</a>
                                            </div>
                                        </div>
 <center><fieldset style="border: 0px;border-top:1px solid #777;padding: 0.25em;"><legend style="width: inherit;">or</legend></fieldset></center>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Service Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="name" name="serviceName" type="text" placeholder="Name">
                                            </div>
                                        </div>
											<?php if($this->session->userdata('user_level')=='1') { ?>
										 <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Merchant Name</label>
                                            <div class="col-lg-10">
												 <select class="select2"  id="merchantName" name="merchantName">
												 <option value="">select Merchant</option>
												 <?php $result=$this->admin_model->getAllmerchants();
												 
												 foreach($result as $value)
																		  {
																			 ?>
												 <option value="<?=$value['merchantId']?>"><?=$value['salonName'];?></option>
												 <?php } ?>
												 </select>
                                            </div>
                                        </div>
										<?php } ?>
										  <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Category</label>
                                            <div class="col-lg-10">
												 <select class="select2"  id="category" name="category">
												 <option value="">select category</option>
												 <?php $result=$this->admin_model->selectCategory();
												 
												 foreach($result as $value)
																		  {
																			 ?>
												 <option value="<?=$value['id']?>"><?=$value['category']?></option>
												 <?php } ?>
												 </select>
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Description</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="description" name="description" type="text" placeholder="Description">
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Duration</label>
                                            <div class="col-lg-10">
                                                <input class="form-control onlyInteger" id="duration" name="duration" type="text" placeholder="Duration( in minutes )">
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control onlyInteger" id="price" name="price" type="text" placeholder="Price">
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
							merchantName:{
								required: true,									
							},
							category: {
									required: true,									
									},
							// description: {
									// required: true,									
							// },
							duration: {
								required: true
							},
							price: {
								//required: true
							}
					},
					// Specify the validation error messages
					messages: {
							serviceName: "Please provide a service name",
							merchantName:"Please provide a merchant name",
							category: "Please provide category",
							description:  "Please provide a description for service",
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
		  $('#category').autocomplete("autocomplete.php", {
        selectFirst: true
			});
	});
	</script>
</html>