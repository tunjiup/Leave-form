$( function() {

	var datePicker = '<td class="lbl" style="width: 1.68in">Dates of Leave From: </td><td class="inpt text-center" style="width: 2.44in"><input type="text" name="dateFrom" id="datePickerFrom" data-toggle="datetimepicker" data-target="#datePickerFrom" class=" datetimepicker-input" data-date-start-date="0d"/></td><td class="lbl" style="width: 0.28in">to</td><td class="inpt text-center" style="width: 2.61in"><input type="text" name="dateTo" id="datePickerTo" data-date-start-date="0d" data-toggle="datetimepicker" data-target="#datePickerTo" class=" datetimepicker-input"/></td>';
	var dateTimePicker = '<td class="lbl" style="width: 1.68in">Dates of Leave From: </td><td class="inpt text-center" style="width: 2.44in"><input type="text" name="dateTimeFrom" id="dateTimePickerFrom" data-toggle="datetimepicker" data-target="#dateTimePickerFrom" class=" datetimepicker-input" data-date-start-date="0d"/></td><td class="lbl" style="width: 0.28in">to</td><td class="inpt text-center" style="width: 2.61in"><input type="text" name="dateTimeTo" id="dateTimePickerTo" data-date-start-date="0d" data-toggle="datetimepicker" data-target="#dateTimePickerTo" class=" datetimepicker-input"/></td>';
	var leavetypes = ['Sick','Vacation','Bereavement','Offsetting','Emergency','Maternity/Paternity','Birthday','Hospitalization'];

	setInterval(function(){leaveTypes()}, 100);
	setInterval(function(){testDate()}, 100);

	$(".leaveTypes").on("click", function() {
		var numberOfChecked = $('input.leaveTypes:checkbox:checked').length;
		if (numberOfChecked > 1) {
			$(this).prop('checked', false);
		}
	});

	$(".withorwithoutpay").on("click", function() {
		var numberOfChecked = $('input.withorwithoutpay:checkbox:checked').length;
		if (numberOfChecked > 1) {
			$(this).prop('checked', false);
		}
	});

	$('#ckbox').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox2').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox3').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox4').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox5').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox6').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox7').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox8').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox9').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
			_dateFunction();
		}
	});
	$('#ckbox10').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#regular').val(val);
		}
	});
	$('#ckbox11').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#regular').val(val);
		}
	});

	function leaveTypes() {
		var numberOfChecked = $('input.leaveTypes:checkbox:checked').length;
		if (numberOfChecked == 0) {
			$(this).prop('checked', false);
			$('#dateFunction').html('');
			console.log('Working');
		}
	}

	function _dateFunction() {
		var leaveVal = $('#contLeave').val();
		if($.inArray(leaveVal,leavetypes) != '-1') {
			$('#dateFunction').html(datePicker);
		} else {
			$('#dateFunction').html(dateTimePicker);
		}
	}

	function testDate() {
		$('#dateTimePickerFrom').datetimepicker();
	    $('#dateTimePickerTo').datetimepicker({
	    	useCurrent: false
	    });
	    $("#dateTimePickerFrom").on("change.datetimepicker", function (e) {
	        $('#dateTimePickerTo').datetimepicker('minDate', e.date);
	    });
	    $("#dateTimePickerTo").on("change.datetimepicker", function (e) {
	        $('#dateTimePickerFrom').datetimepicker('maxDate', e.date);
	        _DateTimePickerCom();
	    });

	    $('#datePickerFrom').datetimepicker({format: 'MM/DD/YYYY'});
	    $('#datePickerTo').datetimepicker({
	    	useCurrent: false,
	    	format: 'MM/DD/YYYY'
	    });
	    $("#datePickerFrom").on("change.datetimepicker", function (e) {
	        $('#datePickerTo').datetimepicker('minDate', e.date);
	    });
	    $("#datePickerTo").on("change.datetimepicker", function (e) {
	        $('#datePickerFrom').datetimepicker('maxDate', e.date);
	        _DatePickerCom();
	    });
	}

	function _DatePickerCom() {

		var oneDay = 24*60*60*1000;
		var from = new Date ($("#datePickerFrom").val());
		var to = new Date ($('#datePickerTo').val());

		var int = Math.round(Math.abs((from.getTime() - to.getTime()) / (oneDay)));

		$('#noDays').val(int + 1);
	}

	function _DateTimePickerCom() {

		var oneDay = 24*60*60*1000;
		var from = new Date ($("#dateTimePickerFrom").val());
		var to = new Date ($('#dateTimePickerTo').val());

		var int = Math.round(Math.abs((from.getTime() - to.getTime()) / (oneDay)));

		$('#noDays').val(int + 1);
	}

});