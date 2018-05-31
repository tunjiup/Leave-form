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

$(document).ready(function(){
	
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

		if(contLeave == '') {
			toastr.error('Type of Leave Requested are empty', 'Error Alert', {timeOut: 8000});
		} else {
			if(noDays == '') {
				toastr.error('Total number of days are empty', 'Error Alert', {timeOut: 8000});
			} else {
				if(regular == '') {
					toastr.error('Please choose LWP / LWOP ', 'Error Alert', {timeOut: 8000});
				} else {
					if(reason == '') {
						toastr.error('Reason for Leave are empty ', 'Error Alert', {timeOut: 8000});
					} else {
						if(contLeave == 'Sick') {
							if(sl == 0) {
								toastr.error('You have a zero sick leave', 'Error Alert', {timeOut: 8000});
							} else {
								if(dateFrom == '' || dateTo == '' || reason == '' || regular == '' || noDays == '') {
									toastr.error('Required fileds', 'Error Alert', {timeOut: 8000});
								} else {
									saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
								}
							}
						} else if(contLeave == 'Birthday') {
							if(bl == 0) {
								toastr.error('You have a zero birthday leave', 'Error Alert', {timeOut: 8000});
							} else {
								saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
							}
						} else {
							if(vl == 0) {
								toastr.error('You have a zero vacation leave', 'Error Alert', {timeOut: 8000});
							} else{
								saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
							}
						}
					}
				}
			}
		}
	});

	function saveData(regular,dateFrom,dateTo,reason,dateTimeFrom,dateTimeTo,contLeave,noDays) {

		$.ajax({
			url:"https://media.megasportsworld.com/msw-dev-leave-sites/leave-form/add",
			type: "POST",
			data: {regular:regular, dateFrom:dateFrom, dateTo:dateTo, reason:reason, dateTimeFrom:dateTimeFrom, dateTimeTo:dateTimeTo, contLeave:contLeave, noDays:noDays},
			success: function(data) {
				toastr.success(data, 'Success Alert', {timeOut: 8000});
				print();
				window.setTimeout(function(){window.location.href = "http://localhost:8080/dev-leave-form/" }, 8000);
			},
			error:function(data) {
				toastr.error(data, 'Error Alert', {timeOut: 8000});
			}
		});
	}

	$('.leave-wrapper').on('click',function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url:"https://media.megasportsworld.com/msw-dev-leave-sites/employee/profile/" + id,
			type: "POST",
			data: {id:id},
			success: function(data) {
				$('#employeeDir').html(data);
				$('#profileDir').modal('show');
			}
		});

	});
});