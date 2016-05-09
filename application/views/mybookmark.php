<style>
.bottom_stip_div_about
{
	cursor: pointer;
}
</style>

<?php
if(!isset($end))
{
if(!isset($post1))
{
	//print_r($post);
?>
<script>
  //$(".imgholder").lazyload();
  /*$(".imgholder").lazyload({
    threshold : 200
});*/
var last_post_id = 0;
var feeds_ended = false;

$(document).ready(function(){

	last_post_id = <?php $x = end($post); echo($x ? $x['publish_id'] : 0 );?>;

var loadingposts = false;
$(this).scrollTop(0);
			$(window).scroll(function() {

	    if($(window).scrollTop() == $(document).height() - $(window).height()) {
    	//alert("hello");
					
  			//alert(24 * i);
  				if(feeds_ended){return false;}
  			    if(loadingposts==true)return;	
				loadingposts = true;
  		
               $("#container_wrap").append('<img src="<?= base_url()?>assert/images/loading_spinner.gif" id="loading">');

             		$.ajax({
                type: "GET",
                data: "data="+ last_post_id,
                url:  "<?= base_url()?>users/bookmarkloop/<?php echo $user ?>",
                success: function(msg){
   				//alert(msg);
   				if(msg==null||msg.trim()==""){feeds_ended = true;}         
   				$("#loading").remove();

               $("#container_wrap").append(msg);
               loadingposts = false;
               //$(".grid").hide();
                },
                error: function(jqXHR, textStatus, errorThrown){
                	loadingposts = false;
                } 
                
            });
           // ajax call get data from server and append to the div
    }
});
		
		});
  /*$(window).scroll(function(){
    $('img[realsrc]').each(function(i){
      var t = $(this);
      if(t.position().top > ($(window).scrollTop()+$(window).height()){
        t.attr('src', t.attr('realsrc')); // trigger the image load
        t.removeAttr('realsrc'); // so we only process this image once
      }
    });
  });

});*/


</script>
<?php
}

?>

<?php if(!isset($post)){ ?>
<script>last_post_id = <?php $x = end($post1); echo($x ?  $x['publish_id'] : 0) ?>;</script>
<?php }?>








<script>
	function overview()
	{		
		$(".first_div").show();
		$(".socialprofile").hide();
		$(".setting").hide();
		$(".profile").hide();
		$(".interest").hide();
		return false;
	}
	function social()
	{	
		$(".first_div").hide();
		$(".socialprofile").show();
		$(".setting").hide();
		$(".profile").hide();
		$(".interest").hide();
		return false;
	}
	function setting()
	{	
		$(".first_div").hide();
		$(".socialprofile").hide();
		$(".setting").show();
		$(".profile").hide();
		$(".interest").hide();
		return false;	
	}
	function account()
	{
		$(".first_div").hide();
		$(".socialprofile").hide();
		$(".setting").hide();
		$(".profile").show();
		$(".interest").hide();
		return false;	
	}
	function intrest()
	{		
		$(".first_div").hide();
		$(".socialprofile").hide();
		$(".setting").hide();
		$(".profile").hide();
		$(".interest").show();
		return false;	
	}
</script>
<script>
$(document).ready(function()
{

	$("#private").click(function(e)
	{
		//alert("Hello");
		$("#container_wrap").css("display","none");
		$("#group_board").hide();		
		$("#private_board").css("display","inline-block");
		$(".grid").css("display","inline-block");
		$(".grid").css("width","350px");
		$(".card-tag").css("width","30%");
	});

	$("#group").click(function(e)
	{
		//alert("Hello");
		$("#container_wrap").css("display","none");
		$("#private_board").hide();
		$("#group_board").show();
		$(".grid").css("display","inline-block");
		$(".grid").css("width","350px");
		$(".card-tag").css("width","30%");
		
	});
	$("#bookmark").click(function(e)
	{
		//alert("Hello");
		$("#group_board").hide();		
		$("#private_board").hide();
		$("#container_wrap").show();
		$(".card-tag").css("width","100%");
		
		
	});

});
</script>
<?php  $user=$this->usermodel->where_data('customer',array('userId'=>$user_id->id));
$user_id=$user[0]->userId;
$us_id=$this->session->userdata('user_id');
if($user_id==$us_id)
{
	$cust=$this->usermodel->findCustomerById($user_id);
	echo $cust['0']['location'];
}
					$unm=$this->datamodel->getusernamebyid($user[0]->userId);
				//print_r($unm->username);
if(isset($post))
{
 ?>
	   <div class="row" >
			<!-----middle part-------->
			<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;background:url(<?php 
			if($user[0]->covimg){
			?> ' <?= base_url()?>assets/images/merchant/<?= $user[0]->covimg?>'
            <?php } else{?>
            '<?= base_url()?>assets/images/merchant/d_Cover.jpg'
            <?php }?>
            ); margin-top:-8px; background-size:cover" >			
			 <!---- model popup for image -->
							
			   <div style="width:100%;height:450px;">
                 
					<div style="display:inline-block;width:60%;">
					<div  style="z-index:50;margin-top:100px;margin-left:50px;">
						 <img src="<?php if(isset($user[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $user[0]->photo;} 
					    else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" class="facebook_div" data-toggle="modal" data-target="#myuserprofile">
					
					    
					    <h3 class="facebook_user_name"><?php echo $user[0]->fullname;?></h3>
					 
				    </div>
						 <?php
						//$id=$this->session->userdata('user_id');
						//$catnm=$this->uri->segment(2);
						//						  $uid=$user_id->id;

						
						//echo $id."<br>";
						//echo $user_id."<br>";
						//echo $user_id;
						  //$uid=$user_id->id;
						  if($user_id==$us_id)
						  { ?>
						    <button class="btn btn-default"style="display:inline-block;margin-top:5px;margin-left:80px;"  data-toggle="modal" data-target="#myModal"><i class="fa fa-camera-retro"></i> Edit Image</button>
					
                    
                     <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				<form action="<?= base_url();?>users/uploaduserimg" method="post" enctype="multipart/form-data">
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title" style="color:#000">Upload Your Profile & Covor Photo</h4>
					</div>
					<div class="modal-body">
					<label style="color:#000">Profile pic</label>
               <input type="file" name="prophoto" id="prophoto" style="color:#000" value="Upload Photo" /></i>Upload your pic</br>
                <label style="color:#000">cover pic</label>
                <input type="file" name="covphoto" id="covphoto" value="Upload Photo" style="color:#000" /></i>Upload cover pic<br>
			<input type="hidden" name="catidm" id="catidm" value="<?= $id?>" />
            <input type="hidden" name="catman" id="catman" value="<?= $catnm?>" />
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-sucess" value="Submit"/>
					</div>
				  </div>
				  </form>
				</div>
         </div>
         		 <?php

						  }
						  else
						  {
							  
						  }
						  ?>

					</div>
					
					<div class="side_post_div">
					
						<div  class="side_inner_pst_div">
												 <?php

							$id=$this->session->userdata('user_id');

						  $uid=$user[0]->userId;
						  if($id==$uid)
						  { }
						  else
						  {
						  
						  ?>
							
							<div style="text-align:right;margin-top:5px;">
								<div class="btn-group">
									<button type="button" class="btn btn-default"><i class="fa fa-check"></i>Following</button>
									
								</div>
							</div>
						<?php	}?>
							
						</div>
					</div>
				</div>
				<div data-toggle="modal" data-target="#mycoverprofile">
		
			</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12" style="background:#FFFFFF;border:solid 1px;">
				<div class="col-lg-4 col-md-4 col-sm-4" style="width:20%;">
					 <?php

							$id=$this->session->userdata('user_id');

						  $uid=$user_id->id;
						  if($id==$uid)
						  { ?>
				<center><h3 class="bottom_stip_div_about" data-toggle="modal" data-target="#myModal1" style="cursor:pointer; padding-top: 15px">About </h3></center>
					<p style="color:#777;margin: 0 0 0px;"><?php echo substr($user[0]->yourself, 0, 50); ?></p>
			 <?php

						  }
						  else
						  {
						  
						  ?>
					<center><h3 class="bottom_stip_div_about" data-toggle="modal" data-target="#myModal2">About </h3></center>
					<p style="color:#777;margin: 0 0 0px;"><?php echo substr($user[0]->yourself, 0, 50); ?></p>
					 <?php

						  }
						  
						  ?>
			    </div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" style="border-left: solid 1px;width:20%;">
					<div class="bottom_stip_post" id="bookmark"><h4 class="bottom_stip_post_following" style="padding-top: 5px;">Bookmarks </br>
					<?php 
							/*$post=$this->db->query("SELECT * FROM fbblogmain WHERE userid='1909' ");
							$result=$post->num_rows();
							echo $result;*/
					$likecnt= ($this->usermodel->countlikecomment('bookmark',array('userid'=>$user['0']->userId)));
					//print_r($user['0']->userId);
					//echo $cntpost1;
										
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
					   echo $bookmark;
						}
										?>
					</h4>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 onhover_div"  style="border-left: solid 1px;width:20%;">
			<div class="bottom_stip_post" id="private"><h4 class="bottom_stip_post_following" style="padding-top: 5px;">Private Board </br> <?= $cntfollowing?></h4></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;width:20%;">	<!--<a href="<?= base_url();?>friends/<?= $unm->username?>"> </a>--><div class="bottom_stip_post"><h4 class="bottom_stip_post_following" id="group" style="padding-top: 5px;">Group Board</br> <?= $cntpost1?></h4></div>
				</div>
			    <div class="col-lg-2 col-md-2 col-sm-2 onhover_div" style="border-left: solid 1px;">
					<div style="height:65px;padding-top: 20px;">
						<!--<a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:#777; font-size:20px">
						+ More
						<span class="caret"></span></a>
						<ul class="dropdown-menu" style="background-color: rgba(10, 10, 10, 0.71);">
						  <li><a href="#" class="dropdown_nev">View Profile</a></li>
						  <li><a href="#" class="dropdown_nev">Edit Profile</a></li>
						  <li><a href="#" class="dropdown_nev">Settings</a></li>
						  <li><a href="#" class="dropdown_nev">Login</a></li>
						</ul> -->
					</div>
				
				</div>
			</div>
		</div>
		<?php
	}
	?>
		<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:5px;" id="dashboard_image_div">
			<?php if(!isset($end))
			{

			?>

			<div class="col-lg-10 col-md-10 col-sm-10" id="container_wrap" >
		
					<?php if(isset($post))
					{
							
						?>
					
            <div id="container">
				<?php if(isset($post)){
							foreach($post as $pt){
								$postid=$pt['postid'];
								//echo $postid;
								$ids=$this->usermodel->where_data('fbblogmain',array('id'=>$pt['postid']));
								//echo $ids[0]->head;
								
							?>
						<div class="grid" style="height: 350px;">
                        <?php 
						$hed=str_replace(" ","-",$ids[0]->head);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						if($ids[0]->editorial==1)
						{
						?>
						<a href="<?= base_url()?>postvieweditorial/<?= $pt['postid']?>" style="text-decoration:none">

							<div class="imgholder">
								<?php
								$pic=$ids[0]->image;
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $ids[0]->image ?>" width="200px" height="200px" />
                              
                                <?php } else {?>
                                   <img src="http://m.zersey.com/assets/zerseynme/<?= $ids[0]->image ?>" width="200px" height="200px" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $ids[0]->maincat?></p>
							</div>
                        
<?php
}
else if($ids[0]->editorial==0)
{
?>
                        <a href="<?= base_url()?>postview/<?= $fhed?>/<?= $pt['postid']?>" style="text-decoration:none">

							<div class="imgholder">
								<?php
								$pic=$ids[0]->image;
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $ids[0]->image ?>" width="200px" height="200px" />
                              
                                <?php } else {?>
                                   <img src="http://m.zersey.com/assets/zerseynme/<?= $ids[0]->image ?>" width="200px" height="200px" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $ids[0]->maincat?></p>
							</div>
                        <?php }
                        else if($ids[0]->editorial==2)
                        {
                        	?>

                        <a href="<?= base_url()?>postviewvideo/<?= $fhed?>/<?= $pt['postid']?>" style="text-decoration:none">
                        <div class="imgholder">

                              <p class="card-tag"><?= $pt['maincat']?></p> 
                                <?php
                                $pic=$ids[0]->image;
                                $url=explode(".",$pic);
                                //print_r($url[1]);
                                if($url[1]=="youtube")
                                {
                                $video1=str_replace("watch/?v=","embed/", $pic,$count1);
                                 $video2=str_replace("watch?v=","embed/", $pic);
                                 if($count1 > 0)
                                 {
                               ?>

                               <iframe src="<?php echo $video1; ?>" width="350px" height="200px" frameborder="0" allowfullscreen>
                               </iframe> 
                               <?php
                           }
                           else
                           {
                            ?>
                            <iframe src="<?php echo $video2; ?>" width="350px" height="200px" frameborder="0" allowfullscreen>
                               </iframe> 
                               
                            <?php
                           }
                       }
                       else 
                       {
                            $video1=$pic."/embed/simple";
                            ?>
                            <iframe src="<?php echo $video1; ?>" width="350px" height="200px" frameborder="0" allowfullscreen>
                               </iframe>
                            <?php
                       }
                               ?>
                              </div>
                        	<?php
                        }
                        ?>
							<div class="content">
								<div class="like-comment-date">
						
									<ul class="meta">
									<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="617"><i class="icon-comment"></i>0 </a></li>
									<li class="like"><a href="http://zersey.com/blog/likelukbok/luklikemrchant/617/">
									<i class="icon-heart" id="hrts"></i>0</a>
									</li>
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $ids[0]->createdOn));
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
	
	$a= explode(" ", $ids[0]->createdOn);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></li>
									</ul>
									<h5 style="text-align:justify"><?= $ids[0]->head?></h5>
								</div>
							</div>
                           <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$ids[0]->userid));
							if($ids[0]->userid!=0)
								$unm=$this->datamodel->getusernamebyid($ids[0]->userid);
							//print_r($unm->username);
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($pt['userid']!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>
                        <?php }}?>
			</div>
			<?php
		}
		?>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-10" id="private_board" style="display: none;">
		
				<?php 
					 $resultuserl = $this->usermodel->where_data('user_board', array('userid' => $user['0']->userId,'private' => 1));
