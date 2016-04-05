<?php $this->load->view('layout/head.php');
$this->load->view('layout/header.php');
 ?>
<?php
$this->session->sess_destroy();
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>
<div style="height:453px !important">
<?php echo form_open($this->uri->uri_string()); ?>
<table style="border:0px;margin-left:10%">
	<tr><td colspan="3"><h5><b>Your account is not activated yet</b></h5></td></tr>
	<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
	<tr>
	<td><input type="submit" name="send" value="Send Activation" class="resend_button"></td>
	</tr>
</table>
<?php echo form_close(); ?>
</div>
<?php $this->load->view('layout/footer.php'); ?>
