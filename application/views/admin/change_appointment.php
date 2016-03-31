<!-- Init plugins only for page -->
	<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<script src="<?=base_url();?>assets/js/pages/admin_appointment.js"></script>
<section id="content">
<?php
  $check=$this->admin_model->checkMerchantAppointment(base64_decode($_GET['id']));
		if($check)
		redirect('/viewAppointment');
		else
 $result=$this->admin_model->change_apponitment(base64_decode($_GET['id'])); 
$name= base64_decode($_GET['nm']);
 ?>
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Appointment</a></li>
                      <li class="active">Change Appointment</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Change Appointment</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Appointment</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    
    <form class="form-horizontal" role="form" action="admin/editAppointment" method="post" id="service-form">
								<input type="hidden" name="id" value="<?php echo $result[0]['id'];?>"/>
			
			<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>
																				
       <div class="form-group">
       <label class="col-lg-2 control-label" for="placeholder">Customer Name</label>
       <div class="col-lg-10">
       <input class="form-control" name="customerName" type="text" placeholder="Customer Name" id="customerName" value="<?= $name ?>" readonly>
       </div>
       </div>
	<div class="form-group">
    <label class="col-lg-2 control-label" for="placeholder">Employe Name</label>
         <div class="col-lg-10">
       <input class="form-control" name="employeName" type="text" placeholder="Employe Name" id="employeName" value="<?= $cname=$this->admin_model->findEmployeById($result[0]['empId']); ?>" readonly>
       </div>
       </div>
																	<div class="form-group">
      <label class="col-lg-2 control-label" for="placeholder">Service Name</label>
                                           <div class="col-lg-10">
       <input class="form-control" name="serviceName" type="text" placeholder="Service Name" id="serviceName" value="<?= $cname=$this->admin_model->findServiceById($result[0]['serviceId']); ?>" readonly>
       </div>
        </div>
		<div class="form-group">
        <label class="col-lg-2 control-label" for="placeholder">Appoint Date</label>
        <div class="col-lg-10">
       <input class="form-control" name="appointDate" id="appointDate" type="text" placeholder="Choose date" value="<?= $result[0]['appointDate']; ?>">
	   </div>
        </div>

              <div class="form-group">
         <label class="col-lg-2 control-label" for="placeholder">Appoint Time</label>
             <div class="col-lg-10">
       <input class="form-control" name="appointTime" id="appointTime" type="time" placeholder="Appoint Time" value="<?= $result[0]['appointTime']; ?>">
       </div>
									  <div class="form-group" style="margin-top:7%">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    <a href="<?=base_url()?>admin"><button type="button" class="btn">Cancel</button></a>
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
							merchantName: "Please provide a name",
							description:  "Please provide a description",
							salonName:  "Please provide salon name",
							location:  "Please provide location",
									
							
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
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode == 08)
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
			
		});
	</script>
</html>