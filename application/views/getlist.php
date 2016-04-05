<script>
var baseurl='<?=base_url()?>';
</script>
	
 <script type="text/javascript" src="<?=base_url()?>newcss/js/jquery.jscroll.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/pages/getlistMap.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/pages/gmap3.js"></script>	
<!--<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>-->

<div class="main-content-top">
		<div class="row ">
        <div class="large-11 columns large-offset-1">
		<center><h2 class="headerTxt">Book Beauty Appointments<span  id="headerTxt" hidden=""><?php 
		$str=$_SERVER['REQUEST_URI'];
		$place=explode("/",$str);
		if($place[1]=='serviceOrLocation' || $place[2]=='No_Area')
		echo 'Place Near You';
		else if($place[1]=='placeSearch')
		echo rawurldecode($place[2]);
		else if($place[1]=='search')
		echo rawurldecode($place[2]);
		else if($place[1]=='serviceSearch')
		echo rawurldecode($place[2]);
		elseif(isset($place[3]))
		echo rawurldecode($place[3]);
		else
		echo 'Place Near You';
		//echo $place[3];
		?></span></h2>
		<p class="headerTxt">Find and book salons, spa and other beauty professionals of your choice on Zersey</p></center>
		</div>	
		</div>
		<div class="row">
        <div class="large-11 columns large-offset-1 ">
		<div class="large-5 medium-5 small-5 columns">
		<input type="text" placeholder="Services" name="services" id="services" class="appointment-input" />
		</div>
	    <div class="large-5 medium-5 small-5 columns">
		<input type="text" placeholder="Place" name="place" id="place" class="appointment-input" />
		</div>
		<div class="large-2 medium-2 small-2 columns">
		<p><a href="#" class="small radius button appointment-button" id="bookAppoinment">Book</a></p></div>
	    <div class="clearfix"></div>	
		</div>
    </div>	
</div>
<div class="clearfix"></div>
<div class="row">
	<div class="large-12 columns">
	<div class="filterRow">
	<ul class="filterList">
	<li><input type="checkbox" id="checkid" class="input_checkbox filterBy" rel="offer" style="width:auto;"><span class="check_txt">Offers</span></li>	
	<li><input type="checkbox" id="checkid" class="input_checkbox filterBy" rel="onlineBooking" style="width:auto;"><span class="check_txt">Online Booking</span></li>
	<li><input type="checkbox" id="checkid" class="input_checkbox filterBy" rel="homeService" style="width:auto;"><span class="check_txt">Home Service</span></li>	
	<li><input type="text" name="brand" id="brand" placeholder="Salon Name"></li>
	<li style="float:right"><h3 id="totcount"><?php if (isset($cnt))echo $cnt; ?> Records Found</h3></li>
	</ul>
	</div>
	</div>
</div>
<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="myModalBestSearch" class="reveal-modal" data-reveal style="z-index:999999999;top:1px;" >
				<form method="post">
					<div class="row">				
					<div class="large-12 columns">
					<h3><strong>Keywords !</strong></h3>
					</div>				
					</div>	
					<div class="row">		
					<div class="large-12 columns">									
					<textarea placeholder="Type best keyword !" name="keyword" id="keyword"></textarea>
					</div>	
					<div class="large-12 columns">
					<button type="button" name="bestSearch" id="bestSearch" class="button secondary log-in-row right">Submit</button>
					</div>	
					</div>
					<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
				</form>	
			</div>
		</div>
	</div>
