	<script>
	$(document).ready(function()
	{
		//alert('working');

		var ids=[];
			$(".check").click(function()
			{
				if($(".check").is(":checked"))
				{
					var done=this.value;
					ids.push(done);
                  
				}
				console.log(ids);
				});
					$("#list li").click(function()
		{
			var value=this.value;

			if(value==0)
			{
				alert("Please select a suubboard if it exists");
			}
			//alert(value);
			//alert(<?= $this->uri->segment(2) ?>);
			else
			{
				$.ajax({
					"type":"get",
					"data":{"id":this.value,"check":ids},
					"url":"<?=base_url()?>users/boardview/<?=$this->uri->segment(2)?>",
					"success":function(data)
					{
						alert("It has been moved");
					}

				});
				alert("The selected items are transferred to another folder");
			}
		});

			 $("body").on('click', '.accept', function (e)
        {

            //var email= <?= $email ?>;
            var accept_id = this.id;
            var id = accept_id.substring(6);
            //alert(id);
            var email = $("#email").val();
            //alert(email);
            $.ajax(
                    {
                        "type": "post",
                        "data": {"accept": id, "email": email},
                        "url": "<?= base_url() ?>users/invitation",
                        success: function (msg)
                        {
                        	$("#pending").hide();
                        	$("#accept").show();
                            
                            //$(location).attr('href', 'http://zersey.com/board/'+bname);
                        }
                    });


        });

        $("body").on('click', '.reject', function (e)
        {

            //var email= <?= $email ?>;
            var reject_id = this.id;
            var id = reject_id.substring(6);
            //alert(id);
            var email = $("#email").val();
            //alert(email);
            $.ajax(
                    {
                        "type": "post",
                        "data": {"reject": id, "email": email},
                        "url": "<?= base_url() ?>users/invitation",
                        success: function (msg)
                        {
                            //$("#board" + id).remove();
                            $(location).attr('href', 'http://zersey.com');
                        }
                    });


        });

        $("body").on('click','.leave', function (e)
        {

            //var email= <?= $email ?>;
            var leave_id = this.id;
            //alert(leave_id);
            var id = leave_id.substring(5);
            //alert(id);
            var email = $("#email_leave").val();
            //alert(email);
            $.ajax(
                    {
                        "type": "post",
                        "data": {"leave": id, "email": email},
                        "url": "<?= base_url() ?>users/invitation",
                        success: function (msg)
                        {
                            //$("#board" + id).remove();
                            //$(location).attr('href', 'http://zersey.com/board/'+bname);
                             $(location).attr('href', 'http://zersey.com');
                        }
                    });


        });


			

		//alert("It has been moved");
	});
	</script>
		<div class="row" style="border: solid 2px black;">
			
			<!-----middle part-------->
			
			<div class="col-lg-12 col-md-12 col-sm-12" style="color: #fff; background-color:#CCCCCC;background: url(
			<?php 
			if($covimg){
			?>'<?= base_url()?>assert/catimg/<?= $covimg?>'
            <?php } else{?>
            '<?= base_url()?>assert/catimg/d_Cover.jpg'
            <?php }?>
            ); background-size:cover ; margin-top:-8px">
				<div class="col-lg-12 col-md-12 col-sm-12" >
					<div class="col-lg-4 col-md-4 col-sm-4">
                        <div style="width:100%; margin-top:10px;">
							<div style="display: inline-block;width:49%;">
								<img src="<?php 
			if($proimg){
			?><?= base_url()?>assert/catimg/<?= $proimg?>
            <?php } else{?>
            <?= base_url()?>assert/catimg/d_Icon.png
            <?php }?>" style="width: 175px;border: solid 5px;">
								
							</div>
							<div style="display: inline-block;width:49%;">
                            <?php $catnm=$this->uri->segment(2);
                            $catnm=str_replace("%20"," ",$catnm);
						$cntpost= $this->datamodel->countbordpost($catnm);
						$cntpost1= $this->datamodel->countofbordfoll($catnm);
						$uid = $this->session->userdata['user_id'];
						$user = $this->usermodel->where_data('users', array('id' => $uid));
