<script>
						$(document).ready(function() {
							$(".classy-editor1").ClassyEdit();
							$(".classy-editor2").ClassyEdit();
						});
					</script> 
					
					<script>
function video_dv()

{
	
    $("#video_url_div").toggle();
	
}
</script>
<body style="background-color: #DCD9D9;">
<?php if(empty($boards)){?>

    <form action="<?= base_url();?>users/inserteditorialpost" method="post" id="edform" enctype="multipart/form-data">
 <input type="hidden" value="<?= $this->uri->segment(2); ?>" name="catname" id="catname"/>
<?php }else{ ?>
<form action="<?= base_url();?>users/inserteditorialboard" method="post" id="edform" enctype="multipart/form-data">

<input type="hidden" value="<?= $this->uri->segment(2); ?>" name="boardcat" id="boardcat"/>
 <input type="hidden" value="<?= $boards[0]->category?>" name="catname" id="catname"/>
<?php }?>
	<div class="container main_container" style="width:600px">
     <a href="<?= base_url();?>"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
	    <h2>Create Your Editorial</h2> 
        
		<div class="main_div" style="border: solid 1px black;">
        <?php if(count($cat)){ ?>
									<select name="sboard" id="sboard" class="text_div" style="font-family:'FontAwesome', Arial;border: solid 1px #ccc;">
                                     <option value="">Select Subboard</option>   
									<?php foreach($cat as $ct){

								
										?>
                                
							<option value="<?= $ct['sbid']?>"><?= $ct['subboardname']?></option>
							<?php }?>
							</select>
							<?php } ?>
			<div style="width: 100%;margin: 0 auto;">
            <div style="width:30%; display:inline-block">
                    <input type="text" name="topic" id="topic" placeholder="Comma Seperate Topic" style="border: 0;" class="text_div">
                    <input type="hidden" name="realtopic" id="realtopic" value="" />
                   			
			</div><div style="width:69%; display:inline-block"id="topicbtn"></div>
                    <input type="text" placeholder="Title" name="title" id="title" class="text_div1">
			 <div style="border:solid 1px gray;"><p style="display:inline-block;width: 3%;padding-left:10px;margin-bottom: 0px;">Intro</p><div class="txtarea" style="display:inline-block; border:none;width:95%;">	
            <section class="clearfix">
				<div>
				<textarea class="classy-editor1" name="intro" id="intro"></textarea>
					
				</div>
				
            </section>
			</div></div>
            <div style="border-top:1px solid #555">
            <i class="fa fa-times"  onClick="readURLold('imgpicintro', 'closeimg','videoimg','imgselect' );" id="closeimg" style="position: absolute;margin-left: 40%;margin-top: 5px; display:none"></i>
                        <center>
						
			<img id="imgpicintro" src="../assert/images/blank.png" class="imgprive" alt="your image" required/>
                        	
              <label class="myLabel mylabel1"> <span class="fileinput-button" id="imgselect">
                <span><i class="fa fa-picture-o fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
				<input type="file" onChange="readURL(this, 'imgpicintro', 'closeimg','videoimg','imgselect' );" name="picintro" id="picintro" value="Upload Photo" style="position:fixed; top:-1000px;" /></i></span></label>
			<!--	  <label class="myLabel mylabel3"  onclick="video_dv()"> <span class="fileinput-button" style="margin-left:20px;" id="videoimg">
                <span><i class="fa fa-youtube-play fa-3x" style="background: rgba(128, 128, 128, 0.17);margin: 10px;"> 
			</i></span></label> -->
							</center>
				</div>
			</div>
			<div id="video_url_div" style="display:none;">
			<input type="text" class="form-control" placeholder="Paste Youtyube Url">
			</div>
			<div class="txt_append">
			    <div style="border:solid 1px gray;"><p style="display:inline-block;width: 3%;padding-left:10px;margin-bottom: 0px;">1</p><div class="txtarea" style="display:inline-block; border:none;width:95%;">		
            <section class="clearfix">
				<div> 
				<textarea class="classy-editor2" name="textdes" id="textdes"></textarea>
					
				</div>
				
            </section>
			</div>
				</div>
				
			
		    </div>

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
									<li data-toggle="modal" data-target="#scheduleinst"> <button type="submit" name="scheduleltr" style="background: none;color: #fff;border: none;" id="publish">Scheduler</button></li>
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
										font-weight: bold;text-align:left;">shedule later</h4>
											</div>
										 <div class="modal-body">
											<div id="datetimepicker1" class="input-append date">
											 <label style="float: left;">Date and time</label>
											<input type="text" value="" id="datetimepicker_mask1" name="scheduletime"  class="form-control" ><br><br>
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
                    <div style="text-align:right;display:none" id="loding" >
                    <img src="<?= base_url()?>assert/images/uploading.gif" width="150px"/>
                    </div>
				</div>
			</div>
            </form>
			
		</div>
	</div>
 
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
$('#'+clos).css("display","block");
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

$('#'+img).css("display","block");
$('#'+clos).css("display","none");
$('#'+vdo).css("display","block");
   
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
 
</body>
</html>
