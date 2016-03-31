<style>

</style>

<!--<script type="text/javascript" src="<?=base_url()?>assets/js/jsDatePick.min.1.3.js"></script>-->
<!--<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/css/jsDatePick_ltr.min.css" />-->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css" />
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript">
    var baseurl='<?=base_url()?>';
</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/pages/viewMap.js"></script>
<!--mukesh-->
<div class="row">
		<div class="large-6 columns large-offset-3">
			<div id="firstModal" class="reveal-modal" data-reveal>
				<div class="row">
				<div class="large-12 columns">
				<h3>Write a recommendation for Jet Black and make their day!</h3>
				</div>
				<div class="large-12 columns text-center">
				<img src="<?=base_url();?>assets/images/modal.jpg">
				</div>
				<div class="large-12 columns log-in-row">
				<textarea placeholder="Recommendation"></textarea>
				</div>
				<div class="large-12 columns log-in-row">
				<a href="" class="button secondary">Submit</a>
				</div>
				<a class="close-reveal-modal radius-close1" id="closeRecommendation">&#215;</a>
				</div>
			</div>
		</div>
</div>

							<div class="row">
								<div class="large-4 medium-12 small-12 columns large-offset-4">
									<div id="employeeModal" class="reveal-modal" data-reveal style="z-index:999999999;top:1px;" >
											<div class="row">				
											<div class="large-12 columns">
											<h3><strong>Employee List</strong></h3>
											</div>				
											</div>	
											<div class="row">
											<img id="loading-image" src="<?=base_url();?>assets/images/ajax-loader.gif" class="modalPreloder" style="display:none">
											<div class="large-12 columns">									
												<select style="margin-left:11px;width:135px" id="selectEmployee">
												<option value="0">Select employee</option>
												<?php if(isset($merchantRecord[0]['merchantId']))
														{
															$employeeRecord=$this->usermodel->findEmployeeNameById($merchantRecord[0]['merchantId']);
															foreach($employeeRecord as $value)
																{  ?>
																<option value="<?=$value['user_id']?>">
																<?php echo $value['name'];
																?></option>
														<?php	}
														}
												?>
												</select>												
												<div style="color:red;display:none;padding-left:10px" id="noSelectEmploee">Please select employee</div>
											</div>	
											<div class="large-12 columns">
											<!--<button type="button" name="bestSearch" id="bestSearch" class="button secondary log-in-row right">Submit</button>-->
											</div>	
											</div>
											<a class="close-reveal-modal radius-close" id="closeEmployeeModal"><div class="text-center">&#215;</div></a>
									</div>
								</div>
							</div>
							
					<!--mukesh-->
