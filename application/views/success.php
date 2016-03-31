<!DOCTYPE html><!-- Begin Main Wrapper -->
<script>
var baseurl='<?=base_url()?>';
</script>
<script src="<?=base_url()?>/assets/js/pages/contact.js"></script>
<div class="main-wrapper">
	<!-- Main Navigation --> 		
    <div class="main-wrapper">       
	<div class="content_wrapper" style="margin-bottom:10px">
		<div class="row">
			<div class="large-12 columns">
				<h3 class="contact_title">Thank You <?php echo $_POST["firstname"];?></h3>
				<div class="divider"><span></span></div>
				<div class="contact_form">
					 <?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$uid=$_POST["udf1"];
$salt="GQs7yium";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'||||||||||'.$uid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'||||||||||'.$uid.'|'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
		 
		
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   }
	   else {
           	   
          echo "<h3>Your order status is ". $status .".</h3><br>";
          echo "<h4>Please not your order number <strong style='color:red;'>".$txnid."</strong>.</h4>";
		  echo "<h4>An email with details of the order has been sent to you at <strong style='color:#25c9da;'>".$email."</strong>.</h4><br>";
         // echo "<h4>We have received a payment of Rs. " . $amount . ".</h4><br>";
         echo "<h4>Your Order Detail	</h4>";
		 
		/* $ins['userid']=$uid;
		 $ins['txnid']=$txnid;
		 $ins['txnstatus']=$status;
		  $ins['totalamount']=$amount;
		  if($this->usermodel->insert_data('offer_order',$ins))
			{ 
			$oid=$this->db->insert_id();
			$itemid=(explode(",",$productinfo));
			foreach ($itemid as $its){
				$id['id']=$its;
				//echo $its;
			$itemdetail=$this->usermodel->where_data('offers',$id);
			
			$oins['orderid']= $oid;
			$oins['oferid']= $itemdetail[0]->id;
			$oins['name']= $itemdetail[0]->name;
			$oins['offerImage']= $itemdetail[0]->offerImage;
			$oins['features']= $itemdetail[0]->features;
			$oins['bookingPrice']= $itemdetail[0]->bookingPrice;
			$oins['price']= $itemdetail[0]->price;
			$oins['discount']= $itemdetail[0]->discount;
			$oins['discountedPrice']= $itemdetail[0]->discountedPrice;
			$oins['merchantId']= $itemdetail[0]->merchantId;
			foreach ($this->cart->contents() as $items){
			if($items['id']==$id['id'])
			{
				$oins['qty']=$items['qty'];
				}
			}
			$this->usermodel->insert_data('order_item',$oins);
			}
			}*/
		  ?>
          
          
          
          
                            	

<table cellpadding="6" cellspacing="1" style="width:100%" border="1">

<tr>
  <th style="text-align:center">QTY</th>
  <th style="text-align:center">Item Description</th>
  <th style="text-align:center">Salon/Spa</th>
   <th style="text-align:center">Orignal Price</th>
   <th style="text-align:center">Discounted Price</th>
  <th style="text-align:center">Booking Price</th>
  <th style="text-align:center">Sub-Total</th>

</tr>

<?php
$oid= '3';
 $i = 1;  $shopingcartitem=$this->usermodel->where_data('order_item',array('orderid'=>$oid)); ?>

<?php foreach ($shopingcartitem as $items): ?>

	

	<tr>
	  <td><?php echo $items->qty; ?></td>
	  <td>
      <?php if(!empty($items->offerImage)){?>
      <img class="post_image image_height" src="<?=base_url()?>assets/images/demo/offer/<?php echo $items->offerImage;?>" alt="Offer Image" style="width:50px; height:50px">
		<?php }
		echo ' '.$items->name; ?>
	 </td>
     <?php $salon=$this->usermodel->getsalonname($items->merchantId); ?>
	  <td style="text-align:center"><?php echo ($salon[0]->salonName); ?></td>
      <td style="text-align:center"><?php echo ($items->price); ?></td>
	  <td style="text-align:center"><?php echo ($items->discount); ?></td>
	  
      <td style="text-align:center"><?php echo ($items->discountedPrice); ?></td>
	  <td style="text-align:center"><?php echo ($items->bookingPrice); ?></td>
	
    </tr>

<?php $i++;

 
 ?>

<?php endforeach; ?>

<tr>
  <td colspan="5"> </td>
  <td><center><strong>Total (Rs.)</strong></center></td>
  <td class=""  colspan="2"><center><strong><?php echo ($amount); ?></strong></center></td>
</tr>

</table>

          <?php 
		  
		  } 
		  
		   echo "<h4>For more offers <a href='".base_url()."offers'><strong style='color:#25c9da;'>Click Here</strong></a>.</h4>";        
?>	
								</div>
				</div>
			</div>
            			
			
			</div>
		</div>
	</div>
</div>   