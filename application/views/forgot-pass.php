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
	 				<div class="labl">Forget Password</div>
	 				<form action="" method="post">
	 					<label>Email<input type="text" placeholder="Email" name="email"><?php echo form_error('email') ?></label>
	 					<input type="submit" class="btn btn-info btn-block login" value="Request">
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	</body>
</html>