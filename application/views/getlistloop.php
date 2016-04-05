	<?php
			if(!empty($merchantData))	
			{
				$i=0;
				foreach($merchantData as $value)
				{
		?>
                
        <!--off line appointment book-->
 <div class="modal fade" id="bookoffline<?=$value['merchantId']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">Booking Requests </h4>
                  </div>
  
                  <div class="modal-body">
                   
                 <form class="registrationformoffline" method="post" action="<?= base_url();?>users/messageoffline" >
				  
				 
                         <div class="form-group">
                         
                         
                            <input type="text" name="servicenamev" id="serviceNamepop<?=$value['merchantId']?>" placeholder="What do you need?(i.e Hair Draiser)" class="form-control inputOrange dateinput" />
                        </div>
                        <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" style="padding-left: 0px;margin-bottom: 10px;">
                            <input type="hidden" name="username" id="userName" class="sign-form" value="<?=$value['merchantId']?>" autocomplete="off">
                            <input type="text" name="dateappont" id="dateappont<?=$value['merchantId']?>" placeholder="Date Of Services" class="form-control inputOrange " />
                        </div><div class="col-md-6" style="padding-left: 0px; margin-bottom: 10px;
padding-right:0px">
                       
                        <input type="time"  name="apptime" id="apptime" placeholder="Time" class="form-control inputOrange" required/>
                        </div>
                        </div>
                      <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" style="padding-left: 0px;margin-bottom: 10px;">
                            
                            <input type="text" name="fullName" id="fullName" placeholder="Full Name" class="form-control inputOrange" required/>
                        </div><div class="col-md-6" style="padding-left: 0px; margin-bottom: 10px;
padding-right:0px">
                       
                        <input type="text" name="contactapp" id="contactapp" placeholder="Contact Number" class="form-control inputOrange onlyInteger"  maxlength="10"/>
                        </div>
                        </div>
                        <input type="hidden" id="merchanIdForRecommendation" value="<?=$value['merchantId']?>">
                        <input type="hidden" name="salonnm" id="salonnm" value="<?=$value['salonName']?>">
                        <input type="hidden" name="salonadd" id="salonadd" value="<?php echo (($value['location'])); if($value['city']==2){echo ", Gurgaon";}else{echo ", Delhi";} ?>">
                        <input type="hidden" name="tto" id="tto" value="<?= $this->usermodel->merchantEmail($value['merchantId']);
						?>">
                        <div class="form-group">
                        
                            <textarea style="width:100%; min-height:150px" name="descriptionapp" id="descriptionapp"  class="form-control inputOrange" placeholder="Add the details of the work you want done here."></textarea>
                           
                        </div>
                       
				                  <div class="modal-footer">
		     <input type="submit" class="btn button btn-lg center-block" value="Send Request" name="customersubmit" id="customerSubmit" style="max-width:30%" />
		</div></form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      </div>
<script>
$(function() {
	var a= '#dateappont'+<?=$value['merchantId']?>;
        $(a).datepicker();
    });
	
	$('#serviceNamepop<?=$value['merchantId']?>').focus(function() {	
	var loc= document.getElementById("serviceNamepop<?=$value['merchantId']?>").value
	$.post(baseurl+'users/findAllServicesonlu/'+loc,function(data){
			//console.log(data);
			//var a= '#serviceNamepop'+<?=$value['merchantId']?>;
			//alert(baseurl+'users/findAllServices/'+loc);
			var availableTags = data.split(",");
			$('#serviceNamepop<?=$value['merchantId']?>').autocomplete({
			source: availableTags,
			selectFirst: true,
			appendTo : '#bookoffline<?=$value['merchantId']?>'
			});
		});	
	});

</script>  



		<article class="post col1-alternative">
				<div class="row">
					<div class="large-2 medium-2 small-2 columns">
						<div class="post_img">
						<a href="<?=base_url();?>merchant/Salon/<?=$value['merchantId']?>">	<img class="post_image" 
							src="<?=base_url();?>assets/images/merchant/
							<?php if(!empty($value['photo']))
							{ 
							echo $value['photo']; 
							}
							else
							{ 
							echo 'usericon.jpg'; 
							} ?>" alt="post title"></a>
						</div>
					</div>
					<div class="large-5 medium-5 small-10 columns">					
						<a href="<?=base_url();?>merchant/Salon/<?=$value['merchantId']?>"><h2><?=ucwords(strtolower($value['salonName'])) ?></h2></a>
						<div class="divline"><span></span></div>
						<p class="post_text"><?php echo substr($value['description'],0,80).'...';?></p>
						<p class="post_text"><a href="<?= base_url();?>placeSearch/<?= $value['location'] ?>"><b><?php echo (($value['location'])); if($value['city']==2){echo ", Gurgaon";}else{echo ", Delhi";} ?></b></a></p>
						<a href="<?=base_url();?>merchant/Salon/<?=$value['merchantId']?>" style="padding-right:22px;">View Profile</a>
					</div>
					<?php $result=$this->usermodel->findRating($value['merchantId']);?>
					<div class="large-1 medium-1 small-2 columns">
						<ul class="meta">
						</ul>
					</div>
					<div class="large-4 medium-4 small-10 columns">
					<div class="verticalLine ">
						<h4><i class="icon-archive"></i><b><?= $this->usermodel->findRecommendationById($value['merchantId']); ?></b> Recommendation</h4>
						<?php if(!empty($result)){?><p class="post_text"><a  class="button radius right" style="cursor:auto">
						<?php echo $result;
						?></a></p><?php }?>
                        
                        <p><?php if(!$value['onlineBooking']){?>
                  
					<a href="#" class="button" onClick="bookoff(this);" rel="<?=$value['merchantId']?>">Book Me</a>
					<?php } else{?>
					<a href="<?= base_url()?>merchant/<?=$value['salonName']?>/<?= $value['merchantId']?>#bookSection" class="button secondary bookMe">Book Me</a>	
						<?php } ?></p>
						<p><div style="text-transform:uppercase;color:#272727;margin-bottom:5px;"><u>Specialties</u></div><?php $spcdata=(explode(',',$value['speciality']));
						$spcl=shuffle($spcdata);
						$i=0;
						foreach($spcdata as $data) {
							if($i<2)
							{
							echo $data.'<br>'; 
							}
							$i++;
						} 						
						?></p>
						</div>
					</div>
				</div>
		</article>
		<?php $i++; } ?>
        
		<?php }
 ?>
		 <a href="<?= base_url()?>onlyServiceloop/<?php echo $pagnb."/".$srd."/".$loc?>" hidden=""></a> 
