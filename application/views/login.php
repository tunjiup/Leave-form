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
		<link rel='dns-prefetch' href='//www.google.com' />
		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/offline-theme-slide.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/offline-language-english.min.css" />
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body class="loginMain">
	 	<div class="container">
	 		<div class="login-container">
	 			<div class="logo-login">
	 				<img src="<?php echo base_url('assets/'); ?>img/logo.png" style="width: 85%;">
	 			</div>
	 			<div id="output"></div>
	 			<div class="form-box login-form">
	 				<?php echo $this->session->flashdata('error'); ?>
					<?php echo $this->session->flashdata('success'); ?>
					<?php echo $this->session->flashdata('sent'); ?>
	 				<form action="" method="post">
	 					<label>Username<input type="text" placeholder="username" name="username" value="<?php echo set_value('username'); ?>"><?php echo form_error('username') ?></label>
	 					<label>Password<input type="password" placeholder="password" name="password"><?php echo form_error('password') ?></label>
	 					<a href="<?php echo base_url('forgot-password'); ?>" class="fpass">Forget Password / Request Password</a>
	 					<br>
	 					<br>
	 					<center><div class="g-recaptcha" data-sitekey="6Lei1l8UAAAAAIIfrwYyohsPInLjj_HiuCQsSN1A"></div><?php echo form_error('g-recaptcha-response'); ?></center>
	 					<input type="submit" class="btn btn-info btn-block login" value="Login">
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	 	<script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/functions.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/admin.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/offline.min.js"></script>
	    <script type="text/javascript">
	    	Offline.options = {checks: {xhr: {url: '/css/style.css'}}};
	    </script>
	</body>
</html>
