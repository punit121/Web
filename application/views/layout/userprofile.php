 <!DOCTYPE html>
<html>
<head>
	<title>zersey</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assert/css/userprofile.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?= base_url()?>assert/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  	<script src="<?= base_url()?>assert/js/jquery.min.js"></script>
  	<script src="<?= base_url()?>assert/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="<?= base_url()?>assert/js/blocksit.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assert/css/header.css">
	

<script>
var baseurl = "<?= base_url();?>"
$(document).ready(function() {	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 3,
			offsetX: 8,
			offsetY: 8
		});
	});
	//window resize
	var currentWidth = 860;
	$(window).resize(function() {
		var winWidth = $('#container').width();
		var conWidth;
		
		if(winWidth < 160) {
			conWidth = '100%';
			col = 1
		}else if(winWidth < 660) {
			conWidth = '100%';
			col = 2
		} else if(winWidth < 880) {
			conWidth = '100%';
			col = 3
		} else if(winWidth < 1100) {
			conWidth = '100%';
			col = 3;
		} else {
			conWidth = '100%';
			col = 3;
		}
		
			currentWidth = conWidth;
			$('#container').BlocksIt({
				
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
			$('#container').width(conWidth);
			
		
	});
	$('#cid').keyup(function(e) {	
		var maincat= document.getElementById("cid").value;
		if (maincat.indexOf(',') == -1) {
			$.post(baseurl+'users/allcategory/'+maincat,function(data){
				//console.log(data);
				//alert(baseurl+'users/findAllServices/'+loc);
				var availableTags = data.split(",");
				//console.log(availableTags);
				$('#cid').autocomplete({
					html:true,
					source: availableTags,
					select: function (event, ui) {
						event.preventDefault();
						var selectedObj = ui.item;
						var a=(eval(selectedObj));
						var b=(a.label);
						$('#cid').autocomplete('close');
						//$(".ui-menu-item").hide();
						b=$.trim(b);
						$('#cid').val('');
						gotname(b);
					}			
				}).data("ui-autocomplete")._renderItem = function (ul, item) {
					return $("<li></li>")
					.data("item.autocomplete", item)
					.append("<a>" + item.value + "</a>")
					.appendTo(ul);
				};
			});	
		} else if(e.which == 13){
			var edited = maincat.replace(/^,|,$/g,'');
			$('#cid').autocomplete('close');
			$('#cid').val('');
			edited=$.trim(edited);
			gotname(edited);
		} else {
			var edited = maincat.replace(/^,|,$/g,'');
			$('#cid').autocomplete('close');
			$('#cid').val('');
			edited=$.trim(edited);
			gotname(edited);
		}	
	});
});
function gotname(c) {
	var a= document.getElementById("realcat").value;
	var m= "'"+c+"'"
	$('#topicbtn').append('<span class="blockDelete" id="'+c+'">'+c+'<a onClick="removename('+m+')" title="Delete"><i class="fa fa-times" style="padding-left: 2px; padding-right: 10px;"></i></a></span>');
	if(a!=="")
		document.getElementById("realcat").value=a+","+c;
	else
		document.getElementById("realcat").value=c;
}
function removename(id) {
	var a= document.getElementById("realcat").value;	
	var b=a.replace(id,'');
	b = b.replace(/ +(?= )/g,'');
	b=b.trim();
	document.getElementById(id).remove();
	if(b.substring(0, 1)==',') {
		b = b.substring(1);
	}
	document.getElementById("realcat").value=b;
}
</script>		
</head>