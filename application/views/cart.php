<!DOCTYPE html><!-- Begin Main Wrapper -->
<script>
var baseurl='<?=base_url()?>';
</script>
<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">
		<div id="successfullyContact" class="reveal-modal" data-reveal style="z-index:999999999;top: 0 !important;" >		
			<div class="row">				
					Thank you! your submission successfully received, we will contact you soon!
			</div>	
		</div>
	</div>
</div>	
<script src="<?=base_url()?>/assets/js/pages/contact.js"></script>
<script>
function shoping(){
			//alert('sdsd');
			var cart='<?php echo($this->cart->total_items())?>';
			if(cart=="0"){
				
				alert('Your Cart Is Empty Please Add Item First To Checkout.');
				}
			else{
				window.location = baseurl+'Checkout';
				}
			
}
        </script> 

<div class="main-wrapper">
	<!-- Main Navigation --> 		
    <div class="main-wrapper">       
	<div class="content_wrapper" style="margin-bottom:15px">
		<div class="row">
        <div class="large-2 columns">
            <a href="<?= base_url();?>offers" class="btn" style="text-decoration:none"><i class="glyphicon glyphicon-arrow-left"></i> Back To Offer</a>
            
            </div>
        </div>
        <div class="row">
            			
			<div class="large-12 columns">
				<h3 class="contact_title">Complete Your Order</h3>
                <div class="divider"><span></span></div>
					<div id="status"></div>
					<div class="contact_form">
						<div class="row">
							<div class="small-12 columns">
             <center>               	
	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
		<?php if ($cart = $this->cart->contents()): ?>
		<tr bgcolor="#FFFFFF" style="font-weight:bold">
			<td>Serial</td>
			<th>Item Description</th>
  		    <th>Orignal Price</th>
   			<th>Discounted Price</th>
  			<th>Booking Price</th>
			<td>Qty</td>
			<td>Amount</td>
			<td>Options</td>
		</tr>
		<?php
		echo form_open('users/update_cart');
		$grand_total = 0; $i = 1;
		
		foreach ($cart as $item):
			echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
			echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
			echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
			echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
			echo form_hidden('cart['. $item['id'] .'][oprice]', $item['oprice']);
			echo form_hidden('cart['. $item['id'] .'][discount]', $item['discount']);
			
			echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
		?>
		<tr bgcolor="#FFFFFF">
			<td>
				<?php echo $i++; ?>
			</td>
			<td>
				<?php echo $item['name']; ?>
			</td>
            <td>
				<?php echo number_format($item['oprice']); ?>
			</td>
            <td>
				<?php echo number_format($item['discount']); ?>
			</td>
			<td>
				 <?php echo number_format($item['price']); ?>
			</td>
			<td>
				<?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
			</td>
			<?php $grand_total = $grand_total + $item['subtotal']; ?>
			<td>
				 <?php echo number_format($item['subtotal']) ?>
			</td>
			<td>
				<a href="<?php echo base_url().'users/removecart/'.$items['rowid']?>" style="color:red" title="Remove From Cart"><span class="glyphicon glyphicon-remove"></span></a>
			</td>
			<?php endforeach; ?>
		</tr>
        <tr>
			<td colspan="6" align="right"><b>Order Total:</b>
				</td>
			<td><b><?php echo number_format($grand_total); ?></b>
				</td>
                <td></td>
                </tr>
		<tr>
			<td></td>
			<td colspan="7" align="right"><input type="button" class="btn btn-default" style="width:100px" value="Clear Cart" onclick="clear_cart()">
					<input type="submit" value="Update" class="btn btn-default" style="width:100px">
					<?php echo form_close(); ?>
				</tr>
		<?php endif; ?>
	</table>
</center>
                            </div>
                            <div class="small-12 columns" hidden="">
                           </div>
								<div class="small-5 columns" style="float:right !important">
								
            	<a href="#" class="btn btn-info right" onClick="shoping();" id="checoutvalue" >Proceed To Pay</a>
				<a href="<?= base_url();?>offers" class="btn btn-default  right" style="text-decoration:none; margin-right:2px">continue shopping</a>				
                                </div> 
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>  
 
<script>
function clear_cart() {
	var result = confirm('Are you sure want to clear all bookings?');
	
	if(result) {
		window.location = "<?php echo base_url(); ?>users/remove/all";
	}else{
		return false; // cancel button
	}
}
</script>