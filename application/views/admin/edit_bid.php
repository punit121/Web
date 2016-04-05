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
                      <li><a href="#">Bidding</a></li>
                      <li class="active">Edit Bid</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Edit Bid</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Bid</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                               	<div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>     
                                    <form class="form-horizontal" role="form" action="admin/edit_bid" method="post" id="bid-form">
									<input type="hidden" name="id" value="<?php
									echo $bid['id'];?>"/>
									<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Contact Name</label>
                                            <div class="col-lg-10">
                                             <input class="form-control" id="contactName" name="contactName" type="text" value="<?= $bid['contactName']?>">   
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Bid Amount</label>
                                            <div class="col-lg-10">
                                            <input class="form-control onlyInteger" id="bamt" name="bamt" type="text" value="<?= $bid['bamt'];?>">
                                            </div>
                                        </div>

										  <div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Description</label>
                                            <div class="col-lg-10">
												 <input class="form-control" id="description" name="description" type="text" value="<?= $bid['note'];?>">
                                            </div>
                                        </div>
										
								  <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                     <a href="<?= base_url() ?>admin/view_auction"> <button type="button" class="btn">Cancel</button></a>
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
			
			$("#bid-form").validate({
					// Specify the validation rules
					rules: {
							contactName: {
									required: true,									
							},
							bamt: {
									required: true,									
									},
							description: {
									required: true,									
							}
					},
					// Specify the validation error messages
					messages: {
							contactName: "Please provide a contact name",
							bamt: "Please provide a bid amount",
							description:  "Please provide a description"
									
							
					},
					submitHandler: function(form) {							
							form.submit();
					}
			});
					
				$.post('<?=base_url()?>admin/request',function(data){
			console.log(data);
			var availableTags = data.split(',');
			$('#request').autocomplete({
			source: availableTags
			});
		});
		$.post('<?=base_url()?>admin/location',function(data){
			var availableTags = data.split(',');
			$('#location').autocomplete({
			source: availableTags
			});
		});
		});
		
		$('.onlyInteger').keypress(function(e){ 
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
               return false;
			}
			
	});
	</script>
</html>