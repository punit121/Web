
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
                      <li>Offers</li>
                      <li class="active">View offers</li>
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
                                    <h4>Offers</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
								<?php if($this->session->userdata('user_level')=='1') 
					$result=$this->admin_model->getAllOfferData();
					else
					$result=$this->admin_model->getOfferData();
					?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="<?php if(!empty($result)) echo 'dataTable'; else 'tabledata'; ?>">
                                        <thead>
                                            <tr>
                                                <th>Offer Name</th>
                                                <th>Offer Image</th>
												<th>Features</th>
												<th>Booking Price</th>
												<th>Actual Price</th>
												<th>Discount</th>
												<th>Merchant Name</th>
												<th>Created On</th>
                                                <th>Expire On</th>
												<th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php 
											if(!empty($result))
											{
											foreach($result as $offerdata)
											  {
										?>
											<tr id="<?=$offerdata['id']?>">
											<td><?=$offerdata['name']?></td>
											<td>
											<?php if($offerdata['offerImage']) {?>
											<img src='<?= base_url()?>assets/images/demo/offer/<?= $offerdata['offerImage']?>' width="100px">
											<?php } else { ?>
											<center>No Photo</center>
											<?php } ?>
											</td>
                                            
                                                <td><?=$offerdata['features']?></td>
												  <td><?=$offerdata['bookingPrice']?><sup> Rs</sup></td>
												    <td><?=$offerdata['price']?><sup> Rs</sup></td>
													  <td><?=$offerdata['discount']?><sup> %</sup></td>
													    <td><?php
														 echo $result=$this->admin_model->findMerchantNameById($offerdata['merchantId']);
														  ?></td>
														  <td><?= date("d/m/y",strtotime($offerdata['createdOn']));?></td>
                                                           <td><?php if($offerdata['expdate']) echo date("d/m/y",strtotime($offerdata['expdate']));?></td>
														   <td>
														  <a href="admin/edit_offer?id=<?= base64_encode($offerdata['id']);?>&mid=<?= base64_encode($offerdata['id']);?>"><i aria-hidden="true" class="i-marker-2" style="cursor:pointer;"></i></a>
	<a ><i aria-hidden="true" class="i-remove-4 del_offer" title="Delete" style="cursor:pointer;"></i></a>
											<!-- Working -->
						<?php
							if($offerdata['status']==1)
							{
							?>
							<a><i aria-hidden="true" class="adctv_category"  style="cursor:pointer;">Deactivate</i></a>
<?php
}
else
{
?>
	<a><i aria-hidden="true" class="adctv_category"  style="cursor:pointer;">Activate</i></a>
					<?php
					}?>
														  </td>
												</tr>
												<?php } } else { echo "<tr><td colspan='9' align='center'>No record found</td></tr>";}?>
				
											<!-- Working -->
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
			$('.adctv_category').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#adcvt_id').val(del);
				$('#adcvt').modal('show');
			});
			$('#ok_adctv').click(function(){
				var id = $('#adcvt_id').val();
				$.ajax({
					url: "admin/adctv_offer",
					type: "POST",
					data: "offer_id="+id,
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
			$('.del_offer').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#service_id').val(del);
				$('#myModal').modal('show');
			});
			$('#ok_delete').click(function(){
				var id = $('#service_id').val();
				$.ajax({
					url: "admin/del_offer",
					type: "POST",
					data: "offer_id="+id,
					success: function(res){
						//$('body').html(res);return;
						if(res){
							$('#myModal').modal('hide');
							$('#'+id).remove();
							setTimeout(function() {
							
							}, 250);
							location.reload();
						}
					}
				});
			});
		});
	</script>