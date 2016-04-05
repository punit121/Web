<script>


function show_board()
	{
		
		$("#board_show").show();
		$("#intrest_show").hide();
		
		return false;
		
	}
	function show_board1()
	{
		
		$("#board_show").hide();
		$("#intrest_show").show();
		
		return false;
		
	}
</script>       

<script>
	function overview()
	{
		
		$(".first_div").show();
		$(".socialprofile").hide();
		$(".setting").hide();
		$(".profile").hide();
		$(".interest").hide();
		return false;
		
	}
	function social()
	{
		
		$(".first_div").hide();
		$(".socialprofile").show();
		$(".setting").hide();
		$(".profile").hide();
		$(".interest").hide();
		return false;
		
	}
	function setting()
	{
		
		$(".first_div").hide();
		$(".socialprofile").hide();
		$(".setting").show();
		$(".profile").hide();
		$(".interest").hide();
		return false;
		
	}
	function account()
	{
		
		$(".first_div").hide();
		$(".socialprofile").hide();
		$(".setting").hide();
		$(".profile").show();
		$(".interest").hide();
		return false;
		
	}
	function intrest()
	{
		
		$(".first_div").hide();
		$(".socialprofile").hide();
		$(".setting").hide();
		$(".profile").hide();
		$(".interest").show();
		return false;
		
	}