<div class="main-content-top">
	<div class="main-wrapper">	
		<div class="row">
			<?php 
					if(!empty($merchantRecord))
					{
						$result=$this->usermodel->findRating($merchantRecord[0]['merchantId']);
				?>
			<div class="large-3 columns">
			<div class="round-frame">
			<img src="<?=base_url();?>assets/images/merchant/<?php if(!empty($merchantRecord[0]['photo']))
					{ 
						echo $merchantRecord[0]['photo']; 
					}
					else
					{ 
						echo 'usericon.jpg'; 
					} ?>" style="width:100%">
			<a href="#" class="small button"><span class=" icon-lightbulb"></span>Recommend</a>&nbsp;
			<a href="#" class="small button"><span class=" icon-lightbulb"></span>49</a>
			<a href="#" class="small button" title="Rating=<?=$result?>"><span class=" icon-star left"></span><div class="left" style="font-size: 13px;"><?php echo $result;?></div>/5</a>
			<input type="hidden" id="getMerchant" value="">
			<input type="hidden" id="sessionIdValue" value="<?php if($this->session->userdata('user_id')){ echo $this->session->userdata('user_id'); }?>">
			<div class="clearfix icon"></div>
			<div class="left">
			<div class="grid_4 your-rating rating-widget ratings-wrapper  rating-widget-res_112288" data-res_id="112288" data-rating-for="restaurant" data-review_id="">
				<div class="rating-top">
					<div class="grey-text ttupper bold left">Your Rating</div>
					<div class="rating-widget-num right hidden" id="ratingValue0" data-original-rating-num="-" style="
					<?php 
					if(!empty($result))
					{ echo 'display: block'; } 
					else { echo 'display: none'; } ?>"><?php echo $result;?>
					</div>
				</div>
				<div class="rating-widget-stars left">
                <div class="rating-cls user_starssel_0" id="user_starssel_0" data-originalclass="user_starssel_0" data-rating="0">
				<a id="rating01" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="1.0" data-original-title="1.0" class="completeRating">&nbsp;</a>
				<a id="rating02" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="1.5" data-original-title="1.5" class="completeRating">&nbsp;</a>
				<a id="rating03" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="2.0" data-original-title="2.0" class="completeRating">&nbsp;</a>
				<a id="rating04" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="2.5" data-original-title="2.5" class="completeRating">&nbsp;</a>
				<a id="rating05" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="3.0" data-original-title="3.0" class="completeRating">&nbsp;</a>
				<a id="rating06" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="3.5" data-original-title="3.5" class="completeRating">&nbsp;</a>
				<a id="rating07" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="4.0" data-original-title="4.0" class="completeRating">&nbsp;</a>
				<a id="rating08" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="4.5" data-original-title="4.5" class="completeRating">&nbsp;</a>
				<a id="rating09" data-num="<?=$merchantRecord[0]['merchantId']?>" data-hover-rating="5.0" data-original-title="5.0" class="completeRating">&nbsp;</a>
                </div>
                </div>
			</div>
			</div>
			<!--<i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i>Rating-->
			<div class="clearfix icon"></div>
			<P>Price :
			<br>
			Reviews :
			</P>
			
			</div>
			</div>        
			<div class="large-5 columns">
				<h2><?=$merchantRecord[0]['name']?></h2>
				<P><?=$merchantRecord[0]['description']?></P>
				<a href="#" class="button radius"><i class="icon-envelope"></i>Message Me</a>
				<p class="custom-information">View Contact Info</p>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
				<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
				
				<a class="button right">Book Me</a>
				
			</div>
			<?php } ?>
			<div class="large-4 columns">
				
				<p><iframe src="http://www.facebook.com/plugins/like.php?app_id=527890870664757&amp;href=http://zersey.com/<?php echo $_SERVER['REQUEST_URI'];?>/&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35" scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:450px; height:35px;" allowTransparency="true"></iframe>&nbsp;
				<a href="https://www.facebook.com/sharer/sharer.php?u=http://zersey.com/<?php echo $_SERVER['REQUEST_URI'];?>" class="small button social-icon-facebook" class="small button social-icon-facebook"><i class="icon-share"></i>Share</a></p>
			</div>  
		</div>
	</div>		
	</div>
	<!-- End Main Content Top -->
	<div class="main-wrapper">
		<div class="row">
				<div class="large-12 columns">
					<div class="title-block">					
						<h5>Slideshow</h5>
						<div class="divider"><span></span></div>
						<div class="clearfix"></div>			
					</div>
					<div class="partners-block">
						<ul id="logo_slide">
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/1.jpg" alt="Envato" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/2.jpg" alt="Home Energy" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/3.jpg" alt="Goodwawes" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/4.jpg" alt="Graphicriver" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/5.jpg" alt="DiagBlock" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/6.jpg" alt="Google" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/3.jpg" alt="Goodwawes" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/1.jpg" alt="Envato" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/4.jpg" alt="Graphicriver" /></li>
							<li><img class="photo" src="<?=base_url();?>assets/images/demo/doctors/5.jpg" alt="DiagBlock" /></li>
						</ul>
						<div class="clearfix"></div>
						<a class="prev" id="slide_prev2" href="#"><img src="<?=base_url();?>assets/images/arrow_left.png" alt="Previous" /></a>
						<a class="next" id="slide_next2" href="#"><img src="<?=base_url();?>assets/images/arrow_right.png" alt="Next" /></a>
					</div>
				</div>
			</div>
	<div class="row main-content">
	
    <div class="large-12 columns">
               
      <div class="row"><!-- Row -->
        <div class="large-9 columns widgets side-widgets">         
			<ul class="breadcrumbs custom-margin">
						<li><a href="#"><strong>Services</strong></a></li>
						<li><a href="#">LookBook</a></li>
						<li><a href="reviews-comments.html">Reviews</a></li>
						<li><a href="<?=base_url()?>showMap">Map</a></li>
			</ul>
			<!--Appointment-->