?>
            <div id="container">
				<?php if(isset($resultuserl)){
							foreach($resultuserl as $rtusl){
								//$postid=$pt['postid'];
								//echo $postid;
								//$ids=$this->usermodel->where_data('fbblogmain',array('id'=>$pt['postid']));
								//echo $ids[0]->head
								$blid = $rtsul->bid;
                        $usid = $this->session->userdata['user_id'];
                        $pro2 = $this->datamodel->selectboardfollow($blid, $usid);


                        //$foloid = $pro2[0]['fbid'];								
							?>
						<div class="grid" style="height: 350px;">
                       
						<a href="<?= base_url()?>board/<?= $rtusl->bordname?>" style="text-decoration:none">

							<div class="imgholder">
								<?php
								$pic=$rtusl->image;
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assert/catimg/<?= $rtusl->image ?>" width="200px" height="200px" />
                              
                                <?php } else {?>
                                   <img src="http://m.zersey.com/assert/catimg/<?= $rtusl->image ?>" width="200px" height="200px" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $rtusl->category?></p>
							</div>
                        

							<div class="content">
								<div class="like-comment-date">
						
									<ul class="meta">
									<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="617"><i class="icon-comment"></i>0 </a></li>
									<li class="like"><a href="http://zersey.com/blog/likelukbok/luklikemrchant/617/">
									<i class="icon-heart" id="hrts"></i></a>
									</li>
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $rtusl->createdate));
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
	
	$a= explode(" ", $rtusl->createdate);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></li>
									</ul>
									<h5 style="text-align:justify"><?= $rtusl->bordname?></h5>
								</div>
							</div>
                           <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$rtusl->userid));
							if($rtusl->userid!=0)
								$unm=$this->datamodel->getusernamebyid($rtusl->userid);
							//print_r($unm->username);
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($rtusl->userid!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>
                        <?php }}?>
			</div>
		
			</div>

			<div class="col-lg-10 col-md-10 col-sm-10" id="group_board" style="display: none;">
		
				<?php 
				// $us_id = $this->session->userdata('user_id');
				$name=str_replace("%20", " ", $this->uri->segment(2));
				
				$users=$this->usermodel->where_data('users',array('username'=>$name));


                $resultuser = $this->usermodel->where_data('board_invites', array('email' => $users[0]->email,'status' => 1));
                //print_r($resultuser)."<br>";
                //echo count($resultuser);

