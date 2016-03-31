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
                      <li><a href="#">Reverse Auction</a></li>
                      <li class="active">Edit Auction</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Edit Auction</h1>
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
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                    <form class="form-horizontal" role="form" action="admin/edit_auction" method="post" id="service-form">
									<input type="hidden" name="id" value="<?php
									echo $auction['id'];?>"/>
									<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Customer</label>
                                            <div class="col-lg-10">
                                              <input class="form-control" id="customerName" name="customerName" type="text" value="<?= $this->admin_model->findCustomerNameById($auction['userId']); ?>" readonly>   
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">What you need ?</label>
                                            <div class="col-lg-10">
                                            <input class="form-control" id="request" name="request" type="text" value="<?= $auction['request'];?>">
                                            </div>
                                        </div>

										  <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Where the work located</label>
                                            <div class="col-lg-10">
												 <input class="form-control" id="location" name="location" type="text" value="<?= $auction['location'];?>">
                                            </div>
                                        </div>
										  <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Category</label>
                                            <div class="col-lg-10">
												 <input class="form-control" id="category" name="category" type="text" value="<?= $auction['category'];?>" readonly>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Min Budget</label>
                                            <div class="col-lg-10">
												 <input class="onlyInteger form-control" id="minBudget" name="minBudget" type="text" value="<?= $auction['minBudget'];?>" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Max Budget</label>
                                            <div class="col-lg-10">
												 <input class="onlyInteger form-control" id="maxBudget" name="maxBudget" type="text" value="<?= $auction['maxBudget'];?>" >
                                            </div>
                                        </div>
																														<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Date</label>
                                            <div class="col-lg-10">
												 <input class="form-control" id="dateOfRequest" name="dateOfRequest" type="date" value="<?= $auction['dateOfService'];?>" >
                                            </div>
                                        </div>
																														<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">No.of people</label>
                                            <div class="col-lg-10">
												 <input class="onlyInteger form-control" id="people" name="people" type="text" value="<?= $auction['noOfPeople'];?>" >
                                            </div>
                                        </div>
																													<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Description</label>
                                            <div class="col-lg-10">
												 <textarea class="form-control" id="description" name="description" type="text"><?= $auction['note']; ?></textarea>
                                            </div>
                                        </div>

                                        

                                        
                                       

                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                     <a href="<?= base_url() ?>admin/view_auction"> <button type="button" class="btn">Cancel</button></a>
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
							request: {
									required: true,									
							},
							location: {
									required: true,									
									},
							minbudget: {
									required: true,									
							},
							maxbudget: {
								required: true
							},
							dateOfRequest: {
								required: true
							},
							people: {
								required: true
							},
							description: {
								required: true
							}
					},
					// Specify the validation error messages
					messages: {
							request: "Please provide a request",
							location: "Please provide a location",
							minbudget:  "Please provide a minimum budget",
							maxbudget:  "Please provide a maximum budget",
							dateOfRequest:  "Please provide date of service",
							people:  "Please provide no. of people",
							description:  "Please provide description",
									
							
					},
					submitHandler: function(form) {							
							form.submit();
					}
			});
					$('#name').keydown(function (e) {
						if (e.shiftKey || e.ctrlKey || e.altKey) {
						e.preventDefault();
						} else {
						var key = e.keyCode;
						if (!((key == 8) ||(key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
						e.preventDefault();
							}	
						}
				});
				$.post('<?=base_url()?>admin/request',function(data){
			console.log(data);
			var availableTags = data.split(',');
			$('#request').autocomplete({
			source: availableTags
			});
		});
		$.post('<?=base_url()?>admin/location',function(data){
			var availableTags = data.split(',');
			$('#location').autocomplete({
			source: availableTags
			});
		});
		});
		
		$('.onlyInteger').keypress(function(e){ 
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
			}
			
	});
	</script>
</html>