<img id="appontmentPreloder" src="<?=base_url();?>assets/images/ajax-loader.gif" style="display:none" class="imageLoder">
<div id="appointmentCalendar" style="display:none">
<input type="hidden" id="startDate" value="4/25/2014"/>
<input type="hidden" id="endDate" value="4/25/2014"/>
<input type="hidden" id="firstTime" value=""/>
<input type="hidden" id="merChantId" value="<?php if(isset($merchantRecord[0]['merchantId'])){ 
echo $merchantRecord[0]['merchantId']; }?>"/>

	<div id="appointmentFormHolder" class="holder hide" style="left: 5px; top:55px; width:98%; height: 490px; z-index:501;">
        
            <form method="POST" id="appointmentForm" class="full" action="/schedule/book/105535/submit/online/">
        
            <input type="hidden" name="callback" value="bookingSuccessful">
            <input type="hidden" name="appointment_date" id="appointment_date" value="2014-05-23">
            <input type="hidden" name="service_list" id="appointment_service" value="594704">
            <input type="hidden" name="voucher" id="id_voucher_code">
            <input type="hidden" name="page_ref" id="id_page_ref" value="hp">
            <input type="hidden" name="page_ref_query" id="id_page_ref_query" value="">
            <input type="hidden" name="page_ref_index" id="id_page_ref_index" value="">
            <input type="hidden" name="is_new_client" id="id_is_new_client" value="0">
            <input type="hidden" name="card_to_use" id="id_card_to_use" value="">
            <ul class="full">
                <li class="conf_msg full" style="margin-bottom: 0;">
                    <div class="nudgeLeft" style="margin-top:0.4em;font-size:16px;padding:0.5em 1.5em;width:92%;line-height: 1.6em;text-align: center;">
                        Service: <span id="msg_service" class="readable"></span>
                        <br>
                        When: <span class="inlineblock"><span id="msg_date">Friday May 23</span> at <span id="msg_time">3:15pm</span>
                        <span class="close teal" style="color:#1eab9c; cursor: pointer; font-size:.8em;">change</span>
                        </span>
                        <select class="hide" name="start_time" id="start_time"><option value="15:15">03:15</option></select><br>
                        Service Price: <span id="id_concierge_cost_msg">$0.00</span><br>
                        
                    </div>
                </li>
                
                    <li class="conf_msg full" style="margin-bottom: 0.4em;">
                        <div class="nudgeLeft" style="text-align:center; padding: 1em 0 0 1.5em; color: #333333;">
                            Is this your first time visiting Meghan Doyle?
                            <input type="radio" name="attribution_new_client_answer" value="1" style="margin-left:1em;">&nbsp;Yes
                            <input type="radio" name="attribution_new_client_answer" value="2" style="margin-left:1em;">&nbsp;No
                            <input type="radio" name="attribution_new_client_answer" value="3" checked="checked" style="display: none;">
                        </div>
                    </li>
                
                <li class="full finalStep" style="margin-top:15px;">
                <label style="color: #898989;font-size: 14px; " class="isToYouFalse">Have a message for Meghan Doyle?
                    <br>
                </label>
                <label style="color: rgb(137, 137, 137); font-size: 14px; display: none;" class="isToYouTrue">Please give us your address so Meghan Doyle can come to you!</label>
                <textarea name="client_note" id="client_note" class="clear" style="width:87%; height:70px; margin-top:.5em;border:1px solid #888;"></textarea>
                </li>
                <li style="margin:15px; float:none; font-size:14px; color:rgb(137,137,137);" class="finalStep finalStep2">
                    <div class=" isToYouTrue" style="color: rgb(137, 137, 137); display: none;">
                    Promotion code <input style="padding:7px; margin-left:15px;" type="text" name="referral_code" value="">
                    </div>
                </li>
                
                <li class="full center finalStep finalStep2">
                    <input type="submit" id="apptFormSubmitButton" value="Book it!" class="tealButton" style="background-color: #D8F0F0;cursor:pointer;font-size:18px;margin-left: 37%;">
                </li>
            </ul>
        </form>
    </div>
	
			
