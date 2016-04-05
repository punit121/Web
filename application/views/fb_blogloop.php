<?php 
			//print_r($post);
			if($post){ foreach ($post as $pts){
			//print_r($pt);
			 $id= $pts['id'];
                          $ids=$pts['userid'];

		$a=$this->blogmodel->get_data($id);
			
			//print_r($a);
			?>
            	  <li class="post">
                	<div class="user-block">
                        <div class="user-image">
                        <?php 
						$userdt="";
						$photox='';
						if($ids!='0'){ $photo=$this->usermodel->fetchuserimage($id); 
                        $uids['id']=$ids;
                        $userdt=$this->usermodel->where_data('users',$uids);
						 $photox=$this->usermodel->where_data('customer',array('userId'=>$ids));
						}
				if($ids!=0){
                        ?>
                           
                                             <a href="<?=base_url();?>userprofile/<?=$ids?>"><?php }?>
                               <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:70px; width:70px"/>
                                
                            </a>
                        </div>
                        <div class="user-info">
                            <div class="name"><?php if($ids!=0){if($photo[0]->business=='P'){?>
                                             <a href="<?=base_url();?>merchant/Salon/<?=$id?>"><?php } else {?>
                                             <a href="<?=base_url();?>userprofile/<?=$id?>"><?php }}?>
                                             <?php if($ids!=0) {echo $userdt[0]->fullName;} else echo 'Admin';?>
                           </a> </div><time>
            <?php // $to_time = strtotime($cm->datetm);
			
			if($pts['createdOn']!='0000-00-00 00:00:00'){
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
			}
            ?></time>
                            
                            
                        </div>
                    </div>
                 		<div class="user-block">
                        <div class="user-image">
                        <?php 
						$userdt="";
						$photox='';
						if($ids!='0'){ $photo=$this->usermodel->fetchuserimage($id); 
                        $uids['id']=$ids;
                        $userdt=$this->usermodel->where_data('users',$uids);
						 $photox=$this->usermodel->where_data('customer',array('userId'=>$ids));
						}
						
                        
                        ?>
                            <?php
                            
                             
                                             ?>
                                             <a href="<?=base_url();?>userprofile/<?=$ids?>">
                               <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="height:70px; width:70px"/>
                                
                            </a>
                        </div>
                        <div class="user-info">
                            <div class="name"><?php if($ids!=0){if($photo[0]->business=='P'){?>
                                             <a href="<?=base_url();?>merchant/Salon/<?=$id?>"><?php } else {?>
                                             <a href="<?=base_url();?>userprofile/<?=$id?>"><?php }}?>
                                             <?php if($ids!=0) {echo $userdt[0]->fullName;} else echo 'Admin';?>
                           </a> </div><time>
            <?php // $to_time = strtotime($cm->datetm);
			
			if($pts['createdOn']!='0000-00-00 00:00:00'){
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
			}
            ?></time>
                            
                            
                        </div>
                    </div>
                 		
                 			
                    <div class="post-detail">
                 <div class="post-status clearfix">
                     <div class="post-detail-content col-lg-12" style="cursor: pointer;" onclick="window.location='<?= base_url();?>ZerseyandMe/<?= $id?>';">
					<div style="padding:0px;margin-bottom:10px; border-bottom: 1px solid #e9e9e9 !important; border-top:0px; margin-top:-10px">
        <h2 class="headerTxt" style="font-size:25px !important;"><?=$pts['head'];?></h2>
        </div> 
					 
			<div class="col-lg-12">	<div class="col-lg-6">



<img src="<?php echo base_url();?>assets/zerseynme/<?php echo $pts['image']; ?>" style="width:100%;height:auto" /></br>
</div>
<div class="col-lg-6"><p  id="p<?=  $pts['id'];?>"><?php if(strlen($pts['intro'])>400){echo substr($pts['intro'],0,400)."...<a href='#' ref='p".$pts['id']."' class='readmr'>Read More.</a>";}else{echo $pts['intro'];} ?></p><p id="pp<?= $pts['id'];?>" style="display:none;"><?php echo $pts['intro'];?></p>	

  </div></div>
						<?php /*?><img src="<?php echo base_url();?>assets/images/post/<?php echo $pt->imgname; 
					?>"   style="width:100%"/>
						<?PHP }?><b><p  id="p<?= $pt->postid;?>"><?php if(strlen($pt->post)>200){echo substr($pt->post,0,200)."...<a href='#' ref='p".$pt->postid."' class='readmr'>Read More.</a>";}else{echo $pt->post;} ?></p><p id="pp<?= $pt->postid;?>" style="display:none; font-size:20px"><?php echo $pt->post;?></p></b>
						   <?php */ ?>                                          
						</div></a>
                        <div class="post-detail-bottom">
                            <div class="pull-left">
  <?php 
					$fts['fbblogid']=$id;
					$ftsd['fbblogid']=$id;
					$ftsd['userid']=$user_id;
					$cmtntcnt=$this->usermodel->countlikecomment('fbblog_comment',$fts);
					$likecnt=$this->usermodel->countlikecomment('fbblog_like',$fts);
					$likeno=$this->usermodel->where_data('fbblog_like',$ftsd);
					
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
                       <?php /*   <a class="icon-btn">
                            <i class="fa fa-heart fa-lg"></i>
                        </a>
                        <span><?php echo $likecnt;?></span>*/?>
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
						$cmts=$this->usermodel->where_data('fbblog_comment', array('fbblogid'=>$id));
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
					$likecnt1=$this->usermodel->countlikecomment('fbblog_coment_like',$ftss);
					$likeno1=$this->usermodel->where_data('fbblog_coment_like',$ftsds);
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
					 $m++;
					 if($m>1 && $m < count($cmts)){ 
					 ?>
					<center> <a href="<?= base_url();?>ZerseyandMe/<?= $id?>" id="rdalans<?= $id?>" style="padding:5px">Read All Comment</a>
					 </center><?php
					 break;}
					 else if($m>1) {break;}
					  }}?>       </ul>
                    </div>
                    
                        
                    </div>
                </li>
                             <?php }}
                if(!$word){ ?>
               <a href="<?php
			   
			   echo base_url().'blog/fbblogloop/'.$pagesno.'/'.$cat; ?>" hidden=""></a><?php } else{?>
               <a href="<?php
			   
			    echo base_url().'blog/fbblogloopsearch/'.$pagesno.'/'.$word;?>" hidden=""></a>
<?php }?>  
