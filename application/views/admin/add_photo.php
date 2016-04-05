<!-- Init plugins only for page -->
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<?php $this->load->view('admin_layout/sidebar.php')?>
<script>
function workfun(a){
if(a=='w')
{
	document.getElementById('workingpic').style.display = 'block';
	}
	else
	{
		document.getElementById('workingpic').style.display = 'none';
		}
}


</script>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Photo</li>
                      <li class="active">Add Photo</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Photo</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Add Photo</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin:-15px 0 10px 0;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                   
				 <form class="form-horizontal" role="form" action="admin/add_lookbook" method="post" id="addphoto" enctype= multipart/form-data>

									 <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Add Photo</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="photo" multiple name="photo[]" type="file"><div id="picture"></div>
                                            </div>
									   </div>
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
                                            <label class="col-lg-2 control-label" for="placeholder">Photo of</label>
                                            <div class="col-lg-10">
                                                <select class="select2" id="photofor" name="photofor" onchange="workfun(this.value)">
												<option value="">Select category</option>
												<option value="p">Premises</option>
												<option value="w">Working</option>
                                                <option value="r">Rate Card</option>
												</select>
											</div>
									</div>
                                    <div id="workingpic" class="form-group" hidden="">
                                            <label class="col-lg-2 control-label" for="placeholder">Category</label>
                                            <div class="col-lg-10">
                                                <select class="select2" id="catfor" name="catfor">
												<option value="">Select category</option>
												<option value="hair">Hair</option>
                                                 <option value="skin">Skin</option>
               									<option value="makeup">Makeup</option>
               									<option value="nails">Nails</option>
                                                <option value="body">Body</option>
                                                <option value="fragrances">Fragrances</option>
               									<option value="other">Other</option>  
												</select>
											</div>
									</div>
										<div class="form-group" id="descforum">
                                            <label class="col-lg-2 control-label" for="placeholder">Description</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="description" name="descrption" placeholder="description" type="text">
                                            </div>
									   </div>
										
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
    </div><!-- End .main  -->
	    
  </body>
	<script>
		$(document).ready(function(){
			$("#addphoto").validate({
					// Specify the validation rules
					rules: {
							photo: {
									required: true,									
							},
							descrption:{
								required: true,									
							},
							merchantName:{
								required: true,									
							},
							photofor:{
								required: true,									
							}
					},
					// Specify the validation error messages
					messages: {
							photo: ""	,
							descrption:"Please provide description",
							merchantName:"Please provide merchant name",
							photofor:"Please provide photo of"
					},
					submitHandler: function(form) {							
							form.submit();
					}
			});
			// Setup form validation on the #register-form element
			 $('#photo').bind('change', function() {
				  if(this.files[0].size <10240){
				  $('#picture').html('<font color="red">File size is less than 10kb<font>');
				  }
				  else
				  {
				   $('#picture').html('');
				  }
				});
				$('#photofor').change(function(){
				if($( "#photofor option:selected" ).val()=='p' || $( "#photofor option:selected" ).val()=='r')
				$('#descforum').hide();
				else
				$('#descforum').show();
				});
		});
	</script>
</html>