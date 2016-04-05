<link rel="stylesheet" href="<?php echo base_url();?>newcss/css/blog.css" type="text/css" media="all" />

<?php $user_id= $this->session->userdata('user_id');?>
<script>
var user='<?=$user_id;?>';
var baseurl='<?=base_url();?>';
var uids='<?=$this->session->userdata('user_id');?>'
</script>
<script src="<?=base_url();?>assets/js/pages/browsesinglepic.js"></script>


<section id="" class="container" style="padding-top:10px">
    <div class="row">
    	<div class="main-feed">
        
      
 <div class="large-6" style="float:right"> <?php if($next){ foreach ($next as $nt){

						$a=str_replace(" ","-",$nt['description']);
						$a= preg_replace('/[^A-Za-z0-9\-]/', '', $a);
						$b=substr($a,0,50)
						
	  ?> 
 <a href="<?php echo base_url()."TopPhoto/".$b.'/'.$nt['id']?>" class="btn" style="text-decoration:none">Next <i class="fa  fa-angle-double-right fa-lg"></i></a><?php }}?>
</div>
 <div class="large-6" >
 <?php  if($previous){ foreach ($previous as $pr){ $c=str_replace(" ","-",$nt['description']);
 $c= preg_replace('/[^A-Za-z0-9\-]/', '', $c);
						$d=substr($c,0,50) ?><a href="<?php echo base_url()."TopPhoto/".$d.'/'.$pr['id'] ?>" class="btn" style="text-decoration:none"><i class="fa  fa-angle-double-left fa-lg"></i> Previous</a><?php }}?>&nbsp;