?>

            <div id="container">

				<?php
				for($i=0;$i<count($resultuser);$i++)
                {
                $boardid=$resultuser[$i]->boardid;
                $resultuserl = $this->usermodel->where_data('user_board', array('bid'=>$boardid));     
                
				 if(isset($resultuserl)){
							foreach($resultuserl as $rtusl){
								//$postid=$pt['postid'];
								//echo $postid;
								//$ids=$this->usermodel->where_data('fbblogmain',array('id'=>$pt['postid']));
								//echo $ids[0]->head
								$blid = $rtsul->bid;
                        $usid = $this->session->userdata['user_id'];
                        $pro2 = $this->datamodel->selectboardfollow($blid, $usid);


                        //$foloid = $pro2[0]['fbid'];								
							?>
						<div class="grid" style="height: 350px;">
                       
						<a href="<?= base_url()?>board/<?= $rtusl->bordname?>" style="text-decoration:none">

							<div class="imgholder">
								<?php
								$pic=$rtusl->image;
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assert/catimg/<?= $rtusl->image ?>" width="200px" height="200px" />
                              
                                <?php } else {?>
                                   <img src="http://m.zersey.com/assert/catimg/<?= $rtusl->image ?>" width="200px" height="200px" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $rtusl->category?></p>
							</div>
                        

							<div class="content">
								<div class="like-comment-date">
						
									<ul class="meta">
									<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="617"><i class="icon-comment"></i>0 </a></li>
									<li class="like"><a href="http://zersey.com/blog/likelukbok/luklikemrchant/617/">
									<i class="icon-heart" id="hrts"></i></a>
									</li>
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $rtusl->createdate));
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
	
	$a= explode(" ", $rtusl->createdate);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></li>
									</ul>
									<h5 style="text-align:justify"><?= $rtusl->bordname?></h5>
								</div>
							</div>
                           <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$rtusl->userid));
							if($rtusl->userid!=0)
								$unm=$this->datamodel->getusernamebyid($rtusl->userid);
							//print_r($unm->username);
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($rtusl->userid!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>
                        <?php }} }?>
			</div>
		
			</div>
			<?php
		}
		?>
				<?php if(isset($post))
			{
				?>
			
            <div class="col-lg-2 col-md-2 col-sm-2">
				<div class="col-lg-12 col-md-12 col-sm-12 follow_div" id="board_show" style="margin-top:15px; padding:0px;">

                     <div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title" style="display:inline-block">Public Board</h3>
					
						</div>

							
				 <?php
                $resultuserl = $this->usermodel->where_data('user_board', array('userid' => $user['0']->userId,'private' => 0));
               //                 echo $user['0']->userId;
                //print_r($resultuser1);
                //$resultuser1=rsort($resultuser1);
                //print_r($resultuser1);
               //echo count($resultuser1);
                $i=0;
                if ($resultuserl) {
                    foreach ($resultuserl as $rtsul) {
                        $i++;
                        if($i==6)
                        {
                         ?>
                         <div class="col-sm-12 text-left"><a href="<?=base_url()?>allboard/<?=$user['0']->userId?>" style="color: #000;">More...</a></div>

                         <?php 
                         break;  
                        }
                        $blid = $rtsul->bid;
                        $usid = $this->session->userdata['user_id'];
                        $pro2 = $this->datamodel->selectboardfollow($blid, $usid);


                        $foloid = $pro2[0]['fbid'];
                        ?>

                        <form method="post" action="<?= base_url() ?>users/boardfollow">
                            <input type="hidden" id="bid" name="bid" value="<?= $rtsul->bid ?>"/>


                            <div class="col-md-12" style="padding:5px; margin-top:10px">
                                <div class="col-sm-3" style="padding:0px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <img src="
                                        <?php
                                        if ($rtsul->image) {
                                            ?><?= base_url() ?>assert/catimg/<?= $rtsul->image ?>
                                             <?php } else { ?>
                                                 <?= base_url() ?>assert/catimg/d_Icon.png
                                             <?php } ?>
                                             " class="follow" style="width:100%;">
                                    </a>
                                </div>
                                <div class="col-sm-9" style="margin-top: -8px;">
                                    <a href="<?= base_url() ?>board/<?= $rtsul->bordname ?>">
                                        <div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px;color: #000;"><?= ucfirst($rtsul->bordname) ?></div></a>
                                    <?php
                                    if ($user_id != $us_id) {
                                    if ($pro2 == "0") {
                                        ?>


                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center">
                                            <button type="submit" class="btn btn-follow">Follow</button></div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?= base_url() ?>users/deletebfollow/<?= $pro2[0]['fbid'] ?>"  class="btn btn-follow">Followed</a></div>
                                    <?php } }?>
                                </div>
                            </div>
                        </form>

                        <?php

                    }
                }
                ?>
				</div>
					<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px">
							
					<div class="panel-heading" style="background: #555;color: #fff;">
					    <h3 class="panel-title">Follow User </h3>
					</div>
            <?php 
							$usid=$this->session->userdata['user_id'];

				$resultuser=$this->datamodel->topuser();
				$i=0;
				if($resultuser){ foreach($resultuser as $rtsu){
					$i++;
					$uid=$rtsu['userid'];
					$pro1=$this->datamodel->selectuserfollow($uid, $usid);
					$follid=$pro1[0]['fuid'];
					$photox=$this->usermodel->where_data('customer',array('userId'=>$uid));
					 if($i==6)
                        {
                         ?>
                         <div class="col-sm-12 text-left"><a href="<?=base_url()?>allusers">More...</a></div>

                         <?php 
                         break;  
                        }
				//if($pt['userid']!=0)
					$unm=$this->datamodel->getusernamebyid($uid);
							 ?>
					<div class="col-md-12" style="padding:5px; margin-top:10px">
						<div class="col-sm-3" style="padding:0px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                            <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" class="follow" style="width:100%;"></a>
								
							
						</div>
						<div class="col-sm-9" style="margin-top: -8px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>"><div class="col-sm-12 " style="padding:4px;text-align:center; font-size:14px;color: #000;"><?php if(($photox[0]->fullname)) echo $photox[0]->fullname; 
							else echo "User"?></div></a>
						 <?php
                            if($pro1=="0"){
								?>

							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <a href="<?=base_url()?>users/followUser/<?= $usid ?>/<?=$uid ?>"><button type="submit" class="btn btn-follow" name="folw">Follow</button></a></div>
                                                        <?php
							}
else {
	?>
	<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?=base_url()?>users/deleteufollow/<?= $pro1[0]['fuid']?>"  class="btn btn-follow">Followed</a></div>
                                                                                    <?php } ?>
						</div>
					</div>
					<?php }}?>
					</div>
						
                    </div>	
                    <?php
                }
                ?>
                <?php if(!isset($end))
                {
                	?>
                
			<div class="col-lg-10 col-md-10 col-sm-10" id="container_wrap" style="margin:-7% 0px 0px 0px; width: 1080px; background-color: #FFF;" >
		<?php if((isset($post1)) && (!isset($end)))
		{
		?>

			 <div id="container">
				<?php if(isset($post1)){
							foreach($post1 as $pt){
								$postid=$pt['postid'];
								//echo $postid;

								$ids=$this->usermodel->where_data('fbblogmain',array('id'=>$pt['postid']));
								$pte=$ids[0]->editorial;
								print_r($pte);
							?>
						<div class="grid" style="height: 350px;">
                        <?php 
						$hed=str_replace(" ","-",$ids[0]->head);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						if($pte==1)
						{
						?>
						<a href="<?= base_url()?>postvieweditorial/<?= $pt['postid']?>" style="text-decoration:none">
						<div class="imgholder">
								<?php
								$pic=$ids[0]->image;
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $ids[0]->image?>" width="200px" height="200px" />
                              
                                <?php } else {?>
                                   <img src="http://zersey.com/assets/zerseynme/<?= $ids[0]->image?>" width="200px" height="200px" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $ids[0]->maincat ?></p>
							</div>
                        
<?php
}
else if($pte==0)
{
?>
                        <a href="<?= base_url()?>postview/<?= $fhed?>/<?= $pt['postid']?>" style="text-decoration:none">
                        <div class="imgholder">
								<?php
								$pic=$ids[0]->image;
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $ids[0]->image?>" width="200px" height="200px" />
                              
                                <?php } else {?>
                                   <img src="http://zersey.com/assets/zerseynme/<?= $ids[0]->image?>" width="200px" height="200px" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $ids[0]->maincat ?></p>
							</div>
                        <?php }
                        else if($pte == 2)
                         {
                         ?>
                        <a href="<?= base_url()?>postviewvideo/<?= $fhed?>/<?= $pt['id']?>" style="text-decoration:none">
                        <div class="imgholder">

                              <p class="card-tag"><?= $pt['maincat']?></p> 
                                <?php
                                $pic=$pt['image'];
                                $url=explode(".",$pic);
                                //print_r($url[1]);
                                if($url[1]=="youtube")
                                {
                                $video1=str_replace("watch/?v=","embed/", $pic,$count1);
                                 $video2=str_replace("watch?v=","embed/", $pic);
                                 if($count1 > 0)
                                 {
                               ?>

                               <iframe src="<?php echo $video1; ?>" width="350px" height="200px" frameborder="0" allowfullscreen>
                               </iframe> 
                               <?php
                           }
                           else
                           {
                            ?>
                            <iframe src="<?php echo $video2; ?>" width="350px" height="200px" frameborder="0" allowfullscreen>
                               </iframe> 
                               
                            <?php
                           }
                       }
                       else 
                       {
                            $video1=$pic."/embed/simple";
                            ?>
                            <iframe src="<?php echo $video1; ?>" width="350px" height="200px" frameborder="0" allowfullscreen>
                               </iframe>
                            <?php
                       }
                               ?>
                              </div>
                                                 <?php 
                         }

						 ?>
						
							
							<div class="content">
								<div class="like-comment-date">
									<ul class="meta">
									<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="617"><i class="icon-comment"></i>0 </a></li>
									<li class="like"><a href="http://zersey.com/blog/likelukbok/luklikemrchant/617/">
									<i class="icon-heart" id="hrts"></i>0</a>
									</li>
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $ids[0]->createdOn));
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
	
	$a= explode(" ", $ids[0]->createdOn);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></li>
									</ul>
									<h5 style="text-align:justify"><?= $ids[0]->head?></h5>
								</div>
							</div>
                           <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$ids[0]->userid));
							if($ids[0]->userid!=0)
								$unm=$this->datamodel->getusernamebyid($ids[0]->userid);
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($pt['userid']!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>
                        <?php }}?>
			</div>
			<?php
			}
			?>			 			 						
			</div>
			<?php
		}
		?>
		
    			</div>

			<!--<div class="col-lg-10 col-md-10 col-sm-10" id="private_board">
		
				<?php 
					 $resultuserl = $this->usermodel->where_data('user_board', array('userid' => $user['0']->userId,'private' => 1));
