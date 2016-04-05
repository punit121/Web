<link rel="stylesheet" href="<?php echo base_url();?>newcss/css/userview.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style.css" />
<link rel="stylesheet" href="<?=base_url();?>assets/css/foundation.css" />
	<link rel="stylesheet" href="<?=base_url();?>assets/css/fgx-foundation.css" />
	<script src="<?=base_url();?>assets/js/foundation.min.js"></script>
	<script src="<?=base_url();?>assets/js/foundation/foundation.reveal.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>newcss/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>newcss/css/bootstrap-multiselect.css" type="text/css"/>
<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<link rel="stylesheet" href="<?=base_url()?>new/css/bootstrap-image-gallery.css">
<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?=base_url()?>new/js/bootstrap-image-gallery.js"></script>
<script src="<?=base_url()?>new/js/portfolio.pack.min.js"></script>

<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<script type="text/javascript">
    var baseurl='<?=base_url()?>';
var user='<?=$user;?>';
	var mrchntid='<?= $merchantRecord[0]["merchantId"] ?>'
</script>
<script src="<?=base_url();?>assets/js/pages/blog.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/js/pages/viewuser.js"></script>
<!-- Second, add the Timer and Easing plugins -->

<!-- Third, add the GalleryView Javascript and CSS files -->
  

<style>
.dropdown-menu{background-color:#FFF;

}
.spinner-container{
	display:none !important}
