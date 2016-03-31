	<div class="container popup_div_post"style="width:100%;">
			<div>
			   <a href="dashboard"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
			</div>
             <?php if(isset($post)){
			foreach($post as $pt){
								 $id= $pt['id'];
						$uid=$this->session->userdata['user_id'];
								            $cntpost= $this->datamodel->getlikecount($id);


		?>
          <?php if($postdetail){
							
								foreach($postdetail as $ptd){
						?>

						
			<div class="col-lg-12 col-md-12 col-sm-12"style="width:100%;" >
			    <div class="col-lg-12 col-md-12 col-sm-12"style="width:100%;"  >
					<div >
						<img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" style="width:100%; height:550px;"/>
						<div style="width:70%;font-size:50px;position: absolute;margin-top: -300px;z-index=100;line-height:120%;color:#fff;font-family:nyt-mag-slab,georgia,times new roman,times,serif;">
							<b><?= ucfirst( $pt['head'])?></b></br>
							     <p style="float:right;font-size:30px"><?php echo "By ".$this->usermodel->getName($pt['userid']);?></p>

						</div>
					</div>
                 </div>
				<div class="col-lg-12 col-md-12 col-sm-12">
			        <div class="col-lg-10 col-md-10 col-sm-10" style="padding:0px;">
			            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;">
			            <?php  if($this->session->userdata['user_id']==$pt['userid'])
			            {?>
			           	<a href="<?= base_url()?>deletepost/<?= $pt['id']?>" style="text-decoration:none; color:#000; float:right;" onclick="return isDelete();"><i class="fa fa-trash"></i> &nbsp;</a>

							<a href="<?= base_url()?>postedit3/<?= $pt['id']?>" style="text-decoration:none; color:#000; float:right"><i class="fa fa-pencil"></i>&nbsp;</a><?php } ?>
							<p><?= ucfirst( $pt['intro'])?></p>
							<p><?= ucfirst($ptd['description'])?></p>
                        </div>
                        
                               <?php }}?>

                               			                        <?php }}?>

                        				 		<form method="post" action="">

						<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:10px;padding:0px;background:rgba(221, 221, 221, 0.4);margin-bottom:10px;">
						                <div style="padding:15px;">

						                 

					<input type="submit" value="Like:" name="like"  style="display:inline-block; border: none; background-color: transparent;"></input>
									            <p style="display:inline-block;"> <?= $count?> </p>
										</div>
                     
							<div style="padding:5px;">
								<div style="width:5%;display:inline-block">
<img src="<?php if($this->usermodel->getLoginimage($this->session->userdata['user_id'])){ echo base_url();?>assets/images/merchant/<?php echo ($this->usermodel->getLoginimage($this->session->userdata['user_id']));} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>"style="width:100%;" >								</div>
								<div style="width:93%;display:inline-block">
									<input type="text"  style="width:80%;height:50px" name="comment" placeholder="Write your comment">
									<input type="submit" value="Comment" name="postcomment" style="height:50px;width:150px;background-color:grey;color:#fff"></input>
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
					<a href="<?= base_url()?>userprofile/<?php echo $usrnam[0]->username;?> "><b><?php echo $this->usermodel->getName($cm['userid']); ?></b>	</a> <?php echo $cm['datetm']; ?>			        
					<p style="margin-left:50px;"><?= $cm['comment']?></p>
									        </div>
									          <?php }}?>
									    </div>
									    
									</div>
								</div>
							</div>
						</div>
					</form>
		            </div>
					<div class="col-lg-2 col-md-2 col-sm-2" style="padding-right:0px;">
						
					</div>
		        </div>

	    </div>			</div>
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