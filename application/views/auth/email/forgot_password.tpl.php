<html>
<body>
	<h1><?php echo sprintf(lang('email_forgot_password_heading'), $identity);?>hhh</h1>
	<p><?php echo sprintf(lang('email_forgot_password_subheading'), anchor('auth/reset_password/'. $forgotten_password_code, lang('email_forgot_password_link')));?></p>
	<p><a href="<?php echo base_url('uploads/combined_image.png'); ?>" download>Download Here</a></p>
</body>
</html>