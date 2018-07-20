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
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/bootstrap-datetimepicker.min.css">
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/offline-theme-slide.min.css">
		<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/offline-language-english.min.css" />
	</head>
	<body>
		<div class="wrapper">
			<!-- <form method="post" action="http://localhost:8080/dev-leave-form/leave-form/add"> -->
				<div class="main formPaper" id="formPaper">
					<div class="header">
						<img src="<?php echo base_url('assets/'); ?>img/ocvi_logo.jpg" />
						<div class="address">43/F Yuchengco Tower, RCBC Plaza Ayala Ave. cor. Gil Puyat Ave., Makati City </div>
					</div>
					<div class="content">
						<div class="title"> Leave Application Form </div>
						<div class="section">
							<div class="s-title">Leave Information</div>
							<div class="form">
								<table class="inpt-grp">
									<tr>
										<td class="lbl">Employee Name: </td>
										<td class="inpt" colspan="3"><input type="text" value="<?php echo $mydata['fullname']; ?>" readonly/></td>
									</tr>
									<tr>
										<td class="lbl">Position: </td>
										<td class="inpt"><input type="text" value="<?php echo $mydata['position']; ?>" readonly/></td>
										<td class="lbl" style="width: 0.97in">Department: </td>
										<td class="inpt"><input type="text" value="<?php echo $mydata['department']; ?>" readonly/></td>
									</tr>
									<tr>
										<td class="lbl">Manager: </td>
										<td class="inpt" colspan="3"><input type="text" value="<?php echo $mydata['manager']; ?>" readonly/></td>
									</tr>
									<tr>
										<td class="lbl" colspan="4">Type of Leave Requested: </td>
									</tr>
									<input type="hidden" id="vL" value="<?php echo $vl ?>">
									<input type="hidden" id="sL" value="<?php echo $sl ?>">
									<input type="hidden" id="bL" value="<?php echo $bl ?>">
									<tr>
										<td class="inpt tplr" colspan="4">
											<table id="checkTypes">
												<tr>
													<input type="hidden" id="contLeave" name="contLeave">
													<td class="space"></td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox" value="Sick" /> <label for="ckbox"></label></td>
													<td class="sublbl">Sick</td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox2" value="Vacation" /> <label for="ckbox2"></label></td>
													<td class="sublbl">Vacation</td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox3" value="Bereavement" /> <label for="ckbox3"></label></td>
													<td class="sublbl">Bereavement</td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox4" value="Offsetting" /> <label for="ckbox4"></label></td>
													<td class="sublbl">Offsetting</td>
													<td class="subinpt"></td>
													<td class="sublbl"></td>
												</tr>
												<tr>
													<td class="space"></td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox5" value="Emergency" /> <label for="ckbox5"></label></td>
													<td class="sublbl">Emergency</td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox6" value="Maternity/Paternity" /> <label for="ckbox6"></label></td>
													<td class="sublbl">Maternity/Paternity</td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox7" value="Under time" /> <label for="ckbox7"></label></td>
													<td class="sublbl">Under time</td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox8" value="Birthday" /> <label for="ckbox8"></label></td>
													<td class="sublbl">Birthday</td>
													<td class="subinpt"><input type="checkbox" class="leaveTypes" name="types" id="ckbox9" value="Hospitalization" /> <label for="ckbox9"></label></td>
													<td class="sublbl">Hospitalization </td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								<table>
									<tr>
										<td class="lbl" style="width: 1.68in">Dates of Leave From: </td>
										<td class="inpt text-center" style="width: 2.44in">
											<input type="text" name="dateTimeFrom" id="dateTimePickerFrom" data-toggle="datetimepicker" data-target="#dateTimePickerFrom" class=" datetimepicker-input" data-date-start-date="0d"/>
										</td>
										<td class="lbl" style="width: 0.28in">to</td>
										<td class="inpt text-center" style="width: 2.61in">
											<input type="text" name="dateTimeTo" id="dateTimePickerTo" data-date-start-date="0d" data-toggle="datetimepicker" data-target="#dateTimePickerTo" class=" datetimepicker-input"/>
										</td>
									</tr>
									<tr>
										<td colspan="4" class="lv-container">
											<br />
											<div class="lv-checkbox">
												<table>
													<tr>
														<input type="hidden" id="regular" name="regular">
														<td class="space"></td>
														<td class="subinpt"><input type="checkbox" class="withorwithoutpay" id="ckbox10" value="LWP" /> <label for="ckbox10"></label></td>
														<td style="width: 1.2in">LWP</td>
														<td class="subinpt"><input type="checkbox" class="withorwithoutpay" id="ckbox11" value="LW/OP" /> <label for="ckbox11"></td>
														<td style="width: 0.8in">LW/OP</td>
														<td style="width: 1.75in">TOTAL NUMBER OF DAYS:</td>
														<td style="width: 0.2in;"><input type="text" name="noDays" id="noDays" style=" text-align: center;" /></td>
														<td class="endSpace"></td>
													</tr>
												</table>
											</div>
											<div class="rfl">
												<div class="rfl-lbl">Reason for Leave:</div>
												<div class="rfl-inpt"><input type="text" name="reason" id="reason" /></div>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="4"><span class="reminder">You must submit requests for absences, other than sick leave, two days prior to the first day you will be absent.</span></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="section">
							<div class="s-title w-spc">HR Use only</div>
							<div class="hr-tbl">
								<table>
									<tr>
										<td class="hr-lbl"></td>
										<td class="hr-lbl-col">Unused Leaves from Previous Year</td>
										<td class="hr-lbl-col">Sick</td>
										<td class="hr-lbl-col">Vacation</td>
										<td class="hr-lbl-col">Others</td>
									</tr>
									<tr>
										<td class="hr-lbl-row">Previous Balance</td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
									</tr>
									<tr>
										<td class="hr-lbl-row">2013 Entitlement</td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
									</tr>
									<tr>
										<td class="hr-lbl-row">Taken Previously (YTD)</td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
									</tr>
									<tr>
										<td class="hr-lbl-row">Balance before this Application</td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
									</tr>
									<tr>
										<td class="hr-lbl-row">Taken (this application)</td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
									</tr>
									<tr>
										<td class="hr-lbl-row">Balance carried forward:</td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
										<td class="hr-lbl-rowcol"></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="section">
							<div class="s-title w-spc">Approvals</div>
							<div class="ap-tbl">
								<table>
									<tr>
										<td class="ap-lbl">Action</td>
										<td class="ap-lbl">Name</td>
										<td class="ap-lbl">Signature</td>
										<td class="ap-lbl">Date</td>
									</tr>
									<tr>
										<td class="ap-lbl-row">Requested by: Employee Name</td>
										<td class="ap-lbl-row"><input type="text" value="<?php echo $mydata['fullname']; ?>" readonly/></td>
										<td class="ap-lbl-row"></td>
										<td class="ap-lbl-row"><input type="text" id="datePass" readonly/></td>
									</tr>
									<tr>
										<td class="ap-lbl-row">Recommended by: Immediate Supervisor</td>
										<td class="ap-lbl-row"><input type="text" value="<?php echo $mydata['manager']; ?>" readonly/></td>
										<td class="ap-lbl-row"></td>
										<td class="ap-lbl-row"><input type="text" readonly/></td>
									</tr>
									<tr>
										<td class="ap-lbl-row">Approved by: Department Head/COO</td>
										<td class="ap-lbl-row"><input type="text" value="<?php echo $mydata['departmenthead']; ?>" readonly/></td>
										<td class="ap-lbl-row"></td>
										<td class="ap-lbl-row"><input type="text" readonly/></td>
									</tr>
									<tr>
										<td class="ap-lbl-row">Checked and Verified: HR Department</td>
										<td class="ap-lbl-row"></td>
										<td class="ap-lbl-row"></td>
										<td class="ap-lbl-row"></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="footer">
						<div class="footer-text">Revised form as of September 2009</div>
						<div class="footer-text right">HRD-LEF002</div>
					</div>
				</div>
				<input type="submit" class="print" id="saveto" value="Save this">
			<!-- </form> -->
		</div>

		<!-- Modal Message -->
		<div class="modal fade" id="successLeave" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm" style="margin-top:10%;width:20%;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editProfileLabel">Success</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<center><i class="fas fa-check-circle fa-3x" style="color:green;margin:auto;"></i></center>
					</div>
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/html2pdf.bundle.min.js"></script>
		<script src="<?php echo base_url('assets/'); ?>js/restrictCheckbox.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/moment.min.js"></script>
	    <script src="<?php echo base_url('assets/'); ?>js/fullcalendar.min.js"></script>
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

    	<script type="text/javascript">
    		Offline.options = {checks: {xhr: {url: '/css/style.css'}}};
    	</script>
	</body>
</html>