</div>
 
			<div id="posts-list">
			<ul class="posts-list" id="postul" style="padding-bottom:0px">
            <?php 
			 //print_r($result);
			if($result){ foreach ($result as $pts){
			//print_r($pts);
			 $id= $pts['id'];

			if($pts['merchantId']== 0 || $pts['merchantId']== "" ){
				$ids=$pts['user_Id'];
				}
				else{
					
					$ids=$pts['merchantId'];
					}
		
			?>
            	  <li class="post" style="  padding-bottom: 0px; border-bottom: none;">
                	<div class="user-block">
            <div class="user-image">
            <?php $photo=$this->usermodel->fetchuserimage($id); 
			$uids['id']=$ids;
			$userdt=$this->usermodel->where_data('users',$uids);
			 
			
			?>
                <?php
				
				 
                                 $photox=$this->usermodel->where_data('customer',array('userId'=>$ids)); ?>
                                 <a href="<?=base_url();?>userprofile/<?=$ids?>">
                   <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:70px; width:70px"/>
                    
                </a>
            </div>
            <div class="user-info">
                <div class="name"><?php if($photo[0]->business=='P'){?>
                                 <a href="<?=base_url();?>merchant/Salon/<?=$id?>"><?php } else {?>
                                 <a href="<?=base_url();?>userprofile/<?=$id?>"><?php }?>
								 <?php echo $userdt[0]->fullName;?>
               </a> </div><time>
<?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $pts['createdOn']));
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
	
	$a= explode(" ", $pts['createdOn']);
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
                     <div class="post-detail-content" >
					 <div style="">
        <h2 class="headerTxt" style="font-size:25px !important;"><?=$pts['description'];?></h2>
       
      
       <center>
 <?php  if($previous){ foreach ($previous as $pr){ $c=str_replace(" ","-",$nt['description']);
 $c= preg_replace('/[^A-Za-z0-9\-]/', '', $c);
						$d=substr($c,0,50) ?><a href="<?php echo base_url()."TopPhoto/".$d.'/'.$pr['id'] ?>"  style="text-decoration:none"><i class="fa  fa-chevron-left  fa-2x"></i>&nbsp;</a><?php }}  if($pts['photo']){?>   
 
 <img src="<?php echo base_url();?>assets/images/merchant/browsphoto/<?php echo $pts['photo']; ?>" style="width:70%; border:solid 1px #000000" />
 <?php } else{?>
 <object width="70%" height="350" data="http://www.youtube.com/v/<?php echo $pts['youtube']; ?>" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/<?php echo $pts['youtube']; ?>" /></object>
 <?php }?>
    <?php if($next){ foreach ($next as $nt){

						$a=str_replace(" ","-",$nt['description']);
						$a= preg_replace('/[^A-Za-z0-9\-]/', '', $a);
						$b=substr($a,0,50)
						
	  ?> 
 <a href="<?php echo base_url()."TopPhoto/".$b.'/'.$nt['id']?>" style="text-decoration:none"> <i class="fa  fa-chevron-right fa-2x"></i></a><?php }}?>
       </center>
    
        	 <p  id="p<?=  $pts['id'];?>"><?php echo $pts['comentdes']; ?></p>

   </div> 
					
                                        
						</div>
                        <div class="post-detail-bottom">
                                

                            <div class="pull-left">
  <?php 
					$fts['fbblogid']=$id;
					$ftsd['fbblogid']=$id;
					$ftsd['userid']=$user_id;
					$cmtntcnt=$this->usermodel->countlikecomment('lookbook_comment',$fts);
					$likecnt=$this->usermodel->countlikecomment('lookbook_like',$fts);
					$likeno=$this->usermodel->where_data('lookbook_like',$ftsd);
					
					?> 
							 <a href="#" class="btn-like btn btn-primary btn-sm askpost" rel="<?php echo  $id ?>" id="askchng<?php echo  $id ?>" style=" <?php if(!count($likeno)){} else{ echo "display:none"; } ?>"><abbr>Like | </abbr> <span class="contask"><?php 
					
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
                   <a href="<?php /* echo base_url()?>blog/unlikepost/<?php echo $pt->postid."/".$user_id*/?>#" class="btn-like btn btn-primary btn-sm" id="askeds<?php echo $id ?>" style=" <?php if(!count($likeno)){echo "display:none";} else{  } ?>">Liked | <span><?php if ($likecnt >= 1000 && $likecnt < 1000000) {
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
                 <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fzersey.com%2FTopPhoto%2F<?= $nm?>%2F<?= $id?>" class="btn-like btn btn-primary btn-sm" target="_blank"><i class="fa fa-facebook"></i> Share</a>
                 <a class="icon-btn">
                            <i class="fa fa-heart fa-lg"></i>
                        </a>
                        <span><?php echo $likecnt;?></span>
                        <a class="icon-btn post-link" >
                            <i class="fa fa-comment fa-lg"></i>
                        </a>
                        <span><?php echo $cmtntcnt;?></span>
                    </div>
                   
              <form  class="comentform"  style="padding-top:30px" ref="<?php echo $id;?>">
              <textarea id="cnttext" name="cnttext" class="form-control mention stst" placeholder="Write Comment..." style="overflow: scroll; word-wrap: break-word; resize: none;height:auto !important; width: 99%; max-height:500px !important; " onkeyup='this.rows = (this.value.split("\n").length||1);'></textarea>
     <!--           <input type="text" id="cnttext" name="cnttext" class="form-control mention stst" placeholder="Write Answer..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/>
         -->       <input type="hidden" value="<?php echo $user_id;?>" name="usersid" id="user_id"/>
            <input type="hidden" value="<?php echo $id;?>" name="post_id" id="post_id"/>
                <button type="submit" id="postsubmit" name="comentsubmit" value="Comment" class="btn btn-primary btn-sm pull-right" style=" margin:2%">Comment</button>
            
               
         </form>         
                        </div>
                        </div>
                        
                        <div class="" style="border:solid 1px #CCC">
                    	<ul class="comments-list" id="c<?php echo $id;?>">
                        <?php 
						$cmts=$this->usermodel->where_data('lookbook_comment', array('fbblogid'=>$id));
						//echo $this->db->last_query();
						$m=0;
						foreach($cmts as $cm){
							  if($cm->fbblogid==$id)
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
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:50px; width:6%"/>
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
					$ftss['comentid']=$cm->cmtid;
					$ftsds['comentid']=$cm->cmtid;
					$ftsds['userid']=$user_id;
					$likecnt1=$this->usermodel->countlikecomment('lookbook_coment_like',$ftss);
					$likeno1=$this->usermodel->where_data('lookbook_coment_like',$ftsds);
					?>
					 <div style="float:left">
					 <a  href="#" id="likecmt<?php echo $cm->cmtid; ?>" class="btn-like likecoment" rel="<?php echo $cm->cmtid; ?>" ref="<?php echo $id; ?>" <?php if(!count($likeno1)){ } else{?> style="display:none"<?php }?>> Like | <span><?php if ($likecnt1 >= 1000 && $likecnt1 < 1000000) {
    $cnlikecnt = number_format($likecnt1/1000,2).'K';
	echo $cnlikecnt;
    } else if ($likecnt1 >= 1000000 && $likecnt1 < 1000000000) {
    $cnlikecnt = number_format($likecnt1/1000000,2).'M';
	echo $cnlikecnt;
   } else if ($num >= 1000000000) {
   $cnlikecnt=number_format($likecnt1/1000000000,2).'B';
   echo $cnlikecnt;
   } else {
   $cnlikecnt = $likecnt1;
   echo $cnlikecnt;
    }
	?></span></a>
                      <a href="<?php /* echo base_url()?>blog/unlikepost/<?php echo $pt->postid."/".$user_id*/?>#" class=" btn-like" id="unlikecmt<?php echo $cm->cmtid ?>" style=" <?php if(!count($likeno1)){echo "display:none";} else{  } ?>">Liked | <span id="spancount<?php echo $cm->cmtid ?>"><?php if ($likecnt1 >= 1000 && $likecnt1 < 1000000) {
    $cnlikecnt = number_format($likecnt1/1000,2).'K';
	echo $cnlikecnt;
    } else if ($likecnt1 >= 1000000 && $likecnt1 < 1000000000) {
    $cnlikecnt = number_format($likecnt1/1000000,2).'M';
	echo $cnlikecnt;
   } else if ($num >= 1000000000) {
   $cnlikecnt=number_format($likecnt1/1000000000,2).'B';
   echo $cnlikecnt;
   } else {
   $cnlikecnt = $likecnt1;
   echo $cnlikecnt;
    }
	?></span></a>
                  <div>
                
                </div>
               
                            </li>
                     <?php
							  }}?>       </ul>
                    </div>
                    
                        
                    </div>
                </li>
                

                <?php }}?>
                       </ul>
   <div class="large-6" style="float:right"> <?php if($next){ foreach ($next as $nt){

						$a=str_replace(" ","-",$nt['description']);
						$a= preg_replace('/[^A-Za-z0-9\-]/', '', $a);
						$b=substr($a,0,50)
						
	  ?> 
 <a href="<?php echo base_url()."TopPhoto/".$b.'/'.$nt['id']?>" class="btn" style="text-decoration:none">Next <i class="fa  fa-angle-double-right fa-lg"></i></a><?php }}?>
