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
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
	</head>
	<body class="loginMain">
	 	<div class="container">
	 		<div class="login-container">
	 			<div id="output"></div>
	 			<div class="form-box login-form">
	 				<?php echo $this->session->flashdata('error'); ?>
					<?php echo $this->session->flashdata('success'); ?>
	 				<form action="" method="post">
	 					<label>Username<input type="text" placeholder="username" name="username" value="<?php echo set_value('username'); ?>"><?php echo form_error('username') ?></label>
	 					<label>Password<input type="password" placeholder="password" name="password"><?php echo form_error('password') ?></label>
	 					<a href="<?php echo base_url('forgot-password'); ?>" class="fpass">Forget Password</a>
	 					<input type="submit" class="btn btn-info btn-block login" value="Login">
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	</body>
</html>