<div id="appointment" class="schedule" style="">
<h3><div class="left" style="margin-right:4px">Book an appointment with </div><div id="withMeet"></div></h3>
<div style="margin-top:5px; margin-left:15px;">
      <form id="filterForm" action="#" onsubmit="return false;">
            <ul class="filter" style="padding: 0px; margin: 0px;">
                <li style="float: left; padding: 0; margin: 0;">
                    <div style="position:relative;">
					<input id="appointmentDate" name="appointmentDate" class="appointmentDate" type="text" style="font-size: 17.5px; padding: 0.1em 0.25em 0em; z-index:0;" value=""><img src="<?=base_url()?>assets/images/img/calendar.png" title="Open calendar" class="inputExtension" style="position: absolute;right:4px;top:4px;"></div>
                </li>
                <li id="select_two_container">
                    
                    <select id="appointmentServiceSelect" class="hide" name="appointmentServiceSelect" style="margin-top:0; font-size:1.2em; height:2em; padding:0.3em; max-width:25em;">
                        
                    </select>

            <div class="hide" id="dropdown_icon"><div class="inlineblock ClickToggleTarget addServicesSprite" style="vertical-align:text-top"></div></div>
            <div class="hide" id="dropdown_icon_multi"><div class="inlineblock ClickToggleTarget plusImage"></div></div>
            <div class="inlineblock ClickToggleContainer BookingMenu middle" style="font-size:1.5em"> Booking: <div class="inlineblock ClickToggle" style="background-color:white; border:1px solid #ccc; max-width:25em; font-size: 17.5px; min-width: 0; padding: 0.1em 0.25em 0em;" id="select_multiple_two_open"><div class="inlineblock middle" id="service_name" style="font-size:.8em;">Consultation (15 minutes)</div> <div class="inlineblock ClickToggleTarget addServicesSprite" style="vertical-align:text-top"></div></div></div>

            <div style="display: none;" id="select_multiple_two_options" class="select_multiple_container">
                <div class="select_multiple_header select_multiple_two_close">CHOOSE THE SERVICES YOU WANT TO BOOK</div>
                <div style="max-height:200px; overflow-x:hidden; overflow-y:scroll; height:200px; background-color:white;">
                    <table cellspacing="0" cellpadding="0" class="select_multiple_table" width="100%">
                     
                            <tbody>
                            <tr class="even">
                                <td class="select_multiple_name ">Quarter Head Highlight (15 mins)</td>
                                <td class="select_multiple_checkbox"><input type="checkbox" name="service_selector" class="service_selector" value="630789" lang="15-0-0"> </td>
                            </tr>
                            <tr class="odd">
                                <td class="select_multiple_name ">Single Process Retouch (30 mins)</td>
                                <td class="select_multiple_checkbox"><input type="checkbox" name="service_selector" class="service_selector" value="344089" lang="30-0-0"> </td>
                            </tr>
                            <tr class="even">
                                <td class="select_multiple_name ">Temporary Color/Chalk (30 mins)</td>
                                <td class="select_multiple_checkbox"><input class="service_selector" type="checkbox" name="service_selector" value="1117219" lang="30-0-0"> </td>
                            </tr>
                            <tr class="odd">
                                <td class="select_multiple_name ">Fringe Trim (15 mins)</td>
                                <td class="select_multiple_checkbox"><input class="service_selector" type="checkbox" name="service_selector" value="344090" lang="15-0-0"> </td>
                            </tr>
                           
                    </tbody></table>
                  </div>
                <div class="select_multiple_submit"><input type="button" value="Done" class="select_multiple_two_close" style="width:100%;"></div>
            </div>

            <div id="id_voucher_service_name" class="hide inlineblock middle" style="display: none;">
                Booking: <div id="id_service" class="inlineblock"></div>
            </div>
        </li>
        <li id="cta" class="clear" style="display: none;">
             <span class="upper">Pick a time that works for you below</span>
        </li>
      </ul>
     </form>
    </div>
	<div class="completeClass" id="completeTime">0:00-0:00</div>
	</div>
