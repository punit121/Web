<script src="<?=base_url();?>assets/js/pages/admin_employee.js"></script>
	<?php $this->load->view('admin_layout/sidebar.php')?>
	<script src="admin_assets/js/plugins/forms/validation/jquery.validate.js"></script>

<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Blog</a></li>
                      <li class="active">new Blog</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>New Blog</h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-menu-6"></i></div>
                                    <h4>Text fields</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                   <div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div> 
                                    <form class="form-horizontal" role="form" action="admin/new_blog" method="post" id="blog-form" enctype= 'multipart/form-data'>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="title">Title</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="title" name="title" placeholder="title" type="text">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="description">Description</label>
                                            <div class="col-lg-10">
                                               <textarea id="description" name="description" placeholder="description" style="width:100%"></textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="category">Category</label>
                                            <div class="col-lg-3">
                                               <select class="select2" id="category" name="category">
											   <option value="">Select Category</option>
											   <?php $result=$this->admin_model->selectCategory();
												foreach($result as $value){
												?>
											   
					<option value="<?= $value['id']; ?>"><?= $value['category']; ?></option>
											   <?php } ?>
											   </select>
											   </div>
											     <div class="col-lg-3" style="margin-top:1% !important">
												<a href="<?= base_url();?>new_category?add_category=new">Add More</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="fileinput">Photo</label>
                                            <div class="col-lg-10">
                                                <div class="uploader" id="uniform-file"><input type="file" name="blog_picture" id="blog_picture"><span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div><div id="photo"></div>
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
			
			$("#blog-form").validate({
					rules: {
							title: {
									required: true,
									},
							description: {
									required: true,
									},
							category: {
									required: true,
							},
							
							blog_picture: {
									required: true,
							}
							
					},
					messages: {
							title: {
								required: "Please provide a title.",
								
							},
							description: {
								required: "Please provide a description.",
								
							},
							blog_picture:{
								required:""},
							category:{
								required:"please provide category"}
						
							
							
					},
					submitHandler: function(form) {
							form.submit();
					}
			});
		
			 $('#blog_picture').bind('change', function() {
				  if(this.files[0].size <10240){
				  $('#photo').html('<font color="red">File size is less than 10kb<font>');
				  }
				  else
				  {
				   $('#photo').html('');
				  }
				});
		});
	</script>
</html>