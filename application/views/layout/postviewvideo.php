<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title><?php echo $post['0']['head'];?></title>
 <link rel="icon" href="<?= base_url() ?>assets/images/final_logo.jpg" type="image/ico">

<?php if(($next)){ foreach($next as $nex){$hed=str_replace(" ","-",$nex['head']);$hed= preg_replace("/[^A-Za-z0-9\-]/", "", $hed);$fhed=substr($hed,0,50);$nextlink= base_url()."postview/".$fhed."/".$nex['id'];}}?>

<script>

var nextpst = '<?= $nextlink?>';

var baseurl ="<?= base_url()?>";

</script>



  <link href="<?= base_url();?>assert/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 

<link rel="stylesheet" type="text/css" href="<?= base_url();?>assert/lib/css/prettify.css"></link>

<link rel="stylesheet" type="text/css" href="<?= base_url();?>assert/src/bootstrap-wysihtml5.css"></link>



  <script src="<?= base_url();?>assert/js/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url();?>assert/css/postview.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		

		<link href="<?= base_url();?>assert/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?= base_url();?>assert/css/mystyle.css">

<link rel="stylesheet" type="text/css" href="<?= base_url();?>assert/css/header.css">

<script src="<?= base_url();?>assert/js/bootstrap.min.js"></script>

<script src="<?= base_url();?>assert/js/page/blog.js"></script>

<script>

window.addEventListener("keyup", function(e){ if(e.keyCode == 27) window.location.replace("dashboard"); }, false);

</script>

</head>