</script>
<?php  $user=$this->usermodel->where_data('customer',array('userId'=>$user_id->id)); ?>
	   <div class="row" >
			<!-----middle part-------->
			<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;background:url(<?php 
			if($user[0]->covimg){
			?>'<?= base_url()?>assets/images/merchant/<?= $user[0]->covimg?>'
            <?php } else{?>
            '<?= base_url()?>assets/images/merchant/d_Cover.jpg'
            <?php }?>
            ); margin-top:-8px; background-size:cover)">
				<div style="width:100%;">
                 
					<div style="display:inline-block;width:60%;">
					<div>
						 <img src="<?php if(isset($user[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $user[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" class="facebook_div">
						 <h3 class="facebook_user_name"><?php echo $user[0]->fullname; ?></h3>
						 </div>
						 <?php
						$usid=$this->session->userdata('user_id');
						$catnm=$this->uri->segment(2);

						  $uid=$user_id->id;
						  											$cntpost= $this->datamodel->countofuserpost($uid);

				$cntpost1= $this->datamodel->countofuserfoll($uid);


						  if($usid==$uid)
						  { ?>
						    <button class="btn btn-default"style="display:inline-block;margin-top:5px;margin-left:20px;"  data-toggle="modal" data-target="#myModal"><i class="fa fa-camera-retro"></i>Edit Image</button>
					
                    
                     <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				<form action="<?= base_url();?>users/uploaduserimg" method="post" enctype="multipart/form-data">
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title" style="color:#000">Upload Your Profile & Covor Photo</h4>
					</div>
					<div class="modal-body">
					<label style="color:#000">Profile pic</label>
               <input type="file" name="prophoto" id="prophoto" style="color:#000" value="Upload Photo" /></i>Upload your pic</br>
                <label style="color:#000">cover pic</label>
                <input type="file" name="covphoto" id="covphoto" value="Upload Photo" style="color:#000" /></i>Upload cover pic<br>
			<input type="hidden" name="catidm" id="catidm" value="<?= $id?>" />
            <input type="hidden" name="catman" id="catman" value="<?= $catnm?>" />
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-sucess" value="Submit"/>
					</div>
				  </div>
				  </form>
				</div>
         </div>
         		 <?php

						  }
						  else
						  {
							  
						  }
						  ?>

					</div>
					
					<div class="side_post_div">
					
						<div  class="side_inner_pst_div">
												 <?php

							$usid=$this->session->userdata('user_id');

						  $uid=$user_id->id;
					$pro1=$this->datamodel->selectuserfollow($uid, $usid);
					$follid=$pro1[0]['fuid'];

						  if($usid==$uid)
						  { }
						  else
						  {
						  
						  ?>
							<div style="text-align:right;">					
							  <button class="btn btn-default right"><i class="fa fa-user-plus "></i> &nbsp;Add Friend</button>
							</div>
							<div style="text-align:right;margin-top:5px;">
								<div class="btn-group">
<form method="post" action="<?=base_url()?>users/userfollow">  		

               <input type="hidden" id="uid" name="uid" value="<?= $uid?>"/>

 <?php
                            if($pro1=="0"){
								?>

							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <button type="submit" class="btn btn-follow" name="folw"><i class="fa fa-user-plus"></i>&nbsp;Follow</button></div>
                                                        <?php
							}
else {
	?>
	<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?=base_url()?>users/deleteufollow/<?= $pro1[0]['fuid']?>"  class="btn btn-follow"><i class="fa fa-user-plus"></i>&nbsp;Followed</a></div>
                                                                                    <?php } ?>

                          </form>
													</div>
								<button class="btn btn-default following_div"><i class="fa fa-envelope"></i>&nbsp;Message</button>
							</div>
						<?php	}?>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12" style="background:#FFFFFF;border:solid 1px;">
				<div class="col-lg-4 col-md-4 col-sm-4">
					 <?php

							$usid=$this->session->userdata('user_id');

						  $uid=$user_id->id;
						  $unm=$this->datamodel->getusernamebyid($uid);

						  if($usid==$uid)
						  { ?>
				<h3 class="bottom_stip_div_about" data-toggle="modal" data-target="#myModal1" style="cursor:pointer">About me</h3>
					<p style="color:#777;margin: 0 0 0px;"><?php echo substr($user[0]->yourself, 0,60) ?>...</p>
			 <?php

						  }
						  else
						  {
						  
						  ?>
					<h3 class="bottom_stip_div_about" data-toggle="modal" data-target="#myModal2">About me</h3>
					<p style="color:#777;margin: 0 0 0px;"><?php echo substr($user[0]->yourself, 0,60) ?>...</p>
					 <?php

						  }
						  
						  ?>
			    </div>
				<a href="<?= base_url()?>userprofile/<?= $unm->username?>"><div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;">
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
				</div></a>
				<div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_post_following">Following </br>0</h4></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;">
					<a href="<?= base_url()?>friends/<?= $unm->username?>"><div class="bottom_stip_post"><h4 class="bottom_stip_post_following">Followers </br>  <?= $cntpost1?></h4></div></a>
				</div>
			    <div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;">
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
      	
			  <div class="col-lg-10 col-md-10 col-sm-10">
        <?php
								  $uid=$user_id->id;
								  $foll=$this->datamodel->selectfollower($uid);
					$fuid=$foll[0]['userid'];
								  $folcust=$this->datamodel->selectfollowercustomer($fuid);
				if($folcust){ foreach($folcust as $fol){
 
								  ?>

						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 0px;">
						     <div class="userfriend_center_div">
								<div style="position: relative;">
								    <div>
									    <img src="<?php if(isset($fol['covimg'])){ echo base_url();?>assets/images/merchant/<?php echo $fol['covimg'];} 
					else { echo base_url().'assets/images/merchant/d_Cover.jpg'; }?>" style="width:100%;height: 140px;">
									</div>
									<div class="userfriend_img">
									    <img src="<?php if(isset($fol['photo'])){ echo base_url();?>assets/images/merchant/<?php echo $fol['photo'];} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" width="100%">
									</div>
								</div>
								<div class="userfriend_data">
								    <p class="user_name_frnds"><?= $fol['fullname']?></p>
									<div>
									<i class="fa fa-cog" style="color:gray;font-size:16px;"></i>
									<button class="btn btn-default following_div following_div follow_btn"><i class="fa fa-user-plus"></i>&nbsp;Follow</button>
									</div>
							    </div>
								<div>
									<p style="margin-left:5px;margin-bottom: 0px;"><?= $fol['yourself']?></p>
								</div>
							</div>
						</div>
						<?php }} ?>
					</div>
		<div class="col-lg-2 col-md-2 col-sm-2">
				<div class="col-lg-12 col-md-12 col-sm-12 follow_div"  id="intrest_show" style="margin-top:15px; padding:0px; padding-bottom:10px;  ">
							<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title">User Interest</h3>   
							<div class="dropdown" style="display:inline-block;float:right;">
								<button class="dropdown-toggle" type="button" data-toggle="dropdown">
								<span class="caret"></span></button>
								<ul class="dropdown-menu" style="    margin-left: -120px;">
								  <li><a href="#" style="color:#fff" onclick="show_board();">User Boards</a></li>
								 </ul>
                            </div>
							</div>
                            <div style="text-align:center">
                            <?php $spcdata=(explode(',',$user[0]->interest));
						
						foreach($spcdata as $data) {
							?> <a href="<?= base_url();?>category/<?php echo $data; ?>" class="btn btn-default interest_button"><?php echo $data; ?></a>
							<?php }	?>
                            </div>
                            </div>
						<div class="col-lg-12 col-md-12 col-sm-12 follow_div" id="board_show" style="margin-top:15px; padding:0px; display:none;">
							
					<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title" style="display:inline-block">User Board</h3>
					<div class="dropdown" style="display:inline-block;float:right;">
								<button class="dropdown-toggle" type="button" data-toggle="dropdown">
								<span class="caret"></span></button>
								<ul class="dropdown-menu" style="    margin-left: -120px;">
								  <li><a href="#" style="color:#fff" onclick="show_board1();">User Interest</a></li>
								 </ul>
                            </div>
						</div>
 <?php 
				$resultuserl=$this->usermodel->where_data('user_board',array('userid'=>$id)); 
				if($resultuserl){ foreach($resultuserl as $rtsul){
					
					 ?>
					<div class="col-md-12" style="padding:5px; margin-top:10px">
						<div class="col-sm-3" style="padding:0px;">
							<a href="<?= base_url()?>board/<?= $rtsul->bordname?>">
								<img src="
									<?php 
									if($rtsul->image){
									?><?= base_url()?>assert/catimg/<?= $rtsul->image?>
									<?php } else{?>
									<?= base_url()?>assert/catimg/d_Icon.png
									<?php }?>
								" class="follow" style="width:100%;">
							</a>
						</div>
						<div class="col-sm-9" style="margin-top: -8px;">
							<a href="<?= base_url()?>board/<?= $rtsul->bordname?>">
                            <div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px"><?= ucfirst($rtsul->bordname)?></div></a>
							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <button type="button" class="btn btn-follow">Follow</button></div>
							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <button type="button" class="btn btn-follow">Follow</button></div>
						</div>
					</div>
					<?php }}?>
				</div>
					<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px">
							
					<div class="panel-heading" style="background: #555;color: #fff;">
					    <h3 class="panel-title">Follow User </h3>
					</div>
            <?php 
				$resultuser=$this->datamodel->topuser();
				if($resultuser){ foreach($resultuser as $rtsu){
					
					$uid=$rtsu['userid'];
										$usid=$this->session->userdata['user_id'];

					$photox=$this->usermodel->where_data('customer',array('userId'=>$uid));
					
				if($pt['userid']!=0)
					$unm=$this->datamodel->getusernamebyid($rtsu['userid']);
					$pro1=$this->datamodel->selectuserfollow($uid, $usid);
					$follid=$pro1[0]['fuid'];

							 ?>
                             <form method="post" action="<?=base_url()?>users/userfollow">  		
               <input type="hidden" id="uid" name="uid" value="<?= $rtsu['userid']?>"/>

			
					<div class="col-md-12" style="padding:5px; margin-top:10px">
						<div class="col-sm-3" style="padding:0px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                            <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" class="follow" style="width:100%;"></a>
						</div>
						<div class="col-sm-9" style="margin-top: -8px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>"><div class="col-sm-12 " style="padding:4px;text-align:center; font-size:14px"><?php if(($photox[0]->fullname)) echo $photox[0]->fullname; else echo "User"?></div></a>
							<?php
                            if($pro1=="0"){
								?>

							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <button type="submit" class="btn btn-follow" name="folw">Follow</button></div>
                                                        <?php
							}
else {
	?>
	<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?=base_url()?>users/deleteufollow/<?= $pro1[0]['fuid']?>"  class="btn btn-follow">unfollow</a></div>
                                                                                    <?php } ?>
</div>
					</div>
					<?php }}?>
					
				        </div>
						
                    </div>	
    			</div>
	    </div>
		
		                 <?php  $user=$this->usermodel->where_data('customer',array('userId'=>$user_id->id)); ?>

		  <div class="modal fade" id="myModal3" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Upload Your Cover Photo</h4>
					</div>
					<div class="modal-body">
					
              <label class="myLabel"> <span class="btn fileinput-button">
                <span><i class="fa fa-camera fa-primary"> <input type="file" name="photo" id="photo" value="Upload Photo" /></i>Upload your Cover Picture</span></span></label>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				  
				</div>
         </div>
		 
		 <div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header" style="background: rgba(128, 128, 128, 0.28);">
				    <div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px">
						
						
						     <img src="<?=base_url()?>assert/images/user.png" style="width:25px;">
							 
							 
							<a href="" style="color: #000;font-size: 17px;vertical-align: bottom;font-weight: bold;">About</a>
					    </div>
					</div>
				</div>
				<div class="modal-body">
				    <div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							
							<ul style="list-style:none;padding-left:0px;">
								<li><a  onclick="overview();">Overview</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;" id="intrest" ><a href="#" onclick="intrest();">Interest</a></li>
								
							</ul>
					    </div>
						<div class="col-lg-9 col-md-9 col-sm-9" style="border-left: solid 1px rgba(212, 203, 203, 0.42);">
					
						<div class="first_div">
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Gender</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<p><?php echo $user[0]->gender; ?></p>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Date of birth</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<p><?php echo $user[0]->DOB; ?></p>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Location</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<p><?php echo $user[0]->location; ?></p>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Employment</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<p><?php echo $user[0]->employement; ?></p>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Mobile number</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<p><?php echo $user[0]->mobile	; ?></p>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Brief B/o</label>
								</div>
								<p><?php echo $user[0]->yourself; ?></p>
                            </div>
						</div>
						<div class="interest">
						<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;">
							
                            <div style="">
                            
							<span class="btn btn-default interest_button">skin</span>
							
                           </div>
                            
						
				        </div>
						
                   	
						</div>
						
					</div>
			    </div>
		    </div>
		</div>
		</div>
		</div>
		
		------ about us modal----------------------->
		<div class="modal fade" id="myModal1" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header" style="background: rgba(128, 128, 128, 0.28);">
				    <div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px">
						
						
						     <img src="<?=base_url()?>assert/images/user.png" style="width:25px;">
							 
							 
							<a href="" style="color: #000;font-size: 17px;vertical-align: bottom;font-weight: bold;">About</a>
					    </div>
					</div>
				</div>
				<div class="modal-body">
				    <div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							
							<ul style="list-style:none;padding-left:0px;">
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a  href="#" onclick="overview();">Overview</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;" ><a href="#" onclick="intrest();">Interest</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="social();">Social Profile</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="setting();">Setting</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="account();">Account</a></li>
							</ul>
					    </div>
						<div class="col-lg-9 col-md-9 col-sm-9" style="border-left: solid 1px rgba(212, 203, 203, 0.42);">
					
						<div class="first_div">
						<form  method="post" action="">

							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Gender</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $user[0]->gender; ?>">
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Date of birth</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<div class="form-group">
										<input data-format="dd/MM/yyyy hh:mm:ss" id="datepicker" class="form-control" class="ui-widget-header" type="text" name="datepicker" value="<?php echo $user[0]->DOB; ?>"></input>
									</div>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Location</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<input type="text" class="form-control" id="loc" name="loc" value="<?php echo $user[0]->location; ?>">
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Employment</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<input type="text" class="form-control" id="emp" name="emp" value="<?php echo $user[0]->employement; ?>">
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Mobile number</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<input type="text" class="form-control" id="mbno" name="mbno" value="<?php echo $user[0]->mobile; ?>">
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Brief B/o</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<textarea class="form-control custom-control" rows="3" style="resize:none" name="brief" value=""><?php echo substr($user[0]->yourself, 0, 70); ?></textarea> 
								</div>
								
                            </div>
							<div class="col-lg-8 col-md-8 col-sm-8">
									<button type="submit" class="btn btn-default" name="update">update</button>
								</div>
								</form>

						</div>
						<div class="interest" style="display:none">
						<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;">
							
                            <div style="">
                            <?php $spcdata=(explode(',',$user[0]->interest));
						
						foreach($spcdata as $data) {
							?> <a href="<?= base_url();?>category/<?php echo $data; ?>" class="btn btn-default interest_button"><?php echo $data; ?></a>
							<?php }	?>
                           </div>
                            
						
				        </div>
						
                   	
						</div>
						<div class="socialprofile" style="display:none">
						<div class="col-lg-12 col-md-12 col-sm-12">
						    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Facebook profile</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="" class="btn btn-default" style="background-color: #714F9E;border-color: #ccc;border-radius: 17px;color: white;">Connect with facebook<i class="fa fa-facebook" style="color:#fff;"></i></a>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Twitter handel</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="" class="btn btn-default" style="background-color: #714F9E;border-color: #ccc;border-radius: 17px;color: white;">Connect with twitter<i class="fa fa-twitter" style="color:#fff;"></i></a>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Google profile</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="" class="btn btn-default" style="background-color: #714F9E;border-color: #ccc;border-radius: 17px;color: white;">Connect with facebook<i class="fa fa-facebook" style="color:#fff;"></i></a>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Personal url</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input type="text" class="form-control" id="usr" placeholder="Visit your link">
								</div>
                            </div>
						</div>
						</div>
						<div class="setting" style="display:none">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">
									<h3>Web notification</h3>
									<p style="font-size:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat efficitur augue,</p>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">
									<div class="col-lg-4 col-md-4 col-sm-4">
									     <p>notify when you</p>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
									      <label class="checkbox-inline">
											  <input type="checkbox" value="">Some one update your comment
										  </label>
										  <label class="checkbox-inline">
											  <input type="checkbox" value="">Some one update your comment
										  </label>
										  <label class="checkbox-inline">
											  <input type="checkbox" value="">Some one update your comment
										  </label>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
									<input type="button" value="sbumit">
									
								</div>
							</div>
						</div>
							<div class="profile" style="display:none">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">User name</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="text" class="form-control" id="usr" placeholder="User name">
											<p style="font-size:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat efficitur augue,</p>
										</div>
								   </div>
								   <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">Email</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="email" class="form-control" id="usr" placeholder="sona@gmail.com">
											<p style="font-size:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat efficitur augue,</p>
										</div>
								   </div>
								   <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">Password</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="password" class="form-control" id="usr" placeholder="User name">
											<p style="font-size:10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat efficitur augue,</p>
										</div>
								   </div>
								</div>
							</div>
					    </div>
					</div>
			    </div>
		    </div>
		
		</div>
		</div>
		</div>
	    </div>

  