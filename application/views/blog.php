<?php /*?>/*<div class="row">
	<div class="large-5 medium-12 small-12 columns large-offset-4">
	<div id="blogModal" class="reveal-modal" data-reveal style="z-index:999999999;" >
	<div class="row">
			<div id="viewComment" style="width:100%; min-height:40px;">
			<!--<div id="top" style="height:50%;">
			<div id="topleft" style="float:left;width:20%;">
			<img src="<?= base_url(); ?>assets/images/merchant/user.gif" width="50%">Robert</div><div id="topright" style="width:80%;float:left;"><strong style=""><P>Test to check comment work or not</P></strong></div>
			</div>
			<div id="bottom" style="height:50%;">
		
			<strong style="margin-top:10px;float:right;">8 minute ago</strong>
		
			</div>-->
			</div>
				<div class="large-12 columns">
				<h3><strong>Comments !</strong></h3>
				</div>				
				</div>	
				<div class="row">		
				<div class="large-12 columns">									
				<textarea placeholder="Comments !" id="commentText"></textarea>
				<input type="hidden" value="" id="blogId">
				</div>	
				<div class="large-12 columns">
				<?php if($this->session->userdata('user_level')=='4') { ?>
				<a href="#" class="button secondary log-in-row right submitComment">Submit</a>
				<?php } else { ?>
				<a href="#" class="button secondary log-in-row right mercahantcomment">Submit</a>
				<?php } ?>
				</div>	
				</div>
				<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
				</div>
				</div>
			</div>

<div class="row">
	<div class="large-5 medium-12 small-12 columns large-offset-4">
	<div id="newBlogModal" class="reveal-modal" data-reveal style="z-index:999999999;" >
	<div class="row">
			<div id="viewComment" style="width:100%; min-height:40px;">
			</div>
				<div class="large-12 columns">
				<h3><strong>New Blog !</strong></h3>
				</div>
				</div>
				<div class="row">		
							<form class="form-horizontal" role="form" action="users/new_blog" method="post" id="blog-form" enctype= 'multipart/form-data'>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="title">Title</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="title" name="title" placeholder="title" type="text">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="description">Description</label>
                                            <div class="col-lg-10">
                                               <textarea id="description" name="description" placeholder="description" style="width:100%"></textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="category">Category</label>
                                            <div class="col-lg-3">
                                               <select class="select2" id="category" name="category">
											   <option value="">Select Category</option>
											   <?php
												 $result=$this->usermodel->selectBusinessCategory();
												 foreach($result as $value){
												?>
														<option value="<?= $value['id']; ?>"><?= $value['category']; ?></option>
											   <?php } ?>
											   </select>
											   </div>
											     <div class="col-lg-3" style="margin-top:1% !important">
												<a></a>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-lg-10">
                                                <div class="uploader" id="uniform-file"><input type="file" name="blog_picture" id="blog_picture"></div><div id="photo"></div>
                                            </div>
											
                                        </div>

                                        <div class="form-group">
                                            
                                            <div class="col-lg-offset-2">
                                                <div class="pad-left15">
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                            
                                    </form>
				</div>
				<a class="close-reveal-modal radius-close"><div class="text-center">&#215;</div></a>
			</div>
		</div>
</div>

<script type="text/javascript">
    var baseurl='<?=base_url()?>';
</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/pages/blog.js">
</script>
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h2>Blog</h2>
			</div>        
		</div>
	</div>		
</div>
<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="blogSuccessModal" class="reveal-modal" data-reveal style="z-index:999999999;" >
				<div class="row">		
					<div class="large-12 columns">									
					<center>	Successfully sent </center>
					</div>						
				</div>				
			</div>
		</div>
</div>
<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="followBlog" class="reveal-modal" data-reveal style="z-index:999999999;" >
				<div class="row">		
					<center><div class="large-12 columns">									
						Follow Blog Successfully sent
					</div>	</center>					
				</div>				
			</div>
		</div>
</div>
<div class="row">
		<div class="large-4 medium-12 small-12 columns large-offset-4">
			<div id="alreadyfollowBlog" class="reveal-modal" data-reveal style="z-index:999999999;" >
				<div class="row">		
					<center><div class="large-12 columns">	
						Already Followed This Blog
					</div>	</center>					
				</div>				
			</div>
		</div>
</div>

<!-- End Main Content Top -->
<div class="main-wrapper">
<input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); } ?>">
	<div class="row main-content">
		<div class="large-9 columns">
			<?php if(!empty($blogDetail))
					{
						foreach($blogDetail as $value)
						{
			?>
			<article class="post col1-alternative">
				<div class="row">
					<div class="large-4 columns">
						<div class="post_img">
							<?php
							if(!empty($value['photo']))
							{
							?>
							<img class="post_image" src="<?=base_url();?>assets/images/demo/blog/<?=$value['photo']?>" alt="post title" style="width:100%;height:160px;margin-top:3%">
							<?php } else {?>
							<img class="post_image" src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="post title" style="width:100%;height:150px">
							<?php } ?>
						</div>
					</div>
					<div class="large-8 columns">
						<h2><?=$value['title']?></h2>
						<div class="divline"><span></span></div>
						<ul class="meta">
							<li><i class="icon-comment"></i><?php $result=$this->blogmodel->findComment($value['id']);							
							?></li>
							<li><i class="icon-calendar"></i><?=$value['created']?></li>
							<li><i class="icon-user"></i>Administrator</li>
						</ul>
						<div id="readblogData<?=$value['id']?>" style="display:none"><p class="post_text"><?php echo $value['description'];?></p></div>
						<div id="subblogData<?=$value['id']?>"><p class="post_text"><?php echo substr($value['description'],0,320);?></p></div>
						<a class="button readMore" id="readMore<?=$value['id']?>" rel="<?=$value['id']?>">Read More</a>
						<a class="button backMore" id="readLess<?=$value['id']?>" style="display:none" rel="<?=$value['id']?>">Read Less</a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=http://zersey.com/blog" class="secondary button"><i class="icon-share"></i>Share</a>
						<button class="blogcommentwidth button comment" rel="<?=$value['id']?>">Comments</button>
						<!--<div class="row" id="commentBox<?=$value['id']?>" style="display:none;width:401px;padding-left:16px;">
							<div class="large-12 medium-12 small-12">															
									<div class="row">		
									<div class="large-12 columns">									
										<textarea placeholder="Comments !" id="commentText<?=$value['id']?>"></textarea>
										<input type="hidden" id="blogId<?=$value['id']?>">
									</div>	
									<div class="large-12 columns">
										<button type="button" class="button secondary log-in-row right submitComment" rel="<?=$value['id']?>">Submit</button>
									</div>	
									</div>															
							</div>
						</div>-->
					</div>
				</div>
			</article>
			<?php 
				}	}			
			?>
			<div class="pagination-wrapper">
				<ul class="pagination">
					<?php echo $links;?>
					<!--<li class="current"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>-->
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<aside class="large-3 columns">
			<?php if($this->session->userdata('user_level')=='4') { ?>
			<input type="button" value="New Blog" id="newBlog" style="background-color:#25c9da;color:white;border:0px;padding-top:3%;padding-bottom:4%;border-radius:3px;font-size:15px;" />
			<script>
				$('#newBlog').click(function(){
					$('#newBlogModal').foundation('reveal','open');
				})
			</script>
			<?php } ?>
			<div class="widgets">
				<h3>Category</h3>				
				<ul id="tags">
					<?php $result=$this->usermodel->getBlogCategoryDetail();
					if(!empty($result))
						{
					foreach($result as $value)
						{ ?>
					<li><a href="<?=base_url(); ?>blog/findSelectedBlog/<?=$value['businessCategory'];?>" class="button small" id="<?=$value['businessCategory'];?>"><?= $this->usermodel->findNameBusiness($value['businessCategory']);?></a></li>
					<?php } }?>
				</ul>
				<div class="clearfix"></div>
				
			</div>
			<div class="widgets">
			<h5>FOLLOW BLOG VIA EMAIL</h5>
			<p>Enter your email address to follow this blog and receive notifications of new posts by email!</p>
				<div class="clearfix"></div>
			<form name="form-follow" id="form-follow">
			<input type="text" id="follower" name="follower" required>
			</div>
			<div class="widgets">
			<a href="#" class="button secondary" id="follow">Follow</a>
				<div class="clearfix"></div>
			<p>FOLLOW @Zersey HAIR</p>				
			</form>			
			</div>
			<div class="widgets" style="height:270px">
				<div class="fb-like-box" data-href="https://www.facebook.com/pages/Cybershock-/217010728346765" data-colorscheme="light" data-show-faces="true"data-width="250" data-header="true" data-stream="false" data-show-border="true"></div>
			</div>
			<div class="widgets">
				<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/deep_cybershock" data-widget-id="455958507389325312">Tweets by @deep_cybershock</a>				
			</div>			
		</aside>
	</div>
</div>  
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=527890870664757&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
$(document).foundation();
jQuery(document).ready(function() {
});
</script>  <?php */?>

  <?php if($post){ foreach ($post as $pt){?>
            	  <li class="post">
                	<div class="user-block">
            <div class="user-image">
            <?php $photo=$this->usermodel->fetchuserimage($pt->userid); 
			$uids['id']=$pt->userid;
			$userdt=$this->usermodel->where_data('users',$uids);
			 
			
			?>
                <?php
				
				 if($photo[0]->business=='P'){
					$photox=$this->usermodel->where_data('merchant',array('merchantId'=>$pt->userid)); 
					?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$pt->userid?>"><?php } else {
                                 $photox=$this->usermodel->where_data('customer',array('userId'=>$pt->userid)); ?>
                                 <a href="<?=base_url();?>userprofile/<?=$pt->userid?>"><?php }?>
                   <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:70px; width:70px"/>
                    
                </a>
            </div>
            <div class="user-info">
                <div class="name"><?php if($photo[0]->business=='P'){?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$pt->userid?>"><?php } else {?>
                                 <a href="<?=base_url();?>userprofile/<?=$pt->userid?>"><?php }?>
								 <?php echo $userdt[0]->fullName;?>
               </a> </div><time>
<?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $pt->datetm));
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
	
	$a= explode(" ", $pt->datetm);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></time>
                
                
            </div>
        </div>
        			
                    <div class="post-detail">
                    <div class="post-status clearfix">
                    	<div class="post-detail-content"><?php if($pt->imgname!=NULL){?>
						
						<img src="<?php echo base_url();?>assets/images/post/<?php echo $pt->imgname; 
					?>"   style="width:100%"/>
						<?PHP }?><b><p id="p<?= $pt->postid;?>" style="font-size:20px"><?php if(strlen($pt->post)>200){echo substr($pt->post,0,200)."...<a href='#' ref='p".$pt->postid."' class='readmr'>Read More.</a>";}else{echo $pt->post;} ?></p><p id="pp<?= $pt->postid;?>" style="display:none; font-size:20px"><?php echo $pt->post;?></p></b></div>
                        <div class="post-detail-bottom">
                            <div class="pull-left">
                                       <?php 
					$pts['postid']=$pt->postid;
					$ptsd['postid']=$pt->postid;
					$ptsd['userid']=$user_id;
					$cmtntcnt=$this->usermodel->countlikecomment('post_coment',$pts);
					$likecnt=$this->usermodel->countlikecomment('post_like',$pts);
					$likeno=$this->usermodel->where_data('post_like',$ptsd);
					
					?>     <a href="#" class="btn-like btn btn-primary btn-sm askpost" rel="<?php echo $pt->postid ?>" id="askchng<?php echo $pt->postid ?>" style=" <?php if(!count($likeno)){} else{ echo "display:none"; } ?>"><abbr>Ask | </abbr> <span class="contask"><?php 
					
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
					?></span></a>
                   <a href="<?php /* echo base_url()?>blog/unlikepost/<?php echo $pt->postid."/".$user_id*/?>#" class="btn-like btn btn-primary btn-sm" id="askeds<?php echo $pt->postid ?>" style=" <?php if(!count($likeno)){echo "display:none";} else{  } ?>">Asked | <span><?php if ($likecnt >= 1000 && $likecnt < 1000000) {
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
	?></span></a>                         
                    </div>
                    
                          <div class="pull-right">
                       <?php /*   <a class="icon-btn">
                            <i class="fa fa-heart fa-lg"></i>
                        </a>
                        <span><?php echo $likecnt;?></span>*/?>
                        <a class="icon-btn post-link" >
                            <i class="fa fa-comment fa-lg"></i>
                        </a>
                        <span><?php echo $cmtntcnt;?></span>
                    </div>
                   
              <form  class="comentform"  style="padding-top:30px" ref="<?php echo $pt->postid;?>">
              <textarea id="cnttext" name="cnttext" class="form-control mention stst" placeholder="Write Answer..." style="overflow: scroll; word-wrap: break-word; resize: none;height:auto !important; width: 99%; max-height:500px !important; " onkeyup='this.rows = (this.value.split("\n").length||1);'></textarea>
     <!--           <input type="text" id="cnttext" name="cnttext" class="form-control mention stst" placeholder="Write Answer..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/>
         -->       <input type="hidden" value="<?php echo $user_id;?>" name="usersid" id="user_id"/>
            <input type="hidden" value="<?php echo $pt->postid;?>" name="post_id" id="post_id"/>
                
            <button type="submit" id="postsubmit" name="comentsubmit" class="btn btn-primary btn-sm pull-right" style=" margin:2%">Answer</button>
               
         </form>         
                        </div>
                        </div>
                        
                        <div class="" style="border:solid 1px #CCC">
                    	<ul class="comments-list" id="c<?php echo $pt->postid;?>">
                        <?php 
						$cmts=$this->usermodel->where_data('post_coment', array('postid'=>$pt->postid));
						//echo $this->db->last_query();
						$m=0;
						foreach($cmts as $cm){
							  if($cm->postid==$pt->postid)
							  {
							  ?>  
                        <?php $photo=$this->usermodel->fetchuserimage($cm->userid); 
			$uids['id']=$cm->userid;
			$userdt=$this->usermodel->where_data('users',$uids);
			?>
                        	<li class="comment" id="comentli<?= $cm->cmtid; ?>" style="border-bottom:solid 1px #CCC">
                            	<div class="wrap">
                                   <?php
				
				 if($photo[0]->business=='P'){
					$photox=$this->usermodel->where_data('merchant',array('merchantId'=>$cm->userid)); 
					?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$cm->userid?>"><?php } else {
                                 $photox=$this->usermodel->where_data('customer',array('userId'=>$cm->userid)); ?>
                                 <a href="<?=base_url();?>userprofile/<?=$cm->userid?>"><?php }?>
                               
                                	<img class="avatar" src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:50px; width:7%"/>
                                    </a>
                                    
                                    <div class="info clearfix">
                                            <div class="user-info"><?php if($photo[0]->business=='P'){?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$cm->userid?>"><?php } else {?>
                                 <a href="<?=base_url();?>userprofile/<?=$cm->userid?>"><?php }?>
                                            	<div class="name"><?php echo $userdt[0]->fullName;?></div>
                                            	</div></a>
                                            <time><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $cm->datetm));
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
	
	$a= explode(" ", $cm->datetm);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
/*$etime = time() - $to_time;
//echo time();
    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            echo $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) ;
        }
    }
*/$user=($this->session->userdata); if($cm->userid == $user['user_id']){ ?><a href="#" class="close deletecomment" rel="<?= $cm->cmtid;?>" style="margin-left:2px">&times;</a><?php }?></time>
                                    </div>
                                    
                                    
                                    <div class="content"><p id="cptc<?= $cm->cmtid;?>"><?php if(strlen($cm->comment)>300){echo substr($cm->comment,0,300)."...<a href='#' ref='cptc".$cm->cmtid."' class='readmrcmtred'>Read More.</a>";}else{echo $cm->comment;} ?></p><p id="pcptc<?= $cm->cmtid;?>" style="display:none"><?php echo $cm->comment;?></p></div>
                                    <div class="info clearfix">
                                    <div>
                                     <?php 
					$ptss['comentid']=$cm->cmtid;
					$ptsds['comentid']=$cm->cmtid;
					$ptsds['userid']=$user_id;
					$likecnt1=$this->usermodel->countlikecomment('coment_like',$ptss);
					$likeno1=$this->usermodel->where_data('coment_like',$ptsds);
					?>
					 <div style="float:left">
					 <a  href="#" id="likecmt<?php echo $cm->cmtid; ?>" class="btn-like likecoment" rel="<?php echo $cm->cmtid; ?>" ref="<?php echo $pt->postid; ?>" <?php if(!count($likeno1)){ } else{?> style="display:none"<?php }?>> Like </a>
                   <a id="unlikecmt<?php echo $cm->cmtid; ?>" href="#" rel="<?php echo $cm->cmtid; ?>" class="btn-like unlikecoment" <?php if(!count($likeno1)) {?> style="display:none"<?php } else {}?>> Unlike </a><span id="spancount<?= $cm->cmtid?>"><?php echo $likecnt1;?></span>&nbsp;&sdot; </div>       
                   <div ><a rel="cr<?php echo $cm->cmtid;?>" class="btn-like replybtn"> Reply</a> </div> 
                </div><div>
                <ul class="comments-list" style="font-size:12px" id="cnt<?php echo $cm->cmtid;?>">
                <?php 
						$cmtc=$this->usermodel->where_data('coment_coment', array('cmtid'=>$cm->cmtid));
						//echo $this->db->last_query();
						$i=0;
						foreach($cmtc as $cc){
							  if($cc->cmtid==$cm->cmtid)
							  {
							  ?>
                              <?php $photzo=$this->usermodel->fetchuserimage($cc->userid); 
			$uids['id']=$cc->userid;
			$userdta=$this->usermodel->where_data('users',$uids);
			?>
            <li class="comment" style="border-bottom:solid 1px #CCC">
                            	<div class="wrap">
                                   <?php
				
				 if($photzo[0]->business=='P'){
					$photoxx=$this->usermodel->where_data('merchant',array('merchantId'=>$cc->userid)); 
					?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$cc->userid?>"><?php } else {
                                 $photox=$this->usermodel->where_data('customer',array('userId'=>$cc->userid)); ?>
                                 <a href="<?=base_url();?>userprofile/<?=$cc->userid?>"><?php }?>
                               
                                	<img class="avatar" src="<?php if(isset($photoxx[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photoxx[0]->photo;} else if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;}
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="border: 2px solid;height:25px; width:5%"/>
                                    </a>
					 <div class="info clearfix">
                                            <div class="user-info"><?php if($photzo[0]->business=='P'){?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$cc->userid?>"><?php } else {?>
                                 <a href="<?=base_url();?>userprofile/<?=$cc->userid?>"><?php }?>
                                            	<div class="name"><?php echo $userdta[0]->fullName;?></div>
                                            	</div></a>
                                            <time><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $cc->datetm));
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
	
	$a= explode(" ", $cc->datetm);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?>
</time>
                                    </div>
                                    
                                    
                                    <div class="content" style="padding:0px"><p id="cpt<?= $cc->ccid;?>"><?php if(strlen($cc->coment)>60){echo substr($cc->coment,0,60)."...<a href='#' ref='cpt".$cc->ccid."' class='readmrcmt'>Read More.</a>";}else{echo $cc->coment;} ?></p><p id="pcpt<?= $cc->ccid;?>" style="display:none"><?php echo $cc->coment;?></p></div>
                                    <div class="info clearfix">
                                    <div>
                                     <?php 
					$ptss['comentid']=$cc->ccid;
					$ptsds['comentid']=$cc->ccid;
					$ptsds['userid']=$user_id;
					//$likecnt1=$this->usermodel->countlikecomment('coment_like',$ptss);
					//$likeno1=$this->usermodel->where_data('coment_like',$ptsds);
					//if(!count($likeno1)){
					/*?>
                    <div style="float:left"><a onClick="return checklogin();" href="<?php echo base_url()?>blog/likecmt/<?php echo $cc->cmtid."/".$user_id?>" class="btn-like"> Like</a><?php //} else {?>
                   <a href="<?php echo base_url()?>blog/unlikecmt/<?php echo $cc->cmtid."/".$user_id?>" class="btn-like"> Unlike</a><?php //} ?>       <span><?php?></span>&nbsp;&sdot; </div><?php */?> 
                   </div>
                   </div>
                                
                            	</div>
                            </li>
                     <?php $i++;
					 if($i>1 && $i<(count($cmtc))){ ?><center> <a href="<?= base_url();?>TopForum/<?= $pt->postid?>" style="padding:5px">Read All Reply </a>
					 </center><?php break;}
					 else if($i > 1){break;}
					 }}?>   				  
                </ul>
                </div>
                <div id="cr<?php echo $cm->cmtid;?>" hidden="">
                 <form  class="replyform"  style="padding-top:10px" ref="<?php echo $cm->cmtid;?>">
                <input type="text" id="cntrepl" name="cntrepl" class="form-control mention scmsnt" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/>
                <input type="hidden" value="<?php echo $user_id;?>" name="userxsid" id="user_id"/>
            <input type="hidden" value="<?php echo $cm->cmtid;?>" name="conemt_id" id="conemt_id"/>
                
            <button type="submit" id="postsubmit" name="comentsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
               
         </form>     
                
                                
                            	</div>
                            </li>
                    <?php
					 $m++;
					 if($m>1 && $m < count($cmts)){ 
					 ?>
					<center> <a href="<?= base_url();?>TopForum/<?= $pt->postid?>" id="rdalans<?= $pt->postid?>" style="padding:5px">Read All Answers </a>
					 </center><?php
					 break;}
					 else if($m>1) {break;}
					  }}?>  </ul>
                        </div>
                    
                        
                    </div>
                </li>
                
                <?php }}
                if(!$word){ ?>
               <a href="<?php
			   
			   echo base_url().'blogloop/'.$pagesno.'/'.$cat; ?>" hidden=""></a><?php } else{?>
               <a href="<?php
			   
			    echo base_url().'blog/blogloopsearch/'.$pagesno.'/'.$word;?>" hidden=""></a>
<?php }?> 