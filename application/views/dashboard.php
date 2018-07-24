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
		<link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />
		<link rel='dns-prefetch' href='//use.fontawesome.com' />
		<link rel='dns-prefetch' href='//ucdnjs.cloudflare.com' />
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/dataTables.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/fullcalendar.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/slick.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/slick-theme.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap-datetimepicker.min.css">
	    	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/offline-theme-slide.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/offline-language-english.min.css" />

	</head>

	<body>

		<div id="mySidenav" class="sidenav">

			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

			<a href="<?php echo base_url('leave-form'); ?>">Request Leave <i class="fas fa-paper-plane"></i></a>

			<a href="#" class="navClose" data-toggle="modal" data-target="#editProfile">Profile <i class="fas fa-user-alt"></i></a>

			<a href="#" class="navClose" data-toggle="modal" id="leaveUpcoming" data-target="#historyfiles">Upcoming Leave <i class="fas fa-history"></i></a>

			<?php if($this->session->userdata('role') == '1'): ?>

			<a href="#" class="navClose" id="feedAnchor" data-toggle="modal" data-target="#feed_back">Message <i class="fa fa-comments" aria-hidden="true"></i> <span id="feedBadge"></span></a>
			<a href="#" class="navClose" data-toggle="modal" data-target="#database">Database <i class="fas fa-database"></i></a>
			<a href="#" class="dropdown-btn">Team <i class="fas fa-users"></i> <i class="fas fa-caret-right" id="changeCaret"></i></a>
			<div class="dropdown-container">
				<a href="#createNew" class="navClose" data-toggle="modal">New <i class="fas fa-user-plus"></i></a>
				<a href="#" class="navClose" data-toggle="modal" data-target="#bulk_upload">Bulk Upload <i class="fab fa-shirtsinbulk"></i></a>
			</div>

			<?php elseif($this->session->userdata('role') == '2'): ?>

			<a href="#" class="navClose" id="feedAnchor" data-toggle="modal" data-target="#feed_back">Feedback <i class="fa fa-comments" aria-hidden="true"></i> <span id="feedBadge"></span></a>
			<a href="#" class="navClose" data-toggle="modal" data-target="#database">Database <i class="fas fa-database"></i></a>

			<?php elseif($this->session->userdata('role') == '3' || $this->session->userdata('role') == '4'): ?>

			<a href="#" class="dropdown-btn">Team <i class="fas fa-users"></i> <i class="fas fa-caret-right" id="changeCaret"></i></a>
			<div class="dropdown-container">
				<a href="#createNew" class="navClose" data-toggle="modal">New <i class="fas fa-user-plus"></i></a>
				<a href="#" class="navClose" data-toggle="modal" data-target="#bulk_upload">Bulk Upload <i class="fab fa-shirtsinbulk"></i></a>
			</div>
			<?php endif; ?>

			<a href="<?php echo base_url('logout'); ?>">Logout <i class="fas fa-sign-out-alt"></i></a>

		</div>

		<div class="row main-container" id="main">

			<div class="btn-fix" onclick="openNav()">

				<span>Menu</span>

			</div>

			<?php if($this->session->userdata('role') == '1'): ?>
			<?php else: ?>
			<div class="st-actionContainer right-bottom">
				<div class="st-panel">
					<div class="st-panel-header"><i class="fa fa-comment" aria-hidden="true"></i> Feedback</div>
					<div id="clearfix"></div>
					<div class="grid">
						<form method="POST" action="" id="formComment">
							<textarea id="commentbox" name="commentbox" class="form-control" placeholder="comment.." required></textarea>
							<br>
							<input type="submit" name="submit" class="btn btn-primary comment-button" value="submit">
						</form>
					</div>
				</div>
				<div class="st-btn-container right-bottom">
					<div class="st-button-main"><i class="fa fa-comments" aria-hidden="true"></i></div>
				</div>
			</div>
			<?php endif; ?>

			<div class="col-sm body-container">

				<div class="row leave-container">
					<?php echo $employees; ?>
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
									<input type="text" id="myrole" value="<?php echo ($this->session->userdata('role') ? $this->session->userdata('role') : '0'); ?>">

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

		<?php $this->load->view('includes/modal'); ?>

	    <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/moment.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/fullcalendar.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/slick.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/gcal.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/bootstrap-datetimepicker.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/functions.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/action.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/admin.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/dashboard.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/offline.min.js"></script>

	    <?php $this->load->view('includes/auto-logout'); ?>

		<script>

			Offline.options = {checks: {xhr: {url: '/css/style.css'}}};

			$(document).ready(function() {

				$('.leave-container').slick({
					slidesToShow: 10,
					slidesToScroll: 1,
					autoplay: true,
					autoplaySpeed: 3000,
					dots: true,
					prevArrow: false,
					nextArrow: false,
					swipeToSlide: true,
					responsive: [
						{
							breakpoint: 1800,
							settings: {
								slidesToShow: 8
							}
						},
						{
							breakpoint: 1400,
							settings: {
								slidesToShow: 6
							}
						},
						{
							breakpoint: 1000,
							settings: {
								slidesToShow: 4
							}
						},
						{
							breakpoint: 650,
							settings: {
								slidesToShow: 3
							}
						}

					]
				});

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

				<?php if($this->session->flashdata('success')): ?>

					toastr.success('Your data has been updated', 'Success', {timeOut: 8000})

				<?php elseif($this->session->flashdata('rejectSuccess')): ?>

					toastr.success('Leave has been rejected', 'Success', {timeOut: 8000})

				<?php elseif($this->session->flashdata('rejected')): ?>

					$("#rejectedLeave").modal({backdrop: "static"});

					toastr.success('Please state your reasons', 'Success', {timeOut: 8000})

				<?php elseif($this->session->flashdata('approved')): ?>

					toastr.success('Leave has been approved', 'Success', {timeOut: 8000})

				<?php elseif($this->session->flashdata('sent')): ?>

					toastr.success('Email sent to your manager', 'Success', {timeOut: 8000})

				<?php elseif($this->session->flashdata('complete')): ?>

					$("#editProfile").modal({backdrop: "static"});

					toastr.info('Please complete your information', 'Information', {timeOut: 8000})

				<?php elseif($this->session->flashdata('notsent')): ?>

					toastr.error('Email Not sent', 'Error', {timeOut: 8000})

				<?php elseif($this->session->flashdata('movedate')): ?>

					$("#moveDate").modal({backdrop: "static"});

					toastr.info('Change your leave date', 'Info', {timeOut: 8000})

				<?php elseif($this->session->flashdata('movedateSuccess')): ?>

					toastr.success('Successfully change leave date', 'Success', {timeOut: 8000})

				<?php elseif($this->session->flashdata('rejectSuccess')): ?>

					toastr.success('Leave has been rejected', 'Success', {timeOut: 8000})

				<?php endif; ?>

			});

			function openNav() {
				document.getElementById("mySidenav").style.width = "190px";
				document.getElementById("main").style.marginLeft = "190px";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
			}

			$('.navClose').on('click', function(){
				closeNav();
			});

			function msgview(id) {
				msgView(id);
			}

			function msghide(id) {
				msgHide(id);
			}

			function cancelLeave(id) {
				leaveCancel(id);
			}

		</script>

	</body>

</html>