?>
            <div id="container">
				<?php if(isset($resultuserl)){
							foreach($resultuserl as $rtusl){
								//$postid=$pt['postid'];
								//echo $postid;
								//$ids=$this->usermodel->where_data('fbblogmain',array('id'=>$pt['postid']));
								//echo $ids[0]->head
								$blid = $rtsul->bid;
                        $usid = $this->session->userdata['user_id'];
                        $pro2 = $this->datamodel->selectboardfollow($blid, $usid);


                        //$foloid = $pro2[0]['fbid'];								
							?>
						<div class="grid" style="height: 350px;">
                       
						<a href="<?= base_url()?>board/<?= $rtusl->bordname?>" style="text-decoration:none">

							<div class="imgholder">
								<?php
								$pic=$rtusl->image;
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assert/catimg/<?= $rtusl->image ?>" width="200px" height="200px" />
                              
                                <?php } else {?>
                                   <img src="http://m.zersey.com/assert/catimg/<?= $rtusl->image ?>" width="200px" height="200px" />
                                 <?php }?>
								
                                <p class="card-tag"><?= $rtusl->category?></p>
							</div>
                        

							<div class="content">
								<div class="like-comment-date">
						
									<ul class="meta">
									<li style="padding:0px 5px !important"><a href="#" style="color:rgb(187, 187, 187);" class="comment" rel="617"><i class="icon-comment"></i>0 </a></li>
									<li class="like"><a href="http://zersey.com/blog/likelukbok/luklikemrchant/617/">
									<i class="icon-heart" id="hrts"></i></a>
									</li>
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
$to_time = strtotime(str_replace('/', '-', $rtusl->createdate));
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
	
	$a= explode(" ", $rtusl->createdate);
	echo $a[0];
	}
}
else{	echo $minx." Hr";}
	}
