$( function() {

	setInterval(function(){leaveTypes()}, 100);

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
		}
	});
	$('#ckbox2').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox3').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox4').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox5').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox6').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox7').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox8').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox9').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
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
		if (numberOfChecked === 0) {
			$(this).prop('checked', false);
			$('#dateFunction').html('');
		}
	}

	$('#dateTimePickerFrom').datetimepicker();
	$('#dateTimePickerTo').datetimepicker({
		useCurrent: false,
	});

	$("#dateTimePickerFrom").on("change.datetimepicker", function (e) {
		$('#dateTimePickerTo').datetimepicker('minDate', e.date);
		$(this).datetimepicker('hide');
	});
	$("#dateTimePickerTo").on("change.datetimepicker", function (e) {
		$('#dateTimePickerFrom').datetimepicker('maxDate', e.date);
		_DateTimePickerCom();
		$(this).datetimepicker('hide');
	});

	function _DateTimePickerCom() {

		var oneDay = 24*60*60*1000;
		var from = new Date ($("#dateTimePickerFrom").val());
		var to = new Date ($('#dateTimePickerTo').val());

		var int = Math.round(Math.abs((from.getTime() - to.getTime()) / (oneDay)));

		$('#noDays').val(int + 1);
	}

});