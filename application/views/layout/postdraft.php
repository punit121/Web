 <!DOCTYPE html>

<html>

<head>

	<title>zersey</title>
	 <link rel="icon" href="<?= base_url() ?>assets/images/final_logo.jpg" type="image/ico">

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assert/css/userprofile.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="stylesheet" href="<?= base_url()?>assert/css/bootstrap.min.css">

  	<script src="<?= base_url()?>assert/js/jquery.min.js"></script>

  	<script src="<?= base_url()?>assert/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script src="<?= base_url()?>assert/js/blocksit.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assert/css/header.css">

	



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