<!-- End Main Content Top -->
<div class="main-wrapper">
	<div class="row main-content">
		<div class="large-9 columns">
		<article class="post col1-alternative">
				<div class="row">
				<div class="large-9 medium-9 small-9 columns">
				<ul class="breadcrumbs custom-margin">
					<li><span>SORT BY :</span></li>
					
					<li><a href="#" id="mostPopular">Most Popular</a></li>
					<li><a id="mostPrice" style="text-decoration:none">Price</a><select class="pricewidth" id="searchByPrice"><option value="0">any</option><option value="1">Low</option><option value="2" >Medium</option><option value="3" >High</option></select></li>
                    <li><a id="mostspecial" style="text-decoration:none">SPECIALTIES</a><select class="pricewidth" id="searchByspecial"><option value="0">any</option><option value="salon">Salon</option><option value="Spa" >Spa</option><option value="Makeup" >Makeup</option><option value="Tattoo" >Tattoo</option><option value="Skin Center" >Skin Center</option><option value="Stylists" >Stylists</option></select></li>
				</ul>
				</div>
				</div>
		</article>
		<div id="merchantRecords">
		<?php
			if(!empty($serviceOrLocation))	
			{
				$i=0;
				foreach($serviceOrLocation as $value)
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
                   
                 <form class="registrationformoffline" method="post" action="<?= base_url();?>users/messageoffline">
				  
				 
                         <div class="form-group">
                         
                            <input type="text" name="servicenamev" id="serviceNamepop" placeholder="What do you need?(i.e Hair Draiser)" class="form-control inputOrange" />
                        </div>
                        <div class="form-group" style="padding-bottom:30px">
                            <div class="col-md-6" style="padding-left: 0px;margin-bottom: 10px;">
                            <input type="hidden" name="username" id="userName" class="sign-form" value="<?=$value['merchantId']?>" autocomplete="off">
                            <input type="text" name="dateappont" id="dateapponts" placeholder="Date Of Services" class="form-control inputOrange" />
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




		<article class="post col1-alternative">
				<div class="row" style="padding-bottom:13px;">
					<div class="large-2 medium-2 small-2 columns">
						<div class="post_img">
							<img class="post_image" 
							src="<?=base_url();?>assets/images/merchant/
							<?php if(!empty($value['photo']))
							{ 
							echo $value['photo']; 
							}
							else
							{ 
							echo 'usericon.jpg'; 
							} ?>" alt="post title">
						</div>
					</div>
					<div class="large-5 medium-5 small-5 columns">					
						<h2><?=$value['salonName']?></h2>
						<div class="divline"><span></span></div>
						<p class="post_text"><?=$value['description']?></p>
						<p class="post_text"><?php echo $value['location']; if($value['city']==2){echo ", Gurgaon";}else{echo ", Delhi";} ?></p>
						<a href="<?=base_url();?>merchant/<?=$value['merchantId']?>" style="padding-right:22px;" 
						id="viewMapClick">View Map</a>
						<!--<a href="#">View Menu</a>-->						
					</div>
					<?php $result=$this->usermodel->findRating($value['merchantId']);?>
					<div class="large-1 medium-1 small-1 columns">
						<ul class="meta">
						</ul>
					</div>
					<div class="large-4 medium-4 small-4 columns">
					<div class="verticalLine ">
						<h4><i class="icon-archive"></i><b><?= $this->usermodel->findRecommendationById($value['merchantId']); ?></b> Recommendation</h4>
						<!--<div class="divline"><span></span></div>-->
						<p class="post_text"><i class="icon-star"></i><a href="#" class="button radius right"><?php echo $result;?></a></p>
                        <p><?php if(!$value['onlineBooking']){?>
                  
					<a href="#" class="button secondary" rel="<?=$value['merchantId']?>">Book Me</a>
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
			
		<?php } ?>
		<?php //print_r($merchantData);
			if(!empty($merchantData))	
			{	
				$i=0;
				foreach($merchantData as $value)
				{
				$my_string=$value['salonName'];
				$str=str_replace(" ", "_",$my_string);
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
						<a href="<?=base_url();?>merchant/<?=$str;?>/<?=$value['merchantId']?>">	<img class="post_image" 
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
						<a href="<?=base_url();?>merchant/<?=$str;?>/<?=$value['merchantId']?>"><h2><?=ucwords(strtolower($value['salonName'])) ?></h2></a>
						<div class="divline"><span></span></div>
						<p class="post_text"><?php echo substr($value['description'],0,80).'...';?></p>
						<p class="post_text"><a href="<?= base_url();?>placeSearch/<?= $value['location'] ?>"><b><?php echo (($value['location'])); if($value['city']==2){echo ", Gurgaon";}else{echo ", Delhi";} ?></b></a></p>
						<a href="<?=base_url();?>merchant/<?=$str;?>/<?=$value['merchantId']?>" style="padding-right:22px;">View Profile</a>
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
			else
			{
				echo "<h3>No Record(s) Found..!</h3>";
			}
			
		?>
        <a href="<?= base_url()?>onlyServiceloop/10/<?= $place[2]?>/<?= $place[3]?>" hidden=""></a>
		</div>
		
		</div>
		<aside class="large-3 columns">
			<!---<div class="widgets">
				<h3>Location On Map</h3>
                </div>
			<div class="clearfix"></div>
			<div class="widgets">
			<div id="test1" class="gmap3" style="width:257px;height:285px"></div>
			</div>	--->
		</aside>
	</div>
</div>
<div id="myModal" class="reveal-modal">
     <h1>Modal Title</h1>
     <p>Any content could go in here.</p>
     <a class="close-reveal-modal">&#215;</a>
</div>
<input type="hidden" id="recomend">
<input type="hidden" name="Servicename" id="Servicename" value="<?php
$sname=$_SERVER['REQUEST_URI'];
$servicename=explode('/',$sname);
if(!empty($servicename[2]))
echo str_replace('%20',' ',$servicename[2]);
?>">
<script>
jQuery(document).ready(function() {
	// Flickr
	$('#merchantRecords').jscroll();
	});



</script> 
<script>

function bookoff(a)
{		  
var p = $(a).attr('rel');
	var a='#bookoffline'+p;
	//alert(a);
	$(a).modal('show');
	}
</script>