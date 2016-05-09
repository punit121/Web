<script>
						$(document).ready(function() {
							$(".classy-editor1").ClassyEdit();
								$(".classy-editor2").ClassyEdit();
							
						});
					</script> 
<body style="background-color: #DCD9D9;">
<?php if(isset($post)){
	
			foreach($post as $pt){
	
		?>


 <?php if(isset($postdetail)){
							
								foreach($postdetail as $ptd){
						?>
<form method="post" action="">
	<div class="container main_container" style="width:600px">
     <a href="<?= base_url();?>"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>
	 <h2>Edit Post</h2>
	        <div class="main_div" style="border: solid 1px black;margin-top: 31px;">
				<div style="width: 100%;margin: 0 auto;">
					<div style="width:59%; display:inline-block"id="topicbtn"></div>
          	<input type="text" placeholder="Title" name="title" id="title" class="text_div1" value="<?= ucfirst($pt['head'])?>">
					
					<div style="border-top:1px solid #555">
						<img src="http://m.zersey.com/assets/zerseynme/<?= $pt['image']?>" style="width:100%;height:300px;">		
					</div>
				</div>
				<div class="txt_append">
					<div style="border:solid 1px gray;">
						<div class="txtarea" style="display:inline-block; border:none;width:95%;">		
							<section class="clearfix">
								<div>
									<textarea class="classy-editor1" name="intro" id="intro"><?= ucfirst( $pt['intro'])?></textarea>
								</div>
                                				
						<div>
									<textarea class="classy-editor2" name="introd1" id="introd1"><?= ucfirst($ptd['description'])?></textarea>
								</div>
							</section>
							
						</div>
					</div>
					
				</div>
                <input type="hidden" id="url" name="url" value="<?=$_SERVER['HTTP_REFERER']?>"/>
               <input type="hidden" id="countrow" name="countrow" value="1"/>
			</div>
			<div style="margin-top: 10px;">
				<div style="text-align:center">
					<span style="color:#F00" id="error"></span>
					<div style="text-align:right" id='submitdiv'>
						<div class="btn-group">
							<button type="submit" name="published" id="published" class="btn btn-danger">Update</button>
					    </div>
					</div>
                    <div style="text-align:right;display:none" id="loding" >
                        <img src="<?= base_url()?>assert/images/uploading.gif" width="150px"/>
                    </div>
				</div>
			</div>
        </form>
        <?php }} ?>
                <?php }} ?>

		</div>
	</div>
 <script>
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
 <!-- Google Analytics Code -->
   <?php include_once("analyticstracking.php") ?>
 
</body>
</html>