else{ echo $min." Min.";}
?></li>
									</ul>
									<h5 style="text-align:justify"><?= $rtusl->bordname?></h5>
								</div>
							</div>
                           <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$rtusl->userid));
							if($rtusl->userid!=0)
								$unm=$this->datamodel->getusernamebyid($rtusl->userid);
							//print_r($unm->username);
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($rtusl->userid!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>
                        <?php }}?>
			</div>
		
			</div>-->
	           <?php  $user=$this->usermodel->where_data('customer',array('userId'=>$user_id->id)); ?>
                <!--<div class="modal fade" id="myModal3" role="dialog">
					<div class="modal-dialog">
					
					   Modal content-->
					  <!--<div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Upload Your Cover Photo</h4>
						</div>
						<div class="modal-body">
						
				    <label class="myLabel"> <span class="btn fileinput-button">
					<span><i class="fa fa-camera fa-primary"> <input type="file" name="photo" id="photo" value="Upload Photo" /></i>Upload your Cover Picture</span></span></label>
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					  
					</div>
                </div>-->

		<div class="modal fade" id="myModal2" role="dialog">
			<div class="modal-dialog">
			<!-- Modal content-->
			  <div class="modal-content">
			   <button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-header" style="background: rgba(128, 128, 128, 0.28);">
				
				    <div class="row">
					
						<div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px">
						<img src="<?=base_url()?>assert/images/user.png" style="width:25px;">
					        <a href="" style="color: #000;font-size: 17px;vertical-align: bottom;font-weight: bold;">About</a>
					    </div>
					</div>
				</div>
				<div class="modal-body">
				    <div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							
							<ul style="list-style:none;padding-left:0px;">
								<li><a  onclick="overview();">Overview</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;" id="intrest" ><a href="#" onclick="intrest();">Interest</a></li>
								<!--<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="setting();">Settings</a></li>-->
								<?php if($us_id==$user_id) { 
									if($verify!=0)
										{
											?>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="account();">Account</a></li>
								<?php }} ?>
							</ul>
					    </div>
						<div class="col-lg-9 col-md-9 col-sm-9" style="border-left: solid 1px rgba(212, 203, 203, 0.42);">
					
						<div class="first_div">
						<form method="post" action="">
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Gender</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<?php if($us_id==$user_id)
								{
									?>
									<select name="gender" id="gender">
									<?php
										if($cust['0']['gender'] == 'M')
									{
										?>
										<option value="0"> Select </option>
										<option value="M" selected> Male </option>
										<option value="F"> Female </option>
										<?php
									}
									else if($cust['0']['gender'] == 'F')
									{
										?>
										<option value="0"> Select </option>
										<option value="M"> Male </option>
										<option value="F" selected> Female </option>
										<?php
									}
									else
									{
									?>
										
										<option value="0"> Select </option>
										<option value="M"> Male </option>
										<option value="F"> Female </option>
										<?php
									}
									?>

										</select>
									<?php
									}
									else
									{
										
								 echo $custom['0']['gender'];	}
								?>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Date of birth</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
								<?php if ($user_id==$us_id)
									{
										?>									
										<input data-format="dd/MM/yyyy hh:mm:ss" id="datepicker" class="form-control" class="ui-widget-header" type="date" name="datepicker" value="<?php echo $cust['0']['DOB']; ?>"></input>
										<?php
									}
									else
									{
										echo $custom['0']['DOB'];
									}

									?>
										</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Location</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<?php if($user_id==$us_id)
								{
									
									?>
								
									<input type="text" class="form-control" id="loc" name="loc" value="<?php echo $cust['0']['location']; ?>">
								<?php
								//echo $user[0]->location;
								}
								else
								{
								echo $custom['0']['location'];
							}

								?>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Employment</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<?php if($user_id==$us_id)
								{
									?>
								
									<input type="text" class="form-control" id="emp" name="emp" value="<?php echo $cust['0']['employment']; ?>">
								<?php
								}
								else
								{
								echo $custom['0']['employment'];
							}

								?>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Mobile number</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<?php if($user_id==$us_id)
								{
									?>
								
									<input type="text" class="form-control" id="mbno" name="mbno" maxlength="10" value="<?php echo $cust['0']['mobile']; ?>">
								<?php
								}
								else
								{
								echo $custom['0']['mobile'];
							}

								?>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Brief B/o</label>
								</div>
								<?php if($user_id==$us_id)
								{
									?>
								
									<textarea class="form-control" id="brief" name="brief"> <?php echo $cust['0']['yourself']; ?> </textarea>
								<?php
								}
								else
								{
								echo $custom['0']['yourself'];
							}

								?>
						    </div>
						    <?php if($us_id==$user_id)
						    {

						    	?>
						    <div class="col-lg-8 col-md-8 col-sm-8">
								<input type="submit" class="btn btn-default" value="Update" name="update" />
							</div>
							<?php
						}
						?>
						</form>	
						</div>

						<div class="interest" style="display:none">
							<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;">
							     	<form method="post" action="<?=base_url()?>users/categoryfollowByName">
									  <div>
										<style>
										  ul.ui-autocomplete {z-index: 1100;}
										</style>
									    <div class="text-center">
										  <p style="font-size:18px;font-weight:bold">Interests</p>
										</div>
										<?php $result=$this->usermodel->getInterestsById($this->session->userdata['user_id']);
										if($result){foreach($result as $rts){?>
											<div id="interests" style="background: #ddd; padding: 5px; display: inline-block; 
											margin-bottom: 5px;border-radius: 6px;"><?= $rts['cat_name']?></div>
										<?php }}?>
										<?php if ($user_id == $us_id){ ?>
										<div class="form-group" style="padding-top: 10px;">
											<input type="text" name="realcat" id="realcat" class="text_div form-control" placeholder="Select Your Interests"/>
											<input type="hidden" name="cid" id="cid" value=""/>
										</div>
										<div id="topicbtn"></div>
										<?php } ?>
										</div>
								</div>
								<?php if ($user_id == $us_id){ ?>
								<div style="float:right;">
										     <input type="submit" name="flw" class="btn btn-default">
									    </div>
								<?php } ?>											</form>

						   </div>
					    </div>
					    	<div class="setting" style="display:none">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">
									<h3>Web notification</h3>
									
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">
									
									<div class="col-lg-8 col-md-8 col-sm-8">
									      <label class="checkbox-inline" style="margin-left:10px;">
											  <input type="checkbox" value="">Notify when someone follows me
										  </label>
										  <label class="checkbox-inline">
											  <input type="checkbox" value="">Notify when someone comments on my post
										  </label>
										  <label class="checkbox-inline">
											  <input type="checkbox" value="">Notify when someone likes my post
										  </label>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
									<input type="button" value="Update">
									
								</div>
							</div>
						</div>
							<div class="profile" style="display:none">
								<div class="col-lg-9 col-md-9 col-sm-9" style="border-left: solid 1px rgba(212, 203, 203, 0.42);">
									<!--<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">User name</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="text" class="form-control" id="usr" placeholder="User name">
											
										</div>
								   </div>-->
								   <form method="post" action="">
								   <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">New Password</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="password" class="form-control" id="usr" name="pass" placeholder="Password">
											
										</div>
								   </div>
								   <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<!--<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr"> Confirm Password</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="password" class="form-control" id="usr" placeholder="Password">
											
										</div>-->
										<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
									<input type="submit" value="Update" name="password">
									
								</div>
							</div>
								   </div>
								   </form>
								</div>
							</div>
						
					</div>
			    </div>
		    </div>
		</div>
		</div>
		</div>
		
		<div class="modal fade" id="myModal1" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
			   <button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-header" style="background: rgba(128, 128, 128, 0.28);">
				    <div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12" style="padding:0px">
						
						
						     <img src="<?=base_url()?>assert/images/user.png" style="width:25px;">
							 
							 
							<a href="" style="color: #000;font-size: 17px;vertical-align: bottom;font-weight: bold;">About</a>
					    </div>
					</div>
				</div>
				<div class="modal-body">
				    <div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							
							<ul style="list-style:none;padding-left:0px;">
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a  href="#" onclick="overview();">Overview</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;" ><a href="#" onclick="intrest();">Interest</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="setting();">Settings</a></li>
								<li style="font-size: 18px;font-weight: bold;margin-top:10px;"><a href="#" onclick="account();">Account</a></li>
							</ul>
					    </div>
						<div class="col-lg-9 col-md-9 col-sm-9" style="border-left: solid 1px rgba(212, 203, 203, 0.42);">
					
						<div class="first_div">
						<form  method="post" action="">

							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Gender</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
								<?php if($us_id==$user_id)
								{
									?>
										<select name="gender" id="gender">
										<option value="M"> Male </option>
										<option value="F"> Female </option>
										</select>
									<?php
									}
									else
									{
										
								 echo $user[0]->gender;	}
								?>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Date of birth</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<div class="form-group">
									<?php if ($user_id==$us_id)
									{
										?>									
										<input data-format="dd/MM/yyyy hh:mm:ss" id="datepicker" class="form-control" class="ui-widget-header" type="date" name="datepicker" value="<?php echo $user[0]->DOB; ?>"></input>
										<?php
									}
									else
									{
										echo $user[0]->DOB;
									}

									?>
									</div>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Location</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
								<?php if($user_id==$us_id)
								{
									?>
								
									<input type="text" class="form-control" id="loc" name="loc" value="<?php echo $user[0]->location; ?>">
								<?php
								}
								else
								{
								echo $user[0]->location;
							}

								?>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Employment</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<?php if($user_id==$us_id)
								{
									?>
								
									<input type="text" class="form-control" id="emp" name="emp" value="<?php echo $user[0]->employment; ?>">
								<?php
								}
								else
								{
								echo $user[0]->employment;
							}

								?>

									
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Mobile number</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<?php if($user_id==$us_id)
								{
									?>
								
									<input type="text" class="form-control" id="mbno" name="mbno" maxlength="10" value="<?php echo $user[0]->mobile; ?>">
								<?php
								}
								else
								{
								echo $user[0]->mobile;
							}

								?>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-4 col-md-4 col-sm-4">
									<label for="usr">Brief B/o</label>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8">
									<?php if($user_id==$us_id)
								{
									?>
								
									<textarea class="form-control" id="brief" name="brief"> <?php echo $user[0]->yourself; ?> </textarea>
								<?php
								}
								else
								{
								echo $user[0]->yourself;
							}

								?>
						    </div>
						    <?php if($us_id==$user_id)
						    {

						    	?>
						    <div class="col-lg-8 col-md-8 col-sm-8">
								<button type="submit" class="btn btn-default" name="update">Update</button>
							</div>
							<?php
						}
						?>

								</form>

						</div>
						
						<div class="interest" style="display:none">
							<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="margin-top:15px; padding:0px; padding-bottom:10px;">
							     	<form method="post" action="<?=base_url()?>users/categoryfollow">

							   <div>

									    <div style="text-align:center">
										      <p style="font-size:18px;font-weight:bold">Intrest</p>
										</div>
 <?php 

                $result=$this->datamodel->selectcategory();
				//print_r($result);
				if($result){ foreach($result as $rts){
	?>


										<label class="checkbox-inline checkbox">
										  <input type="radio" name="cid" value="<?= $rts['name']?>"><?= $rts['name']?>
										</label>

										<?php }} ?>
								</div>
								<div style="float:right;">
										     <input type="submit" name="flw" class="btn btn-default">
									    </div>
									    																			</form>

						   </div>
					    </div>
						<div class="socialprofile" style="display:none">
						<div class="col-lg-12 col-md-12 col-sm-12">
						    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Facebook profile</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="" class="btn btn-default" style="background-color: #714F9E;border-color: #ccc;border-radius: 17px;color: white;">Connect with facebook<i class="fa fa-facebook" style="color:#fff;"></i></a>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Twitter handel</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="" class="btn btn-default" style="background-color: #714F9E;border-color: #ccc;border-radius: 17px;color: white;">Connect with twitter<i class="fa fa-twitter" style="color:#fff;"></i></a>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Google profile</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="" class="btn btn-default" style="background-color: #714F9E;border-color: #ccc;border-radius: 17px;color: white;">Connect with facebook<i class="fa fa-facebook" style="color:#fff;"></i></a>
								</div>
                            </div>
							<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px;">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="usr">Personal url</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<input type="text" class="form-control" id="usr" placeholder="Visit your link">
								</div>
                            </div>
						</div>
						</div>
						<div class="setting" style="display:none">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">
									<h3>Web notification</h3>
									
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px">
									
									<div class="col-lg-8 col-md-8 col-sm-8">
									      <label class="checkbox-inline" style="margin-left:10px;">
											  <input type="checkbox" value="">Notify when someone follows me
										  </label>
										  <label class="checkbox-inline">
											  <input type="checkbox" value="">Notify when someone comments on my post
										  </label>
										  <label class="checkbox-inline">
											  <input type="checkbox" value="">Notify when someone likes my post
										  </label>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
									<input type="button" value="Update">
									
								</div>
							</div>
						</div>
							<div class="profile" style="display:none">
								<div class="col-lg-9 col-md-9 col-sm-9" style="border-left: solid 1px rgba(212, 203, 203, 0.42);">
									<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">User name</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="text" class="form-control" id="usr" placeholder="User name">
											
										</div>
								   </div>
								   <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">Email</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="email" class="form-control" id="usr" placeholder="sona@gmail.com">
											
										</div>
								   </div>
								   <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;padding:0px">
										<div class="col-lg-4 col-md-4 col-sm-4">
											<label for="usr">Password</label>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-8">
											<input type="password" class="form-control" id="usr" placeholder="Password">
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12">
								
								<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;text-align:center;padding:0px">
									<input type="button" value="Update">
									
								</div>
							</div>
								   </div>
								</div>
							</div>
					    </div>
					</div>
			    </div>
		    </div>
		
		</div>
		</div>
		</div>
	    </div>
		
		
		    <div class="modal fade" id="myuserprofile" role="dialog">
				<div class="modal-dialog" style="width: 60%;">
				
				  <!-- Modal content-->
				    <div class="modal-content">
						
						  <button type="button" class="close" data-dismiss="modal" style="position:absolute;margin-left: 97%;">&times;</button>
						 <img src="<?= base_url();?>assert/images/New_Board_User_Default_Cover_Pic_1.jpg" style="width:100%;">						
						
				    </div>
				</div>
	        </div>
	
	<div class="modal fade" id="mycoverprofile" role="dialog">
				<div class="modal-dialog" style="width: 80%;">
				
				  <!-- Modal content-->
				    <div class="modal-content">
						
						  <button type="button" class="close" data-dismiss="modal" style="position:absolute;margin-left:98%;">&times;</button>						
						  <img src="<?= base_url();?>assert/images/New_Board_User_Default_Cover_Pic_1.jpg" style="width:100%;">						
						 
						
				    </div>
				</div>
	        </div>
 <?php
}
?>
  