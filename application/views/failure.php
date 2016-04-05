<!DOCTYPE html><!-- Begin Main Wrapper -->
<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="GQs7yium";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
?>
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
	<div class="content_wrapper" style="margin-bottom:10px">
		<div class="row">
			<div class="large-12 columns">
				<h3 class="contact_title">Contact info</h3>
				<div class="divider"><span></span></div>
           <?php  if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   }
	   else {

         echo "<h3>Your order status is ". $status .".</h3>";
         echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
          
		 } 
?>
<!--Please enter your website homepagge URL -->
<p><a href='<?= base_url();?>Checkout'> Try Again</a></p>

						
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
