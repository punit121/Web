<script>
						$(document).ready(function() {
							$(".classy-editor_1").ClassyEdit();
							$(".classy-editor_2").ClassyEdit();
							//$(".classy-editor").ClassyEdit();
						});
					</script> 
<script>
function video_dv(id)

{
	    $("#"+id).toggle();
	
}
</script>
<style>

</style>
<script> 
function intro()
{	
	
	//var intro=vpform.textdes1;
	var j=0;
	var title=document.getElementById("title").value;
	if(title== "")
	{
		text='Title is required';
		document.getElementById("title_valid").innerHTML=text;
		document.getElementById("title_valid").style.color="red";
		//location.href="#";
		j++;
		
		window.location="#vpform";
		

	}	
	else
	{
		text='&nbsp;';
		document.getElementById("title_valid").innerHTML=text;
		window.location="#vpform";
		
	}
	var row=document.getElementById("countrow").getAttribute('value');
	//alert(row);
	
	for(i=1;i<=row;i++)
	{
		//alert(i);
	var text=document.getElementById("text"+i).innerHTML;
     var intro=document.getElementById("textdes"+ i);

	//alert(intro);
	if(intro.value.length < 100)
	{
		//alert("Yes");
     text='Minimum 100 characters required';
     document.getElementById("text"+i).innerHTML=text;
     document.getElementById("text"+ i).style.color="red";
     document.getElementById("text"+ i).style.marginTop="-20px";
     		//location.href="#";
     		j++;
     	/*	if(j==1)
     		{
		window.location="#textdes"+i;
    	}*/
     
	}
	else
	{
		text='&nbsp;'
     document.getElementById("text"+i).innerHTML= text;
     
	}
}
	var pic=vpform.picintro.value;
	if(pic=="")
	{
		//alert("Yes for pic");
		text='Please upload an image';
     document.getElementById("pic1").innerHTML=text;
     document.getElementById("pic1").style.color="red";
     document.getElementById("pic1").style.marginTop="-20px";
     	//location.href="#";
     	j++;
     	/*if(j==1)
     	{
		location.href="#picintro";
     	}*/
	}
	else
	{
		text='&nbsp;'
     document.getElementById("pic1").innerHTML= text;
     	
	}
	l=1;
	for(k=1;k<=row-1;k++)
	{
		l++;
	var subpic=document.getElementById("photo"+k).value;
		if(subpic=="")
	{
		//alert("Yes for pic");
		text='Please upload an image';
     document.getElementById("pic"+l).innerHTML=text;
     document.getElementById("pic"+ l).style.color="red";
     document.getElementById("pic"+ l).style.marginTop="-20px";
     		//location.href="#";
     		j++;
		/*if(j==1)
		{
		location.href="#textdes"+i;
		}*/

	}
	else
	{
		text='&nbsp;'
     document.getElementById("pic"+l).innerHTML= text;
     	
	}
}
	//alert(j);
		if(j>0)
		{
			/*document.getElementById("publish").disabled = true;
			document.getElementById("publish").value = "Publishing...";
			document.getElementById("upsstatus").disabled = true;*/
		return false;
		}
		else
		{
			/*document.getElementById("publish").disabled = true;
			document.getElementById("publish").value = "Publishing...";
			document.getElementById("upsstatus").disabled = true;*/
		
		return true;
	}
}

function image_main()
{
	
}
function validate()
{
	return intro();
}

</script>

<body style="background-color: #DCD9D9;">
<?php

