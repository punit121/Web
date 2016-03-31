<div class="container popup_div_post">
        <div>
	       <a href="<?= base_url()?>"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px;" >
        <?php if(isset($post)){
			foreach($post as $pt){
				$i=01;
				$time=$pt['createdOn'];
				 $id= $pt['id'];
			 $ids=$pt['userid'];
			 $idu['id']=$pt['userid'];
			 	$usrnam=$this->usermodel->where_data('users',$idu);
						$uid=$this->session->userdata['user_id'];

		?>
        
	        <div class="col-lg-8 col-md-8 col-sm-8" style="border-right:solid 1px;" id='galry'>
			    <div class="col-lg-12 col-md-12 col-sm-12">
				    <h1 style="margin:0px; font-weight:bold; font-size:26px"><?= ucfirst($pt['head'])?></h1>
			    </div>
				<div class="col-lg-12 col-md-12 col-sm-12 post_div">
				    <ul id="gallery" class=" ">
						<li>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-1 col-md-1 col-sm-1" >
								
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11">
								<?php
								$pic=$pt['image'];
								
								 ?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" style="width:100%;"/>
                              
                             
  
                               
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-1 col-md-1 col-sm-1">
								<p style="font-size:3.5em; margin-top:20px"><?= $i?></p>
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11">
									<h4></h4>
                                    <?php
									if($ids==$uid)
									{ 
										?>
								<a href="<?= base_url()?>deletepost/<?= $pt['id']?>" style="text-decoration:none; color:#000; float:right;" onclick="return isDelete();"><i class="fa fa-trash"></i> &nbsp;</a>
										<a href="<?= base_url()?>postedit/<?= $pt['id']?>" style="text-decoration:none; color:#000; float:right"><i class="fa fa-pencil"></i>&nbsp;</a>
									<?php } ?>
									<p style="text-align: justify;padding-right: 25px;"><?= ucfirst( $pt['intro'])?></p>
								
                                    <?php $tag= explode(',',$pt['category']);
                                 		if(!empty($tag[0]))
                                 		{
                                 			?>
                                 			 <h5>See more of :
                                 			<?php
                                     foreach($tag as $tg){?>
                                    <a href="<?= base_url()?>category/<?=$pt['maincat']?>/<?=$tg?>" style="color:#000; text-decoration:underline"><?= $tg ?></a>
                                    <?php } }?>
                                    </h5>
								</div>
                                </div>
						</li>
                        <?php if($postdetail){
								//print_r($postdetail);
								foreach($postdetail as $ptd){
									//print_r($ptd['description']);
									$i=$i+01;
						?>
									<li>
                                 <div class="col-lg-12 col-md-12 col-sm-12">
									<div class="col-lg-1 col-md-1 col-sm-1" >
								<!--	 <i class="fa fa-facebook-official fa-2x post_fb_icon"></i>
									<i class="fa fa-twitter fa-2x post_twitter_icon"></i>
									<i class="fa fa-google-plus-square fa-2x post_gmail_icon"></i>
									<i class="fa fa-facebook-official fa-2x post_fi_icon"></i>
									-->
									</div>
                                <?php
								$pic=$ptd['photo'];
								?>
                                 <div class="col-lg-11 col-md-11 col-sm-11">
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $ptd['photo']?>"style="width:100%;" />
                              </div>
                                <div class="col-lg-11 col-md-11 col-sm-11">
                                 </div>
								 
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-1 col-md-1 col-sm-1">
								<p style="font-size:3.5em; margin-top:20px"><?= $i?></p>
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11">
									<h4></h4>
                                    <?php
									if($ids==$uid)
									{ 
										echo $ids;
										echo $uds;	//print_r($ptd['description']);
										?>
					
		<a href="<?= base_url()?>deletepost/<?= $pt['id']?>" style="text-decoration:none; color:#000; float:right;" onclick="return isDelete();"><i class="fa fa-trash"></i> &nbsp;</a>
										<a href="<?= base_url()?>postedit2/<?= $ptd['id']?>" style="text-decoration:none; color:#000; float:right"><i class="fa fa-pencil"></i>&nbsp;</a>
									<?php } ?>
									<p style="text-align: justify;padding-right: 25px;"><?= ucfirst($ptd['description'])?></p>
						
					                <?php $tag= explode(',',$pt['category']); 
            		                   if(!empty($tag[0]))
                                 		{
                                 			?>
                                 			 <h5>See more of :
                                 		<?php	
            		                   foreach($tag as $tg){ ?>
									
                                    <a href="<?= base_url()?>category/<?= $pt['maincat']?>/<?=$tg ?>" style="color:#000; text-decoration:underline"><?= $tg ?></a>,
                                    <?php } } ?>
                                    </h5>
								</div>
                            </div>
                                </li>
								<?php }}?>	
                                    
                                    </ul>
								  
								  <a class="prev" id="pgprv"><i class="fa fa-angle-left fa-4x" style="margin-left: -25px;"></i></a>
                                 
                               <a class="prevpt" id="pstprv" style="display:none"><i class="fa fa-angle-left fa-4x" style="margin-left: -25px;"></i></a>
								  
                                  <a class="next" id='pgnext'><i class="fa fa-angle-right fa-4x" style="margin-right: -15px;"></i></a>
                                 
                            <a class="nextpt" id="pstnext" href="<?= $nextlink?>" style="display:none"><i class="fa fa-angle-right fa-4x"></i></a>
								   
								  <div class="pagination"> </div> 
							      <!-- end of #container -->
						    </div>
		     </div>
                 <?php 
				
					$uid=$ids;
					
					$photox=$this->usermodel->where_data('customer',array('userId'=>$uid));
					
					$pic=$photox[0]->photo;
				?>
			<div class="col-sm-4" id="comentdiv">
						<div class="col-sm-2" style="margin-left: -15px;">
							<a href="<?= base_url()?>userprofile/<?php echo $usrnam[0]->username;?>"><img class="post_comment_user_img" src="<?php  if(isset($photox[0]->photo)){if(file_exists("./assets/images/merchant/$pic")){ echo base_url().'assets/images/merchant/'.$pic;?><?php } else{?>http://zersey.com/assets/images/merchant/<?php echo $photox[0]->photo;} 
							}else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>">
						</a></div>
						<div class="col-sm-10">
							<a href="<?= base_url()?>userprofile/<?php echo $usrnam[0]->username;?>" style="color:#000;"><p class="post_cooment_user_name"style="width:120px;">  <?php if($uid!=0) {echo $photox[0]->fullname;} else echo 'Admin';?></p></a>
							<time><?php // $to_time = strtotime($cm->datetm);
			
		
            $to_time = strtotime(str_replace('/', '-', $time));
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
                
                $a= explode(" ", $time);
                echo $a[0];
                }
            }
            else{	echo $minx." Hr";}
                }
            else{ echo $min." Min.";}
			
            ?></time>
						</div>
				
                                    
                                    
                                    
                          
                     <div class="post-detail-bottom">
                            <div class="pull-lt" style="display:inline-block">
  <?php 
					$fts['fbblogid']=$id;
					$ftsd['fbblogid']=$id;
					$ftsd['userid']=$user_id;
					$cid['postid']=$id;
					$cmtntcnt=$this->usermodel->countlikecomment('post_coment',$cid);
					$likecnt=$this->usermodel->countlikecomment('fbblog_like',$fts);
					$likeno=$this->usermodel->where_data('fbblog_like',$ftsd);
					
					?> 
							 <a href="#" class="askpost" rel="<?php echo  $id ?>" id="askchng<?php echo  $id ?>" style=" <?php if(!count($likeno)){} else{ echo "display:none"; } ?>"><abbr style="color:#000">Like - </abbr> <span class="contask" style="color:#000;"><?php 
					
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
                   <a href="<?php /* echo base_url()?>blog/unlikepost/<?php echo $pt->postid."/".$user_id*/?>#" class="" id="askeds<?php echo $id ?>" style=" <?php if(!count($likeno)){echo "display:none";} else{  } ?>">Liked | <span><?php if ($likecnt >= 1000 && $likecnt < 1000000) {
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
                          <div class="pull-lt" style="display:inline-block">
                       
                        <a class="icon-btn post-link" style="color:#000">
                           | Comment -
                        </a>
                        <span style="color:#000"><?php echo $cmtntcnt;?></span>
                    </div>
                  <!-- <div class="pull-lt" style="display:inline-block">
                   <a href="#" class="icon-btn post-link" style="color:#000">| Follow</a>
                   </div> -->
                   <!--<div class="pull-lt" style="display:inline-block">
                   <a href="#" class="icon-btn post-link" style="color:#000">| Add Friend</a>
                   </div> -->
                				 		<form method="post" action="">

						<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;background:rgba(221, 221, 221, 0.4);margin-bottom:10px;">
						                
                     
							<div style="padding:5px;">
							
					</div>
								<div style="width:5%;display:inline-block">
								
							</div>
								<div style="width:93%;display:inline-block">
								<img src="<?php if($this->usermodel->getLoginimage($this->session->userdata['user_id'])){ echo base_url();?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($this->session->userdata['user_id']));} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>"style="width:15%;" >	
									<input type="text"  style="width:80%;height:40px" name="comment" placeholder="Write your comment">
									<input type="submit" value="Comment" name="postcomment" style="height:30px;width:120px;background-color:grey;color:#fff;margin-top: 10px; margin-bottom: 10px;"></input>
								</div>
							</div>
							<div style="padding:5px;">
								
								<div style="width:93%;display:inline-block;vertical-align: bottom;">
									
									<div> 
									    <div style="display:inline-block;">

 <?php 
				
				if(isset($com))
					{
					 foreach($com as $cm){
					 	?>
									    	      
									    	       
				
									        <div>
													<?php	 			 $idu['id']=$cm['userid'];
	$usrnam=$this->usermodel->where_data('users',$idu);?>

<a href="<?= base_url()?>userprofile/<?php echo $usrnam[0]->username;?> "><img src="<?php if($this->usermodel->getLoginimage($cm['userid'])){ echo base_url();?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($cm['userid']));} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>"style="width:10%" ></a>
					<a href="<?= base_url()?>userprofile/<?php echo $usrnam[0]->username;?> " style="color:#000;margin-left:10px;"><b><?php echo $this->usermodel->getName($cm['userid']); ?></b>	</a>							        
					<p style="padding-top:5px;"><?= $cm['comment']?></p>
									        </div>
									          <?php }}?>
									    </div>
									    
									</div>
								</div>
							</div>
						</div>
					</form>      
                       
	 </div>
	 <?php }}?>
	 
	 
	 <style>

   textarea { margin: 1em; outline: none; text-align: justify; }
