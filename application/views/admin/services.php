<!-- Tables plugins -->
  <script src="admin_assets/js/plugins/tables/datatables/jquery.dataTables.min.js"></script>
	<script src="admin_assets/js/pages/data-tables.js"></script><!-- Init plugins only for page -->
	<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Services</li>
                      <li class="active">View Services</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-table-2"></i> Services</h1>
                    </div>
										
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Services</h4>									
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            <div class="<?php if(!empty($added)){ echo "alert-success";}else{ echo "alert-danger";}?>" style="padding:10px;margin-bottom:10px;text-align:center;display:<?php if(isset($added)){ echo "block";}else{ echo "none";}?>"><?php if(!empty($message)){ echo $message;}?></div>
							
                                <div class="panel-body">
                                    <?php	
																			if($this->session->userdata('user_level')==1){
																			?><div class="row">
																					<div class="col-lg-3">
																					</div>
																					<div class="col-lg-4">
																						<input type="text" id="merchantIds" class="selectAuto" style="width:350px">
																						<!--<select id="merchantIds">
																						<?php
																						$merchants=$this->admin_model->get_merchants();
																						foreach($merchants as $value)
																						{
																						?>
																						<option value="<?//=$value['merchantId'];?>"><?php// echo $value['salonName'].'-'.$value['location'];?></option>
																						<?php
																						}
																						?>
																						</select>-->
																					</div>
																					<div class="col-lg-4">
																						<input type="button"id="searchMerchant" value="search">
																					</div>
																				</div>	<?php } ?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="<?php if(!empty($services)) echo 'dataTable1'; else 'tabledata'; ?>">
                                        <thead>
                                            <tr>
                                                <th>Service Name</th>
																								<th>Category</th>
                                                <th>Description</th>
                                                <th>Duration</th>
                                                <th>Price</th>
																								<th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ServiceData">
																				
											<?php 
											$services=$this->admin_model->selectService();
											if(!empty($services)){
											foreach($services as $value){
												?>
												<tr class="gradeX" id="<?= $value['id']?>">
                                              <td><?= $value['serviceName']; ?></td>
                                              <td><?= $this->admin_model->findCategoryById($value['businessCategory']); ?></td>
																							<td><?= $value['description']; ?></td>
                                              <td><?= $value['duration']; ?><sup> min</sup></td>
                                              <td><?= $value['price']; ?><sup> Rs</sup></td>
                                              <td>
																									<a href="admin/edit_service?id=<?=$value['id']?>"><i aria-hidden="true" class="i-marker-2" style="cursor:pointer;" title="Edit"></i></a>
																									<a ><i aria-hidden="true" class="i-remove-4 del_service" title="Delete" style="cursor:pointer;display:none;"></i></a>
																									
																								<?php
																										if($value['status']==1)
																										{
																										?>
																												<a><i aria-hidden="true" class="adctv_service"  style="cursor:pointer;">Deactivate</i></a>
																										<?php
																										}
																										else
																										{
																										?>
																												<a><i aria-hidden="true" class="adctv_service"  style="cursor:pointer;">Activate</i></a>
																										<?php
																										}?>
																									
																								</td> 
                                            </tr>
                                        <?php } //}
									}else {
									echo "<tr><td colspan='6' align='center'>No record(s) found</td></tr>";
									}		
									?> 
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
                                </div><!-- End .panel-body -->
                            </div><!-- End .widget -->
                                                
                        </div><!-- End .col-lg-12  -->                     
                                            
                    </div><!-- End .row-fluid  -->

                </div> <!-- End .container-fluid  -->
            </div> <!-- End .wrapper  -->
        </section>
    </div><!-- End .main  -->
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
	
	<div class="modal fade" id="adcvt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm ban</h4>
          </div>
					<div class="modal-body">
						Do you really want to Activate/Deactivate this Service?
						<input type="hidden" name="adcvt_id" id="adcvt_id"/>
          </div>		  
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_adctv" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
	
  </body>
	<script>
		$(document).ready(function(){
			$('.del_service').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#service_id').val(del);
				$('#myModal').modal('show');
			});
			$('#ok_delete').click(function(){
				var id = $('#service_id').val();
				$.ajax({
					url: "admin/del_service",
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
			
			$('.ban_merchant').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#merchant_id').val(del);
				$('#modal_ban').modal('show');
			});
			$('#ok_ban').click(function(){
				var id = $('#merchant_id').val();
				$.ajax({
					url: "welcome/ban_merchant",
					type: "POST",
					data: "merchantId="+id,
					success: function(res){
						//$('body').html(res);return;
						if(res){
							$('#modal_ban').modal('hide');
							$('#'+id).remove();
							setTimeout(function() {
								$.jGrowl("<i class='icon16 i-checkmark-3'></i> Banned successfully", {
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
			//Working
			
			$(document).on('click', '.adctv_service', function(){
				var del = $(this).closest('tr').attr('id');
				$('#adcvt_id').val(del);
				$('#adcvt').modal('show');
			});
			$('#ok_adctv').click(function(){
				var id = $('#adcvt_id').val();
				$.ajax({
					url: "admin/adctv_service",
					type: "POST",
					data: "service_id="+id,
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
			$(".selectAuto").keydown(function(e){
				if( (e.keyCode != $.ui.keyCode.TAB) && (e.keyCode != $.ui.keyCode.ENTER)) return; 							
				 e.keyCode = $.ui.keyCode.DOWN;
				 $(this).trigger(e);
				 $(this).siblings("input").select();
			});
			$('#searchMerchant').click(function(){
					var datastring='merchantName='+$('#merchantIds').val();
					$.post('admin/findMerchantIdByName',datastring,function(data){						
						var datastr='merchantId='+data;
						var appenndTable='';
							$.post('admin/findServiceByMerchant',datastr,function(data){
								data=eval(data);
								$.each(data,function(index,value){
									appenndTable+='<tr class="gradeX" id="'+value.id+'"><td>'+value.serviceName+'</td><td>'+value.businessCategory+'</td><td>'+value.description+'</td><td>'+value.duration+'<sup> min</sup></td><td>'+value.price+'<sup> Rs</sup></td><td><a href="admin/edit_service?id='+value.id+'" class="editService" rel="'+value.id+'"><i aria-hidden="true" class="i-marker-2" style="cursor:pointer;" title="Edit"></i></a><a><i aria-hidden="true" class="adctv_service"  style="cursor:pointer;">'+value.status+'</i></a></td></tr>';
								});
								$('#ServiceData').html('');
								$('#ServiceData').append(appenndTable);
							});
					});
			});
			// $('.editService').click(function(){
				// var id=$(this).val()
			// });
			
		});
	</script>
</html>