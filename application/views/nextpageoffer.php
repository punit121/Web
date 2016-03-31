			<?php //echo $nextpg;
			// $str=$_SERVER['REQUEST_URI'];
			// $place=end(explode("/",$str));
			//print_r($offers);
			if(!empty($offers))
				{	
					foreach($offers as $value)
					{ 
						
			?>
			
                         
                            <div class="col-md-3 col-xs-12 col-sm-6 " style="padding-left:15px; padding-right:15px">
                            <div class="deal-box shadow">
            <div class="deal-box-head">
            <span class="sss-heart glyphicon glyphicon-heart">&nbsp;</span>
            
            
            </a><span class="deal-date deal-header"><time data-time-ago="2015-07-18T16:54:36+05:30" datetime="2015-07-18T16:54:36+05:30" title="Sat, 18 Jul 2015 16:54:36 +0530"><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $value['createdOn']));
//echo strtotime("22-03-2015 20:08:16");
$from_time = strtotime(date("d-m-Y H:i:s"));
$min=round(abs($to_time - $from_time) / 60);
if($min>59){
	$minx= round($min/60);
if($minx>23){
$minz=round($minx/24);
if($minz<30){
echo ($minz. " Day ago");
}
else{
	
	$a= explode(" ", $value['createdOn']);
	echo $a[0];
	}
}
else{	echo $minx." Hr ago";}
	}
else{ echo $min." Min. ago";}
?></time></span>
            </div>
            <div class="deal-box-image fpd_prod_img">
                
            <a href="#offer<?=$value['id']?>" data-toggle="modal">
            <?php $filename= "assets/images/demo/offer/".$value['offerImage'];
			if (file_exists($filename)) {$a=$value['offerImage'];} else{ $a='userimage.jpg';}
			?>
            <img alt="Grey" data-original="<?=base_url()?>assets/images/demo/offer/<?php 
							echo $a;
							?>" src="<?=base_url()?>assets/images/demo/offer/<?php 
							echo $a;?>
							" style="display: inline;">
            <div class="quickview_icon">
            <span class="glyphicon glyphicon-zoom-in"></span>
            </div>
            </a>
            
            </div>
            <div class="deal-dsp"><?php if(strlen($value['name'])>30){echo substr($value['name'],0,30)."...";}else{echo $value['name'];} ?></div>
            <div class="deal-price">
            <span class="rupee_fonts">Rs</span>
            <?=$value['bookingPrice']?>
            </div>
            <div class="deal-discount">
            <?=$value['discount']?>% OFF
            <span class="rupee_fonts regular-price">
            Rs.
            <?=$value['price']?>
            </span>
            </div>
            <div class="deal-store">
            at
            <a href="#"><?=$value['source']?></a>
            </div>
            </div>
            
            
            
    
    <!-- Modal HTML -->
    <div id="offer<?=$value['id']?>" class="modal fade">
        <div class="modal-dialog" style="width:75%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="width:auto">&times;</button>
                    
                </div>
                <div class="modal-body" style="width:100%;">
                    <div class="nyroModalLink"><div class="dd-privew padall6 grid-100">
<div class="cf show-grid">
<div class="grid-80 tablet-grid-70">
<div class="lead">
 <?=$value['name']?>
<span class="disc-price">
for Rs. <?=$value['bookingPrice']?>
</span>
<span class="store-name">
at Groupon
</span>
</div>
</div>

</div>
<div class="dd-detail deal-border show-grid cf dd-height">
<div class="grid-20 tablet-grid-20 pad-left">
<div class="vote">
<a class="topiclike" data-flink="hot-deals-online" data-tlink="52-off-on-grocery" href="#" id="topic_vote_up" onclick="; return false;" rel="nofollow" title="Love it"><span class="ss-like glyphicon glyphicon-thumbs-up"></span> </a>
<a href="#" class="topiclike" data-flink="hot-deals-online" data-tlink="52-off-on-grocery" id="topic_vote_down" rel="nofollow" title="Hate it"><span class="ss-dislike glyphicon glyphicon-thumbs-down"></span> </a>

