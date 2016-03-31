<?php 
					if(!empty($result)) {
					 foreach($result as $image){?>
					
					<li class="col-lg-3 col-md-2 col-sm-3 col-xs-4" data-id="2" style="border:solid 1px rgb(42, 145, 174); padding:7px; background-color:#F5F6F7; border-radius:5px">
						<div class="view view-one "> 
						<?php 
						$a=str_replace(" ","-",$image['description']);
						$a= preg_replace('/[^A-Za-z0-9\-]/', '', $a);
						$b=substr($a,0,50);
						if($image['photo']) { 
						?>
                      <a href="<?=base_url();?>TopPhoto/<?=$b ?>/<?= $image['id']; ?>" title="<?= $image['description'];?>" >
							<img src="assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" alt="" style="height: 100%;width:auto; margin:auto" id="<?= $image['photo']; ?>" class="img-responsive" /> </a>
							<?php }else{ ?>
                             <a href="<?=base_url();?>TopPhoto/<?=$b ?>/<?= $image['id']; ?>" title="<?= $image['description'];?>" >
							<img src="http://img.youtube.com/vi/<?= $image['youtube']; ?>/default.jpg" alt="" style="height: 100%;width:auto; margin:auto" id="<?= $image['photo']; ?>" class="img-responsive" />
							<?php } ?>
							<!--<div class="addIcon" style="top: 71%;left: 80%;">
                            <a href="#"><i class="icon-heart" ></i></a><a class="addAlbum"  lang="<?=$image['photo'];?>"><i class="icon-heart" ></i></a></div>-->
										
						</div>
						<ul class="meta">
						<?php $userid=$this->session->userdata('user_id');?>
						<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="<?= $image['id']; ?>"><i class="icon-comment"></i><?= $this->usermodel->checkCommentById($image['id']); ?> comment</a></li>
						<li style="padding:5px !important; border-radius:5px; background-color:#D3D3D3"><a href="<?php echo base_url()."blog/likelukbok/luklikemrchant/".$image['id']."/".$userid;?>" style="color:#298FE2; font-weight:600; font-size:11px"><i class="icon-heart" id="hrts"></i><?php if($image['likecount']){echo $image['likecount'];} else{echo '0';} ?></a></li>
						<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?= substr($image['createdOn'], 0, strrpos($image['createdOn'], ' '));?></li>
						</ul><?php
						$this->load->model('usermodel');
						 //$ascc['merchantId']= $image['merchantId'];
						$res=$this->usermodel->findMerchantById($image['merchantId']);
						 ?>
                        <p style=" margin-bottom: 0em; margin-top:0.25em"><a href="<?php echo base_url().'merchant/Salon/'.$image['merchantId']; ?>" ><b><?= ucfirst ($res[0]['salonName']); ?></b></a></p>
						<p  id="descr" class="browsepadding"><?= substr($image['description'],0,60); 
						?></p>	
					</li>
					<?php }  } ?>
                    <?php 
					if(!empty($results)) {
					 foreach($results as $image){?>
					
					<li class="col-lg-3 col-md-2 col-sm-3 col-xs-4" data-id="2" style="border:solid 1px rgb(42, 145, 174); padding:7px; background-color:#F5F6F7; border-radius:5px">
						<div class="view view-one "> 
						<?php if($image['photo']) { 
						$a=str_replace(" ","-",$image['description']);
						$a= preg_replace('/[^A-Za-z0-9\-]/', '', $a);
						$b=substr($a,0,50)
						?>
                         <a href="<?=base_url();?>TopPhoto/<?=$b ?>/<?= $image['id']; ?>" title="<?= $image['description'];?>" >
							<img src="assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" alt="" style="width:100%;height: 150px;" id="<?= $image['photo']; ?>" class="img-responsive" /> </a>
							<?php }else{ ?>
							<img src="assets/images/merchant/usericon.jpg" alt="" style="width: auto;height: auto;width:150px;height: 150px;" id="<?= $image['photo']; ?>" />
							<?php } ?>
							<!--<div class="addIcon" style="top: 71%;left: 80%;">
                            <a href="#"><i class="icon-heart" ></i></a><a class="addAlbum"  lang="<?=$image['photo'];?>"><i class="icon-heart" ></i></a></div>-->
									
						</div>
						<ul class="meta">
						
						<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="<?= $image['id']; ?>"><i class="icon-comment"></i><?= $this->usermodel->checkCommentById($image['id']); ?> comment</a></li>
                       <li style="padding:5px !important; border-radius:2px; background-color:#D3D3D3"><a href="<?php echo base_url()."blog/likelukbokcust/luklikeuser/".$image['id']."/".$userid;?>" style="color:#298FE2; font-weight:600; font-size:11px"><i class="icon-heart" id="hrts"></i><?php if($image['likecount']){echo $image['likecount'];} else{echo '0';} ?></a></li>
						<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?= substr($image['createdOn'], 0, strrpos($image['createdOn'], ' '));?></li>
						</ul>
                        <?php
						$this->load->model('usermodel');
						 //$ascc['merchantId']= $image['merchantId'];
						$res=$this->usermodel->findCustomerById($image['user_Id']);
						 ?>
                        <p style=" margin-bottom: 0em; margin-top:0.25em"><a href="<?php echo base_url().'userprofile/'.$image['user_Id']; ?>" ><b><?= ucfirst ($res[0]['fullname']); ?></b></a></p>
						<p  id="descr" class="browsepadding"><?= substr($image['description'],0,60); 
						?></p>	
					</li>
					<?php }  } ?>
					
					<?php if(!empty($customerresult)) 
					 {
					  foreach($customerresult as $image) {?>
					 <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4" data-id="2" >
					  <div class="view view-one "> 
					<?php if($image['photo']) { 
						$a=str_replace(" ","-",$image['description']);
						$a= preg_replace('/[^A-Za-z0-9\-]/', '', $a);
						$b=substr($a,0,50)
						?>
                         <a href="<?=base_url();?>TopPhoto/<?=$b ?>/<?= $image['id']; ?>" title="<?= $image['description'];?>" >
					   <img src="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" alt="" style="width:150px;height: 150px;" id="<?= $image['photo']; ?>" /> </a>
					   <?php }else{ ?>
					   <img src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="" style="width:150px;height: 150px;" id="<?= $image['photo']; ?>" />
					   <?php } ?>
					   <div class="addIcon" style="display:none;top: 71%;left: 80%;"><a href="#"><i class="icon-heart" ></i></a><a class="addAlbum"  lang="<?=$image['photo'];?>"><i class="icon-plus" ></i></a></div>
						
						
					  </div>
					  <ul class="meta">
					  <li><a href="#" data-reveal-id="myModal" style="color:rgb(187, 187, 187);" class="" rel="<?= $image['userId'] ?>"><i class="icon-comment"></i>0 comments</a></li>
					  <li><i class="icon-calendar"></i><?= substr($image['createdOn'], 0, strrpos($image['createdOn'], ' '));?></li>
					  </ul>
					  <h5><?php echo substr($image['description'],0,60); ?></h5> 
					 </li>
					 <?php } }?>
					 <a href="<?=base_url();?>browsePhotoloop/<?= $page ?>"></a>