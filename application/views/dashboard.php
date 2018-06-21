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

		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">

		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/dataTables.min.css">

		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/fullcalendar.min.css">

		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">

    	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

	</head>

	<body>

		<div id="mySidenav" class="sidenav">

		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

		  <a href="<?php echo base_url('leave-form'); ?>">Request Leave</a>

		  <a href="#" data-toggle="modal" data-target="#editProfile">Profile</a>

		  <a href="<?php echo base_url('logout'); ?>">Logout</a>

		</div>

		<div class="row main-container" id="main">

			<div class="btn-fix" onclick="openNav()">

				<span>Menu</span>

			</div>

			<div class="col-sm body-container">

				<div class="row leave-container">

					<?php echo $employee; ?>

				</div>

    			<!-- <canvas id="canvas"></canvas> -->

				<div class="row middle-container">

					<div class="col-sm cal-contain">

						<div id='calendar'></div>

					</div>

					<div class="col-sm-3">

						<div class="paper-container">

							<div class="paper">

								<br>

								<div class="headline">

									Special Events <span>corner</span>

								</div>

								<div class="sp-events">

									<ul>

										<?php echo $dob; ?>

										<?php echo $holiday; ?>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>



		<!-- Modal -->

		<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

						<h5 class="modal-title" id="editProfileLabel">Edit Profile </h5>

						<a href="#" id="modalChangePass">Change Password</a>

					</div>

					<div class="modal-body">

						<form method="post" action="<?php echo base_url('profile/update'); ?>">

							<label>Username<input type="text" placeholder="username" name="username" class="form-control"  value="<?php echo $mydata['username']; ?>" required/></label>

							<label>Gender<?php echo form_dropdown('gender', gender(), (isset($mydata['gender'])) ? $mydata['gender']: '', 'class="form-control" required'); ?></label>

							<label>Fullname<input type="text" placeholder="Juan Dela Cruz" name="fullname" class="form-control" value="<?php echo $mydata['fullname']; ?>"  required></label>

							<label>Address<input type="text" placeholder="Address" name="address" class="form-control" value="<?php echo $mydata['address']; ?>"  required></label>

							<label>Email<input type="email" placeholder="juan@sample.com" name="email" class="form-control" value="<?php echo $mydata['email']; ?>"  required></label>

							<label>Phone<input type="text" placeholder="+6309312458214" name="phone" class="form-control" value="<?php echo $mydata['cp_no']; ?>" required/></label>

							<input type="submit" class="form-control btn btn-default pull-right">

						</form>

					</div>

				</div>

			</div>

		</div>



		<!-- Modal -->

		<div class="modal fade" id="profileDir" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

						<h5 class="modal-title" id="editProfileLabel">Profile Directory </h5>

						<button type="button" class="close" data-dismiss="modal">&times;</button>

					</div>

					<div class="modal-body" id="employeeDir">

						

					</div>

				</div>

			</div>

		</div>



		<!-- Modal -->

		<div class="modal fade" id="rejectedLeave" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

						<h5 class="modal-title" id="editProfileLabel">Reasons</h5>

						<button type="button" class="close" data-dismiss="modal">&times;</button>

					</div>

					<div class="modal-body" id="rejected">

						<form method="post" action="<?php echo base_url('reject-form'); ?>">

							<textarea name="reasons"></textarea>

							<input type="submit" class="form-control btn btn-default pull-right">

						</form>

					</div>

				</div>

			</div>

		</div>



		<!-- Modal Change Password -->

		<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">

			<div class="modal-dialog" role="document">

				<div class="modal-content">

					<div class="modal-header">

						<h5 class="modal-title" id="editProfileLabel">Change Password</h5>

						<button type="button" class="close" data-dismiss="modal">&times;</button>

					</div>

					<div class="modal-body">

						<form method="post" action="<?php echo base_url('change-password'); ?>">

							<label>New Password<input type="password" placeholder="Password" name="password" id="pass" class="form-control" required/></label>

							<label>Confirm New Password<input type="password" placeholder="Confirm New Password" name="confirmpassword" id="cpass" class="form-control" required/></label>

							<input type="submit" class="form-control btn btn-default pull-right" id="changeMyPass">

						</form>

					</div>

				</div>

			</div>

		</div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/moment.min.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/fullcalendar.min.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/gcal.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/modalFunction.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>

	<script src="<?php echo base_url('assets/'); ?>js/functions.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <?php $this->load->view('auto-logout'); ?>

	<script>



		$(document).ready(function() {



			//Calendar Output

			$('#calendar').fullCalendar({

				defaultDate: '<?php echo date("Y-m-d") ?>',

				editable: false,

				eventLimit: true,

				events: {

					url: '<?php echo base_url('events'); ?>',

					error: function() {

						$('#script-warning').show();

					}

				},

				eventRender: function(event, element) {

					if (event.className == 'Rejected') {

						element.css({

							'background-color': '#ef0a05',

							'border-color': '#ef0a05'

						});

					} else if(event.className == 'Pending'){

						element.css({

							'background-color': '#f0ad4e',

							'border-color': '#f0ad4e'

						});

					}

				}

			});



			$('#pass').on('blur', function(){

				var pass = $(this).val();

				var cpass = $('#cpass').val();

				if($('#cpass').val() == '') {

					$('#changeMyPass').attr('disabled','disabled');

				} else {

					if(cpass == pass) {

						$(this).css({"border-color": ""});

						$('#cpass').css({"border-color": ""});

						$('#changeMyPass').removeAttr('disabled','disabled');

					} else {

						$(this).css({"border-color": "#dc3545"});

						$('#cpass').css({"border-color": "#dc3545"});

						$('#changeMyPass').attr('disabled','disabled');

					}

				}

			});

			

			<?php if($this->session->flashdata('success')): ?>

				toastr.success('Your data has been updated', 'Success', {timeOut: 8000})

			<?php endif; ?>

			<?php if($this->session->flashdata('rejectSuccess')): ?>

				toastr.success('Leave has been rejected', 'Success', {timeOut: 8000})

			<?php endif; ?>

			<?php if($this->session->flashdata('rejected')): ?>

				$("#rejectedLeave").modal({backdrop: "static"});

				toastr.success('Please state your reasons', 'Success', {timeOut: 8000})

			<?php endif; ?>



			<?php if($this->session->flashdata('approved')): ?>

				toastr.success('Leave has been approved', 'Success', {timeOut: 8000})

			<?php endif; ?>

			

			<?php if($this->session->flashdata('sent')): ?>

				toastr.success('Email sent to your manager', 'Success', {timeOut: 8000})

			<?php endif; ?>

			

			<?php if($this->session->flashdata('complete')): ?>

				$("#editProfile").modal({backdrop: "static"});

				toastr.info('Please complete your information', 'Information', {timeOut: 8000})

			<?php endif; ?>



			<?php if($this->session->flashdata('notsent')): ?>

				toastr.error('Email Not sent', 'Error', {timeOut: 8000})

			<?php endif; ?>



			$('#cpass').on('blur', function(){

				var cpass = $(this).val();

				var pass = $('#pass').val();

				if($('#pass').val() == '') {

					$('#changeMyPass').attr('disabled','disabled');

				} else {

					if(cpass == pass) {

						$(this).css({"border-color": ""});

						$('#pass').css({"border-color": ""});

						$('#changeMyPass').removeAttr('disabled','disabled');

					} else {

						$(this).css({"border-color": "#dc3545"});

						$('#pass').css({"border-color": "#dc3545"});

						$('#changeMyPass').attr('disabled','disabled');

					}

				}

			});



		});

		function openNav() {

		    document.getElementById("mySidenav").style.width = "190px";

		    document.getElementById("main").style.marginLeft = "190px";

		}



		function closeNav() {

		    document.getElementById("mySidenav").style.width = "0";

		    document.getElementById("main").style.marginLeft= "0";

		}



	</script>

  </body>

</html>

