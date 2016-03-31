<style>
.messge{height: 400px;
margin-left: 10%;
margin-top: 5%;
}
</style>
<link rel="icon" href="<?= base_url(); ?>assets/images/favicon.ico" type="image/ico">
<div id="fb-root"></div>
<script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
<script src="<?=base_url()?>assets/js/pages/user.js"></script>	
<body class="boxed">
<!-- Begin Main Wrapper -->
<div id="message" class="messge">
<b>
<?php echo $message; ?>
</b>
</div>