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
                      <li><a href="#">Library</a></li>
                      <li class="active">Data</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Edit Merchant</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Merchant</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    
                                    <form class="form-horizontal" role="form" action="admin/edit_merchant" method="post" id="service-form">
								<input type="hidden" name="id" value="<?php echo $service['merchantId'];?>"/>
			
			<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>
																				
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Merchant Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="merchantName" name="merchantName" type="text" placeholder="Name" value="<?php echo $service['name'];?>">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Salon Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="salonName" name="salonName" type="text" placeholder="Salon Name" value="<?php echo $service['salonName'];?>">
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Description</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="description" name="description" type="text" placeholder="Description" value="<?php echo $service['description'];?>"/>
                                            </div>
                                        </div>
																													
																													<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Location</label>
                                            <div class="col-lg-5">
                                                <input class="form-control onlyInteger" id="location" name="location" type="text" placeholder="Location" value="<?php echo $service['area'];?>"/>
                                            </div>
											<label class="col-lg-1 control-label" for="state">State:</label>
				  <div class="col-lg-4">
                    <input class="form-control notTakeComa" type="text" name="state" id="state" value="<?= $service['state'];?>">
				    </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">merchant Price Rating</label>
                                           <div id="merchantrating" style="width:80%;float:right;margin-right:2%"> <select class="select2" name="rating" id="rating" >
										 <option value="">Select Price Rating</option>
										 <option value="L" <?php if($service['priceCheck']=='L'|| $service['priceCheck']=='N'){echo 'selected';}?>>Low</option>
										 <option value="M" <?php if($service['priceCheck']=='M'){echo 'selected';}?>>Medium</option>
										 <option value="H" <?php if($service['priceCheck']=='H'){echo 'selected';}?>>High</option>
										   </select></div>
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
                                                    <a href="<?=base_url()?>admin/merchants"><button type="button" class="btn">Cancel</button></a>
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
							description: {
									required: true,									
							},
							salonName: {
								required: true
							},
							location: {
								required: true
							},
							rating: {
								required: true
							}
					},
					// Specify the validation error messages
					messages: {
							merchantName: "please provide a name",
							description:  "please provide a description",
							salonName:  "please provide salon name",
							location:  "please provide location",
							rating:"please provide rating"		
							
					},
					submitHandler: function(form) {
							form.submit();
					}
			});
			$('#merchantName').keydown(function(e){
						try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 08 || charCode == 09 || charCode == 32)
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
			});
			$('#merchant_image').bind('change', function() {
				  if(this.files[0].size <10240){
				  $('#merchantImage').html('<font color="red">File size is less than 10kb<font>');
				  }
				  else
				  {
				   $('#merchantImage').html('');
				  }
				});
				
				$.post('<?=base_url()?>admin/AutoCompleteMerchantLocation',function(data){
					console.log(data);
					var availableTags = data.split(",");
					$('#location').autocomplete({
					source: availableTags
					});
				});
				
			$.post('<?=base_url()?>admin/getAllstate',function(data){
				console.log(data);
				var availableTags = data.split(",");
				$('#state').autocomplete({
				source: availableTags
				});
			});
			
		});
	</script>
</html>