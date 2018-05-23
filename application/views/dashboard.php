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
	</head>
	<body>
		<div class="row main-container">
			<div class="col-sm body-container">
				<div class="requestBtn">
					<button>Request Leave</button>
				</div>
				<div class="row leave-container">
					<?php echo $employee; ?>
				</div>
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
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/moment.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/fullcalendar.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/gcal.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>

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
				}
			});

		});

	</script>
  </body>
</html>