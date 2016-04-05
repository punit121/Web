<script>

						$(document).ready(function() {

							$(".classy-editor").ClassyEdit();

							$(".classy-editor1").ClassyEdit();

						});

					</script> 

<body style="background-color: #DCD9D9;">



 <?php if($postdetails){

							

								foreach($postdetails as $ptd){

						?>

<form method="post" action="">

	<div class="container main_container" style="width:600px">

     <a href="<?= base_url();?>"><i class="fa fa-times fa-2x popup_cross_icon"></i></a>

	 <h2>Edit Post</h2>

	        <div class="main_div" style="border: solid 1px black;margin-top: 31px;">

				<div style="width: 100%;margin: 0 auto;">

					<div style="width:59%; display:inline-block"id="topicbtn"></div>

					<div style="border-top:1px solid #555">

						<img src="http://m.zersey.com/assets/zerseynme/<?= $ptd['photo']?>" style="width:100%;height:300px;">		

					</div>

				</div>

				<div class="txt_append">

					<div style="border:solid 1px gray;">

						<div class="txtarea" style="display:inline-block; border:none;width:95%;">		

							<section class="clearfix">

								<div>

									<textarea class="classy-editor1" name="introd" id="introd"><?= ucfirst($ptd['description'])?></textarea>

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



 

</body>

</html>

