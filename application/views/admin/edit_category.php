<!-- Init plugins only for page -->
	<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->

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
                        <h1>Edit Category</h1>
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
                                    
                                    <form class="form-horizontal" role="form" action="admin/edit_category" method="post" id="service-form">
							
																				
                                      <div class="form-group">
									  <input type="hidden" name="id" value="<?php echo $category['id'];?>"/>
                                            <label class="col-lg-2 control-label" for="placeholder">Category Name</label>
                                            <div class="col-lg-10">
											
                                                <input class="form-control" id="name" name="category" type="text" placeholder="Name" value="<?php echo $category['category'];?>">
                                            </div>
                                        </div>
                                          
																				
                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                    <a href="<?=base_url()?>admin/viewCategory"><button type="button" class="btn">Cancel</button></a>
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
							category: {
									required: true,									
							}
					},
					// Specify the validation error messages
					messages: {
							category: "Please provide a category"
					},
					submitHandler: function(form) {
							form.submit();
					}
			});
			
		});
	</script>
</html>