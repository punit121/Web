<script>
var baseurl='<?=base_url()?>';
</script>
<!--<script src="<?= base_url()?>assets/js/pages/profile.js"></script>
<script src="<?= base_url()?>assets/js/plugins/forms/validation/jquery.validate.js"></script>-->
    <div class="main">
        	  <?php $this->load->view('admin_layout/sidebar');?>

        <section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Account</a></li>
                      <li class="active">Setting</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-settings"></i> Settings </h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-settings"></i></div> 
                                    <h4>Settings</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
								
                                    <form class="form-horizontal" role="form" method="post" 
									action="auth/change_password1" id="userPasswordValidation">
									
									<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>
									
                                        <div class="form-group">
											<label class="col-lg-2 control-label" for="oldpass">Old Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" type="password" id="old_password" name="old_password" value="">
												
												<label for="" id="oldpassworderror" class="error" style="display:none">This password is not exist in database.</label>
                                            </div>
                                        </div><!-- End .control-group  -->
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="password">New Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" type="password" id="new_password" name="new_password" value="">
												<label for="name" class="error"></label>
                                            </div>
                                        </div><!-- End .control-group  -->
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="password">Confirm Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" type="password" name="confirm_new_password" id="confirm_new_password" value="">
                                            </div>
                                        </div><!-- End .control-group  -->
										<div class="form-group">
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" id="submitbutton" class="btn btn-primary">Save changes</button>
													</div>                                                
                                            </div>      
                                        </div>
                                    </form>
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                            
                        </div><!-- End .col-lg-12  --> 
                    </div><!-- End .row-fluid  -->

                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
	<script>
		$(document).ready(function(){
			$('#userPasswordValidation').validate({
				ignore: null,
				ignore: 'input[type="hidden"]',
				rules: {
					old_password: {
						required: true,
						remote: {
								url: baseurl+'auth/checkPasswordExist',
								type: 'GET',
								data:
									{
										name: function()
										{
										return $('#old_password').val();
										}
									}
								}
					},
					new_password: {
						required: true
					},
					confirm_new_password: {
						required: true,
						equalTo: "#new_password"
					}
				},
				messages: {
					
					old_password: {
						required: "please provide your Old Password",
						remote: "Incorrect Password"
					},
					new_password: {
						required: "please provide your new Password"
					},
					confirm_new_password: {
						required: "please provide your confirm password",
						equalTo: "Confirm password is not same"
					}
				},
				
			});
			
		});
	</script>