.multiselect {padding:2px 12px !important}
.btn-group{ width:100%;
height: 3em !important;
}
.btn-group>.btn:first-child{border-radius:0px; background-color:#FFF !important; box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);border: 1px solid #cccccc;font-size: 0.875em;
margin: 0 0 1em 0;padding: 2% !important;
height: 3em !important;
border-radius: 2px;
color: #000 !important;}
.teal {
color: #1eab9c!important;
font-family: inherit;
text-decoration: inherit;
}
.activeMenu{
font-weight:bold;
}
.rated{
	text-decoration:none
	font-weight: 600;
	border-radius: 4px;
	padding-left: 5px;
	padding-right: 5px;
	background-color: rgb(37, 201, 218);
	color: white;
	}
.icon-heart:hover
{
	color:#F00;
	}
.photo {
width:150px !important;
height:160px !important;
margin-bottom:5px !important;

}
</style>

<script type="text/javascript">
    var baseurl='<?=base_url()?>';
</script>
<!--<script type="text/javascript" src="<?=base_url()?>assets/js/pages/viewMap.js"></script>


-mukesh-->
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="Wishlistadded" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Merchant Added to Your Wishlist Account </h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="Wishlistremoved" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Merchant Removed from Your Wishlist Account </h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>

<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="Wishlistalreadyadded" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Merchant Already Added to Your Wishlist Account </h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="messageSendOpen" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Message Successfully Send</h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<form id="messageForm" method="post" action="<?=base_url();?>">
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="firstModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Write a message for him/her and make their day!</h3></center>
				</div>
				<!--<div class="large-12 columns text-center">
				<img src="<?=base_url();?>assets/images/modal.jpg">
				</div>-->
				<div class="large-6 columns log-in-row">
				<input type="text" name="messageName" id="messageName" placeholder="Enter your name">
				</div>
				<div class="large-6 columns log-in-row">
				<input type="text" class="onlyInteger" name="messagePhone" id="messagePhone" placeholder="Enter your phone no." maxlength="10">
				</div>
				<div class="large-12 columns log-in-row">
				<input type="text" name="messageEmail" id="messageEmail" placeholder="Enter your email">
				</div>
				<div class="large-12 columns log-in-row">
				<textarea placeholder="Enter your message" id="recommendMessage"></textarea>				
				<input type="hidden" id="merchanIdForRecommendation" value="<?php $url=$_SERVER['REQUEST_URI'];
						echo $end = end((explode('/', $url)));?>">
				</div>
				<input type="hidden" name="to" id="to" value="<?= $this->usermodel->merchantEmail($end);
						?>">
				<div class="large-4 columns log-in-row">
				<button type="submit" class="button secondary" id="messageSend">Submit</button>
				</div>
				<a class="close-reveal-modal radius-close1" id="closeRecommendation">&#215;</a>
				</div>
			</div>
		</div>
</div>
</form>
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="messageSendOpen" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<center><h3>Message Successfully Send</h3></center>
				</div>
				
				</div>
			</div>
		</div>
</div>
<!--Apeksha-->
<input type="hidden" value="<?php echo $user[0]['userId'] ?>" id="merchantId"/>

<div class="main-content-top">
	<div class="main-wrapper">	
		<div class="row">
			<?php 
					if(!empty($user))
					{ //print_r($user);
						$result=$this->usermodel->findRating($user[0]['userId']);
				?>
			<div class="large-3 columns">
			<div class="round-frame">
			<img src="<?=base_url();?>assets/images/merchant/<?php if(!empty($user[0]['photo']))
					{ 
						echo $user[0]['photo']; 
					}
					else
					{ 
						echo 'usericon.jpg'; 
					} }?>" style="width:100%; padding-bottom:0%">
			
			</div>
            <?php if($user[0]['userId']==$this->session->userdata['user_id']){?>	
                <a style="margin:1%" id="editphoto" onClick="picedit();" class="button"><i class="fa fa-edit"></i>&nbsp;Change Image	</a><?php }?>

            </div>    
			<div class="large-5 columns">
				<table width="100%" style="border: none;margin-bottom: 0em;"><tr><td>
                <h2><?=$user[0]['fullname']?></h2></td>
                <td><?php if($user[0]['userId']==$this->session->userdata['user_id']){?>
                <a style="float:right !important" id="editabout" onClick="editall();" class="button"><i class="fa fa-edit"></i>&nbsp;Edit</a><?php }?></td>
                </tr></table>
				<P><?=$user[0]['yourself']?></P>
		<?php if($user[0]['userId']!==$this->session->userdata('user_id')){ ?>	<a id="recommendation" class="button radius recommendation"><i class="icon-envelope" ></i>Message Me</a>	
        <?php }?>
				</div>
        <div class="large-4 columns">
            <div id="contactInfo" style="margin:12% 0 0 20%;">
				<h3 style="border-bottom:solid 1px #CCCCCC; ">Interests</h3>
				
                                                       
              <?php $spcdata=(explode(',',$user[0]['interest']));
						//$spcl=shuffle($spcdata);
						//$i=0;
						foreach($spcdata as $data) {
							?>
                           <a href="<?= base_url();?>blog/findAllBlog/<?php echo $data; ?>" class="btn btn-default" style="border-radius:10px"><?php echo $data; ?></a> 
				
								
					<?php }	?>
				            
		 
				</div>
					</div>
				
			</div>  
            
		</div>
	</div>		
	</div>
<!--- popup apeksha -->

    <div id="myModaledit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           <form action="<?=base_url();?>users/updatecustomer" method="post">
            <div class="modal-header">
              
                <h4 class="modal-title" style="color: #222222;">Edit Detail</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
            <label for="username">Full Name</label>
            <input type="text" id="salonname" name="salonname" class="sign-form" value="<?=$user[0]['fullname'];?>">
            </div>
             <div class="form-group">
            <label for="username">Interests</label>
               <select class="sign-form" style="width:100%" id="example-getting-started" multiple="multiple" name="a[]"> 
            <?php 
			$groups = $this->usermodel->getAllGroups();
            foreach($groups as $row)
            { 
              echo '<option value="'.ucfirst($row->name).'">'.ucfirst($row->name).'</option>';
            }
            ?>         
          
</select>
           
            </div>
            <div class="form-group">
            <label for="username">About Yourself</label>
                <textarea style="color: #222222; height:200px!important" id="about" name="about" class="sign-form"><?=$user[0]['yourself'];?></textarea>
                <input type="hidden" value="<?php echo $user[0]['userId'];?>" id="id" name="id"/>
                </div>
               
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="width:49%; float:left">Close</button>
                <button type="submit" class="btn btn-primary" style="width:49%">Save changes</button>
            </div>
        </div></form>
    </div>
</div>
</div><div id="myModalpic" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
           <form role="form" id="userprofile" method="post" action="<?=base_url();?>users/updatecustiage" enctype="multipart/form-data">
                  <div class="modal-header">
              
                <h4 class="modal-title" style="color: #222222;">Change Image</h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
           <label for="username">Profile Image</label>
           <input class="form-control" type="file" value="Browse"  name="picture" id="picture" />
                <input type="hidden" value="<?php echo $user[0]['userId'];?>" id="id" name="id"/>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="width:49%; float:left">Close</button>
                <button type="submit" class="btn btn-primary" style="width:49%">Save changes</button>
            </div>
        </div></form>
    </div>
</div>
</div>


<script>
var data="<?=$user[0]['interest'];?>";

//Make an array

var dataarray=data.split(",");

// Set the value

$("#example-getting-started").val(dataarray);

// Then refresh

$("#example-getting-started").multiselect("refresh");
</script>
	<!-- End Main Content Top -->
    
   <div class="main-wrapper">
		<div class="row">
				<div class="large-12 columns">
					<div class="title-block">					
						<h5>PHOTO GALLERY</h5>
						<div class="divider"><span></span></div>
						<div class="clearfix"></div>			
					</div>
					<div class="partners-block">
						<div class="row" id="logo_slidec" style="width: 100%; max-height: 250px; overflow-x: scroll; overflow-y: hidden; white-space: nowrap;">
							<?php 
							$str=explode('/', $_SERVER['REQUEST_URI']);
							$id=end($str);
				$result=$this->usermodel->getOnlycustomerImage($id); 
							if(!empty($result))
							{
							foreach($result as $image) { 
							if($image['photo']) {
							?>
							
                            <a href="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photo']; ?>" title="<?= $image['description'];?>" data-gallery="">
                            <img class="photo" src="<?=base_url();?>assets/images/merchant/browsphoto/<?= $image['photo']; ?>" alt="Premises" alt="Envato" style="height:180px;width:150px border-radius:10px" /></a>
							<?php } ?>
							<?php }}else { echo "No Preview Available";}?>
						</div>
						<div class="clearfix"></div>
						<!--<a class="prev" id="slide_prev2" href="#"><img src="<?=base_url();?>assets/images/arrow_left.png" alt="Previous" /></a>
						<a class="next" id="slide_next2" href="#"><img src="<?=base_url();?>assets/images/arrow_right.png" alt="Next" /></a>-->
					</div>
				</div>
			</div>
	<div class="row main-content">
	  <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    
	            
      <div class="row"><!-- Row -->
        <div class="large-12 columns widgets side-widgets">         
			<ul class="breadcrumbs custom-margin">
						<li><a href="#" class="activeMenu" id="activity">Activity</a></li>
						<li><a href="#" id="review">Reviews</a></li>
						<li><a href="#" id="bookmark">Bookmarks</a></li>
						<li><a href="#" id="que">Questions</a></li>
			</ul>
			  <!-- activity -->      
					<div class="section-container" id="activitybox" data-section> 
				<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"> </div>	
         
			<ul class="posts-list" id="postul">
            <?php 
			$user_id=$this->session->userdata('user_id');
			$post=$this->usermodel->where_data_post('post',array('userId'=>$id));
			$cmts=$this->usermodel->all_data_postnolimit('post_coment');
			//echo $this->db->last_query();
			if($post){ foreach ($post as $pt){?>
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
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:50px"/>
                    
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
						<?PHP }?><p><?php echo $pt->post?></p></div>
                        <div class="post-detail-bottom">
                            <div class="pull-left">
                                       <?php 
					$pts['postid']=$pt->postid;
					$ptsd['postid']=$pt->postid;
					$ptsd['userid']=$user_id;
					$cmtntcnt=$this->usermodel->countlikecomment('post_coment',$pts);
					$likecnt=$this->usermodel->countlikecomment('post_like',$pts);
					$likeno=$this->usermodel->where_data('post_like',$ptsd);
					if(!count($likeno)){
					?>     <a onClick="return checklogin();" href="<?php echo base_url()?>blog/likepost/<?php echo $pt->postid."/".$user_id?>" class="btn-like">Like</a><?php } else {?>
                   <a href="<?php echo base_url()?>blog/unlikepost/<?php echo $pt->postid."/".$user_id?>" class="btn-like">Unlike</a><?php }?>                         
                    </div>
                    
                            <div class="pull-right">
                        <a class="icon-btn">
                            <i class="fa fa-heart fa-lg"></i>
                        </a>
                        <span><?php echo $likecnt;?></span>
                        <a class="icon-btn post-link" >
                            <i class="fa fa-comment fa-lg"></i>
                        </a>
                        <span><?php echo $cmtntcnt;?></span>
                    </div>
                   
              <form  class="comentform"  style="padding-top:30px" ref="<?php echo $pt->postid;?>">
                <input type="text" id="cnttext" name="cnttext" class="form-control mention stst" placeholder="Write Answer..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/>
                <input type="hidden" value="<?php echo $user_id;?>" name="usersid" id="user_id"/>
            <input type="hidden" value="<?php echo $pt->postid;?>" name="post_id" id="post_id"/>
                
            <button type="submit" id="postsubmit" name="comentsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
               
         </form>         
                        </div>
                        </div>
                        
                        <div class="" style="border:solid 1px #CCC">
                    	<ul class="comments-list" id="c<?php echo $pt->postid;?>">
                        <?php 
						$cmts=$this->usermodel->where_data('post_coment', array('postid'=>$pt->postid));
						//echo $this->db->last_query();
						foreach($cmts as $cm){
							  if($cm->postid==$pt->postid)
							  {
							  ?>  
                        <?php $photo=$this->usermodel->fetchuserimage($cm->userid); 
			$uids['id']=$cm->userid;
			$userdt=$this->usermodel->where_data('users',$uids);
			?>
                        	<li class="comment" style="border-bottom:solid 1px #CCC">
                            	<div class="wrap">
                                   <?php
				
				 if($photo[0]->business=='P'){
					$photox=$this->usermodel->where_data('merchant',array('merchantId'=>$cm->userid)); 
					?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$cm->userid?>"><?php } else {
                                 $photox=$this->usermodel->where_data('customer',array('userId'=>$cm->userid)); ?>
                                 <a href="<?=base_url();?>userprofile/<?=$cm->userid?>"><?php }?>
                               
                                	<img class="avatar" src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:50px; width:50px"/>
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
*/?></time>
                                    </div>
                                    
                                    
                                    <div class="content"><?php echo $cm->comment;?></div>
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
					<?php if(!count($likeno1)){
					?>    <a onClick="return checklogin();" href="<?php echo base_url()?>blog/likecmt/<?php echo $cm->cmtid."/".$user_id?>" class="btn-like"> Like</a><?php } else {?>
                   <a href="<?php echo base_url()?>blog/unlikecmt/<?php echo $cm->cmtid."/".$user_id?>" class="btn-like"> Unlike</a><?php }?>       <span><?php echo $likecnt1;?></span>&nbsp;&sdot; </div>        
                   <div ><a rel="cr<?php echo $cm->cmtid;?>" class="btn-like replybtn"> Reply</a> </div> 
                </div><div>
                <ul class="comments-list" style="font-size:12px" id="cnt<?php echo $cm->cmtid;?>">
                <?php 
						$cmtc=$this->usermodel->where_data('coment_coment', array('cmtid'=>$cm->cmtid));
						//echo $this->db->last_query();
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
                               
                                	<img class="avatar" src="<?php if(isset($photoxx[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photoxx[0]->photo;} 
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
                                    
                                    
                                    <div class="content" style="padding:0px"><?php echo $cc->coment;?></div>
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
                     <?php }}?>    
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
                     <?php }}?>        </ul>
                    </div>
                             
                    </div>
                </li>
                
                <?php }}?>
               
            </ul>
            
           
                
            </div>
			
            <!--Activity end
            
            reivew box
            -->
            
	<div id="reivewbox" style="display:none">
		<div class="section-container accordion" data-section>        
			
			</div>
			<div class="row">
			<div class="large-12 columns">
			<h4><?=$user[0]['fullname'];?>'s Reviews</h4>
			<div class="reviewBox">
			<?php 
			$results=$this->usermodel->findreviewuser($userdt[0]->id);
			foreach($results as $val){
				
			?>
            
            <article class="post col1-alternative" style="border-bottom:1px solid #25C9DA">
				<div class="row">
					<div class="large-12 columns">
						<div class="post_img">
			<input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); }?>">
            				<?php
							 if($val['merchantId']){
					  $pt=$this->usermodel->findMerchantById($val['merchantId']);
						  }
						  else{
						 $pt=$this->usermodel->findcutomerById($val['userId']);
						  }
							//$pt=$this->usermodel->findMerchantById($val['merchantId']);
							//$this->usermodel->findCustomerPhotoById($val['merchantId']);
							?>
							<a href="<?php if($pt[0]['salonName']) echo base_url().'merchant/Salon/'.$pt[0]['merchantId'];			 else echo base_url().'userprofile/'.$pt[0]['userId']; ?>"style="text-decoration:none">
							<?php //$this->usermodel->findCustomerPhotoById($val['merchantId']);
							if(!empty($pt[0]['photo']))
							{
							?>
							<img class="post_image" src="<?=base_url();?>assets/images/merchant/<?=$pt[0]['photo']?>" alt="Salon Image" style="width:65px;height:65px;float:left">
							<?php } else {?>
							<img class="post_image" src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="Salon Image" style="width:65px;height:65px;float:left">
						
                       	<?php } 
						$wishList=$this->usermodel->getWishListByUser($val['merchantId'],$this->session->userdata('user_id'));
						?></a>
						<?php if($this->session->userdata('user_level')!='2') {	?>
			<a class="small button right" id="wishList<?=$val['merchantId']?>" rel="<?=$val['merchantId']?>" <?php if(!empty($wishList)){echo 'style="display:none"';} ?>><span class=" icon-lightbulb"></span>Add to Wishlist</a>			
			<a class="small button right" id="remWishList<?=$val['merchantId']?>" rel="<?=$val['merchantId']?>" <?php if(empty($wishList)){echo 'style="display:none"';} ?>><span class=" icon-lightbulb"></span>Remove from Wishlist</a>
			<?php	} ?>
            <script>
                        $('#wishList<?=$val['merchantId']?>').click(function(){
			var uid=$('#sessionIdValue').val();
			if(uid)
			{	
				var mid=$(this).attr('rel');
				var merchantId=mid;
				
				var dataString='merchantId='+merchantId;
				$.ajax({
					url:baseurl+'users/addWhishList',
					type:'POST',
					data:dataString,
					success:function(response){
						console.log(response);
						if(response=='success')
						{
							$('#Wishlistadded').foundation('reveal','open');
							setTimeout(function() {
							//$('#Wishlistadded').foundation('reveal','close');
							location.reload();
							}, 2000);
							$("#wishList").hide();
							$("#remWishList").show();
							
						}
						else
						{
							$('#Wishlistalreadyadded').foundation('reveal','open');
							setTimeout(function() {
							//$('#Wishlistalreadyadded').foundation('reveal','close');
							location.reload();
							}, 2000);
							
						}
					}
				});				
			}
			else
			{
				$('#signip').modal('show');
			}
		return false;	
		});