</div>
<div class="vote_label"></div>
</div>
<div class="grid-30 tablet-grid-30 pad-left">
<div class="deal-score">
<div class="ss-view">
<span><?=$value['salon']?></span>
</div>
<strong><?=$value['location']?>, <?=$value['city']?></strong>
</div>
</div>
<div class="grid-20 tablet-grid-20 pad-left">
<div class="deal-price">
<span class="rupee_fonts">Rs</span>
<?=$value['bookingPrice']?>
</div>
<div class="deal-discount">
<?=$value['discount']?>% OFF
<span class="rupee_fonts regular-price">
Rs
<?=$value['price']?>
</span>
</div>
</div>
<div class="grid-20 tablet-grid-20 padtop6 pad-right">
<a href="<?=$value['externallink']?>" class="btn btn-success btn-lg btn-block" target="_blank">BUY NOW</a>
</div>
</div>
<div class="dd-detail show-grid">
<div class="grid-100 tablet-grid-100">
<div class="image-wrap">
<?php if(!empty($value['offerImage'])) {?>
 <?php $filename= "assets/images/demo/offer/".$value['offerImage'];
			if (file_exists($filename)) {$a=$value['offerImage'];} else{ $a='userimage.jpg';}
			?>
<a href="<?=$value['externallink']?>" class="store-img" target="_blank"><img  
			class= "media-image" src="<?=base_url()?>assets/images/demo/offer/<?php 
							echo $a;
							?>" style="display: inline;width: 250px;"></a><?php }?>
</div>
<div class="link-clr">
<p> <?=$value['name']?></p>
<p><strong><ins>How to get this deal</ins></strong></p>
<p><?=$value['features']?></p>
</div>
<hr class="cf">
<ul class="deal-info">
<li class="ftl">
<div class="deal-exp-date label label-success">
Expiring On
<?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $value['expdate']));
//echo strtotime("22-03-2015 20:08:16");
$from_time = strtotime(date("Y-m-d H:i:s"));
$min=round(abs($from_time - $to_time) / 60);
if($min>59){
	$minx= round($min/60);
if($minx>23){
$minz=round($minx/24);
if($minz<30){
echo ($minz. " Days");
}
else{
	
	$a= explode(" ", $value['expdate']);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min";}
?>
</div>
</li>
<li class="ftl link-clr">


</li>
</ul>
</div>
</div>
<div class="grid-100 tablet-grid-100 grid-parent">
<div class="gray-slate cf">
<div class="grid-15 tablet-grid-15">
<a href="#" class="store-image"><img alt="Groupon India" class="media-image" src="http://cdn0.desidime.com/merchants/510/thumb/Groupon.jpg?1374584110"></a>
</div>
</div>
</div>
</div>
</div></div></div></div></div></div>
	
            <?php /*?>
					<div class="large-3 medium-3 small-6 columns">
						<div class="post_img">
							<?php
							//$result=$this->usermodel->findMerchantPhotoById($value['merchantId']);
							if(!empty($value['offerImage']))
							{
							if(!empty($value['externallink'])){
							?>
                            <a href="<?php echo $value['externallink']?>"  target="_blank"><?php } else{?>
							<a href="<?=base_url();?>offerSend/<?=$value['id']?>"><?php }?><img class="post_image image_height" src="<?=base_url()?>assets/images/demo/offer/<?php if(!empty($value['offerImage']))
							echo $value['offerImage'];
							else
							echo 'userimage.jpg';?>" alt="Offer Image"></a>
							<?php } else { ?>
							<img class="post_image" src="<?=base_url()?>assets/images/demo/offer/userimage.jpg" alt="post title">
							<?php } ?>
						</div>
					</div>
					<div class="large-5 medium-5 small-6 columns">	
                    <?php if(!empty($value['externallink'])){
							?>
                            <a href="<?php echo $value['externallink']?>"  target="_blank"><?php } else{?>
						<a href="<?=base_url();?>offerSend/<?=$value['id']?>" ><?php }?><h2 class="offerTxt"><?=$value['name']?></h2></a>
						<div class="divline"><span></span></div>
						<p class="post_text">
                        <a href="<?=base_url();?>merchant/salon/<?=$value['merchantId']?>">
                        <span class="offTxt">
						<?=$this->usermodel->findMerchantByIdInWishlist($value['merchantId']);
						?></span></a><BR>
						<?php echo substr($value['features'],0,100);?></p>
					</div>
					<div class="large-4 medium-4 small-12 columns borderOffer">
					<div class="row">
							<div class="large-6 small-12 medium-6 columns">
							<span class="foradianFont foradianFontSize"><i><?=$value['bookingPrice']?></i></span>
							</div>
							<div class="large-6 small-12 medium-6 columns">
                             <?php if(!empty($value['externallink'])){
							?>
                            <a href="<?php echo $value['externallink']?>" target="_blank" class="button radius widthButton"><?php } else{?>
						<a href="<?=base_url();?>offerSend/<?=$value['id']?>" class="button radius widthButton"><?php }?>
							Learn More</a>
							
							</div>
							</div>
						<div class="row">
							<div class="large-4 medium-4 small-4 columns">
							<p><span class="foradianFont">VALUE <br><span class="fordianPrice"><i><?=$value['price']?></i></span></span> </p>
							</div>
							<div class="large-4 medium-4 small-4 columns">
							<p><span class="foradianFont">DISCOUNT <br><span class="fordianPrice"><i><?=$value['discount']?>%</i></span></span> </p>
							</div>
							<div class="large-4 medium-4 small-4 columns">
							<p><span class="foradianFont">SAVINGS <br><span class="fordianPrice"><i><?php echo $result=($value['price']-$value['discountedPrice'])?></i></span></span> </p>
							</div>
							</div>
						<div class="row recommBorder">
							<div class="large-12 columns">
                        <a href="<?=base_url();?>offerSend/<?=$value['id']?>#recommendation1">     
                            <p class="text-center offTxt "><i class="icon-credit-card"></i>recommendation&nbsp; <i class="icon-certificate"></i></p>
                            </a>
                            </div>
						</div>
					</div>
				<?php */?>
			<?php }} else{ echo '<center><font color="#f35f2a"><b>No record found</b></font></cenetr>';}
			if(isset($searchdt)){
			?>
			<a href="<?=base_url();?>users/offernextserch/<?= $searchdt?>/<?= $citys?>/<?php echo $nextpg?>" hidden=""></a>
            <?php } else{?>
		
					
<a href="<?=base_url();?>offernext/<?php echo $nextpg?>" hidden=""></a> 
<?php }?>
