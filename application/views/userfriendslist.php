                <div class="col-lg-12 col-md-12 col-sm-12 userfriend_main_div" id="dashboard_image_div">
                                     <?php 

                $result=$this->datamodel->selectcategory();
				//print_r($result);
				if($result){ foreach($result as $rts){
					$catnm=$rts['category'];

			
											$cntpost= $this->datamodel->countofcatposr($catnm);
											$cntpost1= $this->datamodel->countofcatfoll($catnm);
											$cat= $this->datamodel->fetchcatid($catnm);
							$res=$cat[0]['id'];

										$uid=$this->session->userdata['user_id'];
$pro=$this->datamodel->selectfollow($res,$uid);
													$folid=$pro[0]['fcid'];


					?>
				
					    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding:0px;">
						    <div class="userfriend_center_div">
								<div style="position: relative;">0
								    <div>
									  <a href="<?=base_url()?>category/<?= $rts['category']?>"><img src="<?= base_url()?>assert/catimg/<?= $rts['covimage']?>" style="width:100%;height: 140px;"></a>
									</div>
									<div class="userfriend_img">
									   <a href="<?=base_url()?>category/<?= $rts['category']?>"><img src="<?= base_url()?>assert/catimg/<?= $rts['proimage']?>" style="width:100%; background-color:#ccc;"></a>
									</div>
								</div>
								<div class="userfriend_data">
										<a href="<?=base_url()?>category/<?= $rts['category']?>"> <p class="user_name_frnds"><?= $rts['category']?></p></a>
										<form method="post" action="<?=base_url()?>users/categoryfollow">  		    <input type="hidden" id="cid" name="cid" value="<?= $cat[0]['id']?>"/>

									  <input type="hidden" id="uid" name="uid" value="$uid"/>
               <input type="hidden" id="cid" name="cid" value="<?= $cat[0]['id']?>"/>

								</div>
								<div class="userfriend_data1">

									<?php
											if($pro=="0"){
												?>
<button type="submit" class="btn btn-default following_div following_div follow_btn" name="flw"><i class="fa fa-user-plus"></i>&nbsp;Follow</button>
																		<?php
											}
									else {
										?>

	   <a href="<?=base_url()?>users/deletefollow/<?= $pro[0]['fcid']?>"  class="btn btn-default following_div following_div follow_btn">unfollow</a>

										<?php } ?>
										</form>
								</div>
								<div >
									<p>description Fashion <?= $cntpost1?> followers  <?= $cntpost?> posts</p>
								</div>
							</div>
						</div>
										<?php }}?>	

					</div>
                   