$('#remWishList<?=$val['merchantId']?>').click(function(){
			var uid=$('#sessionIdValue').val();
			if(uid)
			{
				var mid=$(this).attr('rel');
				var merchantId=mid;
				var dataString='merchantId='+merchantId;
				$.ajax({
					url:baseurl+'users/remWhishList',
					type:'POST',
					data:dataString,
					success:function(response){
						console.log(response);
						if(response=='success')
						{
							$('#Wishlistremoved').foundation('reveal','open');
							setTimeout(function() {
							//$('#Wishlistremoved').foundation('reveal','close');
							//$("#remWishList").hide();
							//$("#wishList").show();
							location.reload();
							}, 2000);
							
						}
					}
				});		
			}
			else
			{
				$('#signip').modal('show');
			}
		return false;	
		});

                        </script>
 <a href="<?php if($pt[0]['salonName']) echo base_url().'merchant/Salon/'.$pt[0]['merchantId'];			 else echo base_url().'userprofile/'.$pt[0]['userId']; ?>"style="text-decoration:none">
                         <h2 style="margin-left:75px"><?= $pt[0]['salonName']?></h2></a>
                       
						<div class="divline" style="margin-left:75px"><span></span></div>
						<ul class="meta" style="margin-left:75px">
							<li><?= $pt[0]['location']?></li>
							<li><i class="icon-calendar"></i><?=$val['createdOn']?></li>
							
						</ul>
                        <?php $resultz=$this->usermodel->findRating($val['merchantId']); ?>

                        </div>
                       
					</div>
					<div class="large-12 columns">
						
						<div id="readblogData<?=$val['id']?>" style="display:none"><p class="post_text"><b>Rated </b><a href="#" class="rated"><?php echo ($resultz)?$resultz:0;?></a> <?=$val['review']?> <a class="backMore" id="readLess" rel="<?=$val['id']?>">Read Less</a></p></div>
						<div id="subblogData<?=$val['id']?>"><p class="post_text"><b>Rated </b><a href="#" class="rated"><?php echo ($resultz)?$resultz:0;?></a> <?php echo substr($val['review'],0,320)."..."; if(strlen($val['review'])>320){ ?> <a class="readMore" id="readMore" rel="<?=$val['id']?>">Read More</a><?php } ?></p></div>
						<?php
						$ptsx['revid']=$val['id'];
					$ptsdx['revid']=$val['id'];
					$ptsdx['userId']=$user_id;
					//print_r($ptsd);
					$cmtntcnt=$this->usermodel->countlikecomment('reviewlike',$ptsx);
					$likeno=$this->usermodel->where_data('reviewlike',$ptsdx);
					if(!count($likeno)){	?>
						<a href="<?php echo base_url()?>blog/likereview/<?php echo $val['id']."/".$user_id?>" class="secondary button" style="text-decoration:none"><i class="icon-heart"></i>Like | <?php echo $cmtntcnt?></a>
                        
                        <?php } else {?>
                   <a href="<?php echo base_url()?>blog/unlikereview/<?php echo $val['id']."/".$user_id?>" class="secondary button" style="text-decoration:none">
                   <i class="icon-heart" style="color:#F00"></i>Unlike | <?php echo $cmtntcnt?></a><?php }?> 
						
                       
                       <?php
					    
					   $vs=$val['id'];
					   //print_r($vs);
					  $cmnt=$this->usermodel->where_datacmt($val['id']);
					  //print_r($cmnt);
					  if($cmnt){
					  foreach($cmnt as $vcm){
						  if($vcm->merchantId){
					  $pt=$this->usermodel->findMerchantById($vcm->merchantId);
						  }
						  else{
						 $pt=$this->usermodel->findcutomerById($vcm->userId);
						  }
					   ?>
                       <div class="row" style="margin-bottom:1%">
                       <div class="large-12 columns">
                        <div class="large-1" >
                        <center>
						<?php if($vcm->merchantId){?>
                         <a href="<?=base_url();?>merchant/Salon/<?=$vcm->merchantId?>" style="text-decoration:none">
						 <?php } else {?>
						<a href="<?=base_url();?>userprofile/<?=$vcm->userId?>"style="text-decoration:none"><?php }?>
						
						<?php if($pt[0]['photo']){?>
                     <img class="img-radius" src="<?=base_url();?>assets/images/merchant/<?php echo $pt[0]['photo'];?>" alt="post title" style="width:35px;height:35px;float:left"/> 
                     <?php }else{?>
                     <img class="img-radius" src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="post title" style="width:35px;height:35px;float:left"/> 
                    <?php }?>
                    </center> 
                    </div>
                    <div class="large-11" style="float:right; font-size:12px">
                    <b><?php if($vcm->merchantId){ echo $pt[0]['salonName'];} else {echo $pt[0]['fullname'];} ?> :</b></a>
                   <?php echo $vcm->comment; ?>
                    </div>
                    </div>
                    </div>
                    
                    
                      <?php }}?>
                      <div class="section-container accordion" data-section style="margin-top:1%"></div>
                       <form  method="post" onsubmit="return validateForm()" action="<?php echo base_url();?>blog/commentreviw" >
                <input type="text" id="cmttext" name="cmttext" class="form-control" placeholder="Write a Comment..." style="height: 56px;width: 99%;"/>
                <input type="hidden" value="<?php echo $user_id;?>" name="usersid" id="user_id"/>
            <input type="hidden" value="<?php echo $val['id'];?>" name="review_id" id="review_id"/>
                
            <button type="submit" id="comentsubmit" name="comentsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
               
         </form>  </div>
				</div>
			</article>
            <?php }?>
            
			
			</div>
			</div>					
			</div>		
			
	</div>
			<!-- end review and start bookmark-->
			
        <div class="section-container" id="bookmarkid" style="display:none"> 
					<!--recommendation cuts-->
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"></div>
                <?php if(!empty($book)){ ?>
					
					
					<table cellpadding="0" cellspacing="0" id="dataTable" style="width:100%;">
                   
                                        <thead>
                                            <tr style="border-bottom:1px solid #CCC; text-align:center">
                                                
                                                <th>Merchant Name</th>
                                                <th style="width:14%">Photo</th>
                                                <th style="width:22%">Action</th>
                                                <th>Ratting</th>
                                            </tr>
                                        </thead>
                                        <tbody>
									<?php    
											foreach($book as $wishlist)
											{
												$resultz=$this->usermodel->findRating($wishlist['merchantId']); 
											$my_string=$this->usermodel->findMerchantSalonNameById($wishlist['merchantId']);
											$str=str_replace(" ", "_",$my_string);
											$result=$this->usermodel->findMerchantByIdInWishlist($wishlist['merchantId']);
											?>
											<tr id="<?= $wishlist['id'];?>">
									           <td><a href="<?=base_url()?>merchant/<?=$str;?>/<?= $wishlist['merchantId']?>" style="cursor:pointer;color:black;"> <?php echo $result;?></a></td>
												<td><a href="<?=base_url()?>merchant/<?=$str;?>/<?= $wishlist['merchantId']?>" style="cursor:pointer;"><img src="<?= base_url(); ?>assets/images/merchant/<?php echo $result=$this->usermodel->findMerchantPhotoById($wishlist['merchantId']);?>" width="40%"></a></td>
												
										<td>	<?php  
						$wishLisst=$this->usermodel->getWishListByUser($wishlist['merchantId'],$this->session->userdata('user_id'));
						?>
						<?php if($this->session->userdata('user_level')!='2') {	?>
			<a class="small button right" id="wishListz<?=$wishlist['merchantId']?>" rel="<?=$wishlist['merchantId']?>" <?php if(!empty($wishLisst)){echo 'style="display:none"';} ?>><span class=" icon-lightbulb"></span>Add to Wishlist</a>			
			<a class="small button right" id="remWishListz<?=$wishlist['merchantId']?>" rel="<?=$wishlist['merchantId']?>" <?php if(empty($wishLisst)){echo 'style="display:none"';} ?>><span class=" icon-lightbulb"></span>Remove from Wishlist</a>
			<?php	} ?></td>
            <td><a href="#" class="rated" style="font-size: 20px;font-weight:600;border-radius:4px"><?php echo ($resultz)?$resultz:0;?></a></td>
                                            </tr>
						<script>
                        $('#wishListz<?=$wishlist['merchantId']?>').click(function(){
			var uid=$('#sessionIdValue').val();
			if(uid)
			{	
				var mid=$(this).attr('rel');
				var merchantId=mid;
				//alert(merchantId);
				var dataString='merchantId='+merchantId;
				$.ajax({
					url:baseurl+'users/addWhishList',
					type:'POST',
					data:dataString,
					success:function(response){
						console.log(response);
						if(response=='success')
						{
							$('#Wishlistadded').foundation('reveal','open');
							setTimeout(function() {
							//$('#Wishlistadded').foundation('reveal','close');
							location.reload();
							}, 2000);
							$("#wishList").hide();
							$("#remWishList").show();
							//location.reload();
						}
						else
						{
							$('#Wishlistalreadyadded').foundation('reveal','open');
							setTimeout(function() {
							//$('#Wishlistalreadyadded').foundation('reveal','close');
							location.reload();
							}, 2000);
						}
					}
				});				
			}
			else
			{
				$('#signip').modal('show');
			}
		return false;	
		});
	$('#remWishListz<?=$wishlist['merchantId']?>').click(function(){
			var uid=$('#sessionIdValue').val();
			if(uid)
			{
				var mid=$(this).attr('rel');
				var merchantId=mid;
				var dataString='merchantId='+merchantId;
				$.ajax({
					url:baseurl+'users/remWhishList',
					type:'POST',
					data:dataString,
					success:function(response){
						console.log(response);
						if(response=='success')
						{
							$('#Wishlistremoved').foundation('reveal','open');
							setTimeout(function() {
							location.reload();
							//$('#Wishlistremoved').foundation('reveal','close');
							}, 2000);
							$("#remWishList").hide();
							$("#wishList").show();
							//location.reload();
						}
					}
				});		
			}
			else
			{
				$('#signip').modal('show');
			}
		return false;	
		});

                        </script>
                        
                        				<?php }
											?>	
                                        </tbody>
                                       
                                    </table>
<?php }?>                
                </div>
           <!-- End bookmark -->
        <div class="section-container" id="queastionid" style="display:none"> 
					<!--recommendation cuts-->
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"></div>
         <style>
         #quesubmit {
