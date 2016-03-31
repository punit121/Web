<script>
						$(document).ready(function() {
							$(".classy-editor").ClassyEdit();
						});
					</script> 
<body style="background-color: #DCD9D9;">
<?php if(empty($board)){?>
    <form action="<?= base_url();?>users/insertvertualstory" method="post" id="vpform" enctype="multipart/form-data">
 <input type="hidden" value="<?= $this->uri->segment(2); ?>" name="catname" id="catname"/>
<?php }else{ ?>
<form action="<?= base_url();?>users/insertvertualboard" method="post" id="vpform" enctype="multipart/form-data">

<input type="hidden" value="<?= $this->uri->segment(2); ?>" name="boardcat" id="boardcat"/>
 <input type="hidden" value="<?= $board->category?>" name="catname" id="catname"/>
<?php }?>
	<div class="container main_container" style="width:600px">
     <a href="<?= base_url();?>"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
	    <h2>Create Your Photo Story</h2> 
        
		<div class="main_div" style="border: solid 1px black;">
			<div style="width: 100%;margin: 0 auto;">
            <div style="width:40%; display:inline-block">
                    <input type="text" name="topic" id="topic" placeholder="Comma Seperate Topic" style="border: 0;" class="text_div">
                    <input type="hidden" name="realtopic" id="realtopic" value="" />
                   			
			</div><div style="width:59%; display:inline-block"id="topicbtn"></div>
                    <input type="text" placeholder="Title" name="title" id="title" class="text_div1">
			 <div style="border:solid 1px gray;"><p style="display:inline-block;width: 3%;padding-left:10px;margin-bottom: 0px;">Intro</p><div class="txtarea" style="display:inline-block; border:none;width:95%;">	
            <section class="clearfix">
				<div>
				<textarea class="classy-editor" name="intro" id="intro"></textarea>
					
				</div>
				
            </section>
			</div></div>
            <div style="border-top:1px solid #555">
            			<center>
			<img id="imgpicintro" src="../assert/images/blank.png" class="imgprive" alt="your image" />
                        	
              <label class="myLabel"> <span class="fileinput-button">
                <span><i class="fa fa-picture-o fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
				<input type="file" onChange="readURL(this, 'imgpicintro' );" name="picintro" id="picintro" value="Upload Photo" style="position:fixed; top:-1000px;" /></i></span></span></label>
							</center>
				</div>
			</div>
			<div class="txt_append">
			    <div style="border:solid 1px gray;"><p style="display:inline-block;width: 3%;padding-left:10px;margin-bottom: 0px;">1</p><div class="txtarea" style="display:inline-block; border:none;width:95%;">		
            <section class="clearfix">
				<div>
				<textarea class="classy-editor" name="intro" id="intro"></textarea>
					
				</div>
				
            </section>
			</div>
				</div>
				<div style="border-bottom: solid 1px;">
							<center>
					<img id="imgpicintro1" src="../assert/images/blank.png" class="imgprive"  alt="your image" />		
              <label class="myLabel"> <span class="fileinput-button">
                <span><i class="fa fa-picture-o fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
				<input type="file" name="photo1" id="photo1"  onChange="readURL(this, 'imgpicintro1' );" value="Upload Photo" style="position:fixed; top:-1000px;" /></i></span></span></label>
							</center>
					
						<div id='debug'></div>
				</div>
				
			
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
								<button type="submit" name="publish" id="publish" class="btn btn-danger">Publish</button>
								 <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" style="height:33px" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
								 </button>
								<ul class="dropdown-menu action_div">
									<li><a href="#" data-toggle="modal" data-target="#scheduleinst">Scheduler</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="#">Save as Draft</a></li>
								
							   </ul>
							   
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
											 
											<input type="text" value="" id="datetimepicker_mask" class="form-control"><br><br>
											  <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
											</div>
										  </div>      
										   <div class="modal-footer">
												<input type="button" value="Cancel" class="btn">
												<input name="scedule" id="scedule" type="submit" value="Save" class="btn" style="background:#993737;color:#fff;">
											</div>
										 </div>
									</div>
                                </div>
							</div>
					</div>
                    <div style="text-align:right;display:none" id="loding" >
                    <img src="<?= base_url()?>assert/images/uploading.gif" width="150px"/>
                    </div>
				</div>
			</div>
            </form>
			<div style="text-align:center;">
			   <a href="#" id="btn1"><i class="fa fa-plus-circle fa-3x"></i></a>
			</div>
		</div>
	</div>
 <script>
$(document).ready(function(){
var i=2;
    $("#btn1").click(function(){
		imgpicintro = "'imgpicintro"+i+"'";
	$(".txt_append").append('<div style="border:solid 1px gray;">'+
	'<p style="display:inline-block;width: 3%;padding-left:10px;margin-bottom: 0px;">'+i+'</p>'+
	'<div class="txtarea" style="display:inline-block; border:none;width:95%;"><section class="clearfix"><div><textarea  class="classy-editor'+i+'" name="intro" id="intro"></textarea></div></section></div>'+
				'<div style="border-bottom: solid 1px #555;">'+
				'</div>'+
							'<center><img id="imgpicintro'+i+'" src="../assert/images/blank.png" class="imgprive" alt="your image" /><label class="myLabel"> <span class="fileinput-button"><span><i class="fa fa-picture-o fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"><input type="file" name="photo'+i+'" id="photo'+i+'" value="Upload Photo" style="position:fixed; top:-1000px;" onChange="readURL(this,'+imgpicintro+');" /></i></span></span></label></center>'
							
						
	);
	testedt("classy-editor"+i);
	$('#countrow').val(i);
    i++;
	  return false;	
	});
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


function readURL(input, ld) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+ld).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
/*
$("#imgInp").change(function(){
    readURL(this);
});*/
</script>

   <script>
            $('#datetimepicker_mask').datetimepicker({
	
});
  </script>
 
 <!-- Google Analytics Code -->
   <?php include_once("analyticstracking.php") ?>
</body>
</html>