//print_r($user[0]->email);
//$invite_email=$user[0]->email;
//print_r($email);               
                            
						   $boards=$this->usermodel->where_data('user_board',array('bordname'=>$catnm));
						   
						   $boardid=$boards[0]->bid;

                            $board = $this->usermodel->where_data('board_invites', array('boardid' =>$boardid , 'email' => $user[0]->email));
                           echo count($board);

							?>

								<h3 class="middle_user_name"><?= ucfirst($catnm)?></h3>
								<p class="discription_div"> <?= $cntpost1?> followers  <?= $cntpost?> posts</p>
							</div>
						</div>
						<div style="padding-top: 13px; margin-bottom: 10px;margin-left: 50px;">
						   <?php

							$id=$this->session->userdata('user_id');
 							$uids=$user_id;
						  if($id==$uids)
						  { ?>
					
             			  <button class="btn btn-default"style="display:inline-block;margin-top:5px;margin-left:20px;"  data-toggle="modal" data-target="#myModal"><i class="fa fa-camera-retro"></i>Edit Image</button>
					
                    
                     <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				<form action="<?= base_url();?>users/uploadboarddetail" method="post" enctype="multipart/form-data">
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
			<input type="hidden" name="catidm" id="catidm" value="<?= $catidm?>" />
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
						  	 if($boards[0]->private== 0)
                            {
						  ?>
                          <button class="btn btn-default"style="display:inline-block;margin-top: 0%;"><i class="fa fa-plus"></i>Follow</button>
                          <?php }
                          if(count($board) > 0)
                          {


						  	if($board[0]->status == 0)
						 	{
                            	?>
                            	<div id="pending" style="margin: -9% 0px 0px 249%;width: 100%;">
                            	 <input type="hidden" id="email" value="<?= $user[0]->email ?>">
                                    <input type="button" value="Accept" name="Accept" id="accept<?= $boardid ?>" class="accept" style="color:#FFF;background-color:#00F;border-radius:8px;margin-bottom: 23px;padding: 2px 16px;margin-left: 0%;" />
                                    <input type="button" value="Reject" name="Reject" id="reject<?= $boardid ?>" class="reject" style="color:#000;background-color:#FFF;border-radius: 8px;padding: 2px 16px;" />
                                    	</div>
                            	<?php
                            
                            }
                           
                            if($board[0]->status == 1)
                            {
                            		?>
                            		<div id="accepted" style="margin: -9% 0px 0px 249%;width: 100%;">
                            		<input type="hidden" id="email_leave" value="<?= $user[0]->email ?>">
                          <input type="button" class="leave" value="Leave" name="leave" id="leave<?= $boardid ?>"  style="color:#000;background-color:#FFF;border-radius: 8px;padding: 2px 16px;" />
                            		 </div>
                            		<?php
                            }
                        }
                             }
                             ?>
                             <div id="accept" style="margin: -9% 0px 0px 249%;width: 100%;display: none;">
                            		<input type="hidden" id="email_leave" value="<?= $user[0]->email ?>">
                          <input type="button" class="leave" value="Leave" name="leave" id="leave<?= $boardid ?>"  style="color:#000;background-color:#FFF;border-radius: 8px;padding: 2px 16px;" />
                            		 </div>
						</div>  
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<h3 class="topic_txt">Topics</h3>
                        <div>
                        <?php echo $topic; if($topic){ foreach($topic as $tp){?>
							<a href="" class="btn btn-default topic_content"><?= $tp->name?></a>
							<?php }} ?>
                            </div>	
					</div>
					
					
				</div>	 
				</div>
			
				<div class="col-lg-12 col-md-12 col-sm-12" style="border: solid 2px black;">
						<div class="col-lg-1 col-md-1 col-sm-1">
								<div><h3 style="text-align:center;"><a href="<?=base_url()?>board/<?=$catnm?>/<?= $cwt['sbid']?>">Home</h3></div>
						</div>        
                          <?php if(sizeof($subboard) > 4){
							  $bids=$cat[0]['boardid'];
							  //echo $bids;
							  $subbod1=$this->datamodel->getsubbod4($catidm);
							  $subbod2=$this->datamodel->getsubbodafter($catidm);
							  foreach($subbod1 as $cwt){ ?>

						<div class="col-lg-2 col-md-2 col-sm-2">
								<div><h3 style="text-align:center;"><a href="<?=base_url()?>boards/<?=$catnm?>/<?= $cwt['sbid']?>"><?= $cwt['subboardname']?></a></h3></div>
						</div>
                        <?php }
							   ?>
							<div class="col-lg-2 col-md-2 col-sm-2" style="margin-top:18px;margin-left:0%;">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:#777; font-size:22px">
						+ More
						<span class="caret"></span></a>
						<ul class="dropdown-menu" style="background:#e5e5e5;; color:#fff; margin-left: -66px;">
								<?php	 foreach($subbod2 as $cww){ ?>
 								<li><a href="<?=base_url()?>boards/<?=$catnm?>/<?= $cww['sbid']?>"><?= $cww['subboardname']?></a></li>
                        <?php }
							   ?>

                                     
									</ul>
                        </div>
							<?php } else{  
									if(empty($subboard))
									{
										?>
										<div class="col-lg-2 col-md-2 col-sm-2">
					<div><h3 style="text-align:center;"><a href="<?=base_url()?>boards/<?=$catnm?>/<?= $ct['sbid']?>"> &nbsp; </a></h3></div>
						</div>
										<?php
									}
							 foreach($subboard as $ct){ ?>

						<div class="col-lg-2 col-md-2 col-sm-2">
					<div><h3 style="text-align:center;"><a href="<?=base_url()?>boards/<?=$catnm?>/<?= $ct['sbid']?>"><?=  $ct['subboardname'] ?></a></h3></div>
						</div>
                        <?php }} ?>
						
						<?php if($uid==$user_id)
						{
							?>


<div class="col-lg-1 col-md-1 col-sm-1">

<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown" > 
								<img src="<?= base_url() ?>assert/images/icon-folder-128.png" width="40px" height="40px" style="margin:0px 0px 0px -52%" />
								<span class="caret"></span></a>
								
									
									<ul class="dropdown-menu" name="list" id="list" style="background:#e5e5e5;; color:#fff; margin-left: -66px;">
									<li value="0"> <a> Move to: </a> </li>
									<?php foreach($subboard as $sub)
									{
									?>

									  <li value="<?= $sub['sbid'] ?>"><a><?=$sub['subboardname'] ?></a></li>
							<?php
							}
							?>			 
									</ul>
</div>

</div>
						<div class="col-lg-1 col-md-1 col-sm-1">

								
								<div class="dropdown">
								
								<a class="dropdown-toggle" href="#" data-toggle="dropdown">

								<i class="fa fa-cog fa-2x dropdown-toggle" style="color:#000;margin-top:5px"></i>	 <span class="caret"></span>	</a>
								
									
									<ul class="dropdown-menu" style="background:#e5e5e5;; color:#fff; margin-left: -66px;">
									  <li data-toggle="modal" data-target="#addboard"><a href="#">Add new sub-board</a></li>
									 <li data-toggle="modal" data-target="#invites"> <a href="#"> Add collaborators </a> </li>
									</ul>
									 <div class="modal fade" id="addboard" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #000;
    font-weight: bold;">CREATE A NEW SUBBOARD</h4>
        </div>
        <form action="" method="post">
        <div class="modal-body">
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                       <label for="usr">Name</label>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8">
                  <input type="text" class="form-control" placeholder="Enter Your SubBoard Name" name="sbname" id="sbname">
                  </div>
             </div>
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                       <label for="usr">Description</label>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8">
                     <textarea class="form-control custom-control" rows="3" style="resize:none" placeholder="Waht's Your SubBoard About" name="sbdesc" id="sbdesc"></textarea> 
                  </div>
                  </div> 	
                  
                   
    
         </div>
       </div>
       
       
        <div class="modal-footer">
                             
                 
                             <input type="button" value="Cancel" class="btn" data-dismiss="modal">
                          
                              <input type="submit" value="Save" class="btn"  name="savesubboard" style="background:#993737;color:#fff;">
                          
            </div></form>
     </div>
      
    </div>
  </div>

  							 <div class="modal fade" id="invites" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #000;
    font-weight: bold;"> ADD COLLABORATORS </h4>
        </div>
        <form action="" method="post">
        <div class="modal-body">
        <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                       <label for="usr">Email</label>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8">
                  <input type="text" class="form-control" placeholder="Separate multiple email ids with comma" name="emails" id="emails">
                  </div>
             </div>
              <!--<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:15px;">
                  <div class="col-lg-4 col-md-4 col-sm-4">
                       <label for="usr">Description</label>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8">
                     <textarea class="form-control custom-control" rows="3" style="resize:none" placeholder="Waht's Your SubBoard About" name="sbdesc" id="sbdesc"></textarea> 
                  </div>
                  </div> 	-->
                  
                   
    
         </div>
       </div>
       
       
        <div class="modal-footer">
                             
                 
                             <input type="button" value="Cancel" class="btn" data-dismiss="modal">
                          
                              <input type="submit" value="Add" class="btn"  name="collab" style="background:#993737;color:#fff;">
                          
            </div></form>
     </div>
      
    </div>
  </div>



                             </div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
	
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:5px;" id="dashboard_image_div">
					<div class="col-lg-12 col-md-12 col-sm-12" id="container">
						<?php if(isset($post)){
							foreach($post as $pt){
								$pte=$pt['editorial'];
							?>
						<div class="grid">
                        <?php 
						$hed=str_replace(" ","-",$pt['head']);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						if($pte==1)
						 {
							 ?>
			  <a href="<?= base_url()?>postvieweditorial/<?=$fhed?>/<?= $pt['id']?>" style="text-decoration:none">
                         <?php 

						 }
						 else
						 {
						?>
                        <a href="<?= base_url()?>postview/<?= $fhed?>/<?= $pt['id']?>" style="text-decoration:none">
                        <?php
                    }
                    ?>
							<div class="imgholder">
								<?php
								$pic=$pt['image'];
								 if(file_exists("./assets/zerseynme/$pic")){?>
                                <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" />
                              
                                <?php } else {?>
                                   <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" />
                                 <?php }?>
                                <p class="card-tag"><?= $pt['maincat']?></p>
							</div>
							<div class="content">
								<div class="like-comment-date">
									<ul class="meta">
									<li style="padding:0px 5px !important"><i class="icon-calendar"></i><?php // $to_time = strtotime($cm->datetm);
									$to_time = strtotime(str_replace('/', '-', $pt['createdOn']));
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
									
									$a= explode(" ", $pt['createdOn']);
									echo $a[0];
									}
								}
								else{	echo $minx." Hr";}
									}
								else{ echo $min." Min.";}
								?></li>
                            </ul>
                        <h5 style="text-align:justify"><?= $pt['head']?></h5>
                      <input type="checkbox" name="checkbox" class="check" id="checkbox<?=$pt['id']?>" value="<?= $pt['id'] ?>" />  
							</div>
							</div>
                            <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$pt['userid']));
							
							$unm=$this->datamodel->getusernamebyid($pt['userid']);
							 echo $unm;
							 ?>
							<div class=" metabtm meta">
                            <a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                          <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
					else { echo base_url().'assert/images/User_Profile_Pic_Icon.png'; }?>" style="width:30px;border-radius: 10px;display: inline-block;"></a>
                    <p style="display:inline-block; padding:5px"><a href="<?= base_url()?>userprofile/<?= $unm->username?>"><?php if($pt['userid']!='0') echo $photox[0]->fullname; else echo 'Admin'?></a></p></div>
						</a>
                        </div>

                        <?php }}?>
						
					</div>	
				</div>

				

	</div>
	 <div id="newpopup" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 80%;">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body" style="padding: 0px;">
                        <!-- wizard start -->
                        <div class="wizard-container" style="padding-top: 0px;"> 
                            <form action="" method="">
                                <div class="card wizard-card ct-wizard-orange" id="wizard">

                                    <!-- You can switch "ct-wizard-orange"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

                                    <!--<div class="wizard-header">
                                        <h3>
                                            Follow topics that interest you <br>
                                            <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                        </h3>
                                    </div>-->
                                    <ul class="nav nav-pills" style="background-color: #FF9500;">
                                        <li class="active" style="width:100%;"><a href="#about" data-toggle="tab">Follow</a></li>
                                        <!--<li style="width: 33.3333%;" class=""><a href="#account" data-toggle="tab">Account</a></li>-->
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h3 class="info-text">
                                                        Follow topics that interest you <br>
                                                        <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                                    </h3>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group" style="border: 1px solid black; height:415px; overflow: auto;">
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>    
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>    
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>    
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>    
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div> 
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div> 
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>
                                                        <div class="col-sm-2" style="width: 200px;margin: 15px;padding: 10px;border-radius:   10%;border: 1px solid #c0c0c0;">
                                                            <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: url(images/2.jpg);background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="football" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;">Books</p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;">dsad sds dsds dsds d</p>    
                                                        </div>  														
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="tab-pane" id="account">
                                            <h4 class="info-text"> What are you doing? </h4>
                                            <div class="row">
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-radio">
                                                            <input type="radio" name="job" value="Design">
                                                            <div class="icon">
                                                                <i class="fa fa-pencil"></i>
                                                            </div>
                                                            <h6>Design</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-radio">
                                                            <input type="radio" name="job" value="Code">
                                                            <div class="icon">
                                                                <i class="fa fa-terminal"></i>
                                                            </div>
                                                            <h6>Code</h6>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-radio">
                                                            <input type="radio" name="job" value="Develop">
                                                            <div class="icon">
                                                                <i class="fa fa-laptop"></i>
                                                            </div>
                                                            <h6>Develop</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Connect Your Friends To Discuss On Various Topics </h4>
                                                </div>
                                                <div class="col-sm-12">
                                                    <img src="" title="" alt="" style="width:100%;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer" style="margin-top:25px;">
                                        <div class="pull-right">
                                            <input type="button" class="btn btn-next btn-fill btn-warning btn-wd btn-sm" name="next" value="Next" style="">
                                            <input type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm" name="finish" value="Finish" style="display: none;">
                                    </div>
                                        <div class="pull-left">
                                            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm disabled" name="previous" value="Previous">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>	
                                </div>
                            </form>
                        </div>
                        <!-- wizard close -->
                    </div>
                </div>

            </div>
        </div>
		
		
		  <div class="modal fade" id="myModal1" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
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
         </div>
  
		   
<script>
          $("#sorting_div").click(function(){
		  
		  $("#sorting_show_div").toggle();
		  
		  
		  });
</script>

<script> 
			$("#article_buttton").click(function(){
				 $("#dashboard_image_div").toggle();
			 });
    </script>

 <script> 
			$("#update_popup").click(function(){
				 $("#newpopup").modal('show');
			 });
			 
			 $("#visiual_post").click(function(){
				 $("#create_discussion").modal('show');
			 });
			 
			  $("#poll_post").click(function(){
				 $("#newpopup").modal('show');
			 });
			 
			
			  $("#post_quiz").click(function(){
				 $("#newpopup").modal('show');
			 });
			 
			
			   $("#question_post").click(function(){
				 $("#newpopup").modal('show');
			 });
			 
			 
	</script> 
	
	 <!-- Google Analytics Code -->
   <?php include_once("analyticstracking.php") ?>
</body>
</html> 