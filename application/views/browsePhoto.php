<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/plugins/prettyphoto/jquery.prettyPhoto.js"></script>
<script src="<?=base_url();?>assets/js/foundation.min.js"></script>
<script src="<?=base_url();?>assets/js/foundation/foundation.reveal.js"></script>
<script type="text/javascript" src="<?=base_url()?>newcss/js/jquery.jscroll.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/css/fgx-foundation.css" />
<link rel="stylesheet" href="<?=base_url();?>assets/css/foundation.css" />
<!--<link rel="stylesheet" href="<?=base_url();?>assets/plugins/prettyphoto/prettyPhoto.css" />
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="<?=base_url()?>new/css/bootstrap-image-gallery.css">
-->

<script>
var user='<?=$user_id;?>';
var baseurl='<?=base_url();?>';
var uids='<?=$this->session->userdata('user_id');?>'
</script>

<script src="<?=base_url();?>assets/js/pages/browsephoto.js"></script>

<style>
.content_wrapper{
	margin-top:0px;
	}
.main-content-top{
	margin-bottom:0px;
	}
a:hover{
text-decoration:none	
	}
	
#hrts:hover{
	
	color: #F00;
	cursor:pointer
	}
</style>

<!-- Modal HTML -->
    <div class="modal fade" id="uploadpic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                    <h4 class="modal-title" id="myModalLabel">Upload Images Of Working</h4>
                  </div>
  
                  <div class="modal-body">
                   
                <form class="form-horizontal" role="form" action="blog/add_lookbookmurchant" method="post" id="addphoto" enctype= multipart/form-data>
				 
                        <div class="form-group" style="margin-right:0;margin-left:0">
                           <label for="username">Add Photo</label>
                            <input class="form-control" id="photo" multiple name="photo[]" type="file" ><div id="picture"></div>
                        </div>
                        <div class="form-group" style="margin-right:0;margin-left:0"> 
                        <label for="username" >Youtube URL</label>
                        <input class="form-control" id="youtub" name="youtub" placeholder="Youtube URL" type="text">
                        </div>
                         <div class="form-group" style="margin-right:0;margin-left:0">
                           <label for="username">Category</label>
                             <select class="form-control" id="catfor" name="catfor" required>
												<option value="">Select category</option>
                                                 <?php 
			$groups = $this->usermodel->getAllGroups();
            foreach($groups as $row)
            { 
              echo '<option value="'.$row->name.'">'.ucfirst($row->name).'</option>';
            }
            ?>
												
												</select>
                        </div>
                        <div class="form-group" style="margin-right:0;margin-left:0"> 
                        <label for="username" >Heading</label>
                        <input type="hidden" name="photofor" id="photofor"  value="w"class="sign-form" autocomplete="off">
                        <input class="form-control" id="description" name="descrption" placeholder="Heading" type="text">
                        </div>
                         
                        <div class="form-group" style="margin-right:0;margin-left:0"> 
                        <label for="username" >Hash Tag</label>
                       <input class="form-control" id="hshtag" name="hshtag" placeholder="Hash Tag" type="text">
                        </div>
                        <div class="form-group" style="margin-right:0;margin-left:0"> 
                        <label for="username" >Description</label>
                        
                        <textarea class="form-control" id="comennts" name="comennts"  placeholder="description"></textarea>
                        </div>
                        
                  <div class="modal-footer">
                
				
			<input type="submit" class="btn btn-primary btn-lg center-block" id="submt" name="customer" value="Upload Image" />
				
		     
		</div>
        </form>
        </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
      </div>