<div class="action" id="appointmentAction" style="width:96%;height:100%;position:absolute;top:163px;">
            <ul class="days clear">
                <li>
                    <span id="scrollDaysUp" class="scroll up link"><span class="sprite upArrow"></span></span>
                </li>
                <li>
                    <ol class="daysOL">
						<li><span><?php echo date("D M j");?></span></li>
						<li><span><?php echo date('D M j');?></span></li>
						<li><span>Fri 04/25</span></li>
						<li><span>Sat 04/26</span></li>
						<li><span>Sun 04/27</span></li>
						<li><span>Mon 04/28</span></li>
						<li><span>Tue 04/29</span></li>
					</ol>
                </li>
                <li>
                    <span id="scrollDaysDown" class="scroll down link"><span class="sprite downArrow"></span></span>
                </li>
            </ul>
            <ul class="hours">
                <li>
					<input type="hidden" id="finalTime">
                    <table class="grid" style="width: 81%;" id="dateChange">
                        <thead>
                            <tr>
                                
                                    <th colspan="4">8a</th>
                                
                                    <th colspan="4">9</th>
                                
                                    <th colspan="4">10</th>
                                
                                    <th colspan="4">11</th>
                                
                                    <th colspan="4">12p</th>
                                
                                    <th colspan="4">1</th>
                                
                                    <th colspan="4">2</th>
                                
                                    <th colspan="4">3</th>
                                
                                    <th colspan="4">4</th>
                                
                                    <th colspan="4">5</th>
                                
                                    <th colspan="4">6</th>
                                
                                    <th colspan="4">7</th>
                                
                                    <th colspan="4">8</th>
                                
                                    <th colspan="4">9</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 								
									$k=0;
									$m=0;
									for($i=0;$i<14;$i++)
									{ 
										if(($i%2)!=0)	
										{
										date_default_timezone_set("Asia/Kolkata");
										if(isset($_POST['date']))
										{
											if($_POST['option']=='scrollDaysUp')
											{ 
											$Current=(strtotime($_POST['date'].date('H:i:s'))-(60*60*24));
											$notSecond=(strtotime($_POST['date'])-(60*60*24));
											$day=($notSecond-((6-$k)* 24 * 60 * 60));
											}
											if($_POST['option']=='scrollDaysDown')
											{ 
											$Current=(strtotime($_POST['date'].date('H:i:s'))+(60*60*24));
											$notSecond=(strtotime($_POST['date'])+(60*60*24));
											$day=($notSecond+($k* 24 * 60 * 60));
											}
										}
										else
										{
											$Current=(strtotime(date('Y-m-d H:i:s')));
											$notSecond=(strtotime(date('Y-m-d')));
											$day=($notSecond+($k* 24 * 60 * 60));
										}
							?>	
                                <tr lang="0" class="gridRow data" id="
								<?php echo $previousCurrent=(strtotime(date('Y-m-d H:i:s')));?>">
										<?php $time=7;
										for($j=0;$j<56;$j++) 
										{	
											if($j%4==0)
											{
												$time++;
											}
											if($j%4==0)
											{ $flag=0;
										?>
											
                                       <td class="t00 
									   <?php $dateTime=$previousCurrent; 
											if(($day+($time*60*60))<$dateTime)
											{	
												echo 'past'; 
											}
											else 
											{ 
												echo 'available';
											}
											
											$resultDate=$this->usermodel->appointmentByDate($day+($time*60*60)+(0*60));
											if(!empty($resultDate))
											{
											$result=$this->usermodel->findduration($resultDate['serviceId']);
											$starttime=strtotime($resultDate['appointDate'].$resultDate['appointTime']);
											$endtime=$starttime+(($result[0]['duration']-15)*60);
											if(($endtime>=($day+($time*60*60)+(0*60)))&&($starttime<=($day+($time*60*60)+(0*60))))
											{ echo 'done'; }
											}	
											
									   ?>" id="<?php echo $day+($time*60*60);?>" title="<?=$time?>:00">&nbsp;</td>
									<?php 	}
											if($j%4==1)
											{	?>
										<td class="
									   <?php $dateTime=$previousCurrent; 
											if(($day+($time*60*60))<$dateTime)
											{	echo 'past'; }
											else { echo 'available'; }
											$resultDate=$this->usermodel->appointmentByDate($day+($time*60*60)+(15*60));
											if(!empty($resultDate))
											{
											$result=$this->usermodel->findduration($resultDate['serviceId']);
											$starttime=strtotime($resultDate['appointDate'].$resultDate['appointTime']);
											$endtime=$starttime+(($result[0]['duration']-15)*60);
											if(($endtime>=($day+($time*60*60)+(15*60)))&&($starttime<=($day+($time*60*60)+(15*60))))
											{ echo 'done'; }
											}	
									   ?>" id="<?php echo $day+($time*60*60)+(15*60);?>" title="<?=$time?>:15">&nbsp;</td>
									<?php	}
											if($j%4==2)
											{	
										?>
										<td class="t30 
									   <?php $dateTime=$previousCurrent; 
											if(($day+($time*60*60))<$dateTime)
											{	echo 'past'; }
											else if($flag==0)
											{ echo 'available'; }	
											$resultDate=$this->usermodel->appointmentByDate($day+($time*60*60)+(30*60));
											if(!empty($resultDate))
											{
											$result=$this->usermodel->findduration($resultDate['serviceId']);
											$starttime=strtotime($resultDate['appointDate'].$resultDate['appointTime']);
											$endtime=$starttime+(($result[0]['duration']-15)*60);
											if(($endtime>=($day+($time*60*60)+(30*60)))&&($starttime<=($day+($time*60*60)+(30*60))))
											{ 
											echo 'done';
											}
											}
									   ?>" id="<?php echo $day+($time*60*60)+(30*60);?>" title="<?=$time?>:30">&nbsp;</td>
									<?php 	} 
											if($j%4==3)
											{
									?>
										<td class="
									   <?php $dateTime=$previousCurrent; 
											if(($day+($time*60*60))<$dateTime)
											{	echo 'past'; }
											else { echo 'available'; }	
											$resultDate=$this->usermodel->appointmentByDate($day+($time*60*60)+(45*60));
											if(!empty($resultDate))
											{
											$result=$this->usermodel->findduration($resultDate['serviceId']);
											$starttime=strtotime($resultDate['appointDate'].$resultDate['appointTime']);
											$endtime=$starttime+(($result[0]['duration']-15)*60);
											if(($endtime>=($day+($time*60*60)+(45*60)))&&($starttime<=($day+($time*60*60)+(45*60))))
											{ echo 'done'; }
											}
									   ?>" id="<?php echo $day+($time*60*60)+(45*60);?>" title="<?=$time?>:45">&nbsp;</td>
									<?php 	} ?>   
									
									<?php } 
									?>
                                </tr>
								<?php $k++; }
								else{
								?>
                                <tr class="gridRow padding">
									<?php 
									for($j=1;$j<=56;$j++)
										{ ?>
											<td>&nbsp;</td>
                                   
									<?php } ?> 
                                   
                                </tr>
                            <?php }} ?>
                                
                        </tbody>
                    </table>
                </li>
            </ul>
          <div class="right" style="padding-right:34px">
            <span class="left available timeBlock"></span><div class="left nudgeRight" style="margin: .25em; color:#333;"> = available to book online</div>
             <span class="left nudgeLeft timeBlock mustCallToBook"></span><div class="left nudgeRight" style="margin: .25em; color:#333;"> = call 209-598-4559 to book</div>
          </div>
          <div class="footer clear">
            <!-- <span class="link">skip to the next available appt</span> |  --><span class="link waitListLink">add yourself to the wait list</span>
          </div>
          </div>
			</div>	
			<!--/Appointment>	
				
            <!-- Sidebar Navigation -->      
					<div class="section-container" id="bookSection" data-section> 
					
					<?php  //	echo'<pre>';
							//  print_r($services);
						if(!empty($services))
						{  foreach($services as $value)
							{
					?>
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;">
					<div class="book-box">
					<div class="custom-box">
					<h4>
					<?php $result=$this->usermodel->findNameBusiness($value['businessCategory']);
						  echo $result;
					?></h4>					
					</div>
					<?php $result=$this->usermodel->findServiceByCategoryId($value['businessCategory'],$value['merchantId']);
						if(!empty($result))
						{
						  foreach($result as $values)
						  {
					?>
					
					<div class="large-6 columns">
					<p><span class="default-color"><?=$values['serviceName']?></span><br>
					<?=$value['description']?></p>
					</div>
					<div class="large-2 columns" style="height:56px;">
					<p class="default-color"><?=$values['price']?></p>
					</div>
					<div class="large-2 columns">
					<p class="default-color"><?=$values['duration'].' '?>min.</p>
					</div>
					<div class="large-2 columns">
					<a href="#" class="button secondary bookMe" lang="<?=$values['duration']?>">Book Me</a>
					</div>
					<?php }} ?>
					</div></div>
					<?php } } ?>
					
					<!--recommendation cuts-->
					<div class="section-container level accordion" data-section="" data-section-resized="true" style="min-height: 0px;top:0px"> 
					</div>
					<div class="book-box">
					<div class="custom-box">
					<h4>Recommendations</h4>					
					</div>
					<div class="large-12 columns ">
					<h4 class="offTxt right"><a  id="recommendation">Write a Recommendation</a></h4>	
					</div>
					<div class="large-1 columns">
					<p><img src="<?=base_url();?>assets/images/avatar_100_1x.png"></p>
					</div>
					<div class="large-1 columns">
					<p class="default-color">Rachel K.<br>2/26/14</p>
					</div>
					<div class="large-10 columns">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
					</div>					
					</div>
					<div class="book-box">
					<div class="large-1 columns">
					<p><img src="<?=base_url();?>assets/images/avatar_100_1x.png"></p>
					</div>
					<div class="large-1 columns">
					<p class="default-color">Karmah E.<br>2/03/14</p>
					</div>
					<div class="large-10 columns">
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
					</div>					
					</div>
					
            </div>
				
            <!-- End Sidebar Navigation -->                                     
        </div>
         <div class="large-3 columns widgets side-widgets">         
          <h4>Contact</h4>                 
            <!-- Sidebar Navigation -->      
            <div class="section-container level accordion" data-section>        
              <section class="section active">

                <p>The Plum Organic Beauty<br>View Contact Info</p>
				<table>
			<tbody>
			<tr>
			  <td>Tuesday</td>
			  <td>12.00pm</td>
			  <td>-</td>
			   <td>8.00pm</td>
			 
			</tr>
			<tr>
			  <td>Wednesday</td>
			  <td>11.00am</td>
			  <td>-</td>
			  <td>8.00pm</td>
			</tr>
			<tr>
			  <td>Thursday</td>
			  <td>12.00pm</td>
			  <td>-</td>
		   <td>8.30pm</td>
			</tr>
			<tr>
			  <td>Friday</td>
			  <td>3.00pm</td>
			  <td>-</td>
		   <td>8.00pm</td>
			</tr>
			<tr>
			  <td>Sunday</td>
			  <td>11.00am</td>
			  <td>-</td>
		   <td>8.00pm</td>
			</tr>
		  </tbody>
		</table>
	<div class="widgets">	
		<div id="test2" class="gmap3" style="width:257px;height:285px"></div>
				<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28005.86074612837!2d77.09795154999999!3d28.667724399999972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04709a55ca61%3A0x733c78dcf34281ce!2sPaschim+Vihar!5e0!3m2!1sen!2sin!4v1397556382610" width="100%" height="250" frameborder="0" style="border:0"></iframe>-->				
	</div>
	<div class="widgets">
	<h5 class="verticalLine-bottom">Online</h5>
	<p>My Website<br>Blog</p>
	<p><a href="#"><i class="icon-twitter left"></i></a>&nbsp;<a href="#"><i class="icon-google-plus left"></i></a>&nbsp;<a href="#"><i class="icon-linkedin left"></i></a></p>
	</div>
	<div class="widgets">
	<h5 class="verticalLine-bottom">Twitter</h5>

	
	</div>	
              </section>            
            </div>
            <!-- End Sidebar Navigation -->                                     
        </div>
		
      </div><!-- End Row -->
    </div>
  </div>
	
  <!-- End Main Content --> 
	</div> 
	
	<script>
