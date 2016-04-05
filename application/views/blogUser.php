<link rel="stylesheet" href="<?php echo base_url();?>newcss/css/blog.css" type="text/css" media="all" />
<script type="text/javascript" src="<?=base_url()?>newcss/js/jquery.jscroll.js"></script>

<script src="<?=base_url();?>assets/js/pages/blog.js"></script>
<script>
var user='<?=$user_id;?>';
function validateForm(){
	if(user){
		var x = document.getElementById("catgry").selectedIndex;
		var a=document.getElementById("catgry").options;
		var real=a[x].text
		//alert(real);
		if(real=='Select Topic')
		{
		 document.getElementById("alertval").innerHTML = "Please Select Topic.";
		//document.getElementById("alertval").block;
		return false;
		}
		else{	
		
		return true;
		}
		}
		else
		{
			$('#signip').modal('show');
			return false;
			
			}
}
 function getval() {
  document.getElementById("alertval").innerHTML = "";
}
function checklogin()
{
	if(user){
		return true;
		}
		else
		{
			$('#signip').modal('show');
			return false;
			
			}
	
	}
	
	
</script>
<section id="" class="container" style="padding-top:30px">
  <div class="row">
        <div class="large-2 columns">
            <a href="<?= base_url();?>Forum" class="btn" style="text-decoration:none"><i class="glyphicon glyphicon-arrow-left"></i> Back To Forum</a>
            
            </div>
        </div>
    <div class="row">
    	<div class="main-feed">
        	
            
            
			<div id="posts-list">
			<ul class="posts-list" id="">
            <?php if($post){ foreach ($post as $pt){ ?>
           
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
						<?PHP }?><b><p style="font-size:20px"><?php echo $pt->post?></p></b></div>
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
                       
                       
                        <a class="icon-btn post-link" >
                            <i class="fa fa-comment fa-lg"></i>
                        </a>
                        <span><?php echo $cmtntcnt;?></span>
                    </div>
                   
              <form  class="comentform"  style="padding-top:30px" ref="<?php echo $pt->postid;?>">
                <textarea id="cnttext" name="cnttext" class="form-control mention stst" placeholder="Write Answer..." style="overflow: scroll; word-wrap: break-word; resize: none;height:auto !important; width: 99%; max-height:500px !important; " onkeyup='this.rows = (this.value.split("\n").length||1);'></textarea>
                <input type="hidden" value="<?php echo $user_id;?>" name="usersid" id="user_id"/>
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
*/ $user=($this->session->userdata); if($cm->userid == $user['user_id']){ ?><a href="#" class="close deletecomment" rel="<?= $cm->cmtid;?>" style="margin-left:2px">&times;</a><?php }?></time>
                                    </div>
                                    
                                    
                                    <div class="content"><p id="cptc<?= $cm->cmtid;?>"><?php if(strlen($cm->comment)>350){echo substr($cm->comment,0,350)."...<a href='#' ref='cptc".$cm->cmtid."' class='readmrcmtred'>Read More.</a>";}else{echo $cm->comment;} ?></p><p id="pcptc<?= $cm->cmtid;?>" style="display:none"><?php echo $cm->comment;?></p></div>
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
                     <?php }}?>       </ul>
                    </div>
                    
                        
                    </div>
                </li>
                
                <?php }}?>
               
            </ul>
            </div>


        
        
        </div>
        
        <aside class="sidebar">
             
    <div class="top-tags">
    <h4>Trending #</h4>
    <ul class="list-unstyled" >
                <?php 
				$result=$this->blogmodel->trandsofblog();
				if($result){ foreach($result as $rts){
				?>
                <li style="padding:5px; border-bottom:1px solid #eee">
            <a href="<?= base_url()?>TopForum/<?= $rts['postid']?>" style="color: #1ea79f !important"><?php echo substr($rts['post'],0,50); if (strlen($rts['post'])>50)echo '...'; ?></a>
        </li>
               <?php }}?>
            </ul>
</div>    <br>
    <div class="top-products">
    <h4>Active Members</h4>
    <ul> <?php 
				$result2=$this->blogmodel->topsalonblog();
				if($result2){ foreach($result2 as $rts2){
					$pmrch=$this->usermodel->where_data('users',array('id'=>$rts2['userid'])); 
					//print_r($photomrch);
					if($pmrch[0]->business=='P'){
						$photomrch=$this->usermodel->where_data('merchant',array('merchantId'=>$rts2['userid'])); 
					//print_r($photomrch);
				?>
                     <li style="height:70px">
            <a href="<?php echo base_url();?>merchant/Salon/<?=$rts2['userid']?>">
    <img class="product-img" src="<?php if(isset($photomrch[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photomrch[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:50px">
    <div class="caption" style="vertical-align:top; padding-top:5px">
        <div class="brand-name"><?php echo ucfirst ($photomrch[0]->salonName)?></div>
        <div class="product-name"><?= $photomrch[0]->location?></div>
    </div>
</a>        </li>
            <?php } else{  $photomrch=$this->usermodel->where_data('customer',array('userId'=>$rts2['userid'])); 
					//print_r($photomrch);
				?>
                     <li style="height:70px">
            <a href="<?php echo base_url();?>userprofile/<?=$rts2['userid']?>">
    <img class="product-img" src="<?php if(isset($photomrch[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photomrch[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:50px">
    <div class="caption" style="vertical-align:top; padding-top:5px">
        <div class="brand-name"><?php echo ucfirst ($photomrch[0]->fullname)?></div>
        <div class="product-name"><?= $photomrch[0]->location?></div>
    </div>
</a>        </li>
            
            
            
            <?php }}} ?>    
            </ul>
</div>    <br>
    
        </aside>
    </div>
</section>
<script>
function removejscssfile(filename, filetype){
 var targetelement=(filetype=="js")? "script" : (filetype=="css")? "link" : "none" //determine element type to create nodelist from
 var targetattr=(filetype=="js")? "src" : (filetype=="css")? "href" : "none" //determine corresponding attribute to test for
 var allsuspects=document.getElementsByTagName(targetelement)
 for (var i=allsuspects.length; i>=0; i--){ //search backwards within nodelist for matching elements to remove
  if (allsuspects[i] && allsuspects[i].getAttribute(targetattr)!=null && allsuspects[i].getAttribute(targetattr).indexOf(filename)!=-1)
   allsuspects[i].parentNode.removeChild(allsuspects[i]) //remove element by calling parentNode.removeChild()
 }
}

window.onload=function(){
	
	removejscssfile('foundation.css', 'css');
	//removejscssfile('custom.css', 'css');
	removejscssfile('normalize.css', 'css');
	}
	
	jQuery(document).ready(function() {
	// Flickr
	$('#postul').jscroll();
	});
</script> 
