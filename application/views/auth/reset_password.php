<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahkan CSS kustom di sini */
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .reset-password-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .reset-password-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .reset-password-container p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        #infoMessage {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="reset-password-container">
    <h1><?php echo lang('reset_password_heading');?></h1>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open('auth/reset_password/' . $code);?>

    <div class="form-group">
        <label for="new_password">
            <?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?>
        </label>
        <?php echo form_input($new_password, '', 'class="form-control"');?>
    </div>

    <div class="form-group">
        <label for="new_password_confirm">
            <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?>
        </label>
        <?php echo form_input($new_password_confirm, '', 'class="form-control"');?>
    </div>

    <?php echo form_input($user_id);?>
    <?php echo form_hidden($csrf); ?>

    <div class="form-group">
        <?php echo form_submit('submit', lang('reset_password_submit_btn'), 'class="btn btn-primary btn-block"');?>
    </div>

    <?php echo form_close();?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.18/sweetalert2.all.min.js"></script>

<?php if ($this->session->flashdata('message')): ?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			Swal.fire({
				title: 'Notification',
				text: "<?php echo $this->session->flashdata('message'); ?>",
				icon: "<?php echo $this->session->flashdata('status'); ?>",
				confirmButtonText: 'OK'
			});
		});
	</script>
<?php endif; ?>
</body>
</html>