if(empty($boards)){
	if(isset($error)) {?>
	
 <form action="<?= base_url();?>users/insertvertualstory/<?= $this->uri->segment(3);?>" method="post" id="vpform" enctype="multipart/form-data" onSubmit="return validate();">
 <input type="hidden" value="<?= $this->uri->segment(3); ?>" name="catname" id="catname"/>
<?php }else{ ?>
 <form action="<?= base_url();?>users/insertvertualstory" method="post" id="vpform" name="vpform" enctype="multipart/form-data" onSubmit="return validate();" >
 <input type="hidden" value="<?= $this->uri->segment(2); ?>" name="catname" id="catname"/>
 <?php } } 
 else if($this->uri->segment(3))
{
	?>
	<form action="<?= base_url();?>users/insertvertualboard" method="post" id="vpform" enctype="multipart/form-data" onSubmit="return validate();">

<input type="hidden" value="NULL" name="boardcat" id="boardcat"/>
 <input type="hidden" value="<?= $boards[0]->category?>" name="catname" id="catname"/>
 <input type="hidden" value="<?= $this->uri->segment(3)?>" name="sboard" id="sboard">
	<?php
}
else {
 	$board=str_replace("%20"," ",$this->uri->segment(2));?>
<form action="<?= base_url();?>users/insertvertualboard" method="post" id="vpform" name="vpform" enctype="multipart/form-data" onSubmit="return validate();">

<input type="hidden" value="<?= $board ?>" name="boardcat" id="bardcat"/>
 <input type="hidden" value="<?= $boards[0]->category?>" name="catname" id="catname"/>
<?php }?>
	<div class="col-sm-3"></div>
	<div class="container main_container col-sm-6" style="padding-top: 50px;">
     <a href="<?= base_url();?>"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
	    <h2 class="text-center">Create Your Photo Story</h2> 
     
		<div class="main_div">
        						        <?php if(count($cat)){ ?>
									<select name="sboard" id="sboard" class="text_div" style="font-family:'FontAwesome', Arial;border: solid 1px #ccc;">
                                     <option value="">Select Subboard</option>   
									<?php foreach($cat as $ct){

								
										?>
                                
							<option value="<?= $ct['sbid']?>"><?= $ct['subboardname']?></option>
							<?php }?>
							</select>
							<?php } 
							if(isset($error))
{
	 echo validation_errors();
         echo $this->input->post('picintro');
        } ?>

						
						
			<div class="form-group">
                    <input type="text" name="topic" id="topic" placeholder="Please Enter Comma Separated Topics" class="text_div form-control"/>
                    <input type="hidden" name="realtopic" id="realtopic" value=""/>
                   			
			</div><div id="topicbtn"></div>
					<div id="title_valid"> &nbsp; </div>
                    <div class="form-group">
					<input type="text" placeholder="Give Your Photo Story a Title" name="title" id="title" class="text_div1 form-control"/></div>
                    
			<p style="margin-top: 15px"><strong> Introduction: </strong></p>
			<div id="text1"><!-- Please type minimum 100 characters --></div> 
			 <div class="txtarea form-group" style="border: 1px solid #999; border-radius: 6px;">	
            <section class="clearfix">
				<div>
				<textarea class="classy-editor_1" name="textdes1" id="textdes1"></textarea>
				</div>
            </section>
			</div>
            <div class="form-group text-center center-block">
	<i class="fa fa-times"  id="closes" onClick="readURLold('imgpicintro', 'closes','vdolb','imglb' );" style="position: absolute;margin-left: 40%;margin-top: 5px;display:none;"></i>
			<img id="imgpicintro" src="../assert/images/blank.png" class="imgprive img-responsive" alt="Your Image" style="height: 300px; border-left: 1px solid #999; margin-top: -20px; border-right: 1px solid #999; border-bottom: 1px solid #999;"/>
                        	
              <label id="imglb" class="myLabel mylabel1"> <span class="fileinput-button">
                <span><i class="fa fa-picture-o fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
				<input type="file" onChange="readURL(this,'imgpicintro','closes','vdolb','imglb');" name="picintro" id="picintro" value="Upload Photo" class=" "/></i></span></span></label>
			<!--	 <label id="vdolb" class="myLabel mylabel3" onclick="video_dv('video_url_div')"><span class="fileinput-button" style="margin-left:20px;">
                <span><i class="fa fa-youtube-play fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
			</i></span></label>   -->		
				</div>
			<div id="video_url_div" style="display:none;">
			<input type="text" class="form-control" placeholder="Paste Youtube Url"/>
			</div>
			<div id="pic1">  &nbsp; </div>
			<div class="txt_append">
			    <p style="margin-top: 15px"><strong>1.</strong></p>
				<div id="text2"><!-- Please Type minimum 100 characters --></div> 
				<div class="txtarea form-group" style="border: 1px solid #999; border-radius: 6px;">		
            <section class="clearfix">
				<div>
				<textarea class="classy-editor_2" name="textdes2" id="textdes2">  </textarea>
				</div>
            </section>
			</div>
			<div class="form-group text-center center-block">
			<i class="fa fa-times" id="close1" onClick="readURLold('imgpicintro1', 'close1','vdolbl1','imglbl1' );" style="position: absolute; margin-left: 40%;margin-top: 5px;display:none;" ></i>
			<img id="imgpicintro1" src="../assert/images/blank.png" class="imgprive img-responsive"  alt="Your Image" style="height: 300px; border-left: 1px solid #999; margin-top: -20px; border-right: 1px solid #999; border-bottom: 1px solid #999;"/>		
              <label  class="myLabel mylabel1" id="imglbl1"> <span class="fileinput-button">
                <span><i class="fa fa-picture-o fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
				<input type="file" name="photo1" id="photo1"  onChange="readURL(this, 'imgpicintro1','close1', 'vdolbl1','imglbl1');" value="Upload Photo" class=" "/></i></span></span></label>
			<!--	 <label  class="myLabel mylabel3" id="vdolbl1" onclick="video_dv('video_url_div1')"> <span class="fileinput-button"style="margin-left:20px;">
                <span><i class="fa fa-youtube-play fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
			</i></span></label> -->	
			</div>
			<div id="video_url_div1" style="display:none;">
			<input type="text" class="form-control" placeholder="Paste Youtube Url">
			</div>
				<div id="pic2">  &nbsp; </div>	
				<div id='debug'></div>
		    </div>
			<input type="hidden" id="countrow" name="countrow" value="1"/>
			</div>
			<div style="margin-top: 10px;">
				
				<div style="text-align:center">
					<span style="color:#F00" id="error"></span>
					<div style="text-align:right" id='submitdiv'>
                   
						
						<select class="btn btn-default" name="upsstatus" id="upsstatus" style="font-family:'FontAwesome', Arial;border: solid 1px #ccc;">
							<option value="1">&#xf0ac; Public</option>
							<option value="2">&#xf0c0; Friends</option>
							
						</select>
						<div class="btn-group">
								<input type="submit" value="Publish" name="publish" id="publish" class="btn btn-danger" style="height:32px"/>
								 <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" style="height:32px" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
								 </button>
								<ul class="dropdown-menu action_div">
								<li data-toggle="modal" data-target="#scheduleinst">
                                     <button  type="submit" name="scheduleltr" style="background: none;color: #fff;border: none;" id="publish">Scheduler</button></li>
									<li role="separator" class="divider"></li>
									<li> <button type="submit" name="savedraft" style="background: none;color: #fff;border: none;" id="publish">Save as Draft</button></li>
								
							   </ul>
							   <div class="modal fade" id="scheduleinst" role="dialog">
									<div class="modal-dialog">
									
									  <!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											  <h4 class="modal-title" style="color: #000;
										font-weight: bold;text-align:left;">Schedule for later</h4>
											</div>
										 <div class="modal-body">
											<div id="datetimepicker1" class="input-append date">
											 <label style="float: left;">Date and time</label>
			<input type="text" value="" name="scheduletime" id="datetimepicker_mask1" class="form-control" ><br><br>
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
					</div>
                    <!--<div style="text-align:right;display:none" id="loding" >
                    <img src="<?= base_url()?>assert/images/uploading.gif" width="150px"/>
                    </div>-->
				</div>
			</div>
            </form>
			<div style="text-align:center;">
			   <a href="#" id="btn1"><i class="fa fa-plus-circle fa-3x"></i></a>
			</div>
		</div>
	
 <script>