<!-- end of model -->
<div class="row">
	<div class="large-10 medium-12 small-12 columns large-offset-1">
	<div id="blogModal" class="reveal-modal" data-reveal style="z-index:999999999;" >
	
			<div id="viewComment" style="width:100%; min-height:40px;">
						</div>
								
				<?php if($this->session->userdata('user_level')=='4') { ?>
               
				<div class="row" style="margin-top:2%">		
				<div class="large-12 columns" >									
				<textarea placeholder="Comments !" id="commentText"></textarea>
				<input type="hidden" value="" id="blogId">
				</div>	
				<div class="large-12 columns">
                
				
				<a href="#" class="button secondary log-in-row right submitComment">Submit</a>
		
				</div>	
				</div>
				<?php }/* else { ?>
				<a href="#" class="button secondary log-in-row right mercahantcomment">Submit</a>
				<?php } */?>		<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
				</div>
				</div>
			</div>
<div class="row">
		<div class="large-5 medium-12 small-12 columns large-offset-4">
			<div id="blogSuccessModal" class="reveal-modal" data-reveal style="z-index:999999999;" >
				<div class="row">		
					<div class="large-12 columns"><center>									
						Successfully sent</center>
					</div>						
				</div>				
			</div>
		</div>
</div>
<!--<div class="row">
	<div class="large-5 medium-12 small-12 columns large-offset-4">
	<div id="myModal" class="reveal-modal" data-reveal style="z-index:999999999;" >
	
				<div class="row">		
				<div class="large-12 columns">									
				<textarea placeholder="Comments !"></textarea>
				</div>	
				<div class="large-12 columns">
				<a href="#" class="button secondary log-in-row right">Submit</a>
				</div>	
				</div>
				<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
				</div>
				</div>
</div>-->
<div class="row">
	<div class="large-5 medium-12 small-12 columns large-offset-4">
	<div id="info" class="reveal-modal" data-reveal style="z-index:999999999;" >
	<div class="row">				
				<div class="large-12 columns">
				<h3><strong>Information !</strong></h3>
				</div>				
				</div>	
				<div class="row" id="pictureInformation">		
					
				</div>
				<a class="close-reveal-modal radius-close close"><div class="text-center">&#215;</div></a>
				</div>
				</div>
</div>
<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">
	<div id="albumsuccess" class="reveal-modal" data-reveal style="z-index:999999999;" >
		<div class="row">		
		<center>	successfully Added.</center>
		</div>				
	</div>
	</div>
</div>
<div class="row">
	<div class="large-4 medium-12 small-12 columns large-offset-4">
	<div id="alreadyExist" class="reveal-modal" data-reveal style="z-index:999999999;" >
		<div class="row">		
		<center>	Already Added.</center>
		</div>				
	</div>
	</div>
</div>
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
         <a id="resetpicas" class="button right" style="font-size: 12px; margin:1px">Remove All Filter</a>
        <div class="btn-group right" style="margin:1px">
  <button type="button" class="button dropdown-toggle" data-toggle="dropdown" style="font-size: 12px;" aria-expanded="false">
    Filter <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" id="filtercat" role="menu" style="margin-top: -10px; background-color:rgb(58, 141, 187)">
    						  <?php 
			$groups = $this->usermodel->getAllGroups();
            foreach($groups as $row)
            { 
              echo '<li data-value="'.$row->name.'">
                                <a >'.ucfirst($row->name).'</a>
                            </li>';
            }
            ?>
                           
  </ul>
</div>
  <div class="btn-group right" style="margin:1px">
  <button type="button" class="button dropdown-toggle" style="font-size: 12px;" data-toggle="dropdown" aria-expanded="false">
    Recent Activity <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" role="menu" style="margin-top: -10px; background-color:rgb(58, 141, 187)">
    <li  data-value='skincare'>
                                <a>Recent Activity</a>
                            </li>
                            <li data-value='makeup'>
                                <a>Top Stories</a>
                            </li>
                            
  </ul>
</div>
   <?php if($this->session->userdata('user_level')=='4') { ?>     <a id="uploadpicas" class="button right" style="font-size: 12px; margin:1px">Upload Photo</a><?php }?>
        
			       
			<div class="large-6 columns">
				<h2>Zips - Best Visual Snippets From The Web</h2>
			</div> 
		</div>
	</div>		
