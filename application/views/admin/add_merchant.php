<script>
var baseurl="<?=base_url();?>";
</script>
<script src="<?=base_url();?>assets/js/pages/admin_employee.js"></script>
	<?php $this->load->view('admin_layout/sidebar.php')?>
	<script src="admin_assets/js/plugins/forms/validation/jquery.validate.js"></script>
<script>
var baseurl="<?=base_url();?>";
</script>
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
<div id="allreadyMerchant" style="display:none">								
	You are allready Employee				
</div>

<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Merchant</li>
                      <li class="active">Add Merchant</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Merchant</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Merchant Details</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                                <div class="panel-body">
  <div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div> 
                            <form class="form-horizontal" role="form" action="admin/add_merchant" method="post" id="register-form1" enctype= 'multipart/form-data'>																	
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
																			<div class="col-lg-4" id="selarea"></div>
																	</div>
																	<!--<div class="form-group">
                                    <label class="col-lg-2 control-label" for="address">Address</label>
                                    <div class="col-lg-10">
																			<input class="form-control" id="Address" name="Address" placeholder="address" type="text">
                                    </div>
                                  </div>-->
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
																					<button type="button" class="btn" style="float:left;margin-left:1%;">Cancel</button>
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

