<!-- Tables plugins -->
  <script src="assets/js/plugins/tables/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/js/pages/data-tables.js"></script><!-- Init plugins only for page -->
	<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Photo</li>
                      <li class="active">View Photos</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-table-2"></i>Photos</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Employee Photos</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                        <ul style="list-style-type: none;">
										<?php
							if($this->session->userdata('user_level')=='1')
							$result=$this->admin_model->view_Allphoto();
							else
							$result=$this->admin_model->view_photo();
												if(!empty($result))
												{
												foreach($result as $photo) {?>
												<li>
										<div class="image" style="width:150px;height:160px;float:left;" id="<?= $photo['id']; ?>" >
										<div id="image<?= $photo['id']; ?>" rel="<?= $photo['id']; ?>" class="imageClose" style="position:absolute;width:20px;height:20px;display:none;float:right;cursor:pointer;">
										<img src="<?=base_url()?>assets/images/close.png" width="100%" height="100%">
										</div><img src="<?=base_url()?>assets/images/merchant/browsphoto/<?php echo $photo['photothum'];  ?>" width="100%" height="100%" style="padding:10px"></div>
										<?php } } else { echo "<center>No photo found</center>"; }?>
										</li>
										</ul>
										
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                                                
                        </div><!-- End .col-lg-12  -->                     
                                            
                    </div><!-- End .row-fluid  -->
										<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Working Photos</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                        <ul style="list-style-type: none;">
										<?php
							if($this->session->userdata('user_level')=='1')
							$result=$this->admin_model->view_Allphoto();
							else
							$result=$this->admin_model->view_photo();
												if(!empty($result))
												{
												foreach($result as $photo) {
													if($photo['photoOf']=='w'){
												?>
												<li>
										<div class="image" style="width:150px;height:160px;float:left;" id="<?= $photo['id']; ?>" >
										<div id="image<?= $photo['id']; ?>" rel="<?= $photo['id']; ?>" class="imageClose" style="position:absolute;width:20px;height:20px;display:none;float:right;cursor:pointer;">
										<img src="<?=base_url()?>assets/images/close.png" width="100%" height="100%">
										</div><img src="<?=base_url()?>assets/images/merchant/browsphoto/<?php echo $photo['photothum'];  ?>" width="100%" height="100%" style="padding:10px"></div>
										<?php } }
										
										} else { echo "<center>No photo found</center>"; }?>
										</li>
										</ul>
										
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                                                
                        </div><!-- End .col-lg-12  -->                     
                                            
                    </div><!-- End .row-fluid  -->
										<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Premise Photos</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                        <ul style="list-style-type: none;">
										<?php
							if($this->session->userdata('user_level')=='1')
							$result=$this->admin_model->view_Allphoto();
							else
							$result=$this->admin_model->view_photo();
												if(!empty($result))
												{
												foreach($result as $photo) {
												if($photo['photoOf']=='p'){
												?>
												<li>
										<div class="image" style="width:150px;height:160px;float:left;" id="<?= $photo['id']; ?>" >
										<div id="image<?= $photo['id']; ?>" rel="<?= $photo['id']; ?>" class="imageClose" style="position:absolute;width:20px;height:20px;display:none;float:right;cursor:pointer;">
										<img src="<?=base_url()?>assets/images/close.png" width="100%" height="100%">
										</div><img src="<?=base_url()?>assets/images/merchant/browsphoto/<?php echo $photo['photothum'];  ?>" width="100%" height="100%" style="padding:10px"></div>
										<?php }} } else { echo "<center>No photo found</center>"; }?>
										</li>
										</ul>
										
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                                                
                        </div><!-- End .col-lg-12  -->                     
                                            
                    </div><!-- End .row-fluid  -->
<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Rate Card</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                        <ul style="list-style-type: none;">
										<?php
							if($this->session->userdata('user_level')=='1')
							$result=$this->admin_model->view_Allphoto();
							else
							$result=$this->admin_model->view_photo();
												if(!empty($result))
												{
												foreach($result as $photo) {
													if($photo['photoOf']=='r'){
												?>
												<li>
										<div class="image" style="width:150px;height:160px;float:left;" id="<?= $photo['id']; ?>" >
										<div id="image<?= $photo['id']; ?>" rel="<?= $photo['id']; ?>" class="imageClose" style="position:absolute;width:20px;height:20px;display:none;float:right;cursor:pointer;">
										<img src="<?=base_url()?>assets/images/close.png" width="100%" height="100%">
										</div><img src="<?=base_url()?>assets/images/merchant/browsphoto/<?php echo $photo['photothum'];  ?>" width="100%" height="100%" style="padding:10px"></div>
										<?php } }
										
										} else { echo "<center>No photo found</center>"; }?>
										</li>
										</ul>
										
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                                                
                        </div><!-- End .col-lg-12  -->                     
                                            
                    </div><!-- End .row-fluid  -->
										
                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
	    <!-- Boostrap modal dialog -->
		<script>
		$(document).ready(function(){
				$('.image').hover(function(){
					var id=$(this).attr('id');
					//alert(id);
					$('#image'+id).show('slow');
				});
				$('.image').mouseleave(function(){
					$('.imageClose').hide('slow');
				});
				$('.imageClose').click(function(){
					var id=$(this).attr('rel');
					$.ajax({
					url: "admin/deleteImage",
					type: "POST",
					data: "id="+id,
					success: function(res){
					location.reload();
						}
					 });
					
				});
		});
	</script>