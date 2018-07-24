function print() {
	var element = document.getElementById('formPaper');
	var opt = {
		margin: 0,
		filename: 'LeaveForm_MSW.pdf',
		image: {
			type: 'jpeg',
			quality: 1
		},
		html2canvas: {
			dpi: 300,
			letterRendering: true
		},
		jsPDF: {
			unit: 'in',
			format: 'A4',
			orientation: 'portrait'
		}
	};

	html2pdf(element, opt);
}

$(function(){

	$('[data-toggle="tooltip"]').tooltip()

	$('#saveto').click(function(){
		var dateTimeFrom = $('#dateTimePickerFrom').val();
		var dateTimeTo = $('#dateTimePickerTo').val();
		var dateFrom = $('#datePickerFrom').val();
		var dateTo = $('#datePickerTo').val();
		var reason = $('#reason').val();
		var regular = $('#regular').val();
		var noDays = $('#noDays').val();
		var contLeave = $('#contLeave').val();
		var vl = parseFloat($('#vL').val());
		var sl = parseFloat($('#sL').val());
		var bl = $('#bL').val();
		var dpf = $('#dateTimePickerFrom').val();
		var dpt = $('#dateTimePickerTo').val();

		if(contLeave == '') {
			toastr.error('Type of Leave Requested are empty', 'Error', {timeOut: 8000});
		} else {
			if(dpf == '' || dpt == '') {
				toastr.error('Date of leave are empty', 'Error', {timeOut: 8000});
			} else {
				if(noDays == '') {
					toastr.error('Total number of days are empty', 'Error', {timeOut: 8000});
				} else {
					if(regular == '') {
						toastr.error('Please choose LWP / LWOP ', 'Error', {timeOut: 8000});
					} else {
						if(reason == '') {
							toastr.error('Reason for Leave are empty ', 'Error', {timeOut: 8000});
						} else {
							if(contLeave == 'Sick') {

								if(regular == "LW/OP") {
									saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
								} else {
									if(sl == 0) {
										toastr.error('You have a zero sick leave', 'Error', {timeOut: 8000});
									} else {
										if(dateFrom == '' || dateTo == '' || reason == '' || regular == '' || noDays == '') {
											toastr.error('Required fileds', 'Error', {timeOut: 8000});
										} else {
											saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
										}
									}
								}
								
							} else if(contLeave == 'Birthday') {

								if(regular == "LW/OP") {
									saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
								} else {
									if(bl == 0) {
										toastr.error('You have a zero birthday leave', 'Error', {timeOut: 8000});
									} else {
										saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
									}
								}
									
							} else {
								
								if(regular == "LW/OP") {
									saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
								} else {
									if(vl == 0) {
										toastr.error('You have a zero vacation leave', 'Error', {timeOut: 8000});
									} else{
										saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
									}
								}
							}
						}
					}
				}	
			}
		}
	});

	function saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays) {

		$.ajax({
			url:"http://localhost:8080/leave-form/leave-form/add",
			type: "POST",
			data: {regular:regular, dateFrom:dateFrom, dateTo:dateTo, reason:reason, dateTimeFrom:dateTimeFrom, dateTimeTo:dateTimeTo, contLeave:contLeave, noDays:noDays},
			success: function(data) {
				toastr.success('Successfully created', 'Success', {timeOut: 8000});
				
				window.setTimeout(function(){window.location.href = "http://localhost:8080/leave-form/" }, 8000);
			},
			error:function() {
				toastr.error('Oops, Duplicate Entry', 'Error', {timeOut: 8000});
			}
		});
	}

	$('form#formComment').submit(function(e){

		e.preventDefault();

		var formData = new FormData($(this)[0]);

		$.ajax({
			url: "http://localhost:8080/leave-form/submit-comment",
			type: "POST",
			data: formData,
			async: true,
			cache: false,
			contentType:false,
			processData:false,
			success: function(data){
				toastr.success('Feedback successfully sent', 'Success', {timeOut: 8000});
				$('#commentbox').val('');
			},
			error:function() {
				toastr.error(data, 'Error', {timeOut: 8000});
			}
		})
	});

	$('form#CreateNewSubordinate').submit(function(e){

		e.preventDefault();

		var formData = new FormData($(this)[0]);

		$.ajax({
			url: "http://localhost:8080/leave-form/employees/create",
			type: "POST",
			data: formData,
			async: true,
			cache: false,
			contentType:false,
			processData:false,
			success: function(data){
				$('#createNew').modal('hide');
				toastr.success('Employee successfully created', 'Success', {timeOut: 8000});
				window.setTimeout(function(){window.location.href = "http://localhost:8080/leave-form/" }, 8000);
				$('form#CreateNewSubordinate')[0].reset();
			},
			error:function() {
				toastr.error(data, 'Error', {timeOut: 8000});
			}
		})
	});

	$('form#balanceLeave').submit(function(e){

		e.preventDefault();

		var formData = new FormData($(this)[0]);
		var id = $('#empID').val();
		var sl = $('#sl_leave').val();
		var vl = $('#vl_leave').val();
		var splitSL = sl.split('/');
		var splitVL = vl.split('/');

		$.ajax({
			url: "http://localhost:8080/leave-form/update-leave-balance/" + id,
			type: "POST",
			data: formData,
			async: true,
			cache: false,
			contentType:false,
			processData:false,
			success: function(data){
				toastr.success('Change date has been save', 'Success', {timeOut: 8000});
				$('.vl-'+id).html('<span>'+splitVL[0]+'</span>'+splitVL[1]);
				$('.sl-'+id).html('<span>'+splitSL[0]+'</span>'+splitSL[1]);
				$('#balanceLeave')[0].reset();
			},
			error:function() {
				toastr.error("Can't Update due to restriction", 'Error', {timeOut: 8000});
				$('#balanceLeave')[0].reset();
			}
		})
	});

	$('.leave-wrapper').on('click',function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url:"http://localhost:8080/leave-form/employee/profile/" + id,
			type: "POST",
			data: {id:id},
			success: function(data) {
				$('#employeeDir').html(data);
				$('#profileDir').modal('show');
			}
		});

	});

	$('#leaveUpcoming').on('click', function() {
		upcomingLeave();
	});

	$('#import_csv').on('submit', function(e){
		e.preventDefault();
		var formData = new FormData($(this)[0]);
		$.ajax({
			url:"http://localhost:8080/leave-form/bulk-upload/import",
			method:"POST",
			data:formData,
			async: true,
			cache: false,
			contentType:false,
			processData:false,
			beforeSend:function(){
				$('#import_csv_btn').html('Importing...');
			},
			success:function(data){
				$('#import_csv')[0].reset();
				$('#bulk_upload').modal('hide');
				toastr.success('Bulk Upload Successfully save', 'Success', {timeOut: 8000});
			}
		})
	});

	_countFeed();

	$('#feedAnchor').click(function() {
		$.ajax({
			url:"http://localhost:8080/leave-form/comment-seen",
			method:"POST",
			success: function(data) {
				_getFeedBack();
				$('#feedBadge').removeClass('badge badge-danger');
				$('#feedBadge').html('');
			}
		});
	});

	$('.optimization').on('click', function(){
		var table = $(this).attr('data-id');
		$.ajax({
			url:"http://localhost:8080/leave-form/database/table/optimize/" + table,
			method:"POST",
			data: {table:table},
			success: function(data) {
				toastr.success(table+' has been optimize', 'Success', {timeOut: 8000});
			}
		});
	});

	$('.repair').on('click', function(){
		var table = $(this).attr('data-id');
		$.ajax({
			url:"http://localhost:8080/leave-form/database/table/repair/" + table,
			method:"POST",
			data: {table:table},
			success: function(data) {
				toastr.success(table+' has been repair', 'Success', {timeOut: 8000});
			}
		});
	});

	$('.tableBackup').on('click', function(){
		var table = $(this).attr('data-id');
		$.ajax({
			url:"http://localhost:8080/leave-form/database/table/backup/" + table,
			method:"POST",
			data: {table:table},
			success: function(data) {
				toastr.success('Backup '+table+' done', 'Success', {timeOut: 8000});
			}
		});
	});

	$('.tableData').on('click', function(){
		var table = $(this).attr('data-id');
		$.ajax({
			url:"http://localhost:8080/leave-form/database/backup/data/" + table,
			method:"POST",
			data: {table:table},
			success: function(data) {
				toastr.success('Backup '+table+' done', 'Success', {timeOut: 8000});
			}
		});
	});
	$('#dbAll').on('click', function(){
		$.ajax({
			url:"http://localhost:8080/leave-form/database/backup",
			method:"POST",
			success: function(data) {
				toastr.success('Backup Database done', 'Success', {timeOut: 8000});
			}
		});
	});

	$('.tableStructure').on('click', function(){
		var table = $(this).attr('data-id');
		$.ajax({
			url:"http://localhost:8080/leave-form/database/describe/" + table,
			method:"POST",
			data: {table:table},
			success: function(data) {
				$('#dbtableStructure').html(data);
				$('#strucTable').html(table);
				$('#StructureDB').modal('show');
				$('#database').css("z-index", "100");
			}
		});
	});

	$('.dbClose').on('click', function(){
		$('#database').css("z-index", "1050");
	})
});

