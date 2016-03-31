                <div class="col-lg-12 col-md-12 col-sm-12 userfriend_main_div" id="dashboard_image_div">
                                     <?php 

                $result=$this->datamodel->selectuser();
				//print_r($result);
				if($result){ foreach($result as $rts){
					$uid=$rts['id'];

		            $cntpost= $this->datamodel->countofuserpost($uid);
					$cntpost1= $this->datamodel->countofuserfoll($uid);
					$cntfollowing=$this->datamodel->countfollowing($uid);
 $user=$this->usermodel->where_data('customer',array('userId'=>$uid));
 //print_r();
										$usid=$this->session->userdata['user_id'];
					$pro1=$this->datamodel->selectuserfollow($uid, $usid);
					$follid=$pro1[0]['fuid'];


					?>
				
					    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 0px;">
						     <div class="userfriend_center_div">
								<div style="position: relative;">
								    <div>
									  <a href="<?= base_url()?>userprofile/<?= $rts['username']?>"><img src="<?php if(isset($user[0]->covimg)){ echo base_url();?>assets/images/merchant/<?php echo $user[0]->covimg;} 
					else { echo base_url().'assets/images/merchant/d_Cover.jpg'; }?>" style="width:100%; background-color:#ccc;height:190px;"></a>
									</div>
									<div class="userfriend_img">
									   <a href="<?= base_url()?>userprofile/<?= $rts['username']?>"><img src="<?php if(isset($user[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $user[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:100%; background-color:#ccc;"></a>
									</div>
								</div>
								<div class="userfriend_data">
								   <a href="<?= base_url()?>userprofile/<?= $rts['username']?>"> <p class="user_name_frnds"><?php if(isset($user[0]->fullname)) echo $user[0]->fullname; else echo'unknown';?></p></a>
			 <form method="post" action="<?=base_url()?>users/userfollow">  		

               <input type="hidden" id="uid" name="uid" value="<?= $rts['id']?>"/>

 <?php
                            if($pro1=="0"){
								?>

							<div class="col-sm-12" style="border:0px solid red;padding:0px;"> <button type="submit" class="btn btn-follow" name="folw" style="margin-left:35%;"><i class="fa fa-user-plus"></i>&nbsp;Follow</button></div>
                                                        <?php
							}
else {
	?>
	<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?=base_url()?>users/deleteufollow/<?= $pro1[0]['fuid']?>"  class="btn btn-follow"><i class="fa fa-user-plus"></i>&nbsp;Followed</a></div>
                                                                                    <?php } ?>

                          </form>
							    </div>
								<div>
									<p style="margin-left:10px;">description Fashion</br> followers <?= $cntpost1?> following  <?=$cntfollowing?> posts <?= $cntpost?> </p>
								</div>
							</div>
						</div>
										<?php }}?>	

					</div>
                   