</div>
 <div class="large-6" >
 <?php  if($previous){ foreach ($previous as $pr){ $c=str_replace(" ","-",$nt['description']);
 $c= preg_replace('/[^A-Za-z0-9\-]/', '', $c);
						$d=substr($c,0,50) ?><a href="<?php echo base_url()."TopPhoto/".$d.'/'.$pr['id'] ?>" class="btn" style="text-decoration:none"><i class="fa  fa-angle-double-left fa-lg"></i> Previous</a><?php }}?>&nbsp;
</div>
     
            </div>


        
        
        </div>
      
  <aside class="sidebar">
       
     <div class="top-products">
    <h4>Other Categories</h4>
    <ul> <?php 
				$result2=$this->blogmodel->browphotoimage();
				if($result2){ foreach($result2 as $rts2){
					
				$dip=str_replace(" ","-",$rts2['description']);
				$dip= preg_replace('/[^A-Za-z0-9\-]/', '', $dip);
						$ddip=substr($dip,0,50) 
					//print_r($photomrch);
				?>
                     <li style="height:90px">
            <a href="<?php echo base_url();?>TopPhoto/<?=$ddip?>/<?=$rts2['id']?>">
    <img class="product-img" src="<?php echo base_url();?>assets/images/merchant/browsphoto/<?php echo $rts2['photothum'];?>" style="width:50px;height: 75px;">
    <div class="caption" style="vertical-align:top; padding-top:5px">
        <div class="brand-name"><?php echo ucfirst ($rts2['categorypic'])?></div>
         <div class="product-name"><?php echo substr($rts2['description'],0,50); if (strlen($rts2['description'])>50)echo '...'; ?></div>
    </div>
</a>        </li>
         
            
            
            
            <?php }} ?>    
      
            </ul>
</div>    
    
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
	

	
</script> 

