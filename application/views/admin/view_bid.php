<!-- Tables plugins -->
  <script src="admin_assets/js/plugins/tables/datatables/jquery.dataTables.min.js"></script>
	<script src="admin_assets/js/pages/data-tables.js"></script><!-- Init plugins only for page -->
	
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
	<?php $this->load->view('admin_layout/sidebar.php')?>
<section id="content">
            <div class="wrapper">
                <div class="crumb">
                    <ul class="breadcrumb">
                      <li><a href="<?= base_url(); ?>"><i class="icon16 i-home-4"></i>Home</a></li>
                      <li>Biding</li>
                      <li class="active">View Bids</li>
                    </ul>
                </div>
                
                <div class="container-fluid">
                    <div id="heading" class="page-header">
                        <h1><i class="icon20 i-table-2"></i>Bids</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="icon"><i class="icon20 i-table"></i></div> 
                                    <h4>Bid</h4>
                                    <a href="#" class="minimize"></a>
                                </div><!-- End .panel-heading -->
                            
                                <div class="panel-body">
                                    
                              <?php $result=$this->admin_model->viewBid(); ?>     
                                      
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="<?php if(!empty($result)) echo 'dataTable'; else 'tabledata'; ?>">
                                        <thead>
 <tr>
					<?php if($this->session->userdata('user_level')=='1')
					{ ?>
                                                <th>Merchant Name</th>
                                                <th>Salon Name</th>
												<?php } ?>
                                                <th>Request Details</th>
												<th>Description</th>
												<th>Budget</th>
												<th>Bid Amount</th>
                                                <th>Location</th>
                                                <th>Date Of Service</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>										
						<?php 
				 if(!empty($result))
				{				
				 foreach($result as $auction) 
				{
				?>
				<tr bidding="<?= $auction['id']; ?>" id="<?= $auction['id']?>">
				<?php if($this->session->userdata('user_level')=='1')
					{ 
					$userid=$auction['userId'];
					$value=$this->admin_model->findMerchantNameById($userid);?>
					<td><?php echo $userid; ?></td>
				<td><?= $auction['note']; ?></td>
				<?php } ?>
				
				<td><?= $auction['request']; ?></td>
				<td><?= $auction['note']; ?></td>
				<td><?= $auction['minBudget']." <sup> Rs</sup> - ".$auction['maxBudget']."<sup> Rs</sup>"; ?></td>
				<td><?= $auction['bamt']; ?><sup> Rs</sup></td>
				<td><?= $auction['location']; ?></td>
				<td><?= $auction['dateOfService']; ?></td>
				<td>
																									<a href="admin/edit_bid?id=<?= base64_encode($auction['id']);?>"><i aria-hidden="true" class="i-marker-2" style="cursor:pointer;"></i></a>
																									<a ><i aria-hidden="true" class="i-remove-4 del_bid" title="Delete" style="cursor:pointer;"></i></a>
																									
					<?php
							if($auction['status']==1)
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
				<?php }  } else{ echo "<td colspan='6' align='center'>No Bid</td>"; }?>
				</tbody>
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
		<script>
		$(document).ready(function(){
			$('.adctv_service').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#adcvt_id').val(del);
				$('#adcvt').modal('show');
			});
			$('#ok_adctv').click(function(){
				var id = $('#adcvt_id').val();
				$.ajax({
					url: "admin/adctv_bid",
					type: "POST",
					data: "bid_id="+id,
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
				$('.del_bid').click(function(){
				var del = $(this).closest('tr').attr('id');
				$('#service_id').val(del);
				$('#myModal').modal('show');
			});
			$('#ok_delete').click(function(){
				var id = $('#service_id').val();
				$.ajax({
					url: "admin/del_bid",
					type: "POST",
					data: "biding_id="+id,
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