color: #fff;
background-color: #25c9da;
border-color: #1A8C86;
}
#quesubmit:hover{
border-color: #116C67!important;
background-color: #1D96A2!important;
}
         </style>       
            <div class="row">
			<div class="large-12 columns">
			
            <div class="post-control">
            
            
           
                           <div class="input-control">
              <form  method="post" onsubmit="return validateForm()" action="<?php echo base_url();?>blog/postquestion">
         <div class="mentions-input-box" style="background-color: #F2F2F2;border: 1px solid #DCDCDC;border-bottom: none;">
                <input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); }?>">
                <textarea id="quetext" name="posttext" class="form-control mention" placeholder="Write Your Question..." style="word-wrap: break-word; resize: none; height: 56px;margin:0;" required></textarea>
                      <input type="hidden" name="userid" id="userid" value="<?php  echo $id;?>">   
      <button type="submit" id="quesubmit" name="quesubmit" class="btn btn-primary btn-sm pull-right" style="width:115px;margin:1%;" >Ask Question</button>
                 <div class="input-control clearfix">
      
         </form>    
         </div></div></div></div>
         
         <h4>Asked Questions</h4>
			<div class="reviewBox">
			<?php 
			$results=$this->usermodel->findquesuser($userdt[0]->id);
			foreach($results as $val){
				
			?>
            
            <article class="post col1-alternative" style="border-bottom:1px solid #25C9DA">
				<div class="row">
					<div class="large-12 columns">
						<div class="post_img">
			<input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); }?>">
            				<?php
							 if($val['merchantId']){
					  $pt=$this->usermodel->findMerchantById($val['merchantId']);
						  }
						  else{
						 $pt=$this->usermodel->findcutomerById($val['userId']);
						  }
							//$pt=$this->usermodel->findMerchantById($val['merchantId']);
							//$this->usermodel->findCustomerPhotoById($val['merchantId']);
							?>
							<a href="<?php if($pt[0]['salonName']) echo base_url().'merchant/Salon/'.$pt[0]['merchantId'];			 else echo base_url().'userprofile/'.$pt[0]['userId']; ?>"style="text-decoration:none">
							<?php if(!empty($pt[0]['photo']))
							{
							?>
                            <img class="post_image" src="<?=base_url();?>assets/images/merchant/<?=$pt[0]['photo']?>" alt="Salon Image" style="width:65px;height:65px;float:left">
							<?php } else {?>
							<img class="post_image" src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="Salon Image" style="width:65px;height:65px;float:left">
						
                       	<?php } 
						?>
			             <h2 style="margin-left:75px"><?php if($pt[0]['salonName']) echo $pt[0]['salonName'];
						 else echo $pt[0]['fullname'] ?></h2></a>
                        
						<div class="divline" style="margin-left:75px"><span></span></div>
						<ul class="meta" style="margin-left:75px">
							<li><i class="icon-calendar"></i><?=$val['createdOn']?></li>
							
						</ul>
                      

                        </div>
                       
					</div>
					<div class="large-12 columns">
						
						<div id="readblogData<?=$val['id']?>" style="display:none"><p class="post_text"><?=$val['question']?> <a class="backMore" id="readLess" rel="<?=$val['id']?>">Read Less</a></p></div>
						<div id="subblogData<?=$val['id']?>"><p class="post_text"> <?php echo substr($val['question'],0,320)."..."; if(strlen($val['question'])>320){ ?> <a class="readMore" id="readMore" rel="<?=$val['id']?>">Read More</a><?php } ?></p></div>
						
						
						<?php
						$ptsxx['queid']=$val['id'];
					$ptsdxx['queid']=$val['id'];
					$ptsdxx['userId']=$user_id;
					//print_r($ptsd);
					$cmtntcnt=$this->usermodel->countlikecomment('questnlike',$ptsxx);
					$likeno=$this->usermodel->where_data('questnlike',$ptsdxx);
					if(!count($likeno)){	?>
						<a href="<?php echo base_url()?>blog/likeques/<?php echo $val['id']."/".$user_id?>" class="secondary button" style="text-decoration:none"><i class="icon-heart"></i>Like | <?php echo $cmtntcnt?></a>
                        
                        <?php } else {?>
                   <a href="<?php echo base_url()?>blog/unlikeques/<?php echo $val['id']."/".$user_id?>" class="secondary button" style="text-decoration:none">
                   <i class="icon-heart" style="color:#F00"></i>Unlike | <?php echo $cmtntcnt?></a><?php }?> 
                       
                       <?php
					    
					   $vs=$val['id'];
					   //print_r($vs);
					  $cmnt=$this->usermodel->where_dataans($val['id']);
					  //print_r($cmnt);
					  if($cmnt){
					  foreach($cmnt as $vcm){
						  if($vcm->merchantId){
					  $pt=$this->usermodel->findMerchantById($vcm->merchantId);
						  }
						  else{
						 $pt=$this->usermodel->findcutomerById($vcm->userId);
						  }
					   ?>
                       <div class="row" style="margin-bottom:1%">
                       <div class="large-12 columns">
                        <div class="large-1" >
                        <center>
						<?php if($vcm->merchantId){?>
                         <a href="<?=base_url();?>merchant/Salon/<?=$vcm->merchantId?>" style="text-decoration:none">
						 <?php } else {?>
						<a href="<?=base_url();?>userprofile/<?=$vcm->userId?>"style="text-decoration:none"><?php }?>
						
						<?php if($pt[0]['photo']){?>
                     <img class="img-radius" src="<?=base_url();?>assets/images/merchant/<?php echo $pt[0]['photo'];?>" alt="post title" style="width:35px;height:35px;float:left"/> 
                     <?php }else{?>
                     <img class="img-radius" src="<?=base_url();?>assets/images/merchant/usericon.jpg" alt="post title" style="width:35px;height:35px;float:left"/> 
                    <?php }?>
                    </center> 
                    </div>
                    <div class="large-11" style="float:right; font-size:12px">
                    <b><?php if($vcm->merchantId){ echo $pt[0]['salonName'];} else {echo $pt[0]['fullname'];} ?> :</b></a>
                   <?php echo $vcm->answer; ?>
                    </div>
                    </div>
                    </div>
                    
                    
                      <?php }}?>
                      <div class="section-container accordion" data-section style="margin-top:1%"></div>
                       <form  method="post" onsubmit="return validateForm()" action="<?php echo base_url();?>blog/commentquestion" >
                <input type="text" id="cmttext" name="cmttext" class="form-control" placeholder="Write a Comment..." style="height: 56px;width: 99%;"/>
                <input type="hidden" value="<?php echo $user_id;?>" name="usersid" id="user_id"/>
            <input type="hidden" value="<?php echo $val['id'];?>" name="review_id" id="review_id"/>
                
            <button type="submit" id="comentsubmit" name="comentsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/>
               
         </form>  </div>
				</div>
			</article>
            <?php }?>
            
			
			</div>
			</div>					
			</div>    
                
                
                </div>
           <!-- End question -->
           
           
           
           
           
                                              
        </div>
        
           
    
         
		 <div class="large-3 columns widgets side-widgets"  id="rtcrd" style="display:none;">         
          <h4>RATECARD</h4>                 
            <!-- Sidebar Navigation -->      
            <div class="section-container level accordion" data-section>        
              <section class="section active">

	<div class="widgets">	
		<!--<div id="test2" class="gmap3" style="width:257px;height:285px"></div>-->
		<div id="map_canvas" style="width:257px;height:285px"></div>
				<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28005.86074612837!2d77.09795154999999!3d28.667724399999972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04709a55ca61%3A0x733c78dcf34281ce!2sPaschim+Vihar!5e0!3m2!1sen!2sin!4v1397556382610" width="100%" height="250" frameborder="0" style="border:0"></iframe>-->				
	</div>
	<div class="widgets">
	<h5 class="verticalLine-bottom">Online</h5>
	<p><a href="http://<?= $merchantRecord[0]['website']?>" target="_blank">My Website</a><br><a href="http://<?= $merchantRecord[0]['blog']?>" target="_blank">Blog</a></p>
	<p><a href="http://twiter.com/<?= $merchantRecord[0]['twiter']?>"  target="_blank""><i class="icon-twitter left"></i></a>&nbsp;<a href="http://<?= $merchantRecord[0]['gplus']?>" target="_blank"><i class="icon-google-plus left"></i></a>&nbsp;<a href="http://linkedin.com/<?= $merchantRecord[0]['twiter']?>"  target="_blank""><i class="icon-linkedin left"></i></a></p>
	</div>
	<div class="widgets">
	<h5 class="verticalLine-bottom"></h5>
	</div>	
              </section>            
            </div>
            <!-- End Sidebar Navigation -->                                     
        </div>
      </div><!-- End Row -->
    </div>	
  </div>
	
  <!-- End Main Content --> 
	</div></div> 
	<input type="hidden" id="sessionId" value="<?= $this->session->userdata('user_level');?>">
	<script>
