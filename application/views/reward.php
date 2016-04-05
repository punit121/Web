<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-12 columns wishlistBackground">
				<h3 class="text-center" style="color:#fff !important;">My Reward Points</h3>
			</div>
			
									<?php
											
											$result=$this->usermodel->getreward();
											if($result)
											{
									?>
		<div class="panel-body footerminheight">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable" style="width:100%;">
                                        <thead>
                                            <tr style="border-bottom:1px solid #CCC">
                                                
                                                <th>Due To</th>
                                                <th style="width:14%">Reward Point</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											foreach($result as $wishlist)
											{
				
											?>
											<tr id="<?= $wishlist['ruId'];?>">
									           <td><?= $wishlist['note'];?></td>
												<td><?= $wishlist['point'];?></td>
												
										<td><?= $wishlist['date'];?></td>
                                            </tr>
										<?php } 
											?>	
                                            <tr >
									  <td style="text-align:right;font-weight:bold">Total Reward Point:</td>
							<td style="font-weight:bold"><?= $this->session->userdata('reward');?></td>
												
										<td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div><!-- End .widget -->
										<?php } ?>
		
			
		</div>
	</div>		
</div>