function _getFeedBack() {
	$.ajax({
		url:"http://localhost:8080/leave-form/feeds",
		method:"POST",
		success: function(data) {
			$('.feedtbody').html(data);
		}
	});
}

function msgView(id) {
	$.ajax({
		url:"http://localhost:8080/leave-form/view-comment/" + id,
		type: "POST",
		data: {id:id},
		success: function(data) {
			$('#displayComment').html(data);
			$('#feed_back').css("z-index", "100");
			$('#comment_view').modal('show');
		}
	});

}

function leaveCancel(id) {
	$.ajax({
		url:"http://localhost:8080/leave-form/leave-cancel/" + id,
		method:"POST",
		success: function(data) {
			toastr.success('Leave has been cancelled', 'Success', {timeOut: 8000})
			upcomingLeave();
			window.setTimeout(function(){window.location.href = "http://localhost:8080/leave-form/" }, 5000);
		}
	});
}

function upcomingLeave() {
	$.ajax({
		url:"http://localhost:8080/leave-form/upcoming-leave",
		method:"POST",
		success: function(data) {
			$('.leavetbody').html(data);
		}
	});
}

function msgHide(id) {
	$.ajax({
		url:"http://localhost:8080/leave-form/comment-hide/" + id,
		method:"POST",
		success: function(data) {
			_getFeedBack();
			toastr.success('Feedback has been hide', 'Success', {timeOut: 8000})
		}
	});
}

function _countFeed() {
	$.ajax({
		url:"http://localhost:8080/leave-form/feedback-count",
		method:"POST",
		success: function(data) {
				
			if(data == 0) {
				$('#feedBadge').removeClass('badge badge-danger');
				$('#feedBadge').html('');
			} else {
				$('#feedBadge').addClass('badge badge-danger');
				$('#feedBadge').html(data);
			}
				
		}
	});
}

function feedCount() {
	feed = $('#clientsFeed').val();
	if(feed != '0') {
		$('#feedBadge').addClass('badge badge-danger');
		$('#feedBadge').html(feed);
	} else {
		$('#feedBadge').removeClass('badge badge-danger');
		$('#feedBadge').html('');
	}
}