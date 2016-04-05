<!-- Tables plugins -->
  <script src="admin_assets/js/plugins/tables/datatables/jquery.dataTables.min.js"></script>
	<script src="admin_assets/js/pages/data-tables.js"></script><!-- Init plugins only for page -->
<!-- Init plugins only for page -->
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<!--<script src="assets/js/pages/form-elements.js"></script>-->
	<!--<script src="assets/js/plugins/forms/validation/jquery.validate.js"></script>-->
<?php $this->load->view('admin_layout/sidebar.php')?>
	<!--<script src="assets/js/pages/form-validation.js"></script><!-- Init plugins only for page -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Category</li>
                      <li class="active">View Categories</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1></h1>
                    </div>

                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="panel panel-default">								
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Categories</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
																<?php	
																			if($this->session->userdata('user_level')==1){
																			?><div class="row">
																					<div class="col-lg-3">
																					</div>
																					<div class="col-lg-4">
																						<input type="text" id="merchantIds" class="selectAuto" style="width:350px">
																					</div>
																					<div class="col-lg-4">
																						<input type="button"id="searchMerchant" value="search">
																					</div>
																				</div>	<?php } ?>
																				<?php if($this->session->userdata('user_level')=='1') 
																				$viewCategory=$this->admin_model->getAllCategory();
																						else
																				$viewCategory=$this->admin_model->getCategory(); ?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="<?php if(!empty($viewCategory)) echo 'dataTable1'; else 'tabledata'; ?>">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Created On</th>
												<th>Actions</th>
                                            </tr>
                                        </thead>
                      <tbody id="ServiceData"><?php 
											if(!empty($viewCategory))
											{
											foreach($viewCategory as $value)
											  {
										?>
											<tr id="<?=$value['id']?>">
                                                <td><?=$value['category']?></td>
                                                <td><?=$value['createdOn']?></td>
												<td>
				<a href="admin/edit_category?id=<?= $value['id'];?>"><i aria-hidden="true" class="i-marker-2" title="Edit" style="cursor:pointer;"></i></a>
											<!-- Working -->
						<a ><i aria-hidden="true" class="i-remove-4 del_service" title="Delete" style="cursor:pointer;display:none;"></i></a>				
						<?php
							if($value['status']==1){
						?>
							<a><i aria-hidden="true" class="adctv_category"  style="cursor:pointer;">Deactivate</i></a>
						<?php
						}
						else{
						?>
							<a><i aria-hidden="true" class="adctv_category"  style="cursor:pointer;">Activate</i></a>
						<?php
						}?>
																								</td>
                                             </tr>
										<?php } 
											} else{ echo '<tr><td colspan="3" align="center">No record found</td></tr>'; } ?>	
                                        </tbody>
                                        <!--<tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>-->
                                    </table>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-6  -->                      
						</div>

                    </div><!-- End .row-fluid  -->
                </div>
            </div> <!-- End .wrapper  -->
    </section>   

	    <!-- Boostrap modal dialog -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm delete</h4>
          </div>
					<div class="modal-body">
						Do you really want to delete?
						<input type="hidden" name="service_id" id="service_id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_delete" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
 <!-- Boostrap modal dialog -->
  <div class="modal fade" id="adcvt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm Activate/Deactivate</h4>
          </div>
					<div class="modal-body">
						Do you really want to Activate/Deactivate this Category?
						<input type="hidden" name="adcvt_id" id="adcvt_id"/>
          </div>		  
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_adctv" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 


	
	<script>
		$(document).ready(function(){			
			$(document).on('click', '.adctv_category', function(){
				var del = $(this).closest('tr').attr('id');
				$('#adcvt_id').val(del);
				$('#adcvt').modal('show');
			});
			$('#ok_adctv').click(function(){
				var id = $('#adcvt_id').val();				
				$.ajax({
					url: "admin/adctv_category",
					type: "POST",
					data: "category_id="+id,
					success: function(res){
						//$('body').html(res);return;
						if(res){
							$('#adcvt').modal('show');
							//$('#'+id).remove();
							setTimeout(function() {
								$('#adcvt').modal('hide');
								location.reload();
							}, 250);
						}
					}
				});
			});
			$('.del_service').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#service_id').val(del);
				$('#myModal').modal('show');
			});
			$('#ok_delete').click(function(){
				var id = $('#service_id').val();
				$.ajax({
					url: "admin/del_category",
					type: "POST",
					data: "service_id="+id,
					success: function(res){
						//$('body').html(res);return;
						if(res){
							$('#myModal').modal('hide');
							$('#'+id).remove();
							setTimeout(function() {
								$.jGrowl("<i class='icon16 i-checkmark-3'></i> Deleted successfully", {
									group: 'success',
									position: 'center',
									sticky: false,
									closeTemplate: '<i class="icon16 i-close-2"></i>',
									animateOpen: {
											width: 'show',
											height: 'show'
									}
								});
							}, 250);
							location.reload();
						}
					}
				});
			});
			$.post('admin/listOfMerchant',function(data){			
					var availableTags = data.split("&");
					$('#merchantIds').autocomplete({
					source: availableTags
					});
			});
			$('#searchMerchant').click(function(){
					var datastring='merchantName='+$('#merchantIds').val();
					$.post('admin/findMerchantIdByName',datastring,function(data){	
						console.log(data);
						var datastr='merchantId='+data;
						var appenndTable='';
							$.post('admin/findMerchantIdByCategoryName',datastr,function(data){		
								if(data=='not')
								{								
								appenndTable+='<tr class="gradeX"><td colspan="3">No records found.</td></tr>'
								}
								else
								{
									console.log(data);
								data=eval(data);
								$.each(data,function(index,value){									
									appenndTable+='<tr id="'+value.id+'"><td>'+value.category+'</td><td>'+value.createdOn+'</td><td><a href="admin/edit_category?id='+value.id+'"><i aria-hidden="true" class="i-marker-2" title="Edit" style="cursor:pointer;"></i></a><a ><i aria-hidden="true" class="adctv_category"  style="cursor:pointer;">'+value.status+'</a>';
								 });	
								}
								$('#ServiceData').html('');
								$('#ServiceData').append(appenndTable);
							});
					});
			});		
		});
	</script>