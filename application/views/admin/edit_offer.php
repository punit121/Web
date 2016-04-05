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
                      <li><a href="#">Offers</a></li>
                      <li class="active">Edit Offer</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Edit Offer</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Offer</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                    <form class="form-horizontal" role="form" action="admin/update_offer" method="post" id="service-form" enctype= multipart/form-data>
					<?php $result=$this->admin_model->editOfferData(base64_decode($_GET['id']));
									//print_r($result);
									?>
									<input type="hidden" id="imageid" name="imageid" value="<?=base64_decode($_GET['id']); ?>">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Offer Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="offername" name="offername" type="text" placeholder="Name" value="<?=$result[0]['name']; ?>">
                                            </div>
                                        </div>
									 <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Offer Exp. Date</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="expdate" name="expdate" type="text" placeholder="Offer Exp. Date" value="<?= date("Y/m/d",strtotime($result[0]['expdate'])) ?>">
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
                                                <input class="form-control" id="exturl" name="exturl" type="text"  value="<?=$result[0]['externallink']; ?>"></div>
                                            </div>
										  <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Features</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="features" name="features" type="text" placeholder="features" value="<?=$result[0]['features']; ?>">
                                            </div>
                                        </div>
										  
									
										 <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="price" name="price" type="text" placeholder="price" value="<?=$result[0]['price']; ?>">
                                            </div>
                                        </div>
										 <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Discount</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="discount" name="discount" type="text" placeholder="discount" value="<?=$result[0]['discount']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Discounted Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="discountedPrice" name="discountedPrice" type="text" placeholder="discount" value="<?=$result[0]['discountedPrice']; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder"> Booking Price</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="bookingprice" name="bookingprice" type="text" placeholder="booking price" value="<?=$result[0]['bookingPrice']; ?>">
                                            </div>
                                        </div>
									<!--
												<?php /* $result=$this->admin_model->getMerchantName();
												foreach($result as $merchantname)
												{
												?>
												<option value="<?php echo $merchantname['merchantId']; ?>"><?php echo $merchantname['name']; ?></option>
												<?php }*/ ?>
												</select>
                                            </div>
                                        </div>\-->
										
                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                 <a href="<?=base_url()?>admin/view_offer"><button type="button" class="btn">Cancel</button></a>
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
							offername: {
									required: true,									
							},
							offerimage:{
									required: true,									
							},
							expdate:{
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
							},
							merchantname:{
									required: true,									
							}
					},
					messages: {
							offername: "Please provide a offer name",
							features: "Please provide a feature",
							discount: {
							required: "Please provide a discount",
							max: "Please provide a valid discount less then 100%",  
										}, 
							bookingprice:{
							required: "Please provide a booking price for service",
							lessThan: "Please provide a valid booking price less then 'Discounted Price'",  
										},
							duration:  "Please provide duration of service",
							price:  "Please provide a actual price of service",
									
							
					},
					// Specify the validation error messages
					submitHandler: function(form) {
							form.submit();
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
				$discount=($('#discount').val()*$('#price').val())/100;
				 $('#discountedPrice').val($('#price').val()-$discount);
				});
				$('#discount').blur(function() {
					$discount=($('#discount').val()*$('#price').val())/100;
				 $('#discountedPrice').val($('#price').val()-$discount);*/
					
					//});
		});
	</script>
</html>