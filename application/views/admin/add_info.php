<!-- Init plugins only for page -->
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
    
    <script type="text/javascript" src="<?php echo base_url();?>newcss/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>newcss/css/bootstrap-multiselect.css" type="text/css"/>


	<style>
	.contact{
	margin-left:8% !important;
	}
	</style>
<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Contact Information</li>
                      <li class="active">Add Information</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Add Information</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Information</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin:-15px 0 10px 0;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                   
				 <form class="form-horizontal" role="form" action="admin/add_info" method="post" id="addphoto" enctype= multipart/form-data>
				<?php $result=$this->admin_model->getMerchantContactInformationById();?>
									<div class="form-group">
                                        <label class="col-lg-2 control-label" for="placeholder">Address 1</label>
                                        <div class="col-lg-10">
                                            <textarea id="info" name="info" style="width:100%" placeholder="information"><?= $result[0]['information']; ?></textarea>
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-lg-2 control-label" for="placeholder">Address 2</label>
                                        <div class="col-lg-10">
                                            <textarea id="info2" name="info2" style="width:100%" placeholder="information"><?= $result[0]['address']; ?></textarea>
                                        </div>
									</div>
									<div class="form-group">
                                        <label class="col-lg-2 control-label" for="placeholder">Contact No</label>
                                        <div class="col-lg-10">
                                            <textarea id="phone" name="phone" style="width:100%" placeholder="Contact No"><?= $result[0]['phone']; ?></textarea>
                                        </div>
									</div>
									
									<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Timing Details</label>
                                        </div>
										<div class="form-group contact">
                                            <label class="col-lg-2 control-label" for="placeholder">Working</label>
                                        <div class="col-lg-10">
                                                <input  id="monto" name="monto" placeholder="time" type="time" value="<?php 
								$asd=str_replace(' ', '', $result[0]['mon']);
								$to=substr($asd,0,5);
								echo $to; ?>" style="margin-right:5%;width:17%">
												-<input id="monfrom" name="monfrom" value="<?php 
												$asds=str_replace(' ', '', $result[0]['mon']);
								$from=substr($asds,6,5);
								echo $from; ?>" placeholder="time" type="time" style="margin-left:5%;width:17%">
                                            </div>
									   </div>
									   <div class="form-group contact">
                                            <label class="col-lg-2 control-label" for="placeholder">Holidays</label>
                                            <div class="col-lg-10">
                                                <select class="sign-form" style="width:100%" id="example-getting-started" multiple="multiple" name="a[]"> 
                    
    <option  value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wednesday">Wednesday</option>
    <option value="Thursday">Thursday</option>
    <option value="Friday">Friday</option>
    <option value="Saturday">Saturday</option>
    <option value="Sunday">Sunday</option>
</select>
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
var data="<?=$result[0]['sun'];?>";

//Make an array

var dataarray=data.split(",");

// Set the value

$("#example-getting-started").val(dataarray);

// Then refresh

$("#example-getting-started").multiselect("refresh");
</script>
	<script>
		$(document).ready(function(){
			$("#addphoto").validate({
					// Specify the validation rules
					rules: {
							photo: {
									required: true,									
							},
							description:{
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
							photo: "Please select a photo"	,
							description:"Please provide description"
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
				
			$('#monto').change(function(){
				var tim= this.value;
				$('#tueto').val(tim);
				$('#wedto').val(tim);
				$('#thrto').val(tim);
				$('#frito').val(tim);
				$('#satto').val(tim);
				$('#sunto').val(tim);
		//		alert(tim);
			});
			$('#monfrom').change(function(){
				var tim= this.value;
				$('#tuefrom').val(tim);
				$('#wedfrom').val(tim);
				$('#thrfrom').val(tim);
				$('#frifrom').val(tim);
				$('#satfrom').val(tim);
				$('#sunfrom').val(tim);
		//		alert(tim);
			});
		});
	</script>
    <script type="text/javascript">
    $(document).ready(function() {
       	
	    $('#example-getting-started').multiselect();
		
    });
	
</script>
</html>