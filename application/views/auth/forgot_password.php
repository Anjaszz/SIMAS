<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
        .forgot-password-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .forgot-password-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .forgot-password-container p {
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

<div class="forgot-password-container">
    <h1><?php echo lang('forgot_password_heading');?></h1>
    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

    <div id="infoMessage"><?php echo $message;?></div>

    <?php echo form_open("auth/forgot_password");?>

    <div class="form-group">
        <label for="identity">
            <?php 
            echo (($type == 'email') 
                ? sprintf(lang('forgot_password_email_label'), $identity_label) 
                : sprintf(lang('forgot_password_identity_label'), $identity_label)); 
            ?>
        </label>
        <?php echo form_input($identity, '', 'class="form-control"');?>
    </div>

    <div class="form-group">
        <?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary btn-block"');?>
    </div>

    <?php echo form_close();?>
</div>

</body>
</html>