</div>
<!-- End Main Content Top -->
<div class="main-wrapper">
	<div class="content_wrapper">
		<div class="row">
			 
			<div class="large-12 columns">
				<ul class="row" id='userphoto' style="margin-bottom:2em">
					<?php 
					if(!empty($result)) {
					 foreach($result as $image){?>
					
					<li class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-id="2" style="border:solid 1px rgb(42, 145, 174); padding:7px; background-color:#F5F6F7; border-radius:5px">
						<div class="view view-one " style="height:150px"> 
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
						 $res=$this->usermodel->findCustomerById($image['user_Id']);
						
						if($res){
//print_r($this->db->last_query());
						 ?>
                        <p style=" margin-bottom: 0em; margin-top:0.25em"><a href="<?php echo base_url().'userprofile/'.$image['user_Id']; ?>" ><b><?= ucfirst ($res[0]['fullname']); ?></b></a></p><?php } else{$res=$this->usermodel->findCustomerById($image['merchantId']); ?>
<p style=" margin-bottom: 0em; margin-top:0.25em"><a href="<?php echo base_url().'userprofile/'.$image['merchantId']; ?>" ><b><?= ucfirst ($res[0]['fullname']); ?></b></a></p>
<?php }?>		<p  id="descr" class="browsepadding"><?= substr($image['description'],0,60); 
						?></p>
					</li>
					<?php }  } ?>
                    <?php 
					if(!empty($results)) {
					 foreach($results as $image){?>
					
					<li class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-id="2" style="border:solid 1px rgb(42, 145, 174); padding:7px; background-color:#F5F6F7; border-radius:5px">
						<div class="view view-one" style="height:150px"> 
						<?php if($image['photo']) { ?>
                        <a href="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photo']; ?>" title="<?= $image['description'];?>" data-gallery="">
							<img src="assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" alt="" style="height: 100%;width:auto; margin:auto" class="img-responsive" /> </a>
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
						$res=$this->usermodel->findMerchantById($image['merchantId']);
							
						if($res){
//print_r($this->db->last_query());
						 ?>
                        <p style=" margin-bottom: 0em; margin-top:0.25em"><a href="<?php echo base_url().'merchant/Salon/'.$image['merchantId']; ?>" ><b><?= ucfirst ($res[0]['salonName']); ?></b></a></p><?php } else{$res=$this->usermodel->findCustomerById($image['merchantId']); ?>
<p style=" margin-bottom: 0em; margin-top:0.25em"><a href="<?php echo base_url().'userprofile/'.$image['merchantId']; ?>" ><b><?= ucfirst ($res[0]['fullname']); ?></b></a></p>
<?php }?>		<p  id="descr" class="browsepadding"><?= substr($image['description'],0,60); 
						?></p>
					</li>
					<?php }  } ?>
					
					<?php if(!empty($customerresult)) 
					 {
					  foreach($customerresult as $image) {?>
					 <li class="col-lg-3 col-md-4 col-sm-3 col-xs-12" data-id="2" >
					  <div class="view view-one " style="height:150px"> 
					  <?php if($image['photo']) { 
						$a=str_replace(" ","-",$image['description']);
						$a= preg_replace('/[^A-Za-z0-9\-]/', '', $a);
						$b=substr($a,0,50)
						?>
                         <a href="<?=base_url();?>TopPhoto/<?=$b ?>/<?= $image['id']; ?>" title="<?= $image['description'];?>" >
					   <img src="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photothum']; ?>" alt="" style="height: 100%;width:auto; margin:auto" id="<?= $image['photo']; ?>" /> </a>
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
                     <a href="<?=base_url();?>browsePhotoloop/8"></a>
                </ul>	
			<input type="hidden" id="sessionIdValue" value="<?php echo $this->session->userdata('user_id'); ?>" >
			</div>			
		</div>
	</div>           
</div>

 <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?=base_url()?>new/js/bootstrap-image-gallery.js"></script> 

