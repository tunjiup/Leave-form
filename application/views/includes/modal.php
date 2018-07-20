		<!-- Modal For Edit Profile -->
		<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title profileEdit"><i class="fas fa-user-edit"></i> Edit Profile</h5>
						<a href="#changePass" id="modalChangePass" data-toggle="modal"><i class="fas fa-user-lock"></i> Change Password</a>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo base_url('profile/update'); ?>">
							<label>Username<input type="text" placeholder="username" name="username" class="form-control"  value="<?php echo $mydata['username']; ?>" required/></label>
							<label>Gender<?php echo form_dropdown('gender', gender(), (isset($mydata['gender'])) ? $mydata['gender']: '', 'class="form-control" required'); ?></label>
							<label>Fullname<input type="text" placeholder="Juan Dela Cruz" name="fullname" class="form-control" value="<?php echo $mydata['fullname']; ?>"  required></label>
							<label>Address<input type="text" placeholder="Address" name="address" class="form-control" value="<?php echo $mydata['address']; ?>"  required></label>
							<label>Email<input type="email" placeholder="juan@sample.com" name="email" class="form-control" value="<?php echo $mydata['email']; ?>"  required></label>
							<label>Phone<input type="text" placeholder="+6309312458214" name="phone" class="form-control" value="<?php echo $mydata['cp_no']; ?>" required/></label>
							<input type="submit" class="form-control btn btn-info pull-right">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Profile Modal -->

		<!-- Modal Change Password -->
		<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog modal-sm" role="document" style="margin-top:8%;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="changPass"><i class="fas fa-key"></i> Change Password</h5>
						<button type="button" class="close passClose" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="post" action="<?php echo base_url('change-password'); ?>" id="pass_change">
							<label>New Password<input type="password" placeholder="Password" name="password" id="pass" class="form-control" required/></label>
							<label>Confirm New Password<input type="password" placeholder="Confirm New Password" name="confirmpassword" id="cpass" class="form-control" required/></label>
							<input type="submit" class="form-control btn btn-info pull-right" id="changeMyPass">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Change Password -->

		<!-- Modal For Profile Directory -->
		<?php if($this->session->userdata('role') == 4): ?>
			<?php if($year['year'] != date('Y')): ?>
				<?php $link = '<a href="#leaveBal" id="EditEmployeesLeave" data-toggle="modal" ><i class="fas fa-user-edit"></i> Leave</a>'; ?>
			<?php else: ?>
				<?php $link = '<button type="button" class="close" data-dismiss="modal">&times;</button>'; ?>
			<?php endif; ?>
		<?php else: ?>
			<?php $link = '<button type="button" class="close" data-dismiss="modal">&times;</button>'; ?>
		<?php endif; ?>
		<div class="modal fade" id="profileDir" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">
			<div class="modal-dialog" role="document" style="margin-top:8%;">
				<div class="modal-content" >
					<div class="modal-header">
						<h5 class="modal-title" id="directoryProfile"><i class="fas fa-user-cog"></i> Profile Directory</h5>
						<?php echo $link; ?>
					</div>
					<div class="modal-body" id="employeeDir">
					</div>
				</div>
			</div>
		</div>
		<!-- End Profile Directory Modal -->

		<!-- Modal For Reason -->
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
							<input type="submit" class="form-control btn btn-info pull-right">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Reason Modal -->

		<!-- Modal Feedback -->
		<div class="modal fade" id="feed_back" tabindex="-1">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="historyLogs"><i class="fa fa-comments" aria-hidden="true"></i> Feedback</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<table class="responsive-table table">
							<thead class="feedthead">
								<tr>
									<th>Date</th>
									<th>Message</th>
									<th>From</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="feedtbody">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- End Feedback -->

		<!-- Modal Feedback Comment -->
		<div class="modal fade" id="comment_view" data-backdrop="false">
			<div class="modal-dialog" role="document" style="margin-top:10%;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title header-leave-modal"><i class="fas fa-comment-dots"></i> Feedback</h5>
						<button type="button" class="close" id="commentClose" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body" id="displayComment">
					</div>
				</div>
			</div>
		</div>
		<!-- End Feedback Comment -->

		<!-- Modal Leave History -->
		<div class="modal fade" id="historyfiles" tabindex="-1">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="historyLogs"><i class="fas fa-history"></i> Leave History</h5>
						<a href="<?php echo base_url('download-history-leave'); ?>" id="historyDL"><i class="far fa-file-archive"></i> Download</a>
					</div>
					<div class="modal-body">
						<table class="responsive-table table">
							<thead class="leavethead">
								<tr>
									<th>Date</th>
									<th>Title</th>
									<th>Types</th>
									<th>Status</th>
									<th>Date Change</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="leavetbody">
								<?php foreach ($leaveHistory as $val): ?>
									<?php if($val->start == date('Y-m-d')): ?>
										<?php $action = '<a href="'.base_url('download-leave/'.$val->code).'" class="downloadFiles"><i class="fas fa-cloud-download-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('leave-cancel/'.$val->code).'" class="downloadFiles"><i class="fas fa-times"></i></a>'; ?>
									<?php else: ?>
										<?php $action = '<a href="'.base_url('edit-leave-form/'.$val->code).'" class="EditHistory"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('download-leave/'.$val->code).'" class="downloadFiles"><i class="fas fa-cloud-download-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('leave-cancel/'.$val->code).'" class="downloadFiles"><i class="fas fa-times"></i></a>'; ?>
									<?php endif; ?>
									<?php if($val->days > 1): ?>
										<?php $date = date('M j',strtotime($val->start)).' - '.date('M j, Y',strtotime($val->end)); ?>
									<?php else: ?>
										<?php $date = date('M j, Y',strtotime($val->start)); ?>
									<?php endif; ?>
									<tr>
										<td><?php echo $date; ?></td>
										<td><?php echo $val->title; ?></td>
										<td><?php echo $val->types; ?></td>
										<td><?php echo $val->classname; ?></td>
										<td><?php echo $val->mstatus; ?></td>
										<td><?php echo $action; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- End Leave History -->

		<!-- Modal Bulk Upload -->
		<div class="modal fade" id="bulk_upload" tabindex="-1">
			<div class="modal-dialog modal-sm" role="document" style="margin-top:8%;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="bulkUpload"><i class="fas fa-cloud-upload-alt"></i> Bulk Upload</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="post" id="import_csv" enctype="multipart/form-data">
							<label>Select CSV Format<input type="file" name="csv_file" id="csv_file" required accept=".csv" /></label>
							<input type="submit" class="form-control btn btn-info pull-right" id="import_csv_btn" value="Import CSV">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Bulk Upload -->

		<!-- Modal Create New -->
		<div class="modal fade createNew" id="createNew" tabindex="-1">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title createNew"><i class="fas fa-user"></i> Create New</h5>
						<button type="button" class="close" id="closeNew" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="post" action="" id="CreateNewSubordinate">
							<label>Username<input type="text" name="username" placeholder="Username" class="form-control" required></label>
							<label>Email<input type="email" name="email" placeholder="juandelacruz@sample.com" class="form-control" required></label>
							<label>Gender<?php echo form_dropdown('gender', gender(),  set_value('gender'), 'class="form-control" required'); ?></label>
							<label>Fullname<input type="text" name="name" placeholder="Juan Dela Cruz" class="form-control" required></label>
							<label>Birthdate<input type="text" name="dob" id="empdob" data-toggle="datetimepicker" data-target="#empdob" placeholder="mm/dd/YYYY" class="form-control" required></label>
							<label>Position<?php echo form_dropdown('position', position(),  set_value('position'), 'class="form-control" required'); ?></label>
							<label>Department<input type="text" name="department" placeholder="Department" class="form-control" required></label>
							<label>Immediate Supervisor<input type="text" name="manager" placeholder="Immediate Supervisor" class="form-control" required></label>
							<label>Depart. Head<input type="text" name="departmenthead" placeholder="Deparment Head" class="form-control" required></label>
							<input type="submit" class="form-control btn btn-info pull-right">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Create New -->

		<!-- Modal Change Leave Date -->
		<div class="modal fade" id="leaveBal" tabindex="-1" data-backdrop="false">
			<div class="modal-dialog modal-sm" role="document" style="margin-top:15%;">
				<div class="modal-content">
					<div class="modal-header"><input type="hidden" id="container">
						<h5 class="modal-title createNew" ><i class="fas fa-balance-scale"></i> Leave Balance</h5>
						<button type="button" class="close modalClose" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form method="post" action="" id="balanceLeave">
							<input type="hidden" id="empID">
							<label>Vacation<input type="text"  placeholder="13.88/13.88" name="vacation" class="form-control" required/></label>
							<label>Sick<input type="text" placeholder="10/10" name="sick" class="form-control" required/></label>
							<input type="submit" class="form-control btn btn-info pull-right" value="Update">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End Change Leave Date -->

		<!-- Modal Leave History -->
		<div class="modal fade" id="database" tabindex="-1">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title createNew"><i class="fas fa-table"></i> Table List</h5>
						<a href="#" id="dbAll"><i class="far fa-file-archive"></i> Backup</a>
					</div>
					<div class="modal-body">
						<table class="responsive-table table">
							<thead class="leavethead">
								<tr>
									<th>Table Name</th>
									<th>Table Comment</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="leavetbody" id="dbTableList">
								<?php echo $database; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- End Leave History -->

		<!-- Modal Table Structure -->
		<div class="modal fade" id="StructureDB" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true" data-backdrop="false">
			<div class="modal-dialog modal-lg" role="document" style="margin-top:8%;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title createNew"><i class="fas fa-cubes"></i> <span id="strucTable"></span> Structure</h5>
						<button type="button" class="close dbClose" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<table class="responsive-table table">
							<thead class="leavethead">
								<tr>
									<th>Field</th>
									<th>Type</th>
									<th>NULL</th>
									<th>KEY</th>
									<th>DEFAULT</th>
									<th>EXTRA</th>
								</tr>
							</thead>
							<tbody class="leavetbody" id="dbtableStructure">

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- End Table Structure -->
