<!-- Init plugins only for page -->
	<script src="<?=base_url();?>assets/js/pages/admin_employee.js"></script>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="admin_assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
	
<?php $this->load->view('admin_layout/sidebar.php')?>
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
                        <h1>Edit Employee</h1>
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
                                    
                                    <form class="form-horizontal" role="form" action="admin/edit_employee" method="post" id="register-form" enctype= 'multipart/form-data'>
										<input type="hidden" name="employee_id" value="<?php echo $employee['user_id'];?>"/><div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">First Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="name" name="name" type="text" placeholder="First Name" value="<?php if($employee['name']) echo $employee['name'];?>">
                                            </div>
                                        </div>
											<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Last Name</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="lname" name="lname" type="text" placeholder="Last Name" value="<?php if($employee['lastName']) echo $employee['lastName'];?>">
                                            </div>
                                        </div>
																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Email</label>
                                            <div class="col-lg-10">
                                                <input readonly class="form-control" id="email" name="email" type="text" placeholder="Email" value="<?php if($employee['name']) echo $employee['email'];?>">
                                            </div>
                                        </div>

                                       <!-- <div class="form-group">
                                            <label class="col-lg-2 control-label" for="password">Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="password" name="password" type="password">
                                            </div>
                                        </div> -->

                                        <div class="form-group">
										<label class="col-lg-2 control-label" for="password">Address</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="Address" name="Address" type="text" value="<?php if($employee['name']) echo $employee['address'];?>">
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-lg-2 control-label" for="fileinput">change Photo</label>
                                            <div class="col-lg-10">
											<?php
										if($employee['photo'])
										{
                                           $src = base_url().'assets/images/merchant/'.$employee['photo'];
										?>
										
										<img src="<?= $src; ?>" style="width:70px;height:70px;"/>
										
										<?php												
										}
											else
											{
												$src = base_url().'assets/images/merchant/nophoto.jpg';
											?>
											<img src="<?= $src; ?>" style="width:70px;height:70px;"/>
											<?php
											}
											?>
											
                                           <div class="uploader" id="uniform-file">
							<input type="file" name="employee_image" id="employeeimage">
							<span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div><div id="empimage"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                   <a href="<?=base_url()?>admin/employees"><button type="button" class="btn">Cancel</button></a>
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
			
		});
	</script>
</html>