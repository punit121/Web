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
                      <li>Offers</li>
                      <li class="active">Add Offer</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Offer</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Offers</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                    <form class="form-horizontal" role="form" action="admin/add_offer" method="post" id="service-form" enctype= multipart/form-data>

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
									<?php }  ?>
									
									
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Offer Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="offername" name="offername" type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Offer Exp. Date</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="expdate" name="expdate" type="text" placeholder="Offer Exp. Date">
                                            </div>
                                        </div>
										
									<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Offer Image</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="offerimage" name="offerImage" type="file"><div id="picture"></div>
                                            </div>
									   </div>
                                       <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> External URL</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="exturl" name="exturl" type="text">
                                            </div>
									   </div>
									   
										  <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Features</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="features" name="features" type="text" placeholder="features">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Orignal Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control onlyInteger" id="price" name="price" type="text" placeholder="price">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Discount</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="discount" name="discount" type="text" placeholder="discount" >
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Discounted Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="discountedPrice" name="discountedPrice" type="text" placeholder="discount" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Booking Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control onlyInteger" id="bookingprice" name="bookingprice" type="text" placeholder="booking price">
                                            </div>
                                        </div>
										<!-- <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Merchant Name</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" id="merchantname" name="merchantname" type="text" placeholder="merchant name">
												<option value="">Select Merchant Name</option>
												<?php $result=$this->admin_model->getMerchantName();
												foreach($result as $merchantname)
												{
												?>
												<option value="<?php echo $merchantname['merchantId']; ?>"><?php echo $merchantname['name']; ?></option>
												<?php } ?>
												</select>
                                            </div>
                                        </div>-->
										
                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    <a href="view_offer"><button type="button" class="btn">Cancel</button></a>
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
			$('#expdate').datepicker({dateFormat: 'yy/mm/dd'});
			$.validator.addMethod('lessThan', function(value, element, param) {
    return this.optional(element) || parseInt(value) <= parseInt($(param).val());
}, "The value {0} must be less than {1}");
			// Setup form validation on the #register-form element
			$("#service-form").validate({
					// Specify the validation rules
					rules: {
							merchantName:{
									required: true,									
							},
							offername: {
									required: true,									
							},
							offerimage:{
									required: true,									
							},
							features:{
									required: true,									
							},
							bookingprice:{
									required: true,
									lessThan: "#discountedPrice"
																		
							},
							price:{
									required: true,									
							},
							discount:{
									required: true,	
									max: 100						
							}
							
					},
					messages: {
							offername: "Please provide a offer name",
							features: "Please provide a feature",
							bookingprice:{
							required: "Please provide a booking price for service",
							lessThan: "Please provide a valid booking price less then 'Discounted Price'",  
										},
							duration:  "Please provide duration of service",
							price:  "Please provide a actual price of service",
							discount: {
							required: "Please provide a discount",
							lessThan: "Please provide a valid discount less then 100%",  
										}, 
							merchantName:"Please provide merchant name"		
							
					},
					// Specify the validation error messages
					submitHandler: function(form) {
						if((parseInt($('#bookingprice').val()))<(parseInt($('#price').val())))
							form.submit();
							else
							$('#bookingprice').focus();
					}
			});
		
			
			 $('#offerimage').bind('change', function() {
				  if(this.files[0].size <10240){
				  $('#picture').html('<font color="red">File size is less than 10kb<font>');
				  }
				  else
				  {
				   $('#picture').html('');
				  }
				});
				/*$('#price').blur(function() {
				//$discount=(($('#price').val()-$('#bookingprice').val())/$('#price').val())*100;
				 //$('#discount').val($discount);
				 $caldis=($('#price').val()/2)
				 $discount=(($('#price').val()/2)/$('#price').val())*100;
				 $('#discount').val($discount);
				 $('#discountedPrice').val($('#price').val()-$caldis);
				});*/
				/*$('#discount').blur(function() {
					$discount=($('#discount').val()*$('#price').val())/100;
				 $('#discountedPrice').val($('#price').val()-$discount);
					
					});
				//$('#bookingprice').blur(function() {
				//$discount=(($('#price').val()-$('#bookingprice').val())/$('#price').val())*100;
				 //$('#discount').val($discount);
				 //$('#discountedPrice').val($('#price').val()-$('#bookingprice').val());
				//});
		$('.onlyInteger').keypress(function(e){ 
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
			}
		});*/
		});
	</script>
</html>