		<div class="row" style="margin-left:0px;margin-right:0px;">


<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:5px;" id="dashboard_image_div">
					<div class="col-lg-12 col-md-12 col-sm-12" id="container">
						<?php if(isset($post)){
							
							foreach($post as $pt){
								
							?>
						<div class="grid">
                        <?php 
						$hed=str_replace(" ","-",$pt['head']);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						
						?>
                        <a href="<?= base_url()?>postview/<?= $fhed?>/<?= $pt['id']?>" style="text-decoration:none">
							<div class="imgholder">
								<?php
								$pic=$pt['image'];
								 if(file_exists("./assets/zerseynme/$pic")){?>
                                <img src="<?= base_url();?>assets/zerseynme/<?= $pt['image']?>" />
                              
                                <?php } else {?>
                                   <img src="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" />
                                 <?php }?>
                                <p class="card-tag"><?= $pt['maincat']?></p>
							</div>
							<div class="content">
								<div class="like-comment-date">
									<ul class="meta">
                                    <?php 
									$sp= $pt['schedulepost'];
									if($sp!="")
									{
										?>
                          <li style="padding:0px 5px !important"><i class="icon-calendar"></i><?= $pt['schedulepost']?></li>
                                                                          <?php
									}

                                                                          else {
	?>  
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
                                <?php } ?>
                            </ul>
                        <h5 style="text-align:justify"><?= $pt['head']?></h5>
							</div>
							</div>
                            
							<div class=" metabtm meta">
                          <img src="<?php if(($pt['cphto'])){ echo base_url();?>assets/images/merchant/<?php echo $pt['cphto'];} 
					else { echo base_url().'assets/images/merchant/usericon.jpg'; }?>" style="width:30px;border-radius: 10px;display: inline-block;">
                    <p style="display:inline-block; padding:5px"><?php if($pt['userid']!='0' && $pt['fulnm']) echo $pt['fulnm']; else echo 'Admin'?></p></div>
						</a>
                        </div>
                        <?php }}?>
						
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