</style>
	 <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="<?= base_url()?>assert/js/jquery.pagination-with-hash-change-2.js"></script>
  <script>
    $(document).ready(function() {
      $('#gallery').Paginationwithhashchange2({
        nextSelector: '.next',
        prevSelector: '.prev', 
        counterSelector: '.counter',
        pagingSelector: '.pagination',
        itemsPerPage: 1,
        initialPage: 1
      });
    });
  </script>
  
  <script>
$(function() {
    //  changes mouse cursor when highlighting loawer right of box
    $("textarea").mousemove(function(e) {
        var myPos = $(this).offset();
        myPos.bottom = $(this).offset().top + $(this).outerHeight();
        myPos.right = $(this).offset().left + $(this).outerWidth();
        
        if (myPos.bottom > e.pageY && e.pageY > myPos.bottom - 16 && myPos.right > e.pageX && e.pageX > myPos.right - 16) {
            $(this).css({ cursor: "nw-resize" });
        }
        else {
            $(this).css({ cursor: "" });
        }
    })
    //  the following simple make the textbox "Auto-Expand" as it is typed in
    .keyup(function(e) {
        //  this if statement checks to see if backspace or delete was pressed, if so, it resets the height of the box so it can be resized properly
        if (e.which == 8 || e.which == 46) {
            $(this).height(parseFloat($(this).css("min-height")) != 0 ? parseFloat($(this).css("min-height")) : parseFloat($(this).css("font-size")));
        }
        //  the following will help the text expand as typing takes place
        while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
            $(this).height($(this).height()+1);
        };
    });
});
</script>
  
  <script>
$(document).ready(function(){
    $(".like_div").click(function(){
        $(".text_div").toggle();
    });
});
</script>
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript">
 function isDelete()
 {
 if(confirm("Do you want to delete this post?"))
 {
 return true;
 }
 else
 return false;
 }
 </script>
</body>
</html>