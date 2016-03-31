        <div class="row" >
			<!-----middle part-------->
			<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;background:url('images/1.jpg')">
				<div style="width:100%;">
                 <?php  $user=$this->usermodel->where_data('customer',array('userId'=>$user_id->id)); ?>
					<div style="display:inline-block;width:60%;">
						 <img src="<?php if(isset($user[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $user[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" class="facebook_div">
						 <h3 class="facebook_user_name"><?php echo $user[0]->fullname; ?></h3>
					</div>
					<div class="side_post_div">
						<div  class="side_inner_pst_div">
							<div style="text-align:right;">					
							  <button class="btn btn-default right"><i class="fa fa-user-plus "></i> &nbsp;Add Friend</button>
							</div>
							<div style="text-align:right;margin-top:5px;">
								<div class="btn-group">
									<button type="button" class="btn btn-default"><i class="fa fa-check"></i>Following</button>
									 <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
									 </button>
									<ul class="dropdown-menu action_div">
										<li><a href="#">Scheduler</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Save as Draft</a></li>
									</ul>
								</div>
								<button class="btn btn-default following_div"><i class="fa fa-envelope"></i>&nbsp;Message</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12" style="background:#FFFFFF;border:solid 1px;">
				<div class="col-lg-4 col-md-4 col-sm-4">
					<h3 class="bottom_stip_div_about">About me</h3>
					<p style="color:#777;margin: 0 0 0px;"><?php echo substr($user[0]->yourself, 0, 70); ?>...</p>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_post_following">Post </br>
					<?php $likecnt= ($this->usermodel->countlikecomment('fbblogmain',array('userid'=>$user_id->id)));
				
										
										if ($likecnt >= 1000 && $likecnt < 1000000) {
						$cnlikecnt = number_format($likecnt/1000,2).'K';
						echo $cnlikecnt;
						} else if ($likecnt >= 1000000 && $likecnt < 1000000000) {
						$cnlikecnt = number_format($likecnt/1000000,2).'M';
						echo $cnlikecnt;
					   } else if ($num >= 1000000000) {
					   $cnlikecnt=number_format($likecnt/1000000000,2).'B';
					   echo $cnlikecnt;
					   } else {
					   $cnlikecnt = $likecnt;
					   echo $cnlikecnt;
						}
										?>
					</h4>
					</div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_post_following">Following </br>0</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_post_following">Followers </br> 0</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4  class="bottom_stip_followers_div">Post</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_followers_div">Following</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_followers_div">Followers</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_followers_div">Followers</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
					<div style="height:65px;padding-top: 20px;">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:#777; font-size:20px">
						+ More
						<span class="caret"></span></a>
						<ul class="dropdown-menu" style="background-color: rgba(10, 10, 10, 0.71);">
						  <li><a href="#" class="dropdown_nev">View Profile</a></li>
						  <li><a href="#" class="dropdown_nev">Edit Profile</a></li>
						  <li><a href="#" class="dropdown_nev">Setting</a></li>
						  <li><a href="#" class="dropdown_nev">Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:5px;" id="dashboard_image_div">
			<div class="col-lg-2 col-md-2 col-sm-2">
				 <div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px; border-bottom: solid 1px;">
					<div class="col-lg-7 col-md-7 col-sm-7" style="padding: 0px;">
						<p style="background: black;color: #fff;padding: 5px;">User Boards</p>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5">
						<p>Interests</p>
					</div>
				 </div>
				 <div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="padding:0px; border-bottom: solid 1px;margin: 0px;">
					<div style="text-align:center">
					    <p>name</p>
						<input type="button" class="btn btn-default" value="Follow">
					</div>
					<div style="text-align:center">
					    <p>name</p>
						<input type="button" class="btn btn-default" value="Follow">
					</div>
					<div style="text-align:center">
					    <p>name</p>
						<input type="button" class="btn btn-default" value="Follow">
					</div>
					<div style="text-align:center">
					    <p>name</p>
						<input type="button" class="btn btn-default" value="Follow">
					</div>
				 </div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8" id="container">
				<?php if(isset($post)){
							foreach($post as $pt){
							?>
						<div class="grid">
                        <?php 
						$hed=str_replace(" ","-",$pt['head']);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						
						?>
                        <a href="<?= base_url()?>postview/<?= $fhed?>/<?= $pt['id']?>" style="text-decoration:none">
							<div class="imgholder">
								<?php
								$pic=$pt['image'];
								 if(file_exists("./assets/zerseynme/$pic")){?>
                                <img src="<?= base_url();?>assets/zerseynme/<?= $pt['image']?>" />
                              
                                <?php } else {?>
                                   <img src="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $pt['maincat']?></p>
							</div>
							<div class="content">
								<div class="like-comment-date">
									<ul class="meta">
									<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="617"><i class="icon-comment"></i>0 </a></li>
									<li class="like"><a href="http://zersey.com/blog/likelukbok/luklikemrchant/617/">
									<i class="icon-heart" id="hrts"></i>0</a>
									</li>
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $pt['createdOn']));
//echo strtotime("22-03-2015 20:08:16");
$from_time = strtotime(date("d-m-Y H:i:s"));
$min=round(abs($to_time - $from_time) / 60);
if($min>59){
	$minx= round($min/60);
if($minx>23){
$minz=round($minx/24);
if($minz<30){
echo ($minz. " Day");
}
else{
	
	$a= explode(" ", $pt['createdOn']);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></li>
									</ul>
									<h5 style="text-align:justify"><?= $pt['head']?></h5>
								</div>
							</div>
                           <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$pt['userid']));
							if($pt['userid']!=0)
								$unm=$this->datamodel->getusernamebyid($pt['userid']);
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($pt['userid']!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>
                        <?php }}?>
						 						
			</div>
            <div class="col-lg-2 col-md-2 col-sm-2">
				<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;  ">
							<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title">User Interest</h3></div>
                            <div style="text-align:center">
                            <?php $spcdata=(explode(',',$user[0]->interest));
						
						foreach($spcdata as $data) {
							?> <a href="<?= base_url();?>category/<?php echo $data; ?>" class="btn btn-default interest_button""><?php echo $data; ?></a>
							<?php }	?>
                            </div>
                            </div>
						<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px">
							
					<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title">Follow User</h3></div>
 <?php 
				$resultuser=$this->datamodel->topuser();
				if($resultuser){ foreach($resultuser as $rtsu){
					
					$uid=$rtsu['userid'];
					
					$photox=$this->usermodel->where_data('customer',array('userId'=>$uid));
					
				if($pt['userid']!=0)
					$unm=$this->datamodel->getusernamebyid($rtsu['userid']);
							 ?>
							
			
					<div class="col-md-12" style="padding:5px; margin-top:10px">
						<div class="col-sm-3" style="padding:0px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                            <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" class="follow" style="width:100%;"></a>
						</div>
						<div class="col-sm-9" style="margin-top: -8px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>"><div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px"><?php if(($photox[0]->fullname)) echo $photox[0]->fullname; else echo "User"?></div></a>
							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <button type="button" class="btn btn-follow">Follow</button></div>
						</div>
					</div>
					<?php }}?>
					
				        </div>
						
                    </div>	
    			</div>
	    </div>