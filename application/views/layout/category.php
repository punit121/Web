<!DOCTYPE html>
<html>
<head>
	<title>zersey</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assert/css/catagorypage.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?= base_url();?>assert/css/bootstrap.min.css">
  	<script src="<?= base_url();?>assert/js/jquery.min.js"></script>
  	<script src="<?= base_url();?>assert/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="<?= base_url();?>assert/js/blocksit.min.js"></script>
	<link rel="stylesheet" href="<?= base_url();?>assert/css/style.css">
	<link rel="stylesheet" href="<?= base_url();?>assert/css/header.css">
	

<script>

$(document).ready(function() {
	
	
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 4,
			offsetX: 8,
			offsetY: 8
		});
	});
	
	//window resize
	var currentWidth = 860;
	$(window).resize(function() {
		var winWidth = $('#container').width();
		var conWidth;
		
		if(winWidth < 360) {
			conWidth = '70%';
			col = 1;
		}else if(winWidth < 660) {
			conWidth = '70%';
			col = 2;
		} else if(winWidth < 880) {
			conWidth = '70%';
			col = 3;
		} else if(winWidth < 1100) {
			conWidth = '70%';
			col = 4;
		} else {
			conWidth = '70%';
			col = 4;
		}
		
			currentWidth = conWidth;
			$('#container').BlocksIt({
				
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
			$('#container').width(conWidth);
			
		
	});
});
</script>	
</head>
