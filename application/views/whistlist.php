<!DOCTYPE html>
<div class="row">
	<div class="large-6 columns large-offset-3">
	<div id="firstModal" class="reveal-modal" data-reveal>
	<div class="row">
	<div class="large-12 columns">
  <h3>Write a recommendation for Jet Black and make their day!</h3>
  </div>
  <div class="large-12 columns text-center">
  <img src="images/modal.jpg">
  </div>
 <div class="large-12 columns log-in-row">
  <textarea placeholder="Recommendation"></textarea>
  </div>
  <div class="large-12 columns log-in-row">
   <a href="#" class="button secondary">Submit</a>
  </div>
 
  <a class="close-reveal-modal radius-close1">&#215;</a>
  </div>
	</div>
	</div>
</div>
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
        	<a href="<?= base_url()?>profile" class="btn btn-default" style="width:75px; margin-bottom:1%">Back</a>	
			<div class="large-12 columns wishlistBackground">
				<h3 class="text-center" style="color:#fff !important;">My Wishlists</h3>
			</div>
			
									<?php
											$result=$this->usermodel->getWishlist();
											if($result)
											{
									?>
		<div class="panel-body footerminheight">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="dataTable" style="width:100%;">
                                        <thead>
                                            <tr style="border-bottom:1px solid #CCC">
                                                
                                                <th>Merchant Name</th>
                                                <th style="width:14%">Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											foreach($result as $wishlist)
											{
											$my_string=$this->usermodel->findMerchantSalonNameById($wishlist['merchantId']);
											$str=str_replace(" ", "_",$my_string);
											$result=$this->usermodel->findMerchantByIdInWishlist($wishlist['merchantId']);
											?>
											<tr id="<?= $wishlist['id'];?>">
									           <td><a href="<?=base_url()?>merchant/<?=$str;?>/<?= $wishlist['merchantId']?>" style="cursor:pointer;color:black;"> <?php echo $result;?></a></td>
												<td><a href="<?=base_url()?>merchant/<?=$str;?>/<?= $wishlist['merchantId']?>" style="cursor:pointer;"><img src="<?= base_url(); ?>assets/images/merchant/<?php echo $result=$this->usermodel->findMerchantPhotoById($wishlist['merchantId']);?>" width="40%"></a></td>
												
										<td><a id="<?= $wishlist['id'];?>" class="removeWishlist" style="cursor:pointer"><img src="<?=base_url();?>assets/images/remove.png" width="20%"></a></td>
                                            </tr>
										<?php } 
											?>	
                                        </tbody>
                                    </table>
                            </div><!-- End .widget -->
										<?php } else { ?>
		
			
		<div class="large-6 columns large-offset-3">
				<h3>Wishlist Item 0</h3>
			</div>
			<center><img src="<?= base_url();?>assets/images/wishlist.png"width="50%"></center>
			<!--<div class="large-6 columns large-offset-3">
				<a href="#"><img src="<?=base_url()?>assets/images/wishlist.jpg"></a>
			</div>-->
			<div class="large-6 columns large-offset-3">
				<h3>Nothing in your Wishlist yet.</h3>
				<p>whenever  you're reading about a treatment or place, you'll see the add to 
	wishlist button.press button this page will be upldated with your choice. you'll also earn points every time you add something to this page.</p>
			</div>	
		</div>
	<?php } ?>

    </div>	
    
</div>
<script>
$(document).ready(function(){
		$('.removeWishlist').click(function(){
		var id ='id='+$(this).attr('id');
			$.post(baseurl+'users/deleteFromWishlist',id,function(data){
						if(data)
						{
							location.reload();
						}
						});
		});
});
</script>
