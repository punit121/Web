$(document).ready(function(){


var request;
$(document).on("submit", ".comentform", function(event){
//$(".comentform").submit(function(event){
	
	
	
 // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);
		
    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();
var id= $(this).attr("ref");
    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);
    // Fire off the request to /form.php
    request = $.ajax({
        url: baseurl+"blog/fbcomment",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
       // console.log(response);
	
	var eid= '#c'+id;
	$('.stst').val('');
	$('.stst').attr("rows", "2");
	//console.log(eid);
	//console.log(response);
	var ans = $('#rdalans'+id).text();
	if(ans != "Read All Comment")
	{$(eid).append(response);}

    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });
	

    // Prevent default posting of form
    event.preventDefault();	
	
	
	
	 });
	 
	 
	jQuery(document.body).on('click', '.replybtn' ,function(){
	//alert('dsdfsdf');
	
		var id= $(this).attr("rel");
		var eid= '#'+id;
		$( eid ).show();
		
	 });


var requests;

$(document).on("submit", ".replyform", function(event){
//jQuery(".replyform").submit(function(event){
	
	
	
 // Abort any pending request
    if (requests) {
        requests.abort();
    }
    // setup some local variables
    var $form = $(this);
		
    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();
var id= $(this).attr("ref");
    // Let's disable the inputs for the duration of the Ajax request.   
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);
    // Fire off the request to /form.php
    requests = jQuery.ajax({
        url: baseurl+"blog/replycmnt",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    requests.done(function (response, textStatus, jqXHR){
        // Log a message to the console
       // console.log(response);
	
	var eid= 'cnt'+id;
	$('.scmsnt').val('');
	//console.log(eid);
	//console.log(response);
	$(eid).append(response);

    });

    // Callback handler that will be called on failure
    requests.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    requests.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });
	

    // Prevent default posting of form
    event.preventDefault();	
	
	
	
	 });


	  });

/*	$('.comment').click(function(){
		var uid=$('#sessionIdValue').val();	
			$('.top').remove();
		if(uid!='')
		{
					$.ajax({
						url: "users/getCommentByBlogId",
						type: "POST",
						data: "blogid="+$(this).attr('rel'),
						success: function(res){
						
					 var data2=eval(res);
							
			$.each(data2,function(index,value){
				var date=value['date'];
				var cname=value['cName'];
				var cphoto=value['cPhoto'];
				if(value['cPhoto']==null)
				{
				cphoto='user.gif';
				}
				var name = cname.split(' ');
				var res = date.split(' ');
				$('#viewComment').append('<div class="top" style="height:auto;width:95%;float:left;padding-left:5%;"><div id="topleft" style="float:left;width:10%;height:auto;"><div style="float:left;width:100%;"><img src="'+baseurl+'assets/images/merchant/'+cphoto+'" width="100%"></div><div style="float:left;width:100%">'+name[0]+'</div></div><div style="float:right;width:84%;height:auto;"><P style="min-height50px;">'+value['comment']+'</P><p style="text-align:right">'+res[0]+'</p></div></div>');
			 
								});
							}
						});
					
			$('#blogModal').foundation('reveal','open');
			var id=$(this).attr('rel');			
			$('#blogId').val($(this).attr('rel'));
		}
		else
		{
			$('#myModal1').foundation('reveal','open');
		}		
	});	
	$('#logInAppointment').click(function(){
			$('#loginContainer').show();
			$('#signupContainer').hide();			
	});
	$('#signUpAppointment').click(function(){
			$('#signupContainer').show();
			$('#loginContainer').hide();			
	});
	$('.close').click(function(){
		$('#myModal1').foundation('reveal','close');
		$('#SignupOrLoginModal').foundation('reveal','close');
	});
	$('.readMore').click(function(){
		var id=$(this).attr('rel');
		$('#readblogData'+id).show();
		$('#readLess'+id).show();
		$('#subblogData'+id).hide();
		$('#readMore'+id).hide();
	});
	
	$('.backMore').click(function(){
		var id=$(this).attr('rel');
		$('#readblogData'+id).hide();
		$('#readLess'+id).hide();
		$('#readMore'+id).show();
		$('#subblogData'+id).show();		
	});
	
	$('.submitComment').click(function(){		
		var blogId=$('#blogId').val();
		var commentText=$('#commentText').val();
		var datastring='blogId='+blogId+'&commentText='+commentText;			
		$.post(baseurl+'blog/saveComment',datastring,function(data){			
			if(data=='success')
			{
				$('#blogSuccessModal').foundation('reveal','open');
				setTimeout(function(){
					$('#blogSuccessModal').foundation('reveal','close');
					location.reload();
				},2000);				
			}
		});
		return false;
	});		
		$('#form-follow').validate({
				rules: {
							follower: {
									required: true,
									email:true,								
							}
						},
				
					messages: {
							follower: "please provide a valid email ",
							
					}
		});
		$('#follow').click(function(){
				if($('#form-follow').valid())
				{		
						$.ajax({
						url: baseurl+'blog/follower',
						type: "POST",
						data: "email="+$('#follower').val(),
						success: function(response){
						if(response)
						{
						$('#followBlog').foundation('reveal','open');
						setTimeout(function(){
						//location.reload();
						$('#followBlog').foundation('reveal','close');
						},2000);
						}
						else
						{
						$('#alreadyfollowBlog').foundation('reveal','open');
						setTimeout(function(){
						//location.reload();
						$('#alreadyfollowBlog').foundation('reveal','close');
						},2000);
						}
							}
						});
				}
			return false;
		});
		$('.mercahantcomment').click(function(){
		return false;
		});
});*/
$(document).ready(function(){
	
	$(document.body).on('click', '.readmr' ,function(){
	
	var id= $(this).attr("ref");
	//alert('#'+id);
	$('#'+id).hide();
	$('#p'+id).show();
	return false;
	});
	$(document.body).on('click', '.readmrcmt' ,function(){
	
	var id= $(this).attr("ref");
	//alert('#'+id);
	$('#'+id).hide();
	$('#p'+id).show();
	return false;
	});
	$(document.body).on('click', '.readmrcmtred' ,function(){
	
	var id= $(this).attr("ref");
	//alert('#'+id);
	$('#'+id).hide();
	$('#p'+id).show();
	return false;
	});
	
	});
