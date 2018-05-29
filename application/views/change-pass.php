<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Leave Forms</title>
		<meta charset="utf-8">
		<meta name="description" content="MSW automated leave filling">
		<meta name="keywords" content="MSW Leave Form">
		<meta name="author" content="MegaSportWorld">
		<meta name="robots" content="noindex,nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
	</head>
	<body class="loginMain">
	 	<div class="container">
	 		<div class="login-container">

	 			<div id="output"></div>
	 			<div class="form-box login-form">
	 				<div class="labl">Change Password</div>
	 				<form action="" method="post">
	 					<label>New Password<input type="password" placeholder="New Password" name="password"><?php echo form_error('password') ?></label>
	 					<label>Confirm New Password<input type="password" placeholder="Confirm New Password" name="confirmpassword"><?php echo form_error('confirmpassword') ?></label>
	 					<input type="submit" class="btn btn-info btn-block login" value="Change">
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	</body>
</html>