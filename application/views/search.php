    <script>
		$("#Trending1").click(function(){
			$(".show_div").toogle();
		});
    </script>


	   <div class="row" >
			<!-----middle part-------->
			<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;background:url('images/1.jpg')">
				<div style="width:100%;">
                 <?php  $user=$this->usermodel->where_data('customer',array('userId'=>$user_id->id)); ?>
					
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12" style="background:#FFFFFF;border:solid 1px;">
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" id="Top_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_post_following">Top </br></h4></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 onhover_div" id="Latest_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_post_following">Latest </br>0</h4></div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2 onhover_div" id="People_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_post_following">People</br> 0</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" id="Photos_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4  class="bottom_stip_followers_div">Photos</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" id="Videos_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_followers_div">Videos</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" id="Pages_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_followers_div">Pages</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" id="Places_div" style="border-left: solid 1px;">
					<div class="bottom_stip_post"><h4 class="bottom_stip_followers_div">Places</h4></div>
				</div>
				<div class="col-lg-1 col-md-1 col-sm-1 onhover_div" id="More_div" style="border-left: solid 1px;">
					<div style="height:65px;padding-top: 20px;">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:#777; font-size:20px">
						+ More
						<span class="caret"></span></a>
						<ul class="dropdown-menu" style="background-color: rgba(10, 10, 10, 0.71);">
						  <li><a href="#" class="dropdown_nev">View Profile</a></li>
						  <li><a href="#" class="dropdown_nev">Edit Profile</a></li>
						  <li><a href="#" class="dropdown_nev">Setting</a></li>
						  <li><a href="#" class="dropdown_nev">Login</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:5px;" id="dashboard_image_div">
					<div class="col-lg-8 col-md-8 col-sm-8" style="background:#C0D5DA;">
						<div style="width:33%;display:inline-block;background: #fff;border-radius: 8px;margin-top:10px;vertical-align:top;">
								<div style="position: relative;">
								    <div>
									    <img src="<?= base_url()?>assert/images/Artist.jpg" style="width:100%;">
									</div>
									<div style="width:15%;display:inline-block;border:solid 2px;position: absolute;margin-top: -41px;">
									    <img src="<?= base_url()?>assert/images/user.png" style="width:100%;">
									</div>
								</div>
								<div style="float: right;margin-top: 11px;width:100%;">
									 <i class="fa fa-cog fa-2x" style="margin-left: 50%;vertical-align: middle;"></i>
									<button class="btn btn-default following_div" style="margin-left: 5%;"><i class="fa fa-user-plus"></i>&nbsp;Follow</button>
							    </div>
								<div>
									<p>User name</p>
									<p>image discription</p>
								</div>
						</div>
						<div style="width:33%;display:inline-block;background: #fff;border-radius: 8px;margin-top:10px;vertical-align:top;">
							<div style="position: relative;">
								<div>
									<img src="<?= base_url()?>assert/images/Artist.jpg" style="width:100%;">
								</div>
								<div style="width:15%;display:inline-block;border:solid 2px;position: absolute;margin-top: -41px;">
									<img src="<?= base_url()?>assert/images/user.png" style="width:100%;">
								</div>
							</div>
							<div style="float: right;margin-top: 11px;width:100%;">
								 <i class="fa fa-cog fa-2x" style="margin-left: 50%;vertical-align: middle;"></i>
								<button class="btn btn-default following_div" style="margin-left: 5%;"><i class="fa fa-user-plus"></i>&nbsp;Follow</button>
							</div>
							<div>
								<p>User name</p>
								<p>image discription</p>
							</div>
						</div>
						<div style="width:33%;display:inline-block;background: #fff;border-radius: 8px;margin-top:10px;vertical-align:top;">
							<div style="position: relative;">
								<div>
									<img src="<?= base_url()?>assert/images/Artist.jpg" style="width:100%;">
								</div>
								<div style="width:15%;display:inline-block;border:solid 2px;position: absolute;margin-top: -41px;">
									<img src="<?= base_url()?>assert/images/user.png" style="width:100%;">
								</div>
							</div>
							<div style="float: right;margin-top: 11px;width:100%;">
								 <i class="fa fa-cog fa-2x" style="margin-left: 50%;vertical-align: middle;"></i>
								<button class="btn btn-default following_div" style="margin-left: 5%;"><i class="fa fa-user-plus"></i>&nbsp;Follow</button>
							</div>
							<div>
								<p>User name</p>
								<p>image discription</p>
							</div>
						</div>
					</div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
						<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="padding:0px ">
							<div class="col-lg-12 col-md-12 col-sm-12">	
								<div class="panel-heading">
									<p style="display:inline-block">Trending</p>
									<i class="fa fa-home fa-2x" style="display:inline-block" id="Trending1"></i>
									<i class="fa fa-university fa-2x" style="display:inline-block" id="Trending2"></i>
									<i class="fa fa-home fa-2x" style="display:inline-block" id="Trending3"></i>
									<i class="fa fa-home fa-2x" style="display:inline-block" id="Trending4"></i>
									<i class="fa fa-video-camera fa-2x" style="display:inline-block" id="Trending5"></i>
								</div>
							</div>
	                        <div class="col-md-12" style="padding:5px; margin-top:10px" class="show_div">
							<div style="width:100%;">
								<p style="width:20%;display:inline-block;vertical-align:top">state name</p>
								<p style="width:78%;display:inline-block;vertical-align:top">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam posuere mauris justo, eu sollicitudin mauris auctor a. Suspendisse eu urna id mi varius posuere ac at ante</p>
							</div>
							<div style="width:100%;">
								<p style="width:20%;display:inline-block;vertical-align:top">state name</p>
								<p style="width:78%;display:inline-block;vertical-align:top">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam posuere mauris justo, eu sollicitudin mauris auctor a. Suspendisse eu urna id mi varius posuere ac at ante</p>
							</div>
							<div style="width:100%;">
								<p style="width:20%;display:inline-block;vertical-align:top">state name</p>
								<p style="width:78%;display:inline-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam posuere mauris justo, eu sollicitudin mauris auctor a. Suspendisse eu urna id mi varius posuere ac at ante</p>
							</div>
							<div style="width:100%;">
								<p style="width:20%;display:inline-block;vertical-align:top">state name</p>
								<p style="width:78%;display:inline-block;vertical-align:top">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam posuere mauris justo, eu sollicitudin mauris auctor a. Suspendisse eu urna id mi varius posuere ac at ante</p>
							</div>
					        </div>
						</div>
					</div>	
    			</div>
	    </div>