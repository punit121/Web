<script>
var baseurl="<?=base_url();?>";
</script>
	<script src="<?=base_url();?>assets/js/pages/admin_employee.js"></script>
	<?php $this->load->view('admin_layout/sidebar.php')?>
	<script src="admin_assets/js/plugins/forms/validation/jquery.validate.js"></script>
<script>
			$(document).ready(function(){
						$('#state').change(function(){
								var cit=$('#state').val();
								$.ajax({
								url:'<?=base_url()?>admin/getAreaById',
								type:'post',
								data:'city='+cit+'&area=<?php echo $merchant['area']; ?>',
								success:function(data){
									$('#selarea').html('');
									$('#selarea').html(data);
									$('#selarea').val('<?php echo $merchant['area']; ?>');
								}
								});
							});
							var cit=$('#state').val();
							$.ajax({
								url:'<?=base_url()?>admin/getAreaById',
								type:'post',
								data:'city='+cit+'&area=<?php echo $merchant['area']; ?>',
								success:function(data){
									$('#selarea').html('');
									$('#selarea').html(data);
									//$('#location').val('<?php echo $merchant['area']; ?>');
								}
							});
			});
</script>
<div id="allreadyEmployeee" style="display:none">								
	You are allready Employee				
</div>
	<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Employee</li>
                      <li class="active">Add Employee</li>
                    </ul>
                </div>
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Employee</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Employee Details</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                                <div class="panel-body">
																	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?>
																	</div> 
                                <form class="form-horizontal" role="form" action="admin/new_emp" method="post" id="register-form" enctype= 'multipart/form-data'>
																	<div class="form-group">
																		<label class="col-lg-2 control-label" for="placeholder">Eyployee</label>
                                    <div class="col-lg-10">
                                      <input class="form-control employee"  name="employee" type="radio"value="Y" checked>Yes
																			<input class="form-control employee"  name="employee" type="radio" value="N">No
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label" for="placeholder">First Name</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="name" name="name" type="text" placeholder="first name">
                                    </div>
                                  </div>
																	<div class="form-group">
                                    <label class="col-lg-2 control-label" for="placeholder">Last Name</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="lname" name="lname" type="text" placeholder="last name">
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
                                    <label class="col-lg-2 control-label" for="placeholder">Email</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="email" name="email" type="text" placeholder="email">
                                    </div>
                                  </div>
																	<div class="form-group">
                                    <label class="col-lg-2 control-label" for="password">Password</label>
                                    <div class="col-lg-10">
                                      <input class="form-control" id="password" name="password" placeholder="password" type="password">
                                    </div>
                                  </div>
																	<div class="form-group">
																			<label class="col-lg-2 control-label" for="state">City</label>
																			<div class="col-lg-5">
																				<select name="state" id="state">
																				<?php	$city=$this->admin_model->getCity();
																							foreach($city as $c)
																							{
																				?>
																					<option value="<?php echo $c['id']; ?>" <?php if($merchant['city']==$c['id'])echo 'selected'; ?>><?php echo $c['cityName']; ?></option>
																				<?php
																					}
																				?>
																				</select>
																			</div>
																			<label class="col-lg-1 control-label" for="location">Area</label>
																			<div class="col-lg-4" id="selarea" name="Address"></div>
																	</div>
                                  <div class="form-group">
                                    <label class="col-lg-2 control-label" for="fileinput">Photo</label>
                                    <div class="col-lg-10">
                                      <div class="uploader" id="uniform-file"><input type="file" name="picture" id="picture"><span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div><div id="photo"></div>
                                    </div>											
                                  </div>
																	<div class="form-group">
																		<div class="col-lg-offset-2">
																				<div class="pad-left15">
                                          <button type="submit" class="btn btn-primary" id="noEmployee" style="float:left;">Save changes</button>
																</form>
												   <form name="merchantEmployee" id="merchantEmployee" action="admin/NoEmployeeAvailable" method="post">
                                                    <button type="submit" class="btn btn-primary" id="saveEmployee" style="display:none;float:left;">Save changes</button>
													</form>
                                                    <button type="button" class="btn" style="float:left;margin-left:1%;">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                            
                                    
										

                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      


                    </div><!-- End .row-fluid  -->
                </div>
            </div> <!-- End .wrapper  -->
        </section>
   