$(function(){	
	$('#filtercat li').click(function(){
		var dataString='category='+$(this).data('value');
		//alert(dataString);
				$.ajax({
					url:baseurl+'blog/catfilter',
					type:'POST',
					data: { category: dataString},
            		success: function(data){
                
					console.log(data);
					
			
					console.log(data);
					
			   		var postslist='';
					

					var data=eval(data);
		var cmentvar='';
		var imgs='';
		var i=0;
		var pic="assets/images/merchant/usericon.jpg";
		$('#posts-list ul').empty();
							
							console.log(data);
							$.each(data,function(index,value){
							
							
							var userid=value.userid;
							var dt=value.datetm;
							var imgnm=value.imgname;
							var postid=value.postid;
							var post=value.post;
							var coment=value.coment;
							var userid=value.userid;
							var uspic=value.userd[0].photo;
							var nm=value.userd[0].fullName;
							//console.log(coment[i].postid);
							//var cmtpiid=value.coment[0].postid;

$.each(coment,function(index,sm){
	
	var uspic=sm.userpic[0].photo;
	var lckcount=sm.likecnt1;
	var nm=sm.userpic[0].fullName;
	console.log(sm.likecnt1);
	

	if(uspic){
		if(sm.likeno1.lenght === 0)
		{
	cmentvar+='<li class="comment"><div class="wrap"><a href=""><img class="avatar" src="'+baseurl+'assets/images/merchant/'+uspic+'" style="height:50%; width:7%"/></a><div class="info clearfix"><div class="user-info"><div class="name">'+nm+'</div></div><time></time></div><div class="content">'+sm.comment+'</div><div class="info clearfix"><div><a href='+baseurl+'blog/likecmt/'+sm.cmtid+'/'+userid+'" class="btn-like">Like</a><span>'+lckcount+'</span></div></div></div> </li>';
		}
		else{
			cmentvar+='<li class="comment"><div class="wrap"><a href=""><img class="avatar" src="'+baseurl+'assets/images/merchant/'+uspic+'" style="height:50%; width:7%"/></a><div class="info clearfix"><div class="user-info"><div class="name">'+nm+'</div></div><time></time></div><div class="content">'+sm.comment+'</div><div class="info clearfix"><div><a href="'+baseurl+'blog/unlikecmt/'+sm.cmtid+'/'+userid+'" class="btn-like">Unlike</a><span>'+lckcount+'</span></div></div></div> </li>';
			
		}
	}
	else{
		if(sm.likeno1.lenght === 0)
		{
		cmentvar+='<li class="comment"><div class="wrap"><a href=""><img class="avatar" src="'+baseurl+pic+'" style="height:50%; width:7%"/></a><div class="info clearfix"><div class="user-info"><div class="name">'+nm+'</div></div><time></time></div><div class="content">'+sm.comment+'</div><div class="info clearfix"><div><a href='+baseurl+'blog/likecmt/'+sm.cmtid+'/'+userid+'" class="btn-like">Like</a><span>'+lckcount+'</span></div></div></div> </li>';
		}
		else{
			cmentvar+='<li class="comment"><div class="wrap"><a href=""><img class="avatar" src="'+baseurl+pic+'" style="height:50%; width:7%"/></a><div class="info clearfix"><div class="user-info"><div class="name">'+nm+'</div></div><time></time></div><div class="content">'+sm.comment+'</div><div class="info clearfix"><div><a href="'+baseurl+'blog/unlikecmt/'+sm.cmtid+'/'+userid+'" class="btn-like">Unlike</a><span>'+lckcount+'</span></div></div></div> </li>';

		}
	}
	});
	if(uspic){
	if(imgnm){
		if(value.likeno.lenght === 0)
		{
				postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+'assets/images/merchant/'+uspic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><img src="<?php echo base_url();?>assets/images/post/'+imgnm+'" /><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"> <a href="'+baseurl+'blog/likepost/'+postid+'/'+userid+'" class="btn-like">Like</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</ul></div></div></li>';
	}
	else
	{
		postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+'assets/images/merchant/'+uspic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><img src="<?php echo base_url();?>assets/images/post/'+imgnm+'" /><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"><a href="'+baseurl+'blog/unlikepost/'+postid+'/'+userid+'" class="btn-like">Unlike</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</ul></div></div></li>';
		
		}}
	else
	{
		if(value.likeno.lenght === 0)
		{
				postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+'assets/images/merchant/'+uspic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"> <a href="'+baseurl+'blog/likepost/'+postid+'/'+userid+'" class="btn-like">Like</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</ul></div></div></li>';
	}
	else
	{
		postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+'assets/images/merchant/'+uspic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"><a href="'+baseurl+'blog/unlikepost/'+postid+'/'+userid+'" class="btn-like">Unlike</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</ul></div></div></li>';
		
		}
		}
		}
	else{
		if(imgnm){
		if(value.likeno.lenght === 0)
		{
				postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+pic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><img src="<?php echo base_url();?>assets/images/post/'+imgnm+'" /><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"> <a href="'+baseurl+'blog/likepost/'+postid+'/'+userid+'" class="btn-like">Like</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</li>';
	}
	else
	{
		postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+pic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><img src="<?php echo base_url();?>assets/images/post/'+imgnm+'" /><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"><a href="'+baseurl+'blog/unlikepost/'+postid+'/'+userid+'" class="btn-like">Unlike</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</li>';
		
		}}
	else
	{
		if(value.likeno.lenght === 0)
		{
				postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+pic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"> <a href="'+baseurl+'blog/likepost/'+postid+'/'+userid+'" class="btn-like">Like</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</li>';
	}
	else
	{
		postslist+='<li class="post"><div class="user-block"><div class="user-image"><a href=""><img src="'+baseurl+pic+'" style="height:50px"/></a></div><div class="user-info"><div class="name">'+nm+'</div><time></time></div></div><div class="post-detail"><div class="post-status clearfix"><div class="post-detail-content"><p>'+post+'</p></div><div class="post-detail-bottom"><div class="pull-left"><a href="'+baseurl+'blog/unlikepost/'+postid+'/'+userid+'" class="btn-like">Unlike</a></div><div class="pull-right"><a class="icon-btn"><i class="fa fa-heart fa-lg"></i></a><span>'+value.likecnt+'</span><a class="icon-btn post-link" ><i class="fa fa-comment fa-lg"></i></a><span>'+value.cmtntcnt+'</span></div><form  method="post" action="'+baseurl+'blog/comment" style="padding-top:30px"><input type="text" id="cnttext" name="cnttext" class="form-control mention" placeholder="Write something..." style="overflow: hidden; word-wrap: break-word; resize: none; height: 56px;width: 99%;"/><input type="hidden" value="'+userid+'" name="usersid" id="user_id"/><input type="hidden" value="'+postid+'" name="post_id" id="post_id"/><button type="submit" id="postsubmit" name="postsubmit" class="btn btn-primary btn-sm pull-right" style="position: absolute; left: -9999px; width: 1px; height: 1px;"/></form></div></div><div class="comment-section"><ul class="comments-list">'+cmentvar+'</li>';
		
		}
		}
		
		
		} 
		cmentvar='';
		});
							$('#posts-list ul').append(postslist);
							//$('#totcount').html(increment+' Records Found');
		

					} });
			});	

		
		
						
/*							
Date.daysBetween = function( date1, date2 ) {
  //Get 1 day in milliseconds
  var one_day=1000*60;

  // Convert both dates to milliseconds
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();

  // Calculate the difference in milliseconds
  var difference_ms = date2_ms - date1_ms;
    
  // Convert back to days and return
  return Math.round(difference_ms/one_day); 
  
}*/

jQuery(document.body).on('click', '.deletecomment' ,function(){

	var ids = $(this).attr('rel');
	//alert(ids);
	
	$.ajax({
					url:baseurl+'blog/deletefbcomentid',
					type:'POST',
					data: { id: ids},
            		success: function(data){
					$('#comentli'+ids).remove();
					}
	});
	return false;
	});


jQuery(document).on('click', '.askpost' ,function(){


	var ids = $(this).attr('rel');
	//alert(ids);
	
	$.ajax({
					url:baseurl+'blog/likefbblog',
					type:'POST',
					data: { id: ids},
            		success: function(data){
						//alert('#askchng'+ids);
					$('#askchng'+ids).hide();
					var b=$( '#askeds'+ids ).children('span').text();
					var c= parseInt(b)+1;
					//alert(c);
					$( '#askeds'+ids ).children('span').html(c);
					
					$('#askeds'+ids).show();
					}
	});
	return false;
	
	});		
	
	
	
	jQuery(document).on('click', '.likecoment' ,function(){
//alert('sfdsdfsdf');

	var ids = $(this).attr('rel');
	var idp = $(this).attr('ref');
	//alert(ids);
	
	$.ajax({
					url:baseurl+'blog/likecmtfbblog',
					type:'POST',
					data: { id: ids, pid: idp},
            		success: function(data){
						//alert('#askchng'+ids);
					$('#likecmt'+ids).hide();
					var b=$( '#spancount'+ids ).text();
					var c= parseInt(b)+1;
					//alert(c);
					$( '#spancount'+ids ).html(c);
					
					$('#unlikecmt'+ids).show();
					}
	});
	return false;
	
	});		
    jQuery(document).on('click', '.unlikecoment' ,function(){
//alert('sfdsdfsdf');

	var ids = $(this).attr('rel');
	//var idp = $(this).attr('ref');
	//alert(ids);
	
	$.ajax({
					url:baseurl+'blog/unlikecmt',
					type:'POST',
					data: { id: ids},
            		success: function(data){
						//alert('#askchng'+ids);
					$('#unlikecmt'+ids).hide();
					var b=$( '#spancount'+ids ).text();
					var c= parseInt(b)-1;
					//alert(c);
					$( '#spancount'+ids ).html(c);
					
					$('#likecmt'+ids).show();
					}
	});
	return false;
	
	});		
    });
	
	
	 

    // Prevent default posting of form
    
	
	
	 