//jQuery.noConflict();

jQuery(window).load(function() {
	jQuery('#slider').nivoSlider({ controlNav: false});	
});
jQuery(document).ready(function() {
	jQuery('input.datepicker').Zebra_DatePicker();
	jQuery("#carousel-type1").carouFredSel({
		responsive: true,
		width: '100%',
		auto: false,
		circular : false,
		infinite : false, 
			items: {visible: {min: 1,max: 4},
		},
		scroll: {
			items: 1,
			pauseOnHover: true
		},
		prev: {
			button: "#prev2",
			key: "left"
		},
		next: {
			button: "#next2",
			key: "right"
		},
		swipe: true
	});
	
	jQuery(".work_slide ul").carouFredSel({
		circular: false,
		infinite: true,
		auto: false,
		scroll:{items:1},
		items: {visible: {min: 3,max: 3}},
		prev: {	button: "#slide_prev", key: "left"},
		next: { button: "#slide_next",key: "right"}
	});
	jQuery("#testimonial_slide").carouFredSel({
		circular: false,
		infinite: true,
		auto: false,
		scroll:{items:1},
		prev: {	button: "#slide_prev1", key: "left"},
		next: { button: "#slide_next1",key: "right"}
	});
	jQuery("#logo_slide").carouFredSel({
		responsive: true,
		width: '100%',
		circular: false,
		infinite: true,
		auto: false,
		scroll:{items:1},
		items: {visible: {min: 5}},
		prev: {	button: "#slide_prev2", key: "left"},
		next: { button: "#slide_next2",key: "right"}
	});
	
	
});  
	
</script>