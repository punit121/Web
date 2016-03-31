<!-- Init plugins only for page -->
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<script src="admin_assets/js/plugins/forms/validation/jquery.validate.js"></script>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="#"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Post Blog</a></li>
                      <li class="active">Edit Blog</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1>Edit Blog</h1>
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
                                    
                                    <form class="form-horizontal" role="form" action="admin/edit_blog" method="post" id="register-form" enctype= 'multipart/form-data'>
										<input type="hidden" name="blog_id" value="<?php echo $blog['id'];?>"/><div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>																				<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Title</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="title" name="title" type="text" placeholder="title" value="<?php if($blog['title']) echo $blog['title'];?>">
                                            </div>
                                        </div>
										
											<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Description</label>
                                            <div class="col-lg-10">
                                                <textarea id="description" name="description" placeholder="description" style="width:100%"> <?php if($blog['description']) echo $blog['description'];?></textarea>
                                            </div>
                                        </div>
																												<div class="form-group">
                                            <label class="col-lg-2 control-label" for="placeholder">Category</label>
                                            <div class="col-lg-10">
                                                <select id="category" class="select2" name="category" >
												<option value="">Select Category</option>
												<?php $result=$this->admin_model->selectCategory();
												foreach($result as $value){
												?>
												<option value="<?= $value['id'] ?>"><?= $value['category'] ?>
												</option>
												<?php } ?>
												</select>
                                            </div>
                                        </div>
						
						<div class="form-group">
                                            <label class="col-lg-2 control-label" for="fileinput">change Photo</label>
                                            <div class="col-lg-10">
											<?php
										if($blog['photo'])
										{
                                           $src = base_url().'assets/images/demo/blog/'.$blog['photo'];
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
							<input type="file" name="blog_picture" id="blogimage">
							<span class="filename" style="-webkit-user-select: none;">No file selected</span><span class="action" style="-webkit-user-select: none;">Choose File</span></div><div id="blgimage"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                   <a href="<?=base_url()?>admin/view_blog"><button type="button" class="btn">Cancel</button></a>
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
				 $('#blogimage').bind('change', function() {
				  if(this.files[0].size <10240){
				  $('#blgimage').html('<font color="red">File size is less than 10kb<font>');
				  }
				  else
				  {
				   $('#blgimage').html('');
				  }
				});
	
				$("#register-form").validate({
					// Specify the validation rules
					rules: {
							title: {
									required: true,
									
							},
							description: {
									required: true,
									
							},
							category: {
									required: true,
									
									}
					},
					// Specify the validation error messages
					messages: {
							title: "Please provide a title",
							description:"Please provide a description",
							category:"Please provide a category"
					},
					submitHandler: function(form) {
							form.submit();
					}
			});
				 
				
		});
	</script>
</html>