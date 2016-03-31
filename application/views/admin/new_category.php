	<!-- Init plugins only for page -->
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<?php $this->load->view('admin_layout/sidebar.php')?>
			<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Category</li>
                      <li class="active">Add Category</li>
                    </ul>
                </div>
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Category</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Category</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                                <div class="panel-body">
																	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?>
																	</div>     
                                  <form class="form-horizontal" role="form" action="admin/insert_category" method="post" id="service-form">
																		<div class="form-group">
                                      <label class="col-lg-2 control-label" for="placeholder">Category Name</label>
                                      <div class="col-lg-10">
																				<input class="form-control" id="categoryName" name="categoryName" type="text" placeholder="enter category name">
                                      </div>
                                    </div>
																		<?php if($this->session->userdata('user_level')=='1') { ?>
																		<div class="form-group">
                                      <label class="col-lg-2 control-label" for="placeholder">Merchant</label>
                                      <div class="col-lg-10">
                                        <select class="select2" id="merchantname" name="merchantName">
																					<option value="">Select merchant</option>
																					<?php $result=$this->admin_model->getAllmerchants();
																					foreach($result as $merchantdata){
																					?>
																					<option value="<?= $merchantdata['merchantId'];?>"><?= $merchantdata['salonName'];?></option>
																					<?php 
																					} ?>
																				</select>
                                      </div>
                                    </div>
																		<?php } ?>
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
	<script>
		$(document).ready(function(){
			// Setup form validation on the #register-form element
			$("#service-form").validate({
					// Specify the validation rules
					rules: {
							categoryName: {
									required: true,},									
							
							merchantName: { required: true,}									
							
					},
					// Specify the validation error messages
					messages: {
							categoryName: "Please provide a Category name",
							merchantName: "Please provide a merchant name"
					},
					submitHandler: function(form) {
							form.submit();
					}
			});
			$('#name').keydown(function (e) {
						//alert("hello");
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
				
		});
	</script>
</html>