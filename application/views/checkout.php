<!DOCTYPE html><!-- Begin Main Wrapper -->
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "JBZaLc";

// Merchant Salt as provided by Payu
$SALT = "GQs7yium";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>

<script>
var baseurl='<?=base_url()?>';
</script>
 <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
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
<div class="main-wrapper">
	<!-- Main Navigation --> 		
    <div class="main-wrapper">       
	<div class="content_wrapper" style="margin-bottom:15px">
		<div class="row">
        <div class="large-3 columns">
            <a href="<?= base_url();?>Cart" class="" style="text-decoration:none"><i class="glyphicon glyphicon-arrow-left"></i> Back To Shpping Cart</a>
            
            </div>
        </div>
        <div class="row">
        <?php
		$ids=$this->session->userdata('user_id');
		 $dts=$this->usermodel->userinfoofr($ids); 
		 //print_r($dts[0]->mobile);
		 ?>
            <div class="large-5 columns">
				<h3 class="contact_title">Contact info</h3>
				<div class="divider"><span></span></div>
				<div class="contact_form">
					 <form action="<?php echo $action; ?>" method="post" name="payuForm">
                      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input name="udf1" value="<?php echo (empty($posted['udf1'])) ? $ids : $posted['udf1']; ?>" hidden=""/>
								<div class="small-12 columns">
									<input type="text" placeholder="Name" value="<?php echo (empty($posted['firstname'])) ? $dts[0]->fullname : $posted['firstname']; ?>" name="firstname" id="firstname" required/>
								</div>
								<div class="small-12 columns">
									<input type="text" placeholder="E-mail"  value="<?php echo (empty($posted['email'])) ? $dts[0]->email : $posted['email']; ?>" name="email" id="email"  required/>
								</div>
								<div class="small-12 columns">
									<input type="text" placeholder="Mobile No." value="<?php echo (empty($posted['phone'])) ? $dts[0]->mobile : $posted['phone']; ?>" name="phone"  required/>
								</div>
								
								<div class="small-12 columns">
									<textarea cols="10" rows="15" placeholder="Comment" id="contactmessage" name="contactmessage"></textarea>
								</div>
				</div>
			</div>
            			
			<div class="large-7 columns">
				<h3 class="contact_title">Review & Payment</h3>
                <div class="divider"><span></span></div>
					<div id="status"></div>
					<div class="contact_form">
						<div class="row">
							<div class="small-12 columns">
                            	

<table cellpadding="6" cellspacing="1" style="width:100%" border="1">

<tr>
  <th>QTY</th>
  <th>Item Description</th>
   <th>Orignal Price</th>
   <th>Discounted Price</th>
  <th style="text-align:right">Booking Price</th>
  <th style="text-align:right">Sub-Total</th>

</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr>
	  <td><?php echo $items['qty']; ?></td>
	  <td>
		<?php echo $items['name']; ?>

			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>

	  </td>
	  <td style="text-align:center"><?php echo $this->cart->format_number($items['oprice']); ?></td>
	  <td style="text-align:center"><?php echo $this->cart->format_number($items['discount']); ?></td>
	  
      <td style="text-align:center"><?php echo $this->cart->format_number($items['price']); ?></td>
	  <td style="text-align:center"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
	
    </tr>

<?php $i++;

$itemdetail .= ','.$items['id'];
 $a = trim($itemdetail, ',')
 
 
 ?>

<?php endforeach; ?>

<tr>
  <td colspan="4"> </td>
  <td><center><strong>Total (Rs.)</strong></center></td>
  <td class=""  colspan="2"><center><strong><?php echo $this->cart->format_number($this->cart->total()); ?></strong></center></td>
</tr>

</table>


                            </div>
                            <div class="small-12 columns" hidden="">
                            <input name="surl" value="<?php echo base_url().'success'; ?>" size="64" />
                            <input name="furl" value="<?php echo base_url().'failure';?>" size="64" />
                            <textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? $a : $posted['productinfo'] ?></textarea>
                            <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                            <input name="amount" value="<?php echo $this->cart->format_number($this->cart->total()); ?>" />
                            </div>
								<div class="small-5 columns" style="float:right !important">
									<input type="submit" class="button right" value="Make Payment" name="send" id="send" />
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
$(document).ready(function(){
	
	submitPayuForm();
	});

</script>
