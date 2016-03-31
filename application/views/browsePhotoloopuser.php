 <?php 
					if(!empty($results)) {
					 foreach($results as $image){?>
					
					<li class="col-lg-3 col-md-2 col-sm-3 col-xs-4" data-id="2" style="border:solid 1px rgb(42, 145, 174); padding:7px; background-color:#F5F6F7; border-radius:5px">
						<div class="view view-one " style="height:150px"> 
						<?php if($image['photo']) { ?>
                        <a href="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photo']; ?>" title="<?= $image['description'];?>" data-gallery="">
							<img src="assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" alt="" style="height: 100%;width:auto; margin:auto" id="<?= $image['photo']; ?>" class="img-responsive" /> </a>
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
                        <p style=" margin-bottom: 0em; margin-top:0.25em"><a href="#" data-toggle="modal" data-target="#confirmdelte" class="btn btn-danger btn-xs">Delete</a></p>
						<p  id="descr" class="browsepadding"><?= substr($image['description'],0,60);
						?></p>
                        
                             <!-- Modal forget pwd-->
            <div class="modal fade" id="confirmdelte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  
                        <div class="form-group">
                           <p><center>	Are you sure you want to delete it!!!</center></p>
                        </div>
           			 <center>
                     
				        <a href="<?= base_url()?>users/deletepic/<?= $image['id']; ?>" class="btn btn-danger" style="max-width:30%">Delete</a>
                        
				        <a href="#" class="btn btn-default"  data-dismiss="modal" style="max-width:30%">Cancel</a>
			
  </center>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
           	
					</li>
					<?php }  } ?>
					
					
					 <a href="<?=base_url();?>browsePhotoloopuser/<?= $page ?>"></a>