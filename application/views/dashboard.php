<?php
session_start();
if (!isset($_SESSION["visits"]))
{
        $_SESSION["visits"] = 0;
}
    $_SESSION["visits"] = $_SESSION["visits"] + 1;

if(!isset($end))
{
	  /*if(!isset($post1)|| $_SESSION["visits"] <= 1)
{
?>

	<div id="myModal1" class="modal fade" role="dialog" data-backdrop="static"  >
            <div class="modal-dialog1">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
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
                                    <!--<ul class="nav nav-pills">
                                        <li class="active" style="width: 100%;"><a href="#about" data-toggle="tab">Follow</a></li>
                                        <li style="width: 33.3333%;" class=""><a href="#account" data-toggle="tab">Account</a></li>
                                        <li style="width: 33.3333%;" class=""><a href="#address" data-toggle="tab">Invite</a></li>
                                    </ul>-->
									<fieldset>
									 <form method="post" action="<?=base_url()?>users/categoryfollow">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h3 class="info-text">
                                                        Follow Categories that interest you <br>
                                                        <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                                    </h3>
                                                </div>
                                                <div class="col-sm-12" style="margin-top: -20px;">
                                                    <div class="form-group" style="border: 1px solid black; height:415px; overflow: auto;">
													<!--Run a loop to generate category boxes with this code inside it to create the box-->
                                                       <?php 
				$result=$this->datamodel->dashboadcats();
				if($result){ foreach($result as $rts){
					
					$result1=$this->datamodel->catnamebyname($rts['maincat']);
					$res=$result1[0]['category'];
					if($res == "")
					{
						continue;
					}
				$uid=$this->session->userdata['user_id'];
								$pro=$this->datamodel->selectfollow($res,$uid);
													$folid=$pro[0]['fcid'];
								
                  ?>

														
                                                        <div class="col-sm-2" style="width: 200px;margin:15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
                                                       
				<input type="hidden" id="uid" name="uid" value="$uid"/>
				
															 <input type="hidden" id="cid" name="cid" value="<?= $result1[0]['category']?>"/>
														   <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: <?php echo base_url().'assert/images/Board_Profile_Pic_Icon.png';?>;background-position: 100% 100%;">
                                                                 <input type="checkbox" name="sport[]" value="<?= $result1[0]['category']?>" /> 
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;"><?= $result1[0]['category']?></p>
                                                          
                                                        
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;"></p>    
                                                      
                                                        </div>
														<?php }}?>   
													<!--code for 1 category box ends here-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                 
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
                                    <div class="wizard-footer">
									
									
                                        <div class="pull-right" style="margin-top: -20px;">
                                            <input type="button" class="btn btn-next btn-fill btn-warning btn-wd btn-sm" name="next" value="Next" style="">
                                            <input type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm" name="finish" value="Finish">
                                        </div>
                                        <div class="pull-left">
                                            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm disabled" name="previous" value="Previous">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>	
                                    </form>
									</fieldset>
									<fieldset>
									<form method="post" action="<?=base_url()?>users/userfollow">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h3 class="info-text">
                                                        Follow any five Users <br>
                                                        <small>This will help us build a custom feed for you as per your interest, Thanks!</small>
                                                    </h3>
                                                </div>
                                                <div class="col-sm-12" style="margin-top: -20px;">
                                                    <div class="form-group" style="border: 1px solid black; height:415px; overflow: auto;">
													<!--Run a loop to generate category boxes with this code inside it to create the box-->
                                                        <?php 
				$resultuser=$this->datamodel->topusers();
				if($resultuser){ foreach($resultuser as $rtsu){
					
					$uid=$rtsu['userid'];
					$usid=$this->session->userdata['user_id'];
					$photox=$this->usermodel->where_data('customer',array('userId'=>$uid));
					$unm=$this->datamodel->getusernamebyid($rtsu['userid']);
					$pro1=$this->datamodel->selectuserfollow($uid, $usid);
					$follid=$pro1[0]['fuid'];

					 ?>

				
				<input type="hidden" id="uid" name="uid" value="$uid"/>
														
                                                        <div class="col-sm-2" style="width: 200px;margin:15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
															 <input type="hidden" id="cid" name="cid" value="<?= $photox[0]->fullname?>"/>
														   <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: <?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assert/images/User_Profile_Pic_Icon.png'; }?>"; class="follow"; style="width:100%;padding: 5px;background-position: 100% 100%;">
                                                                <input type="checkbox" name="sport[]" value="$photox[0]->fullname" />
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;"><?php if(($photox[0]->fullname)) echo $photox[0]->fullname; else echo "User"?></p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;"></p>    
                                                        </div>
														<?php }}?>   
													<!--code for 1 category box ends here-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                 
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
                                    <div class="wizard-footer">
									
									
                                        <div class="pull-right" style="margin-top: -20px;">
                                            <input type="button" class="btn btn-next btn-fill btn-warning btn-wd btn-sm" name="next" value="Next" style="">
                                            <input type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm" name="finish" value="Finish">
                                        </div>
                                        <div class="pull-left">
                                            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm disabled" name="previous" value="Previous">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>	
                                    </form>
									</fieldset>
									<fieldset>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h3 class="info-text">
                                                        We are building custom feed for you.....<br>
                                                        <small>Thanks!</small>
                                                    </h3>
                                                </div>
                                                <div class="col-sm-12" style="margin-top: -20px;">
                                                    <div class="form-group" style="border: 1px solid black; height:415px; overflow: auto;">
													<!--Run a loop to generate category boxes with this code inside it to create the box-->
                                                       <?php 
				$result=$this->datamodel->dashboadcat();
				if($result){ foreach($result as $rts){
					
					$result1=$this->datamodel->catnamebyname($rts['maincat']);
					$res=$result1[0]['category'];
				$uid=$this->session->userdata['user_id'];
								$pro=$this->datamodel->selectfollow($res,$uid);
													$folid=$pro[0]['fcid'];
								
                  ?>

				<input type="hidden" id="uid" name="uid" value="$uid"/>
														
                                                        <div class="col-sm-2" style="width: 200px;margin:15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
															 <input type="hidden" id="cid" name="cid" value="<?= $result1[0]['category']?>"/>
														   <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image:<?php echo base_url().'assert/images/Board_Profile_Pic_Icon.png';?>;background-position: 100% 100%;">
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;"><?= $result1[0]['category']?></p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;"></p>    
                                                        </div>
				
				</form>
														<?php }}?>   
							
                                                       
                                                        <?php 
				$resultuser=$this->datamodel->topuser();
				if($resultuser){ foreach($resultuser as $rtsu){
					
					$uid=$rtsu['userid'];
					$usid=$this->session->userdata['user_id'];
					$photox=$this->usermodel->where_data('customer',array('userId'=>$uid));
					$unm=$this->datamodel->getusernamebyid($rtsu['userid']);
					$pro1=$this->datamodel->selectuserfollow($uid, $usid);
					$follid=$pro1[0]['fuid'];

					 ?>

				<form method="post" action="<?=base_url()?>users/userfollow">
				<input type="hidden" id="uid" name="uid" value="$uid"/>
														
                                                        <div class="col-sm-2" style="width: 200px;margin:15px;padding: 10px;border-radius: 10%;border: 1px solid #c0c0c0;">
															 <input type="hidden" id="cid" name="cid" value="<?= $photox[0]->fullname?>"/>
														   <label style="margin-bottom: 0px;width: 178px;height: 100px;background-image: <?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assert/images/User_Profile_Pic_Icon.png'; }?>;background-position: 100% 100%;">
                                                                
                                                            </label>
                                                            <p style="width:178px;background-color: #000;color: #fff;opacity: 0.6;text-align: center;margin-bottom: 0px;"><?php if(($photox[0]->fullname)) echo $photox[0]->fullname; else echo "User"?></p>
                                                            <p style="width:178px;margin-bottom: 0px;border: 1px solid #c0c0c0;text-align: center;color: #000;"></p>    
                                                        </div>
														<?php }}?>  
														</form>
													<!--code for 1 category box ends here-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                 
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
                                    <div class="wizard-footer">
									
									
                                        <div class="pull-right" style="margin-top: -20px;">
                                            <input type="button" class="btn btn-finish btn-fill btn-warning btn-wd btn-sm" name="finish" value="Finish">
                                        </div>
                                        <div class="pull-left">
                                            <input type="button" class="btn btn-previous btn-fill btn-default btn-wd btn-sm disabled" name="previous" value="Previous">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>	
									</fieldset>
                                </div>
								
                            </form>
                        </div>
                        <!-- wizard close -->
                    </div>
                </div>
            </div>
        </div>
        <!--<script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>-->
        <!--<script src="js/wizard.js"></script>-->
        <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
        <script type="text/javascript">
            function customCheckbox(checkboxName) {
                var checkBox = $('input[name="' + checkboxName + '"]');
                $(checkBox).each(function () {
                    $(this).wrap("<span class='custom-checkbox'></span>");
                    if ($(this).is(':checked')) {
                        $(this).parent().addClass("selected");
                    }
                });
                $(checkBox).click(function () {
                    $(this).parent().toggleClass("selected");
                });
            }
            $(document).ready(function () {
                customCheckbox("sport[]");
                customCheckbox("car[]");
                customCheckbox("confirm");
            });
			
			$('fieldset:first-child').fadeIn(function() {
	    		$(this).next().fadeOut();
				$(this).next().next().fadeOut();
	    	});
			
			$('.btn-next').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
	    		$(this).next().fadeIn();
	    	});
    	}
    	
    });
    		$('.btn-finish').on('click', function() {
    	var parent_fieldset = $(this).parents('fieldset');
    	var next_step = true;
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
	    		$(this).next().fadeIn();
	    	});
    	}
    	$("#myModal1").modal('hide');

    	
    });
		</script>
		
		<!-- 
		// submit
    $('.registration-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function() {
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
		
		-->
		
		<script>
		 $(document).ready(function () {
		   $("#myModal1").modal('show');
		 });
			</script>

			<?php } ?>
<script>
function video_dv()

	{
		$("#video_url_div").toggle();
	}

</script>

<script src="assert/js/unveil.js"></script>	
<script>
/*$(document).ready(function() {
  $(".imgholder img").unveil();
  $(".imgholder img").unveil(200);
});
</script>
<?php }*/ 
?>

        <?php  if(!isset($post)){ ?>
<script>

last_post_id = <?php $x = end($post1); echo($x ?  $x['publish_id'] : 0) ?>;</script>

<?php }?>

<script src="<?= base_url();?>assert/js/jquery.lazyload.js" type="text/javascript"></script>



<?php
if(!isset($post1))
{
?>


<script>
  //$(".imgholder").lazyload();
  /*$(".imgholder").lazyload({
    threshold : 200
});*/
    
    var page_load_time;
    var feeds_ended = false;
    $(document).ready(function(){
    $(this).scrollTop(0);
    var temp = new Date();
    page_load_time = temp.getTime()/1000;
    setInterval(function(){
            $.ajax({
                type: "GET",
                data: "data="+ page_load_time,
                url:  "<?= base_url()?>users/feeds_new",
                success: function(msg){
                    if(msg!='0')$("#new_posts_link").html(msg + " new posts");
                    else{$("#new_posts_link").html("");}
                }                
            });
    }, 10000);
});


var last_post_id = 0;
var loadingposts = false;
$(document).ready(function(){
//alert("hi");

last_post_id = <?php $x = end($post); echo($x['publish_id']);?>;

//var j=i;
/*$(window).scroll(function() {
    
//alreadyloading = false;
//nextpage = 2;
 
/*$(window).scroll(function() {
    if ($(document).height() == ($(window).height() + $(window).scrollTop())) {
        if (alreadyloading == false) {
            var url ="<?= base_url()?>users/feeds" ;
            alreadyloading = true;

            $("#dashboard_image_div").html();
            $.post(url, function(data) {
               // $("#dashboard_image_div").hide();
                alert(data);
                $('#container').html(data);
                
                alreadyloading = false;
               
            });
        }
    }
});
});*/




    

            $(window).scroll(function() {


        if($(window).scrollTop() == $(document).height() - $(window).height()) {
        //alert("hello");
        //alert(last_post_id);
        
                if(feeds_ended)return;
                if(loadingposts==true)return;   
                loadingposts = true;
            
                
            //alert(25 * i);
        
               $("#dashboard_image_div").append('<img src="<?= base_url()?>assert/images/loading_spinner.gif"  id="loading">');
               
                    $.ajax({
                type: "GET",
                data: "data="+ last_post_id,
                url:  "<?= base_url()?>users/feeds",
                success: function(msg){
                if(msg==null||msg.trim()==""){feeds_ended = true;}
                //alert(msg);      
                //alert(last_post_id);   
                $("#loading").remove();

               $("#dashboard_image_div").append(msg);
               //$(".grid").hide();
               loadingposts = false;
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

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="col-lg-2 col-md-2 col-sm-2 fixed" id="left_div" style="padding:0px;">
				<!--<div class="col-lg-12 col-md-12 col-sm-12" style="border:1px solid red;padding:5px;margin-top:5px;">
					<div class="col-lg-6 col-md-6 col-sm-6" style="padding:0px;">
						<button type="button" class="btn btn-danger">Favorite</button>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<button type="button" class="btn btn-danger">My Post</button>
					</div>
				</div>-->


				<div class="col-lg-12 col-md-12 col-sm-12 follow_div" style="height:495px;">
					<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title">Follow Category</h3></div>
                     <?php 

				$result=$this->datamodel->dashboadcat();
				if($result){ foreach($result as $rts){
					
					$result1=$this->datamodel->catnamebyname($rts['maincat']);
					$res=$result1[0]['category'];
				$uid=$this->session->userdata['user_id'];
								$pro=$this->datamodel->selectfollow($res,$uid);
													$folid=$pro[0]['fcid'];

                  ?>

				
					
                  <form method="post" action="<?=base_url()?>users/categoryfollowByName">  		
			               <input type="hidden" id="uid" name="uid" value="$uid"/>
               <input type="hidden" id="cid" name="cid" value="<?= $result1[0]['category']?>"/>

					<div class="col-md-12" style="padding:5px; margin-top:10px">
						<div class="col-sm-3" style="padding:0px;">
							<a href="<?=base_url()?>category/<?= $result1[0]['category']?>" style="text-decoration:none">
                            <img src="<?php echo base_url().'assert/images/Board_Profile_Pic_Icon.png';?>" class="follow" style="width:100%;"></a>
						</div>
						<div class="col-sm-9" style="margin-top: -8px;padding:0px;">
							<a href="<?=base_url()?>category/<?= $result1[0]['category']?>" style="text-decoration:none"><div class="col-sm-12 catagorynew_txt_dv"><?= $result1[0]['category']?></div></a>
                            <?php
                            if($pro=="0"){
								?>

							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <button type="submit" class="btn btn-follow" name="flw">Follow</button></div>
                                                        <?php
							}
else {
	?>
	<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > 
	   <a href="<?=base_url()?>users/deletefollow/<?= $pro[0]['fcid']?>"  class="btn btn-follow">Unfollow</a>
	</div>
                                                                                    <?php } ?>

						</div>
					</div>
                    </form>
				<?php }}?>	
					<div class="col-sm-12 text-left" style="margin-top:10px;"><a href="<?=base_url()?>allcategory">More...</a></div>
				</div>
				<!--
				<div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:5px;">
					
						<div style="display:inline-block;width:33%;font-size:9px">About Us</div>
						<div style="display:inline-block;width:21%;font-size:9px">Term</div>
						<div style="display:inline-block;width:39%;font-size:9px">Contact Us</div>
					
				</div>
				-->
			</div>
			<!-----middle part-------->
			<div class="col-lg-8 col-md-8 col-sm-8 up_center_div" style="margin-left: 16.66666667%;">
				
				<div class="sharebox col-lg-12 col-md-12 col-sm-12" style="display:none;">
					
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div style="display:inline-block;">
						   <i class="fa fa-pencil-square-o ">&nbsp; Update Status</i>
						</div>
						<p class="icon_text_slash">/</p>
						<div style="display:inline-block;">
						   <a href="#" style="text-decoration:none" data-toggle="modal" data-target="#newpopup"><i class="fa fa-commenting">&nbsp; Post Photo Story</i></a>
						</div>
                        <p class="icon_text_slash">/</p>
						<div style="display:inline-block;">
						   <a href="#" style="text-decoration:none" data-toggle="modal" data-target="#popupeditorl"><i class="fa fa-calendar-plus-o">&nbsp; Post Editorial</i></a>
						</div>
						<!--<p class="icon_text_slash">/</p>
						<div style="display:inline-block;">
						   <i class="fa fa-pie-chart">&nbsp; Post Poll</i>
						</div>
						<p class="icon_text_slash">/</p>
						<div style="display:inline-block;">
						   <i class="fa fa-pencil-square-o">&nbsp;Post Quiz</i>
						</div>-->
					</div>
                    <form method="post" action="<?= base_url();?>users/dplifeupload" enctype="multipart/form-data">
					<div class="col-lg-12 col-md-12 col-sm-12">
					     
						<div style="width:100%;background-color:rgba(255, 255, 255, 0.62); margin-bottom: 10px;">
							<div class="uparrow"></div>
                            <div style="width: 100%;padding:5px;border: 1px solid #cecece;">
								<textarea rows="2" name="upsname" id="upsname" style="width:100%;border: none;margin-bottom: -5px;" placeholder="Write something" required></textarea>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
					    <div class="col-lg-6 col-md-6 col-sm-6" style="text-align:left;vertical-align:middle;">
						    <p style="display: inline-block;vertical-align: middle;">Attach
							<style>
								label.myLabel input[type="file"] {
									position: fixed;
									top: -1000px;
								}
								.btn-primary:hover,.open .dropdown-toggle.btn-primary {
									border-color: #116C67!important;
								background-color: #116C67!important;
									}
								}
                            </style>	
							<label class="myLabel">
								<span class="btn fileinput-button">
									<span>
									<i class="fa fa-camera fa-primary"> <input type="file" name="photo" id="photo" value="Upload Photo" /></i>
									</span>
								</span>
							</label>
							<!--<label class="myLabel"> <span class="btn fileinput-button">
							<span onclick="video_dv()"><i class="fa fa-youtube-play"></i></span></span>
							</label>
                            <label class="myLabel" style="width: 300px;">
								<span id="video_url_div" style="display:none;"style="margin-left:20px;"> 
								<input type="text" name="video" id="video" class="form-control" placeholder="Paste Youtyube Url">
								</span>
					        </label>-->
                            </p>
						</div>	
						<div class="col-lg-6 col-md-6 col-sm-6" style="text-align:right;vertical-align:middle;">
						    <select class="btn btn-default" name="upsstatus" id="upsstatus" style="font-family:'FontAwesome', Arial;border: solid 1px #ccc;">
								<option value="1">&#xf0ac; Public</option>
								<option value="2">&#xf0c0; Friends</option>
								
							</select>
							<div class="btn-group">
								<button type="submit" name="publish" id="publish" class="btn btn-danger" style="height: 32px; font-family: Arial;">Publish</button>
								<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:32px;">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu action_div">
									<li data-toggle="modal" data-target="#scheduleinst"><a href="#"  style="background: none;color: #000;border: none; text-decoration:none" id="publish">Scheduler</a></li>
									<li role="separator" class="divider"></li>
									<li> <button type="submit" name="savedraft" style="background: none;color: #000;border: none;" id="publish">Save as Draft</button></li>
								</ul>
    <!-- schedule letter popup-->

                            <div class="modal fade" id="scheduleinst" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
										  <button type="button" class="close" data-dismiss="modal">&times;</button>
										  <h4 class="modal-title" style="color: #000;
											font-weight: bold;text-align:left;">Select date time for shedule post</h4>
										</div>
										<div class="modal-body">
											<div id="datetimepicker1" class="input-append date">
											 
											<input type="text" value="" name="scheduletime" id="datetimepicker_maskdash" class="form-control"><br><br>
											  <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
											</div>
										</div>      
										<div class="modal-footer">
											<input type="button" value="Cancel" class="btn" data-dismiss="modal">
											<button name="scedule" id="scedule" type="submit" value="Save" class="btn" style="background:#993737;color:#fff;">Save</button>
										</div>
									</div>
								</div>
                            </div>
							</div>
                            </form>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:8%; margin-left:%; background:#FFF; border-radius:5px; width: 850px;" id="dashboard_image_div">
					<div id="container">
						<?php if(isset($post)){
							foreach($post as $pt){
							$pte= $pt['editorial'];	
							?>
                           
						<div class="grid" style="height: 350px">
                        <?php 
						$hed=str_replace(" ","-",$pt['head']);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						if($fhed =="")
						$fhed=$this->session->userdata['username'];
						?>
                         <?php 
						 if($pte==1)
						 {
							 ?>
			  <a href="<?= base_url()?>postvieweditorial/<?= $pt['id']?>" style="text-decoration:none">
              <div class="imgholder">
                                <?php
                                $pic=$pt['image'];
                                 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
   <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" realsrc="<?= base_url();?>assets/zerseynme/<?= $pt['image']?>" width="200px" height="200px" />
                              
                                <?php } else {?>
 <img src="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" realsrc="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" width="200px" height="200px" />
                                 <?php }?>
                                <p class="card-tag"><?= $pt['maincat']?></p>
                            </div>
                            
                         <?php 

						 }
						 else if($pte == 0)
						 {
						 ?>
                        <a href="<?= base_url()?>postview/<?= $fhed?>/<?= $pt['id']?>" style="text-decoration:none">
                        <div class="imgholder">
                                <?php
                                $pic=$pt['image'];
                                 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
   <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" realsrc="<?= base_url();?>assets/zerseynme/<?= $pt['image']?>" width="200px" height="200px" />
                              
                                <?php } else {?>
 <img src="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" realsrc="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" width="200px" height="200px" />
                                 <?php }?>
                                <p class="card-tag"><?= $pt['maincat']?></p>
                            </div>
                            
                                                 <?php 
						 }

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

                               <iframe src="<?php echo $video1; ?>" width="265px" height="200px" frameborder="0" allowfullscreen>
                               </iframe> 
                               <?php
                           }
                           else
                           {
                            ?>
                            <iframe src="<?php echo $video2; ?>" width="265px" height="200px" frameborder="0" allowfullscreen>
                               </iframe> 
                               
                            <?php
                           }
                       }
                       else 
                       {
                            $video1=$pic."/embed/simple";
                            ?>
                            <iframe src="<?php echo $video1; ?>" width="265px" height="200px" frameborder="0" allowfullscreen>
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
           <?php $default=24; 
if($nextpg!='' || $nextpg!=NULL)
{
$default=$nextpg;
}?>
<!--<form action="<?= base_url()?>users/feeds/" method="GET">
				        <input type="hidden" value="<?php echo $default; ?>" id="nextpg"name="nextpg" >

            <center>   <!-- <input type="submit"  id="showmor" class="show_more btn btn-danger" title="Load more posts" value="Show more">
        <span class="loding" style="display: none;"><span class="loding_txt">...Loading...</span></span> </center>
		</form>-->

						<div class="col-lg-12 col-md-12 col-sm-12" style="padding:5px;margin-top:-23%; margin-left:-31%; background:#FFF; border-radius:5px; width: 850px;" id="dashboard_image_div">
					<div id="container">
						<?php if(isset($post1)){
							foreach($post1 as $pt){
							$pte= $pt['editorial'];	
							?>
                           
						<div class="grid" style="height: 350px">
                        <?php 
						$hed=str_replace(" ","-",$pt['head']);
						$hed= preg_replace('/[^A-Za-z0-9\-]/', '', $hed);
						$fhed=substr($hed,0,50);
						if($fhed =="")
						$fhed=$this->session->userdata['username'];
						?>
                         <?php 
						 if($pte==1)
						 {
							 ?>
			  <a href="<?= base_url()?>postvieweditorial/<?= $pt['id']?>" style="text-decoration:none">
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
								 if(file_exists("./m.zersey/assets/zerseynme/$pic")){?>
   <img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" realsrc="<?= base_url();?>assets/zerseynme/<?= $pt['image']?>" width="200px" height="200px" />
                              
                                <?php } else {?>
 <img src="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" realsrc="http://zersey.com/assets/zerseynme/<?= $pt['image']?>" width="200px" height="200px" />
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
								</div>
							</div>
                            <?php  $photox=$this->usermodel->where_data('customer',array('userId'=>$pt['userid']));
							//echo $pt['id']."<br>";
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


			<!-----right part-------->
			<div class="col-lg-2 col-md-2 col-sm-2" style="position:fixed; right:0;padding:0px;">
				<div class="col-lg-12 col-md-12 col-sm-12 follow_div">
					<div class="panel-heading" style="background: #555;color: #fff;"><h3 class="panel-title">Follow User</h3></div>

 <?php 
				$resultuser=$this->datamodel->topuser();
				if($resultuser){ foreach($resultuser as $rtsu){
					
					$uid=$rtsu['userid'];
					$usid=$this->session->userdata['user_id'];
					$photox=$this->usermodel->where_data('customer',array('userId'=>$uid));
					$unm=$this->datamodel->getusernamebyid($rtsu['userid']);
					$pro1=$this->datamodel->selectuserfollow($uid, $usid);
					$follid=$pro1[0]['fuid'];

					 ?>
							
			 <form method="post" action="<?=base_url()?>users/userfollow">  		
               <input type="hidden" id="uid" name="uid" value="<?= $rtsu['userid']?>"/>

					<div class="col-md-12" style="padding:5px; margin-top:10px">
						<div class="col-sm-3" style="padding:0px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>">
                            <img src="<?php if(isset($photox[0]->photo)){ echo base_url();?>assets/images/merchant/<?php echo $photox[0]->photo;} 
                                else { echo base_url().'assert/images/User_Profile_Pic_Icon.png'; }?>" class="follow" style="width:100%;padding: 5px;"></a>
						</div>
						<div class="col-sm-9" style="margin-top: -8px;padding:0px;">
							<a href="<?= base_url()?>userprofile/<?= $unm->username?>"><div class="col-sm-12 " style="padding:3px;text-align:center; font-size:14px"><?php if(($photox[0]->fullname)) echo $photox[0]->fullname; else echo "User"?></div></a>
 <?php
                            if($pro1=="0"){
								?>

							<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center"> <button type="submit" class="btn btn-follow" name="folw">Follow</button></div>
                                                        <?php
							}
else {
	?>
	<div class="col-sm-12" style="border:0px solid red;padding:0px;text-align:center" > <a href="<?=base_url()?>users/deleteufollow/<?= $pro1[0]['fuid']?>"  class="btn btn-follow">Followed</a></div>
                                                                                    <?php } ?>
						</div>
					</div>
                    					</form>

					<?php }}?>`
						<div class="col-sm-12 text-left"><a href="<?=base_url()?>alluser">More...</a></div>
				</div>
			
						
			</div>
		</div>	
	</div>
			<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
				<div class="container">
                     <!-- Responsive slider - START -->
    	            <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
					<div class="slides" data-group="slides">
						<ul>
							<li>
						  <div class="slide-body" data-group="slide">
							<img src="images/1.jpg">
							<div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
							  <h2>Responsive slider</h2>
							  <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">With one to one swipe movement!</div>
							</div>
							<div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
							   <img src="images/2.jpg">
							</div>
							<div class="caption img-css3" data-animate="slideAppearLeftToRight">
							   <img src="images/1.jpg">
							</div>
						  </div>
							</li>
							<li>
						  <div class="slide-body" data-group="slide">
							<img src="images/Artist.jpg">
							<div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
							  <h2>Twitter Boostrap</h2>
							  <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">Compatible!</div>
							</div>
							<div class="caption img-bootstrap" data-animate="slideAppearDownToUp" data-delay="200">
							   <img src="images/2.jpg">
							</div>
							<div class="caption img-twitter" data-animate="slideAppearUpToDown">
							 <img src="images/Artist.jpg">
							</div>
						  </div>
							</li>
							<li>
						  <div class="slide-body" data-group="slide">
							 <img src="images/2.jpg">
							<div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
							  <h2>Custom animations</h2>
							  <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">For any caption you use!</div>
							</div>
							<div class="caption img-jquery" data-animate="slideAppearDownToUp" data-delay="200">
							 <img src="images/Artist.jpg">
							</div>
						  </div>
							</li>
						</ul>
					</div>
					<a class="slider-control left" href="#" data-jump="prev">Prev</a>
					<a class="slider-control right" href="#" data-jump="next">Next</a>
					<div class="pages">
					  <a class="page" href="#" data-jump-to="1">1</a>
					  <a class="page" href="#" data-jump-to="2">2</a>
					  <a class="page" href="#" data-jump-to="3">3</a>
					</div>
    	             </div></h4>
                </div>
				<div class="modal-body">
				 
				</div>
				<div class="modal-footer">
				 
				</div>
                 </div>
                </div>
            </div>
        </div>

 <!-- Responsive slider - END -->
    
		
		
	
	  

   
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

 

	
    <script src="assert/js/jquery.event.move.js"></script>
    <script src="assert/js/plugin/jquery.jscroll.js"></script>
  <script>
 /** $(document).ready(function() {
	
	$('#container').jscroll({
		delay: 600,
		autoTriggerUntil: 3
			
});
});
*/
  </script> 
  <script>
            $('#datetimepicker_maskdash').datetimepicker({
	
});
  </script>
	 <!-- Google Analytics Code -->
   <?php include_once("analyticstracking.php") ?>
</body>
</html> 
<?php
}
?>