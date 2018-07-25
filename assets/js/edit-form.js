$( function() {

	checkedLeave();

	function checkedLeave() {

		var leaveVal = $('#contLeave').val();
		var regular = $('#regular').val();
		var from = $('#fromEdit').val();
		var to = $('#toEdit').val();

		$('#dateTimePickerFrom').val(from);
		$('#dateTimePickerTo').val(to);

		if(leaveVal == 'Sick Leave') {
			$('#ckbox').prop('checked',true);
		} else if(leaveVal === 'Vacation Leave') {
			$('#ckbox2').prop('checked',true);
		} else if(leaveVal == 'Bereavement Leave') {
			$('#ckbox3').prop('checked',true);
		} else if(leaveVal == 'Offsetting Leave') {
			$('#ckbox4').prop('checked',true);
		} else if(leaveVal == 'Emergency Leave') {
			$('#ckbox5').prop('checked',true);
		} else if(leaveVal == 'Maternity/Paternity Leave') {
			$('#ckbox6').prop('checked',true);
		} else if(leaveVal == 'Birthday Leave') {
			$('#ckbox7').prop('checked',true);
		} else if(leaveVal == 'Hospitalization Leave') {
			$('#ckbox8').prop('checked',true);
		} else if(leaveVal == 'Undertime Leave') {
			$('#ckbox9').prop('checked',true);
		}

		if(regular == 'LWP') {
			$('#ckbox10').prop('checked',true);
		} else if(leaveVal == 'LW/OP') {
			$('#ckbox11').prop('checked',true);
		}
	}

	$('#editSave').click(function(){
		var dateTimeFrom = $('#dateTimePickerFrom').val();
		var dateTimeTo = $('#dateTimePickerTo').val();
		var reason = $('#reason').val();
		var regular = $('#regular').val();
		var noDays = $('#noDays').val();
		var contLeave = $('#contLeave').val();
		var vl = parseFloat($('#vL').val());
		var sl = parseFloat($('#sL').val());
		var bl = $('#bL').val();

		if(contLeave == '') {
			toastr.error('Type of Leave Requested are empty', 'Error', {timeOut: 8000});
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
									saveData(regular,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
								}
							}
								
						} else {
							
							if(regular == "LW/OP") {
								saveData(regular,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
							} else {
								if(vl == 0) {
									toastr.error('You have a zero vacation leave', 'Error', {timeOut: 8000});
								} else{
									saveData(regular,reason,dateTimeFrom,dateTimeTo,contLeave,noDays)
								}
							}
						}
					}
				}
			}
		}
	});

	function saveData(regular,reason,dateTimeFrom,dateTimeTo,contLeave,noDays) {
		var id = $('#EditCode').val();
		var from = $('#fromEdit').val();
		
		$.ajax({
			url:"http://localhost:8080/leave-form/edit-leave-action/" + id,
			type: "POST",
			data: {from:from, regular:regular, reason:reason, dateTimeFrom:dateTimeFrom, dateTimeTo:dateTimeTo, contLeave:contLeave, noDays:noDays},
			success: function(data) {
				toastr.success('Successfully created', 'Success', {timeOut: 8000});
				
				window.setTimeout(function(){window.location.href = "http://localhost:8080/leave-form/" }, 8000);
			},
			error:function() {
				toastr.error('Duplicate Entry', 'Error', {timeOut: 8000});
			}
		});
	}

});