//jQuery.noConflict();
	
</script>
 <script type="text/javascript">
 
 function removejscssfile(filename, filetype){
 var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none" //determine element type to create nodelist from
 var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none" //determine corresponding attribute to test for
 var allsuspects=document.getElementsByTagName(targetelement)
 for (var i=allsuspects.length; i>=0; i--){ //search backwards within nodelist for matching elements to remove
  if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
   allsuspects[i].parentNode.removeChild(allsuspects[i]) //remove element by calling parentNode.removeChild()
 }
}

	
window.onload = function() {
	removejscssfile('classie.js', 'js');
	removejscssfile('agency.js', 'js');
	removejscssfile('normalize.css', 'css');
	
};

    $(document).ready(function() {
       	
	    $('#example-getting-started').multiselect();
		
    });
	
</script>

<script>
   /* $(document).ready(function() {	
	var d = $("#logo_slide").portfolio({
        enableKeyboardNavigation: true, // enable / disable keyboard navigation (default: true)
        loop: false, // loop on / off (default: false)
        easingMethod: 'easeOutQuint', // other easing methods please refer: http://gsgd.co.uk/sandbox/jquery/easing/
        height: '250px', // gallery height
        width: '100%', // gallery width in pixels or in percentage
        lightbox: false, // dim off other images, highlights only currently viewing image
        showArrows: false, // show next / prev buttons
        logger: false, // for debugging purpose, turns on/off console.log() statements in the script
        spinnerColor: '#FFF', // Ajax loader color
        offsetLeft: 0, // position left value for current image
        opacityLightbox: '0.2' // opacity of other images which are not active

    });
            d.init();
    });*/
</script>

 
