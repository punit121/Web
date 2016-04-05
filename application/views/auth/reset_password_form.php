<style>
.tableborder{
border:0px !important;
}
</style>
<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns" style="height:30px">
				<h4><b>Reset Password</b></h4>
			</div>        
		</div>
	</div>		
</div>
<div class="main-wrapper">
	<div class="row main-content" style="height:392px">
		<div class="large-12 columns">
<?php echo form_open($this->uri->uri_string()); ?>
<table class="tableborder">
	<tr>
		<td><?php echo form_label('New Password', $new_password['id']); ?></td>
		<td><?php echo form_password($new_password); ?></td>
		<td style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?></td>
		<td><?php echo form_password($confirm_new_password); ?></td>
		<td style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></td>
	</tr>
	<tr><td colspan="2"><?php echo form_submit('change', 'Change Password'); ?></td></tr>
</table>
	</div>
	
	</div>
</div>  
<?php echo form_close(); ?>