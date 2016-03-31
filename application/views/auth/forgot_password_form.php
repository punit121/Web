<style>
.tableborder{
border:0px !important;
}
</style>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<div class="main-content-top">	
	<div class="main-wrapper">	
		<div class="row">
			<div class="large-6 columns">
				<h4><b>Forgot Password</b></h4>
			</div>        
		</div>
	</div>		
</div>
	

<!-- End Main Content Top -->
<div class="main-wrapper">
	<div class="row main-content">
		<div class="large-12 columns" style="height:386px">
		Forgot your password? Enter the email address of your account to reset your password, otherwise you can try again.
		<?php echo form_open($this->uri->uri_string()); ?>
<table class="tableborder">
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
	<tr><td colspan="2"><?php echo form_submit('reset', 'Get a new password'); ?></td>
	</tr>
</table>

<?php echo form_close(); ?>

		</div>
	
	</div>
</div>  