$(document).ready(function(){
var i=3;
var j=2;

    $("#btn1").click(function(){
                    //alert("hi");
		imgpicintro = "'imgpicintro"+i+"'";
		closes= "'close"+i+"'";
		vdolb= "'vdolb"+i+"'";
		imglb= "'imglb"+i+"'";
		vid = "'video_url_div"+i+"'";
		
	$(".txt_append").append('<p style="margin-top: 15px"><strong>'+ j +'.</strong></p>'+
	'<div id="text'+i+'">&nbsp;</div>'+
	'<div class="txtarea form-group" style="border: 1px solid #999; border-radius: 6px;"><section class="clearfix"><div><textarea class="classy-editor_'+i+'" name="textdes'+i+'" id="textdes'+i+'"></textarea></div></section></div>'+
				'<div class="form-group text-center center-block">'+
'<i class="fa fa-times" id="close'+i+'" onClick="readURLold('+imgpicintro+', '+closes+','+vdolb+','+imglb+' );" style="position: absolute;margin-left: 40%;margin-top: 5px; display:none;"></i>'+
'<img id="imgpicintro'+i+'" src="../assert/images/blank.png" class="imgprive img-responsive" alt="Your Image" style="height: 300px; border-left: 1px solid #999; margin-top: -20px; border-right: 1px solid #999; border-bottom: 1px solid #999;"/><label id="imglb'+i+'" class="myLabel mylabel1"><span class="fileinput-button"><span><i class="fa fa-picture-o fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"><input type="file" name="photo'+j+'" id="photo'+j+'" value="Upload Photo" class=" " onChange="readURL(this,'+imgpicintro+', '+closes+','+vdolb+','+imglb+');" /></i></span></span></label>'+
'</div><div id="video_url_div'+i+'" style="display:none;">'+
'<input type="text" class="form-control" placeholder="Paste Youtube Url">'+
'</div>'+'<div id="pic'+i+'">'+ '&nbsp;'+ '</div>'
							
						
	);
	testedt("classy-editor_"+i);
	$('#countrow').val(i);
    i++;
    j++;
	  return false;	
	});

	
});


</script>
<script>
$(document).ready(function()
{
});
</script>
<script>

function testedt(cls){
	
	$("."+cls).ClassyEdit();
}
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


function readURL(input, ld, clos, vdo,img) {

$('#'+img).css("display","none");
$('#'+clos).css("display","");
$('#'+vdo).css("display","none");
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+ld).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
function readURLold(ld, clos, vdo,img) {

$('#'+img).css("display","");
$('#'+clos).css("display","none");
$('#'+vdo).css("display","");
   
            $('#'+ld).attr('src', '../assert/images/blank.png');
     

    
}

/*
$("#imgInp").change(function(){
    readURL(this);
});*/
</script>

   <script>
            $('#datetimepicker_mask1').datetimepicker({
	
});
  </script>
 <!-- Google Analytics Code -->
   <?php include_once("analyticstracking.php") ?>
</body>
</html>