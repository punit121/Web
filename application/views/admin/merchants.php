<!-- Tables plugins -->
<?php $this->load->view('admin_layout/sidebar.php')?>
  <script src="admin_assets/js/plugins/tables/datatables/jquery.dataTables.min.js"></script>
	<script src="admin_assets/js/pages/data-tables.js"></script><!-- Init plugins only for page -->
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li><a href="#">Merchants</a></li>
                      <li class="active">View Merchants</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-table-2"></i>Merchants</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Merchants</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable1">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Location</th>
                                                <th>Photo</th>
                                                <th>Price Rating</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
																				<?php
																				if(isset($merchants)){											
																				foreach($merchants as $value){ //echo "<pre>";print_r($merchants);exit;
																					if($value['merchantId']) {?>
																					<?php if($value['photo']){
																							$src = base_url().'assets/images/merchant/'.$value['photo'];
																						}else{
																							$src = base_url().'assets/images/merchant/usericon.jpg';
																						}?>
																						<tr class="gradeX" id="<?= $value['merchantId']?>">
                                                <td><?= $value['name']; ?></td>
                                                <td><?= $value['email']; ?></td>
                                                <td><?php $result=$this->admin_model->findCategoryByMerchantId($value['merchantId']);
																									if($result)
																									echo $result;
																									else
																									echo 'No Category';
																									?>
																								</td>
                                                <td><?= substr($value['description'],0,100); ?></td>
                                                <td><?= $value['location']; ?></td>
                                                <td><img src="<?= $src; ?>" style="width:70px;height:70px;"/></td>
                                                <td><?php   if($value['priceCheck']=='H')
																										echo "High";
																										elseif($value['priceCheck']=='M')
																										echo "Medium";
																										else
																										echo "Low";
																										?>
																								</td>
                                                <td>
			<a href="admin/edit_merchant?id=<?= base64_encode($value['merchantId']);?>"><i aria-hidden="true" class="i-marker-2" style="cursor:pointer;"></i></a><a><i aria-hidden="true" class="i-remove-4 del_merchant" title="Delete" style="cursor:pointer;display:none;"></i></a>			
					<?php
							if($value['status']==1)
							{
							?>
							<a><i aria-hidden="true" class="ban_merchant"  style="cursor:pointer;">Deactivate</i></a>
<?php
}
else
{
?>
	<a><i aria-hidden="true" class="ban_merchant"  style="cursor:pointer;">Activate</i></a>
					<?php
					}?>
						
																								</td>
                                            </tr>
                                        <?php } } }?> 
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
						<input type="hidden" name="merchant_id" id="merchant_id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_delete" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
	<div class="modal fade" id="modal_ban" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirm ban</h4>
          </div>
					<div class="modal-body">
						Do you really want to Activate/Deactivate this merchant?
						<input type="hidden" name="merchant_id" id="merchant_id"/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" id="ok_ban" class="btn btn-primary">Ok</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
  </body>
	<script>
		$(document).ready(function(){
			$('.del_merchant').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#merchant_id').val(del);
				$('#myModal').modal('show');
			});
			$('#ok_delete').click(function(){
				var id = $('#merchant_id').val();
				$.ajax({
					url: "admin/del_merchant",
					type: "POST",
					data: "merchantId="+id,
					success: function(res){
						//$('body').html(res);return;
						if(res){
							$('#myModal').modal('hide');
							$('#'+id).remove();
							setTimeout(function() {
							location.reload();
							}, 250);
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
					url: "admin/ban_merchant",
					type: "POST",
					data: "merchantId="+id,
					success: function(res){
						//$('body').html(res);return;
						if(res){
							$('#modal_ban').modal('hide');
							//$('#'+id).remove();
							// setTimeout(function() {
								// $.jGrowl("<i class='icon16 i-checkmark-3'></i> Banned successfully", {
									// group: 'success',
									// position: 'center',
									// sticky: false,
									// closeTemplate: '<i class="icon16 i-close-2"></i>',
									// animateOpen: {
											// width: 'show',
											// height: 'show'
									// }
								// });
							// }, 250);
							location.reload();
						}
					}
				});
			});
			
			
		});
	</script>
</html>